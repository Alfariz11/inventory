<?php
// classes/User.php
class User {
    private $db;

    public function __construct($db) {
        $this->db = $db;
    }

    // Registrasi pengguna baru
    public function register($username, $email, $password) {
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
        $stmt = $this->db->prepare("INSERT INTO users (username, email, password) VALUES (?, ?, ?)");
        return $stmt->execute([$username, $email, $hashedPassword]);
    }

    // Login pengguna
    public function login($username, $email, $password) {
        $stmt = $this->db->prepare("SELECT * FROM users WHERE username = ? AND email = ?");
        $stmt->execute([$username, $email]);
        $user = $stmt->fetch();
        if ($user && password_verify($password, $user['password'])) {
            return $user;
        }
        return false;
    }

    // Cek jika sudah login
    public function isLoggedIn() {
        return isset($_SESSION['user']);
    }

    //cek username 
    public function usernameExists($username) {
        $query = "SELECT COUNT(*) as count FROM users WHERE username = :username";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':username', $username);
        $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        return $row['count'] > 0;
    }
}
?>
