
<?php
	include ('koneksi.php');
	include	('library.php');
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
         margin-bottom: 0px;
         text-align: center;
         height: 150px;
         padding: 0px;
     }
     .pemko{
         width:70px;
     }
     .logo{
         float: left;
         margin-right: 0px;
         width: 15%;
         padding:0px;
         text-align: right;
     }
     .headtext{
         float:right;
         margin-left: 0px;
         width: 75%;
         padding-left:0px;
         padding-right:10%;
     }
     hr{
         height: 3px;
         background-color: black;

     }
     .ttd{
         margin-left:70%;
         text-align: center;
         text-transform: uppercase;
     }
    </style>
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
                <p style="margin:0px;">Alamat : Jl.Jend Sudirman No.3 Telp.(0511)6749034 Banjarbaru 70713 Email kel.loktabat.sel@gmail.com</p>
            </div>
    </div>
    <hr>

    <div class="container">
        <div class="isi">
        <h2 style="text-align:center;text-transform: uppercase;">DATA PENDUDUK <br> DI KELURAHAN LOKTABAT SELATAN</h2>
        <table class="table table-striped table-hover">
		<thead >
		<tr>
			<th scope="col" class="text-center">Id </th>
			<th scope="col" class="text-center">Nama</th>
			<th scope="col" class="text-center">Nik</th>
			<th scope="col" class="text-center">Tempat tanggal lahir</th>
			<th scope="col" class="text-center">Jenis Kelamin</th>
			<th scope="col" class="text-center">Status</th>
			<th scope="col" class="text-center">Alamat</th>
		</tr>
		</thead>
<?php
	$mySql = "SELECT * from t_penduduk";
	$myQry = mySqli_query ($koneksi, $mySql) or die ("Query salah : ".mysqli_error ($koneksi));
	$nomor = 1;
	while ($kolomData = mysqli_fetch_array ($myQry)) {
?>
		<tr>
			<td><?php echo $kolomData['id_penduduk']; ?></td>
			<td><?php echo $kolomData['nama']; ?></td>
			<td><?php echo $kolomData['nik']; ?></td>
			<td><?php echo $kolomData['tempat_lhr']?> - <?php echo$kolomData['tgl_lhr']; ?></td>
			<td><?php echo $kolomData['jk']; ?></td>
			<td><?php echo $kolomData['status']; ?></td>
			<td><?php echo $kolomData['alamat']; ?></td>
		</tr>
	<?php } ?>
				</table>
                    </div>

        </div>

            </body>
</html>
