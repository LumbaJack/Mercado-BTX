from ws4py.client.threadedclient import WebSocketClient
import json
import traceback
import sys
import Queue
import threading
import MySQLdb
import urllib2
import daemon
import signal
import pwd
import datetime
import os



queue = Queue.Queue()
DEBUG = False
STDLOG = '/tmp/python_monitor.log'
ERRLOG = '/tmp/python_monitor.err'
USER   = 'bitcoin'
PIDFILE= '/var/run/%s.pid' % (sys.argv[0])


class check_tran(threading.Thread):
    def get_txtid(self, tx_index):
        req = urllib2.Request("http://blockchain.info/tx-index/%s?format=json" %(tx_index), None, {'user-agent':'syncstream/vimeo'})
        opener = urllib2.build_opener()
        f = opener.open(req)
        data = json.load(f)
        return data['hash']


    def __init__(self, queue):
        threading.Thread.__init__(self)
        self.queue = queue
        self.db = MySQLdb.connect(host="localhost", user="python", passwd="j5YWfMw32wsA7ZEMHxzLw95c", db="mbtx")
          
    def run(self):
        while True:
            data = self.queue.get()
            cursor = self.db.cursor()
            cursor.execute("select wallet_address, id_user from tbl_wallet")
            self.db.commit()
            numrows = int(cursor.rowcount)
            if numrows == 0:
                self.queue.task_done()
            for r in range(0,numrows):
                row = cursor.fetchone()
                if row[0] in data:
                    #print "possible match %s" %(row[0])
                    d = json.loads(data)
                    value = 0
                    for tr in d['x']['out']:
                        if tr['addr'] == row[0]:
                            value = float(tr['value']) / 100000000;
                    txtid = self.get_txtid(d['x']['tx_index'])
                    print logts(), "Incomming transfer to address %s amount %.8f:" % (row[0], value)
                    sql = "replace into tbl_transaction (id_user, status, type, currency, amount, wallet_address, descr, create_time, txtid) values (%s,0,2,'BTC',%.9f, '%s','You received bitcoin from an external account', UNIX_TIMESTAMP(), '%s')" % (row[1], value, row[0], txtid)
                    #print sql
                    if value > 0:
                        curint = self.db.cursor()
                        curint.execute(sql)
                        self.db.commit()
                        curint.close()
            #signals to queue job is done
            cursor.close()
            self.queue.task_done()

class WS(WebSocketClient):
    def opened(self):
        self.send('{"op":"unconfirmed_sub"}')

    def closed(self, code, reason=None):
        print "Closed down", code, reason

    def received_message(self, m):
        if m.is_text:
            try:
                queue.put(m.data)
            except:
                print "error"
                traceback.print_exc(file=sys.stdout)

def run():
    print logts(), "Started pid:", os.getpid()
    for i in range(20):
        t = check_tran(queue)
        t.setDaemon(True)
        t.start()

    try:
        ws = WS('ws://ws.blockchain.info/inv', protocols=['http-only', 'chat'])
        ws.connect()
        ws.run_forever()
    except KeyboardInterrupt:
        ws.close()

def logts():
    return datetime.datetime.now().strftime('%d-%m-%Y %H:%M:%S')

def sigterm(signum, frame):
    print "%s SIGTERM - Shutting down" % logts()
    os.unlink(PIDFILE)
    sys.exit()

if __name__ == '__main__':
    print logts(),"Running as:", USER
    with file(PIDFILE,'w') as f: f.write(str(os.getpid()))
    uid = pwd.getpwnam(USER).pw_uid
    os.setgid(uid)
    os.setuid(uid)
    if DEBUG:
        run()
    else:
        with daemon.DaemonContext(working_directory='/tmp',stdout=open(STDLOG,'a'),stderr=open(ERRLOG,'a'),
            signal_map={signal.SIGTERM:sigterm}):
            run()
