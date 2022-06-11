<?php
session_start();
if(!$_SESSION['user']){
    header("Location: ../authorization.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta name = "viewport" content="width=device-width, initial-scale = 1.0">
    <meta http-equiv="X-UA-Compatible" content="ie-edge">
    <meta charset="utf-8">
    <title>Авторизація</title>
    <link rel="stylesheet" href="profile_main1.css">
</head>
<body>

<header>
    <div class="logo">
        <div class="elips_logo">
            <p>CF</p>
        </div>
        <div class="logo-text">
            <p>
                Computer<br>
                Flagman
            </p>
        </div>
    </div>

    <nav>
        <ul class="f1">
            <li><a href="../main_screen.php">Головна</a></li>
            <li><a href="../delivety.php">Доставка</a></li>
            <li><a href="../payment.php">Оплата</a></li>
            <li><a href="../contacts.php">Контакти</a></li>
            <li><a href="../vendor/logout.php"><button class="auth_but">Вихід</button></a></li>

            <li><a href="../cart/cart_page.php" id="#get-cart"><img src="../cart.svg"></a></li>

            <li><div class="count-cart">
                    <span class="mini-count"> <?=$_SESSION['cart.qty'] ?? 0 ?></span>
                </div>
            </li>
        </ul>
    </nav>
</header>

<div class="main">
<div class="sidebar">
    <nav>
        <ul>
           </span>  <li class="info_about"><img src="../icons/profile2.png" alt="profile">
                <a href="">
                    <span class="name-about"> <?=$_SESSION['user']['name'] ?> <?=$_SESSION['user']['patronymic'] ?></span> <br>
                    <span class="email-about"><?=$_SESSION['user']['email'] ?></span>
                </a> </li>
            <li class="orders"><img src="../icons/orders.png" alt="orders"> <a href="">Мої замовлення</a></li>
            <li class="wallet"><img src="../icons/wallet.png" alt="wallet"><a href="">Мій гаманець</a></li>
            <li class="comment"><img src="../icons/comments.png" alt="comments"><a href="">Мої відгуки</a></li>
            <li class="tracking"><img src="../icons/tracking.png" alt="tracking"><a href="">Відслідкувати товар</a></li>
        </ul>
    </nav>
</div>

    <div class="content">
        <h1>Особисті дані</h1>
    </div>
</div>

<footer>

    <div class="logo-wrapper">
        <div class="footer-logo">
            <span>CF</span>
        </div>
        <div class="footer-logo-text">
            <p>Computer Flagman</p>
        </div>
    </div>

    <div class="about-shop">
        <p> <span>COMPUTER FLAGMAN</span></p>
        <a href="../about_shop.php"> <p>Про компанію</p></a>
        <a href=""> <p>Стати партнером</p></a>
        <a href=""><p>Робота у Computer Flagman</p></a>
        <a href=""> <p>Правова інформація</p></a>
    </div>
    <div class="info-for-seller">
        <p><span>ПОКУПЦЮ</span></p>
        <p><a href="../delivety.php">Доставка та оплата</a></p>
        <p><a href="">Обмін та повернення товару</a></p>
        <p><a href="">Гарантія</a></p>
        <p><a href="../question.php">Задайте питання</a></p>
    </div>
    <div class="contacts">
        <p>
            <span>Контактні данні: </span><br>
            <img src="../icons/phone.png" alt="phone" /> <span class="icon">+38 068 190 2723</span><br>
            <img src="../icons/message_icon.png" alt="email" /> <span class="icon">maxkleiman2002@gmail.com</span>
        </p>
        <br/>
        <p>
            <span> Графік роботи call-центру</span><br>
            Цілодобово
        </p>
        <br/>
        <p>
            <span>Адреса:</span><br>
            м.Чернівці, вул. Героїв Майдану, 69
        </p>
    </div>

</footer>

</body>
</html>