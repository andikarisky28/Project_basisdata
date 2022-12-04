<?php

include("config.php");
error_reporting(0);
session_start();

if (isset($_SESSION['username'])) {
	header("Location: login.php");
}
  
if (isset($_POST['submit'])) {
	
	$nim = $_POST['nim'];
	$fname = $_POST['fullname'];
	$username = $_POST['username'];
	$password = md5($_POST['password']);
	
	if (!empty(trim($nim)) && !empty(trim($fname)) && !empty(trim($username)) && !empty(trim($password))) {
		$query = "SELECT * FROM anggota WHERE username = '$username' OR nim = '$nim'";
		$result = mysqli_query($conn, $query);
		if (!$result->num_rows > 0) {
			$query = "INSERT INTO anggota (nim, fullname, username, password) VALUES ('$nim','$fname','$username','$password')";
			$result = mysqli_query($conn, $query);
			if ($result) {
				header ("Location: login.php");
				$username = "";
				$nim = "";
				$fname = "";
				$_POST['password'] = "";
			} else {
				echo "<script>alert('Oops! Something went wrong.')</script>";
			}
		} else {
			echo "<script>alert('User already exists')</script>";
		}
	} else {
		echo "<script>alert('Please fill up the form!')</script>";
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
	<link rel="stylesheet" type="text/css" href="css/signup.css">
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Hind:wght@700&family=Lobster&display=swap" rel="stylesheet">
	<title>Signup</title>
</head>

<body>
	<form action="" method="post">
		<div class="box">
			<h1>SIGNUP</h1>
			<div class="form-floating mb-3">
				<input type="text" class="form-control" id="floatingInput" placeholder="Full Name" name="fullname">
				<label for="floatingInput">Full Name</label>
			</div>
			<div class="form-floating mb-3">
				<input type="text" class="form-control" id="floatingInput" placeholder="NIM" name="nim">
				<label for="floatingInput">NIM</label>
			</div>
			<div class="form-floating mb-3">
				<input type="text" class="form-control" id="floatingInput" placeholder="Username" name="username">
				<label for="floatingInput">Username</label>
			</div>
			<div class="form-floating">
				<input type="password" class="form-control" id="floatingPassword" placeholder="Password" name="password">
				<label for="floatingPassword">Password</label>
			</div>
			<a href="login.php"><button type="submit" name="submit" class="btn btn-primary">CREATE ACCOUNT</button></a>
			<p class="dont">Already have an account? <b><a href="login.php">Login</a></b></p>
		</div>

	</form>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
	<div class="gambar1"><img src="https://i.ibb.co/DMQsC2V/Vector-10.png" /></div>

</body>

</html>