<?php
if(isset($_POST)){
    $id= $_POST['oid'];
    $stat= $_POST['pstatus'];
    include 'dbconn.php';
    $sql = "UPDATE oderd SET status='$stat' WHERE id=$id";
    if (mysqli_query($conn, $sql)) {
        header("Location: ordersad.php");
        echo "Record updated successfully";
      } else {
        echo "Error updating record: " . mysqli_error($conn);
      }
      
      mysqli_close($conn);
}
?>