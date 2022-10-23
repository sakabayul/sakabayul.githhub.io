<?php
session_start();
include 'koneksi.php';

if ($_SESSION['status_login_admin'] != true) {
    echo'<script>window.location="login_admin.php"</script>';
}

$query = mysqli_query($conn, "SELECT * FROM tb_admin WHERE id_admin = '".$_SESSION['admin']['id_admin']."' ");
$a = mysqli_fetch_object($query);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Clothes</title>
    <link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <input type="checkbox" name="" id="nav-toggle">
    <div class="sidebar">
        <div class="sidebar-brand">
            <h2><span class="lab la-accusoft"></span> <span>Clothes.</span></h2>
        </div>
        <div class="sidebar-menu">
            <ul>
                <li>
                    <a href="index.php"><span class="las la-igloo"></span>
                    <span>Dashboard</span></a>
                </li>
                <li>
                    <a href="customer_admin.php"><span class="las la-users"></span>
                    <span>Customer</span></a>
                </li>
                <li>
                    <a href="list_barang_admin.php"><span class="las la-clipboard-list"></span>
                    <span>List Barang</span></a>
                </li>
                <li>
                    <a href="order_admin.php"><span class="las la-shopping-bag"></span>
                    <span>Order</span></a>
                </li>
                <li>
                    <a href="inventory_admin.php"><span class="las la-receipt"></span>
                    <span>Inventory</span></a>
                </li>
                <li>
                    <a href="akun_admin.php" class="active"><span class="las la-user-circle"></span>
                    <span>Accounts</span></a>
                </li>
                <li>
                    <a href="task_admin.php"><span class="las la-clipboard-list"></span>
                    <span>Tasks</span></a>
                </li>
            </ul>
        </div>
    </div>

    <div class="main-content">
        <header>
            <h2>
                <label for="nav-toggle">
                    <span class="las la-bars"></span>
                </label>
                Accounts
            </h2>
            <div class="search-wrapper">
                <span class="las la-search"></span>
                <input type="search" placeholder="Search" />
            </div>
            <div class="user-wrapper">
                <img src="images/pic-2.png" width="40px" height="40px" alt="">
                <div>
                    <h4><?php echo $_SESSION["admin"]['name_admin'] ?></h4>
                    <small>Super Admin</small>
                </div>
            </div>
        </header>
        <main>

            <section class="contact" id="contact">
                <div class="row">
                    <form action="" method="POST">
                        <input type="password" name="pass1" placeholder="Password Baru" class="box" required>
                        <input type="password" name="pass2" placeholder="Konfirmasi Password Baru" class="box" required>
                        <input type="submit" onclick="return confirm('Ingin Simpan?')" name="up_pass" value="Save" class="btn">
                        <a href="logout_admin.php" onclick="return confirm('Ingin Keluar?')" class="btn">Logout</a>
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
                                WHERE id_admin = '".$a->id_admin."'");
                                if ($up_pass) {
                                    echo '<script>alert("Update password berhasil!")</script>';
                                    echo '<script>window.location="akun_admin.php"</script>';
                                } else {
                                    echo 'Gagal update password '.mysqli_error($conn);
                                }
                            }
                        }
                    ?>

                    <form action="" method="POST">
                        <input type="text" name="name" placeholder="name" class="box" value="<?php echo $a->name_admin ?>" required>
                        <input type="email" name="username" placeholder="email" class="box" value="<?php echo $a->username ?>" required>
                        <input type="submit" onclick="return confirm('Ingin Simpan?')" name="submit1" value="Save" class="btn">
                    </form>
                    <?php
                        if (isset($_POST['submit1'])) {
                            $nama       = ucwords($_POST['name']);
                            $username      = $_POST['username'];
                            $update = mysqli_query($conn, "UPDATE tb_admin SET 
                                    name_admin = '".$nama."', 
                                    username = '".$username."'
                                    WHERE id_admin = '".$_SESSION['admin']['id_admin']."' ");
                            if ($update) {
                                echo '<script>alert("Update profile berhasil!")</script>';
                                echo '<script>window.location="akun_admin.php"</script>';
                            } else {
                                echo 'Gagal update profile '.mysqli_error($conn);
                            }
                        }
                    ?>
                </div>
            </section>

        </main>
    </div>
</body>
</html>