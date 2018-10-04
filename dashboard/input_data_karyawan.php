<?php
	include '../connection.php';
	session_start();
	if (!isset($_SESSION['login'])) {
		$admin = $_SESSION[login];

		echo "<script>alert('Anda harus melakukan login terlebih dahulu!')</script>";
?>
		<script type="text/javascript">location.assign('../index.php')</script>
<?php	
	}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Input Data Pekerja Pihak Ke-3</title>
	<meta charset="utf-8">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T" crossorigin="anonymous"></script>
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
	<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="../css/input_data_karyawan.css">
</head>
<body>
	<div class="w3-sidebar w3-bar-block w3-collapse w3-card w3-animate-left" style="width:200px;" id="mySidebar">
	    <button class="w3-bar-item w3-button w3-large w3-hide-large" onclick="w3_close()">Close &times;</button>
	    <a href="../dashboard.php" class="w3-bar-item w3-button">Home</a>
		<button class="w3-button w3-block w3-left-align" onclick="myAccFunc()">
 		Masukkan Data <i class="fa fa-caret-down"></i>
		</button>
		<div id="demoAcc" class="w3-hide w3-white w3-card">
		    <a href="input_data_karyawan.php" class="w3-bar-item w3-button" id="active"><li>Pekerja</li></a>
		    <a href="input_data_perusahaan.php" class="w3-bar-item w3-button"><li>Perusahaan</li></a>
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
	    		<h1>Masukkan Data Pekerja Pihak Ke-3</h1>
	    	</div>
		</div>

		<form method="POST" id="form" autocomplete="off" enctype="multipart/form-data">
	  		<div class="form-row">
	    		<div class="form-group col-md-6">
	      			<label>Nama Lengkap</label>
	      			<input type="text" class="form-control" placeholder="Nama Pekerja" required="" name="namaPekerja">
	    		</div>
	    		<div class="form-group col-md-3">
				    <label>Tempat, Tanggal Lahir</label>
				    <input type="text" class="form-control" id="inputAddress" placeholder="Tempat, Tanggal Lahir" name="tempatTL" required="">
				</div>
				<div class="form-group col-md-3">
			      	<label for="inputState">Jenis Kelamin</label>
				    <select id="inputState" class="form-control" required="" name="jenisKelamin">
				        <option selected value="Laki-laki">Pria</option>
				        <option value="Perempuan">Wanita</option>
				    </select>
			    </div>
	  		</div>
	  		<div class="form-group" class="autocomplete">
			    <label>Alamat</label>
			    <input type="text" class="form-control" id="inputAddress" placeholder="Alamat" name="alamat" required="">
			</div>
			<div class="form-row">
			    <div class="form-group col-md-6">
			      	<label>Kecamatan</label>
			      	<input type="text" class="form-control" id="kota" name="kecamatan" required="" placeholder="Kecamatan">
			    </div>
			    <div class="form-group col-md-6">
			      	<label for="inputState">Kota/Kabupaten</label>
			      	<input type="text" class="form-control"  name="kota" required="" placeholder="Kota/Kabupaten">
			    </div>
			</div>
			<div class="form-row">
				<div class="form-group col-md-4">
			      	<label for="inputState">Jenis Identitas</label>
				    <select id="inputState" class="form-control" required="" name="jenisIdentitas">
				        <option selected value="KTP">KTP</option>
				        <option value="SIM">SIM</option>
				        <option value="Surat Keterangan">Surat Keterangan</option>
				    </select>
			    </div>	    		
			    <div class="form-group col-md-4">
			      <label>Nomor Identitas</label>
			      <input type="number" class="form-control" id="inputPassword4" placeholder="Nomor Identitas" name="noKTP" >
			    </div>
			    <div class="form-group col-md-4">
			      <label>Nomor NIK</label>
			      <input type="number" class="form-control" id="inputPassword4" placeholder="Nomor NIK" name="noNIK">
			    </div>
			</div>
			<div class="form-row">
			    
			    <div class="form-group col-md-4">
			    	<label for="inputState">Jenis Pekerjaan</label>
			      	<select id="inputState" class="form-control" required="" name="jenisPekerjaan">
				        <option selected value="Security">Security</option>
				        <option value="Pramusaji">Pramusaji</option>
				        <option value="Caraka/Porter">Caraka/Porter</option>
				        <option value="Health Care Assitance">Health Care Assitance</option>
				        <option value="Meeter Greater">Meeter Greater</option>
				        <option value="Cleaning Service">Cleaning Service</option>
				        <option value="Biosis">Biosis</option>
				        <option value="Proyek Renovasi">Proyek Renovasi</option>
				        <option value="Dan Lain-lain"> Dan Lain-lain</option>
				    </select>
			    </div>
			    <div class="form-group col-md-4">
	      			<label>Jabatan</label>
	      			<input type="text" class="form-control" placeholder="Jabatan" required="" name="jabatan">
	    		</div>
			    <div class="form-group col-md-4">
			      	<label for="inputZip">Nomor Telepon</label>
			      	<input type="number" class="form-control" name="noTelepon" placeholder="Nomor Telepon">
			    </div>
			</div>
			<div class="form-row">
	    		
	    		<div class="form-group col-md-6">
	      			<label>Masa Pekerjaan/ Kontrak</label>
	      			<input type="date" class="form-control" placeholder="Masa Pekerjaan / Kontrak" required="" name="masaPekerjaan">
	    		</div>
	    		<div class="form-group col-md-6">
		    		<label>Foto Pekerja</label>
					<div class="custom-file">
					    <input type="file" class="custom-file-input" id="customFile" name="foto">
					    <label class="custom-file-label" for="customFile">Choose file</label>
					</div>
				</div>	
	  		</div>
		  	<div class="form-row">
		    	<div class="form-group col-md-4">
		     		<label>Perusahaan</label>
		      		<select id="inputState" class="form-control" required="" name="namaPerusahaan">
		    			<?php
		    				$ambilNamaPerusahaan = "SELECT * FROM profile_perusahaan ORDER BY namaPerusahaan ASC";
		    				$hasilAmbilNamaPerusahaan = mysqli_query($connection, $ambilNamaPerusahaan);
		    				while ($row = mysqli_fetch_array($hasilAmbilNamaPerusahaan)) {
		    					echo "<option value='$row[idPerusahaan]'>$row[namaPerusahaan]</option>";
		    				}
		    			?>        		
		      		</select>
		    	</div>
		  	</div>
	  		<button type="submit" class="btn" id="submit" name="submit">Submit</button>
	  		<p style="font-size: 14px; color: grey; margin-top: 5px;">*Selalu pastikan size foto tidak lebih dari 1mb!</p>
		</form>
	</div>


	<?php
		if(isset($_POST['submit'])) {
			$namaPekerja = $_POST['namaPekerja'];
			$tempatTL = $_POST['tempatTL'];
			$namaPerusahaan = $_POST['namaPerusahaan'];
			$noKTP = $_POST['noKTP'];
			$noNIK = $_POST['noNIK'];
			$alamat = $_POST['alamat'];
			$kota= $_POST['kota'];
			$kecamatan = $_POST['kecamatan'];
			$jenisIdentitas = $_POST['jenisIdentitas'];
			$jenisKelamin = $_POST['jenisKelamin'];
			$jenisPekerjaan = $_POST['jenisPekerjaan'];
			$noTelepon = $_POST['noTelepon'];
			$jabatan = $_POST['jabatan'];
			$masaPekerjaan = $_POST['masaPekerjaan'];
			$ekstensi_diperbolehkan	= array('png','jpg');
			$namaFoto = $_FILES['foto']['name'];
			$x = explode('.', $namaFoto);
			$ekstensi = strtolower(end($x));
			$ukuran	= $_FILES['foto']['size'];
			$file_tmp = $_FILES['foto']['tmp_name'];
			if(in_array($ekstensi, $ekstensi_diperbolehkan) === true){
				if($ukuran < 1044070){
					move_uploaded_file($file_tmp, '../foto_pekerja/'.$namaFoto);
					$inputDataPekerja = "INSERT INTO profile_pekerja VALUES ('', '$namaPerusahaan', '', '$namaPekerja', '$tempatTL', '$noKTP', '$noNIK', '$alamat', '$kota', '$kecamatan', '$jenisIdentitas', '$jenisKelamin', '$jenisPekerjaan', '$noTelepon', '$jabatan', '$masaPekerjaan', '$namaFoto')";
					$hasilInputDataPekerja = mysqli_query($connection, $inputDataPekerja);
					if ($hasilInputDataPekerja == true) {
						echo "<script>alert('Data pekerja berhasil ditambahkan!')</script>";
					} else {
						echo "<script>alert('Data pekerja gagal ditambahkan!')</script>";
					}
				} else {
					echo "<script>alert('Ukuran file terlalu besar! Maksimal 1 mb')</script>";
				}
			} else {
				echo "<script>alert(Eksistensi tidak didukung! Harus PNG/JPG')</script>";
			}
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