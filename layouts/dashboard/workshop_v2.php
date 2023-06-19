<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Flex 1.0</title>
    <style>
    
        @import url('https://fonts.googleapis.com/css2?family=Amiri+Quran&family=Cairo+Play:wght@300;400;500&family=Cairo:wght@400;500;700;1000&family=IBM+Plex+Sans+Arabic:wght@600&display=swap');

        * {
            padding: 0;
            margin: 0;
            box-sizing: border-box;
            text-decoration: none;
            font-family: 'Amiri Quran', serif;
            font-family: 'Cairo', sans-serif;
            text-shadow: 4px 4px 4px #565455;
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
        
        a {
            color: #000;
        }
        
        a:hover {
            color: #D33738;
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
            grid-template-columns: 1fr 1fr 1fr;
            grid-template-rows: 1fr 1fr 1fr;
            grid-template-areas: 
                "c1 c2 c3"
                "c4 c4 c5"
                "c4 c4 c6";
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
            font-size: 18px;
            cursor: pointer;
            top: 50%;
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

            .close {
                height: 100vh;
                display: grid;
                grid-template-columns: 330px 1fr;
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
                top: 50%;
            }

            .head-title {
                position: relative;
                top: -22px;
                left: 260px;
            }

            .main {
                grid-template-columns: 1fr;
                grid-template-rows: repeat(6, 200px);
                grid-template-areas: initial;
            }

            .card {
                grid-area: initial !important;
            }
        }
    </style>
</head>
<body id="body">
    <header class="header">
        <div class="icon" id="icon">
            <a href="/home.php">
            <svg style="color: black;" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-house" viewBox="0 0 16 16">
                <path d="M8.707 1.5a1 1 0 0 0-1.414 0L.646 8.146a.5.5 0 0 0 .708.708L2 8.207V13.5A1.5 1.5 0 0 0 3.5 15h9a1.5 1.5 0 0 0 1.5-1.5V8.207l.646.647a.5.5 0 0 0 .708-.708L13 5.793V2.5a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5v1.293L8.707 1.5ZM13 7.207V13.5a.5.5 0 0 1-.5.5h-9a.5.5 0 0 1-.5-.5V7.207l5-5 5 5Z"/>
            </svg>
            </a>
        </div>
    </header>
    <section class="sidebar">
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
    </section>
    <main class="main">
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
                <a href="/view_exchange_drivers.php">صرف السائقين</a>
            </div>
        </div>
        <div class="card">
            <div class="body">
                <a href="/layouts/workshop_invoices/view_workshop_invoices.php">الورشة</a>
            </div>
        </div>
        <div class="card">
            <div class="body">
                <a href="/layouts/search_engine/search_engine.php">محرك البحث</a>
            </div>
        </div>
        <div class="card">
            <div class="body">
                <a href="/layouts/about/about.php">حول</a>
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
        }
        else {
            document.getElementById("svg-x").style.color = "black";
            // document.getElementById("x").classList.remove('x-close');
        }
        document.getElementById("icon").classList.toggle('icon-close');
    }
</script>
</html>