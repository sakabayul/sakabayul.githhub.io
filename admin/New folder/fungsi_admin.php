<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Clothes Admin</title>

    <!-- font awesome cdn link  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">

    <!-- custom css file link  -->
    <link rel="stylesheet" href="css/style.css">

</head>
<body>
<?php function template_header() {
echo <<<EOT
<header>
<div class="container">
    <h1><a href="dashboard.php">Admin Clothes</a></h1>
    <ul>
        <li><a href="dashboard.php">Dashboard</a></li>
        <li><a href="profile.php">Profile</a></li>
        <li><a href="category.php">Kategory</a></li>
        <li><a href="barang.php">List Barang</a></li>
        <li><a href="logout_admin.php" onclick="return confirm('Ingin Keluar?')">Logout</a></li>
    </ul>
</div>
</header>
EOT;
} 
?>

<?php function template_header_login() {
echo <<<EOT
<header>
<div class="container">
    <h1><a href="dashboard.php">Admin Clothes</a></h1>
    <ul>
        <li><a href="dashboard.php">Dashboard</a></li>
        <li><a href="profile.php">Profile</a></li>
        <li><a href="category.php">Kategory</a></li>
        <li><a href="barang.php">List Barang</a></li>
        <li><a href="logout_admin.php" onclick="return confirm('Ingin Keluar?')">Logout</a></li>
    </ul>
</div>
</header>
EOT;
} 
?>

<!-- Content Here  -->

<?php function template_footer() {
echo <<<EOT
    <!-- footer section starts  -->
    <footer>
        <div class="container">
            <small>Copyright &copy; 2022 - Tugas Besar E-Commerce (Saka Bayu Laksono)</small>
        </div>
    </footer>
    <!-- footer section ends -->
EOT;
}
?>
</body>
</html>