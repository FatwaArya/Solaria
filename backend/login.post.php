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
                
                $_SESSION['status_login']=true;
                header('location: galaxies.php');
                  
                
               
            }else{
                echo "<script>alert('Username dan Password tidak benar');location.href='login.php';</script>";
    
            }}
    


            
      

}