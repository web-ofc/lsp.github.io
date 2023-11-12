<?php
    session_start();
    require_once('app/config/koneksi.php');

    if ( isset( $_SESSION["login"])) {
        header("Location: src/landing_page.php");
        exit;
    }

    if (isset($_POST['login'])) {

        $username = $_POST['username'];
        $password = $_POST['password'];

        $result = mysqli_query($conn, "SELECT * FROM user WHERE (username = '$username' OR email = '$username') AND password = '$password'");
		$count = mysqli_num_rows($result);
		
		if ($count > 0) {
			$getDataRole = mysqli_fetch_array($result);
			$role = $getDataRole['role'];

			if ($role == 'Administrator') {
				$_SESSION['loginAdmin'] = true;
				$_SESSION["id_user"] = $id_user;
				$_SESSION["username"] = $username;
				$_SESSION["role"] = 'Administrator';
				header('location:src/dashboard_admin.php');
			} elseif ($role == 'Kasir') {
				$_SESSION['loginKasir'] = true;
				$_SESSION["id_user"] = $id_user;
				$_SESSION["username"] = $username;
				$_SESSION["role"] = 'kasir';
				header('location:src/dashboard_kasir.php');
			// } else if ($role == 'Pelanggan') {
			// 	$_SESSION['login'] = true;
			// 	$_SESSION["id_user"] = $id_user;
			// 	$_SESSION["username"] = $username;
			// 	$_SESSION["role"] = 'Pelanggan';
			// 	header('location:src/landing_page.php');
			} else {
				echo "DATA TIDAK DITEMUKAN";
			}
		}

        $error = true;
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="author" content="Muhamad Nauval Azhar">
	<meta name="viewport" content="width=device-width,initial-scale=1">
	<meta name="description" content="This is a login page template based on Bootstrap 5">
	<title>Login | Kasir Resto</title>
	<link rel="stylesheet" href="public/bootstrap-5.1.3/css/bootstrap.min.css">
	<link rel="stylesheet" href="public/css/main.css">
    <style>
        pallet{
            color: #1C6758;
            color: #3D8361;
            color: #D6CDA4;
            color: #EEF2E6;
        }

		body {
			background-color: #3D8361;
			font-family: 'Poppins', sans-serif;
		}

		.card-body {
			background-color: #EEF2E6;
		}

		.card-title {
			color: #D6CDA4;
		}

		.btn-primary {
			background-color: #1C6758;
			border-color: #1C6758;
		}

		.btn-primary:hover {
			background-color: #3D8361;
			border-color: #3D8361;
		}
    </style>
</head>

<body>
	<section class="h-100">
		<div class="container h-100">
			<div class="row justify-content-sm-center h-100">
				<div class="col-xxl-4 col-xl-5 col-lg-5 col-md-7 col-sm-9">
					<div class="card mt-5 shadow-lg">
						<div class="card-body p-5">
							<h1 class="fs-4 card-title fw-bold mb-4"><span style="color: #3D8361;">Log</span>in</h1>
							<form method="POST" class="needs-validation" novalidate="" autocomplete="off">
								<div class="mb-3">
									<label class="mb-2 text-muted" for="username">Username</label>
									<input id="username" type="username" class="form-control" name="username" value="" required autofocus autocomplete="off">
									<div class="invalid-feedback">
										Username is invalid
									</div>
								</div>

								<div class="mb-3">
									<label class="text-muted" for="password">Password</label>
									<input id="password" type="password" class="form-control" name="password" required autocomplete="off">
								    <div class="invalid-feedback">
								    	Password is required
							    	</div>
								</div>

								<div class="d-flex align-items-center">
									<button type="submit"  value="Login" name="login" class="btn btn-primary ms-auto">
										Login
									</button>
								</div>
							</form>
						</div>
						<!-- <div class="card-footer py-3 border-0">
							<div class="text-center">
								Don't have an account? <a href="register.html" class="text-dark">Create One</a>
							</div>
						</div> -->
					</div>
					<div class="text-center mt-5 text-muted">
					<span style="color: #EEF2E6;"> Copyright &copy; 2023 &mdash; Muhammad Rizky Perdana | LSP </span>
					</div>
				</div>
			</div>
		</div>
	</section>

	<script src="public/js/login.js"></script>
    <script src="public/bootstrap-5.1.3/js/bootstrap.min.js"></script>
</body>
</html>
