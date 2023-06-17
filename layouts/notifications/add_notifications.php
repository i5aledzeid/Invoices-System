<?php
    include "../../db_conn.php";
    session_start();
    
    $sql = "SELECT * FROM `user`";
    if ($result=mysqli_query($conn, $sql)) {
        $user = mysqli_num_rows($result);
        // echo $user;
    }
    
    if (isset($_POST['notification'])) {
        $title = $_POST['title'];
        $subtitle = $_POST['subtitle'];
        $date = date('y-m-d h:m:s');
        $type = $_POST['type'];
        $name = $_SESSION['name'];
        
        for ($i = 1; $i <= $user; $i++) {
            $sql = mysqli_query($conn, "INSERT INTO notifications(title, subtitle, date, type, created_by, seen) VALUES('$title', '$subtitle', '$date', '$type', '$name', '$i')");
        }
        if ($sql) {
            echo '
                <script>alert("Success!");</script>
            ';
        }
        else {
            echo mysqli_error($conn);
            exit;
        }
    }
    
    // $exe = mysqli_query($conn, $sql);
    // header("Location: noti_array.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <!-- font awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!--<link rel="icon" type="image/x-icon" href="/assets/icons/bell_message_notification_icon.ico">-->
    <link rel="icon" type="image/x-icon" href="/assets/icons/alarm_alert_bell_notification_icon.ico">
    <title>Notifications</title>
    <style>
        * {
            direction: rtl;
        }

        #center {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
        }
    </style>
</head>
<body>
    <div class="container" id="center">
        <div class="row">
            <div class="col-sm-4"></div>
            <div class="col-sm-4">
                <form action="" method="post">
                    <div class="form-group">
                        <label for="title">العنوان</label>
                        <input type="text" name="title" class="form-control" placeholder="Title">
                    </div><br>
                    <div class="form-group">
                        <label for="type">نوع الإشعار</label>
                        <!--<input type="text" name="status" class="form-control" placeholder="Status">-->
                        <select class="form-select" aria-label="Default select example" name="type">
                            <option selected>إختر نوع الإشعار</option>
                            <option value="1">إشعار للعامة</option>
                            <option value="2">إشعار تحذيري</option>
                            <option value="3">إشعار تنبيه</option>
                        </select>
                    </div><br>
                    <div class="form-group">
                        <label for="subtitle">النص بالكامل</label>
                        <textarea type="text" name="subtitle" class="form-control" placeholder="Subtitle" row="3"></textarea>
                    </div><br>
                    <button type="submit" name="notification" class="btn btn-primary">Submit</button>
                    <a href="../../admin/admin_panel.php" type="button" name="notification" class="btn btn-danger">Cancel</a>
                </form>
            </div>
        </div>
    </div>
</body>
</html>