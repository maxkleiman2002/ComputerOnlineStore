<?php
session_start();
require_once '../vendor/signin.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta name = "viewport" content="width=device-width, initial-scale = 1.0">
    <meta http-equiv="X-UA-Compatible" content="ie-edge">
    <meta charset="utf-8">
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
            <li><a href="../main_screen.php">Головна</a></li>
            <li><a href="../delivety.php">Доставка</a></li>
            <li><a href="../payment.php">Оплата</a></li>
            <li><a href="../contacts.php">Контакти</a></li>
            <li><a href="../authorization.php"><button class="auth_but">Вхід</button></a></li>
            <li><a href="../cart/cart_page.php" id="#get-cart"><img src="../cart.svg"></a></li>

            <li><div class="count-cart">
                    <span class="mini-count"> <?=$_SESSION['cart.qty'] ?? 0 ?></span>
                </div>
            </li>
        </ul>
    </nav>
</header>

<div class="main">
<h1>Каталог товарів</h1>
    <button class="add_item"><a href="">Додати товар</a></button>
    <table>
        <tr>
            <th class="id-th">ID</th>
            <th class="img-th">Зображення</th>
            <th class="article-th">Артикул</th>
            <th class="name-th">Назва</th>
            <th class="description-th">Опис <br>товару</th>
            <th class="price-th">Ціна</th>
            <th class="type-th">Тип <br>товару</th>
            <th class="edit-th"></th>
            <th class="remove-th"></th>
        </tr>
        <tr>
            <td>1</td>
            <td><img src="https://content.rozetka.com.ua/goods/images/big/172476912.jpg" width="150" height="150"/></td>
            <td class="article-td">1478-9</td>
            <td class="name-td">Компьютер</td>
            <td class="description-td">для дома</td>
            <td class="price-td">15000</td>
            <td class="type-td">Комп`ютери та ноутбуки</td>
            <td class="edit-td"><a href="">Редактувати</a> </td>
            <td class="edit-td"><a href="">Видалити</a> </td>
        </tr>
    </table>

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