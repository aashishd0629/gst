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
    <link rel="stylesheet" href="css/aboutus.css">
    <link rel="stylesheet" href="css/areas.css">
    <link rel="stylesheet" href="css/footer.css">
    <link rel="stylesheet" href="css/responsive.css">
    <link rel="stylesheet" href="admin/customcss/ordercss.css">


</head>

<body>

    <!-- header section starts  -->

    <header class="header">

        <a href="#" class="logo"> <i class="fas fa-shopping-basket"></i>
            <font face="Preeti">नमुना खेती</font>
        </a>

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
                <a href="logout.php">
                    <div class="fas fa-sign-out-alt"></div>
                </a>
            <?php } ?>


        </div>


    </header>

    <!-- header section ends -->
    <div class="section">
        <div class="container">
            <div class="content-section">
                <div class="title">
                    <h1 class="heading"> About<span>Organization</span> </h1>
                </div>
                <div class="content">
                    <h3>Namuna Sahakari Kheti</h3>
                    <p>NASK-Namuna Sahakari Kheti was established in 2070 B.S. It is the
                        model community farm of Nepal as well as it is listed in the 100 destination for tourism by Governmnet of
                        Nepal. It is located in the easter Nepal. It is inside the Gauradaha Municipality of Jhapa District.</p>

                </div>

            </div>
            <div class="image-section">
                <img src="image/farm.png">
            </div>
        </div>

    </div>

    <section class="categories" id="categories">

        <h1 class="heading"> Our <span>Vision-Mission-Goals</span> </h1>

        <div class="box-container">

            <div class="box">
               
                <h3>Vision</h3>
                <ol>
                    <li>a</li>
                    <li>a</li>
                    <li>a</li>
                    <li>a</li>
                    <li>a</li>
                </ol>
                
            </div>

            <div class="box">
                
                <h3>Mission</h3>
                <ol>
                    <li>a</li>
                    <li>a</li>
                    <li>a</li>
                    <li>a</li>
                    <li>a</li>
                </ol>
                
            </div>

            <div class="box">
                
                <h3>goals</h3>
                <ol>
                    <li>a</li>
                    <li>a</li>
                    <li>a</li>
                    <li>a</li>
                    <li>a</li>
                </ol>
                
            </div>



        </div>

    </section>

    <!-- ================ Order Details List ================= -->
    <div class="details">
        <h1 class="heading"> Our <span>Board Members</span> </h1>
        <div class="recentOrders">


            <table>
                <thead>
                    <tr>
                        <td>Full Name</td>
                        <td>Designation</td>
                        <td>Address</td>
                        <td>Mobile NO</td>
                        <td>Image</td>

                    </tr>
                </thead>

                <tbody>
                    <?php
                    include 'dbconn.php';
                    $query = mysqli_query($conn, "SELECT * FROM bmdb");
                    while ($row = mysqli_fetch_assoc($query)) {
                    ?>
                        <tr>
                            <td><?php echo $row['name']; ?></td>
                            <td><?php echo $row['dsg']; ?></td>
                            <td><?php echo $row['address']; ?></td>
                            <td><?php echo $row['mobileno']; ?></td>
                            <td><img src="admin/images/<?php echo $row['image']; ?>"></td>

                        </tr>
                    <?php } ?>

                </tbody>
            </table>
        </div>

        <!-- products section ends -->

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