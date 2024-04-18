# portable-octave
Portable octave for termux

Download `octave.zip` release with your handheld smartphone browser and extract its contents, Then at freshly installed Termux run below command and allow it to access storage:

```
termux-setup-storage
```

Then copy extracted contents from storage to Termux home folder by running below command:

```
cp -r storage/downloads/octave/* .
dpkg -i upgrade/libmd*.deb
dpkg -i upgrade/zstd*.deb
dpkg -i upgrade/liblzma*.deb
dpkg -i --auto-deconfigure upgrade/*.deb
dpkg -i octave/*.deb
dpkg -i texinfo/*.deb
pip3 install mpmath-1.3.0-py3-none-any.whl
pip3 install sympy-1.12-py3-none-any.whl
```

Then run below command to opening `octave` command line:

```
octave
```

Then run below command at `octave` to installing `symbolic` package:

```
pkg install ~/symbolic-3.1.1.tar.gz
```

Then copy and paste below `octave` code to solving a sample integral:

```
pkg load symbolic
syms x;
f = int(exp(-1i*x)/x, x, 1, Inf);
result = double(f);
disp(result);
```

It solve and calculate a complex integral with imaginary part.
