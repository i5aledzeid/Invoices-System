<?php 
session_start();
include "../db_conn.php";
if (!isset($_SESSION['id'])) {
    header('location: index6.php');
    die();
}
if (isset($_SESSION['id']) && isset($_SESSION['user_name'])) {

 ?>
<!DOCTYPE html>
<html>
<head>
    <style>
    
        .root {
            --background-color: #162329;
        }
        
        .btn {
            width: 100px;
            height: 32px;
            cursor: pointer;
            background: #5D6A71;
            color: white;
            border: 0px;
        }
        
        /* <a> Button https://www.youtube.com/watch?v=xnltEHWWjiM&ab_channel=OnlineTutorials
        :root {
            --hover-color: #1E9BFF;
            --background-color: #27282C;
            --button-color: #ff1867;
        }

        a {
            position: relative;
            background: white;
            text-decoration: none;
            text-transform: uppercase;
            text-align: center;
            color: white;
            letter-spacing: 0.1em;
            padding: 8px 16px;
            transition: 0.5s;
        }

        a:hover {
            background: var(--button-color);
            color: var(--button-color);
            letter-spacing: 0.25em;
            box-shadow: 0 0 32px var(--button-color);
        }

        a::before {
            content: '';
            position: absolute;
            inset: 2px;
            background: #27282C;
        }

        a span {
            position: relative;
            z-index: 1;
        }

        a i {
            position: absolute;
            inset: 0;
            display: block;
        }

        a i::before {
            content: '';
            position: absolute;
            top: 0;
            left: 80%;
            width: 10px;
            height: 4px;
            background: #27282C;
            transform: translateX(-50%)skewX(325deg);
            transition: 0.5s;
        }

        a:hover i::before {
            width: 20px;
            left: 20%;
        }

        a i::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 20%;
            width: 10px;
            height: 4px;
            background: #27282C;
            transform: translateX(-50%)skewX(325deg);
            transition: 0.5s;
        }

        a:hover i::after {
            width: 20px;
            left: 80%;
        }
        */
        
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
        
        #tooltip-2 {
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
        
        .hint-link-2:hover #tooltip-2 {
            opacity: 1;
            visibility: visible;
        }
        
        a.hint-link {
            position: absolute;
            left: -8px;
            top: -16px;
        }
        
        a.hint-link-2 {
            position: absolute;
            right: 100px;
            top: -16px;
        }

    </style>
    <?php include "../functions/remove_branding.php"; ?>
    <!--<link rel="stylesheet" type="text/css" href="style.css">-->
    <link rel="stylesheet" type="text/css" href="../assets/css/style-accounts.css">
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
	<title>Account</title>
