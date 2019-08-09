<?php 

session_start();

if ( !$_SESSION['login'] ) {
	header('Location: ../login/login.php');
}


require_once '../config/init.php';

// pagination

$jmlDataPerhalaman = 5;
$jmlData = mysqli_num_rows(mysqli_query($conn,"SELECT * FROM daftar"));
$jmlHalaman = ceil( $jmlData / $jmlDataPerhalaman );
$halAktif = ( isset($_GET['hal']) ) ? $_GET['hal'] : 1;
$dataAwal = ( $jmlDataPerhalaman * $halAktif ) - $jmlDataPerhalaman;

$query = "SELECT * FROM daftar ORDER BY judul ASC LIMIT $dataAwal, $jmlDataPerhalaman";
$daftar = mysqli_query($conn, $query);



 ?>

 <!DOCTYPE html>
 <html>
 <head>
 	<title>Anime List</title>
 	<link href="https://fonts.googleapis.com/css?family=Open+Sans&display=swap" rel="stylesheet">
 	<link rel="stylesheet" href="../css/bootstrap/css/bootstrap.css">
 	<link rel="stylesheet" href="../css/style.css">
 </head>
 <body>

 	<nav class="navbar navbar-expand-sm navbar-dark bg-primary">
 		<a class="navbar-brand" href="#">MYANIMELIST</a>
 		<ul class="navbar-nav mr-auto">
 			<li class="nav-item"><a class="nav-link" href="../search/search.php">Search</a></li>
 			<li class="nav-item"><a class="nav-link" href="../tambah-daftar/tambah.php">Add List</a></li>
 		</ul>
 		<ul class="navbar-nav ml-auto">
			<li class="nav-item"><a class="nav-link" href="../logout/logout.php">Logout</a></li>
 		</ul>
 	</nav>

 	<div class="container-fluid">
 		<div class="row">
 			<div class="col-lg-2"></div>
 			<div class="col-lg-8 text-center shadow">

 				<div class="table-responsive">
 					<table class="table table-striped table-hover table-bordered">
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
 						<tbody>
 							<?php $counter = 0; 
 							while ( $anime = mysqli_fetch_assoc($daftar) ) : ?>
 							<tr>
 								<?php $counter++ ?>
 								<td> <?= $counter + $dataAwal ?>  </td>
 								<td> <img height="100px" width="70px" src="../img/<?= $anime['cover'] ?>" alt=""> </td>
 								<td class="align-middle"><?= $anime['judul'] ?></td>
 								<td class="align-middle"><?= $anime['episode'] ?></td>
 								<td class="align-middle"><?= $anime['genre'] ?></td>
 								<td class="align-middle"><?= $anime['studio'] ?></td>
 								<td class="align-middle">
 									<a href="../update-daftar/update.php?id=<?= $anime['id'] ?>" >Ubah</a> |
 									<a href="../hapus-daftar/hapus.php?id=<?= $anime['id'] ?>" onclick=" return confirm('Yakin ingin menghapus data?') " >Hapus</a>
 								</td>
 							</tr>
 							<?php endwhile ?>
 						</tbody>
 					</table>
 				</div>

 				<ul class="pagination justify-content-center">

 					<?php if( $halAktif > 1 ) : ?>

 						<li class="page-item"><a class="page-link" href="?hal=<?= $halAktif - 1 ?>">&laquo</a></li>

 					<?php endif ?>

 					<?php for ( $i = 1; $i <= $jmlHalaman; $i++ ) : ?>

 						<?php if ( $i == $halAktif ) : ?>
 						<li class="page-item active"><a class="page-link" href="?hal=<?= $i; ?>"> <?= $i; ?> </a></li>
 						<?php else : ?>
 						<li class="page-item"><a class="page-link" href="?hal=<?= $i; ?>"> <?= $i; ?> </a></li>
 						<?php endif ?>

 					<?php endfor ?>

 					 <?php if( $halAktif < $jmlHalaman ) : ?>

 						<li class="page-item"><a class="page-link" href="?hal=<?= $halAktif + 1 ?>">&raquo</a></li>

 					<?php endif ?>

 				</ul>
				

 			</div> 
 			<div class="col-lg-2"></div>
 		</div>
 	</div>

 	<div class="container-fluid bg-primary footer">
 		<p class="text-center"> &copyCopyright 2018 </p>
 	</div>
 		
  </body>

 </html>