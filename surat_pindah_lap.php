<?php
session_start();
//cek apakah yang mengakses halaman ini sudah login
if($_SESSION['level']=="" || $_SESSION['level']=="rakyat"){
	header("location:login.php");
}else {
include ('header.php');

$mySql="SELECT * FROM surat_pindah";

?>
<div class="card">
	<h2 style="margin:10px;">Data Surat pindah</h2>
	<div class="form-group">
			<!-- <a href="surat_pindah_keseluruhan_cetak.php" class="btn btn-sm btn-primary " style="margin-left:10px;">Cetak Data</a> -->
			<div class="right"  style="margin-right:10px;">
					<form class="" method="POST" action="surat_pindah_keseluruhan_cetak.php">
						<input type="text" class="form-control" name="qcari" value="<?php echo date('Y'); ?>" placeholder="<?php echo date('Y'); ?>" autofocus required/>
					</form>
		</div>
			</div>
	<div class="table-responsive">

		<table class="table table-striped table-hover">
			<thead >
				<tr>
					<th scope="col" class="text-center">No Surat</th>
					<th scope="col" class="text-center">NIK</th>
					<th scope="col" class="text-center">Nama</th>
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
			<td class="text-center"><?php echo $kolomData['nik']; ?></td>
			<td class="text-center"><?php echo $kolomData['nama']; ?></td>
			<td class="text-center"><?php echo $kolomData['status_surat']; ?></td>
		</tr>
	<?php } ?>
				</table>
				</div>
			</div>
<?php include "footer.php"; }?>
