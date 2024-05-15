<?php
include 'dbcon.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $delete_query = "DELETE FROM tb_add WHERE id = $id";
    
    if (mysqli_query($conn, $delete_query)) {
        $check_empty_query = "SELECT COUNT(*) as count FROM tb_add";
        $row = mysqli_fetch_assoc(mysqli_query($conn, $check_empty_query));

        if ($row['count'] == 0) {
            mysqli_query($conn, "ALTER TABLE tb_add AUTO_INCREMENT = 1");
        }

        header('Location: user_dashboard.php');
        exit();
    } else {
        echo "Error deleting task: " . mysqli_error($conn);
    }
} else {
    echo "Invalid task ID";
}
?>
