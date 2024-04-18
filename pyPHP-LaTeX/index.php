<?php
session_start();

// Check if the user is logged in
if (!isset($_SESSION['user'])) {
    header('Location: login.php');
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $pythonCode = $_POST["pythonCode"];
}

function runPythonScript($code) {
    $file = tempnam(sys_get_temp_dir(), 'python_script');
    file_put_contents($file, $code);

    $output = shell_exec('python3 ' . $file);
    
    unlink($file);

    return $output;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <meta name="viewport" content="width=device-width">
  <title>Python PHP with MathJax</title>
  <link rel="stylesheet" href="styles.css">
  <script src="polyfill.min.js?features=es6"></script>
  <script>
  MathJax = {
    tex: {inlineMath: [['$', '$'], ['\\(', '\\)']]}
  };
  </script>
  <script id="MathJax-script" async src="tex-chtml.js"></script>
</head>
<body>

<form method="post" action="index.php">
    <label for="pythonCode">Enter Python Code:</label><br>
    <textarea name="pythonCode" id="pythonCode" rows="20" cols="40"><?php if($pythonCode) echo $pythonCode; ?></textarea><br>
    <input type="submit" value="Run">
</form>

<?php
if ($pythonCode) {
    $output = runPythonScript($pythonCode);
    echo "<p>Python Output: " . $output . "</p>";
}
?>

</body>
</html>
