<?php
// controllers/RegisterController.php
require_once '../classes/User.php';
require_once '../config/database.php';

class RegisterController {
    private $user;

    public function __construct() {
        $db = (new Database())->getConnection();
        $this->user = new User($db);
    }

    public function register($username, $email, $password, $repassword) {
        $errors = [];
        
        // Cek apakah username sudah ada
        if ($this->user->usernameExists($username)) {
            $errors['username'] = "Username sudah ada.";
        }

        // Validasi password
        if (strlen($password) < 8) {
            $errors['password'] = "Password terlalu lemah. Minimal 8 karakter.";
        } elseif (!preg_match('/[A-Z]/', $password) || !preg_match('/\d/', $password)) {
            $errors['password'] = "Password terlalu lemah. Harus mengandung setidaknya satu huruf besar dan satu angka.";
        } 

        // Cocokkan password dan re-password
        if ($password !== $repassword) {
            $errors['repassword'] = "Password tidak sama.";
        }

        // Jika tidak ada error, lakukan registrasi
        if (empty($errors)) {
            if ($this->user->register($username, $email, $password)) {
                header('Location: login.php');
                exit;
            } else {
                $errors['general'] = "Registrasi gagal. Silakan coba lagi.";
            }
        }

        return $errors;
    }
}
?>
