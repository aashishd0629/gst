<?php


if(isset($_GET['id'])){
   $id = $_GET['id'];

    
   include 'dbconn.php';
 $query = mysqli_query($conn,"DELETE FROM  oderd WHERE id=$id");
 if($query){
    header("location: orders.php");
 }
 else{
    echo 'Connection error';
 }
}



?>