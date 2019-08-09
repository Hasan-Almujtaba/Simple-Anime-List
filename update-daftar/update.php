<?php  

session_start();

if ( !$_SESSION['login'] ) {
	header('Location: ../login/login.php');
}


require_once '../config/init.php';

$id = $_GET['id'];

$sql = "SELECT * FROM daftar WHERE id=$id ";
$query = mysqli_query($conn, $sql);
$anime = mysqli_fetch_assoc($query);

if ( isset($_POST['submit']) ) {
	if ( update($_POST) > 0 ) {
		header("Location: ../list-anime/list-anime.php");
	}
	else {
		exit('<script>Data gagal diupdate</script>');
	}
}

?>

<!DOCTYPE html>
<html>
<head>
	<title>Update List Anime</title>
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
					<div class="card-title text-center">Update Daftar</div>
					<form action="" method="post" enctype="multipart/form-data">

						<input type="hidden" name='coverlama' value="<?= $anime['cover'] ?>"> 
						<input type="hidden" name='id' value="<?= $anime['id'] ?>"> 

						<div class="form-group">
							<label class="ml-2 font-weight-bold" for="judul">Judul:</label>
							<input name="judul" type="text" class="form-control" id="judul" value="<?= $anime['judul'] ?>" required>
						</div>

						<div class="form-group">
							<label class="ml-2 font-weight-bold" for="episode">episode:</label>
							<input name="episode" type="number" min="0" max="255" class="form-control" id="episode" value="<?= $anime['episode'] ?>" required>
						</div>

						<div class="form-group">
							<label class="ml-2 font-weight-bold" for="genre">Genre:</label>
							<input name="genre" type="text" class="form-control" id="genre" value="<?= $anime['genre'] ?>"required>
						</div>

						<div class="form-group">
							<label class="ml-2 font-weight-bold" for="studio">studio:</label>
							<input name="studio" type="text" class="form-control" id="studio" value="<?= $anime['studio'] ?>" required>
						</div>

						<div class="custom-file">
							<input type="file" name="cover" class="custom-file-input" id="cover">
							<label class="custom-file-label" for="cover">Pilih gambar</label>
						</div>

						<button class="btn btn-outline-primary mt-3 w-100" name="submit" type="submit">Update</button>


					</form>
				</div>
			</div>
		</div>
	</div>

</body>
</html>