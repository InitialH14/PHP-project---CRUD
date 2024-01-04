<?php
ob_start();
require "../../konektor1.php";

if (isset($_POST["update"])) {
    $kode_mk = $_POST["kode_mk"];
    $nama_matkul = $_POST["nama_matkul"];
    $sks = $_POST["sks"];
    $nidn = $_POST["nidn"];

    $query = "UPDATE matakuliah SET kode_mk='$kode_mk', nama_matkul='$nama_matkul', sks='$sks',  nidn='$nidn' WHERE kode_mk='$kode_mk'";

    $hasil = mysqli_query($conn, $query);

    if ($hasil) {
        header("location: mk.php");
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
                        <a class="nav-link mx-2" href="mk.php">Mata Kuliah</a>
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
            <h1 class="w-100 mb-5 new_project_taital text-center">Edit Data Mata Kuliah</h1>
        </center>
        <br>
        <div class="row justify-content-md-center">
            <div class="col-6">
                <?php
                $kode_mk = $_GET['kode_mk'];
                $hasil = mysqli_query($conn, "SELECT matakuliah.kode_mk as kode_mk, matakuliah.nama_matkul as nama_matkul, matakuliah.sks as sks, matakuliah.nidn as nidn, dosen.nama as dosen
                FROM matakuliah, dosen WHERE matakuliah.kode_mk = $kode_mk");

                while ($data = mysqli_fetch_array($hasil)) {
                    $kode_mk = $data["kode_mk"];
                    $nidn = $data["nidn"];
                    $nama_matkul = $data["nama_matkul"];
                    $sks = $data["sks"];
                }
                ?>

                <form method="POST" action="<?php $_SERVER['PHP_SELF']; ?>">
                    <div class="form-group">
                        <label for="nim">Kode Mata Kuliah</label>
                        <input type="text" class="form-control" name="kode_mk" id="kode_mk"
                            value="<?php echo $kode_mk; ?>" readonly>
                    </div>
                    <div class="form-group mt-3">
                        <label for="matkul">Mata Kuliah</label>
                        <input type="text" class="form-control" name="nama_matkul" id="nama_matkul"
                            value="<?php echo $nama_matkul; ?>">
                    </div>
                    <div class="form-group mt-3 mb-3">
                        <label for="sks">SKS</label>
                        <input type="text" class="form-control" name="sks" id="sks" value="<?php echo $sks; ?>">
                    </div>
                    <div class="form-group mt-3 mb-3">
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
                    <button type="button" name="batal" onclick="location.href='mk.php'"
                        class="btn btn-secondary mb-2">Batal</button>
                    <button type="submit" name="update" class="btn btn-warning mb-2 float-right"><b>Submit</b></button>
                </form>
            </div>
        </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
        crossorigin="anonymous"></script>
</body>

</html>