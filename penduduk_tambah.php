<?php
session_start();
//cek apakah yang mengakses halaman ini sudah login
if($_SESSION['level']=="" || $_SESSION['level']=="rakyat"){
	header("location:login.php");
}else {
include ('header.php');
?>
<h3>Data penduduk &raquo; tambah Data </h3>
		<hr />
		<?php

	//Proses Simpan Data
	if(isset($_POST['add'])){
		$no_kk			= $_POST['no_kk'];
		$nama				= $_POST['nama'];
		$nik				= $_POST['nik'];
		$tempat_lahir		= $_POST['tempat_lahir'];
		$tanggal_lahir		= $_POST['tanggal_lahir'];
		$jenis_kelamin		= $_POST['jenis_kelamin'];
		$status				= $_POST['status'];
		$alamat				= $_POST['alamat'];
		$rt_rw				= $_POST['rt_rw'];
		$agama				= $_POST['agama'];
		$pendidikan				= $_POST['pendidikan'];
		$pekerjaan				= $_POST['pekerjaan'];
		$status_keluarga				= $_POST['status_keluarga'];
		$id_kelurahan		= $_POST['id_kelurahan'];
		$id_kecamatan		= $_POST['id_kecamatan'];
		// $pass					= '12345';
		// $level				= 'rakyat';


		$cek = mysqli_query($koneksi, "SELECT * FROM t_penduduk WHERE nik='$nik'");
			if (mysqli_num_rows($cek)){
	?>
			<div class="alert alert-danger alert-dismissable">
				<button type="button" class="close" data-dismiss=	"alert" aria-hidden="true">&times;
				</button>NIK Sudah Ada..!
			</div>
	<?php
		} else {
			$cek_kk = mySqli_query($koneksi, "SELECT * FROM t_kk WHERE nokk = '$no_kk'");
			if (mysqli_num_rows($cek_kk)==0) {
				$insert = mysqli_query($koneksi, "INSERT INTO t_penduduk(no_kk,nama, nik, tempat_lhr, tgl_lhr, jk,status, alamat, rt_rw, agama, pendidikan, pekerjaan, status_keluarga, id_kelurahan, id_kecamatan)
				VALUES('$no_kk', '$nama', '$nik', '$tempat_lahir', '$tanggal_lahir', '$jenis_kelamin', '$status', '$alamat', '$rt_rw', '$agama', '$pendidikan', '$pekerjaan', '$status_keluarga', '$id_kelurahan', '$id_kecamatan')") or die (mysqli_error ($koneksi));
				$inserts = mysqli_query($koneksi, "INSERT INTO t_kk(nokk,id_kepala_keluarga)
				VALUES('$no_kk', '$nik')") or die (mysqli_error ($koneksi));
				if ($insert) {
				?>
					<div class="alert alert-success alert-dismissable">
						<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;
						</button>Surat berhasil disimpan.
					</div>
					<meta http-equiv='refresh' content='2; url=penduduk_data.php'/>
				<?php
					} else {
				?>
					<div class="alert alert-danger alert-dismissable">
						<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;
						</button>Ups, Surat Gagal Disimpan!
					</div>
				<?php
					}
			}else{
				$insert = mysqli_query($koneksi, "INSERT INTO t_penduduk(no_kk,nama, nik, tempat_lhr, tgl_lhr, jk,status, alamat, rt_rw, agama, pendidikan, pekerjaan, status_keluarga, id_kelurahan, id_kecamatan)
				VALUES('$no_kk', '$nama', '$nik', '$tempat_lahir', '$tanggal_lahir', '$jenis_kelamin', '$status', '$alamat', '$rt_rw', '$agama', '$pendidikan', '$pekerjaan', '$status_keluarga', '$id_kelurahan', '$id_kecamatan')") or die (mysqli_error ($koneksi));
				if ($insert) {
				?>

					<div class="alert alert-success alert-dismissable">
						<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;
						</button>Surat berhasil disimpan.
					</div>
					<meta http-equiv='refresh' content='2; url=penduduk_data.php'/>
				<?php
					} else {
				?>
					<div class="alert alert-danger alert-dismissable">
						<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;
						</button>Ups, Surat Gagal Disimpan!
					</div>
				<?php
					}
			}
	}
}
	?>

	<form class="form-horizontal" action="" method="post">
  <div class="row">
    <div class="col">
			<div class="form-group">
				<label class=" control-label">No KK</label>
						<input type="text" name="no_kk" value="" class="form-control"
							placeholder="No KK" required>
					</div>
			<div class="form-group">
				<label class=" control-label">Nama</label>
				<input type="text" name="nama" value="" class="form-control"
					placeholder="Nama" required>
			</div>
	<div class="form-group">
		<label class=" control-label">NIK</label>
			<input type="text" name="nik" value="" class="form-control"placeholder="NIK" required>
			</div>
	<div class="form-group">
		<label class="control-label">Tempat Lahir</label>
			<input type="text" name="tempat_lahir" value="" class="form-control" placeholder="Tempat Lahir" required>
			</div>
	<div class="form-group">
		<label class=" control-label">Tanggal Lahir</label>
				<input type="date" name="tanggal_lahir" value="" class="input-group form-control" required>
			</div>
			<div class="form-group">
				<label class="control-label">Jenis Kelamin</label>
				<div class="">
					<input type="radio" name="jenis_kelamin" value="Laki-laki">Laki Laki
					<input type="radio" name="jenis_kelamin" value="Perempuan">Perempuan
					</div>
			</div>
		</div>

    <div class="col">
		<div class="form-group">
				<label class=" control-label">Status Pernikahan</label>

					<select name="status" class="form-control">
						<option value="">------------</option>
						<option value="Belum menikah"> Belum Menikah</option>
						<option value="Menikah"> Menikah</option>
						<option value="Janda"> Janda</option>
						<option value="Duda">Duda</option>
					</select>
			</div>
			<div class="form-group">
				<label class="control-label">Alamat</label>
					<input type="text" name="alamat" value="" class="form-control" placeholder="Alamat"></required>
			</div>
			<div class="form-group">
				<label class="control-label">Rt/Rw</label>
					<input type="text" name="rt_rw"  value="" class="form-control" placeholder="Rt/Rw" required>
			</div>
			<div class="form-group">
				<label class="control-label">Agama</label>
					<input type="text" name="agama"  value="" class="form-control" placeholder="Islam/Kristen/dll" required>
			</div>
			<div class="form-group">
				<label class="control-label">Pekerjaan</label>
					<input type="text" name="pekerjaan"  value="" class="form-control" placeholder="Pekerjaan" required>
			</div>
			<div class="form-group">
				<label class="control-label">Pendidikan Terakhir</label>
					<input type="text" name="pendidikan"  value="" class="form-control" placeholder="pendidikan" required>
			</div>
			<div class="form-group">
				<label class="control-label">Status Dalam Keluarga</label>
					<input type="text" name="status_keluarga"  value="" class="form-control" placeholder="Suami/Isteri/Anak Pertama/dst" required>
			</div>
		<div class="form-group">
					<input type="hidden" name="id_kelurahan" value="1" class="form-control" placeholder="id_kelurahan"></required>
			</div>
			<div class="form-group">
				<input type="hidden" name="id_kecamatan" value="1" class="form-control" placeholder="id_kecamatan"></required>
			</div>
			<div class="form-group">
				<button type="submit" name="add" class="btn
				btn-primary" value="Simpan">Simpan</button>
				<a class="btn btn-danger" href="penduduk_data.php">Kembali</a>
		</div>
  </div>
</form>
<?php include "footer.php"; }?>
