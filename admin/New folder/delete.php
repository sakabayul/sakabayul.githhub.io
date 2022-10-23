<?php
include 'koneksi.php';

if (isset($_GET['idc'])) {
    $delete = mysqli_query($conn, "DELETE FROM tb_kategori WHERE id_kategori = '".$_GET['idc']."' ");
    echo '<script>window.location="category.php"</script>';
}

if (isset($_GET['idm'])) {
    $barang = mysqli_query($conn, "SELECT foto_barang FROM tb_barang WHERE id_barang = '".$_GET['idm']."' ");
    $m = mysqli_fetch_object($barang);

    unlink('./pic/'.$b->foto_barang);

    $delete = mysqli_query($conn, "DELETE FROM tb_barang WHERE id_barang = '".$_GET['idm']."' ");
    echo '<script>window.location="barang.php"</script>';
}
?>