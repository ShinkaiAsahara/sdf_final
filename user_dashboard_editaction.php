<?php
include 'dbcon.php';

if (isset($_POST['updateTask'])) {
    $id = $_POST['id'];
    $title = $_POST['title'];

    $sql = "UPDATE tb_add SET add_task='$title' WHERE id=$id";
    $result = mysqli_query($conn, $sql);

    if ($result) {
        header("location: ./user_dashboard.php");
    }
}
?>