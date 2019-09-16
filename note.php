<?php
$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "notebase";
$title = filter_var($_GET['title'],FILTER_SANITIZE_STRING);
$delete = filter_var($_GET['delete'], FILTER_SANITIZE_STRING);
$content = filter_var($_POST['content'],FILTER_SANITIZE_STRING);
$search = filter_var($_GET['search'],FILTER_SANITIZE_STRING);
$update = filter_var($_POST['update'],FILTER_SANITIZE_STRING);
$conn = new mysqli($servername, $username, $password, $dbname);
$result = [];
// Check connection
//add notes
if (isset($_GET['title'])){
    if(isset($_POST['content'])){
        $sql = "INSERT INTO notes (title, content)
        VALUES ('$title', '$content')";
    
        if ($conn->query($sql)) {
        echo " New record created successfully ";
        } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
        }
  
}
}
// give list 
if(isset($_GET['list'])){
    $sql = "SELECT title FROM notes"; 
    $result = $conn->query($sql);
    if($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            $jsonresult = json_encode($row);
            print_r($jsonresult);
        } 
    } else {
        echo "no results";
    }
    }
// delete notes 
$delete = $_GET['delete']; 
if(isset($_GET['delete'])){
    $sql = "DELETE FROM notes WHERE title='$delete'";
    if ($conn->query($sql)) {
        echo " deleted ";
        } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
    }
//update 
$update = $_GET['update']; 
$newtext = $_GET['newtext'];
if(isset($_GET['update'])){
    $sql = "UPDATE notes SET content='$newtext' WHERE title='$update'";
    if ($conn->query($sql)) {
        echo " updated ";
        } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
}
}
// get 
$select = $_GET['select']; 
if(isset($_GET['select'])){
    $sql = "SELECT *  FROM notes WHERE  title='$select'";
    $result = $conn->query($sql);
    if($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $jsonresult = json_encode($row);
        print_r($jsonresult);
    } 
} else {
    echo "no results";
}
}
// Create connection
$conn = new mysqli($servername, $username, $password);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
echo " Connected successfully ";
//do
mysqli_close($conn);
?>
