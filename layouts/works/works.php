<?php 
// session_start();
// if (isset($_SESSION['id']) && isset($_SESSION['user_name'])) {
require_once('db_conn.php');
require_once('database/functions.php');
// $result = display_data();
/*$result = display_sum_data();
$results = display_sum_where_data();
$resultss = display_sums_where_data();
$resultsss = display_sumss_where_data();
$resultssss = display_sumsss_where_data();
$result_ = display_sum_where_date(/*'diesel', 'drivers', 1, 2*//*);

$payload_total1 = display_sum_where_data_payload_total();
$payload_total2 = display_sums_where_data_payload_total();
$payload_total3 = display_sumss_where_data_payload_total();
$payload_total4 = display_sumsss_where_data_payload_total();

$diesel1 = display_sum_where_data_diesel();
$diesel2 = display_sums_where_data_diesel();
$diesel3 = display_sumss_where_data_diesel();
$diesel4 = display_sumsss_where_data_diesel();

$trip_total1 = display_sum_where_data_trip_total();
$trip_total2 = display_sums_where_data_trip_total();
$trip_total3 = display_sumss_where_data_trip_total();
$trip_total4 = display_sumsss_where_data_trip_total();

$discounts1 = display_sum_where_data_discounts();
$discounts2 = display_sums_where_data_discounts();
$discounts3 = display_sumss_where_data_discounts();
$discounts4 = display_sumsss_where_data_discounts();

$total1 = display_sum_where_data_total();
$total2 = display_sums_where_data_total();
$total3 = display_sumss_where_data_total();
$total4 = display_sumsss_where_data_total();*/

?>
<!DOCTYPE html>
<html>
<head>
	<!--<link rel="stylesheet" type="text/css" href="style.css">-->
    <!--<link rel="stylesheet" type="text/css" href="assets/css/style-drivers.css">-->
    <link rel="stylesheet" type="text/css" href="assets/css/style-workss.css">
    <!-- bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <!-- font awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="icon" type="image/x-icon" href="assets/icons/bar_chart_diagram_line_report_icon.ico">
	<title>تقارير | مصروفات السائقين</title>
</head>
<body>
    <div class="tab-container">
        <div class="title">
            <!-- Tooltip -->
            <a href="view_exchange_drivers.php" class="hint-link" style="text-decoration: none;" placeholder="dddddd">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-house" viewBox="0 0 16 16">
                    <path d="M8.707 1.5a1 1 0 0 0-1.414 0L.646 8.146a.5.5 0 0 0 .708.708L2 8.207V13.5A1.5 1.5 0 0 0 3.5 15h9a1.5 1.5 0 0 0 1.5-1.5V8.207l.646.647a.5.5 0 0 0 .708-.708L13 5.793V2.5a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5v1.293L8.707 1.5ZM13 7.207V13.5a.5.5 0 0 1-.5.5h-9a.5.5 0 0 1-.5-.5V7.207l5-5 5 5Z"/>
                </svg>
                <span id="tooltip">العودة للصفحة الرئيسية</span>
                <script>
                    var spanText = document.getElementById('tooltip');
                    window.onmousemove = function(e) {
                        var x = e.clientX,
                            y = e.clientY;
                        spanText.style.top = (y + 20) + 'px';
                        spanText.style.left = (x + 20) + 'px';
                    }
                </script>
            </a>
            تقرير سنة <?php echo date("Y"); ?>
        </div>
        <div class="tab-box">
            <button class="tab-button">شهر 1</button>
            <button class="tab-button">شهر 2</button>
            <button class="tab-button">شهر 3</button>
            <button class="tab-button">شهر 4</button>
            <button class="tab-button">شهر 5</button>
            <?php
                /*$monthNow = date('m');
                if ($monthNow = 6) {
                    echo '?>
                        <button class="tab-button active">شهر 6</button>
                    <?php';
                }
                else {
                    echo '?>
                        <button class="tab-button">شهر 6</button>
                    <?php';
                }?>*/
            ?>
            <button class="tab-button">شهر 6</button>
            <button class="tab-button">شهر 7</button>
            <button class="tab-button">شهر 8</button>
            <button class="tab-button">شهر 9</button>
            <button class="tab-button">شهر 10</button>
            <button class="tab-button">شهر 11</button>
            <button class="tab-button active">شهر 12</button>
            <div class="line"></div>
        </div>
        <div class="content-box">
            <div class="content">
                <driv class="row ">
                    <div class="col"><h2>شهر 1</h2></div>
                </driv>
                <table class="table table-dark table-hover">
                    <tr>
                        <th>الأسبوع#</th>
                        <th>الحمولة</th>
                        <th style="background: #FFC107; color: black;">قيمة الخدمة</th>
                        <th style="background: #FFC107; color: black;">ديزل</th>
                        <th style="background: #FFC107; color: black;">التربات</th>
                        <th style="background: #0D6EFD;">الدفعات</th>
                        <th style="background: red;">الخصومات</th>
                        <th style="background: green;">الراتب</th>
                        <th>الدخل الأسبوعي</th>
                    </tr>
                    <tr>
                        <td>1</td>
                        <td>
                            <?php
                            $query = "SELECT SUM(payload_total) As sumOf61 FROM drivers WHERE `month`='1' AND `week`='1'";
                            $result = mysqli_query($conn, $query);
                            while ($row = mysqli_fetch_assoc($result)) {
                                $total = $row['sumOf61'];
                                if ($total != 0) {
                                    echo number_format($total, 2);
                                }
                                else {
                                    echo '' . '0.00';
                                }
                            }
                            ?>
                        </td>
                        <td style="background: #FFC107; color: black;">
                            <?php
                            $query = "SELECT SUM(service_value) As sumOf61 FROM drivers WHERE `month`='1' AND `week`='1'";
                            $result = mysqli_query($conn, $query);
                            while ($row = mysqli_fetch_assoc($result)) {
                                $total = $row['sumOf61'];
                                if ($total != 0) {
                                    echo number_format($total, 2);
                                }
                                else {
                                    echo '' . '0.00';
                                }
                            }
                            ?>
                        </td>
                        <td style="background: #FFC107; color: black;">
                            <?php
                            $query = "SELECT SUM(diesel) As sumOf61 FROM drivers WHERE `month`='1' AND `week`='1'";
                            $result = mysqli_query($conn, $query);
                            while ($row = mysqli_fetch_assoc($result)) {
                                $total = $row['sumOf61'];
                                if ($total != 0) {
                                    echo number_format($total, 2);
                                }
                                else {
                                    echo '' . '0.00';
                                }
                            }
                            ?>
                        </td>
                        <td style="background: #FFC107; color: black;">
                            <?php
                            $query = "SELECT SUM(trip_total) As sumOf61 FROM drivers WHERE `month`='1' AND `week`='1'";
                            $result = mysqli_query($conn, $query);
                            while ($row = mysqli_fetch_assoc($result)) {
                                $total = $row['sumOf61'];
                                if ($total != 0) {
                                    echo number_format($total, 2);
                                }
                                else {
                                    echo '' . '0.00';
                                }
                            }
                            ?>
                        </td>
                        <td style="background: #0D6EFD;">
                            <?php
                            $query = "SELECT SUM(payments) As sumOf61 FROM drivers WHERE `month`='1' AND `week`='1'";
                            $result = mysqli_query($conn, $query);
                            while ($row = mysqli_fetch_assoc($result)) {
                                $total = $row['sumOf61'];
                                if ($total != 0) {
                                    echo number_format($total, 2);
                                }
                                else {
                                    echo '' . '0.00';
                                }
                            }
                            ?>
                        </td>
                        <td style="background: red;">
                            <?php
                            $query = "SELECT SUM(discounts) As sumOf61 FROM drivers WHERE `month`='1' AND `week`='1'";
                            $result = mysqli_query($conn, $query);
                            while ($row = mysqli_fetch_assoc($result)) {
                                $total = $row['sumOf61'];
                                if ($total != 0) {
                                    echo number_format($total, 2);
                                }
                                else {
                                    echo '' . '0.00';
                                }
                            }
                            ?>
                        </td>
                        <td style="background: green;">
                            <?php
                            $query = "SELECT SUM(salary) As sumOf61 FROM drivers WHERE `month`='1' AND `week`='1'";
                            $result = mysqli_query($conn, $query);
                            while ($row = mysqli_fetch_assoc($result)) {
                                $total = $row['sumOf61'];
                                if ($total != 0) {
                                    echo number_format($total, 2);
                                }
                                else {
                                    echo '' . '0.00';
                                }
                            }
                            ?>
                        </td>
                        <td>
                            <?php
                            $query = "SELECT SUM(payload_total) As sumOf FROM drivers WHERE `month`='1' AND `week`='1'";
                            $query2 = "SELECT SUM(trip_total) As sumOfIn FROM drivers WHERE `month`='1' AND `week`='1'";
                            $query3 = "SELECT SUM(diesel) As sumOfTo FROM drivers WHERE `month`='1' AND `week`='1'";
                            $query4 = "SELECT SUM(service_value) As sumOfFor FROM drivers WHERE `month`='1' AND `week`='1'";
                            $total = 0;
                            $result = mysqli_query($conn, $query);
                            $result2 = mysqli_query($conn, $query2);
                            $result3 = mysqli_query($conn, $query3);
                            $result4 = mysqli_query($conn, $query4);

                            while ($row = mysqli_fetch_assoc($result)) {
                                while ($row2 = mysqli_fetch_assoc($result2)) {
                                    while ($row3 = mysqli_fetch_assoc($result3)) {
                                        while ($row4 = mysqli_fetch_assoc($result4)) {
                                            $total = $row['sumOf'] - ($row2['sumOfIn'] + $row3['sumOfTo'] + $row4['sumOfFor']);
                                            if ($total != 0) {
                                                echo number_format($total, 2);
                                             }
                                            else {
                                                echo '' . '0.00';
                                            }
                                        }
                                    }
                                }
                            }
                            ?>
                        </td>
                    </tr>
                    <tr>
                        <td>2</td>
                        <td>
                            <?php
                            $query = "SELECT SUM(payload_total) As sumOf62 FROM drivers WHERE `month`='1' AND `week`='2'";
                            $result = mysqli_query($conn, $query);
                            while ($row = mysqli_fetch_assoc($result)) {
                                $total = $row['sumOf62'];
                                if ($total != 0) {
                                    echo number_format($total, 2);
                                }
                                else {
                                    echo '' . '0.00';
                                }
                            }
                            ?>
                        </td>
                        <td style="background: #FFC107; color: black;">
                            <?php
                            $query = "SELECT SUM(service_value) As sumOf62 FROM drivers WHERE `month`='1' AND `week`='2'";
                            $result = mysqli_query($conn, $query);
                            while ($row = mysqli_fetch_assoc($result)) {
                                $total = $row['sumOf62'];
                                if ($total != 0) {
                                    echo number_format($total, 2);
                                }
                                else {
                                    echo '' . '0.00';
                                }
                            }
                            ?>
                        </td>
                        <td style="background: #FFC107; color: black;">
                            <?php
                            $query = "SELECT SUM(diesel) As sumOf62 FROM drivers WHERE `month`='1' AND `week`='2'";
                            $result = mysqli_query($conn, $query);
                            while ($row = mysqli_fetch_assoc($result)) {
                                $total = $row['sumOf62'];
                                if ($total != 0) {
                                    echo number_format($total, 2);
                                }
                                else {
                                    echo '' . '0.00';
                                }
                            }
                            ?>
                        </td>
                        <td style="background: #FFC107; color: black;">
                            <?php
                            $query = "SELECT SUM(trip_total) As sumOf62 FROM drivers WHERE `month`='1' AND `week`='2'";
                            $result = mysqli_query($conn, $query);
                            while ($row = mysqli_fetch_assoc($result)) {
                                $total = $row['sumOf62'];
                                if ($total != 0) {
                                    echo number_format($total, 2);
                                }
                                else {
                                    echo '' . '0.00';
                                }
                            }
                            ?>
                        </td>
                        <td style="background: #0D6EFD;">
                            <?php
                            $query = "SELECT SUM(payments) As sumOf61 FROM drivers WHERE `month`='1' AND `week`='2'";
                            $result = mysqli_query($conn, $query);
                            while ($row = mysqli_fetch_assoc($result)) {
                                $total = $row['sumOf61'];
                                if ($total != 0) {
                                    echo number_format($total, 2);
                                }
                                else {
                                    echo '' . '0.00';
                                }
                            }
                            ?>
                        </td>
                        <td style="background: red;">
                            <?php
                            $query = "SELECT SUM(discounts) As sumOf62 FROM drivers WHERE `month`='1' AND `week`='2'";
                            $result = mysqli_query($conn, $query);
                            while ($row = mysqli_fetch_assoc($result)) {
                                $total = $row['sumOf62'];
                                if ($total != 0) {
                                    echo number_format($total, 2);
                                }
                                else {
                                    echo '' . '0.00';
                                }
                            }
                            ?>
                        </td>
                        <td style="background: green;">
                            <?php
                            $query = "SELECT SUM(salary) As sumOf61 FROM drivers WHERE `month`='1' AND `week`='2'";
                            $result = mysqli_query($conn, $query);
                            while ($row = mysqli_fetch_assoc($result)) {
                                $total = $row['sumOf61'];
                                if ($total != 0) {
                                    echo number_format($total, 2);
                                }
                                else {
                                    echo '' . '0.00';
                                }
                            }
                            ?>
                        </td>
                        <td>
                            <?php
                            $query = "SELECT SUM(payload_total) As sumOf FROM drivers WHERE `month`='1' AND `week`='2'";
                            $query2 = "SELECT SUM(trip_total) As sumOfIn FROM drivers WHERE `month`='1' AND `week`='2'";
                            $query3 = "SELECT SUM(diesel) As sumOfTo FROM drivers WHERE `month`='1' AND `week`='2'";
                            $query4 = "SELECT SUM(service_value) As sumOfFor FROM drivers WHERE `month`='1' AND `week`='2'";
                            $total = 0;
                            $result = mysqli_query($conn, $query);
                            $result2 = mysqli_query($conn, $query2);
                            $result3 = mysqli_query($conn, $query3);
                            $result4 = mysqli_query($conn, $query4);

                            while ($row = mysqli_fetch_assoc($result)) {
                                while ($row2 = mysqli_fetch_assoc($result2)) {
                                    while ($row3 = mysqli_fetch_assoc($result3)) {
                                        while ($row4 = mysqli_fetch_assoc($result4)) {
                                            $total = $row['sumOf'] - ($row2['sumOfIn'] + $row3['sumOfTo'] + $row4['sumOfFor']);
                                            if ($total != 0) {
                                                echo number_format($total, 2);
                                             }
                                            else {
                                                echo '' . '0.00';
                                            }
                                        }
                                    }
                                }
                            }
                            ?>
                        </td>
                    </tr>
                    <tr>
                        <td>3</td>
                        <td>
                            <?php
                            $query = "SELECT SUM(payload_total) As sumOf63 FROM drivers WHERE `month`='1' AND `week`='3'";
                            $result = mysqli_query($conn, $query);
                            while ($row = mysqli_fetch_assoc($result)) {
                                $total = $row['sumOf63'];
                                if ($total != 0) {
                                    echo number_format($total, 2);
                                }
                                else {
                                    echo '' . '0.00';
                                }
                            }
                            ?>
                        </td>
                        <td style="background: #FFC107; color: black;">
                            <?php
                            $query = "SELECT SUM(service_value) As sumOf63 FROM drivers WHERE `month`='1' AND `week`='3'";
                            $result = mysqli_query($conn, $query);
                            while ($row = mysqli_fetch_assoc($result)) {
                                $total = $row['sumOf63'];
                                if ($total != 0) {
                                    echo number_format($total, 2);
                                }
                                else {
                                    echo '' . '0.00';
                                }
                            }
                            ?>
                        </td>
                        <td style="background: #FFC107; color: black;">
                            <?php
                            $query = "SELECT SUM(diesel) As sumOf63 FROM drivers WHERE `month`='1' AND `week`='3'";
                            $result = mysqli_query($conn, $query);
                            while ($row = mysqli_fetch_assoc($result)) {
                                $total = $row['sumOf63'];
                                if ($total != 0) {
                                    echo number_format($total, 2);
                                }
                                else {
                                    echo '' . '0.00';
                                }
                            }
                            ?>
                        </td>
                        <td style="background: #FFC107; color: black;">
                            <?php
                            $query = "SELECT SUM(trip_total) As sumOf63 FROM drivers WHERE `month`='1' AND `week`='3'";
                            $result = mysqli_query($conn, $query);
                            while ($row = mysqli_fetch_assoc($result)) {
                                $total = $row['sumOf63'];
                                if ($total != 0) {
                                    echo number_format($total, 2);
                                }
                                else {
                                    echo '' . '0.00';
                                }
                            }
                            ?>
                        </td>
                        <td style="background: #0D6EFD;">
                            <?php
                            $query = "SELECT SUM(payments) As sumOf61 FROM drivers WHERE `month`='1' AND `week`='3'";
                            $result = mysqli_query($conn, $query);
                            while ($row = mysqli_fetch_assoc($result)) {
                                $total = $row['sumOf61'];
                                if ($total != 0) {
                                    echo number_format($total, 2);
                                }
                                else {
                                    echo '' . '0.00';
                                }
                            }
                            ?>
                        </td>
                        <td style="background: red;">
                            <?php
                            $query = "SELECT SUM(discounts) As sumOf63 FROM drivers WHERE `month`='1' AND `week`='3'";
                            $result = mysqli_query($conn, $query);
                            while ($row = mysqli_fetch_assoc($result)) {
                                $total = $row['sumOf63'];
                                if ($total != 0) {
                                    echo number_format($total, 2);
                                }
                                else {
                                    echo '' . '0.00';
                                }
                            }
                            ?>
                        </td>
                        <td style="background: green;">
                            <?php
                            $query = "SELECT SUM(salary) As sumOf61 FROM drivers WHERE `month`='1' AND `week`='3'";
                            $result = mysqli_query($conn, $query);
                            while ($row = mysqli_fetch_assoc($result)) {
                                $total = $row['sumOf61'];
                                if ($total != 0) {
                                    echo number_format($total, 2);
                                }
                                else {
                                    echo '' . '0.00';
                                }
                            }
                            ?>
                        </td>
                        <td>
                            <?php
                            $query = "SELECT SUM(payload_total) As sumOf FROM drivers WHERE `month`='1' AND `week`='3'";
                            $query2 = "SELECT SUM(trip_total) As sumOfIn FROM drivers WHERE `month`='1' AND `week`='3'";
                            $query3 = "SELECT SUM(diesel) As sumOfTo FROM drivers WHERE `month`='1' AND `week`='3'";
                            $query4 = "SELECT SUM(service_value) As sumOfFor FROM drivers WHERE `month`='1' AND `week`='3'";
                            $total = 0;
                            $result = mysqli_query($conn, $query);
                            $result2 = mysqli_query($conn, $query2);
                            $result3 = mysqli_query($conn, $query3);
                            $result4 = mysqli_query($conn, $query4);

                            while ($row = mysqli_fetch_assoc($result)) {
                                while ($row2 = mysqli_fetch_assoc($result2)) {
                                    while ($row3 = mysqli_fetch_assoc($result3)) {
                                        while ($row4 = mysqli_fetch_assoc($result4)) {
                                            $total = $row['sumOf'] - ($row2['sumOfIn'] + $row3['sumOfTo'] + $row4['sumOfFor']);
                                            if ($total != 0) {
                                                echo number_format($total, 2);
                                             }
                                            else {
                                                echo '' . '0.00';
                                            }
                                        }
                                    }
                                }
                            }
                            ?>
                        </td>
                    </tr>
                    <tr>
                        <td>4</td>
                        <td>
                            <?php
                            $query = "SELECT SUM(payload_total) As sumOf64 FROM drivers WHERE `month`='1' AND `week`='4'";
                            $result = mysqli_query($conn, $query);
                            while ($row = mysqli_fetch_assoc($result)) {
                                $total = $row['sumOf64'];
                                if ($total != 0) {
                                    echo number_format($total, 2);
                                }
                                else {
                                    echo '' . '0.00';
                                }
                            }
                            ?>
                        </td>
                        <td style="background: #FFC107; color: black;">
                            <?php
                            $query = "SELECT SUM(service_value) As sumOf64 FROM drivers WHERE `month`='1' AND `week`='4'";
                            $result = mysqli_query($conn, $query);
                            while ($row = mysqli_fetch_assoc($result)) {
                                $total = $row['sumOf64'];
                                if ($total != 0) {
                                    echo number_format($total, 2);
                                }
                                else {
                                    echo '' . '0.00';
                                }
                            }
                            ?>
                        </td>
                        <td style="background: #FFC107; color: black;">
                            <?php
                            $query = "SELECT SUM(diesel) As sumOf64 FROM drivers WHERE `month`='1' AND `week`='4'";
                            $result = mysqli_query($conn, $query);
                            while ($row = mysqli_fetch_assoc($result)) {
                                $total = $row['sumOf64'];
                                if ($total != 0) {
                                    echo number_format($total, 2);
                                }
                                else {
                                    echo '' . '0.00';
                                }
                            }
                            ?>
                        </td>
                        <td style="background: #FFC107; color: black;">
                            <?php
                            $query = "SELECT SUM(trip_total) As sumOf64 FROM drivers WHERE `month`='1' AND `week`='4'";
                            $result = mysqli_query($conn, $query);
                            while ($row = mysqli_fetch_assoc($result)) {
                                $total = $row['sumOf64'];
                                if ($total != 0) {
                                    echo number_format($total, 2);
                                }
                                else {
                                    echo '' . '0.00';
                                }
                            }
                            ?>
                        </td>
                        <td style="background: #0D6EFD;">
                            <?php
                            $query = "SELECT SUM(payments) As sumOf61 FROM drivers WHERE `month`='1' AND `week`='4'";
                            $result = mysqli_query($conn, $query);
                            while ($row = mysqli_fetch_assoc($result)) {
                                $total = $row['sumOf61'];
                                if ($total != 0) {
                                    echo number_format($total, 2);
                                }
                                else {
                                    echo '' . '0.00';
                                }
                            }
                            ?>
                        </td>
                        <td style="background: red;">
                            <?php
                            $query = "SELECT SUM(discounts) As sumOf64 FROM drivers WHERE `month`='1' AND `week`='4'";
                            $result = mysqli_query($conn, $query);
                            while ($row = mysqli_fetch_assoc($result)) {
                                $total = $row['sumOf64'];
                                if ($total != 0) {
                                    echo number_format($total, 2);
                                }
                                else {
                                    echo '' . '0.00';
                                }
                            }
                            ?>
                        </td>
                        <td style="background: green;">
                            <?php
                            $query = "SELECT SUM(salary) As sumOf61 FROM drivers WHERE `month`='1' AND `week`='4'";
                            $result = mysqli_query($conn, $query);
                            while ($row = mysqli_fetch_assoc($result)) {
                                $total = $row['sumOf61'];
                                if ($total != 0) {
                                    echo number_format($total, 2);
                                }
                                else {
                                    echo '' . '0.00';
                                }
                            }
                            ?>
                        </td>
                        <td>
                            <?php
                            $query = "SELECT SUM(payload_total) As sumOf FROM drivers WHERE `month`='1' AND `week`='4'";
                            $query2 = "SELECT SUM(trip_total) As sumOfIn FROM drivers WHERE `month`='1' AND `week`='4'";
                            $query3 = "SELECT SUM(diesel) As sumOfTo FROM drivers WHERE `month`='1' AND `week`='4'";
                            $query4 = "SELECT SUM(service_value) As sumOfFor FROM drivers WHERE `month`='1' AND `week`='4'";
                            $total = 0;
                            $result = mysqli_query($conn, $query);
                            $result2 = mysqli_query($conn, $query2);
                            $result3 = mysqli_query($conn, $query3);
                            $result4 = mysqli_query($conn, $query4);

                            while ($row = mysqli_fetch_assoc($result)) {
                                while ($row2 = mysqli_fetch_assoc($result2)) {
                                    while ($row3 = mysqli_fetch_assoc($result3)) {
                                        while ($row4 = mysqli_fetch_assoc($result4)) {
                                            $total = $row['sumOf'] - ($row2['sumOfIn'] + $row3['sumOfTo'] + $row4['sumOfFor']);
                                            if ($total != 0) {
                                                echo number_format($total, 2);
                                             }
                                            else {
                                                echo '' . '0.00';
                                            }
                                        }
                                    }
                                }
                            }
                            ?>
                        </td>
                    </tr>
                </table>
                <!-- Modal -->
                    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="exampleModalLabel">التفاصيل</h1>
                                </div>
                                <div class="modal-body">
                                    <a>D</a>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">إغلاق</button>
                                    <button type="button" class="btn btn-primary">حفظ التغيرات</button>
                                </div>
                            </div>
                        </div>
                    </div>
                <p style="font-size: 24px;">
                    الصندوق = 
                    
                    (
                    
                    <a style="color: #FFC107; font-size: 22px;">إجمالي المصروفات</a>
                    
                    - 
                    
                    <!--<a style="color: #0D6EFD; font-size: 22px;">إجمالي الدفعات</a>-->
                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                        إجمالي الدفعات
                    </button>
                    

                    ) =
                    
                    <?php
                            $total = 0;
                            
                            $query1 = "SELECT SUM(payments) As sumOfBox1 FROM drivers WHERE `month`='1' AND `week`='1'";
                            $query2 = "SELECT SUM(trip_total) As sumOfInBox1 FROM drivers WHERE `month`='1' AND `week`='1'";
                            $query3 = "SELECT SUM(diesel) As sumOfToBox1 FROM drivers WHERE `month`='1' AND `week`='1'";
                            $query4 = "SELECT SUM(service_value) As sumOfForBox1 FROM drivers WHERE `month`='1' AND `week`='1'";
                            
                            $result1 = mysqli_query($conn, $query1);
                            $result2 = mysqli_query($conn, $query2);
                            $result3 = mysqli_query($conn, $query3);
                            $result4 = mysqli_query($conn, $query4);
                            
                            $query5 = "SELECT SUM(payments) As sumOfBox2 FROM drivers WHERE `month`='1' AND `week`='2'";
                            $query6 = "SELECT SUM(trip_total) As sumOfInBox2 FROM drivers WHERE `month`='1' AND `week`='2'";
                            $query7 = "SELECT SUM(diesel) As sumOfToBox2 FROM drivers WHERE `month`='1' AND `week`='2'";
                            $query8 = "SELECT SUM(service_value) As sumOfForBox2 FROM drivers WHERE `month`='1' AND `week`='2'";
                            
                            $query9 = "SELECT SUM(payments) As sumOfBox3 FROM drivers WHERE `month`='1' AND `week`='3'";
                            $query10 = "SELECT SUM(trip_total) As sumOfInBox3 FROM drivers WHERE `month`='1' AND `week`='3'";
                            $query11 = "SELECT SUM(diesel) As sumOfToBox3 FROM drivers WHERE `month`='1' AND `week`='3'";
                            $query12 = "SELECT SUM(service_value) As sumOfForBox3 FROM drivers WHERE `month`='1' AND `week`='3'";
                            
                            $query13 = "SELECT SUM(payments) As sumOfBox4 FROM drivers WHERE `month`='1' AND `week`='4'";
                            $query14 = "SELECT SUM(trip_total) As sumOfInBox4 FROM drivers WHERE `month`='1' AND `week`='4'";
                            $query15 = "SELECT SUM(diesel) As sumOfToBox4 FROM drivers WHERE `month`='1' AND `week`='4'";
                            $query16 = "SELECT SUM(service_value) As sumOfForBox4 FROM drivers WHERE `month`='1' AND `week`='4'";
                            
                            $result5 = mysqli_query($conn, $query5);
                            $result6 = mysqli_query($conn, $query6);
                            $result7 = mysqli_query($conn, $query7);
                            $result8 = mysqli_query($conn, $query8);
                            
                            $result9 = mysqli_query($conn, $query9);
                            $result10 = mysqli_query($conn, $query10);
                            $result11 = mysqli_query($conn, $query11);
                            $result12 = mysqli_query($conn, $query12);
                            
                            $result13 = mysqli_query($conn, $query13);
                            $result14 = mysqli_query($conn, $query14);
                            $result15 = mysqli_query($conn, $query15);
                            $result16 = mysqli_query($conn, $query16);
                            
                            while ($row1 = mysqli_fetch_assoc($result1)) {
                                while ($row2 = mysqli_fetch_assoc($result2)) {
                                    while ($row3 = mysqli_fetch_assoc($result3)) {
                                        while ($row4 = mysqli_fetch_assoc($result4)) {
                                            
                                            while ($row5 = mysqli_fetch_assoc($result5)) {
                                                while ($row6 = mysqli_fetch_assoc($result6)) {
                                                    while ($row7 = mysqli_fetch_assoc($result7)) {
                                                        while ($row8 = mysqli_fetch_assoc($result8)) {
                                                            
                                                            while ($row9 = mysqli_fetch_assoc($result9)) {
                                                                while ($row10 = mysqli_fetch_assoc($result10)) {
                                                                    while ($row11 = mysqli_fetch_assoc($result11)) {
                                                                        while ($row12 = mysqli_fetch_assoc($result12)) {
                                                                            
                                                                            while ($row13 = mysqli_fetch_assoc($result13)) {
                                                                                while ($row14 = mysqli_fetch_assoc($result14)) {
                                                                                    while ($row15 = mysqli_fetch_assoc($result15)) {
                                                                                        while ($row16 = mysqli_fetch_assoc($result16)) {
                                            
$total = ($row1['sumOfBox1'] - ($row2['sumOfInBox1'] + $row3['sumOfToBox1'] + $row4['sumOfForBox1']))
+ ($row5['sumOfBox2'] - ($row6['sumOfInBox2'] +  $row7['sumOfToBox2'] + $row8['sumOfForBox2']))
+ ($row9['sumOfBox3'] - ($row10['sumOfInBox3'] + $row11['sumOfToBox3'] + $row12['sumOfForBox3']))
+ ($row13['sumOfBox4'] - ($row14['sumOfInBox4'] + $row15['sumOfToBox4'] + $row16['sumOfForBox4']));
    $total_payment = $row1['sumOfBox1'] + $row5['sumOfBox2'] + $row9['sumOfBox3'] + $row13['sumOfBox4'];
    $total_s = ($row2['sumOfInBox1'] + $row3['sumOfToBox1'] + $row4['sumOfForBox1']) + 
    ($row6['sumOfInBox2'] +  $row7['sumOfToBox2'] + $row8['sumOfForBox2']) +
    ($row10['sumOfInBox3'] + $row11['sumOfToBox3'] + $row12['sumOfForBox3']) +
    ($row14['sumOfInBox4'] + $row15['sumOfToBox4'] + $row16['sumOfForBox4']);
                                                                                    if ($total != 0) {
    echo '<a style="color: #FFC107; font-size: 22px;">' . number_format($total_s, 2) . '</a>' . ' - ' . '<a style="color: blue; font-size: 22px;">' . number_format($total_payment, 2) . '</a>' . ' = ' . number_format($total, 2); 
                                                                                     }
                                                                                    else {
                                                                                        echo '' . '0.00';
                                                                                    }
                                                                            
                                                                                        
                                                                                    }
                                                                                }
                                                                            }
                                                                        }
                                                            
                                                                       
                                                                    }
                                                                }
                                                            }
                                                        }
                                                            
                                                        
                                                    }
                                                }
                                            }
                                        }
                                            
                                       
                                    }
                                }
                            }
                        }
                        ?>
                </p>
            </div>
            <div class="content">
                <driv class="row ">
                    <div class="col"><h2>شهر 2</h2></div>
                    <!--<div class="col-6">
                        <h3>
                            الدخل الشهري
                            <?php
                                    $total = 0;
                                    
                                    $query = "SELECT SUM(payload_total) As sumOf FROM drivers WHERE `month`='2' AND `week`='1'";
                                    $query2 = "SELECT SUM(trip_total) As sumOfIn FROM drivers WHERE `month`='2' AND `week`='1'";
                                    $query3 = "SELECT SUM(diesel) As sumOfTo FROM drivers WHERE `month`='2' AND `week`='1'";
                                    $query4 = "SELECT SUM(service_value) As sumOfFor FROM drivers WHERE `month`='2' AND `week`='1'";
                                    $result = mysqli_query($conn, $query);
                                    $result2 = mysqli_query($conn, $query2);
                                    $result3 = mysqli_query($conn, $query3);
                                    $result4 = mysqli_query($conn, $query4);
                                    
                                    $query5 = "SELECT SUM(payload_total) As sumOf2 FROM drivers WHERE `month`='2' AND `week`='2'";
                                    $query6 = "SELECT SUM(trip_total) As sumOfIn2 FROM drivers WHERE `month`='2' AND `week`='2'";
                                    $query7 = "SELECT SUM(diesel) As sumOfTo2 FROM drivers WHERE `month`='2' AND `week`='2'";
                                    $query8 = "SELECT SUM(service_value) As sumOfFor2 FROM drivers WHERE `month`='2' AND `week`='2'";
                                    
                                    $query9 = "SELECT SUM(payload_total) As sumOf3 FROM drivers WHERE `month`='2' AND `week`='3'";
                                    $query10 = "SELECT SUM(trip_total) As sumOfIn3 FROM drivers WHERE `month`='2' AND `week`='3'";
                                    $query11 = "SELECT SUM(diesel) As sumOfTo3 FROM drivers WHERE `month`='2' AND `week`='3'";
                                    $query12 = "SELECT SUM(service_value) As sumOfFor3 FROM drivers WHERE `month`='2' AND `week`='3'";
                                    
                                    $result5 = mysqli_query($conn, $query5);
                                    $result6 = mysqli_query($conn, $query6);
                                    $result7 = mysqli_query($conn, $query7);
                                    $result8 = mysqli_query($conn, $query8);
                                    
                                    $result9 = mysqli_query($conn, $query9);
                                    $result10 = mysqli_query($conn, $query10);
                                    $result11 = mysqli_query($conn, $query11);
                                    $result12 = mysqli_query($conn, $query12);
                                    
                                    while ($row = mysqli_fetch_assoc($result)) {
                                        while ($row2 = mysqli_fetch_assoc($result2)) {
                                            while ($row3 = mysqli_fetch_assoc($result3)) {
                                                while ($row4 = mysqli_fetch_assoc($result4)) {
                                                    
                                                    while ($row5 = mysqli_fetch_assoc($result5)) {
                                                        while ($row6 = mysqli_fetch_assoc($result6)) {
                                                            while ($row7 = mysqli_fetch_assoc($result7)) {
                                                                while ($row8 = mysqli_fetch_assoc($result8)) {
                                                                    
                                                                    while ($row9 = mysqli_fetch_assoc($result9)) {
                                                                        while ($row10 = mysqli_fetch_assoc($result10)) {
                                                                            while ($row11 = mysqli_fetch_assoc($result11)) {
                                                                                while ($row12 = mysqli_fetch_assoc($result12)) {
                                                    
                                                                                    $total = ($row['sumOf'] - ($row2['sumOfIn'] + $row3['sumOfTo'] + $row4['sumOfFor'])) + ($row5['sumOf2'] - ($row6['sumOfIn2'] + $row7['sumOfTo2'] + $row8['sumOfFor2'])) + ($row9['sumOf3'] - ($row10['sumOfIn3'] + $row11['sumOfTo3'] + $row12['sumOfFor3']));
                                                                                    if ($total != 0) {
                                                                                        echo number_format($total, 2);
                                                                                     }
                                                                                    else {
                                                                                        echo '' . '0.00';
                                                                                    }
                                                                    
                                                                                }
                                                                            }
                                                                        }
                                                                    }
                                                                    
                                                                }
                                                            }
                                                        }
                                                    }
                                                    
                                                }
                                            }
                                        }
                                    }
                                    ?>
                                <a style="color: #198754; font-size: 16px;">ريال سعودي</a>
                        </h3>
                    </div>-->
                </driv>
                <table class="table table-dark table-hover">
                    <tr>
                        <th>الأسبوع#</th>
                        <th>الحمولة</th>
                        <th style="background: #FFC107; color: black;">قيمة الخدمة</th>
                        <th style="background: #FFC107; color: black;">ديزل</th>
                        <th style="background: #FFC107; color: black;">التربات</th>
                        <th style="background: #0D6EFD;">الدفعات</th>
                        <th style="background: red;">الخصومات</th>
                        <th style="background: green;">الراتب</th>
                        <th>الدخل الأسبوعي</th>
                    </tr>
                    <tr>
                        <td>1</td>
                        <td>
                            <?php
                            $query = "SELECT SUM(payload_total) As sumOf61 FROM drivers WHERE `month`='2' AND `week`='1'";
                            $result = mysqli_query($conn, $query);
                            while ($row = mysqli_fetch_assoc($result)) {
                                $total = $row['sumOf61'];
                                if ($total != 0) {
                                    echo number_format($total, 2);
                                }
                                else {
                                    echo '' . '0.00';
                                }
                            }
                            ?>
                        </td>
                        <td style="background: #FFC107; color: black;">
                            <?php
                            $query = "SELECT SUM(service_value) As sumOf61 FROM drivers WHERE `month`='2' AND `week`='1'";
                            $result = mysqli_query($conn, $query);
                            while ($row = mysqli_fetch_assoc($result)) {
                                $total = $row['sumOf61'];
                                if ($total != 0) {
                                    echo number_format($total, 2);
                                }
                                else {
                                    echo '' . '0.00';
                                }
                            }
                            ?>
                        </td>
                        <td style="background: #FFC107; color: black;">
                            <?php
                            $query = "SELECT SUM(diesel) As sumOf61 FROM drivers WHERE `month`='2' AND `week`='1'";
                            $result = mysqli_query($conn, $query);
                            while ($row = mysqli_fetch_assoc($result)) {
                                $total = $row['sumOf61'];
                                if ($total != 0) {
                                    echo number_format($total, 2);
                                }
                                else {
                                    echo '' . '0.00';
                                }
                            }
                            ?>
                        </td>
                        <td style="background: #FFC107; color: black;">
                            <?php
                            $query = "SELECT SUM(trip_total) As sumOf61 FROM drivers WHERE `month`='2' AND `week`='1'";
                            $result = mysqli_query($conn, $query);
                            while ($row = mysqli_fetch_assoc($result)) {
                                $total = $row['sumOf61'];
                                if ($total != 0) {
                                    echo number_format($total, 2);
                                }
                                else {
                                    echo '' . '0.00';
                                }
                            }
                            ?>
                        </td>
                        <td style="background: #0D6EFD;">
                            <?php
                            $query = "SELECT SUM(payments) As sumOf61 FROM drivers WHERE `month`='2' AND `week`='1'";
                            $result = mysqli_query($conn, $query);
                            while ($row = mysqli_fetch_assoc($result)) {
                                $total = $row['sumOf61'];
                                if ($total != 0) {
                                    echo number_format($total, 2);
                                }
                                else {
                                    echo '' . '0.00';
                                }
                            }
                            ?>
                        </td>
                        <td style="background: red;">
                            <?php
                            $query = "SELECT SUM(discounts) As sumOf61 FROM drivers WHERE `month`='2' AND `week`='1'";
                            $result = mysqli_query($conn, $query);
                            while ($row = mysqli_fetch_assoc($result)) {
                                $total = $row['sumOf61'];
                                if ($total != 0) {
                                    echo number_format($total, 2);
                                }
                                else {
                                    echo '' . '0.00';
                                }
                            }
                            ?>
                        </td>
                        <td style="background: green;">
                            <?php
                            $query = "SELECT SUM(salary) As sumOf61 FROM drivers WHERE `month`='2' AND `week`='1'";
                            $result = mysqli_query($conn, $query);
                            while ($row = mysqli_fetch_assoc($result)) {
                                $total = $row['sumOf61'];
                                if ($total != 0) {
                                    echo number_format($total, 2);
                                }
                                else {
                                    echo '' . '0.00';
                                }
                            }
                            ?>
                        </td>
                        <td>
                            <?php
                            $query = "SELECT SUM(payload_total) As sumOf FROM drivers WHERE `month`='2' AND `week`='1'";
                            $query2 = "SELECT SUM(trip_total) As sumOfIn FROM drivers WHERE `month`='2' AND `week`='1'";
                            $query3 = "SELECT SUM(diesel) As sumOfTo FROM drivers WHERE `month`='2' AND `week`='1'";
                            $query4 = "SELECT SUM(service_value) As sumOfFor FROM drivers WHERE `month`='2' AND `week`='1'";
                            $total = 0;
                            $result = mysqli_query($conn, $query);
                            $result2 = mysqli_query($conn, $query2);
                            $result3 = mysqli_query($conn, $query3);
                            $result4 = mysqli_query($conn, $query4);

                            while ($row = mysqli_fetch_assoc($result)) {
                                while ($row2 = mysqli_fetch_assoc($result2)) {
                                    while ($row3 = mysqli_fetch_assoc($result3)) {
                                        while ($row4 = mysqli_fetch_assoc($result4)) {
                                            $total = $row['sumOf'] - ($row2['sumOfIn'] + $row3['sumOfTo'] + $row4['sumOfFor']);
                                            if ($total != 0) {
                                                echo number_format($total, 2);
                                             }
                                            else {
                                                echo '' . '0.00';
                                            }
                                        }
                                    }
                                }
                            }
                            ?>
                        </td>
                    </tr>
                    <tr>
                        <td>2</td>
                        <td>
                            <?php
                            $query = "SELECT SUM(payload_total) As sumOf62 FROM drivers WHERE `month`='2' AND `week`='2'";
                            $result = mysqli_query($conn, $query);
                            while ($row = mysqli_fetch_assoc($result)) {
                                $total = $row['sumOf62'];
                                if ($total != 0) {
                                    echo number_format($total, 2);
                                }
                                else {
                                    echo '' . '0.00';
                                }
                            }
                            ?>
                        </td>
                        <td style="background: #FFC107; color: black;">
                            <?php
                            $query = "SELECT SUM(service_value) As sumOf62 FROM drivers WHERE `month`='2' AND `week`='2'";
                            $result = mysqli_query($conn, $query);
                            while ($row = mysqli_fetch_assoc($result)) {
                                $total = $row['sumOf62'];
                                if ($total != 0) {
                                    echo number_format($total, 2);
                                }
                                else {
                                    echo '' . '0.00';
                                }
                            }
                            ?>
                        </td>
                        <td style="background: #FFC107; color: black;">
                            <?php
                            $query = "SELECT SUM(diesel) As sumOf62 FROM drivers WHERE `month`='2' AND `week`='2'";
                            $result = mysqli_query($conn, $query);
                            while ($row = mysqli_fetch_assoc($result)) {
                                $total = $row['sumOf62'];
                                if ($total != 0) {
                                    echo number_format($total, 2);
                                }
                                else {
                                    echo '' . '0.00';
                                }
                            }
                            ?>
                        </td>
                        <td style="background: #FFC107; color: black;">
                            <?php
                            $query = "SELECT SUM(trip_total) As sumOf62 FROM drivers WHERE `month`='2' AND `week`='2'";
                            $result = mysqli_query($conn, $query);
                            while ($row = mysqli_fetch_assoc($result)) {
                                $total = $row['sumOf62'];
                                if ($total != 0) {
                                    echo number_format($total, 2);
                                }
                                else {
                                    echo '' . '0.00';
                                }
                            }
                            ?>
                        </td>
                        <td style="background: #0D6EFD;">
                            <?php
                            $query = "SELECT SUM(payments) As sumOf61 FROM drivers WHERE `month`='2' AND `week`='2'";
                            $result = mysqli_query($conn, $query);
                            while ($row = mysqli_fetch_assoc($result)) {
                                $total = $row['sumOf61'];
                                if ($total != 0) {
                                    echo number_format($total, 2);
                                }
                                else {
                                    echo '' . '0.00';
                                }
                            }
                            ?>
                        </td>
                        <td style="background: red;">
                            <?php
                            $query = "SELECT SUM(discounts) As sumOf62 FROM drivers WHERE `month`='2' AND `week`='2'";
                            $result = mysqli_query($conn, $query);
                            while ($row = mysqli_fetch_assoc($result)) {
                                $total = $row['sumOf62'];
                                if ($total != 0) {
                                    echo number_format($total, 2);
                                }
                                else {
                                    echo '' . '0.00';
                                }
                            }
                            ?>
                        </td>
                        <td style="background: green;">
                            <?php
                            $query = "SELECT SUM(salary) As sumOf61 FROM drivers WHERE `month`='2' AND `week`='2'";
                            $result = mysqli_query($conn, $query);
                            while ($row = mysqli_fetch_assoc($result)) {
                                $total = $row['sumOf61'];
                                if ($total != 0) {
                                    echo number_format($total, 2);
                                }
                                else {
                                    echo '' . '0.00';
                                }
                            }
                            ?>
                        </td>
                        <td>
                            <?php
                            $query = "SELECT SUM(payload_total) As sumOf FROM drivers WHERE `month`='2' AND `week`='2'";
                            $query2 = "SELECT SUM(trip_total) As sumOfIn FROM drivers WHERE `month`='2' AND `week`='2'";
                            $query3 = "SELECT SUM(diesel) As sumOfTo FROM drivers WHERE `month`='2' AND `week`='2'";
                            $query4 = "SELECT SUM(service_value) As sumOfFor FROM drivers WHERE `month`='2' AND `week`='2'";
                            $total = 0;
                            $result = mysqli_query($conn, $query);
                            $result2 = mysqli_query($conn, $query2);
                            $result3 = mysqli_query($conn, $query3);
                            $result4 = mysqli_query($conn, $query4);

                            while ($row = mysqli_fetch_assoc($result)) {
                                while ($row2 = mysqli_fetch_assoc($result2)) {
                                    while ($row3 = mysqli_fetch_assoc($result3)) {
                                        while ($row4 = mysqli_fetch_assoc($result4)) {
                                            $total = $row['sumOf'] - ($row2['sumOfIn'] + $row3['sumOfTo'] + $row4['sumOfFor']);
                                            if ($total != 0) {
                                                echo number_format($total, 2);
                                             }
                                            else {
                                                echo '' . '0.00';
                                            }
                                        }
                                    }
                                }
                            }
                            ?>
                        </td>
                    </tr>
                    <tr>
                        <td>3</td>
                        <td>
                            <?php
                            $query = "SELECT SUM(payload_total) As sumOf63 FROM drivers WHERE `month`='2' AND `week`='3'";
                            $result = mysqli_query($conn, $query);
                            while ($row = mysqli_fetch_assoc($result)) {
                                $total = $row['sumOf63'];
                                if ($total != 0) {
                                    echo number_format($total, 2);
                                }
                                else {
                                    echo '' . '0.00';
                                }
                            }
                            ?>
                        </td>
                        <td style="background: #FFC107; color: black;">
                            <?php
                            $query = "SELECT SUM(service_value) As sumOf63 FROM drivers WHERE `month`='2' AND `week`='3'";
                            $result = mysqli_query($conn, $query);
                            while ($row = mysqli_fetch_assoc($result)) {
                                $total = $row['sumOf63'];
                                if ($total != 0) {
                                    echo number_format($total, 2);
                                }
                                else {
                                    echo '' . '0.00';
                                }
                            }
                            ?>
                        </td>
                        <td style="background: #FFC107; color: black;">
                            <?php
                            $query = "SELECT SUM(diesel) As sumOf63 FROM drivers WHERE `month`='2' AND `week`='3'";
                            $result = mysqli_query($conn, $query);
                            while ($row = mysqli_fetch_assoc($result)) {
                                $total = $row['sumOf63'];
                                if ($total != 0) {
                                    echo number_format($total, 2);
                                }
                                else {
                                    echo '' . '0.00';
                                }
                            }
                            ?>
                        </td>
                        <td style="background: #FFC107; color: black;">
                            <?php
                            $query = "SELECT SUM(trip_total) As sumOf63 FROM drivers WHERE `month`='2' AND `week`='3'";
                            $result = mysqli_query($conn, $query);
                            while ($row = mysqli_fetch_assoc($result)) {
                                $total = $row['sumOf63'];
                                if ($total != 0) {
                                    echo number_format($total, 2);
                                }
                                else {
                                    echo '' . '0.00';
                                }
                            }
                            ?>
                        </td>
                        <td style="background: #0D6EFD;">
                            <?php
                            $query = "SELECT SUM(payments) As sumOf61 FROM drivers WHERE `month`='2' AND `week`='3'";
                            $result = mysqli_query($conn, $query);
                            while ($row = mysqli_fetch_assoc($result)) {
                                $total = $row['sumOf61'];
                                if ($total != 0) {
                                    echo number_format($total, 2);
                                }
                                else {
                                    echo '' . '0.00';
                                }
                            }
                            ?>
                        </td>
                        <td style="background: red;">
                            <?php
                            $query = "SELECT SUM(discounts) As sumOf63 FROM drivers WHERE `month`='2' AND `week`='3'";
                            $result = mysqli_query($conn, $query);
                            while ($row = mysqli_fetch_assoc($result)) {
                                $total = $row['sumOf63'];
                                if ($total != 0) {
                                    echo number_format($total, 2);
                                }
                                else {
                                    echo '' . '0.00';
                                }
                            }
                            ?>
                        </td>
                        <td style="background: green;">
                            <?php
                            $query = "SELECT SUM(salary) As sumOf61 FROM drivers WHERE `month`='2' AND `week`='3'";
                            $result = mysqli_query($conn, $query);
                            while ($row = mysqli_fetch_assoc($result)) {
                                $total = $row['sumOf61'];
                                if ($total != 0) {
                                    echo number_format($total, 2);
                                }
                                else {
                                    echo '' . '0.00';
                                }
                            }
                            ?>
                        </td>
                        <td>
                            <?php
                            $query = "SELECT SUM(payload_total) As sumOf FROM drivers WHERE `month`='2' AND `week`='3'";
                            $query2 = "SELECT SUM(trip_total) As sumOfIn FROM drivers WHERE `month`='2' AND `week`='3'";
                            $query3 = "SELECT SUM(diesel) As sumOfTo FROM drivers WHERE `month`='2' AND `week`='3'";
                            $query4 = "SELECT SUM(service_value) As sumOfFor FROM drivers WHERE `month`='2' AND `week`='3'";
                            $total = 0;
                            $result = mysqli_query($conn, $query);
                            $result2 = mysqli_query($conn, $query2);
                            $result3 = mysqli_query($conn, $query3);
                            $result4 = mysqli_query($conn, $query4);

                            while ($row = mysqli_fetch_assoc($result)) {
                                while ($row2 = mysqli_fetch_assoc($result2)) {
                                    while ($row3 = mysqli_fetch_assoc($result3)) {
                                        while ($row4 = mysqli_fetch_assoc($result4)) {
                                            $total = $row['sumOf'] - ($row2['sumOfIn'] + $row3['sumOfTo'] + $row4['sumOfFor']);
                                            if ($total != 0) {
                                                echo number_format($total, 2);
                                             }
                                            else {
                                                echo '' . '0.00';
                                            }
                                        }
                                    }
                                }
                            }
                            ?>
                        </td>
                    </tr>
                    <tr>
                        <td>4</td>
                        <td>
                            <?php
                            $query = "SELECT SUM(payload_total) As sumOf64 FROM drivers WHERE `month`='2' AND `week`='4'";
                            $result = mysqli_query($conn, $query);
                            while ($row = mysqli_fetch_assoc($result)) {
                                $total = $row['sumOf64'];
                                if ($total != 0) {
                                    echo number_format($total, 2);
                                }
                                else {
                                    echo '' . '0.00';
                                }
                            }
                            ?>
                        </td>
                        <td style="background: #FFC107; color: black;">
                            <?php
                            $query = "SELECT SUM(service_value) As sumOf64 FROM drivers WHERE `month`='2' AND `week`='4'";
                            $result = mysqli_query($conn, $query);
                            while ($row = mysqli_fetch_assoc($result)) {
                                $total = $row['sumOf64'];
                                if ($total != 0) {
                                    echo number_format($total, 2);
                                }
                                else {
                                    echo '' . '0.00';
                                }
                            }
                            ?>
                        </td>
                        <td style="background: #FFC107; color: black;">
                            <?php
                            $query = "SELECT SUM(diesel) As sumOf64 FROM drivers WHERE `month`='2' AND `week`='4'";
                            $result = mysqli_query($conn, $query);
                            while ($row = mysqli_fetch_assoc($result)) {
                                $total = $row['sumOf64'];
                                if ($total != 0) {
                                    echo number_format($total, 2);
                                }
                                else {
                                    echo '' . '0.00';
                                }
                            }
                            ?>
                        </td>
                        <td style="background: #FFC107; color: black;">
                            <?php
                            $query = "SELECT SUM(trip_total) As sumOf64 FROM drivers WHERE `month`='2' AND `week`='4'";
                            $result = mysqli_query($conn, $query);
                            while ($row = mysqli_fetch_assoc($result)) {
                                $total = $row['sumOf64'];
                                if ($total != 0) {
                                    echo number_format($total, 2);
                                }
                                else {
                                    echo '' . '0.00';
                                }
                            }
                            ?>
                        </td>
                        <td style="background: #0D6EFD;">
                            <?php
                            $query = "SELECT SUM(payments) As sumOf61 FROM drivers WHERE `month`='2' AND `week`='4'";
                            $result = mysqli_query($conn, $query);
                            while ($row = mysqli_fetch_assoc($result)) {
                                $total = $row['sumOf61'];
                                if ($total != 0) {
                                    echo number_format($total, 2);
                                }
                                else {
                                    echo '' . '0.00';
                                }
                            }
                            ?>
                        </td>
                        <td style="background: red;">
                            <?php
                            $query = "SELECT SUM(discounts) As sumOf64 FROM drivers WHERE `month`='2' AND `week`='4'";
                            $result = mysqli_query($conn, $query);
                            while ($row = mysqli_fetch_assoc($result)) {
                                $total = $row['sumOf64'];
                                if ($total != 0) {
                                    echo number_format($total, 2);
                                }
                                else {
                                    echo '' . '0.00';
                                }
                            }
                            ?>
                        </td>
                        <td style="background: green;">
                            <?php
                            $query = "SELECT SUM(salary) As sumOf61 FROM drivers WHERE `month`='2' AND `week`='4'";
                            $result = mysqli_query($conn, $query);
                            while ($row = mysqli_fetch_assoc($result)) {
                                $total = $row['sumOf61'];
                                if ($total != 0) {
                                    echo number_format($total, 2);
                                }
                                else {
                                    echo '' . '0.00';
                                }
                            }
                            ?>
                        </td>
                        <td>
                            <?php
                            $query = "SELECT SUM(payload_total) As sumOf FROM drivers WHERE `month`='2' AND `week`='4'";
                            $query2 = "SELECT SUM(trip_total) As sumOfIn FROM drivers WHERE `month`='2' AND `week`='4'";
                            $query3 = "SELECT SUM(diesel) As sumOfTo FROM drivers WHERE `month`='2' AND `week`='4'";
                            $query4 = "SELECT SUM(service_value) As sumOfFor FROM drivers WHERE `month`='2' AND `week`='4'";
                            $total = 0;
                            $result = mysqli_query($conn, $query);
                            $result2 = mysqli_query($conn, $query2);
                            $result3 = mysqli_query($conn, $query3);
                            $result4 = mysqli_query($conn, $query4);

                            while ($row = mysqli_fetch_assoc($result)) {
                                while ($row2 = mysqli_fetch_assoc($result2)) {
                                    while ($row3 = mysqli_fetch_assoc($result3)) {
                                        while ($row4 = mysqli_fetch_assoc($result4)) {
                                            $total = $row['sumOf'] - ($row2['sumOfIn'] + $row3['sumOfTo'] + $row4['sumOfFor']);
                                            if ($total != 0) {
                                                echo number_format($total, 2);
                                             }
                                            else {
                                                echo '' . '0.00';
                                            }
                                        }
                                    }
                                }
                            }
                            ?>
                        </td>
                    </tr>
                </table>
                <!-- Modal -->
                    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="exampleModalLabel">التفاصيل</h1>
                                </div>
                                <div class="modal-body">
                                    <a>D</a>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">إغلاق</button>
                                    <button type="button" class="btn btn-primary">حفظ التغيرات</button>
                                </div>
                            </div>
                        </div>
                    </div>
                <p style="font-size: 24px;">
                    الصندوق = 
                    
                    (
                    
                    <a style="color: #FFC107; font-size: 22px;">إجمالي المصروفات</a>
                    
                    - 
                    
                    <!--<a style="color: #0D6EFD; font-size: 22px;">إجمالي الدفعات</a>-->
                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                        إجمالي الدفعات
                    </button>
                    

                    ) =
                    
                    <?php
                            $total = 0;
                            
                            $query1 = "SELECT SUM(payments) As sumOfBox1 FROM drivers WHERE `month`='2' AND `week`='1'";
                            $query2 = "SELECT SUM(trip_total) As sumOfInBox1 FROM drivers WHERE `month`='2' AND `week`='1'";
                            $query3 = "SELECT SUM(diesel) As sumOfToBox1 FROM drivers WHERE `month`='2' AND `week`='1'";
                            $query4 = "SELECT SUM(service_value) As sumOfForBox1 FROM drivers WHERE `month`='2' AND `week`='1'";
                            
                            $result1 = mysqli_query($conn, $query1);
                            $result2 = mysqli_query($conn, $query2);
                            $result3 = mysqli_query($conn, $query3);
                            $result4 = mysqli_query($conn, $query4);
                            
                            $query5 = "SELECT SUM(payments) As sumOfBox2 FROM drivers WHERE `month`='2' AND `week`='2'";
                            $query6 = "SELECT SUM(trip_total) As sumOfInBox2 FROM drivers WHERE `month`='2' AND `week`='2'";
                            $query7 = "SELECT SUM(diesel) As sumOfToBox2 FROM drivers WHERE `month`='2' AND `week`='2'";
                            $query8 = "SELECT SUM(service_value) As sumOfForBox2 FROM drivers WHERE `month`='2' AND `week`='2'";
                            
                            $query9 = "SELECT SUM(payments) As sumOfBox3 FROM drivers WHERE `month`='2' AND `week`='3'";
                            $query10 = "SELECT SUM(trip_total) As sumOfInBox3 FROM drivers WHERE `month`='2' AND `week`='3'";
                            $query11 = "SELECT SUM(diesel) As sumOfToBox3 FROM drivers WHERE `month`='2' AND `week`='3'";
                            $query12 = "SELECT SUM(service_value) As sumOfForBox3 FROM drivers WHERE `month`='2' AND `week`='3'";
                            
                            $query13 = "SELECT SUM(payments) As sumOfBox4 FROM drivers WHERE `month`='2' AND `week`='4'";
                            $query14 = "SELECT SUM(trip_total) As sumOfInBox4 FROM drivers WHERE `month`='2' AND `week`='4'";
                            $query15 = "SELECT SUM(diesel) As sumOfToBox4 FROM drivers WHERE `month`='2' AND `week`='4'";
                            $query16 = "SELECT SUM(service_value) As sumOfForBox4 FROM drivers WHERE `month`='2' AND `week`='4'";
                            
                            $result5 = mysqli_query($conn, $query5);
                            $result6 = mysqli_query($conn, $query6);
                            $result7 = mysqli_query($conn, $query7);
                            $result8 = mysqli_query($conn, $query8);
                            
                            $result9 = mysqli_query($conn, $query9);
                            $result10 = mysqli_query($conn, $query10);
                            $result11 = mysqli_query($conn, $query11);
                            $result12 = mysqli_query($conn, $query12);
                            
                            $result13 = mysqli_query($conn, $query13);
                            $result14 = mysqli_query($conn, $query14);
                            $result15 = mysqli_query($conn, $query15);
                            $result16 = mysqli_query($conn, $query16);
                            
                            while ($row1 = mysqli_fetch_assoc($result1)) {
                                while ($row2 = mysqli_fetch_assoc($result2)) {
                                    while ($row3 = mysqli_fetch_assoc($result3)) {
                                        while ($row4 = mysqli_fetch_assoc($result4)) {
                                            
                                            while ($row5 = mysqli_fetch_assoc($result5)) {
                                                while ($row6 = mysqli_fetch_assoc($result6)) {
                                                    while ($row7 = mysqli_fetch_assoc($result7)) {
                                                        while ($row8 = mysqli_fetch_assoc($result8)) {
                                                            
                                                            while ($row9 = mysqli_fetch_assoc($result9)) {
                                                                while ($row10 = mysqli_fetch_assoc($result10)) {
                                                                    while ($row11 = mysqli_fetch_assoc($result11)) {
                                                                        while ($row12 = mysqli_fetch_assoc($result12)) {
                                                                            
                                                                            while ($row13 = mysqli_fetch_assoc($result13)) {
                                                                                while ($row14 = mysqli_fetch_assoc($result14)) {
                                                                                    while ($row15 = mysqli_fetch_assoc($result15)) {
                                                                                        while ($row16 = mysqli_fetch_assoc($result16)) {
                                            
$total = ($row1['sumOfBox1'] - ($row2['sumOfInBox1'] + $row3['sumOfToBox1'] + $row4['sumOfForBox1']))
+ ($row5['sumOfBox2'] - ($row6['sumOfInBox2'] +  $row7['sumOfToBox2'] + $row8['sumOfForBox2']))
+ ($row9['sumOfBox3'] - ($row10['sumOfInBox3'] + $row11['sumOfToBox3'] + $row12['sumOfForBox3']))
+ ($row13['sumOfBox4'] - ($row14['sumOfInBox4'] + $row15['sumOfToBox4'] + $row16['sumOfForBox4']));
    $total_payment = $row1['sumOfBox1'] + $row5['sumOfBox2'] + $row9['sumOfBox3'] + $row13['sumOfBox4'];
    $total_s = ($row2['sumOfInBox1'] + $row3['sumOfToBox1'] + $row4['sumOfForBox1']) + 
    ($row6['sumOfInBox2'] +  $row7['sumOfToBox2'] + $row8['sumOfForBox2']) +
    ($row10['sumOfInBox3'] + $row11['sumOfToBox3'] + $row12['sumOfForBox3']) +
    ($row14['sumOfInBox4'] + $row15['sumOfToBox4'] + $row16['sumOfForBox4']);
                                                                                    if ($total != 0) {
    echo '<a style="color: #FFC107; font-size: 22px;">' . number_format($total_s, 2) . '</a>' . ' - ' . '<a style="color: blue; font-size: 22px;">' . number_format($total_payment, 2) . '</a>' . ' = ' . number_format($total, 2); 
                                                                                     }
                                                                                    else {
                                                                                        echo '' . '0.00';
                                                                                    }
                                                                            
                                                                                        
                                                                                    }
                                                                                }
                                                                            }
                                                                        }
                                                            
                                                                       
                                                                    }
                                                                }
                                                            }
                                                        }
                                                            
                                                        
                                                    }
                                                }
                                            }
                                        }
                                            
                                       
                                    }
                                }
                            }
                        }
                        ?>
                </p>
            </div>
            <div class="content">
                <driv class="row ">
                    <div class="col"><h2>شهر 3</h2></div>
                    <!--<div class="col-6">
                        <h3>
                            الدخل الشهري
                            <?php
                                    $total = 0;
                                    
                                    $query = "SELECT SUM(payload_total) As sumOf FROM drivers WHERE `month`='3' AND `week`='1'";
                                    $query2 = "SELECT SUM(trip_total) As sumOfIn FROM drivers WHERE `month`='3' AND `week`='1'";
                                    $query3 = "SELECT SUM(diesel) As sumOfTo FROM drivers WHERE `month`='3' AND `week`='1'";
                                    $query4 = "SELECT SUM(service_value) As sumOfFor FROM drivers WHERE `month`='3' AND `week`='1'";
                                    $result = mysqli_query($conn, $query);
                                    $result2 = mysqli_query($conn, $query2);
                                    $result3 = mysqli_query($conn, $query3);
                                    $result4 = mysqli_query($conn, $query4);
                                    
                                    $query5 = "SELECT SUM(payload_total) As sumOf2 FROM drivers WHERE `month`='3' AND `week`='2'";
                                    $query6 = "SELECT SUM(trip_total) As sumOfIn2 FROM drivers WHERE `month`='3' AND `week`='2'";
                                    $query7 = "SELECT SUM(diesel) As sumOfTo2 FROM drivers WHERE `month`='3' AND `week`='2'";
                                    $query8 = "SELECT SUM(service_value) As sumOfFor2 FROM drivers WHERE `month`='3' AND `week`='2'";
                                    
                                    $query9 = "SELECT SUM(payload_total) As sumOf3 FROM drivers WHERE `month`='3' AND `week`='3'";
                                    $query10 = "SELECT SUM(trip_total) As sumOfIn3 FROM drivers WHERE `month`='3' AND `week`='3'";
                                    $query11 = "SELECT SUM(diesel) As sumOfTo3 FROM drivers WHERE `month`='3' AND `week`='3'";
                                    $query12 = "SELECT SUM(service_value) As sumOfFor3 FROM drivers WHERE `month`='3' AND `week`='3'";
                                    
                                    $result5 = mysqli_query($conn, $query5);
                                    $result6 = mysqli_query($conn, $query6);
                                    $result7 = mysqli_query($conn, $query7);
                                    $result8 = mysqli_query($conn, $query8);
                                    
                                    $result9 = mysqli_query($conn, $query9);
                                    $result10 = mysqli_query($conn, $query10);
                                    $result11 = mysqli_query($conn, $query11);
                                    $result12 = mysqli_query($conn, $query12);
                                    
                                    while ($row = mysqli_fetch_assoc($result)) {
                                        while ($row2 = mysqli_fetch_assoc($result2)) {
                                            while ($row3 = mysqli_fetch_assoc($result3)) {
                                                while ($row4 = mysqli_fetch_assoc($result4)) {
                                                    
                                                    while ($row5 = mysqli_fetch_assoc($result5)) {
                                                        while ($row6 = mysqli_fetch_assoc($result6)) {
                                                            while ($row7 = mysqli_fetch_assoc($result7)) {
                                                                while ($row8 = mysqli_fetch_assoc($result8)) {
                                                                    
                                                                    while ($row9 = mysqli_fetch_assoc($result9)) {
                                                                        while ($row10 = mysqli_fetch_assoc($result10)) {
                                                                            while ($row11 = mysqli_fetch_assoc($result11)) {
                                                                                while ($row12 = mysqli_fetch_assoc($result12)) {
                                                    
                                                                                    $total = ($row['sumOf'] - ($row2['sumOfIn'] + $row3['sumOfTo'] + $row4['sumOfFor'])) + ($row5['sumOf2'] - ($row6['sumOfIn2'] + $row7['sumOfTo2'] + $row8['sumOfFor2'])) + ($row9['sumOf3'] - ($row10['sumOfIn3'] + $row11['sumOfTo3'] + $row12['sumOfFor3']));
                                                                                    if ($total != 0) {
                                                                                        echo number_format($total, 2);
                                                                                     }
                                                                                    else {
                                                                                        echo '' . '0.00';
                                                                                    }
                                                                    
                                                                                }
                                                                            }
                                                                        }
                                                                    }
                                                                    
                                                                }
                                                            }
                                                        }
                                                    }
                                                    
                                                }
                                            }
                                        }
                                    }
                                    ?>
                                <a style="color: #198754; font-size: 16px;">ريال سعودي</a>
                        </h3>
                    </div>-->
                </driv>
                <table class="table table-dark table-hover">
                    <tr>
                        <th>الأسبوع#</th>
                        <th>الحمولة</th>
                        <th style="background: #FFC107; color: black;">قيمة الخدمة</th>
                        <th style="background: #FFC107; color: black;">ديزل</th>
                        <th style="background: #FFC107; color: black;">التربات</th>
                        <th style="background: #0D6EFD;">الدفعات</th>
                        <th style="background: red;">الخصومات</th>
                        <th style="background: green;">الراتب</th>
                        <th>الدخل الأسبوعي</th>
                    </tr>
                    <tr>
                        <td>1</td>
                        <td>
                            <?php
                            $query = "SELECT SUM(payload_total) As sumOf61 FROM drivers WHERE `month`='3' AND `week`='1'";
                            $result = mysqli_query($conn, $query);
                            while ($row = mysqli_fetch_assoc($result)) {
                                $total = $row['sumOf61'];
                                if ($total != 0) {
                                    echo number_format($total, 2);
                                }
                                else {
                                    echo '' . '0.00';
                                }
                            }
                            ?>
                        </td>
                        <td style="background: #FFC107; color: black;">
                            <?php
                            $query = "SELECT SUM(service_value) As sumOf61 FROM drivers WHERE `month`='3' AND `week`='1'";
                            $result = mysqli_query($conn, $query);
                            while ($row = mysqli_fetch_assoc($result)) {
                                $total = $row['sumOf61'];
                                if ($total != 0) {
                                    echo number_format($total, 2);
                                }
                                else {
                                    echo '' . '0.00';
                                }
                            }
                            ?>
                        </td>
                        <td style="background: #FFC107; color: black;">
                            <?php
                            $query = "SELECT SUM(diesel) As sumOf61 FROM drivers WHERE `month`='3' AND `week`='1'";
                            $result = mysqli_query($conn, $query);
                            while ($row = mysqli_fetch_assoc($result)) {
                                $total = $row['sumOf61'];
                                if ($total != 0) {
                                    echo number_format($total, 2);
                                }
                                else {
                                    echo '' . '0.00';
                                }
                            }
                            ?>
                        </td>
                        <td style="background: #FFC107; color: black;">
                            <?php
                            $query = "SELECT SUM(trip_total) As sumOf61 FROM drivers WHERE `month`='3' AND `week`='1'";
                            $result = mysqli_query($conn, $query);
                            while ($row = mysqli_fetch_assoc($result)) {
                                $total = $row['sumOf61'];
                                if ($total != 0) {
                                    echo number_format($total, 2);
                                }
                                else {
                                    echo '' . '0.00';
                                }
                            }
                            ?>
                        </td>
                        <td style="background: #0D6EFD;">
                            <?php
                            $query = "SELECT SUM(payments) As sumOf61 FROM drivers WHERE `month`='3' AND `week`='1'";
                            $result = mysqli_query($conn, $query);
                            while ($row = mysqli_fetch_assoc($result)) {
                                $total = $row['sumOf61'];
                                if ($total != 0) {
                                    echo number_format($total, 2);
                                }
                                else {
                                    echo '' . '0.00';
                                }
                            }
                            ?>
                        </td>
                        <td style="background: red;">
                            <?php
                            $query = "SELECT SUM(discounts) As sumOf61 FROM drivers WHERE `month`='3' AND `week`='1'";
                            $result = mysqli_query($conn, $query);
                            while ($row = mysqli_fetch_assoc($result)) {
                                $total = $row['sumOf61'];
                                if ($total != 0) {
                                    echo number_format($total, 2);
                                }
                                else {
                                    echo '' . '0.00';
                                }
                            }
                            ?>
                        </td>
                        <td style="background: green;">
                            <?php
                            $query = "SELECT SUM(salary) As sumOf61 FROM drivers WHERE `month`='3' AND `week`='1'";
                            $result = mysqli_query($conn, $query);
                            while ($row = mysqli_fetch_assoc($result)) {
                                $total = $row['sumOf61'];
                                if ($total != 0) {
                                    echo number_format($total, 2);
                                }
                                else {
                                    echo '' . '0.00';
                                }
                            }
                            ?>
                        </td>
                        <td>
                            <?php
                            $query = "SELECT SUM(payload_total) As sumOf FROM drivers WHERE `month`='3' AND `week`='1'";
                            $query2 = "SELECT SUM(trip_total) As sumOfIn FROM drivers WHERE `month`='3' AND `week`='1'";
                            $query3 = "SELECT SUM(diesel) As sumOfTo FROM drivers WHERE `month`='3' AND `week`='1'";
                            $query4 = "SELECT SUM(service_value) As sumOfFor FROM drivers WHERE `month`='3' AND `week`='1'";
                            $total = 0;
                            $result = mysqli_query($conn, $query);
                            $result2 = mysqli_query($conn, $query2);
                            $result3 = mysqli_query($conn, $query3);
                            $result4 = mysqli_query($conn, $query4);

                            while ($row = mysqli_fetch_assoc($result)) {
                                while ($row2 = mysqli_fetch_assoc($result2)) {
                                    while ($row3 = mysqli_fetch_assoc($result3)) {
                                        while ($row4 = mysqli_fetch_assoc($result4)) {
                                            $total = $row['sumOf'] - ($row2['sumOfIn'] + $row3['sumOfTo'] + $row4['sumOfFor']);
                                            if ($total != 0) {
                                                echo number_format($total, 2);
                                             }
                                            else {
                                                echo '' . '0.00';
                                            }
                                        }
                                    }
                                }
                            }
                            ?>
                        </td>
                    </tr>
                    <tr>
                        <td>2</td>
                        <td>
                            <?php
                            $query = "SELECT SUM(payload_total) As sumOf62 FROM drivers WHERE `month`='3' AND `week`='2'";
                            $result = mysqli_query($conn, $query);
                            while ($row = mysqli_fetch_assoc($result)) {
                                $total = $row['sumOf62'];
                                if ($total != 0) {
                                    echo number_format($total, 2);
                                }
                                else {
                                    echo '' . '0.00';
                                }
                            }
                            ?>
                        </td>
                        <td style="background: #FFC107; color: black;">
                            <?php
                            $query = "SELECT SUM(service_value) As sumOf62 FROM drivers WHERE `month`='3' AND `week`='2'";
                            $result = mysqli_query($conn, $query);
                            while ($row = mysqli_fetch_assoc($result)) {
                                $total = $row['sumOf62'];
                                if ($total != 0) {
                                    echo number_format($total, 2);
                                }
                                else {
                                    echo '' . '0.00';
                                }
                            }
                            ?>
                        </td>
                        <td style="background: #FFC107; color: black;">
                            <?php
                            $query = "SELECT SUM(diesel) As sumOf62 FROM drivers WHERE `month`='3' AND `week`='2'";
                            $result = mysqli_query($conn, $query);
                            while ($row = mysqli_fetch_assoc($result)) {
                                $total = $row['sumOf62'];
                                if ($total != 0) {
                                    echo number_format($total, 2);
                                }
                                else {
                                    echo '' . '0.00';
                                }
                            }
                            ?>
                        </td>
                        <td style="background: #FFC107; color: black;">
                            <?php
                            $query = "SELECT SUM(trip_total) As sumOf62 FROM drivers WHERE `month`='3' AND `week`='2'";
                            $result = mysqli_query($conn, $query);
                            while ($row = mysqli_fetch_assoc($result)) {
                                $total = $row['sumOf62'];
                                if ($total != 0) {
                                    echo number_format($total, 2);
                                }
                                else {
                                    echo '' . '0.00';
                                }
                            }
                            ?>
                        </td>
                        <td style="background: #0D6EFD;">
                            <?php
                            $query = "SELECT SUM(payments) As sumOf61 FROM drivers WHERE `month`='3' AND `week`='2'";
                            $result = mysqli_query($conn, $query);
                            while ($row = mysqli_fetch_assoc($result)) {
                                $total = $row['sumOf61'];
                                if ($total != 0) {
                                    echo number_format($total, 2);
                                }
                                else {
                                    echo '' . '0.00';
                                }
                            }
                            ?>
                        </td>
                        <td style="background: red;">
                            <?php
                            $query = "SELECT SUM(discounts) As sumOf62 FROM drivers WHERE `month`='3' AND `week`='2'";
                            $result = mysqli_query($conn, $query);
                            while ($row = mysqli_fetch_assoc($result)) {
                                $total = $row['sumOf62'];
                                if ($total != 0) {
                                    echo number_format($total, 2);
                                }
                                else {
                                    echo '' . '0.00';
                                }
                            }
                            ?>
                        </td>
                        <td style="background: green;">
                            <?php
                            $query = "SELECT SUM(salary) As sumOf61 FROM drivers WHERE `month`='3' AND `week`='2'";
                            $result = mysqli_query($conn, $query);
                            while ($row = mysqli_fetch_assoc($result)) {
                                $total = $row['sumOf61'];
                                if ($total != 0) {
                                    echo number_format($total, 2);
                                }
                                else {
                                    echo '' . '0.00';
                                }
                            }
                            ?>
                        </td>
                        <td>
                            <?php
                            $query = "SELECT SUM(payload_total) As sumOf FROM drivers WHERE `month`='3' AND `week`='2'";
                            $query2 = "SELECT SUM(trip_total) As sumOfIn FROM drivers WHERE `month`='3' AND `week`='2'";
                            $query3 = "SELECT SUM(diesel) As sumOfTo FROM drivers WHERE `month`='3' AND `week`='2'";
                            $query4 = "SELECT SUM(service_value) As sumOfFor FROM drivers WHERE `month`='3' AND `week`='2'";
                            $total = 0;
                            $result = mysqli_query($conn, $query);
                            $result2 = mysqli_query($conn, $query2);
                            $result3 = mysqli_query($conn, $query3);
                            $result4 = mysqli_query($conn, $query4);

                            while ($row = mysqli_fetch_assoc($result)) {
                                while ($row2 = mysqli_fetch_assoc($result2)) {
                                    while ($row3 = mysqli_fetch_assoc($result3)) {
                                        while ($row4 = mysqli_fetch_assoc($result4)) {
                                            $total = $row['sumOf'] - ($row2['sumOfIn'] + $row3['sumOfTo'] + $row4['sumOfFor']);
                                            if ($total != 0) {
                                                echo number_format($total, 2);
                                             }
                                            else {
                                                echo '' . '0.00';
                                            }
                                        }
                                    }
                                }
                            }
                            ?>
                        </td>
                    </tr>
                    <tr>
                        <td>3</td>
                        <td>
                            <?php
                            $query = "SELECT SUM(payload_total) As sumOf63 FROM drivers WHERE `month`='3' AND `week`='3'";
                            $result = mysqli_query($conn, $query);
                            while ($row = mysqli_fetch_assoc($result)) {
                                $total = $row['sumOf63'];
                                if ($total != 0) {
                                    echo number_format($total, 2);
                                }
                                else {
                                    echo '' . '0.00';
                                }
                            }
                            ?>
                        </td>
                        <td style="background: #FFC107; color: black;">
                            <?php
                            $query = "SELECT SUM(service_value) As sumOf63 FROM drivers WHERE `month`='3' AND `week`='3'";
                            $result = mysqli_query($conn, $query);
                            while ($row = mysqli_fetch_assoc($result)) {
                                $total = $row['sumOf63'];
                                if ($total != 0) {
                                    echo number_format($total, 2);
                                }
                                else {
                                    echo '' . '0.00';
                                }
                            }
                            ?>
                        </td>
                        <td style="background: #FFC107; color: black;">
                            <?php
                            $query = "SELECT SUM(diesel) As sumOf63 FROM drivers WHERE `month`='3' AND `week`='3'";
                            $result = mysqli_query($conn, $query);
                            while ($row = mysqli_fetch_assoc($result)) {
                                $total = $row['sumOf63'];
                                if ($total != 0) {
                                    echo number_format($total, 2);
                                }
                                else {
                                    echo '' . '0.00';
                                }
                            }
                            ?>
                        </td>
                        <td style="background: #FFC107; color: black;">
                            <?php
                            $query = "SELECT SUM(trip_total) As sumOf63 FROM drivers WHERE `month`='3' AND `week`='3'";
                            $result = mysqli_query($conn, $query);
                            while ($row = mysqli_fetch_assoc($result)) {
                                $total = $row['sumOf63'];
                                if ($total != 0) {
                                    echo number_format($total, 2);
                                }
                                else {
                                    echo '' . '0.00';
                                }
                            }
                            ?>
                        </td>
                        <td style="background: #0D6EFD;">
                            <?php
                            $query = "SELECT SUM(payments) As sumOf61 FROM drivers WHERE `month`='3' AND `week`='3'";
                            $result = mysqli_query($conn, $query);
                            while ($row = mysqli_fetch_assoc($result)) {
                                $total = $row['sumOf61'];
                                if ($total != 0) {
                                    echo number_format($total, 2);
                                }
                                else {
                                    echo '' . '0.00';
                                }
                            }
                            ?>
                        </td>
                        <td style="background: red;">
                            <?php
                            $query = "SELECT SUM(discounts) As sumOf63 FROM drivers WHERE `month`='3' AND `week`='3'";
                            $result = mysqli_query($conn, $query);
                            while ($row = mysqli_fetch_assoc($result)) {
                                $total = $row['sumOf63'];
                                if ($total != 0) {
                                    echo number_format($total, 2);
                                }
                                else {
                                    echo '' . '0.00';
                                }
                            }
                            ?>
                        </td>
                        <td style="background: green;">
                            <?php
                            $query = "SELECT SUM(salary) As sumOf61 FROM drivers WHERE `month`='3' AND `week`='3'";
                            $result = mysqli_query($conn, $query);
                            while ($row = mysqli_fetch_assoc($result)) {
                                $total = $row['sumOf61'];
                                if ($total != 0) {
                                    echo number_format($total, 2);
                                }
                                else {
                                    echo '' . '0.00';
                                }
                            }
                            ?>
                        </td>
                        <td>
                            <?php
                            $query = "SELECT SUM(payload_total) As sumOf FROM drivers WHERE `month`='3' AND `week`='3'";
                            $query2 = "SELECT SUM(trip_total) As sumOfIn FROM drivers WHERE `month`='3' AND `week`='3'";
                            $query3 = "SELECT SUM(diesel) As sumOfTo FROM drivers WHERE `month`='3' AND `week`='3'";
                            $query4 = "SELECT SUM(service_value) As sumOfFor FROM drivers WHERE `month`='3' AND `week`='3'";
                            $total = 0;
                            $result = mysqli_query($conn, $query);
                            $result2 = mysqli_query($conn, $query2);
                            $result3 = mysqli_query($conn, $query3);
                            $result4 = mysqli_query($conn, $query4);

                            while ($row = mysqli_fetch_assoc($result)) {
                                while ($row2 = mysqli_fetch_assoc($result2)) {
                                    while ($row3 = mysqli_fetch_assoc($result3)) {
                                        while ($row4 = mysqli_fetch_assoc($result4)) {
                                            $total = $row['sumOf'] - ($row2['sumOfIn'] + $row3['sumOfTo'] + $row4['sumOfFor']);
                                            if ($total != 0) {
                                                echo number_format($total, 2);
                                             }
                                            else {
                                                echo '' . '0.00';
                                            }
                                        }
                                    }
                                }
                            }
                            ?>
                        </td>
                    </tr>
                    <tr>
                        <td>4</td>
                        <td>
                            <?php
                            $query = "SELECT SUM(payload_total) As sumOf64 FROM drivers WHERE `month`='3' AND `week`='4'";
                            $result = mysqli_query($conn, $query);
                            while ($row = mysqli_fetch_assoc($result)) {
                                $total = $row['sumOf64'];
                                if ($total != 0) {
                                    echo number_format($total, 2);
                                }
                                else {
                                    echo '' . '0.00';
                                }
                            }
                            ?>
                        </td>
                        <td style="background: #FFC107; color: black;">
                            <?php
                            $query = "SELECT SUM(service_value) As sumOf64 FROM drivers WHERE `month`='3' AND `week`='4'";
                            $result = mysqli_query($conn, $query);
                            while ($row = mysqli_fetch_assoc($result)) {
                                $total = $row['sumOf64'];
                                if ($total != 0) {
                                    echo number_format($total, 2);
                                }
                                else {
                                    echo '' . '0.00';
                                }
                            }
                            ?>
                        </td>
                        <td style="background: #FFC107; color: black;">
                            <?php
                            $query = "SELECT SUM(diesel) As sumOf64 FROM drivers WHERE `month`='3' AND `week`='4'";
                            $result = mysqli_query($conn, $query);
                            while ($row = mysqli_fetch_assoc($result)) {
                                $total = $row['sumOf64'];
                                if ($total != 0) {
                                    echo number_format($total, 2);
                                }
                                else {
                                    echo '' . '0.00';
                                }
                            }
                            ?>
                        </td>
                        <td style="background: #FFC107; color: black;">
                            <?php
                            $query = "SELECT SUM(trip_total) As sumOf64 FROM drivers WHERE `month`='3' AND `week`='4'";
                            $result = mysqli_query($conn, $query);
                            while ($row = mysqli_fetch_assoc($result)) {
                                $total = $row['sumOf64'];
                                if ($total != 0) {
                                    echo number_format($total, 2);
                                }
                                else {
                                    echo '' . '0.00';
                                }
                            }
                            ?>
                        </td>
                        <td style="background: #0D6EFD;">
                            <?php
                            $query = "SELECT SUM(payments) As sumOf61 FROM drivers WHERE `month`='3' AND `week`='4'";
                            $result = mysqli_query($conn, $query);
                            while ($row = mysqli_fetch_assoc($result)) {
                                $total = $row['sumOf61'];
                                if ($total != 0) {
                                    echo number_format($total, 2);
                                }
                                else {
                                    echo '' . '0.00';
                                }
                            }
                            ?>
                        </td>
                        <td style="background: red;">
                            <?php
                            $query = "SELECT SUM(discounts) As sumOf64 FROM drivers WHERE `month`='3' AND `week`='4'";
                            $result = mysqli_query($conn, $query);
                            while ($row = mysqli_fetch_assoc($result)) {
                                $total = $row['sumOf64'];
                                if ($total != 0) {
                                    echo number_format($total, 2);
                                }
                                else {
                                    echo '' . '0.00';
                                }
                            }
                            ?>
                        </td>
                        <td style="background: green;">
                            <?php
                            $query = "SELECT SUM(salary) As sumOf61 FROM drivers WHERE `month`='3' AND `week`='4'";
                            $result = mysqli_query($conn, $query);
                            while ($row = mysqli_fetch_assoc($result)) {
                                $total = $row['sumOf61'];
                                if ($total != 0) {
                                    echo number_format($total, 2);
                                }
                                else {
                                    echo '' . '0.00';
                                }
                            }
                            ?>
                        </td>
                        <td>
                            <?php
                            $query = "SELECT SUM(payload_total) As sumOf FROM drivers WHERE `month`='3' AND `week`='4'";
                            $query2 = "SELECT SUM(trip_total) As sumOfIn FROM drivers WHERE `month`='3' AND `week`='4'";
                            $query3 = "SELECT SUM(diesel) As sumOfTo FROM drivers WHERE `month`='3' AND `week`='4'";
                            $query4 = "SELECT SUM(service_value) As sumOfFor FROM drivers WHERE `month`='3' AND `week`='4'";
                            $total = 0;
                            $result = mysqli_query($conn, $query);
                            $result2 = mysqli_query($conn, $query2);
                            $result3 = mysqli_query($conn, $query3);
                            $result4 = mysqli_query($conn, $query4);

                            while ($row = mysqli_fetch_assoc($result)) {
                                while ($row2 = mysqli_fetch_assoc($result2)) {
                                    while ($row3 = mysqli_fetch_assoc($result3)) {
                                        while ($row4 = mysqli_fetch_assoc($result4)) {
                                            $total = $row['sumOf'] - ($row2['sumOfIn'] + $row3['sumOfTo'] + $row4['sumOfFor']);
                                            if ($total != 0) {
                                                echo number_format($total, 2);
                                             }
                                            else {
                                                echo '' . '0.00';
                                            }
                                        }
                                    }
                                }
                            }
                            ?>
                        </td>
                    </tr>
                </table>
                <!-- Modal -->
                    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="exampleModalLabel">التفاصيل</h1>
                                </div>
                                <div class="modal-body">
                                    <a>D</a>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">إغلاق</button>
                                    <button type="button" class="btn btn-primary">حفظ التغيرات</button>
                                </div>
                            </div>
                        </div>
                    </div>
                <p style="font-size: 24px;">
                    الصندوق = 
                    
                    (
                    
                    <a style="color: #FFC107; font-size: 22px;">إجمالي المصروفات</a>
                    
                    - 
                    
                    <!--<a style="color: #0D6EFD; font-size: 22px;">إجمالي الدفعات</a>-->
                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                        إجمالي الدفعات
                    </button>
                    

                    ) =
                    
                    <?php
                            $total = 0;
                            
                            $query1 = "SELECT SUM(payments) As sumOfBox1 FROM drivers WHERE `month`='3' AND `week`='1'";
                            $query2 = "SELECT SUM(trip_total) As sumOfInBox1 FROM drivers WHERE `month`='3' AND `week`='1'";
                            $query3 = "SELECT SUM(diesel) As sumOfToBox1 FROM drivers WHERE `month`='3' AND `week`='1'";
                            $query4 = "SELECT SUM(service_value) As sumOfForBox1 FROM drivers WHERE `month`='3' AND `week`='1'";
                            
                            $result1 = mysqli_query($conn, $query1);
                            $result2 = mysqli_query($conn, $query2);
                            $result3 = mysqli_query($conn, $query3);
                            $result4 = mysqli_query($conn, $query4);
                            
                            $query5 = "SELECT SUM(payments) As sumOfBox2 FROM drivers WHERE `month`='3' AND `week`='2'";
                            $query6 = "SELECT SUM(trip_total) As sumOfInBox2 FROM drivers WHERE `month`='3' AND `week`='2'";
                            $query7 = "SELECT SUM(diesel) As sumOfToBox2 FROM drivers WHERE `month`='3' AND `week`='2'";
                            $query8 = "SELECT SUM(service_value) As sumOfForBox2 FROM drivers WHERE `month`='3' AND `week`='2'";
                            
                            $query9 = "SELECT SUM(payments) As sumOfBox3 FROM drivers WHERE `month`='3' AND `week`='3'";
                            $query10 = "SELECT SUM(trip_total) As sumOfInBox3 FROM drivers WHERE `month`='3' AND `week`='3'";
                            $query11 = "SELECT SUM(diesel) As sumOfToBox3 FROM drivers WHERE `month`='3' AND `week`='3'";
                            $query12 = "SELECT SUM(service_value) As sumOfForBox3 FROM drivers WHERE `month`='3' AND `week`='3'";
                            
                            $query13 = "SELECT SUM(payments) As sumOfBox4 FROM drivers WHERE `month`='3' AND `week`='4'";
                            $query14 = "SELECT SUM(trip_total) As sumOfInBox4 FROM drivers WHERE `month`='3' AND `week`='4'";
                            $query15 = "SELECT SUM(diesel) As sumOfToBox4 FROM drivers WHERE `month`='3' AND `week`='4'";
                            $query16 = "SELECT SUM(service_value) As sumOfForBox4 FROM drivers WHERE `month`='3' AND `week`='4'";
                            
                            $result5 = mysqli_query($conn, $query5);
                            $result6 = mysqli_query($conn, $query6);
                            $result7 = mysqli_query($conn, $query7);
                            $result8 = mysqli_query($conn, $query8);
                            
                            $result9 = mysqli_query($conn, $query9);
                            $result10 = mysqli_query($conn, $query10);
                            $result11 = mysqli_query($conn, $query11);
                            $result12 = mysqli_query($conn, $query12);
                            
                            $result13 = mysqli_query($conn, $query13);
                            $result14 = mysqli_query($conn, $query14);
                            $result15 = mysqli_query($conn, $query15);
                            $result16 = mysqli_query($conn, $query16);
                            
                            while ($row1 = mysqli_fetch_assoc($result1)) {
                                while ($row2 = mysqli_fetch_assoc($result2)) {
                                    while ($row3 = mysqli_fetch_assoc($result3)) {
                                        while ($row4 = mysqli_fetch_assoc($result4)) {
                                            
                                            while ($row5 = mysqli_fetch_assoc($result5)) {
                                                while ($row6 = mysqli_fetch_assoc($result6)) {
                                                    while ($row7 = mysqli_fetch_assoc($result7)) {
                                                        while ($row8 = mysqli_fetch_assoc($result8)) {
                                                            
                                                            while ($row9 = mysqli_fetch_assoc($result9)) {
                                                                while ($row10 = mysqli_fetch_assoc($result10)) {
                                                                    while ($row11 = mysqli_fetch_assoc($result11)) {
                                                                        while ($row12 = mysqli_fetch_assoc($result12)) {
                                                                            
                                                                            while ($row13 = mysqli_fetch_assoc($result13)) {
                                                                                while ($row14 = mysqli_fetch_assoc($result14)) {
                                                                                    while ($row15 = mysqli_fetch_assoc($result15)) {
                                                                                        while ($row16 = mysqli_fetch_assoc($result16)) {
                                            
$total = ($row1['sumOfBox1'] - ($row2['sumOfInBox1'] + $row3['sumOfToBox1'] + $row4['sumOfForBox1']))
+ ($row5['sumOfBox2'] - ($row6['sumOfInBox2'] +  $row7['sumOfToBox2'] + $row8['sumOfForBox2']))
+ ($row9['sumOfBox3'] - ($row10['sumOfInBox3'] + $row11['sumOfToBox3'] + $row12['sumOfForBox3']))
+ ($row13['sumOfBox4'] - ($row14['sumOfInBox4'] + $row15['sumOfToBox4'] + $row16['sumOfForBox4']));
    $total_payment = $row1['sumOfBox1'] + $row5['sumOfBox2'] + $row9['sumOfBox3'] + $row13['sumOfBox4'];
    $total_s = ($row2['sumOfInBox1'] + $row3['sumOfToBox1'] + $row4['sumOfForBox1']) + 
    ($row6['sumOfInBox2'] +  $row7['sumOfToBox2'] + $row8['sumOfForBox2']) +
    ($row10['sumOfInBox3'] + $row11['sumOfToBox3'] + $row12['sumOfForBox3']) +
    ($row14['sumOfInBox4'] + $row15['sumOfToBox4'] + $row16['sumOfForBox4']);
                                                                                    if ($total != 0) {
    echo '<a style="color: #FFC107; font-size: 22px;">' . number_format($total_s, 2) . '</a>' . ' - ' . '<a style="color: blue; font-size: 22px;">' . number_format($total_payment, 2) . '</a>' . ' = ' . number_format($total, 2); 
                                                                                     }
                                                                                    else {
                                                                                        echo '' . '0.00';
                                                                                    }
                                                                            
                                                                                        
                                                                                    }
                                                                                }
                                                                            }
                                                                        }
                                                            
                                                                       
                                                                    }
                                                                }
                                                            }
                                                        }
                                                            
                                                        
                                                    }
                                                }
                                            }
                                        }
                                            
                                       
                                    }
                                }
                            }
                        }
                        ?>
                </p>
            </div>
            <div class="content">
                <driv class="row ">
                    <div class="col"><h2>شهر 4</h2></div>
                    <!--<div class="col-6">
                        <h3>
                            الدخل الشهري
                            <?php
                                    $total = 0;
                                    
                                    $query = "SELECT SUM(payload_total) As sumOf FROM drivers WHERE `month`='4' AND `week`='1'";
                                    $query2 = "SELECT SUM(trip_total) As sumOfIn FROM drivers WHERE `month`='4' AND `week`='1'";
                                    $query3 = "SELECT SUM(diesel) As sumOfTo FROM drivers WHERE `month`='4' AND `week`='1'";
                                    $query4 = "SELECT SUM(service_value) As sumOfFor FROM drivers WHERE `month`='4' AND `week`='1'";
                                    $result = mysqli_query($conn, $query);
                                    $result2 = mysqli_query($conn, $query2);
                                    $result3 = mysqli_query($conn, $query3);
                                    $result4 = mysqli_query($conn, $query4);
                                    
                                    $query5 = "SELECT SUM(payload_total) As sumOf2 FROM drivers WHERE `month`='4' AND `week`='2'";
                                    $query6 = "SELECT SUM(trip_total) As sumOfIn2 FROM drivers WHERE `month`='4' AND `week`='2'";
                                    $query7 = "SELECT SUM(diesel) As sumOfTo2 FROM drivers WHERE `month`='4' AND `week`='2'";
                                    $query8 = "SELECT SUM(service_value) As sumOfFor2 FROM drivers WHERE `month`='4' AND `week`='2'";
                                    
                                    $query9 = "SELECT SUM(payload_total) As sumOf3 FROM drivers WHERE `month`='4' AND `week`='3'";
                                    $query10 = "SELECT SUM(trip_total) As sumOfIn3 FROM drivers WHERE `month`='4' AND `week`='3'";
                                    $query11 = "SELECT SUM(diesel) As sumOfTo3 FROM drivers WHERE `month`='4' AND `week`='3'";
                                    $query12 = "SELECT SUM(service_value) As sumOfFor3 FROM drivers WHERE `month`='4' AND `week`='3'";
                                    
                                    $result5 = mysqli_query($conn, $query5);
                                    $result6 = mysqli_query($conn, $query6);
                                    $result7 = mysqli_query($conn, $query7);
                                    $result8 = mysqli_query($conn, $query8);
                                    
                                    $result9 = mysqli_query($conn, $query9);
                                    $result10 = mysqli_query($conn, $query10);
                                    $result11 = mysqli_query($conn, $query11);
                                    $result12 = mysqli_query($conn, $query12);
                                    
                                    while ($row = mysqli_fetch_assoc($result)) {
                                        while ($row2 = mysqli_fetch_assoc($result2)) {
                                            while ($row3 = mysqli_fetch_assoc($result3)) {
                                                while ($row4 = mysqli_fetch_assoc($result4)) {
                                                    
                                                    while ($row5 = mysqli_fetch_assoc($result5)) {
                                                        while ($row6 = mysqli_fetch_assoc($result6)) {
                                                            while ($row7 = mysqli_fetch_assoc($result7)) {
                                                                while ($row8 = mysqli_fetch_assoc($result8)) {
                                                                    
                                                                    while ($row9 = mysqli_fetch_assoc($result9)) {
                                                                        while ($row10 = mysqli_fetch_assoc($result10)) {
                                                                            while ($row11 = mysqli_fetch_assoc($result11)) {
                                                                                while ($row12 = mysqli_fetch_assoc($result12)) {
                                                    
                                                                                    $total = ($row['sumOf'] - ($row2['sumOfIn'] + $row3['sumOfTo'] + $row4['sumOfFor'])) + ($row5['sumOf2'] - ($row6['sumOfIn2'] + $row7['sumOfTo2'] + $row8['sumOfFor2'])) + ($row9['sumOf3'] - ($row10['sumOfIn3'] + $row11['sumOfTo3'] + $row12['sumOfFor3']));
                                                                                    if ($total != 0) {
                                                                                        echo number_format($total, 2);
                                                                                     }
                                                                                    else {
                                                                                        echo '' . '0.00';
                                                                                    }
                                                                    
                                                                                }
                                                                            }
                                                                        }
                                                                    }
                                                                    
                                                                }
                                                            }
                                                        }
                                                    }
                                                    
                                                }
                                            }
                                        }
                                    }
                                    ?>
                                <a style="color: #198754; font-size: 16px;">ريال سعودي</a>
                        </h3>
                    </div>-->
                </driv>
                <table class="table table-dark table-hover">
                    <tr>
                        <th>الأسبوع#</th>
                        <th>الحمولة</th>
                        <th style="background: #FFC107; color: black;">قيمة الخدمة</th>
                        <th style="background: #FFC107; color: black;">ديزل</th>
                        <th style="background: #FFC107; color: black;">التربات</th>
                        <th style="background: #0D6EFD;">الدفعات</th>
                        <th style="background: red;">الخصومات</th>
                        <th style="background: green;">الراتب</th>
                        <th>الدخل الأسبوعي</th>
                    </tr>
                    <tr>
                        <td>1</td>
                        <td>
                            <?php
                            $query = "SELECT SUM(payload_total) As sumOf61 FROM drivers WHERE `month`='4' AND `week`='1'";
                            $result = mysqli_query($conn, $query);
                            while ($row = mysqli_fetch_assoc($result)) {
                                $total = $row['sumOf61'];
                                if ($total != 0) {
                                    echo number_format($total, 2);
                                }
                                else {
                                    echo '' . '0.00';
                                }
                            }
                            ?>
                        </td>
                        <td style="background: #FFC107; color: black;">
                            <?php
                            $query = "SELECT SUM(service_value) As sumOf61 FROM drivers WHERE `month`='4' AND `week`='1'";
                            $result = mysqli_query($conn, $query);
                            while ($row = mysqli_fetch_assoc($result)) {
                                $total = $row['sumOf61'];
                                if ($total != 0) {
                                    echo number_format($total, 2);
                                }
                                else {
                                    echo '' . '0.00';
                                }
                            }
                            ?>
                        </td>
                        <td style="background: #FFC107; color: black;">
                            <?php
                            $query = "SELECT SUM(diesel) As sumOf61 FROM drivers WHERE `month`='4' AND `week`='1'";
                            $result = mysqli_query($conn, $query);
                            while ($row = mysqli_fetch_assoc($result)) {
                                $total = $row['sumOf61'];
                                if ($total != 0) {
                                    echo number_format($total, 2);
                                }
                                else {
                                    echo '' . '0.00';
                                }
                            }
                            ?>
                        </td>
                        <td style="background: #FFC107; color: black;">
                            <?php
                            $query = "SELECT SUM(trip_total) As sumOf61 FROM drivers WHERE `month`='4' AND `week`='1'";
                            $result = mysqli_query($conn, $query);
                            while ($row = mysqli_fetch_assoc($result)) {
                                $total = $row['sumOf61'];
                                if ($total != 0) {
                                    echo number_format($total, 2);
                                }
                                else {
                                    echo '' . '0.00';
                                }
                            }
                            ?>
                        </td>
                        <td style="background: #0D6EFD;">
                            <?php
                            $query = "SELECT SUM(payments) As sumOf61 FROM drivers WHERE `month`='4' AND `week`='1'";
                            $result = mysqli_query($conn, $query);
                            while ($row = mysqli_fetch_assoc($result)) {
                                $total = $row['sumOf61'];
                                if ($total != 0) {
                                    echo number_format($total, 2);
                                }
                                else {
                                    echo '' . '0.00';
                                }
                            }
                            ?>
                        </td>
                        <td style="background: red;">
                            <?php
                            $query = "SELECT SUM(discounts) As sumOf61 FROM drivers WHERE `month`='4' AND `week`='1'";
                            $result = mysqli_query($conn, $query);
                            while ($row = mysqli_fetch_assoc($result)) {
                                $total = $row['sumOf61'];
                                if ($total != 0) {
                                    echo number_format($total, 2);
                                }
                                else {
                                    echo '' . '0.00';
                                }
                            }
                            ?>
                        </td>
                        <td style="background: green;">
                            <?php
                            $query = "SELECT SUM(salary) As sumOf61 FROM drivers WHERE `month`='4' AND `week`='1'";
                            $result = mysqli_query($conn, $query);
                            while ($row = mysqli_fetch_assoc($result)) {
                                $total = $row['sumOf61'];
                                if ($total != 0) {
                                    echo number_format($total, 2);
                                }
                                else {
                                    echo '' . '0.00';
                                }
                            }
                            ?>
                        </td>
                        <td>
                            <?php
                            $query = "SELECT SUM(payload_total) As sumOf FROM drivers WHERE `month`='4' AND `week`='1'";
                            $query2 = "SELECT SUM(trip_total) As sumOfIn FROM drivers WHERE `month`='4' AND `week`='1'";
                            $query3 = "SELECT SUM(diesel) As sumOfTo FROM drivers WHERE `month`='4' AND `week`='1'";
                            $query4 = "SELECT SUM(service_value) As sumOfFor FROM drivers WHERE `month`='4' AND `week`='1'";
                            $total = 0;
                            $result = mysqli_query($conn, $query);
                            $result2 = mysqli_query($conn, $query2);
                            $result3 = mysqli_query($conn, $query3);
                            $result4 = mysqli_query($conn, $query4);

                            while ($row = mysqli_fetch_assoc($result)) {
                                while ($row2 = mysqli_fetch_assoc($result2)) {
                                    while ($row3 = mysqli_fetch_assoc($result3)) {
                                        while ($row4 = mysqli_fetch_assoc($result4)) {
                                            $total = $row['sumOf'] - ($row2['sumOfIn'] + $row3['sumOfTo'] + $row4['sumOfFor']);
                                            if ($total != 0) {
                                                echo number_format($total, 2);
                                             }
                                            else {
                                                echo '' . '0.00';
                                            }
                                        }
                                    }
                                }
                            }
                            ?>
                        </td>
                    </tr>
                    <tr>
                        <td>2</td>
                        <td>
                            <?php
                            $query = "SELECT SUM(payload_total) As sumOf62 FROM drivers WHERE `month`='4' AND `week`='2'";
                            $result = mysqli_query($conn, $query);
                            while ($row = mysqli_fetch_assoc($result)) {
                                $total = $row['sumOf62'];
                                if ($total != 0) {
                                    echo number_format($total, 2);
                                }
                                else {
                                    echo '' . '0.00';
                                }
                            }
                            ?>
                        </td>
                        <td style="background: #FFC107; color: black;">
                            <?php
                            $query = "SELECT SUM(service_value) As sumOf62 FROM drivers WHERE `month`='4' AND `week`='2'";
                            $result = mysqli_query($conn, $query);
                            while ($row = mysqli_fetch_assoc($result)) {
                                $total = $row['sumOf62'];
                                if ($total != 0) {
                                    echo number_format($total, 2);
                                }
                                else {
                                    echo '' . '0.00';
                                }
                            }
                            ?>
                        </td>
                        <td style="background: #FFC107; color: black;">
                            <?php
                            $query = "SELECT SUM(diesel) As sumOf62 FROM drivers WHERE `month`='4' AND `week`='2'";
                            $result = mysqli_query($conn, $query);
                            while ($row = mysqli_fetch_assoc($result)) {
                                $total = $row['sumOf62'];
                                if ($total != 0) {
                                    echo number_format($total, 2);
                                }
                                else {
                                    echo '' . '0.00';
                                }
                            }
                            ?>
                        </td>
                        <td style="background: #FFC107; color: black;">
                            <?php
                            $query = "SELECT SUM(trip_total) As sumOf62 FROM drivers WHERE `month`='4' AND `week`='2'";
                            $result = mysqli_query($conn, $query);
                            while ($row = mysqli_fetch_assoc($result)) {
                                $total = $row['sumOf62'];
                                if ($total != 0) {
                                    echo number_format($total, 2);
                                }
                                else {
                                    echo '' . '0.00';
                                }
                            }
                            ?>
                        </td>
                        <td style="background: #0D6EFD;">
                            <?php
                            $query = "SELECT SUM(payments) As sumOf61 FROM drivers WHERE `month`='4' AND `week`='2'";
                            $result = mysqli_query($conn, $query);
                            while ($row = mysqli_fetch_assoc($result)) {
                                $total = $row['sumOf61'];
                                if ($total != 0) {
                                    echo number_format($total, 2);
                                }
                                else {
                                    echo '' . '0.00';
                                }
                            }
                            ?>
                        </td>
                        <td style="background: red;">
                            <?php
                            $query = "SELECT SUM(discounts) As sumOf62 FROM drivers WHERE `month`='4' AND `week`='2'";
                            $result = mysqli_query($conn, $query);
                            while ($row = mysqli_fetch_assoc($result)) {
                                $total = $row['sumOf62'];
                                if ($total != 0) {
                                    echo number_format($total, 2);
                                }
                                else {
                                    echo '' . '0.00';
                                }
                            }
                            ?>
                        </td>
                        <td style="background: green;">
                            <?php
                            $query = "SELECT SUM(salary) As sumOf61 FROM drivers WHERE `month`='4' AND `week`='2'";
                            $result = mysqli_query($conn, $query);
                            while ($row = mysqli_fetch_assoc($result)) {
                                $total = $row['sumOf61'];
                                if ($total != 0) {
                                    echo number_format($total, 2);
                                }
                                else {
                                    echo '' . '0.00';
                                }
                            }
                            ?>
                        </td>
                        <td>
                            <?php
                            $query = "SELECT SUM(payload_total) As sumOf FROM drivers WHERE `month`='4' AND `week`='2'";
                            $query2 = "SELECT SUM(trip_total) As sumOfIn FROM drivers WHERE `month`='4' AND `week`='2'";
                            $query3 = "SELECT SUM(diesel) As sumOfTo FROM drivers WHERE `month`='4' AND `week`='2'";
                            $query4 = "SELECT SUM(service_value) As sumOfFor FROM drivers WHERE `month`='4' AND `week`='2'";
                            $total = 0;
                            $result = mysqli_query($conn, $query);
                            $result2 = mysqli_query($conn, $query2);
                            $result3 = mysqli_query($conn, $query3);
                            $result4 = mysqli_query($conn, $query4);

                            while ($row = mysqli_fetch_assoc($result)) {
                                while ($row2 = mysqli_fetch_assoc($result2)) {
                                    while ($row3 = mysqli_fetch_assoc($result3)) {
                                        while ($row4 = mysqli_fetch_assoc($result4)) {
                                            $total = $row['sumOf'] - ($row2['sumOfIn'] + $row3['sumOfTo'] + $row4['sumOfFor']);
                                            if ($total != 0) {
                                                echo number_format($total, 2);
                                             }
                                            else {
                                                echo '' . '0.00';
                                            }
                                        }
                                    }
                                }
                            }
                            ?>
                        </td>
                    </tr>
                    <tr>
                        <td>3</td>
                        <td>
                            <?php
                            $query = "SELECT SUM(payload_total) As sumOf63 FROM drivers WHERE `month`='4' AND `week`='3'";
                            $result = mysqli_query($conn, $query);
                            while ($row = mysqli_fetch_assoc($result)) {
                                $total = $row['sumOf63'];
                                if ($total != 0) {
                                    echo number_format($total, 2);
                                }
                                else {
                                    echo '' . '0.00';
                                }
                            }
                            ?>
                        </td>
                        <td style="background: #FFC107; color: black;">
                            <?php
                            $query = "SELECT SUM(service_value) As sumOf63 FROM drivers WHERE `month`='4' AND `week`='3'";
                            $result = mysqli_query($conn, $query);
                            while ($row = mysqli_fetch_assoc($result)) {
                                $total = $row['sumOf63'];
                                if ($total != 0) {
                                    echo number_format($total, 2);
                                }
                                else {
                                    echo '' . '0.00';
                                }
                            }
                            ?>
                        </td>
                        <td style="background: #FFC107; color: black;">
                            <?php
                            $query = "SELECT SUM(diesel) As sumOf63 FROM drivers WHERE `month`='4' AND `week`='3'";
                            $result = mysqli_query($conn, $query);
                            while ($row = mysqli_fetch_assoc($result)) {
                                $total = $row['sumOf63'];
                                if ($total != 0) {
                                    echo number_format($total, 2);
                                }
                                else {
                                    echo '' . '0.00';
                                }
                            }
                            ?>
                        </td>
                        <td style="background: #FFC107; color: black;">
                            <?php
                            $query = "SELECT SUM(trip_total) As sumOf63 FROM drivers WHERE `month`='4' AND `week`='3'";
                            $result = mysqli_query($conn, $query);
                            while ($row = mysqli_fetch_assoc($result)) {
                                $total = $row['sumOf63'];
                                if ($total != 0) {
                                    echo number_format($total, 2);
                                }
                                else {
                                    echo '' . '0.00';
                                }
                            }
                            ?>
                        </td>
                        <td style="background: #0D6EFD;">
                            <?php
                            $query = "SELECT SUM(payments) As sumOf61 FROM drivers WHERE `month`='4' AND `week`='3'";
                            $result = mysqli_query($conn, $query);
                            while ($row = mysqli_fetch_assoc($result)) {
                                $total = $row['sumOf61'];
                                if ($total != 0) {
                                    echo number_format($total, 2);
                                }
                                else {
                                    echo '' . '0.00';
                                }
                            }
                            ?>
                        </td>
                        <td style="background: red;">
                            <?php
                            $query = "SELECT SUM(discounts) As sumOf63 FROM drivers WHERE `month`='4' AND `week`='3'";
                            $result = mysqli_query($conn, $query);
                            while ($row = mysqli_fetch_assoc($result)) {
                                $total = $row['sumOf63'];
                                if ($total != 0) {
                                    echo number_format($total, 2);
                                }
                                else {
                                    echo '' . '0.00';
                                }
                            }
                            ?>
                        </td>
                        <td style="background: green;">
                            <?php
                            $query = "SELECT SUM(salary) As sumOf61 FROM drivers WHERE `month`='4' AND `week`='3'";
                            $result = mysqli_query($conn, $query);
                            while ($row = mysqli_fetch_assoc($result)) {
                                $total = $row['sumOf61'];
                                if ($total != 0) {
                                    echo number_format($total, 2);
                                }
                                else {
                                    echo '' . '0.00';
                                }
                            }
                            ?>
                        </td>
                        <td>
                            <?php
                            $query = "SELECT SUM(payload_total) As sumOf FROM drivers WHERE `month`='4' AND `week`='3'";
                            $query2 = "SELECT SUM(trip_total) As sumOfIn FROM drivers WHERE `month`='4' AND `week`='3'";
                            $query3 = "SELECT SUM(diesel) As sumOfTo FROM drivers WHERE `month`='4' AND `week`='3'";
                            $query4 = "SELECT SUM(service_value) As sumOfFor FROM drivers WHERE `month`='4' AND `week`='3'";
                            $total = 0;
                            $result = mysqli_query($conn, $query);
                            $result2 = mysqli_query($conn, $query2);
                            $result3 = mysqli_query($conn, $query3);
                            $result4 = mysqli_query($conn, $query4);

                            while ($row = mysqli_fetch_assoc($result)) {
                                while ($row2 = mysqli_fetch_assoc($result2)) {
                                    while ($row3 = mysqli_fetch_assoc($result3)) {
                                        while ($row4 = mysqli_fetch_assoc($result4)) {
                                            $total = $row['sumOf'] - ($row2['sumOfIn'] + $row3['sumOfTo'] + $row4['sumOfFor']);
                                            if ($total != 0) {
                                                echo number_format($total, 2);
                                             }
                                            else {
                                                echo '' . '0.00';
                                            }
                                        }
                                    }
                                }
                            }
                            ?>
                        </td>
                    </tr>
                    <tr>
                        <td>4</td>
                        <td>
                            <?php
                            $query = "SELECT SUM(payload_total) As sumOf64 FROM drivers WHERE `month`='4' AND `week`='4'";
                            $result = mysqli_query($conn, $query);
                            while ($row = mysqli_fetch_assoc($result)) {
                                $total = $row['sumOf64'];
                                if ($total != 0) {
                                    echo number_format($total, 2);
                                }
                                else {
                                    echo '' . '0.00';
                                }
                            }
                            ?>
                        </td>
                        <td style="background: #FFC107; color: black;">
                            <?php
                            $query = "SELECT SUM(service_value) As sumOf64 FROM drivers WHERE `month`='4' AND `week`='4'";
                            $result = mysqli_query($conn, $query);
                            while ($row = mysqli_fetch_assoc($result)) {
                                $total = $row['sumOf64'];
                                if ($total != 0) {
                                    echo number_format($total, 2);
                                }
                                else {
                                    echo '' . '0.00';
                                }
                            }
                            ?>
                        </td>
                        <td style="background: #FFC107; color: black;">
                            <?php
                            $query = "SELECT SUM(diesel) As sumOf64 FROM drivers WHERE `month`='4' AND `week`='4'";
                            $result = mysqli_query($conn, $query);
                            while ($row = mysqli_fetch_assoc($result)) {
                                $total = $row['sumOf64'];
                                if ($total != 0) {
                                    echo number_format($total, 2);
                                }
                                else {
                                    echo '' . '0.00';
                                }
                            }
                            ?>
                        </td>
                        <td style="background: #FFC107; color: black;">
                            <?php
                            $query = "SELECT SUM(trip_total) As sumOf64 FROM drivers WHERE `month`='4' AND `week`='4'";
                            $result = mysqli_query($conn, $query);
                            while ($row = mysqli_fetch_assoc($result)) {
                                $total = $row['sumOf64'];
                                if ($total != 0) {
                                    echo number_format($total, 2);
                                }
                                else {
                                    echo '' . '0.00';
                                }
                            }
                            ?>
                        </td>
                        <td style="background: #0D6EFD;">
                            <?php
                            $query = "SELECT SUM(payments) As sumOf61 FROM drivers WHERE `month`='4' AND `week`='4'";
                            $result = mysqli_query($conn, $query);
                            while ($row = mysqli_fetch_assoc($result)) {
                                $total = $row['sumOf61'];
                                if ($total != 0) {
                                    echo number_format($total, 2);
                                }
                                else {
                                    echo '' . '0.00';
                                }
                            }
                            ?>
                        </td>
                        <td style="background: red;">
                            <?php
                            $query = "SELECT SUM(discounts) As sumOf64 FROM drivers WHERE `month`='4' AND `week`='4'";
                            $result = mysqli_query($conn, $query);
                            while ($row = mysqli_fetch_assoc($result)) {
                                $total = $row['sumOf64'];
                                if ($total != 0) {
                                    echo number_format($total, 2);
                                }
                                else {
                                    echo '' . '0.00';
                                }
                            }
                            ?>
                        </td>
                        <td style="background: green;">
                            <?php
                            $query = "SELECT SUM(salary) As sumOf61 FROM drivers WHERE `month`='4' AND `week`='4'";
                            $result = mysqli_query($conn, $query);
                            while ($row = mysqli_fetch_assoc($result)) {
                                $total = $row['sumOf61'];
                                if ($total != 0) {
                                    echo number_format($total, 2);
                                }
                                else {
                                    echo '' . '0.00';
                                }
                            }
                            ?>
                        </td>
                        <td>
                            <?php
                            $query = "SELECT SUM(payload_total) As sumOf FROM drivers WHERE `month`='4' AND `week`='4'";
                            $query2 = "SELECT SUM(trip_total) As sumOfIn FROM drivers WHERE `month`='4' AND `week`='4'";
                            $query3 = "SELECT SUM(diesel) As sumOfTo FROM drivers WHERE `month`='4' AND `week`='4'";
                            $query4 = "SELECT SUM(service_value) As sumOfFor FROM drivers WHERE `month`='4' AND `week`='4'";
                            $total = 0;
                            $result = mysqli_query($conn, $query);
                            $result2 = mysqli_query($conn, $query2);
                            $result3 = mysqli_query($conn, $query3);
                            $result4 = mysqli_query($conn, $query4);

                            while ($row = mysqli_fetch_assoc($result)) {
                                while ($row2 = mysqli_fetch_assoc($result2)) {
                                    while ($row3 = mysqli_fetch_assoc($result3)) {
                                        while ($row4 = mysqli_fetch_assoc($result4)) {
                                            $total = $row['sumOf'] - ($row2['sumOfIn'] + $row3['sumOfTo'] + $row4['sumOfFor']);
                                            if ($total != 0) {
                                                echo number_format($total, 2);
                                             }
                                            else {
                                                echo '' . '0.00';
                                            }
                                        }
                                    }
                                }
                            }
                            ?>
                        </td>
                    </tr>
                </table>
                <!-- Modal -->
                    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="exampleModalLabel">التفاصيل</h1>
                                </div>
                                <div class="modal-body">
                                    <a>D</a>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">إغلاق</button>
                                    <button type="button" class="btn btn-primary">حفظ التغيرات</button>
                                </div>
                            </div>
                        </div>
                    </div>
                <p style="font-size: 24px;">
                    الصندوق = 
                    
                    (
                    
                    <a style="color: #FFC107; font-size: 22px;">إجمالي المصروفات</a>
                    
                    - 
                    
                    <!--<a style="color: #0D6EFD; font-size: 22px;">إجمالي الدفعات</a>-->
                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                        إجمالي الدفعات
                    </button>
                    

                    ) =
                    
                    <?php
                            $total = 0;
                            
                            $query1 = "SELECT SUM(payments) As sumOfBox1 FROM drivers WHERE `month`='4' AND `week`='1'";
                            $query2 = "SELECT SUM(trip_total) As sumOfInBox1 FROM drivers WHERE `month`='4' AND `week`='1'";
                            $query3 = "SELECT SUM(diesel) As sumOfToBox1 FROM drivers WHERE `month`='4' AND `week`='1'";
                            $query4 = "SELECT SUM(service_value) As sumOfForBox1 FROM drivers WHERE `month`='4' AND `week`='1'";
                            
                            $result1 = mysqli_query($conn, $query1);
                            $result2 = mysqli_query($conn, $query2);
                            $result3 = mysqli_query($conn, $query3);
                            $result4 = mysqli_query($conn, $query4);
                            
                            $query5 = "SELECT SUM(payments) As sumOfBox2 FROM drivers WHERE `month`='4' AND `week`='2'";
                            $query6 = "SELECT SUM(trip_total) As sumOfInBox2 FROM drivers WHERE `month`='4' AND `week`='2'";
                            $query7 = "SELECT SUM(diesel) As sumOfToBox2 FROM drivers WHERE `month`='4' AND `week`='2'";
                            $query8 = "SELECT SUM(service_value) As sumOfForBox2 FROM drivers WHERE `month`='4' AND `week`='2'";
                            
                            $query9 = "SELECT SUM(payments) As sumOfBox3 FROM drivers WHERE `month`='4' AND `week`='3'";
                            $query10 = "SELECT SUM(trip_total) As sumOfInBox3 FROM drivers WHERE `month`='4' AND `week`='3'";
                            $query11 = "SELECT SUM(diesel) As sumOfToBox3 FROM drivers WHERE `month`='4' AND `week`='3'";
                            $query12 = "SELECT SUM(service_value) As sumOfForBox3 FROM drivers WHERE `month`='4' AND `week`='3'";
                            
                            $query13 = "SELECT SUM(payments) As sumOfBox4 FROM drivers WHERE `month`='4' AND `week`='4'";
                            $query14 = "SELECT SUM(trip_total) As sumOfInBox4 FROM drivers WHERE `month`='4' AND `week`='4'";
                            $query15 = "SELECT SUM(diesel) As sumOfToBox4 FROM drivers WHERE `month`='4' AND `week`='4'";
                            $query16 = "SELECT SUM(service_value) As sumOfForBox4 FROM drivers WHERE `month`='4' AND `week`='4'";
                            
                            $result5 = mysqli_query($conn, $query5);
                            $result6 = mysqli_query($conn, $query6);
                            $result7 = mysqli_query($conn, $query7);
                            $result8 = mysqli_query($conn, $query8);
                            
                            $result9 = mysqli_query($conn, $query9);
                            $result10 = mysqli_query($conn, $query10);
                            $result11 = mysqli_query($conn, $query11);
                            $result12 = mysqli_query($conn, $query12);
                            
                            $result13 = mysqli_query($conn, $query13);
                            $result14 = mysqli_query($conn, $query14);
                            $result15 = mysqli_query($conn, $query15);
                            $result16 = mysqli_query($conn, $query16);
                            
                            while ($row1 = mysqli_fetch_assoc($result1)) {
                                while ($row2 = mysqli_fetch_assoc($result2)) {
                                    while ($row3 = mysqli_fetch_assoc($result3)) {
                                        while ($row4 = mysqli_fetch_assoc($result4)) {
                                            
                                            while ($row5 = mysqli_fetch_assoc($result5)) {
                                                while ($row6 = mysqli_fetch_assoc($result6)) {
                                                    while ($row7 = mysqli_fetch_assoc($result7)) {
                                                        while ($row8 = mysqli_fetch_assoc($result8)) {
                                                            
                                                            while ($row9 = mysqli_fetch_assoc($result9)) {
                                                                while ($row10 = mysqli_fetch_assoc($result10)) {
                                                                    while ($row11 = mysqli_fetch_assoc($result11)) {
                                                                        while ($row12 = mysqli_fetch_assoc($result12)) {
                                                                            
                                                                            while ($row13 = mysqli_fetch_assoc($result13)) {
                                                                                while ($row14 = mysqli_fetch_assoc($result14)) {
                                                                                    while ($row15 = mysqli_fetch_assoc($result15)) {
                                                                                        while ($row16 = mysqli_fetch_assoc($result16)) {
                                            
$total = ($row1['sumOfBox1'] - ($row2['sumOfInBox1'] + $row3['sumOfToBox1'] + $row4['sumOfForBox1']))
+ ($row5['sumOfBox2'] - ($row6['sumOfInBox2'] +  $row7['sumOfToBox2'] + $row8['sumOfForBox2']))
+ ($row9['sumOfBox3'] - ($row10['sumOfInBox3'] + $row11['sumOfToBox3'] + $row12['sumOfForBox3']))
+ ($row13['sumOfBox4'] - ($row14['sumOfInBox4'] + $row15['sumOfToBox4'] + $row16['sumOfForBox4']));
    $total_payment = $row1['sumOfBox1'] + $row5['sumOfBox2'] + $row9['sumOfBox3'] + $row13['sumOfBox4'];
    $total_s = ($row2['sumOfInBox1'] + $row3['sumOfToBox1'] + $row4['sumOfForBox1']) + 
    ($row6['sumOfInBox2'] +  $row7['sumOfToBox2'] + $row8['sumOfForBox2']) +
    ($row10['sumOfInBox3'] + $row11['sumOfToBox3'] + $row12['sumOfForBox3']) +
    ($row14['sumOfInBox4'] + $row15['sumOfToBox4'] + $row16['sumOfForBox4']);
                                                                                    if ($total != 0) {
    echo '<a style="color: #FFC107; font-size: 22px;">' . number_format($total_s, 2) . '</a>' . ' - ' . '<a style="color: blue; font-size: 22px;">' . number_format($total_payment, 2) . '</a>' . ' = ' . number_format($total, 2); 
                                                                                     }
                                                                                    else {
                                                                                        echo '' . '0.00';
                                                                                    }
                                                                            
                                                                                        
                                                                                    }
                                                                                }
                                                                            }
                                                                        }
                                                            
                                                                       
                                                                    }
                                                                }
                                                            }
                                                        }
                                                            
                                                        
                                                    }
                                                }
                                            }
                                        }
                                            
                                       
                                    }
                                }
                            }
                        }
                        ?>
                </p>
            </div>
            <div class="content">
                <driv class="row ">
                    <div class="col"><h2>شهر 5</h2></div>
                </driv>
                <table class="table table-dark table-hover">
                    <tr>
                        <th>الأسبوع#</th>
                        <th>الحمولة</th>
                        <th style="background: #FFC107; color: black;">قيمة الخدمة</th>
                        <th style="background: #FFC107; color: black;">ديزل</th>
                        <th style="background: #FFC107; color: black;">التربات</th>
                        <th style="background: #0D6EFD;">الدفعات</th>
                        <th style="background: red;">الخصومات</th>
                        <th style="background: green;">الراتب</th>
                        <th>الدخل الأسبوعي</th>
                    </tr>
                    <tr>
                        <td>1</td>
                        <td>
                            <?php
                            $query = "SELECT SUM(payload_total) As sumOf61 FROM drivers WHERE `month`='5' AND `week`='1'";
                            $result = mysqli_query($conn, $query);
                            while ($row = mysqli_fetch_assoc($result)) {
                                $total = $row['sumOf61'];
                                if ($total != 0) {
                                    echo number_format($total, 2);
                                }
                                else {
                                    echo '' . '0.00';
                                }
                            }
                            ?>
                        </td>
                        <td style="background: #FFC107; color: black;">
                            <?php
                            $query = "SELECT SUM(service_value) As sumOf61 FROM drivers WHERE `month`='5' AND `week`='1'";
                            $result = mysqli_query($conn, $query);
                            while ($row = mysqli_fetch_assoc($result)) {
                                $total = $row['sumOf61'];
                                if ($total != 0) {
                                    echo number_format($total, 2);
                                }
                                else {
                                    echo '' . '0.00';
                                }
                            }
                            ?>
                        </td>
                        <td style="background: #FFC107; color: black;">
                            <?php
                            $query = "SELECT SUM(diesel) As sumOf61 FROM drivers WHERE `month`='5' AND `week`='1'";
                            $result = mysqli_query($conn, $query);
                            while ($row = mysqli_fetch_assoc($result)) {
                                $total = $row['sumOf61'];
                                if ($total != 0) {
                                    echo number_format($total, 2);
                                }
                                else {
                                    echo '' . '0.00';
                                }
                            }
                            ?>
                        </td>
                        <td style="background: #FFC107; color: black;">
                            <?php
                            $query = "SELECT SUM(trip_total) As sumOf61 FROM drivers WHERE `month`='5' AND `week`='1'";
                            $result = mysqli_query($conn, $query);
                            while ($row = mysqli_fetch_assoc($result)) {
                                $total = $row['sumOf61'];
                                if ($total != 0) {
                                    echo number_format($total, 2);
                                }
                                else {
                                    echo '' . '0.00';
                                }
                            }
                            ?>
                        </td>
                        <td style="background: #0D6EFD;">
                            <?php
                            $query = "SELECT SUM(payments) As sumOf61 FROM drivers WHERE `month`='5' AND `week`='1'";
                            $result = mysqli_query($conn, $query);
                            while ($row = mysqli_fetch_assoc($result)) {
                                $total = $row['sumOf61'];
                                if ($total != 0) {
                                    echo number_format($total, 2);
                                }
                                else {
                                    echo '' . '0.00';
                                }
                            }
                            ?>
                        </td>
                        <td style="background: red;">
                            <?php
                            $query = "SELECT SUM(discounts) As sumOf61 FROM drivers WHERE `month`='5' AND `week`='1'";
                            $result = mysqli_query($conn, $query);
                            while ($row = mysqli_fetch_assoc($result)) {
                                $total = $row['sumOf61'];
                                if ($total != 0) {
                                    echo number_format($total, 2);
                                }
                                else {
                                    echo '' . '0.00';
                                }
                            }
                            ?>
                        </td>
                        <td style="background: green;">
                            <?php
                            $query = "SELECT SUM(salary) As sumOf61 FROM drivers WHERE `month`='5' AND `week`='1'";
                            $result = mysqli_query($conn, $query);
                            while ($row = mysqli_fetch_assoc($result)) {
                                $total = $row['sumOf61'];
                                if ($total != 0) {
                                    echo number_format($total, 2);
                                }
                                else {
                                    echo '' . '0.00';
                                }
                            }
                            ?>
                        </td>
                        <td>
                            <?php
                            $query = "SELECT SUM(payload_total) As sumOf FROM drivers WHERE `month`='5' AND `week`='1'";
                            $query2 = "SELECT SUM(trip_total) As sumOfIn FROM drivers WHERE `month`='5' AND `week`='1'";
                            $query3 = "SELECT SUM(diesel) As sumOfTo FROM drivers WHERE `month`='5' AND `week`='1'";
                            $query4 = "SELECT SUM(service_value) As sumOfFor FROM drivers WHERE `month`='5' AND `week`='1'";
                            $total = 0;
                            $result = mysqli_query($conn, $query);
                            $result2 = mysqli_query($conn, $query2);
                            $result3 = mysqli_query($conn, $query3);
                            $result4 = mysqli_query($conn, $query4);

                            while ($row = mysqli_fetch_assoc($result)) {
                                while ($row2 = mysqli_fetch_assoc($result2)) {
                                    while ($row3 = mysqli_fetch_assoc($result3)) {
                                        while ($row4 = mysqli_fetch_assoc($result4)) {
                                            $total = $row['sumOf'] - ($row2['sumOfIn'] + $row3['sumOfTo'] + $row4['sumOfFor']);
                                            if ($total != 0) {
                                                echo number_format($total, 2);
                                             }
                                            else {
                                                echo '' . '0.00';
                                            }
                                        }
                                    }
                                }
                            }
                            ?>
                        </td>
                    </tr>
                    <tr>
                        <td>2</td>
                        <td>
                            <?php
                            $query = "SELECT SUM(payload_total) As sumOf62 FROM drivers WHERE `month`='5' AND `week`='2'";
                            $result = mysqli_query($conn, $query);
                            while ($row = mysqli_fetch_assoc($result)) {
                                $total = $row['sumOf62'];
                                if ($total != 0) {
                                    echo number_format($total, 2);
                                }
                                else {
                                    echo '' . '0.00';
                                }
                            }
                            ?>
                        </td>
                        <td style="background: #FFC107; color: black;">
                            <?php
                            $query = "SELECT SUM(service_value) As sumOf62 FROM drivers WHERE `month`='5' AND `week`='2'";
                            $result = mysqli_query($conn, $query);
                            while ($row = mysqli_fetch_assoc($result)) {
                                $total = $row['sumOf62'];
                                if ($total != 0) {
                                    echo number_format($total, 2);
                                }
                                else {
                                    echo '' . '0.00';
                                }
                            }
                            ?>
                        </td>
                        <td style="background: #FFC107; color: black;">
                            <?php
                            $query = "SELECT SUM(diesel) As sumOf62 FROM drivers WHERE `month`='5' AND `week`='2'";
                            $result = mysqli_query($conn, $query);
                            while ($row = mysqli_fetch_assoc($result)) {
                                $total = $row['sumOf62'];
                                if ($total != 0) {
                                    echo number_format($total, 2);
                                }
                                else {
                                    echo '' . '0.00';
                                }
                            }
                            ?>
                        </td>
                        <td style="background: #FFC107; color: black;">
                            <?php
                            $query = "SELECT SUM(trip_total) As sumOf62 FROM drivers WHERE `month`='5' AND `week`='2'";
                            $result = mysqli_query($conn, $query);
                            while ($row = mysqli_fetch_assoc($result)) {
                                $total = $row['sumOf62'];
                                if ($total != 0) {
                                    echo number_format($total, 2);
                                }
                                else {
                                    echo '' . '0.00';
                                }
                            }
                            ?>
                        </td>
                        <td style="background: #0D6EFD;">
                            <?php
                            $query = "SELECT SUM(payments) As sumOf61 FROM drivers WHERE `month`='5' AND `week`='2'";
                            $result = mysqli_query($conn, $query);
                            while ($row = mysqli_fetch_assoc($result)) {
                                $total = $row['sumOf61'];
                                if ($total != 0) {
                                    echo number_format($total, 2);
                                }
                                else {
                                    echo '' . '0.00';
                                }
                            }
                            ?>
                        </td>
                        <td style="background: red;">
                            <?php
                            $query = "SELECT SUM(discounts) As sumOf62 FROM drivers WHERE `month`='5' AND `week`='2'";
                            $result = mysqli_query($conn, $query);
                            while ($row = mysqli_fetch_assoc($result)) {
                                $total = $row['sumOf62'];
                                if ($total != 0) {
                                    echo number_format($total, 2);
                                }
                                else {
                                    echo '' . '0.00';
                                }
                            }
                            ?>
                        </td>
                        <td style="background: green;">
                            <?php
                            $query = "SELECT SUM(salary) As sumOf61 FROM drivers WHERE `month`='5' AND `week`='2'";
                            $result = mysqli_query($conn, $query);
                            while ($row = mysqli_fetch_assoc($result)) {
                                $total = $row['sumOf61'];
                                if ($total != 0) {
                                    echo number_format($total, 2);
                                }
                                else {
                                    echo '' . '0.00';
                                }
                            }
                            ?>
                        </td>
                        <td>
                            <?php
                            $query = "SELECT SUM(payload_total) As sumOf FROM drivers WHERE `month`='5' AND `week`='2'";
                            $query2 = "SELECT SUM(trip_total) As sumOfIn FROM drivers WHERE `month`='5' AND `week`='2'";
                            $query3 = "SELECT SUM(diesel) As sumOfTo FROM drivers WHERE `month`='5' AND `week`='2'";
                            $query4 = "SELECT SUM(service_value) As sumOfFor FROM drivers WHERE `month`='5' AND `week`='2'";
                            $total = 0;
                            $result = mysqli_query($conn, $query);
                            $result2 = mysqli_query($conn, $query2);
                            $result3 = mysqli_query($conn, $query3);
                            $result4 = mysqli_query($conn, $query4);

                            while ($row = mysqli_fetch_assoc($result)) {
                                while ($row2 = mysqli_fetch_assoc($result2)) {
                                    while ($row3 = mysqli_fetch_assoc($result3)) {
                                        while ($row4 = mysqli_fetch_assoc($result4)) {
                                            $total = $row['sumOf'] - ($row2['sumOfIn'] + $row3['sumOfTo'] + $row4['sumOfFor']);
                                            if ($total != 0) {
                                                echo number_format($total, 2);
                                             }
                                            else {
                                                echo '' . '0.00';
                                            }
                                        }
                                    }
                                }
                            }
                            ?>
                        </td>
                    </tr>
                    <tr>
                        <td>3</td>
                        <td>
                            <?php
                            $query = "SELECT SUM(payload_total) As sumOf63 FROM drivers WHERE `month`='5' AND `week`='3'";
                            $result = mysqli_query($conn, $query);
                            while ($row = mysqli_fetch_assoc($result)) {
                                $total = $row['sumOf63'];
                                if ($total != 0) {
                                    echo number_format($total, 2);
                                }
                                else {
                                    echo '' . '0.00';
                                }
                            }
                            ?>
                        </td>
                        <td style="background: #FFC107; color: black;">
                            <?php
                            $query = "SELECT SUM(service_value) As sumOf63 FROM drivers WHERE `month`='5' AND `week`='3'";
                            $result = mysqli_query($conn, $query);
                            while ($row = mysqli_fetch_assoc($result)) {
                                $total = $row['sumOf63'];
                                if ($total != 0) {
                                    echo number_format($total, 2);
                                }
                                else {
                                    echo '' . '0.00';
                                }
                            }
                            ?>
                        </td>
                        <td style="background: #FFC107; color: black;">
                            <?php
                            $query = "SELECT SUM(diesel) As sumOf63 FROM drivers WHERE `month`='5' AND `week`='3'";
                            $result = mysqli_query($conn, $query);
                            while ($row = mysqli_fetch_assoc($result)) {
                                $total = $row['sumOf63'];
                                if ($total != 0) {
                                    echo number_format($total, 2);
                                }
                                else {
                                    echo '' . '0.00';
                                }
                            }
                            ?>
                        </td>
                        <td style="background: #FFC107; color: black;">
                            <?php
                            $query = "SELECT SUM(trip_total) As sumOf63 FROM drivers WHERE `month`='5' AND `week`='3'";
                            $result = mysqli_query($conn, $query);
                            while ($row = mysqli_fetch_assoc($result)) {
                                $total = $row['sumOf63'];
                                if ($total != 0) {
                                    echo number_format($total, 2);
                                }
                                else {
                                    echo '' . '0.00';
                                }
                            }
                            ?>
                        </td>
                        <td style="background: #0D6EFD;">
                            <?php
                            $query = "SELECT SUM(payments) As sumOf61 FROM drivers WHERE `month`='5' AND `week`='3'";
                            $result = mysqli_query($conn, $query);
                            while ($row = mysqli_fetch_assoc($result)) {
                                $total = $row['sumOf61'];
                                if ($total != 0) {
                                    echo number_format($total, 2);
                                }
                                else {
                                    echo '' . '0.00';
                                }
                            }
                            ?>
                        </td>
                        <td style="background: red;">
                            <?php
                            $query = "SELECT SUM(discounts) As sumOf63 FROM drivers WHERE `month`='5' AND `week`='3'";
                            $result = mysqli_query($conn, $query);
                            while ($row = mysqli_fetch_assoc($result)) {
                                $total = $row['sumOf63'];
                                if ($total != 0) {
                                    echo number_format($total, 2);
                                }
                                else {
                                    echo '' . '0.00';
                                }
                            }
                            ?>
                        </td>
                        <td style="background: green;">
                            <?php
                            $query = "SELECT SUM(salary) As sumOf61 FROM drivers WHERE `month`='5' AND `week`='3'";
                            $result = mysqli_query($conn, $query);
                            while ($row = mysqli_fetch_assoc($result)) {
                                $total = $row['sumOf61'];
                                if ($total != 0) {
                                    echo number_format($total, 2);
                                }
                                else {
                                    echo '' . '0.00';
                                }
                            }
                            ?>
                        </td>
                        <td>
                            <?php
                            $query = "SELECT SUM(payload_total) As sumOf FROM drivers WHERE `month`='5' AND `week`='3'";
                            $query2 = "SELECT SUM(trip_total) As sumOfIn FROM drivers WHERE `month`='5' AND `week`='3'";
                            $query3 = "SELECT SUM(diesel) As sumOfTo FROM drivers WHERE `month`='5' AND `week`='3'";
                            $query4 = "SELECT SUM(service_value) As sumOfFor FROM drivers WHERE `month`='5' AND `week`='3'";
                            $total = 0;
                            $result = mysqli_query($conn, $query);
                            $result2 = mysqli_query($conn, $query2);
                            $result3 = mysqli_query($conn, $query3);
                            $result4 = mysqli_query($conn, $query4);

                            while ($row = mysqli_fetch_assoc($result)) {
                                while ($row2 = mysqli_fetch_assoc($result2)) {
                                    while ($row3 = mysqli_fetch_assoc($result3)) {
                                        while ($row4 = mysqli_fetch_assoc($result4)) {
                                            $total = $row['sumOf'] - ($row2['sumOfIn'] + $row3['sumOfTo'] + $row4['sumOfFor']);
                                            if ($total != 0) {
                                                echo number_format($total, 2);
                                             }
                                            else {
                                                echo '' . '0.00';
                                            }
                                        }
                                    }
                                }
                            }
                            ?>
                        </td>
                    </tr>
                    <tr>
                        <td>4</td>
                        <td>
                            <?php
                            $query = "SELECT SUM(payload_total) As sumOf64 FROM drivers WHERE `month`='5' AND `week`='4'";
                            $result = mysqli_query($conn, $query);
                            while ($row = mysqli_fetch_assoc($result)) {
                                $total = $row['sumOf64'];
                                if ($total != 0) {
                                    echo number_format($total, 2);
                                }
                                else {
                                    echo '' . '0.00';
                                }
                            }
                            ?>
                        </td>
                        <td style="background: #FFC107; color: black;">
                            <?php
                            $query = "SELECT SUM(service_value) As sumOf64 FROM drivers WHERE `month`='5' AND `week`='4'";
                            $result = mysqli_query($conn, $query);
                            while ($row = mysqli_fetch_assoc($result)) {
                                $total = $row['sumOf64'];
                                if ($total != 0) {
                                    echo number_format($total, 2);
                                }
                                else {
                                    echo '' . '0.00';
                                }
                            }
                            ?>
                        </td>
                        <td style="background: #FFC107; color: black;">
                            <?php
                            $query = "SELECT SUM(diesel) As sumOf64 FROM drivers WHERE `month`='5' AND `week`='4'";
                            $result = mysqli_query($conn, $query);
                            while ($row = mysqli_fetch_assoc($result)) {
                                $total = $row['sumOf64'];
                                if ($total != 0) {
                                    echo number_format($total, 2);
                                }
                                else {
                                    echo '' . '0.00';
                                }
                            }
                            ?>
                        </td>
                        <td style="background: #FFC107; color: black;">
                            <?php
                            $query = "SELECT SUM(trip_total) As sumOf64 FROM drivers WHERE `month`='5' AND `week`='4'";
                            $result = mysqli_query($conn, $query);
                            while ($row = mysqli_fetch_assoc($result)) {
                                $total = $row['sumOf64'];
                                if ($total != 0) {
                                    echo number_format($total, 2);
                                }
                                else {
                                    echo '' . '0.00';
                                }
                            }
                            ?>
                        </td>
                        <td style="background: #0D6EFD;">
                            <?php
                            $query = "SELECT SUM(payments) As sumOf61 FROM drivers WHERE `month`='5' AND `week`='4'";
                            $result = mysqli_query($conn, $query);
                            while ($row = mysqli_fetch_assoc($result)) {
                                $total = $row['sumOf61'];
                                if ($total != 0) {
                                    echo number_format($total, 2);
                                }
                                else {
                                    echo '' . '0.00';
                                }
                            }
                            ?>
                        </td>
                        <td style="background: red;">
                            <?php
                            $query = "SELECT SUM(discounts) As sumOf64 FROM drivers WHERE `month`='5' AND `week`='4'";
                            $result = mysqli_query($conn, $query);
                            while ($row = mysqli_fetch_assoc($result)) {
                                $total = $row['sumOf64'];
                                if ($total != 0) {
                                    echo number_format($total, 2);
                                }
                                else {
                                    echo '' . '0.00';
                                }
                            }
                            ?>
                        </td>
                        <td style="background: green;">
                            <?php
                            $query = "SELECT SUM(salary) As sumOf61 FROM drivers WHERE `month`='5' AND `week`='4'";
                            $result = mysqli_query($conn, $query);
                            while ($row = mysqli_fetch_assoc($result)) {
                                $total = $row['sumOf61'];
                                if ($total != 0) {
                                    echo number_format($total, 2);
                                }
                                else {
                                    echo '' . '0.00';
                                }
                            }
                            ?>
                        </td>
                        <td>
                            <?php
                            $query = "SELECT SUM(payload_total) As sumOf FROM drivers WHERE `month`='5' AND `week`='4'";
                            $query2 = "SELECT SUM(trip_total) As sumOfIn FROM drivers WHERE `month`='5' AND `week`='4'";
                            $query3 = "SELECT SUM(diesel) As sumOfTo FROM drivers WHERE `month`='5' AND `week`='4'";
                            $query4 = "SELECT SUM(service_value) As sumOfFor FROM drivers WHERE `month`='5' AND `week`='4'";
                            $total = 0;
                            $result = mysqli_query($conn, $query);
                            $result2 = mysqli_query($conn, $query2);
                            $result3 = mysqli_query($conn, $query3);
                            $result4 = mysqli_query($conn, $query4);

                            while ($row = mysqli_fetch_assoc($result)) {
                                while ($row2 = mysqli_fetch_assoc($result2)) {
                                    while ($row3 = mysqli_fetch_assoc($result3)) {
                                        while ($row4 = mysqli_fetch_assoc($result4)) {
                                            $total = $row['sumOf'] - ($row2['sumOfIn'] + $row3['sumOfTo'] + $row4['sumOfFor']);
                                            if ($total != 0) {
                                                echo number_format($total, 2);
                                             }
                                            else {
                                                echo '' . '0.00';
                                            }
                                        }
                                    }
                                }
                            }
                            ?>
                        </td>
                    </tr>
                </table>
                <!-- Modal -->
                    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="exampleModalLabel">التفاصيل</h1>
                                </div>
                                <div class="modal-body">
                                    <a>D</a>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">إغلاق</button>
                                    <button type="button" class="btn btn-primary">حفظ التغيرات</button>
                                </div>
                            </div>
                        </div>
                    </div>
                <p style="font-size: 24px;">
                    الصندوق = 
                    
                    (
                    
                    <a style="color: #FFC107; font-size: 22px;">إجمالي المصروفات</a>
                    
                    - 
                    
                    <!--<a style="color: #0D6EFD; font-size: 22px;">إجمالي الدفعات</a>-->
                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                        إجمالي الدفعات
                    </button>
                    

                    ) =
                    
                    <?php
                            $total = 0;
                            
                            $query1 = "SELECT SUM(payments) As sumOfBox1 FROM drivers WHERE `month`='5' AND `week`='1'";
                            $query2 = "SELECT SUM(trip_total) As sumOfInBox1 FROM drivers WHERE `month`='5' AND `week`='1'";
                            $query3 = "SELECT SUM(diesel) As sumOfToBox1 FROM drivers WHERE `month`='5' AND `week`='1'";
                            $query4 = "SELECT SUM(service_value) As sumOfForBox1 FROM drivers WHERE `month`='5' AND `week`='1'";
                            
                            $result1 = mysqli_query($conn, $query1);
                            $result2 = mysqli_query($conn, $query2);
                            $result3 = mysqli_query($conn, $query3);
                            $result4 = mysqli_query($conn, $query4);
                            
                            $query5 = "SELECT SUM(payments) As sumOfBox2 FROM drivers WHERE `month`='5' AND `week`='2'";
                            $query6 = "SELECT SUM(trip_total) As sumOfInBox2 FROM drivers WHERE `month`='5' AND `week`='2'";
                            $query7 = "SELECT SUM(diesel) As sumOfToBox2 FROM drivers WHERE `month`='5' AND `week`='2'";
                            $query8 = "SELECT SUM(service_value) As sumOfForBox2 FROM drivers WHERE `month`='5' AND `week`='2'";
                            
                            $query9 = "SELECT SUM(payments) As sumOfBox3 FROM drivers WHERE `month`='5' AND `week`='3'";
                            $query10 = "SELECT SUM(trip_total) As sumOfInBox3 FROM drivers WHERE `month`='5' AND `week`='3'";
                            $query11 = "SELECT SUM(diesel) As sumOfToBox3 FROM drivers WHERE `month`='5' AND `week`='3'";
                            $query12 = "SELECT SUM(service_value) As sumOfForBox3 FROM drivers WHERE `month`='5' AND `week`='3'";
                            
                            $query13 = "SELECT SUM(payments) As sumOfBox4 FROM drivers WHERE `month`='5' AND `week`='4'";
                            $query14 = "SELECT SUM(trip_total) As sumOfInBox4 FROM drivers WHERE `month`='5' AND `week`='4'";
                            $query15 = "SELECT SUM(diesel) As sumOfToBox4 FROM drivers WHERE `month`='5' AND `week`='4'";
                            $query16 = "SELECT SUM(service_value) As sumOfForBox4 FROM drivers WHERE `month`='5' AND `week`='4'";
                            
                            $result5 = mysqli_query($conn, $query5);
                            $result6 = mysqli_query($conn, $query6);
                            $result7 = mysqli_query($conn, $query7);
                            $result8 = mysqli_query($conn, $query8);
                            
                            $result9 = mysqli_query($conn, $query9);
                            $result10 = mysqli_query($conn, $query10);
                            $result11 = mysqli_query($conn, $query11);
                            $result12 = mysqli_query($conn, $query12);
                            
                            $result13 = mysqli_query($conn, $query13);
                            $result14 = mysqli_query($conn, $query14);
                            $result15 = mysqli_query($conn, $query15);
                            $result16 = mysqli_query($conn, $query16);
                            
                            while ($row1 = mysqli_fetch_assoc($result1)) {
                                while ($row2 = mysqli_fetch_assoc($result2)) {
                                    while ($row3 = mysqli_fetch_assoc($result3)) {
                                        while ($row4 = mysqli_fetch_assoc($result4)) {
                                            
                                            while ($row5 = mysqli_fetch_assoc($result5)) {
                                                while ($row6 = mysqli_fetch_assoc($result6)) {
                                                    while ($row7 = mysqli_fetch_assoc($result7)) {
                                                        while ($row8 = mysqli_fetch_assoc($result8)) {
                                                            
                                                            while ($row9 = mysqli_fetch_assoc($result9)) {
                                                                while ($row10 = mysqli_fetch_assoc($result10)) {
                                                                    while ($row11 = mysqli_fetch_assoc($result11)) {
                                                                        while ($row12 = mysqli_fetch_assoc($result12)) {
                                                                            
                                                                            while ($row13 = mysqli_fetch_assoc($result13)) {
                                                                                while ($row14 = mysqli_fetch_assoc($result14)) {
                                                                                    while ($row15 = mysqli_fetch_assoc($result15)) {
                                                                                        while ($row16 = mysqli_fetch_assoc($result16)) {
                                            
$total = ($row1['sumOfBox1'] - ($row2['sumOfInBox1'] + $row3['sumOfToBox1'] + $row4['sumOfForBox1']))
+ ($row5['sumOfBox2'] - ($row6['sumOfInBox2'] +  $row7['sumOfToBox2'] + $row8['sumOfForBox2']))
+ ($row9['sumOfBox3'] - ($row10['sumOfInBox3'] + $row11['sumOfToBox3'] + $row12['sumOfForBox3']))
+ ($row13['sumOfBox4'] - ($row14['sumOfInBox4'] + $row15['sumOfToBox4'] + $row16['sumOfForBox4']));
    $total_payment = $row1['sumOfBox1'] + $row5['sumOfBox2'] + $row9['sumOfBox3'] + $row13['sumOfBox4'];
    $total_s = ($row2['sumOfInBox1'] + $row3['sumOfToBox1'] + $row4['sumOfForBox1']) + 
    ($row6['sumOfInBox2'] +  $row7['sumOfToBox2'] + $row8['sumOfForBox2']) +
    ($row10['sumOfInBox3'] + $row11['sumOfToBox3'] + $row12['sumOfForBox3']) +
    ($row14['sumOfInBox4'] + $row15['sumOfToBox4'] + $row16['sumOfForBox4']);
                                                                                    if ($total != 0) {
    echo '<a style="color: #FFC107; font-size: 22px;">' . number_format($total_s, 2) . '</a>' . ' - ' . '<a style="color: blue; font-size: 22px;">' . number_format($total_payment, 2) . '</a>' . ' = ' . number_format($total, 2); 
                                                                                     }
                                                                                    else {
                                                                                        echo '' . '0.00';
                                                                                    }
                                                                            
                                                                                        
                                                                                    }
                                                                                }
                                                                            }
                                                                        }
                                                            
                                                                       
                                                                    }
                                                                }
                                                            }
                                                        }
                                                            
                                                        
                                                    }
                                                }
                                            }
                                        }
                                            
                                       
                                    }
                                }
                            }
                        }
                        ?>
                </p>
            </div>
            <div class="content">
                <driv class="row ">
                    <div class="col"><h2>شهر 6</h2></div>
                    <!--<div class="col-6">
                        <h3>
                            الدخل الشهري
                            <?php
                                    $total = 0;
                                    
                                    $query = "SELECT SUM(payload_total) As sumOf FROM drivers WHERE `month`='6' AND `week`='1'";
                                    $query2 = "SELECT SUM(trip_total) As sumOfIn FROM drivers WHERE `month`='6' AND `week`='1'";
                                    $query3 = "SELECT SUM(diesel) As sumOfTo FROM drivers WHERE `month`='6' AND `week`='1'";
                                    $query4 = "SELECT SUM(service_value) As sumOfFor FROM drivers WHERE `month`='6' AND `week`='1'";
                                    $result = mysqli_query($conn, $query);
                                    $result2 = mysqli_query($conn, $query2);
                                    $result3 = mysqli_query($conn, $query3);
                                    $result4 = mysqli_query($conn, $query4);
                                    
                                    $query5 = "SELECT SUM(payload_total) As sumOf2 FROM drivers WHERE `month`='6' AND `week`='2'";
                                    $query6 = "SELECT SUM(trip_total) As sumOfIn2 FROM drivers WHERE `month`='6' AND `week`='2'";
                                    $query7 = "SELECT SUM(diesel) As sumOfTo2 FROM drivers WHERE `month`='6' AND `week`='2'";
                                    $query8 = "SELECT SUM(service_value) As sumOfFor2 FROM drivers WHERE `month`='6' AND `week`='2'";
                                    
                                    $query9 = "SELECT SUM(payload_total) As sumOf3 FROM drivers WHERE `month`='6' AND `week`='3'";
                                    $query10 = "SELECT SUM(trip_total) As sumOfIn3 FROM drivers WHERE `month`='6' AND `week`='3'";
                                    $query11 = "SELECT SUM(diesel) As sumOfTo3 FROM drivers WHERE `month`='6' AND `week`='3'";
                                    $query12 = "SELECT SUM(service_value) As sumOfFor3 FROM drivers WHERE `month`='6' AND `week`='3'";
                                    
                                    $result5 = mysqli_query($conn, $query5);
                                    $result6 = mysqli_query($conn, $query6);
                                    $result7 = mysqli_query($conn, $query7);
                                    $result8 = mysqli_query($conn, $query8);
                                    
                                    $result9 = mysqli_query($conn, $query9);
                                    $result10 = mysqli_query($conn, $query10);
                                    $result11 = mysqli_query($conn, $query11);
                                    $result12 = mysqli_query($conn, $query12);
                                    
                                    while ($row = mysqli_fetch_assoc($result)) {
                                        while ($row2 = mysqli_fetch_assoc($result2)) {
                                            while ($row3 = mysqli_fetch_assoc($result3)) {
                                                while ($row4 = mysqli_fetch_assoc($result4)) {
                                                    
                                                    while ($row5 = mysqli_fetch_assoc($result5)) {
                                                        while ($row6 = mysqli_fetch_assoc($result6)) {
                                                            while ($row7 = mysqli_fetch_assoc($result7)) {
                                                                while ($row8 = mysqli_fetch_assoc($result8)) {
                                                                    
                                                                    while ($row9 = mysqli_fetch_assoc($result9)) {
                                                                        while ($row10 = mysqli_fetch_assoc($result10)) {
                                                                            while ($row11 = mysqli_fetch_assoc($result11)) {
                                                                                while ($row12 = mysqli_fetch_assoc($result12)) {
                                                    
                                                                                    $total = ($row['sumOf'] - ($row2['sumOfIn'] + $row3['sumOfTo'] + $row4['sumOfFor'])) + ($row5['sumOf2'] - ($row6['sumOfIn2'] + $row7['sumOfTo2'] + $row8['sumOfFor2'])) + ($row9['sumOf3'] - ($row10['sumOfIn3'] + $row11['sumOfTo3'] + $row12['sumOfFor3']));
                                                                                    if ($total != 0) {
                                                                                        echo number_format($total, 2);
                                                                                     }
                                                                                    else {
                                                                                        echo '' . '0.00';
                                                                                    }
                                                                    
                                                                                }
                                                                            }
                                                                        }
                                                                    }
                                                                    
                                                                }
                                                            }
                                                        }
                                                    }
                                                    
                                                }
                                            }
                                        }
                                    }
                                    ?>
                                <a style="color: #198754; font-size: 16px;">ريال سعودي</a>
                        </h3>
                    </div>-->
                </driv>
                <table class="table table-dark table-hover">
                    <tr>
                        <th>الأسبوع#</th>
                        <th>الحمولة</th>
                        <th style="background: #FFC107; color: black;">قيمة الخدمة</th>
                        <th style="background: #FFC107; color: black;">ديزل</th>
                        <th style="background: #FFC107; color: black;">التربات</th>
                        <th style="background: #0D6EFD;">الدفعات</th>
                        <th style="background: red;">الخصومات</th>
                        <th style="background: green;">الراتب</th>
                        <th>الدخل الأسبوعي</th>
                    </tr>
                    <tr>
                        <td>1</td>
                        <td>
                            <?php
                            $query = "SELECT SUM(payload_total) As sumOf61 FROM drivers WHERE `month`='6' AND `week`='1'";
                            $result = mysqli_query($conn, $query);
                            while ($row = mysqli_fetch_assoc($result)) {
                                $total = $row['sumOf61'];
                                if ($total != 0) {
                                    echo number_format($total, 2);
                                }
                                else {
                                    echo '' . '0.00';
                                }
                            }
                            ?>
                        </td>
                        <td style="background: #FFC107; color: black;">
                            <?php
                            $query = "SELECT SUM(service_value) As sumOf61 FROM drivers WHERE `month`='6' AND `week`='1'";
                            $result = mysqli_query($conn, $query);
                            while ($row = mysqli_fetch_assoc($result)) {
                                $total = $row['sumOf61'];
                                if ($total != 0) {
                                    echo number_format($total, 2);
                                }
                                else {
                                    echo '' . '0.00';
                                }
                            }
                            ?>
                        </td>
                        <td style="background: #FFC107; color: black;">
                            <?php
                            $query = "SELECT SUM(diesel) As sumOf61 FROM drivers WHERE `month`='6' AND `week`='1'";
                            $result = mysqli_query($conn, $query);
                            while ($row = mysqli_fetch_assoc($result)) {
                                $total = $row['sumOf61'];
                                if ($total != 0) {
                                    echo number_format($total, 2);
                                }
                                else {
                                    echo '' . '0.00';
                                }
                            }
                            ?>
                        </td>
                        <td style="background: #FFC107; color: black;">
                            <?php
                            $query = "SELECT SUM(trip_total) As sumOf61 FROM drivers WHERE `month`='6' AND `week`='1'";
                            $result = mysqli_query($conn, $query);
                            while ($row = mysqli_fetch_assoc($result)) {
                                $total = $row['sumOf61'];
                                if ($total != 0) {
                                    echo number_format($total, 2);
                                }
                                else {
                                    echo '' . '0.00';
                                }
                            }
                            ?>
                        </td>
                        <td style="background: #0D6EFD;">
                            <?php
                            $query = "SELECT SUM(payments) As sumOf61 FROM drivers WHERE `month`='6' AND `week`='1'";
                            $result = mysqli_query($conn, $query);
                            while ($row = mysqli_fetch_assoc($result)) {
                                $total = $row['sumOf61'];
                                if ($total != 0) {
                                    echo number_format($total, 2);
                                }
                                else {
                                    echo '' . '0.00';
                                }
                            }
                            ?>
                        </td>
                        <td style="background: red;">
                            <?php
                            $query = "SELECT SUM(discounts) As sumOf61 FROM drivers WHERE `month`='6' AND `week`='1'";
                            $result = mysqli_query($conn, $query);
                            while ($row = mysqli_fetch_assoc($result)) {
                                $total = $row['sumOf61'];
                                if ($total != 0) {
                                    echo number_format($total, 2);
                                }
                                else {
                                    echo '' . '0.00';
                                }
                            }
                            ?>
                        </td>
                        <td style="background: green;">
                            <?php
                            $query = "SELECT SUM(salary) As sumOf61 FROM drivers WHERE `month`='6' AND `week`='1'";
                            $result = mysqli_query($conn, $query);
                            while ($row = mysqli_fetch_assoc($result)) {
                                $total = $row['sumOf61'];
                                if ($total != 0) {
                                    echo number_format($total, 2);
                                }
                                else {
                                    echo '' . '0.00';
                                }
                            }
                            ?>
                        </td>
                        <td>
                            <?php
                            $query = "SELECT SUM(payload_total) As sumOf FROM drivers WHERE `month`='6' AND `week`='1'";
                            $query2 = "SELECT SUM(trip_total) As sumOfIn FROM drivers WHERE `month`='6' AND `week`='1'";
                            $query3 = "SELECT SUM(diesel) As sumOfTo FROM drivers WHERE `month`='6' AND `week`='1'";
                            $query4 = "SELECT SUM(service_value) As sumOfFor FROM drivers WHERE `month`='6' AND `week`='1'";
                            $total = 0;
                            $result = mysqli_query($conn, $query);
                            $result2 = mysqli_query($conn, $query2);
                            $result3 = mysqli_query($conn, $query3);
                            $result4 = mysqli_query($conn, $query4);

                            while ($row = mysqli_fetch_assoc($result)) {
                                while ($row2 = mysqli_fetch_assoc($result2)) {
                                    while ($row3 = mysqli_fetch_assoc($result3)) {
                                        while ($row4 = mysqli_fetch_assoc($result4)) {
                                            $total = $row['sumOf'] - ($row2['sumOfIn'] + $row3['sumOfTo'] + $row4['sumOfFor']);
                                            if ($total != 0) {
                                                echo number_format($total, 2);
                                             }
                                            else {
                                                echo '' . '0.00';
                                            }
                                        }
                                    }
                                }
                            }
                            ?>
                        </td>
                    </tr>
                    <tr>
                        <td>2</td>
                        <td>
                            <?php
                            $query = "SELECT SUM(payload_total) As sumOf62 FROM drivers WHERE `month`='6' AND `week`='2'";
                            $result = mysqli_query($conn, $query);
                            while ($row = mysqli_fetch_assoc($result)) {
                                $total = $row['sumOf62'];
                                if ($total != 0) {
                                    echo number_format($total, 2);
                                }
                                else {
                                    echo '' . '0.00';
                                }
                            }
                            ?>
                        </td>
                        <td style="background: #FFC107; color: black;">
                            <?php
                            $query = "SELECT SUM(service_value) As sumOf62 FROM drivers WHERE `month`='6' AND `week`='2'";
                            $result = mysqli_query($conn, $query);
                            while ($row = mysqli_fetch_assoc($result)) {
                                $total = $row['sumOf62'];
                                if ($total != 0) {
                                    echo number_format($total, 2);
                                }
                                else {
                                    echo '' . '0.00';
                                }
                            }
                            ?>
                        </td>
                        <td style="background: #FFC107; color: black;">
                            <?php
                            $query = "SELECT SUM(diesel) As sumOf62 FROM drivers WHERE `month`='6' AND `week`='2'";
                            $result = mysqli_query($conn, $query);
                            while ($row = mysqli_fetch_assoc($result)) {
                                $total = $row['sumOf62'];
                                if ($total != 0) {
                                    echo number_format($total, 2);
                                }
                                else {
                                    echo '' . '0.00';
                                }
                            }
                            ?>
                        </td>
                        <td style="background: #FFC107; color: black;">
                            <?php
                            $query = "SELECT SUM(trip_total) As sumOf62 FROM drivers WHERE `month`='6' AND `week`='2'";
                            $result = mysqli_query($conn, $query);
                            while ($row = mysqli_fetch_assoc($result)) {
                                $total = $row['sumOf62'];
                                if ($total != 0) {
                                    echo number_format($total, 2);
                                }
                                else {
                                    echo '' . '0.00';
                                }
                            }
                            ?>
                        </td>
                        <td style="background: #0D6EFD;">
                            <?php
                            $query = "SELECT SUM(payments) As sumOf61 FROM drivers WHERE `month`='6' AND `week`='2'";
                            $result = mysqli_query($conn, $query);
                            while ($row = mysqli_fetch_assoc($result)) {
                                $total = $row['sumOf61'];
                                if ($total != 0) {
                                    echo number_format($total, 2);
                                }
                                else {
                                    echo '' . '0.00';
                                }
                            }
                            ?>
                        </td>
                        <td style="background: red;">
                            <?php
                            $query = "SELECT SUM(discounts) As sumOf62 FROM drivers WHERE `month`='6' AND `week`='2'";
                            $result = mysqli_query($conn, $query);
                            while ($row = mysqli_fetch_assoc($result)) {
                                $total = $row['sumOf62'];
                                if ($total != 0) {
                                    echo number_format($total, 2);
                                }
                                else {
                                    echo '' . '0.00';
                                }
                            }
                            ?>
                        </td>
                        <td style="background: green;">
                            <?php
                            $query = "SELECT SUM(salary) As sumOf61 FROM drivers WHERE `month`='6' AND `week`='2'";
                            $result = mysqli_query($conn, $query);
                            while ($row = mysqli_fetch_assoc($result)) {
                                $total = $row['sumOf61'];
                                if ($total != 0) {
                                    echo number_format($total, 2);
                                }
                                else {
                                    echo '' . '0.00';
                                }
                            }
                            ?>
                        </td>
                        <td>
                            <?php
                            $query = "SELECT SUM(payload_total) As sumOf FROM drivers WHERE `month`='6' AND `week`='2'";
                            $query2 = "SELECT SUM(trip_total) As sumOfIn FROM drivers WHERE `month`='6' AND `week`='2'";
                            $query3 = "SELECT SUM(diesel) As sumOfTo FROM drivers WHERE `month`='6' AND `week`='2'";
                            $query4 = "SELECT SUM(service_value) As sumOfFor FROM drivers WHERE `month`='6' AND `week`='2'";
                            $total = 0;
                            $result = mysqli_query($conn, $query);
                            $result2 = mysqli_query($conn, $query2);
                            $result3 = mysqli_query($conn, $query3);
                            $result4 = mysqli_query($conn, $query4);

                            while ($row = mysqli_fetch_assoc($result)) {
                                while ($row2 = mysqli_fetch_assoc($result2)) {
                                    while ($row3 = mysqli_fetch_assoc($result3)) {
                                        while ($row4 = mysqli_fetch_assoc($result4)) {
                                            $total = $row['sumOf'] - ($row2['sumOfIn'] + $row3['sumOfTo'] + $row4['sumOfFor']);
                                            if ($total != 0) {
                                                echo number_format($total, 2);
                                             }
                                            else {
                                                echo '' . '0.00';
                                            }
                                        }
                                    }
                                }
                            }
                            ?>
                        </td>
                    </tr>
                    <tr>
                        <td>3</td>
                        <td>
                            <?php
                            $query = "SELECT SUM(payload_total) As sumOf63 FROM drivers WHERE `month`='6' AND `week`='3'";
                            $result = mysqli_query($conn, $query);
                            while ($row = mysqli_fetch_assoc($result)) {
                                $total = $row['sumOf63'];
                                if ($total != 0) {
                                    echo number_format($total, 2);
                                }
                                else {
                                    echo '' . '0.00';
                                }
                            }
                            ?>
                        </td>
                        <td style="background: #FFC107; color: black;">
                            <?php
                            $query = "SELECT SUM(service_value) As sumOf63 FROM drivers WHERE `month`='6' AND `week`='3'";
                            $result = mysqli_query($conn, $query);
                            while ($row = mysqli_fetch_assoc($result)) {
                                $total = $row['sumOf63'];
                                if ($total != 0) {
                                    echo number_format($total, 2);
                                }
                                else {
                                    echo '' . '0.00';
                                }
                            }
                            ?>
                        </td>
                        <td style="background: #FFC107; color: black;">
                            <?php
                            $query = "SELECT SUM(diesel) As sumOf63 FROM drivers WHERE `month`='6' AND `week`='3'";
                            $result = mysqli_query($conn, $query);
                            while ($row = mysqli_fetch_assoc($result)) {
                                $total = $row['sumOf63'];
                                if ($total != 0) {
                                    echo number_format($total, 2);
                                }
                                else {
                                    echo '' . '0.00';
                                }
                            }
                            ?>
                        </td>
                        <td style="background: #FFC107; color: black;">
                            <?php
                            $query = "SELECT SUM(trip_total) As sumOf63 FROM drivers WHERE `month`='6' AND `week`='3'";
                            $result = mysqli_query($conn, $query);
                            while ($row = mysqli_fetch_assoc($result)) {
                                $total = $row['sumOf63'];
                                if ($total != 0) {
                                    echo number_format($total, 2);
                                }
                                else {
                                    echo '' . '0.00';
                                }
                            }
                            ?>
                        </td>
                        <td style="background: #0D6EFD;">
                            <?php
                            $query = "SELECT SUM(payments) As sumOf61 FROM drivers WHERE `month`='6' AND `week`='3'";
                            $result = mysqli_query($conn, $query);
                            while ($row = mysqli_fetch_assoc($result)) {
                                $total = $row['sumOf61'];
                                if ($total != 0) {
                                    echo number_format($total, 2);
                                }
                                else {
                                    echo '' . '0.00';
                                }
                            }
                            ?>
                        </td>
                        <td style="background: red;">
                            <?php
                            $query = "SELECT SUM(discounts) As sumOf63 FROM drivers WHERE `month`='6' AND `week`='3'";
                            $result = mysqli_query($conn, $query);
                            while ($row = mysqli_fetch_assoc($result)) {
                                $total = $row['sumOf63'];
                                if ($total != 0) {
                                    echo number_format($total, 2);
                                }
                                else {
                                    echo '' . '0.00';
                                }
                            }
                            ?>
                        </td>
                        <td style="background: green;">
                            <?php
                            $query = "SELECT SUM(salary) As sumOf61 FROM drivers WHERE `month`='6' AND `week`='3'";
                            $result = mysqli_query($conn, $query);
                            while ($row = mysqli_fetch_assoc($result)) {
                                $total = $row['sumOf61'];
                                if ($total != 0) {
                                    echo number_format($total, 2);
                                }
                                else {
                                    echo '' . '0.00';
                                }
                            }
                            ?>
                        </td>
                        <td>
                            <?php
                            $query = "SELECT SUM(payload_total) As sumOf FROM drivers WHERE `month`='6' AND `week`='3'";
                            $query2 = "SELECT SUM(trip_total) As sumOfIn FROM drivers WHERE `month`='6' AND `week`='3'";
                            $query3 = "SELECT SUM(diesel) As sumOfTo FROM drivers WHERE `month`='6' AND `week`='3'";
                            $query4 = "SELECT SUM(service_value) As sumOfFor FROM drivers WHERE `month`='6' AND `week`='3'";
                            $total = 0;
                            $result = mysqli_query($conn, $query);
                            $result2 = mysqli_query($conn, $query2);
                            $result3 = mysqli_query($conn, $query3);
                            $result4 = mysqli_query($conn, $query4);

                            while ($row = mysqli_fetch_assoc($result)) {
                                while ($row2 = mysqli_fetch_assoc($result2)) {
                                    while ($row3 = mysqli_fetch_assoc($result3)) {
                                        while ($row4 = mysqli_fetch_assoc($result4)) {
                                            $total = $row['sumOf'] - ($row2['sumOfIn'] + $row3['sumOfTo'] + $row4['sumOfFor']);
                                            if ($total != 0) {
                                                echo number_format($total, 2);
                                             }
                                            else {
                                                echo '' . '0.00';
                                            }
                                        }
                                    }
                                }
                            }
                            ?>
                        </td>
                    </tr>
                    <tr>
                        <td>4</td>
                        <td>
                            <?php
                            $query = "SELECT SUM(payload_total) As sumOf64 FROM drivers WHERE `month`='6' AND `week`='4'";
                            $result = mysqli_query($conn, $query);
                            while ($row = mysqli_fetch_assoc($result)) {
                                $total = $row['sumOf64'];
                                if ($total != 0) {
                                    echo number_format($total, 2);
                                }
                                else {
                                    echo '' . '0.00';
                                }
                            }
                            ?>
                        </td>
                        <td style="background: #FFC107; color: black;">
                            <?php
                            $query = "SELECT SUM(service_value) As sumOf64 FROM drivers WHERE `month`='6' AND `week`='4'";
                            $result = mysqli_query($conn, $query);
                            while ($row = mysqli_fetch_assoc($result)) {
                                $total = $row['sumOf64'];
                                if ($total != 0) {
                                    echo number_format($total, 2);
                                }
                                else {
                                    echo '' . '0.00';
                                }
                            }
                            ?>
                        </td>
                        <td style="background: #FFC107; color: black;">
                            <?php
                            $query = "SELECT SUM(diesel) As sumOf64 FROM drivers WHERE `month`='6' AND `week`='4'";
                            $result = mysqli_query($conn, $query);
                            while ($row = mysqli_fetch_assoc($result)) {
                                $total = $row['sumOf64'];
                                if ($total != 0) {
                                    echo number_format($total, 2);
                                }
                                else {
                                    echo '' . '0.00';
                                }
                            }
                            ?>
                        </td>
                        <td style="background: #FFC107; color: black;">
                            <?php
                            $query = "SELECT SUM(trip_total) As sumOf64 FROM drivers WHERE `month`='6' AND `week`='4'";
                            $result = mysqli_query($conn, $query);
                            while ($row = mysqli_fetch_assoc($result)) {
                                $total = $row['sumOf64'];
                                if ($total != 0) {
                                    echo number_format($total, 2);
                                }
                                else {
                                    echo '' . '0.00';
                                }
                            }
                            ?>
                        </td>
                        <td style="background: #0D6EFD;">
                            <?php
                            $query = "SELECT SUM(payments) As sumOf61 FROM drivers WHERE `month`='6' AND `week`='4'";
                            $result = mysqli_query($conn, $query);
                            while ($row = mysqli_fetch_assoc($result)) {
                                $total = $row['sumOf61'];
                                if ($total != 0) {
                                    echo number_format($total, 2);
                                }
                                else {
                                    echo '' . '0.00';
                                }
                            }
                            ?>
                        </td>
                        <td style="background: red;">
                            <?php
                            $query = "SELECT SUM(discounts) As sumOf64 FROM drivers WHERE `month`='6' AND `week`='4'";
                            $result = mysqli_query($conn, $query);
                            while ($row = mysqli_fetch_assoc($result)) {
                                $total = $row['sumOf64'];
                                if ($total != 0) {
                                    echo number_format($total, 2);
                                }
                                else {
                                    echo '' . '0.00';
                                }
                            }
                            ?>
                        </td>
                        <td style="background: green;">
                            <?php
                            $query = "SELECT SUM(salary) As sumOf61 FROM drivers WHERE `month`='6' AND `week`='4'";
                            $result = mysqli_query($conn, $query);
                            while ($row = mysqli_fetch_assoc($result)) {
                                $total = $row['sumOf61'];
                                if ($total != 0) {
                                    echo number_format($total, 2);
                                }
                                else {
                                    echo '' . '0.00';
                                }
                            }
                            ?>
                        </td>
                        <td>
                            <?php
                            $query = "SELECT SUM(payload_total) As sumOf FROM drivers WHERE `month`='6' AND `week`='4'";
                            $query2 = "SELECT SUM(trip_total) As sumOfIn FROM drivers WHERE `month`='6' AND `week`='4'";
                            $query3 = "SELECT SUM(diesel) As sumOfTo FROM drivers WHERE `month`='6' AND `week`='4'";
                            $query4 = "SELECT SUM(service_value) As sumOfFor FROM drivers WHERE `month`='6' AND `week`='4'";
                            $total = 0;
                            $result = mysqli_query($conn, $query);
                            $result2 = mysqli_query($conn, $query2);
                            $result3 = mysqli_query($conn, $query3);
                            $result4 = mysqli_query($conn, $query4);

                            while ($row = mysqli_fetch_assoc($result)) {
                                while ($row2 = mysqli_fetch_assoc($result2)) {
                                    while ($row3 = mysqli_fetch_assoc($result3)) {
                                        while ($row4 = mysqli_fetch_assoc($result4)) {
                                            $total = $row['sumOf'] - ($row2['sumOfIn'] + $row3['sumOfTo'] + $row4['sumOfFor']);
                                            if ($total != 0) {
                                                echo number_format($total, 2);
                                             }
                                            else {
                                                echo '' . '0.00';
                                            }
                                        }
                                    }
                                }
                            }
                            ?>
                        </td>
                    </tr>
                </table>
                <!-- Modal -->
                    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="exampleModalLabel">التفاصيل</h1>
                                </div>
                                <div class="modal-body">
                                    <a>D</a>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">إغلاق</button>
                                    <button type="button" class="btn btn-primary">حفظ التغيرات</button>
                                </div>
                            </div>
                        </div>
                    </div>
                <p style="font-size: 24px;">
                    الصندوق = 
                    
                    (
                    
                    <a style="color: #FFC107; font-size: 22px;">إجمالي المصروفات</a>
                    
                    - 
                    
                    <!--<a style="color: #0D6EFD; font-size: 22px;">إجمالي الدفعات</a>-->
                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                        إجمالي الدفعات
                    </button>
                    

                    ) =
                    
                    <?php
                            $total = 0;
                            
                            $query1 = "SELECT SUM(payments) As sumOfBox1 FROM drivers WHERE `month`='6' AND `week`='1'";
                            $query2 = "SELECT SUM(trip_total) As sumOfInBox1 FROM drivers WHERE `month`='6' AND `week`='1'";
                            $query3 = "SELECT SUM(diesel) As sumOfToBox1 FROM drivers WHERE `month`='6' AND `week`='1'";
                            $query4 = "SELECT SUM(service_value) As sumOfForBox1 FROM drivers WHERE `month`='6' AND `week`='1'";
                            
                            $result1 = mysqli_query($conn, $query1);
                            $result2 = mysqli_query($conn, $query2);
                            $result3 = mysqli_query($conn, $query3);
                            $result4 = mysqli_query($conn, $query4);
                            
                            $query5 = "SELECT SUM(payments) As sumOfBox2 FROM drivers WHERE `month`='6' AND `week`='2'";
                            $query6 = "SELECT SUM(trip_total) As sumOfInBox2 FROM drivers WHERE `month`='6' AND `week`='2'";
                            $query7 = "SELECT SUM(diesel) As sumOfToBox2 FROM drivers WHERE `month`='6' AND `week`='2'";
                            $query8 = "SELECT SUM(service_value) As sumOfForBox2 FROM drivers WHERE `month`='6' AND `week`='2'";
                            
                            $query9 = "SELECT SUM(payments) As sumOfBox3 FROM drivers WHERE `month`='6' AND `week`='3'";
                            $query10 = "SELECT SUM(trip_total) As sumOfInBox3 FROM drivers WHERE `month`='6' AND `week`='3'";
                            $query11 = "SELECT SUM(diesel) As sumOfToBox3 FROM drivers WHERE `month`='6' AND `week`='3'";
                            $query12 = "SELECT SUM(service_value) As sumOfForBox3 FROM drivers WHERE `month`='6' AND `week`='3'";
                            
                            $query13 = "SELECT SUM(payments) As sumOfBox4 FROM drivers WHERE `month`='6' AND `week`='4'";
                            $query14 = "SELECT SUM(trip_total) As sumOfInBox4 FROM drivers WHERE `month`='6' AND `week`='4'";
                            $query15 = "SELECT SUM(diesel) As sumOfToBox4 FROM drivers WHERE `month`='6' AND `week`='4'";
                            $query16 = "SELECT SUM(service_value) As sumOfForBox4 FROM drivers WHERE `month`='6' AND `week`='4'";
                            
                            $result5 = mysqli_query($conn, $query5);
                            $result6 = mysqli_query($conn, $query6);
                            $result7 = mysqli_query($conn, $query7);
                            $result8 = mysqli_query($conn, $query8);
                            
                            $result9 = mysqli_query($conn, $query9);
                            $result10 = mysqli_query($conn, $query10);
                            $result11 = mysqli_query($conn, $query11);
                            $result12 = mysqli_query($conn, $query12);
                            
                            $result13 = mysqli_query($conn, $query13);
                            $result14 = mysqli_query($conn, $query14);
                            $result15 = mysqli_query($conn, $query15);
                            $result16 = mysqli_query($conn, $query16);
                            
                            while ($row1 = mysqli_fetch_assoc($result1)) {
                                while ($row2 = mysqli_fetch_assoc($result2)) {
                                    while ($row3 = mysqli_fetch_assoc($result3)) {
                                        while ($row4 = mysqli_fetch_assoc($result4)) {
                                            
                                            while ($row5 = mysqli_fetch_assoc($result5)) {
                                                while ($row6 = mysqli_fetch_assoc($result6)) {
                                                    while ($row7 = mysqli_fetch_assoc($result7)) {
                                                        while ($row8 = mysqli_fetch_assoc($result8)) {
                                                            
                                                            while ($row9 = mysqli_fetch_assoc($result9)) {
                                                                while ($row10 = mysqli_fetch_assoc($result10)) {
                                                                    while ($row11 = mysqli_fetch_assoc($result11)) {
                                                                        while ($row12 = mysqli_fetch_assoc($result12)) {
                                                                            
                                                                            while ($row13 = mysqli_fetch_assoc($result13)) {
                                                                                while ($row14 = mysqli_fetch_assoc($result14)) {
                                                                                    while ($row15 = mysqli_fetch_assoc($result15)) {
                                                                                        while ($row16 = mysqli_fetch_assoc($result16)) {
                                            
$total = ($row1['sumOfBox1'] - ($row2['sumOfInBox1'] + $row3['sumOfToBox1'] + $row4['sumOfForBox1']))
+ ($row5['sumOfBox2'] - ($row6['sumOfInBox2'] +  $row7['sumOfToBox2'] + $row8['sumOfForBox2']))
+ ($row9['sumOfBox3'] - ($row10['sumOfInBox3'] + $row11['sumOfToBox3'] + $row12['sumOfForBox3']))
+ ($row13['sumOfBox4'] - ($row14['sumOfInBox4'] + $row15['sumOfToBox4'] + $row16['sumOfForBox4']));
    $total_payment = $row1['sumOfBox1'] + $row5['sumOfBox2'] + $row9['sumOfBox3'] + $row13['sumOfBox4'];
    $total_s = ($row2['sumOfInBox1'] + $row3['sumOfToBox1'] + $row4['sumOfForBox1']) + 
    ($row6['sumOfInBox2'] +  $row7['sumOfToBox2'] + $row8['sumOfForBox2']) +
    ($row10['sumOfInBox3'] + $row11['sumOfToBox3'] + $row12['sumOfForBox3']) +
    ($row14['sumOfInBox4'] + $row15['sumOfToBox4'] + $row16['sumOfForBox4']);
                                                                                    if ($total != 0) {
    echo '<a style="color: #FFC107; font-size: 22px;">' . number_format($total_s, 2) . '</a>' . ' - ' . '<a style="color: blue; font-size: 22px;">' . number_format($total_payment, 2) . '</a>' . ' = ' . number_format($total, 2); 
                                                                                     }
                                                                                    else {
                                                                                        echo '' . '0.00';
                                                                                    }
                                                                            
                                                                                        
                                                                                    }
                                                                                }
                                                                            }
                                                                        }
                                                            
                                                                       
                                                                    }
                                                                }
                                                            }
                                                        }
                                                            
                                                        
                                                    }
                                                }
                                            }
                                        }
                                            
                                       
                                    }
                                }
                            }
                        }
                        ?>
                </p>
            </div>
            <div class="content">
                <driv class="row ">
                    <div class="col"><h2>شهر 7</h2></div>
                </driv>
                <table class="table table-dark table-hover">
                    <tr>
                        <th>الأسبوع#</th>
                        <th>الحمولة</th>
                        <th style="background: #FFC107; color: black;">قيمة الخدمة</th>
                        <th style="background: #FFC107; color: black;">ديزل</th>
                        <th style="background: #FFC107; color: black;">التربات</th>
                        <th style="background: #0D6EFD;">الدفعات</th>
                        <th style="background: red;">الخصومات</th>
                        <th style="background: green;">الراتب</th>
                        <th>الدخل الأسبوعي</th>
                    </tr>
                    <tr>
                        <td>1</td>
                        <td>
                            <?php
                            $query = "SELECT SUM(payload_total) As sumOf61 FROM drivers WHERE `month`='7' AND `week`='1'";
                            $result = mysqli_query($conn, $query);
                            while ($row = mysqli_fetch_assoc($result)) {
                                $total = $row['sumOf61'];
                                if ($total != 0) {
                                    echo number_format($total, 2);
                                }
                                else {
                                    echo '' . '0.00';
                                }
                            }
                            ?>
                        </td>
                        <td style="background: #FFC107; color: black;">
                            <?php
                            $query = "SELECT SUM(service_value) As sumOf61 FROM drivers WHERE `month`='7' AND `week`='1'";
                            $result = mysqli_query($conn, $query);
                            while ($row = mysqli_fetch_assoc($result)) {
                                $total = $row['sumOf61'];
                                if ($total != 0) {
                                    echo number_format($total, 2);
                                }
                                else {
                                    echo '' . '0.00';
                                }
                            }
                            ?>
                        </td>
                        <td style="background: #FFC107; color: black;">
                            <?php
                            $query = "SELECT SUM(diesel) As sumOf61 FROM drivers WHERE `month`='7' AND `week`='1'";
                            $result = mysqli_query($conn, $query);
                            while ($row = mysqli_fetch_assoc($result)) {
                                $total = $row['sumOf61'];
                                if ($total != 0) {
                                    echo number_format($total, 2);
                                }
                                else {
                                    echo '' . '0.00';
                                }
                            }
                            ?>
                        </td>
                        <td style="background: #FFC107; color: black;">
                            <?php
                            $query = "SELECT SUM(trip_total) As sumOf61 FROM drivers WHERE `month`='7' AND `week`='1'";
                            $result = mysqli_query($conn, $query);
                            while ($row = mysqli_fetch_assoc($result)) {
                                $total = $row['sumOf61'];
                                if ($total != 0) {
                                    echo number_format($total, 2);
                                }
                                else {
                                    echo '' . '0.00';
                                }
                            }
                            ?>
                        </td>
                        <td style="background: #0D6EFD;">
                            <?php
                            $query = "SELECT SUM(payments) As sumOf61 FROM drivers WHERE `month`='7' AND `week`='1'";
                            $result = mysqli_query($conn, $query);
                            while ($row = mysqli_fetch_assoc($result)) {
                                $total = $row['sumOf61'];
                                if ($total != 0) {
                                    echo number_format($total, 2);
                                }
                                else {
                                    echo '' . '0.00';
                                }
                            }
                            ?>
                        </td>
                        <td style="background: red;">
                            <?php
                            $query = "SELECT SUM(discounts) As sumOf61 FROM drivers WHERE `month`='7' AND `week`='1'";
                            $result = mysqli_query($conn, $query);
                            while ($row = mysqli_fetch_assoc($result)) {
                                $total = $row['sumOf61'];
                                if ($total != 0) {
                                    echo number_format($total, 2);
                                }
                                else {
                                    echo '' . '0.00';
                                }
                            }
                            ?>
                        </td>
                        <td style="background: green;">
                            <?php
                            $query = "SELECT SUM(salary) As sumOf61 FROM drivers WHERE `month`='7' AND `week`='1'";
                            $result = mysqli_query($conn, $query);
                            while ($row = mysqli_fetch_assoc($result)) {
                                $total = $row['sumOf61'];
                                if ($total != 0) {
                                    echo number_format($total, 2);
                                }
                                else {
                                    echo '' . '0.00';
                                }
                            }
                            ?>
                        </td>
                        <td>
                            <?php
                            $query = "SELECT SUM(payload_total) As sumOf FROM drivers WHERE `month`='7' AND `week`='1'";
                            $query2 = "SELECT SUM(trip_total) As sumOfIn FROM drivers WHERE `month`='7' AND `week`='1'";
                            $query3 = "SELECT SUM(diesel) As sumOfTo FROM drivers WHERE `month`='7' AND `week`='1'";
                            $query4 = "SELECT SUM(service_value) As sumOfFor FROM drivers WHERE `month`='7' AND `week`='1'";
                            $total = 0;
                            $result = mysqli_query($conn, $query);
                            $result2 = mysqli_query($conn, $query2);
                            $result3 = mysqli_query($conn, $query3);
                            $result4 = mysqli_query($conn, $query4);

                            while ($row = mysqli_fetch_assoc($result)) {
                                while ($row2 = mysqli_fetch_assoc($result2)) {
                                    while ($row3 = mysqli_fetch_assoc($result3)) {
                                        while ($row4 = mysqli_fetch_assoc($result4)) {
                                            $total = $row['sumOf'] - ($row2['sumOfIn'] + $row3['sumOfTo'] + $row4['sumOfFor']);
                                            if ($total != 0) {
                                                echo number_format($total, 2);
                                             }
                                            else {
                                                echo '' . '0.00';
                                            }
                                        }
                                    }
                                }
                            }
                            ?>
                        </td>
                    </tr>
                    <tr>
                        <td>2</td>
                        <td>
                            <?php
                            $query = "SELECT SUM(payload_total) As sumOf62 FROM drivers WHERE `month`='7' AND `week`='2'";
                            $result = mysqli_query($conn, $query);
                            while ($row = mysqli_fetch_assoc($result)) {
                                $total = $row['sumOf62'];
                                if ($total != 0) {
                                    echo number_format($total, 2);
                                }
                                else {
                                    echo '' . '0.00';
                                }
                            }
                            ?>
                        </td>
                        <td style="background: #FFC107; color: black;">
                            <?php
                            $query = "SELECT SUM(service_value) As sumOf62 FROM drivers WHERE `month`='7' AND `week`='2'";
                            $result = mysqli_query($conn, $query);
                            while ($row = mysqli_fetch_assoc($result)) {
                                $total = $row['sumOf62'];
                                if ($total != 0) {
                                    echo number_format($total, 2);
                                }
                                else {
                                    echo '' . '0.00';
                                }
                            }
                            ?>
                        </td>
                        <td style="background: #FFC107; color: black;">
                            <?php
                            $query = "SELECT SUM(diesel) As sumOf62 FROM drivers WHERE `month`='7' AND `week`='2'";
                            $result = mysqli_query($conn, $query);
                            while ($row = mysqli_fetch_assoc($result)) {
                                $total = $row['sumOf62'];
                                if ($total != 0) {
                                    echo number_format($total, 2);
                                }
                                else {
                                    echo '' . '0.00';
                                }
                            }
                            ?>
                        </td>
                        <td style="background: #FFC107; color: black;">
                            <?php
                            $query = "SELECT SUM(trip_total) As sumOf62 FROM drivers WHERE `month`='7' AND `week`='2'";
                            $result = mysqli_query($conn, $query);
                            while ($row = mysqli_fetch_assoc($result)) {
                                $total = $row['sumOf62'];
                                if ($total != 0) {
                                    echo number_format($total, 2);
                                }
                                else {
                                    echo '' . '0.00';
                                }
                            }
                            ?>
                        </td>
                        <td style="background: #0D6EFD;">
                            <?php
                            $query = "SELECT SUM(payments) As sumOf61 FROM drivers WHERE `month`='7' AND `week`='2'";
                            $result = mysqli_query($conn, $query);
                            while ($row = mysqli_fetch_assoc($result)) {
                                $total = $row['sumOf61'];
                                if ($total != 0) {
                                    echo number_format($total, 2);
                                }
                                else {
                                    echo '' . '0.00';
                                }
                            }
                            ?>
                        </td>
                        <td style="background: red;">
                            <?php
                            $query = "SELECT SUM(discounts) As sumOf62 FROM drivers WHERE `month`='7' AND `week`='2'";
                            $result = mysqli_query($conn, $query);
                            while ($row = mysqli_fetch_assoc($result)) {
                                $total = $row['sumOf62'];
                                if ($total != 0) {
                                    echo number_format($total, 2);
                                }
                                else {
                                    echo '' . '0.00';
                                }
                            }
                            ?>
                        </td>
                        <td style="background: green;">
                            <?php
                            $query = "SELECT SUM(salary) As sumOf61 FROM drivers WHERE `month`='7' AND `week`='2'";
                            $result = mysqli_query($conn, $query);
                            while ($row = mysqli_fetch_assoc($result)) {
                                $total = $row['sumOf61'];
                                if ($total != 0) {
                                    echo number_format($total, 2);
                                }
                                else {
                                    echo '' . '0.00';
                                }
                            }
                            ?>
                        </td>
                        <td>
                            <?php
                            $query = "SELECT SUM(payload_total) As sumOf FROM drivers WHERE `month`='7' AND `week`='2'";
                            $query2 = "SELECT SUM(trip_total) As sumOfIn FROM drivers WHERE `month`='7' AND `week`='2'";
                            $query3 = "SELECT SUM(diesel) As sumOfTo FROM drivers WHERE `month`='7' AND `week`='2'";
                            $query4 = "SELECT SUM(service_value) As sumOfFor FROM drivers WHERE `month`='7' AND `week`='2'";
                            $total = 0;
                            $result = mysqli_query($conn, $query);
                            $result2 = mysqli_query($conn, $query2);
                            $result3 = mysqli_query($conn, $query3);
                            $result4 = mysqli_query($conn, $query4);

                            while ($row = mysqli_fetch_assoc($result)) {
                                while ($row2 = mysqli_fetch_assoc($result2)) {
                                    while ($row3 = mysqli_fetch_assoc($result3)) {
                                        while ($row4 = mysqli_fetch_assoc($result4)) {
                                            $total = $row['sumOf'] - ($row2['sumOfIn'] + $row3['sumOfTo'] + $row4['sumOfFor']);
                                            if ($total != 0) {
                                                echo number_format($total, 2);
                                             }
                                            else {
                                                echo '' . '0.00';
                                            }
                                        }
                                    }
                                }
                            }
                            ?>
                        </td>
                    </tr>
                    <tr>
                        <td>3</td>
                        <td>
                            <?php
                            $query = "SELECT SUM(payload_total) As sumOf63 FROM drivers WHERE `month`='7' AND `week`='3'";
                            $result = mysqli_query($conn, $query);
                            while ($row = mysqli_fetch_assoc($result)) {
                                $total = $row['sumOf63'];
                                if ($total != 0) {
                                    echo number_format($total, 2);
                                }
                                else {
                                    echo '' . '0.00';
                                }
                            }
                            ?>
                        </td>
                        <td style="background: #FFC107; color: black;">
                            <?php
                            $query = "SELECT SUM(service_value) As sumOf63 FROM drivers WHERE `month`='7' AND `week`='3'";
                            $result = mysqli_query($conn, $query);
                            while ($row = mysqli_fetch_assoc($result)) {
                                $total = $row['sumOf63'];
                                if ($total != 0) {
                                    echo number_format($total, 2);
                                }
                                else {
                                    echo '' . '0.00';
                                }
                            }
                            ?>
                        </td>
                        <td style="background: #FFC107; color: black;">
                            <?php
                            $query = "SELECT SUM(diesel) As sumOf63 FROM drivers WHERE `month`='7' AND `week`='3'";
                            $result = mysqli_query($conn, $query);
                            while ($row = mysqli_fetch_assoc($result)) {
                                $total = $row['sumOf63'];
                                if ($total != 0) {
                                    echo number_format($total, 2);
                                }
                                else {
                                    echo '' . '0.00';
                                }
                            }
                            ?>
                        </td>
                        <td style="background: #FFC107; color: black;">
                            <?php
                            $query = "SELECT SUM(trip_total) As sumOf63 FROM drivers WHERE `month`='7' AND `week`='3'";
                            $result = mysqli_query($conn, $query);
                            while ($row = mysqli_fetch_assoc($result)) {
                                $total = $row['sumOf63'];
                                if ($total != 0) {
                                    echo number_format($total, 2);
                                }
                                else {
                                    echo '' . '0.00';
                                }
                            }
                            ?>
                        </td>
                        <td style="background: #0D6EFD;">
                            <?php
                            $query = "SELECT SUM(payments) As sumOf61 FROM drivers WHERE `month`='7' AND `week`='3'";
                            $result = mysqli_query($conn, $query);
                            while ($row = mysqli_fetch_assoc($result)) {
                                $total = $row['sumOf61'];
                                if ($total != 0) {
                                    echo number_format($total, 2);
                                }
                                else {
                                    echo '' . '0.00';
                                }
                            }
                            ?>
                        </td>
                        <td style="background: red;">
                            <?php
                            $query = "SELECT SUM(discounts) As sumOf63 FROM drivers WHERE `month`='7' AND `week`='3'";
                            $result = mysqli_query($conn, $query);
                            while ($row = mysqli_fetch_assoc($result)) {
                                $total = $row['sumOf63'];
                                if ($total != 0) {
                                    echo number_format($total, 2);
                                }
                                else {
                                    echo '' . '0.00';
                                }
                            }
                            ?>
                        </td>
                        <td style="background: green;">
                            <?php
                            $query = "SELECT SUM(salary) As sumOf61 FROM drivers WHERE `month`='7' AND `week`='3'";
                            $result = mysqli_query($conn, $query);
                            while ($row = mysqli_fetch_assoc($result)) {
                                $total = $row['sumOf61'];
                                if ($total != 0) {
                                    echo number_format($total, 2);
                                }
                                else {
                                    echo '' . '0.00';
                                }
                            }
                            ?>
                        </td>
                        <td>
                            <?php
                            $query = "SELECT SUM(payload_total) As sumOf FROM drivers WHERE `month`='7' AND `week`='3'";
                            $query2 = "SELECT SUM(trip_total) As sumOfIn FROM drivers WHERE `month`='7' AND `week`='3'";
                            $query3 = "SELECT SUM(diesel) As sumOfTo FROM drivers WHERE `month`='7' AND `week`='3'";
                            $query4 = "SELECT SUM(service_value) As sumOfFor FROM drivers WHERE `month`='7' AND `week`='3'";
                            $total = 0;
                            $result = mysqli_query($conn, $query);
                            $result2 = mysqli_query($conn, $query2);
                            $result3 = mysqli_query($conn, $query3);
                            $result4 = mysqli_query($conn, $query4);

                            while ($row = mysqli_fetch_assoc($result)) {
                                while ($row2 = mysqli_fetch_assoc($result2)) {
                                    while ($row3 = mysqli_fetch_assoc($result3)) {
                                        while ($row4 = mysqli_fetch_assoc($result4)) {
                                            $total = $row['sumOf'] - ($row2['sumOfIn'] + $row3['sumOfTo'] + $row4['sumOfFor']);
                                            if ($total != 0) {
                                                echo number_format($total, 2);
                                             }
                                            else {
                                                echo '' . '0.00';
                                            }
                                        }
                                    }
                                }
                            }
                            ?>
                        </td>
                    </tr>
                    <tr>
                        <td>4</td>
                        <td>
                            <?php
                            $query = "SELECT SUM(payload_total) As sumOf64 FROM drivers WHERE `month`='7' AND `week`='4'";
                            $result = mysqli_query($conn, $query);
                            while ($row = mysqli_fetch_assoc($result)) {
                                $total = $row['sumOf64'];
                                if ($total != 0) {
                                    echo number_format($total, 2);
                                }
                                else {
                                    echo '' . '0.00';
                                }
                            }
                            ?>
                        </td>
                        <td style="background: #FFC107; color: black;">
                            <?php
                            $query = "SELECT SUM(service_value) As sumOf64 FROM drivers WHERE `month`='7' AND `week`='4'";
                            $result = mysqli_query($conn, $query);
                            while ($row = mysqli_fetch_assoc($result)) {
                                $total = $row['sumOf64'];
                                if ($total != 0) {
                                    echo number_format($total, 2);
                                }
                                else {
                                    echo '' . '0.00';
                                }
                            }
                            ?>
                        </td>
                        <td style="background: #FFC107; color: black;">
                            <?php
                            $query = "SELECT SUM(diesel) As sumOf64 FROM drivers WHERE `month`='7' AND `week`='4'";
                            $result = mysqli_query($conn, $query);
                            while ($row = mysqli_fetch_assoc($result)) {
                                $total = $row['sumOf64'];
                                if ($total != 0) {
                                    echo number_format($total, 2);
                                }
                                else {
                                    echo '' . '0.00';
                                }
                            }
                            ?>
                        </td>
                        <td style="background: #FFC107; color: black;">
                            <?php
                            $query = "SELECT SUM(trip_total) As sumOf64 FROM drivers WHERE `month`='7' AND `week`='4'";
                            $result = mysqli_query($conn, $query);
                            while ($row = mysqli_fetch_assoc($result)) {
                                $total = $row['sumOf64'];
                                if ($total != 0) {
                                    echo number_format($total, 2);
                                }
                                else {
                                    echo '' . '0.00';
                                }
                            }
                            ?>
                        </td>
                        <td style="background: #0D6EFD;">
                            <?php
                            $query = "SELECT SUM(payments) As sumOf61 FROM drivers WHERE `month`='7' AND `week`='4'";
                            $result = mysqli_query($conn, $query);
                            while ($row = mysqli_fetch_assoc($result)) {
                                $total = $row['sumOf61'];
                                if ($total != 0) {
                                    echo number_format($total, 2);
                                }
                                else {
                                    echo '' . '0.00';
                                }
                            }
                            ?>
                        </td>
                        <td style="background: red;">
                            <?php
                            $query = "SELECT SUM(discounts) As sumOf64 FROM drivers WHERE `month`='7' AND `week`='4'";
                            $result = mysqli_query($conn, $query);
                            while ($row = mysqli_fetch_assoc($result)) {
                                $total = $row['sumOf64'];
                                if ($total != 0) {
                                    echo number_format($total, 2);
                                }
                                else {
                                    echo '' . '0.00';
                                }
                            }
                            ?>
                        </td>
                        <td style="background: green;">
                            <?php
                            $query = "SELECT SUM(salary) As sumOf61 FROM drivers WHERE `month`='7' AND `week`='4'";
                            $result = mysqli_query($conn, $query);
                            while ($row = mysqli_fetch_assoc($result)) {
                                $total = $row['sumOf61'];
                                if ($total != 0) {
                                    echo number_format($total, 2);
                                }
                                else {
                                    echo '' . '0.00';
                                }
                            }
                            ?>
                        </td>
                        <td>
                            <?php
                            $query = "SELECT SUM(payload_total) As sumOf FROM drivers WHERE `month`='7' AND `week`='4'";
                            $query2 = "SELECT SUM(trip_total) As sumOfIn FROM drivers WHERE `month`='7' AND `week`='4'";
                            $query3 = "SELECT SUM(diesel) As sumOfTo FROM drivers WHERE `month`='7' AND `week`='4'";
                            $query4 = "SELECT SUM(service_value) As sumOfFor FROM drivers WHERE `month`='7' AND `week`='4'";
                            $total = 0;
                            $result = mysqli_query($conn, $query);
                            $result2 = mysqli_query($conn, $query2);
                            $result3 = mysqli_query($conn, $query3);
                            $result4 = mysqli_query($conn, $query4);

                            while ($row = mysqli_fetch_assoc($result)) {
                                while ($row2 = mysqli_fetch_assoc($result2)) {
                                    while ($row3 = mysqli_fetch_assoc($result3)) {
                                        while ($row4 = mysqli_fetch_assoc($result4)) {
                                            $total = $row['sumOf'] - ($row2['sumOfIn'] + $row3['sumOfTo'] + $row4['sumOfFor']);
                                            if ($total != 0) {
                                                echo number_format($total, 2);
                                             }
                                            else {
                                                echo '' . '0.00';
                                            }
                                        }
                                    }
                                }
                            }
                            ?>
                        </td>
                    </tr>
                </table>
                <!-- Modal -->
                    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="exampleModalLabel">التفاصيل</h1>
                                </div>
                                <div class="modal-body">
                                    <a>D</a>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">إغلاق</button>
                                    <button type="button" class="btn btn-primary">حفظ التغيرات</button>
                                </div>
                            </div>
                        </div>
                    </div>
                <p style="font-size: 24px;">
                    الصندوق = 
                    
                    (
                    
                    <a style="color: #FFC107; font-size: 22px;">إجمالي المصروفات</a>
                    
                    - 
                    
                    <!--<a style="color: #0D6EFD; font-size: 22px;">إجمالي الدفعات</a>-->
                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                        إجمالي الدفعات
                    </button>
                    

                    ) =
                    
                    <?php
                            $total = 0;
                            
                            $query1 = "SELECT SUM(payments) As sumOfBox1 FROM drivers WHERE `month`='7' AND `week`='1'";
                            $query2 = "SELECT SUM(trip_total) As sumOfInBox1 FROM drivers WHERE `month`='7' AND `week`='1'";
                            $query3 = "SELECT SUM(diesel) As sumOfToBox1 FROM drivers WHERE `month`='7' AND `week`='1'";
                            $query4 = "SELECT SUM(service_value) As sumOfForBox1 FROM drivers WHERE `month`='7' AND `week`='1'";
                            
                            $result1 = mysqli_query($conn, $query1);
                            $result2 = mysqli_query($conn, $query2);
                            $result3 = mysqli_query($conn, $query3);
                            $result4 = mysqli_query($conn, $query4);
                            
                            $query5 = "SELECT SUM(payments) As sumOfBox2 FROM drivers WHERE `month`='7' AND `week`='2'";
                            $query6 = "SELECT SUM(trip_total) As sumOfInBox2 FROM drivers WHERE `month`='7' AND `week`='2'";
                            $query7 = "SELECT SUM(diesel) As sumOfToBox2 FROM drivers WHERE `month`='7' AND `week`='2'";
                            $query8 = "SELECT SUM(service_value) As sumOfForBox2 FROM drivers WHERE `month`='7' AND `week`='2'";
                            
                            $query9 = "SELECT SUM(payments) As sumOfBox3 FROM drivers WHERE `month`='7' AND `week`='3'";
                            $query10 = "SELECT SUM(trip_total) As sumOfInBox3 FROM drivers WHERE `month`='7' AND `week`='3'";
                            $query11 = "SELECT SUM(diesel) As sumOfToBox3 FROM drivers WHERE `month`='7' AND `week`='3'";
                            $query12 = "SELECT SUM(service_value) As sumOfForBox3 FROM drivers WHERE `month`='7' AND `week`='3'";
                            
                            $query13 = "SELECT SUM(payments) As sumOfBox4 FROM drivers WHERE `month`='7' AND `week`='4'";
                            $query14 = "SELECT SUM(trip_total) As sumOfInBox4 FROM drivers WHERE `month`='7' AND `week`='4'";
                            $query15 = "SELECT SUM(diesel) As sumOfToBox4 FROM drivers WHERE `month`='7' AND `week`='4'";
                            $query16 = "SELECT SUM(service_value) As sumOfForBox4 FROM drivers WHERE `month`='7' AND `week`='4'";
                            
                            $result5 = mysqli_query($conn, $query5);
                            $result6 = mysqli_query($conn, $query6);
                            $result7 = mysqli_query($conn, $query7);
                            $result8 = mysqli_query($conn, $query8);
                            
                            $result9 = mysqli_query($conn, $query9);
                            $result10 = mysqli_query($conn, $query10);
                            $result11 = mysqli_query($conn, $query11);
                            $result12 = mysqli_query($conn, $query12);
                            
                            $result13 = mysqli_query($conn, $query13);
                            $result14 = mysqli_query($conn, $query14);
                            $result15 = mysqli_query($conn, $query15);
                            $result16 = mysqli_query($conn, $query16);
                            
                            while ($row1 = mysqli_fetch_assoc($result1)) {
                                while ($row2 = mysqli_fetch_assoc($result2)) {
                                    while ($row3 = mysqli_fetch_assoc($result3)) {
                                        while ($row4 = mysqli_fetch_assoc($result4)) {
                                            
                                            while ($row5 = mysqli_fetch_assoc($result5)) {
                                                while ($row6 = mysqli_fetch_assoc($result6)) {
                                                    while ($row7 = mysqli_fetch_assoc($result7)) {
                                                        while ($row8 = mysqli_fetch_assoc($result8)) {
                                                            
                                                            while ($row9 = mysqli_fetch_assoc($result9)) {
                                                                while ($row10 = mysqli_fetch_assoc($result10)) {
                                                                    while ($row11 = mysqli_fetch_assoc($result11)) {
                                                                        while ($row12 = mysqli_fetch_assoc($result12)) {
                                                                            
                                                                            while ($row13 = mysqli_fetch_assoc($result13)) {
                                                                                while ($row14 = mysqli_fetch_assoc($result14)) {
                                                                                    while ($row15 = mysqli_fetch_assoc($result15)) {
                                                                                        while ($row16 = mysqli_fetch_assoc($result16)) {
                                            
$total = ($row1['sumOfBox1'] - ($row2['sumOfInBox1'] + $row3['sumOfToBox1'] + $row4['sumOfForBox1']))
+ ($row5['sumOfBox2'] - ($row6['sumOfInBox2'] +  $row7['sumOfToBox2'] + $row8['sumOfForBox2']))
+ ($row9['sumOfBox3'] - ($row10['sumOfInBox3'] + $row11['sumOfToBox3'] + $row12['sumOfForBox3']))
+ ($row13['sumOfBox4'] - ($row14['sumOfInBox4'] + $row15['sumOfToBox4'] + $row16['sumOfForBox4']));
    $total_payment = $row1['sumOfBox1'] + $row5['sumOfBox2'] + $row9['sumOfBox3'] + $row13['sumOfBox4'];
    $total_s = ($row2['sumOfInBox1'] + $row3['sumOfToBox1'] + $row4['sumOfForBox1']) + 
    ($row6['sumOfInBox2'] +  $row7['sumOfToBox2'] + $row8['sumOfForBox2']) +
    ($row10['sumOfInBox3'] + $row11['sumOfToBox3'] + $row12['sumOfForBox3']) +
    ($row14['sumOfInBox4'] + $row15['sumOfToBox4'] + $row16['sumOfForBox4']);
                                                                                    if ($total != 0) {
    echo '<a style="color: #FFC107; font-size: 22px;">' . number_format($total_s, 2) . '</a>' . ' - ' . '<a style="color: blue; font-size: 22px;">' . number_format($total_payment, 2) . '</a>' . ' = ' . number_format($total, 2); 
                                                                                     }
                                                                                    else {
                                                                                        echo '' . '0.00';
                                                                                    }
                                                                            
                                                                                        
                                                                                    }
                                                                                }
                                                                            }
                                                                        }
                                                            
                                                                       
                                                                    }
                                                                }
                                                            }
                                                        }
                                                            
                                                        
                                                    }
                                                }
                                            }
                                        }
                                            
                                       
                                    }
                                }
                            }
                        }
                        ?>
                </p>
            </div>
            <div class="content">
                <driv class="row ">
                    <div class="col"><h2>شهر 8</h2></div>
                </driv>
                <table class="table table-dark table-hover">
                    <tr>
                        <th>الأسبوع#</th>
                        <th>الحمولة</th>
                        <th style="background: #FFC107; color: black;">قيمة الخدمة</th>
                        <th style="background: #FFC107; color: black;">ديزل</th>
                        <th style="background: #FFC107; color: black;">التربات</th>
                        <th style="background: #0D6EFD;">الدفعات</th>
                        <th style="background: red;">الخصومات</th>
                        <th style="background: green;">الراتب</th>
                        <th>الدخل الأسبوعي</th>
                    </tr>
                    <tr>
                        <td>1</td>
                        <td>
                            <?php
                            $query = "SELECT SUM(payload_total) As sumOf61 FROM drivers WHERE `month`='8' AND `week`='1'";
                            $result = mysqli_query($conn, $query);
                            while ($row = mysqli_fetch_assoc($result)) {
                                $total = $row['sumOf61'];
                                if ($total != 0) {
                                    echo number_format($total, 2);
                                }
                                else {
                                    echo '' . '0.00';
                                }
                            }
                            ?>
                        </td>
                        <td style="background: #FFC107; color: black;">
                            <?php
                            $query = "SELECT SUM(service_value) As sumOf61 FROM drivers WHERE `month`='8' AND `week`='1'";
                            $result = mysqli_query($conn, $query);
                            while ($row = mysqli_fetch_assoc($result)) {
                                $total = $row['sumOf61'];
                                if ($total != 0) {
                                    echo number_format($total, 2);
                                }
                                else {
                                    echo '' . '0.00';
                                }
                            }
                            ?>
                        </td>
                        <td style="background: #FFC107; color: black;">
                            <?php
                            $query = "SELECT SUM(diesel) As sumOf61 FROM drivers WHERE `month`='8' AND `week`='1'";
                            $result = mysqli_query($conn, $query);
                            while ($row = mysqli_fetch_assoc($result)) {
                                $total = $row['sumOf61'];
                                if ($total != 0) {
                                    echo number_format($total, 2);
                                }
                                else {
                                    echo '' . '0.00';
                                }
                            }
                            ?>
                        </td>
                        <td style="background: #FFC107; color: black;">
                            <?php
                            $query = "SELECT SUM(trip_total) As sumOf61 FROM drivers WHERE `month`='8' AND `week`='1'";
                            $result = mysqli_query($conn, $query);
                            while ($row = mysqli_fetch_assoc($result)) {
                                $total = $row['sumOf61'];
                                if ($total != 0) {
                                    echo number_format($total, 2);
                                }
                                else {
                                    echo '' . '0.00';
                                }
                            }
                            ?>
                        </td>
                        <td style="background: #0D6EFD;">
                            <?php
                            $query = "SELECT SUM(payments) As sumOf61 FROM drivers WHERE `month`='8' AND `week`='1'";
                            $result = mysqli_query($conn, $query);
                            while ($row = mysqli_fetch_assoc($result)) {
                                $total = $row['sumOf61'];
                                if ($total != 0) {
                                    echo number_format($total, 2);
                                }
                                else {
                                    echo '' . '0.00';
                                }
                            }
                            ?>
                        </td>
                        <td style="background: red;">
                            <?php
                            $query = "SELECT SUM(discounts) As sumOf61 FROM drivers WHERE `month`='8' AND `week`='1'";
                            $result = mysqli_query($conn, $query);
                            while ($row = mysqli_fetch_assoc($result)) {
                                $total = $row['sumOf61'];
                                if ($total != 0) {
                                    echo number_format($total, 2);
                                }
                                else {
                                    echo '' . '0.00';
                                }
                            }
                            ?>
                        </td>
                        <td style="background: green;">
                            <?php
                            $query = "SELECT SUM(salary) As sumOf61 FROM drivers WHERE `month`='8' AND `week`='1'";
                            $result = mysqli_query($conn, $query);
                            while ($row = mysqli_fetch_assoc($result)) {
                                $total = $row['sumOf61'];
                                if ($total != 0) {
                                    echo number_format($total, 2);
                                }
                                else {
                                    echo '' . '0.00';
                                }
                            }
                            ?>
                        </td>
                        <td>
                            <?php
                            $query = "SELECT SUM(payload_total) As sumOf FROM drivers WHERE `month`='8' AND `week`='1'";
                            $query2 = "SELECT SUM(trip_total) As sumOfIn FROM drivers WHERE `month`='8' AND `week`='1'";
                            $query3 = "SELECT SUM(diesel) As sumOfTo FROM drivers WHERE `month`='8' AND `week`='1'";
                            $query4 = "SELECT SUM(service_value) As sumOfFor FROM drivers WHERE `month`='8' AND `week`='1'";
                            $total = 0;
                            $result = mysqli_query($conn, $query);
                            $result2 = mysqli_query($conn, $query2);
                            $result3 = mysqli_query($conn, $query3);
                            $result4 = mysqli_query($conn, $query4);

                            while ($row = mysqli_fetch_assoc($result)) {
                                while ($row2 = mysqli_fetch_assoc($result2)) {
                                    while ($row3 = mysqli_fetch_assoc($result3)) {
                                        while ($row4 = mysqli_fetch_assoc($result4)) {
                                            $total = $row['sumOf'] - ($row2['sumOfIn'] + $row3['sumOfTo'] + $row4['sumOfFor']);
                                            if ($total != 0) {
                                                echo number_format($total, 2);
                                             }
                                            else {
                                                echo '' . '0.00';
                                            }
                                        }
                                    }
                                }
                            }
                            ?>
                        </td>
                    </tr>
                    <tr>
                        <td>2</td>
                        <td>
                            <?php
                            $query = "SELECT SUM(payload_total) As sumOf62 FROM drivers WHERE `month`='8' AND `week`='2'";
                            $result = mysqli_query($conn, $query);
                            while ($row = mysqli_fetch_assoc($result)) {
                                $total = $row['sumOf62'];
                                if ($total != 0) {
                                    echo number_format($total, 2);
                                }
                                else {
                                    echo '' . '0.00';
                                }
                            }
                            ?>
                        </td>
                        <td style="background: #FFC107; color: black;">
                            <?php
                            $query = "SELECT SUM(service_value) As sumOf62 FROM drivers WHERE `month`='8' AND `week`='2'";
                            $result = mysqli_query($conn, $query);
                            while ($row = mysqli_fetch_assoc($result)) {
                                $total = $row['sumOf62'];
                                if ($total != 0) {
                                    echo number_format($total, 2);
                                }
                                else {
                                    echo '' . '0.00';
                                }
                            }
                            ?>
                        </td>
                        <td style="background: #FFC107; color: black;">
                            <?php
                            $query = "SELECT SUM(diesel) As sumOf62 FROM drivers WHERE `month`='8' AND `week`='2'";
                            $result = mysqli_query($conn, $query);
                            while ($row = mysqli_fetch_assoc($result)) {
                                $total = $row['sumOf62'];
                                if ($total != 0) {
                                    echo number_format($total, 2);
                                }
                                else {
                                    echo '' . '0.00';
                                }
                            }
                            ?>
                        </td>
                        <td style="background: #FFC107; color: black;">
                            <?php
                            $query = "SELECT SUM(trip_total) As sumOf62 FROM drivers WHERE `month`='8' AND `week`='2'";
                            $result = mysqli_query($conn, $query);
                            while ($row = mysqli_fetch_assoc($result)) {
                                $total = $row['sumOf62'];
                                if ($total != 0) {
                                    echo number_format($total, 2);
                                }
                                else {
                                    echo '' . '0.00';
                                }
                            }
                            ?>
                        </td>
                        <td style="background: #0D6EFD;">
                            <?php
                            $query = "SELECT SUM(payments) As sumOf61 FROM drivers WHERE `month`='8' AND `week`='2'";
                            $result = mysqli_query($conn, $query);
                            while ($row = mysqli_fetch_assoc($result)) {
                                $total = $row['sumOf61'];
                                if ($total != 0) {
                                    echo number_format($total, 2);
                                }
                                else {
                                    echo '' . '0.00';
                                }
                            }
                            ?>
                        </td>
                        <td style="background: red;">
                            <?php
                            $query = "SELECT SUM(discounts) As sumOf62 FROM drivers WHERE `month`='8' AND `week`='2'";
                            $result = mysqli_query($conn, $query);
                            while ($row = mysqli_fetch_assoc($result)) {
                                $total = $row['sumOf62'];
                                if ($total != 0) {
                                    echo number_format($total, 2);
                                }
                                else {
                                    echo '' . '0.00';
                                }
                            }
                            ?>
                        </td>
                        <td style="background: green;">
                            <?php
                            $query = "SELECT SUM(salary) As sumOf61 FROM drivers WHERE `month`='8' AND `week`='2'";
                            $result = mysqli_query($conn, $query);
                            while ($row = mysqli_fetch_assoc($result)) {
                                $total = $row['sumOf61'];
                                if ($total != 0) {
                                    echo number_format($total, 2);
                                }
                                else {
                                    echo '' . '0.00';
                                }
                            }
                            ?>
                        </td>
                        <td>
                            <?php
                            $query = "SELECT SUM(payload_total) As sumOf FROM drivers WHERE `month`='8' AND `week`='2'";
                            $query2 = "SELECT SUM(trip_total) As sumOfIn FROM drivers WHERE `month`='8' AND `week`='2'";
                            $query3 = "SELECT SUM(diesel) As sumOfTo FROM drivers WHERE `month`='8' AND `week`='2'";
                            $query4 = "SELECT SUM(service_value) As sumOfFor FROM drivers WHERE `month`='8' AND `week`='2'";
                            $total = 0;
                            $result = mysqli_query($conn, $query);
                            $result2 = mysqli_query($conn, $query2);
                            $result3 = mysqli_query($conn, $query3);
                            $result4 = mysqli_query($conn, $query4);

                            while ($row = mysqli_fetch_assoc($result)) {
                                while ($row2 = mysqli_fetch_assoc($result2)) {
                                    while ($row3 = mysqli_fetch_assoc($result3)) {
                                        while ($row4 = mysqli_fetch_assoc($result4)) {
                                            $total = $row['sumOf'] - ($row2['sumOfIn'] + $row3['sumOfTo'] + $row4['sumOfFor']);
                                            if ($total != 0) {
                                                echo number_format($total, 2);
                                             }
                                            else {
                                                echo '' . '0.00';
                                            }
                                        }
                                    }
                                }
                            }
                            ?>
                        </td>
                    </tr>
                    <tr>
                        <td>3</td>
                        <td>
                            <?php
                            $query = "SELECT SUM(payload_total) As sumOf63 FROM drivers WHERE `month`='8' AND `week`='3'";
                            $result = mysqli_query($conn, $query);
                            while ($row = mysqli_fetch_assoc($result)) {
                                $total = $row['sumOf63'];
                                if ($total != 0) {
                                    echo number_format($total, 2);
                                }
                                else {
                                    echo '' . '0.00';
                                }
                            }
                            ?>
                        </td>
                        <td style="background: #FFC107; color: black;">
                            <?php
                            $query = "SELECT SUM(service_value) As sumOf63 FROM drivers WHERE `month`='8' AND `week`='3'";
                            $result = mysqli_query($conn, $query);
                            while ($row = mysqli_fetch_assoc($result)) {
                                $total = $row['sumOf63'];
                                if ($total != 0) {
                                    echo number_format($total, 2);
                                }
                                else {
                                    echo '' . '0.00';
                                }
                            }
                            ?>
                        </td>
                        <td style="background: #FFC107; color: black;">
                            <?php
                            $query = "SELECT SUM(diesel) As sumOf63 FROM drivers WHERE `month`='8' AND `week`='3'";
                            $result = mysqli_query($conn, $query);
                            while ($row = mysqli_fetch_assoc($result)) {
                                $total = $row['sumOf63'];
                                if ($total != 0) {
                                    echo number_format($total, 2);
                                }
                                else {
                                    echo '' . '0.00';
                                }
                            }
                            ?>
                        </td>
                        <td style="background: #FFC107; color: black;">
                            <?php
                            $query = "SELECT SUM(trip_total) As sumOf63 FROM drivers WHERE `month`='8' AND `week`='3'";
                            $result = mysqli_query($conn, $query);
                            while ($row = mysqli_fetch_assoc($result)) {
                                $total = $row['sumOf63'];
                                if ($total != 0) {
                                    echo number_format($total, 2);
                                }
                                else {
                                    echo '' . '0.00';
                                }
                            }
                            ?>
                        </td>
                        <td style="background: #0D6EFD;">
                            <?php
                            $query = "SELECT SUM(payments) As sumOf61 FROM drivers WHERE `month`='8' AND `week`='3'";
                            $result = mysqli_query($conn, $query);
                            while ($row = mysqli_fetch_assoc($result)) {
                                $total = $row['sumOf61'];
                                if ($total != 0) {
                                    echo number_format($total, 2);
                                }
                                else {
                                    echo '' . '0.00';
                                }
                            }
                            ?>
                        </td>
                        <td style="background: red;">
                            <?php
                            $query = "SELECT SUM(discounts) As sumOf63 FROM drivers WHERE `month`='8' AND `week`='3'";
                            $result = mysqli_query($conn, $query);
                            while ($row = mysqli_fetch_assoc($result)) {
                                $total = $row['sumOf63'];
                                if ($total != 0) {
                                    echo number_format($total, 2);
                                }
                                else {
                                    echo '' . '0.00';
                                }
                            }
                            ?>
                        </td>
                        <td style="background: green;">
                            <?php
                            $query = "SELECT SUM(salary) As sumOf61 FROM drivers WHERE `month`='8' AND `week`='3'";
                            $result = mysqli_query($conn, $query);
                            while ($row = mysqli_fetch_assoc($result)) {
                                $total = $row['sumOf61'];
                                if ($total != 0) {
                                    echo number_format($total, 2);
                                }
                                else {
                                    echo '' . '0.00';
                                }
                            }
                            ?>
                        </td>
                        <td>
                            <?php
                            $query = "SELECT SUM(payload_total) As sumOf FROM drivers WHERE `month`='8' AND `week`='3'";
                            $query2 = "SELECT SUM(trip_total) As sumOfIn FROM drivers WHERE `month`='8' AND `week`='3'";
                            $query3 = "SELECT SUM(diesel) As sumOfTo FROM drivers WHERE `month`='8' AND `week`='3'";
                            $query4 = "SELECT SUM(service_value) As sumOfFor FROM drivers WHERE `month`='8' AND `week`='3'";
                            $total = 0;
                            $result = mysqli_query($conn, $query);
                            $result2 = mysqli_query($conn, $query2);
                            $result3 = mysqli_query($conn, $query3);
                            $result4 = mysqli_query($conn, $query4);

                            while ($row = mysqli_fetch_assoc($result)) {
                                while ($row2 = mysqli_fetch_assoc($result2)) {
                                    while ($row3 = mysqli_fetch_assoc($result3)) {
                                        while ($row4 = mysqli_fetch_assoc($result4)) {
                                            $total = $row['sumOf'] - ($row2['sumOfIn'] + $row3['sumOfTo'] + $row4['sumOfFor']);
                                            if ($total != 0) {
                                                echo number_format($total, 2);
                                             }
                                            else {
                                                echo '' . '0.00';
                                            }
                                        }
                                    }
                                }
                            }
                            ?>
                        </td>
                    </tr>
                    <tr>
                        <td>4</td>
                        <td>
                            <?php
                            $query = "SELECT SUM(payload_total) As sumOf64 FROM drivers WHERE `month`='8' AND `week`='4'";
                            $result = mysqli_query($conn, $query);
                            while ($row = mysqli_fetch_assoc($result)) {
                                $total = $row['sumOf64'];
                                if ($total != 0) {
                                    echo number_format($total, 2);
                                }
                                else {
                                    echo '' . '0.00';
                                }
                            }
                            ?>
                        </td>
                        <td style="background: #FFC107; color: black;">
                            <?php
                            $query = "SELECT SUM(service_value) As sumOf64 FROM drivers WHERE `month`='8' AND `week`='4'";
                            $result = mysqli_query($conn, $query);
                            while ($row = mysqli_fetch_assoc($result)) {
                                $total = $row['sumOf64'];
                                if ($total != 0) {
                                    echo number_format($total, 2);
                                }
                                else {
                                    echo '' . '0.00';
                                }
                            }
                            ?>
                        </td>
                        <td style="background: #FFC107; color: black;">
                            <?php
                            $query = "SELECT SUM(diesel) As sumOf64 FROM drivers WHERE `month`='8' AND `week`='4'";
                            $result = mysqli_query($conn, $query);
                            while ($row = mysqli_fetch_assoc($result)) {
                                $total = $row['sumOf64'];
                                if ($total != 0) {
                                    echo number_format($total, 2);
                                }
                                else {
                                    echo '' . '0.00';
                                }
                            }
                            ?>
                        </td>
                        <td style="background: #FFC107; color: black;">
                            <?php
                            $query = "SELECT SUM(trip_total) As sumOf64 FROM drivers WHERE `month`='8' AND `week`='4'";
                            $result = mysqli_query($conn, $query);
                            while ($row = mysqli_fetch_assoc($result)) {
                                $total = $row['sumOf64'];
                                if ($total != 0) {
                                    echo number_format($total, 2);
                                }
                                else {
                                    echo '' . '0.00';
                                }
                            }
                            ?>
                        </td>
                        <td style="background: #0D6EFD;">
                            <?php
                            $query = "SELECT SUM(payments) As sumOf61 FROM drivers WHERE `month`='8' AND `week`='4'";
                            $result = mysqli_query($conn, $query);
                            while ($row = mysqli_fetch_assoc($result)) {
                                $total = $row['sumOf61'];
                                if ($total != 0) {
                                    echo number_format($total, 2);
                                }
                                else {
                                    echo '' . '0.00';
                                }
                            }
                            ?>
                        </td>
                        <td style="background: red;">
                            <?php
                            $query = "SELECT SUM(discounts) As sumOf64 FROM drivers WHERE `month`='8' AND `week`='4'";
                            $result = mysqli_query($conn, $query);
                            while ($row = mysqli_fetch_assoc($result)) {
                                $total = $row['sumOf64'];
                                if ($total != 0) {
                                    echo number_format($total, 2);
                                }
                                else {
                                    echo '' . '0.00';
                                }
                            }
                            ?>
                        </td>
                        <td style="background: green;">
                            <?php
                            $query = "SELECT SUM(salary) As sumOf61 FROM drivers WHERE `month`='8' AND `week`='4'";
                            $result = mysqli_query($conn, $query);
                            while ($row = mysqli_fetch_assoc($result)) {
                                $total = $row['sumOf61'];
                                if ($total != 0) {
                                    echo number_format($total, 2);
                                }
                                else {
                                    echo '' . '0.00';
                                }
                            }
                            ?>
                        </td>
                        <td>
                            <?php
                            $query = "SELECT SUM(payload_total) As sumOf FROM drivers WHERE `month`='8' AND `week`='4'";
                            $query2 = "SELECT SUM(trip_total) As sumOfIn FROM drivers WHERE `month`='8' AND `week`='4'";
                            $query3 = "SELECT SUM(diesel) As sumOfTo FROM drivers WHERE `month`='8' AND `week`='4'";
                            $query4 = "SELECT SUM(service_value) As sumOfFor FROM drivers WHERE `month`='8' AND `week`='4'";
                            $total = 0;
                            $result = mysqli_query($conn, $query);
                            $result2 = mysqli_query($conn, $query2);
                            $result3 = mysqli_query($conn, $query3);
                            $result4 = mysqli_query($conn, $query4);

                            while ($row = mysqli_fetch_assoc($result)) {
                                while ($row2 = mysqli_fetch_assoc($result2)) {
                                    while ($row3 = mysqli_fetch_assoc($result3)) {
                                        while ($row4 = mysqli_fetch_assoc($result4)) {
                                            $total = $row['sumOf'] - ($row2['sumOfIn'] + $row3['sumOfTo'] + $row4['sumOfFor']);
                                            if ($total != 0) {
                                                echo number_format($total, 2);
                                             }
                                            else {
                                                echo '' . '0.00';
                                            }
                                        }
                                    }
                                }
                            }
                            ?>
                        </td>
                    </tr>
                </table>
                <!-- Modal -->
                    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="exampleModalLabel">التفاصيل</h1>
                                </div>
                                <div class="modal-body">
                                    <a>D</a>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">إغلاق</button>
                                    <button type="button" class="btn btn-primary">حفظ التغيرات</button>
                                </div>
                            </div>
                        </div>
                    </div>
                <p style="font-size: 24px;">
                    الصندوق = 
                    
                    (
                    
                    <a style="color: #FFC107; font-size: 22px;">إجمالي المصروفات</a>
                    
                    - 
                    
                    <!--<a style="color: #0D6EFD; font-size: 22px;">إجمالي الدفعات</a>-->
                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                        إجمالي الدفعات
                    </button>
                    

                    ) =
                    
                    <?php
                            $total = 0;
                            
                            $query1 = "SELECT SUM(payments) As sumOfBox1 FROM drivers WHERE `month`='8' AND `week`='1'";
                            $query2 = "SELECT SUM(trip_total) As sumOfInBox1 FROM drivers WHERE `month`='8' AND `week`='1'";
                            $query3 = "SELECT SUM(diesel) As sumOfToBox1 FROM drivers WHERE `month`='8' AND `week`='1'";
                            $query4 = "SELECT SUM(service_value) As sumOfForBox1 FROM drivers WHERE `month`='8' AND `week`='1'";
                            
                            $result1 = mysqli_query($conn, $query1);
                            $result2 = mysqli_query($conn, $query2);
                            $result3 = mysqli_query($conn, $query3);
                            $result4 = mysqli_query($conn, $query4);
                            
                            $query5 = "SELECT SUM(payments) As sumOfBox2 FROM drivers WHERE `month`='8' AND `week`='2'";
                            $query6 = "SELECT SUM(trip_total) As sumOfInBox2 FROM drivers WHERE `month`='8' AND `week`='2'";
                            $query7 = "SELECT SUM(diesel) As sumOfToBox2 FROM drivers WHERE `month`='8' AND `week`='2'";
                            $query8 = "SELECT SUM(service_value) As sumOfForBox2 FROM drivers WHERE `month`='8' AND `week`='2'";
                            
                            $query9 = "SELECT SUM(payments) As sumOfBox3 FROM drivers WHERE `month`='8' AND `week`='3'";
                            $query10 = "SELECT SUM(trip_total) As sumOfInBox3 FROM drivers WHERE `month`='8' AND `week`='3'";
                            $query11 = "SELECT SUM(diesel) As sumOfToBox3 FROM drivers WHERE `month`='8' AND `week`='3'";
                            $query12 = "SELECT SUM(service_value) As sumOfForBox3 FROM drivers WHERE `month`='8' AND `week`='3'";
                            
                            $query13 = "SELECT SUM(payments) As sumOfBox4 FROM drivers WHERE `month`='8' AND `week`='4'";
                            $query14 = "SELECT SUM(trip_total) As sumOfInBox4 FROM drivers WHERE `month`='8' AND `week`='4'";
                            $query15 = "SELECT SUM(diesel) As sumOfToBox4 FROM drivers WHERE `month`='8' AND `week`='4'";
                            $query16 = "SELECT SUM(service_value) As sumOfForBox4 FROM drivers WHERE `month`='8' AND `week`='4'";
                            
                            $result5 = mysqli_query($conn, $query5);
                            $result6 = mysqli_query($conn, $query6);
                            $result7 = mysqli_query($conn, $query7);
                            $result8 = mysqli_query($conn, $query8);
                            
                            $result9 = mysqli_query($conn, $query9);
                            $result10 = mysqli_query($conn, $query10);
                            $result11 = mysqli_query($conn, $query11);
                            $result12 = mysqli_query($conn, $query12);
                            
                            $result13 = mysqli_query($conn, $query13);
                            $result14 = mysqli_query($conn, $query14);
                            $result15 = mysqli_query($conn, $query15);
                            $result16 = mysqli_query($conn, $query16);
                            
                            while ($row1 = mysqli_fetch_assoc($result1)) {
                                while ($row2 = mysqli_fetch_assoc($result2)) {
                                    while ($row3 = mysqli_fetch_assoc($result3)) {
                                        while ($row4 = mysqli_fetch_assoc($result4)) {
                                            
                                            while ($row5 = mysqli_fetch_assoc($result5)) {
                                                while ($row6 = mysqli_fetch_assoc($result6)) {
                                                    while ($row7 = mysqli_fetch_assoc($result7)) {
                                                        while ($row8 = mysqli_fetch_assoc($result8)) {
                                                            
                                                            while ($row9 = mysqli_fetch_assoc($result9)) {
                                                                while ($row10 = mysqli_fetch_assoc($result10)) {
                                                                    while ($row11 = mysqli_fetch_assoc($result11)) {
                                                                        while ($row12 = mysqli_fetch_assoc($result12)) {
                                                                            
                                                                            while ($row13 = mysqli_fetch_assoc($result13)) {
                                                                                while ($row14 = mysqli_fetch_assoc($result14)) {
                                                                                    while ($row15 = mysqli_fetch_assoc($result15)) {
                                                                                        while ($row16 = mysqli_fetch_assoc($result16)) {
                                            
$total = ($row1['sumOfBox1'] - ($row2['sumOfInBox1'] + $row3['sumOfToBox1'] + $row4['sumOfForBox1']))
+ ($row5['sumOfBox2'] - ($row6['sumOfInBox2'] +  $row7['sumOfToBox2'] + $row8['sumOfForBox2']))
+ ($row9['sumOfBox3'] - ($row10['sumOfInBox3'] + $row11['sumOfToBox3'] + $row12['sumOfForBox3']))
+ ($row13['sumOfBox4'] - ($row14['sumOfInBox4'] + $row15['sumOfToBox4'] + $row16['sumOfForBox4']));
    $total_payment = $row1['sumOfBox1'] + $row5['sumOfBox2'] + $row9['sumOfBox3'] + $row13['sumOfBox4'];
    $total_s = ($row2['sumOfInBox1'] + $row3['sumOfToBox1'] + $row4['sumOfForBox1']) + 
    ($row6['sumOfInBox2'] +  $row7['sumOfToBox2'] + $row8['sumOfForBox2']) +
    ($row10['sumOfInBox3'] + $row11['sumOfToBox3'] + $row12['sumOfForBox3']) +
    ($row14['sumOfInBox4'] + $row15['sumOfToBox4'] + $row16['sumOfForBox4']);
                                                                                    if ($total != 0) {
    echo '<a style="color: #FFC107; font-size: 22px;">' . number_format($total_s, 2) . '</a>' . ' - ' . '<a style="color: blue; font-size: 22px;">' . number_format($total_payment, 2) . '</a>' . ' = ' . number_format($total, 2); 
                                                                                     }
                                                                                    else {
                                                                                        echo '' . '0.00';
                                                                                    }
                                                                            
                                                                                        
                                                                                    }
                                                                                }
                                                                            }
                                                                        }
                                                            
                                                                       
                                                                    }
                                                                }
                                                            }
                                                        }
                                                            
                                                        
                                                    }
                                                }
                                            }
                                        }
                                            
                                       
                                    }
                                }
                            }
                        }
                        ?>
                </p>
            </div>
            <div class="content">
                <driv class="row ">
                    <div class="col"><h2>شهر 9</h2></div>
                </driv>
                <table class="table table-dark table-hover">
                    <tr>
                        <th>الأسبوع#</th>
                        <th>الحمولة</th>
                        <th style="background: #FFC107; color: black;">قيمة الخدمة</th>
                        <th style="background: #FFC107; color: black;">ديزل</th>
                        <th style="background: #FFC107; color: black;">التربات</th>
                        <th style="background: #0D6EFD;">الدفعات</th>
                        <th style="background: red;">الخصومات</th>
                        <th style="background: green;">الراتب</th>
                        <th>الدخل الأسبوعي</th>
                    </tr>
                    <tr>
                        <td>1</td>
                        <td>
                            <?php
                            $query = "SELECT SUM(payload_total) As sumOf61 FROM drivers WHERE `month`='9' AND `week`='1'";
                            $result = mysqli_query($conn, $query);
                            while ($row = mysqli_fetch_assoc($result)) {
                                $total = $row['sumOf61'];
                                if ($total != 0) {
                                    echo number_format($total, 2);
                                }
                                else {
                                    echo '' . '0.00';
                                }
                            }
                            ?>
                        </td>
                        <td style="background: #FFC107; color: black;">
                            <?php
                            $query = "SELECT SUM(service_value) As sumOf61 FROM drivers WHERE `month`='9' AND `week`='1'";
                            $result = mysqli_query($conn, $query);
                            while ($row = mysqli_fetch_assoc($result)) {
                                $total = $row['sumOf61'];
                                if ($total != 0) {
                                    echo number_format($total, 2);
                                }
                                else {
                                    echo '' . '0.00';
                                }
                            }
                            ?>
                        </td>
                        <td style="background: #FFC107; color: black;">
                            <?php
                            $query = "SELECT SUM(diesel) As sumOf61 FROM drivers WHERE `month`='9' AND `week`='1'";
                            $result = mysqli_query($conn, $query);
                            while ($row = mysqli_fetch_assoc($result)) {
                                $total = $row['sumOf61'];
                                if ($total != 0) {
                                    echo number_format($total, 2);
                                }
                                else {
                                    echo '' . '0.00';
                                }
                            }
                            ?>
                        </td>
                        <td style="background: #FFC107; color: black;">
                            <?php
                            $query = "SELECT SUM(trip_total) As sumOf61 FROM drivers WHERE `month`='9' AND `week`='1'";
                            $result = mysqli_query($conn, $query);
                            while ($row = mysqli_fetch_assoc($result)) {
                                $total = $row['sumOf61'];
                                if ($total != 0) {
                                    echo number_format($total, 2);
                                }
                                else {
                                    echo '' . '0.00';
                                }
                            }
                            ?>
                        </td>
                        <td style="background: #0D6EFD;">
                            <?php
                            $query = "SELECT SUM(payments) As sumOf61 FROM drivers WHERE `month`='9' AND `week`='1'";
                            $result = mysqli_query($conn, $query);
                            while ($row = mysqli_fetch_assoc($result)) {
                                $total = $row['sumOf61'];
                                if ($total != 0) {
                                    echo number_format($total, 2);
                                }
                                else {
                                    echo '' . '0.00';
                                }
                            }
                            ?>
                        </td>
                        <td style="background: red;">
                            <?php
                            $query = "SELECT SUM(discounts) As sumOf61 FROM drivers WHERE `month`='9' AND `week`='1'";
                            $result = mysqli_query($conn, $query);
                            while ($row = mysqli_fetch_assoc($result)) {
                                $total = $row['sumOf61'];
                                if ($total != 0) {
                                    echo number_format($total, 2);
                                }
                                else {
                                    echo '' . '0.00';
                                }
                            }
                            ?>
                        </td>
                        <td style="background: green;">
                            <?php
                            $query = "SELECT SUM(salary) As sumOf61 FROM drivers WHERE `month`='9' AND `week`='1'";
                            $result = mysqli_query($conn, $query);
                            while ($row = mysqli_fetch_assoc($result)) {
                                $total = $row['sumOf61'];
                                if ($total != 0) {
                                    echo number_format($total, 2);
                                }
                                else {
                                    echo '' . '0.00';
                                }
                            }
                            ?>
                        </td>
                        <td>
                            <?php
                            $query = "SELECT SUM(payload_total) As sumOf FROM drivers WHERE `month`='9' AND `week`='1'";
                            $query2 = "SELECT SUM(trip_total) As sumOfIn FROM drivers WHERE `month`='9' AND `week`='1'";
                            $query3 = "SELECT SUM(diesel) As sumOfTo FROM drivers WHERE `month`='9' AND `week`='1'";
                            $query4 = "SELECT SUM(service_value) As sumOfFor FROM drivers WHERE `month`='9' AND `week`='1'";
                            $total = 0;
                            $result = mysqli_query($conn, $query);
                            $result2 = mysqli_query($conn, $query2);
                            $result3 = mysqli_query($conn, $query3);
                            $result4 = mysqli_query($conn, $query4);

                            while ($row = mysqli_fetch_assoc($result)) {
                                while ($row2 = mysqli_fetch_assoc($result2)) {
                                    while ($row3 = mysqli_fetch_assoc($result3)) {
                                        while ($row4 = mysqli_fetch_assoc($result4)) {
                                            $total = $row['sumOf'] - ($row2['sumOfIn'] + $row3['sumOfTo'] + $row4['sumOfFor']);
                                            if ($total != 0) {
                                                echo number_format($total, 2);
                                             }
                                            else {
                                                echo '' . '0.00';
                                            }
                                        }
                                    }
                                }
                            }
                            ?>
                        </td>
                    </tr>
                    <tr>
                        <td>2</td>
                        <td>
                            <?php
                            $query = "SELECT SUM(payload_total) As sumOf62 FROM drivers WHERE `month`='9' AND `week`='2'";
                            $result = mysqli_query($conn, $query);
                            while ($row = mysqli_fetch_assoc($result)) {
                                $total = $row['sumOf62'];
                                if ($total != 0) {
                                    echo number_format($total, 2);
                                }
                                else {
                                    echo '' . '0.00';
                                }
                            }
                            ?>
                        </td>
                        <td style="background: #FFC107; color: black;">
                            <?php
                            $query = "SELECT SUM(service_value) As sumOf62 FROM drivers WHERE `month`='9' AND `week`='2'";
                            $result = mysqli_query($conn, $query);
                            while ($row = mysqli_fetch_assoc($result)) {
                                $total = $row['sumOf62'];
                                if ($total != 0) {
                                    echo number_format($total, 2);
                                }
                                else {
                                    echo '' . '0.00';
                                }
                            }
                            ?>
                        </td>
                        <td style="background: #FFC107; color: black;">
                            <?php
                            $query = "SELECT SUM(diesel) As sumOf62 FROM drivers WHERE `month`='9' AND `week`='2'";
                            $result = mysqli_query($conn, $query);
                            while ($row = mysqli_fetch_assoc($result)) {
                                $total = $row['sumOf62'];
                                if ($total != 0) {
                                    echo number_format($total, 2);
                                }
                                else {
                                    echo '' . '0.00';
                                }
                            }
                            ?>
                        </td>
                        <td style="background: #FFC107; color: black;">
                            <?php
                            $query = "SELECT SUM(trip_total) As sumOf62 FROM drivers WHERE `month`='9' AND `week`='2'";
                            $result = mysqli_query($conn, $query);
                            while ($row = mysqli_fetch_assoc($result)) {
                                $total = $row['sumOf62'];
                                if ($total != 0) {
                                    echo number_format($total, 2);
                                }
                                else {
                                    echo '' . '0.00';
                                }
                            }
                            ?>
                        </td>
                        <td style="background: #0D6EFD;">
                            <?php
                            $query = "SELECT SUM(payments) As sumOf61 FROM drivers WHERE `month`='9' AND `week`='2'";
                            $result = mysqli_query($conn, $query);
                            while ($row = mysqli_fetch_assoc($result)) {
                                $total = $row['sumOf61'];
                                if ($total != 0) {
                                    echo number_format($total, 2);
                                }
                                else {
                                    echo '' . '0.00';
                                }
                            }
                            ?>
                        </td>
                        <td style="background: red;">
                            <?php
                            $query = "SELECT SUM(discounts) As sumOf62 FROM drivers WHERE `month`='9' AND `week`='2'";
                            $result = mysqli_query($conn, $query);
                            while ($row = mysqli_fetch_assoc($result)) {
                                $total = $row['sumOf62'];
                                if ($total != 0) {
                                    echo number_format($total, 2);
                                }
                                else {
                                    echo '' . '0.00';
                                }
                            }
                            ?>
                        </td>
                        <td style="background: green;">
                            <?php
                            $query = "SELECT SUM(salary) As sumOf61 FROM drivers WHERE `month`='9' AND `week`='2'";
                            $result = mysqli_query($conn, $query);
                            while ($row = mysqli_fetch_assoc($result)) {
                                $total = $row['sumOf61'];
                                if ($total != 0) {
                                    echo number_format($total, 2);
                                }
                                else {
                                    echo '' . '0.00';
                                }
                            }
                            ?>
                        </td>
                        <td>
                            <?php
                            $query = "SELECT SUM(payload_total) As sumOf FROM drivers WHERE `month`='9' AND `week`='2'";
                            $query2 = "SELECT SUM(trip_total) As sumOfIn FROM drivers WHERE `month`='9' AND `week`='2'";
                            $query3 = "SELECT SUM(diesel) As sumOfTo FROM drivers WHERE `month`='9' AND `week`='2'";
                            $query4 = "SELECT SUM(service_value) As sumOfFor FROM drivers WHERE `month`='9' AND `week`='2'";
                            $total = 0;
                            $result = mysqli_query($conn, $query);
                            $result2 = mysqli_query($conn, $query2);
                            $result3 = mysqli_query($conn, $query3);
                            $result4 = mysqli_query($conn, $query4);

                            while ($row = mysqli_fetch_assoc($result)) {
                                while ($row2 = mysqli_fetch_assoc($result2)) {
                                    while ($row3 = mysqli_fetch_assoc($result3)) {
                                        while ($row4 = mysqli_fetch_assoc($result4)) {
                                            $total = $row['sumOf'] - ($row2['sumOfIn'] + $row3['sumOfTo'] + $row4['sumOfFor']);
                                            if ($total != 0) {
                                                echo number_format($total, 2);
                                             }
                                            else {
                                                echo '' . '0.00';
                                            }
                                        }
                                    }
                                }
                            }
                            ?>
                        </td>
                    </tr>
                    <tr>
                        <td>3</td>
                        <td>
                            <?php
                            $query = "SELECT SUM(payload_total) As sumOf63 FROM drivers WHERE `month`='9' AND `week`='3'";
                            $result = mysqli_query($conn, $query);
                            while ($row = mysqli_fetch_assoc($result)) {
                                $total = $row['sumOf63'];
                                if ($total != 0) {
                                    echo number_format($total, 2);
                                }
                                else {
                                    echo '' . '0.00';
                                }
                            }
                            ?>
                        </td>
                        <td style="background: #FFC107; color: black;">
                            <?php
                            $query = "SELECT SUM(service_value) As sumOf63 FROM drivers WHERE `month`='9' AND `week`='3'";
                            $result = mysqli_query($conn, $query);
                            while ($row = mysqli_fetch_assoc($result)) {
                                $total = $row['sumOf63'];
                                if ($total != 0) {
                                    echo number_format($total, 2);
                                }
                                else {
                                    echo '' . '0.00';
                                }
                            }
                            ?>
                        </td>
                        <td style="background: #FFC107; color: black;">
                            <?php
                            $query = "SELECT SUM(diesel) As sumOf63 FROM drivers WHERE `month`='9' AND `week`='3'";
                            $result = mysqli_query($conn, $query);
                            while ($row = mysqli_fetch_assoc($result)) {
                                $total = $row['sumOf63'];
                                if ($total != 0) {
                                    echo number_format($total, 2);
                                }
                                else {
                                    echo '' . '0.00';
                                }
                            }
                            ?>
                        </td>
                        <td style="background: #FFC107; color: black;">
                            <?php
                            $query = "SELECT SUM(trip_total) As sumOf63 FROM drivers WHERE `month`='9' AND `week`='3'";
                            $result = mysqli_query($conn, $query);
                            while ($row = mysqli_fetch_assoc($result)) {
                                $total = $row['sumOf63'];
                                if ($total != 0) {
                                    echo number_format($total, 2);
                                }
                                else {
                                    echo '' . '0.00';
                                }
                            }
                            ?>
                        </td>
                        <td style="background: #0D6EFD;">
                            <?php
                            $query = "SELECT SUM(payments) As sumOf61 FROM drivers WHERE `month`='9' AND `week`='3'";
                            $result = mysqli_query($conn, $query);
                            while ($row = mysqli_fetch_assoc($result)) {
                                $total = $row['sumOf61'];
                                if ($total != 0) {
                                    echo number_format($total, 2);
                                }
                                else {
                                    echo '' . '0.00';
                                }
                            }
                            ?>
                        </td>
                        <td style="background: red;">
                            <?php
                            $query = "SELECT SUM(discounts) As sumOf63 FROM drivers WHERE `month`='9' AND `week`='3'";
                            $result = mysqli_query($conn, $query);
                            while ($row = mysqli_fetch_assoc($result)) {
                                $total = $row['sumOf63'];
                                if ($total != 0) {
                                    echo number_format($total, 2);
                                }
                                else {
                                    echo '' . '0.00';
                                }
                            }
                            ?>
                        </td>
                        <td style="background: green;">
                            <?php
                            $query = "SELECT SUM(salary) As sumOf61 FROM drivers WHERE `month`='9' AND `week`='3'";
                            $result = mysqli_query($conn, $query);
                            while ($row = mysqli_fetch_assoc($result)) {
                                $total = $row['sumOf61'];
                                if ($total != 0) {
                                    echo number_format($total, 2);
                                }
                                else {
                                    echo '' . '0.00';
                                }
                            }
                            ?>
                        </td>
                        <td>
                            <?php
                            $query = "SELECT SUM(payload_total) As sumOf FROM drivers WHERE `month`='9' AND `week`='3'";
                            $query2 = "SELECT SUM(trip_total) As sumOfIn FROM drivers WHERE `month`='9' AND `week`='3'";
                            $query3 = "SELECT SUM(diesel) As sumOfTo FROM drivers WHERE `month`='9' AND `week`='3'";
                            $query4 = "SELECT SUM(service_value) As sumOfFor FROM drivers WHERE `month`='9' AND `week`='3'";
                            $total = 0;
                            $result = mysqli_query($conn, $query);
                            $result2 = mysqli_query($conn, $query2);
                            $result3 = mysqli_query($conn, $query3);
                            $result4 = mysqli_query($conn, $query4);

                            while ($row = mysqli_fetch_assoc($result)) {
                                while ($row2 = mysqli_fetch_assoc($result2)) {
                                    while ($row3 = mysqli_fetch_assoc($result3)) {
                                        while ($row4 = mysqli_fetch_assoc($result4)) {
                                            $total = $row['sumOf'] - ($row2['sumOfIn'] + $row3['sumOfTo'] + $row4['sumOfFor']);
                                            if ($total != 0) {
                                                echo number_format($total, 2);
                                             }
                                            else {
                                                echo '' . '0.00';
                                            }
                                        }
                                    }
                                }
                            }
                            ?>
                        </td>
                    </tr>
                    <tr>
                        <td>4</td>
                        <td>
                            <?php
                            $query = "SELECT SUM(payload_total) As sumOf64 FROM drivers WHERE `month`='9' AND `week`='4'";
                            $result = mysqli_query($conn, $query);
                            while ($row = mysqli_fetch_assoc($result)) {
                                $total = $row['sumOf64'];
                                if ($total != 0) {
                                    echo number_format($total, 2);
                                }
                                else {
                                    echo '' . '0.00';
                                }
                            }
                            ?>
                        </td>
                        <td style="background: #FFC107; color: black;">
                            <?php
                            $query = "SELECT SUM(service_value) As sumOf64 FROM drivers WHERE `month`='9' AND `week`='4'";
                            $result = mysqli_query($conn, $query);
                            while ($row = mysqli_fetch_assoc($result)) {
                                $total = $row['sumOf64'];
                                if ($total != 0) {
                                    echo number_format($total, 2);
                                }
                                else {
                                    echo '' . '0.00';
                                }
                            }
                            ?>
                        </td>
                        <td style="background: #FFC107; color: black;">
                            <?php
                            $query = "SELECT SUM(diesel) As sumOf64 FROM drivers WHERE `month`='9' AND `week`='4'";
                            $result = mysqli_query($conn, $query);
                            while ($row = mysqli_fetch_assoc($result)) {
                                $total = $row['sumOf64'];
                                if ($total != 0) {
                                    echo number_format($total, 2);
                                }
                                else {
                                    echo '' . '0.00';
                                }
                            }
                            ?>
                        </td>
                        <td style="background: #FFC107; color: black;">
                            <?php
                            $query = "SELECT SUM(trip_total) As sumOf64 FROM drivers WHERE `month`='9' AND `week`='4'";
                            $result = mysqli_query($conn, $query);
                            while ($row = mysqli_fetch_assoc($result)) {
                                $total = $row['sumOf64'];
                                if ($total != 0) {
                                    echo number_format($total, 2);
                                }
                                else {
                                    echo '' . '0.00';
                                }
                            }
                            ?>
                        </td>
                        <td style="background: #0D6EFD;">
                            <?php
                            $query = "SELECT SUM(payments) As sumOf61 FROM drivers WHERE `month`='9' AND `week`='4'";
                            $result = mysqli_query($conn, $query);
                            while ($row = mysqli_fetch_assoc($result)) {
                                $total = $row['sumOf61'];
                                if ($total != 0) {
                                    echo number_format($total, 2);
                                }
                                else {
                                    echo '' . '0.00';
                                }
                            }
                            ?>
                        </td>
                        <td style="background: red;">
                            <?php
                            $query = "SELECT SUM(discounts) As sumOf64 FROM drivers WHERE `month`='9' AND `week`='4'";
                            $result = mysqli_query($conn, $query);
                            while ($row = mysqli_fetch_assoc($result)) {
                                $total = $row['sumOf64'];
                                if ($total != 0) {
                                    echo number_format($total, 2);
                                }
                                else {
                                    echo '' . '0.00';
                                }
                            }
                            ?>
                        </td>
                        <td style="background: green;">
                            <?php
                            $query = "SELECT SUM(salary) As sumOf61 FROM drivers WHERE `month`='9' AND `week`='4'";
                            $result = mysqli_query($conn, $query);
                            while ($row = mysqli_fetch_assoc($result)) {
                                $total = $row['sumOf61'];
                                if ($total != 0) {
                                    echo number_format($total, 2);
                                }
                                else {
                                    echo '' . '0.00';
                                }
                            }
                            ?>
                        </td>
                        <td>
                            <?php
                            $query = "SELECT SUM(payload_total) As sumOf FROM drivers WHERE `month`='9' AND `week`='4'";
                            $query2 = "SELECT SUM(trip_total) As sumOfIn FROM drivers WHERE `month`='9' AND `week`='4'";
                            $query3 = "SELECT SUM(diesel) As sumOfTo FROM drivers WHERE `month`='9' AND `week`='4'";
                            $query4 = "SELECT SUM(service_value) As sumOfFor FROM drivers WHERE `month`='9' AND `week`='4'";
                            $total = 0;
                            $result = mysqli_query($conn, $query);
                            $result2 = mysqli_query($conn, $query2);
                            $result3 = mysqli_query($conn, $query3);
                            $result4 = mysqli_query($conn, $query4);

                            while ($row = mysqli_fetch_assoc($result)) {
                                while ($row2 = mysqli_fetch_assoc($result2)) {
                                    while ($row3 = mysqli_fetch_assoc($result3)) {
                                        while ($row4 = mysqli_fetch_assoc($result4)) {
                                            $total = $row['sumOf'] - ($row2['sumOfIn'] + $row3['sumOfTo'] + $row4['sumOfFor']);
                                            if ($total != 0) {
                                                echo number_format($total, 2);
                                             }
                                            else {
                                                echo '' . '0.00';
                                            }
                                        }
                                    }
                                }
                            }
                            ?>
                        </td>
                    </tr>
                </table>
                <!-- Modal -->
                    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="exampleModalLabel">التفاصيل</h1>
                                </div>
                                <div class="modal-body">
                                    <a>D</a>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">إغلاق</button>
                                    <button type="button" class="btn btn-primary">حفظ التغيرات</button>
                                </div>
                            </div>
                        </div>
                    </div>
                <p style="font-size: 24px;">
                    الصندوق = 
                    
                    (
                    
                    <a style="color: #FFC107; font-size: 22px;">إجمالي المصروفات</a>
                    
                    - 
                    
                    <!--<a style="color: #0D6EFD; font-size: 22px;">إجمالي الدفعات</a>-->
                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                        إجمالي الدفعات
                    </button>
                    

                    ) =
                    
                    <?php
                            $total = 0;
                            
                            $query1 = "SELECT SUM(payments) As sumOfBox1 FROM drivers WHERE `month`='9' AND `week`='1'";
                            $query2 = "SELECT SUM(trip_total) As sumOfInBox1 FROM drivers WHERE `month`='9' AND `week`='1'";
                            $query3 = "SELECT SUM(diesel) As sumOfToBox1 FROM drivers WHERE `month`='9' AND `week`='1'";
                            $query4 = "SELECT SUM(service_value) As sumOfForBox1 FROM drivers WHERE `month`='9' AND `week`='1'";
                            
                            $result1 = mysqli_query($conn, $query1);
                            $result2 = mysqli_query($conn, $query2);
                            $result3 = mysqli_query($conn, $query3);
                            $result4 = mysqli_query($conn, $query4);
                            
                            $query5 = "SELECT SUM(payments) As sumOfBox2 FROM drivers WHERE `month`='9' AND `week`='2'";
                            $query6 = "SELECT SUM(trip_total) As sumOfInBox2 FROM drivers WHERE `month`='9' AND `week`='2'";
                            $query7 = "SELECT SUM(diesel) As sumOfToBox2 FROM drivers WHERE `month`='9' AND `week`='2'";
                            $query8 = "SELECT SUM(service_value) As sumOfForBox2 FROM drivers WHERE `month`='9' AND `week`='2'";
                            
                            $query9 = "SELECT SUM(payments) As sumOfBox3 FROM drivers WHERE `month`='9' AND `week`='3'";
                            $query10 = "SELECT SUM(trip_total) As sumOfInBox3 FROM drivers WHERE `month`='9' AND `week`='3'";
                            $query11 = "SELECT SUM(diesel) As sumOfToBox3 FROM drivers WHERE `month`='9' AND `week`='3'";
                            $query12 = "SELECT SUM(service_value) As sumOfForBox3 FROM drivers WHERE `month`='9' AND `week`='3'";
                            
                            $query13 = "SELECT SUM(payments) As sumOfBox4 FROM drivers WHERE `month`='9' AND `week`='4'";
                            $query14 = "SELECT SUM(trip_total) As sumOfInBox4 FROM drivers WHERE `month`='9' AND `week`='4'";
                            $query15 = "SELECT SUM(diesel) As sumOfToBox4 FROM drivers WHERE `month`='9' AND `week`='4'";
                            $query16 = "SELECT SUM(service_value) As sumOfForBox4 FROM drivers WHERE `month`='9' AND `week`='4'";
                            
                            $result5 = mysqli_query($conn, $query5);
                            $result6 = mysqli_query($conn, $query6);
                            $result7 = mysqli_query($conn, $query7);
                            $result8 = mysqli_query($conn, $query8);
                            
                            $result9 = mysqli_query($conn, $query9);
                            $result10 = mysqli_query($conn, $query10);
                            $result11 = mysqli_query($conn, $query11);
                            $result12 = mysqli_query($conn, $query12);
                            
                            $result13 = mysqli_query($conn, $query13);
                            $result14 = mysqli_query($conn, $query14);
                            $result15 = mysqli_query($conn, $query15);
                            $result16 = mysqli_query($conn, $query16);
                            
                            while ($row1 = mysqli_fetch_assoc($result1)) {
                                while ($row2 = mysqli_fetch_assoc($result2)) {
                                    while ($row3 = mysqli_fetch_assoc($result3)) {
                                        while ($row4 = mysqli_fetch_assoc($result4)) {
                                            
                                            while ($row5 = mysqli_fetch_assoc($result5)) {
                                                while ($row6 = mysqli_fetch_assoc($result6)) {
                                                    while ($row7 = mysqli_fetch_assoc($result7)) {
                                                        while ($row8 = mysqli_fetch_assoc($result8)) {
                                                            
                                                            while ($row9 = mysqli_fetch_assoc($result9)) {
                                                                while ($row10 = mysqli_fetch_assoc($result10)) {
                                                                    while ($row11 = mysqli_fetch_assoc($result11)) {
                                                                        while ($row12 = mysqli_fetch_assoc($result12)) {
                                                                            
                                                                            while ($row13 = mysqli_fetch_assoc($result13)) {
                                                                                while ($row14 = mysqli_fetch_assoc($result14)) {
                                                                                    while ($row15 = mysqli_fetch_assoc($result15)) {
                                                                                        while ($row16 = mysqli_fetch_assoc($result16)) {
                                            
$total = ($row1['sumOfBox1'] - ($row2['sumOfInBox1'] + $row3['sumOfToBox1'] + $row4['sumOfForBox1']))
+ ($row5['sumOfBox2'] - ($row6['sumOfInBox2'] +  $row7['sumOfToBox2'] + $row8['sumOfForBox2']))
+ ($row9['sumOfBox3'] - ($row10['sumOfInBox3'] + $row11['sumOfToBox3'] + $row12['sumOfForBox3']))
+ ($row13['sumOfBox4'] - ($row14['sumOfInBox4'] + $row15['sumOfToBox4'] + $row16['sumOfForBox4']));
    $total_payment = $row1['sumOfBox1'] + $row5['sumOfBox2'] + $row9['sumOfBox3'] + $row13['sumOfBox4'];
    $total_s = ($row2['sumOfInBox1'] + $row3['sumOfToBox1'] + $row4['sumOfForBox1']) + 
    ($row6['sumOfInBox2'] +  $row7['sumOfToBox2'] + $row8['sumOfForBox2']) +
    ($row10['sumOfInBox3'] + $row11['sumOfToBox3'] + $row12['sumOfForBox3']) +
    ($row14['sumOfInBox4'] + $row15['sumOfToBox4'] + $row16['sumOfForBox4']);
                                                                                    if ($total != 0) {
    echo '<a style="color: #FFC107; font-size: 22px;">' . number_format($total_s, 2) . '</a>' . ' - ' . '<a style="color: blue; font-size: 22px;">' . number_format($total_payment, 2) . '</a>' . ' = ' . number_format($total, 2); 
                                                                                     }
                                                                                    else {
                                                                                        echo '' . '0.00';
                                                                                    }
                                                                            
                                                                                        
                                                                                    }
                                                                                }
                                                                            }
                                                                        }
                                                            
                                                                       
                                                                    }
                                                                }
                                                            }
                                                        }
                                                            
                                                        
                                                    }
                                                }
                                            }
                                        }
                                            
                                       
                                    }
                                }
                            }
                        }
                        ?>
                </p>
            </div>
            <div class="content">
                <driv class="row ">
                    <div class="col"><h2>شهر 10</h2></div>
                </driv>
                <table class="table table-dark table-hover">
                    <tr>
                        <th>الأسبوع#</th>
                        <th>الحمولة</th>
                        <th style="background: #FFC107; color: black;">قيمة الخدمة</th>
                        <th style="background: #FFC107; color: black;">ديزل</th>
                        <th style="background: #FFC107; color: black;">التربات</th>
                        <th style="background: #0D6EFD;">الدفعات</th>
                        <th style="background: red;">الخصومات</th>
                        <th style="background: green;">الراتب</th>
                        <th>الدخل الأسبوعي</th>
                    </tr>
                    <tr>
                        <td>1</td>
                        <td>
                            <?php
                            $query = "SELECT SUM(payload_total) As sumOf61 FROM drivers WHERE `month`='10' AND `week`='1'";
                            $result = mysqli_query($conn, $query);
                            while ($row = mysqli_fetch_assoc($result)) {
                                $total = $row['sumOf61'];
                                if ($total != 0) {
                                    echo number_format($total, 2);
                                }
                                else {
                                    echo '' . '0.00';
                                }
                            }
                            ?>
                        </td>
                        <td style="background: #FFC107; color: black;">
                            <?php
                            $query = "SELECT SUM(service_value) As sumOf61 FROM drivers WHERE `month`='10' AND `week`='1'";
                            $result = mysqli_query($conn, $query);
                            while ($row = mysqli_fetch_assoc($result)) {
                                $total = $row['sumOf61'];
                                if ($total != 0) {
                                    echo number_format($total, 2);
                                }
                                else {
                                    echo '' . '0.00';
                                }
                            }
                            ?>
                        </td>
                        <td style="background: #FFC107; color: black;">
                            <?php
                            $query = "SELECT SUM(diesel) As sumOf61 FROM drivers WHERE `month`='10' AND `week`='1'";
                            $result = mysqli_query($conn, $query);
                            while ($row = mysqli_fetch_assoc($result)) {
                                $total = $row['sumOf61'];
                                if ($total != 0) {
                                    echo number_format($total, 2);
                                }
                                else {
                                    echo '' . '0.00';
                                }
                            }
                            ?>
                        </td>
                        <td style="background: #FFC107; color: black;">
                            <?php
                            $query = "SELECT SUM(trip_total) As sumOf61 FROM drivers WHERE `month`='10' AND `week`='1'";
                            $result = mysqli_query($conn, $query);
                            while ($row = mysqli_fetch_assoc($result)) {
                                $total = $row['sumOf61'];
                                if ($total != 0) {
                                    echo number_format($total, 2);
                                }
                                else {
                                    echo '' . '0.00';
                                }
                            }
                            ?>
                        </td>
                        <td style="background: #0D6EFD;">
                            <?php
                            $query = "SELECT SUM(payments) As sumOf61 FROM drivers WHERE `month`='10' AND `week`='1'";
                            $result = mysqli_query($conn, $query);
                            while ($row = mysqli_fetch_assoc($result)) {
                                $total = $row['sumOf61'];
                                if ($total != 0) {
                                    echo number_format($total, 2);
                                }
                                else {
                                    echo '' . '0.00';
                                }
                            }
                            ?>
                        </td>
                        <td style="background: red;">
                            <?php
                            $query = "SELECT SUM(discounts) As sumOf61 FROM drivers WHERE `month`='10' AND `week`='1'";
                            $result = mysqli_query($conn, $query);
                            while ($row = mysqli_fetch_assoc($result)) {
                                $total = $row['sumOf61'];
                                if ($total != 0) {
                                    echo number_format($total, 2);
                                }
                                else {
                                    echo '' . '0.00';
                                }
                            }
                            ?>
                        </td>
                        <td style="background: green;">
                            <?php
                            $query = "SELECT SUM(salary) As sumOf61 FROM drivers WHERE `month`='10' AND `week`='1'";
                            $result = mysqli_query($conn, $query);
                            while ($row = mysqli_fetch_assoc($result)) {
                                $total = $row['sumOf61'];
                                if ($total != 0) {
                                    echo number_format($total, 2);
                                }
                                else {
                                    echo '' . '0.00';
                                }
                            }
                            ?>
                        </td>
                        <td>
                            <?php
                            $query = "SELECT SUM(payload_total) As sumOf FROM drivers WHERE `month`='10' AND `week`='1'";
                            $query2 = "SELECT SUM(trip_total) As sumOfIn FROM drivers WHERE `month`='10' AND `week`='1'";
                            $query3 = "SELECT SUM(diesel) As sumOfTo FROM drivers WHERE `month`='10' AND `week`='1'";
                            $query4 = "SELECT SUM(service_value) As sumOfFor FROM drivers WHERE `month`='10' AND `week`='1'";
                            $total = 0;
                            $result = mysqli_query($conn, $query);
                            $result2 = mysqli_query($conn, $query2);
                            $result3 = mysqli_query($conn, $query3);
                            $result4 = mysqli_query($conn, $query4);

                            while ($row = mysqli_fetch_assoc($result)) {
                                while ($row2 = mysqli_fetch_assoc($result2)) {
                                    while ($row3 = mysqli_fetch_assoc($result3)) {
                                        while ($row4 = mysqli_fetch_assoc($result4)) {
                                            $total = $row['sumOf'] - ($row2['sumOfIn'] + $row3['sumOfTo'] + $row4['sumOfFor']);
                                            if ($total != 0) {
                                                echo number_format($total, 2);
                                             }
                                            else {
                                                echo '' . '0.00';
                                            }
                                        }
                                    }
                                }
                            }
                            ?>
                        </td>
                    </tr>
                    <tr>
                        <td>2</td>
                        <td>
                            <?php
                            $query = "SELECT SUM(payload_total) As sumOf62 FROM drivers WHERE `month`='10' AND `week`='2'";
                            $result = mysqli_query($conn, $query);
                            while ($row = mysqli_fetch_assoc($result)) {
                                $total = $row['sumOf62'];
                                if ($total != 0) {
                                    echo number_format($total, 2);
                                }
                                else {
                                    echo '' . '0.00';
                                }
                            }
                            ?>
                        </td>
                        <td style="background: #FFC107; color: black;">
                            <?php
                            $query = "SELECT SUM(service_value) As sumOf62 FROM drivers WHERE `month`='10' AND `week`='2'";
                            $result = mysqli_query($conn, $query);
                            while ($row = mysqli_fetch_assoc($result)) {
                                $total = $row['sumOf62'];
                                if ($total != 0) {
                                    echo number_format($total, 2);
                                }
                                else {
                                    echo '' . '0.00';
                                }
                            }
                            ?>
                        </td>
                        <td style="background: #FFC107; color: black;">
                            <?php
                            $query = "SELECT SUM(diesel) As sumOf62 FROM drivers WHERE `month`='10' AND `week`='2'";
                            $result = mysqli_query($conn, $query);
                            while ($row = mysqli_fetch_assoc($result)) {
                                $total = $row['sumOf62'];
                                if ($total != 0) {
                                    echo number_format($total, 2);
                                }
                                else {
                                    echo '' . '0.00';
                                }
                            }
                            ?>
                        </td>
                        <td style="background: #FFC107; color: black;">
                            <?php
                            $query = "SELECT SUM(trip_total) As sumOf62 FROM drivers WHERE `month`='10' AND `week`='2'";
                            $result = mysqli_query($conn, $query);
                            while ($row = mysqli_fetch_assoc($result)) {
                                $total = $row['sumOf62'];
                                if ($total != 0) {
                                    echo number_format($total, 2);
                                }
                                else {
                                    echo '' . '0.00';
                                }
                            }
                            ?>
                        </td>
                        <td style="background: #0D6EFD;">
                            <?php
                            $query = "SELECT SUM(payments) As sumOf61 FROM drivers WHERE `month`='10' AND `week`='2'";
                            $result = mysqli_query($conn, $query);
                            while ($row = mysqli_fetch_assoc($result)) {
                                $total = $row['sumOf61'];
                                if ($total != 0) {
                                    echo number_format($total, 2);
                                }
                                else {
                                    echo '' . '0.00';
                                }
                            }
                            ?>
                        </td>
                        <td style="background: red;">
                            <?php
                            $query = "SELECT SUM(discounts) As sumOf62 FROM drivers WHERE `month`='10' AND `week`='2'";
                            $result = mysqli_query($conn, $query);
                            while ($row = mysqli_fetch_assoc($result)) {
                                $total = $row['sumOf62'];
                                if ($total != 0) {
                                    echo number_format($total, 2);
                                }
                                else {
                                    echo '' . '0.00';
                                }
                            }
                            ?>
                        </td>
                        <td style="background: green;">
                            <?php
                            $query = "SELECT SUM(salary) As sumOf61 FROM drivers WHERE `month`='10' AND `week`='2'";
                            $result = mysqli_query($conn, $query);
                            while ($row = mysqli_fetch_assoc($result)) {
                                $total = $row['sumOf61'];
                                if ($total != 0) {
                                    echo number_format($total, 2);
                                }
                                else {
                                    echo '' . '0.00';
                                }
                            }
                            ?>
                        </td>
                        <td>
                            <?php
                            $query = "SELECT SUM(payload_total) As sumOf FROM drivers WHERE `month`='10' AND `week`='2'";
                            $query2 = "SELECT SUM(trip_total) As sumOfIn FROM drivers WHERE `month`='10' AND `week`='2'";
                            $query3 = "SELECT SUM(diesel) As sumOfTo FROM drivers WHERE `month`='10' AND `week`='2'";
                            $query4 = "SELECT SUM(service_value) As sumOfFor FROM drivers WHERE `month`='10' AND `week`='2'";
                            $total = 0;
                            $result = mysqli_query($conn, $query);
                            $result2 = mysqli_query($conn, $query2);
                            $result3 = mysqli_query($conn, $query3);
                            $result4 = mysqli_query($conn, $query4);

                            while ($row = mysqli_fetch_assoc($result)) {
                                while ($row2 = mysqli_fetch_assoc($result2)) {
                                    while ($row3 = mysqli_fetch_assoc($result3)) {
                                        while ($row4 = mysqli_fetch_assoc($result4)) {
                                            $total = $row['sumOf'] - ($row2['sumOfIn'] + $row3['sumOfTo'] + $row4['sumOfFor']);
                                            if ($total != 0) {
                                                echo number_format($total, 2);
                                             }
                                            else {
                                                echo '' . '0.00';
                                            }
                                        }
                                    }
                                }
                            }
                            ?>
                        </td>
                    </tr>
                    <tr>
                        <td>3</td>
                        <td>
                            <?php
                            $query = "SELECT SUM(payload_total) As sumOf63 FROM drivers WHERE `month`='10' AND `week`='3'";
                            $result = mysqli_query($conn, $query);
                            while ($row = mysqli_fetch_assoc($result)) {
                                $total = $row['sumOf63'];
                                if ($total != 0) {
                                    echo number_format($total, 2);
                                }
                                else {
                                    echo '' . '0.00';
                                }
                            }
                            ?>
                        </td>
                        <td style="background: #FFC107; color: black;">
                            <?php
                            $query = "SELECT SUM(service_value) As sumOf63 FROM drivers WHERE `month`='10' AND `week`='3'";
                            $result = mysqli_query($conn, $query);
                            while ($row = mysqli_fetch_assoc($result)) {
                                $total = $row['sumOf63'];
                                if ($total != 0) {
                                    echo number_format($total, 2);
                                }
                                else {
                                    echo '' . '0.00';
                                }
                            }
                            ?>
                        </td>
                        <td style="background: #FFC107; color: black;">
                            <?php
                            $query = "SELECT SUM(diesel) As sumOf63 FROM drivers WHERE `month`='10' AND `week`='3'";
                            $result = mysqli_query($conn, $query);
                            while ($row = mysqli_fetch_assoc($result)) {
                                $total = $row['sumOf63'];
                                if ($total != 0) {
                                    echo number_format($total, 2);
                                }
                                else {
                                    echo '' . '0.00';
                                }
                            }
                            ?>
                        </td>
                        <td style="background: #FFC107; color: black;">
                            <?php
                            $query = "SELECT SUM(trip_total) As sumOf63 FROM drivers WHERE `month`='10' AND `week`='3'";
                            $result = mysqli_query($conn, $query);
                            while ($row = mysqli_fetch_assoc($result)) {
                                $total = $row['sumOf63'];
                                if ($total != 0) {
                                    echo number_format($total, 2);
                                }
                                else {
                                    echo '' . '0.00';
                                }
                            }
                            ?>
                        </td>
                        <td style="background: #0D6EFD;">
                            <?php
                            $query = "SELECT SUM(payments) As sumOf61 FROM drivers WHERE `month`='10' AND `week`='3'";
                            $result = mysqli_query($conn, $query);
                            while ($row = mysqli_fetch_assoc($result)) {
                                $total = $row['sumOf61'];
                                if ($total != 0) {
                                    echo number_format($total, 2);
                                }
                                else {
                                    echo '' . '0.00';
                                }
                            }
                            ?>
                        </td>
                        <td style="background: red;">
                            <?php
                            $query = "SELECT SUM(discounts) As sumOf63 FROM drivers WHERE `month`='10' AND `week`='3'";
                            $result = mysqli_query($conn, $query);
                            while ($row = mysqli_fetch_assoc($result)) {
                                $total = $row['sumOf63'];
                                if ($total != 0) {
                                    echo number_format($total, 2);
                                }
                                else {
                                    echo '' . '0.00';
                                }
                            }
                            ?>
                        </td>
                        <td style="background: green;">
                            <?php
                            $query = "SELECT SUM(salary) As sumOf61 FROM drivers WHERE `month`='10' AND `week`='3'";
                            $result = mysqli_query($conn, $query);
                            while ($row = mysqli_fetch_assoc($result)) {
                                $total = $row['sumOf61'];
                                if ($total != 0) {
                                    echo number_format($total, 2);
                                }
                                else {
                                    echo '' . '0.00';
                                }
                            }
                            ?>
                        </td>
                        <td>
                            <?php
                            $query = "SELECT SUM(payload_total) As sumOf FROM drivers WHERE `month`='10' AND `week`='3'";
                            $query2 = "SELECT SUM(trip_total) As sumOfIn FROM drivers WHERE `month`='10' AND `week`='3'";
                            $query3 = "SELECT SUM(diesel) As sumOfTo FROM drivers WHERE `month`='10' AND `week`='3'";
                            $query4 = "SELECT SUM(service_value) As sumOfFor FROM drivers WHERE `month`='10' AND `week`='3'";
                            $total = 0;
                            $result = mysqli_query($conn, $query);
                            $result2 = mysqli_query($conn, $query2);
                            $result3 = mysqli_query($conn, $query3);
                            $result4 = mysqli_query($conn, $query4);

                            while ($row = mysqli_fetch_assoc($result)) {
                                while ($row2 = mysqli_fetch_assoc($result2)) {
                                    while ($row3 = mysqli_fetch_assoc($result3)) {
                                        while ($row4 = mysqli_fetch_assoc($result4)) {
                                            $total = $row['sumOf'] - ($row2['sumOfIn'] + $row3['sumOfTo'] + $row4['sumOfFor']);
                                            if ($total != 0) {
                                                echo number_format($total, 2);
                                             }
                                            else {
                                                echo '' . '0.00';
                                            }
                                        }
                                    }
                                }
                            }
                            ?>
                        </td>
                    </tr>
                    <tr>
                        <td>4</td>
                        <td>
                            <?php
                            $query = "SELECT SUM(payload_total) As sumOf64 FROM drivers WHERE `month`='10' AND `week`='4'";
                            $result = mysqli_query($conn, $query);
                            while ($row = mysqli_fetch_assoc($result)) {
                                $total = $row['sumOf64'];
                                if ($total != 0) {
                                    echo number_format($total, 2);
                                }
                                else {
                                    echo '' . '0.00';
                                }
                            }
                            ?>
                        </td>
                        <td style="background: #FFC107; color: black;">
                            <?php
                            $query = "SELECT SUM(service_value) As sumOf64 FROM drivers WHERE `month`='10' AND `week`='4'";
                            $result = mysqli_query($conn, $query);
                            while ($row = mysqli_fetch_assoc($result)) {
                                $total = $row['sumOf64'];
                                if ($total != 0) {
                                    echo number_format($total, 2);
                                }
                                else {
                                    echo '' . '0.00';
                                }
                            }
                            ?>
                        </td>
                        <td style="background: #FFC107; color: black;">
                            <?php
                            $query = "SELECT SUM(diesel) As sumOf64 FROM drivers WHERE `month`='10' AND `week`='4'";
                            $result = mysqli_query($conn, $query);
                            while ($row = mysqli_fetch_assoc($result)) {
                                $total = $row['sumOf64'];
                                if ($total != 0) {
                                    echo number_format($total, 2);
                                }
                                else {
                                    echo '' . '0.00';
                                }
                            }
                            ?>
                        </td>
                        <td style="background: #FFC107; color: black;">
                            <?php
                            $query = "SELECT SUM(trip_total) As sumOf64 FROM drivers WHERE `month`='10' AND `week`='4'";
                            $result = mysqli_query($conn, $query);
                            while ($row = mysqli_fetch_assoc($result)) {
                                $total = $row['sumOf64'];
                                if ($total != 0) {
                                    echo number_format($total, 2);
                                }
                                else {
                                    echo '' . '0.00';
                                }
                            }
                            ?>
                        </td>
                        <td style="background: #0D6EFD;">
                            <?php
                            $query = "SELECT SUM(payments) As sumOf61 FROM drivers WHERE `month`='10' AND `week`='4'";
                            $result = mysqli_query($conn, $query);
                            while ($row = mysqli_fetch_assoc($result)) {
                                $total = $row['sumOf61'];
                                if ($total != 0) {
                                    echo number_format($total, 2);
                                }
                                else {
                                    echo '' . '0.00';
                                }
                            }
                            ?>
                        </td>
                        <td style="background: red;">
                            <?php
                            $query = "SELECT SUM(discounts) As sumOf64 FROM drivers WHERE `month`='10' AND `week`='4'";
                            $result = mysqli_query($conn, $query);
                            while ($row = mysqli_fetch_assoc($result)) {
                                $total = $row['sumOf64'];
                                if ($total != 0) {
                                    echo number_format($total, 2);
                                }
                                else {
                                    echo '' . '0.00';
                                }
                            }
                            ?>
                        </td>
                        <td style="background: green;">
                            <?php
                            $query = "SELECT SUM(salary) As sumOf61 FROM drivers WHERE `month`='10' AND `week`='4'";
                            $result = mysqli_query($conn, $query);
                            while ($row = mysqli_fetch_assoc($result)) {
                                $total = $row['sumOf61'];
                                if ($total != 0) {
                                    echo number_format($total, 2);
                                }
                                else {
                                    echo '' . '0.00';
                                }
                            }
                            ?>
                        </td>
                        <td>
                            <?php
                            $query = "SELECT SUM(payload_total) As sumOf FROM drivers WHERE `month`='10' AND `week`='4'";
                            $query2 = "SELECT SUM(trip_total) As sumOfIn FROM drivers WHERE `month`='10' AND `week`='4'";
                            $query3 = "SELECT SUM(diesel) As sumOfTo FROM drivers WHERE `month`='10' AND `week`='4'";
                            $query4 = "SELECT SUM(service_value) As sumOfFor FROM drivers WHERE `month`='10' AND `week`='4'";
                            $total = 0;
                            $result = mysqli_query($conn, $query);
                            $result2 = mysqli_query($conn, $query2);
                            $result3 = mysqli_query($conn, $query3);
                            $result4 = mysqli_query($conn, $query4);

                            while ($row = mysqli_fetch_assoc($result)) {
                                while ($row2 = mysqli_fetch_assoc($result2)) {
                                    while ($row3 = mysqli_fetch_assoc($result3)) {
                                        while ($row4 = mysqli_fetch_assoc($result4)) {
                                            $total = $row['sumOf'] - ($row2['sumOfIn'] + $row3['sumOfTo'] + $row4['sumOfFor']);
                                            if ($total != 0) {
                                                echo number_format($total, 2);
                                             }
                                            else {
                                                echo '' . '0.00';
                                            }
                                        }
                                    }
                                }
                            }
                            ?>
                        </td>
                    </tr>
                </table>
                <!-- Modal -->
                    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="exampleModalLabel">التفاصيل</h1>
                                </div>
                                <div class="modal-body">
                                    <a>D</a>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">إغلاق</button>
                                    <button type="button" class="btn btn-primary">حفظ التغيرات</button>
                                </div>
                            </div>
                        </div>
                    </div>
                <p style="font-size: 24px;">
                    الصندوق = 
                    
                    (
                    
                    <a style="color: #FFC107; font-size: 22px;">إجمالي المصروفات</a>
                    
                    - 
                    
                    <!--<a style="color: #0D6EFD; font-size: 22px;">إجمالي الدفعات</a>-->
                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                        إجمالي الدفعات
                    </button>
                    

                    ) =
                    
                    <?php
                            $total = 0;
                            
                            $query1 = "SELECT SUM(payments) As sumOfBox1 FROM drivers WHERE `month`='10' AND `week`='1'";
                            $query2 = "SELECT SUM(trip_total) As sumOfInBox1 FROM drivers WHERE `month`='10' AND `week`='1'";
                            $query3 = "SELECT SUM(diesel) As sumOfToBox1 FROM drivers WHERE `month`='10' AND `week`='1'";
                            $query4 = "SELECT SUM(service_value) As sumOfForBox1 FROM drivers WHERE `month`='10' AND `week`='1'";
                            
                            $result1 = mysqli_query($conn, $query1);
                            $result2 = mysqli_query($conn, $query2);
                            $result3 = mysqli_query($conn, $query3);
                            $result4 = mysqli_query($conn, $query4);
                            
                            $query5 = "SELECT SUM(payments) As sumOfBox2 FROM drivers WHERE `month`='10' AND `week`='2'";
                            $query6 = "SELECT SUM(trip_total) As sumOfInBox2 FROM drivers WHERE `month`='10' AND `week`='2'";
                            $query7 = "SELECT SUM(diesel) As sumOfToBox2 FROM drivers WHERE `month`='10' AND `week`='2'";
                            $query8 = "SELECT SUM(service_value) As sumOfForBox2 FROM drivers WHERE `month`='10' AND `week`='2'";
                            
                            $query9 = "SELECT SUM(payments) As sumOfBox3 FROM drivers WHERE `month`='10' AND `week`='3'";
                            $query10 = "SELECT SUM(trip_total) As sumOfInBox3 FROM drivers WHERE `month`='10' AND `week`='3'";
                            $query11 = "SELECT SUM(diesel) As sumOfToBox3 FROM drivers WHERE `month`='10' AND `week`='3'";
                            $query12 = "SELECT SUM(service_value) As sumOfForBox3 FROM drivers WHERE `month`='10' AND `week`='3'";
                            
                            $query13 = "SELECT SUM(payments) As sumOfBox4 FROM drivers WHERE `month`='10' AND `week`='4'";
                            $query14 = "SELECT SUM(trip_total) As sumOfInBox4 FROM drivers WHERE `month`='10' AND `week`='4'";
                            $query15 = "SELECT SUM(diesel) As sumOfToBox4 FROM drivers WHERE `month`='10' AND `week`='4'";
                            $query16 = "SELECT SUM(service_value) As sumOfForBox4 FROM drivers WHERE `month`='10' AND `week`='4'";
                            
                            $result5 = mysqli_query($conn, $query5);
                            $result6 = mysqli_query($conn, $query6);
                            $result7 = mysqli_query($conn, $query7);
                            $result8 = mysqli_query($conn, $query8);
                            
                            $result9 = mysqli_query($conn, $query9);
                            $result10 = mysqli_query($conn, $query10);
                            $result11 = mysqli_query($conn, $query11);
                            $result12 = mysqli_query($conn, $query12);
                            
                            $result13 = mysqli_query($conn, $query13);
                            $result14 = mysqli_query($conn, $query14);
                            $result15 = mysqli_query($conn, $query15);
                            $result16 = mysqli_query($conn, $query16);
                            
                            while ($row1 = mysqli_fetch_assoc($result1)) {
                                while ($row2 = mysqli_fetch_assoc($result2)) {
                                    while ($row3 = mysqli_fetch_assoc($result3)) {
                                        while ($row4 = mysqli_fetch_assoc($result4)) {
                                            
                                            while ($row5 = mysqli_fetch_assoc($result5)) {
                                                while ($row6 = mysqli_fetch_assoc($result6)) {
                                                    while ($row7 = mysqli_fetch_assoc($result7)) {
                                                        while ($row8 = mysqli_fetch_assoc($result8)) {
                                                            
                                                            while ($row9 = mysqli_fetch_assoc($result9)) {
                                                                while ($row10 = mysqli_fetch_assoc($result10)) {
                                                                    while ($row11 = mysqli_fetch_assoc($result11)) {
                                                                        while ($row12 = mysqli_fetch_assoc($result12)) {
                                                                            
                                                                            while ($row13 = mysqli_fetch_assoc($result13)) {
                                                                                while ($row14 = mysqli_fetch_assoc($result14)) {
                                                                                    while ($row15 = mysqli_fetch_assoc($result15)) {
                                                                                        while ($row16 = mysqli_fetch_assoc($result16)) {
                                            
$total = ($row1['sumOfBox1'] - ($row2['sumOfInBox1'] + $row3['sumOfToBox1'] + $row4['sumOfForBox1']))
+ ($row5['sumOfBox2'] - ($row6['sumOfInBox2'] +  $row7['sumOfToBox2'] + $row8['sumOfForBox2']))
+ ($row9['sumOfBox3'] - ($row10['sumOfInBox3'] + $row11['sumOfToBox3'] + $row12['sumOfForBox3']))
+ ($row13['sumOfBox4'] - ($row14['sumOfInBox4'] + $row15['sumOfToBox4'] + $row16['sumOfForBox4']));
    $total_payment = $row1['sumOfBox1'] + $row5['sumOfBox2'] + $row9['sumOfBox3'] + $row13['sumOfBox4'];
    $total_s = ($row2['sumOfInBox1'] + $row3['sumOfToBox1'] + $row4['sumOfForBox1']) + 
    ($row6['sumOfInBox2'] +  $row7['sumOfToBox2'] + $row8['sumOfForBox2']) +
    ($row10['sumOfInBox3'] + $row11['sumOfToBox3'] + $row12['sumOfForBox3']) +
    ($row14['sumOfInBox4'] + $row15['sumOfToBox4'] + $row16['sumOfForBox4']);
                                                                                    if ($total != 0) {
    echo '<a style="color: #FFC107; font-size: 22px;">' . number_format($total_s, 2) . '</a>' . ' - ' . '<a style="color: blue; font-size: 22px;">' . number_format($total_payment, 2) . '</a>' . ' = ' . number_format($total, 2); 
                                                                                     }
                                                                                    else {
                                                                                        echo '' . '0.00';
                                                                                    }
                                                                            
                                                                                        
                                                                                    }
                                                                                }
                                                                            }
                                                                        }
                                                            
                                                                       
                                                                    }
                                                                }
                                                            }
                                                        }
                                                            
                                                        
                                                    }
                                                }
                                            }
                                        }
                                            
                                       
                                    }
                                }
                            }
                        }
                        ?>
                </p>
            </div>
            <div class="content">
                <driv class="row ">
                    <div class="col"><h2>شهر 11</h2></div>
                </driv>
                <table class="table table-dark table-hover">
                    <tr>
                        <th>الأسبوع#</th>
                        <th>الحمولة</th>
                        <th style="background: #FFC107; color: black;">قيمة الخدمة</th>
                        <th style="background: #FFC107; color: black;">ديزل</th>
                        <th style="background: #FFC107; color: black;">التربات</th>
                        <th style="background: #0D6EFD;">الدفعات</th>
                        <th style="background: red;">الخصومات</th>
                        <th style="background: green;">الراتب</th>
                        <th>الدخل الأسبوعي</th>
                    </tr>
                    <tr>
                        <td>1</td>
                        <td>
                            <?php
                            $query = "SELECT SUM(payload_total) As sumOf61 FROM drivers WHERE `month`='11' AND `week`='1'";
                            $result = mysqli_query($conn, $query);
                            while ($row = mysqli_fetch_assoc($result)) {
                                $total = $row['sumOf61'];
                                if ($total != 0) {
                                    echo number_format($total, 2);
                                }
                                else {
                                    echo '' . '0.00';
                                }
                            }
                            ?>
                        </td>
                        <td style="background: #FFC107; color: black;">
                            <?php
                            $query = "SELECT SUM(service_value) As sumOf61 FROM drivers WHERE `month`='11' AND `week`='1'";
                            $result = mysqli_query($conn, $query);
                            while ($row = mysqli_fetch_assoc($result)) {
                                $total = $row['sumOf61'];
                                if ($total != 0) {
                                    echo number_format($total, 2);
                                }
                                else {
                                    echo '' . '0.00';
                                }
                            }
                            ?>
                        </td>
                        <td style="background: #FFC107; color: black;">
                            <?php
                            $query = "SELECT SUM(diesel) As sumOf61 FROM drivers WHERE `month`='11' AND `week`='1'";
                            $result = mysqli_query($conn, $query);
                            while ($row = mysqli_fetch_assoc($result)) {
                                $total = $row['sumOf61'];
                                if ($total != 0) {
                                    echo number_format($total, 2);
                                }
                                else {
                                    echo '' . '0.00';
                                }
                            }
                            ?>
                        </td>
                        <td style="background: #FFC107; color: black;">
                            <?php
                            $query = "SELECT SUM(trip_total) As sumOf61 FROM drivers WHERE `month`='11' AND `week`='1'";
                            $result = mysqli_query($conn, $query);
                            while ($row = mysqli_fetch_assoc($result)) {
                                $total = $row['sumOf61'];
                                if ($total != 0) {
                                    echo number_format($total, 2);
                                }
                                else {
                                    echo '' . '0.00';
                                }
                            }
                            ?>
                        </td>
                        <td style="background: #0D6EFD;">
                            <?php
                            $query = "SELECT SUM(payments) As sumOf61 FROM drivers WHERE `month`='11' AND `week`='1'";
                            $result = mysqli_query($conn, $query);
                            while ($row = mysqli_fetch_assoc($result)) {
                                $total = $row['sumOf61'];
                                if ($total != 0) {
                                    echo number_format($total, 2);
                                }
                                else {
                                    echo '' . '0.00';
                                }
                            }
                            ?>
                        </td>
                        <td style="background: red;">
                            <?php
                            $query = "SELECT SUM(discounts) As sumOf61 FROM drivers WHERE `month`='11' AND `week`='1'";
                            $result = mysqli_query($conn, $query);
                            while ($row = mysqli_fetch_assoc($result)) {
                                $total = $row['sumOf61'];
                                if ($total != 0) {
                                    echo number_format($total, 2);
                                }
                                else {
                                    echo '' . '0.00';
                                }
                            }
                            ?>
                        </td>
                        <td style="background: green;">
                            <?php
                            $query = "SELECT SUM(salary) As sumOf61 FROM drivers WHERE `month`='11' AND `week`='1'";
                            $result = mysqli_query($conn, $query);
                            while ($row = mysqli_fetch_assoc($result)) {
                                $total = $row['sumOf61'];
                                if ($total != 0) {
                                    echo number_format($total, 2);
                                }
                                else {
                                    echo '' . '0.00';
                                }
                            }
                            ?>
                        </td>
                        <td>
                            <?php
                            $query = "SELECT SUM(payload_total) As sumOf FROM drivers WHERE `month`='11' AND `week`='1'";
                            $query2 = "SELECT SUM(trip_total) As sumOfIn FROM drivers WHERE `month`='11' AND `week`='1'";
                            $query3 = "SELECT SUM(diesel) As sumOfTo FROM drivers WHERE `month`='11' AND `week`='1'";
                            $query4 = "SELECT SUM(service_value) As sumOfFor FROM drivers WHERE `month`='11' AND `week`='1'";
                            $total = 0;
                            $result = mysqli_query($conn, $query);
                            $result2 = mysqli_query($conn, $query2);
                            $result3 = mysqli_query($conn, $query3);
                            $result4 = mysqli_query($conn, $query4);

                            while ($row = mysqli_fetch_assoc($result)) {
                                while ($row2 = mysqli_fetch_assoc($result2)) {
                                    while ($row3 = mysqli_fetch_assoc($result3)) {
                                        while ($row4 = mysqli_fetch_assoc($result4)) {
                                            $total = $row['sumOf'] - ($row2['sumOfIn'] + $row3['sumOfTo'] + $row4['sumOfFor']);
                                            if ($total != 0) {
                                                echo number_format($total, 2);
                                             }
                                            else {
                                                echo '' . '0.00';
                                            }
                                        }
                                    }
                                }
                            }
                            ?>
                        </td>
                    </tr>
                    <tr>
                        <td>2</td>
                        <td>
                            <?php
                            $query = "SELECT SUM(payload_total) As sumOf62 FROM drivers WHERE `month`='11' AND `week`='2'";
                            $result = mysqli_query($conn, $query);
                            while ($row = mysqli_fetch_assoc($result)) {
                                $total = $row['sumOf62'];
                                if ($total != 0) {
                                    echo number_format($total, 2);
                                }
                                else {
                                    echo '' . '0.00';
                                }
                            }
                            ?>
                        </td>
                        <td style="background: #FFC107; color: black;">
                            <?php
                            $query = "SELECT SUM(service_value) As sumOf62 FROM drivers WHERE `month`='11' AND `week`='2'";
                            $result = mysqli_query($conn, $query);
                            while ($row = mysqli_fetch_assoc($result)) {
                                $total = $row['sumOf62'];
                                if ($total != 0) {
                                    echo number_format($total, 2);
                                }
                                else {
                                    echo '' . '0.00';
                                }
                            }
                            ?>
                        </td>
                        <td style="background: #FFC107; color: black;">
                            <?php
                            $query = "SELECT SUM(diesel) As sumOf62 FROM drivers WHERE `month`='11' AND `week`='2'";
                            $result = mysqli_query($conn, $query);
                            while ($row = mysqli_fetch_assoc($result)) {
                                $total = $row['sumOf62'];
                                if ($total != 0) {
                                    echo number_format($total, 2);
                                }
                                else {
                                    echo '' . '0.00';
                                }
                            }
                            ?>
                        </td>
                        <td style="background: #FFC107; color: black;">
                            <?php
                            $query = "SELECT SUM(trip_total) As sumOf62 FROM drivers WHERE `month`='11' AND `week`='2'";
                            $result = mysqli_query($conn, $query);
                            while ($row = mysqli_fetch_assoc($result)) {
                                $total = $row['sumOf62'];
                                if ($total != 0) {
                                    echo number_format($total, 2);
                                }
                                else {
                                    echo '' . '0.00';
                                }
                            }
                            ?>
                        </td>
                        <td style="background: #0D6EFD;">
                            <?php
                            $query = "SELECT SUM(payments) As sumOf61 FROM drivers WHERE `month`='11' AND `week`='2'";
                            $result = mysqli_query($conn, $query);
                            while ($row = mysqli_fetch_assoc($result)) {
                                $total = $row['sumOf61'];
                                if ($total != 0) {
                                    echo number_format($total, 2);
                                }
                                else {
                                    echo '' . '0.00';
                                }
                            }
                            ?>
                        </td>
                        <td style="background: red;">
                            <?php
                            $query = "SELECT SUM(discounts) As sumOf62 FROM drivers WHERE `month`='11' AND `week`='2'";
                            $result = mysqli_query($conn, $query);
                            while ($row = mysqli_fetch_assoc($result)) {
                                $total = $row['sumOf62'];
                                if ($total != 0) {
                                    echo number_format($total, 2);
                                }
                                else {
                                    echo '' . '0.00';
                                }
                            }
                            ?>
                        </td>
                        <td style="background: green;">
                            <?php
                            $query = "SELECT SUM(salary) As sumOf61 FROM drivers WHERE `month`='11' AND `week`='2'";
                            $result = mysqli_query($conn, $query);
                            while ($row = mysqli_fetch_assoc($result)) {
                                $total = $row['sumOf61'];
                                if ($total != 0) {
                                    echo number_format($total, 2);
                                }
                                else {
                                    echo '' . '0.00';
                                }
                            }
                            ?>
                        </td>
                        <td>
                            <?php
                            $query = "SELECT SUM(payload_total) As sumOf FROM drivers WHERE `month`='11' AND `week`='2'";
                            $query2 = "SELECT SUM(trip_total) As sumOfIn FROM drivers WHERE `month`='11' AND `week`='2'";
                            $query3 = "SELECT SUM(diesel) As sumOfTo FROM drivers WHERE `month`='11' AND `week`='2'";
                            $query4 = "SELECT SUM(service_value) As sumOfFor FROM drivers WHERE `month`='11' AND `week`='2'";
                            $total = 0;
                            $result = mysqli_query($conn, $query);
                            $result2 = mysqli_query($conn, $query2);
                            $result3 = mysqli_query($conn, $query3);
                            $result4 = mysqli_query($conn, $query4);

                            while ($row = mysqli_fetch_assoc($result)) {
                                while ($row2 = mysqli_fetch_assoc($result2)) {
                                    while ($row3 = mysqli_fetch_assoc($result3)) {
                                        while ($row4 = mysqli_fetch_assoc($result4)) {
                                            $total = $row['sumOf'] - ($row2['sumOfIn'] + $row3['sumOfTo'] + $row4['sumOfFor']);
                                            if ($total != 0) {
                                                echo number_format($total, 2);
                                             }
                                            else {
                                                echo '' . '0.00';
                                            }
                                        }
                                    }
                                }
                            }
                            ?>
                        </td>
                    </tr>
                    <tr>
                        <td>3</td>
                        <td>
                            <?php
                            $query = "SELECT SUM(payload_total) As sumOf63 FROM drivers WHERE `month`='11' AND `week`='3'";
                            $result = mysqli_query($conn, $query);
                            while ($row = mysqli_fetch_assoc($result)) {
                                $total = $row['sumOf63'];
                                if ($total != 0) {
                                    echo number_format($total, 2);
                                }
                                else {
                                    echo '' . '0.00';
                                }
                            }
                            ?>
                        </td>
                        <td style="background: #FFC107; color: black;">
                            <?php
                            $query = "SELECT SUM(service_value) As sumOf63 FROM drivers WHERE `month`='11' AND `week`='3'";
                            $result = mysqli_query($conn, $query);
                            while ($row = mysqli_fetch_assoc($result)) {
                                $total = $row['sumOf63'];
                                if ($total != 0) {
                                    echo number_format($total, 2);
                                }
                                else {
                                    echo '' . '0.00';
                                }
                            }
                            ?>
                        </td>
                        <td style="background: #FFC107; color: black;">
                            <?php
                            $query = "SELECT SUM(diesel) As sumOf63 FROM drivers WHERE `month`='11' AND `week`='3'";
                            $result = mysqli_query($conn, $query);
                            while ($row = mysqli_fetch_assoc($result)) {
                                $total = $row['sumOf63'];
                                if ($total != 0) {
                                    echo number_format($total, 2);
                                }
                                else {
                                    echo '' . '0.00';
                                }
                            }
                            ?>
                        </td>
                        <td style="background: #FFC107; color: black;">
                            <?php
                            $query = "SELECT SUM(trip_total) As sumOf63 FROM drivers WHERE `month`='11' AND `week`='3'";
                            $result = mysqli_query($conn, $query);
                            while ($row = mysqli_fetch_assoc($result)) {
                                $total = $row['sumOf63'];
                                if ($total != 0) {
                                    echo number_format($total, 2);
                                }
                                else {
                                    echo '' . '0.00';
                                }
                            }
                            ?>
                        </td>
                        <td style="background: #0D6EFD;">
                            <?php
                            $query = "SELECT SUM(payments) As sumOf61 FROM drivers WHERE `month`='11' AND `week`='3'";
                            $result = mysqli_query($conn, $query);
                            while ($row = mysqli_fetch_assoc($result)) {
                                $total = $row['sumOf61'];
                                if ($total != 0) {
                                    echo number_format($total, 2);
                                }
                                else {
                                    echo '' . '0.00';
                                }
                            }
                            ?>
                        </td>
                        <td style="background: red;">
                            <?php
                            $query = "SELECT SUM(discounts) As sumOf63 FROM drivers WHERE `month`='11' AND `week`='3'";
                            $result = mysqli_query($conn, $query);
                            while ($row = mysqli_fetch_assoc($result)) {
                                $total = $row['sumOf63'];
                                if ($total != 0) {
                                    echo number_format($total, 2);
                                }
                                else {
                                    echo '' . '0.00';
                                }
                            }
                            ?>
                        </td>
                        <td style="background: green;">
                            <?php
                            $query = "SELECT SUM(salary) As sumOf61 FROM drivers WHERE `month`='11' AND `week`='3'";
                            $result = mysqli_query($conn, $query);
                            while ($row = mysqli_fetch_assoc($result)) {
                                $total = $row['sumOf61'];
                                if ($total != 0) {
                                    echo number_format($total, 2);
                                }
                                else {
                                    echo '' . '0.00';
                                }
                            }
                            ?>
                        </td>
                        <td>
                            <?php
                            $query = "SELECT SUM(payload_total) As sumOf FROM drivers WHERE `month`='11' AND `week`='3'";
                            $query2 = "SELECT SUM(trip_total) As sumOfIn FROM drivers WHERE `month`='11' AND `week`='3'";
                            $query3 = "SELECT SUM(diesel) As sumOfTo FROM drivers WHERE `month`='11' AND `week`='3'";
                            $query4 = "SELECT SUM(service_value) As sumOfFor FROM drivers WHERE `month`='11' AND `week`='3'";
                            $total = 0;
                            $result = mysqli_query($conn, $query);
                            $result2 = mysqli_query($conn, $query2);
                            $result3 = mysqli_query($conn, $query3);
                            $result4 = mysqli_query($conn, $query4);

                            while ($row = mysqli_fetch_assoc($result)) {
                                while ($row2 = mysqli_fetch_assoc($result2)) {
                                    while ($row3 = mysqli_fetch_assoc($result3)) {
                                        while ($row4 = mysqli_fetch_assoc($result4)) {
                                            $total = $row['sumOf'] - ($row2['sumOfIn'] + $row3['sumOfTo'] + $row4['sumOfFor']);
                                            if ($total != 0) {
                                                echo number_format($total, 2);
                                             }
                                            else {
                                                echo '' . '0.00';
                                            }
                                        }
                                    }
                                }
                            }
                            ?>
                        </td>
                    </tr>
                    <tr>
                        <td>4</td>
                        <td>
                            <?php
                            $query = "SELECT SUM(payload_total) As sumOf64 FROM drivers WHERE `month`='11' AND `week`='4'";
                            $result = mysqli_query($conn, $query);
                            while ($row = mysqli_fetch_assoc($result)) {
                                $total = $row['sumOf64'];
                                if ($total != 0) {
                                    echo number_format($total, 2);
                                }
                                else {
                                    echo '' . '0.00';
                                }
                            }
                            ?>
                        </td>
                        <td style="background: #FFC107; color: black;">
                            <?php
                            $query = "SELECT SUM(service_value) As sumOf64 FROM drivers WHERE `month`='11' AND `week`='4'";
                            $result = mysqli_query($conn, $query);
                            while ($row = mysqli_fetch_assoc($result)) {
                                $total = $row['sumOf64'];
                                if ($total != 0) {
                                    echo number_format($total, 2);
                                }
                                else {
                                    echo '' . '0.00';
                                }
                            }
                            ?>
                        </td>
                        <td style="background: #FFC107; color: black;">
                            <?php
                            $query = "SELECT SUM(diesel) As sumOf64 FROM drivers WHERE `month`='11' AND `week`='4'";
                            $result = mysqli_query($conn, $query);
                            while ($row = mysqli_fetch_assoc($result)) {
                                $total = $row['sumOf64'];
                                if ($total != 0) {
                                    echo number_format($total, 2);
                                }
                                else {
                                    echo '' . '0.00';
                                }
                            }
                            ?>
                        </td>
                        <td style="background: #FFC107; color: black;">
                            <?php
                            $query = "SELECT SUM(trip_total) As sumOf64 FROM drivers WHERE `month`='11' AND `week`='4'";
                            $result = mysqli_query($conn, $query);
                            while ($row = mysqli_fetch_assoc($result)) {
                                $total = $row['sumOf64'];
                                if ($total != 0) {
                                    echo number_format($total, 2);
                                }
                                else {
                                    echo '' . '0.00';
                                }
                            }
                            ?>
                        </td>
                        <td style="background: #0D6EFD;">
                            <?php
                            $query = "SELECT SUM(payments) As sumOf61 FROM drivers WHERE `month`='11' AND `week`='4'";
                            $result = mysqli_query($conn, $query);
                            while ($row = mysqli_fetch_assoc($result)) {
                                $total = $row['sumOf61'];
                                if ($total != 0) {
                                    echo number_format($total, 2);
                                }
                                else {
                                    echo '' . '0.00';
                                }
                            }
                            ?>
                        </td>
                        <td style="background: red;">
                            <?php
                            $query = "SELECT SUM(discounts) As sumOf64 FROM drivers WHERE `month`='11' AND `week`='4'";
                            $result = mysqli_query($conn, $query);
                            while ($row = mysqli_fetch_assoc($result)) {
                                $total = $row['sumOf64'];
                                if ($total != 0) {
                                    echo number_format($total, 2);
                                }
                                else {
                                    echo '' . '0.00';
                                }
                            }
                            ?>
                        </td>
                        <td style="background: green;">
                            <?php
                            $query = "SELECT SUM(salary) As sumOf61 FROM drivers WHERE `month`='11' AND `week`='4'";
                            $result = mysqli_query($conn, $query);
                            while ($row = mysqli_fetch_assoc($result)) {
                                $total = $row['sumOf61'];
                                if ($total != 0) {
                                    echo number_format($total, 2);
                                }
                                else {
                                    echo '' . '0.00';
                                }
                            }
                            ?>
                        </td>
                        <td>
                            <?php
                            $query = "SELECT SUM(payload_total) As sumOf FROM drivers WHERE `month`='11' AND `week`='4'";
                            $query2 = "SELECT SUM(trip_total) As sumOfIn FROM drivers WHERE `month`='11' AND `week`='4'";
                            $query3 = "SELECT SUM(diesel) As sumOfTo FROM drivers WHERE `month`='11' AND `week`='4'";
                            $query4 = "SELECT SUM(service_value) As sumOfFor FROM drivers WHERE `month`='11' AND `week`='4'";
                            $total = 0;
                            $result = mysqli_query($conn, $query);
                            $result2 = mysqli_query($conn, $query2);
                            $result3 = mysqli_query($conn, $query3);
                            $result4 = mysqli_query($conn, $query4);

                            while ($row = mysqli_fetch_assoc($result)) {
                                while ($row2 = mysqli_fetch_assoc($result2)) {
                                    while ($row3 = mysqli_fetch_assoc($result3)) {
                                        while ($row4 = mysqli_fetch_assoc($result4)) {
                                            $total = $row['sumOf'] - ($row2['sumOfIn'] + $row3['sumOfTo'] + $row4['sumOfFor']);
                                            if ($total != 0) {
                                                echo number_format($total, 2);
                                             }
                                            else {
                                                echo '' . '0.00';
                                            }
                                        }
                                    }
                                }
                            }
                            ?>
                        </td>
                    </tr>
                </table>
                <!-- Modal -->
                    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="exampleModalLabel">التفاصيل</h1>
                                </div>
                                <div class="modal-body">
                                    <a>D</a>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">إغلاق</button>
                                    <button type="button" class="btn btn-primary">حفظ التغيرات</button>
                                </div>
                            </div>
                        </div>
                    </div>
                <p style="font-size: 24px;">
                    الصندوق = 
                    
                    (
                    
                    <a style="color: #FFC107; font-size: 22px;">إجمالي المصروفات</a>
                    
                    - 
                    
                    <!--<a style="color: #0D6EFD; font-size: 22px;">إجمالي الدفعات</a>-->
                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                        إجمالي الدفعات
                    </button>
                    

                    ) =
                    
                    <?php
                            $total = 0;
                            
                            $query1 = "SELECT SUM(payments) As sumOfBox1 FROM drivers WHERE `month`='11' AND `week`='1'";
                            $query2 = "SELECT SUM(trip_total) As sumOfInBox1 FROM drivers WHERE `month`='11' AND `week`='1'";
                            $query3 = "SELECT SUM(diesel) As sumOfToBox1 FROM drivers WHERE `month`='11' AND `week`='1'";
                            $query4 = "SELECT SUM(service_value) As sumOfForBox1 FROM drivers WHERE `month`='11' AND `week`='1'";
                            
                            $result1 = mysqli_query($conn, $query1);
                            $result2 = mysqli_query($conn, $query2);
                            $result3 = mysqli_query($conn, $query3);
                            $result4 = mysqli_query($conn, $query4);
                            
                            $query5 = "SELECT SUM(payments) As sumOfBox2 FROM drivers WHERE `month`='11' AND `week`='2'";
                            $query6 = "SELECT SUM(trip_total) As sumOfInBox2 FROM drivers WHERE `month`='11' AND `week`='2'";
                            $query7 = "SELECT SUM(diesel) As sumOfToBox2 FROM drivers WHERE `month`='11' AND `week`='2'";
                            $query8 = "SELECT SUM(service_value) As sumOfForBox2 FROM drivers WHERE `month`='11' AND `week`='2'";
                            
                            $query9 = "SELECT SUM(payments) As sumOfBox3 FROM drivers WHERE `month`='11' AND `week`='3'";
                            $query10 = "SELECT SUM(trip_total) As sumOfInBox3 FROM drivers WHERE `month`='11' AND `week`='3'";
                            $query11 = "SELECT SUM(diesel) As sumOfToBox3 FROM drivers WHERE `month`='11' AND `week`='3'";
                            $query12 = "SELECT SUM(service_value) As sumOfForBox3 FROM drivers WHERE `month`='11' AND `week`='3'";
                            
                            $query13 = "SELECT SUM(payments) As sumOfBox4 FROM drivers WHERE `month`='11' AND `week`='4'";
                            $query14 = "SELECT SUM(trip_total) As sumOfInBox4 FROM drivers WHERE `month`='11' AND `week`='4'";
                            $query15 = "SELECT SUM(diesel) As sumOfToBox4 FROM drivers WHERE `month`='11' AND `week`='4'";
                            $query16 = "SELECT SUM(service_value) As sumOfForBox4 FROM drivers WHERE `month`='11' AND `week`='4'";
                            
                            $result5 = mysqli_query($conn, $query5);
                            $result6 = mysqli_query($conn, $query6);
                            $result7 = mysqli_query($conn, $query7);
                            $result8 = mysqli_query($conn, $query8);
                            
                            $result9 = mysqli_query($conn, $query9);
                            $result10 = mysqli_query($conn, $query10);
                            $result11 = mysqli_query($conn, $query11);
                            $result12 = mysqli_query($conn, $query12);
                            
                            $result13 = mysqli_query($conn, $query13);
                            $result14 = mysqli_query($conn, $query14);
                            $result15 = mysqli_query($conn, $query15);
                            $result16 = mysqli_query($conn, $query16);
                            
                            while ($row1 = mysqli_fetch_assoc($result1)) {
                                while ($row2 = mysqli_fetch_assoc($result2)) {
                                    while ($row3 = mysqli_fetch_assoc($result3)) {
                                        while ($row4 = mysqli_fetch_assoc($result4)) {
                                            
                                            while ($row5 = mysqli_fetch_assoc($result5)) {
                                                while ($row6 = mysqli_fetch_assoc($result6)) {
                                                    while ($row7 = mysqli_fetch_assoc($result7)) {
                                                        while ($row8 = mysqli_fetch_assoc($result8)) {
                                                            
                                                            while ($row9 = mysqli_fetch_assoc($result9)) {
                                                                while ($row10 = mysqli_fetch_assoc($result10)) {
                                                                    while ($row11 = mysqli_fetch_assoc($result11)) {
                                                                        while ($row12 = mysqli_fetch_assoc($result12)) {
                                                                            
                                                                            while ($row13 = mysqli_fetch_assoc($result13)) {
                                                                                while ($row14 = mysqli_fetch_assoc($result14)) {
                                                                                    while ($row15 = mysqli_fetch_assoc($result15)) {
                                                                                        while ($row16 = mysqli_fetch_assoc($result16)) {
                                            
$total = ($row1['sumOfBox1'] - ($row2['sumOfInBox1'] + $row3['sumOfToBox1'] + $row4['sumOfForBox1']))
+ ($row5['sumOfBox2'] - ($row6['sumOfInBox2'] +  $row7['sumOfToBox2'] + $row8['sumOfForBox2']))
+ ($row9['sumOfBox3'] - ($row10['sumOfInBox3'] + $row11['sumOfToBox3'] + $row12['sumOfForBox3']))
+ ($row13['sumOfBox4'] - ($row14['sumOfInBox4'] + $row15['sumOfToBox4'] + $row16['sumOfForBox4']));
    $total_payment = $row1['sumOfBox1'] + $row5['sumOfBox2'] + $row9['sumOfBox3'] + $row13['sumOfBox4'];
    $total_s = ($row2['sumOfInBox1'] + $row3['sumOfToBox1'] + $row4['sumOfForBox1']) + 
    ($row6['sumOfInBox2'] +  $row7['sumOfToBox2'] + $row8['sumOfForBox2']) +
    ($row10['sumOfInBox3'] + $row11['sumOfToBox3'] + $row12['sumOfForBox3']) +
    ($row14['sumOfInBox4'] + $row15['sumOfToBox4'] + $row16['sumOfForBox4']);
                                                                                    if ($total != 0) {
    echo '<a style="color: #FFC107; font-size: 22px;">' . number_format($total_s, 2) . '</a>' . ' - ' . '<a style="color: blue; font-size: 22px;">' . number_format($total_payment, 2) . '</a>' . ' = ' . number_format($total, 2); 
                                                                                     }
                                                                                    else {
                                                                                        echo '' . '0.00';
                                                                                    }
                                                                            
                                                                                        
                                                                                    }
                                                                                }
                                                                            }
                                                                        }
                                                            
                                                                       
                                                                    }
                                                                }
                                                            }
                                                        }
                                                            
                                                        
                                                    }
                                                }
                                            }
                                        }
                                            
                                       
                                    }
                                }
                            }
                        }
                        ?>
                </p>
            </div>
            <div class="content active">
                <driv class="row ">
                    <div class="col"><h2>شهر 12</h2></div>
                </driv>
                <table class="table table-dark table-hover">
                    <tr>
                        <th>الأسبوع#</th>
                        <th>الحمولة</th>
                        <th style="background: #FFC107; color: black;">قيمة الخدمة</th>
                        <th style="background: #FFC107; color: black;">ديزل</th>
                        <th style="background: #FFC107; color: black;">التربات</th>
                        <th style="background: #0D6EFD;">الدفعات</th>
                        <th style="background: red;">الخصومات</th>
                        <th style="background: green;">الراتب</th>
                        <th>الدخل الأسبوعي</th>
                    </tr>
                    <tr>
                        <td>1</td>
                        <td>
                            <?php
                            $query = "SELECT SUM(payload_total) As sumOf61 FROM drivers WHERE `month`='12' AND `week`='1'";
                            $result = mysqli_query($conn, $query);
                            while ($row = mysqli_fetch_assoc($result)) {
                                $total = $row['sumOf61'];
                                if ($total != 0) {
                                    echo number_format($total, 2);
                                }
                                else {
                                    echo '' . '0.00';
                                }
                            }
                            ?>
                        </td>
                        <td style="background: #FFC107; color: black;">
                            <?php
                            $query = "SELECT SUM(service_value) As sumOf61 FROM drivers WHERE `month`='12' AND `week`='1'";
                            $result = mysqli_query($conn, $query);
                            while ($row = mysqli_fetch_assoc($result)) {
                                $total = $row['sumOf61'];
                                if ($total != 0) {
                                    echo number_format($total, 2);
                                }
                                else {
                                    echo '' . '0.00';
                                }
                            }
                            ?>
                        </td>
                        <td style="background: #FFC107; color: black;">
                            <?php
                            $query = "SELECT SUM(diesel) As sumOf61 FROM drivers WHERE `month`='12' AND `week`='1'";
                            $result = mysqli_query($conn, $query);
                            while ($row = mysqli_fetch_assoc($result)) {
                                $total = $row['sumOf61'];
                                if ($total != 0) {
                                    echo number_format($total, 2);
                                }
                                else {
                                    echo '' . '0.00';
                                }
                            }
                            ?>
                        </td>
                        <td style="background: #FFC107; color: black;">
                            <?php
                            $query = "SELECT SUM(trip_total) As sumOf61 FROM drivers WHERE `month`='12' AND `week`='1'";
                            $result = mysqli_query($conn, $query);
                            while ($row = mysqli_fetch_assoc($result)) {
                                $total = $row['sumOf61'];
                                if ($total != 0) {
                                    echo number_format($total, 2);
                                }
                                else {
                                    echo '' . '0.00';
                                }
                            }
                            ?>
                        </td>
                        <td style="background: #0D6EFD;">
                            <?php
                            $query = "SELECT SUM(payments) As sumOf61 FROM drivers WHERE `month`='12' AND `week`='1'";
                            $result = mysqli_query($conn, $query);
                            while ($row = mysqli_fetch_assoc($result)) {
                                $total = $row['sumOf61'];
                                if ($total != 0) {
                                    echo number_format($total, 2);
                                }
                                else {
                                    echo '' . '0.00';
                                }
                            }
                            ?>
                        </td>
                        <td style="background: red;">
                            <?php
                            $query = "SELECT SUM(discounts) As sumOf61 FROM drivers WHERE `month`='12' AND `week`='1'";
                            $result = mysqli_query($conn, $query);
                            while ($row = mysqli_fetch_assoc($result)) {
                                $total = $row['sumOf61'];
                                if ($total != 0) {
                                    echo number_format($total, 2);
                                }
                                else {
                                    echo '' . '0.00';
                                }
                            }
                            ?>
                        </td>
                        <td style="background: green;">
                            <?php
                            $query = "SELECT SUM(salary) As sumOf61 FROM drivers WHERE `month`='12' AND `week`='1'";
                            $result = mysqli_query($conn, $query);
                            while ($row = mysqli_fetch_assoc($result)) {
                                $total = $row['sumOf61'];
                                if ($total != 0) {
                                    echo number_format($total, 2);
                                }
                                else {
                                    echo '' . '0.00';
                                }
                            }
                            ?>
                        </td>
                        <td>
                            <?php
                            $query = "SELECT SUM(payload_total) As sumOf FROM drivers WHERE `month`='12' AND `week`='1'";
                            $query2 = "SELECT SUM(trip_total) As sumOfIn FROM drivers WHERE `month`='12' AND `week`='1'";
                            $query3 = "SELECT SUM(diesel) As sumOfTo FROM drivers WHERE `month`='12' AND `week`='1'";
                            $query4 = "SELECT SUM(service_value) As sumOfFor FROM drivers WHERE `month`='12' AND `week`='1'";
                            $total = 0;
                            $result = mysqli_query($conn, $query);
                            $result2 = mysqli_query($conn, $query2);
                            $result3 = mysqli_query($conn, $query3);
                            $result4 = mysqli_query($conn, $query4);

                            while ($row = mysqli_fetch_assoc($result)) {
                                while ($row2 = mysqli_fetch_assoc($result2)) {
                                    while ($row3 = mysqli_fetch_assoc($result3)) {
                                        while ($row4 = mysqli_fetch_assoc($result4)) {
                                            $total = $row['sumOf'] - ($row2['sumOfIn'] + $row3['sumOfTo'] + $row4['sumOfFor']);
                                            if ($total != 0) {
                                                echo number_format($total, 2);
                                             }
                                            else {
                                                echo '' . '0.00';
                                            }
                                        }
                                    }
                                }
                            }
                            ?>
                        </td>
                    </tr>
                    <tr>
                        <td>2</td>
                        <td>
                            <?php
                            $query = "SELECT SUM(payload_total) As sumOf62 FROM drivers WHERE `month`='12' AND `week`='2'";
                            $result = mysqli_query($conn, $query);
                            while ($row = mysqli_fetch_assoc($result)) {
                                $total = $row['sumOf62'];
                                if ($total != 0) {
                                    echo number_format($total, 2);
                                }
                                else {
                                    echo '' . '0.00';
                                }
                            }
                            ?>
                        </td>
                        <td style="background: #FFC107; color: black;">
                            <?php
                            $query = "SELECT SUM(service_value) As sumOf62 FROM drivers WHERE `month`='12' AND `week`='2'";
                            $result = mysqli_query($conn, $query);
                            while ($row = mysqli_fetch_assoc($result)) {
                                $total = $row['sumOf62'];
                                if ($total != 0) {
                                    echo number_format($total, 2);
                                }
                                else {
                                    echo '' . '0.00';
                                }
                            }
                            ?>
                        </td>
                        <td style="background: #FFC107; color: black;">
                            <?php
                            $query = "SELECT SUM(diesel) As sumOf62 FROM drivers WHERE `month`='12' AND `week`='2'";
                            $result = mysqli_query($conn, $query);
                            while ($row = mysqli_fetch_assoc($result)) {
                                $total = $row['sumOf62'];
                                if ($total != 0) {
                                    echo number_format($total, 2);
                                }
                                else {
                                    echo '' . '0.00';
                                }
                            }
                            ?>
                        </td>
                        <td style="background: #FFC107; color: black;">
                            <?php
                            $query = "SELECT SUM(trip_total) As sumOf62 FROM drivers WHERE `month`='12' AND `week`='2'";
                            $result = mysqli_query($conn, $query);
                            while ($row = mysqli_fetch_assoc($result)) {
                                $total = $row['sumOf62'];
                                if ($total != 0) {
                                    echo number_format($total, 2);
                                }
                                else {
                                    echo '' . '0.00';
                                }
                            }
                            ?>
                        </td>
                        <td style="background: #0D6EFD;">
                            <?php
                            $query = "SELECT SUM(payments) As sumOf61 FROM drivers WHERE `month`='12' AND `week`='2'";
                            $result = mysqli_query($conn, $query);
                            while ($row = mysqli_fetch_assoc($result)) {
                                $total = $row['sumOf61'];
                                if ($total != 0) {
                                    echo number_format($total, 2);
                                }
                                else {
                                    echo '' . '0.00';
                                }
                            }
                            ?>
                        </td>
                        <td style="background: red;">
                            <?php
                            $query = "SELECT SUM(discounts) As sumOf62 FROM drivers WHERE `month`='12' AND `week`='2'";
                            $result = mysqli_query($conn, $query);
                            while ($row = mysqli_fetch_assoc($result)) {
                                $total = $row['sumOf62'];
                                if ($total != 0) {
                                    echo number_format($total, 2);
                                }
                                else {
                                    echo '' . '0.00';
                                }
                            }
                            ?>
                        </td>
                        <td style="background: green;">
                            <?php
                            $query = "SELECT SUM(salary) As sumOf61 FROM drivers WHERE `month`='12' AND `week`='2'";
                            $result = mysqli_query($conn, $query);
                            while ($row = mysqli_fetch_assoc($result)) {
                                $total = $row['sumOf61'];
                                if ($total != 0) {
                                    echo number_format($total, 2);
                                }
                                else {
                                    echo '' . '0.00';
                                }
                            }
                            ?>
                        </td>
                        <td>
                            <?php
                            $query = "SELECT SUM(payload_total) As sumOf FROM drivers WHERE `month`='12' AND `week`='2'";
                            $query2 = "SELECT SUM(trip_total) As sumOfIn FROM drivers WHERE `month`='12' AND `week`='2'";
                            $query3 = "SELECT SUM(diesel) As sumOfTo FROM drivers WHERE `month`='12' AND `week`='2'";
                            $query4 = "SELECT SUM(service_value) As sumOfFor FROM drivers WHERE `month`='12' AND `week`='2'";
                            $total = 0;
                            $result = mysqli_query($conn, $query);
                            $result2 = mysqli_query($conn, $query2);
                            $result3 = mysqli_query($conn, $query3);
                            $result4 = mysqli_query($conn, $query4);

                            while ($row = mysqli_fetch_assoc($result)) {
                                while ($row2 = mysqli_fetch_assoc($result2)) {
                                    while ($row3 = mysqli_fetch_assoc($result3)) {
                                        while ($row4 = mysqli_fetch_assoc($result4)) {
                                            $total = $row['sumOf'] - ($row2['sumOfIn'] + $row3['sumOfTo'] + $row4['sumOfFor']);
                                            if ($total != 0) {
                                                echo number_format($total, 2);
                                             }
                                            else {
                                                echo '' . '0.00';
                                            }
                                        }
                                    }
                                }
                            }
                            ?>
                        </td>
                    </tr>
                    <tr>
                        <td>3</td>
                        <td>
                            <?php
                            $query = "SELECT SUM(payload_total) As sumOf63 FROM drivers WHERE `month`='12' AND `week`='3'";
                            $result = mysqli_query($conn, $query);
                            while ($row = mysqli_fetch_assoc($result)) {
                                $total = $row['sumOf63'];
                                if ($total != 0) {
                                    echo number_format($total, 2);
                                }
                                else {
                                    echo '' . '0.00';
                                }
                            }
                            ?>
                        </td>
                        <td style="background: #FFC107; color: black;">
                            <?php
                            $query = "SELECT SUM(service_value) As sumOf63 FROM drivers WHERE `month`='12' AND `week`='3'";
                            $result = mysqli_query($conn, $query);
                            while ($row = mysqli_fetch_assoc($result)) {
                                $total = $row['sumOf63'];
                                if ($total != 0) {
                                    echo number_format($total, 2);
                                }
                                else {
                                    echo '' . '0.00';
                                }
                            }
                            ?>
                        </td>
                        <td style="background: #FFC107; color: black;">
                            <?php
                            $query = "SELECT SUM(diesel) As sumOf63 FROM drivers WHERE `month`='12' AND `week`='3'";
                            $result = mysqli_query($conn, $query);
                            while ($row = mysqli_fetch_assoc($result)) {
                                $total = $row['sumOf63'];
                                if ($total != 0) {
                                    echo number_format($total, 2);
                                }
                                else {
                                    echo '' . '0.00';
                                }
                            }
                            ?>
                        </td>
                        <td style="background: #FFC107; color: black;">
                            <?php
                            $query = "SELECT SUM(trip_total) As sumOf63 FROM drivers WHERE `month`='12' AND `week`='3'";
                            $result = mysqli_query($conn, $query);
                            while ($row = mysqli_fetch_assoc($result)) {
                                $total = $row['sumOf63'];
                                if ($total != 0) {
                                    echo number_format($total, 2);
                                }
                                else {
                                    echo '' . '0.00';
                                }
                            }
                            ?>
                        </td>
                        <td style="background: #0D6EFD;">
                            <?php
                            $query = "SELECT SUM(payments) As sumOf61 FROM drivers WHERE `month`='12' AND `week`='3'";
                            $result = mysqli_query($conn, $query);
                            while ($row = mysqli_fetch_assoc($result)) {
                                $total = $row['sumOf61'];
                                if ($total != 0) {
                                    echo number_format($total, 2);
                                }
                                else {
                                    echo '' . '0.00';
                                }
                            }
                            ?>
                        </td>
                        <td style="background: red;">
                            <?php
                            $query = "SELECT SUM(discounts) As sumOf63 FROM drivers WHERE `month`='12' AND `week`='3'";
                            $result = mysqli_query($conn, $query);
                            while ($row = mysqli_fetch_assoc($result)) {
                                $total = $row['sumOf63'];
                                if ($total != 0) {
                                    echo number_format($total, 2);
                                }
                                else {
                                    echo '' . '0.00';
                                }
                            }
                            ?>
                        </td>
                        <td style="background: green;">
                            <?php
                            $query = "SELECT SUM(salary) As sumOf61 FROM drivers WHERE `month`='12' AND `week`='3'";
                            $result = mysqli_query($conn, $query);
                            while ($row = mysqli_fetch_assoc($result)) {
                                $total = $row['sumOf61'];
                                if ($total != 0) {
                                    echo number_format($total, 2);
                                }
                                else {
                                    echo '' . '0.00';
                                }
                            }
                            ?>
                        </td>
                        <td>
                            <?php
                            $query = "SELECT SUM(payload_total) As sumOf FROM drivers WHERE `month`='12' AND `week`='3'";
                            $query2 = "SELECT SUM(trip_total) As sumOfIn FROM drivers WHERE `month`='12' AND `week`='3'";
                            $query3 = "SELECT SUM(diesel) As sumOfTo FROM drivers WHERE `month`='12' AND `week`='3'";
                            $query4 = "SELECT SUM(service_value) As sumOfFor FROM drivers WHERE `month`='12' AND `week`='3'";
                            $total = 0;
                            $result = mysqli_query($conn, $query);
                            $result2 = mysqli_query($conn, $query2);
                            $result3 = mysqli_query($conn, $query3);
                            $result4 = mysqli_query($conn, $query4);

                            while ($row = mysqli_fetch_assoc($result)) {
                                while ($row2 = mysqli_fetch_assoc($result2)) {
                                    while ($row3 = mysqli_fetch_assoc($result3)) {
                                        while ($row4 = mysqli_fetch_assoc($result4)) {
                                            $total = $row['sumOf'] - ($row2['sumOfIn'] + $row3['sumOfTo'] + $row4['sumOfFor']);
                                            if ($total != 0) {
                                                echo number_format($total, 2);
                                             }
                                            else {
                                                echo '' . '0.00';
                                            }
                                        }
                                    }
                                }
                            }
                            ?>
                        </td>
                    </tr>
                    <tr>
                        <td>4</td>
                        <td>
                            <?php
                            $query = "SELECT SUM(payload_total) As sumOf64 FROM drivers WHERE `month`='12' AND `week`='4'";
                            $result = mysqli_query($conn, $query);
                            while ($row = mysqli_fetch_assoc($result)) {
                                $total = $row['sumOf64'];
                                if ($total != 0) {
                                    echo number_format($total, 2);
                                }
                                else {
                                    echo '' . '0.00';
                                }
                            }
                            ?>
                        </td>
                        <td style="background: #FFC107; color: black;">
                            <?php
                            $query = "SELECT SUM(service_value) As sumOf64 FROM drivers WHERE `month`='12' AND `week`='4'";
                            $result = mysqli_query($conn, $query);
                            while ($row = mysqli_fetch_assoc($result)) {
                                $total = $row['sumOf64'];
                                if ($total != 0) {
                                    echo number_format($total, 2);
                                }
                                else {
                                    echo '' . '0.00';
                                }
                            }
                            ?>
                        </td>
                        <td style="background: #FFC107; color: black;">
                            <?php
                            $query = "SELECT SUM(diesel) As sumOf64 FROM drivers WHERE `month`='12' AND `week`='4'";
                            $result = mysqli_query($conn, $query);
                            while ($row = mysqli_fetch_assoc($result)) {
                                $total = $row['sumOf64'];
                                if ($total != 0) {
                                    echo number_format($total, 2);
                                }
                                else {
                                    echo '' . '0.00';
                                }
                            }
                            ?>
                        </td>
                        <td style="background: #FFC107; color: black;">
                            <?php
                            $query = "SELECT SUM(trip_total) As sumOf64 FROM drivers WHERE `month`='12' AND `week`='4'";
                            $result = mysqli_query($conn, $query);
                            while ($row = mysqli_fetch_assoc($result)) {
                                $total = $row['sumOf64'];
                                if ($total != 0) {
                                    echo number_format($total, 2);
                                }
                                else {
                                    echo '' . '0.00';
                                }
                            }
                            ?>
                        </td>
                        <td style="background: #0D6EFD;">
                            <?php
                            $query = "SELECT SUM(payments) As sumOf61 FROM drivers WHERE `month`='12' AND `week`='4'";
                            $result = mysqli_query($conn, $query);
                            while ($row = mysqli_fetch_assoc($result)) {
                                $total = $row['sumOf61'];
                                if ($total != 0) {
                                    echo number_format($total, 2);
                                }
                                else {
                                    echo '' . '0.00';
                                }
                            }
                            ?>
                        </td>
                        <td style="background: red;">
                            <?php
                            $query = "SELECT SUM(discounts) As sumOf64 FROM drivers WHERE `month`='12' AND `week`='4'";
                            $result = mysqli_query($conn, $query);
                            while ($row = mysqli_fetch_assoc($result)) {
                                $total = $row['sumOf64'];
                                if ($total != 0) {
                                    echo number_format($total, 2);
                                }
                                else {
                                    echo '' . '0.00';
                                }
                            }
                            ?>
                        </td>
                        <td style="background: green;">
                            <?php
                            $query = "SELECT SUM(salary) As sumOf61 FROM drivers WHERE `month`='12' AND `week`='4'";
                            $result = mysqli_query($conn, $query);
                            while ($row = mysqli_fetch_assoc($result)) {
                                $total = $row['sumOf61'];
                                if ($total != 0) {
                                    echo number_format($total, 2);
                                }
                                else {
                                    echo '' . '0.00';
                                }
                            }
                            ?>
                        </td>
                        <td>
                            <?php
                            $query = "SELECT SUM(payload_total) As sumOf FROM drivers WHERE `month`='12' AND `week`='4'";
                            $query2 = "SELECT SUM(trip_total) As sumOfIn FROM drivers WHERE `month`='12' AND `week`='4'";
                            $query3 = "SELECT SUM(diesel) As sumOfTo FROM drivers WHERE `month`='12' AND `week`='4'";
                            $query4 = "SELECT SUM(service_value) As sumOfFor FROM drivers WHERE `month`='12' AND `week`='4'";
                            $total = 0;
                            $result = mysqli_query($conn, $query);
                            $result2 = mysqli_query($conn, $query2);
                            $result3 = mysqli_query($conn, $query3);
                            $result4 = mysqli_query($conn, $query4);

                            while ($row = mysqli_fetch_assoc($result)) {
                                while ($row2 = mysqli_fetch_assoc($result2)) {
                                    while ($row3 = mysqli_fetch_assoc($result3)) {
                                        while ($row4 = mysqli_fetch_assoc($result4)) {
                                            $total = $row['sumOf'] - ($row2['sumOfIn'] + $row3['sumOfTo'] + $row4['sumOfFor']);
                                            if ($total != 0) {
                                                echo number_format($total, 2);
                                             }
                                            else {
                                                echo '' . '0.00';
                                            }
                                        }
                                    }
                                }
                            }
                            ?>
                        </td>
                    </tr>
                </table>
                <!-- Modal -->
                    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="exampleModalLabel">التفاصيل</h1>
                                </div>
                                <div class="modal-body">
                                    <a>D</a>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">إغلاق</button>
                                    <button type="button" class="btn btn-primary">حفظ التغيرات</button>
                                </div>
                            </div>
                        </div>
                    </div>
                <p style="font-size: 24px;">
                    الصندوق = 
                    
                    (
                    
                    <a style="color: #FFC107; font-size: 22px;">إجمالي المصروفات</a>
                    
                    - 
                    
                    <!--<a style="color: #0D6EFD; font-size: 22px;">إجمالي الدفعات</a>-->
                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                        إجمالي الدفعات
                    </button>
                    

                    ) =
                    
                    <?php
                            $total = 0;
                            
                            $query1 = "SELECT SUM(payments) As sumOfBox1 FROM drivers WHERE `month`='7' AND `week`='1'";
                            $query2 = "SELECT SUM(trip_total) As sumOfInBox1 FROM drivers WHERE `month`='7' AND `week`='1'";
                            $query3 = "SELECT SUM(diesel) As sumOfToBox1 FROM drivers WHERE `month`='7' AND `week`='1'";
                            $query4 = "SELECT SUM(service_value) As sumOfForBox1 FROM drivers WHERE `month`='7' AND `week`='1'";
                            
                            $result1 = mysqli_query($conn, $query1);
                            $result2 = mysqli_query($conn, $query2);
                            $result3 = mysqli_query($conn, $query3);
                            $result4 = mysqli_query($conn, $query4);
                            
                            $query5 = "SELECT SUM(payments) As sumOfBox2 FROM drivers WHERE `month`='7' AND `week`='2'";
                            $query6 = "SELECT SUM(trip_total) As sumOfInBox2 FROM drivers WHERE `month`='7' AND `week`='2'";
                            $query7 = "SELECT SUM(diesel) As sumOfToBox2 FROM drivers WHERE `month`='7' AND `week`='2'";
                            $query8 = "SELECT SUM(service_value) As sumOfForBox2 FROM drivers WHERE `month`='7' AND `week`='2'";
                            
                            $query9 = "SELECT SUM(payments) As sumOfBox3 FROM drivers WHERE `month`='7' AND `week`='3'";
                            $query10 = "SELECT SUM(trip_total) As sumOfInBox3 FROM drivers WHERE `month`='7' AND `week`='3'";
                            $query11 = "SELECT SUM(diesel) As sumOfToBox3 FROM drivers WHERE `month`='7' AND `week`='3'";
                            $query12 = "SELECT SUM(service_value) As sumOfForBox3 FROM drivers WHERE `month`='7' AND `week`='3'";
                            
                            $query13 = "SELECT SUM(payments) As sumOfBox4 FROM drivers WHERE `month`='7' AND `week`='4'";
                            $query14 = "SELECT SUM(trip_total) As sumOfInBox4 FROM drivers WHERE `month`='7' AND `week`='4'";
                            $query15 = "SELECT SUM(diesel) As sumOfToBox4 FROM drivers WHERE `month`='7' AND `week`='4'";
                            $query16 = "SELECT SUM(service_value) As sumOfForBox4 FROM drivers WHERE `month`='7' AND `week`='4'";
                            
                            $result5 = mysqli_query($conn, $query5);
                            $result6 = mysqli_query($conn, $query6);
                            $result7 = mysqli_query($conn, $query7);
                            $result8 = mysqli_query($conn, $query8);
                            
                            $result9 = mysqli_query($conn, $query9);
                            $result10 = mysqli_query($conn, $query10);
                            $result11 = mysqli_query($conn, $query11);
                            $result12 = mysqli_query($conn, $query12);
                            
                            $result13 = mysqli_query($conn, $query13);
                            $result14 = mysqli_query($conn, $query14);
                            $result15 = mysqli_query($conn, $query15);
                            $result16 = mysqli_query($conn, $query16);
                            
                            while ($row1 = mysqli_fetch_assoc($result1)) {
                                while ($row2 = mysqli_fetch_assoc($result2)) {
                                    while ($row3 = mysqli_fetch_assoc($result3)) {
                                        while ($row4 = mysqli_fetch_assoc($result4)) {
                                            
                                            while ($row5 = mysqli_fetch_assoc($result5)) {
                                                while ($row6 = mysqli_fetch_assoc($result6)) {
                                                    while ($row7 = mysqli_fetch_assoc($result7)) {
                                                        while ($row8 = mysqli_fetch_assoc($result8)) {
                                                            
                                                            while ($row9 = mysqli_fetch_assoc($result9)) {
                                                                while ($row10 = mysqli_fetch_assoc($result10)) {
                                                                    while ($row11 = mysqli_fetch_assoc($result11)) {
                                                                        while ($row12 = mysqli_fetch_assoc($result12)) {
                                                                            
                                                                            while ($row13 = mysqli_fetch_assoc($result13)) {
                                                                                while ($row14 = mysqli_fetch_assoc($result14)) {
                                                                                    while ($row15 = mysqli_fetch_assoc($result15)) {
                                                                                        while ($row16 = mysqli_fetch_assoc($result16)) {
                                            
$total = ($row1['sumOfBox1'] - ($row2['sumOfInBox1'] + $row3['sumOfToBox1'] + $row4['sumOfForBox1']))
+ ($row5['sumOfBox2'] - ($row6['sumOfInBox2'] +  $row7['sumOfToBox2'] + $row8['sumOfForBox2']))
+ ($row9['sumOfBox3'] - ($row10['sumOfInBox3'] + $row11['sumOfToBox3'] + $row12['sumOfForBox3']))
+ ($row13['sumOfBox4'] - ($row14['sumOfInBox4'] + $row15['sumOfToBox4'] + $row16['sumOfForBox4']));
    $total_payment = $row1['sumOfBox1'] + $row5['sumOfBox2'] + $row9['sumOfBox3'] + $row13['sumOfBox4'];
    $total_s = ($row2['sumOfInBox1'] + $row3['sumOfToBox1'] + $row4['sumOfForBox1']) + 
    ($row6['sumOfInBox2'] +  $row7['sumOfToBox2'] + $row8['sumOfForBox2']) +
    ($row10['sumOfInBox3'] + $row11['sumOfToBox3'] + $row12['sumOfForBox3']) +
    ($row14['sumOfInBox4'] + $row15['sumOfToBox4'] + $row16['sumOfForBox4']);
                                                                                    if ($total != 0) {
    echo '<a style="color: #FFC107; font-size: 22px;">' . number_format($total_s, 2) . '</a>' . ' - ' . '<a style="color: blue; font-size: 22px;">' . number_format($total_payment, 2) . '</a>' . ' = ' . number_format($total, 2); 
                                                                                     }
                                                                                    else {
                                                                                        echo '' . '0.00';
                                                                                    }
                                                                            
                                                                                        
                                                                                    }
                                                                                }
                                                                            }
                                                                        }
                                                            
                                                                       
                                                                    }
                                                                }
                                                            }
                                                        }
                                                            
                                                        
                                                    }
                                                }
                                            }
                                        }
                                            
                                       
                                    }
                                }
                            }
                        }
                        ?>
                </p>
            </div>
        </div>
        <a href="layouts/charts/charts.php">
            رؤية الدخل على مدار السنة
        </a>
    </div>
    
    <script>
        const tabs = document.querySelectorAll('.tab-button');
        const all_content = document.querySelectorAll('.content');
        tabs.forEach((tab, index) => {
            tab.addEventListener('click', (e) => {
                tabs.forEach(tab => {tab.classList.remove('active')});
                tab.classList.add('active');
                var line = document.querySelector('.line');
                line.style.width = e.target.offsetWidth + "px";
                line.style.left = e.target.offsetLeft + "px";
                // line.style.right = e.target.offsetRight + "px";
                all_content.forEach(content => {content.classList.remove('active')});
                all_content[index].classList.add('active');
            });
        });
        
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>

</body>
</html>

<?php 
/*}else{
     header("Location: index.php");
     exit();
}*/
 ?>