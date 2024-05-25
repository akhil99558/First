<?php
session_start();

// Dummy credentials (Replace this with your actual authentication logic)
$valid_username = "admin";
$valid_password = "password";

// Check if the form is submitted with POST method
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve the submitted username and password
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Validate the credentials
    if ($username === $valid_username && $password === $valid_password) {
        // If credentials are valid, set session variables and redirect to the dashboard or home page
        $_SESSION['username'] = $username;
        header("Location: dashboard.php"); // Redirect to dashboard.php or any other page
        exit();
    } else {
        // If credentials are invalid, display an error message
        $error_message = "Invalid username or password. Please try again.";
    }
} else {
    // If the form is not submitted with POST method, redirect back to the login page
    header("Location: login.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <div class="login-container">
        <h2>Login</h2>
        <?php if (isset($error_message)): ?>
            <div class="error"><?php echo $error_message; ?></div>
        <?php endif; ?>
        <form action="submit.php" method="POST">
            <div class="input-group">
                <label for="username">Username</label>
                <input type="text" id="username" name="username" required>
            </div>
            <div class="input-group">
                <label for="password">Password</label>
                <input type="password" id="password" name="password" required>
            </div>
            <button type="submit" class="btn">Login</button>
        </form>
    </div>
</body>
</html>
