<?php
	include ('koneksi.php');
    include	('library.php');
		include ('lib/tanggal_indo.php');
		include ('lib/tgl_indo.php');
			// $tanggal = time();
			// $timestamp = date('F Y');

    $id = $_GET ['id'];
	$sql = mysqli_query($koneksi, "SELECT * FROM surat_ijin_keramaian WHERE id='$id'");
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
         margin-bottom: 20px;
         text-align: center;
         height: 150px;
         padding: 0px;
     }
     .pemko{
         margin-left:10px;
         width:120px;
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
                <p style="margin:0px;">Jalan Sabilal II Rt.03 Rw.04 Banjarbaru Kalimantan Selatan 70712</p>
                <p style="margin:0px;">Tlp/Fax :05116749157 Email: kel.loktabat.sel@gmail.com Blog: loktabat-selatan.blogspot.com</p>

            </div>
    </div>
    <hr style="hight:3px!important;">
    <div class="isi">
        <h5 style="text-align:left;text-indent:750px;">Banjarbaru, &nbsp &nbsp &nbsp <?php echo TanggalIndonesia(date('Y-m-d')); ?></h5>
        <div class="content" style="padding:3% !important;">
		<div class="row">
			<div class="col-md-5">
				<h5>Hal : Surat ijin mengumpulkan</h5>
				<h5 style="text-indent:46px;">Orang Banyak</h5>
			</div>
			<div class="col-md-5">
				<h5 style="text-indent:200px;"> Kepada :</h5>
				<h5 style="text-indent:158px;"> Yth. Kapolres Banjarabru</h5>
				<h5 style="text-indent:240px;"> di -</h5>
				<h5 style="text-indent:280px;"> Banjarabru</h5>
			</div>
		</div>
	</br>
    <h5 style="text-indent:50px;"> Dengan hormat,</h5>
		<h5> yang bertanda tangan dibawah ini :</h5>
    <div class="row">
	    <div class="col-md-4">
		    <h5>Nama</h5>
		    <h5>NIK</h5>
		    <h5>Tpt & Tanggal lahir</h5>
		    <h5>Pekerjaan</h5>
				<h5>Alamat</h5>
	    </div>

	    <div class="col-md-8">
		    <h5>:&nbsp<?php echo $row['nama'] ?></h5>
		    <h5>:&nbsp<?php echo $row['nik'] ?></h5>
		    <h5>:&nbsp<?php echo $row['tempat_lhr']?>&nbsp<?php echo $row['tgl_lhr']?></h5>
		    <h5>:&nbsp<?php echo $row['pekerjaan']?> </h5>
				<h5>
					:&nbsp<?php echo $row['alamat']?> </br>
					&nbsp RT/RW. <?php echo $row['rt_rw']?> Kel. Loktabat Selatan </br>
					&nbsp Kec. Banjarbaru Selatan Kota Banjarbaru
				</h5></br>
	    </div>
    <h5 style="text-indent:50px;">
			Dengan ini mengajukan permohonan untuk dapat diberikan ijin mengumpulkan orang banyak untuk melaksanakan acara : <b><i><?php echo $row['acara']; ?></i></b>
		</h5>
		<h5> yang akan dilaksanakan pada :</h5>
    </div>
		<div class="row">
			<div class="col-md-4">
				<h5>Hari</h5>
				<h5>Tanggal</h5>
				<h5>Jam</h5>
				<h5>Tempat</h5>
				<h5>Hiburan</h5>
			</div>

			<div class="col-md-8">
				<h5>:&nbsp<?php echo $row['hari'] ?></h5>
				<?php
					$tgl_srt = $row['tgl'];
					$tgls = tgl_indo($tgl_srt);
				?>
				<h5>:&nbsp<?php echo $tgls; ?></h5>
				<h5>:&nbsp<?php echo $row['jam']?></h5>
				<h5>:&nbsp<?php echo $row['tempat']?> </h5>
				<h5>
					:&nbsp<?php echo $row['hiburan']?>
				</h5>
			</div>
		</div>
  </div>
	<h5 style="margin-bottom:50px;text-indent:50px;">
		Demikian permohonan saya, atas berkenannya diucapkan terimakasih.
	</h5>
	<div class="text-center" style="margin-left:650px">
		<h5 style="margin-bottom:80px;"><b>Pemohon</b></h5>
		<h5><?php echo $row['nama']?></h5>
	</div>
	<div class="row" style="margin-left:20px">
		<div class="col-md-1">
			<h5>Tanggal </h5>
			<h5>Nomor </h5>
		</div>
		<div class="col-md-4">
			<h5>:</h5>
			<h5>:</h5>
		</div>
		<div class="col-md-1">
			<h5>Tanggal </h5>
			<h5>Nomor </h5>
		</div>
		<div class="col-md-4">
			<h5>:&nbsp &nbsp &nbsp &nbsp &nbsp<?php echo TanggalIndonesia(date('Y-m-d')); ?></h5>
			<h5>: 400 /&nbsp &nbsp &nbsp &nbsp &nbsp/Kessos/ Kel. LokSel</h5>
		</div>
	</div>
	<div class="row" style="margin-left:80px">
		<div class="col-md-5">
			<div class="text-center">
				<h5>Mengetahui</h5>
				<h5 style="margin-bottom:100px;"><b>CAMAT BANJARBARU SELATAN</b></h5>
				<h5>______________________________________________</h5>
			</div>
		</div>
		<div class="col-md-5">
			<div class="text-center">
				<h5>Mengetahui</h5>
				<h5><b>An.LURAH</b></h5>
				<h5 style="margin-bottom:70px;"><b>Kasi Kessos</b></h5>
				<h5>______________________________________________</h5>
			</div>
		</div>
	</div>
         <script src="js/jquery.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
         </body>
</html>
