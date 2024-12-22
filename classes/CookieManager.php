<?php
// classes/CookieManager.php
class CookieManager
{
    // Menetapkan cookie
    public function setCookie($name, $value, $expiration = 86400 * 30) // Default 30 hari
    {
        // Set cookie menggunakan fungsi PHP setcookie
        setcookie($name, $value, time() + $expiration, "/");
    }

    // Mendapatkan nilai cookie
    public function getCookie($name)
    {
        return isset($_COOKIE[$name]) ? $_COOKIE[$name] : null;
    }

    // Menghapus cookie
    public function deleteCookie($name)
    {
        // Menghapus cookie dengan menetapkan waktu kedaluwarsa yang sudah lewat
        setcookie($name, "", time() - 3600, "/");
    }
}
?>
