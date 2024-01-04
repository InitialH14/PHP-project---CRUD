<?php
ob_start();

require '../../konektor1.php';

if (isset($_POST["submit"])) {
    $nidn = $_POST["nidn"];
    $nama_mk = $_POST["nama_mk"];
    $sks = $_POST["sks"];
    $kode = $_POST["kode_mk"];
    $query2 = "INSERT INTO matakuliah(kode_mk, nama_matkul, sks, nidn) VALUES ('$kode', '$nama_mk', '$sks', '$nidn')";
    $hasil = mysqli_query($conn, $query2);
    if ($hasil) {
        header("Location: mk.php");
        exit();
    } else {
        echo "Data Gagal Ditambahkan";
    }
}
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
                        <a class="nav-link mx-2" href="#">Mata Kuliah</a>
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
        <h1 class="w-100 mb-5 new_project_taital text-center">Mata Kuliah</h1>
        <div class="container section_list">
            <button type='button' class="btn btn-success float-right btn-style" style="margin:20px"
                onclick="popup()">Tambah Data</button>

            <?php
            require '../../konektor1.php';
            $recordsPerPage = 10;
            $currentPage = isset($_GET['page']) ? $_GET['page'] : 1;
            $startFrom = ($currentPage - 1) * $recordsPerPage;
            $query = "SELECT matakuliah.kode_mk as kode_mk, matakuliah.nama_matkul as nama_matkul, matakuliah.sks as sks, dosen.nama as dosen
            FROM matakuliah, dosen WHERE matakuliah.nidn = dosen.nidn LIMIT $startFrom, $recordsPerPage";
            $result = mysqli_query($conn, $query);
            $totalRecords = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM dosen"));
            $totalPages = ceil($totalRecords / $recordsPerPage);

            echo '<table class="table table-hover table-bordered border-secondary-subtle table-style">';
            echo '<thead class="table-dark rounded-1">';
            echo '<tr class="table-hd">';
            echo '<th scope="col" class="text-center">No.</th>';
            echo '<th scope="col">Kode MK</th>';
            echo '<th scope="col" style="text-align:center">Mata Kuliah</th>';
            echo '<th scope="col" style="text-align:center">SKS</th>';
            echo '<th scope="col" style="text-align:center">Dosen Pengampu</th>';
            echo '<th scope="col" style="text-align:center">Aksi</th>';
            echo '</tr>';
            echo '</thead>';
            echo '<tbody>';

            $no = $startFrom + 1;
            while ($data = mysqli_fetch_array($result)) {
                echo '<tr class="btn-style">';
                echo '<td class="text-center">' . $no . '</td>';
                echo '<td>' . $data['kode_mk'] . '</td>';
                echo '<td>' . $data['nama_matkul'] . '</td>';
                echo '<td style="text-align: center">' . $data['sks'] . '</td>';
                echo '<td>' . $data['dosen'] . '</td>';
                echo "<td style='text-align:center'><a href='edit-mk.php?kode_mk=$data[kode_mk]' class='btn btn-warning btn-sm title='edit'><b>Edit</b></a>" .
                    "<a href='delete-mk.php?kode_mk=$data[kode_mk]' class='btn btn-danger btn-sm' title='hapus' style='margin-left:10px'><b>Hapus</b></a>
                    <a href='../tabel_projek/projek.php?kode_mk=$data[kode_mk]' class='btn btn-success btn-sm' title='info' style='margin-left:10px'><b>Info</b></a>
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
            ?>

        </div>

        <!-- popup 1-->
        <div class="popup1" style="padding-top: 5vh;">
            <center>
                <div class="popup-content" style="height: 90vh">
                    <center>
                        <h1 class="w-100 mb-5 new_project_taital text-center">Tambahkan Data</h1>
                    </center>
                    <br>
                    <div class="row justify-content-md-center">
                        <div class="col-6">
                            <form method="post" action="<?php $_SERVER['PHP_SELF']; ?>">
                                <div class="form-group">
                                    <label for="nidn">Kode MK</label>
                                    <input type="text" class="form-control" name="kode_mk" id="kode_mk"
                                        placeholder="ex: 2089">
                                    <div class="form-group mt-3">
                                        <label for="nama">Mata Kuliah</label>
                                        <input type="text" class="form-control" name="nama_mk" id="nama_mk"
                                            placeholder="ex: Abdul Jabar">
                                    </div>
                                    <div class="form-group mt-3">
                                        <label for="nama">SKS</label>
                                        <input type="text" class="form-control" name="sks" id="sks"
                                            placeholder="ex: Abdul Jabar">
                                    </div>
                                    <div class="form-group mt-3">
                                        <label for="prodi">Dosen Pengampu</label>
                                        <select name="nidn" id="nidn" class="form-control input-lg">
                                            <?php
                                            $query = "SELECT * FROM dosen";
                                            $result = mysqli_query($conn, $query);
                                            while ($row = mysqli_fetch_array($result)) {
                                                echo "<option name='nidn' value='" . $row['nidn'] . "'>" . $row['nama'] . "</option>";
                                            }
                                            ?>
                                        </select>
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
            zoom.style.height = 110 + "vh"
        }
    </script>
</body>

</html>