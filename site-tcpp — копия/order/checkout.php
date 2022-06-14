<?php
session_start();
ini_set('display_errors', 'Off');
require_once '../inc/connect.php';
require_once '../inc/funcs.php';

unset($_SESSION['cart']);
unset($_SESSION['cart.qty']);
unset($_SESSION['cart.sum']);

$dbHost = "localhost";
$dbXeHost="localhost/XE";
$dbUsername="root";
$dbPassword = "";

if($_SERVER["REQUEST_METHOD"] == "POST") {

    if ($_POST["email"] == "") {
        $emailIsEmpty = true;
    }
    $con = mysqli_connect($dbHost, $dbUsername, $dbPassword);
    if (!$con) {
        exit('Connect Error (' . mysqli_connect_errno() . ') '
            . mysqli_connect_error());
    }
    mysqli_set_charset($con, 'utf-8');

    mysqli_select_db($con, "compshop");

    $name = mysqli_real_escape_string($con,$_POST['name']);
    $surname = mysqli_real_escape_string($con,$_POST['surname']);
    $patronymic = mysqli_real_escape_string($con,$_POST['patronymic']);
    $phone = mysqli_real_escape_string($con,$_POST['number']);
    $city = mysqli_real_escape_string($con,$_POST['city']);
    $post = mysqli_real_escape_string($con,$_POST['post']);
    $email = mysqli_real_escape_string($con,$_POST['email']);
    $payment_method = mysqli_real_escape_string($con,$_POST['payment_method']);
    $grand_total = mysqli_real_escape_string($con,$_POST['grand_total']);
    $grand_qty = mysqli_real_escape_string($con,$_POST['total_qty']);
    $date = date('Y/m/d H:i:s');



    mysqli_select_db($con, "compshop");
    mysqli_query($con, "INSERT orders (email, number, post, payment_method, paid_amount,name, surname, patronymic, date,city) 
    VALUES ('" . $email . "', '" . $phone . "','" . $post . "', '" . $payment_method. "','" . $grand_total. "','" . $name . "','" . $surname . "','" . $patronymic. "','" . $date . "','" . $city . "')");

    mysqli_select_db($con, "compshop");
    mysqli_query($con, "INSERT cart (product_name, product_price,  quantity, category)
    VALUES ('" . implode("<br><br>",$_SESSION['cart_title']) . "', '" . implode("<br><br>",$_SESSION['cart_price']) . "', '" . implode("<br><br>" ,$_SESSION['cart_qty']). "','" . implode("<br><br>",$_SESSION['cart_category']) . "')");


    mysqli_select_db($con, "compshop");
     mysqli_query($con, "INSERT ordersdetail (price,quantity)
    VALUES ('" . $_SESSION['total_sum'] . "', '" . $_SESSION['total_qty'] . "')");
    mysqli_close($con);
}



?>





<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name = "viewport" content="width=device-width, initial-scale = 1.0">
    <meta http-equiv="X-UA-Compatible" content="ie-edge">
    <title>Дякую за покупку!</title>
    <link rel="stylesheet" href="checkout.css">

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
            <?php
            if($_SESSION['user']) {

                echo ' <li ><a href = "../vendor/logout.php" ><button class="auth_but" > Вихід</button ></a ></li >';

            }
            else{
                echo ' <li ><a href = "../authorization.php" ><button class="auth_but" > Вхід</button ></a ></li >';
            }
            ?>
            <li><a href="#" id="id-cart"> <img src="../cart.svg"></a></li>

            <li><div class="count-cart">
                    <span class="mini-count"> <?=$_SESSION['cart.qty'] ?? 0 ?></span>
                </div> </li>
        </ul>
    </nav>
</header>





<div class="main">

    <div class="head">
        <hr color="DBDBDC">
        <h1>Дякую за покупку!</h1>
    </div>
    <div class="content">
        <form>
            <div class="wrapper">
            <div class="group">
                <label for="pib">ПІБ: </label>
                <input type="text" name="pib" id="pib" value="<?=$name  ?> <?=$surname  ?>  <?=$patronymic  ?>">
            </div>
            <div class="group">
                <label for="phone">Ваш телефон: </label>
                <input type="text" name="phone" id="phone" value="<?=$phone?>">
            </div>
            <div class="group">
                <label for="city">Місто: </label>
                <input type="text" name="city" id="city" value="<?=$city?>">
            </div>
            <div class="group">
                <label for="post">Відділення НП: </label>
                <input type="text" name="post" id="post" value="<?=$post?>">
            </div>
            <div class="group">
                <label for="email">E-mail: </label>
                <input type="text" name="email" id="email" value="<?=$email?>">
            </div>
            </div>
        </form>
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

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
        <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"></script>
    </footer>
</body>
</html>