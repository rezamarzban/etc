# pyPHP-LaTeX
Python interpreter in PHP with built-in MathJax javascript

Example code1 to running at pyPHP with MathJax:
```
from sympy import *
from sympy.printing.mathml import mathml
init_printing(use_unicode=True) # allow LaTeX printing

# independent variables
x, y, z = symbols('x y z', real = True)

# parameters
nu, rho = symbols('nu rho', real = True, constant = True, positive = True)

# dependent variables
u, v, w = symbols('u v w', real = True, cls = Function)

print("$$")
print(latex(diff(u(x,y,z),x)))
print("$$")
```

Example code2 to running at pyPHP with MathJax:
```
from sympy import *
from sympy.printing.mathml import mathml
init_printing(use_unicode=True)

r, theta, phi, I, l, K, Z0 = symbols('r theta phi I l K Z0', real=True)

E_theta = ((1j * K * I * l * Z0) / (4 * pi * r)) * sin(theta) * exp(-1j * K * r)
H_phi = E_theta / Z0
S_theta = 0.5 * re(E_theta * conjugate(H_phi))
P_rad = integrate(integrate(S_theta * r**2 * sin(theta), (theta, 0, pi)), (phi, 0, 2*pi))
Rr = 2 * P_rad / I**2

print("$$")
print(latex(P_rad.simplify(rational=True)))
print("$$")

print("$$")
print(latex(Rr.simplify(rational=True)))
print("$$")
```

Note: Without `print("$$")` at two sides of each LaTeX format formula, It will print plain text of LaTeX format formula instead of MathJax printing.
