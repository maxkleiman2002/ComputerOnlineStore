<?php

require_once 'connect.php';





function debug(array  $data):void
{
    echo '<pre>'.print_r($data,1).'</pre>';
}

function get_products(): array
{
    global $pdo;
    $res = $pdo->query("SELECT * FROM compshop.products");
   return $res->fetchAll();

}
function get_orders(): array
{
    global $pdo;
    $res = $pdo->query("SELECT * FROM compshop.orders");
    return $res->fetchAll();

}
//function get_order(int $id): array
//{
//
//    global $pdo;
//    $res = $pdo->query("SELECT * FROM compshop.orders WHERE `email` = $email");
//    return $res->fetchAll();
//
//}
function get_orders_detail(): array
{
    global $pdo;
    $res = $pdo->query("SELECT * FROM compshop.ordersdetail");
    return $res->fetchAll();

}
function get_cart_order(): array
{
    global $pdo;
    $res = $pdo->query("SELECT * FROM compshop.cart");
    return $res->fetchAll();

}
function delete_product($id)
{
    global $pdo;
    $pdo->query("DELETE FROM compshop.products WHERE id = $id");

}

//function get_product(int $id)
function get_product(int $id): array|false
{
    global $pdo;


        $stmt = $pdo->query("SELECT * FROM compshop.products WHERE id = $id");
        return $stmt->fetch();

}

function add_to_cart($product): void
{
    if (isset($_SESSION['cart'][$product['id']])) {
        $_SESSION['cart'][$product['id']]['qty'] += 1;
    } else {
        $_SESSION['cart'][$product['id']] = [
            'id' => $product['id'],
            'title' => $product['title'],
            'slug' => $product['slug'],
            'price' => $product['price'],
            'qty' => 1,
            'img' => $product['img'],
            'category'=>$product['category'],

        ];
    }

    $_SESSION['cart.qty'] = !empty($_SESSION['cart.qty']) ? ++$_SESSION['cart.qty'] : 1;
    $_SESSION['cart.sum'] = !empty($_SESSION['cart.sum']) ? $_SESSION['cart.sum'] + $product['price'] : $product['price'];
}
