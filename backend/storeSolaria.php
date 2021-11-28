<?php include 'session_start.php' ?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Solaria Store</title>
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

            height: 72px;
        }

        .navbar {
            font-family: "Montserrat", sans-serif;
            font-weight: 400;
            padding: 10px;
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

        img {
            object-fit: cover;
            width: 12.5rem;
            height: 12.5rem;
            border-radius: 5px 5px 0 0;
            align-items: center;


        }

        .flex-display {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            flex-direction: row;
            gap: 1rem 2.5em;
            margin-top: 2rem;
            margin-left: 10rem;
            margin-right: 10rem;


        }

        .item-list {
            /*padding: 2%;*/

            /*flex-basis: 16%;*/
            cursor: pointer;
        }

        .container {
            border: 1px solid rgba(225, 211, 211, 0.5);
            /* Add shadows to create the "card" effect */
            box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
            transition: 0.3s;
            border-radius: 5px; /* 5px rounded corners */


        }

        /* On mouse-over, add a deeper shadow */
        .container:hover {
            box-shadow: 0 8px 16px 0 rgba(0, 0, 0, 0.2);
        }

        .item-body {
            padding-top: 1.2em;
            padding: 0.5em 1rem;

        }

        .price-qty {
            display: flex;
            justify-content: space-between;
            padding-top: 0.5rem;
        }

        /* Add some padding inside the card container */
        .slr-mrk {
            margin-top: 1.2rem;
            text-align: center;
            font-family: 'Montserrat';
            font-weight: bold;
            font-size: 2em;
            font-spacing: 0em;

        }

        .item-body {
            font-family: 'Dosis';
            padding-bottom: 0.7rem;

        }

        .desc {
            width: 170px;
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
        }
    </style>
</head>
<body>


<div class="header">
    <div class="navbar">
        <h1 class="solaria"><a href="index(login).php">Solaria</a></h1>
    </div>

</div>


<h2 class="slr-mrk">SOLARIA MARKETPLACE</h2>

<div class="flex-display">
    <?php
    include "conn.php";
    $qry_product = mysqli_query($conn, "select * from product"); ?>

    <?php while ($dt_product = mysqli_fetch_array($qry_product)) { ?>

        <div class="container">
            <div class="item-list">
                <a href="item.php?id_product=<?= $dt_product['id_product'] ?>"></a>
                <img src="dashboard/product_img/<?= $dt_product['img'] ?>" alt="">
                <div class="item-body">

                    <h4><?= $dt_product['product_name'] ?></h4>
                    <div class="desc">
                        <p><?= $dt_product['description'] ?></p>
                    </div>

                    <div class="price-qty">
                        <strong> SR <?= $dt_product['price'] ?></strong>
                        <!---->
                        <!--                        --><?php
                        //                                if (!empty($_SESSION["cart"]) && is_array($_SESSION["cart"])) {
                        //                                    foreach (@$_SESSION['cart'] as $product_key => $product_val){
                        //                                        if (empty($product_val['qty'] && $product_val['qty']> $dt_product['qty'])){
                        //                                            echo $dt_product['qty']  - $product_val['qty'];}
                        //
                        //
                        //
                        //                                                    }
                        //                                    if ($dt_product['qty'] == 0) {
                        //                                        ?>
                        <!--                                        <p class="sold-out" id="sold-out">SOLD OUT</p>-->
                        <!--                                    --><?php //} else {
                        //                                        echo $dt_product['qty'];
                        //                                    }
                        //
                        //                                } ?>


                    </div>
                </div>

            </div>

        </div>
    <?php }
    ?>

</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"
        integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<script>
    $(".item-list").click(function () {
        window.location = $(this).find("a").attr("href");
        return false;
    });

</script>
</body>
</html>