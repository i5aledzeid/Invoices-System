<?php
    include "db_conn.php";
    $id = $_POST['id'];
    $sql = "DELETE FROM `drivers` WHERE id=$id";
    $result = mysqli_query($conn, $sql);
    if ($result) {
        header("Location: view_exchange_drivers.php?msg=Deleted");
    }
    else {
        echo "Failed: " . mysqli_error($conn);
    }
?>