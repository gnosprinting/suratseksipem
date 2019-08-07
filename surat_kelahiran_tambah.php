<?php
session_start();
//cek apakah yang mengakses halaman ini sudah login
if($_SESSION['level']=="" || $_SESSION['level']=="rakyat"){
	header("location:login.php");
}else {
include ('header.php');
include('lib/hari.php');
?>
<?php
	$nik = $_GET ['nik'];
	$sql = mysqli_query($koneksi, "SELECT * FROM t_penduduk WHERE nik='$nik'");
	if (mysqli_num_rows($sql)==0) {
	?>
		<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>NIK Tidak Ada..!</div>
		<meta http-equiv='refresh' content='1; url=surat_kelahiran.php'/>
	<?php
	}else{
		$row = mysqli_fetch_assoc($sql);
	}
	//Proses Simpan Data
	if(isset($_POST['add'])){
		print_r($_POST);
		$nik				= $row['nik'];
		$alamat			    = $row['alamat'];
		$nama_ayah				= $row['nama'];
		$hari		    	= $_POST['hari'];
		$tanggal			= $_POST['tanggal'];
		$lokasi			= $_POST['lokasi'];
		$jk			= $_POST['jk'];
		$nama_anak			= $_POST['nama_anak'];
		$nama_ibu			= $_POST['nama_ibu'];

		$status_surat		= 'baru';
		$ekstensi_diperbolehkan	= array('png','jpg','jpeg');
		//upload surat ktp_isteri
			$s_ktp_isteri		= $_FILES['s_ktp_isteri']['name'];
			$x = explode('.', $s_ktp_isteri);
			$ekstensi_ktp_isteri = strtolower(end($x));
			$ukuran_ktp_isteri	= $_FILES['s_ktp_isteri']['size'];
			$file_tmp_ktp_isteri = $_FILES['s_ktp_isteri']['tmp_name'];
		//end ktp_isteri
		//upload ktp_suami
			$s_ktp_suami		= $_FILES['s_ktp_suami']['name'];
			$x_ktp_suami = explode('.', $s_ktp_suami);
			$ekstensi_ktp_suami = strtolower(end($x_ktp_suami));
			$ukuran_ktp_suami	= $_FILES['s_ktp_suami']['size'];
			$file_tmp_ktp_suami = $_FILES['s_ktp_suami']['tmp_name'];
		//end ktp_suami
		//upload kk
			$s_kk					= $_FILES['s_kk']['name'];
			$x_kk = explode('.', $s_kk);
			$ekstensi_kk = strtolower(end($x_kk));
			$ukuran_kk	= $_FILES['s_kk']['size'];
			$file_tmp_kk = $_FILES['s_kk']['tmp_name'];
		//end kk
		//upload surat kartu_lahir
			$s_kartu_lahir		= $_FILES['s_kartu_lahir']['name'];
			$x = explode('.', $s_kartu_lahir);
			$ekstensi_kartu_lahir = strtolower(end($x));
			$ukuran_kartu_lahir	= $_FILES['s_kartu_lahir']['size'];
			$file_tmp_kartu_lahir = $_FILES['s_kartu_lahir']['tmp_name'];
		//end kartu_lahir
		//upload surat akta_kakak
			$s_akta_kakak		= $_FILES['s_akta_kakak']['name'];
			$x = explode('.', $s_akta_kakak);
			$ekstensi_akta_kakak = strtolower(end($x));
			$ukuran_akta_kakak	= $_FILES['s_akta_kakak']['size'];
			$file_tmp_akta_kakak = $_FILES['s_akta_kakak']['tmp_name'];
		//end akta_kakak
		//upload surat akta_ibu
			$s_akta_ibu		= $_FILES['s_akta_ibu']['name'];
			$x = explode('.', $s_akta_ibu);
			$ekstensi_akta_ibu = strtolower(end($x));
			$ukuran_akta_ibu	= $_FILES['s_akta_ibu']['size'];
			$file_tmp_akta_ibu = $_FILES['s_akta_ibu']['tmp_name'];
		//end akta_ibu
		//upload surat akta_ayah
			$s_akta_ayah		= $_FILES['s_akta_ayah']['name'];
			$x = explode('.', $s_akta_ayah);
			$ekstensi_akta_ayah = strtolower(end($x));
			$ukuran_akta_ayah	= $_FILES['s_akta_ayah']['size'];
			$file_tmp_akta_ayah = $_FILES['s_akta_ayah']['tmp_name'];
		//end akta_ayah
		if(in_array($ekstensi_ktp_isteri, $ekstensi_diperbolehkan) === true){
			if($ukuran_ktp_isteri < (2*1024*1024)){
				if (in_array($ekstensi_ktp_suami, $ekstensi_diperbolehkan) === true) {
					if ($ukuran_ktp_suami < (2*1024*1024)) {
						if (in_array($ekstensi_kk, $ekstensi_diperbolehkan) === true) {
							if ($ukuran_kk < (2*1024*1024)) {
								move_uploaded_file($file_tmp_ktp_isteri, 'img/'.$s_ktp_isteri);
								move_uploaded_file($file_tmp_ktp_suami, 'img/'.$s_ktp_suami);
								move_uploaded_file($file_tmp_kk, 'img/'.$s_kk);
								move_uploaded_file($file_tmp_kartu_lahir, 'img/'.$s_kartu_lahir);
								move_uploaded_file($file_tmp_akta_kakak, 'img/'.$s_akta_kakak);
								move_uploaded_file($file_tmp_akta_ibu, 'img/'.$s_akta_ibu);
								move_uploaded_file($file_tmp_akta_ayah, 'img/'.$s_akta_ayah);
								//insert to database
								$insert = mysqli_query($koneksi, "INSERT INTO surat_kelahiran( nik,hari,tanggal,lokasi,jk,nama_anak,nama_ibu,alamat,nama_ayah,s_kk,s_ktp_suami,s_ktp_isteri,kartu_lahir,akta_kakak,akta_ibu,akta_ayah,status_surat)
								VALUES('$nik','$hari','$tanggal','$lokasi','$jk','$nama_anak','$nama_ibu','$alamat','$nama_ayah','$s_kk','$s_ktp_suami','$s_ktp_isteri','$s_kartu_lahir','$s_akta_kakak','$s_akta_ibu','$s_akta_ayah','$status_surat')") or die (mysqli_error ($koneksi));
								if($insert){
									echo '<div class="alert alert-success alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Surat berhasil disimpan.</div>
									<meta http-equiv="refresh" content="5; url=surat_kelahiran.php"/>';
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
		<form class="form-horizontal" action="surat_kelahiran_tambah.php?nik=<?php echo $nik; ?>" method="post" enctype="multipart/form-data">
  <div class="row">
			</div>
    <div class="col">
			<div class="form-group">
				<label class="control-label">hari</label>
				<input type="text" name="hari" value="<?php echo hari_ini(); ?>" class="form-control" placeholder="hari"></required>
			</div>
			<div class="form-group">
				<label class=" control-label">Tanggal</label>
				<input type="date" name="tanggal" value="<?php echo  ?>" class="input-group form-control" required>
		  </div>
			<div class="form-group">
				<label class=" control-label">Lokasi</label>
				<input type="text" name="lokasi" value="" class="form-control">
			</div>
				<div class="form-group">
					<label class="control-label">Jenis Kelamin</label>
					<div class="">
						<input type="radio" name="jk" value="Laki laki">Laki Laki
						<input type="radio" name="jk" value="Perempuan">Perempuan
						</div>
				</div>
				<div class="form-group">
					<label class="control-label">Nama Anak</label>
					<input type="text" name="nama_anak" value="" class="form-control" placeholder="nama anak"></required>
				</div>
				<div class="form-group">
					<label class="control-label">Nama Ayah</label>
					<input type="text" name="nama_ayah"  value="<?php echo $row['nama'] ?>" class="form-control" placeholder="nama ayah" disabled>
			</div>
			<div class="form-group">
					<label class="control-label">alamat</label>
					<input type="text" name="alamat"  value="<?php echo $row['alamat'] ?>" class="form-control" placeholder="alamat" disabled>
			</div>
			<?php
				$no_kk = $row['no_kk'];
				$sqli = mysqli_query($koneksi, "SELECT * FROM t_penduduk WHERE no_kk='$no_kk' AND status_keluarga='Isteri'");
				$rowi = mysqli_fetch_assoc($sqli);
			?>
			<div class="form-group">
					<label class=" control-label">Nama Ibu</label>
					<input type="text" readonly="true" name="nama_ibu" value="<?php echo $rowi['nama']?>" class="form-control" ></required>
				</div>
			<div class="form-group">
				<label class="control-label">ktp_isteri (JPG,JPEG)</label>
				<input type="file" name="s_ktp_isteri"  value="" class="form-control" placeholder="surat ktp_isteri" required>
			</div>
			<div class="form-group">
				<label class="control-label">ktp_suami (JPG,JPEG)</label>
				<input type="file" name="s_ktp_suami"  value="" class="form-control" placeholder="surat ktp_isteri">
			</div>
			<div class="form-group">
				<label class="control-label">Kartu Keluarga (JPG,JPEG)</label>
				<input type="file" name="s_kk"  value="" class="form-control" placeholder="surat ktp_isteri">
			</div>
			<div class="form-group">
				<label class="control-label">Kartu Lahir (JPG,JPEG)</label>
				<input type="file" name="s_kartu_lahir"  value="" class="form-control" placeholder="kartu lahir">
			</div>
			<div class="form-group">
				<label class="control-label">Akta Kakak (JPG,JPEG)</label>
				<input type="file" name="s_akta_kakak"  value="" class="form-control" placeholder="akta kakak">
			</div>
			<div class="form-group">
				<label class="control-label">Akta Ibu (JPG,JPEG)</label>
				<input type="file" name="s_akta_ibu"  value="" class="form-control" placeholder="akta ibu">
			</div>
			<div class="form-group">
				<label class="control-label">Akta Ayah (JPG,JPEG)</label>
				<input type="file" name="s_akta_ayah"  value="" class="form-control" placeholder="akta ayah">
			</div>
			<div class="form-group">
				<button type="submit" name="add" class="btn
				btn-primary" value="Simpan">Simpan</button>
				<a class="btn btn-danger" href="surat_kelahiran.php">Kembali</a>
		</div>
  </div>
</form>
<?php include "footer.php"; }?>
