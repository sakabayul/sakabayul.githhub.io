<?php
session_start();
include 'fungsi.php';
include 'koneksi.php';

if ($_SESSION['status_login_customer'] != true) {
    echo'<script>window.location="login_customer.php"</script>';
}

$query = mysqli_query($conn, "SELECT * FROM tb_customer WHERE id_customer = '".$_SESSION['customer']['id_customer']."' ");
$c = mysqli_fetch_object($query);
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
    <h1 class="heading">Keranjang <span>Checkout</span></h1>
        <hr>
        <table>
            <thead>
                <tr>
                    <th>No</th>
                    <th width="128px">Nama Barang</th>
                    <th width="140px">Harga Barang </th>
                    <th>Discount</th>
                    <th width="120px">Subharga</th>
                    <th>Deskripsi</th>
                    <th width="150px">Foto Barang</th>
                </tr>
            </thead>
            <tbody>
                <?php $no = 1; ?>
                <?php $total_belanja = 0; ?>
                <?php
                foreach ($_SESSION["order"] as $id_barang => $jumlah): ?>
                <?php
                $order = $conn->query("SELECT * FROM tb_barang WHERE id_barang='$id_barang'");
                $o = $order->FETCH_ASSOC();

                ?>
                <tr>
                    <td><?php echo $no++ ?></td>
                    <td><?php echo $o["nama_barang"]; ?></td>
                    <td>Rp. <?php echo number_format($o["harga_barang"]); ?></td>
                    <td><?php echo number_format($o["discount"]); ?>%</td>
                    <td>Rp. <?php    $harga = $o['harga_barang'];
                                                $discount = $o['discount'];
                                                $total_discount = $discount/100;
                                                $hasil_discount = $total_discount*$harga;
                                                $total_harga = $harga - $hasil_discount; 
                                                echo number_format($total_harga) ?></td>
                    <td><?php echo $o["deskr_barang"]; ?></td>
                    <td><a href="admin/pic/<?php echo $o['foto_barang']?>" target="_blank"><img src= "admin/pic/<?php echo $o['foto_barang']?>" width="130px"></a></td>
                </tr>
                <?php $total_belanja+=$total_harga ?>
                <?php endforeach ?>
            </tbody>
            <tfoot>
                <tr>
                    <th colspan="6">Total Belanja</th>
                    <th>Rp. <?php echo number_format($total_belanja) ?></th>
                </tr>
            </tfoot>
        </table>
    </div>
</section>

<section class="contact" id="contact">
    <div class="row">
        <form action="" method="POST">
            <input type="text" readonly name="nama" placeholder="Nama" class="box" value="<?php echo $_SESSION["customer"]['name_customer'] ?>" required>
            <input type="number" readonly name="number" placeholder="No HP" class="box" value="<?php echo $_SESSION["customer"]['number_customer'] ?>" required>
            <textarea name="alamat" class="box" placeholder="Alamat" id="" cols="30" rows="10" required></textarea>
            <div class="selectdiv">
                <label for="">
                    <select name="id_pembayaran">
                        <option value="">Pembayaran Lewat</option>
                        <?php
                        $query = mysqli_query($conn, "SELECT * FROM tb_pembayaran");
                        while($pembayaran = $query->FETCH_ASSOC()){
                        ?>
                        <option value="<?php echo $pembayaran ["id_pembayaran"] ?>">
                            <?php echo $pembayaran ['nama_pembayaran'] ?>
                        </option>
                        <?php } ?>
                    </select>
                </label>
            </div>
            <input type="submit" name="submit" value="Check Out" class="btn">
        </form>
        <?php
                if (isset($_POST['submit'])) {
                    $id_customer = $_SESSION["customer"]["id_customer"];
                    $id_pembayaran = $_POST["id_pembayaran"];
                    $alamat_customer = $_POST['alamat'];
                    $tanggal_pesanan = date ("y-m-d");
                    $total_belanja;

                    $insert = mysqli_query($conn, "INSERT INTO tb_pesanan VALUES (NULL, '".$id_customer."',
                                                                                        '".$id_pembayaran."',
                                                                                        '".$alamat_customer."',
                                                                                        '".$tanggal_pesanan."',
                                                                                        '".$total_belanja."'
                                                                                        )");

                    unset($_SESSION["order"]);

                    echo '<script>alert("Pembelian Berhasil!")</script>';
                    echo '<script>window.location="index_login.php#products"</script>';
                }
                ?>
    </div>
</section>

</body>
</html>