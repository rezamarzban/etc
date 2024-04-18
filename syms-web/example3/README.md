At this example, The syms solve and render (rendering is available from syms-web Version 3) an integral.

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
x = symbols('x', real=True)

f = Integral(exp(-1*x)/x, (x, 1, oo)) 

print("$$"+latex(f)+"$$")
```

Again copy and paste below syms code to opened webpage code field and click the `Run` button:

```
result = f.evalf(3)

print(result)
```

It solve and render an integral.
