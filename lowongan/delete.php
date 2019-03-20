<?php
include "../koneksi.php";
$no = $_GET['id'];

$query = mysqli_query($koneksi,"DELETE FROM lowongan WHERE id='$no'");
if ($query){
	echo "<script>alert('Data Berhasil dihapus!');window.location = 'index.php'</script>";	
} else {
	echo "<script>alert('Data Gagal dihapus!'); window.location = 'index.php'</script>";	
}
?>