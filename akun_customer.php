<?php 
session_start();
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
    <title>Clothes Shop</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
<section class="contact" id="contact">
    <h1 class="heading"> <span> My </span> Account </h1>
    <div class="row">
        <form action="" method="POST">
            <input type="text" name="nama" placeholder="name" class="box" value="<?php echo $c->name_customer ?>" required>
            <input type="email" name="email" placeholder="email" class="box" value="<?php echo $c->email_customer ?>" required>
            <input type="number" name="number" placeholder="number" class="box" value="<?php echo $c->number_customer ?>" required>
            <input type="submit" name="submit1" value="Save" class="btn">
            <a href="index_login.php" class="btn">Back</a>
        </form>
        <?php
            if (isset($_POST['submit1'])) {
                $nama       = ucwords($_POST['nama']);
                $email      = $_POST['email'];
                $number     = $_POST['number'];

                $update = mysqli_query($conn, "UPDATE tb_customer SET 
                        name_customer = '".$nama."', 
                        email_customer = '".$email."',
                        number_customer = '".$number."'
                        WHERE id_customer = '".$_SESSION['customer']['id_customer']."' ");
                if ($update) {
                    echo '<script>alert("Update profile berhasil!")</script>';
                    echo '<script>window.location="akun_customer.php"</script>';
                } else {
                    echo 'Gagal update profile '.mysqli_error($conn);
                }
            }
        ?>
        <form action="" method="POST">
            <input type="password" name="pass1" placeholder="Password Baru" class="box" required>
            <input type="password" name="pass2" placeholder="Konfirmasi Password Baru" class="box" required>
            <input type="submit" name="up_pass" value="Save" class="btn">
            <a href="logout_customer.php" onclick="return confirm('Ingin Keluar?')" class="btn">Logout</a>
        </form>
        <?php
            if (isset($_POST['up_pass'])) {
                $pass1 = $_POST['pass1'];
                $pass2 = $_POST['pass2'];

                if ($pass2 != $pass1) {
                    echo '<script>alert("Password tidak sesuai")</script>';
                } else {
                    $up_pass = mysqli_query($conn, "UPDATE tb_customer SET
                    password_customer = '".MD5($pass1)."'
                    WHERE id_customer = '".$c->id_customer."'");

                    if ($up_pass) {
                        echo '<script>alert("Update password berhasil!")</script>';
                        echo '<script>window.location="akun_customer.php"</script>';
                    } else {
                        echo 'Gagal update password '.mysqli_error($conn);
                    }
                }
            }
        ?>
        
        <div class="image">
            <img src="images/contact-img.svg" alt="">
        </div>
    </div>
</section>
</body>
</html>