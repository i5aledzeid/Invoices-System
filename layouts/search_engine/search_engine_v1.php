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
            font-size: 10px;
        }
    </style>
</head>
<body>
    <div class="container text-center"><br>
        <div class="row">
            <form action="" method="post" class="row g-3">
                <div class="col-4 col-sm-1" style="padding-left: 8px; padding-right: 8px; width: 120px">
                    <input type="text" class="form-control border border-success" id="inputPassword2" placeholder="إبحث عن الإي دي ..." name="search">
                </div>
                <div class="col-4 col-sm-2" style="padding-left: 8px; padding-right: 8px; width: 180px">
                    <input type="text" class="form-control border border-danger-subtle" id="inputPassword2" placeholder="إبحث عن صاحب السيارة ..." name="car_owner">
                </div>
                <div class="col-4 col-sm-2" style="padding-left: 8px; padding-right: 8px; width: 160px">
                    <input type="text" class="form-control border border-warning" id="inputPassword2" placeholder="إبحث عن إسم السائق..." name="driver_name">
                </div>
                <div class="col-4 col-sm-1" style="padding-left: 8px; padding-right: 8px; width: 160px">
                    <input type="text" class="form-control border border-danger" id="inputPassword2" placeholder="إبحث عن رقم السيارة..." name="car_number">
                </div>
                <div class="col-4 col-sm-2" style="padding-left: 8px; padding-right: 8px; width: 160px">
                    <input type="text" class="form-control border border-primary" id="inputPassword2" placeholder="إبحث عن الشهر..." name="month">
                </div>
                <div class="col-4 col-sm-2" style="padding-left: 8px; padding-right: 8px; width: 160px">
                    <input type="text" class="form-control border border-primary" id="inputPassword2" placeholder="إبحث عن الأسبوع..." name="week">
                </div>
                <div class="col-4 col-sm-2">
                    <button type="submit" style="padding-left: 32px; padding-right: 32px;" class="btn btn-primary mb-3" name="submit">إبحث</button>
                </div>
            </form>
            <!-- TABLE -->
            <div class="container my-5">
                <table class="table">
                    <?php
                        if (isset($_POST['submit'])) {
                            $search = $_POST['search'];
                            $car_owner = $_POST['car_owner'];
                            $driver_name = $_POST['driver_name'];
                            $car_number = $_POST['car_number'];
                            $month = $_POST['month'];
                            $week = $_POST['week'];
                            if ($search != "") {
                                $sql = "SELECT * FROM `drivers` WHERE id='$search'";
                                $result = mysqli_query($conn, $sql);
                                if ($result) {
                                    // $num = mysqli_num_rows($result);
                                    // echo $num;
                                    if (mysqli_num_rows($result) > 0) {
                                        echo '
                                            <thead>
                                                <tr>
                                                    <th scope="col" style="color: green;">#</th>
                                                    <th scope="col-6">رقم السيارة</th>
                                                    <th scope="col">المصنع</th>
                                                    <th scope="col">صاحب السيارة</th>
                                                    <th scope="col">السائق</th>
                                                    <th scope="col">الترب</th>
                                                    <th scope="col">سعره</th>
                                                    <th scope="col">الإجمالي</th>
                                                    <th scope="col">ديزل</th>
                                                    <th scope="col">نوع الخدمة</th>
                                                    <th scope="col">قيمةالخدمة</th>
                                                    <th scope="col">الحمولة</th>
                                                    <th scope="col">سعر</th>
                                                    <th scope="col">الإجمالي</th>
                                                    <th scope="col">خصومات</th>
                                                    <th scope="col">دفعات</th>
                                                    <th scope="col">التاريخ</th>
                                                    <th scope="col">شهر</th>
                                                    <th scope="col">أسبوع</th>
                                                    <th scope="col">الراتب</th>
                                                </tr>
                                            </thead>
                                        ';
                                        $row = mysqli_fetch_assoc($result);
                                        echo '
                                            <tbody>
                                                <tr>
                                                    <td style="color: green;">' . $row['id'] . '</td>
                                                    <td scope="col-6">' . $row['car_number'] . '</td>
                                                    <td scope="col">' . $row['factory'] . '</td>
                                                    <td scope="col">' . $row['car_owner'] . '</td>
                                                    <td scope="col">' . $row['driver_name'] . '</td>
                                                    <td scope="col">' . $row['trip'] . '</td>
                                                    <td scope="col">' . $row['trip_value'] . '</td>
                                                    <td scope="col">' . $row['trip_total'] . '</td>
                                                    <td scope="col">' . $row['diesel'] . '</td>
                                                    <td scope="col">' . $row['service_type'] . '</td>
                                                    <td scope="col">' . $row['service_value'] . '</td>
                                                    <td scope="col">' . $row['payload'] . '</td>
                                                    <td scope="col">' . $row['payload_price'] . '</td>
                                                    <td scope="col">' . $row['payload_total'] . '</td>
                                                    <td scope="col">' . $row['discounts'] . '</td>
                                                    <td scope="col">' . $row['payments'] . '</td>
                                                    <td scope="col">' . $row['date'] . '</td>
                                                    <td scope="col">' . $row['month'] . '</td>
                                                    <td scope="col">' . $row['week'] . '</td>
                                                    <td scope="col">' . $row['salary'] . '</td>
                                                </tr>
                                            </tbody>
                                        ';
                                    }
                                    else {
                                        echo '<h2 class="text-danger">Data not found!</h2>';
                                    }
                                }
                            }
                            else if ($car_owner != "") {
                                $sql = "SELECT * FROM `drivers` WHERE `car_owner`='$car_owner'";
                                $result = mysqli_query($conn, $sql);
                                if ($result) {
                                    // $num = mysqli_num_rows($result);
                                    // echo $num;
                                    if (mysqli_num_rows($result) > 0) {
                                        echo '
                                            <thead>
                                                <tr>
                                                    <th scope="col">#</th>
                                                    <th scope="col-6">رقم السيارة</th>
                                                    <th scope="col">المصنع</th>
                                                    <th scope="col" style="color: #F1AEB5;">صاحب السيارة</th>
                                                    <th scope="col">السائق</th>
                                                    <th scope="col">الترب</th>
                                                    <th scope="col">سعره</th>
                                                    <th scope="col">الإجمالي</th>
                                                    <th scope="col">ديزل</th>
                                                    <th scope="col">نوع الخدمة</th>
                                                    <th scope="col">قيمةالخدمة</th>
                                                    <th scope="col">الحمولة</th>
                                                    <th scope="col">سعر</th>
                                                    <th scope="col">الإجمالي</th>
                                                    <th scope="col">خصومات</th>
                                                    <th scope="col">دفعات</th>
                                                    <th scope="col">التاريخ</th>
                                                    <th scope="col">شهر</th>
                                                    <th scope="col">أسبوع</th>
                                                    <th scope="col">الراتب</th>
                                                </tr>
                                            </thead>
                                        ';
                                        while ($row = mysqli_fetch_assoc($result)) {
                                            echo '
                                                <tbody>
                                                    <tr>
                                                        <td>' . $row['id'] . '</td>
                                                        <td scope="col-6">' . $row['car_number'] . '</td>
                                                        <td scope="col">' . $row['factory'] . '</td>
                                                        <td scope="col" style="color: #F1AEB5;">' . $row['car_owner'] . '</td>
                                                        <td scope="col">' . $row['driver_name'] . '</td>
                                                        <td scope="col">' . $row['trip'] . '</td>
                                                        <td scope="col">' . $row['trip_value'] . '</td>
                                                        <td scope="col">' . $row['trip_total'] . '</td>
                                                        <td scope="col">' . $row['diesel'] . '</td>
                                                        <td scope="col">' . $row['service_type'] . '</td>
                                                        <td scope="col">' . $row['service_value'] . '</td>
                                                        <td scope="col">' . $row['payload'] . '</td>
                                                        <td scope="col">' . $row['payload_price'] . '</td>
                                                        <td scope="col">' . $row['payload_total'] . '</td>
                                                        <td scope="col">' . $row['discounts'] . '</td>
                                                        <td scope="col">' . $row['payments'] . '</td>
                                                        <td scope="col">' . $row['date'] . '</td>
                                                        <td scope="col">' . $row['month'] . '</td>
                                                        <td scope="col">' . $row['week'] . '</td>
                                                        <td scope="col">' . $row['salary'] . '</td>
                                                    </tr>
                                                </tbody>
                                            ';
                                        }
                                    }
                                    else {
                                        echo '<h2 class="text-danger">Data not found!</h2>';
                                    }
                                }
                            }
                            else if ($month != "" & $week != "") {
                                $sql = "SELECT * FROM `drivers` WHERE `month`='$month' AND `week`='$week'";
                                $result = mysqli_query($conn, $sql);
                                if ($result) {
                                    // $num = mysqli_num_rows($result);
                                    // echo $num;
                                    if (mysqli_num_rows($result) > 0) {
                                        echo '
                                            <thead>
                                                <tr>
                                                    <th scope="col">#</th>
                                                    <th scope="col-6">رقم السيارة</th>
                                                    <th scope="col">المصنع</th>
                                                    <th scope="col">صاحب السيارة</th>
                                                    <th scope="col">السائق</th>
                                                    <th scope="col">الترب</th>
                                                    <th scope="col">سعره</th>
                                                    <th scope="col">الإجمالي</th>
                                                    <th scope="col">ديزل</th>
                                                    <th scope="col">نوع الخدمة</th>
                                                    <th scope="col">قيمةالخدمة</th>
                                                    <th scope="col">الحمولة</th>
                                                    <th scope="col">سعر</th>
                                                    <th scope="col">الإجمالي</th>
                                                    <th scope="col">خصومات</th>
                                                    <th scope="col">دفعات</th>
                                                    <th scope="col">التاريخ</th>
                                                    <th scope="col" style="color: #0D6EFD;">شهر</th>
                                                    <th scope="col" style="color: #0DCAF0;">أسبوع</th>
                                                    <th scope="col">الراتب</th>
                                                </tr>
                                            </thead>
                                        ';
                                        while ($row = mysqli_fetch_assoc($result)) {
                                            echo '
                                                <tbody>
                                                    <tr>
                                                        <td>' . $row['id'] . '</td>
                                                        <td scope="col-6">' . $row['car_number'] . '</td>
                                                        <td scope="col">' . $row['factory'] . '</td>
                                                        <td scope="col">' . $row['car_owner'] . '</td>
                                                        <td scope="col">' . $row['driver_name'] . '</td>
                                                        <td scope="col">' . $row['trip'] . '</td>
                                                        <td scope="col">' . $row['trip_value'] . '</td>
                                                        <td scope="col">' . $row['trip_total'] . '</td>
                                                        <td scope="col">' . $row['diesel'] . '</td>
                                                        <td scope="col">' . $row['service_type'] . '</td>
                                                        <td scope="col">' . $row['service_value'] . '</td>
                                                        <td scope="col">' . $row['payload'] . '</td>
                                                        <td scope="col">' . $row['payload_price'] . '</td>
                                                        <td scope="col">' . $row['payload_total'] . '</td>
                                                        <td scope="col">' . $row['discounts'] . '</td>
                                                        <td scope="col">' . $row['payments'] . '</td>
                                                        <td scope="col">' . $row['date'] . '</td>
                                                        <td scope="col" style="color: #0D6EFD;">' . $row['month'] . '</td>
                                                        <td scope="col" style="color: #0DCAF0;">' . $row['week'] . '</td>
                                                        <td scope="col">' . $row['salary'] . '</td>
                                                    </tr>
                                                </tbody>
                                            ';
                                        }
                                    }
                                    else {
                                        echo '<h2 class="text-danger">Data not found!</h2>';
                                    }
                                }
                            }
                            else if ($month != "") {
                                $sql = "SELECT * FROM `drivers` WHERE `month`='$month'";
                                $result = mysqli_query($conn, $sql);
                                if ($result) {
                                    // $num = mysqli_num_rows($result);
                                    // echo $num;
                                    if (mysqli_num_rows($result) > 0) {
                                        echo '
                                            <thead>
                                                <tr>
                                                    <th scope="col">#</th>
                                                    <th scope="col-6">رقم السيارة</th>
                                                    <th scope="col">المصنع</th>
                                                    <th scope="col">صاحب السيارة</th>
                                                    <th scope="col">السائق</th>
                                                    <th scope="col">الترب</th>
                                                    <th scope="col">سعره</th>
                                                    <th scope="col">الإجمالي</th>
                                                    <th scope="col">ديزل</th>
                                                    <th scope="col">نوع الخدمة</th>
                                                    <th scope="col">قيمةالخدمة</th>
                                                    <th scope="col">الحمولة</th>
                                                    <th scope="col">سعر</th>
                                                    <th scope="col">الإجمالي</th>
                                                    <th scope="col">خصومات</th>
                                                    <th scope="col">دفعات</th>
                                                    <th scope="col">التاريخ</th>
                                                    <th scope="col" style="color: #0D6EFD;">شهر</th>
                                                    <th scope="col">أسبوع</th>
                                                    <th scope="col">الراتب</th>
                                                </tr>
                                            </thead>
                                        ';
                                        while ($row = mysqli_fetch_assoc($result)) {
                                            echo '
                                                <tbody>
                                                    <tr>
                                                        <td>' . $row['id'] . '</td>
                                                        <td scope="col-6">' . $row['car_number'] . '</td>
                                                        <td scope="col">' . $row['factory'] . '</td>
                                                        <td scope="col">' . $row['car_owner'] . '</td>
                                                        <td scope="col">' . $row['driver_name'] . '</td>
                                                        <td scope="col">' . $row['trip'] . '</td>
                                                        <td scope="col">' . $row['trip_value'] . '</td>
                                                        <td scope="col">' . $row['trip_total'] . '</td>
                                                        <td scope="col">' . $row['diesel'] . '</td>
                                                        <td scope="col">' . $row['service_type'] . '</td>
                                                        <td scope="col">' . $row['service_value'] . '</td>
                                                        <td scope="col">' . $row['payload'] . '</td>
                                                        <td scope="col">' . $row['payload_price'] . '</td>
                                                        <td scope="col">' . $row['payload_total'] . '</td>
                                                        <td scope="col">' . $row['discounts'] . '</td>
                                                        <td scope="col">' . $row['payments'] . '</td>
                                                        <td scope="col">' . $row['date'] . '</td>
                                                        <td scope="col" style="color: #0D6EFD;">' . $row['month'] . '</td>
                                                        <td scope="col">' . $row['week'] . '</td>
                                                        <td scope="col">' . $row['salary'] . '</td>
                                                    </tr>
                                                </tbody>
                                            ';
                                        }
                                    }
                                    else {
                                        echo '<h2 class="text-danger">Data not found!</h2>';
                                    }
                                }
                            }
                            else if ($week != "") {
                                $sql = "SELECT * FROM `drivers` WHERE `week`='$week'";
                                $result = mysqli_query($conn, $sql);
                                if ($result) {
                                    // $num = mysqli_num_rows($result);
                                    // echo $num;
                                    if (mysqli_num_rows($result) > 0) {
                                        echo '
                                            <thead>
                                                <tr>
                                                    <th scope="col">#</th>
                                                    <th scope="col-6">رقم السيارة</th>
                                                    <th scope="col">المصنع</th>
                                                    <th scope="col">صاحب السيارة</th>
                                                    <th scope="col">السائق</th>
                                                    <th scope="col">الترب</th>
                                                    <th scope="col">سعره</th>
                                                    <th scope="col">الإجمالي</th>
                                                    <th scope="col">ديزل</th>
                                                    <th scope="col">نوع الخدمة</th>
                                                    <th scope="col">قيمةالخدمة</th>
                                                    <th scope="col">الحمولة</th>
                                                    <th scope="col">سعر</th>
                                                    <th scope="col">الإجمالي</th>
                                                    <th scope="col">خصومات</th>
                                                    <th scope="col">دفعات</th>
                                                    <th scope="col">التاريخ</th>
                                                    <th scope="col">شهر</th>
                                                    <th scope="col" style="color: #0DCAF0;">أسبوع</th>
                                                    <th scope="col">الراتب</th>
                                                </tr>
                                            </thead>
                                        ';
                                        while ($row = mysqli_fetch_assoc($result)) {
                                            echo '
                                                <tbody>
                                                    <tr>
                                                        <td>' . $row['id'] . '</td>
                                                        <td scope="col-6">' . $row['car_number'] . '</td>
                                                        <td scope="col">' . $row['factory'] . '</td>
                                                        <td scope="col">' . $row['car_owner'] . '</td>
                                                        <td scope="col">' . $row['driver_name'] . '</td>
                                                        <td scope="col">' . $row['trip'] . '</td>
                                                        <td scope="col">' . $row['trip_value'] . '</td>
                                                        <td scope="col">' . $row['trip_total'] . '</td>
                                                        <td scope="col">' . $row['diesel'] . '</td>
                                                        <td scope="col">' . $row['service_type'] . '</td>
                                                        <td scope="col">' . $row['service_value'] . '</td>
                                                        <td scope="col">' . $row['payload'] . '</td>
                                                        <td scope="col">' . $row['payload_price'] . '</td>
                                                        <td scope="col">' . $row['payload_total'] . '</td>
                                                        <td scope="col">' . $row['discounts'] . '</td>
                                                        <td scope="col">' . $row['payments'] . '</td>
                                                        <td scope="col">' . $row['date'] . '</td>
                                                        <td scope="col">' . $row['month'] . '</td>
                                                        <td scope="col" style="color: #0DCAF0;">' . $row['week'] . '</td>
                                                        <td scope="col">' . $row['salary'] . '</td>
                                                    </tr>
                                                </tbody>
                                            ';
                                        }
                                    }
                                    else {
                                        echo '<h2 class="text-danger">Data not found!</h2>';
                                    }
                                }
                            }
                            else if ($driver_name != "") {
                                $sql = "SELECT * FROM `drivers` WHERE `driver_name`='$driver_name'";
                                $result = mysqli_query($conn, $sql);
                                if ($result) {
                                    // $num = mysqli_num_rows($result);
                                    // echo $num;
                                    if (mysqli_num_rows($result) > 0) {
                                        echo '
                                            <thead>
                                                <tr>
                                                    <th scope="col">#</th>
                                                    <th scope="col-6">رقم السيارة</th>
                                                    <th scope="col">المصنع</th>
                                                    <th scope="col">صاحب السيارة</th>
                                                    <th scope="col" style="color: #FFC107;">السائق</th>
                                                    <th scope="col">الترب</th>
                                                    <th scope="col">سعره</th>
                                                    <th scope="col">الإجمالي</th>
                                                    <th scope="col">ديزل</th>
                                                    <th scope="col">نوع الخدمة</th>
                                                    <th scope="col">قيمةالخدمة</th>
                                                    <th scope="col">الحمولة</th>
                                                    <th scope="col">سعر</th>
                                                    <th scope="col">الإجمالي</th>
                                                    <th scope="col">خصومات</th>
                                                    <th scope="col">دفعات</th>
                                                    <th scope="col">التاريخ</th>
                                                    <th scope="col">شهر</th>
                                                    <th scope="col">أسبوع</th>
                                                    <th scope="col">الراتب</th>
                                                </tr>
                                            </thead>
                                        ';
                                        while ($row = mysqli_fetch_assoc($result)) {
                                            echo '
                                                <tbody>
                                                    <tr>
                                                        <td>' . $row['id'] . '</td>
                                                        <td scope="col-6">' . $row['car_number'] . '</td>
                                                        <td scope="col">' . $row['factory'] . '</td>
                                                        <td scope="col">' . $row['car_owner'] . '</td>
                                                        <td scope="col" style="color: #FFC107;">' . $row['driver_name'] . '</td>
                                                        <td scope="col">' . $row['trip'] . '</td>
                                                        <td scope="col">' . $row['trip_value'] . '</td>
                                                        <td scope="col">' . $row['trip_total'] . '</td>
                                                        <td scope="col">' . $row['diesel'] . '</td>
                                                        <td scope="col">' . $row['service_type'] . '</td>
                                                        <td scope="col">' . $row['service_value'] . '</td>
                                                        <td scope="col">' . $row['payload'] . '</td>
                                                        <td scope="col">' . $row['payload_price'] . '</td>
                                                        <td scope="col">' . $row['payload_total'] . '</td>
                                                        <td scope="col">' . $row['discounts'] . '</td>
                                                        <td scope="col">' . $row['payments'] . '</td>
                                                        <td scope="col">' . $row['date'] . '</td>
                                                        <td scope="col">' . $row['month'] . '</td>
                                                        <td scope="col">' . $row['week'] . '</td>
                                                        <td scope="col">' . $row['salary'] . '</td>
                                                    </tr>
                                                </tbody>
                                            ';
                                        }
                                    }
                                    else {
                                        echo '<h2 class="text-danger">Data not found!</h2>';
                                    }
                                }
                            }
                            else if ($car_number != "") {
                                $sql = "SELECT * FROM `drivers` WHERE `car_number`='$car_number'";
                                $result = mysqli_query($conn, $sql);
                                if ($result) {
                                    // $num = mysqli_num_rows($result);
                                    // echo $num;
                                    if (mysqli_num_rows($result) > 0) {
                                        echo '
                                            <thead>
                                                <tr>
                                                    <th scope="col">#</th>
                                                    <th scope="col-6" style="color: #DC3545;">رقم السيارة</th>
                                                    <th scope="col">المصنع</th>
                                                    <th scope="col">صاحب السيارة</th>
                                                    <th scope="col">السائق</th>
                                                    <th scope="col">الترب</th>
                                                    <th scope="col">سعره</th>
                                                    <th scope="col">الإجمالي</th>
                                                    <th scope="col">ديزل</th>
                                                    <th scope="col">نوع الخدمة</th>
                                                    <th scope="col">قيمةالخدمة</th>
                                                    <th scope="col">الحمولة</th>
                                                    <th scope="col">سعر</th>
                                                    <th scope="col">الإجمالي</th>
                                                    <th scope="col">خصومات</th>
                                                    <th scope="col">دفعات</th>
                                                    <th scope="col">التاريخ</th>
                                                    <th scope="col">شهر</th>
                                                    <th scope="col">أسبوع</th>
                                                    <th scope="col">الراتب</th>
                                                </tr>
                                            </thead>
                                        ';
                                        while ($row = mysqli_fetch_assoc($result)) {
                                            echo '
                                                <tbody>
                                                    <tr>
                                                        <td>' . $row['id'] . '</td>
                                                        <td scope="col-6" style="color: #DC3545;">' . $row['car_number'] . '</td>
                                                        <td scope="col">' . $row['factory'] . '</td>
                                                        <td scope="col">' . $row['car_owner'] . '</td>
                                                        <td scope="col">' . $row['driver_name'] . '</td>
                                                        <td scope="col">' . $row['trip'] . '</td>
                                                        <td scope="col">' . $row['trip_value'] . '</td>
                                                        <td scope="col">' . $row['trip_total'] . '</td>
                                                        <td scope="col">' . $row['diesel'] . '</td>
                                                        <td scope="col">' . $row['service_type'] . '</td>
                                                        <td scope="col">' . $row['service_value'] . '</td>
                                                        <td scope="col">' . $row['payload'] . '</td>
                                                        <td scope="col">' . $row['payload_price'] . '</td>
                                                        <td scope="col">' . $row['payload_total'] . '</td>
                                                        <td scope="col">' . $row['discounts'] . '</td>
                                                        <td scope="col">' . $row['payments'] . '</td>
                                                        <td scope="col">' . $row['date'] . '</td>
                                                        <td scope="col">' . $row['month'] . '</td>
                                                        <td scope="col">' . $row['week'] . '</td>
                                                        <td scope="col">' . $row['salary'] . '</td>
                                                    </tr>
                                                </tbody>
                                            ';
                                        }
                                    }
                                    else {
                                        echo '<h2 class="text-danger">Data not found!</h2>';
                                    }
                                }
                            }
                            else {
                                $sql = "SELECT * FROM `drivers`";
                                $result = mysqli_query($conn, $sql);
                                if ($result) {
                                    // $num = mysqli_num_rows($result);
                                    // echo $num;
                                    if (mysqli_num_rows($result) > 0) {
                                        echo '
                                            <thead>
                                                <tr>
                                                    <th scope="col">#</th>
                                                    <th scope="col-6">رقم السيارة</th>
                                                    <th scope="col">المصنع</th>
                                                    <th scope="col">صاحب السيارة</th>
                                                    <th scope="col">السائق</th>
                                                    <th scope="col">الترب</th>
                                                    <th scope="col">سعره</th>
                                                    <th scope="col">الإجمالي</th>
                                                    <th scope="col">ديزل</th>
                                                    <th scope="col">نوع الخدمة</th>
                                                    <th scope="col">قيمةالخدمة</th>
                                                    <th scope="col">الحمولة</th>
                                                    <th scope="col">سعر</th>
                                                    <th scope="col">الإجمالي</th>
                                                    <th scope="col">خصومات</th>
                                                    <th scope="col">دفعات</th>
                                                    <th scope="col">التاريخ</th>
                                                    <th scope="col">شهر</th>
                                                    <th scope="col">أسبوع</th>
                                                    <th scope="col">الراتب</th>
                                                </tr>
                                            </thead>
                                        ';
                                        while ($row = mysqli_fetch_assoc($result)) {
                                            echo '
                                                <tbody>
                                                    <tr>
                                                        <td>' . $row['id'] . '</td>
                                                        <td scope="col-6">' . $row['car_number'] . '</td>
                                                        <td scope="col">' . $row['factory'] . '</td>
                                                        <td scope="col">' . $row['car_owner'] . '</td>
                                                        <td scope="col">' . $row['driver_name'] . '</td>
                                                        <td scope="col">' . $row['trip'] . '</td>
                                                        <td scope="col">' . $row['trip_value'] . '</td>
                                                        <td scope="col">' . $row['trip_total'] . '</td>
                                                        <td scope="col">' . $row['diesel'] . '</td>
                                                        <td scope="col">' . $row['service_type'] . '</td>
                                                        <td scope="col">' . $row['service_value'] . '</td>
                                                        <td scope="col">' . $row['payload'] . '</td>
                                                        <td scope="col">' . $row['payload_price'] . '</td>
                                                        <td scope="col">' . $row['payload_total'] . '</td>
                                                        <td scope="col">' . $row['discounts'] . '</td>
                                                        <td scope="col">' . $row['payments'] . '</td>
                                                        <td scope="col">' . $row['date'] . '</td>
                                                        <td scope="col">' . $row['month'] . '</td>
                                                        <td scope="col">' . $row['week'] . '</td>
                                                        <td scope="col">' . $row['salary'] . '</td>
                                                    </tr>
                                                </tbody>
                                            ';
                                        }
                                    }
                                    else {
                                        echo '<h2 class="text-danger">Data not found!</h2>';
                                    }
                                }
                            }
                        }
                    ?>
                </table>
            </div>
        </div>
    </div>
</body>
</html>