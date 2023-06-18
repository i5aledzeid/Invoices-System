<?php 
///////////////////////// Secure login /////////////////////////
session_start();
if (isset($_SESSION['id']) && isset($_SESSION['user_name'])) {
///////////////////////// Secure login /////////////////////////
?>
<!DOCTYPE html>
<html>
<head>
    <!-- bootstrap -->
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous"> -->
    <!-- font awesome -->
    <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" /> -->
	<title>مؤسسة ماجد خالد الحماد</title>
	<!--<link rel="stylesheet" type="text/css" href="style.css">-->
    <link rel="stylesheet" type="text/css" href="assets/css/style-homes.css">
    <link rel="stylesheet" type="text/css" href="assets/css/style-badge.css">
    <link rel="stylesheet" type="text/css" href="assets/css/style-notifys.css">
    <link rel="icon" type="image/x-icon" href="assets/images/favicon6.ico">
    <style>
        .banner {
            background-image: linear-gradient(rgba(0, 0, 0, 0.75), rgba(0, 0, 0, 0.75)), url("pexels-maxime-francis-2346476.jpg");
        }
    </style>
    <?php include "functions/remove_branding.php"; ?>
</head>
<body>
    <div class="banner">
        <div class="navbar">
            <img src="assets/images/favicon6.ico" alt="logo" class="logo">
                <ul>
                    <li><a href="layouts/about/about.php">حول</a></li>
                    <!-- //////////////// ROLE /////////////// -->
                    <?php
                    if ($_SESSION['role'] == 1) {
                         echo '';
                    }
                    else if ($_SESSION['role'] == 3) {
                         echo '
                            <li><a href="admin/admin_panel.php">الصلاحيات والمستخدمين</a>
                                <svg style="color: white;" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-shield-lock" viewBox="0 0 16 16">
                                  <path d="M5.338 1.59a61.44 61.44 0 0 0-2.837.856.481.481 0 0 0-.328.39c-.554 4.157.726 7.19 2.253 9.188a10.725 10.725 0 0 0 2.287 2.233c.346.244.652.42.893.533.12.057.218.095.293.118a.55.55 0 0 0 .101.025.615.615 0 0 0 .1-.025c.076-.023.174-.061.294-.118.24-.113.547-.29.893-.533a10.726 10.726 0 0 0 2.287-2.233c1.527-1.997 2.807-5.031 2.253-9.188a.48.48 0 0 0-.328-.39c-.651-.213-1.75-.56-2.837-.855C9.552 1.29 8.531 1.067 8 1.067c-.53 0-1.552.223-2.662.524zM5.072.56C6.157.265 7.31 0 8 0s1.843.265 2.928.56c1.11.3 2.229.655 2.887.87a1.54 1.54 0 0 1 1.044 1.262c.596 4.477-.787 7.795-2.465 9.99a11.775 11.775 0 0 1-2.517 2.453 7.159 7.159 0 0 1-1.048.625c-.28.132-.581.24-.829.24s-.548-.108-.829-.24a7.158 7.158 0 0 1-1.048-.625 11.777 11.777 0 0 1-2.517-2.453C1.928 10.487.545 7.169 1.141 2.692A1.54 1.54 0 0 1 2.185 1.43 62.456 62.456 0 0 1 5.072.56z"/>
                                  <path d="M9.5 6.5a1.5 1.5 0 0 1-1 1.415l.385 1.99a.5.5 0 0 1-.491.595h-.788a.5.5 0 0 1-.49-.595l.384-1.99a1.5 1.5 0 1 1 2-1.415z"/>
                                </svg>
                            </li>
                         ';
                    }
                    else if ($_SESSION['role'] == 2) {
                         echo '';
                    }
                    ?>
                    <!-- //////////////// ROLE /////////////// -->
                    <li class="notify-menu" style="background-color: transparent;">
                        <?php
                            include "db_conn.php";
                            $name = $_SESSION['name'];
                            $id = $_SESSION['id'];
                            $sql = mysqli_query($conn, "SELECT * FROM notifications WHERE status='0' AND created_by != '$name' AND seen='$id'");
                            $count = mysqli_num_rows($sql);        
                        ?>
                        <?php
                            if ($count > 99) { ?>
                                <a class="badge" id="badge" style="padding: 2px; right: -95px;">+99</a>;
                            <?php }
                            else { ?>
                                <a class="badge" id="badge"><?php echo $count ?></a>;
                            <?php }
                        ?>
                        <a href="#">الإشعارات</a>
                        <svg style="color: white;" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-bell" viewBox="0 0 16 16">
                            <path d="M8 16a2 2 0 0 0 2-2H6a2 2 0 0 0 2 2zM8 1.918l-.797.161A4.002 4.002 0 0 0 4 6c0 .628-.134 2.197-.459 3.742-.16.767-.376 1.566-.663 2.258h10.244c-.287-.692-.502-1.49-.663-2.258C12.134 8.197 12 6.628 12 6a4.002 4.002 0 0 0-3.203-3.92L8 1.917zM14.22 12c.223.447.481.801.78 1H1c.299-.199.557-.553.78-1C2.68 10.2 3 6.88 3 6c0-2.42 1.72-4.44 4.005-4.901a1 1 0 1 1 1.99 0A5.002 5.002 0 0 1 13 6c0 .88.32 4.2 1.22 6z"/>
                        </svg>
                        <div class="sub-menu-x" style="right: 5px;">
                            <ul>
                            <?php
                            // $sql = mysqli_query($conn, "SELECT * FROM notifications WHERE status='0'");
                            $name = $_SESSION['name'];
                            $sql = mysqli_query($conn, "SELECT * FROM `notifications` WHERE status='0' AND created_by != '$name' ORDER BY `notifications`.`date` DESC LIMIT 1");
                            if (mysqli_num_rows($sql) > 0) {
                                while ($result = mysqli_fetch_assoc($sql)) {
                                    echo '
                                        <li>
                                            <a href="layouts/notifications/read_notification.php?id='.$result['id'].'">' . $result['title'] . '! ' . $result['subtitle'] . ' -- بواسطة ' . $result['created_by'] . ' ~' . '</a>
                                        </li>
                                    ';
                                }
                            }
                            else {
                                echo '
                                    <li class="message"><a href="#">
                                    لا توجد إشعارات!
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-emoji-angry-fill" viewBox="0 0 16 16">
                                      <path d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zM4.053 4.276a.5.5 0 0 1 .67-.223l2 1a.5.5 0 0 1 .166.76c.071.206.111.44.111.687C7 7.328 6.552 8 6 8s-1-.672-1-1.5c0-.408.109-.778.285-1.049l-1.009-.504a.5.5 0 0 1-.223-.67zm.232 8.157a.5.5 0 0 1-.183-.683A4.498 4.498 0 0 1 8 9.5a4.5 4.5 0 0 1 3.898 2.25.5.5 0 1 1-.866.5A3.498 3.498 0 0 0 8 10.5a3.498 3.498 0 0 0-3.032 1.75.5.5 0 0 1-.683.183zM10 8c-.552 0-1-.672-1-1.5 0-.247.04-.48.11-.686a.502.502 0 0 1 .166-.761l2-1a.5.5 0 1 1 .448.894l-1.009.504c.176.27.285.64.285 1.049 0 .828-.448 1.5-1 1.5z"/>
                                    </svg>
                                    </a></li>
                                ';
                            }
                            ?>
                            </ul>
                            <a class="more" href="layouts/notifications/read_notifications.php">رؤية <?php echo $count; ?> إشعارات غير مقروؤة</a>
                        </div>
                    </li>
                    <li><a href="#">الحساب</a>
                         <svg style="color: white;" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person" viewBox="0 0 16 16">
                              <path d="M8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6Zm2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0Zm4 8c0 1-1 1-1 1H3s-1 0-1-1 1-4 6-4 6 3 6 4Zm-1-.004c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 10c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664h10Z"/>
                         </svg>
                         <div class="sub-menu">
                              <ul>
                                   <li><a href="layouts/accounts/account.php">عرض الحساب</a></li>
                                   <li><a href="layouts/workshop_invoices/workshop.php">لوحة التحكم</a></li>
                                   <?php 
                                        if (isset($_SESSION['id']) && isset($_SESSION['user_name'])) { 
                                            echo '<li><a href="logout.php">تسجيل خروج</a></li>';
                                        }
                                        else {
                                            echo '<li><a href="#">عنا</a></li>';
                                        }
                                    ?>
                              </ul>
                         </div>
                    </li>
                    <!-- //////////////// ROLE /////////////// -->
                    <?php
                    if ($_SESSION['role'] == 1) {
                        echo '';
                    }
                    else if ($_SESSION['role'] == 3) {
                        // echo '<li><a href="layouts/workshop_invoices/workshop.php">البرامج</a></li>';
                        /*echo '<li><a href="layouts/workshop_invoices/workshop.php">Wrokshop</a></li>';
                        echo '<li><a href="view_exchange_drivers.php">صرف السائقين</a>
                            <div class="sub-menu">
                                <ul>
                                    <li><a href="add_exchange_drivers.php">إضافة فاتورة</a></li>
                                    <li><a href="works.php">عرض التقارير</a></li>
                                    <li><a href="layouts/drivers/drivers.php">السائقين</a></li>
                                    <li><a href="layouts/search_engine/search_engine.php">بحث متقدم</a></li>
                                </ul>
                            </div>
                        </li>';*/
                    }
                    else if ($_SESSION['role'] == 2) {
                         echo '';
                    }
                    ?>
                    <!-- //////////////// ROLE /////////////// -->
                    <li><a href="home.php">الرئيسية</a></li>
               </ul>
          </div>
          <div class="content">
                <!--<h1>
                    {
                    <?php
                        echo $_SESSION['name'];
                    ?>
                    }
                    مرحباً بكم
                </h1>-->
                <br>
                <style>
                    .hello {
                        position: absolute;
                        font-size: 4vw;
                        color: #252839;
                        top: 95px;
                        left: 48%;
                        -webkit-text-stroke: 0.3vw rgb(24, 27, 28);
                        text-transform: uppercase;
                    }
            
                    .hello::before {
                        content: attr(data-text);
                        position: absolute;
                        top: 0;
                        left: 0;
                        width: 0;
                        height: 100%;
                        color: #01fe87;
                        -webkit-text-stroke: 0vw #383d52;
                        border-right: 2px solid #01fe87;
                        overflow: hidden;
                        animation: animate 6s linear infinite;
                    }
            
                    /* from left to right
                    @keyframes animate {
                        0%, 10%, 100% {
                            width: 0;
                        }
                        70%, 90% {
                            width: 100%;
                        }
                    }*/
                    
                    @keyframes animate {
                        70%, 90% {
                            width: 0%;
                        }
                        0%, 10%, 100% {
                            width: 100%;
                        }
                    }
                </style>
                <?php
                    echo '
                        <!--<h1>
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            مرحباً بكم
                        </h1>-->
                        <br><br><br><br><br><br><br>
                        <h2 class="hello" data-text="' . $_SESSION['name'] .'">
                            ' . $_SESSION['name'] . '
                        </h2>
                    ';
                ?>
                <!--<p>.هذا النص هو مثال لنص يمكن أن يستبدل في نفس المساحة، لقد تم توليد هذا النص من مولد النص العربى، حيث يمكنك أن تولد مثل هذا النص إضافة إلى زيادة عدد الحروف التى يولدها التطبيق</p>-->
                <!-- //////////////// ROLE /////////////// -->
                <?php
                    /*if ($_SESSION['role'] == 1) {
                        echo '
                            <button type="button"><span></span><a class="link" href="#">إبدأ الآن</a></button>
                        ';
                    }
                    else if ($_SESSION['role'] == 3) {
                        echo '
                            <button type="button"><span></span><a class="link" href="add_exchange_drivers.php">إبدأ الآن</a></button>
                        ';
                    }
                    else if ($_SESSION['role'] == 2) {
                        echo '
                            <button type="button"><span></span><a class="link" href="#">إبدأ الآن</a></button>
                        ';
                    }*/
                ?>
                <!-- //////////////// ROLE /////////////// -->
          </div>
     </div>
</body>
</html>
<?php
///////////////////////// Secure login /////////////////////////
}
else {
    // header("Location: index.php"); to index6.php
    header("Location: index.php");
    exit();
}
///////////////////////// Secure login /////////////////////////
?>