<?php
session_start();
include 'koneksi.php';
include 'fungsi_admin.php';
if ($_SESSION['status_login'] != true) {
    echo'<script>window.location="login_admin.php"</script>';
}

$barang = mysqli_query($conn, "SELECT * FROM tb_barang WHERE id_barang = '".$_GET['id']."' ");
if (mysqli_num_rows($barang) == 0) {
    echo '<script>window.location="barang.php"</script>';
}
$mn = mysqli_fetch_object($barang);
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
<?=template_header_login()?>
    <div class="section">
        <div class="container">
            <h2>Edit Barang</h2>
            <div class="box">
                <form action="" method="POST" enctype="multipart/form-data">
                    <select class="input-control" name="kategori" required>
                        <option value="">--Pilih Kategori--</option>
                        <?php
                        $category = mysqli_query($conn, "SELECT * FROM tb_kategori ORDER BY id_kategori DESC");
                        while ($k = mysqli_fetch_array($category)) {
                        ?>
                        <option value="<?php echo $k['id_kategori']?>" <?php echo ($k['id_kategori'] == $mn->id_kategori)? 'selected':''?>><?php echo $k['nama_kategori']?></option>
                        <?php }?>
                    </select>
                    <input type="text" name="nama" class="input-control" placeholder="Nama Barang" value="<?php echo $mn->nama_barang?>" required>
                    <input type="text" name="harga" class="input-control" placeholder="Harga Barang" value="<?php echo $mn->harga_barang?>" required>
                    <input type="text" name="discount" class="input-control" placeholder="Discount Barang" value="<?php echo $mn->discount?>" required>
                    <img src="pic/<?php echo $mn->foto_barang?>" width="100px"><br><br>
                    <input type="hidden" name="gambar" value="<?php echo $mn->foto_barang?>">
                    <input type="file" name="foto" style="margin-bottom: 15px">
                    <textarea name="deskr" class="input-control" placeholder="Deskripsi"><?php echo $mn->deskr_barang?></textarea><br>
                    <select class="input-control" name="status">
                        <option value="">--Pilih Status--</option>
                        <option value="1" <?php echo ($mn->status_barang == 1)?'selected':''; ?>>Available</option>
                        <option value="0" <?php echo ($mn->status_barang == 0)?'selected':''; ?>>Not Available</option>
                    </select>
                    <input type="submit" name="submit" value="Simpan" class="button">
                </form>
                
                <?php
                if (isset ($_POST['submit'])) {

                    $category = $_POST['kategori'];
                    $nama = $_POST['nama'];
                    $harga = $_POST['harga'];
                    $discount = $_POST['discount'];
                    $gambar = $_POST['gambar'];
                    $deskr = $_POST['deskr'];
                    $status = $_POST['status'];

                    $file_name = $_FILES['foto']['name'];
                    $tmp_name = $_FILES['foto']['tmp_name'];

                    if ($file_name != '') {
                        $type1 = explode('.', $file_name);
                        $type2 = $type1[1];

                        $new_name = 'barang'.'_'.time().'.'.$type2;

                        $type_allow = array('jpg', 'jpeg', 'png', 'gif');

                        if (!in_array($type2, $type_allow)) {
                            echo '<script>alert("Format file salah!")</script>';
                        } else {
                            unlink('./pic/'.$gambar);
                            move_uploaded_file($tmp_name, './pic/'.$new_name);

                            $nama_gambar = $new_name;
                        }

                    } else {
                        $nama_gambar = $gambar;
                    }

                    $update = mysqli_query($conn, "UPDATE tb_barang SET
                        id_kategori = '".$category."',
                        nama_barang = '".$nama."',
                        harga_barang = '".$harga."',
                        discount = '".$discount."',
                        deskr_barang = '".$deskr."',
                        foto_barang = '".$nama_gambar."',
                        status_barang = '".$status."'
                        WHERE id_barang = '".$mn->id_barang."'");

                    if ($update){
                        echo '<script>alert("Berhasil menambahkan data")</script>';
                        echo '<script>window.location="barang.php"</script>';
                    } else {
                        echo 'Gagal menambahkan data '.mysqli_error($conn);
                    }
                }
                ?>
        </div>
    </div>

    <?=template_footer()?>

    <script>CKEDITOR.replace( 'deskr' );</script>
</body>
</html>