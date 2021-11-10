<?php session_start();
if($_SESSION['status_login']!=true){
  header('location: login.php');
} ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Solaria! | Pick your Galaxies</title>
   
    <link rel="icon" href="media/4x/space.png" type = "image/x-icon">

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
                background-color: #020A2E;
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
                margin-bottom: 200px;

            }
            .navbar h1{
                padding: 10px;
            }
            .title{
                font-family: "Bebas Neue",sans-serif;
                font-weight: 400;
                font-size:30px;
                text-align: center;
                padding: 20px;
            
            }


            .galaxies{
                display:flex;
                justify-content: space-evenly;
                font-family: "Montserrat",sans-serif;
                font-weight: 400;
            }
            .milky-way{
                text-align: center;
                border: 1px black solid;
                border-radius: 20px;
                padding: 10px;
                display: inline-block;
                width: 500px;
                height: 100px;
                
                
            }
            .milky-way a{
                text-decoration: none;
                color: black;
            }
            .milky-way:hover{
                /* https://codersblock.com/blog/creating-glow-effects-with-css/ outer glow */
            
            
                box-shadow:
                0 0 60px 20px #fff,  /* inner white */
                0 0 60px 20px #f0f, /* middle magenta */
                0 0 140px 20px #0ff; /* outer cyan */
            }
            .andromeda{
                text-align: center;
                border: 1px black solid;
                border-radius: 20px;
                padding: 10px;
                display: inline-block;
                width: 500px;
                height: 100px;
                cursor: pointer;
            }
            .andromeda:hover{
                /* https://codersblock.com/blog/creating-glow-effects-with-css/ outer glow */
            
            
                box-shadow:
                0 0 60px 20px #fff,  /* inner white */
                0 0 60px 20px #f0f, /* middle magenta */
                0 0 140px 20px #0ff; /* outer cyan */
            }



            /* rumus */
            .rumus-container{
                font-family: "Montserrat",sans-serif;
                display:flex;
                flex-wrap: wrap;
                justify-content:space-around;
                margin-bottom: 500px;

            }
            .rumus-container a{
                color: black;
            }

            .luasPersegi{
                padding: 20px;
                border-radius:20px;
                border: 1px black solid;
                cursor: pointer;

            }
            .kelilingPersegi{
                padding: 20px;
                border-radius:20px;
                border: 1px black solid;
                cursor: pointer;

            }
            .luasPersegiPanjang{
                padding: 20px;
                border-radius:20px;
                border: 1px black solid;
                cursor: pointer;

            }
            .kelilingPersegiPanjang{
                padding: 20px;
                border-radius:20px;
                border: 1px black solid;
                cursor: pointer;

            }

            /* footer */
            .footer-container{
                display:flex;
                background-color:#020A2E;
                justify-content: space-evenly;
                padding: 100px;
            }
            .footer-col{
                font-family: "Montserrat",sans-serif;
                color: #fff;
                
            }
            .footer-col li,a{
                text-decoration: none;
                color: #fff;
                list-style: none;
                padding-top: 5px;
            }
            .footer-col ul{
                padding-top: 10px;
            
            }
            .footer-col hr{
                width: 154px;
            }
            .footer-col a:hover{
                color: #6f4acc;

            }
    </style>
</head>
<body>
    <div class="header">
          <div class="navbar">
            <a href="./index(login).php"><box-icon name='left-arrow-alt'color = 'white' size='lg'></box-icon></a> 
            <h1>Solaria</h1>
          </div>
    </div>

    <div class="content">
        <div class="title">
            <h2>Pick Your Galaxies</h2>
           
        </div>

        <!--  main-container-->
        <div class="main-container">
         <div class="galaxies">
                <div class="milky-way" id="milkyway">
                    <a href="../planet.php">

                        <h3>Milky Way Galaxy</h3>
                    <p>The Milky Way is the galaxy that includes our Solar System, with the name describing the galaxy's appearance from Earth: a hazy band of light seen in the night sky formed from stars that cannot be individually distinguished by the naked eye.</p>
                
                    </a>
                    </div>
                <div class="andromeda" id="andromeda">
                    <h3>Andromeda Galaxy</h3>
                    <p>The Milky Way is the galaxy that includes our Solar System, with the name describing the galaxy's appearance from Earth: a hazy band of light seen in the night sky formed from stars that cannot be individually distinguished by the naked eye.</p>
                </div>

            </div>
      

    </div>
<!-- latihan -->
    <div class="rumus-rumus">
    <div class="title">
        <h2>Rumus-rumus</h2>
       
    </div>
    <div class="rumus-container">

    <div class="luasPersegi">
        <a href="../rumus/luasPersegi.php">Rumus Luas Persegi</a>
    </div>
    <div class="kelilingPersegi">
        <a href="/rumus/kelilingPersegi.php">Rumus Keliling Persegi</a>
    </div>


    <div class="luasPersegiPanjang">
        <a href="/rumus/luasPersegiPanjang.php">Rumus Luas Persegi Panjang</a>
    </div>
    <div class="kelilingPersegiPanjang">
        <a href="/rumus/kelilingPersegiPanjang.php">Rumus Keliling Persegi Panjang</a>
    </div>


    </div>

</div>


        </div>
   
























<!-- contact/footer -->
<div class="footer-container" id="contact">
    <div class="footer-col">
        <h4>Follow Us</h4>
        <hr>
        <ul>
            <li><a href="https://www.instagram.com/sosrobahu_/?hl=en">Our instagram</a></li>
            <li><a href="https://github.com/FatwaArya">Our github</a></li>
            <li><a href="https://discord.gg/QcsJ967">Join our discord server</a></li>
        </ul>
    </div>

    <div class="footer-col">
        <h4>Other Project</h4>
        <hr>
        <ul>
            <li><a href="#">Planet Zoo</a></li>
            <li><a href="#">Coming Soon!</a></li>
            <li><a href="#">Coming Soon!</a></li>
        </ul>
    </div>

    <div class="footer-col">
        <h4>Credit</h4>
        <hr>
        <ul>
            <li><a href="http://www.freepik.com">Background image / coolvector</a></li>
            <li><a href="#">Planet</a></li>
            <li><a href="http://www.freepik.com">Stickers</a></li>
            <li><a href="https://www.bbc.com/news/newsbeat-51122019">News</a></li>
        </ul>
     
    </div>






    <script src="https://unpkg.com/boxicons@2.0.9/dist/boxicons.js"></script>
    <script >
        let andromeda = document.getElementById('andromeda')

andromeda.addEventListener('click',function(){
    alert('This information is currently unavailable ');
})
    </script>
</body>
</html>