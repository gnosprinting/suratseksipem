<?php
session_start();
//cek apakah yang mengakses halaman ini sudah login
if($_SESSION['level']=="" || $_SESSION['level']=="rakyat"){
	header("location:login.php");
}else {
include ('header.php');
?>
<?php
	$id = $_GET ['id'];
	$sql = mysqli_query($koneksi, "SELECT * FROM surat_domisili WHERE id='$id'");
	if (mysqli_num_rows($sql)==0) {
	?>
		<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Surat Tidak Ada..!</div>
	<?php
	}else{
		$row = mysqli_fetch_assoc($sql);
	}
	//Proses Simpan Data
	if(isset($_POST['add'])){
		$status_surat		= $_POST['status_surat'];
		$ket_surat		= $_POST['ket_surat'];
		$tgl_surat		= date('Y-m-d');
		//tgl_surat='$tgl_surat'
		$update = mysqli_query($koneksi, "UPDATE surat_domisili SET status_surat='$status_surat',ket_surat='$ket_surat',tgl_surat='$tgl_surat' WHERE id='$id'") or die(mysqli_error());
		if ($update) {
		?>
		<div class="alert alert-success alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button> Data berhasil disimpan.</div>
		<meta http-equiv='refresh' content='3; url=surat_domisili.php'/>
		<?php
		}else{
		?> <div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Data gagal disimpan, silahkan coba lagi.</div>
		<?php
		}
	}
	?>
		<h2>Data Surat Domisili &raquo; Proses</h2>
		<hr />
		<form class="form-horizontal" action="" method="post">
			<div class="row">
				<div class="col-md-4">
					<img src="img/<?php echo $row['s_pengantar']?>" alt="" width="300" height="350">
					<p style="text-align:center;">Surat Pengantar</p>
				</div>
				<div class="col-md-4">
					<img src="img/<?php echo $row['s_ktp']?>" alt="" width="300">
					<p style="text-align:center;">KTP</p>
				</div>
				<div class="col-md-4">
					<img src="img/<?php echo $row['s_kk']?>" alt="" width="350">
					<p style="text-align:center;">KK Penanggung Jawab</p>
				</div>
			</div>
  <div class="row">
    <div class="col">
	<div class="form-group">
		<label class=" control-label">Nama</label>
		<input type="text" name="nama" value="<?php echo $row['nama'] ?>" class="form-control"
					placeholder="Nama" disabled>
			</div>
	<div class="form-group">
		<label class="control-label">Tempat Lahir</label>
		<input type="text" name="tempat_lahir"  value="<?php echo $row['tempat_lhr'] ?>" class="form-control" placeholder="Tempat Lahir" disabled>
			</div>
	<div class="form-group">
		<label class=" control-label">Tanggal Lahir</label>
		<input type="date" name="tanggal_lahir" value="<?php echo $row['tgl_lhr'] ?>" class="input-group form-control" disabled>
			</div>
		</div>

    <div class="col">
			<div class="form-group">
				<label class="control-label">Status Pernikahan</label>
				<input type="text" name="alamat" value="<?php echo $row['status'] ?>" class="form-control" placeholder="Alamat" disabled></required>
			</div>
			<div class="form-group">
				<label class="control-label">Alamat</label>
				<input type="text" name="alamat" value="<?php echo $row['alamat'] ?>" class="form-control" placeholder="Alamat" disabled></required>
			</div>
		<div class="form-group">
				<input type="hidden" name="id_kelurahan" value="<?php echo $row['id_kelurahan'] ?>" class="form-control" disabled></required>
			</div>
			<div class="form-group">
				<input type="hidden" name="id_kecamatan" value="<?php echo $row['id_kecamatan'] ?>" class="form-control" disabled></required>
			</div>
			<div class="form-group">
				<label class=" control-label">Proses Surat</label>
					<select name="status_surat" class="form-control">
						<option value="ditolak"> Tolak Surat</option>
						<option value="diproses"> Tindak Lanjuti</option>
						<option value="selesai"> Selesai</option>
					</select>
			</div>
			<div class="form-group">
				<label class="control-label">Keterangan</label>
				<input type="text" name="ket_surat" value="" class="form-control" placeholder="Isi Apabila Surat Ditolak...!"></required>
			</div>
			<div class="form-group">
				<button type="submit" name="add" class="btn
				btn-primary" value="Simpan">Simpan</button>
				<a class="btn btn-danger" href="surat_domisili.php">Kembali</a>
		</div>
  </div>
</form>
<?php include "footer.php"; }?>
