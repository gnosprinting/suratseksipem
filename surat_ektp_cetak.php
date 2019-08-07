<?php
include ('koneksi.php');
include	('library.php');
	$id = $_GET ['id'];
	$sql = mysqli_query($koneksi, "SELECT * FROM surat_ektp WHERE id='$id'");
	if (mysqli_num_rows($sql)==0) {
	?>
		<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>NIK Tidak Ada..!</div>
	<?php
	}else{
		$row = mysqli_fetch_assoc($sql);
	}

	?>
<html lang="en">
<head>
	<title>Kelurahan Loktabat Selatan Kota Banjarabru</title>
	<link href="css/site.css" rel="stylesheet">
	<link href="css/bootstrap.min.css" rel="stylesheet">
	<link href="css/fontawesome.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">

</head>
<body onload="window.print();">
	<div class="container">
	<div class="content text-center" style="padding:5px !important;">
    <h3 style="margin-top:20px; " >FORMULIR PERMOHONAN KARTU TANDA PENDUDUK (KTP) WARGA NEGARA INDONESIA</h3>
    </div>
    <div class="row"style="margin-top:50px!important;">
    <div class="col">
    <p>PEMERINTAH PROPINSI </p>
    <p>PEMERINTAH KABUPATEN/KOTA </p>
    <p>PEMERINTAH KECAMATAN </p>
    <p>PEMERINTAH KELURAHAN </p>
    <p style="text-decoration:underline;"><b>PERMOHONAN KTP</b></p>


    </div>
    <div class="col">
        <p>: &nbsp KALIMANTAN SELATAN </p>
        <p>: &nbsp KOTA BANJARBARU </p>
        <p>: &nbsp BANJARBARU SELATAN </p>
        <p>: &nbsp LOKTABAT SELATAN </p>
        <p style="margin-top:20px;text-transform:uppercase;">: &nbsp <?php echo $row['keterangan']?> </p>
    </div>
    </div>
    <div class="row"style="margin-top:50px!important;">
    <div class="col">
    <p>NAMA LENGKAP </p>
    <p>NO KK </p>
    <p> NIK </p>
    <p>ALAMAT</p>
    <p>KODE POS</p>


    </div>
    <div class="col">
    <p style="text-transform:uppercase;">: &nbsp <?php echo $row['nama']?> </p>
    <p style="text-transform:uppercase;">: &nbsp <?php echo $row['nomor_kk']?> </p>
    <p style=";text-transform:uppercase;">: &nbsp <?php echo $row['nik']?> </p>
    <p style="text-transform:uppercase;">: &nbsp <?php echo $row['alamat']?> </p>
    <p style="text-transform:uppercase;">: &nbsp <?php echo $row['kode_pos']?> </p>
    </div>
    </div>
    <div class="row" style="margin-top:30px;">
    <div class="col" style="margi:0px !important">
	    <div class="card" style="height:250px;">
		    <div class="card-header">
		    Pas Photo
		    </div>
				<img src="img/<?php echo $row['s_foto']?>" alt="" width="250px" style="margin-top:3px;margin-left:3px;">
	    </div>
    </div>
    <div class="col"style="margi:0px !important">
    <div class="card" style="height:250px;">
    <div class="card-header">
    Cap Jempol
    </div>
    </div>
    </div>
    <div class="col"style="margi:0px">
    <div class="card" style="height:250px;">
    <div class="card-header">
    Specimen Tanda Tangan
    </div>
    </div>
    </div>
    <div class="col text-center">
    <h5>Pemohon</h5> <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    (.....................................)
    </div>
    </div>
    <div class="row" style="margin-top:80px;">
    <div class="col text-center">
    <h5>Camat</h5>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    (.....................................) <br>
    <br>
    NIP: .................................

    </div>
    <div class="col  text-center">
    <h5>Kepala Desa</h5>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    (.....................................)<br>
    <br>
    NIP: .................................
    </div>
    </div>
	</div>
	<script src="js/jquery.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
</body bgcoler="#ffff00">
</html>
