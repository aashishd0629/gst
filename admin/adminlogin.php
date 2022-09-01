<?php
session_start();
if($_POST){
$uemail= $_POST["uemail"];
$upass= $_POST["upass"];



 

include('dbconn.php');

$result = mysqli_query($conn,"SELECT * FROM admindb WHERE username='$uemail' AND apassword='$upass'  ");

$row = mysqli_fetch_array($result,MYSQLI_ASSOC);
$ids=$row['id'];
if($row['username']==$uemail && $row['apassword']==$upass ){
  
   $_SESSION['aid'] = $ids;
   
   header("location: dashboard.php");
 }
 else{
   header("location: index.php");
  echo 'user name password doestnot match';
 }
// echo $active;
// die;
mysqli_close($conn);
}





?>