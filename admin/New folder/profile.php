<?php
session_start();
include 'koneksi.php';
include 'fungsi_admin.php';
if ($_SESSION['status_login'] != true) {
    echo'<script>window.location="login_admin.php"</script>';
}

$query = mysqli_query($conn, "SELECT * FROM tb_admin WHERE id_admin = '".$_SESSION['id']."' ");
$a = mysqli_fetch_object($query);
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
            <h2>Update Profile</h2>
            <div class="box">
                <form action="" method="POST">
                    <input type="text" name="nama" placeholder="Nama Lengkap" class="input-control" value="<?php echo $a->name_admin ?>" required>
                    <input type="text" name="usr" placeholder="Username" class="input-control" value="<?php echo $a->username?>" required>
                    <input type="submit" name="submit" value="Simpan" class="button">
                </form>
                <?php
                if (isset($_POST['submit'])) {
                    $nama   = ucwords($_POST['nama']);
                    $usr    = $_POST['usr'];

                    $update = mysqli_query($conn, "UPDATE tb_admin SET 
                            name_admin = '".$nama."', 
                            username = '".$usr."'
                            WHERE id_admin = '".$a->id_admin."' ");
                    if ($update) {
                        echo '<script>alert("Update profile berhasil!")</script>';
                        echo '<script>window.location="profile.php"</script>';
                    } else {
                        echo 'Gagal update profile '.mysqli_error($conn);
                    }
                }
                ?>
            </div>
            <h2>Update Password</h2>
            <div class="box">
                <form action="" method="POST">
                    <input type="password" name="pass1" placeholder="Password Baru" class="input-control" required>
                    <input type="password" name="pass2" placeholder="Konfirmasi Password Baru" class="input-control" required>
                    <input type="submit" name="up_pass" value="Confirm" class="button">
                </form>
                <?php
                if (isset($_POST['up_pass'])) {
                    $pass1 = $_POST['pass1'];
                    $pass2 = $_POST['pass2'];

                    if ($pass2 != $pass1) {
                        echo '<script>alert("Password tidak sesuai")</script>';
                    } else {
                        $up_pass = mysqli_query($conn, "UPDATE tb_admin SET
                                password = '".MD5($pass1)."'
                                WHERE id_admin = '".$n->id_admin."'");

                        if ($up_pass) {
                            echo '<script>alert("Update password berhasil!")</script>';
                            echo '<script>window.location="profile.php"</script>';
                        } else {
                            echo 'Gagal update password '.mysqli_error($conn);
                        }
                    }
                }
                ?>
            </div>
        </div>
    </div>

    <?=template_footer()?>

</body>
</html>