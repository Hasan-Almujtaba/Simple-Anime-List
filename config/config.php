<?php 

$server = 'localhost';
$username = 'root';
$password = '';
$db_name = 'animelist';

// koneksi ke database
$conn = mysqli_connect($server, $username, $password, $db_name);

if ( !$conn ) {
	die( 'Gagal terhubung dengan database' . mysqli_connect_error() );
}


 ?>