<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Admin</title>
    <link rel="stylesheet" type="text/css" href="css/style-admin.css">
    <link href="https://fonts.googleapis.com/css2?family=Barlow+Semi+Condensed&display=swap" rel="stylesheet">
</head>
<body id="bg-login">
    <div class="box-login">
        <h2>Login Admin</h2>
        <form action="" method="POST">
            <input type="text" name="user" placeholder="Username" class="input-control">
            <input type="password" name="pass" placeholder="Password" class="input-control">
            <input type="submit" name="submit" placeholder="Login" class="button" onclick="return confirm('Ingin Masuk?')">
        </form>
        <?php
            if (isset($_POST['submit'])) {
                session_start();
                include 'koneksi.php';

                $user_a = mysqli_real_escape_string($conn, $_POST['user']);
                $pass_a = mysqli_real_escape_string($conn, $_POST['pass']);

                $cek = mysqli_query($conn, "SELECT *FROM tb_admin WHERE username = '".$user_a."' AND password = '".MD5($pass_a)."'");
                if (mysqli_num_rows($cek) > 0) {
                    $a = mysqli_fetch_object($cek);
                    $_SESSION ['status_login'] = true;
                    $_SESSION ['a_global'] = $a;
                    $_SESSION ['id'] = $a->id_admin;
                    echo '<script>window.location="dashboard.php"</script>';
                } else {
                    echo '<script>alert("Username atau password salah!")</script>';
                }
            }
        ?>
    </div>
</body>
</html>