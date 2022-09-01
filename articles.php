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
    <link rel="stylesheet" href="css/navbar.css">
    <link rel="stylesheet" href="css/blogs.css">
    <link rel="stylesheet" href="css/footer.css">
    <link rel="stylesheet" href="css/responsive.css">


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
<!-- Articles start here -->
<section class="blogs" id="blogs">

    <h1 class="heading"> our <span>articles</span> </h1>

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

<footer>
    <?php 
    include 'footer.php';
    ?>
</footer>

<!-- footer section ends -->















<script src="https://unpkg.com/swiper@7/swiper-bundle.min.js"></script>

<!-- custom js file link  -->
<script src="js/script.js"></script>

</body>
</html>