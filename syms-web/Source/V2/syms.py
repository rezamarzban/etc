import sys
import io
import pywebio as pyw
from sympy import *

def main():
	sys.stdout = io.StringIO()
	code = pyw.input.textarea("Your code:", code={'mode': "python"})
	pyw.output.put_code(code, language="python")
	pyw.output.put_text("Wait ...")
	exec(code)
	pyw.output.put_text(sys.stdout.getvalue())

pyw.start_server(main, port=8080, debug=True)
