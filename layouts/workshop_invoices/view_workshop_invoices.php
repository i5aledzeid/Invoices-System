<?php
    session_start();
    include('../../db_conn.php');
    /*if (isset($_POST['submit'])) {
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
    }*/
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" type="image/x-icon" href="../../assets/icons/welder_industrial_factory_industry_workshop_icon.ico">
    <title>فواتير الورشة</title>
    <!-- bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <!-- font awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <?php include "../../functions/remove_branding.php"; ?>
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
    <nav class="navbar navbar-light justify-content-center fs-3 mb-5 d-print-none" style="color: white; background-color: #FF4546;">فواتير الورشة</nav>
    <div class="container">
        <a href="../../home.php" class="btn btn-dark mb-3 d-print-none">الرئيسية</a>
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-left-right d-print-none" viewBox="0 0 16 16">
          <path fill-rule="evenodd" d="M1 11.5a.5.5 0 0 0 .5.5h11.793l-3.147 3.146a.5.5 0 0 0 .708.708l4-4a.5.5 0 0 0 0-.708l-4-4a.5.5 0 0 0-.708.708L13.293 11H1.5a.5.5 0 0 0-.5.5zm14-7a.5.5 0 0 1-.5.5H2.707l3.147 3.146a.5.5 0 1 1-.708.708l-4-4a.5.5 0 0 1 0-.708l4-4a.5.5 0 1 1 .708.708L2.707 4H14.5a.5.5 0 0 1 .5.5z"/>
        </svg>
        <a href="add_workshop_invoices.php" class="btn btn-primary mb-3 d-print-none">
            إضافة فاتورة
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-receipt" viewBox="0 0 16 16">
          <path d="M1.92.506a.5.5 0 0 1 .434.14L3 1.293l.646-.647a.5.5 0 0 1 .708 0L5 1.293l.646-.647a.5.5 0 0 1 .708 0L7 1.293l.646-.647a.5.5 0 0 1 .708 0L9 1.293l.646-.647a.5.5 0 0 1 .708 0l.646.647.646-.647a.5.5 0 0 1 .708 0l.646.647.646-.647a.5.5 0 0 1 .801.13l.5 1A.5.5 0 0 1 15 2v12a.5.5 0 0 1-.053.224l-.5 1a.5.5 0 0 1-.8.13L13 14.707l-.646.647a.5.5 0 0 1-.708 0L11 14.707l-.646.647a.5.5 0 0 1-.708 0L9 14.707l-.646.647a.5.5 0 0 1-.708 0L7 14.707l-.646.647a.5.5 0 0 1-.708 0L5 14.707l-.646.647a.5.5 0 0 1-.708 0L3 14.707l-.646.647a.5.5 0 0 1-.801-.13l-.5-1A.5.5 0 0 1 1 14V2a.5.5 0 0 1 .053-.224l.5-1a.5.5 0 0 1 .367-.27zm.217 1.338L2 2.118v11.764l.137.274.51-.51a.5.5 0 0 1 .707 0l.646.647.646-.646a.5.5 0 0 1 .708 0l.646.646.646-.646a.5.5 0 0 1 .708 0l.646.646.646-.646a.5.5 0 0 1 .708 0l.646.646.646-.646a.5.5 0 0 1 .708 0l.646.646.646-.646a.5.5 0 0 1 .708 0l.509.509.137-.274V2.118l-.137-.274-.51.51a.5.5 0 0 1-.707 0L12 1.707l-.646.647a.5.5 0 0 1-.708 0L10 1.707l-.646.647a.5.5 0 0 1-.708 0L8 1.707l-.646.647a.5.5 0 0 1-.708 0L6 1.707l-.646.647a.5.5 0 0 1-.708 0L4 1.707l-.646.647a.5.5 0 0 1-.708 0l-.509-.51z"/>
          <path d="M3 4.5a.5.5 0 0 1 .5-.5h6a.5.5 0 1 1 0 1h-6a.5.5 0 0 1-.5-.5zm0 2a.5.5 0 0 1 .5-.5h6a.5.5 0 1 1 0 1h-6a.5.5 0 0 1-.5-.5zm0 2a.5.5 0 0 1 .5-.5h6a.5.5 0 1 1 0 1h-6a.5.5 0 0 1-.5-.5zm0 2a.5.5 0 0 1 .5-.5h6a.5.5 0 0 1 0 1h-6a.5.5 0 0 1-.5-.5zm8-6a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 0 1h-1a.5.5 0 0 1-.5-.5zm0 2a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 0 1h-1a.5.5 0 0 1-.5-.5zm0 2a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 0 1h-1a.5.5 0 0 1-.5-.5zm0 2a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 0 1h-1a.5.5 0 0 1-.5-.5z"/>
        </svg>
        </a>
        
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
        <a href="../qrcode/qr.php" class="btn btn-warning mb-3 d-print-none">إنشاء باركود
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-qr-code" viewBox="0 0 16 16">
              <path d="M2 2h2v2H2V2Z"/>
              <path d="M6 0v6H0V0h6ZM5 1H1v4h4V1ZM4 12H2v2h2v-2Z"/>
              <path d="M6 10v6H0v-6h6Zm-5 1v4h4v-4H1Zm11-9h2v2h-2V2Z"/>
              <path d="M10 0v6h6V0h-6Zm5 1v4h-4V1h4ZM8 1V0h1v2H8v2H7V1h1Zm0 5V4h1v2H8ZM6 8V7h1V6h1v2h1V7h5v1h-4v1H7V8H6Zm0 0v1H2V8H1v1H0V7h3v1h3Zm10 1h-1V7h1v2Zm-1 0h-1v2h2v-1h-1V9Zm-4 0h2v1h-1v1h-1V9Zm2 3v-1h-1v1h-1v1H9v1h3v-2h1Zm0 0h3v1h-2v1h-1v-2Zm-4-1v1h1v-2H7v1h2Z"/>
              <path d="M7 12h1v3h4v1H7v-4Zm9 2v2h-3v-1h2v-1h1Z"/>
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
                    <th scope="col" style="width: 16%;" class="car-number">رقم الفاتورة</th>
                    <th scope="col" style="width: 8%;">العنوان</th>
                    <th scope="col" style="width: 32%;">التفاصيل</th>
                    <th scope="col">السعر</th>
                    <th scope="col">الكمية</th>
                    <th scope="col">الإجمالي</th>
                    <th scope="col">التاريخ</th>
                    <th scope="col">المنشئ</th>
                    <th scope="col">تاريخ إنشاء الفاتورة</th>
                    <th scope="col">الحالة</th>
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
                    $sql = "SELECT * FROM `workshop`";
                    $result = mysqli_query($conn, $sql);
                    while ($row = mysqli_fetch_assoc($result)) { 
                    /*for ($x = 1; $x <= 6; $x++) {*/ ?>
                        <tr>
                            <td><a href="view_workshop_invoice.php?id=<?php echo $row['invoice_number']; ?>"><?php echo $row['invoice_number']; ?></a></td>
                            <td><?php echo $row['customer_name']; ?></td>
                            <td><?php echo $row['subtitle']; ?></td>
                            <td><?php echo $row['price']; ?></td>
                            <td><?php echo $row['qty']; ?></td>
                            <td><?php echo $row['total']; ?></td>
                            <td><?php echo $row['date']; ?></td>
                            <td><?php echo $row['created_by']; ?></td>
                            <td><?php echo $row['created_at']; ?></td>
                            <?php if ($row['status'] != 0) {
                                echo '
                                    <td style="color: green;">مدفوعة</td>
                                ';
                            } else {
                                echo '
                                    <td style="color: #dc354b;">غير مدفوعة</td>
                                ';
                            }
                            ?>
                            <!-- //////////////// ROLE /////////////// -->
                            <?php
                            if ($_SESSION['role'] == 1) { ?>
                                
                                <td>
                                    <a href="edit_exchange_drivers.php?id=<?php echo $row['invoice_number']?>" class="link-dark"><i class="fa-solid fa-pen-to-square fs-5 me-3"></i></a>
                                </td>
                                
                            <?php }
                            else if ($_SESSION['role'] == 3) { ?>
                            
                                <td>
                                    <a href="edit_exchange_drivers.php?id=<?php echo $row['invoice_number']?>" class="link-dark d-print-none"><i class="fa-solid fa-pen-to-square fs-5 me-3"></i></a>
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
                    <?php }/*}*/ ?>
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