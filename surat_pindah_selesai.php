<?php include "header.php";
	if ($_GET) {
		if (empty($_GET['id'])) {
?>
	<b>Tidak ada surat yang diselesaikan</b>
<?php
	}
	else {
		//$nik = $_GET['nik'];
		$status_surat		= 'selesai';
		$update = mysqli_query($koneksi, "UPDATE surat_pindah SET status_surat='$status_surat' WHERE id='".$_GET['id']."'") or die(mysqli_error());
		$select  = mysqli_query($koneksi, "SELECT * FROM surat_pindah WHERE id='".$_GET['id']."'") or die(mysqli_error($koneksi));
		$row = mysqli_fetch_assoc($select);
		$nik = $row['nik'];

		$select_penduduk  = mysqli_query($koneksi, "SELECT * FROM t_penduduk WHERE nik='$nik'") or die(mysqli_error($koneksi));
		$rowi = mysqli_fetch_assoc($select_penduduk);
		$no_kk = $rowi['no_kk'];
		$nama = $rowi['nama'];
		$tempat_lhr = $rowi['tempat_lhr'];
		$tgl_lhr = $rowi['tgl_lhr'];
		$jk = $rowi['jk'];
		$status = $rowi['status'];
		$alamat = $rowi['alamat'];
		$rt_rw = $rowi['rt_rw'];
		$agama = $rowi['agama'];
		$pendidikan = $rowi['pendidikan'];
		$pekerjaan = $rowi['pekerjaan'];
		$status_keluarga = $rowi['status_keluarga'];
		$id_kelurahan = $rowi['id_kelurahan'];
		$id_kecamatan = $rowi['id_kecamatan'];

		$simpan = mysqli_query($koneksi, "INSERT INTO t_penduduk_pindah(no_kk,nama,nik,tempat_lhr,tgl_lhr,jk,status,alamat,rt_rw,agama,pendidikan,pekerjaan,status_keluarga,id_kelurahan,id_kecamatan)
		VALUES('$no_kk','$nama','$nik','$tempat_lhr','$tgl_lhr','$jk','$status','$alamat','$rt_rw','$agama','$pendidikan','$pekerjaan','$status_keluarga','$id_kelurahan','$id_kecamatan')") or die (mysqli_error ($koneksi));
		$qdelete = "DELETE FROM t_penduduk WHERE nik='$nik'";
		$delete = mysqli_query($koneksi,$qdelete) or die("Eror hapus data ".mysqli_error($koneksi));
		if ($update) {
	?>
		<div class="alert alert-success alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Surat berhasil diselesaikan.</div>
		<meta http-equiv='refresh' content='2; url=surat_pindah.php'/>
<?php
			}
	}
}
?>
