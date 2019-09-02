<?php
session_start();
//cek apakah yang mengakses halaman ini sudah login
if($_SESSION['level']=="" || $_SESSION['level']=="rakyat"){
	header("location:login.php");
}else {
include ('header.php');
$mySql="SELECT * FROM surat_belum_memiliki_rumah";
// if(isset($_POST['qcari'])) {
// 	$qcari=$_POST['qcari'];
// 	$mySql="SELECT * FROM surat_belum_memiliki_rumah WHERE nik like '%$qcari%' or nama like '%$qcari%' or no_surat like '%$qcari%' or tgl_surat like '%$qcari%'";
// }
?>
<div class="card">
	<h2 style="margin:10px;">Data Surat Belum Memiliki Rumah</h2>
		<div class="form-group">
			<!-- <a href="surat_belum_memiliki_rumah_keseluruhan_cetak.php" class="btn btn-sm btn-primary " style="margin-left:10px;">Cetak</a> -->
			<div class="right"  style="margin-right:10px;">
					<form class="" method="POST" action="surat_belum_memiliki_rumah_keseluruhan_cetak.php">
						<input type="text" class="form-control" name="qcari" value="<?php echo date('Y'); ?>" placeholder="<?php echo date('Y'); ?>" autofocus required/>
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
			<th scope="col" class="text-center">Tanggal Surat</th>
      <!-- <th scope="col" class="text-center">Tools</th> -->
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
			<td class="text-center"><?php echo $kolomData['tgl_surat']; ?></td>
		</tr>
	<?php } ?>
				</table>
				</div>
			</div>
<?php include "footer.php"; }?>
