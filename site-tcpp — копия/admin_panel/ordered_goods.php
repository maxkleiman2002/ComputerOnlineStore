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
    <link rel="stylesheet" href="ordered_goods2.css">
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
            <li><a href="ordered_goods.php">Замовлені товари</a></li>
            <li><a href="admin_catalog.php">Каталог товарів</a> </li>



            <?php
            if($_SESSION['user']) {

                echo ' <li ><a href = "../vendor/logout.php" ><button class="auth_but" > Вихід</button ></a ></li >';

            }
            else{

                echo ' <li ><a href = "../authorization.php" ><button class="auth_but" > Вхід</button ></a ></li >';
            }
            ?>

        </ul>
    </nav>
</header>

<div class="main">
    <h1>Замовлені товари</h1>
</div>
<div class="page-list" align="center">

</div>
<table class="tbl1" width="500">
    <tr>
        <th style="font-size: 16px;">ID</th>
        <th style="font-size: 16px;">Ім'я</th>
        <th style="font-size: 16px;">Прізвище</th>
        <th style="font-size: 16px;">По-батькові</th>
        <th style="font-size: 16px;">Номер<br> телефону</th>
        <th style="font-size: 16px;">Місто</th>
        <th style="font-size: 16px;">Відділення НП</th>
        <th style="font-size: 16px;">E-mail</th>
        <th style="font-size: 16px;">Дата<br>замовлення</th>
        <th style="font-size: 16px;">Загальна ціна</th>

    </tr>
    <?php if(!empty($orders)): ?>
    <?php foreach($orders as  $order): ?>
    <tr>
        <td style="font-size: 12px;" class="id-td"><?php echo $order['order_id']; $_SESSION['order_id'] = $order['order_id'];  ?></td>
        <td style="font-size: 12px;" class="name-td"><?= $order['name'] ?></td>
        <td style="font-size: 12px;" class="surname=td"><?= $order['surname'] ?></td>
        <td style="font-size: 12px;" class="patronymic-td"><?= $order['patronymic'] ?></td>
        <td style="font-size: 12px;" class="phone"><?= $order['number'] ?></td>
        <td style="font-size: 12px;" class="city"><?= $order['city'] ?></td>
        <td style="font-size: 12px;" class="post"><?= $order['post'] ?></td>
        <td style="font-size: 12px;" class="email"><?= $order['email'] ?></td>
        <td style="font-size: 12px;" class="date-td"><?= $order['date'] ?></td>
        <td style="font-size: 12px;" class="total-td"><?= $order['paid_amount'] ?></td>
    </tr>
    <?php endforeach;?>
    <?php endif;?>
</table>

<table width="400" class="tbl2">
    <th style="font-size: 16px;">ID</th>
    <th style="font-size: 16px;">Товар</th>
    <th style="font-size: 16px;">Ціна</th>
    <th style="font-size: 16px;">Кількість</th>

    <?php if(!empty($order_products)): ?>
    <?php foreach($order_products as  $products): ?>


    <tr>
        <td style="font-size: 12px;"><?=$products['cart_id']?></td>
        <td style="font-size: 12px;"><?php
            $name = explode(",",$products['product_name']);
            echo $products['product_name'];
            ?></td>
        <td style="font-size: 12px;"><?=$products['product_price'] ?></td>
        <td style="font-size: 12px;"><?=$products['quantity'] ?></td>
    </tr>
        <?php endforeach;?>
         <?php endif;?>
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