<?php
  include('../../db_conn.php');
  if (isset($_POST['submit'])) {
    $car_number = $_POST['car_number'];
    $driver_name = $_POST['driver_name'];
    $factory = $_POST['factory'];
    $car_owner = $_POST['car_owner'];
    $trip = $_POST['trip'];
    $trip_value = $_POST['trip_value'];
    $trip_total = $_POST['trip_total'];
    $diesel = $_POST['diesel'];
    $service_type = $_POST['service_type'];
    $service_value = $_POST['service_value'];
    $payload = $_POST['payload'];
    $payload_price = $_POST['payload_price'];
    $payload_total = $_POST['payload_total'];
    
    $discounts = $_POST['discounts'];
    $payments = $_POST['payments'];
    
    $date = date('Y-m-d', strtotime($_POST['date']));
    $month = $_POST['month'];
    $week = $_POST['week'];
    
    $salary = $_POST['salary'];
    
    $sql = "INSERT INTO `drivers` (`id`, `car_number`, `driver_name`, `factory`, `car_owner`, `trip`, `trip_value`, `trip_total`, `diesel`, `service_type`, `service_value`, `payload`, `payload_price`, `payload_total`, `discounts`, `payments`, `date`, `month`, `week`, `salary`, `net_salary`) VALUES(NULL, '$car_number', '$driver_name', '$factory', '$car_owner', '$trip', '$trip_value', '$trip_total', '$diesel', '$service_type', '$service_value', '$payload', '$payload_price', '$payload_total', '$discounts', $payments, '$date', '$month', '$week', $salary, 0.0)";
    $result = mysqli_query($conn, $sql);
    
    session_start();
    $title = "تنبيه";
    $subtitle = "تم إضافة فاتورة جديدة";
    $name = $_SESSION['name'];
    $id = $_SESSION['id'];
    $date = date('y-m-d h:m:s');
    ///////////////////////////// CONDITION [send to every user ] ///////////////////////////
    $sqli = "SELECT * FROM `user`";
    if ($result=mysqli_query($conn, $sqli)) {
        $user = mysqli_num_rows($result);
        // echo $user;
    }
    for ($i = 1; $i <= $user; $i++) {
        $sql_notify = mysqli_query($conn, "INSERT INTO notifications(title, subtitle, date, type, created_by, seen) VALUES('$title', '$subtitle', '$date', '3', '$name', '$id')");
    }
    ///////////////////////////// CONDITION ///////////////////////////
    if ($sql_notify) {
        echo '';
    }
    else {
        echo mysqli_error($conn);
        exit;
    }
    
    if ($result) {
      header("Location: add_exchange_drivers.php?msg=NEW");
    }
    else {
      echo "Failed: " . mysqli_error($conn);
    }
  }
  //////////////// ROLE ///////////////
  session_start();
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
    <title>صرف السائقين</title>
    <!-- bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <!-- font awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <?php include "../../functions/remove_branding.php"; ?>
  </head>
  <body>
    <nav class="navbar navbar-light justify-content-center fs-3 mb-5" style="background-color: #00ff5573;">مصروفات السائقين</nav>
    <div class="container">
      
      <div class="text-center mb-4">
        <h3>إضافة فاتورة</h3>
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
              <label for="month" class="form-label">الشهر</label>
              <!--<input type="text" class="form-control" name="month" placeholder="Month" required>-->
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
              <label for="week" class="form-label">الأسبوع</label>
              <!--<input type="text" class="form-control" name="week" placeholder="Week">-->
              <select name="week" class="form-select" aria-label="Default select example" required>
                <option selected>إختر رقم الأسبوع</option>
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
              </select>
            </div>
            <div class="col">
              <label for="car_number" class="form-label">رقم السيارة</label>
              <input type="text" class="form-control" name="car_number" placeholder="رقم السيارة" required>
            </div>
            <div class="col">
              <label for="driver_name" class="form-label">إسم السائق</label>
              <input type="text" class="form-control" name="driver_name" placeholder="إسم السائق">
            </div>
            <div class="col">
              <label for="factory" class="form-label">المصنع</label>
              <input type="text" class="form-control" name="factory" placeholder="المصنع">
            </div>
            <div class="col">
              <label for="car_owner" class="form-label">صاحب السيارة</label>
              <input type="text" class="form-control" name="car_owner" placeholder="صاحب السيارة" required>
            </div>
          </div><br>

          <div class="row" id="second-div">
            <div class="col">
              <label for="trip" class="form-label">الترب</label>
              <input type="text" class="form-control" name="trip" id="trip" value="0" placeholder="Trip">
            </div>
            <div class="col">
              <label for="trip_value" class="form-label">سعر الترب</label>
              <input type="text" class="form-control" name="trip_value" id="trip_value" value="0" onchange="findTotal()" placeholder="Trip Value">
            </div>
            <div class="col">
              <label for="trip_total" class="form-label">إجمالي الترب</label>
              <input type="text" class="form-control" name="trip_total" id="trip_total" value="0" placeholder="Trip Total" readonly>
            </div>
            <div class="col">
              <label for="payload" class="form-label">الحمولة</label>
              <input type="text" class="form-control" name="payload" id="payload" value="0" placeholder="Payload">
            </div>
            <div class="col">
              <label for="payload_price" class="form-label">سعر الحمولة</label>
              <input type="text" class="form-control" name="payload_price" value="0" id="payload_price" onchange="findPayloadTotal()" placeholder="سعر الحمولة">
            </div>
            <div class="col">
              <label for="payload_total" class="form-label">إجمالي الحمولة</label>
              <input type="text" class="form-control" name="payload_total" value="0" id="payload_total" placeholder="إجمالي الحمولة" readonly>
            </div>
            <div class="col-md-2">
              <label for="diesel" class="form-label">ديزل</label>
              <input type="text" class="form-control" name="diesel" value="0" placeholder="الديزل">
            </div>
            <div class="col-md-2" id="date-div">
              <label for="date" class="form-label">التاريخ</label>
              <!--<input type="datetime" class="form-control" placeholder="<?php echo date('d-m-y H:i:s'); ?>" id="date" name="date">-->
              <!--<input type="date" class="form-control" placeholder="dd-mm-yyyy" id="date" name="date">-->
              <input type="date" class="form-control" id="date" name="date" value="<?php echo date('Y-m-d') ?>">
              <script>
                var d = new Date();
                var month = d.getMonth()+1;
                var day = d.getDate();
                var output = d.getFullYear() + '-' +
                    ((''+month).length<2 ? '0' : '') + month + '-' +
                    ((''+day).length<2 ? '0' : '') + day;
                // alert(output);
              </script>
            </div>
          </div><br>

          <div class="row" id="third-div">
            <div class="col-md-2">
              <label for="payments" class="form-label">الدفعات</label>
              <input type="text" class="form-control" name="payments" value="0" id="payments" placeholder="الدفعات">
            </div>
            <div class="col-md-2">
              <label for="salary" class="form-label">الرواتب</label>
              <input type="text" class="form-control" name="salary" value="0" id="salary" placeholder="الراتب">
            </div>
            <div class="col-md-2">
              <label for="discounts" class="form-label">الخصومات</label>
              <input type="text" class="form-control" name="discounts" value="0" placeholder="الخصومات">
            </div>
            <div class="col" id="service-dive">
              <label for="service_type" class="form-label">نوع الخدمة</label>
              <textarea name="service_type" class="form-control" placeholder="نوع الخدمة" cols="40" rows="3"></textarea>
            </div>
            <div class="col-md-2" id="service-dive">
              <label for="service_value" class="form-label">قيمة الخدمة</label>
              <input type="text" class="form-control" name="service_value" value="0" placeholder="Service Value">
            </div>
          </div><br>

          <div>
            <button type="submit" class="btn btn-success" name="submit">حفظ</button>
            <a href="view_exchange_drivers.php" class="btn btn-danger">إلغاء</a>
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