<?php
  include('../../database/db_conn.php');
  
    ///////////////////////////// CONDITION [send to every user ] ///////////////////////////
    session_start();
    $title = "تنبيه";
    $subtitle = "تم إضافة فاتورة جديدة";
    $name = $_SESSION['name'];
    $id = $_SESSION['id'];
    $date = date('y-m-d h:m:s');
    $sqli = "SELECT * FROM `user`";
    if ($result=mysqli_query($conn, $sqli)) {
        $user = mysqli_num_rows($result);
        // echo $user;
    }
    ///////////////////////////// CONDITION [send to every user ] ///////////////////////////
  
  if (isset($_POST['submit'])) {
    $customer_name = $_POST['customer_name'];
    $car_number = $_POST['car_number'];
    $loading_number = $_POST['loading_number'];
    $loading_location = $_POST['loading_location'];
    $download_number = $_POST['download_number'];
    $download_location = $_POST['download_location'];
    $quantity = $_POST['quantity'];
    $carrier_name = $_POST['carrier_name'];
    $carrier_number = $_POST['carrier_number'];
    $download_date = date('Y-m-d', strtotime($_POST['download_date']));
    $month = $_POST['month'];
    $invoice_number = $_POST['invoice_number'];
    $customer_price = $_POST['customer_price'];
    $carrier_price = $_POST['carrier_price'];
    $exchange_carriers = $_POST['exchange_carriers'];
    $exchange_date = date('Y-m-d', strtotime($_POST['exchange_date']));
    $exchange_number = $_POST['exchange_number'];
    $exchange_type = $_POST['exchange_type'];
    $catch_clients = $_POST['catch_clients'];
    $catch_date = date('Y-m-d', strtotime($_POST['catch_date']));
    $catch_number = $_POST['catch_number'];
    $catch_type = $_POST['catch_type'];

    $sql = "INSERT INTO `download_card` (`id`, `customer_name`, `car_number`, `loading_number`, `loading_location`, `download_number`, `download_location`, `quantity`, `carrier_name`, `carrier_number`, `download_date`, `month`, `invoice_number`, `customer_price`, `carrier_price`, `exchange_carriers`, `exchange_date`, `exchange_number`, `exchange_type`, `catch_clients`, `catch_date`, `catch_number`, `catch_type`, `status`) VALUES(NULL, '$customer_name', '$car_number', '$loading_number', '$loading_location', '$download_number', '$download_location', '$quantity', '$carrier_name', '$carrier_number', '$download_date', '$month', '$invoice_number', '$customer_price', '$carrier_price', '$exchange_carriers', '$exchange_date', '$exchange_number', '$exchange_type', '$catch_clients', '$catch_date', '$catch_number', '$catch_type', 0)";
    $result = mysqli_query($conn, $sql);
    
    ///////////////////////////// CONDITION ///////////////////////////
    /*for ($i = 1; $i <= $user; $i++) {
        $sql_notify = mysqli_query($conn, "INSERT INTO notifications(title, subtitle, date, type, created_by, seen) VALUES('$title', '$subtitle', '$date', '3', '$name', '$user')");
    }*/
    ///////////////////////////// CONDITION ///////////////////////////
    /*if ($sql_notify) {
        echo '';
    }
    else {
        echo mysqli_error($conn);
        exit;
    }*/
    
    if ($result) {
      header("Location: add_download_card.php?msg=ADDED_NEW");
    }
    else {
      echo "Failed: " . mysqli_error($conn);
    }
  }
  //////////////// ROLE ///////////////
  // session_start();
  if (isset($_SESSION['role']) && $_SESSION['role'] != 1 && $_SESSION['role'] != 3) {
    header('location: home.php');
    die();
  }
  //////////////// ROLE ///////////////
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" type="image/x-icon" href="../../assets/icons/folder_plus_icon.ico">
    <title>بطاقة التنزيل | إضافة فاتورة</title>
    <!-- bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <!-- font awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <?php include "../../functions/remove_branding.php"; ?>
    <style>
        * {
            text-align: right;
        }
        .form-label {
            background: #2F3699;
            color: white;
        }
        .form-control {
            background: black;
            color: white;
        }
        textarea.form-control {
            background: black;
            color: white;
        }
        .select {
            background: black;
            color: white;
        }
        .form-select {
            background: black;
            color: white;
        }
        option {
            background: black;
            color: white;
        }
        .form-control::placeholder {
            color: white;
        }
    </style>
  </head>
  <body style="background: #9F8CB7;">
    <nav class="navbar navbar-light justify-content-center fs-3 mb-5" style="background-color: #2F3699; color: white;">بطاقة التنزيل</nav>
    <div class="container">
      
      <div class="text-center mb-4">
        <h3 style="text-align: center;">إضافة فاتورة</h3>
        <div class="row justify-content-center">
            <div class="col-sm-1">
                <select style="width: 140px;" class="form-select-sm md-1" aria-label="Default select example" style="direction: rtl;" id="type-select" name="type-select">
                  <!--<option selected>نوع الفواتير</option>-->
                  <option value="1">فاتورة عادية</option>
                  <option value="2">فاتورة دفعات/خصومات/راواتب</option>
                  <option value="3">فاتورة تربات</option>
                </select>
            </div>
            <div class="col-4">
                <p class="text-muted">:أكمل البيانات لإضافة فاتورة جديدة ، وحدد نوعها</p>
            </div>
        </div>
        
      </div>

      <div class="container d-flex justify-content-center">
        <form action="" method="post" style="width: 80vw; min-width: 350px;">
          
            <div class="row" id="first-div">
                <div class="col">
                    <label for="invoice_number" class="form-label">رقم الفاتورة</label>
                    <input type="text" class="form-control" name="invoice_number" placeholder="رقم الفاتورة" required>
                </div>
                <div class="col">
                    <label for="month" class="form-label">الشهر</label>
                    <select name="month" class="form-select" aria-label="Default select example" required>
                        <option selected>إختر رقم الشهر</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                        <option value="6">6</option>
                        <option value="7">7</option>
                        <option value="8">8</option>
                        <option value="9">9</option>
                        <option value="10">10</option>
                        <option value="11">11</option>
                        <option value="12">12</option>
                    </select>
                </div>
                <div class="col">
                    <label for="carrier_number" class="form-label">رقم الناقل</label>
                    <input type="text" class="form-control" name="carrier_number" placeholder="رقم الناقل" required>
                </div>
                <div class="col">
                    <label for="carrier_name" class="form-label">إسم الناقل</label>
                    <input type="text" class="form-control" name="carrier_name" placeholder="إسم الناقل" required>
                </div>
                <div class="col">
                    <label for="quantity" class="form-label">الكمية</label>
                    <input type="text" class="form-control" name="quantity" placeholder="الكمية" required>
                </div>
                <div class="col">
                    <label for="car_number" class="form-label">رقم السيارة</label>
                    <input type="text" class="form-control" name="car_number" placeholder="رقم السيارة" required>
                </div>
                <div class="col">
                    <label for="customer_name" class="form-label">إسم العميل</label>
                    <input type="text" class="form-control" name="customer_name" placeholder="إسم العميل" required>
                </div>
            </div><br>
            
            <div class="row" id="second-div">
                <div class="col">
                    <label for="customer_price" class="form-label">سعر العميل</label>
                    <input type="text" class="form-control" name="customer_price" placeholder="سعر العميل" required>
                </div>
                <div class="col">
                    <label for="carrier_price" class="form-label">سعر الناقل</label>
                    <input type="text" class="form-control" name="carrier_price" placeholder="سعر الناقل" required>
                </div>
                <div class="col-md-2" id="date-div">
                    <label for="download_date" class="form-label">تاريخ التنزيل</label>
                    <input type="date" class="form-control" id="date" name="download_date" value="<?php echo date('Y-m-d') ?>">
                </div>
                <div class="col">
                    <label for="loading_location" class="form-label">مكان التحميل</label>
                    <input type="text" class="form-control" name="loading_location" placeholder="مكان التحميل" required>
                </div>
                <div class="col">
                    <label for="loading_number" class="form-label">رقم التحميل</label>
                    <input type="text" class="form-control" name="loading_number" placeholder="رقم التحميل" required>
                </div>
                <div class="col">
                    <label for="download_location" class="form-label">مكان التنزيل</label>
                    <input type="text" class="form-control" name="download_location" placeholder="مكان التنزيل" required>
                </div>
                <div class="col">
                    <label for="download_number" class="form-label">رقم التنزيل</label>
                    <input type="text" class="form-control" name="download_number" placeholder="رقم التنزيل" required>
                </div>
            </div><br>
            
            <div class="row" id="second-div">
                <div class="col" id="date-div" style="width: 160px;">
                    <label for="catch_date" class="form-label">تاريخ القبض</label>
                    <input type="date" class="form-control" id="date" name="catch_date">
                </div>
                <div class="col">
                    <label for="catch_type" class="form-label">نوع القبض</label>
                    <input type="text" class="form-control" name="catch_type" placeholder="نوع القبض">
                </div>
                <div class="col">
                    <label for="catch_number" class="form-label">رقم القبض</label>
                    <input type="text" class="form-control" name="catch_number" placeholder="رقم القبض" value="0" required>
                </div>
                <div class="col">
                    <label for="catch_clients" class="form-label">قبض العملاء</label>
                    <input type="text" class="form-control" name="catch_clients" placeholder="قبض العملاء" value="0" required>
                </div>
                <div class="col" id="date-div" style="width: 160px;">
                    <label for="exchange_date" class="form-label">تاريخ الصرف</label>
                    <input type="date" class="form-control" id="date" name="exchange_date">
                </div>
                <div class="col">
                    <label for="exchange_type" class="form-label">نوع الصرف</label>
                    <input type="text" class="form-control" name="exchange_type" placeholder="نوع الصرف">
                </div>
                <div class="col">
                    <label for="exchange_number" class="form-label">رقم الصرف</label>
                    <input type="text" class="form-control" name="exchange_number" placeholder="رقم الصرف" value="0">
                </div>
                <div class="col">
                    <label for="exchange_carriers" class="form-label">صرف الناقلين</label>
                    <input type="text" class="form-control" name="exchange_carriers" placeholder="صرف الناقلين" value="0">
                </div>
            </div><br>

          <div>
            <button type="submit" class="btn btn-success" name="submit">حفظ</button>
            <a href="view_download_card.php" class="btn btn-danger">إلغاء</a>
          </div>

        </form>
      </div>
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
        const theSelect = document.getElementById("type-select");
        const theDiv1 = document.getElementById("first-div");
        const theDiv2 = document.getElementById("second-div");
        const theDiv3 = document.getElementById("date-div");
        const theDiv4 = document.getElementById("service-dive");
        const theDiv5 = document.getElementById("third-div");
        theSelect.addEventListener("change", function(event) {
            if (event.target.value == '1') {
                theDiv1.style.visibility = "visible"
                theDiv2.style.visibility = "visible"
                theDiv5.style.display = "flex"
                theDiv4.style.display = "flex"
                theDiv2.style.display = "flex"
            }
            else if (event.target.value == '2') {
                theDiv2.style.visibility = "hidden"
                theDiv3.style.visibility = "visible"
                theDiv5.style.visibility = "visible"
                theDiv4.style.display = "none"
                theDiv5.style.display = "inline-flex"
            }
            else if (event.target.value == '3') {
                theDiv2.style.visibility = "visible"
                theDiv3.style.visibility = "visible"
                theDiv5.style.display = "none"
            }
        });
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
  </body>
</html>