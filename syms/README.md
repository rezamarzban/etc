# syms
syms is a single executable binary file that run sympy codes (as like as MATLAB/Octave symbolic package codes)

syms is portable lightweight complex equation solver and calculator, And doesn't need to any required software to be installed for working, Just download and use it quickly. For example download `syms-aarch64` to fresh Termux and use it without any required software installation as explained in `example1` directory.

### Some key features of syms:
* Free
* Open source
* Portable
* Offline
* Lightweight
* Simple
* Quick
* Easy source code
* Handheld (run on smartphone)
* Strong symbolic package 
* Support Python codes
* Infinite process timeout 

# usage
Download a release and change files permission to executable, Then run:
`./syms`

The syms always run sympy codes which are at `main.sym` file, Change it for your needs.

# build
Run `build.sh` or `build2.sh` at source directory, Compiling with `nuitka` instead of `pyinstaller` is recommended.

# versions

V1:

`syms-arm64` is compiled with `pyinstaller --onefile` command at Python 3.10

Recommended: `syms-aarch64` is compiled dynamically with `nuitka --standalone` command at python 3.11
