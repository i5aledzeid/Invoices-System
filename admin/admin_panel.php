<?php 
// session_start();
// if (isset($_SESSION['id']) && isset($_SESSION['user_name'])) {
include "../db_conn.php";
// require_once('db_conn.php');
 //////////////// ROLE ///////////////
  session_start();
  if (isset($_SESSION['role']) /*&& $_SESSION['role'] != 1*/ && $_SESSION['role'] != 3) {
    header('location: home.php');
    die();
  }
  //////////////// ROLE ///////////////
?>
<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" type="text/css" href="../assets/css/style-admin-panel.css">
    <!-- bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <!-- font awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- jquery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.0/jquery.min.js"></script>
    <script type="module">
      import {
        Draggable,
        Point2DSpring,
        Tossable,
        combineStyleStreams,
        getPointerEventStreamsFromElement,
      } from "https://ajax.googleapis.com/ajax/libs/material-motion/0.1.0/material-motion.bundle.js";
    </script>
    <?php include "../functions/remove_branding.php"; ?>
    <link rel="icon" type="image/x-icon" href="../assets/icons/admin_google_security_settings_icon.ico">
	<title>Admin Panel</title>
</head>
<body>
    <div class="tab-container">
        <div class="title">
            <!-- Tooltip -->
            <a href="../home.php" class="hint-link" style="text-decoration: none;" placeholder="dddddd">
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
            المستخدمين <?php echo date("Y"); ?>
        </div>
        <div class="tab-box">
            <button class="tab-button">الإشعارات
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-bell-fill" viewBox="0 0 16 16">
                    <path d="M8 16a2 2 0 0 0 2-2H6a2 2 0 0 0 2 2zm.995-14.901a1 1 0 1 0-1.99 0A5.002 5.002 0 0 0 3 6c0 1.098-.5 6-2 7h14c-1.5-1-2-5.902-2-7 0-2.42-1.72-4.44-4.005-4.901z"/>
                </svg>
            </button>
            <button class="tab-button">الصلاحيات
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-fill-lock" viewBox="0 0 16 16">
                    <path d="M11 5a3 3 0 1 1-6 0 3 3 0 0 1 6 0Zm-9 8c0 1 1 1 1 1h5v-1a1.9 1.9 0 0 1 .01-.2 4.49 4.49 0 0 1 1.534-3.693C9.077 9.038 8.564 9 8 9c-5 0-6 3-6 4Zm7 0a1 1 0 0 1 1-1v-1a2 2 0 1 1 4 0v1a1 1 0 0 1 1 1v2a1 1 0 0 1-1 1h-4a1 1 0 0 1-1-1v-2Zm3-3a1 1 0 0 0-1 1v1h2v-1a1 1 0 0 0-1-1Z"/>
                </svg>
            </button>
            <button class="tab-button active">المستخدمين
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-fill-gear" viewBox="0 0 16 16">
                   <path d="M11 5a3 3 0 1 1-6 0 3 3 0 0 1 6 0Zm-9 8c0 1 1 1 1 1h5.256A4.493 4.493 0 0 1 8 12.5a4.49 4.49 0 0 1 1.544-3.393C9.077 9.038 8.564 9 8 9c-5 0-6 3-6 4Zm9.886-3.54c.18-.613 1.048-.613 1.229 0l.043.148a.64.64 0 0 0 .921.382l.136-.074c.561-.306 1.175.308.87.869l-.075.136a.64.64 0 0 0 .382.92l.149.045c.612.18.612 1.048 0 1.229l-.15.043a.64.64 0 0 0-.38.921l.074.136c.305.561-.309 1.175-.87.87l-.136-.075a.64.64 0 0 0-.92.382l-.045.149c-.18.612-1.048.612-1.229 0l-.043-.15a.64.64 0 0 0-.921-.38l-.136.074c-.561.305-1.175-.309-.87-.87l.075-.136a.64.64 0 0 0-.382-.92l-.148-.045c-.613-.18-.613-1.048 0-1.229l.148-.043a.64.64 0 0 0 .382-.921l-.074-.136c-.306-.561.308-1.175.869-.87l.136.075a.64.64 0 0 0 .92-.382l.045-.148ZM14 12.5a1.5 1.5 0 1 0-3 0 1.5 1.5 0 0 0 3 0Z"/>
                </svg>
            </button>
            <div class="line"></div>
        </div>
        <div class="content-box">
            <div class="content">
                <h2>الإشعارات</h2>
                <!-- <div class="d-flex justify-content-center"> -->
                    <div class="row">
                        <div class="col-md-12">
                            <?php include ("message.php"); ?>
                            <!-- <div class="card-header"><h4>المستخدمين المسجلين</h4></div> -->
                            <div class="card-body" style="overflow:auto; color: red; height:250px;">
                                <table class="table table-secondary table-hover table-bordered">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>العنوان</th>
                                            <th>الوصف</th>
                                            <th>الحالة</th>
                                            <th>المنشئ</th>
                                            <th>التاريخ</th>
                                            <th>العمليات</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                            $query = "SELECT * FROM notifications";
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
                                                            <?php echo '<td>' . $row['created_by'] . '</td>';
                                                            echo '<td>' . $row['date'] . '</td>';?>
                                                            <td>
                                                                <a href="/layouts/notifications/delete_notifications.php?id=<?php echo $row['id'];?>" style="text-decoration: none;">
                                                                    <svg style="color: #FF4546;" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash-fill" viewBox="0 0 16 16">
                                                                      <path d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0z"/>
                                                                    </svg>
                                                                </a>
                                                            <?php '</tr>
                                                    ';
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
                <!-- </div> -->
                <a href="../../layouts/notifications/add_notifications.php">إضافة إشعار جديد</a>
                <p>Lorem ima, iscipit nihil eius cumque quos, et fugit nulla!</p>
            </div>
            <div class="content">
                <h2>شهر 2</h2>
                <p>Lorem ima, iscipit nihil eius cumque quos, et fugit nulla!</p>
            </div>
            <div class="content active">
                <h2>المستخدمين</h2>
                <!-- <div class="d-flex justify-content-center"> -->
                    <div class="row">
                        <div class="col-md-12">
                            <?php include ("message.php"); ?>
                            <!-- <div class="card-header"><h4>المستخدمين المسجلين</h4></div> -->
                            <div class="card-body" style="overflow:auto; color: red; height:250px;">
                                <table class="table table-dark table-hover table-bordered">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>الإسم</th>
                                            <th>إسم المستخدم</th>
                                            <th>الصلاحية</th>
                                            <th>الحالة</th>
                                            <th>العمليات</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                            $query = "SELECT * FROM user";
                                            $query_run = mysqli_query($conn, $query);
                                            echo $time = time();
                                            $status = 'offline';
                                            $class = "btn-danger";
                                            if (mysqli_num_rows($query_run) > 0) {
                                                foreach ($query_run as $row) {
                                                    echo '
                                                        <tr>
                                                            <td>' . $row['id'] . '</td>
                                                            <td>' . $row['name'] . ' ' . $row['middle'] . ' ' . $row['last'] . '</td>
                                                            <td>' . $row['user_name'] . '</td>'?>
                                                            <td>
                                                                <?php if ($row['role'] == '3') {
                                                                        echo "المالك";
                                                                    }
                                                                    elseif ($row['role'] == '1') {
                                                                        echo "المسؤول";
                                                                    }
                                                                    elseif ($row['role'] == '2') {
                                                                        echo "مستخدم";
                                                                    }
                                                                ?>
                                                            </td>
                                                            <?php
                                                                if ($row['last_login'] > $time) {
                                                                    $status = 'online';
                                                                    $class = "btn-success";
                                                                    echo '
                                                                    <td>
                                                            <a href="#" class="btn '.$class.'" id="liveToastBtn">' . $status . '</a>
                                                                    </td>
                                                                    ';
                                                                }
                                                                else {
                                                                    $status = 'offline';
                                                                    $class = "btn-danger";
                                                                    echo '
                                                                    <td>
                                                            <a href="#" class="btn '.$class.'" id="liveToastBtn">' . $status . '</a>
                                                                    </td>
                                                                    ';
                                                                }
                                                            ?>
                                                            <td>
                                                                <a href="edit_admin_panel.php?id=<?php echo $row['id']; ?>" class="btn btn-success" id="liveToastBtn">تعديل</a>
                                                                <button type="button" class="btn btn-danger">حذف</button>
                                                            </td>
                                                            <?php '</tr>
                                                    ';
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
                <!-- </div> -->
                <p>Lorem ima, iscipit nihil eius cumque quos, et fugit nulla!</p>
            </div>
        </div>
        <a href="#">
            <?php
                $role = $_SESSION['role'];
                if ($role == 3) {
                    echo "Owner";
                }
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
    <script>
        function updateUserStatus() {
            jQuery.ajax({
                url:'update_user_status.php',
                success:function() {

                }
            });
        }
        function geteUserStatus() {
            jQuery.ajax({
                url:'get_user_status.php',
                success:function(result) {
                    // jQuery('#user_grid').html(result);
                }
            });
        }
        setInterval(function() {
            updateUserStatus();
        }, 2000);
        setInterval(function() {
            geteUserStatus();
        }, 5000);
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