<?php include "header.php";
	if ($_GET) {
		if (empty($_GET['id'])) {
?>
	<b>Data yang dihapus tidak ada</b>
<?php
	}
	else {
		$mySql = "DELETE FROM surat_belum_memiliki_rumah WHERE id='".$_GET['id']."'";
		$myQry = mysqli_query($koneksi,$mySql) or die("Eror hapus data ".mysqli_error($koneksi));
		if ($myQry) {
	?>
		<div class="alert alert-success alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Data surat belum memiliki rumah.</div>
		<meta http-equiv='refresh' content='1; url=surat_belum_memiliki_rumah.php'/>
<?php
			}
	}
}
?>
