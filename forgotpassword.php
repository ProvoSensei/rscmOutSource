<?php
	include 'connection.php';
//Send mail using gmail
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Lupa Password</title>
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
						Lupa Password?
					</span>

					
					<div class="wrap-input100 validate-input m-b-16" data-validate = "Username is required">
						<input class="input100" type="text" name="username" placeholder="Username Anda">
						<span class="focus-input100"></span>
					</div>

					<div class="wrap-input100 validate-input m-b-16" data-validate = "Email is required">
						<input class="input100" type="email" name="email" placeholder="Email Anda">
						<span class="focus-input100"></span>
					</div>
					<p style="color: white; font-size: 12px;">*Email akan dikirimkan ke email yang Anda tulis. Pastikan memasukan email dengan benar!</p>
					
					<div class="flex-sb-m w-full p-t-3 p-b-24">
						<div>
						
						</div>
						<div>
							<a href="index.php" class="txt1">
								Kembali?
							</a>
						</div>
					</div>

					<div class="container-login100-form-btn m-t-17">
						<button class="login100-form-btn" name="recovery" type="submit">
							Reset Password
						</button>
					</div>

				</form>
			</div>
		</div>
	</div>
	<div id="dropDownSelect1"></div>


	<?php
		//Melaukan validasi username
		if (isset($_POST) & !empty($_POST)) {
			$username = $_POST['username'];
			$email = $_POST['email'];
			$ambilDataUser = "SELECT * FROM admin WHERE username = '$username'";
			$hasilAmbilDataUser = mysqli_query($connection, $ambilDataUser);
			$cekUser = mysqli_num_rows($hasilAmbilDataUser);
			if ($cekUser == 1) {
				$r = mysqli_fetch_assoc($hasilAmbilDataUser);
				$password = $r['password'];
				$to = $email;
				$subject = "Pemiluhan Password Akun";
				$message = "Anda telah melakukan perintah forgot password. Username: ". $username . " Password: " . $password;

				if (mail($to, $subject, $message)) {
					echo "<script>alert('Password sudah dikirim ke email Anda')</script>";;
				}
				else {
					echo "<script>alert('Gagal melakukan pemulihan akun!')</script>";
				}
			} else {
				echo "<script>alert('Username salah!')</script>";
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