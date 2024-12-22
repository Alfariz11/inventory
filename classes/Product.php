<?php
// classes/Product.php
class Product {
    private $db;

    // Konstruktor untuk menginisialisasi koneksi ke database
    public function __construct($db) {
        $this->db = $db;
    }

    // Fungsi untuk mendapatkan semua produk dari database
    public function getAllProducts() {
        $stmt = $this->db->prepare("SELECT * FROM products");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Fungsi untuk menambahkan produk baru ke dalam database
    public function addProduct($name, $description, $price, $browser, $ipAddress) {
        $stmt = $this->db->prepare("INSERT INTO products (name, description, price, browser, ip_address) VALUES (?, ?, ?, ?, ?)");
        return $stmt->execute([$name, $description, $price, $browser, $ipAddress]);
    }

    // Fungsi untuk memperbarui data produk berdasarkan ID produk
    public function updateProduct($id, $name, $description, $price) {
        $stmt = $this->db->prepare("UPDATE products SET name = ?, description = ?, price = ? WHERE id = ?");
        return $stmt->execute([$name, $description, $price, $id]);
    }

    // Fungsi untuk menghapus produk dari database berdasarkan ID
    public function deleteProduct($id) {
        $stmt = $this->db->prepare("DELETE FROM products WHERE id = ?");
        return $stmt->execute([$id]);
    }

    // Fungsi untuk mendapatkan produk berdasarkan ID
    public function getProductById($id) {
        $stmt = $this->db->prepare("SELECT * FROM products WHERE id = ?");
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}

?>
