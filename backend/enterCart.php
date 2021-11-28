<?php
session_start();
$id_product = $_GET['id'];


if ($_POST) {
    include "conn.php";

    $qry_get_product = mysqli_query($conn, "select * from product where id_product = '" . $_GET['id'] . "'");
    $product_data = mysqli_fetch_array($qry_get_product);

    $_SESSION['cart'][] = array(
        'id_product' => $product_data['id_product'],
        'product_name' => $product_data['product_name'],
        'price' => $product_data['price'],
        'qty' => $_POST['buy-qty']
    );

}


header('location: cart.php');

