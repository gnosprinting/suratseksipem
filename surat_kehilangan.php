<?php
session_start();
//cek apakah yang mengakses halaman ini sudah login
if($_SESSION['level']=="" || $_SESSION['level']=="rakyat"){
	header("location:login.php");
}else {
include ('header.php');
$mySql="SELECT * FROM surat_kehilangan";
if(isset($_POST['qcari'])) {
	$qcari=$_POST['qcari'];
	$mySql="SELECT * FROM surat_kehilangan WHERE nik like '%$qcari%' or nama like '%$qcari%' or no_surat like '%$qcari%' or tgl_surat like '%$qcari%'";
}
?>
<div class="card">
	<h2 style="margin:10px;">Data Surat Kehilangan</h2>
	<div class="form-group">
			<!-- <a href="surat_kehilangan_keseluruhan_cetak.php" class="btn btn-sm btn-primary " style="margin-left:10px;">Cetak Data</a> -->
			<div class="right"  style="margin-right:10px;">
					<form class="" method="POST" action="surat_kehilangan.php">
								<input type="text" class="form-control" name="qcari" placeholder="Cari surat kehilangan..." autofocus/>
					</form>
		</div>
			</div>
	<div class="table-responsive">
	<table class="table table-striped table-hover">
		<thead >
		<tr>
			<th scope="col" class="text-center">No Surat</th>
			<th scope="col" class="text-center">Nama </th>
			<th scope="col" class="text-center">pekerjaan</th>
			<th scope="col" class="text-center">status</th>
			<th scope="col" class="text-center">alamat</th>
            <th scope="col" class="text-center">keterangan</th>
            <th scope="col" class="text-center">tkp</th>
						<th scope="col" class="text-center">Status Surat</th>
            <th scope="col" class="text-center">tools</th>
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
			<td class="text-center" ><?php echo $kolomData['pekerjaan']; ?></td>
			<td class="text-center" ><?php echo $kolomData['status']; ?></td>
			<td class="text-center" ><?php echo $kolomData['alamat']; ?></td>
			<td class="text-center" ><?php echo $kolomData['keterangan']; ?></td>
			<td class="text-center" ><?php echo $kolomData['tkp']; ?></td>
			<td class="text-center" ><?php echo $kolomData['status_surat']; ?></td>
			<td>
				<?php
					if ($kolomData['status_surat'] == 'ditolak') {
				?>
				<a href="surat_kehilangan_hapus.php?id=<?php echo $kolomData['id'];?>" title="Hapus data" onClick="confirm ('Yakin menghapus Data ini?')" class="btn btn-danger btn-sm">
				hapus</a>
				<?php
					}
				?>
				<?php
					//if ($kolomData['status_surat'] == 'baru') {
				?>
				<!-- <a href="surat_kehilangan_edit.php?id=<?php //echo $kolomData['id'];?>" class="btn btn-sm btn-warning" style="margin-top:5px;">Proses surat</a>
				<a href="surat_kehilangan_hapus.php?id=<?php //echo $kolomData['id'];?>" title="Hapus data" onClick="confirm ('Yakin menghapus Data ini?')" class="btn btn-danger btn-sm">
				hapus</a> -->
				<?php
				//	}
				?>
				<?php
					if ($kolomData['status_surat'] == 'diproses') {
				?>
				<a href="surat_kehilangan_selesai.php?id=<?php echo $kolomData['id'];?>" class="btn btn-sm btn-warning" style="margin-top:5px;">Selesaikan surat</a>
				<a href="surat_kehilangan_hapus.php?id=<?php echo $kolomData['id'];?>" title="Hapus data" onClick="confirm ('Yakin menghapus Data ini?')" class="btn btn-danger btn-sm">
				hapus</a>
				<a href="surat_kehilangan_cetak.php?id=<?php echo $kolomData['id'];?>" class="btn btn-sm btn-success" style="margin-top:5px;">cetak surat</a>
				<?php
					}
				?>
				<?php
					if ($kolomData['status_surat'] == 'selesai') {
				?>
				<a href="surat_kehilangan_hapus.php?id=<?php echo $kolomData['id'];?>" title="Hapus data" onClick="confirm ('Yakin menghapus Data ini?')" class="btn btn-danger btn-sm">
				hapus</a>
				<a href="surat_kehilangan_cetak.php?id=<?php echo $kolomData['id'];?>" class="btn btn-sm btn-success" style="margin-top:5px;">cetak surat</a>
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
