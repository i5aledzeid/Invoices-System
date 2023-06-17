<?php 
session_start();

if (isset($_SESSION['id']) && isset($_SESSION['user_name'])) {

 ?>
<!DOCTYPE html>
<html>
<head>
	<title>عنا</title>
	<!--<link rel="stylesheet" type="text/css" href="style.css">-->
     <link rel="stylesheet" type="text/css" href="../../assets/css/style-about.css">
     <style>
          .par {
               direction: rtl;
          }
          
          .qr img {
               position: absolute;
               width: 120px;
               top: 200px;
               left: 100px;
          }

          .qr a {
               position: absolute;
               text-decoration: none;
               color: white;
               top: 170px;
               left: 100px;
          }

          .rq img {
               position: absolute;
               width: 120px;
               top: 200px;
               right: 100px;
          }

          .rq a {
               position: absolute;
               text-decoration: none;
               color: white;
               top: 170px;
               right: 100px;
          }

        .banner {
            background-image: linear-gradient(rgba(0, 0, 0, 0.75), rgba(0, 0, 0, 0.75)), url("../../assets/images/wallpapers/about-us-wallpaper.jfif");
        }
    </style>
</head>
<body>
     <div class="banner">
          <div class="navbar">
                <img src="../../assets/images/favicon6.ico" alt="logo" class="logo">
                <a class="title" hidden>مؤسسة ماجد خالد الحماد</a>
                <ul>
                    <li><a href="../../home.php">الرئيسية</a></li>
                </ul>
          </div>
          <div class="qr">
               <a href="https://appsgeyser.io/17178668/%D9%85%D8%A4%D8%B3%D8%B3%D8%A9-%D9%85%D8%A7%D8%AC%D8%AF-%D8%AE%D8%A7%D9%84%D8%AF-%D8%A7%D9%84%D8%AD%D9%85%D8%A7%D8%AF?_ga=2.93452376.433303097.1685952985-882929533.1685952973">متوفر على أجهزة أندرويد</a>
               <img src="../../assets/images/chart.png" alt="">
          </div>

          <div class="rq">
               <a href="https://appsgeyser.io/17178798/%D9%85%D9%88%D8%B3%D8%B3%D8%A9-%D9%85%D8%A7%D8%AC%D8%AF-%D8%AE%D8%A7%D9%84%D8%AF-%D8%A7%D9%84%D8%AD%D9%85%D8%A7%D8%AF">متوفر على أجهزة أندرويد</a>
               <img src="../../assets/images/chart.png" alt="">
          </div>
          <div class="content">
               <h1>عنا</h1>
               <p class="par">
               تأسست شركة MKH Transportation Corporation في 1 يناير 2023 ، بعد ... ، وهي تدير حاليًا خط نقل السلي وخط نقل الشرقية <br><br>في المملكة العربية السعودية ، الرياض ، بالإضافة إلى ذلك.
               المؤسسة محكومة من قبل من يشغلون مناصب بيروقراطية. مع نظامها المنظم بموجب المادة<br><br> 2 من قانون إنفاذ أعمال نقل السيارات. وهي مسؤولة عن جميع العمليات المتعلقة ببناء وتماسك نظام النقل. 
               يقود الشركة الرئيس ، الذي يشرف على قسمين<br><br> (التدقيق والسلامة والإدارة) وأربعة مقار التخطيط ، والإدارة ، والعمليات العامة ، والبناء.
               </p>
               <button type="button"><span></span><a class="link" href="https://submit.jotform.com/231614537893463">تواصل الآن</a></button>
          </div>
     </div>
</body>
</html>

<?php 
}else{
     header("Location: index.php");
     exit();
}
 ?>