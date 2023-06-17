<?php
    require_once '../../db_conn.php';
    require_once '../../phpqrcode/qrlib.php';
    $path = 'images/';
    $qrcode = $path.time() . '.png';
    $qrimage = time(). '.png';
    if (isset($_REQUEST['button'])) {
        $qrtext = $_REQUEST['qrtext'];
        $query = mysqli_query($conn, "INSERT INTO qrcode SET qrtext='$qrtext', qrimage='$qrimage'");
        if ($query) { ?>
            <script>
                alert("Data insert successfully!");
            </script>
        <?php }
    }
    QRcode::png($qrtext, $qrcode, 'H', 4, 4);
    echo '<img src='. $qrcode .'>';
?>