<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
<section class="contact" id="contact">
    <h1 class="heading"> <span>My</span> Login</h1>
    <div class="row">
        <form action="" method="POST">
            <input type="text" name="user" placeholder="Username" class="box" value="" required>
            <input type="password" name="pass" placeholder="Password" class="box" value="" required>
            <?php
            session_start();
                if(!isset($_SESSION['status_login_customer'])){
                    echo '<input type="submit" name="submit" value="Login" class="btn" onclick="return confirm("Ingin Masuk?")">';
                    echo ' ';
                    echo '<a href="daftar_customer.php" class="btn">Daftar</a>';
                } else { 
                    echo '<script>window.location="index_login.php"</script>';
                }   
            ?> 
        </form>
        <?php
            if (isset($_POST['submit'])) {
                include 'koneksi.php';

                $user = mysqli_real_escape_string($conn, $_POST['user']);
                $pass = mysqli_real_escape_string($conn, $_POST['pass']);

                $cek = mysqli_query($conn, "SELECT * FROM tb_customer WHERE username_customer = '".$user."' AND password_customer = '".MD5($pass)."'");
                if (mysqli_num_rows($cek) > 0) {
                    $c = $cek->FETCH_ASSOC();
                    $_SESSION ["customer"] = $c;
                    $_SESSION ['status_login_customer'] = true;
                    echo '<script>window.location="index_login.php#products"</script>';
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