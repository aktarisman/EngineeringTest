<?php
include "../koneksi.php";
$id   	= $_POST['id'];
$nama     	= $_POST['nama'];
$desc        = $_POST['desc'];
$skill  	= $_POST['skill'];

    


$query = mysqli_query($koneksi,"UPDATE lowongan SET nama_lowongan='$nama', 
													job_desc='$desc', 
													required_skill='$skill'
											WHERE id='$id'") or die(mysqli_error());

													 

                      								
if ($query){
	echo "<script>alert('Data Berhasil Di Edit!'); window.location = 'index.php'</script>";	
} else {
	echo "<script>alert('Data Gagal Di Edit!'); window.location = 'index.php'</script>";	
}

?>