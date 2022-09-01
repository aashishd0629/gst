<?php

session_start();
$uid = $_SESSION['userid'];
$uname = "";
include 'dbconn.php';
$sql1 = "select user_name from register Where id=$uid";
$result = mysqli_query($conn, $sql1);
while ($row = mysqli_fetch_assoc($result)) {
    $uname = $row["user_name"];
}
if (isset($_SESSION['cart'])) {
    foreach ($_SESSION['cart'] as $key => $values) {
        $amt = $values['p_rate'] * $values['p_qty'];
        $pname = $values['p_name'];
        $prate = $values['p_rate'];
        $pqty = $values['p_qty'];
        $odate = date('y/m/d');

        $cs= 0;
        


        $sql = "insert into oderd(uid, uname, pname, prate, pqty, pamount,odate) values('$uid','$uname','$pname','$prate','$pqty', '$amt','$odate')";
    $sql2= mysqli_query($conn,"select currentStock from productlist where prod_name='".$pname."'");
    while ($row2 = mysqli_fetch_assoc($sql2)) {

      $cs= $row2['currentStock'];
    }
    
    $us= $cs-$pqty;
    $sql3="update productlist set currentStock=$us where prod_name='".$pname."'";

    if($us<0){
        echo "
        <script>
        alert('$cs stock only left');
        window.location.href='cart.php';
        </script>
        ";
        
    }

    
      else  if (mysqli_query($conn, $sql)) {

            mysqli_query($conn, $sql3);
            header("location: orders.php");
            unset($_SESSION['cart']);
           
            echo "New record created successfully";
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }
    }
    
   
}


mysqli_close($conn);
