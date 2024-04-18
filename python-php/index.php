<?php
session_start();

// Check if the user is logged in
if (!isset($_SESSION['user'])) {
    header('Location: login.php');
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Interactive PHP-Python</title>
    <link rel="stylesheet" href="styles.css">
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.63.0/codemirror.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.63.0/codemirror.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.63.0/mode/python/python.js"></script>
</head>
<body>

<div id="editor"></div>
<button id="runButton">Run</button>
<div class="output-box" id="output"></div>

<a href="logout.php">Logout</a>

<script>
    var editor = CodeMirror(document.getElementById("editor"), {
        mode: "python",
        lineNumbers: true,
        theme: "default"
    });

    $("#runButton").click(function () {
        var pythonCode = editor.getValue();
        runPythonScript(pythonCode);
    });

    function runPythonScript(code) {
        $.ajax({
            type: "POST",
            url: "run_python.php",
            data: { code: code },
            success: function (response) {
                $("#output").html("<pre>" + response + "</pre>");
            }
        });
    }
</script>

</body>
</html>
