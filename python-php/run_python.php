<?php
$pythonCode = $_POST["code"];
$output = runPythonScript($pythonCode);
echo $output;

function runPythonScript($code) {
    $file = tempnam(sys_get_temp_dir(), 'python_script');
    file_put_contents($file, $code);

    $output = shell_exec('python3 ' . $file);

    unlink($file);

    return $output;
}
?>
