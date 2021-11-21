<?php include('C:\Users\fatwa\PhpstormProjects\solaria\backend\session_start.php') ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Solaria! -- admin</title>

    <link rel="stylesheet" href="https://unpkg.com/purecss@2.0.6/build/pure-min.css"
          integrity="sha384-Uu6IeWbM+gzNVXJcM9XV3SohHtmWE+3VGi496jvgX1jyvDTXfdK+rfZc8C1Aehk5" crossorigin="anonymous">


    <?php include 'admin-css.php' ?>
</head>
<body>
    <?php include 'admin-header.php'?>
<div class="main">
    <div class="salute">
        <h3>Hello, <?= $_SESSION['name'] ?></h3>
        <h3><a href="../logout.php">logout</a></h3>
    </div>


    <table class="pure-table">
        <legend><strong>user-list</strong></legend>

        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Username</th>
            <th scope="col">Name</th>
            <th scope="col">email</th>
            <th scope="col">Action</th>
        </tr>
        </thead>

        <tbody>
        <?php
        include '../conn.php';
        $sql = "select * from user ;";
        $result = mysqli_query($conn, $sql);

        $no = 0;
        while ($solaria_user = mysqli_fetch_array($result)) {
            $no++; ?>
            <tr>

                <td><?= $no ?></td>
                <td><?= $solaria_user['username'] ?> </td>
                <td><?= $solaria_user['name'] ?></td>
                <td><?= $solaria_user['email'] ?></td>


                <td class="action" name="action">
                    <a href="user_update.php? id= <?php echo $solaria_user['id'] ?>"
                       class="pure-button pure-button-primary">Change</a>

                     <a href="del_data.php?    id= <?php echo $solaria_user['id'] ?> "
                         class="pure-button pure-button-error">Delete</a>

                </td>

            </tr>
            <?php
        }
        ?>

        </tbody>
    </table>
    <div class="tool">

        <h3 class="util1">Utilities</h3>

        <ul class="util2">
            <li><a class="util-list" href="addMaterial.php">Add Subject</a></li>
            <li><a class="util-list" href="addProduct.php">Add Product</a></li>
        </ul>

    </div>


</body>
</html>
