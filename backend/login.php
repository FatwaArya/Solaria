

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="icon" href="/assets/4x/space.png" type = "image/x-icon">

    <title>Login</title>
</head>
<body>

<section class="vh-100" style=" background-image: url('../assets/hero.svg') ;
    
 
    
    background-position: center; 
    background-repeat: no-repeat; 
    background-size: cover;
    background-color: #040D21;
    
    ">

  <div class="container h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="d-flex justify-content-center
      ">
        <div class="card card text-white bg-dark mb-3" style="border-radius: 25px;
                                                              width: 700px;
                                                              ">
          <div class="card-body w-800" >
            <div class="d-flex justify-content-center">
              <div class="col-md-10 col-lg-6 col-xl-5 order-2 order-lg-1">


                  <a class ="text-decoration-none text-white" href="../index.php"><p class="text-center h1 fw-bold mb-2 mx-1 mx-md-4 mt-4" >Solaria!</p></a>
              

                <form action="login.php"  method="post" >

                  <div class="d-flex flex-row align-items-center mb-4">
                    <i class="fas fa-user fa-lg me-3 fa-fw"></i>
                    <div class="form-outline flex-fill mb-0">
                        <label class="form-label" for="form3Example1c">Username</label>
                      <input type="text" id="form3Example1c" class="form-control"  name="username" />
                    </div>
                  </div>
              
             

                  <div class="d-flex flex-row align-items-center mb-4">
                    <i class="fas fa-lock fa-lg me-3 fa-fw"></i>
                    <div class="form-outline flex-fill mb-0">
                        <label class="form-label" for="form3Example4c">Password</label>
                      <input type="password" id="form3Example4c" class="form-control" name="password" />
                    </div>
                  </div>
                  <?php

if($_POST){

    include "conn.php";
    $username=$_POST['username'];
    $password=$_POST['password'];
    

    //buat 2 tabel 
    //user table and admin tabel
    // so there is two queries

    $sql_user=mysqli_query($conn,"select * from user where username = '".$username."' and password = '".md5($password)."' " );
     $sql_admin=mysqli_query($conn,"select * from admin where username = '".$username."' and password = '".$password."' " );
    //validate user
    
    //validate admin
    

     //right here
     if(empty($username)){
        echo "<script>alert('Username tidak boleh kosong');location.href='login.php';</script>";
    } elseif(empty($password)){
        echo "<script>alert('Password tidak boleh kosong');location.href='login.php';</script>";
    } else {
        if(mysqli_num_rows($sql_admin)>0){
            
           
            $dt_login=mysqli_fetch_assoc($sql_admin);
            session_start();
            $_SESSION['id']=$dt_login['id'];
            $_SESSION['username']=$dt_login['username'];
            $_SESSION['name']=$dt_login['name'];
            $_SESSION['p_picture']=$dt_login['profile_picture'];
            $_SESSION['status_login']=true;
                header('location: ./dashboard/admin-dashboard.php');
       
            }elseif(mysqli_num_rows($sql_user)>0){
                    // and here
                
                
                $dt_login=mysqli_fetch_assoc($sql_user);
                session_start();
                $_SESSION['id']=$dt_login['id'];
                $_SESSION['username']=$dt_login['username'];
                $_SESSION['name']=$dt_login['name'];
                $_SESSION['img'] = $dt_login['profile_picture'];
                $_SESSION['status_login']=true;
                header('location: index(login).php');
                  
                
               
            }else{?>
           <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>Holy guacamole!</strong> You should check again your username and password!
             <button type="button" class="close" data-dismiss="alert" aria-label="hidden">
                <span aria-hidden="true">&times;</span>
            </button>
          </div>
    
<?php  }}
}?>




                    <div class="d-flex justify-content-sm-between mx-3 pb-4">
                      <button type="submit" class=" btn btn-dark btn-lg  border border-info"  >login</button>
                     

                    
                    </div>

                    

                </form>

              </div>
           
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>

