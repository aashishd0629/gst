<?php
if($_POST){
$cat=$_POST["catg"];

include 'dbconn.php';
    $sql2 = "insert into category(cat_name) values('$cat')";
    if (mysqli_query($conn,$sql2)) {
        header("Location: addscat.php");
        echo "New record created successfully";
      } else {
        echo "Error: " . $sql2 . "<br>" . mysqli_error($conn);
      }
      
      mysqli_close($conn);
     
  }