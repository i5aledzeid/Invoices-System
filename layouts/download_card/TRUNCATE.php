<?php
    include "../../database/db_conn.php";
    $sql = "TRUNCATE TABLE `id20838311_laravels`.`download_card`";
    $result = mysqli_query($conn, $sql);
    if ($result) {
        header("Location: view_download_card.php?msg=TRUNCATE");
    }
    else {
        echo "Failed: " . mysqli_error($conn);
    }
?>