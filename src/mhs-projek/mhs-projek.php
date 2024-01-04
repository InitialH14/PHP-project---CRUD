<?php
ob_start();
require '../../konektor1.php';
$kode_proyek = $_GET['kode_proyek'];
$kode_mk = $_GET['kode_mk'];
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
        <h1 class="w-100 mb-5 new_project_taital text-center">Hasil Pencapaian Mahasiswa</h1>
        <div class="container section_list" style="width: 100vw;">
            <button type='button' class="btn btn-success float-right btn-style" style="margin:20px"
                onclick="popup()">Tambah Data</button>
            <button type='button' class="btn btn-secondary float-right btn-style" style="margin:20px"
                onclick="location.href='../tabel_projek/projek.php?kode_mk=<?php echo $kode_mk; ?>'">Kembali</button>

            <?php
            $query = "SELECT mahasiswa.nim AS nim, mahasiswa.nama AS nama, mahasiswa_projek.nilai AS nilai,  mahasiswa_projek.kode_proyek AS kode_proyek FROM mahasiswa, mahasiswa_projek WHERE mahasiswa_projek.kode_proyek = '$kode_proyek' AND mahasiswa.nim = mahasiswa_projek.nim";
            $result = mysqli_query($conn, $query);

            echo '<table class="table table-hover table-bordered border-secondary-subtle table-style">';
            echo '<thead class="table-dark rounded-1">';
            echo '<tr class="table-hd">';
            echo '<th scope="col" class="text-center">No.</th>';
            echo '<th scope="col" class="text-center">NIM</th>';
            echo '<th scope="col" style="text-align:center">Nama Mahasiswa</th>';
            echo '<th scope="col" style="text-align:center">Nilai</th>';
            echo '<th scope="col" style="text-align:center; width: 20%">Aksi</th>';
            echo '</tr>';
            echo '</thead>';
            echo '<tbody>';

            $no = 1;
            while ($data = mysqli_fetch_array($result)) {
                echo '<tr class="btn-style">';
                echo '<td class="text-center">' . $no . '</td>';
                echo '<td>' . $data['nim'] . '</td>';
                echo '<td>' . $data['nama'] . '</td>';
                echo '<td style="text-align: center">' . $data['nilai'] . '</td>';
                echo "<td style='text-align:center'><a href='edit-mhsprojek.php?nim=$data[nim]&kode_proyek=$kode_proyek&kode_mk=$kode_mk' class='btn btn-warning btn-sm title='edit'><b>Edit</b></a>" .
                    "<a href='delete.php?nim=$data[nim]&kode_proyek=$kode_proyek&kode_mk=$kode_mk' class='btn btn-danger btn-sm' title='hapus' style='margin-left:10px'><b>Hapus</b></a>
                </td></tr>";
                $no++;
            }
            echo '</tbody>';
            echo '</table>';

            if (isset($_POST["submit"])) {
                $nim = $_POST["nim"];
                $nilai = $_POST["nilai"];

                $query2 = "INSERT INTO mahasiswa_projek(nim, kode_proyek, nilai) VALUES ('$nim', '$kode_proyek', '$nilai')";
                $hasil = mysqli_query($conn, $query2);
                if ($hasil) {
                    header("Location: mhs-projek.php?kode_proyek=$kode_proyek&kode_mk=$kode_mk");
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
                        <h1 class="w-100 mb-5 new_project_taital text-center">Tambahkan Nilai</h1>
                    </center>
                    <br>
                    <div class="row justify-content-md-center">
                        <div class="col-6">
                            <form method="post" action="<?php $_SERVER['PHP_SELF']; ?>">
                                <div class="form-group">
                                    <label for="nim">Nama Mahasiswa / NIM</label>
                                    <select name="nim" id="nim" class="form-control input-lg">
                                        <?php
                                        $query = "SELECT * FROM mahasiswa";
                                        $result = mysqli_query($conn, $query);
                                        while ($row = mysqli_fetch_array($result)) {
                                            echo "<option name='nim' value='" . $row['nim'] . "'>" . $row['nama'] . " (" . $row['nim'] . ")" . "</option>";
                                        }
                                        ?>
                                    </select>
                                    <div class="form-group mt-3">
                                        <label for="nilai">Nilai</label>
                                        <input type="text" class="form-control" name="nilai" id="nilai"
                                            placeholder="ex: 97">
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