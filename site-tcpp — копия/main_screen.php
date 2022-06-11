<?php
session_start();
    require_once 'vendor/signin.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name = "viewport" content="width=device-width, initial-scale = 1.0">
    <meta http-equiv="X-UA-Compatible" content="ie-edge">
    <title>Головна сторінка</title>
    <link rel="stylesheet" href="main_screen1.css">
</head>
<body>
<header>
    <div clas="logo">
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
        <ul>
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
<div class="clear"></div>
<div class="main">
<div class="text">
    <h1>Новий комп'ютер -<br>
        нові можливості !
    </h1>
    <p>
        Онлайн магазин електроніки та<br>
        комп'ютерной техніки
    </p>
    <form action="catalog.php" target="_blank">
        <button class="item">Подивитись товари</button>
    </form>
</div>
<div class="im">
    <p>
    <img src="pc.png">
    </p>
</div>

</div>

</body>
</html>