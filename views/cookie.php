<?php
// views/cookie .php
require_once '../classes/CookieManager.php';

$cookieManager = new CookieManager();
$message = '';

// Proses jika form "Set Cookie" disubmit
if (isset($_POST['set_cookie'])) {
    $cookie_name = $_POST['cookie_name'];
    $cookie_value = $_POST['cookie_value'];
    $cookieManager->setCookie($cookie_name, $cookie_value);
    $message = "Cookie '$cookie_name' telah ditetapkan!";
}

// Proses jika form "Delete Cookie" disubmit
if (isset($_POST['delete_cookie'])) {
    $cookie_name_to_delete = $_POST['cookie_name_to_delete'];
    $cookieManager->deleteCookie($cookie_name_to_delete);
    $message = "Cookie '$cookie_name_to_delete' telah dihapus!";
}

// Mendapatkan nilai cookie jika ada
$cookie_value = null;
$cookie_name = isset($_GET['cookie_name']) ? $_GET['cookie_name'] : '';
if ($cookie_name) {
    $cookie_value = $cookieManager->getCookie($cookie_name);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cookie Management</title>
    <link rel="stylesheet" href="../css/cookie.css">
</head>
<body>
    <nav class="navbar">
        <h1>Inventory Dashboard</h1>
        <div class="navbar-buttons">
            <a href="home.php" class="btn">Kembali ke Home</a>
            <a href="logout.php" class="btn logout-btn">Logout</a>
        </div>
    </nav>
    
    <div class="container">
        <h1>Cookie Management</h1>

        <div id="cookie-sections">
            <!-- Menetapkan cookie -->
            <section id="set-cookie">
                <h2>Set Cookie</h2>
                <form method="POST" action="">
                    <input type="text" name="cookie_name" placeholder="Cookie Name" required>
                    <input type="text" name="cookie_value" placeholder="Cookie Value" required>
                    <button type="submit" name="set_cookie">Set Cookie</button>
                </form>
            </section>

            <!-- Mendapatkan cookie -->
            <section id="get-cookie">
                <h2>Get Cookie</h2>
                <form method="GET" action="">
                    <input type="text" name="cookie_name" placeholder="Enter Cookie Name" required>
                    <button type="submit">Get Cookie</button>
                </form>
                <?php if ($cookie_value !== null): ?>
                    <p>Cookie Value: <?= htmlspecialchars($cookie_value) ?></p>
                <?php else: ?>
                    <p>Cookie tidak ditemukan dengan nama: <?= htmlspecialchars($cookie_name) ?></p>
                <?php endif; ?>
            </section>

            <!-- Menghapus cookie -->
            <section id="delete-cookie">
                <h2>Delete Cookie</h2>
                <form method="POST" action="">
                    <input type="text" name="cookie_name_to_delete" placeholder="Cookie Name to Delete" required>
                    <button type="submit" name="delete_cookie">Delete Cookie</button>
                </form>
            </section>
        </div>

        <!-- Tampilkan pesan jika cookie berhasil di-set -->
        <?php if ($message): ?>
            <p class="message"><?= $message ?></p>
        <?php endif; ?>
    </div>
</body>
</html>
