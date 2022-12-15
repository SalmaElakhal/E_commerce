<?php
// Create connection
$hostname = "localhost";
$username = "root";
$password = "";
$database = "ecommerce";

//check connection
$conn = mysqli_connect($hostname, $username, $password, $database) or die ("Database connection failed");
?>