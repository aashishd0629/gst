<?php
// echo 'hello';
if(isset($_POST)){
  
    
    $tid = $_POST["ptyp"];
    $descr = $_POST["pdesc"];
    $pwt=$_POST["pwgt"];
    $prte=$_POST["prate"];
    if($_FILES){
      $filename = $_FILES["image"]["name"];

      $tempname = $_FILES["image"]["tmp_name"];  
  
          $folder = "images/".$filename; 
          move_uploaded_file($tempname, $folder);
    }
    include 'dbconn.php';
    $query2 = mysqli_query($conn,"SELECT * FROM ptype Where id=$tid");
    while($row=mysqli_fetch_assoc($query2)){
      $tname=$row['t_name'];
    
   
    $sql = "insert into productlist (t_id,prod_name,prod_desc,image,pr_weight,pr_rate) values('$tid','$tname','$descr','".$filename."','$pwt','$prte')";
    if (mysqli_query($conn,$sql)) {
      header("location: additem.php");
      echo "New record created successfully";
    } else {
      echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
    
    mysqli_close($conn);
   
}
}

?>