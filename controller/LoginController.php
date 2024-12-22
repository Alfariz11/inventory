<?php
// controllers/LoginController.php
require_once '../classes/User.php';
require_once '../config/database.php';

class LoginController {
    private $user;

    public function __construct() {
        $db = (new Database())->getConnection();
        $this->user = new User($db);
    }

    public function login($username, $email, $password) {
        $errors = [];
    
        // Validasi username
        if (empty($username)) {
            $errors['username'] = "Username is required.";
            return $errors; 
        }
    
        // Validasi email
        if (empty($email)) {
            $errors['email'] = "Email is required.";
            return $errors; 
        } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $errors['email'] = "Invalid email format.";
            return $errors; 
        }
    
        // Validasi password
        if (empty($password)) {
            $errors['password'] = "Password is required.";
            return $errors; 
        }
    
        // Cek kredensial pengguna
        if (!$this->user->login($username, $email, $password)) {
            $errors['general'] = "Invalid username, email, or password.";
            return $errors; 
        }
    
        // Jika login berhasil
        $_SESSION['user'] = $this->user->login($username, $email, $password);
        header('Location: home.php');
        exit;
    }
    
}
?>
