<?php include "../header.php"; ?>

<!DOCTYPE html>
<html>
<head>
    

    <title>Change user</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    
</head>
<body>
    <?php 
    include "../conn.php";
    $qry=mysqli_query($conn,"select * from user  where 
    id = '".$_GET['id']."';");
    $solaria_user=mysqli_fetch_array($qry);
    ?>
 

    <div class="container-md mt-5">
        <h1>CU-<?= $solaria_user['id']?></h1>
        <form action="./user_update.php" method="post">
        <input type="hidden" name="id" value="<?= $solaria_user['id']?>">
        username
  <input type="text" name="username" value=   "<?=$solaria_user['username']?>" class="form-control">
         email 
  <input type="email" name="email" value="<?=$solaria_user['email']?>" class="form-control">
        password
        <input type="password" name="password" class="form-control" >
        <input type="submit" name="submit" value="submit" class="btn btn-primary my-4">


    </form>
    
    </div>
    <?php 
     if($_POST){
        $id = $_POST['id'];
        $username = $_POST['username'];
        $email = $_POST['email'];
        $password = $_POST['password'];
            if(empty($username)|| empty($email)){?>
                    <div class="alert alert-warning alert-dismissible fade show" role="alert">
                        <strong>Holy guacamole!</strong> You should check in on some of those fields below.
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
           
        <?php  }else{
             
                if(empty($password)){
                    $update=mysqli_query($conn,"update user set username='".$username."',email='".$email."' where id = '".$id."' ") or die(mysqli_error($conn));
                    if($update){?>
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <strong>Good job Admin!</strong> Success update user!
                        <?php header('location: admin-dashboard.php'); ?>
                        </div>
                    <?php }else{?>
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <strong>Try again Admin!</strong> Failed update user!
                        
                        </div>
                        <?php } ?>
                <?php }else{
                    $update=mysqli_query($conn,"update user set username='".$username."',email='".$email."',password='".md5($password)."' where id = '".$id."' ") or die(mysqli_error($conn));
                    if($update){?>
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <strong>Good job Admin!</strong> Success update user!
                        <?php header('location: admin-dashboard.php'); ?>
                        </div>
                    <?php }else{?>
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <strong>Try again Admin!</strong> Failed update user!

                        </div>
                        <?php } ?>
                        
                <?php } ?>


         <?php } ?>

    <?php } ?>


    
  


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>

</html>
