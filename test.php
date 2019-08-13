<?php 
$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "notebase";
$title = filter_var($_GET['title'],FILTER_SANITIZE_STRING);
$content = filter_var($_POST['content'],FILTER_SANITIZE_STRING);
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$conn->close();






?>