<?php
session_start();
//cek apakah yang mengakses halaman ini sudah login
if($_SESSION['level']=="" || $_SESSION['level']=="rakyat"){
	header("location:login.php");
}else {
include ('header.php');
$mySql="SELECT * FROM data_ttd";
?>
<div class="card">
	<h2 style="margin:10px;">Data Tandatangan</h2>
	<div class="table-responsive">

	<table class="table table-striped table-hover">
		<thead >
		<tr>
			<th scope="col" class="text-center">Nama</th>
			<th scope="col" class="text-center">NIP</th>
			<th scope="col" class="text-center">Jabatan</th>
			<th scope="col" class="text-center">Tools</th>
		</tr>
		</thead>
<?php
	$myQry = mySqli_query ($koneksi, $mySql) or die ("Query salah : ".mysqli_error ($koneksi));
	$nomor = 1;
	while ($kolomData = mysqli_fetch_array ($myQry)) {
?>
	<tr>
			<td class="text-center"><?php echo $kolomData['nama']; ?></td>
			<td class="text-center"><?php echo $kolomData['nip']; ?></td>
			<td class="text-center"><?php echo $kolomData['jabatan']; ?></td>
			<td>
				<a href="data_ttd_edit.php?id=<?php echo $kolomData['id'];?>" class="btn btn-sm btn-success" style="margin-top:5px;">edit</a>
			</td>
		</tr>
<?php } ?>
				</table>
				</div>
			</div>
<?php include "footer.php"; }?>
