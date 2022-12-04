<?php

include("config.php");

$id         = $_REQUEST['id'];
$query      = "SELECT * FROM presensi WHERE id = '".$id."'";
$grabid     = mysqli_query($conn, $query);
$row        = mysqli_fetch_assoc($grabid);

// Update query run
if (isset($_POST['submit'])) {
    $id       = $_POST['id'];
    $nim      = $_POST['nim'];
    $fname    = $_POST['fullname'];
    $tanggal  = $_POST['tanggal'];
    $meet     = $_POST['pertemuan'];
    $saran    = $_POST['saran'];
    $idkom    = 0;
    $selected = $_POST['komunitas'];
    if ($selected == "AgriBot") {
        $idkom = 1;
    } elseif ($selected == "AgriUX") {
        $idkom = 2;
    } elseif ($selected == "Competitive Programming") {
        $idkom = 3;
    } elseif ($selected == "Cyber Security") {
        $idkom = 4;
    } elseif ($selected == "Data Mining") {
        $idkom = 5;
    } elseif ($selected == "Game Reality") {
        $idkom = 6;
    } elseif ($selected == "IWDC") {
        $idkom = 7;
    } elseif ($selected == "Mobile Apps Development") {
        $idkom = 8;
    }

    if (!empty(trim($nim)) && !empty(trim($fname)) && !empty(trim($tanggal)) && $idkom != 0) {
        $query = mysqli_query($conn, "UPDATE presensi SET nim='$nim', fullname='$fname', id_kom='$idkom', pertemuan='$meet', date='$tanggal', saran='$saran' WHERE id = '$id'");
        if ($query) {
            header('Location: table_admin.php');
        } else {
            echo "<script>alert('Percobaan Gagal T_T')</script>";
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
        <div class="judul"><span class="presensi">EDIT</span><span class="komun">PRESENSI</span></div>
        <div>
            <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
        </div>
        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Nama</label>
            <input type="text" class="form-control" name="fullname" id="exampleFormControlInput1" value="<?php echo $row['fullname']; ?>">
        </div>
        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">NIM</label>
            <input type="text" class="form-control" name="nim" id="exampleFormControlInput1" value="<?php echo $row['nim']; ?>">
        </div>
        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Komunitas</label>
            <select id="komunitas" name="komunitas">
                <option value="">---Pilih komunitas---</option>
                <option value="AgriBot">AgriBot</option>
                <option value="AgriUX">AgriUX</option>
                <option value="Competitive Programming">Competitive Programming</option>
                <option value="Cyber Security">Cyber Security</option>
                <option value="Data Mining">Data Mining</option>
                <option value="Game Reality">Game Reality</option>
                <option value="IWDC">IWDC</option>
                <option value="Mobile Apps Development">Mobile Apps Development</option>
            </select>
        </div>
        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Tanggal Pertemuan</label>
            <input type="date" class="form-control" name="tanggal" id="exampleFormControlInput1" value="<?php echo $row['date']; ?>">
        </div>
        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Pertemuan Ke:</label>
            <input type="text" class="form-control" name="pertemuan" id="exampleFormControlInput1" value="<?php echo $row['pertemuan'] ?>">
        </div>
        <div class="mb-3">
            <label for="exampleFormControlTextarea1" class="form-label">Kritik dan Saran</label>
            <textarea class="form-control" name="saran" id="exampleFormControlTextarea1" rows="3"><?php echo $row['saran']; ?></textarea>
        </div>

        <a href="table_admin.php"><button type="submit" name="submit" class="btn btn-primary">Update</button></a>
    </form>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <div class="gambar1"><img src="https://i.ibb.co/DMQsC2V/Vector-10.png" /></div>

</body>

</html>