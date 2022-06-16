<?php


session_start();
require_once '../inc/funcs.php';


$id = $_POST['id'];
print_r($id);


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta name = "viewport" content="width=device-width, initial-scale = 1.0">
    <meta http-equiv="X-UA-Compatible" content="ie-edge">
    <meta charset="utf-8">
    <title>Каталог</title>
    <link rel="stylesheet" href="edit_item.css">

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


</header>

<div class="main">





    <div class="popup_edit" id="popup_edit">
        <div class="popup_edit_body">
            <div class="popup_edit-content">

                <div class="popup_edit-title">
                    Редагування товару
                </div>
                <div class="pop_edit_text">
                    <form action="check_edit.php" method="POST">
                        <div class="wrapper">
                            <input type="hidden" name="productId" id="uid" class="productId" value="<?=$id ?>">
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
                                <input type="text"  name="price" id="price">
                            </div>
                            <div class="group">
                                <label for="old_price">Стара ціна: </label>
                                <input type="text"  name="old_price" id="old_price">
                            </div>
                            <div class="group">
                                <label for="img">Зображення: </label>
                                <input type="file"  name="img" id="img">
                            </div>
                            <div class="group">
                                <label for="category">Тип товару: </label>
                                <br>
                                <input type="radio" id="category" name="category" value="1"><span class="cat_span"> Комп'ютери та ноутбуки</span><br>
                                <input type="radio" id="category2" name="category" value="3"><span class="cat_span">Смартфони/ТБ/Електроніка</span><br>
                                <input type="radio" id="category3" name="category" value="2"><span class="cat_span">Комп'ютерні комплектуючі</span><br>
                                <input type="radio" id="category4" name="category" value="4"><span class="cat_span">Товари для геймерів</span><br>
                            </div>
                            <div class="group">
                                <label for="hit">Хіт: </label>
                                <br>
                                <input type="radio" name="hit" id="hit" value="0"><span class="true">Так</span><br>
                                <input type="radio" name="hit" id="hit2" value="1"><span class="false">Ні</span><br>
                            </div>
                            <div class="group">
                                <label for="sale">Знижка: </label>
                                <br>
                                <input type="radio" name="sale" id="sale" value="0"><span class="true">Так</span><br>
                                <input type="radio" name="sale" id="sale2" value="1"><span class="false">Ні</span><br>


                            </div>
                            <button type="submit" class="ed_button_popup" id="save">Редагувати товар</button>
                        </div>
                    </form>
                </div>
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

