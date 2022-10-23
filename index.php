<?php include 'fungsi.php'; ?>
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

<!-- header section starts  -->
<?=template_header()?>
<!-- header section ends -->

<!-- home section starts  -->
<section class="home" id="home">
    <div class="content">
        <h3>Clothes Shop</h3>
        <span> natural & beautiful Clothes</span>
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Beatae laborum ut minus corrupti dolorum dolore assumenda iste voluptate dolorem pariatur.</p>
        <a href="login_customer.php" onclick="return confirm('Wajib Login!')" class="btn">Shop Now</a>
    </div>
</section>
<!-- home section ends -->

</body>
</html>