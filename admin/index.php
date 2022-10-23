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
                    <a href="index.php" class="active"><span class="las la-igloo"></span>
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

                Dashboard
            </h2>

            <div class="user-wrapper">
                <img src="images/pic-2.png" width="40px" height="40px" alt="">
                <div>
                    <h4><?php echo $_SESSION["admin"]['name_admin'] ?></h4>
                    <small>Super Admin</small>
                </div>
            </div>
        </header>
        <main>
            <div class="cards">
                <?php
                $no = 0;
                $customer = mysqli_query($conn, "SELECT * FROM tb_customer WHERE id_customer");
                if (mysqli_num_rows($customer) > 0) {
                    while ($c = mysqli_fetch_array($customer)) {
                    $no++ ?>
                    <?php }} else { 
                    echo "tidak ada data";
                    } ?>
                <div class="card-single">
                    <div>
                        <h1><?php echo $no ?></h1>
                        <span>Customer</span>
                    </div>
                    <div>
                        <span class="las la-users"></span>
                    </div>
                </div>

                <?php
                $no = 0;
                $barang = mysqli_query($conn, "SELECT * FROM tb_barang WHERE id_barang");
                if (mysqli_num_rows($barang) > 0) {
                    while ($b = mysqli_fetch_array($barang)) {
                    $no++ ?>
                    <?php }} else { 
                    echo "tidak ada data";
                    } ?>
                <div class="card-single">
                    <div>
                        <h1><?php echo $no ?></h1>
                        <span>List Barang</span>
                    </div>
                    <div>
                        <span class="las la-clipboard"></span>
                    </div>
                </div>
                
                <?php
                $no = 0;
                $order = mysqli_query($conn, "SELECT * FROM tb_pesanan WHERE id_pesanan");
                if (mysqli_num_rows($order) > 0) {
                    while ($o = mysqli_fetch_array($order)) {
                    $no++ ?>
                    <?php }} else { 
                    echo "tidak ada data";
                    } ?>
                <div class="card-single">
                    <div>
                        <h1><?php echo $no ?></h1>
                        <span>Order</span>
                    </div>
                    <div>
                        <span class="las la-shopping-bag"></span>
                    </div>
                </div>

                <?php
                $total = 0;
                $pesanan = mysqli_query($conn, "SELECT * FROM tb_pesanan WHERE id_pesanan");
                if (mysqli_num_rows($pesanan) > 0) {
                    while ($p = mysqli_fetch_array($pesanan)) {
                    $no = $p['total_belanja'];
                    $total+=$no ?>
                    <?php }} else { 
                    echo "tidak ada data";
                    } ?>
                <div class="card-single">
                    <div>
                        <h1>Rp.<?php $subtotal = 0;
                                $subtotal = substr($total,0,4);
                                echo number_format($subtotal); ?>K</h1>
                        <span>Income</span>
                    </div>
                    <div>
                        <span class="lab la-google-wallet"></span>
                    </div>
                </div>
            </div>

            <div class="recent-grid">
                <div class="projects">
                    <div class="card">
                        <div class="card-header">
                            <h3>List Barang</h3>

                            <button>See all <span class="las la-arrow-right"></span></button>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table width="100%">
                                    <thead>
                                        <tr>
                                            <td>Nama Barang</td>
                                            <td>Harga Barang</td>
                                            <td>Status Barang</td>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                    $barang = mysqli_query($conn, "SELECT * FROM tb_barang WHERE id_barang ORDER BY id_barang DESC LIMIT 8");
                                    if (mysqli_num_rows($barang)) {
                                        while ($b = mysqli_fetch_array($barang)) {
                                    ?>
                                        <tr>
                                            <td><?php echo $b['nama_barang']?></td>
                                            <td><?php echo number_format($b['harga_barang'])?></td>
                                            <td>
                                                <span class="status color<?php echo $b['status_barang']?>"></span>
                                                <?php 
                                                $status_barang = $b['status_barang'];
                                                if ($status_barang > 0) {
                                                    echo "Available";
                                                } else {
                                                    echo "Not Available";
                                                }
                                                ?>
                                            </td>
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

                <div class="customers">
                    <div class="card">
                        <div class="card-header">
                            <h3>New Customer</h3>

                            <button>See all <span class="las la-arrow-right"></span></button>
                        </div>
                            <?php
                            $customer = mysqli_query($conn, "SELECT * FROM tb_customer WHERE id_customer ORDER BY id_customer DESC LIMIT 6");
                            if (mysqli_num_rows($customer)) {
                                while ($c = mysqli_fetch_array($customer)) {
                            ?>
                            <div class="customer">
                                <div class="info">
                                    <img src="images/pic-2.png" width="40px" height="40px" alt="">
                                    <div>
                                        <h4><?php echo $c['name_customer']?></h4>
                                        <small><?php echo $c['id_customer']?></small>
                                    </div>
                                </div>
                                <div class="contact">
                                    <span class="las la-user-circle"></span>
                                    <span class="las la-comment"></span>
                                    <span class="las la-phone"></span>
                                </div>
                            </div>
                            <?php }} else { ?>
                                <p>Tidak Punya Customer</p>
                            <?php }?>

                        </div>
                    </div>
                </div>
            
            </div>
        
        </main>
    </div>

</body>
</html>