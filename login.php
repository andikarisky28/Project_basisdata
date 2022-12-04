<?php

include("config.php");
session_start();

if (isset($_SESSION['username'])) {
  header("Location: index.php");
}

if (isset($_POST['submit'])) {
  $username = $_POST['username'];
  $password = md5($_POST['password']);

  $query = "SELECT * FROM anggota WHERE username = '$username' AND password = '$password'";
  $result = mysqli_query($conn, $query);
  if ($result->num_rows > 0) {
    $row = mysqli_fetch_assoc($result);
    $_SESSION['username'] = $row['username'];
    header("Location: index.php");
  } else {
    $username_adm = $_POST['username'];
    $password_adm = md5($_POST['password']);

    $query = "SELECT * FROM admin WHERE username_adm = '$username_adm' AND password_adm = '$password_adm'";
    $result = mysqli_query($conn, $query);
    if ($result->num_rows > 0) {
      $row = mysqli_fetch_assoc($result);
      $_SESSION['username_adm'] = $row['username_adm'];
      header("Location: table_admin.php");
    } else {
      echo "<script>alert('Wrong Username or Password!')</script>";
    }
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
  <link rel="stylesheet" type="text/css" href="css/login.css">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Hind:wght@700&family=Lobster&display=swap" rel="stylesheet">
  <title>Login</title>
</head>

<body>
  <form action="" method="POST">
    <h1>LOGIN</h1>
    <div class="form-floating mb-3">
      <input type="text" class="form-control" id="floatingInput" placeholder="Username" name="username">
      <label for="floatingInput">Username</label>
    </div>
    <div class="form-floating">
      <input type="password" class="form-control" id="floatingPassword" placeholder="Password" name="password">
      <label for="floatingPassword">Password</label>
    </div>
    <a href="index.php"><button type="submit" name="submit" class="btn btn-primary">Login</button></a>
    <p class="dont">Don't have an account? <b><a href="signup.php">Sign up</a></b></p>
  </form>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  <div class="gambar1"><img src="https://i.ibb.co/DMQsC2V/Vector-10.png" /></div>

</body>

</html>