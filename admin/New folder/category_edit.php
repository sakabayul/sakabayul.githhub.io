<?php
session_start();
include 'koneksi.php';
include 'fungsi_admin.php';
if ($_SESSION['status_login'] != true) {
    echo'<script>window.location="login_admin.php"</script>';
}

$category = mysqli_query($conn, "SELECT * FROM tb_kategori WHERE id_kategori = '".$_GET['id']."'");
if (mysqli_num_rows($category) == 0) {
    echo '<script>window.location="category.php"</script>';
}
$c = mysqli_fetch_object($category);
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
            <h2>Edit Category</h2>
            <div class="box">
                <form action="" method="POST">
                    <input type="text" name="nama" placeholder="Nama Kategori" class="input-control" value="<?php echo $c->nama_kategori?>" required>
                    <input type="submit" name="submit" value="Ganti" class="button">
                </form>
                <?php
                if (isset($_POST['submit'])) {
                    $nm_category = ucwords($_POST['nama']);

                    $update = mysqli_query($conn, "UPDATE tb_kategori SET 
                            nama_kategori = '".$nm_category."'
                            WHERE id_kategori = '".$c->id_kategori."'");

                    if ($update) {
                        echo '<script>alert("Berhasil mengubah data")</script>';
                        echo '<script>window.location="category.php"</script>';
                    } else {
                        echo 'Gagal mengubah data'.mysqli_error($conn);
                    }
                }
                ?>
        </div>
    </div>

    <?=template_footer()?>

</body>
</html>