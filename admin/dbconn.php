<?php
 $servername = "localhost";
 $username = "root";
 $password = "";
 // Create connection
 $conn = new mysqli($servername, $username, $password, "nsk");
 // Check connection
 if ($conn->connect_error) {
   die("Connection failed: " . $conn->connect_error);
 }
?>