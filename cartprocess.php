<?php
session_start();
if (isset($_SESSION['userid'])) {


    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (isset($_POST['submit'])) {

            $pdid = $_POST['id'];
            $pqty =  $_POST['pqty'];
            $cs = 0;
           include 'dbconn.php';
            
            $query = mysqli_query($conn, "SELECT * FROM productlist where id=$pdid");
            while ($row = mysqli_fetch_assoc($query)) {
              $cs = $row['currentStock'];
            
            }
            if($pqty>$cs){
                echo "<script>
                alert('Only $cs stock available');
               window.location.href='productdetails.php?id=$pdid';
                         </script>";
                
            }
            if (isset($_SESSION['cart'])) {
                $pitems = array_column($_SESSION['cart'], 'p_id');
                if (in_array($_POST['id'], $pitems)) {
                    echo "<script>alert('Item Already Added');
                         window.location.href='cart.php';
                         </script>";
                } else {
                    $count = count($_SESSION['cart']);
                    $_SESSION['cart'][$count] = array('p_id'=>$_POST['id'],'p_name' => $_POST['pname'], 'p_rate' => $_POST['prate'], 'p_qty' => $_POST['pqty']);
                    echo "<script>alert('Item Added');
                         window.location.href='cart.php';
                          </script>";
                }
            }
         else {
            $_SESSION['cart'][0] = array('p_id'=>$_POST['id'], 'p_name' => $_POST['pname'], 'p_rate' => $_POST['prate'], 'p_qty' => $_POST['pqty']);
            echo "<script>alert('Item Added');
            window.location.href='cart.php'; </script>";
        }
        }}
}
?>
