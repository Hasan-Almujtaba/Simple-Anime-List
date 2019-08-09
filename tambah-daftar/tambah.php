<?php  

session_start();

if ( !$_SESSION['login'] ) {
	header('Location: ../login/login.php');
}


require_once '../config/init.php';

if ( isset($_POST['submit']) ) {
	if ( insert($_POST) > 0 ) {
		header("Location: ../list-anime/list-anime.php");
	}
	else {
		exit(mysqli_connect_error());
	}
}

?>

<!DOCTYPE html>
<html>
<head>
	<title>Tambah List Anime</title>
 	<link href="https://fonts.googleapis.com/css?family=Open+Sans&display=swap" rel="stylesheet">
 	<link rel="stylesheet" href="../css/bootstrap/css/bootstrap.css">
 	<link rel="stylesheet" href="../css/style.css">
 	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
</head>
<body class="bg-primary">

	<div class="container">
		<div class="row pt-5">
			<div class="card mx-auto w-75">
				<div class="card-body">
					<div class="card-title text-center">Tambahkan Daftar</div>
					<form action="" method="post" enctype="multipart/form-data">

						<div class="form-group">
							<label class="ml-2 font-weight-bold" for="judul">Judul:</label>
							<input name="judul" type="text" class="form-control" id="judul" required>
						</div>

						<div class="form-group">
							<label class="ml-2 font-weight-bold" for="episode">episode:</label>
							<input name="episode" type="number" min="0" max="255" class="form-control" id="episode" required>
						</div>

						<div class="form-group">
							<label class="ml-2 font-weight-bold" for="genre">Genre:</label>
							<input name="genre" type="text" class="form-control" id="genre" required>
						</div>

						<div class="form-group">
							<label class="ml-2 font-weight-bold" for="studio">studio:</label>
							<input name="studio" type="text" class="form-control" id="studio" required>
						</div>

						<div class="custom-file">
							<input type="file" name="cover" class="custom-file-input" id="cover" required>
							<label class="custom-file-label" for="cover">Pilih gambar</label>
						</div>

						<button class="btn btn-outline-primary mt-3 w-100" name="submit" type="submit">Tambahkan</button>


					</form>
				</div>
			</div>
		</div>
	</div>

</body>
</html>