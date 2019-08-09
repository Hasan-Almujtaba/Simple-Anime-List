<?php 

session_start();

if ( !$_SESSION['login'] ) {
	header('Location: ../login/login.php');
}


require_once '../config/init.php';


 ?>

 <!DOCTYPE html>
 <html>
 <head>
 	<title>Pencarian</title>
 	<link href="https://fonts.googleapis.com/css?family=Open+Sans&display=swap" rel="stylesheet">
 	<link rel="stylesheet" href="../css/bootstrap/css/bootstrap.css">
 	<link rel="stylesheet" href="../css/style.css">
 	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
 </head>
 <body class="bg-primary">

	<div class="container mt-5">
		
		<div class="card shadow pb-4">
			<div class="card-body">
				
				<div class="card-title text-center">Masukkan kata kunci pencarian</div>

				<form action="hasil.php" class="input-group mb-2">
					<input type="text" name="keyword" class="form-control" placeholder="Search">
					<div class="input-group-append">
						<button class="btn btn-primary" type="submit" name="submit">Cari</button>
					</div>
				</form>

				<a href="../index.php" class="btn btn-primary"><i class="fas fa-home"></i> Home</a>

			</div>
		</div>
	</div>
 		
  </body>

 </html>