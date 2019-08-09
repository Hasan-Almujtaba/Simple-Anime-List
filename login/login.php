<?php  

session_start();
require_once '../config/init.php';

// cek cookie 

if ( isset($_COOKIE['id']) && isset($_COOKIE['key']) ) {
	
	$id = $_COOKIE['id'];
	$key = $_COOKIE['key'];

	$sql = "SELECT username FROM user WHERE id = $id ";
	$query = mysqli_query($conn, $sql);
	$result = mysqli_fetch_assoc($query);

	if ( $key === hash('sha256', $result['username'] ) ) {
		$_SESSION['login'] = true;
	}
}

if ( isset($_SESSION['login']) ) {
	header('Location: ../index.php');
}

if ( isset($_POST['submit']) ) {

	$username = $_POST['username'];
	$password = $_POST['password'];

	// cek username

	$sql = "SELECT * FROM user WHERE username = '$username' ";
	$query = mysqli_query($conn, $sql);

	if ( mysqli_num_rows($query) === 1 ) {

		$result = mysqli_fetch_assoc($query);

		if ( password_verify($password, $result['password']) ) {
			
			$_SESSION['login'] = true;

			if ( isset($_POST['cookie']) ) {
				setcookie( 'id', $result['id'], time() + 60, '/' );
				setcookie( 'key', hash('sha256', $result['username']), time() + 60, '/' );
			}

			header('Location: ../index.php');
		}
	}

	$error = true;

}

?>

<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
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
					<div class="card-title text-center">Masuk Terlebih Dahulu!</div>

						<?php if ( isset($error) ) : ?>
						<div class="alert alert-danger">
						<strong>Gagal!</strong> Username tidak ditemukan atau password salah
						</div>
						<?php endif ?>

						<form action="" method="post">
							<div class="form-group">
								<input type="text" name="username" class="form-control" placeholder="Username">
								<input type="password" name="password" class="form-control" placeholder="Password">
								<div class="form-check mb-2 px-4">
									<label class="form-check-label">
										<input type="checkbox" name="cookie" class="form-check-input" > Ingat saya
									</label>
								</div>
								<button type="submit" name="submit" class="btn btn-primary btn-block">Masuk</button>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</section>
</body>
</html>