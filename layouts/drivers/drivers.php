<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- bootstrap -->
    <!--<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">-->
    <!-- font awesome -->
    <!--<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />-->
    <link rel="icon" type="image/x-icon" href="analytics_docs_documents_graph_pdf_icon.ico">
    <title>السائقين</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            font-family: 'Courier New', Courier, monospace;
            direction: rtl;
        }
        body {
            display: flex;
            justify-content: center;
            height: 100vh;
            align-items: center;
        }
        .container {
            display: flex;
        }
        .card-x {
            height: 200px;
            margin: 50px;
            box-shadow: 5px 5px 20px black;
            overflow: hidden;
        }
        img {
            width: 150px;
        }
        #driver-image {
            height: 200px;
            width: 150px;
            border-radius: 8px;
            transition: 0.5s;
        }
        .intro {
            height: 50px;
            width: 150px;
            padding: 6px;
            box-sizing: border-box;
            position: absolute;
            bottom: 200px;
            background: rgb(27, 27, 27);
            color: white;
            transition: 0.5s;
        }
        h2 {
            margin: 10px;
            font-size: 20px;
        }
        p {
            margin: 20px;
            font-size: 10px;
            visibility: hidden;
            opacity: 0;
        }
        span {
            font-weight: bold;
        }
        a {
            text-decoration: none;
            color: white;
        }
        .card-x:hover {
            cursor: pointer;
        }
        .card-x:hover .intro {
            height: 220px;
            bottom: 200px;
            background: black;
        }
        .card-x:hover p {
            opacity: 1;
            visibility: visible;
        }
        .card-x:hover img {
            transform: scale(1.1)rotate(-3deg);
        }
        .containerx {
            position: absolute;
            bottom: 0;
            top: 100px;
            font-size: 32px;
            font-weight: bold;
        }
        .containerx a {
            background: red;
        }
    </style>
</head>
<body>
    <div class="containerx">
        <a href="../../layouts/exchange_drivers/view_exchange_drivers.php">العودة للصفحة الرئيسية</a>
    </div>
    <div class="container">
        <div class="card-x">
            <img id="driver-image" src="../../assets/images/drivers/2042.jpg" alt="">
            <div class="intro">
                <h2><a href="drivers_salary.php?driver_name=شهباز">شهباز</a></h2>
                <p>رقم السيارة<span>2042</span></p>
            </div>
        </div>
        <div class="card-x">
            <img id="driver-image" src="../../assets/images/drivers/9750.jpg" alt="">
            <div class="intro">
                <h2><a href="drivers_salary.php?driver_name=نور">نور</a></h2>
                <p>رقم السيارة<span>9750</span></p>
            </div>
        </div>
        <div class="card-x">
            <img id="driver-image" src="../../assets/images/drivers/5998.jpg" alt="">
            <div class="intro">
                <h2><a href="drivers_salary.php?driver_name=سوكا">سوكا</a></h2>
                <p>رقم السيارة<span>5998</span></p>
            </div>
        </div>
        <div class="card-x">
            <img id="driver-image" src="../../assets/images/drivers/3837.jpg" alt="">
            <div class="intro">
                <h2><a href="drivers_salary.php?driver_name=علي">علي</a></h2>
                <p>رقم السيارة<span>3837</span></p>
            </div>
        </div>
        <div class="card-x">
            <img id="driver-image" src="../../assets/images/drivers/4269.jpg" alt="">
            <div class="intro">
                <h2><a href="drivers_salary.php?driver_name=نصار">نصار</a></h2>
                <p>رقم السيارة<span>4269</span></p>
            </div>
        </div>
    </div>
</body>
</html>