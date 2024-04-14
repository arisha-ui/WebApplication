<?php
error_reporting(0);

$servername = "localhost";
$username = "root";
$password = "";
$database = "tina";


$conn = mysqli_connect($servername, $username, $password, $database);

// Check connection
if ($conn) {
   //echo "connected";;
}
?>