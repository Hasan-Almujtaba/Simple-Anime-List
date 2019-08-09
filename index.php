<?php 

session_start();

if ( !$_SESSION['login'] ) {
	header('Location: login/login.php');
}

require_once 'config/init.php';

 ?>

 <!DOCTYPE html>
 <html>
 <head>
 	<title>Home</title>
 	<link href="https://fonts.googleapis.com/css?family=Open+Sans&display=swap" rel="stylesheet">
 	<link rel="stylesheet" href="css/bootstrap/css/bootstrap.css">
 	<link rel="stylesheet" href="css/style.css">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
 </head>
 <body>

 	<nav class="navbar navbar-expand-sm navbar-dark bg-primary">
 		<a class="navbar-brand" href="list-anime/list-anime.php">MYANIMELIST</a>
 		<ul class="navbar-nav mr-auto">
 			<li class="nav-item"><a class="nav-link" href="search/search.php">Search</a></li>
			<li class="nav-item"><a class="nav-link" href="tambah-daftar/tambah.php">Add List</a></li>
 		</ul>
 		<ul class="navbar-nav ml-auto">
			<li class="nav-item"><a class="nav-link" href="logout/logout.php">Logout</a></li>
 		</ul>
 	</nav>

 	<div class="jumbotron jumbotron-fluid">
 		<div class="container text-center">
 			<h1>Your Favorite Anime List Platform</h1>
 			<a class="btn btn-success mt-3" href="list-anime/list-anime.php">Go To List</a>
 		</div>
 	</div>

 	<div class="container">
 			<h2 class="text-center">Why should you use this platform?</h2>
 			<div class="row text-center mt-5">

 				<div class="col-lg-3">
 					<div class="card shadow">
 						<div class="card-body">
 							<div> <i class="fas fa-feather-alt fa-4x text-primary"></i> </div>
 						</div>
 						<div class="card-body">
 							<div class="card-title">Light Weight</div>	
 							<p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Iusto repellendus, quasi asperiores itaque dolorem at vitae tempora, doloribus ex illum, corporis quibusdam. Officiis corrupti, quos odit quia odio, dignissimos eius!</p>
 						</div>
 					</div>
 				</div>

 				<div class="col-lg-3">
 					<div class="card shadow">
 						<div class="card-body">
 							<div> <i class="fas fa-mobile-alt fa-4x text-primary"></i> </div>
 						</div>
 						<div class="card-body">
 							<div class="card-title">Responsive</div>	
 							<p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Iusto repellendus, quasi asperiores itaque dolorem at vitae tempora, doloribus ex illum, corporis quibusdam. Officiis corrupti, quos odit quia odio, dignissimos eius!</p>
 						</div>
 					</div>
 				</div>

 				<div class="col-lg-3">
 					<div class="card shadow">
 						<div class="card-body">
 							<div> <i class="fas fa-edit fa-4x text-primary"></i> </div>
 						</div>
 						<div class="card-body">
 							<div class="card-title">Easy Edit</div>	
 							<p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Iusto repellendus, quasi asperiores itaque dolorem at vitae tempora, doloribus ex illum, corporis quibusdam. Officiis corrupti, quos odit quia odio, dignissimos eius!</p>
 						</div>
 					</div>
 				</div>

 				<div class="col-lg-3">
 					<div class="card shadow">
 						<div class="card-body">
 							<div> <i class="fas fa-user-lock fa-4x text-primary"></i> </div>
 						</div>
 						<div class="card-body">
 							<div class="card-title">Login System</div>	
 							<p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Iusto repellendus, quasi asperiores itaque dolorem at vitae tempora, doloribus ex illum, corporis quibusdam. Officiis corrupti, quos odit quia odio, dignissimos eius!</p>
 						</div>
 					</div>
 				</div>

 			</div>
 	</div>

 	<div class="container mt-5 text-center">
 		<h2>List All Anime You Ever Watched</h2>
 		<div class="row px-5">
 			<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sequi, distinctio ducimus quia maiores inventore, dicta saepe voluptatum cum voluptates error aut eligendi ad veniam assumenda illum totam ut ratione. Minima! loremLorem ipsum dolor sit amet, consectetur adipisicing elit. Sequi, distinctio ducimus quia maiores inventore, dicta saepe voluptatum cum voluptates error aut eligendi ad veniam assumenda illum totam ut ratione. Minima! lorem<</p>
 		</div>
 	</div>

 	<div class="container px-5 my-5">
 		<div class="row">
 			<div class="col p-5 border">
 				<h2>What are you waiting for? <br> Start your own list!</h2>
 			</div>
 			<div class="col pb-5 px-5 border text-center create-list">
 				<a href="#" class="btn btn-primary"><i class="far fa-edit"></i> Create list for me</a>
 			</div>
 		</div>
 	</div>

 	<div class="container-fluid bg-primary footer">
 		<p class="text-center"> &copyCopyright 2018 </p>
 	</div>

 
 </body>
 </html>