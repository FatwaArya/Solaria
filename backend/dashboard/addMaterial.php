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

    <title>Solaria -- Add Material</title>
    <?php include 'admin-css.php' ?>

</head>
<body>
<?php include 'admin-header-arrow.php'?>

<div class="container">
    <div class="form-add">
        <form action="addMaterial.php" class="pure-form pure-form-stacked" enctype="multipart/form-data" method="post">
            <fieldset>
                <legend><strong>Add Material</strong></legend>
                <label for="text">Material Name</label>
                <input class="pure-input-2-3" type="text" name="matName">
                <label for="text">Description</label>
                <textarea class="pure-input-2-3" placeholder="write something down here..." name="desc"></textarea>
                <label>File</label>
                <input type="file" name="file"/>
                <span class="pure-form-message">This is a required field.</span>


                <button type="submit" name="sumbit" class="pure-button pure-button-primary">Add</button>
            </fieldset>
        </form>
    </div>
    <?php
    include '../conn.php';
    if (isset($_POST['sumbit'])){
        $matName = $_POST['matName'];
        $desc = $_POST['desc'];
        $file = $_FILES['file'];


        if (!is_dir('uploads/' . $_SESSION['name'] . '/')) {
            mkdir('uploads/' . $_SESSION['name'] . '/');
        }
//                $result = move_uploaded_file($file['tmp_name'], $uploadPath);

        $uploadPath = 'uploads/' . $_SESSION['name'] . '/' . $_FILES['file']['name'];
        $fileName = basename($uploadPath);


        if (move_uploaded_file($_FILES['file']['tmp_name'], $uploadPath)) {

            $date = date('Y-m-d H:i:s');
            $sql = "insert into materi (nama_materi, date, description , file) values ('" . $matName . "','" . $date . "','" . $desc . "','" . $fileName . "')";
            $result = $conn->query($sql);
        }

        else {

            echo "Problem uploading file";

        }


    }
    ?>
    <div class="log">
        <legend class="dt-log"><strong>Material Log</strong></legend>
        <table class="pure-table ">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Nama Materi</th>
                <th scope="col">Date Created</th>
                <th scope="col">Description</th>

                <th scope="col">Action</th>
            </tr>
            </thead>

            <tbody>
            <?php
            include '../conn.php';
            $sql = "select * from materi ;";
            $result = mysqli_query($conn, $sql);

            $no = 0;
            while ($solaria_subject = mysqli_fetch_array($result)) {
                $no++; ?>
                <tr>

                    <td><?= $no ?></td>
                    <td><?= $solaria_subject['nama_materi'] ?> </td>
                    <td><?= $solaria_subject['date'] ?></td>
                    <td><?= $solaria_subject['description'] ?></td>


                    <td class="action" name="action">
                        <a href="user_update.php? id= <?php echo $solaria_subject['id_subject'] ?>"
                           class="button-small pure-button pure-button-primary">Change</a>

                        <a href="delMateri.php?id= <?php echo $solaria_subject['id_subject'] ?> "
                           class=" pure-button pure-button">Delete</a>

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
</div>

</body>
</html>

