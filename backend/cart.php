<?php include 'session_start.php';
include 'conn.php'; ?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Solaria | Checkout</title>
    <link rel="stylesheet"
          href="//cdn.jsdelivr.net/combine/npm/purecss@2.0.6/build/tables-min.css,npm/purecss@2.0.6/build/grids-min.css,npm/purecss@2.0.6/build/forms-min.css"/>
    <link rel="stylesheet" href="https://unpkg.com/purecss@2.0.6/build/grids-responsive-min.css"/>
    <link rel="stylesheet" href="https://unpkg.com/purecss@2.0.6/build/buttons-min.css"/>

    <style>@import url('https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap');
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

        .item-order table {
            width: 30rem;
            margin-top: 10rem;
            margin-left: auto;
            margin-right: auto;
        }

        .btn-bot {
            display: flex;
            justify-content: center;
            margin-top: 1rem;
        }

        .btn-bot a {
            margin-left: 0.7rem;
        }


    </style>
</head>
<body>
<div class="header">
    <div class="navbar">
        <h1 class="solaria"><a href="storeSolaria.php">Solaria</a></h1>
    </div>

    <div class="pure-g item-order">
        <div class="pure-u-1">
            <table class="pure-table pure-table-horizontal">
                <thead>
                <tr>
                    <th>#</th>
                    <th>Title</th>
                    <th>Price</th>
                    <th>Quantity</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                <?php
                $no = 1;

                foreach (@$_SESSION['cart'] as $product_key => $product_val):
                    $qry_get_product = mysqli_query($conn, "select * from product where id_product = '" . $product_key . "'");
                    $product_data = mysqli_fetch_array($qry_get_product);
                    ?>
                    <tr>

                        <td><?= $no++ ?></td>
                        <td><?= $product_val['product_name']; ?></td>
                        <td><?= $product_val['price'] ?></td>
                        <td><?= $product_val['qty'] ?></td>
                        <td><a href="delCart.php?id=<?= $product_key ?>" class="btn btn-danger">
                                <box-icon name='x'></box-icon>
                            </a></td>
                    </tr>

                <?php endforeach;


                ?>
                </tbody>
            </table>
        </div>
        <div class="pure-u-1 btn-bot">
            <a href="storeSolaria.php" class="pure-button">Buy more</a>
            <a href="checkout.php" name="checkout" class="pure-button">Checkout</a></div>


    </div>

    <script src="https://unpkg.com/boxicons@2.0.9/dist/boxicons.js"></script>

</body>
</html>
