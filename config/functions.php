<?php 

require_once 'config.php';

// fungsi menambahkan data ke db

function insert($data) {
	global $conn;

	$judul = $data['judul'];
	$episode = $data['episode'];
	$genre = $data['genre'];
	$studio = $data['studio'];
	$cover = upload();

	$sql = " INSERT INTO daftar VALUES ('','$judul','$episode', '$genre', '$studio', '$cover') ";

	$query = mysqli_query($conn, $sql);

	return mysqli_affected_rows($conn);

}

// fungsi upload gambar

function upload() {
	$namaFile = $_FILES['cover']['name'];
	$ukuranFile = $_FILES['cover']['size'];
	$error = $_FILES['cover']['error'];
	$tmpName = $_FILES['cover']['tmp_name'];

	// cek apakah ada file yang diupload
	if ( $error === 4 ) {
		echo "<script> alert('PiLih gambar terlebih dahulu') </script>";
		return false;
	}

	// cek ekstensi file yang diupload
	$ekstensiValid = ['jpg','jpeg','gif'];
	$ekstensiFile = explode('.', $namaFile);
	$ekstensiFile = strtolower(end($ekstensiFile));

	if ( !in_array($ekstensiFile, $ekstensiValid) ) {
		echo "<script> alert('Pilih file dengan format gambar') </script>";
		return false;
	}

	// cek ukuran gambar
	if ( $ukuranFile > 1000000 ) {
		echo "<script> alert('ukuran gambar terlalu besar') </script>";
		return false;
	}

	// generate nama file baru
	$namaFileBaru = uniqid();
	$namaFileBaru .= '.';
	$namaFileBaru .= $ekstensiFile;

	move_uploaded_file($tmpName, "../img/" . $namaFileBaru );

	return $namaFileBaru;

}

// fungsi hapus data

function delete($id) {

	global $conn;
	$sql = "DELETE FROM daftar WHERE id=$id";
	$query = mysqli_query($conn, $sql);

	return mysqli_affected_rows($conn);
}

// fungsi update

function update($data) {

	global $conn;

	$id = $data['id'];
	$judul = $data['judul'];
	$episode = $data['episode'];
	$genre = $data['genre'];
	$studio = $data['studio'];
	$coverLama = $data['coverlama'];

	// cek apakah user pilih cover baru atau tidak
	if ( $_FILES['cover']['error'] === 4 ) {
		$cover = $coverLama;
	}
	else {
		$cover = upload();
	}

	$sql = "UPDATE daftar SET judul='$judul', episode='$episode', genre='$genre', studio='$studio', cover='$cover' WHERE id=$id  ";
	$query = mysqli_query($conn, $sql);

	return mysqli_affected_rows($conn);
}

function register($data) {

	global $conn;

	$username = $data['username'];
	$password = $data['password'];
	$konfirmasiPassword = $data['konfirmasipassword'];

	$sqlCekUser = " SELECT username from user WHERE username='$username' ";
	$queryCekUser = mysqli_query($conn, $sqlCekUser);

	// cek apakah ada username yang sama di database
	if ( mysqli_fetch_assoc($queryCekUser) ) {
	 	echo "<script> alert('Username telah terdaftar!') </script>";
	 	return false;
	 } 

	 // cek apakah password dengan konfirmasi password sesuai
	 if ( $password !== $konfirmasiPassword ) {
	 	echo "<script> alert('Password dan konfirmasi password tidak sesuai!') </script> ";
	 	return false;
	 }


	 // enkripsi password
	 $password = password_hash($password, PASSWORD_DEFAULT);

	 // menambahkan data registrasi ke database
	 $sql = "INSERT INTO user VALUES ('','$username', '$password') ";
	 $query = mysqli_query($conn, $sql);

	 return mysqli_affected_rows($conn);


}

function search($keyword) {

	$query = "SELECT * FROM daftar WHERE judul LIKE '%$keyword%' OR genre '%$keyword%' ASC";
	return $query;
}

 ?>