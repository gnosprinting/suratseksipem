<?php
session_start();
//cek apakah yang mengakses halaman ini sudah login
if($_SESSION['level']=="" || $_SESSION['level']=="rakyat"){
	header("location:login.php");
}else {
include ('header.php');
?>
<?php
	$nik = $_GET ['nik'];
	$sql = mysqli_query($koneksi, "SELECT * FROM t_penduduk WHERE nik='$nik'");
	if (mysqli_num_rows($sql)==0) {
	?>
		<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>NIK Tidak Ada..!</div>
	<?php
	}else{
		$row = mysqli_fetch_assoc($sql);
	}
	//Proses Simpan Data
	if(isset($_POST['add'])){
		$no_kk			= $_POST['no_kk'];
		$nama				= $_POST['nama'];
		$nik				= $_POST['nik'];
		$tempat_lahir		= $_POST['tempat_lahir'];
		$tanggal_lahir		= $_POST['tanggal_lahir'];
		$status				= $_POST['status'];
		$alamat				= $_POST['alamat'];
		$rt_rw				= $_POST['rt_rw'];
		$agama				= $_POST['agama'];
		$pendidikan				= $_POST['pendidikan'];
		$pekerjaan				= $_POST['pekerjaan'];
		$status_keluarga				= $_POST['status_keluarga'];
		$id_kelurahan		= $_POST['id_kelurahan'];
		$id_kecamatan		= $_POST['id_kecamatan'];


		$update = mysqli_query($koneksi, "UPDATE t_penduduk SET no_kk='$no_kk', nama='$nama', tempat_lhr='$tempat_lahir', tgl_lhr='$tanggal_lahir', alamat='$alamat',id_kelurahan='$id_kelurahan',id_kecamatan='$id_kecamatan', rt_rw='$rt_rw', status='$status', agama='$agama', pendidikan='$pendidikan', pekerjaan='$pekerjaan', status_keluarga='$status_keluarga' WHERE nik='$nik'") or die(mysqli_error());
		if ($update) {
		?>
		<div class="alert alert-success alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button> Data berhasil disimpan.</div>
		<meta http-equiv='refresh' content='1; url=penduduk_data.php'/>
		<?php
		}else{
		?> <div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Data gagal disimpan, silahkan coba lagi.</div>
		<?php
		}
	}
	?>
		<h2>Data Penduduk &raquo; Edit Data</h2>
		<hr />
		<form class="form-horizontal" action="" method="post">
  <div class="row">
    <div class="col">
			<div class="form-group">
				<label class=" control-label">No KK</label>
						<input type="text" name="no_kk" value="<?php echo $row['no_kk'] ?>" class="form-control"
							placeholder="No KK" required>
					</div>
	<div class="form-group">
		<label class=" control-label">Nama</label>
		<input type="text" name="nama" value="<?php echo $row['nama'] ?>" class="form-control"
					placeholder="Nama" required>
			</div>

		<input type="hidden" name="nik" value="<?php echo $row['nik'] ?>" class="form-control"placeholder="NIK" required >

	<div class="form-group">
		<label class="control-label">Tempat Lahir</label>
		<input type="text" name="tempat_lahir"  value="<?php echo $row['tempat_lhr'] ?>" class="form-control" placeholder="Tempat Lahir" required>
			</div>
	<div class="form-group">
		<label class=" control-label">Tanggal Lahir</label>
		<input type="date" name="tanggal_lahir" value="<?php echo $row['tgl_lhr'] ?>" class="input-group form-control" required>
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
						<option value="Janda"> Duda</option>

					</select>
			</div>
			<div class="form-group">
				<label class="control-label">Alamat</label>
				<input type="text" name="alamat" value="<?php echo $row['alamat'] ?>" class="form-control" placeholder="Alamat"></required>
			</div>
			<div class="form-group">
				<label class="control-label">Rt_Rw</label>
				<input type="text" name="rt_rw"  value="<?php echo $row['rt_rw'] ?>" class="form-control" placeholder="Rt_Rw" required>
		</div>
		<div class="form-group">
			<label class="control-label">Agama</label>
				<input type="text" name="agama"  value="<?php echo $row['agama'] ?>" class="form-control" placeholder="Islam/Kristen/dll" required>
		</div>
		<div class="form-group">
			<label class="control-label">Pekerjaan</label>
				<input type="text" name="pekerjaan"  value="<?php echo $row['pekerjaan'] ?>" class="form-control" placeholder="Pekerjaan" required>
		</div>
		<div class="form-group">
			<label class="control-label">Pendidikan Terakhir</label>
				<input type="text" name="pendidikan"  value="<?php echo $row['pendidikan'] ?>" class="form-control" placeholder="pendidikan" required>
		</div>
		<div class="form-group">
			<label class="control-label">Status Dalam Keluarga</label>
				<input type="text" name="status_keluarga"  value="<?php echo $row['status_keluarga'] ?>" class="form-control" placeholder="Suami/Isteri/Anak Pertama/dst" required>
		</div>
		<div class="form-group">
				<input type="hidden" name="id_kelurahan" value="<?php echo $row['id_kelurahan'] ?>" class="form-control" ></required>
			</div>
			<div class="form-group">
				<input type="hidden" name="id_kecamatan" value="<?php echo $row['id_kecamatan'] ?>" class="form-control" ></required>
			</div>
			<div class="form-group">
				<button type="submit" name="add" class="btn
				btn-primary" value="Simpan">Simpan</button>
				<a class="btn btn-danger" href="penduduk_data.php">Kembali</a>
		</div>
  </div>
</form>
<?php include "footer.php"; }?>
