<?php
	include '../connection.php';
	$nama = $_GET['nama'];
	$sql = "SELECT * FROM profile_pekerja WHERE namaPekerja LIKE '%$nama%'";
	$query = mysqli_query($connection, $sql);
  $sql2 = "SELECT * FROM profile_perusahaan INNER JOIN profile_pekerja ON profile_pekerja.idPerusahaan = profile_perusahaan.idPerusahaan WHERE namaPekerja LIKE '%$nama%'";
  $query2 = mysqli_query($connection, $sql2);
	while ($row = mysqli_fetch_array($query) AND $row2 = mysqli_fetch_array($query2, MYSQLI_ASSOC)) {
?>
<img src="../foto_pekerja/<?php echo"$row[foto]"?>" alt="<?php echo"$row[namaPekerja]"?>" id="pp">
<form method="POST" id="form2" autocomplete="off" enctype="multipart/form-data">
        <div class="form-row">
          <div class="form-group col-md-6">
              <label>Nama Lengkap</label>
              <input type="text" class="form-control" placeholder="Nama Pekerja" name="namaPekerja" value="<?php echo"$row[namaPekerja]"?>">
          </div>
          <div class="form-group col-md-3">
            <label>Tempat, Tanggal Lahir</label>
            <input type="text" class="form-control" id="inputAddress" placeholder="Tempat, Tanggal Lahir" name="tempatTL" required="" value="<?php echo"$row[tempatTL]"?>">
          </div>
          <div class="form-group col-md-3">
              <label for="inputZip">Jenis Kelamin</label>
              <input type="text" class="form-control" name="jenisKelamin" value="<?php echo"$row[kelamin]"?>">
          </div>
        </div>
        <div class="form-group" class="autocomplete">
          <label>Alamat</label>
          <input type="text" class="form-control" id="inputAddress" placeholder="Alamat" name="alamat" value="<?php echo"$row[alamat]"?>">
      </div>
      <div class="form-row">
          <div class="form-group col-md-6">
              <label>Kota/Kabupaten</label>
              <input type="text" class="form-control" id="kota" name="kota" value="<?php echo"$row[kota]"?>">
          </div>
          <div class="form-group col-md-6">
              <label for="inputState">Kecamatan</label>
              <input type="text" class="form-control" id="myInput" name="kecamatan" value="<?php echo"$row[kecamatan]"?>">
          </div>
      </div>
      <div class="form-row">
          <div class="form-group col-md-4">
              <label for="inputZip">Jenis Identitas</label>
              <input type="text" class="form-control" name="jenisIdentitas" value="<?php echo"$row[jenisIdentitas]"?>">
          </div>   
          <div class="form-group col-md-4">
            <label>Nomor Identitas</label>
            <input type="number" class="form-control" id="inputPassword4" placeholder="Nomor Identitas" name="noKTP" value="<?php echo"$row[noKTP]"?>">
          </div>
          <div class="form-group col-md-4">
            <label>Nomor NIK</label>
            <input type="number" class="form-control" id="inputPassword4" placeholder="Nomor NIK" name="noNIK" value="<?php echo"$row[noNIK]"?>">
          </div>      
      </div>
      <div class="form-row">
        <div class="form-group col-md-4">
            <label>Jenis Pekerjaan</label>
            <input type="text" class="form-control" placeholder="Nama Pekerja" name="jenisPekerjaan" value="<?php echo"$row[jenisPekerjaan]"?>">
        </div>
        <div class="form-group col-md-4">
            <label>Jabatan</label>
            <input type="text" class="form-control" placeholder="Nama Pekerja" name="jabatan" value="<?php echo"$row[jabatan]"?>">
        </div>
          <div class="form-group col-md-4">
            <label for="inputZip">Nomor Telepon</label>
            <input type="number" class="form-control" name="noTelepon" value="<?php echo"$row[noTelepon]"?>">
          </div>
      </div>
      <div class="form-row">
        <div class="form-group col-md-6">
              <label>Masa Pekerjaan/Kontrak</label>
              <input type="date" class="form-control" placeholder="Masa Pekerjaan / Kontrak" name="masaPekerjaan" value="<?php echo"$row[masaPekerjaan]"?>">
        </div>
        <div class="form-group col-md-6">
            <label>Foto Pekerja</label>
          <div class="custom-file">
              <input type="file" class="custom-file-input" id="customFile" name="foto" value="../foto_pekerja/<?php echo"$row[foto]"?>">
              <label class="custom-file-label" for="customFile">Choose file</label>
          </div>
        </div>
      </div>
        <div class="form-row">
            <div class="form-group col-md-4">
              <label>Kode Perusahaan</label>
              <input type="text" class="form-control" placeholder="Nama Pekerja" name="idPerusahaan" value="<?php echo"$row2[idPerusahaan]"?>">
            </div>
            <div class="form-group col-md-4">
              <label>Nama Perusahaan</label>
              <input type="text" class="form-control" placeholder="Nama Pekerja" name="namaPerusahaan" value="<?php echo"$row2[namaPerusahaan]"?>" disabled>
            </div>

            <div class="form-group col-md-4">
              <input type="hidden" class="form-control" placeholder="Nama Pekerja" name="idPekerja" value="<?php echo"$row[idPekerja]"?>">
            </div>
        </div>      </div>
        <div class="form-group form-check">
          <input type="checkbox" class="form-check-input" id="exampleCheck1" required="">
          <label class="form-check-label" for="exampleCheck1">Apakah Anda yakin?</label>
        </div>
        <button type="submit" class="btn" id="submit" name="delete">Hapus</button>
    </form>
    <br>
<?php
	}
?>