<?php
    session_start();
    require_once '../inc/funcs.php';

    $orders = get_orders();
    $ordersDetail = get_orders_detail();
    $order_products = get_cart_order();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta name = "viewport" content="width=device-width, initial-scale = 1.0">
    <meta http-equiv="X-UA-Compatible" content="ie-edge">
    <meta charset="utf-8">
    <title>Замовлені товари</title>
    <link rel="stylesheet" href="ordered_goods1.css">
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
            <li><a href="../authorization.php"><button class="auth_but">Вхід</button></a></li>
            <li><a href="../cart/cart_page.php" id="#get-cart"><img src="../cart.svg"></a></li>

            <li><div class="count-cart">
                    <span class="mini-count"> <?=$_SESSION['cart.qty'] ?? 0 ?></span>
                </div>
        </ul>
    </nav>
</header>

<div class="main">
    <h1>Замовлені товари</h1>
</div>

<table width="500">
    <tr>
        <th>ID</th>
        <th>Ім'я</th>
        <th>Прізвище</th>
        <th>По-батькові</th>
        <th>Номер<br> телефону</th>
        <th>Місто</th>
        <th>Відділення НП</th>
        <th>E-mail</th>
        <th>Дата<br>замовлення</th>
        <th>Загальна ціна</th>

    </tr>
    <?php if(!empty($orders)): ?>
    <?php foreach($orders as  $order): ?>
    <tr>
        <td class="id-td"><?= $order['order_id'] ?></td>
        <td class="name-td"><?= $order['name'] ?></td>
        <td class="surname=td"><?= $order['surname'] ?></td>
        <td class="patronymic-td"><?= $order['patronymic'] ?></td>
        <td class="phone"><?= $order['number'] ?></td>
        <td class="city"><?= $order['city'] ?></td>
        <td class="post"><?= $order['post'] ?></td>
        <td class="email"><?= $order['email'] ?></td>
        <td class="date-td"><?= $order['date'] ?></td>
        <td class="total-td"><?= $order['paid_amount'] ?></td>
    </tr>
    <?php endforeach;?>
    <?php endif;?>
</table>

<table>
    <th>Товар</th>
    <th>Ціна</th>
    <th>Кількість</th>

</table>




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