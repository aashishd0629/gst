<?php
session_start();
if($_SERVER["REQUEST_METHOD"]=="POST"){
   if(isset($_POST['pty'])){
      foreach($_SESSION['cart'] as $key => $value){
         if($value['p_id']==$_POST['pid']){
            $_SESSION['cart'][$key]['p_qty']=$_POST['pty'];
            echo"
            <script>
            window.location.href='cart.php';
            </script>";
         }
         else{
            echo 'not deleted';
         }
      }
   }
}


?>