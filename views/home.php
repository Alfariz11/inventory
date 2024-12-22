<?php
// views/home.php
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

// Menangani penghapusan produk
if (isset($_GET['delete'])) {
    $product->deleteProduct($_GET['delete']);
    header('Location: home.php');
    exit;
}

// Menangani penambahan produk
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['add_product'])) {
    $name = $_POST['name'];
    $description = $_POST['description'];
    $price = $_POST['price'];

    // Mendapatkan informasi browser dan IP pengguna
    $browser = $_SERVER['HTTP_USER_AGENT'] ?? 'Unknown';
    $ipAddress = $_SERVER['REMOTE_ADDR'] ?? 'Unknown';

    // Menyimpan produk ke basis data
    $product->addProduct($name, $description, $price, $browser, $ipAddress);

    header('Location: home.php');
    exit;
}

// Mendapatkan semua produk
$products = $product->getAllProducts();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="../css/dashboard.css">
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar">
        <h1>Inventory Dashboard</h1>
        <div class="navbar-buttons">
            <a href="cookie.php" class="btn">Cookie Management</a>
            <a href="logout.php" class="btn logout-btn">Logout</a>
        </div>
    </nav>

    <!-- Main Content -->
    <div class="main-content">
        <!-- Add Product Section -->
        <section id="add-product-section">
            <h2>Add New Product</h2>
            <form method="POST" action="">
                <input 
                    type="text" 
                    name="name" 
                    placeholder="Product Name" 
                    required
                >
                <textarea 
                    name="description" 
                    placeholder="Description" 
                    required
                ></textarea>
                <input 
                    type="number" 
                    name="price" 
                    placeholder="Price" 
                    required
                >
                <button 
                    type="submit" 
                    name="add_product">
                    Add Product
                </button>
            </form>
        </section>

        <!-- Product List Section -->
        <section id="product-list-section">
            <h2>Products List</h2>
            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Description</th>
                        <th>Price</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($products as $prod): ?>
                        <tr>
                            <td><?= htmlspecialchars($prod['id']) ?></td>
                            <td><?= htmlspecialchars($prod['name']) ?></td>
                            <td><?= htmlspecialchars($prod['description']) ?></td>
                            <td><?= htmlspecialchars($prod['price']) ?></td>
                            <td>
                                <a href="edit_product.php?edit=<?= $prod['id'] ?>" class="btn">Edit</a>
                                <a href="home.php?delete=<?= $prod['id'] ?>" class="btn">Delete</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </section>
    </div>
    <script src="../js/home.js"></script>
</body>
</html>
