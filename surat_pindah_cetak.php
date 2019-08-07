<?php
	include ('koneksi.php');
    include	('library.php');

    $id = $_GET ['id'];
	$sql = mysqli_query($koneksi, "SELECT * FROM surat_pindah WHERE id='$id'");
	$sql_ttd = mysqli_query($koneksi, "SELECT * FROM data_ttd");

	if (mysqli_num_rows($sql)==0) {
	?>
		<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>NIK Tidak Ada..!</div>
	<?php
	}else{
		$row = mysqli_fetch_assoc($sql);
		$rol = mysqli_fetch_assoc($sql_ttd);
	}

	?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        body{

        }
          table{
        border-collapse: collapse;
        width:100%;
      }

         table, th, td{
        border: 1px solid #708090;
      }
      th{
        background-color: darkslategray;
        text-align: center;
        color: aliceblue;
      }
      td{
        text-align: center;
      }
      br{
          margin-bottom: 5px !important;
      }
     .judul{
         text-align: center;
     }
     .header{
         margin-top:20px;
         margin-bottom: 0px;
         text-align: center;
         height: 150px;
         padding: 0px;
     }
     .pemko{
         width:110px;
         -webkit-filter:grayscale(100%);
         filter: grayscale (100%);
     }
     .logo{
         float: left;
         margin-right: 0px;
         width: 13%;
         padding:0px;
         text-align: right;
     }
     .headtext{
         float:right;
         margin-left: 0px;
         width: 85%;
         padding-left:0px;
         padding-right:10%;
     }
     hr{
         height: 5px !important;
         background-color: black;

     }
     .ttd{
         margin-left:70%;
         text-align: center;
         text-transform: uppercase;
     }
    </style>
    	<link href="css/site.css" rel="stylesheet">
	<link href="css/bootstrap.min.css" rel="stylesheet">
	<link href="css/fontawesome.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">

