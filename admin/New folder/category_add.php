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
            <h2>Add New Category</h2>
            <div class="box">
                <form action="" method="POST">
                    <input type="text" name="nama" placeholder="Nama Kategori" class="input-control" required>
                    <input type="submit" name="submit" value="Add" class="button">
                </form>
                <?php
                if (isset($_POST['submit'])) {
                    $nm_category = ucwords($_POST['nama']);

                    $insert = mysqli_query($conn, "INSERT INTO tb_kategori VALUES (NULL, '".$nm_category."')");

                    if ($insert) {
                        echo '<script>alert("Berhasil menambahkan data")</script>';
                        echo '<script>window.location="category.php"</script>';
                    } else {
                        echo 'Gagal menambahkan data'.mysqli_error($conn);
                    }
                }
                ?>
        </div>
    </div>

    <?=template_footer()?>

</body>
</html>