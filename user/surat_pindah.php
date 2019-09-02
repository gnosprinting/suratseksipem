<?php session_start();
//cek apakah yang mengakses halaman ini sudah login
if($_SESSION['level']=="" || $_SESSION['level']=="admin"){
	header("location:login.php");
}else {
include ('header.php');
$nik = $_SESSION['username'];
$mySql="SELECT * FROM surat_pindah WHERE nik = $nik";
if(isset($_POST['qcari'])) {
	$qcari=$_POST['qcari'];
	$mySql="SELECT * FROM surat_pindah WHERE nik like '%$qcari%' or nama like '%$qcari%' ";
}
?>
<div class="card">
	<h2 style="margin:10px;">Data Surat pindah</h2>
		<div class="form-group">
			<a href="surat_pindah_tambah.php?nik=<?php echo $nik;?>" class="btn btn-sm btn-primary " style="margin-left:10px;">Tambah data surat pindah</a>
			<div class="right"  style="margin-right:10px;">
					<form class="" method="POST" action="surat_pindah.php">
								<input type="text" class="form-control" name="qcari" placeholder="Cari surat pindah..." autofocus/>
					</form>
		</div>
			</div>
	<div class="table-responsive">

	<table class="table table-striped table-hover">
		<thead >
		<tr>
			<th scope="col" class="text-center">No Surat</th>
			<th scope="col" class="text-center">Nama</th>
			<th scope="col" class="text-center">NIK</th>
			<th scope="col" class="text-center">Status Surat</th>
		</tr>
		</thead>
<?php
	$myQry = mySqli_query ($koneksi, $mySql) or die ("Query salah : ".mysqli_error ($koneksi));
	$nomor = 1;
	while ($kolomData = mysqli_fetch_array ($myQry)) {
?>
		<tr>
			<td class="text-center"><?php echo $kolomData['no_surat']; ?></td>
			<td class="text-center"><?php echo $kolomData['nama']; ?></td>
			<td class="text-center"><?php echo $kolomData['nik']; ?></td>
			<td class="text-center"><?php echo $kolomData['status_surat']; ?></td>
			<td>
				<a href="surat_pindah_hapus.php?id=<?php echo $kolomData['id'];?>" title="Hapus data" onClick="confirm ('Yakin menghapus Data ini?')" class="btn btn-danger btn-sm">
				hapus</a>
				<a href="surat_pindah_cetak.php?id=<?php echo $kolomData['id'];?>" class="btn btn-sm btn-success" style="margin-top:5px;">detail</a>
			</td>
		</tr>
	<?php } ?>
				</table>
				</div>
			</div>
<?php include "footer.php"; }?>
