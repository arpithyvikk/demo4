<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "arpit_demo4";

// Create connection
$con = mysqli_connect($servername, $username, $password,$database);

// Check connection
if (!$con) {
  die("Connection failed: " . mysqli_connect_error());
}
// echo "Connected successfully";
?>