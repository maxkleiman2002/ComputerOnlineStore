<?php
session_start();
if(!$_SESSION['user']){
    header("Location: ../authorization.php");
}
require_once '../inc/funcs.php';

$dbHost = "localhost";
$dbXeHost="localhost/XE";
$dbUsername="root";
$dbPassword = "";

$con = mysqli_connect($dbHost, $dbUsername, $dbPassword);
if (!$con){
    exit('Connect Error (' . mysqli_connect_errno() . ') '
        . mysqli_connect_error());
}
mysqli_set_charset($con, 'utf-8');

mysqli_select_db($con, "compshop");
$email = $_SESSION['user']['email'];
$result = mysqli_query($con,"SELECT * FROM orders WHERE email = '$email'");


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta name = "viewport" content="width=device-width, initial-scale = 1.0">
    <meta http-equiv="X-UA-Compatible" content="ie-edge">
    <meta charset="utf-8">
    <title>Авторизація</title>
    <link rel="stylesheet" href="profile_goods2.css">
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

            <li class="icon_profile">
                <a href="profile_main.php"><img src="../icons/user.png" alt="user" ></a>
            </li>
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
                    <a href="profile_main.php">
                        <span class="name-about"> <?=$_SESSION['user']['name'] ?> <?=$_SESSION['user']['patronymic'] ?></span> <br>
                        <span class="email-about"><?=$_SESSION['user']['email'] ?></span>
                    </a> </li>
                <li class="orders"><img src="../icons/orders.png" alt="orders"> <a href="ordered_goods.php">Мої замовлення</a></li>
                <li class="wallet"><img src="../icons/wallet.png" alt="wallet"><a href="wallet_profile.php">Мій гаманець</a></li>
                <li class="comment"><img src="../icons/comments.png" alt="comments"><a href="comment_profile.php">Мої відгуки</a></li>
                <li class="tracking"><img src="../icons/tracking.png" alt="tracking"><a href="track_profile.php">Відслідкувати товар</a></li>
            </ul>
        </nav>
    </div>

    <div class="content">
        <h1>Мої замовлення</h1>
        <table>
            <tr>


                <th style="font-size: 16px;">Ім'я</th>
                <th style="font-size: 16px;">Прізвище</th>
                <th style="font-size: 16px;">По батькові</th>
                <th style="font-size: 16px;">Номер<br> телефону</th>
                <th style="font-size: 16px;">Місто</th>
                <th style="font-size: 16px;">Відділення НП</th>
                <th style="font-size: 16px;">Дата<br>замовлення</th>
                <th style="font-size: 16px;">Загальна ціна</th>

            </tr>
            <?php foreach ($result as $elem):?>
            <tr>

                <td><?=$elem['name'] ?></td>
                <td><?=$elem['surname'] ?></td>
                <td><?=$elem['patronymic'] ?></td>
                <td><?=$elem['number'] ?></td>
                <td><?=$elem['city'] ?></td>
                <td><?=$elem['post'] ?></td>
                <td><?=$elem['date'] ?></td>
                <td><?=$elem['paid_amount'] ?></td>
            </tr>
            <?php endforeach; ?>
        </table>

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