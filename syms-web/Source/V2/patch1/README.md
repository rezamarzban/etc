# usage

Enter below code in opened webpage to testing `Mathjax`:

```
pyw.output.put_html('<script src="https://polyfill.io/v3/polyfill.min.js?features=es6"></script>')
pyw.output.put_html('<script id="MathJax-script" async src="https://cdn.jsdelivr.net/npm/mathjax@3/es5/tex-mml-chtml.js"></script>')
latex_expression = r'$$f(x) = \int_{a}^{b} \frac{1}{x^2} dx$$'
print(latex_expression)
```
