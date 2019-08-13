<?php
$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "notebase";
$title = filter_var($_GET['title'],FILTER_SANITIZE_STRING);
$content = filter_var($_POST['content'],FILTER_SANITIZE_STRING);
$conn = new mysqli($servername, $username, $password, $dbname);
$result = [];
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

if(isset($_POST['content'])){
    if(isset($_GET['title'])){
        $sql = "INSERT INTO notes (title, content)
        VALUES ('$title', '$content')";

        if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";

        } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }
}

if (isset($_GET['show'])){
    $sql = "SELECT * FROM notes";
    $result = $conn->query($sql);
    $i = 0;
    $array_result = [];
    
    if ($result->num_rows > 0) {
        // output data of each row
        while($row = $result->fetch_assoc()) {
                $array_result["title".$i] = $row['title'];
                $i++;
      
        }
        return json_encode($array_result); 
    } else {
        echo "0 results";
    }
};

if ($result->rowCount() > 0) {
    
    }
    



$conn->close();
?>