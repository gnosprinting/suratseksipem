<?php
session_start();
//cek apakah yang mengakses halaman ini sudah login
if($_SESSION['level']=="" || $_SESSION['level']=="rakyat"){
	header("location:login.php");
}else {
include ('header.php');
$mySql="SELECT * FROM surat_tidakmampu";
if(isset($_POST['qcari'])) {
	$qcari=$_POST['qcari'];
	$mySql="SELECT * FROM surat_tidakmampu WHERE tgl_surat like '%$qcari%'";
	$mySqlChrt="SELECT * FROM surat_tidakmampu WHERE tgl_surat like '%$qcari%' GROUP BY tgl_surat";
	$count= "SELECT COUNT(id) as jumlah FROM surat_tidakmampu WHERE tgl_surat like '%$qcari%' GROUP BY tgl_surat";
}
?>
<div>
		<canvas id="myChart" width="100" height="30"></canvas>
</div>
<div class="card">
	<h2 style="margin:10px;">Data Surat Miskin</h2>
		<div class="form-group">
			<a href="surat_miskin_keseluruhan_cetak.php" class="btn btn-sm btn-primary " style="margin-left:10px;">Cetak Data</a>
			<div class="right"  style="margin-right:10px;">
					<form class="" method="POST" action="statistik_miskin.php">
								<input type="text" class="form-control" name="qcari" placeholder="Th-Bln-Tgl : 2019-05-02" autofocus/>
					</form>
		</div>
			</div>
	<div class="table-responsive">

	<table class="table table-striped table-hover">
		<thead >
		<tr>
			<th scope="col" class="text-center">Nama</th>
			<th scope="col" class="text-center">Nik</th>
			<th scope="col" class="text-center">Tpt & Tgl lahir</th>
			<th scope="col" class="text-center">Jenis Kelamin</th>
			<th scope="col" class="text-center">Alamat</th>
			<th scope="col" class="text-center">Status Surat</th>
      <th scope="col" class="text-center">Tanggal Surat</th>
		</tr>
		</thead>
<?php
	$myQry = mySqli_query ($koneksi, $mySql) or die ("Query salah : ".mysqli_error ($koneksi));
	$nomor = 1;
	while ($kolomData = mysqli_fetch_array ($myQry)) {
?>
	<tr>
			<td class="text-center"><?php echo $kolomData['nama']; ?></td>
			<td class="text-center"><?php echo $kolomData['nik']; ?></td>
			<td class="text-center"><?php echo $kolomData['tempat_lhr'];?>-<?php echo $kolomData['tgl_lhr'];?></td>
			<td class="text-center"><?php echo $kolomData['jk']; ?></td>
			<td class="text-center"><?php echo $kolomData['alamat']; ?></td>
			<td class="text-center"><?php echo $kolomData['status_surat']; ?></td>
			<td class="text-center"><?php echo $kolomData['tgl_surat']; ?></td>
		</tr>
<?php } ?>
				</table>
				</div>
			</div>
			<script>
			<?php $myQry1 = mySqli_query ($koneksi, $mySql) or die ("Query salah : ".mysqli_error ($koneksi)); ?>
			<?php $myQry = mySqli_query ($koneksi, $mySqlChrt) or die ("Query salah : ".mysqli_error ($koneksi)); ?>
			<?php $mycount = mySqli_query ($koneksi, $count) or die ("Query salah : ".mysqli_error ($koneksi)); ?>
					var ctx = document.getElementById("myChart");
					var myChart = new Chart(ctx, {
							type: 'bar',
							data: {
									labels: [<?php while ($b = mysqli_fetch_array($myQry)) { echo '"' . $b['tgl_surat'] . '",';}?>],
									datasets: [{
													label: 'Jumlah Pengajuan Surat Keterangan Miskin : <?php echo mysqli_num_rows($myQry1); ?>',
													data: [<?php while ($j = mysqli_fetch_array($mycount)) { echo '"' . $j['jumlah'] . '",';}?>],
													backgroundColor: [
															'rgba(255, 99, 132, 0.2)',
															'rgba(54, 162, 235, 0.2)',
															'rgba(255, 206, 86, 0.2)',
															'rgba(75, 192, 192, 0.2)',
															'rgba(153, 102, 255, 0.2)',
															'rgba(255, 159, 64, 0.2)'
													],
													borderColor: [
															'rgba(255,99,132,1)',
															'rgba(54, 162, 235, 1)',
															'rgba(255, 206, 86, 1)',
															'rgba(75, 192, 192, 1)',
															'rgba(153, 102, 255, 1)',
															'rgba(255, 159, 64, 1)'
													],
													borderWidth: 1
											}]
							},
							options: {
									scales: {
											yAxes: [{
															ticks: {
																	beginAtZero: true
															}
													}]
									}
							}
					});
			</script>
<?php include "footer.php"; }?>
