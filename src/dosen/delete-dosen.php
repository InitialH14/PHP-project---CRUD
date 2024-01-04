<?php
require("../../konektor1.php");
$nidn = $_GET['nidn'];
$result = mysqli_query($conn, "DELETE FROM dosen WHERE `dosen`.`nidn` = $nidn");

header("Location:dosen.php");
?>