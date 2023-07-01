<?php 
// session_start();
// if (isset($_SESSION['id']) && isset($_SESSION['user_name'])) {
// require_once('db_conn.php');
include "../../database/db_conn.php";
require_once('../../database/functions.php');

?>
<?php include "../../functions/remove_branding.php"; ?>
<!DOCTYPE html>
<html>
<head>
	<!--<link rel="stylesheet" type="text/css" href="style.css">-->
    <!--<link rel="stylesheet" type="text/css" href="assets/css/style-drivers.css">-->
    <link rel="stylesheet" type="text/css" href="../../assets/css/style-workss.css">
    <!-- bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <!-- font awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="icon" type="image/x-icon" href="assets/icons/bar_chart_diagram_line_report_icon.ico">
	<title><?php
	    $id = $_GET['car_owner'];
	    echo $id;
	?></title>
</head>
<body>
    <div class="tab-container">
        <div class="title">
            <!-- Tooltip -->
            <a href="#" onclick="history.back()" class="hint-link" style="text-decoration: none;" placeholder="dddddd">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-clipboard-data" viewBox="0 0 16 16">
                  <path d="M4 11a1 1 0 1 1 2 0v1a1 1 0 1 1-2 0v-1zm6-4a1 1 0 1 1 2 0v5a1 1 0 1 1-2 0V7zM7 9a1 1 0 0 1 2 0v3a1 1 0 1 1-2 0V9z"/>
                  <path d="M4 1.5H3a2 2 0 0 0-2 2V14a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V3.5a2 2 0 0 0-2-2h-1v1h1a1 1 0 0 1 1 1V14a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1V3.5a1 1 0 0 1 1-1h1v-1z"/>
                  <path d="M9.5 1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-3a.5.5 0 0 1-.5-.5v-1a.5.5 0 0 1 .5-.5h3zm-3-1A1.5 1.5 0 0 0 5 1.5v1A1.5 1.5 0 0 0 6.5 4h3A1.5 1.5 0 0 0 11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3z"/>
                </svg>
                <span id="tooltip">العودة للخلف</span>
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
            إستعلام العملاء <?php
            // echo date("Y") . ' ';
            // echo 'للعميل: ';
            echo '<a style="color: red;">' . $id . '</a>';
            ?>
        </div>
        <div class="tab-box">
            <button class="tab-button">شهر 1</button>
            <button class="tab-button">شهر 2</button>
            <button class="tab-button">شهر 3</button>
            <button class="tab-button">شهر 4</button>
            <button class="tab-button">شهر 5</button>
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
                    <div class="col-6">
                        <h4>
                            الدخل الشهري
                            <?php
                                    $total = 0;
                                    echo $id;
                                    $query = "SELECT SUM(quantity) As sumOf FROM download_card WHERE `month`='1' AND `customer_name`='$id'";
                                    /*$query2 = "SELECT SUM(quantity) As sumOfIn FROM download_card WHERE `month`='6' AND `customer_name`='$id'";
                                    $query3 = "SELECT SUM(quantity) As sumOfTo FROM download_card WHERE `month`='6' AND `customer_name`='$id'";
                                    $query4 = "SELECT SUM(quantity) As sumOfFor FROM download_card WHERE `month`='6' AND `customer_name`='$id'";
                                    $query13 = "SELECT SUM(quantity) As sumOfs1 FROM download_card WHERE `month`='6' AND `customer_name`='$id'";*/
                                    $result = mysqli_query($conn, $query);
                                    /*$result2 = mysqli_query($conn, $query2);
                                    $result3 = mysqli_query($conn, $query3);
                                    $result4 = mysqli_query($conn, $query4);
                                    $result13 = mysqli_query($conn, $query13);*/
                                    
                                    /*$query5 = "SELECT SUM(quantity) As sumOf2 FROM download_card WHERE `month`='6' AND `customer_name`='$id'";
                                    $query6 = "SELECT SUM(quantity) As sumOfIn2 FROM download_card WHERE `month`='6' AND `customer_name`='$id'";
                                    $query7 = "SELECT SUM(quantity) As sumOfTo2 FROM download_card WHERE `month`='6' AND `customer_name`='$id'";
                                    $query8 = "SELECT SUM(quantity) As sumOfFor2 FROM download_card WHERE `month`='6' AND `customer_name`='$id'";
                                    $query14 = "SELECT SUM(quantity) As sumOfs2 FROM download_card WHERE `month`='6' AND `customer_name`='$id'";
                                    
                                    $query9 = "SELECT SUM(quantity) As sumOf3 FROM download_card WHERE `month`='6' AND `customer_name`='$id'";
                                    $query10 = "SELECT SUM(quantity) As sumOfIn3 FROM download_card WHERE `month`='6' AND `customer_name`='$id'";
                                    $query11 = "SELECT SUM(quantity) As sumOfTo3 FROM download_card WHERE `month`='6' AND `customer_name`='$id'";
                                    $query12 = "SELECT SUM(quantity) As sumOfFor3 FROM download_card WHERE `month`='6' AND `customer_name`='$id'";
                                    $query15 = "SELECT SUM(quantity) As sumOfs3 FROM download_card WHERE `month`='6' AND `customer_name`='$id'";*/
                                    
                                    // $query16 = "SELECT SUM(payments) As sumOf FROM drivers WHERE `month`='6' AND `week`='4' AND `car_owner`='$id'";
                                    
                                    /*$result5 = mysqli_query($conn, $query5);
                                    $result6 = mysqli_query($conn, $query6);
                                    $result7 = mysqli_query($conn, $query7);
                                    $result8 = mysqli_query($conn, $query8);
                                    
                                    $result9 = mysqli_query($conn, $query9);
                                    $result10 = mysqli_query($conn, $query10);
                                    $result11 = mysqli_query($conn, $query11);
                                    $result12 = mysqli_query($conn, $query12);
                                    
                                    $result14 = mysqli_query($conn, $query14);
                                    $result15 = mysqli_query($conn, $query15);*/
                                    
                                    while ($row = mysqli_fetch_assoc($result)) {
                                        /*while ($row2 = mysqli_fetch_assoc($result2)) {
                                            while ($row3 = mysqli_fetch_assoc($result3)) {
                                                while ($row4 = mysqli_fetch_assoc($result4)) {
                                                    while ($row13 = mysqli_fetch_assoc($result13)) {
                                                    
                                                    while ($row5 = mysqli_fetch_assoc($result5)) {
                                                        while ($row6 = mysqli_fetch_assoc($result6)) {
                                                            while ($row7 = mysqli_fetch_assoc($result7)) {
                                                                while ($row8 = mysqli_fetch_assoc($result8)) {
                                                                    while ($row14 = mysqli_fetch_assoc($result14)) {
                                                                    
                                                                    while ($row9 = mysqli_fetch_assoc($result9)) {
                                                                        while ($row10 = mysqli_fetch_assoc($result10)) {
                                                                            while ($row11 = mysqli_fetch_assoc($result11)) {
                                                                                while ($row12 = mysqli_fetch_assoc($result12)) {
                                                                                    while ($row15 = mysqli_fetch_assoc($result15)) {*/
                                                                                        
                                                                                        // while ($row16 = mysqli_fetch_assoc($result16)) {
                                                    
            /*$total = (($row['sumOf'] - ($row2['sumOfIn'] + $row3['sumOfTo'] + $row4['sumOfFor'])) - $row13['sumOfs1'])
            + (($row5['sumOf2'] - ($row6['sumOfIn2'] + $row7['sumOfTo2'] + $row8['sumOfFor2']))  - $row14['sumOfs2'])
            + (($row9['sumOf3'] - ($row10['sumOfIn3'] + $row11['sumOfTo3'] + $row12['sumOfFor3']))  - $row15['sumOfs3']);*/
            
            $total = $row['sumOf'];
                                                                                    if ($total != 0) {
                                                                                        echo number_format($total, 2);
                                                                                     }
                                                                                    else {
                                                                                        echo '' . '0.00';
                                                                                    }
                                                                                    
                                                                                    
                                                                                    }
                                                                                /*}
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
                                    }*/
                                    ?>
                                <a style="color: #198754; font-size: 16px;">ريال سعودي</a>
                        </h4>
                    </div>
                </driv>
                <table class="table table-dark table-hover">
                    <tr>
                        <th>إسم العميل</th>
                        <th style="background: green;">الإجمالي</th>
                        <th style="background: red;">المتحصل</th>
                        <th style="background: #FFC107; color: black;">المتبقي</th>
                    </tr>
                    <tr>
                        <td><?php echo $id ?></td>
                        <td style="background: green;">
                            <?php
                            $query = "SELECT SUM(quantity) As sumOf61 FROM download_card WHERE `month`='1' AND `customer_name`='$id'";
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
                            $query = "SELECT SUM(quantity) As sumOf61 FROM download_card WHERE `month`='1' AND `customer_name`='$id'";
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
                            $query = "SELECT SUM(quantity) As sumOf61 FROM download_card WHERE `month`='1' AND `customer_name`='$id'";
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
                    </tr>
                </table>
            </div>
            <div class="content">
                <driv class="row ">
                    <div class="col"><h2>شهر 2</h2></div>
                    <div class="col-6">
                        <h4>
                            الدخل الشهري
                            <?php
                                    $total = 0;
                                    echo $id;
                                    $query = "SELECT SUM(quantity) As sumOf FROM download_card WHERE `month`='2' AND `customer_name`='$id'";
                                    /*$query2 = "SELECT SUM(quantity) As sumOfIn FROM download_card WHERE `month`='6' AND `customer_name`='$id'";
                                    $query3 = "SELECT SUM(quantity) As sumOfTo FROM download_card WHERE `month`='6' AND `customer_name`='$id'";
                                    $query4 = "SELECT SUM(quantity) As sumOfFor FROM download_card WHERE `month`='6' AND `customer_name`='$id'";
                                    $query13 = "SELECT SUM(quantity) As sumOfs1 FROM download_card WHERE `month`='6' AND `customer_name`='$id'";*/
                                    $result = mysqli_query($conn, $query);
                                    /*$result2 = mysqli_query($conn, $query2);
                                    $result3 = mysqli_query($conn, $query3);
                                    $result4 = mysqli_query($conn, $query4);
                                    $result13 = mysqli_query($conn, $query13);*/
                                    
                                    /*$query5 = "SELECT SUM(quantity) As sumOf2 FROM download_card WHERE `month`='6' AND `customer_name`='$id'";
                                    $query6 = "SELECT SUM(quantity) As sumOfIn2 FROM download_card WHERE `month`='6' AND `customer_name`='$id'";
                                    $query7 = "SELECT SUM(quantity) As sumOfTo2 FROM download_card WHERE `month`='6' AND `customer_name`='$id'";
                                    $query8 = "SELECT SUM(quantity) As sumOfFor2 FROM download_card WHERE `month`='6' AND `customer_name`='$id'";
                                    $query14 = "SELECT SUM(quantity) As sumOfs2 FROM download_card WHERE `month`='6' AND `customer_name`='$id'";
                                    
                                    $query9 = "SELECT SUM(quantity) As sumOf3 FROM download_card WHERE `month`='6' AND `customer_name`='$id'";
                                    $query10 = "SELECT SUM(quantity) As sumOfIn3 FROM download_card WHERE `month`='6' AND `customer_name`='$id'";
                                    $query11 = "SELECT SUM(quantity) As sumOfTo3 FROM download_card WHERE `month`='6' AND `customer_name`='$id'";
                                    $query12 = "SELECT SUM(quantity) As sumOfFor3 FROM download_card WHERE `month`='6' AND `customer_name`='$id'";
                                    $query15 = "SELECT SUM(quantity) As sumOfs3 FROM download_card WHERE `month`='6' AND `customer_name`='$id'";*/
                                    
                                    // $query16 = "SELECT SUM(payments) As sumOf FROM drivers WHERE `month`='6' AND `week`='4' AND `car_owner`='$id'";
                                    
                                    /*$result5 = mysqli_query($conn, $query5);
                                    $result6 = mysqli_query($conn, $query6);
                                    $result7 = mysqli_query($conn, $query7);
                                    $result8 = mysqli_query($conn, $query8);
                                    
                                    $result9 = mysqli_query($conn, $query9);
                                    $result10 = mysqli_query($conn, $query10);
                                    $result11 = mysqli_query($conn, $query11);
                                    $result12 = mysqli_query($conn, $query12);
                                    
                                    $result14 = mysqli_query($conn, $query14);
                                    $result15 = mysqli_query($conn, $query15);*/
                                    
                                    while ($row = mysqli_fetch_assoc($result)) {
                                        /*while ($row2 = mysqli_fetch_assoc($result2)) {
                                            while ($row3 = mysqli_fetch_assoc($result3)) {
                                                while ($row4 = mysqli_fetch_assoc($result4)) {
                                                    while ($row13 = mysqli_fetch_assoc($result13)) {
                                                    
                                                    while ($row5 = mysqli_fetch_assoc($result5)) {
                                                        while ($row6 = mysqli_fetch_assoc($result6)) {
                                                            while ($row7 = mysqli_fetch_assoc($result7)) {
                                                                while ($row8 = mysqli_fetch_assoc($result8)) {
                                                                    while ($row14 = mysqli_fetch_assoc($result14)) {
                                                                    
                                                                    while ($row9 = mysqli_fetch_assoc($result9)) {
                                                                        while ($row10 = mysqli_fetch_assoc($result10)) {
                                                                            while ($row11 = mysqli_fetch_assoc($result11)) {
                                                                                while ($row12 = mysqli_fetch_assoc($result12)) {
                                                                                    while ($row15 = mysqli_fetch_assoc($result15)) {*/
                                                                                        
                                                                                        // while ($row16 = mysqli_fetch_assoc($result16)) {
                                                    
            /*$total = (($row['sumOf'] - ($row2['sumOfIn'] + $row3['sumOfTo'] + $row4['sumOfFor'])) - $row13['sumOfs1'])
            + (($row5['sumOf2'] - ($row6['sumOfIn2'] + $row7['sumOfTo2'] + $row8['sumOfFor2']))  - $row14['sumOfs2'])
            + (($row9['sumOf3'] - ($row10['sumOfIn3'] + $row11['sumOfTo3'] + $row12['sumOfFor3']))  - $row15['sumOfs3']);*/
            
            $total = $row['sumOf'];
                                                                                    if ($total != 0) {
                                                                                        echo number_format($total, 2);
                                                                                     }
                                                                                    else {
                                                                                        echo '' . '0.00';
                                                                                    }
                                                                                    
                                                                                    
                                                                                    }
                                                                                /*}
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
                                    }*/
                                    ?>
                                <a style="color: #198754; font-size: 16px;">ريال سعودي</a>
                        </h4>
                    </div>
                </driv>
                <table class="table table-dark table-hover">
                    <tr>
                        <th>إسم العميل</th>
                        <th style="background: green;">الإجمالي</th>
                        <th style="background: red;">المتحصل</th>
                        <th style="background: #FFC107; color: black;">المتبقي</th>
                    </tr>
                    <tr>
                        <td><?php echo $id ?></td>
                        <td style="background: green;">
                            <?php
                            $query = "SELECT SUM(quantity) As sumOf61 FROM download_card WHERE `month`='2' AND `customer_name`='$id'";
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
                            $query = "SELECT SUM(quantity) As sumOf61 FROM download_card WHERE `month`='2' AND `customer_name`='$id'";
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
                            $query = "SELECT SUM(quantity) As sumOf61 FROM download_card WHERE `month`='2' AND `customer_name`='$id'";
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
                    </tr>
                </table>
            </div>
            <div class="content">
                <driv class="row ">
                    <div class="col"><h2>شهر 3</h2></div>
                    <div class="col-6">
                        <h4>
                            الدخل الشهري
                            <?php
                                    $total = 0;
                                    echo $id;
                                    $query = "SELECT SUM(quantity) As sumOf FROM download_card WHERE `month`='3' AND `customer_name`='$id'";
                                    /*$query2 = "SELECT SUM(quantity) As sumOfIn FROM download_card WHERE `month`='6' AND `customer_name`='$id'";
                                    $query3 = "SELECT SUM(quantity) As sumOfTo FROM download_card WHERE `month`='6' AND `customer_name`='$id'";
                                    $query4 = "SELECT SUM(quantity) As sumOfFor FROM download_card WHERE `month`='6' AND `customer_name`='$id'";
                                    $query13 = "SELECT SUM(quantity) As sumOfs1 FROM download_card WHERE `month`='6' AND `customer_name`='$id'";*/
                                    $result = mysqli_query($conn, $query);
                                    /*$result2 = mysqli_query($conn, $query2);
                                    $result3 = mysqli_query($conn, $query3);
                                    $result4 = mysqli_query($conn, $query4);
                                    $result13 = mysqli_query($conn, $query13);*/
                                    
                                    /*$query5 = "SELECT SUM(quantity) As sumOf2 FROM download_card WHERE `month`='6' AND `customer_name`='$id'";
                                    $query6 = "SELECT SUM(quantity) As sumOfIn2 FROM download_card WHERE `month`='6' AND `customer_name`='$id'";
                                    $query7 = "SELECT SUM(quantity) As sumOfTo2 FROM download_card WHERE `month`='6' AND `customer_name`='$id'";
                                    $query8 = "SELECT SUM(quantity) As sumOfFor2 FROM download_card WHERE `month`='6' AND `customer_name`='$id'";
                                    $query14 = "SELECT SUM(quantity) As sumOfs2 FROM download_card WHERE `month`='6' AND `customer_name`='$id'";
                                    
                                    $query9 = "SELECT SUM(quantity) As sumOf3 FROM download_card WHERE `month`='6' AND `customer_name`='$id'";
                                    $query10 = "SELECT SUM(quantity) As sumOfIn3 FROM download_card WHERE `month`='6' AND `customer_name`='$id'";
                                    $query11 = "SELECT SUM(quantity) As sumOfTo3 FROM download_card WHERE `month`='6' AND `customer_name`='$id'";
                                    $query12 = "SELECT SUM(quantity) As sumOfFor3 FROM download_card WHERE `month`='6' AND `customer_name`='$id'";
                                    $query15 = "SELECT SUM(quantity) As sumOfs3 FROM download_card WHERE `month`='6' AND `customer_name`='$id'";*/
                                    
                                    // $query16 = "SELECT SUM(payments) As sumOf FROM drivers WHERE `month`='6' AND `week`='4' AND `car_owner`='$id'";
                                    
                                    /*$result5 = mysqli_query($conn, $query5);
                                    $result6 = mysqli_query($conn, $query6);
                                    $result7 = mysqli_query($conn, $query7);
                                    $result8 = mysqli_query($conn, $query8);
                                    
                                    $result9 = mysqli_query($conn, $query9);
                                    $result10 = mysqli_query($conn, $query10);
                                    $result11 = mysqli_query($conn, $query11);
                                    $result12 = mysqli_query($conn, $query12);
                                    
                                    $result14 = mysqli_query($conn, $query14);
                                    $result15 = mysqli_query($conn, $query15);*/
                                    
                                    while ($row = mysqli_fetch_assoc($result)) {
                                        /*while ($row2 = mysqli_fetch_assoc($result2)) {
                                            while ($row3 = mysqli_fetch_assoc($result3)) {
                                                while ($row4 = mysqli_fetch_assoc($result4)) {
                                                    while ($row13 = mysqli_fetch_assoc($result13)) {
                                                    
                                                    while ($row5 = mysqli_fetch_assoc($result5)) {
                                                        while ($row6 = mysqli_fetch_assoc($result6)) {
                                                            while ($row7 = mysqli_fetch_assoc($result7)) {
                                                                while ($row8 = mysqli_fetch_assoc($result8)) {
                                                                    while ($row14 = mysqli_fetch_assoc($result14)) {
                                                                    
                                                                    while ($row9 = mysqli_fetch_assoc($result9)) {
                                                                        while ($row10 = mysqli_fetch_assoc($result10)) {
                                                                            while ($row11 = mysqli_fetch_assoc($result11)) {
                                                                                while ($row12 = mysqli_fetch_assoc($result12)) {
                                                                                    while ($row15 = mysqli_fetch_assoc($result15)) {*/
                                                                                        
                                                                                        // while ($row16 = mysqli_fetch_assoc($result16)) {
                                                    
            /*$total = (($row['sumOf'] - ($row2['sumOfIn'] + $row3['sumOfTo'] + $row4['sumOfFor'])) - $row13['sumOfs1'])
            + (($row5['sumOf2'] - ($row6['sumOfIn2'] + $row7['sumOfTo2'] + $row8['sumOfFor2']))  - $row14['sumOfs2'])
            + (($row9['sumOf3'] - ($row10['sumOfIn3'] + $row11['sumOfTo3'] + $row12['sumOfFor3']))  - $row15['sumOfs3']);*/
            
            $total = $row['sumOf'];
                                                                                    if ($total != 0) {
                                                                                        echo number_format($total, 2);
                                                                                     }
                                                                                    else {
                                                                                        echo '' . '0.00';
                                                                                    }
                                                                                    
                                                                                    
                                                                                    }
                                                                                /*}
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
                                    }*/
                                    ?>
                                <a style="color: #198754; font-size: 16px;">ريال سعودي</a>
                        </h4>
                    </div>
                </driv>
                <table class="table table-dark table-hover">
                    <tr>
                        <th>إسم العميل</th>
                        <th style="background: green;">الإجمالي</th>
                        <th style="background: red;">المتحصل</th>
                        <th style="background: #FFC107; color: black;">المتبقي</th>
                    </tr>
                    <tr>
                        <td><?php echo $id ?></td>
                        <td style="background: green;">
                            <?php
                            $query = "SELECT SUM(quantity) As sumOf61 FROM download_card WHERE `month`='3' AND `customer_name`='$id'";
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
                            $query = "SELECT SUM(quantity) As sumOf61 FROM download_card WHERE `month`='3' AND `customer_name`='$id'";
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
                            $query = "SELECT SUM(quantity) As sumOf61 FROM download_card WHERE `month`='3' AND `customer_name`='$id'";
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
                    </tr>
                </table>
            </div>
            <div class="content">
                <driv class="row ">
                    <div class="col"><h2>شهر 4</h2></div>
                    <div class="col-6">
                        <h4>
                            الدخل الشهري
                            <?php
                                    $total = 0;
                                    echo $id;
                                    $query = "SELECT SUM(quantity) As sumOf FROM download_card WHERE `month`='4' AND `customer_name`='$id'";
                                    /*$query2 = "SELECT SUM(quantity) As sumOfIn FROM download_card WHERE `month`='6' AND `customer_name`='$id'";
                                    $query3 = "SELECT SUM(quantity) As sumOfTo FROM download_card WHERE `month`='6' AND `customer_name`='$id'";
                                    $query4 = "SELECT SUM(quantity) As sumOfFor FROM download_card WHERE `month`='6' AND `customer_name`='$id'";
                                    $query13 = "SELECT SUM(quantity) As sumOfs1 FROM download_card WHERE `month`='6' AND `customer_name`='$id'";*/
                                    $result = mysqli_query($conn, $query);
                                    /*$result2 = mysqli_query($conn, $query2);
                                    $result3 = mysqli_query($conn, $query3);
                                    $result4 = mysqli_query($conn, $query4);
                                    $result13 = mysqli_query($conn, $query13);*/
                                    
                                    /*$query5 = "SELECT SUM(quantity) As sumOf2 FROM download_card WHERE `month`='6' AND `customer_name`='$id'";
                                    $query6 = "SELECT SUM(quantity) As sumOfIn2 FROM download_card WHERE `month`='6' AND `customer_name`='$id'";
                                    $query7 = "SELECT SUM(quantity) As sumOfTo2 FROM download_card WHERE `month`='6' AND `customer_name`='$id'";
                                    $query8 = "SELECT SUM(quantity) As sumOfFor2 FROM download_card WHERE `month`='6' AND `customer_name`='$id'";
                                    $query14 = "SELECT SUM(quantity) As sumOfs2 FROM download_card WHERE `month`='6' AND `customer_name`='$id'";
                                    
                                    $query9 = "SELECT SUM(quantity) As sumOf3 FROM download_card WHERE `month`='6' AND `customer_name`='$id'";
                                    $query10 = "SELECT SUM(quantity) As sumOfIn3 FROM download_card WHERE `month`='6' AND `customer_name`='$id'";
                                    $query11 = "SELECT SUM(quantity) As sumOfTo3 FROM download_card WHERE `month`='6' AND `customer_name`='$id'";
                                    $query12 = "SELECT SUM(quantity) As sumOfFor3 FROM download_card WHERE `month`='6' AND `customer_name`='$id'";
                                    $query15 = "SELECT SUM(quantity) As sumOfs3 FROM download_card WHERE `month`='6' AND `customer_name`='$id'";*/
                                    
                                    // $query16 = "SELECT SUM(payments) As sumOf FROM drivers WHERE `month`='6' AND `week`='4' AND `car_owner`='$id'";
                                    
                                    /*$result5 = mysqli_query($conn, $query5);
                                    $result6 = mysqli_query($conn, $query6);
                                    $result7 = mysqli_query($conn, $query7);
                                    $result8 = mysqli_query($conn, $query8);
                                    
                                    $result9 = mysqli_query($conn, $query9);
                                    $result10 = mysqli_query($conn, $query10);
                                    $result11 = mysqli_query($conn, $query11);
                                    $result12 = mysqli_query($conn, $query12);
                                    
                                    $result14 = mysqli_query($conn, $query14);
                                    $result15 = mysqli_query($conn, $query15);*/
                                    
                                    while ($row = mysqli_fetch_assoc($result)) {
                                        /*while ($row2 = mysqli_fetch_assoc($result2)) {
                                            while ($row3 = mysqli_fetch_assoc($result3)) {
                                                while ($row4 = mysqli_fetch_assoc($result4)) {
                                                    while ($row13 = mysqli_fetch_assoc($result13)) {
                                                    
                                                    while ($row5 = mysqli_fetch_assoc($result5)) {
                                                        while ($row6 = mysqli_fetch_assoc($result6)) {
                                                            while ($row7 = mysqli_fetch_assoc($result7)) {
                                                                while ($row8 = mysqli_fetch_assoc($result8)) {
                                                                    while ($row14 = mysqli_fetch_assoc($result14)) {
                                                                    
                                                                    while ($row9 = mysqli_fetch_assoc($result9)) {
                                                                        while ($row10 = mysqli_fetch_assoc($result10)) {
                                                                            while ($row11 = mysqli_fetch_assoc($result11)) {
                                                                                while ($row12 = mysqli_fetch_assoc($result12)) {
                                                                                    while ($row15 = mysqli_fetch_assoc($result15)) {*/
                                                                                        
                                                                                        // while ($row16 = mysqli_fetch_assoc($result16)) {
                                                    
            /*$total = (($row['sumOf'] - ($row2['sumOfIn'] + $row3['sumOfTo'] + $row4['sumOfFor'])) - $row13['sumOfs1'])
            + (($row5['sumOf2'] - ($row6['sumOfIn2'] + $row7['sumOfTo2'] + $row8['sumOfFor2']))  - $row14['sumOfs2'])
            + (($row9['sumOf3'] - ($row10['sumOfIn3'] + $row11['sumOfTo3'] + $row12['sumOfFor3']))  - $row15['sumOfs3']);*/
            
            $total = $row['sumOf'];
                                                                                    if ($total != 0) {
                                                                                        echo number_format($total, 2);
                                                                                     }
                                                                                    else {
                                                                                        echo '' . '0.00';
                                                                                    }
                                                                                    
                                                                                    
                                                                                    }
                                                                                /*}
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
                                    }*/
                                    ?>
                                <a style="color: #198754; font-size: 16px;">ريال سعودي</a>
                        </h4>
                    </div>
                </driv>
                <table class="table table-dark table-hover">
                    <tr>
                        <th>إسم العميل</th>
                        <th style="background: green;">الإجمالي</th>
                        <th style="background: red;">المتحصل</th>
                        <th style="background: #FFC107; color: black;">المتبقي</th>
                    </tr>
                    <tr>
                        <td><?php echo $id ?></td>
                        <td style="background: green;">
                            <?php
                            $query = "SELECT SUM(quantity) As sumOf61 FROM download_card WHERE `month`='4' AND `customer_name`='$id'";
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
                            $query = "SELECT SUM(quantity) As sumOf61 FROM download_card WHERE `month`='4' AND `customer_name`='$id'";
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
                            $query = "SELECT SUM(quantity) As sumOf61 FROM download_card WHERE `month`='4' AND `customer_name`='$id'";
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
                    </tr>
                </table>
            </div>
            <div class="content">
                <driv class="row ">
                    <div class="col"><h2>شهر 5</h2></div>
                    <div class="col-6">
                        <h4>
                            الدخل الشهري
                            <?php
                                    $total = 0;
                                    echo $id;
                                    $query = "SELECT SUM(quantity) As sumOf FROM download_card WHERE `month`='5' AND `customer_name`='$id'";
                                    /*$query2 = "SELECT SUM(quantity) As sumOfIn FROM download_card WHERE `month`='6' AND `customer_name`='$id'";
                                    $query3 = "SELECT SUM(quantity) As sumOfTo FROM download_card WHERE `month`='6' AND `customer_name`='$id'";
                                    $query4 = "SELECT SUM(quantity) As sumOfFor FROM download_card WHERE `month`='6' AND `customer_name`='$id'";
                                    $query13 = "SELECT SUM(quantity) As sumOfs1 FROM download_card WHERE `month`='6' AND `customer_name`='$id'";*/
                                    $result = mysqli_query($conn, $query);
                                    /*$result2 = mysqli_query($conn, $query2);
                                    $result3 = mysqli_query($conn, $query3);
                                    $result4 = mysqli_query($conn, $query4);
                                    $result13 = mysqli_query($conn, $query13);*/
                                    
                                    /*$query5 = "SELECT SUM(quantity) As sumOf2 FROM download_card WHERE `month`='6' AND `customer_name`='$id'";
                                    $query6 = "SELECT SUM(quantity) As sumOfIn2 FROM download_card WHERE `month`='6' AND `customer_name`='$id'";
                                    $query7 = "SELECT SUM(quantity) As sumOfTo2 FROM download_card WHERE `month`='6' AND `customer_name`='$id'";
                                    $query8 = "SELECT SUM(quantity) As sumOfFor2 FROM download_card WHERE `month`='6' AND `customer_name`='$id'";
                                    $query14 = "SELECT SUM(quantity) As sumOfs2 FROM download_card WHERE `month`='6' AND `customer_name`='$id'";
                                    
                                    $query9 = "SELECT SUM(quantity) As sumOf3 FROM download_card WHERE `month`='6' AND `customer_name`='$id'";
                                    $query10 = "SELECT SUM(quantity) As sumOfIn3 FROM download_card WHERE `month`='6' AND `customer_name`='$id'";
                                    $query11 = "SELECT SUM(quantity) As sumOfTo3 FROM download_card WHERE `month`='6' AND `customer_name`='$id'";
                                    $query12 = "SELECT SUM(quantity) As sumOfFor3 FROM download_card WHERE `month`='6' AND `customer_name`='$id'";
                                    $query15 = "SELECT SUM(quantity) As sumOfs3 FROM download_card WHERE `month`='6' AND `customer_name`='$id'";*/
                                    
                                    // $query16 = "SELECT SUM(payments) As sumOf FROM drivers WHERE `month`='6' AND `week`='4' AND `car_owner`='$id'";
                                    
                                    /*$result5 = mysqli_query($conn, $query5);
                                    $result6 = mysqli_query($conn, $query6);
                                    $result7 = mysqli_query($conn, $query7);
                                    $result8 = mysqli_query($conn, $query8);
                                    
                                    $result9 = mysqli_query($conn, $query9);
                                    $result10 = mysqli_query($conn, $query10);
                                    $result11 = mysqli_query($conn, $query11);
                                    $result12 = mysqli_query($conn, $query12);
                                    
                                    $result14 = mysqli_query($conn, $query14);
                                    $result15 = mysqli_query($conn, $query15);*/
                                    
                                    while ($row = mysqli_fetch_assoc($result)) {
                                        /*while ($row2 = mysqli_fetch_assoc($result2)) {
                                            while ($row3 = mysqli_fetch_assoc($result3)) {
                                                while ($row4 = mysqli_fetch_assoc($result4)) {
                                                    while ($row13 = mysqli_fetch_assoc($result13)) {
                                                    
                                                    while ($row5 = mysqli_fetch_assoc($result5)) {
                                                        while ($row6 = mysqli_fetch_assoc($result6)) {
                                                            while ($row7 = mysqli_fetch_assoc($result7)) {
                                                                while ($row8 = mysqli_fetch_assoc($result8)) {
                                                                    while ($row14 = mysqli_fetch_assoc($result14)) {
                                                                    
                                                                    while ($row9 = mysqli_fetch_assoc($result9)) {
                                                                        while ($row10 = mysqli_fetch_assoc($result10)) {
                                                                            while ($row11 = mysqli_fetch_assoc($result11)) {
                                                                                while ($row12 = mysqli_fetch_assoc($result12)) {
                                                                                    while ($row15 = mysqli_fetch_assoc($result15)) {*/
                                                                                        
                                                                                        // while ($row16 = mysqli_fetch_assoc($result16)) {
                                                    
            /*$total = (($row['sumOf'] - ($row2['sumOfIn'] + $row3['sumOfTo'] + $row4['sumOfFor'])) - $row13['sumOfs1'])
            + (($row5['sumOf2'] - ($row6['sumOfIn2'] + $row7['sumOfTo2'] + $row8['sumOfFor2']))  - $row14['sumOfs2'])
            + (($row9['sumOf3'] - ($row10['sumOfIn3'] + $row11['sumOfTo3'] + $row12['sumOfFor3']))  - $row15['sumOfs3']);*/
            
            $total = $row['sumOf'];
                                                                                    if ($total != 0) {
                                                                                        echo number_format($total, 2);
                                                                                     }
                                                                                    else {
                                                                                        echo '' . '0.00';
                                                                                    }
                                                                                    
                                                                                    
                                                                                    }
                                                                                /*}
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
                                    }*/
                                    ?>
                                <a style="color: #198754; font-size: 16px;">ريال سعودي</a>
                        </h4>
                    </div>
                </driv>
                <table class="table table-dark table-hover">
                    <tr>
                        <th>إسم العميل</th>
                        <th style="background: green;">الإجمالي</th>
                        <th style="background: red;">المتحصل</th>
                        <th style="background: #FFC107; color: black;">المتبقي</th>
                    </tr>
                    <tr>
                        <td><?php echo $id ?></td>
                        <td style="background: green;">
                            <?php
                            $query = "SELECT SUM(quantity) As sumOf61 FROM download_card WHERE `month`='5' AND `customer_name`='$id'";
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
                            $query = "SELECT SUM(quantity) As sumOf61 FROM download_card WHERE `month`='5' AND `customer_name`='$id'";
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
                            $query = "SELECT SUM(quantity) As sumOf61 FROM download_card WHERE `month`='5' AND `customer_name`='$id'";
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
                    </tr>
                </table>
            </div>
            <div class="content">
                <driv class="row ">
                    <div class="col"><h2>شهر 6</h2></div>
                    <div class="col-6">
                        <h4>
                            الدخل الشهري
                            <?php
                                    $total = 0;
                                    echo $id;
                                    $query = "SELECT SUM(quantity) As sumOf FROM download_card WHERE `month`='6' AND `customer_name`='$id'";
                                    /*$query2 = "SELECT SUM(quantity) As sumOfIn FROM download_card WHERE `month`='6' AND `customer_name`='$id'";
                                    $query3 = "SELECT SUM(quantity) As sumOfTo FROM download_card WHERE `month`='6' AND `customer_name`='$id'";
                                    $query4 = "SELECT SUM(quantity) As sumOfFor FROM download_card WHERE `month`='6' AND `customer_name`='$id'";
                                    $query13 = "SELECT SUM(quantity) As sumOfs1 FROM download_card WHERE `month`='6' AND `customer_name`='$id'";*/
                                    $result = mysqli_query($conn, $query);
                                    /*$result2 = mysqli_query($conn, $query2);
                                    $result3 = mysqli_query($conn, $query3);
                                    $result4 = mysqli_query($conn, $query4);
                                    $result13 = mysqli_query($conn, $query13);*/
                                    
                                    /*$query5 = "SELECT SUM(quantity) As sumOf2 FROM download_card WHERE `month`='6' AND `customer_name`='$id'";
                                    $query6 = "SELECT SUM(quantity) As sumOfIn2 FROM download_card WHERE `month`='6' AND `customer_name`='$id'";
                                    $query7 = "SELECT SUM(quantity) As sumOfTo2 FROM download_card WHERE `month`='6' AND `customer_name`='$id'";
                                    $query8 = "SELECT SUM(quantity) As sumOfFor2 FROM download_card WHERE `month`='6' AND `customer_name`='$id'";
                                    $query14 = "SELECT SUM(quantity) As sumOfs2 FROM download_card WHERE `month`='6' AND `customer_name`='$id'";
                                    
                                    $query9 = "SELECT SUM(quantity) As sumOf3 FROM download_card WHERE `month`='6' AND `customer_name`='$id'";
                                    $query10 = "SELECT SUM(quantity) As sumOfIn3 FROM download_card WHERE `month`='6' AND `customer_name`='$id'";
                                    $query11 = "SELECT SUM(quantity) As sumOfTo3 FROM download_card WHERE `month`='6' AND `customer_name`='$id'";
                                    $query12 = "SELECT SUM(quantity) As sumOfFor3 FROM download_card WHERE `month`='6' AND `customer_name`='$id'";
                                    $query15 = "SELECT SUM(quantity) As sumOfs3 FROM download_card WHERE `month`='6' AND `customer_name`='$id'";*/
                                    
                                    // $query16 = "SELECT SUM(payments) As sumOf FROM drivers WHERE `month`='6' AND `week`='4' AND `car_owner`='$id'";
                                    
                                    /*$result5 = mysqli_query($conn, $query5);
                                    $result6 = mysqli_query($conn, $query6);
                                    $result7 = mysqli_query($conn, $query7);
                                    $result8 = mysqli_query($conn, $query8);
                                    
                                    $result9 = mysqli_query($conn, $query9);
                                    $result10 = mysqli_query($conn, $query10);
                                    $result11 = mysqli_query($conn, $query11);
                                    $result12 = mysqli_query($conn, $query12);
                                    
                                    $result14 = mysqli_query($conn, $query14);
                                    $result15 = mysqli_query($conn, $query15);*/
                                    
                                    while ($row = mysqli_fetch_assoc($result)) {
                                        /*while ($row2 = mysqli_fetch_assoc($result2)) {
                                            while ($row3 = mysqli_fetch_assoc($result3)) {
                                                while ($row4 = mysqli_fetch_assoc($result4)) {
                                                    while ($row13 = mysqli_fetch_assoc($result13)) {
                                                    
                                                    while ($row5 = mysqli_fetch_assoc($result5)) {
                                                        while ($row6 = mysqli_fetch_assoc($result6)) {
                                                            while ($row7 = mysqli_fetch_assoc($result7)) {
                                                                while ($row8 = mysqli_fetch_assoc($result8)) {
                                                                    while ($row14 = mysqli_fetch_assoc($result14)) {
                                                                    
                                                                    while ($row9 = mysqli_fetch_assoc($result9)) {
                                                                        while ($row10 = mysqli_fetch_assoc($result10)) {
                                                                            while ($row11 = mysqli_fetch_assoc($result11)) {
                                                                                while ($row12 = mysqli_fetch_assoc($result12)) {
                                                                                    while ($row15 = mysqli_fetch_assoc($result15)) {*/
                                                                                        
                                                                                        // while ($row16 = mysqli_fetch_assoc($result16)) {
                                                    
            /*$total = (($row['sumOf'] - ($row2['sumOfIn'] + $row3['sumOfTo'] + $row4['sumOfFor'])) - $row13['sumOfs1'])
            + (($row5['sumOf2'] - ($row6['sumOfIn2'] + $row7['sumOfTo2'] + $row8['sumOfFor2']))  - $row14['sumOfs2'])
            + (($row9['sumOf3'] - ($row10['sumOfIn3'] + $row11['sumOfTo3'] + $row12['sumOfFor3']))  - $row15['sumOfs3']);*/
            
            $total = $row['sumOf'];
                                                                                    if ($total != 0) {
                                                                                        echo number_format($total, 2);
                                                                                     }
                                                                                    else {
                                                                                        echo '' . '0.00';
                                                                                    }
                                                                                    
                                                                                    
                                                                                    }
                                                                                /*}
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
                                    }*/
                                    ?>
                                <a style="color: #198754; font-size: 16px;">ريال سعودي</a>
                        </h4>
                    </div>
                </driv>
                <table class="table table-dark table-hover">
                    <tr>
                        <th>إسم العميل</th>
                        <th style="background: green;">الإجمالي</th>
                        <th style="background: red;">المتحصل</th>
                        <th style="background: #FFC107; color: black;">المتبقي</th>
                    </tr>
                    <tr>
                        <td><?php echo $id ?></td>
                        <td style="background: green;">
                            <?php
                            $query = "SELECT SUM(service_value) As sumOf61 FROM drivers WHERE `month`='6' AND `week`='1' AND `car_owner`='$id'";
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
                            $query = "SELECT SUM(diesel) As sumOf61 FROM drivers WHERE `month`='6' AND `week`='1' AND `car_owner`='$id'";
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
                            $query = "SELECT SUM(trip_total) As sumOf61 FROM drivers WHERE `month`='6' AND `week`='1' AND `car_owner`='$id'";
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
                    </tr>
                </table>
            </div>
            <div class="content">
                <h2>شهر 7</h2>
                <p>Lorem ipsum dve accusantium et fugit nulla!</p>
            </div>
            <div class="content">
                <h2>شهر 8</h2>
                <p>Lorem ipsum dolorlanditt nihil eiu fugit nulla!</p>
            </div>
            <div class="content">
                <h2>شهر 9</h2>
                <p>Lorem ipsum dolor ,ccusantium et fugit nulla!</p>
            </div>
            <div class="content">
                <h2>شهر 10</h2>
                <p>Lol eius cumque quos, tenetur accusantium et fugit nulla!</p>
            </div>
            <div class="content">
                <h2>شهر 11</h2>
                <p>Lorem inihil eius cumque quos, tenetur nulla!</p>
            </div>
            <div class="content active">
                <driv class="row ">
                    <div class="col"><h2>شهر 12</h2></div>
                    <div class="col-6">
                        <h4>
                            الدخل الشهري
                            <?php
                                    $total = 0;
                                    echo $id;
                                    $query = "SELECT SUM(payload_total) As sumOf FROM drivers WHERE `month`='12' AND `week`='1' AND `car_owner`='$id'";
                                    $query2 = "SELECT SUM(trip_total) As sumOfIn FROM drivers WHERE `month`='12' AND `week`='1' AND `car_owner`='$id'";
                                    $query3 = "SELECT SUM(diesel) As sumOfTo FROM drivers WHERE `month`='12' AND `week`='1' AND `car_owner`='$id'";
                                    $query4 = "SELECT SUM(service_value) As sumOfFor FROM drivers WHERE `month`='12' AND `week`='1' AND `car_owner`='$id'";
                                    $result = mysqli_query($conn, $query);
                                    $result2 = mysqli_query($conn, $query2);
                                    $result3 = mysqli_query($conn, $query3);
                                    $result4 = mysqli_query($conn, $query4);
                                    
                                    $query5 = "SELECT SUM(payload_total) As sumOf2 FROM drivers WHERE `month`='12' AND `week`='2' AND `car_owner`='$id'";
                                    $query6 = "SELECT SUM(trip_total) As sumOfIn2 FROM drivers WHERE `month`='12' AND `week`='2' AND `car_owner`='$id'";
                                    $query7 = "SELECT SUM(diesel) As sumOfTo2 FROM drivers WHERE `month`='12' AND `week`='2' AND `car_owner`='$id'";
                                    $query8 = "SELECT SUM(service_value) As sumOfFor2 FROM drivers WHERE `month`='12' AND `week`='2' AND `car_owner`='$id'";
                                    
                                    $query9 = "SELECT SUM(payload_total) As sumOf3 FROM drivers WHERE `month`='12' AND `week`='3' AND `car_owner`='$id'";
                                    $query10 = "SELECT SUM(trip_total) As sumOfIn3 FROM drivers WHERE `month`='12' AND `week`='3' AND `car_owner`='$id'";
                                    $query11 = "SELECT SUM(diesel) As sumOfTo3 FROM drivers WHERE `month`='12' AND `week`='3' AND `car_owner`='$id'";
                                    $query12 = "SELECT SUM(service_value) As sumOfFor3 FROM drivers WHERE `month`='12' AND `week`='3' AND `car_owner`='$id'";
                                    
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
                        </h4>
                    </div>
                </driv>
                <table class="table table-dark table-hover">
                    <tr>
                        <th>الأسبوع#</th>
                        <th>الحمولة</th>
                        <th style="background: #FFC107; color: black;">قيمة الخدمة</th>
                        <th style="background: #FFC107; color: black;">ديزل</th>
                        <th style="background: #FFC107; color: black;">التربات</th>
                        <!--<th style="background: #0D6EFD;">الدفعات</th>-->
                        <th style="background: red;">الخصومات</th>
                        <th style="background: green;">الراتب</th>
                        <th>الدخل الأسبوعي</th>
                    </tr>
                    <tr>
                        <td>1</td>
                        <td>
                            <?php
                            $query = "SELECT SUM(payload_total) As sumOf61 FROM drivers WHERE `month`='12' AND `week`='1' AND `car_owner`='$id'";
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
                            $query = "SELECT SUM(service_value) As sumOf61 FROM drivers WHERE `month`='12' AND `week`='1' AND `car_owner`='$id'";
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
                            $query = "SELECT SUM(diesel) As sumOf61 FROM drivers WHERE `month`='12' AND `week`='1' AND `car_owner`='$id'";
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
                            $query = "SELECT SUM(trip_total) As sumOf61 FROM drivers WHERE `month`='12' AND `week`='1' AND `car_owner`='$id'";
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
                        <!--<td style="background: #0D6EFD;">
                            <?php
                            $query = "SELECT SUM(payments) As sumOf61 FROM drivers WHERE `month`='12' AND `week`='1' AND `car_owner`='$id'";
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
                        </td>-->
                        <td style="background: red;">
                            <?php
                            $query = "SELECT SUM(discounts) As sumOf61 FROM drivers WHERE `month`='12' AND `week`='1' AND `car_owner`='$id'";
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
                            $query = "SELECT SUM(salary) As sumOf61 FROM drivers WHERE `month`='12' AND `week`='1' AND `car_owner`='$id'";
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
                            $query = "SELECT SUM(payload_total) As sumOf FROM drivers WHERE `month`='12' AND `week`='1' AND `car_owner`='$id'";
                            $query2 = "SELECT SUM(trip_total) As sumOfIn FROM drivers WHERE `month`='12' AND `week`='1' AND `car_owner`='$id'";
                            $query3 = "SELECT SUM(diesel) As sumOfTo FROM drivers WHERE `month`='12' AND `week`='1' AND `car_owner`='$id'";
                            $query4 = "SELECT SUM(service_value) As sumOfFor FROM drivers WHERE `month`='12' AND `week`='1' AND `car_owner`='$id'";
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
                            $query = "SELECT SUM(payload_total) As sumOf62 FROM drivers WHERE `month`='12' AND `week`='2' AND `car_owner`='$id'";
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
                            $query = "SELECT SUM(service_value) As sumOf62 FROM drivers WHERE `month`='12' AND `week`='2' AND `car_owner`='$id'";
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
                            $query = "SELECT SUM(diesel) As sumOf62 FROM drivers WHERE `month`='12' AND `week`='2' AND `car_owner`='$id'";
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
                            $query = "SELECT SUM(trip_total) As sumOf62 FROM drivers WHERE `month`='12' AND `week`='2' AND `car_owner`='$id'";
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
                        <!--<td style="background: #0D6EFD;">
                            <?php
                            $query = "SELECT SUM(payments) As sumOf61 FROM drivers WHERE `month`='12' AND `week`='2' AND `car_owner`='$id'";
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
                        </td>-->
                        <td style="background: red;">
                            <?php
                            $query = "SELECT SUM(discounts) As sumOf62 FROM drivers WHERE `month`='12' AND `week`='2' AND `car_owner`='$id'";
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
                            $query = "SELECT SUM(salary) As sumOf61 FROM drivers WHERE `month`='12' AND `week`='2' AND `car_owner`='$id'";
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
                            $query = "SELECT SUM(payload_total) As sumOf FROM drivers WHERE `month`='12' AND `week`='2' AND `car_owner`='$id'";
                            $query2 = "SELECT SUM(trip_total) As sumOfIn FROM drivers WHERE `month`='12' AND `week`='2' AND `car_owner`='$id'";
                            $query3 = "SELECT SUM(diesel) As sumOfTo FROM drivers WHERE `month`='12' AND `week`='2'";
                            $query4 = "SELECT SUM(service_value) As sumOfFor FROM drivers WHERE `month`='12' AND `week`='2' AND `car_owner`='$id'";
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
                            $query = "SELECT SUM(payload_total) As sumOf63 FROM drivers WHERE `month`='12' AND `week`='3' AND `car_owner`='$id'";
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
                            $query = "SELECT SUM(service_value) As sumOf63 FROM drivers WHERE `month`='12' AND `week`='3' AND `car_owner`='$id'";
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
                            $query = "SELECT SUM(diesel) As sumOf63 FROM drivers WHERE `month`='12' AND `week`='3' AND `car_owner`='$id'";
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
                            $query = "SELECT SUM(trip_total) As sumOf63 FROM drivers WHERE `month`='12' AND `week`='3' AND `car_owner`='$id'";
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
                        <!--<td style="background: #0D6EFD;">
                            <?php
                            $query = "SELECT SUM(payments) As sumOf61 FROM drivers WHERE `month`='12' AND `week`='3' AND `car_owner`='$id'";
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
                        </td>-->
                        <td style="background: red;">
                            <?php
                            $query = "SELECT SUM(discounts) As sumOf63 FROM drivers WHERE `month`='12' AND `week`='3' AND `car_owner`='$id'";
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
                            $query = "SELECT SUM(salary) As sumOf61 FROM drivers WHERE `month`='12' AND `week`='3' AND `car_owner`='$id'";
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
                            $query = "SELECT SUM(payload_total) As sumOf FROM drivers WHERE `month`='12' AND `week`='3' AND `car_owner`='$id'";
                            $query2 = "SELECT SUM(trip_total) As sumOfIn FROM drivers WHERE `month`='12' AND `week`='3' AND `car_owner`='$id'";
                            $query3 = "SELECT SUM(diesel) As sumOfTo FROM drivers WHERE `month`='12' AND `week`='3'";
                            $query4 = "SELECT SUM(service_value) As sumOfFor FROM drivers WHERE `month`='12' AND `week`='3' AND `car_owner`='$id'";
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
                            $query = "SELECT SUM(payload_total) As sumOf64 FROM drivers WHERE `month`='12' AND `week`='4' AND `car_owner`='$id'";
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
                            $query = "SELECT SUM(service_value) As sumOf64 FROM drivers WHERE `month`='12' AND `week`='4' AND `car_owner`='$id'";
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
                            $query = "SELECT SUM(diesel) As sumOf64 FROM drivers WHERE `month`='12' AND `week`='4' AND `car_owner`='$id'";
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
                            $query = "SELECT SUM(trip_total) As sumOf64 FROM drivers WHERE `month`='12' AND `week`='4' AND `car_owner`='$id'";
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
                        <!--<td style="background: #0D6EFD;">
                            <?php
                            $query = "SELECT SUM(payments) As sumOf61 FROM drivers WHERE `month`='12' AND `week`='4' AND `car_owner`='$id'";
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
                        </td>-->
                        <td style="background: red;">
                            <?php
                            $query = "SELECT SUM(discounts) As sumOf64 FROM drivers WHERE `month`='12' AND `week`='4' AND `car_owner`='$id'";
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
                            $query = "SELECT SUM(salary) As sumOf61 FROM drivers WHERE `month`='12' AND `week`='4' AND `car_owner`='$id'";
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
                            $query = "SELECT SUM(payload_total) As sumOf FROM drivers WHERE `month`='12' AND `week`='4' AND `car_owner`='$id'";
                            $query2 = "SELECT SUM(trip_total) As sumOfIn FROM drivers WHERE `month`='12' AND `week`='4' AND `car_owner`='$id'";
                            $query3 = "SELECT SUM(diesel) As sumOfTo FROM drivers WHERE `month`='12' AND `week`='4'";
                            $query4 = "SELECT SUM(service_value) As sumOfFor FROM drivers WHERE `month`='12' AND `week`='4' AND `car_owner`='$id'";
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
            </div>
        </div>
        <a href="#" onclick="history.back()">
            العودة للخلف
        </a>
        <h4>
            القيمة الإجمالية (
            <?php
                $total = 0;
                echo $id;
                // $query = "SELECT SUM(payload_total) As sumOf FROM drivers WHERE `car_owner`='$id'";
                // $query = "SELECT SUM(`quantity`*`carrier_price`) As sumOf FROM download_card WHERE customer_name='$id'";
                $query = "SELECT SUM(`quantity`*`customer_price`) As sumOf FROM download_card WHERE customer_name='$id'";
                /*$query2 = "SELECT SUM(trip_total) As sumOfIn FROM drivers WHERE `car_owner`='$id'";
                $query3 = "SELECT SUM(diesel) As sumOfTo FROM drivers WHERE `car_owner`='$id'";
                $query4 = "SELECT SUM(service_value) As sumOfFor FROM drivers WHERE `car_owner`='$id'";
                $query13 = "SELECT SUM(salary) As sumOfs1 FROM drivers WHERE `car_owner`='$id'";
                $result2 = mysqli_query($conn, $query2);
                $result3 = mysqli_query($conn, $query3);
                $result4 = mysqli_query($conn, $query4);
                $result13 = mysqli_query($conn, $query13);*/
                $result = mysqli_query($conn, $query);
                                    
                while ($row = mysqli_fetch_assoc($result)) {
                    /*while ($row2 = mysqli_fetch_assoc($result2)) {
                        while ($row3 = mysqli_fetch_assoc($result3)) {
                            while ($row4 = mysqli_fetch_assoc($result4)) {
                                while ($row13 = mysqli_fetch_assoc($result13)) {*/
                                                    
                // $total = (($row['sumOf'] - ($row2['sumOfIn'] + $row3['sumOfTo'] + $row4['sumOfFor'])) - $row13['sumOfs1']);
                $total = ($row['sumOf']);
                                    if ($total != 0) {
                                        echo '&nbsp;) &nbsp; = الإجمالي + القيمة المضافة <br>';
                                        echo '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; = ';
                                        echo number_format($total, 2);
                                        echo '&nbsp; + &nbsp;';
                                        echo number_format($total*0.15, 2);
                                        echo '<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; = &nbsp;';
                                        echo number_format(($total) + ($total*0.15), 2);
                                    }
                                    else {
                                        echo '' . '0.00';
                                    }
                                                                            
                                /*}
                            }
                        }
                    }*/
                }
            ?>
            <a style="color: #198754; font-size: 16px;">ريال سعودي</a>
        </h4>
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
    <script language="javascript" type="text/javascript">
        document.addEventListener("keydown", e => {
          	e.preventDefault();
          	if (e.key.toLowerCase() === "l" && e.ctrlKey) {
                window.open('https://mkh888.000webhostapp.com/layouts/clock/index.php', '_SELF');
            }
            // console.log(e);
        });
    </script>
</body>
</html>

<?php 
/*}else{
     header("Location: index.php");
     exit();
}*/
 ?>