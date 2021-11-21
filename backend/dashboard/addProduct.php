<?php include('C:\Users\fatwa\PhpstormProjects\solaria\backend\session_start.php') ?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://unpkg.com/purecss@2.0.6/build/pure-min.css"
          integrity="sha384-Uu6IeWbM+gzNVXJcM9XV3SohHtmWE+3VGi496jvgX1jyvDTXfdK+rfZc8C1Aehk5" crossorigin="anonymous">

    <title>Solaria -- Add Product</title>

    <style>    span {cursor:pointer; }
        .number{
            display: flex;
            align-items: stretch;

        }
        .minus, .plus{
            margin: 0.5rem;
            width:20px;
            height:20px;
            background:#f2f2f2;
            border-radius:2px;
            padding:8px 5px 8px 5px;
            border:1px solid #ddd;
            display: inline-block;
            vertical-align: middle;
            text-align: center;
        }
        .counter {
            height:40px;
            width: 100px;
            text-align: center;
            font-size: 26px;
            border: 1px solid #ddd;
            border-radius: 4px;
            display: inline-block;
            vertical-align: middle;
        }
        input::-webkit-outer-spin-button,
        input::-webkit-inner-spin-button {
            -webkit-appearance: none;
            margin: 0;
        }
    /*    https://www.w3schools.com/howto/howto_css_hide_arrow_number.asp*/
    </style>
    <?php include 'admin-css.php' ?>
</head>
<body>
<?php include 'admin-header-arrow.php'?>

<div class="container">
    <div class="form-add">
        <form action="addProduct.php" class="pure-form pure-form-stacked" enctype="multipart/form-data" method="post">
            <fieldset>
                <legend><strong>Add Product</strong></legend>
                <label for="text">Product name</label>
                <input class="pure-input-2-3"type="text" name="productName">
                <label for="text">Price</label>
                <input class="pure-input-2-3" type="number" name="price">
                <label for="text">Jumlah barang</label>
                <div class="number">
                    <span class="minus">-</span>
                    <input class="counter" type="number"  value="1" step="1" name="qty"/>
                    <span class="plus">+</span>
                </div>
                <label for="text">Description</label>
                <textarea class="pure-input-2-3" placeholder="write something down here..." name="desc"></textarea>
                <label >File</label>
                <input type="file" name="file"/>
                <span class="pure-form-message">This is a required field.</span>


                <button type="submit" name="sumbit" class="pure-button pure-button-primary">Add</button>
            </fieldset>
        </form>
    </div>
<!--    //status error at db and php-->
    <?php
    include '../conn.php';
    if (isset($_POST['sumbit'])){
        $productName = $_POST['productName'];
        $price = $_POST['price'];
        $qty = $_POST['qty'];
        $desc = $_POST['desc'];
        $file = $_FILES['file'];



        if (!is_dir('product_img/' . $_SESSION['name'].'/')) {
            mkdir('product_img/' . $_SESSION['name'].'/');
        }
//                $result = move_uploaded_file($file['tmp_name'], $uploadPath);

        $uploadPath = 'product_img/' . $_SESSION['name'] . '/' . $_FILES['file']['name'];

        $fileName = basename($uploadPath);

        if(move_uploaded_file($_FILES['file']['tmp_name'], $uploadPath))
        {

            $date = date('Y-m-d H:i:s');
            $sql = "INSERT INTO `product` (`id_product`, `product_name`, `price`, `qty`, `description`, `status`, `img`) VALUES (NULL, '$productName', '$price', '$qty', '$desc', '1', '$fileName')";
            $result = $conn->query($sql);


        }

        else {

            echo "Problem uploading file";

        }


    }
    ?>
    <div class="log">
        <legend class="dt-log"><strong>Data Log</strong></legend>
        <table class="pure-table">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Barang</th>
                <th scope="col">Pembeli</th>
                <th scope="col">Harga</th>
                <th scope="col">Status</th>
                <th scope="col">Description</th>
                <th scope="col">Quantity</th>

                <th scope="col">Action</th>
            </tr>
            </thead>

            <tbody>
            <?php

            $sql = "select * from product ;";
            $result = mysqli_query($conn, $sql);



            $no = 0;
            while ($solaria_product = mysqli_fetch_array($result)) {
                $no++; ?>
                <tr class="pure-table-odd">

                    <td><?= $no ?></td>
                    <td><?= $solaria_product['product_name'] ?> </td>
                    <td>under construction</td>
                    <td><?= $solaria_product['price'] ?></td>
                    <td><?php if ($solaria_product['status']) {
                            echo "Barang Tersedia";
                        } else {
                            echo "Barang Terjual";
                        } ?></td>
                    <td><?= $solaria_product['description'] ?></td>
                    <td><?= $solaria_product['qty'] ?></td>


                    <td class="action" name="action">
                        <a href="user_update.php? id= <?php echo $solaria_product['id_product'] ?>"
                           class="pure-button pure-button-primary">Change</a>
                        <a href="delProduct.php?id= <?php echo $solaria_product['id_product'] ?> "
                           class="pure-button pure-button-error">Delete</a>

                    </td>

                </tr>
                <?php

            }


            ?>

            </tbody>
        </table>
    </div>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script >
    $(document).ready(function() {
        $('.minus').click(function () {
            var $input = $(this).parent().find('input');
            var count = parseInt($input.val()) - 1;
            count = count < 1 ? 1 : count;
            $input.val(count);
            $input.change();
            return false;
        });
        $('.plus').click(function () {
            var $input = $(this).parent().find('input');
            $input.val(parseInt($input.val()) + 1);
            $input.change();
            return false;
        });
    });
</script>
</body>
</html>

