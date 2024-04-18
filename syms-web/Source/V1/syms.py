import sys
from io import StringIO
from pywebio import *
from sympy import *

def main():
	code = input.textarea("Your code:")
	sys.stdout = StringIO()
	output.put_text("Wait ...")
	exec(code)
	output.put_text("Result:", sys.stdout.getvalue())

start_server(main, port=8080, debug=True)
