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

Then run below command and navigate your smartphone browser to `http://127.0.0.1:8080`:

```
./syms
```

Caution: If you encourage with below error when execute `syms`, upgrade `openssl` by `openssl_1.3a3.2.1-1_aarch64.deb` package which is provided at releases:
`ImportError: dlopen failed: library "libssl.so.3" not found: needed by /data/data/com.termux/files/home/syms-aarch64/_ssl.so in namespace (default)`
, So to doing this, Download provided package with your smartphone browser and run below commands to upgrading `openssl`:

```
cp ~/storage/downloads/openssl*aarch64.deb ~
dpkg -i ~/openssl*aarch64.deb
```

Then copy and paste below syms code to opened webpage and click the button:

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

In less than a minute it solve and calculate complex Wait's formula. The result is normalized radiation resistance of a sample antenna which is related to ground wave propagation part only, So syms is easy to use portable handheld equation solver and calculator for engineers and scientists.
