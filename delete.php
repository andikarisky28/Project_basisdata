<?php

include("config.php");
$id = $_GET['id'];

$query = mysqli_query($conn, "DELETE FROM presensi WHERE id = $id");

if ($query) {
    header('Location: table_admin.php');
} else {
    die("percobaan gagal");
}
