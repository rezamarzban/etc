f = @(x) exp(-1i.*x)./x;

a = 1;
b = 100000;

n = 1000000;

h = (b - a) / n;
x = a:h:b;
y = f(x);
result = h * (sum(y) - 0.5 * (y(1) + y(end)));

disp(result);
