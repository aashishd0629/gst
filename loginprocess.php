<?php
session_start();
if($_POST){
$usemail= $_POST["uemail"];
$uspass= $_POST["upass"];

 

include 'dbconn.php';
$result = mysqli_query($conn,"SELECT * FROM register WHERE email='$usemail' ");

$row = mysqli_fetch_array($result,MYSQLI_ASSOC);
$ids=$row['id'];

 if($row['email']==$usemail && $row['password']==$uspass ){
  
   $_SESSION['userid'] = $ids;
   
   header("location: index.php");
 }
 else{
  echo 'user name password doestnot match';
 }
// echo $active;
// die;
mysqli_close($conn);

}





?>


