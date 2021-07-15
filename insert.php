<?php
// konek ke database
require 'functions.php';
$pasien = query("SELECT * FROM pasien");

// tombol cari ditekan

// if(isset($_POST["cari"])){
// $pasien = cari($_POST["norekam"]);

// }

// $conn = mysqli_connect("localhost","root","","phpdasar");
// ambil data dari tabel
// mysqli_query($conn,)

if (isset($_POST["submit"])) {
    // ambil data dari tiap elemen data form
    $norekam = rand(100000, 999999);
    if (!empty($_POST["norekam"])) {
        $norekam = $_POST["norekam"];
    }


    $nama = $_POST["nama"];
    $alamat = $_POST["alamat"];
    $jnskelamin = $_POST["jnskelamin"];
    $nik = $_POST["nik"];
    $tanggalahir = $_POST["tanggalahir"];
    $nomorhp = $_POST["nomorhp"];
    $poli = $_POST["poli"];
    $dokter = $_POST["dokter"];
    $tanggalpelayanan = $_POST["tanggalpelayanan"];

    // query insert database

    $query = "INSERT INTO pasien VALUES ('$norekam','$nama','$alamat','$jnskelamin','$nik','$tanggalahir','$nomorhp','$poli','$dokter','$tanggalpelayanan')";

    mysqli_query($conn, $query);
}

?>

<!DOCTYPE html>
<html>

<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Nomor Pasien</title>
</head>

<body>
    <div class="d-flex justify-content-center">
        <div class="card" style="width: 30rem;">

            <div class="card-body">
                <h5 class="card-title">Nomor Rekam Medis :<?= $norekam; ?></h5>
                <b>Tanggal Pelayanan: <?= $_POST["tanggalpelayanan"]; ?> mulai dari jam 07:00 Pagi</b>
                <p class="card-text">
                <ul>
                    <li><b>Nama:</b> <?= $_POST["nama"]; ?></li>
                    <li><b>Alamat:</b> <?= $_POST["alamat"]; ?></li>
                    <li><b>Jenis Kelamin:</b> <?= $_POST["jnskelamin"]; ?></li>
                    <li><b>NIK:</b> <?= $_POST["nik"]; ?></li>
                    <li><b>Tanggal Lahir:</b> <?= $_POST["tanggalahir"]; ?></li>
                    <li><b>Nomor Handphone:</b> <?= $_POST["nomorhp"]; ?></li>
                    <li><b>Poli Tujuan:</b> <?= $_POST["poli"]; ?></li>
                    <li><b>Dokter :</b> <?= $_POST["dokter"]; ?></li>


                </ul>
                </p>

            </div>

        </div>



    </div>



</body>

</html>