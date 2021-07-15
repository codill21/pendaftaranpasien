<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <title>Form Pendaftaran Pasien</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</head>

<?php
require 'functions.php';

if (isset($_GET["norekam"])) {
    $norekam = $_GET["norekam"];
    $pasien = query("SELECT * FROM pasien WHERE norekam = $norekam");

    if (!empty($pasien)) {



        $nama;
        $alamat;
        $jnskelamin;
        $nik;
        $tanggalahir;
        $nomorhp;
        $poli;
        // $dokter;
        $tanggalpelayanan;

        foreach ($pasien as $row) {

            $nama = $row["nama"];
            $alamat = $row["alamat"];
            $jnskelamin = $row["jenis kelamin"];
            $nik = $row["nik"];
            $tanggalahir = $row["tanggalahir"];
            $nomorhp = $row["nomorhp"];
            $poli = $row["Poli Tujuan"];
            // $row[""];
            $tanggalpelayanan = $row["tanggalpelayanan"];
        }
?>
        <!-- ini html ketika ada norekam -->

        <body>
            <h1 class="text-center">Form Pendaftaran Pasien</h1>
            <form action="form.php" method="get">
                <div class="form-group">

                    <label for="norekam">Nomor Rekam Medis</label>
                    <input type="text" class="form-control" name="norekam" id="norekam" value="<?= $norekam; ?>" required autofocus autocomplete="off">
                    <button onclick="undisableTxt()">Cari</button>

                    <script>
                        function undisableTxt() {
                            document.getElementById("norekam").disabled = true;
                        }
                    </script>
                </div>


            </form>
            <form action="insert.php" method="post" enctype="multipart/form-data">
                <div class="container">

                    <div class="card">
                        <h5 class="card-header bg-danger"></h5>
                        <div class="card-body">
                            <input type="hidden" class="form-control" name="norekam" id="norekam" value="<?= $norekam ?>">


                            <!-- <div class="form-group">
                        
                        <label for="norekam">Nomor Rekam Medis</label>
                        <input type="text" class="form-control" name="norekam" id="norekam" placeholder="Masukan Nomor Rekam Medis" required autofocus autocomplete="off" >
                        <button onclick="undisableTxt()">Cari</button>

                        <script>
                            function undisableTxt() {
                                document.getElementById("norekam").disabled = true;
                            }
                        </script>
                    </div> -->


                            <div class="form-group">
                                <label for="nama">Nama Pasien</label>
                                <input type="text" class="form-control" name="nama" placeholder="Masukan Nama Lengkap" value="<?= $nama ?>" readonly required autocomplete="off">
                            </div>

                            <div class="form-group">
                                <label for="alamat">Alamat</label>
                                <input type="text" class="form-control" name="alamat" placeholder="Masukan Alamat" value="<?= $alamat ?>" readonly required autocomplete="off">
                            </div>

                            <!-- jenis kelamin|apa itu aria label -->
                            <div class="input-group mb-3">
                                <label class="jnskelamin" for="jnskelamin">Jenis Kelamin</label>
                                <select readonly class="form-select" name="jnskelamin">
                                    <option selected value="<?= $jnskelamin ?>" readonly><?= $jnskelamin ?></option>
                                    <!-- <option value="Laki - Laki">Laki - Laki</option>
                            <option value="Perempuan">Perempuan</option> -->

                                </select>
                            </div>
                            <div class="form-group">
                                <label for="nik">Nomor Induk Penduduk</label>
                                <input type="text" class="form-control" name="nik" placeholder="Masukan Nomor Induk Penduduk" value="<?= $nik ?>" readonly required autocomplete="off">
                            </div>

                            <div class="form-group">
                                <label for="tanggalahir">Tanggal Lahir</label>
                                <input type="date" class="form-control" name="tanggalahir" value="<?= $tanggalahir ?>" readonly required autocomplete="off">
                            </div>

                            <div class="form-group">
                                <label for="nomorhp">Nomor Handphone</label>
                                <input type="text" class="form-control" name="nomorhp" placeholder="Masukan Nomor Handphone" value="<?= $nomorhp ?>" readonly required autocomplete="off">
                            </div>


                            <div class="input-group mb-3">
                                <label class="poli" for="poli">Poli Tujuan</label>
                                <select id="type" name="poli">
                                    <option value="item0"></option>
                                    <option value="Akupuntur">Akupuntur</option>
                                    <option value="Anak">Anak</option>
                                    <option value="Bedah Umum">Bedah Umum</option>
                                    <option value="Fisioterapi">Fisioterapi</option>
                                    <option value="Gigi & Mulut">Gigi & Mulut</option>
                                    <option value="Gizi">Gizi</option>
                                    <option value="Jantung">Jantung</option>
                                    <option value="Kebid & Kand">Kebid & Kand</option>
                                </select>

                                <select id="size" name="dokter">
                                    <option value=""></option>
                                </select>
                                <script name="dokter">
                                    $(document).ready(function() {
                                        $("#type").change(function() {
                                            var val = $(this).val();
                                            if (val == "Akupuntur") {
                                                $("#size").html("<option value='Dr. Haryodi S.'>Dr. Haryodi S. </option><option value='Dr. Maria FR'>Dr. Maria FR </option>");
                                            } else if (val == "Anak") {
                                                $("#size").html("<option value='Dr. Farrel K'>Dr. Farrel K. </option><option value='Dr. Alfiqh R '>Dr. Alfiqh R </option>");
                                            } else if (val == "Bedah Umum") {
                                                $("#size").html("<option value='Dr. Sholehudin A '>Dr. Sholehudin A </option><option value='Dr. Raka S'>Dr. Raka S </option>");
                                            } else if (val == "Fisioterapi") {
                                                $("#size").html("<option value='Dr. Rifqi P'>Dr. Rifqi P </option><option value='Dr. Ferron V'>Dr. Ferron V</option>");
                                            } else if (val == "Gigi & Mulut") {
                                                $("#size").html("<option value='Dr. Aisy R'>Dr. Aisy R </option><option value='Dr. Revo B'>Dr. Revo B </option>");
                                            } else if (val == "Gizi") {
                                                $("#size").html("<option value='Dr. Sandy M'>Dr. Sandy M </option><option value='Dr. Iqbal R'>Dr. Iqbal R </option>");
                                            } else if (val == "Jantung") {
                                                $("#size").html("<option value='Dr. Herwindar R'>Dr. Herwindar R </option><option value='Dr. Achya M'>Dr. Achya M </option>");
                                            } else if (val == "Kebid & Kand") {
                                                $("#size").html("<option value='Dr. Wahyu F'>Dr. Wahyu F </option><option value='Dr. Keanan F'>Dr. Keanan F </option>");
                                            }

                                        });
                                    });
                                </script>
                            </div>




                            <!-- <div class="input-group mb-3">
                        <label class="dokter" for="dokter">Dokter</label>
                        <select class="form-select" id="dokter" disabled>
                            <option selected></option>
                            <option value="1">Akupuntur</option>
                            <option value="2">Anak</option>
                            <option value="3">Bedah Umum</option>
                            <option value="4">Fisioterapi</option>
                            <option value="5">Gigi & Mulut</option>
                            <option value="6">Gizi</option>
                            <option value="7">Jantung</option>
                            <option value="8">Kebid & Kand</option>

                        </select>
                    </div> -->

                            <div class="form-group">
                                <label for="tanggalpelayanan">Tanggal Pelayanan</label>
                                <input type="date" class="form-control" name="tanggalpelayanan" required id="tanggalpelayanan" autocomplete="off">
                            </div>

                            <div class="alert alert-warning" role="alert">
                                pilih tanggal paling cepat h+2 dari hari ini.
                            </div>
                        </div>
                        <div class="form-group text-right">
                            <button type="submit" class="btn btn-primary" name="submit">Submit</button>
                            <a href="home.php" class="btn btn-danger">Cancel</a>
                        </div>
                    </div>
                </div>

            </form>

        </body>
    <?php
    } else {
        echo "<script>
       alert('Nomor Rekaman Medis Tidak Ditemukan')
        location.href='form.php'
    </script>";
    }
} else {

    ?>

    <!-- ini html ketika tidak ada norekam -->

    <body>
        <h1 class="text-center">Form Pendaftaran Pasien</h1>
        <!-- <form action="form.php" method="get"> -->
        <div class="form-group">

            <label for="norekam">Nomor Rekam Medis</label>
            <input type="text" class="form-control" name="norekam" id="norekam" placeholder="Masukan Nomor Rekam Medis" required autofocus autocomplete="off">
            <button onclick="undisableTxt()">Cari</button>

            <script>
                function undisableTxt() {
                    document.getElementById("norekam").disabled = true;
                    var norekam = document.getElementById("norekam").value;
                    location.href = "form.php?norekam=" + norekam;

                }
            </script>
        </div>


        <!-- </form> -->
        <form action="insert.php" method="post" enctype="multipart/form-data">
            <div class="container">

                <div class="card">
                    <h5 class="card-header bg-danger"></h5>
                    <div class="card-body">
                        <input type="hidden" class="form-control" name="norekam" id="norekam" placeholder="Masukan Nomor Rekam Medis">


                        <!-- <div class="form-group">
                        
                        <label for="norekam">Nomor Rekam Medis</label>
                        <input type="text" class="form-control" name="norekam" id="norekam" placeholder="Masukan Nomor Rekam Medis" required autofocus autocomplete="off" >
                        <button onclick="undisableTxt()">Cari</button>

                        <script>
                            function undisableTxt() {
                                document.getElementById("norekam").disabled = true;
                            }
                        </script>
                    </div> -->


                        <div class="form-group">
                            <label for="nama">Nama Pasien</label>
                            <input type="text" class="form-control" name="nama" placeholder="Masukan Nama Lengkap" required autocomplete="off">
                        </div>

                        <div class="form-group">
                            <label for="alamat">Alamat</label>
                            <input type="text" class="form-control" name="alamat" placeholder="Masukan Alamat" required autocomplete="off">
                        </div>

                        <!-- jenis kelamin|apa itu aria label -->
                        <div class="input-group mb-3">
                            <label class="jnskelamin" for="jnskelamin">Jenis Kelamin</label>
                            <select class="form-select" name="jnskelamin">
                                <option selected></option>
                                <option value="Laki - Laki">Laki - Laki</option>
                                <option value="Perempuan">Perempuan</option>

                            </select>
                        </div>
                        <div class="form-group">
                            <label for="nik">Nomor Induk Penduduk</label>
                            <input type="text" class="form-control" name="nik" placeholder="Masukan Nomor Induk Penduduk" required autocomplete="off">
                        </div>

                        <div class="form-group">
                            <label for="tanggalahir">Tanggal Lahir</label>
                            <input type="date" class="form-control" name="tanggalahir" required autocomplete="off">
                        </div>

                        <div class="form-group">
                            <label for="nomorhp">Nomor Handphone</label>
                            <input type="text" class="form-control" name="nomorhp" placeholder="Masukan Nomor Handphone" required autocomplete="off">
                        </div>


                        <div class="input-group mb-3">
                            <label class="poli" for="poli">Poli Tujuan</label>
                            <select id="type" name="poli">
                                <option value="item0"></option>
                                <option value="Akupuntur">Akupuntur</option>
                                <option value="Anak">Anak</option>
                                <option value="Bedah Umum">Bedah Umum</option>
                                <option value="Fisioterapi">Fisioterapi</option>
                                <option value="Gigi & Mulut">Gigi & Mulut</option>
                                <option value="Gizi">Gizi</option>
                                <option value="Jantung">Jantung</option>
                                <option value="Kebid & Kand">Kebid & Kand</option>
                            </select>

                            <select id="size" name="dokter">
                                <option value=""></option>
                            </select>
                            <script name="dokter">
                                $(document).ready(function() {
                                    $("#type").change(function() {
                                        var val = $(this).val();
                                        if (val == "Akupuntur") {
                                            $("#size").html("<option value='Dr. Haryodi S.'>Dr. Haryodi S. </option><option value='Dr. Maria FR'>Dr. Maria FR </option>");
                                        } else if (val == "Anak") {
                                            $("#size").html("<option value='Dr. Farrel K'>Dr. Farrel K. </option><option value='Dr. Alfiqh R '>Dr. Alfiqh R </option>");
                                        } else if (val == "Bedah Umum") {
                                            $("#size").html("<option value='Dr. Sholehudin A '>Dr. Sholehudin A </option><option value='Dr. Raka S'>Dr. Raka S </option>");
                                        } else if (val == "Fisioterapi") {
                                            $("#size").html("<option value='Dr. Rifqi P'>Dr. Rifqi P </option><option value='Dr. Ferron V'>Dr. Ferron V</option>");
                                        } else if (val == "Gigi & Mulut") {
                                            $("#size").html("<option value='Dr. Aisy R'>Dr. Aisy R </option><option value='Dr. Revo B'>Dr. Revo B </option>");
                                        } else if (val == "Gizi") {
                                            $("#size").html("<option value='Dr. Sandy M'>Dr. Sandy M </option><option value='Dr. Iqbal R'>Dr. Iqbal R </option>");
                                        } else if (val == "Jantung") {
                                            $("#size").html("<option value='Dr. Herwindar R'>Dr. Herwindar R </option><option value='Dr. Achya M'>Dr. Achya M </option>");
                                        } else if (val == "Kebid & Kand") {
                                            $("#size").html("<option value='Dr. Wahyu F'>Dr. Wahyu F </option><option value='Dr. Keanan F'>Dr. Keanan F </option>");
                                        }

                                    });
                                });
                            </script>
                        </div>




                        <!-- <div class="input-group mb-3">
                        <label class="dokter" for="dokter">Dokter</label>
                        <select class="form-select" id="dokter" disabled>
                            <option selected></option>
                            <option value="1">Akupuntur</option>
                            <option value="2">Anak</option>
                            <option value="3">Bedah Umum</option>
                            <option value="4">Fisioterapi</option>
                            <option value="5">Gigi & Mulut</option>
                            <option value="6">Gizi</option>
                            <option value="7">Jantung</option>
                            <option value="8">Kebid & Kand</option>

                        </select>
                    </div> -->

                        <div class="form-group">
                            <label for="tanggalpelayanan">Tanggal Pelayanan</label>
                            <input type="date" class="form-control" name="tanggalpelayanan" required id="tanggalpelayanan" autocomplete="off">
                        </div>

                        <div class="alert alert-warning" role="alert">
                            pilih tanggal paling cepat h+2 dari hari ini.
                        </div>
                    </div>
                    <div class="form-group text-right">
                        <button type="submit" class="btn btn-primary" name="submit">Submit</button>
                        <a href="home.php" class="btn btn-danger">Cancel</a>
                    </div>
                </div>
            </div>

        </form>

    </body>
<?php } ?>

</html>