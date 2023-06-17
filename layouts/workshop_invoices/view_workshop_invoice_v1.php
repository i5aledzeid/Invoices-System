<?php
    session_start();
    include('../../db_conn.php');
    $id = $_GET['id'];
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
    $sql = "SELECT * FROM `workshop`";
    $result = mysqli_query($conn, $sql);
    while ($row = mysqli_fetch_assoc($result)) {
?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
    <!-- Custom Style -->
    <link rel="stylesheet" href="../../assets/css/style-invoice-1.css">
    
    <style>
        * {
            direction: rtl;
        }
        
        .social {
            direction: ltr;
        }
        
        .table {
            font-size: 12px;
        }
        
        .col-8 {
            direction: rtl;
            left: 250px;
        }
        
    </style>

    <title>Invoice..!</title>
</head>

<body>
    <div class="my-5 page" size="A4">
        <div class="p-5">
            <section class="top-content bb d-flex justify-content-between">
                <div class="logo">
                    <!--<img src="../../assets/images/invoices/logo.png" alt="" class="img-fluid">-->
                    <img src="../../assets/images/screenshots/mkh.png" alt="" class="img-fluid">
                </div>
                <div class="top-left">
                    <div class="graphic-path">
                        <p>فاتورة - ورشة ماجد خالد الحماد</p>
                    </div>
                    <div class="position-relative">
                        <p>رقم الفاتورة: <span>
                            <?php echo $id; ?>
                        </span></p>
                    </div>
                </div>
            </section>

            <section class="store-user mt-5">
                <div class="col-10">
                    <div class="row bb pb-3">
                        <div class="col-7">
                            <p>المورد ، </p>
                            <h2>خالد زيد</h2>
                            <p class="address"> Salah Ad Din Al Ayyubi Rd, <br> Jarir, Riyadh 12837, <br> Saudi Arabia </p>
                            <div class="txn mt-2">TXN: XXXXXXX</div>
                        </div>
                        <div class="col-5">
                            <p>العميل ، </p>
                            <h2>السويلم</h2>
                            <p class="address"> 777 Brockton Avenue, <br> Abington MA 2351, <br>Vestavia Hills AL </p>
                            <div class="txn mt-2">TXN: XXXXXXX</div>
                        </div>
                    </div>
                    <div class="row extra-info pt-3">
                        <div class="col-7">
                            <p>طريقة الدفع او السداد: <span>كاش</span></p>
                            <p>رقم الطلب: <span>#868</span></p>
                        </div>
                        <div class="col-5">
                            <p>تاريخ التسليم: <span>
                                <?php
                                    echo $row['date'];
                                ?>
                            </span></p>
                        </div>
                    </div>
                </div>
            </section>

            <section class="product-area mt-4">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <td>#</td>
                            <td>رقم الفاتورة</td>
                            <td>وصف العنصر</td>
                            <td>السعر</td>
                            <td>الكمية</td>
                            <td>إجمالي</td>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            $sql = "SELECT * FROM `workshop`";
                            $result = mysqli_query($conn, $sql);
                            while ($row = mysqli_fetch_assoc($result)) {
                        ?>
                        <tr>
                            <td><?php echo $row['id']; ?></td>
                            <td><?php echo $row['invoice_number']; ?></td>
                            <td>
                                <div class="media">
                                    <div class="media-body">
                                        <p class="mt-0 title"><?php echo $row['title']; ?></p>
                                        <?php echo $row['subtitle']; ?>
                                    </div>
                                </div>
                            </td>
                            <td><?php echo $row['price']; ?></td>
                            <td>1</td>
                            <td><?php echo number_format($row['price'] * $row['qty'], 2); ?> ريال سعودي</td>
                        </tr>
                        <?php } ?>
                        <!--<tr>
                            <td>
                                <div class="media">
                                    <img class="mr-3 img-fluid" src="../../assets/images/invoices/mobile.jpg" alt="Product 01">
                                    <div class="media-body">
                                        <p class="mt-0 title">عنوان الوسائط</p>
                                        يجب أن يكون غدا حرا ، لا يوجد حمل.
                                    </div>
                                </div>
                            </td>
                            <td>1400 ريال سعودي</td>
                            <td>1</td>
                            <td>1400 ريال سعودي</td>
                        </tr>
                        <tr>
                            <td>
                                <div class="media">
                                    <img class="mr-3 img-fluid" src="../../assets/images/invoices/mobile-2.jpg" alt="Product 01">
                                    <div class="media-body">
                                        <p class="mt-0 title">عنوان الوسائط</p>
                                        يجب أن يكون غدا حرا ، لا يوجد حمل.
                                    </div>
                                </div>
                            </td>
                            <td>9000 ريال سعودي</td>
                            <td>2</td>
                            <td>18000 ريال سعودي</td>
                        </tr>-->
                    </tbody>
                </table>
            </section><br><br><br><br><br>

            <section class="balance-info">
                <div class="row">
                    <div class="col-8">
                        <p class="m-0 font-weight-bold"> ملاحظة: </p>
                        <p>لا توجد أي ملاحظات</p>
                    </div>
                    <div class="col-4">
                        <table class="table border-0 table-hover">
                            <tr>
                                <td>الإجمالي الفرعي:</td>
                                <td>19,400 ريال سعودي</td>
                            </tr>
                            <tr>
                                <td>الضريبة (15%):</td>
                                <td>2,910 ريال سعودي</td>
                            </tr>
                            <tr>
                                <td>رسوم توصيل:</td>
                                <td>30 ريال سعودي</td>
                            </tr>
                            <tfoot>
                                <tr>
                                    <td>الإجمالي الكلي:</td>
                                    <td>16,490 ريال سعودي</td>
                                </tr>
                            </tfoot>
                        </table>

                        <!-- Signature -->
                        <div class="col-12">
                            <img src="../../assets/images/invoices/signature.png" class="img-fluid" alt="">
                            <p class="text-center m-0"> توقيع المدير </p>
                        </div>
                    </div>
                </div>
            </section>

            <!-- Cart BG -->
            <img src="../../assets/images/invoices/cart.jpg" class="img-fluid cart-bg" alt="">

            <footer>
                <hr>
                <p class="m-0 text-center">
                    اعرض هذه الفاتورة عبر الإنترنت على - <a href="#!"> view_workshop_invoice.php?id=2327184 </a>
                </p>
                <div class="social pt-3">
                    <span class="pr-2">
                        <i class="fas fa-mobile-alt"></i>
                        <span>0582350704</span>
                    </span>
                    <span class="pr-2">
                        <i class="fas fa-envelope"></i>
                        <span>i5aledzeid@gmail.com</span>
                    </span>
                    <span class="pr-2">
                        <i class="fab fa-facebook-f"></i>
                        <span>/i5aledzeid</span>
                    </span>
                    <span class="pr-2">
                        <i class="fab fa-youtube"></i>
                        <span>/i5aledzeid</span>
                    </span>
                    <span class="pr-2">
                        <i class="fab fa-github"></i>
                        <span>/i5aledzeid</span>
                    </span>
                </div>
            </footer>
        </div>
    </div>
</body>
</html>
<?php } ?>