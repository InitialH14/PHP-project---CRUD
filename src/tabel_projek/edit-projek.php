<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistem Informasi Tugas Akhir</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="../../Style/style-1.css">
    <link rel="stylesheet" href="../../Style/style-mhs.css">
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark p-3">
        <div class="container-fluid">
            <a class="navbar-brand fs-4" href="../home.php">SITUA</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown"
                aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class=" collapse navbar-collapse" id="navbarNavDropdown">
                <ul class="navbar-nav ms-auto ">
                    <li class="nav-item">
                        <a class="nav-link mx-2 active" aria-current="page" href="../home.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link mx-2" href="#">Data Dosen</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link mx-2" href="../mhs/mhs.php">Data Mahasiswa</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link mx-2" href="../mk/mk.php">Mata Kuliah</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="bg-unnes vh-60">
        <div class="txt-1 w-100 h-100 ptop ps-5">
            <h1 class="w-40 text-light">Sistem Informasi Tugas Akhir</h1>
            <h3 class="text-light">Prodi Teknik Informatika</h3>
        </div>
    </div>

    <div class="new_project_section layout_padding">
        <center>
            <h1 class="w-100 mb-5 new_project_taital text-center">Edit Tugas Akhir</h1>
        </center>
        <br>
        <div class="row justify-content-md-center">
            <div class="col-6">
                <?php
                require '../../konektor1.php';
                $kode_proyek = $_GET['kode_proyek'];
                $kode_mk = $_GET['kode_mk'];
                $hasil = mysqli_query($conn, "SELECT * FROM tabel_projek_akhir WHERE kode_proyek=$kode_proyek");

                while ($data = mysqli_fetch_array($hasil)) {
                    $kode_proyek = $data["kode_proyek"];
                    $judul = $data["judul"];
                    $jenis = $data["jenis"];
                    $tenggat = $data["tenggat"];
                }

                if (isset($_POST["submit"])) {
                    $kode_proyek = $_POST["kode_proyek"];
                    $judul = $_POST["judul"];
                    $jenis = $_POST["jenis"];
                    $tenggat = $_POST["tenggat"];

                    $query = "UPDATE tabel_projek_akhir SET kode_proyek='$kode_proyek', judul='$judul', jenis='$jenis', tenggat='$tenggat', kode_mk='$kode_mk' WHERE kode_proyek ='$kode_proyek'";

                    $hasil = mysqli_query($conn, $query);

                    if ($hasil) {
                        header("location: projek.php?kode_mk=$kode_mk");
                        exit();
                    } else {
                        echo "Data Gagal Ditambahkan";
                    }
                }
                ?>

                <form method="POST" action="<?php $_SERVER['PHP_SELF']; ?>">
                    <div class="form-group">
                        <label for="kode_proyek">Kode Proyek</label>
                        <input type="text" class="form-control" name="kode_proyek" id="kode_proyek"
                            value="<?php echo $kode_proyek; ?>" readonly>
                    </div>
                    <div class="form-group mt-3">
                        <label for="judul">Judul</label>
                        <input type="text" class="form-control" name="judul" id="judul" value="<?php echo $judul; ?>">
                    </div>
                    <div class="form-group mt-3 mb-3">
                        <label for="jenis">Jenis</label>
                        <select name="jenis" id="jenis" class="form-control input-lg">
                            <option value="Individu" selected="<?php $jenis == 'Individu' ? true : false ?>">Individu
                            </option>
                            <option value="Kelompok" selected="<?php $jenis == 'Kelompok' ? true : false ?>">Kelompok
                            </option>
                        </select>
                    </div>
                    <div class="form-group mt-3 mb-3">
                        <label for="tenggat">Tenggat</label>
                        <input type="datetime-local" class="form-control" name="tenggat" id="tenggat"
                            value="<?php echo $tenggat; ?>">
                    </div>
                    <button type="button" name="batal"
                        onclick="location.href='projek.php?kode_mk=<?php echo $kode_mk; ?>'"
                        class="btn btn-secondary mb-2">Batal</button>
                    <button type="submit" name="submit" class="btn btn-warning mb-2 float-right"><b>Submit</b></button>
                </form>

            </div>
        </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
        crossorigin="anonymous"></script>
</body>

</html>