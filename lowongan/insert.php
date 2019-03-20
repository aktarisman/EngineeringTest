<?php
include "../koneksi.php";
$nama   	= $_POST['nama'];
$desc     	= $_POST['desc'];
$skill        = $_POST['skill'];
    
$query = mysqli_query($koneksi,"INSERT INTO lowongan (nama_lowongan, 
													job_desc, 
													required_skill) 

													VALUES 

                      								('$nama', 
                      								 '$desc', 
                      								 '$skill')");
if ($query){
	echo "<script>alert('Data Berhasil dimasukan!'); window.location = 'index.php'</script>";	
} else {
	echo "<script>alert('Data Gagal dimasukan!'); window.location = 'index.php'</script>";
}
?>