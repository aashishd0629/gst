<?php
if ($_POST) {
  $sct = $_POST['typ'];
  $type = $_POST["tpe"];

  include 'dbconn.php';
  $sql2 = "insert into ptype(scid,t_name) values('$sct','$type')";
  if (mysqli_query($conn, $sql2)) {
    header("Location: additem.php");
    echo "New record created successfully";
  } else {
    echo "Error: " . $sql2 . "<br>" . mysqli_error($conn);
  }

  mysqli_close($conn);
}
