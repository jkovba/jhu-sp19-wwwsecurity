<?php
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

// prepare and bind
$stmt = $conn->prepare("SELECT id, first_name, last_name FROM students WHERE id = ?");
$stmt->bind_param("i", $id_num);

$id_num = $_POST['id_num'];

$stmt->execute();

$result = $stmt->get_result();
        while ($row = $result->fetch_array(MYSQLI_NUM))
        {
            foreach ($row as $r)
            {
                print "$r ";
            }
            print "\n";
        }

$stmt->close();
$conn->close();

?>
