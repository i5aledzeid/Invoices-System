<?php
    include '../../db_conn.php';
    $id = $_GET['id']; 
    mysqli_query($conn, "UPDATE `notifications` SET `seen`='0' WHERE `id`='$id'");
    header("Location: read_notifications.php");
?>