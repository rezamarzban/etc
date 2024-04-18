<?php
session_start();

// Check if the user is already logged in
if (isset($_SESSION['user'])) {
    header('Location: index.php');
    exit();
}

// Check login credentials
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Validate credentials (replace with your own authentication logic)
    if ($username === 'your_username' && $password === '11') {
        $_SESSION['user'] = $username;
        header('Location: index.php');
        exit();
    } else {
        $error = 'Invalid username or password';
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <title>Login</title>
</head>
<body>

<h2>Login</h2>

<?php if (isset($error)) echo "<p style='color: red;'>$error</p>"; ?>

<form method="post" action="login.php">
    <label for="username">Username:</label>
    <input type="text" name="username" required><br>
    <label for="password">Password:</label>
    <input type="password" name="password" required><br>
    <input type="submit" value="Login">
</form>

</body>
</html>
