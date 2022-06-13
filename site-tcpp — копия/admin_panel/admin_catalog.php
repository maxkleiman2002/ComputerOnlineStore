<?php
session_start();
require_once '../vendor/signin.php';
require_once '../inc/funcs.php';


$products = get_products();

if(!empty($_GET["action"])) {
    switch($_GET["action"]) {

        case "remove":

            $id = $_GET["id"];

            delete_product($id);
            break;
        case "edit":
            unset($_SESSION["cart_item"]);
            break;
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta name = "viewport" content="width=device-width, initial-scale = 1.0">
    <meta http-equiv="X-UA-Compatible" content="ie-edge">
    <meta charset="utf-8">
    <title>Каталог</title>
    <link rel="stylesheet" href="catalog.css">
    <script defer src = ../assets/popups.js></script>
</head>
<body>
<div class="wrapp">
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

    <button type="button" class="add_item"> <a href="#popup" class="popup-link">Додати товар</a></button>
    <table width="700">
        <tr>
            <th class="id-th">ID</th>
            <th class="name-th">Назва</th>
            <th class="article-th">Артикул</th>

            <th class="description-th">Опис <br>товару</th>
            <th class="price-th">Ціна</th>
            <th class="type-th">Тип <br>товару</th>
            <th class="description-th">Стара ціна</th>
            <th class="price-th">Хіт</th>
            <th class="type-th">Знижка</th>
            <th class="edit-th"> </th>
            <th class="remove-th"></th>
        </tr>
        <?php if(!empty($products)): ?>
        <?php foreach($products as  $product): ?>
        <tr>

            <td class="id-td"><?=$product['id'] ?></td>
            <td class="name-td"><?=$product['title'] ?></td>
            <td class="article-td"><?=$product['slug'] ?></td>

            <td class="description-td"><?=$product['content'] ?></td>
            <td class="price-td"><?=$product['price'] ?></td>
            <td class="type-td"><?=$product['category'] ?></td>
            <td class="old_price-td"><?=$product['old_price'] ?></td>
            <td class="hit-td"><?=$product['hit'] ?></td>
            <td class="sale-td"><?=$product['sale'] ?></td>
            <td class="edit-td"><button type="button" class="edit-button"><a href="#popup2">Редагувати</a> </button></td>
            <td class="delete-td"><button type="button" class="remove-button"> <a href="admin_catalog.php?action=remove&id=<?php echo $product["id"]; ?>">Видалити</a> </button></td>
        </tr>
        <?php endforeach;?>
        <?php endif;?>
    </table>

</div>

<div class="popup" id="popup">
    <div class="popup_body">
        <div class="popup-content">
            <a href="#" class="popup_close close-popup"><img src="../close.png" alt="close_Icon"/> </a>
            <div class="popup-title">
                Додавання товару
            </div>
            <div class="add-item">
            <form action="" method="post">
                <div class="wrapper">
                    <div class="group">
                        <label for="title">Назва: </label>
                        <input type="text" name="title" id="title"/>
                    </div>
                    <div class="group">
                        <label for="article">Артикул: </label>
                        <input type="text" name="article" id="article"/>
                    </div>
                    <div class="group">
                        <label for="description">Опис товару: </label>
                        <textarea  name="description" id="description"></textarea>
                    </div>
                    <div class="group">
                        <label for="price">Ціна: </label>
                        <textarea  name="price" id="price"></textarea>
                    </div>
                    <div class="group">
                        <label for="old_price">Стара ціна: </label>
                        <textarea  name="old_price" id="old_price"></textarea>
                    </div>
                    <div class="group">
                        <label for="category">Тип товару: </label>
                        <input type="radio" id="category" name="category" value="1">Комп'ютери та ноутбуки<br>
                        <input type="radio" id="category" name="category" value="3">Смартфони,ТБ,Електроніка<br>
                        <input type="radio" id="category" name="category" value="2">Комп'ютерні комплектуючі<br>
                        <input type="radio" id="category" name="category" value="4">Товари для геймерів<br>
                    </div>
                    <div class="group">
                        <label for="hit">Хіт: </label>
                        <input type="radio" name="hit" id="hit" value="0"><br>
                        <input type="radio" name="hit" id="hit" value="1">
                    </div>
                    <div class="group">
                        <label for="sale">Знижка: </label>
                        <input type="radio" name="sale" id="sale" value="0"><br>
                        <input type="radio" name="sale" id="sale" value="1">
                    </div>
                    <button type="submit" class="add_button close-popup">Додати товар</button>
                </div>
            </form>
            </div>
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
</div>


</body>
</html>