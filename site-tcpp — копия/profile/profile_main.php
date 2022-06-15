<?php
session_start();
if(!$_SESSION['user']){
    header("Location: ../authorization.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta name = "viewport" content="width=device-width, initial-scale = 1.0">
    <meta http-equiv="X-UA-Compatible" content="ie-edge">
    <meta charset="utf-8">
    <title>Авторизація</title>
    <link rel="stylesheet" href="profile_main1.css">
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
                <a href="profile_main.php"><img src="../icons/user.png" alt="user" width="20" height="20"></a>
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
        <h1>Особисті дані</h1>
        <div class="wrapp-field">
        <div class="personal-data">
            <p> <img src="../icons/personal_data.png"> <span class="text">Особисті дані</span> <!--<span class="strelka2" >&#11015;</span>--> </p>
            <div class="wrapper-personal-data">
                <div class="block1">
                    <form action="data_check.php" method="post">
                    <div class="group">
                    <label for="surname">Прізвище</label>
                        <br>
                        <input name="surname" id="surname" value="<?=$_SESSION['user']['surname'] ?>">
                    </div>

                     <div class="group">
                            <label for="name">Ім'я</label>
                         <br>
                            <input name="name" id="name" value="<?=$_SESSION['user']['name'] ?>">
                        </div>

                </div>
                <div class="block2">
                    <div class="group" style="position: relative; bottom: 17px;">
                        <br>
                        <label for="patronymic">По батькові </label><br>
                        <input name="patronymic" id="surname" value="<?=$_SESSION['user']['patronymic'] ?>">

                    </div>

                    <div class="group"
                    <label style="font-size: 14px; position: relative; bottom: 6px;" id="date"> Дата народження: </label><br>
                    <input type="text" name="date" id = "date" value="<?=$_SESSION['user']['dayOfBirth']?>.<?=$_SESSION['user']['monthOfBirth']?>.<?=$_SESSION['user']['yearOfBirth']?>">
                    </div>
            </div>

                </div>
            <button type="submit" class="edit">Редагувати</button>
                </form>
            </div>
        </div>
        <div class="contacts-data">
            <p><img src="../icons/contacts.png"> <span class="text">Контакти</span> <!--<span class="strelka">&#11015;</span>--> </p>
            <form action = "contacts_check.php" method="POST">
            <div class="wrapper-contacts" ">
                <div class="block3">
                <div class="group">
                    <label for="email">Електронна пошта</label><br>
                    <input  name="email" id="email" value="<?=$_SESSION['user']['email'] ?>">
            </div>
                </div>
                <div class="block4">
                <div class="group">
                    <label for="number">Номер телефону</label><br>
                    <input name="phone" id="number" value="<?=$_SESSION['user']['number'] ?>">
                </div>
                </div>

            <button type="submit" class="edit">Редагувати</button>
            </form>
        </div>

        <div class="delivery-data">
            <p><img src="../icons/delivery.png"> <span class="text">Доставка</span> <!-- <span class="strelka">&#11015;</span>--> </p>
            <form action="delivery_check.php" method="post">
            <div class="wrapper-delivery">
                    <div class="block5">
                        <div class="group">
                            <label for="email">Номер відділення НП</label><br>
                            <input name="post" id="email" value="<?=$_SESSION['user']['post'] ?>">
                        </div>
                    </div>
                    <div class="block6">
                        <div class="group">
                            <label for="city">Населений пукнт</label><br>
                            <input name="city" id="city" value="<?=$_SESSION['user']['city'] ?>">
                        </div>
                    </div>
            </div>
                <button type="submit" class="edit">Редагувати</button>
            </form>


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

</body>
</html>