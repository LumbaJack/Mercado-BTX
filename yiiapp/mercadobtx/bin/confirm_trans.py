from bitcoinrpc.authproxy import AuthServiceProxy
import json
import sys
import MySQLdb
import urllib2

def get_json_bc(txid):
    if txid is None:
        url = 'https://blockchain.info/latestblock'
    else:
        url = "https://blockchain.info/tx/%s?format=json" % (txid)
    try:
        req = urllib2.Request(url, None, {'user-agent':'Mozilla/5.0 (Windows NT 6.2; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/32.0.1667.0 Safari/537.36'})
        opener = urllib2.build_opener()
        f = opener.open(req)
        data = json.load(f)
        return data
    except:
        return None

def get_json_local(txid):
    try:
        tx = btdc.getrawtransaction(txid, 1)
        return tx
    except:
        return None

if __name__ == '__main__':
    db = MySQLdb.connect(host="localhost", user="python", passwd="j5YWfMw32wsA7ZEMHxzLw95c", db="mbtx")
    btdc = AuthServiceProxy("http://bitcoinrpc:J6hQrpF9MCKcYFHeka1GQQBkZ38r6Rr2wyADgnNMnqLP@127.0.0.1:8332")
    cursor = db.cursor()
    cursor.execute("select id_trans,wallet_address,txtid from tbl_transaction where type = 2 and status = 0 and UNIX_TIMESTAMP() - create_time > 300")
    numrows = int(cursor.rowcount)
    if numrows  == 0:
        sys.exit(0)
    curr = get_json_bc(None)
    if curr['height'] == btdc.getblockcount():
        use_local_btc = True
        print "Using Local Daemon"
    else:
        use_local_btc = False
        print "Warning!! the local daemon is out of sync."
    if curr is None:
        sys.exit(0)
    for r in range(0,numrows):
        row = cursor.fetchone()
        sql = ""
        if use_local_btc:
            data = get_json_local(row[2])
            if data is not None and 'confirmations' in data :
                if data['confirmations']  > 5:
                    sql = 'update tbl_transaction set status = 1 where id_trans = %s' % (row[0])
        if not use_local_btc or data == None: ##Use blockchain as backup
            data = get_json_bc(row[2])
            if data is not None and 'block_height' in data :
                if curr['height'] - data['block_height'] + 1 > 5:
                    sql = 'update tbl_transaction set status = 1 where id_trans = %s' % (row[0])
        if sql != "":
            curint = db.cursor()
            print sql
            curint.execute(sql)
            curint.close()
    db.commit()
    db.close()
    sys.exit(0)
