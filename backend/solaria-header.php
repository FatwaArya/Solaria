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
    
    <style>
      @import url('https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap');
      @import url('https://fonts.googleapis.com/css2?family=Bebas+Neue&display=swap');
      @font-face {
      font-family: "league-spartan";
      src: url(media/font/LeagueSpartan-Bold.otf);
      }


      *{
    padding:0;
    margin:0;
  
    } 
.header {
  display: flex;
    background-color: #020A2E;
    height: 72px;
}
.navbar{
    font-family: "Montserrat",sans-serif;
    font-weight: 400;
    padding: 10px;
    color: #fff;
    display: flex;
    align-items: center;
    text-align: center;
    justify-content: flex-start;
    

}

    </style>
</head>
<body>
<div class="header">
        <div class="navbar">
          <a href="galaxies.html"><box-icon name='left-arrow-alt'color = 'white' size='lg'></box-icon></a> 
          <h1>Solaria</h1>

        </div>
    
  </div>
  <script src="https://unpkg.com/boxicons@2.0.9/dist/boxicons.js"></script>
  

</body>
</html>