<?php
session_start();
if (isset($_SESSION['userid'])) {


    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (isset($_POST['submit'])) {
            $pdid = $_POST['id'];
            $pqty =  $_POST['pqty'];
            $cs = 0;
            include 'dbconn.php';
            $query = mysqli_query($conn, "SELECT * FROM productlist where id=$pdid");
            while ($row = mysqli_fetch_assoc($query)) {
              $cs = $row['currentStock'];
            
            }
            if($pqty>$cs){
                echo "<script>
                alert('Only $cs stock available');
               window.location.href='productdetails.php?id=$pdid';
                         </script>";
                
            }
             else if (isset($_SESSION['cart'])) {
                $pitems = array_column($_SESSION['cart'], 'p_id');
                if (in_array($_POST['id'], $pitems)) {
                    echo "<script>alert('Item Already Added');
                         window.location.href='cart.php';
                         </script>";
                } else {
                    $count = count($_SESSION['cart']);
                    $_SESSION['cart'][$count] = array('p_id'=>$_POST['id'],'p_name' => $_POST['pname'], 'p_rate' => $_POST['prate'], 'p_qty' => $_POST['pqty']);
                    echo "<script>alert('Item Added');
                         window.location.href='cart.php';
                          </script>";
                }
            }
         else {
            $_SESSION['cart'][0] = array('p_id'=>$_POST['id'], 'p_name' => $_POST['pname'], 'p_rate' => $_POST['prate'], 'p_qty' => $_POST['pqty']);
            echo "<script>alert('Item Added');
            window.location.href='cart.php'; </script>";
        }
   }
    }
    
?>

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
<!-- cart starts here -->

<div class="details" style="margin-top:80px">
                <div class="recentOrders">
                    <div class="cardHeader">
                        <h2>Cart Details</h2>
                        
                    </div>

                    <table>
                        <thead>
                            <tr>
                                <td>Product Name</td>
                                <td>Prduct ID</td>
                                <td>Quantity</td>
                                <td>Rate</td>
                                <td>Amount</td>
                                <td>Action</td>
                                
                            </tr>
                        </thead>

                        <tbody>
                        <?php
                    $pid = $_SESSION['userid'];
                    if (isset($_SESSION['cart'])) {
                        foreach ($_SESSION['cart'] as $key => $values) {
                            
                    ?>
                            <tr>
                                <td><?php echo $values['p_name'] ?></td>
                                <td></td>
                                <td>
                                <form action="modifyq.php" method="POST" enctype="multipart/form-data">
                                    <?php 
                                include 'dbconn.php';
                                $pdid = $values['p_id'];
            $query = mysqli_query($conn, "SELECT * FROM productlist where id=$pdid");
            while ($row = mysqli_fetch_assoc($query)) {
               
              $cs = $row['currentStock'];
            
            ?>
                                    <input type="number" class="ppqty" onchange="this.form.submit();" id="pquantity" name="pty" max ="<?php echo $cs?>" value="<?php echo $values['p_qty'] ?>">
                                  <?php }  ?>
                                    <input type="hidden" name="pid" value="<?php echo $values['p_id'] ?>">
                                    </form>
                            </td>
                                <td>
                                <?php echo $values['p_rate'] ?>
                                    <input type="hidden" class="pprice" value="<?php echo $values['p_rate'] ?>">
                                </td>
                                <td class="ptotal"></td>
                                <td>
                                <form action="deletecart.php" method="POST" enctype="multipart/form-data">
                                        <button name="delete" type="submit">Remove</button>
                                        <input type="hidden" name="prid" value="<?php echo $values['p_id'] ?>">
                                    </form>
                                </td>
                                
                       
                            </tr>
                        <?php } } ?>

                        </tbody>
                    </table>
                    <div class="total-price">
                    <table>
                        <tr>
                            <td>Subtotal</td>
                            <td id="gtotal"></td>
                        </tr>
                        
                        <tr>
                            <td>
                            <form action="confirmp.php" method="POST" enctype="multipart/form-data">
                                <?php
                                $pid = $_SESSION['userid'];
                                if (isset($_SESSION['cart'])) {
                                 foreach ($_SESSION['cart'] as $key => $values) {
                                ?>
                                <input type="hidden" name="pname" value="<?php echo $values['p_name']?>">
                                <?php }  }?>
                                <button name="checkout" type="submit" >CheckOut</button>
                                </form>
                                </td>
                        </tr>
                    </table>
                </div>
                </div>

                <?php } ?>
<!-- footer section starts  -->

<footer>
    <?php 
    include 'footer.php';
    ?>
</footer>

<!-- footer section ends -->















<script src="https://unpkg.com/swiper@7/swiper-bundle.min.js"></script>

<!-- custom js file link  -->
<!-- <script src="js/script.js"></script> -->
<script>
        var gt = 0;
        var pprice = document.getElementsByClassName('pprice');
        var pqty = document.getElementsByClassName('ppqty');
        var ptotal = document.getElementsByClassName('ptotal');
        var gtotal = document.getElementById('gtotal');
     
        // ptotal.innerText= 'i am here also';

         subtotal();
        function subtotal() {
            gt = 0;
            

           
            for (var i = 0; i < pprice.length; i++) {
                
                ptotal[i].innerText = (pprice[i].value) * (pqty[i].value);
                gt = gt + (pprice[i].value) * (pqty[i].value);
               
            }
            
            gtotal.innerText = gt;
            
            
        }

       
        

    </script>

</body>
</html>
<?php 
// }
// else{
// echo "<script> 
// alert('please login First');
// window.location.href='login.php';
// </script>";
// }
?>