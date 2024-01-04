<?php
require("../../konektor1.php");
$nim = $_GET['nim'];
$result = mysqli_query($conn, "DELETE FROM mahasiswa WHERE `mahasiswa`.`nim` = $nim");

header("Location:mhs.php");
?>