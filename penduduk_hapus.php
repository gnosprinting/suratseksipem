<?php include "header.php";
	if ($_GET) {
		if (empty($_GET['nik'])) {
?>
	<b>Data yang dihapus tidak ada</b>
<?php
	}
	else {
		$mySql = "DELETE FROM t_penduduk WHERE nik='".$_GET['nik']."'";
		$myQry = mysqli_query($koneksi,$mySql) or die("Eror hapus data ".mysqli_error($koneksi));
		if ($myQry) {
	?>	
		<div class="alert alert-success alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Data Karyawan berhasil dihapus.</div>
		<meta http-equiv='refresh' content='1; url=penduduk_data.php'/>
<?php
			}
	}
}
?>