<?php
session_start();
include 'fungsi.php';
include 'koneksi.php';

if ($_SESSION['status_login_customer'] != true) {
    echo'<script>window.location="login_customer.php"</script>';
}

if (empty($_SESSION["favorite"]) OR !isset($_SESSION["favorite"])){
    echo "<script>alert('Keranjang Favorite Kosong!');</script>";
    echo "<script>location='index_login.php#products';</script>";
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/style-table.css">
    
</head>
<body>
<!-- header section starts  -->
<?=template_header_login()?>
<!-- header section ends -->
<section class="konten">
    <div class="read">
        <h1 class="heading">Keranjang <span>Favorite</span></h1>
        <hr>
        <table>
            <thead>
                <tr>
                    <th>No</th>
                    <th width="128px">Nama Barang</th>
                    <th width="140px">Harga Barang </th>
                    <th>Discount</th>
                    <th>Deskripsi</th>
                    <th width="150px">Foto Barang</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php $no = 1; ?>
                <?php
                foreach ($_SESSION["favorite"] as $id_barang => $jumlah): ?>
                <?php
                $favorite = $conn->query("SELECT * FROM tb_barang WHERE id_barang='$id_barang'");
                $f = $favorite->FETCH_ASSOC();
                $subharga = $f ["harga_barang"]*$jumlah;
                ?>
                <tr>
                    <td><?php echo $no++ ?></td>
                    <td><?php echo $f["nama_barang"]; ?></td>
                    <td>Rp. <?php echo number_format($f["harga_barang"]); ?></td>
                    <td><?php echo number_format($f["discount"]); ?>%</td>
                    <td><?php echo $f["deskr_barang"]; ?></td>
                    <td><a href="admin/pic/<?php echo $f['foto_barang']?>" target="_blank"><img src= "admin/pic/<?php echo $f['foto_barang']?>" width="130px"></a></td>
                    <td class="actions">
                        <a class="tambah" onclick="return confirm('Ingin Tambah Order?')" href="order.php?id=<?php echo $f['id_barang']; ?>">Order</a>
                        <a class="hapus" onclick="return confirm('Ingin Hapus Favorite?')" href="hapus_favorite.php?id=<?php echo $id_barang ?>">Hapus</a>
                    </td>
                </tr>
                <?php endforeach ?>
            </tbody>
        </table>
        <a href="index_login.php#products" class="btn-putih">Lanjutkan Belanja</a>
        <a href="keranjang_order.php" class="btn">Check Order</a>
    </div>
</section>
</body>
</html>