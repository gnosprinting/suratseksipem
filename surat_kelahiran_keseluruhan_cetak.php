<?php
	include ('koneksi.php');
    include	('library.php');
		if(isset($_POST['qcari'])) {
			$qcari=$_POST['qcari'];
			$mySql="SELECT * FROM surat_kelahiran WHERE nik like '%$qcari%' or nama like '%$qcari%' or no_surat like '%$qcari%' or tgl_surat like '%$qcari%'";
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
        color: black;
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
                <p style="margin:0px;">JL.Sabilal II Rt.03 Rw.04 Banjarbaru Kalimantan Selatan 70712</p>
                <p style="margin:0px;">Tlp/Fax :05116749157 Email: kel.loktabat.sel@gmail.com Blog: loktabat-selatan.blogspot.com</p>

            </div>
    </div>
    <hr style="hight:3px!important;">
        <div class="isi">
        <h2 style="text-align:center;text-transform: uppercase;">LAPORAN SURAT KELAHIRAN</h2>
				<h2 style="text-align:center;text-transform: uppercase;">TAHUN <?php echo $qcari ?></h2>
        <div class="content" style="padding:3% !important;">
	<div class="table-responsive">

    <table class="table table-striped table-hover">
		<thead >
		<tr>
            <th>No</th>
			<th scope="col" class="text-center">Hari </th>
			<th scope="col" class="text-center">Tanggal</th>
			<th scope="col" class="text-center">Lokasi</th>
			<th scope="col" class="text-center">gender anak</th>
			<th scope="col" class="text-center">nama anak</th>
			<th scope="col" class="text-center">nama ibu</th>
            <th scope="col" class="text-center">nama ayah</th>
		</tr>
		</thead>
<?php
	$mySql = "SELECT * from surat_kelahiran WHERE tgl_surat like '%$qcari%'";
	$myQry = mySqli_query ($koneksi, $mySql) or die ("Query salah : ".mysqli_error ($koneksi));
	$nomor = 1;
	while ($kolomData = mysqli_fetch_array ($myQry)) {
?>
		<tr>
            <td><?php echo $nomor++?></td>
			<td class="text-center"><?php echo $kolomData['hari']; ?></td>
			<td class="text-center" ><?php echo $kolomData['tanggal']; ?></td>
			<td class="text-center" ><?php echo $kolomData['lokasi']; ?></td>
			<td class="text-center" ><?php echo $kolomData['jk']; ?></td>
			<td class="text-center" ><?php echo $kolomData['nama_anak']; ?></td>
			<td class="text-center" ><?php echo $kolomData['nama_ibu']; ?></td>
			<td class="text-center" ><?php echo $kolomData['nama_ayah']; ?></td>
		</tr>
	<?php } ?>
				</table>
                <h5>Jumlah data surat kelahiran : &nbsp <?php echo $nomor-1 ?></h5>
				</div>
			</div>
<?php include "footer.php"; ?>
