<h1>403</h1>
<div><p>
    > <span>خطا بالكود</span>: "<i>HTTP 403 Forbidden</i>"</p>
    <p>> <span>وصف الخطأ</span>: "<i>تم الرفض. ليس لديك إذن للوصول إلى هذه الصفحة في هذه الخدمة</i>"</p>
    <p>> <span>ربما يكون سبب الخطأ</span>: [
        <b>تنفيذ الوصول محظور ، الوصول للقراءة ممنوع ، الوصول للكتابة ممنوع ، مطلوب SSL ، SSL 128 مطلوب ، عنوان IP مرفوض ، شهادة العميل مطلوبة ، الوصول إلى الموقع مرفوض ، عدد كبير جدًا من المستخدمين ، تكوين غير صالح ، تغيير كلمة المرور ، رفض مصمم الخرائط الوصول ، شهادة العميل تم إبطالها ، الدليل تم رفض القائمة ، تجاوز تراخيص وصول العميل ، شهادة العميل غير موثوقة أو غير صالحة ، انتهت صلاحية شهادة العميل أو لم تعد صالحة بعد ، فشل تسجيل الدخول إلى جواز السفر ، رفض الوصول إلى المصدر ، تم رفض العمق اللانهائي ، العديد من الطلبات من نفس عنوان IP للعميل</b>
        ...]</p>
    <p>> <span>
        بعض الصفحات الموجودة على هذا الخادم والتي لديك إذن بالوصول إليها</span>
        : [<a href="/">الصفحة الرئيسية</a>, <a href="/">حول</a>, <a href="/">اتصل بنا</a>, <a href="/layouts/chats/login.php">محادثة</a>...]</p><p>> <span>استمتع بيوم لطيف سيدي هريدو :-)</span></p>
    </div>
    
    <a class="avatar" href="https://github.com/i5aledzeid" title="إذا أعجبك هذا القلم ، فلا تنسى المشاركة والمتابعة ❤">
        <img src="https://raw.githubusercontent.com/i5aledzeid/php/master/assets/images/admin/i5aledzeid.jpg"/>
    </a>

<style>
    @import url("https://fonts.googleapis.com/css?family=Share+Tech+Mono|Montserrat:700");

* {
    margin: 0;
    padding: 0;
    border: 0;
    font-size: 100%;
    font: inherit;
    vertical-align: baseline;
    box-sizing: border-box;
    color: inherit;
    direction: rtl;
}

body {
    background-image: linear-gradient(120deg, #4f0088 0%, #000000 100%);
    height: 100vh;
}

h1 {
    font-size: 45vw;
    text-align: center;
    position: fixed;
    width: 100vw;
    z-index: 1;
    color: #ffffff26;
    text-shadow: 0 0 50px rgba(0, 0, 0, 0.07);
    top: 50%;
    transform: translateY(-50%);
    font-family: "Montserrat", monospace;
}

div {
    background: rgba(0, 0, 0, 0);
    width: 70vw;
    position: relative;
    top: 50%;
    transform: translateY(-50%);
    margin: 0 auto;
    padding: 30px 30px 10px;
    box-shadow: 0 0 150px -20px rgba(0, 0, 0, 0.5);
    z-index: 3;
}

P {
    font-family: "Share Tech Mono", monospace;
    color: #f5f5f5;
    margin: 0 0 20px;
    font-size: 17px;
    line-height: 1.2;
}

span {
    color: #f0c674;
}

i {
    color: #8abeb7;
}

div a {
    text-decoration: none;
}

b {
    color: #81a2be;
}

a.avatar {
    position: fixed;
    bottom: 15px;
    right: -100px;
    animation: slide 0.5s 4.5s forwards;
    display: block;
    z-index: 4
}

a.avatar img {
    border-radius: 100%;
    width: 44px;
    border: 2px solid white;
}

@keyframes slide {
    from {
        right: -100px;
        transform: rotate(360deg);
        opacity: 0;
    }
    to {
        right: 15px;
        transform: rotate(0deg);
        opacity: 1;
    }
}
</style>

<script>
    var str = document.getElementsByTagName('div')[0].innerHTML.toString();
    var i = 0;
    document.getElementsByTagName('div')[0].innerHTML = "";
    
    setTimeout(function() {
        var se = setInterval(function() {
            i++;
            document.getElementsByTagName('div')[0].innerHTML = str.slice(0, i) + "|";
            if (i == str.length) {
                clearInterval(se);
                document.getElementsByTagName('div')[0].innerHTML = str;
            }
        }, 10);
    },0);
</script>