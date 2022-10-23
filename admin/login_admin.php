<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" type="text/css" href="../css/style.css">
</head>
<body>
<section class="contact" id="contact">
    <h1 class="heading"> <span class="span1">Admin</span> Login</h1>
    <div class="row">
        <form action="" method="POST">
            <input type="text" name="user" placeholder="Username" class="box" value="" required>
            <input type="password" name="pass" placeholder="Password" class="box" value="" required>
            <?php
            session_start();
                if(!isset($_SESSION['status_login_admin'])){
                    echo '<input type="submit" name="submit" value="Login" class="btn" onclick="return confirm("Ingin Masuk?")">';
                    echo ' ';
                    echo '<a href="daftar_admin.php" class="btn">Daftar</a>';
                } else { 
                    echo '<script>window.location="index.php"</script>';
                }   
            ?> 
        </form>
        <?php
            if (isset($_POST['submit'])) {
                include 'koneksi.php';

                $user = mysqli_real_escape_string($conn, $_POST['user']);
                $pass = mysqli_real_escape_string($conn, $_POST['pass']);

                $cek = mysqli_query($conn, "SELECT * FROM tb_admin WHERE username = '".$user."' AND password = '".MD5($pass)."'");
                if (mysqli_num_rows($cek) > 0) {
                    $a = $cek->FETCH_ASSOC();
                    $_SESSION ["admin"] = $a;
                    $_SESSION ['status_login_admin'] = true;
                    echo '<script>window.location="index.php#products"</script>';
                } else {
                    echo '<script>alert("Username atau password salah!")</script>';
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