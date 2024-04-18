
find . -type f -name "*.cpython-311.so" -exec sh -c 'mv "$0" "${0%.cpython-311.so}.so"' {} \;
