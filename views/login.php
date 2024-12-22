<?php
// views/login.php
session_start();
require_once '../controller/LoginController.php';

$errors = [];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $loginController = new LoginController();
    $username = $_POST['username'] ?? '';
    $email = $_POST['email'] ?? '';
    $password = $_POST['password'] ?? '';

    $errors = $loginController->login($username, $email, $password);
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="../css/login.css">
</head>
<body>
    <div class="container">
        <!-- Login Form -->
        <form id="loginForm" method="POST" action="">
            <h2>Login</h2>
            <p class="error-message"><?= $errors['general'] ?? '' ?></p>
                <input 
                    type="text" 
                    id="loginUsername" 
                    name="username" 
                    placeholder="Username" 
                    value="<?= htmlspecialchars($_POST['username'] ?? '') ?>" 
                    <?= isset($errors['username']) ? 'aria-invalid="true"' : '' ?>
                >
                <p class="error-message"><?= $errors['username'] ?? '' ?></p>
                <input 
                    type="email" 
                    id="loginEmail" 
                    name="email" 
                    placeholder="Email" 
                    value="<?= htmlspecialchars($_POST['email'] ?? '') ?>" 
                    <?= isset($errors['email']) ? 'aria-invalid="true"' : '' ?>
                >
                <p class="error-message"><?= $errors['email'] ?? '' ?></p>
                <input 
                    type="password" 
                    id="loginPassword" 
                    name="password" 
                    placeholder="Password" 
                    <?= isset($errors['password']) ? 'aria-invalid="true"' : '' ?>
                >
                <p class="error-message"><?= $errors['password'] ?? '' ?></p>
                <button 
                    type="submit">
                    Login
                </button>
                <p>Don't have an account? <a href="register.php">Register here</a></p>
        </form>
    </div>
    <script src="../js/Loginvalidation.js"></script>
</body>
</html>
