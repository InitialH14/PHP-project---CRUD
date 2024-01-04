<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistem Informasi Tugas Akhir</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="../Style/style-1.css">
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark p-3">
        <div class="container-fluid">
            <a class="navbar-brand fs-4" href="#">SITUA</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown"
                aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class=" collapse navbar-collapse" id="navbarNavDropdown">
                <ul class="navbar-nav ms-auto ">
                    <li class="nav-item">
                        <a class="nav-link mx-2 active" aria-current="page" href="#">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link mx-2" href="dosen/dosen.php">Data Dosen</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link mx-2" href="mhs/mhs.php">Data Mahasiswa</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link mx-2" href="mk/mk.php">Mata Kuliah</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="bg-unnes">
        <div class="txt-1 w-100 h-100 ptop ps-5">
            <h1 class="w-40 text-light">Sistem Informasi Tugas Akhir</h1>
            <h3 class="text-light">Prodi Teknik Informatika</h3>
        </div>
    </div>

    <div class="new_project_section layout_padding" style="height: 50vh">
        <div class="container">
            <h1 class="w-100 fw-bold text-center new_project_taital">Halaman Utama</h1>
            <i class="new_project_text">Silahkan masuk ke laman tujuan melalui section dibawah ini</i>
            <div class="new_project_section_2 layout_padding">
                <div class="row">
                    <div class="col-lg-4 col-sm-12">
                        <a href="mhs/mhs.php">
                            <div class="zoom pt-3">
                                <center><img src="../image/graduating.png" class="image_6"></center>
                                <h6 class="new_text">Data Mahasiswa</h6>
                            </div>
                        </a>
                    </div>
                    <div class="col-lg-4 col-sm-12">
                        <a href="dosen/dosen.php">
                            <div class="zoom pt-3">
                                <center><img src="../image/presentation-1.png" class="image_6"></center>
                                <h6 class="new_text">Data Dosen</h6>
                            </div>
                        </a>
                    </div>
                    <div class="col-lg-4 col-sm-12">
                        <a href="mk/mk.php">
                            <div class="zoom pt-3">
                                <center><img src="../image/book.png" class="image_6"></center>
                                <h6 class="new_text">Mata Kuliah</h6>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
        crossorigin="anonymous"></script>
</body>

</html>