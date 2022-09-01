<?php
session_start();
if($_SERVER["REQUEST_METHOD"]=="POST"){
   if(isset($_POST['delete'])){
      foreach($_SESSION['cart'] as $key => $value){
         if($value['p_id']==$_POST['prid']){
            unset($_SESSION['cart'][$key]);
            $_SESSION['cart']=array_values($_SESSION['cart']);
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