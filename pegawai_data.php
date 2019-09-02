<?php
session_start();
//cek apakah yang mengakses halaman ini sudah login
// if($_SESSION['level']=="" || $_SESSION['level']=="rakyat"){
// 	header("location:login.php");
// }else {
include ('kon.php');

$mySql="SELECT * FROM t_pegawai";
if(isset($_POST['qcari'])) {
	$qcari=$_POST['qcari'];
	$mySql="SELECT * FROM t_pegawai WHERE nip like '%$qcari%' or nama like '%$qcari%' ";
}
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
	<head>
		<meta charset="utf-8">
		<title></title>
		<link href="css/site.css" rel="stylesheet">
		<link href="css/bootstrap.min.css" rel="stylesheet">
		<link href="css/fontawesome.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
		<script src="chartjs/Chart.bundle.js"></script>
		<script src="http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
	</head>
	<body>
		<div class="container">
		<div class="content" style="padding:5px !important;">

<div class="card">
	<h2 style="margin:10px;">Data pegawai</h2>
		<div class="form-group">
			<a href="pegawai_tambah.php" class="btn btn-sm btn-primary " style="margin-left:10px;">Tambah data pegawai</a>
			<!-- <a href="pegawai_cetak.php" class="btn btn-sm btn-success " style="margin-left:10px;">cetak data pegawai</a> -->

			<div class="right"  style="margin-right:10px;">
					<form class="" method="POST" action="pegawai_data.php">
								<input type="text" class="form-control" name="qcari" placeholder="Cari pegawai..." autofocus/>
					</form>
		</div>
			</div>

		<br />
		<br />
	<div class="table-responsive">

	<table class="table table-striped table-hover">
		<thead >
		<tr>
			<th scope="col" class="text-center">No </th>
			<th scope="col" class="text-center">Nama</th>
			<th scope="col" class="text-center">nip</th>
			<th scope="col" class="text-center">Alamat</th>
			<th scope="col" class="text-center">Foto</th>
			<th scope="col" class="text-center">Option</th>
		</tr>
		</thead>
<?php
	$myQry = mySqli_query ($koneksi, $mySql) or die ("Query salah : ".mysqli_error ($koneksi));
	$nomor = 1;
	while ($kolomData = mysqli_fetch_array ($myQry)) {
?>

		<tr>
			<td align='center'><?php echo $nomor++?></td>
			<td align='center'><?php echo $kolomData['nama']; ?></td>
			<td align='center'><?php echo $kolomData['nip']; ?></td>
			<td align='center'><?php echo $kolomData['alamat']; ?></td>
			<td align='center'> <img src="img/<?php echo $kolomData['foto']; ?>" alt="" width="80px"> </td>
			<td align='center'>
				<a href="pegawai_edit.php?nip=<?php echo $kolomData ['nip'];?>" title="Edit data" class="btn btn-primary btn-sm">edit</a>
				<a href="pegawai_hapus.php?nip=<?php echo $kolomData['nip'];?>" title="Hapus data" onClick="confirm ('Yakin menghapus Data ini?')" class="btn btn-danger btn-sm">
				hapus</a>
			</td>
		</tr>
	<?php } ?>
				</table>
				</div>
			</div>
<?php include "footer.php";?>
