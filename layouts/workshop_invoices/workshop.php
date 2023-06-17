<?php
    session_start();
    include "../../db_conn.php";
    if (!isset($_SESSION['id'])) {
        header('location: index6.php');
        die();
    }
    if (isset($_SESSION['id']) && isset($_SESSION['user_name'])) {
        $id = $_SESSION['id'];
        $query1 = "SELECT * FROM user WHERE id='$id'";
        $query_run1 = mysqli_query($conn, $query1);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="/assets/icons/bxs_dashboard_icon.ico">
    <title>لوحة التحكم</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Cairo:wght@700&display=swap');
        @import url('https://fonts.googleapis.com/css2?family=Amiri+Quran&display=swap');
        
        * {
            padding: 0;
            margin: 0;
            box-sizing: border-box;
        }

        a {
            text-decoration: none;
            color: red;
        }
        
        a:hover {
            color: blue;
        }

        html {
            scroll-behavior: smooth;
        }

        body {
            height: 100vh;
            display: grid;
            grid-template-columns: 0px 1fr;
            grid-template-rows: 60px 1fr;
            grid-template-areas:
                "side header"
                "side main";
            transition: 0.4s;
        }

        .close {
            height: 100vh;
            display: grid;
            grid-template-columns: 250px 1fr;
            grid-template-rows: 60px 1fr;
            grid-template-areas:
                "side header"
                "side main";
            transition: 0.4s;
        }

        .header {
            background-color: #fff;
            grid-area: header;
            /*grid-column: 2/3;
            grid-row: 1/2;*/
        }

        .sidebar {
            background-color: #1c1f23;
            grid-area: side;
            /*grid-column: 1/2;
            grid-row: 1/3;*/
        }

        .main {
            background-color: #c3c5ca;
            padding: 16px;
            grid-area: main;
            display: grid;
            grid-template-columns: 1fr 1fr 1fr 1fr 1fr 1fr 1fr;
            grid-template-rows: 1fr 1fr 1fr 1fr;
            grid-template-areas: 
                "c1 c2 c3 c5 c6 c4 c8"
                "c7 c7 c7 c7 c7 c7 c8"
                "c7 c7 c7 c7 c7 c7 c8"
                "c7 c7 c7 c7 c7 c7 c8";
            gap: 16px;
            /*grid-column: 2/3;
            grid-row: 2/3;*/
        }

        .card {
            background-color: #f6f7f9;
            border-radius: 8px;
        }

        .card:nth-child(1) {
            grid-area: c1;
            background: url(https://images.rawpixel.com/image_800/czNmcy1wcml2YXRlL3Jhd3BpeGVsX2ltYWdlcy93ZWJzaXRlX2NvbnRlbnQvbHIvcm0zNjItMDFnXzEuanBn.jpg);
        }

        .card:nth-child(2) {
            grid-area: c2;
            background: url(https://images.rawpixel.com/image_800/czNmcy1wcml2YXRlL3Jhd3BpeGVsX2ltYWdlcy93ZWJzaXRlX2NvbnRlbnQvbHIvdjQ0NS10YXVzLTAyYi10ZWNobm9sb2d5YmFja2dyb3VuZGlkZWFfMl8wLmpwZw.jpg);
        }

        .card:nth-child(3) {
            grid-area: c3;
            background: url(https://images.rawpixel.com/image_800/czNmcy1wcml2YXRlL3Jhd3BpeGVsX2ltYWdlcy93ZWJzaXRlX2NvbnRlbnQvbHIvcm0yNjYtbnVubnktMDcuanBn.jpg);
        }

        .card:nth-child(4) {
            grid-area: c4;
            background: url(https://images.rawpixel.com/image_800/czNmcy1wcml2YXRlL3Jhd3BpeGVsX2ltYWdlcy93ZWJzaXRlX2NvbnRlbnQvbHIvdjQ2MS10YXVzLTE0YS1tb2Rlcm5ibGFja2FuZHdoaXRlXzEuanBn.jpg);
        }

        .card:nth-child(5) {
            grid-area: c5;
            background: url(https://images.rawpixel.com/image_800/cHJpdmF0ZS9sci9pbWFnZXMvd2Vic2l0ZS8yMDIzLTAzL3Bkd2F0ZXJjb2xvcjEtbWV0MzM0Mjg2LWltYWdlLmpwZw.jpg);
        }

        .card:nth-child(6) {
            grid-area: c6;
            background: url(https://images.rawpixel.com/image_800/czNmcy1wcml2YXRlL3Jhd3BpeGVsX2ltYWdlcy93ZWJzaXRlX2NvbnRlbnQvbHIvcm0zMy1jaGltLTAxLWUtd2FsbC5qcGc.jpg);
        }
        
        .card:nth-child(7) {
            grid-area: c7;
            background: url(https://images.rawpixel.com/image_800/czNmcy1wcml2YXRlL3Jhd3BpeGVsX2ltYWdlcy93ZWJzaXRlX2NvbnRlbnQvdjExNDctYmctMDEtMi1rem93MTJwNi5qcGc.jpg);
        }
        
        .card:nth-child(8) {
            grid-area: c8;
            background: url(https://images.rawpixel.com/image_800/czNmcy1wcml2YXRlL3Jhd3BpeGVsX2ltYWdlcy93ZWJzaXRlX2NvbnRlbnQvbHIvcm0yODMtbnVubnktMDExXzEuanBn.jpg);
        }
        
        .x {
            position: absolute;
            cursor: pointer;
            top: 18px;
            left: 16px;
            transition: 0.4s;
        }

        .x-close {
            position: absolute;
            cursor: pointer;
            top: 18px;
            left: 270px;
            transition: 0.4s;
        }

        .icon {
            position: absolute;
            cursor: pointer;
            top: 18px;
            right: 30px;
            transition: 0.4s;
        }

        .icon-close {
            position: absolute;
            cursor: pointer;
            top: 18px;
            right: 16px;
            transition: 0.4s;
        }

        .body {
            text-align: center;
            position: relative;
            font-size: 20px;
            font-family: 'Amiri Quran', serif;
            cursor: pointer;
            top: 40%;
        }

        .head-title {
            position: relative;
            top: -22px;
            right: -1360px;
        }

        .head-account {
            position: relative;
            top: -44px;
            right: -1360px;
        }

        .head-account2 {
            position: relative;
            top: -65px;
            right: -1260px;
        }

        .head-account3 {
            position: relative;
            top: -86px;
            right: -1160px;
        }

        .head-account4 {
            position: relative;
            top: -107px;
            right: -1060px;
        }

        .head-account5 {
            position: relative;
            top: -129px;
            right: -1000px;
        }

        .title {
            position: absolute;
            top: 0px;
            right: 64px;
            transition: 0.4s;
            font-size: 18px;
            font-weight: bold;
            font-family: 'Amiri Quran', serif;
        }

        .title-close {
            position: absolute;
            top: 16px;
            right: 50px;
            transition: 0.4s;
        }

        .sidebar-header {
            position: absolute;
            width: 0px;
            height: 180px;
            top: 0;
            left: 0;
            background-image: url("pexels-eberhard-grossgasteiger-2088208.jpg");
            opacity: 0;
            background-position: center;
            background-repeat: no-repeat;
            background-size: cover;
            transition: 0.4s;
        }

        .sidebar-header-show {
            position: absolute;
            width: 250px;
            height: 180px;
            top: 0;
            left: 0;
            background-image: url("https://images.rawpixel.com/image_800/czNmcy1wcml2YXRlL3Jhd3BpeGVsX2ltYWdlcy93ZWJzaXRlX2NvbnRlbnQvbHIvdjk0NC1iYi0xNi5qcGc.jpg");
            opacity: 0.9;
            background-position: center;
            background-repeat: no-repeat;
            background-size: cover;
            transition: 0.4s;
        }

        .sidebar-header img {
            width: 0px;
            transition: 0s;
        }

        .sidebar-header-show img {
            position: absolute;
            top: 42px;
            left: 16px;
            width: 72px;
            height: 72px;
            border-radius: 50%;
            transition: 0.4s;
        }

        .sidebar-header .user {
            display: none;
            transition: 0s;
        }

        .sidebar-header-show .user {
            position: absolute;
            top: 58px;
            left: 100px;
            width: 90px;
            height: 90px;
            font-size: 16px;
            border-radius: 50%;
            transition: 0.4s;
        }

        .sidebar-header .email {
            display: none;
            transition: 0s;
        }

        .sidebar-header-show .email {
            position: absolute;
            top: 82px;
            left: 100px;
            width: 90px;
            height: 90px;
            font-size: 14px;
            border-radius: 50%;
            transition: 0.4s;
        }

        .sidebar-icons {
            /*display: none;*/
            position: absolute;
            cursor: pointer;
            left: -150px;
            top: 220px;
            color: white;
            transition: 0.4s;
        }

        .sidebar-icons-show {
            display: block;
            position: absolute;
            cursor: pointer;
            left: 52px;
            top: 220px;
            color: white;
            transition: 0.4s;
        }

        @media (max-width: 700px) {

            body {
                height: 100vh;
                display: grid;
                grid-template-columns: 0px 1fr;
                grid-template-rows: 60px 1fr;
                grid-template-areas:
                    "side header"
                    "side main";
                transition: 0.4s;
            }

            .main {
                background-color: #c3c5ca;
                padding: 16px;
                grid-area: main;
                display: grid;
                grid-template-columns: 1fr 1fr 1fr;
                grid-template-rows: 1fr 1fr 1fr;
                grid-template-areas: 
                    "c1"
                    "c2"
                    "c3"
                    "c4"
                    "c5"
                    "c6"
                    "c7"
                    "c8";
                gap: 8px;
                /*grid-column: 2/3;
                grid-row: 2/3;*/
            }

            .card {
                background-color: #f6f7f9;
                height: 130px;
                border-radius: 8px;
            }

            .card:nth-child(1) {
                grid-area: c1;
            }

            .card:nth-child(2) {
                grid-area: c2;
            }

            .card:nth-child(3) {
                grid-area: c3;
            }

            .card:nth-child(4) {
                grid-area: c4;
            }

            .card:nth-child(5) {
                grid-area: c5;
            }

            .card:nth-child(6) {
                grid-area: c6;
            }
            
            .card:nth-child(7) {
                grid-area: c7;
            }
            
            .card:nth-child(8) {
                grid-area: c8;
            }

            .close {
                height: 100vh;
                display: grid;
                grid-template-columns: 280px 1fr;
                grid-template-rows: 60px 1fr;
                grid-template-areas:
                    "side header"
                    "side main";
                transition: 0.4s;
            }

            .x {
                position: absolute;
                cursor: pointer;
                top: 18px;
                left: 18px;
                transition: 0.4s;
            }

            .x-close {
                position: absolute;
                cursor: pointer;
                top: 18px;
                left: 300px;
                transition: 0.4s;
            }

            .body {
                text-align: center;
                position: relative;
                font-size: 16px;
                cursor: pointer;
                top: 40%;
            }

            .head-title {
                position: relative;
                top: -22px;
                left: 260px;
            }

            .main {
                grid-template-columns: 1fr;
                grid-template-rows: repeat(8, 140px);
                grid-template-areas: initial;
            }

            .card {
                grid-area: initial !important;
            }

            .title {
                display: flex;
                position: absolute;
                top: 0px;
                right: 64px;
                font-size: 16px;
                font-weight: bold;
                font-family: 'Amiri Quran', serif;
                transition: 0.4s;
            }

            .title-close {
                display: none;
                transition: 0.4s;
            }

            .sidebar-header {
                position: absolute;
                width: 0px;
                height: 180px;
                top: 0;
                left: 0;
                /*background-image: url("pexels-eberhard-grossgasteiger-691668.jpg");*/
                background-color: #1c1f23;
                background-position: center;
                background-repeat: no-repeat;
                background-size: cover;
                transition: 0.4s;
            }

            .sidebar-header-show {
                position: absolute;
                width: 280px;
                height: 180px;
                top: 0;
                left: 0;
                /*background-image: url("pexels-eberhard-grossgasteiger-691668.jpg");*/
                background-color: #c3c5ca;
                background-position: center;
                background-repeat: no-repeat;
                background-size: cover;
                transition: 0.4s;
            }

            .sidebar-header img {
                width: 0px;
                transition: 0s;
            }

            .sidebar-header-show img {
                position: absolute;
                top: 42px;
                left: 32px;
                width: 72px;
                height: 72px;
                border-radius: 50%;
                transition: 0.4s;
            }
            
            .sidebar-header .user {
                display: none;
                transition: 0s;
            }

            .sidebar-header-show .user {
                position: absolute;
                top: 58px;
                left: 120px;
                width: 90px;
                height: 90px;
                font-size: 18px;
                border-radius: 50%;
                transition: 0.4s;
            }

            .sidebar-header .email {
                display: none;
                transition: 0s;
            }

            .sidebar-header-show .email {
                position: absolute;
                top: 82px;
                left: 120px;
                width: 90px;
                height: 90px;
                font-size: 16px;
                border-radius: 50%;
                transition: 0.4s;
            }

            .sidebar-icons {
                display: none;
                /*position: absolute;
                cursor: pointer;
                left: 52px;
                top: 220px;*/
                color: white;
            }

            .sidebar-icons-show {
                display: block;
                position: absolute;
                cursor: pointer;
                left: 52px;
                top: 220px;
                color: white;
            }
        }
        
        /*********************************************************/
        .loader {
            position: fixed;
            top: 0;
            left: 0;
            width: 100vw;
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            background: #333333;
            /*transition: opacity 0.75s, visibility 0.75s;*/
            transition: opacity 0.75s, visibility 16s;
        }

        .loader--hidden {
            opacity: 0;
            visibility: hidden;
        }

        .loader::after {
            content: "";
            width: 32px;
            height: 32px;
            border: 2px solid #dddddd;
            border-top-color: #009578;
            border-radius: 50%;
            animation: loading 0.75s ease infinite;
        }

        @keyframes loading {
            from {
                transform: rotate(0turn);
            }

            to {
                transform: rotate(1turn);
            }
        }
        /*********************************************************/

    </style>
    <?php include "../../functions/remove_branding.php"; ?>
</head>
<body id="body">
    <div class="loader"></div>
    <header class="header">
        <div class="title" id="title">مُؤسَسَة مَاجِد خَالِد الْحَمَّاد</div>
        <a href="../../home.php"><div class="icon" id="icon">
            <svg style="color: black;" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-house" viewBox="0 0 16 16">
                <path d="M8.707 1.5a1 1 0 0 0-1.414 0L.646 8.146a.5.5 0 0 0 .708.708L2 8.207V13.5A1.5 1.5 0 0 0 3.5 15h9a1.5 1.5 0 0 0 1.5-1.5V8.207l.646.647a.5.5 0 0 0 .708-.708L13 5.793V2.5a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5v1.293L8.707 1.5ZM13 7.207V13.5a.5.5 0 0 1-.5.5h-9a.5.5 0 0 1-.5-.5V7.207l5-5 5 5Z"/>
            </svg>
        </div></a>
    </header>
    <section class="sidebar">
        <div class="sidebar-header" id="sidebar-header">
            <?php
                $id = $_SESSION['id'];
                $query1 = "SELECT * FROM user WHERE id='$id'";
                $query_run1 = mysqli_query($conn, $query1);
                if (mysqli_num_rows($query_run1) > 0) {
                    foreach ($query_run1 as $row1) {
                        echo '
                            <img src='.$row1['image'].' alt="image">
                        ';
                    }
                }
            ?>
            <!--<img src="4043256_indian_male_man_person_icon.png" alt="image">-->
            <p class="email">
                <?php
                    $id = $_SESSION['id'];
                    $query1 = "SELECT * FROM user WHERE id='$id'";
                    $query_run1 = mysqli_query($conn, $query1);
                    if (mysqli_num_rows($query_run1) > 0) {
                        foreach ($query_run1 as $row1) {
                            echo $row1['email'];
                        }
                    }
                ?>
            </p>
            <p class="user">
                <?php
                    $id = $_SESSION['id'];
                    $query1 = "SELECT * FROM user WHERE id='$id'";
                    $query_run1 = mysqli_query($conn, $query1);
                    if (mysqli_num_rows($query_run1) > 0) {
                        foreach ($query_run1 as $row1) {
                            echo '@' . $_SESSION['user_name'];
                        }
                    }
                ?>
            </p>
        </div>
        <div class="x" id="x" onclick="closeSidebar()">
            <svg id="svg-x" style="color: black;" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-three-dots-vertical" viewBox="0 0 16 16">
                <path d="M9.5 13a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0zm0-5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0zm0-5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0z"/>
            </svg>
            <!--<div class="head-title">الرئيسية</div>
            <div class="head-account">الرئيسية</div>
            <div class="head-account2">البرامج</div>
            <div class="head-account3">الإشعارات</div>
            <div class="head-account4">الصلاحيات</div>
            <div class="head-account5">حول</div>-->
        </div>
        <div class="sidebar-icons" id="sidebar-icons">
            <svg style="color: white;" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-house" viewBox="0 0 16 16">
                <path d="M8.707 1.5a1 1 0 0 0-1.414 0L.646 8.146a.5.5 0 0 0 .708.708L2 8.207V13.5A1.5 1.5 0 0 0 3.5 15h9a1.5 1.5 0 0 0 1.5-1.5V8.207l.646.647a.5.5 0 0 0 .708-.708L13 5.793V2.5a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5v1.293L8.707 1.5ZM13 7.207V13.5a.5.5 0 0 1-.5.5h-9a.5.5 0 0 1-.5-.5V7.207l5-5 5 5Z"/>
            </svg> Home
            <br><br><br>
            <svg style="color: white;" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-truck" viewBox="0 0 16 16">
                <path d="M0 3.5A1.5 1.5 0 0 1 1.5 2h9A1.5 1.5 0 0 1 12 3.5V5h1.02a1.5 1.5 0 0 1 1.17.563l1.481 1.85a1.5 1.5 0 0 1 .329.938V10.5a1.5 1.5 0 0 1-1.5 1.5H14a2 2 0 1 1-4 0H5a2 2 0 1 1-3.998-.085A1.5 1.5 0 0 1 0 10.5v-7zm1.294 7.456A1.999 1.999 0 0 1 4.732 11h5.536a2.01 2.01 0 0 1 .732-.732V3.5a.5.5 0 0 0-.5-.5h-9a.5.5 0 0 0-.5.5v7a.5.5 0 0 0 .294.456zM12 10a2 2 0 0 1 1.732 1h.768a.5.5 0 0 0 .5-.5V8.35a.5.5 0 0 0-.11-.312l-1.48-1.85A.5.5 0 0 0 13.02 6H12v4zm-9 1a1 1 0 1 0 0 2 1 1 0 0 0 0-2zm9 0a1 1 0 1 0 0 2 1 1 0 0 0 0-2z"/>
            </svg> Exchange Drivers
            <br><br><br>
            <svg style="color: white;" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-clipboard-data-fill" viewBox="0 0 16 16">
                <path d="M6.5 0A1.5 1.5 0 0 0 5 1.5v1A1.5 1.5 0 0 0 6.5 4h3A1.5 1.5 0 0 0 11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3Zm3 1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-3a.5.5 0 0 1-.5-.5v-1a.5.5 0 0 1 .5-.5h3Z"/>
                <path d="M4 1.5H3a2 2 0 0 0-2 2V14a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V3.5a2 2 0 0 0-2-2h-1v1A2.5 2.5 0 0 1 9.5 5h-3A2.5 2.5 0 0 1 4 2.5v-1ZM10 8a1 1 0 1 1 2 0v5a1 1 0 1 1-2 0V8Zm-6 4a1 1 0 1 1 2 0v1a1 1 0 1 1-2 0v-1Zm4-3a1 1 0 0 1 1 1v3a1 1 0 1 1-2 0v-3a1 1 0 0 1 1-1Z"/>
            </svg> Fund Inquiry
            <br><br><br>
            <svg style="color: white;" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-bar-chart-fill" viewBox="0 0 16 16">
                <path d="M1 11a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v3a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1v-3zm5-4a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v7a1 1 0 0 1-1 1H7a1 1 0 0 1-1-1V7zm5-5a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1h-2a1 1 0 0 1-1-1V2z"/>
            </svg> Al Hammad Query
            <br><br><br>
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-bell-fill" viewBox="0 0 16 16">
                <path d="M8 16a2 2 0 0 0 2-2H6a2 2 0 0 0 2 2zm.995-14.901a1 1 0 1 0-1.99 0A5.002 5.002 0 0 0 3 6c0 1.098-.5 6-2 7h14c-1.5-1-2-5.902-2-7 0-2.42-1.72-4.44-4.005-4.901z"/>
            </svg> Notifications
            <br><br><br>
            <svg style="color: white;" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-buildings" viewBox="0 0 16 16">
                <path d="M14.763.075A.5.5 0 0 1 15 .5v15a.5.5 0 0 1-.5.5h-3a.5.5 0 0 1-.5-.5V14h-1v1.5a.5.5 0 0 1-.5.5h-9a.5.5 0 0 1-.5-.5V10a.5.5 0 0 1 .342-.474L6 7.64V4.5a.5.5 0 0 1 .276-.447l8-4a.5.5 0 0 1 .487.022ZM6 8.694 1 10.36V15h5V8.694ZM7 15h2v-1.5a.5.5 0 0 1 .5-.5h2a.5.5 0 0 1 .5.5V15h2V1.309l-7 3.5V15Z"/>
                <path d="M2 11h1v1H2v-1Zm2 0h1v1H4v-1Zm-2 2h1v1H2v-1Zm2 0h1v1H4v-1Zm4-4h1v1H8V9Zm2 0h1v1h-1V9Zm-2 2h1v1H8v-1Zm2 0h1v1h-1v-1Zm2-2h1v1h-1V9Zm0 2h1v1h-1v-1ZM8 7h1v1H8V7Zm2 0h1v1h-1V7Zm2 0h1v1h-1V7ZM8 5h1v1H8V5Zm2 0h1v1h-1V5Zm2 0h1v1h-1V5Zm0-2h1v1h-1V3Z"/>
            </svg> Workshop
        </div>
    </section>
    <main class="main">
        <div class="card">
            <div class="body">
                <a href="/layouts/about/about.php">حول</a>
            </div>
        </div>
        <div class="card">
            <div class="body">
                <?php
                    $car_owner = "الحماد";
                    echo '
                        <a href="../../work.php?car_owner=' . $car_owner . '">إستعلام الحماد</a>
                    ';
                ?>
            </div>
        </div>
        <div class="card">
            <div class="body">
                <a href="/works.php">إستعلام الصندوق</a>
            </div>
        </div>
        <div class="card">
            <div class="body">
                <a href="../../layouts/workshop_invoices/view_workshop_invoices.php">الورشة</a>
            </div>
        </div>
        <div class="card">
            <div class="body">
                <a href="../../layouts/search_engine/search_engine.php">محرك البحث</a>
            </div>
        </div>
        <div class="card">
            <div class="body">
                <a href="../../layouts/exchange_drivers/view_exchange_drivers.php">صرف السائقين</a>
            </div>
        </div>
        <div class="card">
            <div class="body">
                <a href="#"></a>
            </div>
        </div>
        <div class="card">
            <div class="body">
                <a href="#"></a>
            </div>
        </div>
    </main>
</body>
<script>
    function closeSidebar() {
        document.getElementById("body").classList.toggle('close');
        document.getElementById("x").classList.toggle('x-close');
        if (document.getElementById("x").classList.contains('x-close')) {
            document.getElementById("svg-x").style.color = "black";
            // document.getElementById("x").classList.add('x-close');
            document.getElementById("title").classList.add('title-close');
            document.getElementById("title").classList.remove('title');
            document.getElementById("sidebar-header").classList.add('sidebar-header-show');
            document.getElementById("sidebar-header").classList.remove('sidebar-header');
            document.getElementById("sidebar-icons").classList.add('sidebar-icons-show');
            document.getElementById("sidebar-icons").classList.remove('sidebar-icons');
        }
        else {
            document.getElementById("svg-x").style.color = "black";
            // document.getElementById("x").classList.remove('x-close');
            document.getElementById("title").classList.add('title');
            document.getElementById("title").classList.remove('title-close');
            document.getElementById("sidebar-header").classList.add('sidebar-header');
            document.getElementById("sidebar-header").classList.remove('sidebar-header-show');
            document.getElementById("sidebar-icons").classList.add('sidebar-icons');
            document.getElementById("sidebar-icons").classList.remove('sidebar-icons-show');
        }
        document.getElementById("icon").classList.toggle('icon-close');
    }
</script>
<script>
    window.addEventListener("load", () => {
        const loader = document.querySelector(".loader");
        loader.classList.add("loader--hidden");
        loader.addEventListener("transitionend", () => {
            document.body.removeChild(loader);
        });
    });
</script>
</html>
<?php } ?>