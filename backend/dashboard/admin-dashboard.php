<?php
session_start();
if ($_SESSION['status_login'] != true) {
    header('location: login.php');
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Solaria! -- admin</title>

    <link rel="stylesheet" href="https://unpkg.com/purecss@2.0.6/build/pure-min.css" integrity="sha384-Uu6IeWbM+gzNVXJcM9XV3SohHtmWE+3VGi496jvgX1jyvDTXfdK+rfZc8C1Aehk5" crossorigin="anonymous">


    <style>
        @import url('https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap');
        @import url('https://fonts.googleapis.com/css2?family=Bebas+Neue&display=swap');

        @font-face {
            font-family: "league-spartan";
            src: url(/assets/font/LeagueSpartan-Bold.otf);
        }


        * {
            padding: 0;
            margin: 0;

        }

        .header {
            display: flex;
            background-color: #020A2E;
            height: 72px;
        }

        .navbar {
            font-family: "Montserrat", sans-serif;
            font-weight: 400;
            padding: 10px;
            color: #fff;
            display: flex;
            align-items: center;
            text-align: center;
            justify-content: flex-start;


        }

        .main {
            min-height: 1050px;
            background-position: center;
            background-repeat: no-repeat;
            background-size: cover;
            margin-left: 100px;
            margin-right: 100px;

        }

        .salute {

            display: flex;
            justify-content: space-between;
            padding-top: 1rem;
            padding-bottom: 2rem;
        }

        .pure-table {
            width: 100%;
            margin-right: auto;
            margin-left: auto;
            background-color: none;

        }

        .action {
            align-items: center;
        }

        .container{
            display: flex;
            justify-content: space-around;
            margin-top: 1.2rem;

        }
        .form-add{
            width: 700px;
        }
        .log{
            width: 700px;
        }
        .dt-log{
            display: block;
            width: 100%;
            padding: 0.3rem 0;
            margin-bottom: 0.3em;
            color: #333;
            border-bottom: 1px solid #e5e5e5;
        }
    </style>
</head>
<body>
<div class="header">
    <div class="navbar">
        <h1>Solaria</h1>

        <p>AD</p>

    </div>

</div>
<script src="https://unpkg.com/boxicons@2.0.9/dist/boxicons.js"></script>

<div class="main">
    <div class="salute">
        <h3>Hello, <?= $_SESSION['name'] ?></h3>
        <h3><a href="../logout.php">logout</a></h3>
    </div>


    <table class="pure-table">
        <legend><strong>Add Material</strong></legend>

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
        while ($data_siswa = mysqli_fetch_array($result)) {
            $no++; ?>
            <tr>

                <td><?= $no ?></td>
                <td><?= $data_siswa['username'] ?> </td>
                <td><?= $data_siswa['name'] ?></td>
                <td><?= $data_siswa['email'] ?></td>


                <td name="action">
                    <a href="user_update.php? id= <?php echo $data_siswa['id'] ?>"
                       class="pure-button pure-button-primary">Change</a>

                    | <a href="del_data.php?    id= <?php echo $data_siswa['id'] ?> "
                         class="pure-button pure-button-error">Delete</a>

                </td>

            </tr>
            <?php
        }
        ?>

        </tbody>
    </table>
<!--form add materi and history-->
    <div class="container">
        <div class="form-add">
            <form action="admin-dashboard.php" class="pure-form pure-form-stacked" enctype="multipart/form-data" method="post">
                <fieldset>
                    <legend><strong>Add Material</strong></legend>
                    <label for="text">Material Name</label>
                    <input class="pure-input-2-3"type="text" name="name">
                    <label for="text">Description</label>
                    <textarea class="pure-input-2-3" placeholder="write something down here..." name="desc"></textarea>
                    <label >File</label>
                    <input type="file" name="file"/>
                    <span class="pure-form-message">This is a required field.</span>


                    <button type="submit" name="sumbit" class="pure-button pure-button-primary">Add</button>
                </fieldset>
            </form>
        </div>
        <?php
        include '../conn.php';
            if (isset($_POST['sumbit'])){
                $matName = $_POST['name'];
                $desc = $_POST['desc'];
                $file = $_FILES['file'];



                if (!is_dir('uploads/' . $_SESSION['name'].'/')) {
                    mkdir('uploads/' . $_SESSION['name'].'/');
                }
//                $result = move_uploaded_file($file['tmp_name'], $uploadPath);

                $uploadPath = 'uploads/' . $_SESSION['name'].'/'.basename($_FILES['file']['name']);



                if(move_uploaded_file($_FILES['file']['tmp_name'], $uploadPath))
                {

                  $date = date('Y-m-d H:i:s');
                $sql = "insert into materi (nama_materi, date, description , file) values ('".$matName."','".$date."','".$desc."','".$uploadPath."')";
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
                    <th scope="col">Status</th>
                    <th scope="col">Action</th>
                </tr>
                </thead>

                <tbody>
                <?php
                include '../conn.php';
                $sql = "select * from user ;";
                $result = mysqli_query($conn, $sql);

                $no = 0;
                while ($data_siswa = mysqli_fetch_array($result)) {
                    $no++; ?>
                    <tr>

                        <td><?= $no ?></td>
                        <td><?= $data_siswa['username'] ?> </td>
                        <td><?= $data_siswa['name'] ?></td>
                        <td><?= $data_siswa['email'] ?></td>


                        <td name="action">
                            <a href="user_update.php? id= <?php echo $data_siswa['id'] ?>"
                               class="pure-button pure-button-primary">Change</a>

                            | <a href="del_data.php?    id= <?php echo $data_siswa['id'] ?> "
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
</div>

</body>
</html>
