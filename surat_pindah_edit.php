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
	$sql = mysqli_query($koneksi, "SELECT * FROM surat_kematian WHERE id='$id'");
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
		$update = mysqli_query($koneksi, "UPDATE surat_kematian SET status_surat='$status_surat',ket_surat='$ket_surat',tgl_surat='$tgl_surat' WHERE id='$id'") or die(mysqli_error());
		if ($update) {
		?>
		<div class="alert alert-success alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button> Data berhasil disimpan.</div>
		<meta http-equiv='refresh' content='3; url=surat_kematian.php'/>
		<?php
		}else{
		?> <div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Data gagal disimpan, silahkan coba lagi.</div>
		<?php
		}
	}
	?>
		<h2>Data Surat kematian &raquo; Proses</h2>
		<hr />
		<form class="form-horizontal" action="" method="post">
			<div class="row">
				<div class="col-md-4">
					<img src="img/<?php echo $row['s_pengantar']?>" alt="" width="300" height="350">
					<p style="text-align:center;">Surat Pengantar</p>
				</div>
				<div class="col-md-4">
					<img src="img/<?php echo $row['s_pbb']?>" alt="" width="300" height="350">
					<p style="text-align:center;">Lunas PBB</p>
				</div>
				<div class="col-md-4">
					<img src="img/<?php echo $row['s_rs']?>" alt="" width="300" height="350">
					<p style="text-align:center;">Keterangan Rumahsakit</p>
				</div>
			</div>
			<div class="row">
				<div class="col-md-4">
					<img src="img/<?php echo $row['s_ktp_mati']?>" alt="" width="350">
					<p style="text-align:center;">KTP Mati</p>
				</div>
				<div class="col-md-4">
					<img src="img/<?php echo $row['s_ktp_pelapor']?>" alt="" width="350">
					<p style="text-align:center;">KTP Pelapor</p>
				</div>
				<div class="col-md-4">
					<img src="img/<?php echo $row['ktp_saksi1']?>" alt="" width="350">
					<p style="text-align:center;">KTP Saksi 1</p>
				</div>
				<div class="col-md-4">
					<img src="img/<?php echo $row['ktp_saksi2']?>" alt="" width="350">
					<p style="text-align:center;">KTP Saksi 2</p>
				</div>
				<div class="col-md-4">
					<img src="img/<?php echo $row['s_kk']?>" alt="" width="350">
					<p style="text-align:center;">Kartu Keluarga</p>
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
				<label class="control-label">Alamat</label>
				<input type="text" name="alamat" value="<?php echo $row['alamat'] ?>" class="form-control" placeholder="Alamat" disabled></required>
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
				<a class="btn btn-danger" href="surat_kematian.php">Kembali</a>
		</div>
  </div>
</form>
<?php include "footer.php"; }?>
