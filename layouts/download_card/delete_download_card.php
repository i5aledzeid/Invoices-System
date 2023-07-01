<?php
    include "../../database/db_conn.php";
    $id = $_POST['id'];
    $sql = "DELETE FROM `download_card` WHERE id=$id";
    $result = mysqli_query($conn, $sql);
    if ($result) {
        header("Location: view_download_card.php?msg=Deleted");
    }
    else {
        echo "Failed: " . mysqli_error($conn);
    }
?>