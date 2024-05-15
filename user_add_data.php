<?php
include 'dbcon.php';

if (isset($_POST['addTask'])) {
    $add_task = $_POST['add_task'];

    $sql = "INSERT INTO tb_add (add_task) VALUES ('$add_task')";
    $result = mysqli_query($conn, $sql);

    if ($result) {
        header("location: ./user_dashboard.php");
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}
?>