<?php
session_start();
require_once '../inc/funcs.php';
if (!$_SESSION['admin']) {
    header('Location: ../authorization.php');
}



$dbHost = "localhost";
$dbXeHost="localhost/XE";
$dbUsername="root";
$dbPassword = "";

$products = get_products();

if(!empty($_GET["action"])) {
    switch ($_GET["action"]) {

        case "remove":

            $id = $_GET["id"];

            delete_product($id);
            break;
        case "edit":
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                $id2 = $_GET["id"];




            }
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
    <link rel="stylesheet" href="catalog2.css">
    <script defer src = ../assets/popups.js></script>
    <script defer src = ../assets/popups2.js></script>
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
            <!--<li><a href="../main_screen.php">Головна</a></li>-->
            <li><a href="ordered_goods.php">Замовлені товари</a></li>
            <li><a href="admin_catalog.php">Каталог товарів</a> </li>
            
            <?php
            if($_SESSION['admin']) {

                echo ' <li ><a href = "../vendor/logout_admin.php" ><button class="auth_but" > Вихід</button ></a ></li >';

            }
            else{

                echo ' <li ><a href = "../authorization.php" ><button class="auth_but" > Вхід</button ></a ></li >';
            }
            ?>

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
        <tr data-user-id="<?=$product['id'] ?>">

            <td class="id-td"><?=$product['id'] ?></td>
            <td class="name-td"><?=$product['title'] ?></td>
            <td class="article-td"><?=$product['slug'] ?></td>

            <td class="description-td"><?=$product['content'] ?></td>
            <td class="price-td"><?=$product['price'] ?></td>
            <td class="type-td"><?=$product['category'] ?></td>
            <td class="old_price-td"><?=$product['old_price'] ?></td>
            <td class="hit-td"><?=$product['hit'] ?></td>
            <td class="sale-td"><?=$product['sale'] ?></td>

            <td class="edit-td"><button type="button" class="edit-button"><a href="#popup_edit" class="popup-link-edit" id="popup-link-edit">Редагувати</a> </button></td>
            <td class="delete-td"><button type="button" class="remove-button"> <a href="admin_catalog.php?action=remove&id=<?php echo $product["id"]; ?>">Видалити</a> </button></td>

        </tr>
        <?php endforeach;?>
        <?php endif;?>
    </table>

</div>

<div class="popup" id="popup">
    <div class="popup_body">
        <div class="popup-content">
            <a href="#" class="popup_close close-popup"><img src="../close1.png" alt="close_Icon" width="50" height="50"/> </a>
            <div class="popup-title">
                Додавання товару
            </div>
            <div class="add-item">
            <form action="check_add.php" method="post">
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
                    <button type="submit" class="add_button_popup">Додати товар</button>
                </div>
            </form>
            </div>
        </div>
    </div>
</div>

<div class="popup_edit" id="popup_edit">
        <div class="popup_edit_body">
            <div class="popup_edit-content">
                <a href="#" class="popup_close_edit"><img src="../close1.png" alt="close_Icon" width="50" height="50"/> </a>




                <div class="popup_edit-title">
                    Редагування товару
                </div>
                <div class="pop_edit_text">
                    <form action="check_update.php" method="POST">
                        <div class="wrapper">
                            <input type="hidden" name="productId" id="uid" class="productId">
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
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script>
    let $editRow = null;
    $('.popup-link-edit').click(function (e){
        $editRow = $(this).closest("tr");

        $(".id-td").val($editRow.data("user-id"));

    });
    $("#save").click(function() {
        $editRow.find(".productId").text($(".id-td").val());
        var productId = $('.productId').val();
        console.log(productId);
    });


</script>

</body>
</html>