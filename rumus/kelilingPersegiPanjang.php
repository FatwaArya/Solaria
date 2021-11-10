<?php 
session_start();
if($_SESSION['status_login']!=true){
  header('location: login.php');
} ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Solaria! | Keliling Persegi Panjang</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">

    <link rel="stylesheet" href="./allRumusNav.css">
    <link rel="icon" href="../media/4x/space.png" type = "image/x-icon">
</head>
<body>
    <div class="navbar-main">
        <div class="navbar">
          <a href="../backend/galaxies.php"><box-icon name='left-arrow-alt'color = 'white' size='lg'></box-icon></a> 
          <h1>Solaria.learn</h1>
        </div>
  </div>



    <!-- luas -->
    <div class="d-flex justify-content-center">
        <div class="card col-sm-4">
          <div class="card-header">
            <h4>Hitung Keliling Persegi Panjang</h4>
          </div>
          <div class="card-body">
              Panjang
            <input type="number" id="panjang" class="form-control">
            <br>
              Lebar
            <input type="number" id="lebar" class="form-control">
            <br>
           

            <button type="button" class="btn btn-info btn-block btn btn-dark"
                 id="hitung">
              Hitung
            </button>
            <br>
            <br>
           
            <input type="text" id="hasil" class="form-control" readonly>
          </div>
        </div>
      </div>
      <script src="https://unpkg.com/boxicons@2.0.9/dist/boxicons.js"></script>
      <script>

        document.getElementById('hitung').addEventListener('click',function(){
            let panjang = document.getElementById("panjang").value;
            let lebar = document.getElementById("lebar").value;
            let a= 2;
            let tempPanjang = parseInt(panjang)
            let templebar = parseInt(lebar)

            let hasil = (templebar+tempPanjang)*a;

            document.getElementById('hasil').value = hasil;

          });
      </script>
</body>
</html>