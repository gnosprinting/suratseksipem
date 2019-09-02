<?php
session_start();
//cek apakah yang mengakses halaman ini sudah login
if($_SESSION['level']=="" || $_SESSION['level']=="rakyat"){
	header("location:login.php");
}else {
include ('header.php');
$mySql="SELECT * FROM surat_tidakmampu WHERE jenis=2 and status_surat='diproses'";
if(isset($_POST['qcari'])) {
	$qcari=$_POST['qcari'];
	$mySql="SELECT * FROM surat_miskin_usaha WHERE jenis=2 and status_surat='diproses' nik like '%$qcari%' or nama like '%$qcari%' or no_surat like '%$qcari%'";
}
function rupiah($angka){

	$hasil_rupiah = "Rp " . number_format($angka,0,',','.');
	return $hasil_rupiah;

}
?>
<div class="card">
	<h2 style="margin:10px;">Data Surat Miskin (Beasiswa)</h2>
		<div class="form-group">
			<a href="surat_miskin_keseluruhan_cetak2.php" class="btn btn-sm btn-primary " style="margin-left:10px;">Cetak Data</a>
			<div class="right"  style="margin-right:10px;">
					<form class="" method="POST" action="surat_miskin_bs.php">
								<input type="text" class="form-control" name="qcari" placeholder="Cari surat miskin..." autofocus/>
					</form>
		</div>
			</div>
	<div class="table-responsive">

	<table class="table table-striped table-hover">
		<thead >
		<tr>
			<th scope="col" class="text-center">No Surat</th>
			<th scope="col" class="text-center">Nama</th>
			<th scope="col" class="text-center">Pekerjaan</th>
			<th scope="col" class="text-center">Penghasilan</th>
			<th scope="col" class="text-center">Untuk</th>
			<th scope="col" class="text-center">Status Surat</th>
      <th scope="col" class="text-center">Tools</th>
		</tr>
		</thead>
<?php
	$myQry = mySqli_query ($koneksi, $mySql) or die ("Query salah : ".mysqli_error ($koneksi));
	$nomor = 1;
	while ($kolomData = mysqli_fetch_array ($myQry)) {
		$penghasilans=$kolomData['penghasilan'];
?>
	<tr>
		<td class="text-center"><?php echo $kolomData['no_surat']; ?></td>
		<td class="text-center"><?php echo $kolomData['nama']; ?></td>
		<td class="text-center"><?php echo $kolomData['pekerjaan']; ?></td>
		<td class="text-center"><?php echo rupiah($penghasilans);  ?></td>
		<td class="text-center"><?php echo $kolomData['atas_nama'];?></td>
		<td class="text-center"><?php echo $kolomData['status_surat']; ?></td>
			<td class="text-center"><?php echo $kolomData['status_surat']; ?></td>
			<td>
				<?php
					if ($kolomData['status_surat'] == 'ditolak') {
				?>
				<a href="surat_miskin_hapus.php?id=<?php echo $kolomData['id'];?>" title="Hapus data" onClick="confirm ('Yakin menghapus Data ini?')" class="btn btn-danger btn-sm">
				hapus</a>
				<?php
					}
				?>
				<?php
					// if ($kolomData['status_surat'] == 'baru') {
				?>
				<!-- <a href="surat_miskin_bs_edit.php?id=<?php //echo $kolomData['id'];?>" class="btn btn-sm btn-warning" style="margin-top:5px;">Proses surat</a>
				<a href="surat_miskin_hapus.php?id=<?php //echo $kolomData['id'];?>" title="Hapus data" onClick="confirm ('Yakin menghapus Data ini?')" class="btn btn-danger btn-sm">
				hapus</a> -->
				<?php
					//}
				?>
				<?php
					 if ($kolomData['status_surat'] == 'diproses') {
				?>
				<a href="surat_miskin_bs_selesai.php?id=<?php echo $kolomData['id'];?>" class="btn btn-sm btn-warning" style="margin-top:5px;">Selesaikan surat</a>
				<a href="surat_miskin_hapus.php?id=<?php echo $kolomData['id'];?>" title="Hapus data" onClick="confirm ('Yakin menghapus Data ini?')" class="btn btn-danger btn-sm">
				hapus</a>
				<a href="surat_miskin_bs_cetak.php?id=<?php echo $kolomData['id'];?>" class="btn btn-sm btn-success" style="margin-top:5px;">cetak surat</a>
				<?php
					}
				?>
				<?php
					if ($kolomData['status_surat'] == 'selesai') {
				?>
				<a href="surat_miskin_hapus.php?id=<?php echo $kolomData['id'];?>" title="Hapus data" onClick="confirm ('Yakin menghapus Data ini?')" class="btn btn-danger btn-sm">
				hapus</a>
				<a href="surat_miskin_bs_cetak.php?id=<?php echo $kolomData['id'];?>" class="btn btn-sm btn-success" style="margin-top:5px;">cetak surat</a>
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
