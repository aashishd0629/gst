<?php
if(isset($_POST)){
    include 'dbconn.php';
    $bn= $_POST["bname"] ;
    $ba=$_POST["badd"] ;
    $bm=$_POST["bmn"] ;
    $bd=$_POST["bdsg"] ;
    if ($_FILES) {
        $filename = $_FILES["image"]["name"];

        $tempname = $_FILES["image"]["tmp_name"];

        $folder = "images/" . $filename;
        move_uploaded_file($tempname, $folder);
    }
    $sql = "insert into bmdb (name,dsg,address,mobileno,image) values('$bn','$bd','$ba','$bm','".$filename."')";
    if (mysqli_query($conn,$sql)) {
      
      header("location: dashboard.php");
      echo "New record created successfully";
    } else {
      echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
    
    mysqli_close($conn);
}



?>