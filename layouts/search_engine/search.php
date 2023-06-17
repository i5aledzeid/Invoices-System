<?php
    include "../../db_conn.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Search</title>
    <!-- bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <!-- font awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style>
        * {
            direction: rtl;
        }
    </style>
</head>
<body>
    <div class="container my-5">
        <!--<input type="text" placeholder="إبحث عن أي شيء؟" name="search" disabled>-->
        <form action="" method="post" class="row g-3">
            <div class="col-1">
                <input type="text" readonly class="form-control-plaintext" id="staticEmail2" value="إبحث:">
            </div>
            <div class="col-3">
                <label for="inputPassword2" class="visually-hidden">Search</label>
                <input type="text" class="form-control" id="inputPassword2" placeholder="إبحث عن إسم السائق..." name="driver_name">
                <input type="text" class="form-control" id="inputPassword2" placeholder="إبحث عن رقم السيارة..." name="car_number">
            </div>
            <div class="col-3">
                <button type="submit" class="btn btn-primary mb-3" name="submit">إبحث</button>
            </div>
        </form>

        <form action="" method="post" class="row g-3">
            <div class="col-1">
                <input type="text" readonly class="form-control-plaintext" id="staticEmail2" value="إبحث:">
            </div>
            <div class="col-3">
                <label for="inputPassword2" class="visually-hidden">Search</label>
                <input type="text" class="form-control" id="inputPassword2" placeholder="إبحث عن الشهر..." name="month">
                <input type="text" class="form-control" id="inputPassword2" placeholder="إبحث عن الأسبوع..." name="week">
            </div>
            <div class="col-3">
                <button type="submit" class="btn btn-primary mb-3" name="submit">إبحث</button>
            </div>
        </form><br>

        <div class="container">البحث بإسم السائق ورقم السيارة
            <table class="table">
                <?php
                    echo '
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>إسم السائق</th>
                                <th>رقم السيارة</th>
                                <th>الشهر</th>
                                <th>الأسبوع</th>
                                <th>المصنع</th>
                                <th>إجمالي الحمولة</th>
                                <th>إجمالي الخدمة</th>
                                <th>إجمالي التربات</th>
                            </tr>
                        </thead>
                    ';
                    if (isset($_POST['submit'])) {
                        $driver_name = $_POST['driver_name'];
                        $car_number = $_POST['car_number'];

                        // $factory = $_POST['factory'];
                        $sql = "SELECT SUM(payload_total) As value_sum FROM `drivers` WHERE `driver_name` LIKE '%$driver_name%' OR `car_number`='$car_number'";
                        $result = mysqli_query($conn, $sql);
                        $row = mysqli_fetch_assoc($result); 

                        $sql2 = "SELECT SUM(service_value) As value_sum2 FROM `drivers` WHERE `driver_name` LIKE '%$driver_name%' OR `car_number`='$car_number'";
                        $result2 = mysqli_query($conn, $sql2);
                        $row2 = mysqli_fetch_assoc($result2); 

                        $sql3 = "SELECT SUM(trip_total) As value_sum3 FROM `drivers` WHERE `driver_name` LIKE '%$driver_name%' OR `car_number`='$car_number'";
                        $result3 = mysqli_query($conn, $sql3);
                        $row3 = mysqli_fetch_assoc($result3);

                        $i = 0;
                            echo '
                            <tbody>
                                <tr>
                                    <td>' . $i++ . '</td>
                                    <td>' . $driver_name . '</td>
                                    <td>' . $car_number . '</td>
                                    <td>' . $month . '</td>
                                    <td>' . $week . '</td>
                                    <td>' . '$factory' . '</td>
                                    <td>' . $sum = $row['value_sum'] . '</td>
                                    <td>' . $sum = $row2['value_sum2'] . '</td>
                                    <td>' . $sum = $row3['value_sum3'] . '</td>
                                </tr>
                            </tbody>
                            ';
                        
                    }
                ?>
            </table>
        </div><br>

        <div class="container">البحث بالشهر والأسبوع
            <table class="table">
                <?php
                    echo '
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>إسم السائق</th>
                                <th>رقم السيارة</th>
                                <th>الشهر</th>
                                <th>الأسبوع</th>
                                <th>المصنع</th>
                                <th>إجمالي الحمولة</th>
                                <th>إجمالي الخدمة</th>
                                <th>إجمالي التربات</th>
                            </tr>
                        </thead>
                    ';
                    if (isset($_POST['submit'])) {
                        // $driver_name = $_POST['driver_name'];
                        // $car_number = $_POST['car_number'];

                        ///////////////////// MONTH & WEEK /////////////////////////
                        $month = $_POST['month'];
                        $week = $_POST['week'];
                        ///////////////////// MONTH & WEEK /////////////////////////

                        // $factory = $_POST['factory'];
                        /*$sql = "SELECT SUM(payload_total) As value_sum FROM `drivers` WHERE `driver_name` LIKE '%$driver_name%' OR `car_number`='$car_number'";
                        $result = mysqli_query($conn, $sql);
                        $row = mysqli_fetch_assoc($result); 

                        $sql2 = "SELECT SUM(service_value) As value_sum2 FROM `drivers` WHERE `driver_name` LIKE '%$driver_name%' OR `car_number`='$car_number'";
                        $result2 = mysqli_query($conn, $sql2);
                        $row2 = mysqli_fetch_assoc($result2); 

                        $sql3 = "SELECT SUM(trip_total) As value_sum3 FROM `drivers` WHERE `driver_name` LIKE '%$driver_name%' OR `car_number`='$car_number'";
                        $result3 = mysqli_query($conn, $sql3);
                        $row3 = mysqli_fetch_assoc($result3);*/

                        ///////////////////// MONTH & WEEK /////////////////////////
                        $sql4 = "SELECT SUM(payload_total) As value_sum4 FROM `drivers` WHERE `month`='$month' AND `week`='$week'";
                        $result4 = mysqli_query($conn, $sql4);
                        $row4 = mysqli_fetch_assoc($result4);

                        $sql5 = "SELECT SUM(service_value) As value_sum5 FROM `drivers` WHERE `month`='$month' AND `week`='$week'";
                        $result5 = mysqli_query($conn, $sql5);
                        $row5 = mysqli_fetch_assoc($result5);

                        $sql6 = "SELECT SUM(trip_total) As value_sum6 FROM `drivers` WHERE `month`='$month' AND `week`='$week'";
                        $result6 = mysqli_query($conn, $sql6);
                        $row6 = mysqli_fetch_assoc($result6);
                        ///////////////////// MONTH & WEEK /////////////////////////

                        $i = 0;
                            echo '
                            <tbody>
                                <tr>
                                    <td>' . $i++ . '</td>
                                    <td>' . $driver_name . '</td>
                                    <td>' . $car_number . '</td>
                                    <td>' . $month . '</td>
                                    <td>' . $week . '</td>
                                    <td>' . '$factory' . '</td>
                                    <td>' . $sum = $row4['value_sum4'] . '</td>
                                    <td>' . $sum = $row5['value_sum5'] . '</td>
                                    <td>' . $sum = $row6['value_sum6'] . '</td>
                                </tr>
                            </tbody>
                            ';
                        
                    }
                ?>
            </table>
        </div>

        <div class="conatiner my-5">البحث بإسم السائق ورقم السيارة
            <table class="table">
                <?php
                    /*if (isset($_POST['submit'])) {
                        $search = $_POST['search'];
                        $month = $_POST['month'];
                        // SELECT `payload_total` FROM `drivers` WHERE `month`=1;
                        // $sql = "SELECT * FROM `drivers` WHERE id='$search'";
                        $sql = "SELECT $search FROM `drivers` WHERE `month`='$month'";
                        $result = mysqli_query($conn, $sql);
                        if ($result) {
                            $num = mysqli_num_rows($result);
                            if ($num != 0) {
                                echo $num;
                            }
                            else {
                                echo "Data not found!";
                            }
                        }
                    }*/
                    
                    if (isset($_POST['submit'])) {
                        // $search = $_POST['search'];
                        // $driver_name = $_POST['driver_name'];
                        // $sql = "SELECT $search FROM `drivers` WHERE `month`='$month' OR id='$search'";
                        // $sql = "SELECT $search FROM `drivers` WHERE `month` LIKE '%$month%'";
                        // $sql = "SELECT $search FROM `drivers` WHERE `month`='$month' OR `week`='$week'";
                        $sql = "SELECT * FROM `drivers` WHERE `driver_name` LIKE '%$driver_name%' OR `car_number`='$driver_name'";
                        $result = mysqli_query($conn, $sql);
                        if ($result) {
                            if (mysqli_num_rows($result) > 0) {
                                echo '
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>إسم السائق</th>
                                            <th>رقم السيارة</th>
                                            <th>الشهر</th>
                                            <th>الأسبوع</th>
                                            <th>المصنع</th>
                                            <th>الحمولة</th>
                                            <th>الخدمة</th>
                                            <th>التربات</th>
                                        </tr>
                                    </thead>
                                ';
                                while ($row = mysqli_fetch_assoc($result)) {
                                    echo '
                                        <tbody>
                                            <tr>
                                                <td>' . $row['id'] . '</td>
                                                <td>' . $row['driver_name'] . '</td>
                                                <td>' . $row['car_number'] . '</td>
                                                <td>' . $row['month'] . '</td>
                                                <td>' . $row['week'] . '</td>
                                                <td>' . $row['factory'] . '</td>
                                                <td>' . $row['payload_total'] . '</td>
                                                <td>' . $row['service_value'] . '</td>
                                                <td>' . $row['trip_total'] . '</td>
                                            </tr>
                                        </tbody>
                                    ';
                                }
                            }
                            else {
                                echo '
                                    <h2 style="color: red;">البيانات غير متوفرة!</h2>
                                ';
                            }
                        }
                    }
                ?>
            </table>
        </div>

        <div class="conatiner my-5">البحث بالشهر والأسبوع
            <table class="table">
                <?php
                    /*if (isset($_POST['submit'])) {
                        $search = $_POST['search'];
                        $month = $_POST['month'];
                        // SELECT `payload_total` FROM `drivers` WHERE `month`=1;
                        // $sql = "SELECT * FROM `drivers` WHERE id='$search'";
                        $sql = "SELECT $search FROM `drivers` WHERE `month`='$month'";
                        $result = mysqli_query($conn, $sql);
                        if ($result) {
                            $num = mysqli_num_rows($result);
                            if ($num != 0) {
                                echo $num;
                            }
                            else {
                                echo "Data not found!";
                            }
                        }
                    }*/
                    
                    if (isset($_POST['submit'])) {
                        // $search = $_POST['search'];
                        // $driver_name = $_POST['driver_name'];
                        // $sql = "SELECT $search FROM `drivers` WHERE `month`='$month' OR id='$search'";
                        // $sql = "SELECT $search FROM `drivers` WHERE `month` LIKE '%$month%'";
                        // $sql = "SELECT $search FROM `drivers` WHERE `month`='$month' OR `week`='$week'";
                        $sql = "SELECT * FROM `drivers` WHERE `driver_name` LIKE '%$driver_name%' OR `car_number`='$driver_name'";
                        $result = mysqli_query($conn, $sql);
                        if ($result) {
                            if (mysqli_num_rows($result) > 0) {
                                echo '
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>إسم السائق</th>
                                            <th>رقم السيارة</th>
                                            <th>الشهر</th>
                                            <th>الأسبوع</th>
                                            <th>المصنع</th>
                                            <th>الحمولة</th>
                                            <th>الخدمة</th>
                                            <th>التربات</th>
                                        </tr>
                                    </thead>
                                ';
                                while ($row = mysqli_fetch_assoc($result)) {
                                    echo '
                                        <tbody>
                                            <tr>
                                                <td>' . $row['id'] . '</td>
                                                <td>' . $row['driver_name'] . '</td>
                                                <td>' . $row['car_number'] . '</td>
                                                <td>' . $row['month'] . '</td>
                                                <td>' . $row['week'] . '</td>
                                                <td>' . $row['factory'] . '</td>
                                                <td>' . $row['payload_total'] . '</td>
                                                <td>' . $row['service_value'] . '</td>
                                                <td>' . $row['trip_total'] . '</td>
                                            </tr>
                                        </tbody>
                                    ';
                                }
                            }
                            else {
                                echo '
                                    <h2 style="color: red;">البيانات غير متوفرة!</h2>
                                ';
                            }
                        }
                    }
                ?>
            </table>
        </div>
    </div>
</body>
</html>