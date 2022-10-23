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
                    <a href="akun_admin.php"><span class="las la-user-circle"></span>
                    <span>Accounts</span></a>
                </li>
                <li>
                    <a href="task_admin.php" class="active"><span class="las la-clipboard-list"></span>
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
                Tasks
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
        <div class="srecent-grid">
                <div class="projects">
                    <div class="card">
                        <div class="card-header">
                            <h3>List Pesan</h3>
                            <button>Tambah <span class="las la-arrow-right"></span></button>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table width="100%">
                                    <thead>
                                        <tr>
                                            <td>Nama</td>
                                            <td>Email</td>
                                            <td>No HP</td>
                                            <td>Pesan</td>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                    $pesan = mysqli_query($conn, "SELECT * FROM tb_pesan_customer WHERE id_pesan ORDER BY id_pesan DESC LIMIT 10");
                                    if (mysqli_num_rows($pesan)) {
                                        while ($p = mysqli_fetch_array($pesan)) {
                                    ?>
                                        <tr>
                                            <td><?php echo $p['name_customer']?></td>
                                            <td><?php echo $p['email_customer']?></td>
                                            <td><?php echo $p['number_customer']?></td>
                                            <td><?php echo $p['message_customer']?></td>
                                        </tr>
                                    </tbody>
                                <?php }} else { ?>
                                    <p>Tidak Punya List Barang</p>
                                <?php }?>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>

</body>
</html>