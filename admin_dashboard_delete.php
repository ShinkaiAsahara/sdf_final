<?php
include 'dbcon.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'];

    $sqlDelete = "DELETE FROM tb_reglog WHERE id='$id'"; // delete user

    if ($conn->query($sqlDelete) === TRUE) {
        $sqlUpdate = "SET @num := 0;
                      UPDATE tb_reglog SET id = @num := @num + 1;"; //reset id no 1

        if ($conn->multi_query($sqlUpdate) === TRUE) {
            header("Location: admin_dashboard.php");
        } else {
            echo "Error updating user IDs: " . $conn->error;
        }
    } else {
        echo "Error deleting user: " . $conn->error;
    }
}

$conn->close();
?>
