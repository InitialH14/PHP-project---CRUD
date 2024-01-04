<?php
require("../../konektor1.php");
$kode_proyek = $_GET['kode_proyek'];
$nim = $_GET['nim'];
$kode_mk = $_GET['kode_mk'];
$result = mysqli_query($conn, "DELETE FROM mahasiswa_projek WHERE `mahasiswa_projek`.`nim` = $nim");

header("Location:mhs-projek.php?kode_proyek=$kode_proyek&kode_mk=$kode_mk");
?>