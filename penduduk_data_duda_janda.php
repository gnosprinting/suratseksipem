<?php
session_start();
//cek apakah yang mengakses halaman ini sudah login
if($_SESSION['level']=="" || $_SESSION['level']=="rakyat"){
	header("location:login.php");
}else {
include ('header.php');

$mySql="SELECT * FROM surat_duda_janda GROUP BY nik";
if(isset($_POST['qcari'])) {
	$qcari=$_POST['qcari'];
	$mySql="SELECT * FROM surat_duda_janda WHERE nik like '%$qcari%' or nama like '%$qcari%' GROUP BY nik";
}

?>

<div class="card">
	<h2 style="margin:10px;">Data Penduduk Duda/Janda</h2>
	<div class="form-group">
		<!-- <a href="penduduk_tambah.php" class="btn btn-sm btn-primary " style="margin-left:10px;">Tambah data penduduk</a> -->
		<!-- <a href="penduduk_cetak.php" class="btn btn-sm btn-success " style="margin-left:10px;">cetak data penduduk</a> -->

		<div class="right"  style="margin-right:10px;">
			<form class="" method="POST" action="penduduk_data_duda_janda.php">
				<input type="text" class="form-control" name="qcari" placeholder="Cari penduduk..." autofocus/>
			</form>
		</div>
	</div>
	<div class="table-responsive">

	<table class="table table-striped table-hover">
		<thead >
		<tr>
			<th scope="col" class="text-center">No </th>
			<th scope="col" class="text-center">Nama</th>
			<th scope="col" class="text-center">Nik</th>
			<th scope="col" class="text-center">Tempat Lahir</th>
			<th scope="col" class="text-center">Tanggal Lahir</th>
			<th scope="col" class="text-center">Jenis Kelamin</th>
			<th scope="col" class="text-center">Status Pernikahan</th>
			<th scope="col" class="text-center">Alamat</th>
			<th scope="col" class="text-center">RT/RW</th>
		</tr>
		</thead>
<?php
	$myQry = mySqli_query ($koneksi, $mySql) or die ("Query salah : ".mysqli_error ($koneksi));
	$nomor = 1;
	while ($kolomData = mysqli_fetch_array ($myQry)) {
?>

		<tr>
			<td><?php echo $nomor++?></td>
			<td><?php echo $kolomData['nama']; ?></td>
			<td><?php echo $kolomData['nik']; ?></td>
			<td><?php echo $kolomData['tempat_lhr']; ?></td>
			<td><?php echo $kolomData['tgl_lhr']; ?></td>
			<td><?php echo $kolomData['jk']; ?></td>
			<td><?php echo $kolomData['status']; ?></td>
			<td><?php echo $kolomData['alamat']; ?></td>
			<td><?php echo $kolomData['rt_rw']; ?></td>
		</tr>
	<?php } ?>
				</table>
				</div>
			</div>
<?php include "footer.php"; }?>