</head>
<body>
    <div class="container">
        <div class="profile-box">
            <!--<a href="../home.php">
                <img style="width: 16px;" src="../assets/images/menu_lines_hamburger_icon.png" alt="menu" class="menu-icon">
            </a>-->
            <!-- Tooltip -->
            <a href="../home.php" class="hint-link" style="text-decoration: none;" placeholder="dddddd">
                <img style="width: 16px;" src="../assets/images/menu_lines_hamburger_icon.png" alt="menu" class="menu-icon">
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
            <!-- Tooltip -->
            <!-- Tooltip -->
            <a href="../logout.php" class="hint-link-2" style="text-decoration: none;" placeholder="dddddd">
                <img style="width: 16px;" src="../assets/images/white_close_exit_logout_power_icon.png" alt="menu" class="menu-icon">
                <span id="tooltip-2">تسجيل خروج</span>
                <script>
                    var spanText = document.getElementById('tooltip-2');
                    window.onmousemove = function(e) {
                        var x = e.clientX,
                            y = e.clientY;
                        spanText.style.top = (y + 20) + 'px';
                        spanText.style.left = (x + 20) + 'px';
                    }
                </script>
            </a>
            <!-- Tooltip -->
            <!--<a href="../logout.php">
                <img style="width: 16px;" src="../assets/images/white_close_exit_logout_power_icon.png" alt="settings" class="settings-icon">
            </a>
            <a href="#">-->
                <?php
                    $id = $_SESSION['id'];
                    $query1 = "SELECT * FROM user WHERE id='$id'";
                    $query_run1 = mysqli_query($conn, $query1);
                    if (mysqli_num_rows($query_run1) > 0) {
                        foreach ($query_run1 as $row1) {
                            echo '
                                <img src="' . $row1['image'] . '" alt="profile-image" class="profile-image">
                                <img src="' . $row1['role_image'] . '" alt="profile-image" style="position: absolute; right: 110px; top: 130px; width: 20px; height:20px;" class="profile-image">
                            ';
                        }
                    }
                ?>
            </a>
            <h3>
                <a style="color: white; font-size: 10px;">
                    <?php
                        $id = $_SESSION['id'];
                        $query = "SELECT * FROM user WHERE id='$id'";
                        $query_run = mysqli_query($conn, $query);
                        if (mysqli_num_rows($query_run) > 0) {
                            foreach ($query_run as $row) {
                                if ($row['role'] == '3') {
                                    echo "(المالك)";
                                }
                                elseif ($row['role'] == '1') {
                                    echo "(المسؤول)";
                                }
                                elseif ($row['role'] == '2') {
                                    echo "(مستخدم)";
                                }
                            }
                        }
                    ?>
                </a>
                <?php echo $_SESSION['name']; ?>
            </h3>
            <div class="row">
                <!--<div class="col">
                    <p>إيميل</p>
                </div>-->
                <!-- ONLINE STATUS -->
                <style>
                    .online-status {
                        position: relative;
                        width: 8px;
                        height: 8px;
                        right: 8px;
                        top: -16px;
                        background: #01FE87;
                        border-radius: 50%;
                    }
                    
                    .online-status span {
                        position: absolute;
                        width: 110%;
                        height: 110%;
                        right: 0px;
                        top: 0px;
                        background: inherit;
                        border-radius: inherit;
                        opacity: 0.8;
                        animation: animated 4s ease-out infinite;
                        animation-delay: calc(1s * var(--i));
                    }
                    
                    .offline-status {
                        position: relative;
                        right: 0px;
                        top: 32px;
                        width: 8px;
                        height: 8px;
                        background: #DC3545;
                        border-radius: 50%;
                    }
                    
                    .offline-status span {
                        position: absolute;
                        width: 110%;
                        height: 110%;
                        right: 0px;
                        top: 0px;
                        background: inherit;
                        border-radius: inherit;
                        opacity: 0.8;
                        animation: animated 4s ease-out infinite;
                        animation-delay: calc(1s * var(--i));
                    }
                    
                    @keyframes animated {
                        100% {
                            opacity: 0;
                            transform: scale(2);
                        }
                    }
                    
                </style>
                <?php
                    $time = time();
                    $class = "offline-status";
                    $status = 'Offline';
                    if ($row['last_login'] > $time) {
                        $class = "online-status";
                        $status = 'متصل';
                    ?>
                        <div class="<?php echo $class ?>" id="user_grid">
                            <span style="--i: 0;"></span>
                            <span style="--i: 1;"></span>
                            <span style="--i: 2;"></span>
                            <span style="--i: 3;"></span>
                            <span style="--i: 4;"></span>
                            <span style="--i: 5;"></span>
                            <span style="--i: 6;"></span>
                        </div>
                        <?php echo $status ?>
                    <?php }
                ?>
                <!-- ONLINE STATUS -->
                
                
                
                <style>
                    /* Tooltip container */
                    .tooltip {
                      position: absolute;
                      top: 0px;
                      right: 0px;
                      display: inline-block;
                      border-bottom: 1px dotted black; /* If you want dots under the hoverable text */
                    }
                    
                    /* Tooltip text */
                    .tooltip .tooltiptext {
                      visibility: hidden;
                      width: 120px;
                      background-color: black;
                      color: #fff;
                      text-align: center;
                      padding: 5px 0;
                      border-radius: 6px;
                     
                      /* Position the tooltip text - see examples below! */
                      position: absolute;
                      top: 150px;
                      right: 120px;
                      z-index: 1;
                    }
                    
                    /* Show the tooltip text when you mouse over the tooltip container */
                    .tooltip:hover .tooltiptext {
                      visibility: visible;
                    }
                </style>
                <div class="tooltip">
                    <img src="<?php echo $row1['role_image'] ?>" alt="profile-image" style="position: absolute; right: 110px; top: 130px; width: 20px; height:20px;" class="profile-image">
                    <span class="tooltiptext">تم توثيقه</span>
                </div>
                
                
                
            </div><br>
            <!--<div class="social-media">
                <img src="../assets/images/applications_facebook_media_social_icon.png" alt="facebook">
                <img src="../assets/images/1298770_twitter_bird_social media_tweet_icon.png" alt="twitter">
                <img src="../assets/images/tiktok_logo_social media_icon.png" alt="tiktok">
            </div>-->
            <!--
                <a href="#"><span>تعديل</span><i></i></a>
                <button type="button">متابعة</button>
            -->
            <form action="../admin/edit_user_panel.php" method="POST">
                <input type="hidden" name="id" value="<?php echo $_SESSION['id']; ?>">
                <input type="submit" name="submit" class="btn btn-primary" value="تعديل">
            </form>
            <div class="profile-bottom">
                
                <!-- //////////////// ROLE /////////////// -->
                <?php
                    if ($_SESSION['role'] == 1) {?>
                <?php }
                    else if ($_SESSION['role'] == 3) { ?>
                        <p>للمزيد عن الحساب ، كما يمكنك <a href="../admin/edit_admin_panel.php?id=<?php echo $id;?>">تعديل الحساب</a></p>
                <?php }
                    else if ($_SESSION['role'] == 2) { ?>

                <?php } ?>
                <!-- //////////////// ROLE /////////////// -->
                <img src="../assets/images/down_arrow_icon.png" alt="">
            </div>
        </div>
    </div>
    <script>
        function updateUserStatus() {
            jQuery.ajax({
                url:'../admin/update_user_status.php',
                success:function() {

                }
            });
        }
        function geteUserStatus() {
            jQuery.ajax({
                url:'../admin/get_user_status.php',
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
</body>
</html>

<?php 
}else{
     header("Location: index.php");
     exit();
}
 ?>