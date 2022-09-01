<?php
   session_start();
   
   if(session_destroy()) {
      unset($_SESSION['cart']);
      header("Location: index.php");
   }
?>