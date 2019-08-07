<?php
session_start();
//cek apakah yang mengakses halaman ini sudah login
if($_SESSION['level']=="" || $_SESSION['level']=="rakyat"){
	header("location:login.php");
}else {
include ('header.php');
$mySql="SELECT * FROM surat_ektp";
if(isset($_POST['qcari'])) {
	$qcari=$_POST['qcari'];
	$mySql="SELECT * FROM surat_ektp WHERE nik like '%$qcari%' or nama like '%$qcari%' or no_surat like '%$qcari%' or tgl_surat like '%$qcari%'";
}
?>
<div class="card">
<h2 style="margin:10px;">Data Pengantar E-KTP</h2>
		<div class="form-group">
			<!-- <a href="surat_ektp_keseluruhan_cetak.php" class="btn btn-sm btn-primary " style="margin-left:10px;">Cetak Data</a> -->
			<div class="right"  style="margin-right:10px;">
					<form class="" method="POST" action="surat_ektp.php">
								<input type="text" class="form-control" name="qcari" placeholder="Cari surat e-ktp..." autofocus/>
					</form>
		</div>
			</div>
	<div class="table-responsive">
	<table class="table table-striped table-hover">
		<thead >
		<tr>
			<th scope="col" class="text-center">No Surat</th>
			<th scope="col" class="text-center">Nama </th>
			<th scope="col" class="text-center">NIK</th>
			<th scope="col" class="text-center">Nomor KK</th>
			<th scope="col" class="text-center">alamat</th>
            <th scope="col" class="text-center">Kode Pos</th>
            <th scope="col" class="text-center">Keterangan</th>
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
			<td class="text-center" ><?php echo $kolomData['nik']; ?></td>
			<td class="text-center" ><?php echo $kolomData['nomor_kk']; ?></td>
			<td class="text-center" ><?php echo $kolomData['alamat']; ?></td>
			<td class="text-center" ><?php echo $kolomData['kode_pos']; ?></td>
			<td class="text-center" ><?php echo $kolomData['keterangan']; ?></td>
			<td class="text-center"><?php echo $kolomData['status_surat']; ?></td>
			<td class="text-center" >
				<?php
					if ($kolomData['status_surat'] == 'ditolak') {
				?>
				<a href="surat_ektp_hapus.php?id=<?php echo $kolomData['id'];?>" title="Hapus data" onClick="confirm ('Yakin menghapus Data ini?')" class="btn btn-danger btn-sm">
				hapus</a>
				<?php
					}
				?>
				<?php
					//if ($kolomData['status_surat'] == 'baru') {
				?>
				<!-- <a href="surat_ektp_edit.php?id=<?php //echo $kolomData['id'];?>" class="btn btn-sm btn-warning" style="margin-top:5px;">Proses surat</a>
				<a href="surat_ektp_hapus.php?id=<?php //echo $kolomData['id'];?>" title="Hapus data" onClick="confirm ('Yakin menghapus Data ini?')" class="btn btn-danger btn-sm">
				hapus</a> -->
				<?php
					//}
				?>
				<?php
					if ($kolomData['status_surat'] == 'diproses') {
				?>
				<a href="surat_ektp_selesai.php?id=<?php echo $kolomData['id'];?>" class="btn btn-sm btn-warning" style="margin-top:5px;">Selesaikan surat</a>
				<a href="surat_ektp_hapus.php?id=<?php echo $kolomData['id'];?>" title="Hapus data" onClick="confirm ('Yakin menghapus Data ini?')" class="btn btn-danger btn-sm">
				hapus</a>
				<a href="surat_ektp_cetak.php?id=<?php echo $kolomData['id'];?>" class="btn btn-sm btn-success" style="margin-top:5px;">cetak surat</a>
				<?php
					}
				?>
				<?php
					if ($kolomData['status_surat'] == 'selesai') {
				?>
				<a href="surat_ektp_hapus.php?id=<?php echo $kolomData['id'];?>" title="Hapus data" onClick="confirm ('Yakin menghapus Data ini?')" class="btn btn-danger btn-sm">
				hapus</a>
				<a href="surat_ektp_cetak.php?id=<?php echo $kolomData['id'];?>" class="btn btn-sm btn-success" style="margin-top:5px;">cetak surat</a>
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
