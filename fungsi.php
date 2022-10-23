<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Clothes Shop</title>

    <!-- font awesome cdn link  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">

    <!-- custom css file link  -->
    <link rel="stylesheet" href="css/style.css">

</head>
<body>
<?php function template_header() {
echo <<<EOT
    <!-- header section starts  -->
    <header>
        <input type="checkbox" name="" id="toggler">
        <label for="toggler" class="fas fa-bars"></label>

        <a href="#" class="logo">Clothes <span>Shop</span></a>

        <div class="icons">
            <a href="login_customer.php" class="fas fa-user"><span>Login</span></a>
        </div>
    </header>
EOT;
} 
?>

<?php function template_header_login() {
echo <<<EOT
    <!-- header section starts  -->
    <header>
        <input type="checkbox" name="" id="toggler">
        <label for="toggler" class="fas fa-bars"></label>

        <a href="index_login.php" class="logo">Clothes <span>Shop</span></a>

        <nav class="navbar">
            <a href="index_login.php#home">Home</a>
            <a href="index_login.php#about">About</a>
            <a href="index_login.php#products">Products</a>
            <a href="index_login.php#review">Review</a>
            <a href="index_login.php#contact">Contact</a>
        </nav>

        <div class="icons">
            <a href="keranjang_favorite.php" class="fas fa-heart"></a>
            <a href="keranjang_order.php" class="fas fa-shopping-cart"></a>
            <a href="akun_customer.php" class="fas fa-user"><span>My Account</span></a>
        </div>
    </header>
EOT;
} 
?>

<!-- Content Here  -->

<?php function template_footer() {
echo <<<EOT
    <!-- footer section starts  -->
    <section class="footer">

        <div class="box-container">

            <div class="box">
                <h3>quick links</h3>
                <a href="index_login.php#home">home</a>
                <a href="index_login.php#about">about</a>
                <a href="index_login.php#products">products</a>
                <a href="index_login.php#review">review</a>
                <a href="index_login.php#contact">contact</a>
            </div>

            <div class="box">
                <h3>extra links</h3>
                <a href="akun_customer.php">my account</a>
                <a href="keranjang_order.php">my order</a>
                <a href="keranjang_favorite.php">my favorite</a>
            </div>

            <div class="box">
                <h3>locations</h3>
                <a href="#">Indonesia</a>
            </div>

            <div class="box">
                <h3>contact info</h3>
                <a href="#">+62 811 123 12</a>
                <a href="#">support@gmail.com</a>
                <img src="images/payment.png" alt="">
            </div>

        </div>

        <div class="credit"> created by <span> saka bayu l </span> | all rights reserved </div>

    </section>
    <!-- footer section ends -->
EOT;
}
?>
</body>
</html>