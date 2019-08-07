<?php
	include ('../koneksi.php');
    include	('../library.php');

    $id = $_GET ['id'];
	$sql = mysqli_query($koneksi, "SELECT * FROM surat_tidakmampu WHERE id='$id'");
	if (mysqli_num_rows($sql)==0) {
	?>
		<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>NIK Tidak Ada..!</div>
	<?php
	}else{
		$row = mysqli_fetch_assoc($sql);
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
    	<link href="../css/site.css" rel="stylesheet">
	<link href="../css/bootstrap.min.css" rel="stylesheet">
	<link href="../css/fontawesome.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">

</head>
<body>
    	<h3 style="text-align:center;">PENGAJUAN SURAT MISKIN</h3>
    <hr style="hight:3px!important;">
		<div class="" style="text-align:center;">
			<h1>
				KODE : '<?php echo $row['no_surat'] ?>'
			</h1>
			<i>Screenshot(capture)/Print(ctrl+p) halaman ini & Serahkan Kode pada petugas untuk mencetak surat</i>
		</div>
<div class="isi">
  <div class="content" style="padding:3% !important;">
    <div class="row">
	    <div class="col-md-4">
		    <h5>Nama</h5>
		    <h5>Pekerjaan</h5>
		    <h5>Untuk</h5>
				<h5>Syarat</h5>
	    </div>
	    <div class="col-md-8">
		    <h5>:&nbsp<?php echo $row['nama'] ?></h5>
		    <h5>:&nbsp<?php echo $row['pekerjaan'] ?></h5>
		    <h5>:&nbsp<?php echo $row['atas_nama']?></h5>
				<h5>:</h5>
	    </div>
  </div>
	<br>
	<div class="row">
		<div class="col-md-4">
			<img src="../img/<?php echo $row['s_pengantar']?>" alt="" width="450">
			<p style="text-align:center;">Surat Pengantar</p>
		</div>
		<div class="col-md-4">
			<img src="../img/<?php echo $row['s_ktp']?>" alt="" width="450">
			<p style="text-align:center;">KTP Pelapor</p>
		</div>
		<div class="col-md-4">
			<img src="../img/<?php echo $row['s_kk']?>" alt="" width="450">
			<p style="text-align:center;">Kartu Keluarga</p>
		</div>
	</div>
	<div class="row">
		<div class="col-md-4">
			<img src="../img/<?php echo $row['s_pernyataan']?>" alt="" width="450">
			<p style="text-align:center;">Surat Pernyataan</p>
		</div>
		<div class="col-md-4">
			<img src="../img/<?php echo $row['ktp_saksi1']?>" alt="" width="450">
			<p style="text-align:center;">KTP Saksi 1</p>
		</div>
		<div class="col-md-4">
			<img src="../img/<?php echo $row['ktp_saksi2']?>" alt="" width="450">
			<p style="text-align:center;">KTP Saksi 2</p>
		</div>
		<div class="col-md-4">
			<img src="../img/<?php echo $row['s_pbb']?>" alt="" width="450">
			<p style="text-align:center;">Lunas PBB</p>
		</div>
	</div>
</div>
<script src="js/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>
</body>
</html>
