<!DOCTYPE html>
<html>
<head>
	<title>Dashboard</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="css/dashboard.css">
	<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
	<div class="w3-sidebar w3-bar-block w3-collapse w3-card w3-animate-left" style="width:200px;" id="mySidebar">
	    <button class="w3-bar-item w3-button w3-large w3-hide-large" onclick="w3_close()">Close &times;</button>
	    <a href="dashboard.php" class="w3-bar-item w3-button" id="active">Home</a>
		<button class="w3-button w3-block w3-left-align" onclick="myAccFunc()">
 		Masukkan Data <i class="fa fa-caret-down"></i>
		</button>
		<div id="demoAcc" class="w3-hide w3-white w3-card">
		    <a href="dashboard/input_data_karyawan.php" class="w3-bar-item w3-button"><li>Pekerja</li></a>
		    <a href="dashboard/input_data_perusahaan.php" class="w3-bar-item w3-button"><li>Perusahaan</li></a>
		</div>
		<button class="w3-button w3-block w3-left-align" onclick="myAccFunc2()">
 		Lihat Data <i class="fa fa-caret-down"></i>
		</button>
		<div id="demoAcc2" class="w3-hide w3-white w3-card">
		    <a href="dashboard/read_data_karyawan.php" class="w3-bar-item w3-button"><li>Pekerja</li></a>
		    <a href="dashboard/read_data_perusahaan.php" class="w3-bar-item w3-button"><li>Perusahaan</li></a>
		</div>
		<button class="w3-button w3-block w3-left-align" onclick="myAccFunc3()">
 		Edit Data <i class="fa fa-caret-down"></i>
		</button>
		<div id="demoAcc3" class="w3-hide w3-white w3-card">
		    <a href="dashboard/edit_data_karyawan.php" class="w3-bar-item w3-button"><li>Pekerja</li></a>
		    <a href="dashboard/edit_data_perusahaan.php" class="w3-bar-item w3-button"><li>Perusahaan</li></a>
		</div>
	    <a href="dashboard/delete_data_karyawan.php" class="w3-bar-item w3-button">Hapus Data Pekerja</a>

		<a href="logout.php" class="w3-bar-item w3-button" id="logout">Keluar
	  		<i class="material-icons" style="font-size:18px;">&#xe879;</i>
	   </a>
	</div>

	<div class="w3-main" style="margin-left:200px">
	<div class="w3-teal">
	  <button class="w3-button w3-teal w3-xlarge w3-hide-large" onclick="w3_open()">&#9776;</button>
	  <div class="w3-container">
	    <h1>
	    	<?php
				include 'connection.php';
				session_start();
				if (isset($_SESSION['login'])) {
					echo "Selamat datang {$_SESSION['login']}";
				}
				else
				{
					echo "<script>alert('Anda harus melakukan login terlebih dahulu!')</script>";
			?>
				<script type="text/javascript">location.assign('index.php')</script>
			<?php
				}
			?>
	    </h1>
	  </div>
	</div>

	<div class="w3-container">
		<h3>Aplikasi Pendataan pekerja Pihak Ketiga RSCM</h3>
		<p>Aplikasi ini menunjang berbagai fitur antara lain:</p>
		<ol>
			<li><em>Input</em> data pekerja dan perusahaan</li>
			<li><em>Edit</em> data pekerja dan perusahaan</li>
			<li><em>Edit</em> data pekerja dan perusahaan</li>
			<li><em>Delete</em> data pekerja dan perusahaan</li>
		</ol>
		<p><b>Apabila ada hal yang ingin ditanyakan, dapat menghubungi narahubung di bawah ini: </b></p>
		<div class="card">
			<img src="images/fotoDev/nml.jpg" alt="Nur Muhammad Luthfi" style="width:100%;height: 170px;">
			<h4>Nur Muhammad Luthfi</h4>
			<p class="title">Computer Sience Student</p>
			<p>Telkom University</p>
			<div style="margin: 24px 0;">
			    <a href="https://www.facebook.com/schatz.cz" id="mediaSosial" target="_blank"><i class="fa fa-facebook"></i></a>  
			    <a href="https://www.linkedin.com/in/nur-muhammad-luthfi-293a65120/" id="mediaSosial" target="_blank"><i class="fa fa-linkedin" ></i></a>  
			    <a href="https://www.instagram.com/nmluthfi_/" id="mediaSosial" target="_blank"><i class="fa fa-instagram"></i></a> 
			</div>
			<p><button id="contact">Contact</button></p>
		</div>
	</div>
	   
	</div>

	<script>
	function w3_open() {
	    document.getElementById("mySidebar").style.display = "block";
	}
	function w3_close() {
	    document.getElementById("mySidebar").style.display = "none";
	}
	function myAccFunc() {
	    var x = document.getElementById("demoAcc");
	    if (x.className.indexOf("w3-show") == -1) {
	        x.className += " w3-show";
	        x.previousElementSibling.className += " w3-green";
	    } else { 
	        x.className = x.className.replace(" w3-show", "");
	        x.previousElementSibling.className = 
	        x.previousElementSibling.className.replace(" w3-green", "");
	    }
	}
	function myAccFunc2() {
	    var x = document.getElementById("demoAcc2");
	    if (x.className.indexOf("w3-show") == -1) {
	        x.className += " w3-show";
	        x.previousElementSibling.className += " w3-green";
	    } else { 
	        x.className = x.className.replace(" w3-show", "");
	        x.previousElementSibling.className = 
	        x.previousElementSibling.className.replace(" w3-green", "");
	    }
	}
	function myAccFunc3() {
	    var x = document.getElementById("demoAcc3");
	    if (x.className.indexOf("w3-show") == -1) {
	        x.className += " w3-show";
	        x.previousElementSibling.className += " w3-green";
	    } else { 
	        x.className = x.className.replace(" w3-show", "");
	        x.previousElementSibling.className = 
	        x.previousElementSibling.className.replace(" w3-green", "");
	    }
	}
	function myAccFunc4() {
	    var x = document.getElementById("demoAcc4");
	    if (x.className.indexOf("w3-show") == -1) {
	        x.className += " w3-show";
	        x.previousElementSibling.className += " w3-green";
	    } else { 
	        x.className = x.className.replace(" w3-show", "");
	        x.previousElementSibling.className = 
	        x.previousElementSibling.className.replace(" w3-green", "");
	    }
	}
	</script>
</body>
</html>
