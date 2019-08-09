<?php
$servername = "localhost";
$databse = "Notebase";
$username = "root";
$password= "root";

$mysqli = mysqli_connect($servername, $username, $password);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
echo "Connected successfully";
?>