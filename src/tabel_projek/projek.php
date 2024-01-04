<?php
ob_start();
require '../../konektor1.php';
?>

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
                        <a class="nav-link mx-2" href="../dosen/dosen.php">Data Dosen</a>
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

    <div class="new_project_section layout_padding" style="padding-">
        <h1 class="w-100 mb-5 new_project_taital text-center">Daftar Tugas Akhir</h1>
        <div class="container section_list" style="width: 100vw;">
            <button type='button' class="btn btn-success float-right btn-style" style="margin:20px"
                onclick="popup()">Tambah Data</button>
            <button type='button' class="btn btn-secondary float-right btn-style" style="margin:20px"
                onclick="location.href='../mk/mk.php'">Kembali</button>

            <?php

            $recordsPerPage = 10;
            $currentPage = isset($_GET['page']) ? $_GET['page'] : 1;
            $startFrom = ($currentPage - 1) * $recordsPerPage;

            $kode_mk = $_GET['kode_mk'];
            $query = "SELECT * FROM tabel_projek_akhir WHERE kode_mk = '$kode_mk' LIMIT $startFrom, $recordsPerPage";
            $result = mysqli_query($conn, $query);
            $totalRecords = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM tabel_projek_akhir WHERE kode_mk = '$kode_mk'"));
            $totalPages = ceil($totalRecords / $recordsPerPage);

            echo '<table class="table table-hover table-bordered border-secondary-subtle table-style">';
            echo '<thead class="table-dark rounded-1">';
            echo '<tr class="table-hd">';
            echo '<th scope="col" class="text-center">No.</th>';
            echo '<th scope="col" class="text-center">Kode Projek</th>';
            echo '<th scope="col" style="text-align:center">Judul</th>';
            echo '<th scope="col" style="text-align:center">Jenis</th>';
            echo '<th scope="col" style="text-align:center">Tenggat</th>';
            echo '<th scope="col" style="text-align:center; width: 20%">Aksi</th>';
            echo '</tr>';
            echo '</thead>';
            echo '<tbody>';

            $no = $startFrom + 1;
            while ($data = mysqli_fetch_array($result)) {
                echo '<tr class="btn-style">';
                echo '<td class="text-center">' . $no . '</td>';
                echo '<td>' . $data['kode_proyek'] . '</td>';
                echo '<td>' . $data['judul'] . '</td>';
                echo '<td style="text-align: center">' . $data['jenis'] . '</td>';
                echo '<td style="text-align: center">' . $data['tenggat'] . '</td>';
                echo "<td style='text-align:center'><a href='edit-projek.php?kode_proyek=$data[kode_proyek]&kode_mk=$data[kode_mk]' class='btn btn-warning btn-sm title='edit'><b>Edit</b></a>" .
                    "<a href='delete-projek.php?kode_proyek=$data[kode_proyek]&kode_mk=$data[kode_mk]' class='btn btn-danger btn-sm' title='hapus' style='margin-left:10px'><b>Hapus</b></a>
                    <a href='../mhs-projek/mhs-projek.php?kode_proyek=$data[kode_proyek]&kode_mk=$data[kode_mk]' class='btn btn-success btn-sm' title='info' style='margin-left:10px'><b>Info</b></a>
                    </td></tr>";
                $no++;
            }
            echo '</tbody>';
            echo '</table>';
            echo '<div class="pagination">';
            for ($i = 1; $i <= $totalPages; $i++) {
                echo '<a href="?page=' . $i . '" ';
                if ($i == $currentPage) {
                    echo 'class="active"';
                }
                echo '><button type="button" class="btn-page">' . $i . '</button></a>';
            }
            echo '</div>';

            if (isset($_POST["submit"])) {
                $kode_proyek = $_POST["kode_proyek"];
                $judul = $_POST["judul"];
                $jenis = $_POST["jenis"];
                $tenggat = $_POST["tenggat"];

                $query2 = "INSERT INTO tabel_projek_akhir(kode_proyek, judul, jenis, tenggat, kode_mk) VALUES ('$kode_proyek', '$judul', '$jenis', '$tenggat', '$kode_mk')";
                $hasil = mysqli_query($conn, $query2);
                if ($hasil) {
                    header("Location: projek.php?kode_mk=$kode_mk");
                    exit();
                } else {
                    echo "Data Gagal Ditambahkan";
                }
            }
            ?>

        </div>

        <!-- popup 1-->
        <div class="popup1">
            <center>
                <div class="popup-content p-4" style="height: 85vh; padding-top: 2vh">
                    <center>
                        <h1 class="w-100 mb-5 new_project_taital text-center">Tambahkan Tugas</h1>
                    </center>
                    <br>
                    <div class="row justify-content-md-center">
                        <div class="col-6">
                            <form method="post" action="<?php $_SERVER['PHP_SELF']; ?>">
                                <div class="form-group">
                                    <label for="kode_proyek">Kode Projek</label>
                                    <input type="text" class="form-control" name="kode_proyek" id="kode_proyek"
                                        placeholder="ex: 4611422083">
                                    <div class="form-group mt-3">
                                        <label for="judul">Judul</label>
                                        <input type="text" class="form-control" name="judul" id="judul"
                                            placeholder="ex: Abdul Jabar">
                                    </div>
                                    <div class="form-group mt-3">
                                        <label for="prodi">Jenis</label>
                                        <select name="jenis" id="jenis" class="form-control input-lg">
                                            <option value="Individu">Individu</option>
                                            <option value="Kelompok">Kelompok</option>
                                        </select>
                                    </div>
                                    <div class="form-group mt-3">
                                        <label for="tenggat">Tenggat</label>
                                        <input type="datetime-local" class="form-control" name="tenggat" id="tenggat">
                                    </div>
                                    <button type="submit" name="batal"
                                        class="btn btn-secondary mb-2 mt-5">Batal</button>
                                    <button type="submit" name="submit"
                                        class="btn btn-primary mb-2 mt-5">Submit</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </center>
        </div>
    </div>



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
        crossorigin="anonymous"></script>

    <script>
        function popup() {
            const zoom = document.getElementsByClassName('popup1')[0];
            zoom.style.display = " block";
            zoom.style.width = 100 + "vw";
            zoom.style.height = 100 + "vh"
        }
    </script>
</body>

</html>