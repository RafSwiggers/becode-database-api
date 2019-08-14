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
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

if(isset($_GET['title'])){
if(isset($_POST['content'])){
        $sql = "INSERT INTO notes (title, content)
        VALUES ('$title', '$content')";

        if ($conn->query($sql) === TRUE) {
        return "New record created successfully";

        } else {
        return "Error: " . $sql . "<br>" . $conn->error;
        }

    } elseif (isset($_POST['update'])) {
        $sql="UPDATE notes
        SET content = '$update'
        WHERE Title = '$title'";
        if ($conn->query($sql) === TRUE) {
            return "Succesfully updated ".$title;
            } else {
            return "Error: " . $sql . "<br>" . $conn->error;
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
                $array_result[$row["Title"]] = $row['content'];
                $i++;
      
        }
        return json_encode($array_result); 
    } else {
        return "0 results";
    }
}

if (isset($_GET['search'])){
    $sql = "SELECT * FROM notes WHERE Title ='$search'";
    $result = $conn->query($sql);
    $i = 0;
    $array_result = [];
    
    if ($result->num_rows > 0) {
        // output data of each row
        while($row = $result->fetch_assoc()) {
                $array_result[$row["Title"]] = $row['content'];
                $i++;
      
        }
        return json_encode($array_result); 
    } else {
        return "0 results";
    }
};
if(isset($_GET['delete'])){
    $sql = "DELETE FROM notes WHERE title = '$delete'";
    if ($conn->query($sql) === TRUE) {
    return "Record deleted";

    } else {
    return "Error: " . $sql . "<br>" . $conn->error;
    }
    
}


$conn->close();
?>