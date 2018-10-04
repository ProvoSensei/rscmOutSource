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
	<title>Read Data Karyawan</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T" crossorigin="anonymous"></script>
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
	<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="../css/read_data_perusahaan.css">
	<script type="text/javascript">
		function showJudul(str) {
	    if(str.length == 0){
				document.getElementById("combo").innerHTML="";
				return;
			}else{
				if(window.XMLHttpRequest){
					xmlhttp=new XMLHttpRequest();
				}else{
					xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
				}
				xmlhttp.onreadystatechange=function(){
					if(this.readyState==4 && this.status==200){
						document.getElementById("combo").innerHTML=this.responseText;
					}
				}
				xmlhttp.open("GET","get_namaKaryawan3.php?nama="+str,true);
				xmlhttp.send();
			}
		}
		function showPerusahaan(str) {
	    if(str.length == 0){
				document.getElementById("combo").innerHTML="";
				return;
			}else{
				if(window.XMLHttpRequest){
					xmlhttp=new XMLHttpRequest();
				}else{
					xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
				}
				xmlhttp.onreadystatechange=function(){
					if(this.readyState==4 && this.status==200){
						document.getElementById("combo").innerHTML=this.responseText;
					}
				}
				xmlhttp.open("GET","get_namaPerusahaan3.php?namaPerusahaan="+str,true);
				xmlhttp.send();
			}
		}
	</script>
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
		    <a href="input_data_perusahaan.php" class="w3-bar-item w3-button"><li>Perusahaan</li></a>
		</div>
		<button class="w3-button w3-block w3-left-align" onclick="myAccFunc2()">
 		Lihat Data <i class="fa fa-caret-down"></i>
		</button>
		<div id="demoAcc2" class="w3-hide w3-white w3-card">
		    <a href="read_data_karyawan.php" class="w3-bar-item w3-button" id="active"><li>Pekerja</li></a>
		    <a href="read_data_perusahaan.php" class="w3-bar-item w3-button" i><li>Perusahaan</li></a>
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
		    	<h1>Lihat Data Pekerja Pihak Ke-3</h1>
		 	 </div>
		</div>

		<div class="container">
		  	<div class="row">
		    	<div class="col">
		      		<form method="POST" id="form">
					  	<div class="form-row">
					    	<div class="form-group col-md-12">
					      		<p>Nama Pekerja:</p>
				  				<input type="text" name="search" placeholder="Search.." required="" name="nama-perusahaan" onkeyup="showJudul(this.value)">
					   		</div>
					   	</div>
						<button type="reset" class="btn" id="submit" name="reset">Reset</button>
					</form>
		    	</div>
		    	<div class="col">
		      		<form method="POST" id="form">
					  	<div class="form-row">
					    	<div class="form-group col-md-12">
					      		<p>Nama Perusahaan:</p>
				  				<input type="text" name="search" placeholder="Search.." required="" name="nama-perusahaan" onkeyup="showPerusahaan(this.value)">
					   		</div>
					   	</div>
						<button type="reset" class="btn" id="submit" name="reset">Reset</button>
					</form>
		    	</div>
		  	</div>
		</div>
		<hr style="border: 1px solid #009688; width: 97%; margin-top: 30px !important;margin: auto;">

	<div id="combo" class="formReset" style="overflow-x:auto;">
			<table id="myTable">
			 	<tr id="judul">
			 	 	<th>Nomor Urut</th>
			 	 	<th>ID Pekerja</th>
			    	<th>Nama Pekerja</th>
			    	<th>Jenis Pekerjaan</th>
			    	<th>Jabatan</th>		
			    	<th>Asal Perusahaan</th>
			    	<th>Masa Pekerjaan/ Kontrak</th>
			    	<th>Jenis Identitas</th>
			    	<th>Nomor Identitas</th>
			    	<th>Alamat</th>
			    	<th>Kota/Kabupaten</th>
			    	<th>Jenis Kelamin</th>
			    	<th>No Telepon</th>
			  	</tr>
	<?php
		$sql = "SELECT * FROM profile_pekerja";
		$query = mysqli_query($connection, $sql);
		$query2 = mysqli_query($connection, "SELECT profile_perusahaan.namaPerusahaan FROM profile_perusahaan INNER JOIN profile_pekerja ON profile_pekerja.idPerusahaan = profile_perusahaan.idPerusahaan ORDER BY No ASC");
		while($row = mysqli_fetch_array($query) AND $row2 = mysqli_fetch_array($query2)){
	?>
			 	 <tr>
			 	 	<td><?php echo"$row[No]"?></td>
			 	 	<td><?php echo "$row[idPekerja]" ?></td>
			    	<td><a href="print_data.php?id=<?php echo"$row[idPekerja]"?>" target="_blank"><?php echo"$row[namaPekerja]"?></a></td>
			    	<td><?php echo"$row[jenisPekerjaan]"?></td>	
			    	<td><?php echo"$row[jabatan]"?></td>			    		
			    	<td><?php echo"$row2[namaPerusahaan]"?></td>
			    	<td><?php echo"$row[masaPekerjaan]"?></td>
			    	<td><?php echo"$row[jenisIdentitas]"?></td>
			    	<td><?php echo"$row[noKTP]"?></td>
			    	<td><?php echo"$row[alamat]"?></td>
			    	<td><?php echo"$row[kota]"?></td>
			    	<td><?php echo"$row[kelamin]"?></td>
			    	<td><?php echo"$row[noTelepon]"?></td>
			  	</tr>
	<?php
		}
	?>
			</table>
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