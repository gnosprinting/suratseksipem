<?php
	include ('koneksi.php');
  include	('library.php');

    $id = $_GET ['id'];
	$sql = mysqli_query($koneksi, "SELECT * FROM surat_duda_janda WHERE id='$id'");
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
        <h2 style="text-align:center;text-transform: uppercase;">SURAT KETERANGAN DUDA / JANDA</h2>
        <h4 style="text-align:center;text-transform: uppercase;">Nomor :<?php echo $row['no_surat'] ?>/Kessos/Kel.Loksel</h4>
        <div class="content" style="padding:3% !important;">
    <h5 style="text-indent:50px;"> yang bertanda tangan dibawah ini,Lurah Loktabat Selatan Kecamatan Banjarbaru Selatan Kota Banjarbaru, menerangkan bahwa :</h5>
            <div class="row">
    <div class="col-md-4">
    <h5>Nama</h5>
    <h5>Tempat Tanggal lahir</h5>
    <h5>Jenis Kelamin</h5>
    <h5>Bangsa / Agama</h5>
		<h5>Status Perkawinan</h5>
    <h5>Pekerjaan</h5>
		<h5>Alamat</h5>


    </div>
    <div class="col-md-8">
    <h5>:&nbsp<?php echo $row['nama'] ?></h5>
    <h5>:&nbsp<?php echo $row['tempat_lhr']?>&nbsp<?php echo $row['tgl_lhr']?></h5>
    <h5>:&nbsp<?php echo $row['jk']?> </h5>
    <h5>:&nbsp<?php echo $row['negara']?>/<?php echo $row['agama']?> </h5>
		<h5>:&nbsp<?php echo $row['status']?> <?php echo $row['det_status']?></h5>
		<h5>:&nbsp<?php echo $row['pekerjaan']?> </h5>
		<h5>
			:&nbsp<?php echo $row['alamat']?> </br>
			&nbsp RT/RW. <?php echo $row['rt_rw']?> Kel. Loktabat Selatan </br>
			&nbsp Kec. Banjarbaru Selatan Kota Banjarbaru
		</h5>
    </div>
<?php
	$status = $row['status'];
	$det_status = $row['det_status'];
	$dari = ''; $det = '';
	if ((($status) == 'Janda')&&(($det_status)=='Hidup')) {
		$dari = 'Suami';
	}
	elseif ((($status) == 'Janda')&&(($det_status)=='Mati')) {
		$dari = 'Suami'; $det = '(ALM)';
	}
	elseif ((($status) == 'Duda')&&(($det_status)=='Hidup')) {
		$dari = 'Isteri';
	}
	elseif ((($status) == 'Duda')&&(($det_status)=='Mati')) {
		$dari = 'Isteri'; $det = '(ALM)';
	}
?>
		<h5 style="margin-top:50px;text-indent:50px;">
			Berdasarkan data-data dan keterangan yang ada pada kami, yang bersangkutan adalah benar-benar <?php echo $status; ?>
			dari <?php echo $dari; ?> yang bernama : <b><u><?php echo $row['mantan']; ?> <?php echo $det ?></u></b>
		</h5>
		<h5 style="margin-bottom:100px;text-indent:50px;">
			Demikian surat keterangan ini diberikan untuk dapat dipergunakan sebagaimana mestinya.
		</h5>

    <div class="text-center" style="margin-left:650px">
    <h5 >Banjarbaru,        &nbsp &nbsp&nbsp &nbsp &nbsp &nbsp&nbsp &nbsp&nbsp &nbsp&nbsp &nbsp &nbsp &nbsp&nbsp &nbsp</h5>
		<h5 style="margin-bottom:100px;"><b><?php echo $rol['jabatan']?></b></h5>
		<br>
    <h5 style="margin-top:100px;"><?php echo $rol['nama']?></h5>
		<h5><?php echo $rol['nip']?></h5>
    </div>
            </div>
         </div>
         <script src="js/jquery.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
         </body>
</html>
