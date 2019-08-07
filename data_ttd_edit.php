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
	$sql = mysqli_query($koneksi, "SELECT * FROM data_ttd WHERE id='$id'");
	if (mysqli_num_rows($sql)==0) {
	?>
		<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>NIK Tidak Ada..!</div>
	<?php
	}else{
		$row = mysqli_fetch_assoc($sql);
	}
	//Proses Simpan Data
	if(isset($_POST['add'])){
		$nama						= $row['nama'];
		$nip						= $row['nip'];
    $jabatan				= $row['jabatan'];

				$update = mysqli_query($koneksi, "UPDATE data_ttd SET nama='$nama', nip='$nip', jabatan='$jabatan' WHERE id='$id'") or die(mysqli_error());
				if ($update) {
        	?>
	        	<div class="alert alert-success alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Surat berhasil disimpan.</div>
				<meta http-equiv='refresh' content='1; url=data_tdd.php'/>
		    <?php
	        	} else {
	        ?>
		<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Ups, Surat Gagal Disimpan!</div>
    	<?php
            }
        }
	    ?>
		<h2>Data Tandatangan &raquo; Edit Data</h2>
		<hr />
		<form class="form-horizontal" action="" method="post">
  <div class="row">
			</div>
    <div class="col">
			<div class="form-group">
				<label class="control-label">nama</label>
				<input type="text" name="nama" value="" class="form-control" placeholder="nama"></required>
			</div>
			<div class="form-group">
				<label class="control-label">nip</label>
				<input type="text" name="nip"  value="" class="form-control" placeholder="nip" required>
			</div>
			<div class="form-group">
				<label class="control-label">jabatan</label>
				<input type="text" name="jabatan"  value="" class="form-control" placeholder="jabatan" required>
			</div>
			<div class="form-group">
				<button type="submit" name="add" class="btn
				btn-primary" value="Simpan">Simpan</button>
				<a class="btn btn-danger" href="data_tdd.php">Kembali</a>
		</div>
  </div>
</form>


<?php include "footer.php"; }?>
