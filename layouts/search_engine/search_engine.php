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
        
        /* Tooltip */

.hint-link {
    position: relative;
    text-decoration: none;
    color: #7360ff;
}

#tooltip {
    position: fixed;
    display: block;
    opacity: 0;
    visibility: hidden;
    background: #fff;
    color: #000;
    font-size: 1.0em;
    font-weight: 300;
    padding: 5px 16px;
    box-shadow: 0 8px 16px rgba(0, 0, 0, 0.1);
}

.hint-link:hover #tooltip {
    opacity: 1;
    visibility: visible;
}

/* Tooltip */
    </style>
</head>
<body>
    <div class="container text-center"><br>
        <div class="row">
            <div class="d-flex flex-row mb-3">
                <div class="p-2">نتيجة البحث عن:</div>
                <div class="p-2" id="getSearch">الكل</div>
            </div>
        <div class="d-flex justify-content-around">
            <!-- Tooltip -->
            <a href="../../home.php" class="hint-link" style="text-decoration: none;" placeholder="dddddd">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-house" viewBox="0 0 16 16">
                    <path d="M8.707 1.5a1 1 0 0 0-1.414 0L.646 8.146a.5.5 0 0 0 .708.708L2 8.207V13.5A1.5 1.5 0 0 0 3.5 15h9a1.5 1.5 0 0 0 1.5-1.5V8.207l.646.647a.5.5 0 0 0 .708-.708L13 5.793V2.5a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5v1.293L8.707 1.5ZM13 7.207V13.5a.5.5 0 0 1-.5.5h-9a.5.5 0 0 1-.5-.5V7.207l5-5 5 5Z"/>
                </svg>
                <span id="tooltip">الصفحة الرئيسية</span>
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
            <form action="" method="post" class="row g-3" id="zero-search">
                <select style="width: 140px;" style="padding-left: 32px; padding-right: 32px;" class="form-control border border-primary form-select-sm md-1" aria-label="Default select example" style="direction: rtl;" id="type-select" name="type-select">
                    <option selected>نوع البحث</option>
                    <option value="1">بحث باستخدام الشهر والأسبوع</option>
                    <option value="2">بحث باسم صاحب السيارة</option>
                    <option value="3">بحث باسم السائق</option>
                </select>
                <div class="col-4 col-sm-2" style="width: 100px">
                    <input type="text" class="form-control border border-primary" id="inputPassword2" placeholder="إبحث عن الإي دي ..." name="search">
                </div>

                <div class="col-4 col-sm-2" id="car_owner" style="width: 150px">
                    <input type="text" class="form-control border border-primary" id="inputPassword2" placeholder="إبحث عن صاحب السيارة ..." name="car_owner">
                </div>
                <div class="col-4 col-sm-2" id="car_owner_0" style="padding-left: 8px; padding-right: 8px; width: 140px">
                    <input type="text" class="form-control border border-danger" id="inputPassword2" placeholder="إبحث عن صاحب السيارة ..." name="car_owner_0">
                </div>

                <div class="col-4 col-sm-2" id="driver_name" style="padding-left: 8px; padding-right: 8px; width: 120px">
                    <input type="text" class="form-control border border-primary" id="inputPassword2" placeholder="إبحث عن إسم السائق..." name="driver_name">
                </div>
                <div class="col-4 col-sm-2" id="driver_name_0" style="padding-left: 8px; padding-right: 8px; width: 120px">
                    <input type="text" class="form-control border border-danger" id="inputPassword2" placeholder="إبحث عن إسم السائق..." name="driver_name_0">
                </div>

                <div class="col-4 col-sm-1" style="padding-left: 8px; padding-right: 24px; width: 150px;">
                    <input type="text" class="form-control border border-primary" id="inputPassword2" placeholder="إبحث عن رقم السيارة..." name="car_number">
                </div>
                <div class="col-4 col-sm-2" style="padding-left: 8px; padding-right: 8px; width: 160px; display: none;">
                    <input type="text" class="form-control border border-primary" id="inputPassword2" placeholder="إبحث عن رقم السيارة..." name="car_number_0">
                </div>

                <div class="col-4 col-sm-2" id="month" style="width: 100px">
                    <input type="text" class="form-control border border-primary" id="inputPassword2" placeholder="إبحث عن الشهر..." name="month">
                </div>
                <div class="col-4 col-sm-2" id="month_0" style="width: 100px">
                    <input type="text" class="form-control border border-danger" id="inputPassword2" placeholder="إبحث عن الشهر..." name="month_0">
                </div>

                <div class="col-4 col-sm-2" id="week" style="padding-left: 8px; padding-right: 8px; width: 110px">
                    <input type="text" class="form-control border border-primary" id="inputPassword2" placeholder="إبحث عن الأسبوع..." name="week">
                </div>
                <div class="col-4 col-sm-2" id="week_0" style="padding-left: 8px; padding-right: 8px; width: 110px">
                    <input type="text" class="form-control border border-danger" id="inputPassword2" placeholder="إبحث عن الأسبوع..." name="week_0">
                </div>

                <div class="col-4 col-sm-2">
                    <button type="submit" style="padding-left: 32px; padding-right: 32px;" class="btn btn-primary mb-3" name="submit">إبحث</button>
                </div>
            </form>
        </div>
            
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
                           
                            $driver_name_0 = $_POST['driver_name_0'];
                            $car_owner_0 = $_POST['car_owner_0'];
                            $month_0 = $_POST['month_0'];
                            $week_0 = $_POST['week_0'];
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
                            else if ($driver_name != "" && $month != "" && $week != "") {
                                $sql = "SELECT * FROM `drivers` WHERE `driver_name`='$driver_name' AND `month`='$month' AND `week`='$week'";
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
                            else if ($car_owner_0 != "" && $month_0 != "" && $week_0 != "") {
                                $sql = "SELECT * FROM `drivers` WHERE `car_owner`='$car_owner_0' AND `month`='$month_0' AND `week`='$week_0'";
                                $result = mysqli_query($conn, $sql);
                                if ($result) {
                                    if (mysqli_num_rows($result) > 0) {
                                        echo '
                                            <thead>
                                                <tr>
                                                    <th scope="col">#</th>
                                                    <th scope="col-6">رقم السيارة</th>
                                                    <th scope="col">المصنع</th>
                                                    <th scope="col" style="color: #DC3545;">صاحب السيارة</th>
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
                                                    <th scope="col" style="color: #DC3545;">شهر</th>
                                                    <th scope="col" style="color: #DC3545;">أسبوع</th>
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
                                                        <td scope="col" style="color: #DC3545;">' . $row['car_owner'] . '</td>
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
                                                        <td scope="col" style="color: #DC3545;">' . $row['month'] . '</td>
                                                        <td scope="col" style="color: #DC3545;">' . $row['week'] . '</td>
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
                            else if ($driver_name_0 != "" && $month_0 != "" && $week_0 != "") {
                                $sql = "SELECT * FROM `drivers` WHERE `driver_name`='$driver_name_0' AND `month`='$month_0' AND `week`='$week_0'";
                                $result = mysqli_query($conn, $sql);
                                if ($result) {
                                    if (mysqli_num_rows($result) > 0) {
                                        echo '
                                            <thead>
                                                <tr>
                                                    <th scope="col">#</th>
                                                    <th scope="col-6">رقم السيارة</th>
                                                    <th scope="col">المصنع</th>
                                                    <th scope="col">صاحب السيارة</th>
                                                    <th scope="col" style="color: #DC3545;">السائق</th>
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
                                                    <th scope="col" style="color: #DC3545;">شهر</th>
                                                    <th scope="col" style="color: #DC3545;">أسبوع</th>
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
                                                        <td scope="col" style="color: #DC3545;">' . $row['driver_name'] . '</td>
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
                                                        <td scope="col" style="color: #DC3545;">' . $row['month'] . '</td>
                                                        <td scope="col" style="color: #DC3545;">' . $row['week'] . '</td>
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

    <script>
        const theSelect = document.getElementById("type-select");
        const theDiv0 = document.getElementById("zero-search");
        const theDiv1 = document.getElementById("first-search");
        const theDiv2 = document.getElementById("second-search");

        const car_owner = document.getElementById("car_owner");
        const car_owner_0 = document.getElementById("car_owner_0");
        const week = document.getElementById("week");
        const week_0 = document.getElementById("week_0");
        const month = document.getElementById("month");
        const month_0 = document.getElementById("month_0");
        const driver_name = document.getElementById("driver_name");
        const driver_name_0 = document.getElementById("driver_name_0");
        const getSearch = document.getElementById("getSearch");

        car_owner.style.display = "flex";
        car_owner_0.style.display = "none";
        week.style.display = "flex";
        week_0.style.display = "none";
        month.style.display = "flex";
        month_0.style.display = "none";
        driver_name.style.display = "flex";
        driver_name_0.style.display = "none";

        theSelect.addEventListener("change", function(event) {
            if (event.target.value == '1') {
                car_owner.style.display = "flex";
                car_owner_0.style.display = "none";
                driver_name.style.display = "flex";
                driver_name_0.style.display = "none";
                week.style.display = "none";
                week_0.style.display = "flex";
                month.style.display = "none";
                month_0.style.display = "flex";
                getSearch.innerHTML = "الشهر والأسبوع فقط";
            }
            else if (event.target.value == '2') {
                car_owner.style.display = "none";
                car_owner_0.style.display = "flex";
                driver_name.style.display = "flex";
                driver_name_0.style.display = "none";
                week.style.display = "none";
                week_0.style.display = "flex";
                month.style.display = "none";
                month_0.style.display = "flex";
                getSearch.innerHTML = "صاحب السيارة";
            }
            else if (event.target.value == '3') {
                // theDiv2.style.display = "none"
                // theDiv2.style.display = "flex"
                // theDiv1.style.visibility = "hidden"
                // theDiv1.style.visibility = "visible"
                car_owner.style.display = "flex";
                car_owner_0.style.display = "none";
                driver_name.style.display = "none";
                driver_name_0.style.display = "flex";
                week.style.display = "none";
                week_0.style.display = "flex";
                month.style.display = "none";
                month_0.style.display = "flex";
                getSearch.innerHTML = "إسم السائق";
            }
            else {
                car_owner.style.display = "flex";
                car_owner_0.style.display = "none";
                week.style.display = "flex";
                week_0.style.display = "none";
                month.style.display = "flex";
                month_0.style.display = "none";
                driver_name.style.display = "flex";
                driver_name_0.style.display = "none";
                getSearch.innerHTML = "الكل";
            }
        });
    </script>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>

</body>
</html>