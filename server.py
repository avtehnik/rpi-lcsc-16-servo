#!/usr/bin/env python

import string,cgi,time,pprint,serial,sys
from os import curdir, sep
from daemon import Daemon
from urlparse import urlparse, parse_qs
from BaseHTTPServer import BaseHTTPRequestHandler, HTTPServer

class MyHandler(BaseHTTPRequestHandler):

    def do_GET(self):
	     if self.path.endswith(".ico"):
  	       return
	     query_components = parse_qs(urlparse(self.path).query)
             self.send_response(200)
             self.send_header('Content-type',	'text/html')
             self.end_headers()
             self.wfile.write(query_components["callback"][0]+"({servo:" + query_components["servo"][0]+",position:"+query_components["position"][0]+"});")
	     self.server.serial.write('#'+query_components["servo"][0]+'P'+query_components["position"][0].rjust(4,'0')+'!')
       	     return


def main():
    try:
        server = HTTPServer(('', 81), MyHandler)
	server.serial = serial.Serial('/dev/ttyUSB0', 9600, timeout=0)
        server.serial.open()

        print 'started httpserver...'
        server.serve_forever()
    except KeyboardInterrupt:
        print '^C received, shutting down server'
	server.serial.close()
        server.socket.close()



class MyDaemon(Daemon):
	        def run(self):
		        print 'started httpserver w...'
         	 	main()

if __name__ == '__main__':
        main()

if __name__ == '__maain__':
	#main()
	daemon = MyDaemon('/var/run/gpsserver.pid')
        if len(sys.argv) == 2:
                if 'start' == sys.argv[1]:
		        print 'started httpserver...'
                        daemon.start()
                elif 'stop' == sys.argv[1]:
                        daemon.stop()
                elif 'restart' == sys.argv[1]:
                        daemon.restart()
                else:
                        print "Unknown command"
                        sys.exit(2)
                sys.exit(0)
        else:
                print "usage: %s start|stop|restart" % sys.argv[0]
                sys.exit(2)

