<?php
  include '../connection.php';
  $nama = $_GET['nama'];
  $sql = "SELECT * FROM profile_pekerja WHERE namaPekerja LIKE '%$nama%'";
  $query = mysqli_query($connection, $sql);
  $sql2 = "SELECT * FROM profile_perusahaan INNER JOIN profile_pekerja ON profile_pekerja.idPerusahaan = profile_perusahaan.idPerusahaan WHERE namaPekerja LIKE '%$nama%'";
  $query2 = mysqli_query($connection, $sql2);
  // Mencari nama Perushaaan
?>
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
  while ($row = mysqli_fetch_array($query) AND $row2 = mysqli_fetch_array($query2, MYSQLI_ASSOC)) {
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