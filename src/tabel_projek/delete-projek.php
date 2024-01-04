<?php
require("../../konektor1.php");
$kode_proyek = $_GET['kode_proyek'];
$kode_mk = $_GET['kode_mk'];
$result = mysqli_query($conn, "DELETE FROM tabel_projek_akhir WHERE `tabel_projek_akhir`.`kode_proyek` = $kode_proyek");

header("Location:projek.php?kode_mk=$kode_mk");
?>