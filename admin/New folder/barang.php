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
<?=template_header_login()?>


    <div class="section">
        <div class="container">
            <h2 style="color: rgb(73, 67, 67);">List Menu</h2>
            <div class="box">
                <p><a href="barang_add.php" class="button">Add New Menu</a></p>
                <br>
                <table border="2" cellspacing="0" class="table">
                    <thead>
                        <tr>
                            <th width="50px">No</th>
                            <th width="80px">Kategori</th>
                            <th width="120px">Nama Barang</th>
                            <th width="100px">Harga</th>
                            <th width="70px">Discount</th>
                            <th>Deskripsi</th>
                            <th>Gambar</th>
                            <th>Status</th>
                            <th width="130px">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        $barang = mysqli_query($conn, "SELECT * FROM tb_barang LEFT JOIN tb_kategori USING (id_kategori) ORDER BY id_barang DESC");
                        if (mysqli_num_rows($barang) > 0) {
                            while ($row = mysqli_fetch_array($barang)) {
                        ?>
                        <tr>
                            <td><?php echo $no++ ?></td>
                            <td><?php echo $row['nama_kategori']?></td>
                            <td><?php echo $row['nama_barang']?></td>
                            <td>Rp. <?php echo number_format($row['harga_barang'])?></td>
                            <td><?php echo $row['discount']?></td>
                            <td><?php echo $row['deskr_barang']?></td>
                            <td><a href="pic/<?php echo $row['foto_barang']?>" target="_blank"><img src= "pic/<?php echo $row['foto_barang']?>" width="50px"></a></td>
                            <td><?php echo ($row['status_barang'] == 0)? 'Not Available':'Available'; ?></td>
                            <td class="edit-delete">
                                <a href="barang_edit.php?id=<?php echo $row['id_barang']?>">Edit</a>
                                <a href="delete.php?idm=<?php echo $row['id_barang']?>" onclick="return confirm ('Delete data?')">Delete</a>
                            </td>
                        </tr>
                        <?php }
                        }else { ?>
                        <tr>
                            <td colspan="8">Tidak ada data</td>
                        </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <?=template_footer()?>

</body>
</html>