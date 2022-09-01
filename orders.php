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
    <link rel="stylesheet" href="admin/customcss/ordercss.css">
    <link rel="stylesheet" href="css/footer.css">
    <link rel="stylesheet" href="css/responsive.css">


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
                <?php
                $count = 0;
                if (isset($_SESSION['cart'])) {
                    $count = count($_SESSION['cart']);
                }
                ?>
                <a href="cart.php">
                    <div class="fas fa-shopping-cart" id="cart-btn"><sup><?php echo $count ?></sup></div>
                </a>
                <a href="logout.php">
                    <div class="fas fa-sign-out-alt"></div>
                </a>
            <?php } ?>


        </div>



    </header>

    <!-- header section ends -->
    <!-- ================ Order Details List ================= -->
    <div class="oders">
    <div class="details">
        <div class="recentOrders">
            <div class="cardHeader">
                <h2>My Orders</h2>

            </div>

            <table>
                <thead>
                    <tr>
                        <td>User Name</td>
                        
                        <td>Product Name</td>
                        <td>Quantity</td>
                        <td>Rate</td>
                        <td>Amount</td>
                        <td>Order Date</td>
                        <td>Status</td>
                        
                        <td>Pay Stat</td>

                        <td>payment</td>
                        <td>Action</td>
                    </tr>
                </thead>

                <tbody>
                    <?php
                    include 'dbconn.php';
                    $pid = $_SESSION['userid'];
                    $query = mysqli_query($conn, "SELECT * FROM oderd where uid=$pid");
                    while ($row = mysqli_fetch_assoc($query)) {
                        $pamt = $row['pamount'];
                        $invoice_no = $row['id'] . time();
                    ?>
                        <tr>
                            <td><?php echo $row['uname']; ?></td>
                            
                            <td><?php echo $row['pname']; ?></td>
                            <td><?php echo $row['pqty']; ?></td>
                            <td><?php echo $row['prate']; ?></td>
                            <td><?php echo $row['pamount']; ?></td>
                            <td><?php echo $row['odate']; ?></td>
                            <td><?php echo $row['status']; ?></td>
                            <td><?php echo $row['payment']; ?></td>
                            <td>
                                <form action="https://uat.esewa.com.np/epay/main" method="POST">
                                    <input value="<?php echo $pamt; ?>" name="tAmt" type="hidden">
                                    <input value="<?php echo $pamt; ?>" name="amt" type="hidden">
                                    <input value="0" name="txAmt" type="hidden">
                                    <input value="0" name="psc" type="hidden">
                                    <input value="0" name="pdc" type="hidden">
                                    <input value="epay_payment" name="scd" type="hidden">
                                    <input value="<?php echo $invoice_no; ?>" name="pid" type="hidden">
                                    <input value="http://adahal.com.np/success.php?q=fu" type="hidden" name="su">
                                    <input value="http://adahal.com.np/failed.php?q=fu" type="hidden" name="fu">
                                    <input type="image" src="image/esewa.png">
                            </td>
                            <td>

                                <a href="deleteorders.php?id=<?php echo $row['id'] ?>" onclick="return checkDelete()"><i class='fa-solid fa-trash' style="font-size:30px; color:red;"></i></a>
                            </td>

                        </tr>
                    <?php } ?>

                </tbody>
            </table>
        </div>
    </div>
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