<?php
session_start();
//cek apakah yang mengakses halaman ini sudah login
if($_SESSION['level']=="" || $_SESSION['level']=="rakyat"){
	header("location:login.php");
}else {
include ('header.php');
?>
<?php
	$nik = $_GET ['nik'];
	$sql = mysqli_query($koneksi, "SELECT * FROM t_penduduk WHERE nik='$nik'");
	if (mysqli_num_rows($sql)==0) {
	?>
		<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>NIK Tidak Ada..!</div>
	<?php
	}else{
		$row = mysqli_fetch_assoc($sql);
	}
	//Proses Simpan Data
	if(isset($_POST['add'])){
		//print_r($_FILES);
		$nama				= $row['nama'];
		$nik				= $row['nik'];
    $tanggal			= $row['tgl_lhr'];
    $tempat_lhr		  = $row['tempat_lhr'];
		$jk		          = $row['jk'];
		$agama		    	= $row['agama'];
		$pekerjaan			= $row['pekerjaan'];
		$status			= $row['status'];
		$keterangan					= $_POST['keterangan'];
		$tkp			= $_POST['tkp'];
		$alamat			    = $row['alamat'];
		$status_surat		= 'baru';
		$ekstensi_diperbolehkan	= array('png','jpg','jpeg');
		//upload surat pengantar
			$s_pengantar		= $_FILES['s_pengantar']['name'];
			$x = explode('.', $s_pengantar);
			$ekstensi_pengantar = strtolower(end($x));
			$ukuran_pengantar	= $_FILES['s_pengantar']['size'];
			$file_tmp_pengantar = $_FILES['s_pengantar']['tmp_name'];
		//end pengantar
		//upload ktp
			$s_ktp		= $_FILES['s_ktp']['name'];
			$x_ktp = explode('.', $s_ktp);
			$ekstensi_ktp = strtolower(end($x_ktp));
			$ukuran_ktp	= $_FILES['s_ktp']['size'];
			$file_tmp_ktp = $_FILES['s_ktp']['tmp_name'];
		//end ktp
		//upload kk
			$s_kk					= $_FILES['s_kk']['name'];
			$x_kk = explode('.', $s_kk);
			$ekstensi_kk = strtolower(end($x_kk));
			$ukuran_kk	= $_FILES['s_kk']['size'];
			$file_tmp_kk = $_FILES['s_kk']['tmp_name'];
		//end kk
		if(in_array($ekstensi_pengantar, $ekstensi_diperbolehkan) === true){
			if($ukuran_pengantar < (2*1024*1024)){
				if (in_array($ekstensi_ktp, $ekstensi_diperbolehkan) === true) {
					if ($ukuran_ktp < (2*1024*1024)) {
						if (in_array($ekstensi_kk, $ekstensi_diperbolehkan) === true) {
							if ($ukuran_kk < (2*1024*1024)) {
								move_uploaded_file($file_tmp_pengantar, '../img/'.$s_pengantar);
								move_uploaded_file($file_tmp_ktp, '../img/'.$s_ktp);
								move_uploaded_file($file_tmp_kk, '../img/'.$s_kk);
								//insert to database
								$insert = mysqli_query($koneksi, "INSERT INTO surat_kehilangan( nama, nik, tgl_lhr, tempat_lhr, jk,agama,pekerjaan,alamat,status,keterangan,tkp,s_pengantar,s_ktp,s_kk,status_surat)
								VALUES('$nama','$nik','$tanggal', '$tempat_lhr', '$jk','$agama','$pekerjaan', '$alamat','$status','$keterangan','$tkp','$s_pengantar','$s_ktp','$s_kk','$status_surat')") or die (mysqli_error ($koneksi));
								if($insert){
									echo '<div class="alert alert-success alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Surat berhasil disimpan.</div>
									<meta http-equiv="refresh" content="5; url=surat_kehilangan.php"/>';
								}else{
									echo '<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Ups, Surat Gagal Disimpan!</div>';
								}
							}else{
								echo '<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Ukuran File Terlalu Besar!</div>';
							}
						}else{
							echo '<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Hanya mengizinkan upload file "png/jpg/jpeg"!</div>';
						}
					}else{
						echo '<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Ukuran File Terlalu Besar!</div>';
					}
				}else{
					echo '<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Hanya mengizinkan upload file "png/jpg/jpeg"!</div>';
				}
			}else{
				echo '<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Ukuran File Terlalu Besar!</div>';
			}
		}else{
			echo '<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Hanya mengizinkan upload file "png/jpg/jpeg"!</div>';
		}
	}
	    ?>
		<h2>Data Surat Domisili &raquo; Tambah Data</h2>
		<hr />
		<form class="form-horizontal" action="surat_kehilangan_tambah.php?nik=<?php echo $nik; ?>" method="post" enctype="multipart/form-data">
  <div class="row">
			</div>
    <div class="col">
			<!-- <div class="form-group">
				<label class="control-label">Agama</label>
				<input type="text" name="agama" value="" class="form-control" placeholder="agama"></required>
			</div>
			<div class="form-group">
				<label class="control-label">Pekerjaan</label>
				<input type="text" name="pekerjaan"  value="" class="form-control" placeholder="perkerjaan" required>
			</div> -->
			<div class="form-group">
				<label class="control-label">Keterangan</label>
				<input type="text" name="keterangan"  value="" class="form-control" placeholder="keterangan" required>
			</div>
			<div class="form-group">
				<label class="control-label">Tempat Kejadian Perkara (TKP)</label>
				<input type="text" name="tkp"  value="" class="form-control" placeholder="tkp" required>
			</div>
			<div class="form-group">
				<label class="control-label">Surat Pengantar (JPG,JPEG)</label>
				<input type="file" name="s_pengantar"  value="" class="form-control" placeholder="surat pengantar" required>
			</div>
			<div class="form-group">
				<label class="control-label">KTP (JPG,JPEG)</label>
				<input type="file" name="s_ktp"  value="" class="form-control" placeholder="surat pengantar">
			</div>
			<div class="form-group">
				<label class="control-label">Kartu Keluarga (JPG,JPEG)</label>
				<input type="file" name="s_kk"  value="" class="form-control" placeholder="surat pengantar">
			</div>
			<div class="form-group">
				<button type="submit" name="add" class="btn
				btn-primary" value="Simpan">Simpan</button>
				<a class="btn btn-danger" href="surat_kehilangan.php">Kembali</a>
		</div>
  </div>
</form>


<script>
<?php include "footer.php"; }?>
