<?php
include 'dbcon.php';

$username = $_POST['username'];
$password = $_POST['password'];

$sql = "SELECT * FROM tb_reglog WHERE username ='$username'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $user = $result->fetch_assoc();
    $hashedPassword = $user['password'];

    if (password_verify($password, $hashedPassword)) {
        
        session_start();

        $_SESSION['user_id'] = $user['id'];

        // if admin username sakto pass -> adto admin_dash
        if ($user['role'] == 'admin') {
            header('Location: admin_dashboard.php');
        } else {
            header('Location: user_dashboard.php');
        }

        $conn->close();
        exit(); 
    } else {
        header("Location: reglog.php?error=Incorrect password");
        exit();
    }
} else {
    header("Location: reglog.php?error=This Account is not Registered.");
    exit();
}
?>
