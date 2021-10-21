<?php 
session_start();
if($_SESSION['status_login']!=true){
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
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
</head>
<body>

<h1>hello admin <?= $_SESSION['name']  ?></h1>
<h1><a href="../logout.php">logout</a></h1>
  
<table class="table table-dark">
  <thead>
    <tr>
      <th scope="col">no</th>
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
        $result=mysqli_query($conn,$sql);
        $no = 0;
        $no=0;
        while($data_siswa=mysqli_fetch_array($result)){
        $no++;?>
        <tr>             

        <td><?=$no?></td>
        <td><?=$data_siswa['username']?> </td> 
        <td><?=$data_siswa['name']?></td> 
        <td><?=$data_siswa['email']?></td>
     



    <td>
        <a href="user_update.php? id= <?php echo $data_siswa['id']?>" class="btn btn-success">Change</a> 
        
        | <a href="del_data.php?    id= <?php  echo $data_siswa['id']?> " class="btn btn-danger">Delete</a>
    
    </td>

        </tr>
        <?php 
        }
        ?>
    
  </tbody>
</table>
</body>
</html>