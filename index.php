<?php
	include 'connection.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Sisfo Pendataan Karyawan Pihak Ketiga RSCM</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="vendor/daterangepicker/daterangepicker.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
<!--===============================================================================================-->
</head>
<body>
	
	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100 p-t-50 p-b-90">
				<form class="login100-form validate-form flex-sb flex-w" method="POST">
					<span class="login100-form-title p-b-51">
						Login
					</span>

					
					<div class="wrap-input100 validate-input m-b-16" data-validate = "Username is required">
						<input class="input100" type="text" name="username" placeholder="Username Anda" value="<?php 
							if(isset($_COOKIE['rememberMe'])) {
								echo $_COOKIE['rememberMe'];
							}
						?>">
						<span class="focus-input100"></span>
					</div>
					
					
					<div class="wrap-input100 validate-input m-b-16" data-validate = "Password is required">
						<input class="input100" type="password" name="password" placeholder="Password Anda">
						<span class="focus-input100"></span>
					</div>
					
					<div class="flex-sb-m w-full p-t-3 p-b-24">
						<div class="contact100-form-checkbox">
							<input class="input-checkbox100" id="ckb1" type="checkbox" name="remember-me" value="1" <?php if(isset($_COOKIE['rememberMe'])) {
								echo 'checked="checked"';
							}
							else {
								echo '';
							}
							?>>
							<label class="label-checkbox100" for="ckb1">
								Ingat saya
							</label>
						</div>

						<div>
							<a href="forgotpassword.php" class="txt1">
								Lupa Password?
							</a>
						</div>
					</div>

					<div class="container-login100-form-btn m-t-17">
						<button class="login100-form-btn" name="login" type="submit">
							Masuk
						</button>
					</div>

				</form>
			</div>
		</div>
	</div>
	

	<div id="dropDownSelect1"></div>

	<?php
		if (!$connection) {
			echo "Tidak terhubung ke dalam database";
		}
		else {
			session_start();
			if (isset($_POST['login'])) {
				$username =  ($_POST['username']);
				$password =  ($_POST['password']);
				$ambilDataUser = "SELECT * FROM admin WHERE username = '$username' AND password = '$password'";
				$hasilAmbilDataUser = mysqli_query($connection, $ambilDataUser);
				$cekUser = mysqli_num_rows($hasilAmbilDataUser);
				if ($cekUser > 0) {
					$_SESSION['login'] = $username;
					$data = mysqli_fetch_array($hasilAmbilDataUser, MYSQLI_ASSOC);

					//Pembuatan remmber me
					if($_POST['remember-me']) {
						$year = time() + 31536000;
						setcookie('rememberMe', $_POST['username'], $year);
					}
					elseif(!$_POST['remember-me']) {
						if(isset($_COOKIE['rememberMe'])) {
							$past = time() - 100;
							setcookie('rememberMe', ($_POST['username']), $past);
						}
					}
					//

					header("location: dashboard.php");
				}
				else {
					echo "<script>alert('Username atau password Anda salah')</script>";
				}
			}
		}	
	?>
	
<!--===============================================================================================-->
	<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/bootstrap/js/popper.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/daterangepicker/moment.min.js"></script>
	<script src="vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
	<script src="vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
	<script src="js/main.js"></script>

</body>
</html>