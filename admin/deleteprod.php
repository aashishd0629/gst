<?php


if(isset($_GET['id'])){
   $id = $_GET['id'];

    
   include 'dbconn.php';
 $query = mysqli_query($conn,"DELETE FROM  productlist WHERE id=$id");
 if($query){
    header("location: dashboard.php");
 }
 else{
    echo 'Connection error';
 }
}



?>