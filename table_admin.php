<?php
session_start();
include("config.php");

$user = $_SESSION["username_adm"];
?>

<!doctype html>
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

        if ($user == 'adminBOT') {
          $query = mysqli_query($conn, "SELECT * FROM presensi WHERE id_kom = 1");
        } else if ($user == 'adminUX') {
          $query = mysqli_query($conn, "SELECT * FROM presensi WHERE id_kom = 2");
        } else if ($user == 'adminCP') {
          $query = mysqli_query($conn, "SELECT * FROM presensi WHERE id_kom = 3");
        } else if ($user == 'adminCS') {
          $query = mysqli_query($conn, "SELECT * FROM presensi WHERE id_kom = 4");
        } else if ($user == 'adminDM') {
          $query = mysqli_query($conn, "SELECT * FROM presensi WHERE id_kom = 5");
        } else if ($user == 'adminGR') {
          $query = mysqli_query($conn, "SELECT * FROM presensi WHERE id_kom = 6");
        } else if ($user == 'adminIWDC') {
          $query = mysqli_query($conn, "SELECT * FROM presensi WHERE id_kom = 7");
        } else if ($user == 'adminMAD') {
          $query = mysqli_query($conn, "SELECT * FROM presensi WHERE id_kom = 8");
        } else {
          $query = mysqli_query($conn, "SELECT * FROM presensi");
        }

        while ($list = mysqli_fetch_assoc($query)) {
          echo "<tr>";

          echo "<td>" . $list['fullname'] . "</td>";
          echo "<td>" . $list['nim'] . "</td>";
          echo "<td>" . $list['id_kom'] . "</td>";
          echo "<td>" . $list['pertemuan'] . "</td>";
          echo "<td>" . $list['date'] . "</td>";
          echo "<td>" . $list['saran'] . "</td>";
          echo "<td>";
          echo "<a href='update_admin.php?id=".$list['id']."' type='button' class='btn'>Update</a>";
          echo "<a href='delete.php?id=".$list['id']."' type='button' class='btn'>Delete</a>";
          echo "</td>";

          echo "</tr>";
        }
        
        ?>
      </tr>
    </tbody>
  </table>
  <div>
    <a href="logout.php"><button type="button" class="btn btn-home">Logout</button></a>
  </div>
</body>

</html>