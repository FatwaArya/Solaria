<?php include 'session_start.php';
include 'conn.php'; ?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Solaria | Cart</title>

    <link rel="stylesheet"
          href="//cdn.jsdelivr.net/combine/npm/purecss@2.0.6/build/tables-min.css,npm/purecss@2.0.6/build/grids-min.css,npm/purecss@2.0.6/build/forms-min.css"/>
    <link rel="stylesheet" href="https://unpkg.com/purecss@2.0.6/build/grids-responsive-min.css"/>

    <style>
        @import url('https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap');
        @import url('https://fonts.googleapis.com/css2?family=Bebas+Neue&display=swap');
        @import url('https://fonts.googleapis.com/css2?family=Bebas+Neue&family=Dosis:wght@200;300;400;500;600;700;800&family=Roboto+Condensed:ital,wght@0,300;0,400;0,700;1,300;1,400;1,700&display=swap');

        @font-face {
            font-family: "league-spartan";
            src: url(../assets/font/LeagueSpartan-Bold.otf);
        }


        * {
            padding: 0;
            margin: 0;

        }

        }
        .header {
            display: flex;
            height: 4.5rem;
        }

        .navbar {
            font-family: "Montserrat", sans-serif;
            font-weight: 400;
            padding: 0.6rem;
            display: flex;
            align-items: center;
            text-align: center;
            justify-content: flex-start;
            background-color: #020a2f;

        }

        a {
            text-decoration: none;
            color: #ffffff;

        }

        .product-img img {
            width: 18rem;
            height: 18rem;
            object-fit: contain;
            align-items: center;
            /*margin-right: 18rem;*/
        }

        .container {

            align-items: center;

            margin-top: 3rem;
        }

        .product-img {
            display: flex;
            justify-content: flex-end;
        }

        .product-detail {
            font-family: "Montserrat", sans-serif;
            margin-bottom: 8rem;
        }

        td {
            font-size: medium;

            padding-right: 0.7rem;

        }

        input::-webkit-outer-spin-button,
        input::-webkit-inner-spin-button {
            -webkit-appearance: none;
            margin: 0;
        }

        input[type="number"] {
            border: none;
            font-family: "Montserrat", sans-serif;
        }

        .td-button {
            padding-top: 1rem;
        }

        .td-bold {
            font-weight: bold;
        }

        .bot {
            padding-bottom: 1rem;
            font-weight: 400;
        }

        button {
            color: #fff;
            font-size: .9em;
            background-color: #2f2f2f;
            padding: 0.5rem 1.5rem 0.5rem 1.5rem;
            cursor: pointer;
            border: none;
            border-radius: .2rem;
        }

        .item-info {


            margin-bottom: 12rem;
        }

        .item-info h4 {
            text-align: center;
        }
    </style>
</head>
<body>


<?php $qry_product_detail = mysqli_query($conn, "select * from product where id_product = '" . $_GET['id_product'] . "'");
$dt_product = mysqli_fetch_array($qry_product_detail);
?>
<div class="header">
    <div class="navbar">
        <h1 class="solaria"><a href="storeSolaria.php">Solaria</a></h1>
    </div>

</div>
<div class="pure-g container">
    <div class="pure-u-1-3 product-img"><img src="dashboard/product_img/<?= $dt_product['img'] ?>" alt=""></div>
    <div class="pure-u-1-3 item-info">

        <h4 class="td-bold"><?= $dt_product['product_name'] ?></h4>


        <p class="td-bold bot"><?= $dt_product['description'] ?></p>


    </div>
    <div class=" pure-u-1-3 product-detail">
        <form name="product-form" onsubmit="return checkQty() "
              action="enterCart.php?id=<?= $dt_product['id_product'] ?>" method="post">
            <table>
                <thead>

                <tr>
                    <td>Price</td>
                    <td><?= $dt_product['price'] ?></td>
                </tr>
                <tr>
                    <td>In Stock</td>
                    <td> <?php
                        $final_qty = 0;
                        if (!empty($_SESSION["cart"]) && is_array($_SESSION["cart"])) {
                            foreach (@$_SESSION['cart'] as $product_key => $product_val) {
                                if (empty($product_val['qty'] && $product_val['qty'] > $dt_product['qty'])) {
                                    $temp_qty = $dt_product['qty'] - $product_val['qty'];
                                    if ($temp_qty === 0) {
                                        echo '<p class="sold-out" id="sold-out">SOLD OUT</p>';
                                    } else {
                                        $final_qty = $dt_product['qty'] - $product_val['qty'];
                                        ?>
                                        <p> <?= $final_qty ?></p>
                                    <?php }
                                }


                            }
                        } else if (empty($_SESSION['cart'])) {
                            if ($dt_product['qty'] === "0") {
                                echo '<p class="sold-out" id="sold-out">SOLD OUT</p>';
                            } else echo $dt_product['qty'];
                        } ?>


                    </td>
                </tr>
                <tr>
                    <td>Buy</td>
                    <td><input type="number" id="buy-qty" name="buy-qty" min="1" value="1"></td>
                </tr>
                <tr>
                    <td class="td-button">
                        <button id="sumbit-btn" onclick="validateForm()" type="submit" class="order">Order</button>
                    </td>
                </tr>
                </thead>
            </table>

        </form>
    </div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<script>

    if ($('#sold-out').length) {
        $('#sumbit-btn').hide();

    }


    function validateForm() {
        let checkEmpty = document.forms['product-form']['buy-qty'].value;

        if (checkEmpty == "") {
            alert("Stock must be filled out");
            event.preventDefault();
        }
    }

    function checkQty() {
        let buy_qty = document.getElementById('buy-qty').value;

        if (buy_qty > <?= $final_qty ?>) {
            alert('Barang tidak cukup');
            document.getElementById('buy-qty').value = 1;
            event.preventDefault();
        }
    }
</script>
</body>
</html>