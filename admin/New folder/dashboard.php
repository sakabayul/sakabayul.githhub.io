<?php
session_start();
include 'koneksi.php';
include 'fungsi_admin.php';
if ($_SESSION['status_login'] != true) {
    echo'<script>window.location="login_admin.php"</script>';
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="css/style-admin.css">
    <link href="https://fonts.googleapis.com/css2?family=Barlow+Semi+Condensed&display=swap" rel="stylesheet">
    <title>Admin Clothes</title>
</head>
<body>
    
<!-- header section starts  -->
<?=template_header_login()?>
<!-- header section ends -->

    <div class="section">
        <div class="container">
            <h2>Dashboard</h2>
            <div class="box">
                <h4 class="h4">Order dari Customer</h4>
                
                <table border="2" cellspacing="0" class="table">
                    <thead>
                        <tr>
                            <th width="50px" >No</th>
                            <th>Nama Barang</th>
                            <th width="50px">Jumlah Barang</th>
                            <th>Total Harga</th>
                            <th>Nama Customer</th>
                            <th>Alamat Customer</th>
                            <th width="100px">Nomer Telpon Customer</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                        $no = 1;
                        $pesanan = mysqli_query($conn, "SELECT * FROM tb_pesanan ORDER BY id_pesanan DESC");
                        if (mysqli_num_rows($pesanan) > 0) {
                            while ($row = mysqli_fetch_array($pesanan)) { ?>
                            <tr>
                                <td><?php echo $no++ ?></td>
                                <td><?php echo $row['nama_barang']?></td>
                                <td><?php echo $row['jumlah_barang']?></td>
                                <td><?php echo $row['harga_barang']?></td>
                                <td><?php echo $row['nama_customer']?></td>
                                <td><?php echo $row['alamat_customer']?></td>
                                <td><?php echo $row['hp_customer']?></td>
                            </tr>
                        <?php }} else { ?>
                            <tr colspan="3">
                                <td>Tidak ada data</td>
                            </tr>
                        <?php }?>
                    </tbody>
                </table>
            </div>

            <div class="box">
                <h4 class="h4">Pesan Dari Customer</h4>
                
                <table border="2" cellspacing="0" class="table">
                    <thead>
                        <tr>
                            <th width="50px" >No</th>
                            <th>Nama Customer</th>
                            <th width="50px">Email Customer</th>
                            <th>Number Customer</th>
                            <th>Message Customer</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                        $no = 1;
                        $pesanan = mysqli_query($conn, "SELECT * FROM tb_pesan_customer ORDER BY id_pesan DESC");
                        if (mysqli_num_rows($pesanan) > 0) {
                            while ($row = mysqli_fetch_array($pesanan)) { ?>
                            <tr>
                                <td><?php echo $no++ ?></td>
                                <td><?php echo $row['name_customer']?></td>
                                <td><?php echo $row['email_customer']?></td>
                                <td><?php echo $row['number_customer']?></td>
                                <td><?php echo $row['message_customer']?></td>
                            </tr>
                        <?php }} else { ?>
                            <tr colspan="3">
                                <td>Tidak ada data</td>
                            </tr>
                        <?php }?>
                    </tbody>
                </table>
            </div>

        </div>
    </div>

    <?=template_footer()?>
</body>
</html>