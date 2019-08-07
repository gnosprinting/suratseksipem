<?php include "header.php";
	if ($_GET) {
		if (empty($_GET['id'])) {
?>
	<b>Tidak ada surat yang diselesaikan</b>
<?php
	}
	else {
		$status_surat		= 'selesai';
		$update = mysqli_query($koneksi, "UPDATE surat_domisili SET status_surat='$status_surat' WHERE id='".$_GET['id']."'") or die(mysqli_error());
		if ($update) {
	?>
		<div class="alert alert-success alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Surat berhasil diselesaikan.</div>
		<meta http-equiv='refresh' content='1; url=surat_domisili.php'/>
<?php
			}
	}
}
?>
