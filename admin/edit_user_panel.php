<?php 
// session_start();
// if (isset($_SESSION['id']) && isset($_SESSION['user_name'])) {
include "../db_conn.php";
// require_once('db_conn.php');.
//////////////// ROLE ///////////////
  session_start();
  /*if (isset($_SESSION['role']) && $_SESSION['role'] != 1 && $_SESSION['role'] != 3) {
    header('location: home.php');
    die();
  }*/
 //////////////// ROLE ///////////////
?>
<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" type="text/css" href="../assets/css/style-workss.css">
    <!-- bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <!-- font awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <?php include "../functions/remove_branding.php"; ?>
    <link rel="icon" type="image/x-icon" href="../assets/icons/admin_google_security_settings_icon.ico">
	<title>Edit Panel</title>
</head>
<body>
    <div class="tab-container">
        <div class="title">
            <!-- Tooltip -->
            <a href="../home.php" class="hint-link" style="text-decoration: none;" placeholder="dddddd">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-gear" viewBox="0 0 16 16">
                    <path d="M11 5a3 3 0 1 1-6 0 3 3 0 0 1 6 0ZM8 7a2 2 0 1 0 0-4 2 2 0 0 0 0 4Zm.256 7a4.474 4.474 0 0 1-.229-1.004H3c.001-.246.154-.986.832-1.664C4.484 10.68 5.711 10 8 10c.26 0 .507.009.74.025.226-.341.496-.65.804-.918C9.077 9.038 8.564 9 8 9c-5 0-6 3-6 4s1 1 1 1h5.256Zm3.63-4.54c.18-.613 1.048-.613 1.229 0l.043.148a.64.64 0 0 0 .921.382l.136-.074c.561-.306 1.175.308.87.869l-.075.136a.64.64 0 0 0 .382.92l.149.045c.612.18.612 1.048 0 1.229l-.15.043a.64.64 0 0 0-.38.921l.074.136c.305.561-.309 1.175-.87.87l-.136-.075a.64.64 0 0 0-.92.382l-.045.149c-.18.612-1.048.612-1.229 0l-.043-.15a.64.64 0 0 0-.921-.38l-.136.074c-.561.305-1.175-.309-.87-.87l.075-.136a.64.64 0 0 0-.382-.92l-.148-.045c-.613-.18-.613-1.048 0-1.229l.148-.043a.64.64 0 0 0 .382-.921l-.074-.136c-.306-.561.308-1.175.869-.87l.136.075a.64.64 0 0 0 .92-.382l.045-.148ZM14 12.5a1.5 1.5 0 1 0-3 0 1.5 1.5 0 0 0 3 0Z"/>
                </svg>
                <span id="tooltip">العودة للصفحة الرئيسية</span>
                <script>
                    var spanText = document.getElementById('tooltip');
                    window.onmousemove = function(e) {
                        var x = e.clientX,
                            y = e.clientY;
                        spanText.style.top = (y + 20) + 'px';
                        spanText.style.left = (x + 20) + 'px';
                    }
                </script>
            </a>
            تعديل المستخدم 
            <?php
                $id = $_POST['id'];
                echo '(' . $id . ')';
            ?>
        </div>
        <!--<div class="tab-box">
            <button class="tab-button active">المستخدمين</button>
            <div class="line"></div>
        </div>-->
        <div class="content-box">
            <div class="content active">
                <!-- <h2>المستخدمين</h2> -->
                    <div class="row">
                        <div class="col-md-12">
                            <!-- <div class="card-header"><h4>تعديل المستخدم</h4></div> -->
                            <div class="card-body">
                            <?php
                                if (isset($_POST['id'])) {
                                    // echo $id;
                                    $users = "SELECT * FROM user WHERE id='$id'";
                                    $query_run = mysqli_query($conn, $users);
                                    if (mysqli_num_rows($query_run) > 0) {
                                        foreach ($query_run as $user) { ?>
                                            <form action="update_user.php" method="POST">
                                                <input type="hidden" name="user_id" value="<?php echo $user['id']; ?>">
                                                <div class="row">
                                                    <div class="col">
                                                        <div class="row">
                                                            <div class="col">
                                                                <label for="name">الإسم الأول</label>
                                                                <input type="text" name="name" value="<?php echo $user['name']; ?>" class="form-control">
                                                            </div>
                                                            <div class="col">
                                                                <label for="middle">الإسم الأوسط</label>
                                                                <input type="text" name="middle" value="<?php echo $user['middle']; ?>" class="form-control">
                                                            </div>
                                                            <div class="col">
                                                                <label for="last">الإسم الأخير</label>
                                                                <input type="text" name="last" value="<?php echo $user['last']; ?>" class="form-control">
                                                            </div>
                                                        </div><br>
                                                        <div class="row">
                                                            <div class="col">
                                                                <label for="user_name">إسم المستخدم</label>
                                                                <input type="text" name="user_name" value="<?php echo $user['user_name']; ?>" class="form-control">
                                                            </div>
                                                            <div class="col">
                                                                <label for="role">الصلاحية</label>
                                                                <select name="role" required disabled class="form-control">
                                                                    <option value="">--إختر الصلاحية--</option>
                                                                    <option value="1" <?php echo $user['role'] == '1' ? 'selected':''; ?>>المسؤول</option>
                                                                    <option value="2" <?php echo $user['role'] == '2' ? 'selected':''; ?>>المستخدم</option>
                                                                    <option value="3" <?php echo $user['role'] == '3' ? 'selected':''; ?>>المالك</option>
                                                                </select>
                                                            </div>
                                                            <div class="col">
                                                                <label for="password">كلمة المرور</label>
                                                                <input type="text" name="password" value="<?php echo $user['password']; ?>" class="form-control">
                                                            </div>
                                                        </div>
                                                        <!--<div class="col-md-6 mb-3"></div>-->
                                                    </div>
                                                    <div class="col-3">
                                                        <img src="<?php echo $user['image']; ?>" alt="image" style="width: 128px;">
                                                    </div>
                                                </div><br>
                                                <div class="row">
                                                    <div class="col">
                                                        <label for="image">رابط الصورة</label>
                                                        <input style="direction: ltr; text-align: left; background-color: #D1E7DD;" type="text" name="image" value="<?php echo $user['image']; ?>" class="form-control">
                                                    </div>
                                                </div><br>
                                                <div class="col-md-12 mb-3">
                                                    <button type="submit" name="update_user" class="btn btn-primary">تحديث</button>
                                                </div>
                                            </form>         
                                        <?php
                                        }
                                    }
                                    else {
                                        echo '
                                            <h4>لا يوجد مستخدم كما طلبت في قاعدة البيانات</h4>
                                        ';
                                    }
                                }
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <a href="#"></a>
    </div>
    
    <script>
        const tabs = document.querySelectorAll('.tab-button');
        const all_content = document.querySelectorAll('.content');
        tabs.forEach((tab, index) => {
            tab.addEventListener('click', (e) => {
                tabs.forEach(tab => {tab.classList.remove('active')});
                tab.classList.add('active');
                var line = document.querySelector('.line');
                line.style.width = e.target.offsetWidth + "px";
                line.style.left = e.target.offsetLeft + "px";
                // line.style.right = e.target.offsetRight + "px";
                all_content.forEach(content => {content.classList.remove('active')});
                all_content[index].classList.add('active');
            });
        });
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>

</body>
</html>

<?php 
/*}else{
     header("Location: index.php");
     exit();
}*/
 ?>