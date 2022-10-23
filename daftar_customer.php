<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar</title>
    <link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
<section class="contact" id="contact">
    <h1 class="heading"> <span>Daftar</span> Akun</h1>
    <div class="row">
        <form action="" method="POST">
            <input type="text" name="nama" placeholder="Nama" class="box" value="" required>
            <input type="text" name="user" placeholder="Username" class="box" value="" required>
            <input type="password" name="pass" placeholder="Password" class="box" value="" required>
            <input type="email" name="email" placeholder="Email" class="box" value="" required>
            <input type="number" name="nohp" placeholder="No HP" class="box" value="" required>
            <input type="submit" name="submit" value="Daftar" class="btn">
            <a href="login_customer.php" class="btn">Kembali</a>
        </form>
        <?php
            include 'koneksi.php';
                if (isset($_POST['submit'])) {
                    $nm_customer = ucwords($_POST['nama']);
                    $user_customer = $_POST['user'];
                    $pass_customer = $_POST['pass'];
                    $em_customer = $_POST['email'];
                    $num_customer = $_POST['nohp'];

                    $insert = mysqli_query($conn, "INSERT INTO tb_customer VALUES (NULL,    '".$nm_customer."',
                                                                                            '".$user_customer."',
                                                                                            '".MD5($pass_customer)."',
                                                                                            '".$em_customer."',
                                                                                            '".$num_customer."'
                                                                                            )");

                    if ($insert) {
                        echo '<script>alert("Berhasil menambahkan data!")</script>';
                        echo '<script>window.location="login_customer.php"</script>';
                    } else {
                        echo '<script>alert("Gagal menambahkan data")</script>'.mysqli_error($conn);
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