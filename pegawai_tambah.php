<?php
// session_start();
// //cek apakah yang mengakses halaman ini sudah login
// if($_SESSION['level']=="" || $_SESSION['level']=="rakyat"){
// 	header("location:login.php");
// }else {
include ('kon.php');
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
	<head>
		<meta charset="utf-8">
		<title></title>
		<link href="css/site.css" rel="stylesheet">
		<link href="css/bootstrap.min.css" rel="stylesheet">
		<link href="css/fontawesome.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
		<script src="chartjs/Chart.bundle.js"></script>
		<script src="http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
	</head>
	<body>
		<div class="container">
		<div class="content" style="padding:5px !important;">
<h3>Data pegawai &raquo; tambah Data </h3>
		<hr />
		<?php

	//Proses Simpan Data
	if(isset($_POST['add'])){
		$nama				= $_POST['nama'];
		$nip				= $_POST['nip'];
		$alamat				= $_POST['alamat'];
		$ekstensi_diperbolehkan	= array('png','jpg','jpeg');
		//upload foto
			$foto		= $_FILES['foto']['name'];
			$x_foto = explode('.', $foto);
			$ekstensi_foto = strtolower(end($x_foto));
			$ukuran_foto	= $_FILES['foto']['size'];
			$file_tmp_foto = $_FILES['foto']['tmp_name'];

			if (in_array($ekstensi_foto, $ekstensi_diperbolehkan) === true) {
				if ($ukuran_foto < (2*1024*1024)) {
					move_uploaded_file($file_tmp_foto, 'img/'.$foto);
					//insert to database
					$insert = mysqli_query($koneksi, "INSERT INTO t_pegawai(nip,nama, alamat, foto)
					VALUES('$nip', '$nama', '$alamat', '$foto')") or die (mysqli_error ($koneksi));
					// var_dump($insert);
					// die();
					if($insert){
						echo '<div class="alert alert-success alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Surat berhasil disimpan.</div>
						<meta http-equiv="refresh" content="3; url=pegawai_data.php"/>';
					}else{
						echo '<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Ups, Surat Gagal Disimpan!</div>';
					}
					}else{
						echo '<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Ukuran File Terlalu Besar!</div>';
					}
					}else{
					echo '<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Hanya mengizinkan upload file "png/jpg/jpeg"!</div>';
					}
		//end foto

		}
	?>

	<form class="form-horizontal" action="" method="post" enctype="multipart/form-data">
		<div class="row">
			<div class="col">
				<div class="form-group">
					<label class=" control-label">Nama</label>
					<input type="text" name="nama" value="" class="form-control"
					placeholder="Nama" required>
				</div>
				<div class="form-group">
					<label class=" control-label">nip</label>
					<input type="text" name="nip" value="" class="form-control"placeholder="nip" required>
				</div>
				<div class="form-group">
					<label class="control-label">Alamat</label>
					<input type="textarea" name="alamat" value="" class="form-control" placeholder="Alamat"></required>
					<textarea name="alamat" class="form-control rounded-0" id="exampleFormControlTextarea1" rows="10"></textarea>
				</div>
				<div class="form-group">
					<label class="control-label">foto (JPG,JPEG)</label>
					<input type="file" name="foto"  value="" class="form-control" >
				</div>
				<div class="form-group">
					<button type="submit" name="add" class="btn
					btn-primary" value="Simpan">Simpan</button>
					<a class="btn btn-danger" href="pegawai_data.php">Kembali</a>
				</div>
			</div>
		</form>
<?php include "footer.php"; ?>
