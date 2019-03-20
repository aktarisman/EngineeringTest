<?php
include 'koneksi.php';
   if($_POST['upload']){
	$ekstensi_diperbolehkan	= array('png','jpg','docx','pdf');
	
	$namaK = $_POST['nama'];
	$kelamin = $_POST['jkelamin'];
	$nomor = $_POST['nomor'];
	$email = $_POST['email'];
	$lowongan = $_POST['lowongan'];
	$status = $_POST['status'];
	$nama = $_FILES['nama_file']['name'];
	$x = explode('.', $nama);
	$ekstensi = strtolower(end($x));
	$ukuran	= $_FILES['nama_file']['size'];
	$file_tmp = $_FILES['nama_file']['tmp_name'];	
		if(in_array($ekstensi, $ekstensi_diperbolehkan) === true){
		    if($ukuran < 8044070){			
			move_uploaded_file($file_tmp, 'File/'.$nama);
			$query = mysql_query("INSERT INTO kandidat(nama,jkelamin,nohp,email,id_lowongan,status,file) 
									VALUES ('$namaK','$kelamin','$nomor','$email','$lowongan','$status','$nama')");
			if($query){
				echo "<script>alert('Data Berhasil Dimasukan!'); window.location = 'index.php'</script>";
				// echo "<a href=index.php>Lihat!!!</a>";
			}else{
				print_r($query);
				// echo 'FILE SUDAH DI UPLOAD';
				
			}
		    }else{
			echo 'UKURAN FILE TERLALU BESAR';
		    }
	       }else{
		echo "INSERT INTO kandidat(nama,jkelamin,nohp,email,id_lowongan,status,file) 
									VALUES ('$namaK','$kelamin','$nomor','$email','$lowongan','$status','$nama')";
	       }
    }
?>