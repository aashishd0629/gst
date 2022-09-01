<?php
// echo 'hello';
if($_POST){
 

  $rate = 0;
  $weight = 0;
  $pnm= "";
  $pdid = $_POST["pdid"];
  include 'dbconn.php';
  $query = mysqli_query($conn, "SELECT * FROM productlist where id=$pdid");
  while ($row = mysqli_fetch_assoc($query)) {
    
    $rate = $row['pr_rate'];
    $weight = $row['pr_weight'];
    $pnm = $row['prod_name'];
  }
   
   
    $quantity = $_POST["pqty"];
   
    
    $edate= date("y/m/d");
    
   
   // include 'dbconn.php';

    $cs= 0;
    $sql2= mysqli_query($conn,"select currentStock from productlist where id=$pdid");
    while ($row2 = mysqli_fetch_assoc($sql2)) {

      $cs= $row2['currentStock'];
    }
    
    $us= $cs+$quantity;
    $sql3="update productlist set currentStock=$us where id=$pdid";

  
      

   
    $sql = "insert into prodstock (pr_id,pr_name,p_rate,p_quantity,p_weight,edate) values('$pdid','$pnm','$rate','$quantity','$weight','$edate' )";
    if (mysqli_query($conn,$sql)) {
      mysqli_query($conn,$sql3);
      header("location: dashboard.php");
      echo "New record created successfully";
    } else {
      echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
    
    mysqli_close($conn);
   
 }

?>