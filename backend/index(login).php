<?php include 'session_start.php' ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Solaria! | Home</title>

    <link rel="icon" href="../assets/4x/space.png" type="image/x-icon">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap');
        @import url('https://fonts.googleapis.com/css2?family=Bebas+Neue&display=swap');
        @font-face {
            font-family: "league-spartan";
            src: url(../assets/font/LeagueSpartan-Bold.otf);
        }
        
        
        *{
            margin: 0;
            padding: 0;
            scroll-behavior: smooth;
            box-sizing: border-box;
        }
        
        #top{
            display: none; /* Hidden by default */
          position: fixed; /* Fixed/sticky position */
          bottom: 20px; /* Place the button at the bottom of the page */
          right: 30px; /* Place the button 30px from the right */
        
          border: none; /* Remove borders */
          outline: none; /* Remove outline */
          background-color:#6b62ca; /* Set a background color */
        
          cursor: pointer; /* Add a mouse pointer on hover */
          padding: 1px; /* Some padding */
          border-radius: 10px; /* Rounded corners */
          
         
        }
        .bg-img{
            background-image: url("../assets/4x/1.png");
            min-height: 1050px;
            background-position: center;
            background-repeat: no-repeat;
            background-size: cover;
        
        
        }
        
        /* .bg-img::before{
            content: "";
            position: absolute;
            bottom: 0;
            width: 100%;
            height: 50px;
            background: linear-gradient(to top, #070C36,transparent);
            z-index: 1000;
        } */
        .navbar{
            
            top: 0;
            left: 0;
            width: 100%;
            display: flex;
            justify-content: center;
            position: relative;
            padding: 60px;
            
        }
        .profile{
            position: absolute;
            
            font-family: "Montserrat",sans-serif;
            font-weight: 400;
            font-size: x-large;
           
            color: rgb(243, 238, 248);
           text-decoration: none;
           list-style: none;
           
        }
        .navbar.sticky{
            position: fixed;
            padding: 20px ;
            background: #1B1464;
            transition: 0.4s;
          
           
        }
        .nav-link a{
            font-family: "Montserrat",sans-serif;
            font-weight: 400;
            font-size: x-large;
            padding-left: 20px;
            padding-right: 20px;
            color: rgb(243, 238, 248);
           text-decoration: none;
           list-style: none;
        }
        
        .centered-text{
           
            letter-spacing: 2px;
            position: absolute;
            top: 50%;
            bottom: 15px;
            right: 15px;
            left: 50%;
            color: #fff;
            transform: translate(-50%, -50%);
            font-size: 1.5em;
            
        }
        .register{
            padding-top:10px;
            font-family: "Montserrat",sans-serif;
            font-size: 15px;
            text-decoration: underline;
        }
        .solaria{
            
            left: 0;
            position:absolute;
            text-align:center;
            top: 30px;
            width: 100%
        }
        
        .solaria h1{
            font-family: "league-spartan", normal;
            font-weight: bold;
            color: #B122FE;
           padding-bottom: 15px;
        }
        
        .solaria p{
            font-family: "Montserrat", normal;
            font-weight: 200;
           
            padding-bottom: 185px;
        }
        .button{
            
            background-color: #1B1464;
            border: none;
            color: white;
            padding: 15px 32px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 16px;
            border-radius:  10px;
            cursor: pointer;
        }   
        .button:hover{
        background-color: #36307e;
        }
        .button a{
            font-family: "Montserrat",sans-serif;
            font-weight: 500;
            color: white;
            text-decoration: none;
        }
        
        /* to top */
        
        /* about */
        .about-container{
            padding: 100px;
            padding-top: 50px;
        
        }
        .text{
            font-family: "Montserrat",sans-serif;
        
        
            padding: 200px;
            padding-bottom: 100px;
            
         
          /* background:   #070C36; */
          /* background: white; */
        }
        .sticker1 img{
            left:80px;
            float: left;
            width: 200px;
           padding-right: 30px;
        }
        .sticker2 img{
            right:20px;
            float:right;
         
            width: 200px;  
        }
        
        .sticker3 img{
          right:20px;
           float:right;
            width: 200px;  
            
          ;
        }
        .sticker4 img{
         
            float: left;
            width: 200px;  
        }
        .about-container h1{
        
            font-size: 2.5em;
            margin-bottom: 30px;
            color: rgb(0, 0, 0);
            clear: left;
        }
        .about-container p{
            font-size:1em;
            margin-bottom: 30px;
            color: rgb(0, 0, 0);
            clear: left;
        }
        
        /* blog */
        
        .title{
            font-family: "Montserrat",sans-serif;
            text-align: center;
            padding-bottom: 50px;
           
        }
        .blog{
            padding-top:200px;
            padding-bottom: 200px;
        }
        .blog-item {
           display:flex;
           padding: 15px;
          justify-content: center;
        }
        .blog-text{
            font-family: "Montserrat",sans-serif;
            padding-left: 15px;
        
        }
        .blog-text span{
            font-weight: 400;
            font-size:12px;
        }
        .blog-text span ,h2{
            padding-bottom: 10px;
        }
        .blog-text p{
            padding-bottom: 50px;
            
        }
        .blog-text a{
            background-color: #1B1464;
            color: #fff;
            text-decoration: none;
            cursor: pointer;
            padding: 7px;
        }
        
        
        
        /* overlay try */
        
        /* footer */
        .footer-container{
            display:flex;
            background-color:#1B1464;
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

        .footer-col a:hover {
            color: #6f4acc;

        }

        .logout {
            font-family: "Montserrat", sans-serif;
            font-size: medium;
            margin-top: 1.2rem;
            color: white;
        }

        .logout:hover {

            color: #1B1464;
            transition: color, 0.5ms;
        }

        /* media queries */
        @media screen and (max-width: 1200px) {
            .text {
                padding: 0px;
            }

            .blog-text p {
                display: none;
            }
            
        }
        
        @media (max-width: 941px) {
        
        
        
        
            .blog-text span{
                font-weight: 400;
                font-size:12px;
            }
            .blog-text span ,h2{
                padding-bottom: 10px;
            }
            .blog-text p{
                padding-bottom: 13px;
            }
            .blog-text a{
                background-color: #1B1464;
                color: #fff;
                text-decoration: none;
                cursor: pointer;
                padding: 7px;
            }
          }
        </style>
</head>
<body>
    <!-- Header -->
    <div Class ="header">
        <div class="bg-img"  >     
            <div class="navbar" id="navbar">
            <ul class="nav-link">
                 <a href="#">Home</a>
                 <a href="#about">About</a>
                 <a href="#blog">Blog</a>
               <a href="#contact">Contact</a>
               <a href="">Profile</a>


            </ul>

            </div>

            <div class="centered-text">
                <div class="solaria">
                    <h1>SOLARIA!</h1>
                    <h1 style="color: #fff">LEARN ABOUT OUR SOLAR SYSTEM</h1>
                    <p>Welcome, <?= $_SESSION['name'] ?>
                    </p>

                    <div class="button">
                        <a href="./galaxies.php">Learn Now</a>

                    </div>
                    or
                    <div class="button">

                        <a href="storeSolaria.php">Marketplace</a>
                    </div>
                    <div class="logout">
                        <a href="./logout.php">logout</a>

                    </div>
                </div>
            </div>
        </div>


    </div>
   <!-- to top -->
    <div class="up-top" id="top">
        <a href="#">
            <box-icon name='up-arrow-alt' color='white' size='lg'></box-icon>
        </a>
        
    </div>
    

<!-- about -->
    <div class="about-container" id="about">
                <div class="sticker1"> 
                        <img src="../assets/4x/space.png" alt="">
                    </div>
                    
                <div class="sticker2"> 
                    
                    <img src="../assets/4x/Asset 5@4x.png" alt="">
                  </div>
              
    
              
              <div class="text">
                  <h1>About Solaria</h1>
                    <p>Solaria is an easy website for you to learn about astronomy. 
                With ease-looking design, making easy for you to learn.
                <br>
                <br>
                Solaria is an individual task assigned by Musfirati Khasanah.
                This task is very challenging for me, and a very good excerise to push my limitations.
                When i start learning HTML and CSS i thought it was so hard to learn but now im kinda like to make HTML and CSS.
                saya gak tahu harus nulis apa lagi bu saya pakai lorem saya bu Lorem 
                <br>
                ipsum dolor sit amet consectetur, adipisicing elit. Veniam temporibus repellat perspiciatis reiciendis odio debitis itaque, atque quas facere, ullam numquam reprehenderit! Quas eum, fuga molestias voluptates modi aut atque tempore consequatur voluptatem ea error repudiandae sapiente aspernatur? Vero quae nobis totam deserunt adipisci soluta neque cum sit inventore quas.
                <br>
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Recusandae necessitatibus tempora atque animi? Illo totam officiis nihil tempore aut deleniti nam. Voluptatum eius molestiae a fugit, tempore, accusamus molestias laudantium, velit magnam sequi nisi reprehenderit quod incidunt. Eos magnam atque corrupti mollitia? Vel totam quia a nisi amet iusto voluptatum, culpa corrupti adipisci esse ab doloremque eaque laborum suscipit earum non recusandae iste voluptatem, distinctio provident quaerat sit harum soluta quae. Corrupti iure, error impedit quae nisi minus suscipit vero numquam illum velit provident at, similique inventore libero, dolorum sint quo odit modi soluta ipsa cumque deleniti saepe. Nesciunt, doloremque?
                    </p>
                
                </div>
                <div class="sticker3">
                    <img src="../assets/4x/zero g.png" alt="">
        
        
                </div>
                <div class="sticker4">
                    <img src="../assets/4x/Asset 3@4x.png" alt="">
        
        
                </div>
                <i class='bx bxs-up-arrow-circle'></i>
        </div>
    
        <div class="merchandise">


        
        </div>
    <!-- Blog -->
    <div class="blog" >
        <div class="blog-container">
            <div class="title" id="blog">
                <h1>Lastest News</h1>
                <p>Recent news about astronomy</p>
            </div>
            <div class="blog-content">
                <div class="blog-item">
                    <div class="blog-img">
                        <img src="../assets/_110524417_wolfnasa.jpg" alt="" width="512" height="288">
                    </div>
                    <div class="blog-text">
                        <span>16 January 2020</span>
                        <h2>Meet the NASA intern who discovered a new planet on his third day</h2>
                        <p id="removeable1">That's what happened to 17-year-old Wolf Cukier while helping out at the space agency in the United States.
                            <br>
                            <br>
                            He was checking images from its super-strength satellite when he noticed something strange.
                       
                        </p>
                        <a  href="https://www.bbc.com/news/newsbeat-51122019">Read More</a>
                    </div>
                </div>

                <div class="blog-item">
                    <div class="blog-img">
                        <img src="../assets/_110524417_wolfnasa.jpg" width="512" height="288">
                    </div>
                    <div class="blog-text">
                        <span>16 January 2020</span>
                        <h2>Meet the NASA intern who discovered a new planet on his third day</h2>
                        <p id="removeable2">That's what happened to 17-year-old Wolf Cukier while helping out at the space agency in the United States.
                            <br>
                            <br>
                            He was checking images from its super-strength satellite when he noticed something strange.
                        </p>
                        <a href="https://www.bbc.com/news/newsbeat-51122019">Read More</a>
                    </div>
                </div>

                <div class="blog-item">
                    <div class="blog-img">
                        <img src="../assets/_110524417_wolfnasa.jpg" width="512" height="288">
                    </div>
                    <div class="blog-text">
                        <span>16 January 2020</span>
                        <h2>Meet the NASA intern who discovered a new planet on his third day</h2>
                        <p id="removeable3">That's what happened to 17-year-old Wolf Cukier while helping out at the space agency in the United States.
                            <br>
                            <br>
                            He was checking images from its super-strength satellite when he noticed something strange.
                            <br>
                            It turned out to be a new planet, 1,300 light years away from Earth. News just confirmed by NASA.
                        </p>
                        <a href="https://www.bbc.com/news/newsbeat-51122019">Read More</a>
                    </div>
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

                <li><a href="http://www.freepik.com">Background image / coolvector</a></li>
                <li><a href="#">Planet</a></li>
                <li><a href="http://www.freepik.com">Stickers</a></li>
                <li><a href="https://www.bbc.com/news/newsbeat-51122019">News</a></li>
            </ul>
         
        </div>

        <script src="../app.js"></script>
        <script src="https://unpkg.com/boxicons@2.0.9/dist/boxicons.js"></script>
</body>

</html>