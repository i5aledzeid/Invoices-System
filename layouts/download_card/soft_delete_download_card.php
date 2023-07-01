<?php
    include "../../database/db_conn.php";
    $id = $_GET['id'];
    $sql = "UPDATE `download_card` SET `status`='1' WHERE id=$id";
    $result = mysqli_query($conn, $sql);
    if ($result) {
        header("Location: view_download_card.php?msg=SoftDeleted");
    }
    else {
        echo "Failed: " . mysqli_error($conn);
    }
?>