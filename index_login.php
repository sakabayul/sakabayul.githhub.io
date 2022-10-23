<?php 
session_start();
include 'koneksi.php';
include 'fungsi.php';
if ($_SESSION['status_login_customer'] != true) {
    echo'<script>window.location="login_customer.php"</script>';
}

$costume = mysqli_query($conn, "SELECT * FROM tb_costume WHERE id_costume");
$cos = mysqli_fetch_object($costume);

$query = mysqli_query($conn, "SELECT * FROM tb_customer WHERE id_customer = '".$_SESSION['customer']['id_customer']."' ");
$c = mysqli_fetch_object($query);
?>
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
<?=template_header_login()?>
<!-- header section ends -->

<!-- home section starts  -->
<section class="home" id="home">
    <div class="content">
        <h3><?php echo $cos->judul_home ?></h3>
        <span> <?php echo $cos->subjudul_home?></span>
        <p><?php echo $cos->desk_home ?></p>
        <a href="#products" class="btn">Shop Now</a>
    </div>
</section>
<!-- home section ends -->

<!-- about section starts  -->
<section class="about" id="about">
    <h1 class="heading"> <span> about </span> us </h1>
    <div class="row">
        <div class="video-container">
            <video src="images/about-vid.mp4" loop autoplay muted></video>
            <h3><?php echo $cos->judul_about ?></h3>
        </div>

        <div class="content">
            <h3><?php echo $cos->subjudul_about ?></h3>
            <p><?php echo $cos->desk_about ?></p>
            <a href="#" class="btn">learn more</a>
        </div>
    </div>
</section>
<!-- about section ends -->

<!-- icons section starts  -->
<section class="icons-container">
    <div class="icons">
        <img src="images/icon-1.png" alt="">
        <div class="info">
            <h3>free delivery</h3>
            <span>on all orders</span>
        </div>
    </div>

    <div class="icons">
        <img src="images/icon-2.png" alt="">
        <div class="info">
            <h3>10 days returns</h3>
            <span>moneyback guarantee</span>
        </div>
    </div>

    <div class="icons">
        <img src="images/icon-3.png" alt="">
        <div class="info">
            <h3>offer & gifts</h3>
            <span>on all orders</span>
        </div>
    </div>

    <div class="icons">
        <img src="images/icon-4.png" alt="">
        <div class="info">
            <h3>secure paymens</h3>
            <span>protected by paypal</span>
        </div>
    </div>
</section>
<!-- icons section ends -->

<!-- prodcuts section starts  -->
<section class="products" id="products">
    <h1 class="heading"> latest <span>products</span> </h1>
    <div class="box-container">
        
        <?php
            $barang = mysqli_query($conn, "SELECT * FROM tb_barang WHERE status_barang = 1 ORDER BY id_barang DESC LIMIT 8");
            if (mysqli_num_rows($barang) > 0) {
                while ($b = mysqli_fetch_array($barang)) {
            ?>
        <div class="box">
            <span class="discount">-<?php echo substr($b['discount'], 0, 30)?>%</span>
            <div class="image">
                <img src="admin/pic/<?php echo $b['foto_barang']?>" alt="">
                <div class="icons">
                    <a href="favorite.php?id=<?php echo $b['id_barang']; ?>" class="fas fa-heart"></a>
                    <a href="order.php?id=<?php echo $b['id_barang']; ?>" class="cart-btn">Order Now</a>
                    <a href="#" class="fas fa-share"></a>
                </div>
            </div>
            <div class="content">
                <h3><?php echo substr($b['nama_barang'], 0, 30)?></h3>
                <div class="price">Rp. <?php    $harga = $b['harga_barang'];
                                                $discount = $b['discount'];
                                                $total_discount = $discount/100;
                                                $hasil_discount = $total_discount*$harga;
                                                $total_harga = $harga - $hasil_discount; 
                                                echo number_format($total_harga) ?> <br>
                <span>Rp. <?php echo number_format($b['harga_barang'])?></span> </div>
            </div>
        </div>
            <?php }} else { ?>
                    <p>Barang Kosong</p>
            <?php }?>
    </div>
</section>
<!-- prodcuts section ends -->

