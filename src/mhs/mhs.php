<?php
ob_start();

require '../../konektor1.php';

if (isset($_POST["submit"])) {
    $nim = $_POST["nim"];
    $nama = $_POST["nama"];
    $prodi = $_POST["prodi"];
    $query2 = "INSERT INTO mahasiswa(nim, nama, prodi) VALUES ('$nim', '$nama', '$prodi')";
    $hasil = mysqli_query($conn, $query2);
    if ($hasil) {
        header("Location: mhs.php");
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
                        <a class="nav-link mx-2" aria-current="page" href="../dosen/dosen.php">Data Dosen</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link mx-2" aria-current="page" href="#">Data Mahasiswa</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link mx-2" aria-current="page" href="../mk/mk.php">Mata Kuliah</a>
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
        <h1 class="w-100 mb-5 new_project_taital text-center">Daftar Mahasiswa</h1>

        <div class="container section_list">
            <button class="btn btn-success float-right btn-style" style="margin:20px" onclick="popup()">Tambah
                Data</button>

            <?php
            // Number of records per page
            $recordsPerPage = 10;

            // Get the current page or set it to 1 if not set
            $currentPage = isset($_GET['page']) ? $_GET['page'] : 1;

            // Calculate the starting record for the current page
            $startFrom = ($currentPage - 1) * $recordsPerPage;

            // Fetch data with pagination
            $query = "SELECT * FROM mahasiswa LIMIT $startFrom, $recordsPerPage";
            $result = mysqli_query($conn, $query);

            // Count total records for pagination
            $totalRecords = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM mahasiswa"));

            // Calculate the total number of pages
            $totalPages = ceil($totalRecords / $recordsPerPage);


            echo '<table class="table table-hover table-bordered border-secondary-subtle table-style">';
            echo '<thead class="table-dark rounded-1">';
            echo '<tr class="table-hd">';
            echo '<th scope="col" class="text-center">No.</th>';
            echo '<th scope="col">NIM</th>';
            echo '<th scope="col" style="text-align:center">Nama Lengkap</th>';
            echo '<th scope="col" style="text-align:center">Prodi</th>';
            echo '<th scope="col" style="text-align:center">Aksi</th>';
            echo '</tr>';
            echo '</thead>';
            echo '<tbody>';

            $no = $startFrom + 1;
            while ($data = mysqli_fetch_array($result)) {
                echo '<tr class="btn-style">';
                echo '<td class="text-center">' . $no . '</td>';
                echo '<td>' . $data['nim'] . '</td>';
                echo '<td>' . $data['nama'] . '</td>';
                echo '<td style="text-align: center">' . $data['prodi'] . '</td>';
                echo "<td style='text-align:center'><a href='edit-mhs.php?nim=$data[nim]' class='btn btn-warning btn-sm' title='edit'><b>Edit</b></a>" .
                    "<a href='delete-mhs.php?nim=$data[nim]' class='btn btn-danger btn-sm' title='hapus' style='margin-left:10px'><b>Hapus</b></a>
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
        <div class="popup1">
            <center>
                <div class="popup-content">
                    <center>
                        <h1 class="w-100 mb-5 new_project_taital text-center">Daftar Mahasiswa</h1>
                    </center>
                    <br>
                    <div class="row justify-content-md-center">
                        <div class="col-6">
                            <form method="post" action="<?php $_SERVER['PHP_SELF']; ?>">
                                <div class="form-group">
                                    <label for="nim">NIM</label>
                                    <input type="text" class="form-control" name="nim" id="nim"
                                        placeholder="ex: 4611422083">
                                    <div class="form-group mt-3">
                                        <label for="nama">Nama Lengkap</label>
                                        <input type="text" class="form-control" name="nama" id="nama"
                                            placeholder="ex: Abdul Jabar">
                                    </div>
                                    <div class="form-group mt-3">
                                        <label for="prodi">Prodi</label>
                                        <input type="text" class="form-control" name="prodi" id="prodi"
                                            placeholder="ex: Teknik Informatika">
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