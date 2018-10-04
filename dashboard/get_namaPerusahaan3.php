<?php
  include '../connection.php';
  $namaPerusahaan = $_GET['namaPerusahaan'];
  // $sql3 = "SELECT * FROM profile_perusahaan WHERE namaPerusahaan LIKE '%$namaPerusahaan%'";
  // $query3 = mysqli_query($connection, $sql3);
  $sql4 = "SELECT * FROM profile_pekerja INNER JOIN profile_perusahaan ON profile_pekerja.idPerusahaan = profile_perusahaan.idPerusahaan WHERE namaPerusahaan LIKE '%$namaPerusahaan%'";
  $query4 = mysqli_query($connection, $sql4);
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
  while ($row4 = mysqli_fetch_array($query4) ) {
?>
    <tr>
      <td><?php echo"$row4[No]"?></td>
      <td><?php echo "$row4[idPekerja]" ?></td>
      <td><a href="print_data.php?id=<?php echo"$row4[idPekerja]"?>" target="_blank"><?php echo"$row4[namaPekerja]"?></a></td>
      <td><?php echo"$row4[jenisPekerjaan]"?></td> 
      <td><?php echo"$row4[jabatan]"?></td>              
      <td><?php echo"$row4[namaPerusahaan]"?></td>
      <td><?php echo"$row4[masaPekerjaan]"?></td>
      <td><?php echo"$row4[jenisIdentitas]"?></td>
      <td><?php echo"$row4[noKTP]"?></td>
      <td><?php echo"$row4[alamat]"?></td>
      <td><?php echo"$row4[kota]"?></td>
      <td><?php echo"$row4[kelamin]"?></td>
      <td><?php echo"$row4[noTelepon]"?></td>
    </tr>
<?php
    }
?>
  </table>