<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Namuna Kheti</title>

    <link rel="stylesheet" href="https://unpkg.com/swiper@7/swiper-bundle.min.css" />

    <!-- font awesome cdn link  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

    <!-- custom css file link  -->
    <link rel="stylesheet" href="css/style.css">

</head>
<body>
    
<!-- header section starts  -->

<header class="header">

    <a href="#" class="logo"> <i class="fas fa-shopping-basket"></i> <font face="Preeti">नमुना खेती</font> </a>

    <nav class="navbar">
        <a href="index.php">home</a>
        <a href="aboutus.php">About Us</a>
        <a href="products.php">products</a>
        <a href="areas.php">areas</a>
        <a href="events.php">events</a>
        <a href="articles.php">Articles</a>
    </nav>

    <div class="icons">
    <div class="fas fa-bars" id="menu-btn"></div>
    
    <?php
        session_start();
        if (!isset($_SESSION['userid'])) {
        ?>
        <a href="login.php">
        <div class="fas fa-user" id="login-btn"></div>
        </a>
        <?php } ?>
        <?php 
        if (isset($_SESSION['userid'])) {
        $pid = $_SESSION['userid'];

        // $_SESSION['']
        // include('dbconnect.php');
        // $query = mysqli_query($conn, "SELECT * FROM cart WHERE uid=$pid ");
        // $no = 0;
        // $no = mysqli_num_rows($query);


    ?>
       
       <a href="orders.php">
        <div class="fas fa-user" id="login-btn"></div>
        </a>
        <a href="cart.php">
        <div class="fas fa-shopping-cart" id="cart-btn"></div>
        </a>
        <a href="logout.php"><div class="fas fa-sign-out-alt"></div></a>
        <?php }?>
       
        
    </div>

    

    

</header>

<!-- header section ends -->

<!-- home section starts  -->

<section class="home" id="home">

    <div class="content">
        <h3>Best Quality <span>Seeds</span> products for farmers</h3>
        <p>Namuna seeds provieds best quality seeds for farmers of nepal.</p>
        
    </div>

</section>

<!-- home section ends -->

<!-- features section starts  -->



<!-- features section ends -->

<!-- Events start here -->
<section class="blogs" id="blogs">

    <h1 class="heading"> our <span>Events</span> </h1>

    <div class="box-container">

    <?php
 include 'dbconn.php';
  $query = mysqli_query($conn, "SELECT * FROM events");
  $key = 0;
  while ($row = mysqli_fetch_assoc($query)) {
    $key = $key+1;
    if($key<4){
  ?>
        <div class="box">
            <img src="admin/images/<?php echo $row['image'] ?>" alt=" Images">
            <div class="content">
                <div class="icons">

                    <a href="#"> <i class="fas fa-calendar"></i> <?php echo $row['date'] ?> </a>
                </div>
                <h3><?php echo $row['title']?></h3>
                
                <a href="eventfull.php?id=<?php echo $row['id']?>" class="btn">read more</a>
            </div>
        </div>
        <?php }} ?>

    </div>

</section>

<!-- blogs section starts  -->

<section class="blogs" id="blogs">

    <h1 class="heading"> our <span>Articles
    </span> </h1>

    <div class="box-container">

    <?php
 include 'dbconn.php';
  $query = mysqli_query($conn, "SELECT * FROM articles");
  $key = 0;
  while ($row = mysqli_fetch_assoc($query)) {
    $key = $key+1;
    if($key<4){
  ?>
        <div class="box">
            <img src="admin/images/<?php echo $row['a_image'] ?>" alt=" Images">
            <div class="content">
                <div class="icons">

                    <a href="#"> <i class="fas fa-calendar"></i> <?php echo $row['a_date'] ?> </a>
                </div>
                <h3><?php echo $row['a_title']?></h3>
                
                <a href="articlefull.php?id=<?php echo $row['id']?>" class="btn">read more</a>
            </div>
        </div>
        <?php }} ?>

    </div>

</section>

<!-- blogs section ends -->

<!-- footer section starts  -->

<section class="footer">

    <div class="box-container">

        <div class="box">
            <h3><font face="Preeti">नमुना खेती</font> <i class="fas fa-shopping-basket"></i> </h3>
            <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Aliquam, saepe.</p>
            <div class="share">
                <a href="#" class="fab fa-facebook-f"></a>
                <!-- <a href="#" class="fab fa-twitter"></a>
                <a href="#" class="fab fa-instagram"></a>
                <a href="#" class="fab fa-linkedin"></a> -->
            </div>
        </div>

        <div class="box">
            <h3>contact info</h3>
            <a href="#" class="links"> <i class="fas fa-phone"></i> 98******** </a>
            <a href="#" class="links"> <i class="fas fa-phone"></i> 023****** </a>
            <a href="#" class="links"> <i class="fas fa-envelope"></i> namuna@gmail.com </a>
            <a href="https://www.google.com.np/maps/place/Sana+Kishan+Biu+Prasodan+Kendra+and+Cow+Farm/@26.5754711,87.6911128,828m/data=!3m1!1e3!4m5!3m4!1s0x39e585ed28fb2943:0x25b4de4e0a53b8f3!8m2!3d26.5768302!4d87.6902785?hl=en&authuser=0" class="links"> <i class="fas fa-map-marker-alt"></i> Gauradaha-5, Jhapa Nepal</a>
        </div>

        <div class="box">
            <h3>quick links</h3>
            <a href="index.php" class="links"> <i class="fas fa-arrow-right"></i> home </a>
            <a href="aboutus.php" class="links"> <i class="fas fa-arrow-right"></i> about us </a>
            <a href="products.php" class="links"> <i class="fas fa-arrow-right"></i> products </a>
            <a href="areas.php" class="links"> <i class="fas fa-arrow-right"></i> areas </a>
            <a href="articles.php" class="links"> <i class="fas fa-arrow-right"></i> articles </a>
            <a href="events.php" class="links"> <i class="fas fa-arrow-right"></i> events </a>
        </div>

        

    </div>

    <div class="credit">  <span> Copyright 2079 </span> | Namuna Sahakari Kheti </div>

</section>

<!-- footer section ends -->
















<script src="https://unpkg.com/swiper@7/swiper-bundle.min.js"></script>

<!-- custom js file link  -->
<script src="js/script.js"></script>

</body>
</html>