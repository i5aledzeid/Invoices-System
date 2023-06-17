<?php
    session_start();
    include "../db_conn.php";
    $uid = $_SESSION['id'];
    $time = time();
    $result = mysqli_query($conn, "UPDATE user SET last_login = $time WHERE id='$uid'");
    $html = '
        <span style="--i: 0;"></span>
        <span style="--i: 1;"></span>
        <span style="--i: 2;"></span>
        <span style="--i: 3;"></span>
        <span style="--i: 4;"></span>
        <span style="--i: 5;"></span>
        <span style="--i: 6;"></span>
    ';
?>