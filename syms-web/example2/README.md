At this example, The syms solve and render (rendering is available from syms-web Version 3) short dipole antenna equations.

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

Then copy and paste below syms code to opened webpage code field and click the `Run` button:

```
r, theta, phi, I, l, K, Z0 = symbols('r theta phi I l K Z0', real=True)

E_theta = ((1j * K * I * l * Z0) / (4 * pi * r)) * sin(theta) * exp(-1j * K * r)
H_phi = E_theta / Z0
S_theta = 0.5 * re(E_theta * conjugate(H_phi))
P_rad = integrate(integrate(S_theta * r**2 * sin(theta), (theta, 0, pi)), (phi, 0, 2*pi))
Rr = 2 * P_rad / I**2
```

Again copy and paste below syms code to opened webpage code field and click the `Run` button:

```
print("Farfield radiation electricity field: $$" + latex(E_theta.simplify(rational=True)) + "$$")
print("Farfield radiation magnetic field $$" + latex(H_phi.simplify(rational=True)) + "$$")
print("Radiation intensity: $$" + latex(S_theta.simplify(rational=True)) + "$$")
print("Radiation power: $$" + latex(P_rad.simplify(rational=True)) + "$$")
print("Radiation resistance: $$" + latex(Rr.simplify(rational=True)) + "$$")
```

It solve and render short dipole antenna equations.
