<?php  

session_start();

if ( isset($_SESSION["login"]) ) {
	
	header("Location: ../index.php");

}

require_once '../config/init.php';

if ( isset($_POST['submit']) ) {
	if ( register($_POST) > 0 ) {
		echo "<script> alert('Registrasi Berhasil');
					  window.location.href='../login/login.php';
			  </script>";
	}
	else {
		mysqli_error($conn);
	}
}

?>

<!DOCTYPE html>
<html>
<head>
	<title>Register</title>
 	<link href="https://fonts.googleapis.com/css?family=Open+Sans&display=swap" rel="stylesheet">
 	<link rel="stylesheet" href="../css/bootstrap/css/bootstrap.css">
 	<link rel="stylesheet" href="../css/style.css">
</head>
<body class="bg-primary">
	<section>
		<div class="container">
			<div class="row">
				<div class="card mx-auto w-50 my-5">
					<div class="card-body">
						<div class="card-title text-center">Daftar Terlebih Dahulu!</div>
						<form action="" method="post">
							<div class="form-group">
								<input type="text" name="username" class="form-control" placeholder="Username">
								<input type="password" name="password" class="form-control" placeholder="Password">
								<input type="password" name="konfirmasipassword" class="form-control" placeholder="Confirm Password">
								<button type="submit" name="submit" class="btn btn-primary btn-block">Daftar</button>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</section>
</body>
</html>