<?php
	include '../connection.php';
	$idPekerja = $_GET['id'];
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
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
	<style type="text/css">
		#pp {
		 	width: 113px;
  			height: 151px;
		}
		table {
			margin-top: 50px;
		}
		th {
		   color: black;
		}
		.ttd {
		  margin-top: 100px;
		  right: 0;
		  position: fixed;
		}

	</style>
</head>
<body>
	<?php
		$sql = "SELECT * FROM profile_pekerja WHERE idPekerja = '$idPekerja'";
	  	$query = mysqli_query($connection, $sql);
	  	$sql2 = "SELECT * FROM profile_perusahaan INNER JOIN profile_pekerja ON profile_pekerja.idPerusahaan = profile_perusahaan.idPerusahaan WHERE idPekerja = '$idPekerja'";
	  	$query2 = mysqli_query($connection, $sql2);
	  	while ($row = mysqli_fetch_array($query) AND $row2 = mysqli_fetch_array($query2, MYSQLI_ASSOC)) {
	?>
		<table>
			<tr>
				<th>Nama Pekerja</th>
    			<td><?php echo"$row[namaPekerja]"?></td>
			</tr>
			<tr>
				<th>Tempat, Tanggal Lahir</th>
    			<td><?php echo"$row[tempatTL]"?></td>
			</tr>
			<tr>
				<th>Jenis Kelamin</th>
    			<td><?php echo"$row[kelamin]"?></td>
			</tr>
			<tr>
				<th>Alamat</th>
    			<td><?php echo"$row[alamat]"?></td>
			</tr>		
			<tr>
				<th>Kecamatan</th>
    			<td><?php echo"$row[kecamatan]"?></td>
			</tr>
			<tr>
				<th>Kota/Kabupaten</th>
    			<td><?php echo"$row[kota]"?></td>
			</tr>
			<tr>
				<th>Jenis Identitas</th>
    			<td><?php echo"$row[jenisIdentitas]"?></td>
			</tr>
			<tr>
				<th>Nomor KTP</th>
    			<td><?php echo"$row[noKTP]"?></td>
			</tr>
			<tr>
				<th>Nomor NIK</th>
    			<td><?php echo"$row[noNIK]"?></td>
			</tr>
			<tr>
				<th>Jenis Pekerjaan</th>
    			<td><?php echo"$row[jenisPekerjaan]"?></td>
			</tr>
			<tr>
				<th>Jabatan</th>
    			<td><?php echo"$row[jabatan]"?></td>
			</tr>
			<tr>
				<th>Asal Perusahaan</th>
    			<td><?php echo"$row2[namaPerusahaan]"?></td>
			</tr>
			<tr>
				<th>No Telepon</th>
    			<td><?php echo"$row[noTelepon]"?></td>
			</tr>
			<tr>
				<th>Masa Pekerjaan/ Kontrak</th>
    			<td><?php echo"$row[masaPekerjaan]"?></td>
			</tr>
			<tr>
				<th>Foto Pekerja</th>
				<td><img src="../foto_pekerja/<?php echo"$row[foto]"?>" alt="<?php echo"$row[namaPekerja]"?>" id="pp"></td>
			</tr>
		</table>
		<div class="ttd">
			<p>Jakarta, <?php echo date('d-M-Y'); ?></p>
			<br>
			<br>
			<hr style="width:150px; border:1px solid black;">
			<p><?php echo "$row[namaPekerja]"?></p>
		</div>
	<?php
	  	}
	?>
	<script>
		window.print();
	</script>
</body>
</html>