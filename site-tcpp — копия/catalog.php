<?php
    require_once 'vendor/signin.php';
    session_start();
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name = "viewport" content="width=device-width, initial-scale = 1.0">
    <meta http-equiv="X-UA-Compatible" content="ie-edge">
    <title>Каталог</title>
    <link rel="stylesheet" href="catalog.css">
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
            <li><a href="main_screen.php">Головна</a></li>
            <li><a href="delivety.php">Доставка</a></li>
            <li><a href="payment.php">Оплата</a></li>
            <!--<li><a href="about_shop.php">Про магазин</a></li> -->

            <li><a href="contacts.php">Контакти</a></li>
            <?php
            if($_SESSION['user']) {

               echo ' <li ><a href = "vendor/logout.php" ><button class="auth_but" > Вихід</button ></a ></li >';

            }
            else{
                echo ' <li ><a href = "authorization.php" ><button class="auth_but" > Вхід</button ></a ></li >';
            }
            ?>
            <li><a href="cart/cart_page.php" id="#get-cart"><img src="../cart.svg"></a></li>

            <li><div class="count-cart">
                    <span class="mini-count"> <?=$_SESSION['cart.qty'] ?? 0 ?></span>
                </div>
            </li>
        </ul>
    </nav>
</header>
<div class="clear"></div>
<div class="main">
<div class=".nav2">
    <ul class="f2">
        <li><a href="computerAndNote.php">Комп'ютери та ноутбуки</a> </li>
        <li><a href="phonetb.php">Смартфони, ТБ, електроніка</a> </li>
        <li><a href="ComputerComponent.php"> Комп'ютерні комплектуючі</a></li>
        <li><a href="ForGamers.php">Товари для геймерів</a> </li>
    </ul>
</div>
    <div class="im">
        <p><img src="sale2.jpg"></p>
    </div>
<div class="clear"></div>
<div class="tt">
    <p>Популярні розділи</p>
    <div class="popular">
        <p><a href="phonetb.php"><img src="bannerru_184_1599644713.jpeg"></a></p>

        <p><a href="computerAndNote.php"><img src="bannerru_185_1599644832.jpeg"></a></p>

        <p><a href = ""><img src="bannerru_186_1599645561.jpeg"></a></p>


    </div>
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
        <a href="about_shop.php"> <p>Про компанію</p></a>
        <a href=""> <p>Стати партнером</p></a>
        <a href=""><p>Робота у Computer Flagman</p></a>
        <a href=""> <p>Правова інформація</p></a>
    </div>
    <div class="info-for-seller">
        <p><span>ПОКУПЦЮ</span></p>
        <p><a href="delivety.php">Доставка та оплата</a></p>
        <p><a href="">Обмін та повернення товару</a></p>
        <p><a href="">Гарантія</a></p>
        <p><a href="question.php">Задайте питання</a></p>
    </div>
    <div class="contacts">
        <p>
            <span>Контактні данні: </span><br>
            <img src="icons/phone.png" alt="phone" /> <span class="icon">+38 068 190 2723</span><br>
            <img src="icons/message_icon.png" alt="email" /> <span class="icon">maxkleiman2002@gmail.com</span>
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