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
		print_r($_POST);
		$nik				= $row['nik'];
		$alamat			    = $row['alamat'];
		$nama	    	= $_POST['nama'];
		$nik_mati			= $_POST['nik_mati'];
		$jk			= $_POST['jk'];
		$umur			= $_POST['umur'];
		$anak_ke			= $_POST['anak_ke'];
		$hari_meninggal= $_POST['hari_meninggal'];
		$tanggal			= $_POST['tanggal'];
		$jam			= $_POST['jam'];
		$lokasi			= $_POST['lokasi'];
		$penyebab		= $_POST['penyebab'];
		$status_surat		= 'baru';
		$ekstensi_diperbolehkan	= array('png','jpg','jpeg');
		//upload surat pengantar
			$s_pengantar		= $_FILES['s_pengantar']['name'];
			$x = explode('.', $s_pengantar);
			$ekstensi_pengantar = strtolower(end($x));
			$ukuran_pengantar	= $_FILES['s_pengantar']['size'];
			$file_tmp_pengantar = $_FILES['s_pengantar']['tmp_name'];
		//end pengantar
		//upload ktp_pelapor
			$s_ktp_pelapor		= $_FILES['s_ktp_pelapor']['name'];
			$x_ktp_pelapor = explode('.', $s_ktp_pelapor);
			$ekstensi_ktp_pelapor = strtolower(end($x_ktp_pelapor));
			$ukuran_ktp_pelapor	= $_FILES['s_ktp_pelapor']['size'];
			$file_tmp_ktp_pelapor = $_FILES['s_ktp_pelapor']['tmp_name'];
		//end ktp_pelapor
		//upload kk
			$s_kk					= $_FILES['s_kk']['name'];
			$x_kk = explode('.', $s_kk);
			$ekstensi_kk = strtolower(end($x_kk));
			$ukuran_kk	= $_FILES['s_kk']['size'];
			$file_tmp_kk = $_FILES['s_kk']['tmp_name'];
		//end kk
		//upload surat ktp_mati
			$s_ktp_mati		= $_FILES['s_ktp_mati']['name'];
			$x = explode('.', $s_ktp_mati);
			$ekstensi_ktp_mati = strtolower(end($x));
			$ukuran_ktp_mati	= $_FILES['s_ktp_mati']['size'];
			$file_tmp_ktp_mati = $_FILES['s_ktp_mati']['tmp_name'];
		//end ktp_mati
		//upload surat rs
			$s_rs		= $_FILES['s_rs']['name'];
			$x = explode('.', $s_rs);
			$ekstensi_rs = strtolower(end($x));
			$ukuran_rs	= $_FILES['s_rs']['size'];
			$file_tmp_rs = $_FILES['s_rs']['tmp_name'];
		//end rs
		//upload surat pbb
			$s_pbb		= $_FILES['s_pbb']['name'];
			$x = explode('.', $s_pbb);
			$ekstensi_pbb = strtolower(end($x));
			$ukuran_pbb	= $_FILES['s_pbb']['size'];
			$file_tmp_pbb = $_FILES['s_pbb']['tmp_name'];
		//end pbb
		//upload surat ktp_saksi1
			$s_ktp_saksi1		= $_FILES['s_ktp_saksi1']['name'];
			$x = explode('.', $s_ktp_saksi1);
			$ekstensi_ktp_saksi1 = strtolower(end($x));
			$ukuran_ktp_saksi1	= $_FILES['s_ktp_saksi1']['size'];
			$file_tmp_ktp_saksi1 = $_FILES['s_ktp_saksi1']['tmp_name'];
		//end ktp_saksi1
		//upload surat ktp_saksi2
			$s_ktp_saksi2		= $_FILES['s_ktp_saksi2']['name'];
			$x = explode('.', $s_ktp_saksi2);
			$ekstensi_ktp_saksi2 = strtolower(end($x));
			$ukuran_ktp_saksi2	= $_FILES['s_ktp_saksi2']['size'];
			$file_tmp_ktp_saksi2 = $_FILES['s_ktp_saksi2']['tmp_name'];
		//end ktp_saksi1
		if(in_array($ekstensi_pengantar, $ekstensi_diperbolehkan) === true){
			if($ukuran_pengantar < (2*1024*1024)){
				if (in_array($ekstensi_ktp_pelapor, $ekstensi_diperbolehkan) === true) {
					if ($ukuran_ktp_pelapor < (2*1024*1024)) {
						if (in_array($ekstensi_kk, $ekstensi_diperbolehkan) === true) {
							if ($ukuran_kk < (2*1024*1024)) {
								move_uploaded_file($file_tmp_pengantar, 'img/'.$s_pengantar);
								move_uploaded_file($file_tmp_ktp_pelapor, 'img/'.$s_ktp_pelapor);
								move_uploaded_file($file_tmp_kk, 'img/'.$s_kk);
								move_uploaded_file($file_tmp_ktp_mati, 'img/'.$s_ktp_mati);
								move_uploaded_file($file_tmp_rs, 'img/'.$s_rs);
								move_uploaded_file($file_tmp_pbb, 'img/'.$s_pbb);
								move_uploaded_file($file_tmp_ktp_saksi1, 'img/'.$s_ktp_saksi1);
								move_uploaded_file($file_tmp_ktp_saksi2, 'img/'.$s_ktp_saksi2);
								//insert to database
								$insert = mysqli_query($koneksi, "INSERT INTO surat_kematian( nik,nama,nik_mati,jk,alamat,umur,anak_ke,hari_meninggal,tanggal,jam,lokasi,penyebab,s_kk,s_ktp_pelapor,s_pengantar,s_ktp_mati,s_rs,s_pbb,ktp_saksi1,ktp_saksi2,status_surat)
								VALUES('$nik','$nama','$nik_mati','$jk','$alamat','$umur','$anak_ke','$hari_meninggal','$tanggal','$jam','$lokasi','$penyebab','$s_kk','$s_ktp_pelapor','$s_pengantar','$s_ktp_mati','$s_rs','$s_pbb','$s_ktp_saksi1','$s_ktp_saksi2','$status_surat')") or die (mysqli_error ($koneksi));

								if($insert){
									echo '<div class="alert alert-success alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Surat berhasil disimpan.</div>
									<meta http-equiv="refresh" content="5; url=surat_kematian.php"/>';
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
		<h2>Data Surat kematian &raquo; Tambah Data</h2>
		<hr />
		<form class="form-horizontal" action="surat_kematian_tambah.php?nik=<?php echo $nik; ?>" method="post" enctype="multipart/form-data">
  <div class="row">
			</div>
    <div class="col">
		<div class="form-group">
			<label class=" control-label">Nama Mati</label>
			<input type="text" name="nama" value="" class="form-control"
						placeholder="nama" required>
				</div>
				<div class="form-group">
					<label class=" control-label">NIK Mati</label>
					<input type="number" name="nik_mati" value="" class="form-control"
								placeholder="nik mati" required>
						</div>
						<div class="form-group">
							<label class="control-label">Jenis Kelamin</label>
							<div class="">
								<input type="radio" name="jk" value="Laki laki">Laki Laki
								<input type="radio" name="jk" value="Perempuan">Perempuan
								</div>
						</div>
		<div class="form-group">
			<label class=" control-label">Umur</label>
			<input type="number" name="umur" value="" class="form-control"
						placeholder="umur" required>
				</div>
							<div class="form-group">
			<label class=" control-label">Anak ke -</label>
			<input type="number" name="anak_ke" value="" class="form-control"
						placeholder="anak ke" required>
				</div>
							<div class="form-group">
			<label class=" control-label">Hari Meninggal -</label>
			<input type="text" name="hari_meninggal" value="" class="form-control"
						placeholder="hari" required>
				</div>
		<div class="form-group">
			<label class=" control-label">Tanggal</label>
			<input type="date" name="tanggal" value="" class="input-group form-control" required>
							</div>
							<div class="form-group">
								<label class="control-label">Jam meninggal (WITA)</label>
								<input type="time" name="jam" value="" class="form-control" placeholder="contoh 11:00"></required>
							</div>
							<div class="form-group">
								<label class="control-label">Lokasi meninggal</label>
								<input type="text" name="lokasi"  value="" class="form-control" placeholder="lokasi" required>
						</div>
						<div class="form-group">
								<label class="control-label">Penyebab</label>
								<input type="text" name="penyebab"  value="" class="form-control" placeholder="penyebab" required>
						</div>
			<div class="form-group">
				<label class="control-label">pengantar (JPG,JPEG)</label>
				<input type="file" name="s_pengantar"  value="" class="form-control" placeholder="surat pengantar" required>
			</div>
			<div class="form-group">
				<label class="control-label">ktp_pelapor (JPG,JPEG)</label>
				<input type="file" name="s_ktp_pelapor"  value="" class="form-control" placeholder="surat pengantar">
			</div>
			<div class="form-group">
				<label class="control-label">Kartu Keluarga (JPG,JPEG)</label>
				<input type="file" name="s_kk"  value="" class="form-control" placeholder="surat pengantar">
			</div>
			<div class="form-group">
				<label class="control-label">KTP Mati (JPG,JPEG)</label>
				<input type="file" name="s_ktp_mati"  value="" class="form-control">
			</div>
			<div class="form-group">
				<label class="control-label">Keterangan Rumahsakit (JPG,JPEG)</label>
				<input type="file" name="s_rs"  value="" class="form-control">
			</div>
			<div class="form-group">
				<label class="control-label">Lunas PBB (JPG,JPEG)</label>
				<input type="file" name="s_pbb"  value="" class="form-control" >
			</div>
			<div class="form-group">
				<label class="control-label">KTP Saksi 1 (JPG,JPEG)</label>
				<input type="file" name="s_ktp_saksi1"  value="" class="form-control" >
			</div>
			<div class="form-group">
				<label class="control-label">KTP Saksi 2 (JPG,JPEG)</label>
				<input type="file" name="s_ktp_saksi2"  value="" class="form-control" >
			</div>
			<div class="form-group">
				<button type="submit" name="add" class="btn
				btn-primary" value="Simpan">Simpan</button>
				<a class="btn btn-danger" href="surat_kematian.php">Kembali</a>
		</div>
  </div>
</form>
<?php include "footer.php"; }?>
