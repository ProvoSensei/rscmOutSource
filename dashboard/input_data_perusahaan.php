<?php
	include '../connection.php';
?>
<!DOCTYPE html>
<html>
<head>
	<title>Masukkan Data Perusahaan</title>
	<meta charset="utf-8">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T" crossorigin="anonymous"></script>
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
	<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="../css/input_data_perusahaan.css">
</head>
<body>
	<div class="w3-sidebar w3-bar-block w3-collapse w3-card w3-animate-left" style="width:200px;" id="mySidebar">
	    <button class="w3-bar-item w3-button w3-large w3-hide-large" onclick="w3_close()">Close &times;</button>
	    <a href="../dashboard.php" class="w3-bar-item w3-button">Home</a>
		<button class="w3-button w3-block w3-left-align" onclick="myAccFunc()">
 		Masukkan Data <i class="fa fa-caret-down"></i>
		</button>
		<div id="demoAcc" class="w3-hide w3-white w3-card">
		    <a href="input_data_karyawan.php" class="w3-bar-item w3-button"><li>Pekerja</li></a>
		    <a href="input_data_perusahaan.php" class="w3-bar-item w3-button" id="active"><li>Perusahaan</li></a>
		</div>
		<button class="w3-button w3-block w3-left-align" onclick="myAccFunc2()">
 		Lihat Data <i class="fa fa-caret-down"></i>
		</button>
		<div id="demoAcc2" class="w3-hide w3-white w3-card">
		    <a href="read_data_karyawan.php" class="w3-bar-item w3-button"><li>Pekerja</li></a>
		    <a href="read_data_perusahaan.php" class="w3-bar-item w3-button"><li>Perusahaan</li></a>
		</div>
		<button class="w3-button w3-block w3-left-align" onclick="myAccFunc3()">
 		Edit Data <i class="fa fa-caret-down"></i>
		</button>
		<div id="demoAcc3" class="w3-hide w3-white w3-card">
		    <a href="edit_data_karyawan.php" class="w3-bar-item w3-button"><li>Pekerja</li></a>
		    <a href="edit_data_perusahaan.php" class="w3-bar-item w3-button"><li>Perusahaan</li></a>
		</div>
		<a href="delete_data_karyawan.php" class="w3-bar-item w3-button">Hapus Data Pekerja</a>
		<a href="../logout.php" class="w3-bar-item w3-button" id="logout">Keluar
	  		<i class="material-icons" style="font-size:18px;">&#xe879;</i>
	   </a>
	</div>

	<div class="w3-main" style="margin-left:200px">
		<div class="w3-teal">
		  	<button class="w3-button w3-teal w3-xlarge w3-hide-large" onclick="w3_open()">&#9776;</button>
		  	<div class="w3-container">
		    	<h1>Masukkan Data Perusahaan</h1>
		 	 </div>
		</div>

		<form method="POST" id="form">
		  	<div class="form-row">
		    	<div class="form-group col-md-6">
		      		<label>Nama Perusahaan:</label>
		      		<input type="text" class="form-control" id="namaPerusahaan" placeholder="Nama Perusahaan" name="nama-perusahaan" required="Kolom ini harus diisi">
		   		</div>
		   	</div>
		   	<button type="submit" class="btn" name="submit" id="submit">Submit</button>
		</form>
	</div>

	<?php
		session_start();
		if (isset($_SESSION['login'])) {
			if(isset($_POST['submit'])) {
				$nama_perusahaan = $_POST['nama-perusahaan'];
				$ambilNama = "SELECT namaPerusahaan FROM profile_perusahaan WHERE namaPerusahaan = '$nama_perusahaan'";
				$hasilambilDataPerusahaan = mysqli_query($connection, $ambilNama);
				$cekNama = mysqli_num_rows($hasilambilDataPerusahaan);
				if($cekNama > 0) {
					echo "<script>alert('Nama perusahaan sudah terdaftar!')</script>";
				}
				else {
					$inputNama = "INSERT INTO profile_perusahaan VALUES ('', '$nama_perusahaan')";
					$hasilTambahNama = mysqli_query($connection, $inputNama);
					if ($hasilTambahNama == true) {
					echo "<script>alert('Nama perusahaan berhasil terdaftar!')</script>";
					}
					else{
						echo "<script>alert('Gagal nenambahkan!')</script>";
					}
				}
			}
		}
		else
		{
			echo "<script>alert('Anda harus melakukan login terlebih dahulu!')</script>";
	?>
		<script type="text/javascript">location.assign('../index.php')</script>
	<?php
		}
	?>

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