<?php
    include "../../database/db_conn.php";
    $id = $_POST['idss'];
    $sql = "UPDATE `download_card` SET `status`='0' WHERE id=$id";
    $result = mysqli_query($conn, $sql);
    if ($result) {
        header("Location: view_download_card.php?msg=Achievement");
    }
    else {
        echo "Failed: " . mysqli_error($conn);
    }
?>