<?php

session_start();
include("config.php");

if (isset($_POST['submit'])) {

  $user     = $_SESSION["username"];
  $getid    = mysqli_fetch_array(mysqli_query($conn, "SELECT * FROM anggota WHERE username = '$user'"));
  $userid   = $getid['id_user'];
  $nim      = $_POST['nim'];
  $fname    = $_POST['fullname'];
  $tanggal  = $_POST['tanggal'];
  $meet     = $_POST['pertemuan'];
  $saran    = $_POST['saran'];
  $idkom    = 6;

  if (!empty(trim($nim)) && !empty(trim($fname)) && !empty(trim($tanggal)) && !empty(trim($meet))) {

    $query = "INSERT INTO presensi (id_user, nim, fullname, id_kom, pertemuan, date, saran) VALUES ('$userid','$nim','$fname','$idkom','$meet','$tanggal','$saran')";
    $result = mysqli_query($conn, $query);
    if ($result) {
      header("Location: selesai.php");
      $userid = "";
      $nim = "";
      $fname = "";
      $tanggal = "";
      $meet = "";
      $saran = "";
      $idkom = "";
    } else {
      echo "<script>alert('Oops! Something went wrong.')</script>";
    }
  } else {
    echo "<script>alert('Form tidak boleh kosong!')</script>";
  }
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
  <link rel="stylesheet" type="text/css" href="css/presensi.css">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Hind:wght@700&family=Lobster&display=swap" rel="stylesheet">
  <title>Presensi</title>
</head>

<body>
  <form action="" method="post">
    <div class="judul"><span class="presensi">PRESENSI</span><span class="komun">GAME REALITY</span></div>
    <div class="mb-3">
      <label for="exampleFormControlInput1" class="form-label">Nama</label>
      <input type="text" class="form-control" name="fullname" id="exampleFormControlInput1" placeholder="Nama Lengkap">
    </div>
    <div class="mb-3">
      <label for="exampleFormControlInput1" class="form-label">NIM</label>
      <input type="text" class="form-control" name="nim" id="exampleFormControlInput1" placeholder="G6********">
    </div>
    <div class="mb-3">
      <label for="exampleFormControlInput1" class="form-label">Tanggal Pertemuan</label>
      <input type="date" class="form-control" name="tanggal" id="exampleFormControlInput1" placeholder="dd/mm/yyyy">
    </div>
    <div class="mb-3">
      <label for="exampleFormControlInput1" class="form-label">Pertemuan Ke:</label>
      <input type="text" class="form-control" name="pertemuan" id="exampleFormControlInput1" placeholder="(isi dengan angka)">
    </div>
    <div class="mb-3">
      <label for="exampleFormControlTextarea1" class="form-label">Kritik dan Saran</label>
      <textarea class="form-control" name="saran" id="exampleFormControlTextarea1" rows="3"></textarea>
    </div>

    <a href="selesai.php"><button type="submit" name="submit" class="btn btn-primary">Kirim</button></a>
  </form>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  <div class="gambar1"><img src="https://i.ibb.co/DMQsC2V/Vector-10.png" /></div>

</body>

</html>