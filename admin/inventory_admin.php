<?php
session_start();
include 'koneksi.php';

if ($_SESSION['status_login_admin'] != true) {
    echo'<script>window.location="login_admin.php"</script>';
}

$costume = mysqli_query($conn, "SELECT * FROM tb_costume WHERE id_costume");
$cos = mysqli_fetch_object($costume);

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
    <script src="https://cdn.ckeditor.com/4.19.0/standard/ckeditor.js"></script>
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
                    <a href="inventory_admin.php" class="active"><span class="las la-receipt"></span>
                    <span>Inventory</span></a>
                </li>
                <li>
                    <a href="akun_admin.php"><span class="las la-user-circle"></span>
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
                Inventory
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
            <h1 class="heading"> Edit<span> Home</span></h1>
                <div class="row">
                    <form action="" method="POST">
                        <input type="text" name="judul_home" placeholder="Judul Home" class="box" value="<?php echo $cos->judul_home ?>" required>
                        <input type="text" name="subjudul_home" placeholder="Sub Judul Home" class="box" value="<?php echo $cos->subjudul_home ?>" required>
                        <textarea name="desk_home" class="input-control" placeholder="Deskripsi" required><?php echo $cos->desk_home ?></textarea>
                        <input type="submit" name="submit" value="Save" class="btn">
                    </form>
                    <?php
                        if (isset($_POST['submit'])) {
                            $judul_home    = ucwords($_POST['judul_home']);
                            $subjudul_home = ucwords($_POST['subjudul_home']);
                            $desk_home     = $_POST['desk_home'];

                            $update = mysqli_query($conn, "UPDATE tb_costume SET 
                                    judul_home = '".$judul_home."', 
                                    subjudul_home = '".$subjudul_home."',
                                    desk_home = '".$desk_home."'
                                    WHERE id_costume");
                            if ($update) {
                                echo '<script>alert("Update Home berhasil!")</script>';
                                echo '<script>window.location="inventory_admin.php"</script>';
                            } else {
                                echo 'Gagal update profile '.mysqli_error($conn);
                            }
                        }
                    ?>
                </div>

            <h1 class="heading"> Edit<span> About</span></h1>
                <div class="row">
                    <form action="" method="POST">
                        <input type="text" name="judul_about" placeholder="Judul Home" class="box" value="<?php echo $cos->judul_about ?>" required>
                        <input type="text" name="subjudul_about" placeholder="Sub Judul Home" class="box" value="<?php echo $cos->subjudul_about ?>" required>
                        <textarea name="desk_about" class="input-control" placeholder="Deskripsi" required><?php echo $cos->desk_about ?></textarea>
                        <input type="submit" name="submit1" value="Save" class="btn">
                    </form>
                    <?php
                        if (isset($_POST['submit1'])) {
                            $judul_about    = ucwords($_POST['judul_about']);
                            $subjudul_about = ucwords($_POST['subjudul_about']);
                            $desk_about     = $_POST['desk_about'];

                            $update = mysqli_query($conn, "UPDATE tb_costume SET 
                                    judul_about = '".$judul_about."', 
                                    subjudul_about = '".$subjudul_about."',
                                    desk_about = '".$desk_about."'
                                    WHERE id_costume");
                            if ($update) {
                                echo '<script>alert("Update About berhasil!")</script>';
                                echo '<script>window.location="inventory_admin.php"</script>';
                            } else {
                                echo 'Gagal update profile '.mysqli_error($conn);
                            }
                        }
                    ?>
                </div>
            </section>

        </main>
    </div>
    <script>CKEDITOR.replace('desk_home');</script>
    <script>CKEDITOR.replace('desk_about');</script>
</body>
</html>