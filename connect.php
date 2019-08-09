<?php
$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "NoteBase";
$title = $_GET['title'];
$content = $_GET['content'];
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
$sql = "SELECT id, title, content FROM notes";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "id: " . $row["id"]. " - Title: " . $row["title"]. " Note : " . $row["content"]. "<br>";
    }
} else {
    echo "0 results";
}
$conn->close();

echo "<form method='GET'>
<input type='text' id='title' name='title'>
</input>
<input type='text' id='content' name='content'>
</input>
<button>Submit</button>
</form>";
if(isset($title)){
    $sql = "INSERT INTO notes (title, content)
VALUES ('$title', '$content')";
if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
}
$conn->close();
?>