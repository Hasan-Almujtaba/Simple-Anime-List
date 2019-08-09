<?php 

session_start();

if ( !$_SESSION['login'] ) {
	header('Location: ../login/login.php');
}


require_once '../config/init.php';

$id = $_GET['id'];

if ( delete($id) > 0 ) {
	header('Location: ../list-anime/list-anime.php');
}
else {
	echo "<script>alert('Data gagal dihapus')</script>";
	exit();
}

 ?>