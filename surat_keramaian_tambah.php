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
		$nama				= $row['nama'];
		$nik				= $row['nik'];
    $tanggal			= $row['tgl_lhr'];
    $tempat_lhr		    = $row['tempat_lhr'];
		$pekerjaan			= $row['pekerjaan'];
		$alamat			    = $row['alamat'];
		$rt_rw			    = $row['rt_rw'];
		$acara			= $_POST['acara'];
		$hari			= $_POST['hari'];
		$tgl			= $_POST['tgl'];
		$jam			= $_POST['jam'];
		$tempat			= $_POST['tempat'];
		$hiburan			= $_POST['hiburan'];

			$insert = mysqli_query($koneksi, "INSERT INTO surat_ijin_keramaian( nama, nik, tgl_lhr, tempat_lhr,pekerjaan,alamat,rt_rw,acara,hari,tgl,jam,tempat,hiburan)
			VALUES('$nama','$nik','$tanggal', '$tempat_lhr','$pekerjaan', '$alamat','$rt_rw','$acara','$hari','$tgl','$jam','$tempat','$hiburan')") or die (mysqli_error ($koneksi));
				if ($insert) {
        	?>
	        	<div class="alert alert-success alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Surat berhasil disimpan.</div>
				<meta http-equiv='refresh' content='1; url=surat_keramaian.php'/>
		    <?php
	        	} else {
	        ?>
		<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Ups, Surat Gagal Disimpan!</div>
    	<?php
            }
        }
	    ?>
		<h2>Data Surat Ijin Keramaian &raquo; Tambah Data</h2>
		<hr />
		<form class="form-horizontal" action="" method="post">
  <div class="row">
			</div>
    <div class="col">
			<!-- <div class="form-group">
				<label class="control-label">Pekerjaan</label>
				<input type="text" name="pekerjaan"  value="" class="form-control" placeholder="perkerjaan" required>
			</div> -->
			<div class="form-group">
				<label class="control-label">Acara</label>
				<input type="text" name="acara"  value="" class="form-control" placeholder="acara" required>
			</div>
			<div class="form-group">
				<label class="control-label">Hari Acara</label>
				<input type="text" name="hari"  value="" class="form-control" placeholder="hari" required>
			</div>
			<div class="form-group">
				<label class="control-label">Tanggal Acara</label>
				<input type="text" name="tgl"  value="" class="form-control" placeholder="02 Maret 2019" required>
			</div>
			<div class="form-group">
				<label class="control-label">Jam Acara</label>
				<input type="text" name="jam"  value="" class="form-control" placeholder="19.00-Wita s/d Selesai" required>
			</div>
			<div class="form-group">
				<label class="control-label">Tempat Acara</label>
				<input type="text" name="tempat"  value="" class="form-control" placeholder="tempat" required>
			</div>
			<div class="form-group">
				<label class="control-label">Hiburan</label>
				<input type="text" name="hiburan"  value="" class="form-control" placeholder="hiburan" required>
			</div>
			<div class="form-group">
				<button type="submit" name="add" class="btn
				btn-primary" value="Simpan">Simpan</button>
				<a class="btn btn-danger" href="surat_keramaian.php">Kembali</a>
		</div>
  </div>
</form>


<?php include "footer.php"; }?>
