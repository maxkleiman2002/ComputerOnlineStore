<?php
    ini_set('display_errors', 'Off');
    session_start();
    require_once 'vendor/signin.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Доставка</title>
    <link rel="stylesheet" href="delivery2.css">
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
            <li><a href="contacts.php">Контакти</a></li>
            <?php
            if($_SESSION['user']) {

                echo ' <li ><a href = "vendor/logout.php" ><button class="auth_but" > Вихід</button ></a ></li >';

            }
            else{
                echo ' <li ><a href = "authorization.php" ><button class="auth_but" > Вхід</button ></a ></li >';
            }
            ?>
            <li><a href="cart/cart_page.php" id="#get-cart"><img src="cart.svg"></a></li>

            <li><div class="count-cart">
                    <span class="mini-count"> <?=$_SESSION['cart.qty'] ?? 0 ?></span>
                </div>
            </li>
        </ul>
    </nav>
</header>
<div class="main">

<div class="text">
    <span class="det"><p>Доставка</p></span>
        <br>
     <p>
        Ми доставляємо: <br><br>
        - в магазини партнерів Computer Flagman - найкращий<br>
        швидкий та вигідний спосіб ;<br>
        - кур'єрська доставка Чернівцями - можлива у <br>
        день замовлення;<br>
        - у відділення “Нова Пошта” - на протязі 2-5 днів<br>
        кур'єрською доставкой по Україні - у будь-який населений пункт ;<br><br>

        Вартість та спосіб доставки вказаний на сторінці товару та при замовленні.

    </p>


</div>

<div class="im">
    <p><img src="car.png"></p>
</div>




    <div class="sposob">
        <div class="icc"><p>Спосіб доставки</p></div>
        <div class="icon1">
            <p><img src="icon1.png"></p>
            <p>Магазини<br> партнерів<br> Computer<br> Flagman</p>
        </div>
        <div class="icon2">
            <p><img src="icon2.png"></p>
            <p>Відділення<br> “Нової<br> Пошти”</p>

        </div>
        <div class="icon3">
            <p><img src="icon3.png"> </p>
            <p>Кур'єрська<br> доставка по<br> Україні</p>
        </div>
        <div class="icon4">
            <p><img src="icon4.png"></p>
            <p>Кур'єрська<br> доставка по<br> Чернівцям</p>

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