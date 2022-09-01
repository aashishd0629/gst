<?php
if($_POST){
$rname= $_POST["fname"];
$remail= $_POST["femail"];
$rpass= $_POST["fpass"];
$radd= $_POST['radd'];
$rno= $_POST['rno'];

include 'dbconn.php';

$sql = "insert into register (user_name,email,password,address,phone_no) values('$rname','$remail','$rpass','$radd','$rno')";
if (mysqli_query($conn,$sql)) {
  header("location: login.php");
  echo "New record created successfully";
} else {
  echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

mysqli_close($conn);

}





?>