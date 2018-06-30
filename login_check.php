<?php
	require_once('inc/db_connect.php');

	$sql = "CREATE TABLE IF NOT EXISTS User(username varchar(30) primary key, password char(64), timeCreated varchar(26))";
	$conn->query($sql);
	//Input sanitation
	$username = $_POST['username'];
    $password = $_POST['password'];
    $sql  = $conn->prepare('SELECT * FROM User WHERE username = ?');
	$sql->bind_param('s', $username);
	$sql->execute();
	$cursor = $sql->get_result();
if ($cursor->num_rows != 1) {
    echo "Location: login_messages/incorrect.html";
} else {
    $row = $cursor->fetch_assoc();

    $stored_pass = $row[1];
    $salt = $row[2];
    $test_pass = $password + $salt;
    $hash_pass = hash("sha256", $test_pass, true);
    if (strcmp($stored_pass, $hash_pass)) {
        session_start();
        $_SESSION["user"] = $username;
        //Sets to expire 31 days later
        setcookie("username", $username , time() + (60*60*24*31), "/");
        echo "Location: dashboard.php";
    } else {
        echo "Location: login_messages/incorrect.html";
    }


}

?>