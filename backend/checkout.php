<?php
include 'conn.php';
session_start();
foreach (@$_SESSION['cart'] as $product_key => $product_val) {
    $date = date('Y-m-d H:i:s');
    $sql = "INSERT INTO product_detail (`id_product_detail`, `id_product`, `id` , `buy_qty` , `transaction_date`) 
    VALUES ('','" . $product_val["id_product"] . "','" . $_SESSION['id_user'] . "','" . $product_val['qty'] . "','" . $date . "')";
    mysqli_query($conn, $sql);
}
foreach (@$_SESSION['cart'] as $product_key => $product_val) {

    unset($_SESSION['cart'][$product_key]);
    mysqli_query($conn, "update product set qty = qty - '" . $product_val["qty"] . "' 
                where id_product = '" . $product_val["id_product"] . "'");


}

$qry_get_product = mysqli_query($conn, "select * from product where id_product = '" . $_GET['id'] . "'");
$product_data = mysqli_fetch_array($qry_get_product);
if ($product_data['qty'] == 0) {
    mysqli_query($conn, "UPDATE product SET status = 'false'
                where id_product = '" . $product_val["id_product"] . "'");
}


echo "<script>alert('Thanks You For Buying!')</script>";
header('Location: storeSolaria.php');
