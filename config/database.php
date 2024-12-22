<?php
// config/database.php
class Database {
    private $dsn = 'mysql:host=localhost;dbname=inventory_db'; // Data Source Name (DSN) untuk koneksi ke database
    private $username = 'root'; // Nama pengguna untuk koneksi
    private $password = ''; // Kata sandi untuk koneksi
    private $db; // Variabel untuk menyimpan objek koneksi PDO

    // Konstruktor untuk menginisialisasi koneksi ke database
    public function __construct() {
        try {
            // Mencoba untuk membuat koneksi menggunakan PDO dengan parameter yang telah diset
            $this->db = new PDO($this->dsn, $this->username, $this->password);
            // Set atribut untuk menampilkan error dengan jelas jika terjadi masalah
            $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            // Jika terjadi error, tampilkan pesan error dan hentikan eksekusi program
            echo 'Connection failed: ' . $e->getMessage();
            exit;
        }
    }

    // Fungsi untuk mengembalikan objek koneksi ke database
    public function getConnection() {
        return $this->db;
    }
}
?>
