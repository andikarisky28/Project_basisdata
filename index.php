<?php

include("config.php");

session_start();

if (!isset($_SESSION['username'])) {
  header("Location: login.php");
}

?>

<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <link rel="stylesheet" type="text/css" href="css/index.css">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Hind:wght@700&family=Lobster&display=swap" rel="stylesheet">
  <title>Presensi</title>
</head>

<body>
  <br>
  <div class="judul"><span class="Presensi">Presensi</span><span style="color: #ABB3C4;" class="Komunitas">Komunitas</span></div>
  <br>

  <div class="home">
    <div class="row row-cols-1 row-cols-md-4 g-4 ">
      <div class="col">
        <div class="card h-100">
          <img src="https://i.ibb.co/KhfrbgC/logo-agribot-1-1.png" class="card-img-top" alt="Agribot">
          <div class="card-body">
            <h5 class="card-title">Agribot</h5>
          </div>
          <a href="presensi_agribot.php"><button type="button" name="in_ab" class="btn btn-primary">Masuk</button></a>
        </div>
      </div>
      <div class="col">
        <div class="card h-100">
          <img src="https://i.ibb.co/y62KhM6/Group-1.png" class="card-img-top" alt="Agriux">
          <div class="card-body">
            <h5 class="card-title">Agriux</h5>
          </div>
          <a href="presensi_agriux.php"><button type="button" name="in_aux" class="btn btn-primary">Masuk</button></a>
        </div>
      </div>
      <div class="col">
        <div class="card h-100">
          <img src="https://i.ibb.co/qrG8nQn/logo-cp-1.png" class="card-img-top" alt="...">
          <div class="card-body">
            <h5 class="card-title">Competitive <br> Programming</h5>
          </div>
          <a href="presensi_cp.php"><button type="button" name="in_cp" class="btn btn-primary">Masuk</button></a>
        </div>
      </div>
      <div class="col">
        <div class="card h-100">
          <img src="https://i.ibb.co/8BxB7w8/Group-13.png" class="card-img-top" alt="...">
          <div class="card-body">
            <h5 class="card-title">Cyber<br>Security</h5>
          </div>
          <a href="presensi_cs.php"><button type="button" name="in_cs" class="btn btn-primary">Masuk</button></a>
        </div>
      </div>
    </div>

  </div><br>

  </div>
  <div class="home">
    <div class="row row-cols-1 row-cols-md-4 g-4">
      <div class="col">
        <div class="card h-100">
          <img src="https://i.ibb.co/sH4dKkX/logo-daming-1.png" class="card-img-top" alt="...">
          <div class="card-body">
            <h5 class="card-title">Data<br>Mining</h5>
          </div>
          <a href="presensi_daming.php"><button type="button" name="in_dm" class="btn btn-primary">Masuk</button></a>
        </div>
      </div>
      <div class="col">
        <div class="card h-100">
          <img src="https://i.ibb.co/ZmVcgvm/logo-gamedev-1.png" class="card-img-top" alt="...">
          <div class="card-body">
            <h5 class="card-title">Game<br>Reality</h5>
          </div>
          <a href="presensi_gary.php"><button type="button" name="in_gr" class="btn btn-primary">Masuk</button></a>
        </div>
      </div>
      <div class="col">
        <div class="card h-100">
          <img src="https://i.ibb.co/d28DGcR/logo-iwdc-1.png class=" card-img-top" alt="...">
          <div class="card-body">
            <h5 class="card-title">IWDC</h5>
          </div>
          <a href="presensi_iwdc.php"><button type="button" name="in_iwdc" class="btn btn-primary">Masuk</button></a>
        </div>
      </div>
      <div class="col">
        <div class="card h-100">
          <img src="https://i.ibb.co/WnsxyH7/logo-mad-1.png" class="card-img-top" alt="...">
          <div class="card-body">
            <h5 class="card-title">Mobile Apps <br> Development</h5>
          </div>
          <a href="presensi_mad.php"><button type="button" name="in_mad" class="btn btn-primary">Masuk</button></a>
        </div>
      </div>
    </div> <br><br>
  </div> <br>
</body>

<body>
  <div>
    <a href="table_user.php"><button style="display: flex; margin: auto;" type="button" class="btn btn-primary">Kehadiran</button></a><br>
    <a href="logout.php"><button style="display: flex; margin: auto;" type="button" class="btn btn-primary">Logout</button></a><br>
  </div>
</body>

</html>