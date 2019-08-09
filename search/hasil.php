<?php 

session_start();

if ( !$_SESSION['login'] ) {
	header('Location: ../login/login.php');
}

require_once '../config/init.php';

if ( isset($_GET['submit']) ) {
	$keyword = $_GET['keyword'];
	$sql = "SELECT * FROM daftar WHERE judul LIKE '%$keyword%' OR genre LIKE '%$keyword%' ";
	$query = mysqli_query($conn, $sql);
}
else {
	header('Location: ../index.php');
}

require_once '../config/init.php';


 ?>

 <!DOCTYPE html>
 <html>
 <head>
 	<title>Search Result</title>
 	<link href="https://fonts.googleapis.com/css?family=Open+Sans&display=swap" rel="stylesheet">
 	<link rel="stylesheet" href="../css/bootstrap/css/bootstrap.css">
 	<link rel="stylesheet" href="../css/style.css">
 	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
 </head>
 <body class="bg-primary">

	<div class="container mt-5">
		
		<div class="card shadow pb-4">
			<div class="card-body">
				
				<div class="card-title text-center">Search result of <?= $_GET['keyword']; ?></div>

				<a href="../index.php" class="btn btn-primary mb-3"> <i class="fas fa-home"></i> Home</a>

				<table class="table table-striped table-bordered table-hover">
					
					<thead>
						<tr>
							<th class="text-center">No.</th>
							<th class="text-center">Cover</th>
							<th class="text-center">Title</th>
							<th class="text-center">Episode</th>
							<th class="text-center">Genre</th>
							<th class="text-center">Studio</th>
							<th class="text-center">Action</th>
						</tr>
					</thead>
					
					<tbody class="text-center">
						<?php $counter = 0;
						 while ( $anime = mysqli_fetch_assoc($query) ) : ?>
							<tr>
								<?php $counter++ ?>
								<td class="align-middle"> <?= $counter ?> </td>
								<td class="align-middle"> 
									<img height="100px" width="70px" src="../img/<?= $anime['cover'] ?>"> 
								</td>
								<td class="align-middle"> <?= $anime['judul']  ?> </td>
								<td class="align-middle"> <?= $anime['episode']  ?> </td>
								<td class="align-middle"> <?= $anime['genre']  ?> </td>
								<td class="align-middle"> <?= $anime['studio']  ?> </td>
								<td class="align-middle">
									<a href="../update-daftar/update.php?id=<?= $anime['id'] ?>">Ubah</a> |
									<a href="../hapus-daftar/hapus.php?id=<?= $anime['id'] ?>" onclick="return confirm('Yakin ingin menghapus data?') "  >Hapus</a>
								</td>
							</tr>
						<?php endwhile ?>
					</tbody>

				</table>
			</div>
		</div>
	</div>
 		
  </body>

 </html>