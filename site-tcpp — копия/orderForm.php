<?php
ini_set('display_errors', 'Off');
session_start();
require_once 'vendor/signin.php';
require_once 'inc/connect.php';
require_once 'inc/funcs.php';
$products = get_products();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name = "viewport" content="width=device-width, initial-scale = 1.0">
    <meta http-equiv="X-UA-Compatible" content="ie-edge">
    <title>Оформлення замовлення</title>
    <link rel="stylesheet" href="orderForm.css">

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

    <div class="head">
        <hr color="DBDBDC">
        <h1>Оформлення замовлення</h1>
    </div>
    <form action="vendor/registration_check.php" method="POST">
        <div class="form-wrapper">

            <div class="to-centre">
                <?php if(!empty($_SESSION['cart'])):?>

                <fieldset>
                    <legend>Дані одержувача: </legend>
                    <div class="group">
                        <label for="name">Ім'я: </label> <input type="text"  name="name" id="name" value="<?=$_SESSION['user']['name'] ?>"/>
                    </div>

                    <div class="group">
                        <label for="surname">Прізвище: </label> <input type="text"  name="surname" id="surname" value="<?=$_SESSION['user']['surname'] ?>"/>
                    </div>

                    <div class="group">
                        <label for="patronymic">Ім'я по-батькові: </label> <input type="text"  name="patronymic" id="patronymic" value="<?=$_SESSION['user']['patronymic'] ?>"/>
                    </div>

                    <div class="group">
                        <label for="number">Телефон: </label>
                        <input type="number"  name="number" id="number" value="<?=$_SESSION['user']['number'] ?>"/>
                    </div>
                    <div class="group">
                        <label for="city">Місто: </label>
                        <input type="text"  name="city" id="city" value="<?=$_SESSION['user']['city'] ?>">
                    </div>
                    <div class="group">
                        <label for="post">Номер відділення Нової Пошти: </label>
                        <input type="text"  name="post" id="post" value="<?=$_SESSION['user']['post'] ?>"/>
                    </div>
                    <div class="group">
                        <label for="email">E-mail : </label>
                        <input type="email"  name="email" id="email" value="<?=$_SESSION['user']['email'] ?>"/>
                    </div>
                </fieldset>

                <?php endif;?>
                <fieldset>
                    <legend>Спосіб оплати: </legend>
                    <div class="group">
                        <label for="noCard">Оплата при отиманні<input type="radio" value="0" name="payment_method" id="noCard"></label><br>
                    </div>
                    <div class="group">
                        <label for="card">Оплата карткою&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            <input type="radio" value="1" name="payment_method" id="card"></label>
                    </div>
                    <input type="hidden" name="products"
                           <input type="hidden" name = "grand_total" value="<?=$_SESSION['cart.sum'] + 78 ?>">


</div>
        </div>
    </form>
    <div class="order-info">

        <div class="confirm-order">



            <p class="t1"><span class="small"> ВАРТІСТЬ <?=$_SESSION['cart.qty'] ?> ТОВАРІВ:</span> <span class="order-price"><?=$_SESSION['cart.sum'] ?> грн.</span> </p>
            <p class="t2"><span class="small"> ДОСТАВКА:</span> <span class="big">78 грн.</span> </p>
            <hr color="DBDBDC">
            <p class="t3"><span class="big2"> РАЗОМ: </span><span class="order-sum"><?=$_SESSION['cart.sum'] + 78  ?> грн.</span> </p>



            <div class="modal-footer">

                <button type="button"  class="btn-primary"><a href="" class="orderlink"> Підтвердити замовлення</a></button>
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

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"></script>
</footer>
</body>
</html>