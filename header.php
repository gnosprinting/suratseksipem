<?php
	include ('koneksi.php');
	include	('library.php');
?>
<html lang="en">
<head>
	<title>Kelurahan Loktabat Selatan Kota Banjarabru</title>
	<link href="css/site.css" rel="stylesheet">
	<link href="css/bootstrap.min.css" rel="stylesheet">
	<link href="css/fontawesome.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
	<script src="chartjs/Chart.bundle.js"></script>
	<script src="http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-success">
  <a class="navbar-brand" href="index.php">Surat Seksipem</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNavDropdown">
    <ul class="navbar-nav">
			<li class="nav-item">
				<a class="nav-link" href="index.php">Beranda</a>
			</li>
			<li class="nav-item">
				<a class="nav-link" href="data_ttd.php">Tandatangan</a>
			</li>
			<!-- <li class="nav-item">
				<a class="nav-link" href="kk_data.php">Kartu Keluarga</a>
			</li>
			<li class="nav-item">
				<a class="nav-link" href="penduduk_data.php">Penduduk</a>
			</li>
			<li class="nav-item">
				<a class="nav-link" href="kepala_keluarga_data.php">Kepala Keluarga</a>
			</li> -->
			<li class="nav-item dropdown">
				<a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
					Kependudukan
				</a>
				<div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
					<a class="dropdown-item" href="kk_data.php">Kartu Keluarga</a>
					<a class="dropdown-item" href="penduduk_data.php">Penduduk</a>
					<a class="dropdown-item" href="kepala_keluarga_data.php">Kepala Keluarga</a>
				</div>
			</li>
			<li class="nav-item dropdown">
				<a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
					Surat
				</a>
				<div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
					<a class="dropdown-item" href="surat_domisili.php">Surat Domisili</a>
					<a class="dropdown-item" href="surat_kelahiran.php">Surat Kelahiran</a>
					<a class="dropdown-item" href="surat_kematian.php">Surat Kematian</a>
					<a class="dropdown-item" href="surat_pindah.php">Surat Pindah</a>
					<a class="dropdown-item" href="surat_kehilangan.php">Surat Kehilangan</a>
					<a class="dropdown-item" href="surat_ektp.php">Surat e-Ktp</a>
					<a class="dropdown-item" href="surat_belum_memiliki_rumah.php">Surat Belum Memiliki Rumah</a>
					<a class="dropdown-item" href="surat_domisili_usaha.php">Surat Domisili Usaha</a>
					<a class="dropdown-item" href="surat_duda_janda.php">Surat Duda / Janda</a>
					<a class="dropdown-item" href="surat_keramaian.php">Surat Ijin Keramaian</a>
					<a class="dropdown-item" href="surat_miskin_rs.php">Surat Miskin Rumah Sakit</a>
					<a class="dropdown-item" href="surat_miskin_bs.php">Surat Miskin Beasiswa</a>
				</div>
			</li>
			<!-- <li class="nav-item">
			<a class="nav-link" href="profil_kelurahan.php">Profil kelurahan</a>
		</li> -->
		<li class="nav-item dropdown">
			<a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
				Laporan
			</a>
			<div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
				<a class="dropdown-item" href="surat_domisili_lap.php"> Cetak Tabel Surat Domisili</a>
				<a class="dropdown-item" href="surat_kelahiran_lap.php">  Cetak Tabel Surat Kelahiran</a>
				<a class="dropdown-item" href="surat_kematian_lap.php"> Cetak Tabel Surat Kematian</a>
				<a class="dropdown-item" href="surat_pindah_lap.php"> Cetak Tabel Surat Pindah</a>
				<a class="dropdown-item" href="surat_kehilangan_lap.php"> Cetak Tabel  Surat Kehilangan</a>
				<a class="dropdown-item" href="surat_ektp_lap.php"> Cetak Tabel Surat e-Ktp</a>
				<a class="dropdown-item" href="surat_belum_memiliki_rumah_lap.php"> Cetak Tabel Surat Belum Memiliki Rumah</a>
				<a class="dropdown-item" href="surat_domisili_usaha_lap.php"> Cetak Tabel Surat Domisili Usaha</a>
				<a class="dropdown-item" href="surat_duda_janda_lap.php"> Cetak Tabel Surat Duda / Janda</a>
				<a class="dropdown-item" href="surat_keramaian_lap.php"> Cetak Tabel Surat Ijin Keramaian</a>
				<a class="dropdown-item" href="surat_miskin_keseluruhan_cetak.php"> Cetak Tabel Surat Keterangan Miskin</a>
			</div>
		</li>
		<!-- <li class="nav-item">
			<a class="nav-link" href="statistik.php"> Statistik</a>
		</li> -->
		<li class="nav-item dropdown">
			<a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
				Statistik
			</a>
			<div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
				<a class="dropdown-item" href="statistik.php"> Statistik</a>
				<a class="dropdown-item" href="statistik_kematian.php"> Statistik Kematian</a>
				<a class="dropdown-item" href="statistik_kelahiran.php">  Statistik Kelahiran</a>
				<!-- <a class="dropdown-item" href="statistik_domisili.php"> Statistik Domisili</a>
				<a class="dropdown-item" href="statistik_kehilangan.php"> Statistik Kehilangan</a>
				<a class="dropdown-item" href="statistik_ektp.php"> Statistik e-KTP</a> -->
				<a class="dropdown-item" href="statistik_belum_memiliki_rumah.php"> Statistik Belum Memiliki Rumah</a>
				<!-- <a class="dropdown-item" href="statistik_domisili_usaha.php"> Statistik Domisili Usaha</a>
				<a class="dropdown-item" href="statistik_duda_janda.php"> Statistik Duda / Janda</a>
				<a class="dropdown-item" href="statistik_keramaian.php"> Statistik Ijin Keramaian</a>
				<a class="dropdown-item" href="statistik_miskin.php"> Statistik Keterangan Miskin</a> -->
			</div>
		</li>
		<li class="nav-item pull-right">
			<a class="nav-link" style="margin-left:600px;" href="logout.php">Logout</a>
		</li>
    </ul>

  </div>
</nav>



	<div class="container">
	<div class="content" style="padding:5px !important;">
