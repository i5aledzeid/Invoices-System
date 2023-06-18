<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php include "functions/remove_branding.php"; ?>
    <title>Texts</title>
    <style>
        * {
            padding: 0;
            margin: 0;
            box-sizing: border-box;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        body {
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            background: #252839;
        }

        section {
            position: relative;
            width: 100%;
            height: 100vh;
            overflow: hidden;
            background: #111;
        }

        section::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: linear-gradient(transparent, transparent, #0005, #0004);
            z-index: 10000;
            printer-events: none;
        }

        .scroll {
            width: calc(100% + 400px);
            left: -400px;
            display: flex;
            box-shadow: 0 16px 8px rgba(0, 0, 0, 0.5);
            transform: rotate(calc(var(--d) * 1deg))translateY(calc(var(--y) * 1px));
        }

        .scroll div {
            background: #e9c804;
            color: #1d1104;
            font-size: 3em;
            text-transform: uppercase;
            letter-spacing: 0.2em;
            font-weight: 600;
            white-space: nowrap;
            animation: animate 60s linear infinite;
            animation-delay: -60s;
        }

        .scroll div:nth-child(2) {
            animation: animate2 60s linear infinite;
            animation-delay: -30s;
        }

        @keyframes animate {
            0% {
                transform: translateX(100%);
            }

            100% {
                transform: translateX(-100%);
            }
        }

        @keyframes animate2 {
            0% {
                transform: translateX(0);
            }

            100% {
                transform: translateX(-200%);
            }
        }
    </style>
</head>

<body>
    <section>
        <div class="scroll" style="--d:25;--y:200;">
            <div><span>عذراً ، الموقع مغلق للصيانة حالياً</span></div>
            <div><span>عذراً ، الموقع مغلق للصيانة حالياً</span></div>
            <div><span>عذراً ، الموقع مغلق للصيانة حالياً</span></div>
            <div><span>عذراً ، الموقع مغلق للصيانة حالياً</span></div>
            <div><span>عذراً ، الموقع مغلق للصيانة حالياً</span></div>
            <div><span>عذراً ، الموقع مغلق للصيانة حالياً</span></div>
            <div><span>عذراً ، الموقع مغلق للصيانة حالياً</span></div>
            <div><span>عذراً ، الموقع مغلق للصيانة حالياً</span></div>
            <div><span>عذراً ، الموقع مغلق للصيانة حالياً</span></div>
            <div><span>عذراً ، الموقع مغلق للصيانة حالياً</span></div>
        </div>
        <div class="scroll" style="--d:-25;--y:400;">
            <div><span>The site is currently under maintenance.</span></div>
            <div><span>The site is currently under maintenance.</span></div>
            <div><span>The site is currently under maintenance.</span></div>
            <div><span>The site is currently under maintenance.</span></div>
            <div><span>The site is currently under maintenance.</span></div>
            <div><span>The site is currently under maintenance.</span></div>
            <div><span>The site is currently under maintenance.</span></div>
            <div><span>The site is currently under maintenance.</span></div>
            <div><span>The site is currently under maintenance.</span></div>
            <div><span>The site is currently under maintenance.</span></div>
        </div>
        <div class="scroll" style="--d:15;--y:500;">
            <div><span>現在メンテナンスのためサイトを閉鎖しております。</span></div>
            <div><span>現在メンテナンスのためサイトを閉鎖しております。</span></div>
            <div><span>現在メンテナンスのためサイトを閉鎖しております。</span></div>
            <div><span>現在メンテナンスのためサイトを閉鎖しております。</span></div>
            <div><span>現在メンテナンスのためサイトを閉鎖しております。</span></div>
            <div><span>現在メンテナンスのためサイトを閉鎖しております。</span></div>
            <div><span>現在メンテナンスのためサイトを閉鎖しております。</span></div>
            <div><span>現在メンテナンスのためサイトを閉鎖しております。</span></div>
            <div><span>現在メンテナンスのためサイトを閉鎖しております。</span></div>
            <div><span>現在メンテナンスのためサイトを閉鎖しております。</span></div>
        </div>
        <div class="scroll" style="--d:-5;--y:50;">
            <div><span>De site is momenteel gesloten voor onderhoud.</span></div>
            <div><span>De site is momenteel gesloten voor onderhoud.</span></div>
            <div><span>De site is momenteel gesloten voor onderhoud.</span></div>
            <div><span>De site is momenteel gesloten voor onderhoud.</span></div>
            <div><span>De site is momenteel gesloten voor onderhoud.</span></div>
            <div><span>De site is momenteel gesloten voor onderhoud.</span></div>
            <div><span>De site is momenteel gesloten voor onderhoud.</span></div>
            <div><span>De site is momenteel gesloten voor onderhoud.</span></div>
            <div><span>De site is momenteel gesloten voor onderhoud.</span></div>
            <div><span>De site is momenteel gesloten voor onderhoud.</span></div>
        </div>
        <div class="scroll" style="--d:-15;--y:-350;">
            <div><span>El sitio está actualmente cerrado por mantenimiento.</span></div>
            <div><span>El sitio está actualmente cerrado por mantenimiento.</span></div>
            <div><span>El sitio está actualmente cerrado por mantenimiento.</span></div>
            <div><span>El sitio está actualmente cerrado por mantenimiento.</span></div>
            <div><span>El sitio está actualmente cerrado por mantenimiento.</span></div>
            <div><span>El sitio está actualmente cerrado por mantenimiento.</span></div>
            <div><span>El sitio está actualmente cerrado por mantenimiento.</span></div>
            <div><span>El sitio está actualmente cerrado por mantenimiento.</span></div>
            <div><span>El sitio está actualmente cerrado por mantenimiento.</span></div>
            <div><span>El sitio está actualmente cerrado por mantenimiento.</span></div>
        </div>
    </section>
</body>

</html>