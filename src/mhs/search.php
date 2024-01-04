<?php
require '../../konektor1.php';

$recordsPerPage = 10;
$currentPage = isset($_GET['page']) ? $_GET['page'] : 1;
$startFrom = ($currentPage - 1) * $recordsPerPage;

$search = isset($_GET['search']) ? $_GET['search'] : '';
$searchCondition = $search ? "WHERE nama LIKE '%$search%' OR nim LIKE '%$search%' OR prodi LIKE '%$search%'" : '';

$query = "SELECT * FROM mahasiswa $searchCondition LIMIT $startFrom, $recordsPerPage";
$result = mysqli_query($conn, $query);

$totalRecords = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM mahasiswa $searchCondition"));
$totalPages = ceil($totalRecords / $recordsPerPage);

echo '<table class="table table-hover table-bordered table-style">';
echo '<thead>';
echo '<tr>';
echo '<th scope="col">No.</th>';
echo '<th scope="col">NIM</th>';
echo '<th scope="col" style="text-align:center">Nama Lengkap</th>';
echo '<th scope="col" style="text-align:center">Prodi</th>';
echo '<th scope="col" style="text-align:center">Aksi</th>';
echo '</tr>';
echo '</thead>';
echo '<tbody>';

$no = $startFrom + 1;
while($data = mysqli_fetch_array($result)) {
    echo '<tr>';
    echo '<td>'.$no.'</td>';
    echo '<td>'.$data['nim'].'</td>';
    echo '<td>'.$data['nama'].'</td>';
    echo '<td style="text-align: center">'.$data['prodi'].'</td>';
    echo "<td style='text-align:center'><a href='update.php?nim=$data[nim]' class='btn btn-warning btn-sm title='edit'><b>Edit</b></a>".
        "<a href='delete.php?nim=$data[nim]' class='btn btn-danger btn-sm' title='hapus' style='margin-left:10px'><b>Hapus</b></a>
        </td></tr>";
    $no++;
}

echo '</tbody>';
echo '</table>';

// Pagination links
echo '<div class="pagination">';
for($i = 1; $i <= $totalPages; $i++) {
    echo '<a href="?page='.$i.'&search='.$search.'" ';
    if($i == $currentPage) {
        echo 'class="active"';
    }
    echo '>'.$i.'</a>';
}
echo '</div>';
?>