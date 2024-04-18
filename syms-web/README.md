# syms-web
syms-web is a single executable binary file that run  sympy codes via web browser (as like as MATLAB/Octave symbolic package codes)

syms-web is portable lightweight complex equation solver and calculator, And doesn't need to any required software to be installed for working, Just download and use it quickly. For example download `syms-aarch64` to fresh Termux and use it without any required software installation as explained in `example1` directory.

Note: In sum cases such as complex integral equations with imaginary part as below code, The `sympy` module is lacking! But `Octave` which use `sympy` module for its `symbolic` package doesn't lack. You can use `MATLAB`, `Wolfram Mathematica` also. The `sympy` module at `Python` is lacking to solve below complex integral! But `symbolic` package at `Octave` that use `sympy` module for its processes doesn't lack to solve this integral with equal code, Maybe `symbolic` package at `octave` apply techniques to use `sympy` for same calculation which we don't understand:
```
x = symbols('x', real=True)
f = Integral(exp(-1j*x)/x, (x, 1, oo))
result = f.evalf()
print(result)
```

Equal Octave code:
```
pkg load symbolic
syms x;
f = int(exp(-1i*x)/x, x, 1, Inf);
result = double(f);
disp(result);
```

Equal MATLAB code:
```
syms x;
f = int(exp(-1i*x)/x, x, 1, Inf);
result = vpa(f);
disp(result);
```

Also `eval()` command can be used to evaluate symbolic expression at MATLAB, And `double()` function get error.

### Some key features of syms-web:
* Free
* Open source
* Portable
* User friendly web interface 
* Offline
* Lightweight
* Simple
* Quick
* Few source code lines
* Handheld (run on smartphone)
* Powerful symbolic package 
* Support Python codes
* Infinite process timeout 

# usage
Download a release and change files permission to executable, Then run:
`./syms`

The syms-web always run sympy codes which user input via browser at address `http://127.0.0.1:8080`.

# build
Run `build.sh` at source directory.

# releases 
V3:

* Rewritten with `tornado` module instead of `pywebio` module
* MathJax rendering of LaTeX expressions
* Simple and fast interactive web style 

V2:

* Improved performance
* Enhanced view

V1:

* `syms-aarch64` is compiled dynamically with `nuitka --standalone` command at python 3.11
