<?php
	include '../connection.php';
	$nama = $_GET['nama'];
	$sql = "SELECT * FROM profile_perusahaan WHERE namaPerusahaan LIKE '%$nama%'";
	$query = mysqli_query($connection, $sql);
?>
  <table id="myTable">
  <tr id="judul">
    <th>Kode Perusahaan</th>
    <th>Nama Perusahaan</th>
  </tr>
<?php
	while ($row = mysqli_fetch_array($query)) {
?>
  <tr>
    <td><?php echo"$row[idPerusahaan]"?></td>
    <td><?php echo"$row[namaPerusahaan]"?></td>
  </tr>
<?php
	}
?>
</table>


	