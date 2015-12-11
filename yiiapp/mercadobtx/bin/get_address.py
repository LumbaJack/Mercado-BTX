from pybitcointools.main import *
from bip38 import *
import SocketServer
import json
import traceback
import sys
import daemon
import signal
import pwd
import datetime
import os
import tempfile

DEBUG = False
STDLOG = '/tmp/%s.log' % (sys.argv[0])
ERRLOG = '/tmp/%s.err' % (sys.argv[0])
USER   = 'bitcoin'
PIDFILE= '/var/run/%s.pid' % (sys.argv[0])


class MyHandler(SocketServer.StreamRequestHandler):
    def handle(self):
        data = self.rfile.readline()
        ret = {}
        if data:
            if data == "request_addr\n":
                for x in range(1, 4):
                    ret['key%s' % x] = random_key()
                    ret['addr%s' % x] = privkey_to_address(ret['key%s' % x])
                    ret['pub%s' % x] = privtopub(ret['key%s' % x])
                ret['script'] = mk_multisig_script(ret['pub1'],ret['pub2'],ret['pub3'],2,3)
                ret['multiaddr'] = scriptaddr (ret['script'])
                self.wfile.write(json.dumps(ret))
            else:
                self.wfile.write('{"Error": "Error"}')
        self.connection.close()


def run():
    #for i in range(20):
    #    t = proc_tran(queue)
    #    t.setDaemon(True)
    #    t.start()
#
    server_address = os.path.join(tempfile.gettempdir(), 'addr_server_socket')
    if os.access(server_address, 0):
        os.remove(server_address)
    try:
        server = SocketServer.UnixStreamServer(server_address, MyHandler)
        server.serve_forever()
    except KeyboardInterrupt:
        sys.exit(0)

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

