<?php
// views/edit_product.php
session_start();

if (!isset($_SESSION['user'])) {
    header('Location: login.php');
    exit;
}

require_once '../config/database.php';
require_once '../classes/Product.php';

// Koneksi ke database
$db = (new Database())->getConnection();
$product = new Product($db);

// Mendapatkan produk berdasarkan ID
if (isset($_GET['edit'])) {
    $productToEdit = $product->getProductById($_GET['edit']);
    if (!$productToEdit) {
        // Produk tidak ditemukan, redirect kembali ke halaman utama
        header('Location: home.php');
        exit;
    }
} else {
    // Jika tidak ada parameter edit, redirect ke halaman utama
    header('Location: home.php');
    exit;
}

// Menangani pembaruan produk
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['update_product'])) {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $description = $_POST['description'];
    $price = $_POST['price'];
    $product->updateProduct($id, $name, $description, $price);
    header('Location: home.php');
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Product</title>
    <link rel="stylesheet" href="../css/edit.css">
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar">
        <h1>Inventory Dashboard</h1>
        <div class="navbar-buttons">
            <a href="home.php" class="btn">Kembali ke Home</a>
            <a href="logout.php" class="btn logout-btn">Logout</a>
        </div>
    </nav>

    <!-- Edit Product Form -->
    <div class="main-content">
        <section id="edit-product-section">
            <h2>Edit Product</h2>
            <form method="POST" action="">
                <input 
                    type="hidden" 
                    name="id" 
                    value="<?= $productToEdit['id'] ?>"
                >
                <input 
                    type="text" 
                    name="name" 
                    value="<?= htmlspecialchars($productToEdit['name']) ?>" 
                    placeholder="Product Name" 
                    required
                >
                <textarea 
                    name="description" 
                    placeholder="Description" 
                    required><?= htmlspecialchars($productToEdit['description']) ?>
                </textarea>
                <input 
                    type="number" 
                    name="price" 
                    value="<?= htmlspecialchars($productToEdit['price']) ?>" 
                    placeholder="Price" 
                    required
                >
                <button 
                    type="submit" 
                    name="update_product">
                    Update Product
                </button>
            </form>
        </section>
    </div>

    <script src="../js/home.js"></script>
</body>
</html>
