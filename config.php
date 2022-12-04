<?php

$dbhost = "localhost";
$dbuser = "root";
$dbpass = "";
$dbname = "dbpresensi";

$conn = mysqli_connect($dbhost,$dbuser,$dbpass,$dbname);

if(!$conn)
{
	die("<script>alert('Gagal tersambung dengan database.')</script>");
}