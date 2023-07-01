<?php
    session_start();
    include('../../database/db_conn.php');
    if (isset($_POST['submit'])) {
        $car_number = $_POST['car_number'];
        $driver_name = $_POST['driver_name'];
        $factory = $_POST['factory'];
        $car_owner = $_POST['car_owner'];
        $trip = $_POST['trip'];
        $trip_value = $_POST['trip_value'];
        $trip_total = $_POST['trip_total'];
        $sql = "INSERT INTO `drivers` (`id`, `car_number`, `driver_name`, `factory`, `car_owner`, `trip`, `trip_value`, `trip_total`) VALUES(NULL, '$car_number', '$driver_name', '$factory', '$car_owner', '$trip', '$trip_value', '$trip_total')";
        $result = mysqli_query($conn, $sql);
        if ($result) {
          header("Location: home.php?msg=NEW");
        }
        else {
          echo "Failed: " . mysqli_error($conn);
        }
    }
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" type="image/x-icon" href="../../assets/icons/dash_blockchain_coins_cryptocurrency_crypto_icon.ico">
    <title>بطاقة التنزيل</title>
    <?php include "../../functions/remove_branding.php"; ?>
    <!-- bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <!-- font awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.0/jquery.min.js"></script>
    <style>
        * {
            direction: rtl;
            font-size: 10px;
            text-decoration: none;
        }
        
        .table>:not(caption)>*>* {
            background-color: #cbbdde;
        }
        
        .table .date {
            padding-right: 16px;
            padding-left: 16px;
            background: #bba9d1;
        }
        
        .table .car-number {
            padding-right: 8px;
            padding-left: 8px;
        }
        
        .show-button {
            display: inline-block;
        }
        
        .hide-button {
            display: none;
        }
        
    </style>
  </head>
  <body>
    <nav class="navbar navbar-light justify-content-center fs-3 mb-5 d-print-none" style="background-color: #8b69b5; color: white; font-weight: bold;">بطاقة التنزيل</nav>
    <div class="container">
        <a href="#" onclick="history.back()" class="btn mb-3 d-print-none" style="background: #6f42c1; color: white;">الرئيسية</a>
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-left-right d-print-none" viewBox="0 0 16 16">
          <path fill-rule="evenodd" d="M1 11.5a.5.5 0 0 0 .5.5h11.793l-3.147 3.146a.5.5 0 0 0 .708.708l4-4a.5.5 0 0 0 0-.708l-4-4a.5.5 0 0 0-.708.708L13.293 11H1.5a.5.5 0 0 0-.5.5zm14-7a.5.5 0 0 1-.5.5H2.707l3.147 3.146a.5.5 0 1 1-.708.708l-4-4a.5.5 0 0 1 0-.708l4-4a.5.5 0 1 1 .708.708L2.707 4H14.5a.5.5 0 0 1 .5.5z"/>
        </svg>
        <a href="add_download_card.php" class="btn btn-warning mb-3 d-print-none">
            إضافة فاتورة
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-receipt" viewBox="0 0 16 16">
          <path d="M1.92.506a.5.5 0 0 1 .434.14L3 1.293l.646-.647a.5.5 0 0 1 .708 0L5 1.293l.646-.647a.5.5 0 0 1 .708 0L7 1.293l.646-.647a.5.5 0 0 1 .708 0L9 1.293l.646-.647a.5.5 0 0 1 .708 0l.646.647.646-.647a.5.5 0 0 1 .708 0l.646.647.646-.647a.5.5 0 0 1 .801.13l.5 1A.5.5 0 0 1 15 2v12a.5.5 0 0 1-.053.224l-.5 1a.5.5 0 0 1-.8.13L13 14.707l-.646.647a.5.5 0 0 1-.708 0L11 14.707l-.646.647a.5.5 0 0 1-.708 0L9 14.707l-.646.647a.5.5 0 0 1-.708 0L7 14.707l-.646.647a.5.5 0 0 1-.708 0L5 14.707l-.646.647a.5.5 0 0 1-.708 0L3 14.707l-.646.647a.5.5 0 0 1-.801-.13l-.5-1A.5.5 0 0 1 1 14V2a.5.5 0 0 1 .053-.224l.5-1a.5.5 0 0 1 .367-.27zm.217 1.338L2 2.118v11.764l.137.274.51-.51a.5.5 0 0 1 .707 0l.646.647.646-.646a.5.5 0 0 1 .708 0l.646.646.646-.646a.5.5 0 0 1 .708 0l.646.646.646-.646a.5.5 0 0 1 .708 0l.646.646.646-.646a.5.5 0 0 1 .708 0l.646.646.646-.646a.5.5 0 0 1 .708 0l.509.509.137-.274V2.118l-.137-.274-.51.51a.5.5 0 0 1-.707 0L12 1.707l-.646.647a.5.5 0 0 1-.708 0L10 1.707l-.646.647a.5.5 0 0 1-.708 0L8 1.707l-.646.647a.5.5 0 0 1-.708 0L6 1.707l-.646.647a.5.5 0 0 1-.708 0L4 1.707l-.646.647a.5.5 0 0 1-.708 0l-.509-.51z"/>
          <path d="M3 4.5a.5.5 0 0 1 .5-.5h6a.5.5 0 1 1 0 1h-6a.5.5 0 0 1-.5-.5zm0 2a.5.5 0 0 1 .5-.5h6a.5.5 0 1 1 0 1h-6a.5.5 0 0 1-.5-.5zm0 2a.5.5 0 0 1 .5-.5h6a.5.5 0 1 1 0 1h-6a.5.5 0 0 1-.5-.5zm0 2a.5.5 0 0 1 .5-.5h6a.5.5 0 0 1 0 1h-6a.5.5 0 0 1-.5-.5zm8-6a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 0 1h-1a.5.5 0 0 1-.5-.5zm0 2a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 0 1h-1a.5.5 0 0 1-.5-.5zm0 2a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 0 1h-1a.5.5 0 0 1-.5-.5zm0 2a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 0 1h-1a.5.5 0 0 1-.5-.5z"/>
        </svg>
        </a>
        <!--<a href="report_exchange_drivers.php" class="btn btn-dark mb-3 d-print-none">عرض تقارير</a>-->
        <!--<a href="#" class="btn btn-dark mb-3 d-print-none">حساب الناقلين 2023
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-truck" viewBox="0 0 16 16">
              <path d="M0 3.5A1.5 1.5 0 0 1 1.5 2h9A1.5 1.5 0 0 1 12 3.5V5h1.02a1.5 1.5 0 0 1 1.17.563l1.481 1.85a1.5 1.5 0 0 1 .329.938V10.5a1.5 1.5 0 0 1-1.5 1.5H14a2 2 0 1 1-4 0H5a2 2 0 1 1-3.998-.085A1.5 1.5 0 0 1 0 10.5v-7zm1.294 7.456A1.999 1.999 0 0 1 4.732 11h5.536a2.01 2.01 0 0 1 .732-.732V3.5a.5.5 0 0 0-.5-.5h-9a.5.5 0 0 0-.5.5v7a.5.5 0 0 0 .294.456zM12 10a2 2 0 0 1 1.732 1h.768a.5.5 0 0 0 .5-.5V8.35a.5.5 0 0 0-.11-.312l-1.48-1.85A.5.5 0 0 0 13.02 6H12v4zm-9 1a1 1 0 1 0 0 2 1 1 0 0 0 0-2zm9 0a1 1 0 1 0 0 2 1 1 0 0 0 0-2z"/>
            </svg>
        </a>-->
        
        <!-- //////////////// ROLE /////////////// -->
        <?php
            if ($_SESSION['role'] == 1) { ?>
            <!-- Button trigger modal -->
            <button type="button" class="btn btn-dark mb-3 d-print-none" data-bs-toggle="modal" data-bs-target="#exampleModal">
                حساب العملاء والمطالبات المالية 2023
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-motherboard-fill" viewBox="0 0 16 16">
                  <path d="M5 7h3V4H5v3Z"/>
                  <path d="M1 2a2 2 0 0 1 2-2h11a2 2 0 0 1 2 2v11a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2v-2H.5a.5.5 0 0 1-.5-.5v-1A.5.5 0 0 1 .5 9H1V8H.5a.5.5 0 0 1-.5-.5v-1A.5.5 0 0 1 .5 6H1V5H.5a.5.5 0 0 1-.5-.5v-2A.5.5 0 0 1 .5 2H1Zm11 .5a.5.5 0 0 0-1 0v7a.5.5 0 0 0 1 0v-7Zm2 0a.5.5 0 0 0-1 0v7a.5.5 0 0 0 1 0v-7ZM3.5 10a.5.5 0 0 0 0 1h6a.5.5 0 0 0 0-1h-6Zm0 2a.5.5 0 0 0 0 1h6a.5.5 0 0 0 0-1h-6ZM4 4h-.5a.5.5 0 0 0 0 1H4v1h-.5a.5.5 0 0 0 0 1H4a1 1 0 0 0 1 1v.5a.5.5 0 0 0 1 0V8h1v.5a.5.5 0 0 0 1 0V8a1 1 0 0 0 1-1h.5a.5.5 0 0 0 0-1H9V5h.5a.5.5 0 0 0 0-1H9a1 1 0 0 0-1-1v-.5a.5.5 0 0 0-1 0V3H6v-.5a.5.5 0 0 0-1 0V3a1 1 0 0 0-1 1Zm7 7.5v1a.5.5 0 0 0 .5.5h2a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5h-2a.5.5 0 0 0-.5.5Z"/>
                </svg>
            </button>
        <?php }
            else if ($_SESSION['role'] == 3) { ?>
            <!-- Button trigger modal -->
            <button type="button" class="btn btn-dark mb-3 d-print-none" data-bs-toggle="modal" data-bs-target="#exampleModal">
                حساب العملاء والمطالبات المالية 2023
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-motherboard-fill" viewBox="0 0 16 16">
                  <path d="M5 7h3V4H5v3Z"/>
                  <path d="M1 2a2 2 0 0 1 2-2h11a2 2 0 0 1 2 2v11a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2v-2H.5a.5.5 0 0 1-.5-.5v-1A.5.5 0 0 1 .5 9H1V8H.5a.5.5 0 0 1-.5-.5v-1A.5.5 0 0 1 .5 6H1V5H.5a.5.5 0 0 1-.5-.5v-2A.5.5 0 0 1 .5 2H1Zm11 .5a.5.5 0 0 0-1 0v7a.5.5 0 0 0 1 0v-7Zm2 0a.5.5 0 0 0-1 0v7a.5.5 0 0 0 1 0v-7ZM3.5 10a.5.5 0 0 0 0 1h6a.5.5 0 0 0 0-1h-6Zm0 2a.5.5 0 0 0 0 1h6a.5.5 0 0 0 0-1h-6ZM4 4h-.5a.5.5 0 0 0 0 1H4v1h-.5a.5.5 0 0 0 0 1H4a1 1 0 0 0 1 1v.5a.5.5 0 0 0 1 0V8h1v.5a.5.5 0 0 0 1 0V8a1 1 0 0 0 1-1h.5a.5.5 0 0 0 0-1H9V5h.5a.5.5 0 0 0 0-1H9a1 1 0 0 0-1-1v-.5a.5.5 0 0 0-1 0V3H6v-.5a.5.5 0 0 0-1 0V3a1 1 0 0 0-1 1Zm7 7.5v1a.5.5 0 0 0 .5.5h2a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5h-2a.5.5 0 0 0-.5.5Z"/>
                </svg>
            </button>
        <?php }
            else if ($_SESSION['role'] == 2) {?>
            <!-- Button trigger modal -->
            <button type="button" class="btn btn-dark mb-3 d-print-none" data-bs-toggle="modal" data-bs-target="#exampleModal">
                حساب العملاء والمطالبات المالية 2023
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-motherboard-fill" viewBox="0 0 16 16">
                  <path d="M5 7h3V4H5v3Z"/>
                  <path d="M1 2a2 2 0 0 1 2-2h11a2 2 0 0 1 2 2v11a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2v-2H.5a.5.5 0 0 1-.5-.5v-1A.5.5 0 0 1 .5 9H1V8H.5a.5.5 0 0 1-.5-.5v-1A.5.5 0 0 1 .5 6H1V5H.5a.5.5 0 0 1-.5-.5v-2A.5.5 0 0 1 .5 2H1Zm11 .5a.5.5 0 0 0-1 0v7a.5.5 0 0 0 1 0v-7Zm2 0a.5.5 0 0 0-1 0v7a.5.5 0 0 0 1 0v-7ZM3.5 10a.5.5 0 0 0 0 1h6a.5.5 0 0 0 0-1h-6Zm0 2a.5.5 0 0 0 0 1h6a.5.5 0 0 0 0-1h-6ZM4 4h-.5a.5.5 0 0 0 0 1H4v1h-.5a.5.5 0 0 0 0 1H4a1 1 0 0 0 1 1v.5a.5.5 0 0 0 1 0V8h1v.5a.5.5 0 0 0 1 0V8a1 1 0 0 0 1-1h.5a.5.5 0 0 0 0-1H9V5h.5a.5.5 0 0 0 0-1H9a1 1 0 0 0-1-1v-.5a.5.5 0 0 0-1 0V3H6v-.5a.5.5 0 0 0-1 0V3a1 1 0 0 0-1 1Zm7 7.5v1a.5.5 0 0 0 .5.5h2a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5h-2a.5.5 0 0 0-.5.5Z"/>
                </svg>
            </button>
        <?php }
        ?>
        <!-- //////////////// ROLE /////////////// -->
                            
        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <form action="work.php" method="get">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">إختر إسم العميل؟</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <!--<input class="form-control" type"text" name="car_owner" placeholder="صاحب السيارة">-->
                            <select class="form-select" name="car_owner" aria-label="Default select example">
                                <!-- //////////////// ROLE /////////////// -->
                                <?php
                                    if ($_SESSION['role'] == 1) { ?>
                                        <option selected>إختر العميل</option>
                                        <option value="الشرقيه">الشرقيه</option>
                                        <option value="ال طاوي">ال طاوي</option>
                                        <option value="سياج">سياج</option>
                                        <option value="السويلم">السويلم</option>
                                    <?php }
                                    else if ($_SESSION['role'] == 3) { ?>
                                        <option selected>إختر العميل</option>
                                        <option value="الشرقيه">الشرقيه</option>
                                        <option value="ال طاوي">ال طاوي</option>
                                        <option value="سياج">سياج</option>
                                        <option value="السويلم">السويلم</option>
                                    <?php }
                                    else if ($_SESSION['role'] == 2) {?>
                                        <option selected>إختر العميل</option>
                                        <option value="الشرقيه">الشرقيه</option>
                                        <option value="ال طاوي">ال طاوي</option>
                                        <option value="سياج">سياج</option>
                                        <option value="السويلم">السويلم</option>
                                    <?php }
                                ?>
                                <!-- //////////////// ROLE /////////////// -->
                            </select>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">إغلاق</button>
                            <button type="submit" class="btn btn-primary">البحث</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        
        <!-- Delete Modal -->
        <div class="modal fade" id="exampleModal2" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <form action="delete_download_card.php" method="post">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">هل أنت متأكد من الحذف؟</h1>
                            <!--<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>-->
                        </div>
                        <div class="modal-body">
                            <input class="form-control" type"hidden" name="id" id="id">
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">إغلاق</button>
                            <button type="submit" class="btn btn-danger">حذف</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        
        <!-- Achievement Modal -->
        <div class="modal fade" id="exampleModal3" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                <div class="modal-content">
                    <form action="achievement_download_card.php" method="post">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">
                                هل أنت متأكد من الأرشفة؟
                                <input type"hidden" name="ids" id="ids" style="width: 32px;">
                            </h1>
                            <!--<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>-->
                        </div>
                        <div class="modal-body">
                            <br>
                            <div class="row">
                                <div class="col">
                                    <input class="form-control" type"hidden" name="customer_name" id="customer_name">
                                </div>
                                <div class="col">
                                    <input class="form-control" type"hidden" name="car_number" id="car_number">
                                </div>
                                <div class="col">
                                    <input class="form-control" type"hidden" name="quantity" id="quantity">
                                </div>
                                <div class="col">
                                    <input class="form-control" type"hidden" name="carrier_name" id="carrier_name">
                                </div>
                                <div class="col">
                                    <input class="form-control" type"hidden" name="carrier_number" id="carrier_number">
                                </div>
                            </div><br>
                            <div class="row">
                                <div class="col">
                                    <input class="form-control" type"hidden" name="loading_number" id="loading_number"><br>
                                </div>
                                <div class="col">
                                    <input class="form-control" type"hidden" name="loading_location" id="loading_location"><br>
                                </div>
                                <div class="col">
                                    <input class="form-control" type"hidden" name="download_number" id="download_number"><br>
                                </div>
                                <div class="col">
                                    <input class="form-control" type"hidden" name="download_location" id="download_location">
                                </div>
                            </div>  
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">إغلاق</button>
                            <button type="submit" class="btn btn-success">أرشفة</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        
        <!-- Unachievement Modal -->
        <div class="modal fade" id="exampleModal4" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <form action="unachievement_download_card.php" method="post">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">هل أنت متأكد من إلغاء الأرشفة؟</h1>
                            <!--<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>-->
                        </div>
                        <div class="modal-body">
                            <input class="form-control" type"hidden" name="idss" id="idss">
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">إغلاق</button>
                            <button type="submit" class="btn btn-success">إلغاء الأرشفة</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        
        <a href="#" class="btn btn-info mb-3 d-print-none">
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
          <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/>
        </svg>
        </a>
        <a href="excel.php" class="btn btn-success mb-3 d-print-none export show-button" id="export-button" onclick="getName()">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-filetype-xls" viewBox="0 0 16 16">
              <path fill-rule="evenodd" d="M14 4.5V14a2 2 0 0 1-2 2h-1v-1h1a1 1 0 0 0 1-1V4.5h-2A1.5 1.5 0 0 1 9.5 3V1H4a1 1 0 0 0-1 1v9H2V2a2 2 0 0 1 2-2h5.5L14 4.5ZM6.472 15.29a1.176 1.176 0 0 1-.111-.449h.765a.578.578 0 0 0 .254.384c.07.049.154.087.25.114.095.028.202.041.319.041.164 0 .302-.023.413-.07a.559.559 0 0 0 .255-.193.507.507 0 0 0 .085-.29.387.387 0 0 0-.153-.326c-.101-.08-.255-.144-.462-.193l-.619-.143a1.72 1.72 0 0 1-.539-.214 1.001 1.001 0 0 1-.351-.367 1.068 1.068 0 0 1-.123-.524c0-.244.063-.457.19-.639.127-.181.303-.322.527-.422.225-.1.484-.149.777-.149.305 0 .564.05.78.152.216.102.383.239.5.41.12.17.186.359.2.566h-.75a.56.56 0 0 0-.12-.258.625.625 0 0 0-.247-.181.923.923 0 0 0-.369-.068c-.217 0-.388.05-.513.152a.472.472 0 0 0-.184.384c0 .121.048.22.143.3a.97.97 0 0 0 .405.175l.62.143c.217.05.406.12.566.211a1 1 0 0 1 .375.358c.09.148.135.335.135.56 0 .247-.063.466-.188.656a1.216 1.216 0 0 1-.539.439c-.234.105-.52.158-.858.158-.254 0-.476-.03-.665-.09a1.404 1.404 0 0 1-.478-.252 1.13 1.13 0 0 1-.29-.375Zm-2.945-3.358h-.893L1.81 13.37h-.036l-.832-1.438h-.93l1.227 1.983L0 15.931h.861l.853-1.415h.035l.85 1.415h.908L2.253 13.94l1.274-2.007Zm2.727 3.325H4.557v-3.325h-.79v4h2.487v-.675Z"/>
            </svg>
            تصدير إكسيل
        </a>
        <?php if ($_SESSION['role'] == 3) { ?>
        <!--<a href="TRUNCATE.php" class="btn btn-danger mb-3 d-print-none show-button">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
              <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5Zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5Zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6Z"/>
              <path d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1ZM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118ZM2.5 3h11V2h-11v1Z"/>
            </svg>
            حذف الجدول
        </a>-->
        <?php } ?>
        <!--<form class="" action="" method="post" enctype="multipart/form-data">
			<input type="file" name="excel" required value="">
			<button type="submit" name="import" class="btn btn-success mb-3 d-print-none show-button">
	            إستراد ملف إكسيل
			    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-cloud-arrow-down" viewBox="0 0 16 16">
                <path fill-rule="evenodd" d="M7.646 10.854a.5.5 0 0 0 .708 0l2-2a.5.5 0 0 0-.708-.708L8.5 9.293V5.5a.5.5 0 0 0-1 0v3.793L6.354 8.146a.5.5 0 1 0-.708.708l2 2z"/>
                <path d="M4.406 3.342A5.53 5.53 0 0 1 8 2c2.69 0 4.923 2 5.166 4.579C14.758 6.804 16 8.137 16 9.773 16 11.569 14.502 13 12.687 13H3.781C1.708 13 0 11.366 0 9.318c0-1.763 1.266-3.223 2.942-3.593.143-.863.698-1.723 1.464-2.383zm.653.757c-.757.653-1.153 1.44-1.153 2.056v.448l-.445.049C2.064 6.805 1 7.952 1 9.318 1 10.785 2.23 12 3.781 12h8.906C13.98 12 15 10.988 15 9.773c0-1.216-1.02-2.228-2.313-2.228h-.5v-.5C12.188 4.825 10.328 3 8 3a4.53 4.53 0 0 0-2.941 1.1z"/>
                </svg>
			</button>
		</form>
        <script>
            function getName() {
                var button = document.getElementById("export-button");
                let confirmAction = confirm("Are you sure to execute this action?");
                if (confirmAction) {
                  alert("Action successfully executed");
                  window.open("excel.php");
                } else {
                  alert("Action canceled");
                }
                document.getElementById("export-button").classList.add('hide-button');
            }
        </script>-->
        <table class="table table-hover text-center table-bordered">
            <thead class="table-warning">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">إسم العميل</th>
                    <th scope="col" class="car-number">رقم السيارة</th>
                    <th scope="col">رقم التحميل</th>
                    <th scope="col">مكان التحميل</th>
                    <th scope="col">رقم التنزيل</th>
                    <th scope="col">مكان التنزيل</th>
                    <th scope="col">الكمية</th>
                    <th scope="col">إسم الناقل</th>
                    <th scope="col">رقم الناقل</th>
                    <th scope="col" class="date">تاريخ التنزيل</th>
                    <th scope="col">الشهر</th>
                    <th scope="col">رقم الفاتورة</th>
                    <th scope="col">سعر العميل</th>
                    <th scope="col">سعر الناقل</th>
                    <th scope="col">صرف الناقلين</th>
                    <th scope="col" class="date">تاريخ الصرف</th>
                    <th scope="col">رقم الصرف</th>
                    <th scope="col" class="car-number">نوع الصرف</th>
                    <th scope="col">قبض العملاء</th>
                    <th scope="col" class="date">تاريخ القبض</th>
                    <th scope="col">رقم القبض</th>
                    <th scope="col" class="car-number">نوع القبض</th>
                    <!--<th scope="col">Date</th>
                    <th scope="col">Month</th>
                    <th scope="col">Week</th>
                    <th scope="col">Salary</th>
                    <th scope="col">Net Salary</th>-->
                    <!-- //////////////// ROLE /////////////// -->
                        <?php
                        if ($_SESSION['role'] == 1) {
                            echo '
                                <th scope="col" style="width: 9%;" class="date d-print-none">العمليات</th>
                            ';
                        }
                        else if ($_SESSION['role'] == 3) {
                            echo '
                                <th scope="col" style="width: 9%;"  class="date d-print-none">العمليات</th>
                            ';
                        }
                        else if ($_SESSION['role'] == 2) {
                            echo '
                                <th>
                                </th>
                            ';
                        }
                        ?>
                    <!-- //////////////// ROLE /////////////// -->
                    
                </tr>
            </thead>
            <tbody>
                <?php
                    include('../../database/db_conn.php');
                    if ($_SESSION['role'] == 1) {
                        $sql = "SELECT * FROM `download_card` WHERE status=0 ORDER BY `download_card`.`id` DESC";
                    }
                    else if ($_SESSION['role'] == 3) {
                        $sql = "SELECT * FROM `download_card`";
                    }
                    else if ($_SESSION['role'] == 2) {
                        $sql = "SELECT * FROM `download_card` WHERE status=0 ORDER BY `download_card`.`id` DESC";
                    }
                    else if ($_SESSION['role'] == 4) {
                        $sql = "SELECT * FROM `download_card` WHERE status=0 ORDER BY `download_card`.`id` DESC";
                    }
                    $result = mysqli_query($conn, $sql);
                    while ($row = mysqli_fetch_assoc($result)) { ?>
                        <tr>
                            <th class="delete-id" scope="row"><?php echo $row['id']; ?></th>
                            <td class="customer_name"><?php echo $row['customer_name']; ?></td>
                            <td class="car_number"><?php echo $row['car_number']; ?></td>
                            <td class="loading_number"><?php echo $row['loading_number']; ?></td>
                            <td class="loading_location"><?php echo $row['loading_location']; ?></td>
                            <td class="download_number"><?php echo $row['download_number']; ?></td>
                            <td class="download_location"><?php echo $row['download_location']; ?></td>
                            <td class="quantity"><?php echo $row['quantity']; ?></td>
                            <td class="carrier_name"><?php echo $row['carrier_name']; ?></td>
                            <td class="carrier_number"><?php echo $row['carrier_number']; ?></td>
                            <td style="background: #bba9d1;"><?php echo $row['download_date']; ?></td>
                            <td><?php echo $row['month']; ?></td>
                            <td><?php echo $row['invoice_number']; ?></td>
                            <td><?php echo $row['customer_price']; ?></td>
                            <td><?php echo $row['carrier_price']; ?></td>
                            <td><?php echo $row['exchange_carriers']; ?></td>
                            <td style="background: #bba9d1;"><?php echo $row['exchange_date']; ?></td>
                            <td><?php echo $row['exchange_number']; ?></td>
                            <td><?php echo $row['exchange_type']; ?></td>
                            <td><?php echo $row['catch_clients']; ?></td>
                            <td style="background: #bba9d1;"><?php echo $row['catch_date']; ?></td>
                            <td><?php echo $row['catch_number']; ?></td>
                            <td><?php echo $row['catch_type']; ?></td>

                            <!-- //////////////// ROLE /////////////// -->
                            <?php
                            if ($_SESSION['role'] == 1) { ?>
                                
                                <td>
                                    <a href="edit_download_card.php?id=<?php echo $row['id']?>" class="link-dark"><i class="fa-solid fa-pen-to-square fs-5 me-3"></i></a>
                                    <!-- soft_delete_download_card.php?id=<?php echo $row['id']?> -->
                                    <a href="#" class="link-dark achievement-button d-print-none">
                                        <i class="fa fa-trash fs-5" style="font-size: 12px; color: #6F42C1;" aria-hidden="true"></i>
                                    </a>
                                </td>
                                
                            <?php }
                            else if ($_SESSION['role'] == 3) { ?>
                            
                                <td>
                                    <a href="edit_download_card.php?id=<?php echo $row['id']?>" class="link-dark d-print-none">
                                        <i class="fa-solid fa-pen-to-square fs-5 me-3"></i>
                                    </a>
                                    <a href="#" class="link-dark delete-button d-print-none">
                                        <i class="fa-solid fa-trash fs-5" style="font-size: 12px; color: #DC3545;"></i>
                                    </a>
                                    <?php
                                        if ($row['status'] == 0) { ?>
                                        <!-- achievement_download_card.php?id=<?php echo $row['id']?> -->
                                            <a href="#" class="link-dark achievement-button d-print-none">
                                                <i class="fa fa-toggle-on" aria-hidden="true" style="font-size: 12px; color: #6F42C1;"></i>
                                            </a>
                                        <?php }
                                        else { ?>
                                            <!-- unachievement_download_card.php?id=<?php echo $row['id']?> -->
                                            <a href="#" class="link-dark unachievement-button d-print-none">
                                                <i class="fa fa-toggle-off" aria-hidden="true" style="font-size: 12px; color: #6F42C1;"></i>
                                            </a>
                                        <?php }
                                    ?>
                                    </a>
                                </td>
                                
                            <?php }
                            else if ($_SESSION['role'] == 2) {
                                echo '
                                    <td>
                                    </td>
                                ';
                            }
                            ?>
                            <!-- //////////////// ROLE /////////////// -->
                        </tr>
                    <?php } ?>
            </tbody>
        </table>
        <!-- Function upload excel file -->
        <?php require '../../database/db_conn.php';
    	if (isset($_POST["import"])) {
    		$fileName = $_FILES["excel"]["name"];
    		$fileExtension = explode('.', $fileName);
    		$fileExtension = strtolower(end($fileExtension));
    		$newFileName = date("Y.m.d") . " - " . date("h.i.sa") . "." . $fileExtension;
    
    		$targetDirectory = "uploads/" . $newFileName;
    		move_uploaded_file($_FILES['excel']['tmp_name'], $targetDirectory);
    
    		error_reporting(0);
    		ini_set('display_errors', 0);
    
    		require 'excelReader/excel_reader2.php';
    		require 'excelReader/SpreadsheetReader.php';
    
    		$reader = new SpreadsheetReader($targetDirectory);
    		foreach ($reader as $key => $row) {
    			$name = $row[0];
    			$age = $row[1];
    			$country = $row[2];
    			$country2 = $row[3];
    			$country3 = $row[4];
    			$country4 = $row[5];
    			$country5 = $row[6];
    			$country6 = $row[7];
    			$country7 = $row[8];
    			$country8 = $row[9];
    			$country9 = $row[10];
    			$country10 = $row[11];
    			$country11 = $row[12];
    			$country12 = $row[13];
    			$country13 = $row[14];
    			$country14 = $row[15];
    			$country15 = $row[16];
    			$country16 = $row[17];
    			$country17 = $row[18];
    			$country18 = $row[19];
    			$country19 = $row[20];
    			$country20 = $row[21];
    			$country21 = $row[22];
    			mysqli_query($conn, "INSERT INTO download_card VALUES('', '$name', '$age', '$country', '$country2', '$country3', '$country4', '$country5', '$country6', '$country7', '$country8', '$country9', '$country10', '$country11', '$country12', '$country13', '$country14', '$country15', '$country16', '$country17', '$country18', '$country19', '$country20', '$country21' )");
    		}
    
    		echo "<script>
    			alert('Succesfully Imported');
    			document.location.href = '';
    			</script>";
    	    }
	    ?>
        <!-- Function upload excel file -->
    </div>
    <script>
        function findTotal() {
            var tot = 0;
            var arr1 = document.getElementById('trip').value;
            var arr2 = document.getElementById('trip_value').value;
            tot = (arr1 * arr2);
            document.getElementById('trip_total').value = tot;
        }
        function findPayloadTotal() {
            var tot = 0;
            var arr3 = document.getElementById('payload').value;
            var arr4 = document.getElementById('payload_price').value;
            tot = (arr3 * arr4);
            document.getElementById('payload_total').value = tot;
        }
      
        $(document).ready(function() {
            $('.delete-button').click(function (e) {
                e.preventDefault();
                var id = $(this).closest('tr').find('.delete-id').text();
                $('#id').val(id);
                $('#exampleModal2').modal('show');
                // alert(id);
            });
        });
        
        $(document).ready(function() {
            $('.achievement-button').click(function (e) {
                e.preventDefault();
                var id = $(this).closest('tr').find('.delete-id').text();
                var customer_name = $(this).closest('tr').find('.customer_name').text();
                var car_number = $(this).closest('tr').find('.car_number').text();
                var loading_number = $(this).closest('tr').find('.loading_number').text();
                var loading_location = $(this).closest('tr').find('.loading_location').text();
                var download_number = $(this).closest('tr').find('.download_number').text();
                var download_location = $(this).closest('tr').find('.download_location').text();
                var quantity = $(this).closest('tr').find('.quantity').text();
                var carrier_name = $(this).closest('tr').find('.carrier_name').text();
                var carrier_number = $(this).closest('tr').find('.carrier_number').text();
                $('#ids').val(id);
                $('#customer_name').val(customer_name);
                $('#car_number').val(car_number);
                $('#loading_number').val(loading_number);
                $('#loading_location').val(loading_location);
                $('#download_number').val(download_number);
                $('#download_location').val(download_location);
                $('#quantity').val(quantity);
                $('#carrier_name').val(carrier_name);
                $('#carrier_number').val(carrier_number);
                $('#exampleModal3').modal('show');
                //alert(id);
            });
        });
        
        $(document).ready(function() {
            $('.unachievement-button').click(function (e) {
                e.preventDefault();
                var id = $(this).closest('tr').find('.delete-id').text();
                $('#idss').val(id);
                $('#exampleModal4').modal('show');
                //alert(id);
            });
        });
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
    <script language="javascript" type="text/javascript">
        <?php include '../../assets/js/lock.js'; ?>
    </script>
  </body>
</html>