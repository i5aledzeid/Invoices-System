<?php
    include "../../database/db_conn.php";
    $id = $_POST['ids'];
    $sql = "UPDATE `download_card` SET `status`='1' WHERE id=$id";
    $result = mysqli_query($conn, $sql);
    if ($result) {
        header("Location: view_download_card.php?msg=Achievement");
    }
    else {
        echo "Failed: " . mysqli_error($conn);
    }
?>