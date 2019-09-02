<?php include "kon.php";
	if ($_GET) {
		if (empty($_GET['nip'])) {
?>
	<b>Data yang dihapus tidak ada</b>
<?php
	}
	else {
		$mySql = "DELETE FROM t_pegawai WHERE nip='".$_GET['nip']."'";
		$myQry = mysqli_query($koneksi,$mySql) or die("Eror hapus data ".mysqli_error($koneksi));
		if ($myQry) {
	?>
		<div class="alert alert-success alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Data pegawai berhasil dihapus.</div>
		<meta http-equiv='refresh' content='1; url=pegawai_data.php'/>
<?php
			}
	}
}
?>
