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
            <h2 style="color: black;">Kategori</h2>
            <div class="box">
                <p><a href="category_add.php" class="button">Add New Kategory</a></p>
                <br>
                <table border="2" cellspacing="0" class="table">
                    <thead>
                        <tr>
                            <th width="50px" >No</th>
                            <th>Kategori</th>
                            <th width="130px">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        $category = mysqli_query($conn, "SELECT * FROM tb_kategori ORDER BY id_kategori DESC");
                        if (mysqli_num_rows($category) > 0) {
                            while ($row = mysqli_fetch_array($category)) { ?>
                            <tr>
                                <td><?php echo $no++ ?></td>
                                <td><?php echo $row['nama_kategori']?></td>
                                <td class="edit-delete">
                                    <a href="category_edit.php?id=<?php echo $row['id_kategori']?>">Edit</a>
                                    <a href="delete.php?idc=<?php echo $row['id_kategori']?>" onclick="return confirm ('Delete data?')">Delete</a>
                                </td>
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