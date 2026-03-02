<?php
include "db.php";

if (isset($_GET['id_number'])) {
    $id = $_GET['id_number'];

    $sql = "DELETE FROM student WHERE id_number = '$id'";

    if (mysqli_query($conn, $sql)) {
        header("Location: index.php");
        exit;
    } else {
        echo "Error deleting record: " . mysqli_error($conn);
    }
} 
?>