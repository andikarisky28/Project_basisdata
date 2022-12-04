<?php
session_start();
include("config.php");

$user = $_SESSION["username"];
$getid = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM anggota WHERE username = '$user'"));
$userid = $getid['id_user'];
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" type="text/css" href="css/tablestyle.css">
  <title>Data Presensi</title>
</head>

<body>
  <table class="content-table">
    <thead>
      <tr>
        <th>Nama Lengkap</th>
        <th>NIM</th>
        <th>ID Komunitas</th>
        <th>Pertemuan</th>
        <th>Tanggal</th>
        <th>Kritik & Saran</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <?php
        $query = mysqli_query($conn, "SELECT * FROM presensi WHERE id_user = '$userid'");

        while ($list = mysqli_fetch_assoc($query)) {
          $list['id_user'];
          echo "<tr>";
          
          echo "<td>" . $list['fullname'] . "</td>";
          echo "<td>" . $list['nim'] . "</td>";
          echo "<td>" . $list['id_kom'] . "</td>";
          echo "<td>" . $list['pertemuan'] . "</td>";
          echo "<td>" . $list['date'] . "</td>";
          echo "<td>" . $list['saran'] . "</td>";
          echo "<td>";
          echo "<a href='update_user.php?id=".$list['id']."' type='button' class='btn'>Update</a>";
          echo "</td>";

          echo "</tr>";
        }
        ?>
      </tr>
    </tbody>
  </table>
  <div>
    <a href="index.php"><button type="button" class="btn btn-home">Home</button></a>
  </div>
</body>

</html>