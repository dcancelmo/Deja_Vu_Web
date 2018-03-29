<?php
$servername = "localhost";
$username = "admin";
$password = "";
$database = "dejavu";
$conn = new mysqli($servername, $username, $password, $database);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($conn->query($sql) === TRUE) {
} else {
		echo "Error using  database: " . $conn->error;
}
?>