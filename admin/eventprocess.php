<?php
if ($_POST) {
    $adate = date('y/m/d');
    $atitle = $_POST['etitle'];
    $adesc = $_POST['edesc'];
    if ($_FILES) {
        $filename = $_FILES["image"]["name"];

        $tempname = $_FILES["image"]["tmp_name"];

        $folder = "images/" . $filename;
        move_uploaded_file($tempname, $folder);
    }
    include 'dbconn.php';
    $sql = "insert into events (title,description,image,date) values('$atitle','$adesc','" . $filename . "','$adate')";
    if (mysqli_query($conn, $sql)) {
        header("location: addevent.php");
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }

    mysqli_close($conn);
}
