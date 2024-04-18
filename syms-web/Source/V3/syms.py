
# Created by Reza Marzban: github.com/rezamarzban/syms-web

import os
import sys
from io import StringIO
import tornado.ioloop
import tornado.web
from sympy import *

static_path=os.path.join(os.path.dirname(__file__), 'templates')

class MainHandler(tornado.web.RequestHandler):
    def get(self):
        self.render("index.html")

    def post(self):
        user_code = self.get_body_argument('code')
        try:
            exec(user_code, globals())
            result = sys.stdout.getvalue()
        except Exception as e:
            result = f'Error: {e}'
        self.write(result)

def make_app():
    return tornado.web.Application([
        (r'/', MainHandler),
        (r'/(.*)', tornado.web.StaticFileHandler, {'path': static_path})
    ], template_path='templates')

if __name__ == '__main__':
    sys.stdout = StringIO()
    app = make_app()
    app.listen(8080)
    tornado.ioloop.IOLoop.current().start()
