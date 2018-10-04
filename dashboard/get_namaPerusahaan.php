<?php
	include '../connection.php';
	$nama = $_GET['nama'];
	$sql = "SELECT * FROM profile_perusahaan WHERE namaPerusahaan LIKE '%$nama%'";
	$query = mysqli_query($connection, $sql);
	while ($row = mysqli_fetch_array($query)) {
?>
<form method="POST" style="margin-top: 15px;">
	<div class="form-group">
    	<label for="exampleInputEmail1">Edit Data<?php echo" $row[namaPerusahaan]"?></label>
    	<input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="namaBaru" placeholder="<?php echo"$row[namaPerusahaan]"?>" required="">
    	<input type="hidden" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="idPerusahaan" value="<?php echo"$row[idPerusahaan]"?>" required="">
  	</div>
  	<div class="form-group form-check">
  	  	<input type="checkbox" class="form-check-input" id="exampleCheck1" required="">
   		<label class="form-check-label" for="exampleCheck1">Apakah Anda yakin?</label>
  	</div>
  	<button type="submit" class="btn btn-primary" id="submit" name="reset">Edit</button>
</form>
<?php
	}
?>

	