<?php
$hos = "localhost";
$username = "root"; 
$password= "";
$nama_db = "lowongan";

$koneksi = mysql_connect($hos,$username,$password) or 
           die ("Gagal terhubung ke server MySQL!");

mysql_select_db($nama_db, $koneksi) 
or die("Gagal memilih database!");

?>