<?php
session_start();

$id_barang = $_GET['id'];
if(isset($_SESSION['order'][$id_barang])){
    $_SESSION['order'][$id_barang] +=1;
} else {
    $_SESSION['order'][$id_barang] = 1;
}

if ($_SESSION['status_login_customer'] != true) {
    echo'<script>window.location="login_customer.php"</script>';
}

echo "<script>alert ('Produk telah masuk ke keranjang belanja!');</script>";
echo "<script>window.location = 'index_login.php#products';</script>";
?>