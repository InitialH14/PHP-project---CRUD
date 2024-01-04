<?php
require '../../konektor1.php';

if (isset($_GET['kode_mk'])) {
    $kode_mk = $_GET['kode_mk'];

    $deleteMatakuliahQuery = "DELETE FROM matakuliah WHERE kode_mk = '$kode_mk'";
    $resultMatakuliah = mysqli_query($conn, $deleteMatakuliahQuery);

    if ($resultMatakuliah) {
        header("Location: mk.php");
        exit();
    } else {
        echo "Data Gagal Dihapus dari Matakuliah";
    }
} else {
    echo "Parameter Kode MK tidak valid";
}
?>