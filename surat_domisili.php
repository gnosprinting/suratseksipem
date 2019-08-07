<?php session_start();
//cek apakah yang mengakses halaman ini sudah login
if($_SESSION['level']=="" || $_SESSION['level']=="rakyat"){
	header("location:login.php");
}else {
include ('header.php');
$mySql="SELECT * FROM surat_domisili";
if(isset($_POST['qcari'])) {
	$qcari=$_POST['qcari'];
	$mySql="SELECT * FROM surat_domisili WHERE nik like '%$qcari%' or nama like '%$qcari%' or no_surat like '%$qcari%' or tgl_surat like '%$qcari%'";
}
?>
<div class="card">
	<h2 style="margin:10px;">Data Surat Domisili</h2>
		<div class="form-group">
			<!-- <a href="surat_domisili_keseluruhan_cetak.php" class="btn btn-sm btn-primary " style="margin-left:10px;">Cetak Data</a> -->
			<div class="right"  style="margin-right:10px;">
					<form class="" method="POST" action="surat_domisili.php">
								<input type="text" class="form-control" name="qcari" placeholder="Cari surat domisili..." autofocus/>
					</form>
		</div>
			</div>
	<div class="table-responsive">

	<table class="table table-striped table-hover">
		<thead >
		<tr>
			<th scope="col" class="text-center">No Surat</th>
			<th scope="col" class="text-center">Nama</th>
			<th scope="col" class="text-center">Nik</th>
			<th scope="col" class="text-center">Tpt & Tgl lahir</th>
			<th scope="col" class="text-center">Jenis Kelamin</th>
      <th scope="col" class="text-center">Agama</th>
      <th scope="col" class="text-center">Pekerjaan</th>
			<th scope="col" class="text-center">Alamat</th>
			<th scope="col" class="text-center">Status Surat</th>
      <th scope="col" class="text-center">Tools</th>
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
			<td class="text-center"><?php echo $kolomData['tempat_lhr'];?>-<?php echo $kolomData['tgl_lhr'];?></td>
			<td class="text-center"><?php echo $kolomData['jk']; ?></td>
      <td class="text-center"><?php echo $kolomData['agama']; ?></td>
      <td class="text-center"><?php echo $kolomData['pekerjaan']; ?></td>
			<td class="text-center"><?php echo $kolomData['alamat']; ?></td>
			<td class="text-center"><?php echo $kolomData['status_surat']; ?></td>
			<td>
				<?php
					if ($kolomData['status_surat'] == 'ditolak') {
				?>
				<a href="surat_domisili_hapus.php?id=<?php echo $kolomData['id'];?>" title="Hapus data" onClick="confirm ('Yakin menghapus Data ini?')" class="btn btn-danger btn-sm">
				hapus</a>
				<?php
					}
				?>
				<?php
					//if ($kolomData['status_surat'] == 'baru') {
				?>
				<!-- <a href="surat_domisili_edit.php?id=<?php //echo $kolomData['id'];?>" class="btn btn-sm btn-warning" style="margin-top:5px;">Proses surat</a>
				<a href="surat_domisili_hapus.php?id=<?php //echo $kolomData['id'];?>" title="Hapus data" onClick="confirm ('Yakin menghapus Data ini?')" class="btn btn-danger btn-sm">
				hapus</a> -->
				<?php
					//}
				?>
				<?php
					if ($kolomData['status_surat'] == 'diproses') {
				?>
				<a href="surat_domisili_selesai.php?id=<?php echo $kolomData['id'];?>" class="btn btn-sm btn-warning" style="margin-top:5px;">Selesaikan surat</a>
				<a href="surat_domisili_hapus.php?id=<?php echo $kolomData['id'];?>" title="Hapus data" onClick="confirm ('Yakin menghapus Data ini?')" class="btn btn-danger btn-sm">
				hapus</a>
				<a href="surat_domisili_cetak.php?id=<?php echo $kolomData['id'];?>" class="btn btn-sm btn-success" style="margin-top:5px;">cetak surat</a>
				<?php
					}
				?>
				<?php
					if ($kolomData['status_surat'] == 'selesai') {
				?>
				<a href="surat_domisili_hapus.php?id=<?php echo $kolomData['id'];?>" title="Hapus data" onClick="confirm ('Yakin menghapus Data ini?')" class="btn btn-danger btn-sm">
				hapus</a>
				<a href="surat_domisili_cetak.php?id=<?php echo $kolomData['id'];?>" class="btn btn-sm btn-success" style="margin-top:5px;">cetak surat</a>
				<?php
					}
				?>
			</td>
		</tr>
	<?php } ?>
				</table>
				</div>
			</div>
<?php include "footer.php"; }?>
