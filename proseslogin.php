<?php 
// mengaktifkan session pada php
session_start();

// menghubungkan php dengan koneksi database
include 'koneksi.php';

// menangkap data yang dikirim dari form login
$nik = $_POST['nik'];
$password = $_POST['password'];
// $password = sha1($password1);


// menyeleksi data user dengan username dan password yang sesuai
$login = mysqli_query($koneksi,"select * from user where nik='$nik' and password='$password'");
// menghitung jumlah data yang ditemukan
$cek = mysqli_num_rows($login);




if ($cek<1) {
	echo "select * from user where nik='$nik' and password='$password'";
}

// cek apakah username dan password di temukan pada database
elseif($cek == 1){

	$data = mysqli_fetch_assoc($login);

	// cek jika user login sebagai HRD
	if($data['akses']=="HRD"){

		// buat session login dan username
		$_SESSION['username'] = $nik;
		$_SESSION['akses'] = "HRD";
		// alihkan ke halaman dashboard admin
		// 
		echo "<script>alert('Berhasil ADMIN');window.location='index.php'</script>";

	// cek jika user login sebagai pegawai
	}else if($data['akses']=="Kandidat"){
		// buat session login dan username
		$_SESSION['username'] = $nik;
		$_SESSION['akses'] = "Kandidat";
		// alihkan ke halaman dashboard pegawai
		echo "<script>alert('Berhasil Kandidat')</script>";


	}}
else{
	echo "<script>alert('Login Gagl')</script>";

}
?>