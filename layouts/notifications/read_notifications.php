<?php 
// session_start();
// if (isset($_SESSION['id']) && isset($_SESSION['user_name'])) {
include "../../db_conn.php";
session_start();
// require_once('db_conn.php');
$id = $_SESSION['id'];
$sql = mysqli_query($conn, "SELECT * FROM notifications WHERE `seen`='$id'");
$sql2 = mysqli_query($conn, "SELECT * FROM notifications WHERE `seen`=0");
$sql3 = mysqli_query($conn, "SELECT * FROM notifications WHERE status='0' AND type='1'");
$sql4 = mysqli_query($conn, "SELECT * FROM notifications WHERE status='0' AND type='2'");
$sql5 = mysqli_query($conn, "SELECT * FROM notifications WHERE status='0' AND type='3'");
$count = mysqli_num_rows($sql); 
$count2 = mysqli_num_rows($sql2); 
$count3 = mysqli_num_rows($sql3); 
$count4 = mysqli_num_rows($sql4); 
$count5 = mysqli_num_rows($sql5); 
///////////////////////////////////////////////////////////////////////////////////////////
/*$query2="select * from notifications_array"; 
$result2=mysqli_query($conn, $query2); 
$query3="select * from notifications_array WHERE seen='1'"; 
$result3=mysqli_query($conn, $query3); 
$query4="select * from notifications_array WHERE seen='2'"; 
$result4=mysqli_query($conn, $query4); */
///////////////////////////////////////////////////////////////////////////////////////////
?>
<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" type="text/css" href="../../assets/css/style-read-notify.css">
    <!-- bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <!-- font awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="icon" type="image/x-icon" href="../assets/icons/admin_google_security_settings_icon.ico">
	<title>الإشعارات</title>
