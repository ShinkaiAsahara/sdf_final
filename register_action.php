<?php
include 'dbcon.php';

$username = $_POST['username'];
$email = $_POST['email'];
$password = $_POST['password'];
$password_hash = password_hash($password, PASSWORD_DEFAULT);

$sql = "INSERT INTO tb_reglog (username, email, password) VALUES ('$username', '$email', '$password_hash')";

if ($conn->query($sql) === TRUE){
    header('location: register_success.php');
    exit();
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
?>