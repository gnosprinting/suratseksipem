<?php
 include "header.php";
	$nik = $_GET ['nik'];
	$sql = mysqli_query($koneksi, "SELECT * FROM t_penduduk WHERE nik='$nik'");
	if (mysqli_num_rows($sql)==0) {
?>
		<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>NIK Tidak Ada..!</div>
<?php
	}else{
		$row = mysqli_fetch_assoc($sql);
	}
?>

<div class="card w-30">
  <div class="card-body text-center">
    <h5 class="card-title">Surat Domisili</h5>
    <p class="card-text">cetak surat domisili dari <?php echo $row['nama'] ?></p>
    <a href="surat_domisili_tambah.php?nik=<?php echo $row['nik'];?>" class="btn btn-primary btn-block">buat</a>
  </div>
</div>

<div class="card w-30">
  <div class="card-body text-center">
    <h5 class="card-title">Surat Kelahiran</h5>
    <p class="card-text">cetak surat kelahiran dari <?php echo $row['nama'] ?></p>
    <a href="surat_kelahiran_tambah.php?nik=<?php echo $row['nik'];?>" class="btn btn-primary btn-block">buat</a>
  </div>
</div>
<div class="card w-30" style="margin-top:10px;">
  <div class="card-body text-center">
    <h5 class="card-title">Surat kematian</h5>
    <p class="card-text">cetak surat kematian dari <?php echo $row['nama'] ?></p>
    <a href="surat_kematian_tambah.php?nik=<?php echo $row['nik'];?>" class="btn btn-primary btn-block">buat</a>
  </div>
</div>
<div class="card w-30" style="margin-top:10px;">
  <div class="card-body text-center">
    <h5 class="card-title">Surat kehilangan</h5>
    <p class="card-text">cetak surat kehilangan dari <?php echo $row['nama'] ?></p>
    <a href="surat_kehilangan_tambah.php?nik=<?php echo $row['nik'];?>" class="btn btn-primary btn-block">buat</a>
  </div>
</div>
<div class="card w-30" style="margin-top:10px;">
  <div class="card-body text-center">
    <h5 class="card-title">Surat pengantar E-KTP</h5>
    <p class="card-text">cetak surat pengantar E-KTP dari <?php echo $row['nama'] ?></p>
    <a href="surat_ektp_tambah.php?nik=<?php echo $row['nik'];?>" class="btn btn-primary btn-block">buat</a>
  </div>
</div>
<div class="card w-30" style="margin-top:10px;">
  <div class="card-body text-center">
    <h5 class="card-title">Surat Belum Memiliki Rumah</h5>
    <p class="card-text">cetak surat keterangan belum memiliki rumah<?php echo $row['nama'] ?></p>
    <a href="surat_belum_memiliki_rumah_tambah.php?nik=<?php echo $row['nik'];?>" class="btn btn-primary btn-block">buat</a>
  </div>
</div>
<div class="card w-30" style="margin-top:10px;">
  <div class="card-body text-center">
    <h5 class="card-title">Surat Domisili Usaha</h5>
    <p class="card-text">cetak surat keterangan domisili usaha<?php echo $row['nama'] ?></p>
    <a href="surat_domisili_usaha_tambah.php?nik=<?php echo $row['nik'];?>" class="btn btn-primary btn-block">buat</a>
  </div>
</div>
<div class="card w-30" style="margin-top:10px;">
  <div class="card-body text-center">
    <h5 class="card-title">Surat Duda / Janda</h5>
    <p class="card-text">cetak surat keterangan Duda / Janda<?php echo $row['nama'] ?></p>
    <a href="surat_duda_janda_tambah.php?nik=<?php echo $row['nik'];?>" class="btn btn-primary btn-block">buat</a>
  </div>
</div>
<div class="card w-30" style="margin-top:10px;">
  <div class="card-body text-center">
    <h5 class="card-title">Surat Ijin Keramaian</h5>
    <p class="card-text">cetak surat ijin keramaian<?php echo $row['nama'] ?></p>
    <a href="surat_keramaian_tambah.php?nik=<?php echo $row['nik'];?>" class="btn btn-primary btn-block">buat</a>
  </div>
</div>
<div class="card w-30" style="margin-top:10px;">
  <div class="card-body text-center">
    <h5 class="card-title">Surat Miskin Rumah Sakit</h5>
    <p class="card-text">cetak surat miskin rumah sakit<?php echo $row['nama'] ?></p>
    <a href="surat_miskin_rs_tambah.php?nik=<?php echo $row['nik'];?>" class="btn btn-primary btn-block">buat</a>
  </div>
  <div class="card-body text-center">
    <h5 class="card-title">Surat Miskin Beasiswa</h5>
    <p class="card-text">cetak surat miskin beasiswa<?php echo $row['nama'] ?></p>
    <a href="surat_miskin_bs_tambah.php?nik=<?php echo $row['nik'];?>" class="btn btn-primary btn-block">buat</a>
  </div>
</div>
<?php include "footer.php"; ?>
