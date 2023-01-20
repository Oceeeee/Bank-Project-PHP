<?php

require_once __DIR__.('/../../src/class/DbObject.php');
$dbObject = new DbObject();
$created_at = $dbObject->getCreatedAt();

$email = $_POST['email'];
$password = $_POST['password'];
$role = 0;
$last_ip = 0;

// Connection à la database
$conn = new mysqli('localhost', 'root', 'root', 'bankphp');
if($conn->connect_error) {
    die('Connection Failed : ' . $conn->connect_error);
}
else {
    $stmt = $conn->prepare('INSERT INTO `users`(email, password, role, created_at, last_ip) VALUES(?,?,?,?,?)');
    $stmt->bind_param('ssiss', $email, $password, $role, $created_at, $last_ip);
    $stmh->execute();
    echo "Registration complete";
    $stmt->close();
    $conn->close();
}

?>