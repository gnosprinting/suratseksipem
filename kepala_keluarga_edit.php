<?php
session_start();
//cek apakah yang mengakses halaman ini sudah login
if($_SESSION['level']=="" || $_SESSION['level']=="rakyat"){
	header("location:login.php");
}else {
include ('header.php');
?>
<?php
	$nokk = $_GET ['nokk'];
	$sql = mysqli_query($koneksi, "SELECT * FROM v_kk WHERE nokk='$nokk'");
	if (mysqli_num_rows($sql)==0) {
	?>
		<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>No KK Tidak Ada..!</div>
	<?php
	}else{
		$row = mysqli_fetch_assoc($sql);
	}
	//Proses Simpan Data
	if(isset($_POST['add'])){
		$nik				= $_POST['nik'];


		$update = mysqli_query($koneksi, "UPDATE t_kk SET id_kepala_keluarga='$nik' WHERE nokk='$nokk'") or die(mysqli_error());
		if ($update) {
		?>
		<div class="alert alert-success alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button> Kepala Keluarga berhasil diubah.</div>
		<meta http-equiv='refresh' content='2; url=kepala_keluarga_data.php'/>
		<?php
		}else{
		?> <div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Data gagal diubah, silahkan coba lagi.</div>
		<?php
		}
	}
	?>
		<h2>Data Kepala Keluarga &raquo; Edit Data</h2>
		<hr />
		<form class="form-horizontal" action="" method="post">
			<div class="row">
				<div class="col">
					<div class="form-group">
						<label class=" control-label">No KK</label>
						<input type="text" name="no_kk" value="<?php echo $row['nokk'] ?>" class="form-control"
						readonly='true'>
					</div>
					<div class="form-group">
						<label class=" control-label">NIK</label>
						<select name="nik" class="form-control">
							<option value="<?php echo $row['nik_kepala_keluarga']; ?>"><?php echo $row['nik_kepala_keluarga']; ?> - <?php echo $row['nama']; ?></option>
							<option value="">--------------</option>
							<?php
								$mySql = "SELECT * FROM t_penduduk WHERE no_kk='$nokk'";
								$myQry = mySqli_query ($koneksi, $mySql) or die ("Query salah : ".mysqli_error ($koneksi));
								while ($kolomData = mysqli_fetch_array ($myQry)) {
							?>
							<option value="<?php echo $kolomData['nik']; ?>"> <?php echo $kolomData['nik']; ?> - <?php echo $kolomData['nama']; ?></option>
							<?php } ?>
						</select>
					</div>
					<div class="form-group">
						<button type="submit" name="add" class="btn btn-primary" value="Simpan">Simpan</button>
						<a class="btn btn-danger" href="kepala_keluarga_data.php">Kembali</a>
					</div>
				</div>

				<div class="col">
					<div class="form-group">
						<label class=" control-label">Nama</label>
						<input type="text" name="nama" value="<?php echo $row['nama'] ?>" class="form-control"
						readonly='true'>
					</div>
					<div class="form-group">
						<label class="control-label">Tempat Lahir</label>
						<input type="text" name="tempat_lahir"  value="<?php echo $row['tempat_lhr'] ?>" class="form-control" readonly='true'>
					</div>
					<div class="form-group">
						<label class=" control-label">Tanggal Lahir</label>
						<input type="date" name="tanggal_lahir" value="<?php echo $row['tgl_lhr'] ?>" class="input-group form-control" readonly='true'>
					</div>
					<div class="form-group">
						<label class="control-label">Alamat</label>
						<input type="text" name="alamat" value="<?php echo $row['alamat'] ?>" class="form-control" readonly='true'>
					</div>
					<div class="form-group">
						<label class="control-label">Rt_Rw</label>
						<input type="text" name="rt_rw"  value="<?php echo $row['rt_rw'] ?>" class="form-control" readonly='true'>
					</div>
				</div>
			</form>
<?php include "footer.php"; }?>
