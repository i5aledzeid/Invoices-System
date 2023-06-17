<?php
    include '../../db_conn.php';
    if (isset($_GET['id'])) {
        $deleteid = $_GET['id'];
        $sql = mysqli_query($conn, "DELETE FROM notifications WHERE id='$deleteid'");
        if ($sql) {
            header('Location: ../../admin/admin_panel.php');
        }
        else {
            echo mysqli_error($conn);
        }
    }
?>