</head>
<body onload="window.print();">
    <div class="header">
            <div class="logo">
                    <img  class="pemko" src="pemko.png" >
            </div>
            <div class="headtext">
                <h3 style="margin:0px;">PEMERINTAH KOTA BANJARBARU</h3>
                <h3 style="margin:0px;">KECAMATAN BANJARBARU SELATAN</h3>
                <h1 style="margin:0px;">KELURAHAN LOKTABAT SELATAN</h1>
                <p style="margin:0px;">JL.Sabilal II Rt.03 Rw.04 Banjarbaru Kalimantan Selatan 70712</p>
                <p style="margin:0px;">Tlp/Fax :05116749157 Email: kel.loktabat.sel@gmail.com Blog: loktabat-selatan.blogspot.com</p>

            </div>
    </div>
    <hr>
				<div class="content" style="padding:3% !important;">
					<div class="row">
						<div class="col-md-4">
							<h6>Provinsi</h6>
							<h6>Kabupaten Kota</h6>
							<h6>Kecamatan</h6>
							<h6>Desa/Kelurahan</h6>
							<h6>Dusun/Dukuh/Kampung</h6>
						</div>
						<div class="col-md-8">
							<h6>:&nbsp<?php echo $row['provinsi'] ?></h6>
							<h6>:&nbsp<?php echo $row['kota']?> </h6>
							<h6>:&nbsp<?php echo $row['kecamatan']?> </h6>
							<h6>:&nbsp<?php echo $row['kelurahan']?> </h6>
							<h6>:&nbsp<?php echo $row['dusun']?> </h6>
						</div>
					</div>
				</div>
        <div class="isi">
        <h4 style="text-align:center;text-transform: uppercase;">SURAT KETERANGAN PINDAH DATANG WNI</h4>
				<h6 style="text-align:center;text-transform: uppercase;">Antar Kecamatan Satu Wilayah Kota</h6>
        <h5 style="text-align:center;text-transform: uppercase;">Nomor :<?php echo $row['no_surat']; ?>/Pem/Kel.Loksel</h5>
				<div class="content" style="padding:3% !important;">
					<h4 style="margin-top:10px;margin-bottom:10px;">DATA DAERAH ASAL :</h4>
					<div class="row">
						<div class="col-md-4">
							<h6>Nomor Kartu Keluarga</h6>
							<h6>Nama Kepala Keluarga</h6>
							<h6>Alamat</h6>
							<h6>&nbsp;</h6>
							<h6 style="margin-left:120px">a. Desa/Kelurahan</h6>
							<h6 style="margin-left:120px">b. Kecamatan</h6>
							<h6>NIK Pemohon</h6>
							<h6>Nama Lengkap</h6>
							<h6>&nbsp;</h6>
						</div>
						<div class="col-md-5">
							<h6>:&nbsp<?php echo $row['no_kk'] ?></h6>
							<h6>:&nbsp<?php echo $row['nama_kepala_keluarga']?> </h6>
							<h6>:&nbsp<?php echo $row['alamat']?> </h6>
							<h6> &nbsp;&nbsp;Dusun/Dukuh/Kampung :&nbsp<?php echo $row['dusun']?></h6>
							<h6>:&nbsp<?php echo $row['kelurahan']?></h6>
							<h6>:&nbsp<?php echo $row['kecamatan']?></h6>
							<h6>:&nbsp<?php echo $row['nik']?></h6>
							<h6>:&nbsp<?php echo $row['nama']?></h6>
							<h6> &nbsp;&nbsp;Kode Pos :&nbsp<?php echo $row['kd_pos']?></h6>
						</div>
						<div class="col-md-3">
							<h6>&nbsp;</h6>
							<h6>&nbsp;</h6>
							<h6 style="margin-right:20px">RT/RW :&nbsp<?php echo $row['rt_rw']?> </h6>
							<h6>&nbsp;</h6>
							<h6 style="">c. Kab/Kota :&nbsp<?php echo $row['kota']?> </h6>
							<h6 style="">d. Provinsi :&nbsp<?php echo $row['provinsi']?> </h6>
							<h6>&nbsp;</h6>
							<h6>&nbsp;</h6>
							<h6 style="">Telepon :&nbsp<?php echo $row['telepon']?> </h6>
						</div>
					</div>

					<h4 style="margin-top:20px;margin-bottom:10px;">DATA DAERAH TUJUAN :</h4>
					<div class="row">
						<div class="col-md-4">
							<h6>Status Nomor KK</h6>
							<h6>Nomor Kartu Keluarga</h6>
							<h6>NIK Kepala Keluarga</h6>
							<h6>Nama Kepala Keluarga</h6>
							<h6>Tanggal Kedatangan</h6>
							<h6>Alamat</h6>
							<h6>&nbsp;</h6>
							<h6 style="margin-left:120px">a. Desa/Kelurahan</h6>
							<h6 style="margin-left:120px">b. Kecamatan</h6>
						</div>
						<div class="col-md-5">
							<h6>:&nbsp<?php echo $row['status_no_kk'] ?></h6>
							<h6>:&nbsp<?php echo $row['no_kk_pindah'] ?></h6>
							<h6>:&nbsp<?php echo $row['nik_kepala_keluarga_pindah']?> </h6>
							<h6>:&nbsp<?php echo $row['nama_kepala_keluarga_pindah']?> </h6>
							<h6>:&nbsp<?php echo $row['tgl_kedatangan']?> </h6>
							<h6>:&nbsp<?php echo $row['alamat_pindah']?> </h6>
							<h6> &nbsp;&nbsp;Dusun/Dukuh/Kampung :&nbsp<?php echo $row['dusun_pindah']?></h6>
							<h6>:&nbsp<?php echo $row['kelurahan_pindah']?></h6>
							<h6>:&nbsp<?php echo $row['kecamatan_pindah']?></h6>
						</div>
						<div class="col-md-3">
							<h6>&nbsp;</h6>
							<h6>&nbsp;</h6>
							<h6 style="margin-right:20px">RT/RW :&nbsp<?php echo $row['rt_rw']?> </h6>
							<h6>&nbsp;</h6>
							<h6 style="">c. Kab/Kota :&nbsp<?php echo $row['kota']?> </h6>
							<h6 style="">d. Provinsi :&nbsp<?php echo $row['provinsi']?> </h6>
						</div>
					</div>
						<div class="text-center" style="margin-top: 40px;margin-left:650px">
							<h6 >Banjarbaru,        &nbsp &nbsp&nbsp &nbsp &nbsp &nbsp&nbsp &nbsp&nbsp &nbsp&nbsp &nbsp &nbsp &nbsp&nbsp &nbsp    </h6>
							<h6>Dikeluarkan oleh :</h6>
							<h6>a/n Kepala Dinas Kependudukan dan Pencatatan Sipil</h6>
							<h6 style="margin-bottom:40px;"><b><?php echo $rol['jabatan']?></b></h6>
							<br>
							<h6 style="margin-top:50px;"><?php echo $rol['nama']?></h6>
							<h6><?php echo $rol['nip']?></h6>
						</div>
					</div>
				</div>
         <script src="js/jquery.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
         </body>
</html>
