<?php
    include 'db_conn.php';
    session_start();
?>
<!DOCTYPE html>
<html>
    <head>
    	<title>مؤسسة ماجد خالد الحماد</title>
    	<!--<link rel="stylesheet" type="text/css" href="style.css">-->
        <link rel="stylesheet" type="text/css" href="assets/css/style-homes.css">
        <link rel="icon" type="image/x-icon" href="assets/images/favicon6.ico">
    </head>
    <?php include "functions/remove_branding.php"; ?>
<body>
    <div class="banner">
        <div class="navbar">
            <img src="assets/images/favicon6.ico" alt="logo" class="logo">
                <ul>
                    <?php 
                        // if user login
                        if (isset($_SESSION['user_name'])) { 
                            echo '
                                <li><a href="logout.php">تسجيل خروج</a>
                                    <svg style="color: white;" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-x-lg" viewBox="0 0 16 16">
                                        <path d="M2.146 2.854a.5.5 0 1 1 .708-.708L8 7.293l5.146-5.147a.5.5 0 0 1 .708.708L8.707 8l5.147 5.146a.5.5 0 0 1-.708.708L8 8.707l-5.146 5.147a.5.5 0 0 1-.708-.708L7.293 8 2.146 2.854Z"/>
                                    </svg>
                                </li>
                                <li><a href="layouts/account.php">الحساب</a>
                                    <svg style="color: white;" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person" viewBox="0 0 16 16">
                                          <path d="M8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6Zm2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0Zm4 8c0 1-1 1-1 1H3s-1 0-1-1 1-4 6-4 6 3 6 4Zm-1-.004c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 10c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664h10Z"/>
                                    </svg>
                                    <div class="sub-menu">
                                        <ul>
                                            <li><a href="layouts/account.php">عرض الحساب</a></li>
                                            <li><a href="logout.php">تسجيل خروج</a></li>
                                            <li><a href="#">تعديل الحساب</a></li>
                                         </ul>
                                    </div>
                                </li>
                                <li><a href="home.php">الرئيسية</a></li>
                            ';
                        }
                        // if user logout
                        else {
                            echo '
                                <li><a href="signup.php">إنشاء حساب جديد</a>
                                    <svg style="color: white;" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person" viewBox="0 0 16 16">
                                        <path d="M8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6Zm2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0Zm4 8c0 1-1 1-1 1H3s-1 0-1-1 1-4 6-4 6 3 6 4Zm-1-.004c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 10c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664h10Z"/>
                                    </svg>
                                </li>
                                <li><a href="index6.php">تسجيل دخول</a>
                                    <svg style="color: white;" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person" viewBox="0 0 16 16">
                                        <path d="M8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6Zm2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0Zm4 8c0 1-1 1-1 1H3s-1 0-1-1 1-4 6-4 6 3 6 4Zm-1-.004c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 10c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664h10Z"/>
                                    </svg>
                                </li>
                            ';
                        }
                    ?>
               </ul>
          </div>
          <div class="content">
              <h1>
                  مؤسسة ماجد خالد الحماد
                  <br>
              </h1>
               <p class="par">
               تأسست شركة MKH Transportation Corporation في 1 يناير 2023 ، بعد ... ، وهي تدير حاليًا خط نقل السلي وخط نقل الشرقية <br><br>في المملكة العربية السعودية ، الرياض ، بالإضافة إلى ذلك.
               المؤسسة محكومة من قبل من يشغلون مناصب بيروقراطية. مع نظامها المنظم بموجب المادة<br><br> 2 من قانون إنفاذ أعمال نقل السيارات. وهي مسؤولة عن جميع العمليات المتعلقة ببناء وتماسك نظام النقل. 
               يقود الشركة الرئيس ، الذي يشرف على قسمين<br><br> (التدقيق والسلامة والإدارة) وأربعة مقار التخطيط ، والإدارة ، والعمليات العامة ، والبناء.
               </p>
               <button type="button"><span></span><a class="link" href="#">أعمالنا</a></button>
          </div>
     </div>
</body>
</html>