<?php
    session_start();
    include('../../db_conn.php');
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
    <title>صرف السائقين</title>
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
        }
        
        .table .date {
            padding-right: 30px;
            padding-left: 30px;
            background: red;
        }
        
        .table .car-number {
            padding-right: 30px;
            padding-left: 30px;
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
    <nav class="navbar navbar-light justify-content-center fs-3 mb-5 d-print-none" style="background-color: #00ff5573;">صرف السائقين</nav>
    <div class="container">
        <a href="../../home.php" class="btn btn-dark mb-3 d-print-none">الرئيسية</a>
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-left-right d-print-none" viewBox="0 0 16 16">
          <path fill-rule="evenodd" d="M1 11.5a.5.5 0 0 0 .5.5h11.793l-3.147 3.146a.5.5 0 0 0 .708.708l4-4a.5.5 0 0 0 0-.708l-4-4a.5.5 0 0 0-.708.708L13.293 11H1.5a.5.5 0 0 0-.5.5zm14-7a.5.5 0 0 1-.5.5H2.707l3.147 3.146a.5.5 0 1 1-.708.708l-4-4a.5.5 0 0 1 0-.708l4-4a.5.5 0 1 1 .708.708L2.707 4H14.5a.5.5 0 0 1 .5.5z"/>
        </svg>
        <a href="add_exchange_drivers.php" class="btn btn-primary mb-3 d-print-none">
            إضافة فاتورة
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-receipt" viewBox="0 0 16 16">
          <path d="M1.92.506a.5.5 0 0 1 .434.14L3 1.293l.646-.647a.5.5 0 0 1 .708 0L5 1.293l.646-.647a.5.5 0 0 1 .708 0L7 1.293l.646-.647a.5.5 0 0 1 .708 0L9 1.293l.646-.647a.5.5 0 0 1 .708 0l.646.647.646-.647a.5.5 0 0 1 .708 0l.646.647.646-.647a.5.5 0 0 1 .801.13l.5 1A.5.5 0 0 1 15 2v12a.5.5 0 0 1-.053.224l-.5 1a.5.5 0 0 1-.8.13L13 14.707l-.646.647a.5.5 0 0 1-.708 0L11 14.707l-.646.647a.5.5 0 0 1-.708 0L9 14.707l-.646.647a.5.5 0 0 1-.708 0L7 14.707l-.646.647a.5.5 0 0 1-.708 0L5 14.707l-.646.647a.5.5 0 0 1-.708 0L3 14.707l-.646.647a.5.5 0 0 1-.801-.13l-.5-1A.5.5 0 0 1 1 14V2a.5.5 0 0 1 .053-.224l.5-1a.5.5 0 0 1 .367-.27zm.217 1.338L2 2.118v11.764l.137.274.51-.51a.5.5 0 0 1 .707 0l.646.647.646-.646a.5.5 0 0 1 .708 0l.646.646.646-.646a.5.5 0 0 1 .708 0l.646.646.646-.646a.5.5 0 0 1 .708 0l.646.646.646-.646a.5.5 0 0 1 .708 0l.646.646.646-.646a.5.5 0 0 1 .708 0l.509.509.137-.274V2.118l-.137-.274-.51.51a.5.5 0 0 1-.707 0L12 1.707l-.646.647a.5.5 0 0 1-.708 0L10 1.707l-.646.647a.5.5 0 0 1-.708 0L8 1.707l-.646.647a.5.5 0 0 1-.708 0L6 1.707l-.646.647a.5.5 0 0 1-.708 0L4 1.707l-.646.647a.5.5 0 0 1-.708 0l-.509-.51z"/>
          <path d="M3 4.5a.5.5 0 0 1 .5-.5h6a.5.5 0 1 1 0 1h-6a.5.5 0 0 1-.5-.5zm0 2a.5.5 0 0 1 .5-.5h6a.5.5 0 1 1 0 1h-6a.5.5 0 0 1-.5-.5zm0 2a.5.5 0 0 1 .5-.5h6a.5.5 0 1 1 0 1h-6a.5.5 0 0 1-.5-.5zm0 2a.5.5 0 0 1 .5-.5h6a.5.5 0 0 1 0 1h-6a.5.5 0 0 1-.5-.5zm8-6a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 0 1h-1a.5.5 0 0 1-.5-.5zm0 2a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 0 1h-1a.5.5 0 0 1-.5-.5zm0 2a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 0 1h-1a.5.5 0 0 1-.5-.5zm0 2a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 0 1h-1a.5.5 0 0 1-.5-.5z"/>
        </svg>
        </a>
        <!--<a href="report_exchange_drivers.php" class="btn btn-dark mb-3 d-print-none">عرض تقارير</a>-->
        <a href="../../works.php" class="btn btn-dark mb-3 d-print-none">إستعلام الصندوق
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-bar-chart-line-fill" viewBox="0 0 16 16">
              <path d="M11 2a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v12h.5a.5.5 0 0 1 0 1H.5a.5.5 0 0 1 0-1H1v-3a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v3h1V7a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v7h1V2z"/>
            </svg>
        </a>
        
        <!-- //////////////// ROLE /////////////// -->
        <?php
            if ($_SESSION['role'] == 1) { ?>
            <!-- Button trigger modal -->
            <button type="button" class="btn btn-dark mb-3 d-print-none" data-bs-toggle="modal" data-bs-target="#exampleModal">
                إستعلام العملاء
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-motherboard-fill" viewBox="0 0 16 16">
                  <path d="M5 7h3V4H5v3Z"/>
                  <path d="M1 2a2 2 0 0 1 2-2h11a2 2 0 0 1 2 2v11a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2v-2H.5a.5.5 0 0 1-.5-.5v-1A.5.5 0 0 1 .5 9H1V8H.5a.5.5 0 0 1-.5-.5v-1A.5.5 0 0 1 .5 6H1V5H.5a.5.5 0 0 1-.5-.5v-2A.5.5 0 0 1 .5 2H1Zm11 .5a.5.5 0 0 0-1 0v7a.5.5 0 0 0 1 0v-7Zm2 0a.5.5 0 0 0-1 0v7a.5.5 0 0 0 1 0v-7ZM3.5 10a.5.5 0 0 0 0 1h6a.5.5 0 0 0 0-1h-6Zm0 2a.5.5 0 0 0 0 1h6a.5.5 0 0 0 0-1h-6ZM4 4h-.5a.5.5 0 0 0 0 1H4v1h-.5a.5.5 0 0 0 0 1H4a1 1 0 0 0 1 1v.5a.5.5 0 0 0 1 0V8h1v.5a.5.5 0 0 0 1 0V8a1 1 0 0 0 1-1h.5a.5.5 0 0 0 0-1H9V5h.5a.5.5 0 0 0 0-1H9a1 1 0 0 0-1-1v-.5a.5.5 0 0 0-1 0V3H6v-.5a.5.5 0 0 0-1 0V3a1 1 0 0 0-1 1Zm7 7.5v1a.5.5 0 0 0 .5.5h2a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5h-2a.5.5 0 0 0-.5.5Z"/>
                </svg>
            </button>
        <?php }
            else if ($_SESSION['role'] == 3) { ?>
            <!-- Button trigger modal -->
            <button type="button" class="btn btn-dark mb-3 d-print-none" data-bs-toggle="modal" data-bs-target="#exampleModal">
                إستعلام العملاء
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-motherboard-fill" viewBox="0 0 16 16">
                  <path d="M5 7h3V4H5v3Z"/>
                  <path d="M1 2a2 2 0 0 1 2-2h11a2 2 0 0 1 2 2v11a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2v-2H.5a.5.5 0 0 1-.5-.5v-1A.5.5 0 0 1 .5 9H1V8H.5a.5.5 0 0 1-.5-.5v-1A.5.5 0 0 1 .5 6H1V5H.5a.5.5 0 0 1-.5-.5v-2A.5.5 0 0 1 .5 2H1Zm11 .5a.5.5 0 0 0-1 0v7a.5.5 0 0 0 1 0v-7Zm2 0a.5.5 0 0 0-1 0v7a.5.5 0 0 0 1 0v-7ZM3.5 10a.5.5 0 0 0 0 1h6a.5.5 0 0 0 0-1h-6Zm0 2a.5.5 0 0 0 0 1h6a.5.5 0 0 0 0-1h-6ZM4 4h-.5a.5.5 0 0 0 0 1H4v1h-.5a.5.5 0 0 0 0 1H4a1 1 0 0 0 1 1v.5a.5.5 0 0 0 1 0V8h1v.5a.5.5 0 0 0 1 0V8a1 1 0 0 0 1-1h.5a.5.5 0 0 0 0-1H9V5h.5a.5.5 0 0 0 0-1H9a1 1 0 0 0-1-1v-.5a.5.5 0 0 0-1 0V3H6v-.5a.5.5 0 0 0-1 0V3a1 1 0 0 0-1 1Zm7 7.5v1a.5.5 0 0 0 .5.5h2a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5h-2a.5.5 0 0 0-.5.5Z"/>
                </svg>
            </button>
        <?php }
            else if ($_SESSION['role'] == 2) {?>
            <!-- Button trigger modal -->
            <button type="button" class="btn btn-dark mb-3 d-print-none" data-bs-toggle="modal" data-bs-target="#exampleModal">
                إستعلام الحماد
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
                    <form action="../../work.php" method="get">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">إختر صاحب السيارات؟</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <!--<input class="form-control" type"text" name="car_owner" placeholder="صاحب السيارة">-->
                            <select class="form-select" name="car_owner" aria-label="Default select example">
                                <!-- //////////////// ROLE /////////////// -->
                                <?php
                                    if ($_SESSION['role'] == 1) { ?>
                                        <option selected>إختر العميل</option>
                                        <option value="الحماد">الحماد</option>
                                        <option value="المحيميد">المحيميد</option>
                                    <?php }
                                    else if ($_SESSION['role'] == 3) { ?>
                                        <option selected>إختر العميل</option>
                                        <option value="الحماد">الحماد</option>
                                        <option value="المحيميد">المحيميد</option>
                                    <?php }
                                    else if ($_SESSION['role'] == 2) {?>
                                        <option selected>إختر العميل</option>
                                        <option value="الحماد">الحماد</option>
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
                    <form action="delete_exchange_drivers.php" method="post">
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
        
        <!--<a href="search.php" class="btn btn-dark mb-3 d-print-none">البحث</a>-->
        <a href="../../layouts/drivers/drivers.php" class="btn btn-warning mb-3 d-print-none">السائقين
        <svg style="color: black;" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-truck" viewBox="0 0 16 16">
          <path d="M0 3.5A1.5 1.5 0 0 1 1.5 2h9A1.5 1.5 0 0 1 12 3.5V5h1.02a1.5 1.5 0 0 1 1.17.563l1.481 1.85a1.5 1.5 0 0 1 .329.938V10.5a1.5 1.5 0 0 1-1.5 1.5H14a2 2 0 1 1-4 0H5a2 2 0 1 1-3.998-.085A1.5 1.5 0 0 1 0 10.5v-7zm1.294 7.456A1.999 1.999 0 0 1 4.732 11h5.536a2.01 2.01 0 0 1 .732-.732V3.5a.5.5 0 0 0-.5-.5h-9a.5.5 0 0 0-.5.5v7a.5.5 0 0 0 .294.456zM12 10a2 2 0 0 1 1.732 1h.768a.5.5 0 0 0 .5-.5V8.35a.5.5 0 0 0-.11-.312l-1.48-1.85A.5.5 0 0 0 13.02 6H12v4zm-9 1a1 1 0 1 0 0 2 1 1 0 0 0 0-2zm9 0a1 1 0 1 0 0 2 1 1 0 0 0 0-2z"/>
        </svg>
        </a>
        <a href="../../layouts/search_engine/search_engine.php" class="btn btn-info mb-3 d-print-none">محرك البحث (جديد*)
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
          <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/>
        </svg>
        </a>
        <a href="#" class="btn btn-success mb-3 d-print-none export show-button" id="export-button" onclick="getName()">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-filetype-xls" viewBox="0 0 16 16">
              <path fill-rule="evenodd" d="M14 4.5V14a2 2 0 0 1-2 2h-1v-1h1a1 1 0 0 0 1-1V4.5h-2A1.5 1.5 0 0 1 9.5 3V1H4a1 1 0 0 0-1 1v9H2V2a2 2 0 0 1 2-2h5.5L14 4.5ZM6.472 15.29a1.176 1.176 0 0 1-.111-.449h.765a.578.578 0 0 0 .254.384c.07.049.154.087.25.114.095.028.202.041.319.041.164 0 .302-.023.413-.07a.559.559 0 0 0 .255-.193.507.507 0 0 0 .085-.29.387.387 0 0 0-.153-.326c-.101-.08-.255-.144-.462-.193l-.619-.143a1.72 1.72 0 0 1-.539-.214 1.001 1.001 0 0 1-.351-.367 1.068 1.068 0 0 1-.123-.524c0-.244.063-.457.19-.639.127-.181.303-.322.527-.422.225-.1.484-.149.777-.149.305 0 .564.05.78.152.216.102.383.239.5.41.12.17.186.359.2.566h-.75a.56.56 0 0 0-.12-.258.625.625 0 0 0-.247-.181.923.923 0 0 0-.369-.068c-.217 0-.388.05-.513.152a.472.472 0 0 0-.184.384c0 .121.048.22.143.3a.97.97 0 0 0 .405.175l.62.143c.217.05.406.12.566.211a1 1 0 0 1 .375.358c.09.148.135.335.135.56 0 .247-.063.466-.188.656a1.216 1.216 0 0 1-.539.439c-.234.105-.52.158-.858.158-.254 0-.476-.03-.665-.09a1.404 1.404 0 0 1-.478-.252 1.13 1.13 0 0 1-.29-.375Zm-2.945-3.358h-.893L1.81 13.37h-.036l-.832-1.438h-.93l1.227 1.983L0 15.931h.861l.853-1.415h.035l.85 1.415h.908L2.253 13.94l1.274-2.007Zm2.727 3.325H4.557v-3.325h-.79v4h2.487v-.675Z"/>
            </svg>
            تصدير إكسيل
        </a>
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
        </script>
        <table class="table table-hover text-center">
            <thead class="table-dark">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col" class="car-number">رقم السيارة</th>
                    <th scope="col">المصنع</th>
                    <th scope="col">صاحب السيارة</th>
                    <th scope="col">إسم السائق</th>
                    <th scope="col">الترب</th>
                    <th scope="col">قيمة الترب</th>
                    <th scope="col">ديزل</th>
                    <th scope="col">نوع الخدمة</th>
                    <th scope="col">قيمة الخدمة</th>
                    <th scope="col">الحمولة</th>
                    <th scope="col">سعر الحمولة</th>
                    <th scope="col">الخصومات</th>
                    <th scope="col">الشهر</th>
                    <th scope="col">الأسبوع</th>
                    <th scope="col">الدفعات</th>
                    <th scope="col">الرواتب</th>
                    <th scope="col" class="date">التاريخ</th>
                    <!--<th scope="col">Date</th>
                    <th scope="col">Month</th>
                    <th scope="col">Week</th>
                    <th scope="col">Salary</th>
                    <th scope="col">Net Salary</th>-->
                    <!-- //////////////// ROLE /////////////// -->
                        <?php
                        if ($_SESSION['role'] == 1) {
                            echo '
                                <th scope="col" style="width: 8%;" class="d-print-none">العمليات</th>
                            ';
                        }
                        else if ($_SESSION['role'] == 3) {
                            echo '
                                <th scope="col" style="width: 8%;"  class="d-print-none">العمليات</th>
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
                    include('../../db_conn.php');
                    $sql = "SELECT * FROM `drivers`";
                    $result = mysqli_query($conn, $sql);
                    while ($row = mysqli_fetch_assoc($result)) { ?>
                        <tr>
                            <th class="delete-id" scope="row"><?php echo $row['id']; ?></th>
                            <td><?php echo $row['car_number']; ?></td>
                            <td><?php echo $row['factory']; ?></td>
                            <td><?php echo $row['car_owner']; ?></td>
                            <td><?php echo $row['driver_name']; ?></td>
                            <td><?php echo $row['trip']; ?></td>
                            <td><?php echo $row['trip_value']; ?></td>
                            <td><?php echo $row['diesel']; ?></td>
                            <td><?php echo $row['service_type']; ?></td>
                            <td><?php echo $row['service_value']; ?></td>
                            <td><?php echo $row['payload']; ?></td>
                            <td><?php echo $row['payload_price']; ?></td>
                            <td><?php echo $row['discounts']; ?></td>
                            <td><?php echo $row['month']; ?></td>
                            <td><?php echo $row['week']; ?></td>
                            <td><?php echo $row['payments']; ?></td>
                            <td><?php echo $row['salary']; ?></td>
                            <td><?php echo $row['date']; ?></td>
                            <!-- //////////////// ROLE /////////////// -->
                            <?php
                            if ($_SESSION['role'] == 1) { ?>
                                
                                <td>
                                    <a href="edit_exchange_drivers.php?id=<?php echo $row['id']?>" class="link-dark"><i class="fa-solid fa-pen-to-square fs-5 me-3"></i></a>
                                </td>
                                
                            <?php }
                            else if ($_SESSION['role'] == 3) { ?>
                            
                                <td>
                                    <a href="edit_exchange_drivers.php?id=<?php echo $row['id']?>" class="link-dark d-print-none"><i class="fa-solid fa-pen-to-square fs-5 me-3"></i></a>
                                    <a href="#" class="link-dark delete-button d-print-none"><i class="fa-solid fa-trash fs-5"></i></a>
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
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
  </body>
</html>