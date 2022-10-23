<?php
session_start();
include 'fungsi_admin.php';
include 'koneksi.php';
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
    <script src="https://cdn.ckeditor.com/4.19.0/standard/ckeditor.js"></script>
    <title>Admin Clothes</title>
</head>
<body>
    <!-- header section starts  -->
<?=template_header_login()?>
<!-- header section ends -->

    <div class="section">
        <div class="container">
            <h2>Add New Barang</h2>
            <div class="box">
                <form action="" method="POST" enctype="multipart/form-data">
                    <select class="input-control" name="kategori" required>
                        <option value="">--Pilih Kategori--</option>
                        <?php
                        $category = mysqli_query($conn, "SELECT * FROM tb_kategori ORDER BY id_kategori DESC");
                        while ($k = mysqli_fetch_array($category)) {
                        ?>
                        <option value="<?php echo $k['id_kategori']?>"><?php echo $k['nama_kategori']?></option>
                        <?php }?>
                    </select>
                    <input type="text" name="nama" class="input-control" placeholder="Nama Barang" required>
                    <input type="text" name="harga" class="input-control" placeholder="Harga Barang" required>
                    <input type="text" name="discount" class="input-control" placeholder="Discount Barang" required>
                    <p style="padding: 5px">Upload Foto (format file: .jpg, .jpeg, .png, .gif)<br>
                        <input type="file" name="foto" style="margin-bottom: 15px" required>
                    </p>
                    <textarea name="deskr" class="input-control" placeholder="Deskripsi"></textarea><br>
                    <select class="input-control" name="status">
                        <option value="">--Pilih Status--</option>
                        <option value="1">Available</option>
                        <option value="0">Not Available</option>
                    </select>
                    <input type="submit" name="submit" value="Add" class="button">
                </form>
                
                <?php
                if (isset ($_POST['submit'])) {

                    $category = $_POST['kategori'];
                    $nama = $_POST['nama'];
                    $harga = $_POST['harga'];
                    $discount = $_POST['discount'];
                    $deskr = $_POST['deskr'];
                    $status = $_POST['status'];

                    $file_name = $_FILES['foto']['name'];
                    $tmp_name = $_FILES['foto']['tmp_name'];

                    $type1 = explode('.', $file_name);
                    $type2 = $type1[1];

                    $new_name = 'barang'.'_'.time().'.'.$type2;

                    $type_allow = array('jpg', 'jpeg', 'png', 'gif');

                    if (!in_array($type2, $type_allow)) {
                        echo '<script>alert("Format file salah!")</script>';
                    } else {
                        move_uploaded_file($tmp_name, './pic/'.$new_name);

                        $insert = mysqli_query($conn, "INSERT INTO tb_barang VALUES (
                            null,
                            '".$category."',
                            '".$nama."',
                            '".$harga."',
                            '".$discount."',
                            '".$deskr."',
                            '".$new_name."',
                            '".$status."',
                            null
                        )");

                        if ($insert){
                            echo '<script>alert("Berhasil menambahkan data")</script>';
                            echo '<script>window.location="barang.php"</script>';
                        } else {
                            echo 'Gagal menambahkan data '.mysqli_error($conn);
                        }
                    }
                }
                ?>
        </div>
    </div>

    <?=template_footer()?>
    <script>CKEDITOR.replace( 'deskr' );</script>
</body>
</html>