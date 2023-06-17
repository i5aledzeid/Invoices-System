<?php
    session_start();
    include "../db_conn.php";
    $uid = $_SESSION['id'];
    $time = time() + 10;
    $result = mysqli_query($conn, "UPDATE user SET last_login = $time WHERE id='$uid'");
?>