<!-- review section starts  -->
<section class="review" id="review">
<h1 class="heading"> customer's <span>review</span> </h1>
<div class="box-container">
    <div class="box">
        <div class="stars">
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
        </div>
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Corrupti asperiores laboriosam praesentium enim maiores? Ad repellat voluptates alias facere repudiandae dolor accusamus enim ut odit, aliquam nesciunt eaque nulla dignissimos.</p>
        <div class="user">
            <img src="images/pic-1.png" alt="">
            <div class="user-info">
                <h3>john deo</h3>
                <span>happy customer</span>
            </div>
        </div>
        <span class="fas fa-quote-right"></span>
    </div>

    <div class="box">
        <div class="stars">
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
        </div>
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Corrupti asperiores laboriosam praesentium enim maiores? Ad repellat voluptates alias facere repudiandae dolor accusamus enim ut odit, aliquam nesciunt eaque nulla dignissimos.</p>
        <div class="user">
            <img src="images/pic-2.png" alt="">
            <div class="user-info">
                <h3>john deo</h3>
                <span>happy customer</span>
            </div>
        </div>
        <span class="fas fa-quote-right"></span>
    </div>

    <div class="box">
        <div class="stars">
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
        </div>
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Corrupti asperiores laboriosam praesentium enim maiores? Ad repellat voluptates alias facere repudiandae dolor accusamus enim ut odit, aliquam nesciunt eaque nulla dignissimos.</p>
        <div class="user">
            <img src="images/pic-3.png" alt="">
            <div class="user-info">
                <h3>john deo</h3>
                <span>happy customer</span>
            </div>
        </div>
        <span class="fas fa-quote-right"></span>
    </div>

    <div class="box">
        <div class="stars">
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
        </div>
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Corrupti asperiores laboriosam praesentium enim maiores? Ad repellat voluptates alias facere repudiandae dolor accusamus enim ut odit, aliquam nesciunt eaque nulla dignissimos.</p>
        <div class="user">
            <img src="images/pic-3.png" alt="">
            <div class="user-info">
                <h3>john deo</h3>
                <span>happy customer</span>
            </div>
        </div>
        <span class="fas fa-quote-right"></span>
    </div>

    <div class="box">
        <div class="stars">
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
        </div>
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Corrupti asperiores laboriosam praesentium enim maiores? Ad repellat voluptates alias facere repudiandae dolor accusamus enim ut odit, aliquam nesciunt eaque nulla dignissimos.</p>
        <div class="user">
            <img src="images/pic-3.png" alt="">
            <div class="user-info">
                <h3>john deo</h3>
                <span>happy customer</span>
            </div>
        </div>
        <span class="fas fa-quote-right"></span>
    </div>
</div>
</section>
<!-- review section ends -->

<!-- contact section starts  -->
<section class="contact" id="contact">
    <h1 class="heading"> <span> contact </span> us </h1>
    <div class="row">
        <form action="" method="POST">
            <input type="text" readonly name="nama" placeholder="name" class="box" value="<?php echo $c->name_customer ?>" required>
            <input type="email" readonly name="email" placeholder="email" class="box" value="<?php echo $c->email_customer ?>" required>
            <input type="number" readonly name="number" placeholder="number" class="box" value="<?php echo $c->number_customer ?>" required>
            <textarea name="message" class="box" placeholder="message" id="" cols="30" rows="10"></textarea>
            <input type="submit" name="submit" value="send message" class="btn">
        </form>
        <?php
                if (isset($_POST['submit'])) {
                    $nm_customer = ucwords($_POST['nama']);
                    $em_customer = ucwords($_POST['email']);
                    $num_customer = ucwords($_POST['number']);
                    $mes_customer = $_POST['message'];

                    $insert = mysqli_query($conn, "INSERT INTO tb_pesan_customer VALUES (NULL,  '".$nm_customer."',
                                                                                                '".$em_customer."',
                                                                                                '".$num_customer."',
                                                                                                '".$mes_customer."'
                                                                                                )");

                    if ($insert) {
                        echo '<script>alert("Berhasil menambahkan data")</script>';
                        echo '<script>window.location="index_login.php"</script>';
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
<!-- contact section ends -->

<?=template_footer()?>

</body>
</html>