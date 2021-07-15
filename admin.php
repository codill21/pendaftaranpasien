<?php
// koenksi ke database
require 'functions.php';
$pasien = query("SELECT * FROM pasien"); 
// ambil data dari tabel pasien / query
?>


<!doctype html>
<html>

<head>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <title>Halaman Admin</title>

  <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
  <script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
  <link rel="stylesheet" href="https://cdn.datatables.net/1.10.25/css/jquery.dataTables.min.css">
</head>

<body>
  <h1>Daftar Pasien</h1>
  <table id="example" class="display" style="width:100%">
    <thead>
      <tr>
        <th>Aksi</th>
        <th class="bg-warning">Norekam</th>
        <th>Nama</th>
        <th>Alamat</th>
        <th>Jenis Kelamin</th>
        <th>NIK</th>
        <th>Tanggal Lahir</th>
        <th>Nomor Handphone</th>
        <th>Poli Tujuan</th>
        <th>Dokter</th>
        <th>Tanggal Pelayanan</th>

      </tr>
    </thead>
    <tbody>
      <?php foreach ($pasien as $row) : ?>
        <tr>
          <td>
            <a href="">UPDATE</a>
            <a href="">DELETE</a>
          </td>
          <td class="bg-warning"><?= $row["norekam"]; ?></td>
          <td><?= $row["nama"]; ?></td>
          <td><?= $row["alamat"]; ?></td>
          <td><?= $row["jenis kelamin"]; ?></td>
          <td><?= $row["nik"]; ?></td>
          <td><?= $row["tanggalahir"]; ?></td>
          <td><?= $row["nomorhp"]; ?></td>
          <td><?= $row["Poli Tujuan"]; ?></td>
          <td><?= $row["Dokter"]; ?></td>
          <td><?= $row["tanggalpelayanan"]; ?></td>

        </tr>
      <?php endforeach; ?>
    </tbody>

  </table>

</body>
<script>
  $(document).ready(function() {
    $('#example').DataTable();
  });
</script>

</html>