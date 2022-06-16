<?php
    ini_set('display_errors', 'Off');
    session_start();
    require_once 'vendor/signin.php';
    if($_SESSION['user']){
        header("Location: profile/profile_main.php");
    }

session_destroy();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta name = "viewport" content="width=device-width, initial-scale = 1.0">
  <meta http-equiv="X-UA-Compatible" content="ie-edge">
  <meta charset="utf-8">
  <title>Авторизація</title>
  <link rel="stylesheet" href="authorization1.css">
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
      <li><a href="authorization.php"><button class="auth_but">Вхід</button></a></li>

        <li><a href="cart/cart_page.php" id="#get-cart"><img src="cart.svg"></a></li>

        <li><div class="count-cart">
                <span class="mini-count"> <?=$_SESSION['cart.qty'] ?? 0 ?></span>
            </div>
        </li>
    </ul>
  </nav>
</header>

<div class="main">

  <form action="vendor/signin.php" method="post">
    <div class="form-wrapper">
      <h1>Вхід</h1>
    <div class="group">
      <input type="email" placeholder="E-mail" name="email" id="email"/>
    </div>

    <div class="group">
      <input type="password" placeholder="Password" name="password" id="password"/>
    </div>
    <button class="auth" type="submit">Вхід</button>
    <button class="registration"><a href="registration.php">Зареєструватись</a></button>

    </div>
      <?php
      //if ($_SESSION['message3']) {
      //global $message3;
      if ($_SESSION['message3']) {
          echo '<p class="err-msg3" style="border: 2px solid #E27E1B;
    border-radius: 3px;
    text-align: center;
    font-weight: bold;
    position: relative;
    margin-top: 100px;
    color:#fff;
    letter-spacing: .5px;
    margin-left: 35%;
    width: 500px;"> ' . $_SESSION['message3'] . ' </p>';
      }
      unset($_SESSION['message3']);
      ?>
  </form>
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

</footer>

</body>
</html>