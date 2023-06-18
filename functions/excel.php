<?php
    // heaader for download xls xlsx
    header("Content-Type: application/vnd.ms-excel");
    header("Content-Disposition: attachment; Filename = MyData.xls");
    require 'view_exchange_drivers.php';
?>