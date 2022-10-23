<?php
session_start();
$id_barang=$_GET["id"];
unset($_SESSION["favorite"][$id_barang]);

if ($_SESSION['status_login_customer'] != true) {
    echo'<script>window.location="login_customer.php"</script>';
}

echo "<script>alert('Barang Dihapus Dari Keranjang Favorite');</script>";
echo '<script>window.location="keranjang_favorite.php"</script>';
?>