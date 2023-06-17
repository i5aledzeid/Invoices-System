<?php 
// session_start();
// if (isset($_SESSION['id']) && isset($_SESSION['user_name'])) {
include "../../db_conn.php";
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = mysqli_query($conn, "UPDATE notifications SET `status` = 1 WHERE id='$id'");
} 
// require_once('db_conn.php');
 //////////////// ROLE ///////////////
  /*session_start();
  if (isset($_SESSION['role']) && $_SESSION['role'] != 1 && $_SESSION['role'] != 3) {
    header('location: home.php');
    die();
  }*/
  //////////////// ROLE ///////////////
?>
<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" type="text/css" href="../../assets/css/style-workss.css">
    <!-- bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <!-- font awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="icon" type="image/x-icon" href="../../assets/icons/admin_google_security_settings_icon.ico">
	<title>User Panel</title>
</head>
<body>
    <div class="tab-container">
        <div class="title">
            <!-- Tooltip -->
            <a href="../../home.php" class="hint-link" style="text-decoration: none;" placeholder="dddddd">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-bell-fill" viewBox="0 0 16 16">
                    <path d="M8 16a2 2 0 0 0 2-2H6a2 2 0 0 0 2 2zm.995-14.901a1 1 0 1 0-1.99 0A5.002 5.002 0 0 0 3 6c0 1.098-.5 6-2 7h14c-1.5-1-2-5.902-2-7 0-2.42-1.72-4.44-4.005-4.901z"/>
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
            الإشعارات
            <?php echo '(' . $id . ')'; ?>
        </div>
       
        <div class="content-box">
            <div class="content active">
                <?php
                    $i = 1;
                    $get_sql = mysqli_query($conn, "SELECT * FROM notifications WHERE status = 1");
                    while ($result = mysqli_fetch_assoc($get_sql)) :?>
                        <h2>#<?php echo ' ' . $result['title'] . '(' . $i++ . ')' ?></h2>
                        <h4><?php echo $result['subtitle'] ?></h4>
                        <h6><?php echo $result['date']; ?></h6><br>
                <?php endwhile ?>
            </div>
        </div>
        <a href="read_notifications.php">
            رؤية التفاصيل
        </a>
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