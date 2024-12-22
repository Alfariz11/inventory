<?php
// views/register.php
session_start();
require_once '../controller/RegisterController.php';

$errors = [];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $registerController = new RegisterController();
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $repassword = $_POST['repassword'];

    $errors = $registerController->register($username, $email, $password, $repassword);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="stylesheet" href="../css/register.css">
</head>
<body>
    <div class="container">
        <!-- Regis Form -->
        <form id="registerForm" method="POST" action="">
            <h2>Register</h2>

            <input 
                type="text" 
                id="regUsername" 
                name="username" 
                placeholder="Username"
            >
            <p class="error-message"><?= $errors['username'] ?? '' ?></p>

            <input 
                type="email" 
                id="regEmail" 
                name="email" 
                placeholder="Email"
            >
            <p class="error-message"><?= $errors['email'] ?? '' ?></p>

            <div class="password-field">
                <input 
                    type="password" 
                    id="regPassword" 
                    name="password" 
                    placeholder="Password"
                >
            </div>
            <p class="error-message"><?= $errors['password'] ?? '' ?></p>

            <div class="password-field">
                <input 
                    type="password" 
                    id="regRepassword" 
                    name="repassword" 
                    placeholder="Confirm Password"
                >
            </div>
            <p class="error-message"><?= $errors['repassword'] ?? '' ?></p>

            <button type="submit">Register</button>
            <p>Already have an account? <a href="login.php">Login here</a></p>
        </form>
    </div>
    <script src="../js/Registervalidation.js"></script>
</body>
</html>