</head>
<body>
    <div class="tab-container">
        <div class="title">
            <!-- Tooltip -->
            <a href="../../home.php" class="hint-link" style="text-decoration: none;" placeholder="dddddd">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-people-fill" viewBox="0 0 16 16">
                  <path d="M7 14s-1 0-1-1 1-4 5-4 5 3 5 4-1 1-1 1H7Zm4-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6Zm-5.784 6A2.238 2.238 0 0 1 5 13c0-1.355.68-2.75 1.936-3.72A6.325 6.325 0 0 0 5 9c-4 0-5 3-5 4s1 1 1 1h4.216ZM4.5 8a2.5 2.5 0 1 0 0-5 2.5 2.5 0 0 0 0 5Z"/>
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
            المستخدم (
            <?php
                $name = $_SESSION['name'];
                echo $name . ' )';
            ?>
        </div>
        <div class="tab-box">
            <button class="tab-button">إشعاراتي
                <?php
                    echo '(' . $count . ')';
                ?>
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-bell-fill" viewBox="0 0 16 16">
                  <path d="M8 16a2 2 0 0 0 2-2H6a2 2 0 0 0 2 2zm.995-14.901a1 1 0 1 0-1.99 0A5.002 5.002 0 0 0 3 6c0 1.098-.5 6-2 7h14c-1.5-1-2-5.902-2-7 0-2.42-1.72-4.44-4.005-4.901z"/>
                </svg>
            </button>
            <button class="tab-button">إشعارات مقروءة
                <?php
                    echo '(' . $count2 . ')';
                ?>
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-bell-slash-fill" viewBox="0 0 16 16">
                  <path d="M5.164 14H15c-1.5-1-2-5.902-2-7 0-.264-.02-.523-.06-.776L5.164 14zm6.288-10.617A4.988 4.988 0 0 0 8.995 2.1a1 1 0 1 0-1.99 0A5.002 5.002 0 0 0 3 7c0 .898-.335 4.342-1.278 6.113l9.73-9.73zM10 15a2 2 0 1 1-4 0h4zm-9.375.625a.53.53 0 0 0 .75.75l14.75-14.75a.53.53 0 0 0-.75-.75L.625 15.625z"/>
                </svg>
            </button>
            <button class="tab-button">تنبيه
                <?php
                    echo '(' . $count5 . ')';
                ?>
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-exclamation-triangle-fill" viewBox="0 0 16 16">
                  <path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
                </svg>
            </button>
            <button class="tab-button">تحذير
                <?php
                    echo '(' . $count4 . ')';
                ?>
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-x-circle-fill" viewBox="0 0 16 16">
                  <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM5.354 4.646a.5.5 0 1 0-.708.708L7.293 8l-2.647 2.646a.5.5 0 0 0 .708.708L8 8.707l2.646 2.647a.5.5 0 0 0 .708-.708L8.707 8l2.647-2.646a.5.5 0 0 0-.708-.708L8 7.293 5.354 4.646z"/>
                </svg>
            </button>
            <button class="tab-button active">إشعارات عامة
                <?php
                    echo '(' . $count3 . ')';
                ?>
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-app-indicator" viewBox="0 0 16 16">
                  <path d="M5.5 2A3.5 3.5 0 0 0 2 5.5v5A3.5 3.5 0 0 0 5.5 14h5a3.5 3.5 0 0 0 3.5-3.5V8a.5.5 0 0 1 1 0v2.5a4.5 4.5 0 0 1-4.5 4.5h-5A4.5 4.5 0 0 1 1 10.5v-5A4.5 4.5 0 0 1 5.5 1H8a.5.5 0 0 1 0 1H5.5z"/>
                  <path d="M16 3a3 3 0 1 1-6 0 3 3 0 0 1 6 0z"/>
                </svg>
            </button>
            <div class="line"></div>
        </div>
        <div class="content-box">
            <div class="content">
                <h2>إشعاراتي</h2>
                <!-- <div class="d-flex justify-content-center"> -->
                    <div class="row">
                        <div class="col-md-12">
                            <?php // include ("message.php"); ?>
                            <!-- <div class="card-header"><h4>المستخدمين المسجلين</h4></div> -->
                            <div class="card-body" style="overflow:auto; color: red; height:250px;">
                                <table class="table table-success table-hover table-bordered">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>العنوان</th>
                                            <th>الوصف</th>
                                            <th>الحالة</th>
                                            <th>النوع</th>
                                            <th><i class="fa fa-eye" aria-hidden="true"></i></th> 
                                            <th>المنشئ</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                            // if ($_SESSION['role'] == 1) {
                                            $query = "SELECT * FROM notifications WHERE `seen`='$id'";
                                            $query_run = mysqli_query($conn, $query);
                                            if (mysqli_num_rows($query_run) > 0) {
                                                foreach ($query_run as $row) {
                                                    echo '
                                                        <tr>
                                                            <td>' . $row['id'] . '</td>
                                                            <td>' . $row['title'] . '</td>
                                                            <td>' . $row['subtitle'] . '</td>'?>
                                                            <!--<td>
                                                                <?php if ($row['status'] == '0') {
                                                                    echo "لم تقرأ";
                                                                }
                                                                elseif ($row['status'] == '1') {
                                                                    echo "تم قرائتها";
                                                                }
                                                                ?>
                                                            </td>-->
                                                            <td>
                                                                <?php if ($row['seen'] == 0) {?>
                                                                    <a href="#">مقروءة</a>
                                                                <?php } else { ?>
                                                                    <a href="update_noti.php?id=<?php echo $row['id']; ?>">غير مقروءة<?php echo $row['seen']; ?></a>
                                                                <?php }
                                                                ?>
                                                            </td> 
                                                            <td>
                                                                <?php if ($row['type'] == '1') {
                                                                    echo "عامة";
                                                                }
                                                                elseif ($row['type'] == '2') {
                                                                    echo "تحذير";
                                                                }
                                                                elseif ($row['type'] == '3') {
                                                                    echo "تنبيه";
                                                                }
                                                                ?>
                                                            </td>
                                                            <td>
                                                                <a href="#">
                                                                    <?php
                                                                        if ($row['seen'] == 0) {?>
                                                                            <i class="fa fa-eye-slash" aria-hidden="true"></i>
                                                                        <?php }
                                                                        else { ?>
                                                                            <a href="view_noti.php?id=<?php echo $row['id']; ?>" target="_blank">
                                                                                <i class="fa fa-eye" aria-hidden="true"></i>
                                                                            </a>
                                                                        <?php }
                                                                    ?>
                                                                </a>
                                                            </td> 
                                                        <?php echo '<td>' . $row['created_by'] . '</td>
                                                        </tr>';
                                                 }
                                            }
                                            else {
            
                                            }
                                            ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                <!-- </div> --><br>
                <?php
                    if ($_SESSION['role'] == 1) {
                        echo '';
                    }
                    else if ($_SESSION['role'] == 3) {
                        echo '
                            <a href="../../layouts/notifications/add_notifications.php">إضافة إشعار جديد</a>
                        ';
                    }
                    else if ($_SESSION['role'] == 2) {
                         echo '';
                    }
                ?>
                <p>Lorem ima, iscipit nihil eius cumque quos, et fugit nulla!</p>
            </div>
            <div class="content">
                <h2>إشعارات مقروءة</h2>
                <!-- <div class="d-flex justify-content-center"> -->
                    <div class="row">
                        <div class="col-md-12">
                            <?php // include ("message.php"); ?>
                            <!-- <div class="card-header"><h4>المستخدمين المسجلين</h4></div> -->
                            <div class="card-body" style="overflow:auto; color: red; height:250px;">
                                <table class="table table-secondary table-hover">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>العنوان</th>
                                            <th>الوصف</th>
                                            <th>الحالة</th>
                                            <th>النوع</th>
                                            <th><i class="fa fa-eye" aria-hidden="true"></i></th> 
                                            <th>المنشئ</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                            $name = $_SESSION['name'];
                                            $id = $_SESSION['id'];
                                            // $query = "SELECT * FROM notifications WHERE `seen`='$id'";
                                            $query = "SELECT * FROM notifications WHERE `seen`=0";
                                            $query_run = mysqli_query($conn, $query);
                                            if (mysqli_num_rows($query_run) > 0) {
                                                foreach ($query_run as $row) {
                                                    echo '
                                                        <tr>
                                                            <td>' . $row['id'] . '</td>
                                                            <td>' . $row['title'] . '</td>
                                                            <td>' . $row['subtitle'] . '</td>'?>
                                                            <td>
                                                                <?php if ($row['seen'] == 0) {?>
                                                                    <a href="#">مقروءة</a>
                                                                <?php } else { ?>
                                                                    <a href="update_noti.php?id=<?php echo $row['id']; ?>">غير مقروءة<?php echo $row['seen']; ?></a>
                                                                <?php }
                                                                ?>
                                                            </td> 
                                                            <td>
                                                                <?php if ($row['type'] == '1') {
                                                                    echo "عامة";
                                                                }
                                                                elseif ($row['type'] == '2') {
                                                                    echo "تحذير";
                                                                }
                                                                elseif ($row['type'] == '3') {
                                                                    echo "تنبيه";
                                                                }
                                                                ?>
                                                            </td>
                                                            <td>
                                                                <a href="#">
                                                                    <?php
                                                                        if ($row['seen'] == 0) {?>
                                                                            <i class="fa fa-eye-slash" aria-hidden="true"></i>
                                                                        <?php }
                                                                        else { ?>
                                                                            <i class="fa fa-eye" aria-hidden="true"></i>
                                                                        <?php }
                                                                    ?>
                                                                </a>
                                                            </td> 
                                                        <?php echo '<td>' . $row['created_by'] . '</td>
                                                        </tr>';
                                                 }
                                            }
                                            else {
            
                                            } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                <!-- </div> -->
                <p>Lorem ima, iscipit nihil eius cumque quos, et fugit nulla!</p>
            </div>
            <div class="content">
                <h2>تنبيه</h2>
                <!-- <div class="d-flex justify-content-center"> -->
                    <div class="row">
                        <div class="col-md-12">
                            <?php // include ("message.php"); ?>
                            <!-- <div class="card-header"><h4>المستخدمين المسجلين</h4></div> -->
                            <div class="card-body" style="overflow:auto; color: red; height:250px;">
                                <table class="table table-warning table-hover">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>العنوان</th>
                                            <th>الوصف</th>
                                            <th>الحالة</th>
                                            <th>النوع</th>
                                            <th>المنشئ</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                            $name = $_SESSION['name'];
                                            $query = "SELECT * FROM notifications WHERE `status`='0' AND `type`='3'";
                                            $query_run = mysqli_query($conn, $query);
                                            if (mysqli_num_rows($query_run) > 0) {
                                                foreach ($query_run as $row) {
                                                    echo '
                                                        <tr>
                                                            <td>' . $row['id'] . '</td>
                                                            <td>' . $row['title'] . '</td>
                                                            <td>' . $row['subtitle'] . '</td>'?>
                                                            <td>
                                                                <?php if ($row['status'] == '0') {
                                                                    echo "لم تقرأ";
                                                                }
                                                                elseif ($row['status'] == '1') {
                                                                    echo "تم قرائتها";
                                                                }
                                                                ?>
                                                            </td>
                                                            <td>
                                                                <?php if ($row['type'] == '1') {
                                                                    echo "عامة";
                                                                }
                                                                elseif ($row['type'] == '2') {
                                                                    echo "تحذير";
                                                                }
                                                                elseif ($row['type'] == '3') {
                                                                    echo "تنبيه";
                                                                }
                                                                ?>
                                                            </td>
                                                        <?php echo '<td>' . $row['created_by'] . '</td>
                                                        </tr>';
                                                 }
                                            }
                                            else {
            
                                            } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                <!-- </div> -->
                <p>Lorem ima, iscipit nihil eius cumque quos, et fugit nulla!</p>
            </div>
            <div class="content">
                <h2>تحذير</h2>
                <!-- <div class="d-flex justify-content-center"> -->
                    <div class="row">
                        <div class="col-md-12">
                            <?php // include ("message.php"); ?>
                            <!-- <div class="card-header"><h4>المستخدمين المسجلين</h4></div> -->
                            <div class="card-body" style="overflow:auto; color: red; height:250px;">
                                <table class="table table-danger table-hover">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>العنوان</th>
                                            <th>الوصف</th>
                                            <th>الحالة</th>
                                            <th>النوع</th>
                                            <th>المنشئ</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                            $name = $_SESSION['name'];
                                            $query = "SELECT * FROM notifications WHERE `status`=0 AND `type`=2";
                                            $query_run = mysqli_query($conn, $query);
                                            if (mysqli_num_rows($query_run) > 0) {
                                                foreach ($query_run as $row) {
                                                    echo '
                                                        <tr>
                                                            <td>' . $row['id'] . '</td>
                                                            <td>' . $row['title'] . '</td>
                                                            <td>' . $row['subtitle'] . '</td>'?>
                                                            <td>
                                                                <?php if ($row['status'] == '0') {
                                                                    echo "لم تقرأ";
                                                                }
                                                                elseif ($row['status'] == '1') {
                                                                    echo "تم قرائتها";
                                                                }
                                                                ?>
                                                            </td>
                                                            <td>
                                                                <?php if ($row['type'] == '1') {
                                                                    echo "عامة";
                                                                }
                                                                elseif ($row['type'] == '2') {
                                                                    echo "تحذير";
                                                                }
                                                                elseif ($row['type'] == '3') {
                                                                    echo "تنبيه";
                                                                }
                                                                ?>
                                                            </td>
                                                        <?php echo '<td>' . $row['created_by'] . '</td>
                                                        </tr>';
                                                 }
                                            }
                                            else {
            
                                            } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                <!-- </div> -->
                <p>Lorem ima, iscipit nihil eius cumque quos, et fugit nulla!</p>
            </div>
            <div class="content active">
                <h2>إشعارات عامة</h2>
                <!-- <div class="d-flex justify-content-center"> -->
                    <div class="row">
                        <div class="col-md-12">
                            <?php // include ("message.php"); ?>
                            <!-- <div class="card-header"><h4>المستخدمين المسجلين</h4></div> -->
                            <div class="card-body">
                                <table class="table table-primary table-hover">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>العنوان</th>
                                            <th>الوصف</th>
                                            <th>الحالة</th>
                                            <th>النوع</th>
                                            <th>المنشئ</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                            $name = $_SESSION['name'];
                                            $query = "SELECT * FROM notifications WHERE `created_by`!='$name' AND `status`=0 AND    `type`=1";
                                            $query_run = mysqli_query($conn, $query);
                                            if (mysqli_num_rows($query_run) > 0) {
                                                foreach ($query_run as $row) {
                                                    echo '
                                                        <tr>
                                                            <td>' . $row['id'] . '</td>
                                                            <td>' . $row['title'] . '</td>
                                                            <td>' . $row['subtitle'] . '</td>'?>
                                                            <td>
                                                                <?php if ($row['status'] == '0') {
                                                                    echo "لم تقرأ";
                                                                }
                                                                elseif ($row['status'] == '1') {
                                                                    echo "تم قرائتها";
                                                                }
                                                                ?>
                                                            </td>
                                                            <td>
                                                                <?php if ($row['type'] == '1') {
                                                                    echo "عامة";
                                                                }
                                                                elseif ($row['type'] == '2') {
                                                                    echo "تحذير";
                                                                }
                                                                elseif ($row['type'] == '3') {
                                                                    echo "تنبيه";
                                                                }
                                                                ?>
                                                            </td>
                                                        <?php
                                                            echo '<td>' . $row['created_by'] . '</td>
                                                        </tr>';
                                                 }
                                            }
                                            else {
            
                                            } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                <!-- </div> -->
                <p>Lorem ima, iscipit nihil eius cumque quos, et fugit nulla!</p>
            </div>
        </div>
        <a href="#">
            <?php
                /*session_start();
                $role = $_SESSION['role'];
                if ($role == 1) {
                    echo "Owner";
                }
                if ($role == 2) {
                    echo "Owner";
                }
                if ($role == 3) {
                    echo "Owner";
                }*/
            ?>
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