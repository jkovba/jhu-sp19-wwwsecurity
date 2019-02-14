<?php

// create a variable
$id_num=$_POST['id_num'];

$servername = "127.0.0.1";
$username = "root";
$password = "";
$dbname = "jhu";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT id, first_name, last_name FROM students WHERE id = " . $id_num;
print "Query: " . $sql . "<br><br>";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "id: " . $row["id"]. " - Name: " . $row["first_name"]. " " . $row["last_name"]. "<br>";
    }
} else {
    echo "0 results";
}
$conn->close();

?>
