<?php
session_start();
//cek apakah yang mengakses halaman ini sudah login
if($_SESSION['level']=="" || $_SESSION['level']=="admin"){
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
		$no_surat		= $_POST['no_surat'];
		$nama				= $row['nama'];
		$nik				= $row['nik'];
    // $tanggal			= $row['tgl_lhr'];
    // $tempat_lhr		  = $row['tempat_lhr'];
		// $jk		          = $row['jk'];
		$no_kk 	    		= $_POST['nomor_kk'];
		$kode_pos  	    = $_POST['kode_pos'];
		$keterangan			= $_POST['keterangan'];
		print_r($_POST);
		$alamat			    = $row['alamat'];
		$status_surat		= 'diproses';
		$ekstensi_diperbolehkan	= array('png','jpg','jpeg');
		//upload surat pengantar
			$s_pengantar		= $_FILES['s_pengantar']['name'];
			$x = explode('.', $s_pengantar);
			$ekstensi_pengantar = strtolower(end($x));
			$ukuran_pengantar	= $_FILES['s_pengantar']['size'];
			$file_tmp_pengantar = $_FILES['s_pengantar']['tmp_name'];
		//end pengantar
		//upload ktp
			$s_kk		= $_FILES['s_kk']['name'];
			$x_kk = explode('.', $s_kk);
			$ekstensi_kk = strtolower(end($x_kk));
			$ukuran_kk	= $_FILES['s_kk']['size'];
			$file_tmp_kk = $_FILES['s_kk']['tmp_name'];
		//end ktp
		//upload kk
			$s_foto					= $_FILES['s_foto']['name'];
			$x_foto = explode('.', $s_foto);
			$ekstensi_foto = strtolower(end($x_foto));
			$ukuran_foto	= $_FILES['s_foto']['size'];
			$file_tmp_foto = $_FILES['s_foto']['tmp_name'];
		//end kk
		if(in_array($ekstensi_pengantar, $ekstensi_diperbolehkan) === true){
			if($ukuran_pengantar < (2*1024*1024)){
				if (in_array($ekstensi_kk, $ekstensi_diperbolehkan) === true) {
					if ($ukuran_kk < (2*1024*1024)) {
						if (in_array($ekstensi_foto, $ekstensi_diperbolehkan) === true) {
							if ($ukuran_foto < (2*1024*1024)) {
								move_uploaded_file($file_tmp_pengantar, '../img/'.$s_pengantar);
								move_uploaded_file($file_tmp_kk, '../img/'.$s_kk);
								move_uploaded_file($file_tmp_foto, '../img/'.$s_foto);
								//insert to database
								$insert = mysqli_query($koneksi, "INSERT INTO surat_ektp(no_surat,nama, nik,kode_pos,keterangan,nomor_kk,alamat,s_pengantar,s_kk,s_foto,status_surat)
								VALUES('$no_surat','$nama','$nik','$kode_pos', '$keterangan', '$no_kk','$alamat','$s_pengantar','$s_kk','$s_foto','$status_surat')") or die (mysqli_error ($koneksi));
								if($insert){
									echo '<div class="alert alert-success alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Surat berhasil disimpan.</div>
									<meta http-equiv="refresh" content="5; url=surat_ektp.php"/>';
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
		<form class="form-horizontal" action="surat_ektp_tambah.php?nik=<?php echo $nik; ?>" method="post" enctype="multipart/form-data">
  <div class="row">
			</div>
    <div class="col">
			<?php
				$sqli = mysqli_query($koneksi, "SELECT * FROM surat_ektp");
				$jml = mysqli_num_rows($sqli);
				$nos = $jml+1;
			?>
			<div class="form-group">
				<label class="control-label">No Surat</label>
				<input type="text" name="no_surat" value="e<?php echo date('Y-m-d'); ?>/<?php echo $nos; ?>" class="form-control" readonly="true"></required>
			</div>
			<div class="form-group">
				<label class="control-label">Nomor KK</label>
				<input type="text" name="nomor_kk"  value="<?php echo $row['no_kk']; ?>" class="form-control" readonly='true'>
			</div>
			<div class="form-group">
				<label class="control-label">Kode Pos</label>
				<input type="text" name="kode_pos" value="" class="form-control" placeholder="kode pos"></required>
			</div>
			<div class="form-group">
			<label class=" control-label">Keterangan</label>
				<select name="keterangan" class="form-control">
					<option value="">------------</option>
					<option value="Perpanjang">Perpanjang</option>
					<option value="Baru">  Baru</option>
				</select>
			</div>
			<div class="form-group">
				<label class="control-label">Surat Pengantar (JPG,JPEG)</label>
				<input type="file" name="s_pengantar"  value="" class="form-control" placeholder="surat pengantar" required>
			</div>
			<div class="form-group">
				<label class="control-label">Kartu Keluarga (JPG,JPEG)</label>
				<input type="file" name="s_kk"  value="" class="form-control" placeholder="surat pengantar">
			</div>
			<div class="form-group">
				<label class="control-label">Pas Photo (JPG,JPEG)</label>
				<input type="file" name="s_foto"  value="" class="form-control" placeholder="foto">
			</div>
			<div class="form-group">
				<button type="submit" name="add" class="btn
				btn-primary" value="Simpan">Simpan</button>
				<a class="btn btn-danger" href="surat_domisili.php">Kembali</a>
		</div>
  </div>
</form>


<?php include "footer.php"; }?>
