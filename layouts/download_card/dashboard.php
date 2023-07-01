<?php
    session_start();
    include "../../database/db_conn.php";
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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <title>لوحة التحكم | بطاقة التنزيل</title>
    <!-- bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <!-- font awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.0/jquery.min.js"></script>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Cairo:wght@700&display=swap');
        @import url('https://fonts.googleapis.com/css2?family=Amiri+Quran&display=swap');
        @import url('https://fonts.googleapis.com/css2?family=Amiri+Quran&family=IBM+Plex+Sans+Arabic&display=swap');
        
        * {
            padding: 0;
            margin: 0;
            box-sizing: border-box;
            /*direction: rtl;*/
        }

        a {
            text-decoration: none;
            color: black;
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
            padding-top: 84px;
            grid-area: main;
            display: grid;
            grid-template-columns: 1fr 1fr 1fr 1fr 1fr 1fr;
            grid-template-rows: 1fr 1fr 1fr 1fr 1fr;
            grid-template-areas: 
                "c6 c5 c4 c3 c2 c1"
                "c12 c11 c10 c9 c8 c7"
                "c18 c17 c16 c15 c14 c13"
                "c19 c19 c19 c19 c19 c19"
                "c19 c19 c19 c19 c19 c19";
            gap: 16px;
            /*grid-column: 2/3;
            grid-row: 2/3;*/
        }
        
        #v {
            position: absolute;
            top: 0px;
            left: 20%;
        }
        
        #d {
            position: absolute;
            top: 16px;
            left: 40%;
        }
        
        #c {
            position: absolute;
            top: 0px;
            left: 20%;
        }

        .card {
            background-color: #f6f7f9;
            border-radius: 8px;
        }
        
        #main-title {
            color: white;
            font-weight: bold;
        }
        
        #main-title-to {
            color: white;
            position: absolute;
            top: -8px;
            left: -62px;
            font-weight: bold;
        }
        
        #main-title-background {
          background-color: #04AA6D;
          color: white;
          padding: 8px;
          font-size: 16px;
          border: none;
          width: 110px;
          position: absolute;
          bottom: 515px;
          right: 32px;
        }
        
        #main-title-background-2 {
          background-color: #04AA6D;
          color: white;
          padding: 8px;
          font-size: 16px;
          border: none;
          width: 90px;
          position: absolute;
          bottom: 515px;
          right: 32px;
        }

        .card:nth-child(1) {
            grid-area: c1;
            background: url(https://images.rawpixel.com/image_800/czNmcy1wcml2YXRlL3Jhd3BpeGVsX2ltYWdlcy93ZWJzaXRlX2NvbnRlbnQvbHIvdjQ2MS10YXVzLTE0YS1tb2Rlcm5ibGFja2FuZHdoaXRlXzEuanBn.jpg);
            /* Center and scale the image nicely */
            background-position: center;
            background-repeat: no-repeat;
            background-size: cover;
            opacity: 0.8;
        }

        .card:nth-child(2) {
            grid-area: c2;
            background: url(https://images.rawpixel.com/image_800/czNmcy1wcml2YXRlL3Jhd3BpeGVsX2ltYWdlcy93ZWJzaXRlX2NvbnRlbnQvbHIvdjQ2MS10YXVzLTE0YS1tb2Rlcm5ibGFja2FuZHdoaXRlXzEuanBn.jpg);
            /* Center and scale the image nicely */
            background-position: center;
            background-repeat: no-repeat;
            background-size: cover;
            opacity: 0.8;
        }

        .card:nth-child(3) {
            grid-area: c3;
            background: url(https://images.rawpixel.com/image_800/czNmcy1wcml2YXRlL3Jhd3BpeGVsX2ltYWdlcy93ZWJzaXRlX2NvbnRlbnQvbHIvdjQ2MS10YXVzLTE0YS1tb2Rlcm5ibGFja2FuZHdoaXRlXzEuanBn.jpg);
            /* Center and scale the image nicely */
            background-position: center;
            background-repeat: no-repeat;
            background-size: cover;
            opacity: 0.8;
        }

        .card:nth-child(4) {
            grid-area: c4;
            background: url(https://images.rawpixel.com/image_800/czNmcy1wcml2YXRlL3Jhd3BpeGVsX2ltYWdlcy93ZWJzaXRlX2NvbnRlbnQvbHIvdjQ2MS10YXVzLTE0YS1tb2Rlcm5ibGFja2FuZHdoaXRlXzEuanBn.jpg);
            /* Center and scale the image nicely */
            background-position: center;
            background-repeat: no-repeat;
            background-size: cover;
            opacity: 0.8;
        }

        .card:nth-child(5) {
            grid-area: c5;
            background: url(https://images.rawpixel.com/image_800/czNmcy1wcml2YXRlL3Jhd3BpeGVsX2ltYWdlcy93ZWJzaXRlX2NvbnRlbnQvbHIvdjQ2MS10YXVzLTE0YS1tb2Rlcm5ibGFja2FuZHdoaXRlXzEuanBn.jpg);
            /* Center and scale the image nicely */
            background-position: center;
            background-repeat: no-repeat;
            background-size: cover;
            opacity: 0.8;
        }

        .card:nth-child(6) {
            grid-area: c6;
            background: url(https://images.rawpixel.com/image_800/czNmcy1wcml2YXRlL3Jhd3BpeGVsX2ltYWdlcy93ZWJzaXRlX2NvbnRlbnQvbHIvdjQ2MS10YXVzLTE0YS1tb2Rlcm5ibGFja2FuZHdoaXRlXzEuanBn.jpg);
            /* Center and scale the image nicely */
            background-position: center;
            background-repeat: no-repeat;
            background-size: cover;
            opacity: 0.8;
        }
        
        .card:nth-child(7) {
            grid-area: c7;
            background: url(https://images.rawpixel.com/image_800/czNmcy1wcml2YXRlL3Jhd3BpeGVsX2ltYWdlcy93ZWJzaXRlX2NvbnRlbnQvbHIvdjQ2MS10YXVzLTE0YS1tb2Rlcm5ibGFja2FuZHdoaXRlXzEuanBn.jpg);
            /* Center and scale the image nicely */
            background-position: center;
            background-repeat: no-repeat;
            background-size: cover;
            opacity: 0.8;
        }
        
        .card:nth-child(8) {
            grid-area: c8;
            background: url(https://images.rawpixel.com/image_800/czNmcy1wcml2YXRlL3Jhd3BpeGVsX2ltYWdlcy93ZWJzaXRlX2NvbnRlbnQvbHIvdjQ2MS10YXVzLTE0YS1tb2Rlcm5ibGFja2FuZHdoaXRlXzEuanBn.jpg);
            /* Center and scale the image nicely */
            background-position: center;
            background-repeat: no-repeat;
            background-size: cover;
            opacity: 0.8;
        }
        
        .card:nth-child(9) {
            grid-area: c9;
            background: url(https://images.rawpixel.com/image_800/czNmcy1wcml2YXRlL3Jhd3BpeGVsX2ltYWdlcy93ZWJzaXRlX2NvbnRlbnQvbHIvdjQ2MS10YXVzLTE0YS1tb2Rlcm5ibGFja2FuZHdoaXRlXzEuanBn.jpg);
            /* Center and scale the image nicely */
            background-position: center;
            background-repeat: no-repeat;
            background-size: cover;
            opacity: 0.8;
        }
        
        .card:nth-child(10) {
            grid-area: c10;
            background: url(https://images.rawpixel.com/image_800/czNmcy1wcml2YXRlL3Jhd3BpeGVsX2ltYWdlcy93ZWJzaXRlX2NvbnRlbnQvbHIvdjQ2MS10YXVzLTE0YS1tb2Rlcm5ibGFja2FuZHdoaXRlXzEuanBn.jpg);
            /* Center and scale the image nicely */
            background-position: center;
            background-repeat: no-repeat;
            background-size: cover;
            opacity: 0.8;
        }
        
        .card:nth-child(11) {
            grid-area: c11;
            background: url(https://images.rawpixel.com/image_800/czNmcy1wcml2YXRlL3Jhd3BpeGVsX2ltYWdlcy93ZWJzaXRlX2NvbnRlbnQvbHIvdjQ2MS10YXVzLTE0YS1tb2Rlcm5ibGFja2FuZHdoaXRlXzEuanBn.jpg);
            /* Center and scale the image nicely */
            background-position: center;
            background-repeat: no-repeat;
            background-size: cover;
            opacity: 0.8;
        }
        
        .card:nth-child(12) {
            grid-area: c12;
            /*background: url(https://images.rawpixel.com/image_800/czNmcy1wcml2YXRlL3Jhd3BpeGVsX2ltYWdlcy93ZWJzaXRlX2NvbnRlbnQvdjExNDctYmctMDEtMi1rem93MTJwNi5qcGc.jpg);*/
            background: url(https://images.rawpixel.com/image_800/czNmcy1wcml2YXRlL3Jhd3BpeGVsX2ltYWdlcy93ZWJzaXRlX2NvbnRlbnQvbHIvdjQ2MS10YXVzLTE0YS1tb2Rlcm5ibGFja2FuZHdoaXRlXzEuanBn.jpg);
            /* Center and scale the image nicely */
            background-position: center;
            background-repeat: no-repeat;
            background-size: cover;
            opacity: 0.8;
        }
        
        .card:nth-child(13) {
            grid-area: c13;
            /*background: url(https://images.rawpixel.com/image_800/czNmcy1wcml2YXRlL3Jhd3BpeGVsX2ltYWdlcy93ZWJzaXRlX2NvbnRlbnQvdjExNDctYmctMDEtMi1rem93MTJwNi5qcGc.jpg);*/
            background: url(https://images.rawpixel.com/image_800/czNmcy1wcml2YXRlL3Jhd3BpeGVsX2ltYWdlcy93ZWJzaXRlX2NvbnRlbnQvbHIvcm0yODMtbnVubnktMDExXzEuanBn.jpg);
            /* Center and scale the image nicely */
            background-position: center;
            background-repeat: no-repeat;
            background-size: cover;
            opacity: 0.8;
        }
        
        .card:nth-child(14) {
            grid-area: c14;
            background: url(https://images.rawpixel.com/image_800/czNmcy1wcml2YXRlL3Jhd3BpeGVsX2ltYWdlcy93ZWJzaXRlX2NvbnRlbnQvbHIvcm0yODMtbnVubnktMDExXzEuanBn.jpg);
            /* Center and scale the image nicely */
            background-position: center;
            background-repeat: no-repeat;
            background-size: cover;
            opacity: 0.8;
        }
        
        .card:nth-child(15) {
            grid-area: c15;
            background: url(https://images.rawpixel.com/image_800/czNmcy1wcml2YXRlL3Jhd3BpeGVsX2ltYWdlcy93ZWJzaXRlX2NvbnRlbnQvbHIvdjk0NC1iYi0wMDRfMV8xLmpwZw.jpg);
            /* Center and scale the image nicely */
            background-position: center;
            background-repeat: no-repeat;
            background-size: cover;
            opacity: 0.8;
        }
        
        .card:nth-child(16) {
            grid-area: c16;
            background: url(https://images.rawpixel.com/image_800/cHJpdmF0ZS9sci9pbWFnZXMvd2Vic2l0ZS8yMDIyLTA1L3AtNDQ4LXBhaS02NTQuanBn.jpg);
            /* Center and scale the image nicely */
            background-position: center;
            background-repeat: no-repeat;
            background-size: cover;
            opacity: 0;
        }
        
        .card:nth-child(17) {
            grid-area: c17;
            background: url(https://images.rawpixel.com/image_800/cHJpdmF0ZS9sci9pbWFnZXMvd2Vic2l0ZS8yMDIyLTA1L3AtNDQ4LXBhaS02NTQuanBn.jpg);
            /* Center and scale the image nicely */
            background-position: center;
            background-repeat: no-repeat;
            background-size: cover;
            opacity: 0;
        }
        
        .card:nth-child(18) {
            grid-area: c18;
            background: url(https://images.rawpixel.com/image_800/cHJpdmF0ZS9sci9pbWFnZXMvd2Vic2l0ZS8yMDIyLTA1L3AtNDQ4LXBhaS02NTQuanBn.jpg);
            /* Center and scale the image nicely */
            background-position: center;
            background-repeat: no-repeat;
            background-size: cover;
            opacity: 0;
        }
        
        .card:nth-child(19) {
            grid-area: c19;
            background: url(https://images.rawpixel.com/image_800/cHJpdmF0ZS9sci9pbWFnZXMvd2Vic2l0ZS8yMDIzLTAxL3ljYmF0bXM3MTk1OS1pbWFnZS5qcGc.jpg);
            /* Center and scale the image nicely */
            background-position: center;
            background-repeat: no-repeat;
            background-size: cover;
            opacity: 0;
        }
        
        .card:nth-child(1):hover {
            opacity: 1;
        }
        
        .card:nth-child(2):hover {
            opacity: 1;
        }
        
        .card:nth-child(3):hover {
            opacity: 1;
        }
        
        .card:nth-child(4):hover {
            opacity: 1;
        }
        
        .card:nth-child(5):hover {
            opacity: 1;
        }
        
        .card:nth-child(6):hover {
            opacity: 1;
        }
        
        .card:nth-child(7):hover {
            opacity: 1;
        }
        
        .card:nth-child(8):hover {
            opacity: 1;
        }
        
        .card:nth-child(9):hover {
            opacity: 1;
        }
        
        .card:nth-child(10):hover {
            opacity: 1;
        }
        
        .card:nth-child(11):hover {
            opacity: 1;
        }
        
        .card:nth-child(12):hover {
            opacity: 1;
        }
        
        .card:nth-child(1) a {
            color: white;
            top: -52px;
            right: -72px;
            font-size: 16px;
            position: relative;
            background-color: black;
        }
        
        .card:nth-child(2) a {
            color: white;
            top: -52px;
            right: -72px;
            font-size: 16px;
            position: relative;
            background-color: black;
        }
        
        .card:nth-child(3) a {
            color: white;
            top: -52px;
            right: -72px;
            font-size: 16px;
            position: relative;
            background-color: black;
        }
        
        .card:nth-child(4) a {
            color: white;
            top: -52px;
            right: -32px;
            font-size: 16px;
            position: relative;
            background-color: black;
        }
        
        .card:nth-child(5) a {
            color: white;
            top: -52px;
            right: -72px;
            font-size: 16px;
            position: relative;
            background-color: black;
        }
        
        .card:nth-child(6) a {
            color: white;
            top: -52px;
            right: -62px;
            font-size: 16px;
            position: relative;
            background-color: black;
        }
        
        .card:nth-child(7) a {
            color: white;
            top: -52px;
            right: -72px;
            font-size: 16px;
            position: relative;
            background-color: black;
        }
        
        .card:nth-child(8) a {
            color: white;
            top: -52px;
            right: -62px;
            font-size: 16px;
            position: relative;
            background-color: black;
        }
        
        .card:nth-child(9) a {
            color: white;
            top: -52px;
            right: -72px;
            font-size: 16px;
            position: relative;
            background-color: black;
        }
        
        .card:nth-child(10) a {
            color: white;
            top: -52px;
            right: -72px;
            font-size: 16px;
            position: relative;
            background-color: black;
        }
        
        .card:nth-child(11) a {
           color: white;
            top: -52px;
            right: -72px;
            font-size: 16px;
            position: relative;
            background-color: black;
        }
        
        .card:nth-child(12) a {
            color: white;
            top: -52px;
            right: -72px;
            font-size: 16px;
            position: relative;
            background-color: black;
        }
        
        .card:nth-child(13) a {
            color: white;
            top: -52px;
            right: -42px;
            font-size: 16px;
            position: relative;
            background-color: black;
        }
        
        .card:nth-child(14) a {
            color: white;
            top: -52px;
            right: -72px;
            font-size: 16px;
            position: relative;
            background-color: black;
        }
        
        .card:nth-child(15) a {
            color: white;
            top: -52px;
            right: -72px;
            font-size: 16px;
            position: relative;
            background-color: black;
        }
        
        .card:nth-child(16) a {
            color: white;
            top: -52px;
            right: -72px;
            font-size: 16px;
            position: relative;
            background-color: black;
        }
        
        .card:nth-child(17) a {
            color: white;
            top: -52px;
            right: -72px;
            font-size: 16px;
            position: relative;
            background-color: black;
        }
        
        .card:nth-child(18) a {
            color: white;
            top: -52px;
            right: -72px;
            font-size: 16px;
            position: relative;
            background-color: black;
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
            /*font-family: 'Amiri Quran', serif;*/
            font-family: 'IBM Plex Sans Arabic', sans-serif;
            cursor: pointer;
            top: 40%;
        }
        
        .text-container {
            display: inline-block;
        }
        
        .text {
            width: 100%;
            letter-spacing: 2px;
            border-right: 2px solid;
            white-space: nowrap;
            overflow: hidden;
            font-size: 10px;
            /*animation: typing 8s steps(32) infinite alternate, cursor 0.4s step-end infinite alternate;*/
        }
        
        @keyframes cursor {
            50% {
                border-color: transparent;
            }
        }
        
        @keyframes typing {
            from {
                width: 0;
            }
            to {
                width: 100%;
            }
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
            top: 8px;
            right: 64px;
            transition: 0.4s;
            font-size: 20px;
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
                /*grid-template-columns: 1fr;
                grid-template-rows: repeat(11, 140px);
                grid-template-areas: initial;*/
            }

            .main {
                background-color: #c3c5ca;
                padding: 16px;
                padding-top: 84px;
                grid-area: main;
                display: grid;
                grid-template-columns: 1fr;
                grid-template-rows: 1fr 1fr 1fr 1fr 1fr 1fr 1fr 1fr 1fr 1fr 1fr 1fr 1fr 1fr 1fr 1fr 1fr 1fr 1fr;
                grid-template-areas: 
                    "c1"
                    "c2"
                    "c3"
                    "c4"
                    "c5"
                    "c6"
                    "c7"
                    "c8"
                    "c9"
                    "c10"
                    "c11"
                    "c12"
                    "c13"
                    "c14"
                    "c15"
                    "c16"
                    "c17"
                    "c18"
                    "c19";
                gap: 8px;
                /*grid-column: 2/3;
                grid-row: 2/3;*/
            }
            
            #v {
                position: absolute;
                top: 0px;
                left: 40%;
            }
            
            #main-title {
                position: absolute;
                z-index: 99;
                right: 16px;
                top: 82px;
                color: #04AA6D;
                font-size: 24px;
            }

            .card {
                background-color: #f6f7f9;
                height: 130px;
                border-radius: 8px;
            }

            .card:nth-child(1) {
                /*width: 45vw;*/
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
            
            .card:nth-child(9) {
                grid-area: c9;
            }
            
            .card:nth-child(10) {
                grid-area: c10;
            }
            
            .card:nth-child(11) {
                grid-area: c11;
            }
            
            .card:nth-child(12) {
                grid-area: c12;
            }
            
            .card:nth-child(1) a {
                color: white;
                top: -52px;
                right: -152px;
                font-size: 16px;
                position: relative;
                background-color: black;
            }
            
            .card:nth-child(2) a {
                color: white;
                top: -52px;
                right: -152px;
                font-size: 16px;
                position: relative;
                background-color: black;
            }
            
            .card:nth-child(3) a {
                color: white;
                top: -52px;
                right: -152px;
                font-size: 16px;
                position: relative;
                background-color: black;
            }
            
            
            .card:nth-child(4) a {
                color: white;
                top: -52px;
                right: -105px;
                font-size: 16px;
                position: relative;
                background-color: black;
            }
            
            .card:nth-child(5) a {
                color: white;
                top: -52px;
                right: -142px;
                font-size: 16px;
                position: relative;
                background-color: black;
            }
            
            .card:nth-child(6) a {
                color: white;
                top: -52px;
                right: -130px;
                font-size: 16px;
                position: relative;
                background-color: black;
            }
            
            .card:nth-child(7) a {
                color: white;
                top: -52px;
                right: -152px;
                font-size: 16px;
                position: relative;
                background-color: black;
            }
            
            .card:nth-child(8) a {
                color: white;
                top: -52px;
                right: -152px;
                font-size: 16px;
                position: relative;
                background-color: black;
            }
            
            .card:nth-child(9) a {
                color: white;
                top: -52px;
                right: -152px;
                font-size: 16px;
                position: relative;
                background-color: black;
            }
            
            .card:nth-child(10) a {
                color: white;
                top: -52px;
                right: -152px;
                font-size: 16px;
                position: relative;
                background-color: black;
            }
            
            .card:nth-child(11) a {
                color: white;
                top: -52px;
                right: -152px;
                font-size: 16px;
                position: relative;
                background-color: black;
            }
            
            .card:nth-child(12) a {
                color: white;
                top: -52px;
                right: -152px;
                font-size: 16px;
                position: relative;
                background-color: black;
            }
            
            .card:nth-child(13) a {
                color: white;
                top: -52px;
                right: -152px;
                font-size: 16px;
                position: relative;
                background-color: black;
            }
            
            .card:nth-child(14) a {
                color: white;
                top: -52px;
                right: -152px;
                font-size: 16px;
                position: relative;
                background-color: black;
            }
            
            .card:nth-child(15) a {
                color: white;
                top: -52px;
                right: -152px;
                font-size: 16px;
                position: relative;
                background-color: black;
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

            .card {
                /*grid-area: initial !important;*/
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
                z-index: -1;
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
                z-index: 1;
            }

            .sidebar-header img {
                width: 0px;
                transition: 0s;
                z-index: 1;
            }

            .sidebar-header-show img {
                position: absolute;
                top: 42px;
                left: 32px;
                width: 72px;
                height: 72px;
                border-radius: 50%;
                transition: 0.4s;
                z-index: 1;
            }
            
            .sidebar-header .user {
                display: none;
                transition: 0s;
                z-index: 1;
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
                z-index: 1;
            }

            .sidebar-header .email {
                display: none;
                transition: 0s;
                z-index: 1;
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
                z-index: 1;
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
            
            /***/
            .container {
                position: absolute;
                top: 0px;
                height: 100%;
                width: 100%;
                margin: 15px auto;
                direction: rtl;
            }
            
            .dropbtn {
              background-color: #04AA6D;
              color: white;
              padding: 8px;
              font-size: 16px;
              border: none;
              width: 80px;
              position: absolute;
              bottom: 515px;
              left: 32px;
            }
            
            .dropdown {
              position: relative;
              display: inline-block;
            }
            
            .dropdown-content {
              display: none;
              position: absolute;
              top: -515px;
              left: 32px;
              background-color: #f1f1f1;
              min-width: 160px;
              box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
              z-index: 1;
            }
            
            .dropdown-content a {
              color: black;
              padding: 12px 16px;
              text-decoration: none;
              display: block;
            }
            
            .dropdown-content a:hover {background-color: #ddd;}
            
            .dropdown:hover .dropdown-content {display: block;}
            
            .dropdown:hover .dropbtn {background-color: #3e8e41;}
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
        
        .cursor {
            z-index: 999;
            background: #2696e8;
            position: fixed;
            width: 10px;
            height: 10px;
            border-radius: 50%;
            pointer-events: none;
            box-shadow: 0 0 20px #2696e8,
                        0 0 20px #2696e8,
                        0 0 20px #2696e8;
            animation: colors 5s infinite;
            transform: translate(-50%, -50%);
            display: none;
        }
        
        .cursor::before {
            content: '';
            position: absolute;
            background: #2696e8;
            width: 25px;
            height: 25px;
            opacity: 0.2;
            transform: translate(-30%, -30%);
            border-radius: 50%;
        }
        
        @keyframes colors {
            0% {
                filter: hue-rotate(0deg);
            }
            100% {
                filter: hue-rotate(360deg);
            }
        }
        
        /********************************* CHART *************************************/
        
        .container {
            position: absolute;
            top: -150px;
            width: 100%;
            margin: 15px auto;
            direction: rtl;
        }
     
        #chart {
            text-align: center;
            color: green;
        }
     
        h2 {
            text-align: center;
            font-family: "Verdana", sans-serif;
            font-size: 30px;
        }
        
        /********************************* CHART *************************************/
        .weekly-traffic {
            position: absolute;
            top: -100px;
            left: 4px;
        }

        table {
          font-family: arial, sans-serif;
          border-collapse: collapse;
          font-size: 10px;
          width: 100%;
          text-align: center;
          direction: rtl;
          width: 425px;
        }
        
        td, th {
          border: 1px solid #000;
          text-align: center;
          padding: 8px;
        }
        
        tr:nth-child(even) {
          background-color: #dddddd;
        }
        
        tr:nth-child(odd) {
          background-color: #F0F0F0;
        }
    </style>
    <style>
    .dropbtn {
      background-color: #04AA6D;
      color: white;
      padding: 8px;
      font-size: 16px;
      border: none;
      width: 150px;
      position: absolute;
      bottom: 515px;
      left: 32px;
    }
    
    .dropdown {
      position: relative;
      display: inline-block;
    }
    
    .dropdown-content {
      display: none;
      position: absolute;
      top: -515px;
      left: 32px;
      background-color: #f1f1f1;
      min-width: 150px;
      box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
      z-index: 1;
    }
    
    .dropdown-content a {
      color: black;
      padding: 12px 16px;
      text-decoration: none;
      display: block;
    }
    
    .dropdown-content a:hover {background-color: #ddd;}
    
    .dropdown:hover .dropdown-content {display: block;}
    
    .dropdown:hover .dropbtn {background-color: #3e8e41;}
</style>
    <?php include "../../functions/remove_branding.php"; ?>
</head>
<body id="body">
    <!--<div class="cursor"></div>-->
    
    <!-- Details Modal -->
    <div class="modal fade" style="direction: rtl;" id="exampleModal3" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                <div class="modal-content">
                    <form action="#" method="post">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">
                                الناقل:
                                <input type"hidden" name="ids" id="ids" style="width: 300px; text-align: right;" readonly>
                            </h1>
                        </div>
                        <div class="modal-body"><br>
                            <div class="row">
                                <div class="col">
                                    <label for="formGroupExampleInput" class="form-label">الإجمالي</label>
                                    <input class="form-control" type"hidden" name="total" id="total">
                                </div>
                            </div><br>
                            <div class="row">
                                <div class="col">
                                    <label for="formGroupExampleInput" class="form-label">المستلم</label>
                                    <input class="form-control" type"hidden" name="takenCash" id="takenCash">
                                </div>
                            </div><br>
                            <div class="row">
                                <div class="col">
                                    <label for="formGroupExampleInput" class="form-label">المتبقي</label>
                                    <input class="form-control" type"hidden" name="carrier_number" id="carrier_number">
                                </div>
                            </div><br>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">إغلاق</button>
                            <input type="submit" class="btn btn-success" value="عرض">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    <?php include 'card.php'; ?>
        
    <div class="loader"></div>
    <header class="header">
        <div class="title" id="title">مُؤسَسَة مَاجِد خَالِد الْحَمَّاد | بطاقة التنزيل</div>
        <!--<a href="../../"><div class="icon" id="icon">-->
        <a href="../../layouts/dashboard/dashboard.php"><div class="icon" id="icon">
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
            <svg id="svg-x" style="color: black; display: none;" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-x-lg" viewBox="0 0 16 16">
                <path d="M2.146 2.854a.5.5 0 1 1 .708-.708L8 7.293l5.146-5.147a.5.5 0 0 1 .708.708L8.707 8l5.147 5.146a.5.5 0 0 1-.708.708L8 8.707l-5.146 5.147a.5.5 0 0 1-.708-.708L7.293 8 2.146 2.854Z"/>
            </svg>
            <svg id="svg-y" style="color: black;" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-list" viewBox="0 0 16 16">
                <path fill-rule="evenodd" d="M2.5 12a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5z"/>
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
            <a href="../../layouts/exchange_drivers/view_exchange_drivers.php" style="color: white;">
                <svg style="color: white;" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-truck" viewBox="0 0 16 16">
                <path d="M0 3.5A1.5 1.5 0 0 1 1.5 2h9A1.5 1.5 0 0 1 12 3.5V5h1.02a1.5 1.5 0 0 1 1.17.563l1.481 1.85a1.5 1.5 0 0 1 .329.938V10.5a1.5 1.5 0 0 1-1.5 1.5H14a2 2 0 1 1-4 0H5a2 2 0 1 1-3.998-.085A1.5 1.5 0 0 1 0 10.5v-7zm1.294 7.456A1.999 1.999 0 0 1 4.732 11h5.536a2.01 2.01 0 0 1 .732-.732V3.5a.5.5 0 0 0-.5-.5h-9a.5.5 0 0 0-.5.5v7a.5.5 0 0 0 .294.456zM12 10a2 2 0 0 1 1.732 1h.768a.5.5 0 0 0 .5-.5V8.35a.5.5 0 0 0-.11-.312l-1.48-1.85A.5.5 0 0 0 13.02 6H12v4zm-9 1a1 1 0 1 0 0 2 1 1 0 0 0 0-2zm9 0a1 1 0 1 0 0 2 1 1 0 0 0 0-2z"/>
            </svg> Exchange Drivers</a>
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
            <a href="../../layouts/workshop_invoices/view_workshop_invoices.php" style="color: white;">
            <svg style="color: white;" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-buildings" viewBox="0 0 16 16">
                <path d="M14.763.075A.5.5 0 0 1 15 .5v15a.5.5 0 0 1-.5.5h-3a.5.5 0 0 1-.5-.5V14h-1v1.5a.5.5 0 0 1-.5.5h-9a.5.5 0 0 1-.5-.5V10a.5.5 0 0 1 .342-.474L6 7.64V4.5a.5.5 0 0 1 .276-.447l8-4a.5.5 0 0 1 .487.022ZM6 8.694 1 10.36V15h5V8.694ZM7 15h2v-1.5a.5.5 0 0 1 .5-.5h2a.5.5 0 0 1 .5.5V15h2V1.309l-7 3.5V15Z"/>
                <path d="M2 11h1v1H2v-1Zm2 0h1v1H4v-1Zm-2 2h1v1H2v-1Zm2 0h1v1H4v-1Zm4-4h1v1H8V9Zm2 0h1v1h-1V9Zm-2 2h1v1H8v-1Zm2 0h1v1h-1v-1Zm2-2h1v1h-1V9Zm0 2h1v1h-1v-1ZM8 7h1v1H8V7Zm2 0h1v1h-1V7Zm2 0h1v1h-1V7ZM8 5h1v1H8V5Zm2 0h1v1h-1V5Zm2 0h1v1h-1V5Zm0-2h1v1h-1V3Z"/>
            </svg> Workshop</a>
            <br><br><br>
            <a href="../../functions/logout.php" style="color: white;">
                <svg style="color: white;" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-x-circle-fill" viewBox="0 0 16 16">
                    <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM5.354 4.646a.5.5 0 1 0-.708.708L7.293 8l-2.647 2.646a.5.5 0 0 0 .708.708L8 8.707l2.646 2.647a.5.5 0 0 0 .708-.708L8.707 8l2.647-2.646a.5.5 0 0 0-.708-.708L8 7.293 5.354 4.646z"/>
                </svg>
            Logout</a>
        </div>
    </section>
    <div id="main-title-background">
        <a href="../../layouts/download_card/view_download_card.php" id="main-title">حساب الناقلين</a>
    </div>
    <!--<div id="main-title-background-2"><a href="../../layouts/dashboard/dashboard.php" id="main-title-to">عرض</a></div>-->
    
    <div class="dropdown">
        <button class="dropbtn">
            <i class="fa fa-filter" aria-hidden="true"> ترتيب حسب العملاء</i>
        </button>
        <div class="dropdown-content">
        <?php
            $query = "SELECT * FROM customers";
            $result = mysqli_query($conn, $query);
            while ($row = mysqli_fetch_assoc($result)) {
                echo '
                    <a href="work.php?car_owner=' .$row['customers_name']. '">'. $row['customers_name'] .'</a>
                ';
            }
        ?>
      </div>
    </div>
    
    <!-- UPDATE `download_card` SET `carrier_name` = 'شهباز' WHERE `download_card`.`carrier_name` = '14'; -->
    <main class="main">
        <div class="card">
            <div class="body">
                <a href="dashboard.php?id=الحماد" class="achievement-button d-print-none carrier-name">الحماد</a>
                <?php
                    $totaz = 0;
                    // $query = "SELECT SUM(`quantity`*`carrier_price`) As sumOf FROM download_card WHERE carrier_name='الحماد'";
                    $querys = "SELECT SUM(`exchange_carriers`) As sumIn FROM download_card WHERE carrier_name='الحماد'";
                    $results = mysqli_query($conn, $querys);
                    // $result = mysqli_query($conn, $query);
                    // while ($row = mysqli_fetch_assoc($result)) {
                        while ($rows = mysqli_fetch_assoc($results)) {
                            // $total1 = ($row['sumOf']);
                            $in = ($rows['sumIn']);
                            $totalz = /*$total1 - */$in;
                                if ($totalz != 0) {
                                    // echo '&nbsp;' . number_format($total, 2) . '&nbsp;';
                                }
                                else {
                                    echo '<h5 id="v" value="0">0</h5>';
                                }
                        //}                                                      
                    }
                ?>
                <?php echo '<h5 style="display: none;" id="d" class="d" value="'. $totalz . '">0</h5>' ?>
                <?php
                    $total = 0;
                    $query = "SELECT SUM(`quantity`*`carrier_price`) As sumOf FROM download_card WHERE carrier_name='الحماد'";
                    $result = mysqli_query($conn, $query);
                    while ($row = mysqli_fetch_assoc($result)) {
                            $total1 = (($row['sumOf']/* - ($row2['sumOfIn'] + $row3['sumOfTo'] + $row4['sumOfFor'])*/)/*- $row13['sumOfs1']*/);
                            $total = $total1;
                                if ($total != 0) {
                                    // echo '&nbsp;' . number_format($total, 2) . '&nbsp;';
                                }
                                else {
                                    echo '<h5 id="v" value="0">0</h5>';
                                }
                    }
                ?>
            <?php echo '<h5 style="display: none;" id="v" class="v" value="'. $total . '">0</h5>' ?>
            <?php echo '<h5 id="c" class="c" value="'. $total - $totalz . '">0</h5>' ?>
            </div>
        </div>
        <div class="card">
            <div class="body">
                <a href="dashboard.php?id=شهباز" class="achievement-button d-print-none carrier-name">
                    شهباز
                </a>
                <?php
                    $totaz = 0;
                    // $query = "SELECT SUM(`quantity`*`carrier_price`) As sumOf FROM download_card WHERE carrier_name='الحماد'";
                    $querys = "SELECT SUM(`exchange_carriers`) As sumIn FROM download_card WHERE carrier_name='شهباز'";
                    $results = mysqli_query($conn, $querys);
                    // $result = mysqli_query($conn, $query);
                    // while ($row = mysqli_fetch_assoc($result)) {
                        while ($rows = mysqli_fetch_assoc($results)) {
                            // $total1 = ($row['sumOf']);
                            $in = ($rows['sumIn']);
                            $totalz = /*$total1 - */$in;
                                if ($totalz != 0) {
                                    // echo '&nbsp;' . number_format($total, 2) . '&nbsp;';
                                }
                                else {
                                    echo '<h5 id="v" value="0">0</h5>';
                                }
                        //}                                                      
                    }
                ?>
                <?php echo '<h5 style="display: none;" id="d" class="d" value="'. $totalz . '">0</h5>' ?>
                <?php
                    $total = 0;
                    $query = "SELECT SUM(`quantity`*`carrier_price`) As sumOf FROM download_card WHERE carrier_name='شهباز'";
                    $result = mysqli_query($conn, $query);
                    while ($row = mysqli_fetch_assoc($result)) {
                            $total1 = (($row['sumOf']/* - ($row2['sumOfIn'] + $row3['sumOfTo'] + $row4['sumOfFor'])*/)/*- $row13['sumOfs1']*/);
                            $total = $total1;
                                if ($total != 0) {
                                    // echo '&nbsp;' . number_format($total, 2) . '&nbsp;';
                                }
                                else {
                                    echo '<h5 id="v" value="0">0</h5>';
                                }
                    }
                ?>
            <?php echo '<h5 style="display: none;" id="v" class="v" value="'. $total . '">0</h5>' ?>
            <?php echo '<h5 id="c" class="c" value="'. $total - $totalz . '">0</h5>' ?>
            </div>
        </div>
        <div class="card">
            <div class="body">
                <a href="#" class="achievement-button d-print-none carrier-name">ابو تركي</a>
                <?php
                    $totaz = 0;
                    // $query = "SELECT SUM(`quantity`*`carrier_price`) As sumOf FROM download_card WHERE carrier_name='الحماد'";
                    $querys = "SELECT SUM(`exchange_carriers`) As sumIn FROM download_card WHERE carrier_name='ابو تركي'";
                    $results = mysqli_query($conn, $querys);
                    // $result = mysqli_query($conn, $query);
                    // while ($row = mysqli_fetch_assoc($result)) {
                        while ($rows = mysqli_fetch_assoc($results)) {
                            // $total1 = ($row['sumOf']);
                            $in = ($rows['sumIn']);
                            $totalz = /*$total1 - */$in;
                                if ($totalz != 0) {
                                    // echo '&nbsp;' . number_format($total, 2) . '&nbsp;';
                                }
                                else {
                                    echo '<h5 id="v" value="0">0</h5>';
                                }
                        //}                                                      
                    }
                ?>
                <?php echo '<h5 style="display: none;" id="d" class="d" value="'. $totalz . '">0</h5>' ?>
                <?php
                    $total = 0;
                    $query = "SELECT SUM(`quantity`*`carrier_price`) As sumOf FROM download_card WHERE carrier_name='ابو تركي'";
                    $result = mysqli_query($conn, $query);
                    while ($row = mysqli_fetch_assoc($result)) {
                            $total1 = (($row['sumOf']/* - ($row2['sumOfIn'] + $row3['sumOfTo'] + $row4['sumOfFor'])*/)/*- $row13['sumOfs1']*/);
                            $total = $total1;
                                if ($total != 0) {
                                    // echo '&nbsp;' . number_format($total, 2) . '&nbsp;';
                                }
                                else {
                                    echo '<h5 id="v" value="0">0</h5>';
                                }
                    }
                ?>
            <?php echo '<h5 style="display: none;" id="v" class="v" value="'. $total . '">0</h5>' ?>
            <?php echo '<h5 id="c" class="c" value="'. $total - $totalz . '">0</h5>' ?>
            </div>
        </div>
        <div class="card">
            <div class="body">
                <?php
                    $car_owner = "الحماد";
                    echo '
                        <!--<a href="../../layouts/works/work.php?car_owner=' . $car_owner . '">-->
                        <a href="#" class="achievement-button d-print-none carrier-name">
                            نصر عبد الله ال طالب
                        </a>
                    ';
                ?>
                <?php
                    $totaz = 0;
                    // $query = "SELECT SUM(`quantity`*`carrier_price`) As sumOf FROM download_card WHERE carrier_name='الحماد'";
                    $querys = "SELECT SUM(`exchange_carriers`) As sumIn FROM download_card WHERE carrier_name='نصر'";
                    $results = mysqli_query($conn, $querys);
                    // $result = mysqli_query($conn, $query);
                    // while ($row = mysqli_fetch_assoc($result)) {
                        while ($rows = mysqli_fetch_assoc($results)) {
                            // $total1 = ($row['sumOf']);
                            $in = ($rows['sumIn']);
                            $totalz = /*$total1 - */$in;
                                if ($totalz != 0) {
                                    // echo '&nbsp;' . number_format($total, 2) . '&nbsp;';
                                }
                                else {
                                    echo '<h5 id="v" value="0">0</h5>';
                                }
                        //}                                                      
                    }
                ?>
                <?php echo '<h5 style="display: none;" id="d" class="d" value="'. $totalz . '">0</h5>' ?>
                <?php
                    $total = 0;
                    $query = "SELECT SUM(`quantity`*`carrier_price`) As sumOf FROM download_card WHERE carrier_name='نصر'";
                    $result = mysqli_query($conn, $query);
                    while ($row = mysqli_fetch_assoc($result)) {
                            $total1 = (($row['sumOf']/* - ($row2['sumOfIn'] + $row3['sumOfTo'] + $row4['sumOfFor'])*/)/*- $row13['sumOfs1']*/);
                            $total = $total1;
                                if ($total != 0) {
                                    // echo '&nbsp;' . number_format($total, 2) . '&nbsp;';
                                }
                                else {
                                    echo '<h5 id="v" value="0">0</h5>';
                                }
                    }
                ?>
            <?php echo '<h5 style="display: none;" id="v" class="v" value="'. $total . '">0</h5>' ?>
            <?php echo '<h5 id="c" class="c" value="'. $total - $totalz . '">0</h5>' ?>
            </div>
        </div>
        <div class="card">
            <div class="body">
                <a href="#" class="achievement-button d-print-none carrier-name">
                    المحيميد
                </a>
                <?php
                    $totaz = 0;
                    // $query = "SELECT SUM(`quantity`*`carrier_price`) As sumOf FROM download_card WHERE carrier_name='الحماد'";
                    $querys = "SELECT SUM(`exchange_carriers`) As sumIn FROM download_card WHERE carrier_name='المحيميد'";
                    $results = mysqli_query($conn, $querys);
                    // $result = mysqli_query($conn, $query);
                    // while ($row = mysqli_fetch_assoc($result)) {
                        while ($rows = mysqli_fetch_assoc($results)) {
                            // $total1 = ($row['sumOf']);
                            $in = ($rows['sumIn']);
                            $totalz = /*$total1 - */$in;
                                if ($totalz != 0) {
                                    // echo '&nbsp;' . number_format($total, 2) . '&nbsp;';
                                }
                                else {
                                    echo '<h5 id="v" value="0">0</h5>';
                                }
                        //}                                                      
                    }
                ?>
                <?php echo '<h5 style="display: none;" id="d" class="d" value="'. $totalz . '">0</h5>' ?>
                <?php
                    $total = 0;
                    $query = "SELECT SUM(`quantity`*`carrier_price`) As sumOf FROM download_card WHERE carrier_name='المحيميد'";
                    $result = mysqli_query($conn, $query);
                    while ($row = mysqli_fetch_assoc($result)) {
                            $total1 = (($row['sumOf']/* - ($row2['sumOfIn'] + $row3['sumOfTo'] + $row4['sumOfFor'])*/)/*- $row13['sumOfs1']*/);
                            $total = $total1;
                                if ($total != 0) {
                                    // echo '&nbsp;' . number_format($total, 2) . '&nbsp;';
                                }
                                else {
                                    echo '<h5 id="v" value="0">0</h5>';
                                }
                    }
                ?>
            <?php echo '<h5 style="display: none;" id="v" class="v" value="'. $total . '">0</h5>' ?>
            <?php echo '<h5 id="c" class="c" value="'. $total - $totalz . '">0</h5>' ?>
            </div>
        </div>
        <div class="card">
            <div class="body">
                <a href="#" class="achievement-button d-print-none carrier-name">
                    ظابط محترم
                </a>
                <?php
                    $totaz = 0;
                    // $query = "SELECT SUM(`quantity`*`carrier_price`) As sumOf FROM download_card WHERE carrier_name='الحماد'";
                    $querys = "SELECT SUM(`exchange_carriers`) As sumIn FROM download_card WHERE carrier_name='ظابط'";
                    $results = mysqli_query($conn, $querys);
                    // $result = mysqli_query($conn, $query);
                    // while ($row = mysqli_fetch_assoc($result)) {
                        while ($rows = mysqli_fetch_assoc($results)) {
                            // $total1 = ($row['sumOf']);
                            $in = ($rows['sumIn']);
                            $totalz = /*$total1 - */$in;
                                if ($totalz != 0) {
                                    // echo '&nbsp;' . number_format($total, 2) . '&nbsp;';
                                }
                                else {
                                    echo '<h5 id="v" value="0">0</h5>';
                                }
                        //}                                                      
                    }
                ?>
                <?php echo '<h5 style="display: none;" id="d" class="d" value="'. $totalz . '">0</h5>' ?>
                <?php
                    $total = 0;
                    $query = "SELECT SUM(`quantity`*`carrier_price`) As sumOf FROM download_card WHERE carrier_name='ظابط'";
                    $result = mysqli_query($conn, $query);
                    while ($row = mysqli_fetch_assoc($result)) {
                            $total1 = (($row['sumOf']/* - ($row2['sumOfIn'] + $row3['sumOfTo'] + $row4['sumOfFor'])*/)/*- $row13['sumOfs1']*/);
                            $total = $total1;
                                if ($total != 0) {
                                    // echo '&nbsp;' . number_format($total, 2) . '&nbsp;';
                                }
                                else {
                                    echo '<h5 id="v" value="0">0</h5>';
                                }
                    }
                ?>
            <?php echo '<h5 style="display: none;" id="v" class="v" value="'. $total . '">0</h5>' ?>
            <?php echo '<h5 id="c" class="c" value="'. $total - $totalz . '">0</h5>' ?>
            </div>
        </div>
        
        <div class="card">
            <div class="body">
                <a href="#" class="achievement-button d-print-none carrier-name">
                    قل زار
                </a>
                <?php
                    $totaz = 0;
                    // $query = "SELECT SUM(`quantity`*`carrier_price`) As sumOf FROM download_card WHERE carrier_name='الحماد'";
                    $querys = "SELECT SUM(`exchange_carriers`) As sumIn FROM download_card WHERE carrier_name='قل زار'";
                    $results = mysqli_query($conn, $querys);
                    // $result = mysqli_query($conn, $query);
                    // while ($row = mysqli_fetch_assoc($result)) {
                        while ($rows = mysqli_fetch_assoc($results)) {
                            // $total1 = ($row['sumOf']);
                            $in = ($rows['sumIn']);
                            $totalz = /*$total1 - */$in;
                                if ($totalz != 0) {
                                    // echo '&nbsp;' . number_format($total, 2) . '&nbsp;';
                                }
                                else {
                                    echo '<h5 id="v" value="0">0</h5>';
                                }
                        //}                                                      
                    }
                ?>
                <?php echo '<h5 style="display: none;" id="d" class="d" value="'. $totalz . '">0</h5>' ?>
                <?php
                    $total = 0;
                    $query = "SELECT SUM(`quantity`*`carrier_price`) As sumOf FROM download_card WHERE carrier_name='قل زار'";
                    $result = mysqli_query($conn, $query);
                    while ($row = mysqli_fetch_assoc($result)) {
                            $total1 = (($row['sumOf']/* - ($row2['sumOfIn'] + $row3['sumOfTo'] + $row4['sumOfFor'])*/)/*- $row13['sumOfs1']*/);
                            $total = $total1;
                                if ($total != 0) {
                                    // echo '&nbsp;' . number_format($total, 2) . '&nbsp;';
                                }
                                else {
                                    echo '<h5 id="v" value="0">0</h5>';
                                }
                    }
                ?>
            <?php echo '<h5 style="display: none;" id="v" class="v" value="'. $total . '">0</h5>' ?>
            <?php echo '<h5 id="c" class="c" value="'. $total - $totalz . '">0</h5>' ?>
            </div>
        </div>
        <div class="card">
            <div class="body">
                <a href="#" class="achievement-button d-print-none carrier-name">
                    محمد قير قول
                </a>
                <?php
                    $totaz = 0;
                    // $query = "SELECT SUM(`quantity`*`carrier_price`) As sumOf FROM download_card WHERE carrier_name='الحماد'";
                    $querys = "SELECT SUM(`exchange_carriers`) As sumIn FROM download_card WHERE carrier_name='مير قول'";
                    $results = mysqli_query($conn, $querys);
                    // $result = mysqli_query($conn, $query);
                    // while ($row = mysqli_fetch_assoc($result)) {
                        while ($rows = mysqli_fetch_assoc($results)) {
                            // $total1 = ($row['sumOf']);
                            $in = ($rows['sumIn']);
                            $totalz = /*$total1 - */$in;
                                if ($totalz != 0) {
                                    // echo '&nbsp;' . number_format($total, 2) . '&nbsp;';
                                }
                                else {
                                    echo '<h5 id="v" value="0">0</h5>';
                                }
                        //}                                                      
                    }
                ?>
                <?php echo '<h5 style="display: none;" id="d" class="d" value="'. $totalz . '">0</h5>' ?>
                <?php
                    $total = 0;
                    $query = "SELECT SUM(`quantity`*`carrier_price`) As sumOf FROM download_card WHERE carrier_name='مير قول'";
                    $result = mysqli_query($conn, $query);
                    while ($row = mysqli_fetch_assoc($result)) {
                            $total1 = (($row['sumOf']/* - ($row2['sumOfIn'] + $row3['sumOfTo'] + $row4['sumOfFor'])*/)/*- $row13['sumOfs1']*/);
                            $total = $total1;
                                if ($total != 0) {
                                    // echo '&nbsp;' . number_format($total, 2) . '&nbsp;';
                                }
                                else {
                                    echo '<h5 id="v" value="0">0</h5>';
                                }
                    }
                ?>
            <?php echo '<h5 style="display: none;" id="v" class="v" value="'. $total . '">0</h5>' ?>
            <?php echo '<h5 id="c" class="c" value="'. $total - $totalz . '">0</h5>' ?>
            </div>
        </div>
        <div class="card">
            <div class="body">
                <a href="#" class="achievement-button d-print-none carrier-name">
                    هميجان
                </a>
                <?php
                    $totaz = 0;
                    // $query = "SELECT SUM(`quantity`*`carrier_price`) As sumOf FROM download_card WHERE carrier_name='الحماد'";
                    $querys = "SELECT SUM(`exchange_carriers`) As sumIn FROM download_card WHERE carrier_name='هميجان'";
                    $results = mysqli_query($conn, $querys);
                    // $result = mysqli_query($conn, $query);
                    // while ($row = mysqli_fetch_assoc($result)) {
                        while ($rows = mysqli_fetch_assoc($results)) {
                            // $total1 = ($row['sumOf']);
                            $in = ($rows['sumIn']);
                            $totalz = /*$total1 - */$in;
                                if ($totalz != 0) {
                                    // echo '&nbsp;' . number_format($total, 2) . '&nbsp;';
                                }
                                else {
                                    echo '<h5 id="v" value="0">0</h5>';
                                }
                        //}                                                      
                    }
                ?>
                <?php echo '<h5 style="display: none;" id="d" class="d" value="'. $totalz . '">0</h5>' ?>
                <?php
                    $total = 0;
                    $query = "SELECT SUM(`quantity`*`carrier_price`) As sumOf FROM download_card WHERE carrier_name='هميجان'";
                    $result = mysqli_query($conn, $query);
                    while ($row = mysqli_fetch_assoc($result)) {
                            $total1 = (($row['sumOf']/* - ($row2['sumOfIn'] + $row3['sumOfTo'] + $row4['sumOfFor'])*/)/*- $row13['sumOfs1']*/);
                            $total = $total1;
                                if ($total != 0) {
                                    // echo '&nbsp;' . number_format($total, 2) . '&nbsp;';
                                }
                                else {
                                    echo '<h5 id="v" value="0">0</h5>';
                                }
                    }
                ?>
            <?php echo '<h5 style="display: none;" id="v" class="v" value="'. $total . '">0</h5>' ?>
            <?php echo '<h5 id="c" class="c" value="'. $total - $totalz . '">0</h5>' ?>
            </div>
        </div>
        <div class="card">
            <div class="body">
                <a href="#" class="achievement-button d-print-none carrier-name">
                    محترم
                </a>
                <?php
                    $totaz = 0;
                    // $query = "SELECT SUM(`quantity`*`carrier_price`) As sumOf FROM download_card WHERE carrier_name='محترم'";
                    $querys = "SELECT SUM(`exchange_carriers`) As sumIn FROM download_card WHERE carrier_name='محترم'";
                    $results = mysqli_query($conn, $querys);
                    // $result = mysqli_query($conn, $query);
                    // while ($row = mysqli_fetch_assoc($result)) {
                        while ($rows = mysqli_fetch_assoc($results)) {
                            // $total1 = ($row['sumOf']);
                            $in = ($rows['sumIn']);
                            $totalz = /*$total1 - */$in;
                                if ($totalz != 0) {
                                    // echo '&nbsp;' . number_format($total, 2) . '&nbsp;';
                                }
                                else {
                                    echo '<h5 id="v" value="0">0</h5>';
                                }
                        //}                                                      
                    }
                ?>
                <?php echo '<h5 style="display: none;" id="d" class="d" value="'. $totalz . '">0</h5>' ?>
                <?php
                    $total = 0;
                    $query = "SELECT SUM(`quantity`*`carrier_price`) As sumOf FROM download_card WHERE carrier_name='محترم'";
                    $result = mysqli_query($conn, $query);
                    while ($row = mysqli_fetch_assoc($result)) {
                            $total1 = (($row['sumOf']/* - ($row2['sumOfIn'] + $row3['sumOfTo'] + $row4['sumOfFor'])*/)/*- $row13['sumOfs1']*/);
                            $total = $total1;
                                if ($total != 0) {
                                    // echo '&nbsp;' . number_format($total, 2) . '&nbsp;';
                                }
                                else {
                                    echo '<h5 id="v" value="0">0</h5>';
                                }
                    }
                ?>
            <?php echo '<h5 style="display: none;" id="v" class="v" value="'. $total . '">0</h5>' ?>
            <?php echo '<h5 id="c" class="c" value="'. $total - $totalz . '">0</h5>' ?>
            </div>
        </div>
        <div class="card">
            <div class="body">
                <a href="#" class="achievement-button d-print-none carrier-name">
                    علي شاه
                </a>
                <?php
                    $totaz = 0;
                    // $query = "SELECT SUM(`quantity`*`carrier_price`) As sumOf FROM download_card WHERE carrier_name='علي شاه'";
                    $querys = "SELECT SUM(`exchange_carriers`) As sumIn FROM download_card WHERE carrier_name='علي شاه'";
                    $results = mysqli_query($conn, $querys);
                    // $result = mysqli_query($conn, $query);
                    // while ($row = mysqli_fetch_assoc($result)) {
                        while ($rows = mysqli_fetch_assoc($results)) {
                            // $total1 = ($row['sumOf']);
                            $in = ($rows['sumIn']);
                            $totalz = /*$total1 - */$in;
                                if ($totalz != 0) {
                                    // echo '&nbsp;' . number_format($total, 2) . '&nbsp;';
                                }
                                else {
                                    echo '<h5 id="v" value="0">0</h5>';
                                }
                        //}                                                      
                    }
                ?>
                <?php echo '<h5 style="display: none;" id="d" class="d" value="'. $totalz . '">0</h5>' ?>
                <?php
                    $total = 0;
                    $query = "SELECT SUM(`quantity`*`carrier_price`) As sumOf FROM download_card WHERE carrier_name='علي شاه'";
                    $result = mysqli_query($conn, $query);
                    while ($row = mysqli_fetch_assoc($result)) {
                            $total1 = (($row['sumOf']/* - ($row2['sumOfIn'] + $row3['sumOfTo'] + $row4['sumOfFor'])*/)/*- $row13['sumOfs1']*/);
                            $total = $total1;
                                if ($total != 0) {
                                    // echo '&nbsp;' . number_format($total, 2) . '&nbsp;';
                                }
                                else {
                                    echo '<h5 id="v" value="0">0</h5>';
                                }
                    }
                ?>
            <?php echo '<h5 style="display: none;" id="v" class="v" value="'. $total . '">0</h5>' ?>
            <?php echo '<h5 id="c" class="c" value="'. $total - $totalz . '">0</h5>' ?>
            </div>
        </div>
        <div class="card">
            <div class="body">
                <a href="#" class="achievement-button d-print-none carrier-name">
                    عسكر
                </a>
                <?php
                    $totaz = 0;
                    // $query = "SELECT SUM(`quantity`*`carrier_price`) As sumOf FROM download_card WHERE carrier_name='عسكر'";
                    $querys = "SELECT SUM(`exchange_carriers`) As sumIn FROM download_card WHERE carrier_name='عسكر'";
                    $results = mysqli_query($conn, $querys);
                    // $result = mysqli_query($conn, $query);
                    // while ($row = mysqli_fetch_assoc($result)) {
                        while ($rows = mysqli_fetch_assoc($results)) {
                            // $total1 = ($row['sumOf']);
                            $in = ($rows['sumIn']);
                            $totalz = /*$total1 - */$in;
                                if ($totalz != 0) {
                                    // echo '&nbsp;' . number_format($total, 2) . '&nbsp;';
                                }
                                else {
                                    echo '<h5 id="v" value="0">0</h5>';
                                }
                        //}                                                      
                    }
                ?>
                <?php echo '<h5 style="display: none;" id="d" class="d" value="'. $totalz . '">0</h5>' ?>
                <?php
                    $total = 0;
                    $query = "SELECT SUM(`quantity`*`carrier_price`) As sumOf FROM download_card WHERE carrier_name='عسكر'";
                    $result = mysqli_query($conn, $query);
                    while ($row = mysqli_fetch_assoc($result)) {
                            $total1 = (($row['sumOf']/* - ($row2['sumOfIn'] + $row3['sumOfTo'] + $row4['sumOfFor'])*/)/*- $row13['sumOfs1']*/);
                            $total = $total1;
                                if ($total != 0) {
                                    // echo '&nbsp;' . number_format($total, 2) . '&nbsp;';
                                }
                                else {
                                    echo '<h5 id="v" value="0">0</h5>';
                                }
                    }
                ?>
            <?php echo '<h5 style="display: none;" id="v" class="v" value="'. $total . '">0</h5>' ?>
            <?php echo '<h5 id="c" class="c" value="'. $total - $totalz . '">0</h5>' ?>
            </div>
        </div>
        
        <div class="card">
            <div class="body">
                <a href="#">
                    الإجمالي (المستحق)
                </a>
                <?php
                    $total = 0;
                    $query = "SELECT SUM(`quantity`*`carrier_price`) As sumOf FROM download_card";
                    $result = mysqli_query($conn, $query);
                    while ($row = mysqli_fetch_assoc($result)) {
                        $total1 = (($row['sumOf']/* - ($row2['sumOfIn'] + $row3['sumOfTo'] + $row4['sumOfFor'])*/)/*- $row13['sumOfs1']*/);
                            $total = $total1;
                                if ($total != 0) {
                                    // echo '&nbsp;' . number_format($total, 2) . '&nbsp;';
                                }
                                else {
                                    echo '<h5 id="v" value="0">0</h5>';
                                }
                                                                                            
                    }
                ?>
            <?php echo '<h5 id="v" value="'. (double)$total . '">0</h5>' ?>
            </div>
        </div>
        <div class="card">
            <div class="body">
                <a href="#">
                    المستلم
                </a>
                <?php
                    $total = 0;
                    $query = "SELECT SUM(`exchange_carriers`) As sumOf FROM download_card";
                    $result = mysqli_query($conn, $query);
                    while ($row = mysqli_fetch_assoc($result)) {
                        $total1 = (($row['sumOf']/* - ($row2['sumOfIn'] + $row3['sumOfTo'] + $row4['sumOfFor'])*/)/*- $row13['sumOfs1']*/);
                            $total = $total1;
                                if ($total != 0) {
                                    // echo '&nbsp;' . number_format($total, 2) . '&nbsp;';
                                }
                                else {
                                    echo '<h5 id="v" value="0">0</h5>';
                                }
                    }
                ?>
            <?php echo '<h5 id="v" value="'. (double)$total . '">0</h5>' ?>
            </div>
        </div>
        <div class="card">
            <div class="body">
                <a href="#">
                    المديونية
                </a>
                <?php
                    $total = 0;
                    $query = "SELECT SUM(`quantity`*`carrier_price`) As sumOf FROM download_card";
                    $querys = "SELECT SUM(`exchange_carriers`) As sumIn FROM download_card";
                    $results = mysqli_query($conn, $querys);
                    $result = mysqli_query($conn, $query);
                    while ($row = mysqli_fetch_assoc($result)) {
                        while ($rows = mysqli_fetch_assoc($results)) {
                            $total1 = ($row['sumOf']);
                            $in = ($rows['sumIn']);
                            $total = $total1 - $in;
                                if ($total != 0) {
                                    // echo '&nbsp;' . number_format($total, 2) . '&nbsp;';
                                }
                                else {
                                    echo '<h5 id="v" value="0">0</h5>';
                                }
                        }                                                      
                    }
                ?>
                <?php echo '<h5 id="v" value="'. $total . '">0</h5>' ?>
            </div>
        </div>
        
        <div class="card">
            <div class="body">
                <a href="#" class="customer-button d-print-none customer-name">
                    ال طاوي
                </a>
            </div>
        </div>
        
        <div class="card">
            <div class="body">
                <a href="../../layouts/exchange_drivers/view_exchange_drivers.php"></a>
            </div>
        </div>
        <div class="card">
            <div class="body">
                <a href="../../layouts/exchange_drivers/view_exchange_drivers.php"></a>
            </div>
        </div>
        
        <div class="card">
            <div class="body">
                <a href="https://mkh888.000webhostapp.com/">
                    مؤسسة ماجد خالد الحماد
                </a>
            </div>
        </div>
        
    </main>
<script>
    $(document).ready(function() {
        $('.achievement-button').click(function (e) {
            e.preventDefault();
            var id = $(this).closest('.body').find('.carrier-name').text();
            var v = $(this).closest('.body').find('.v').text();
            var d = $(this).closest('.body').find('.d').text();
            var c = $(this).closest('.body').find('.c').text();
            
            //var value = (100000).toLocaleString(
              //undefined, // leave undefined to use the visitor's browser 
                         // locale or a string like 'en-US' to override it.
              //{ minimumFractionDigits: 2 }
            //);
            //console.log(value);
            
            // Demonstrate selected international locales
            var locales = [
              undefined,  // Your own browser
              'en-US',    // United States
              'de-DE',    // Germany
              'ru-RU',    // Russia
              'hi-IN',    // India
              'de-CH',    // Switzerland
            ];
            var n = parseInt(v);
            var m = parseInt(d);
            var p = parseInt(c);
            var opts = { minimumFractionDigits: 2 };
            //for (var i = 0; i < locales.length; i++) {
              //console.log(locales[i], n.toLocaleString(locales[i], opts));
            //}
            
            $('#ids').val(id);
            $('#total').val(n.toLocaleString(locales[0], opts) + '');
            $('#takenCash').val(m.toLocaleString(locales[0], opts));
            $('#carrier_number').val(p.toLocaleString(locales[0], opts));
            $('#exampleModal3').modal('show');
        });
        
        $('.customer-button').click(function (e) {
            e.preventDefault();
            var customer_name = $(this).closest('.body').find('.customer-name').text();
            //var v = $(this).closest('.body').find('.v').text();
            //var d = $(this).closest('.body').find('.d').text();
            //var c = $(this).closest('.body').find('.c').text();
            
            //var value = (100000).toLocaleString(
              //undefined, // leave undefined to use the visitor's browser 
                         // locale or a string like 'en-US' to override it.
              //{ minimumFractionDigits: 2 }
            //);
            //console.log(value);
            
            // Demonstrate selected international locales
            /*var locales = [
              undefined,  // Your own browser
              'en-US',    // United States
              'de-DE',    // Germany
              'ru-RU',    // Russia
              'hi-IN',    // India
              'de-CH',    // Switzerland
            ];
            var n = parseInt(v);
            var m = parseInt(d);
            var p = parseInt(c);
            var opts = { minimumFractionDigits: 2 };*/
            //for (var i = 0; i < locales.length; i++) {
              //console.log(locales[i], n.toLocaleString(locales[i], opts));
            //}
            
            $('#customer_name').val(customer_name);
            /*$('#total').val(n.toLocaleString(locales[0], opts) + '');
            $('#takenCash').val(m.toLocaleString(locales[0], opts));
            $('#carrier_number').val(p.toLocaleString(locales[0], opts));*/
            $('#exampleModal6').modal('show');
        });
    });
</script>
</body>
<script>
    /*function closeSidebar() {
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
            
            document.getElementById("svg-x").style.display = "block";
            document.getElementById("svg-y").style.display = "none";
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
            
            document.getElementById("svg-x").style.display = "none";
            document.getElementById("svg-y").style.display = "block";
        }
        document.getElementById("icon").classList.toggle('icon-close');
    }*/
</script>
<script>
    window.addEventListener("load", () => {
        const loader = document.querySelector(".loader");
        loader.classList.add("loader--hidden");
        loader.addEventListener("transitionend", () => {
            document.body.removeChild(loader);
        });
    });
    
    const cursor = document.querySelector(".cursor");
    var timeout;
    document.addEventListener("mousemove", (e) => {
        let x = e.pageX;
        let y = e.pageY;
        cursor.style.top = y + 'px';
        cursor.style.left = x + 'px';
        cursor.style.display = "block";
        
        function mouseStopped() {
            cursor.style.display = "none";
        }
        clearTimeout(timeout);
        timeout = setTimeout(mouseStopped, 1000);
    });
    
    document.addEventListener("mouseout", () => {
            cursor.style.display = "none";
        });
</script>
<script>
        const counter = document.querySelectorAll("h5");
        counter.forEach((counter) => {
            const updateCounter = () => {
                // toFixed(3) 0.5463546 => 0.546
                const limit = (+counter.attributes.value.value).toFixed(3).toLocaleString('en-US'),
                counterValue = +counter.innerText,
                counterNum = limit / 200;
                if (counterValue < limit) {
                    counter.innerText = `${Math.ceil(counterValue + counterNum)}`;
                    setTimeout(updateCounter, 1);
                }
                else {
                    counter.innerText = limit;
                }
            };
            updateCounter();
        });
</script>

<link rel="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css" type="text/css" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.3/modernizr.min.js" type="text/javascript"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.2.2/Chart.min.js"></script>
<script>
let ctx = document.getElementById("myChart").getContext("2d");
let myChart = new Chart(ctx, {
    type: "line",
    data: {
        labels: [
            "شهر 1",
            "شهر 2",
            "شهر 3",
            "شهر 4",
            "شهر 5",
            "شهر 6",
            "شهر 7",
            "شهر 8",
            "شهر 9",
            "شهر 10",
            "شهر 11",
            "شهر 12",
        ],
        datasets: [
            {
                label: "الديزل",
                data: [3, 2, 5, 5, 2, <?php echo $diesel; ?>, 10, 19, 20, 26, 29, 32],
                backgroundColor: "rgba(55,15,10,0.6)",
            },
            {
                label: "الخصومات",
                data: [0, 0, 0, 0, 0, <?php echo $diesel1; ?>, <?php echo ($diesel1 + 0); ?>, 0, 0, 0, 0, 0],
                backgroundColor: "rgba(255,69,70,0.6)",
            },
            {
                label: "الأرباح",
                data: [<?php echo $total1; ?>, <?php echo $total2; ?>, <?php echo $total3; ?>, <?php echo $total4; ?>, <?php echo $total5; ?>, <?php echo $total6; ?>, <?php echo $total7; ?>, <?php echo $total8; ?>, <?php echo $total9; ?>, <?php echo $total10; ?>, <?php echo $total11; ?>, <?php echo $total12; ?>],
                backgroundColor: "rgba(155,153,10,0.6)",
            }
        ],
    },
});
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
    <script language="javascript" type="text/javascript">
        <?php include '../../assets/js/lock.js'; ?>
    </script>
</html>
<?php } ?>