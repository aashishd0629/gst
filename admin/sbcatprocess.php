<?php
if($_POST){
    $scg= $_POST['sbct'];
$cat=$_POST["scatg"];

include 'dbconn.php';
    $sql2 = "insert into subcategory(cid,sc_name) values('$scg','$cat')";
    if (mysqli_query($conn,$sql2)) {
        header("Location: addtype.php");
        echo "New record created successfully";
      } else {
        echo "Error: " . $sql2 . "<br>" . mysqli_error($conn);
      }
      
      mysqli_close($conn);
     
  }