<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Workshop</title>
    <style>
        * {
            /*direction: rtl;*/
            background: #217144;
        }

        .container {
            direction: ltr;
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            grid-auto-rows: minmax(100px, auto);
            grid-gap: 8px;
        }

        p {
            background: darkslategray;
            margin: 8px;
            padding: 8px;
        }

        .item {
            background: darkcyan;
            color: white;
            text-align: center;
        }

        .item1 {
            grid-column: 1/4;
            grid-row: 2/3;
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            background: seagreen;
        }

        .item2 {
            grid-column: 1/3;
            background: indianred;
        }

        .item5 {
            grid-column: 1/4;
            grid-row: 4/6;
            background: cadetblue;
        }

        .item13 {
            grid-column: 1/4;
            grid-row: 7/8;
            background: tomato;
        }

        .item6 {
            grid-column: 1/4;
            grid-row: 1/2;
            display: grid;
            grid-template-columns: repeat(1, 1fr);
            background: seagreen;
            
            font-size: 32px;
            font-weight: bold;
        }

        .height1Div {
            height: 32px;
            padding: 32px;
        }

        .height2Div {
            grid-column: 1/4;
            height: 32px;
            padding: 32px;
            cursor: pointer;
            font-size: 12px;
        }

        .height2Div:hover {
            background: #06a1a1;
            font-size: 12px;
        }
        
        a {
            text-decoration: none;
            color: white;
            font-size: 24px;
            font-weight: bold;
            background: transparent;
        }

        @media screen and (max-width: 400px) {
            .height2Div {
                font-size: 8px;
            }
        }
    </style>
</head>

<body>
    <div class="container">
        <!--<div class="item item1">nav</div>
        <div class="item item2">head</div>
        <div class="item item3">logo</div>
        <div class="item item5">content</div>-->
        <div class="item item6 height1Div">
            البرامج الحالية
        </div>
        <div class="item item4 height2Div">
            <a href="/view_exchange_drivers.php">مصروفات السائقين</a>
        </div>
        <div class="item item4 height2Div">
            <a href="/works.php">استعلام الصندوق</a>
        </div>
        <div class="item item4 height2Div">
            <?php
                $car_owner = 'الحماد';
                echo '
                    <a href="/work.php?car_owner='. $car_owner .'">إستعلام الحماد</a>
                ';
            ?>
        </div>
        <div class="item item4 height2Div">
            <a href="/layouts/drivers/drivers.php">السائقين</a>
        </div>
        <div class="item item4 height2Div">
            <a href="/layouts/workshop_invoices/view_workshop_invoices.php">الورشة</a>
        </div>
        <div class="item item4 height2Div">
            <a href="/layouts/notifications/read_notifications.php">الإشعارات</a>
        </div>
        <div class="item item4 height2Div">
            <a href="/view_exchange_drivers.php"></a>
        </div>
        <div class="item item4 height2Div">
            <a href="/view_exchange_drivers.php"></a>
        </div>
        <!--<div class="item item13">footer</div>-->
    </div>
    <?php
        // print_r($_POST);
    ?>
</body>

</html>