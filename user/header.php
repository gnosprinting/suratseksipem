<?php
	include ('../koneksi.php');
	include	('../library.php');

?>
<html lang="en">
<head>
	<title>Kelurahan Loktabat Selatan Kota Banjarabru</title>
	<link href="../css/site.css" rel="stylesheet">
	<link href="../css/bootstrap.min.css" rel="stylesheet">
	<link href="../css/fontawesome.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-danger">
  <a class="navbar-brand" href="index.php">Surat Seksipem</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNavDropdown">
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" href="index.php">Beranda</a>
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
					<a class="dropdown-item" href="surat_miskin.php">Surat Miskin</a>
				</div>
      </li>
      <li class="nav-item pull-right">
				<b><a class="nav-link" style="margin-left:1000px;" href="../logout.php">Logout</a></b>
      </li>
    </ul>

  </div>
</nav>



	<div class="container">
	<div class="content" style="padding:5px !important;">
