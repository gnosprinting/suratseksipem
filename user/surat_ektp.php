<?php session_start();
//cek apakah yang mengakses halaman ini sudah login
if($_SESSION['level']=="" || $_SESSION['level']=="admin"){
	header("location:login.php");
}else {
include ('header.php');
$nik = $_SESSION['username'];
$mySql="SELECT * FROM surat_ektp WHERE nik = $nik";
if(isset($_POST['qcari'])) {
	$qcari=$_POST['qcari'];
	$mySql="SELECT * FROM surat_ektp WHERE nik like '%$qcari%' or nama like '%$qcari%' ";
}
?>
<div class="card">
	<h2 style="margin:10px;">Data Surat Domisili</h2>
		<div class="form-group">
			<?php
				$sql = mySqli_query ($koneksi, $mySql) or die ("Query salah : ".mysqli_error ($koneksi));
				if (mysqli_num_rows($sql)==0) {
			?>
					<a href="surat_ektp_tambah.php?nik=<?php echo $nik;?>" class="btn btn-sm btn-primary " style="margin-left:10px;">Tambah data surat domisili</a>
			<?php
				}else{
			?>
					<div class="alert alert-danger alert-dismissable">
						<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;
						</button>Hanya Dapat membuat 1 ektp !
					</div>
					<meta http-equiv='refresh' content='2; url=index.php'/>
			<?php }	?>

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
			<th scope="col" class="text-center">Nama</th>
			<th scope="col" class="text-center">Nik</th>
			<th scope="col" class="text-center">Nomor KK</th>
			<th scope="col" class="text-center">Kode Pos</th>
			<th scope="col" class="text-center">Alamat</th>
			<th scope="col" class="text-center">Keterangan</th>
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
			<td class="text-center"><?php echo $kolomData['nomor_kk'];?></td>
			<td class="text-center"><?php echo $kolomData['kode_pos']; ?></td>
			<td class="text-center"><?php echo $kolomData['alamat']; ?></td>
			<td class="text-center"><?php echo $kolomData['keterangan']; ?></td>
			<td class="text-center"><?php echo $kolomData['status_surat']; ?></td>
			<td>
				<a href="surat_ektp_hapus.php?id=<?php echo $kolomData['id'];?>" title="Hapus data" onClick="confirm ('Yakin menghapus Data ini?')" class="btn btn-danger btn-sm">
				hapus</a>
				<a href="surat_ektp_cetak.php?id=<?php echo $kolomData['id'];?>" class="btn btn-sm btn-success" style="margin-top:5px;">detail</a>
			</td>
		</tr>
	<?php } ?>
				</table>
				</div>
			</div>
<?php include "footer.php"; }?>
