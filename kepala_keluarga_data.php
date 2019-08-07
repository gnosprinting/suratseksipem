<?php
session_start();
//cek apakah yang mengakses halaman ini sudah login
if($_SESSION['level']=="" || $_SESSION['level']=="rakyat"){
	header("location:login.php");
}else {
include ('header.php');

$mySql="SELECT * FROM v_kk";
if(isset($_POST['qcari'])) {
	$qcari=$_POST['qcari'];
	$mySql="SELECT * FROM v_kk WHERE nokk like '%$qcari%' or nama like '%$qcari%' ";
}

?>

<div class="card">
	<h2 style="margin:10px;">Data Kepala Keluarga</h2>
		<div class="form-group">
			<!-- <a href="penduduk_tambah.php" class="btn btn-sm btn-primary " style="margin-left:10px;">Tambah data penduduk</a>
			<a href="penduduk_cetak.php" class="btn btn-sm btn-success " style="margin-left:10px;">cetak data penduduk</a> -->
			<div class="right"  style="margin-right:10px;">
					<form class="" method="POST" action="kepala_keluarga_data.php">
								<input type="text" class="form-control" name="qcari" placeholder="Cari kepala_keluarga..." autofocus/>
					</form>
		</div>
			</div>
	<div class="table-responsive">

	<table class="table table-striped table-hover">
		<thead >
		<tr>
			<th scope="col" class="text-center">No </th>
			<th scope="col" class="text-center">No KK</th>
			<th scope="col" class="text-center">Nama</th>
			<th scope="col" class="text-center">Tempat Lahir</th>
			<th scope="col" class="text-center">Tanggal Lahir</th>
			<th scope="col" class="text-center">Alamat</th>
			<th scope="col" class="text-center">RT/RW</th>
			<th scope="col" class="text-center">Option</th>
		</tr>
		</thead>
<?php
	$myQry = mySqli_query ($koneksi, $mySql) or die ("Query salah : ".mysqli_error ($koneksi));
	$nomor = 1;
	while ($kolomData = mysqli_fetch_array ($myQry)) {
?>

		<tr>
			<td><?php echo $nomor++?></td>
			<td><?php echo $kolomData['nokk']; ?></td>
			<td><?php echo $kolomData['nama']; ?></td>
			<td><?php echo $kolomData['tempat_lhr']; ?></td>
			<td><?php echo $kolomData['tgl_lhr']; ?></td>
			<td><?php echo $kolomData['alamat']; ?></td>
			<td><?php echo $kolomData['rt_rw']; ?></td>
			<td class="text-center">
				<a href="kepala_keluarga_edit.php?nokk=<?php echo $kolomData ['nokk'];?>" title="Edit data" class="btn btn-primary btn-sm">Ubah Kepala Keluarga</a>
				<!-- <a href="penduduk_hapus.php?nik=<?php //echo $kolomData['nik'];?>" title="Hapus data" onClick="confirm ('Yakin menghapus Data ini?')" class="btn btn-danger btn-sm">
				hapus</a>
				<a href="surat_cetak.php?nik=<?php //echo $kolomData['nik'];?>" class="btn btn-sm btn-success" style="margin-top:5px;">Buat Surat</a> -->
			</td>
		</tr>
	<?php } ?>
				</table>
				</div>
			</div>
<?php include "footer.php"; }?>
