<?php
ini_set('display_errors', 'Off');
session_start();
require_once 'vendor/signin.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Контакти</title>
    <link rel="stylesheet" href="contacts1.css">
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
    <div class="block1">
        <div class="text">
        <p class="text-call"> Дзвони <br>цілодобово. </p>
        <br>
        <p class="text">КОНТАКТ-ЦЕНТР</p><br>
        <p class="text-call">0800 190 2723</p>
       <br> <p class="text">
            Всі дзвінки зі стаціонарних та мобільних телефонів<br>
            в межах України безкоштовні.
        </p>
        </div>
        <div class="img">
            <p><img src="call247.png"/> </p>
        </div>
    </div>



    <div class="block2">
        <p class="big-text">Пиши по будь-якому питанню</p>
        <div class="question">
        <p class="text1">Що цікавить ?</p>
            <p class="text2">Загальні питання</p>
            <p class="text2">Адреса</p>
            <p class="text2">Повернення товару</p>
            <p class="text2">Якість обслуговування</p>
        </div>

        <div class="answers">
            <p class="text1">Куди писати ?</p>
            <p><a href="https://www.google.com/intl/uk/gmail/about/">maxkleiman2002@gmail.com</a></p>
            <p><a href="">Героїв Майдану, 69</a></p>
            <p><a href="https://www.google.com/intl/uk/gmail/about/">maxkleiman2002@gmail.com</a></p>
            <p><a href="https://www.google.com/intl/uk/gmail/about/">maxkleiman2002@gmail.com</a></p>
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
        <a href=""> <p>Про компанію</p></a>
        <a href=""> <p>Стати партнером</p></a>
        <a href=""><p>Робота у Computer Flagman</p></a>
        <a href=""> <p>Правова інформація</p></a>
    </div>
    <div class="info-for-seller">
        <p><span>ПОКУПЦЮ</span></p>
        <p><a href="">Доставка та оплата</a></p>
        <p><a href="">Обмін та повернення товару</a></p>
        <p><a href="">Гарантія</a></p>
        <p><a href="">Задайте питання</a></p>
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