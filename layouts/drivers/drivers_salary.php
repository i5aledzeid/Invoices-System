<?php 
// session_start();
// if (isset($_SESSION['id']) && isset($_SESSION['user_name'])) {
require_once('../../db_conn.php');
//require_once('../../database/functions.php');
?>
<!DOCTYPE html>
<html>
<head>
	<link rel="icon" type="image/x-icon" href="banking_business_cash_income_money_icon.ico">
    <title>رواتب السائقين</title>
	<!--<link rel="stylesheet" type="text/css" href="style.css">-->
    <!--<link rel="stylesheet" type="text/css" href="assets/css/style-drivers.css">-->
    <link rel="stylesheet" type="text/css" href="../../assets/css/style-drivers_salary.css">
    <style>
        * {
            direction: rtl;
        }
    </style>
    <!-- bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <!-- font awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
    <div class="tab-container" style="width: 350px; height: 350px; margin-left: 32px;">
        <?php
            $driver_name = $_GET['driver_name'];
            echo 'إسم السائق: ' . $driver_name;
        ?>
        <br>
        <?php
            $query = "SELECT `car_number` FROM drivers WHERE `driver_name`='$driver_name'";
            $result = mysqli_query($conn, $query);
            if ($result) {
                if (mysqli_num_rows($result) > 0) {
                    $row = mysqli_fetch_assoc($result);
                    echo 'رقم السيارة: ' . $row['car_number'];
                }
            }
        ?>
        <?php
            $transporters_query = "SELECT * FROM transporters WHERE `driver_name`='$driver_name'";
            
            $result = mysqli_query($conn, $transporters_query);
            if ($result) {
                if (mysqli_num_rows($result) > 0) {
                    $row = mysqli_fetch_assoc($result);
                    echo '
                        <img style="width: 70px; position: absolute; right: 300px; top: 25%;" src="../../assets/images/drivers/'. $row['car_number'] . '.jpg" alt="r">
                    ';
                }
            }
            include ("../../functions/functions.php");
            newLine();
            
            newLine();
            echo 'رقم الإقامة: ' . $row['residency_number'] . '<br>';
            echo 'تاريخ الإصدار: ' . $row['release_date'] . '<br>';
            echo 'تاريخ الإنتهاء: ' . $row['expiry_date'];
            
            ////////////////////////////// EXPIRED DATE ///////////////////////////////////
            date_default_timezone_set('Asia/Riyadh');
            $date = date('m-d-Y', time()); // 2023-06-08
            $transporters_condition = "SELECT * FROM `transporters` WHERE `expiry_date`='$date' AND `driver_name`='$driver_name';";
            $result_condition = mysqli_query($conn, $transporters_condition);
            if ($result_condition) {
                // $num = mysqli_num_rows($result_condition);
                // echo '[' . $num . ']';
                if (mysqli_num_rows($result_condition) > 0) {
                    $row = mysqli_fetch_assoc($result_condition);
                    echo '<a style="color: green; font-weight: bold;"> سارية</a>';
                    ////////////////////////////// SEND NOTIFY ///////////////////////////////////
                    $title = "تنبيه";
                    $subtitle = "هناك رخصة تاكد تنتهي";
                    $name = "خالد زيد";
                    $date = date('y-m-d h:m:s');
                    $sql_notify = mysqli_query($conn, "INSERT INTO notifications(title, subtitle, date, type, created_by) VALUES('$title', '$subtitle', '$date', '1', '$name')");
                    if ($sql_notify) {
                        echo '';
                    }
                    else {
                        echo mysqli_error($conn);
                        exit;
                    }
                    ////////////////////////////// SEND NOTIFY ///////////////////////////////////
                }
                else {
                    echo '<a style="color: red; font-weight: bold;"> قاربت على الإنتهاء</a>';
                }
            }
            ////////////////////////////// EXPIRED DATE ///////////////////////////////////
            
            newLine();
            echo 'الميلاد: ' . $row['birthday'] . '<br>';
            
            newLine();
            echo 'الديانة: ' . $row['religion'] . '<br>';
            echo 'الجنسية: ' . $row['nationality'] . '<br>';
            echo 'المهنة: ' . $row['career'] . '<br>';
            echo 'صاحب العمل: ' . $row['business_owner'] . '<br>';
        ?>
    </div>
    <div class="tab-container">
        <div class="title">
            <!-- Tooltip -->
            <a href="drivers.php" class="hint-link" style="text-decoration: none;" placeholder="dddddd">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-return-right" viewBox="0 0 16 16">
                  <path fill-rule="evenodd" d="M1.5 1.5A.5.5 0 0 0 1 2v4.8a2.5 2.5 0 0 0 2.5 2.5h9.793l-3.347 3.346a.5.5 0 0 0 .708.708l4.2-4.2a.5.5 0 0 0 0-.708l-4-4a.5.5 0 0 0-.708.708L13.293 8.3H3.5A1.5 1.5 0 0 1 2 6.8V2a.5.5 0 0 0-.5-.5z"/>
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
            <div class="d-flex justify-content-between">
                <div class="p-2">
                    <?php
                        $driver_name = $_GET['driver_name'];
                        echo 'رواتب السائقين - ' . $driver_name;
                    ?>
                </div>
                <div class="p-2">
                    <?php
                        // echo 'لعام ' . date("Y");
                        // $timezone = date_default_timezone_get();
                        // echo "The current server timezone is: " . $timezone;
                        // Change the line below to your timezone!
                        date_default_timezone_set('Asia/Riyadh');
                        // $date = date('m/d/Y h:i:s a', time());
                        $date = date('m-d-Y', time());
                        echo 'اليوم ' .$date;
                    ?>
                </div>
            </div>
        </div>
        <div class="tab-box">
            <button class="tab-button">1</button>
            <button class="tab-button">2</button>
            <button class="tab-button">3</button>
            <button class="tab-button">4</button>
            <button class="tab-button">5</button>
            <button class="tab-button">6</button>
            <button class="tab-button">7</button>
            <button class="tab-button">8</button>
            <button class="tab-button">9</button>
            <button class="tab-button">10</button>
            <button class="tab-button">11</button>
            <button class="tab-button active">12</button>
            <div class="line"></div>
        </div>
        <div class="content-box">
            <div class="content active">
                <h2>الشهر 1</h2>
                <?php
                    $driver_name = $_GET['driver_name'];
                    $query = "SELECT SUM(salary) As sumOf63 FROM drivers WHERE `driver_name`='$driver_name' AND `month`='1'";
                    $result = mysqli_query($conn, $query);
                    while ($row = mysqli_fetch_assoc($result)) {
                        $total = $row['sumOf63'];
                        if ($total != 0) {
                            echo number_format($total, 2);
                        }
                        else {
                            echo 'المجموع ' . '0.00';
                        }
                    }
                ?>
                <p>Lorem  doe eius cumque quos, tenetur accusantium et fugit nulla!</p>
            </div>
            <div class="content">
                <h2>الشهر 2</h2>
                <?php
                    $driver_name = $_GET['driver_name'];
                    $query = "SELECT SUM(salary) As sumOf63 FROM drivers WHERE `driver_name`='$driver_name' AND `month`='2'";
                    $result = mysqli_query($conn, $query);
                    while ($row = mysqli_fetch_assoc($result)) {
                        $total = $row['sumOf63'];
                        if ($total != 0) {
                            echo number_format($total, 2);
                        }
                        else {
                            echo 'المجموع ' . '0.00';
                        }
                    }
                ?>
                <p>Lorem ima, iscipit nihil eius cumque quos, et fugit nulla!</p>
            </div>
            <div class="content">
                <h2>الشهر 3</h2>
                <?php
                    $driver_name = $_GET['driver_name'];
                    $query = "SELECT SUM(salary) As sumOf63 FROM drivers WHERE `driver_name`='$driver_name' AND `month`='3'";
                    $result = mysqli_query($conn, $query);
                    while ($row = mysqli_fetch_assoc($result)) {
                        $total = $row['sumOf63'];
                        if ($total != 0) {
                            echo number_format($total, 2);
                        }
                        else {
                            echo 'المجموع ' . '0.00';
                        }
                    }
                ?>
                <p>Lorem ipAccusamus minima, in veritaodit ad.it nulla!</p>
            </div>
            <div class="content">
                <h2>الشهر 4</h2>
                <?php
                    $driver_name = $_GET['driver_name'];
                    $query = "SELECT SUM(salary) As sumOf63 FROM drivers WHERE `driver_name`='$driver_name' AND `month`='4'";
                    $result = mysqli_query($conn, $query);
                    while ($row = mysqli_fetch_assoc($result)) {
                        $total = $row['sumOf63'];
                        if ($total != 0) {
                            echo number_format($total, 2);
                        }
                        else {
                            echo 'المجموع ' . '0.00';
                        }
                    }
                ?>
                <p>Lorem in vscipit nihil eius cumque quos, tenetet fugit nulla!</p>
            </div>
            <div class="content">
                <h2>الشهر 5</h2>
                <?php
                    $driver_name = $_GET['driver_name'];
                    $query = "SELECT SUM(salary) As sumOf63 FROM drivers WHERE `driver_name`='$driver_name' AND `month`='5'";
                    $result = mysqli_query($conn, $query);
                    while ($row = mysqli_fetch_assoc($result)) {
                        $total = $row['sumOf63'];
                        if ($total != 0) {
                            echo number_format($total, 2);
                        }
                        else {
                            echo 'المجموع ' . '0.00';
                        }
                    }
                ?>
                <p>Loreveritatis dicta vel libero ea accusantium et fugit nulla!</p>
            </div>
            <div class="content">
                <h2>الشهر 6</h2>
                <?php
                    $driver_name = $_GET['driver_name'];
                    $query = "SELECT SUM(salary) As sumOf63 FROM drivers WHERE `driver_name`='$driver_name' AND `month`='6'";
                    $result = mysqli_query($conn, $query);
                    while ($row = mysqli_fetch_assoc($result)) {
                        $total = $row['sumOf63'];
                        if ($total != 0) {
                            echo number_format($total, 2);
                        }
                        else {
                            echo 'المجموع ' . '0.00';
                        }
                    }
                ?>
                <p>Lorem ipsin veritatis cipit nihil eiuset fugit nulla!</p>
            </div>
            <div class="content">
                <h2>الشهر 7</h2>
                <?php
                    $driver_name = $_GET['driver_name'];
                    $query = "SELECT SUM(salary) As sumOf63 FROM drivers WHERE `driver_name`='$driver_name' AND `month`='7'";
                    $result = mysqli_query($conn, $query);
                    while ($row = mysqli_fetch_assoc($result)) {
                        $total = $row['sumOf63'];
                        if ($total != 0) {
                            echo number_format($total, 2);
                        }
                        else {
                            echo 'المجموع ' . '0.00';
                        }
                    }
                ?>
                <p>Lorem ipsum dve accusantium et fugit nulla!</p>
            </div>
            <div class="content">
                <h2>الشهر 8</h2>
                <?php
                    $driver_name = $_GET['driver_name'];
                    $query = "SELECT SUM(salary) As sumOf63 FROM drivers WHERE `driver_name`='$driver_name' AND `month`='8'";
                    $result = mysqli_query($conn, $query);
                    while ($row = mysqli_fetch_assoc($result)) {
                        $total = $row['sumOf63'];
                        if ($total != 0) {
                            echo number_format($total, 2);
                        }
                        else {
                            echo 'المجموع ' . '0.00';
                        }
                    }
                ?>
                <p>Lod. Suscipit nihil eius cumque quos, tenetur ugit nulla!</p>
            </div>
            <div class="content">
                <h2>الشهر 9</h2>
                <?php
                    $driver_name = $_GET['driver_name'];
                    $query = "SELECT SUM(salary) As sumOf63 FROM drivers WHERE `driver_name`='$driver_name' AND `month`='9'";
                    $result = mysqli_query($conn, $query);
                    while ($row = mysqli_fetch_assoc($result)) {
                        $total = $row['sumOf63'];
                        if ($total != 0) {
                            echo number_format($total, 2);
                        }
                        else {
                            echo 'المجموع ' . '0.00';
                        }
                    }
                ?>
                <p>Lorem ipsum dolorlanditt nihil eiu fugit nulla!</p>
            </div>
            <div class="content">
                <h2>الشهر 10</h2>
                <?php
                    $driver_name = $_GET['driver_name'];
                    $query = "SELECT SUM(salary) As sumOf63 FROM drivers WHERE `driver_name`='$driver_name' AND `month`='10'";
                    $result = mysqli_query($conn, $query);
                    while ($row = mysqli_fetch_assoc($result)) {
                        $total = $row['sumOf63'];
                        if ($total != 0) {
                            echo number_format($total, 2);
                        }
                        else {
                            echo 'المجموع ' . '0.00';
                        }
                    }
                ?>
                <p>Lorem ipsum dolor ,ccusantium et fugit nulla!</p>
            </div>
            <div class="content">
                <h2>الشهر 11</h2>
                <?php
                    $driver_name = $_GET['driver_name'];
                    $query = "SELECT SUM(salary) As sumOf63 FROM drivers WHERE `driver_name`='$driver_name' AND `month`='11'";
                    $result = mysqli_query($conn, $query);
                    while ($row = mysqli_fetch_assoc($result)) {
                        $total = $row['sumOf63'];
                        if ($total != 0) {
                            echo number_format($total, 2);
                        }
                        else {
                            echo 'المجموع ' . '0.00';
                        }
                    }
                ?>
                <p>Lol eius cumque quos, tenetur accusantium et fugit nulla!</p>
            </div>
            <div class="content">
                <h2>الشهر 12</h2>
                <?php
                    $driver_name = $_GET['driver_name'];
                    $query = "SELECT SUM(salary) As sumOf63 FROM drivers WHERE `driver_name`='$driver_name' AND `month`='12'";
                    $result = mysqli_query($conn, $query);
                    while ($row = mysqli_fetch_assoc($result)) {
                        $total = $row['sumOf63'];
                        if ($total != 0) {
                            echo number_format($total, 2);
                        }
                        else {
                            echo 'المجموع ' . '0.00';
                        }
                    }
                ?>
                <p>Lorem inihil eius cumque quos, tenetur nulla!</p>
            </div>
        </div>
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