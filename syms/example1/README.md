At this example, The syms solve Wait's formula to calculating normalized radiation resistance of a sample antenna which is related to ground wave propagation part only.

For example, Download `syms-aarch64` release with your handheld smartphone browser and extract its contents, Then at freshly installed Termux run below command and allow it to access storage:

```
termux-setup-storage
```

Then copy extracted contents from storage to Termux home folder by running below command:

```
cp -r ~/storage/downloads/syms-aarch64 ~
```

Then change directory and its files permission to executable by running below command:

```
cd syms-aarch64
chmod +x *
```

Then run below command to opening `nano` text editor for code writing at `main.sym` file:

```
nano main.sym
```

Copy and paste below codes to nano text editor:

```
r, eta, beta, rho, a, h = symbols('r eta beta rho a h', real=True)

beta = 2*pi/100
a = 18
h = 20
r = sqrt(rho**2 + h**2)

expr0 = (-eta)/((2*pi*sin(beta*h)**2))
expr1 = Integral(exp(-1j*2*beta*r)/rho, (rho, a, oo)) 
expr2 = -1*2*cos(beta*h)*Integral(exp(-beta*1j*(r + rho))/rho, (rho, a, oo)) 
expr3 = -cos(beta*h)**2*Integral(exp(-1j*2*beta*rho)/rho, (rho, a, oo))

norm = 4*pi*expr0/eta

norm_deltaZ_re = re(norm.evalf() * (expr1.evalf() + expr2.evalf() + expr3.evalf()))

print(norm_deltaZ_re)
```

Then hit `ctrl+x` button and type `y`, Then press `Enter` to exit and saving the file, And finally run below command to solving and calculating:

```
./syms
```

In less than a minute it solve and calculate complex Wait's formula. The result is normalized radiation resistance of a sample antenna which is related to ground wave propagation part only, So syms is easy to use portable handheld equation solver and calculator for engineers and scientists.

syms always looks for `main.sym` file which contains sympy codes to solving and calculating, Change it for your needs.
