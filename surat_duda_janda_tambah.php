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
		$nama				= $row['nama'];
		$tempat_lahir				= $row['tempat_lhr'];
		$tanggal_lahir				= $row['tgl_lhr'];
		$jenis_kelamin	= $row['jk'];
		$status				= $_POST['status'];
		$negara				= $_POST['negara'];
		$det_status				= $_POST['det_status'];
		$agama				= $row['agama'];
		$pekerjaan				= $row['pekerjaan'];
		$alamat				= $row['alamat'];
		$rt_rw				= $row['rt_rw'];
		$mantan				= $_POST['mantan'];
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
		//upload surat kematian
			$s_kematian		= $_FILES['s_kematian']['name'];
			$x = explode('.', $s_kematian);
			$ekstensi_kematian = strtolower(end($x));
			$ukuran_kematian	= $_FILES['s_kematian']['size'];
			$file_tmp_kematian = $_FILES['s_kematian']['tmp_name'];
		//end kematian
		//upload surat rs
			// $s_rs		= $_FILES['s_rs']['name'];
			// $x = explode('.', $s_rs);
			// $ekstensi_rs = strtolower(end($x));
			// $ukuran_rs	= $_FILES['s_rs']['size'];
			// $file_tmp_rs = $_FILES['s_rs']['tmp_name'];
		//end rs
		//upload surat pbb
			$s_pbb		= $_FILES['s_pbb']['name'];
			$x = explode('.', $s_pbb);
			$ekstensi_pbb = strtolower(end($x));
			$ukuran_pbb	= $_FILES['s_pbb']['size'];
			$file_tmp_pbb = $_FILES['s_pbb']['tmp_name'];
		//end pbb
		//upload surat cerai
			$s_cerai		= $_FILES['s_cerai']['name'];
			$x = explode('.', $s_cerai);
			$ekstensi_cerai = strtolower(end($x));
			$ukuran_cerai	= $_FILES['s_cerai']['size'];
			$file_tmp_cerai = $_FILES['s_cerai']['tmp_name'];
		//end cerai
		//upload surat ktp_saksi2
			// $s_ktp_saksi2		= $_FILES['s_ktp_saksi2']['name'];
			// $x = explode('.', $s_ktp_saksi2);
			// $ekstensi_ktp_saksi2 = strtolower(end($x));
			// $ukuran_ktp_saksi2	= $_FILES['s_ktp_saksi2']['size'];
			// $file_tmp_ktp_saksi2 = $_FILES['s_ktp_saksi2']['tmp_name'];
		//end cerai
		if(in_array($ekstensi_pengantar, $ekstensi_diperbolehkan) === true){
			if($ukuran_pengantar < (2*1024*1024)){
				if (in_array($ekstensi_ktp, $ekstensi_diperbolehkan) === true) {
					if ($ukuran_ktp < (2*1024*1024)) {
						if (in_array($ekstensi_kk, $ekstensi_diperbolehkan) === true) {
							if ($ukuran_kk < (2*1024*1024)) {
								move_uploaded_file($file_tmp_pengantar, 'img/'.$s_pengantar);
								move_uploaded_file($file_tmp_ktp, 'img/'.$s_ktp);
								move_uploaded_file($file_tmp_kk, 'img/'.$s_kk);
								move_uploaded_file($file_tmp_kematian, 'img/'.$s_kematian);
								//move_uploaded_file($file_tmp_rs, 'img/'.$s_rs);
								move_uploaded_file($file_tmp_pbb, 'img/'.$s_pbb);
								move_uploaded_file($file_tmp_cerai, 'img/'.$s_cerai);
								//move_uploaded_file($file_tmp_ktp_saksi2, 'img/'.$s_ktp_saksi2);
								//insert to database
								$insert = mysqli_query($koneksi, "INSERT INTO surat_duda_janda( nik,nama,tempat_lhr,tgl_lhr,jk,status,negara,det_status,agama,pekerjaan,alamat,rt_rw,mantan,s_kk,s_ktp,s_pengantar,s_kematian,s_pbb,s_cerai,status_surat)
								VALUES('$nik','$nama','$tempat_lahir','$tanggal_lahir','$jenis_kelamin','$status','$negara','$det_status','$agama','$pekerjaan','$alamat','$rt_rw','$mantan','$s_kk','$s_ktp','$s_pengantar','$s_kematian','$s_pbb','$s_cerai','$status_surat')") or die (mysqli_error ($koneksi));

								if($insert){
									echo '<div class="alert alert-success alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Surat berhasil disimpan.</div>
									<meta http-equiv="refresh" content="5; url=surat_duda_janda.php"/>';
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
			<?php
				$no_kk = $row['no_kk'];
				if ($row['status_keluarga']=='Suami') {
					$sqli = mysqli_query($koneksi, "SELECT * FROM t_penduduk WHERE no_kk='$no_kk' AND status_keluarga='Isteri'");
					$rowi = mysqli_fetch_assoc($sqli);
					$namai = $rowi['nama'];
				}elseif ($row['status_keluarga']=='Isteri') {
					$sqli = mysqli_query($koneksi, "SELECT * FROM t_penduduk WHERE no_kk='$no_kk' AND status_keluarga='Suami'");
					$rowi = mysqli_fetch_assoc($sqli);
					$namai = $rowi['nama'];
				}else {
					echo '<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Anda belum menikah(Tidak dapat membuat surat cerai)</div>
					<meta http-equiv="refresh" content="3; url=surat_duda_janda.php"/>';
					$namai = '';
				}
			?>
		<h2>Data Surat duda_janda &raquo; Tambah Data</h2>
		<hr />
		<form class="form-horizontal" action="surat_duda_janda_tambah.php?nik=<?php echo $nik; ?>" method="post" enctype="multipart/form-data">
  <div class="row">
			</div>
    <div class="col">
		<!--
		<div class="form-group">
			<label class="control-label">Agama</label>
			<input type="text" name="agama" value="" class="form-control" placeholder="agama"></required>
		</div>
		<div class="form-group">
			<label class="control-label">Pekerjaan</label>
			<input type="text" name="pekerjaan"  value="" class="form-control" placeholder="perkerjaan" required>
		</div>
		-->
		<div class="form-group row">
			<div class="col-xs-3">
				<label class="control-label"> &nbsp &nbsp </label>
			</div>
			<div class="col-xs-2">
			<label class=" control-label">Status</label>
				<select name="status" class="form-control">
					<option value="">------------</option>
					<option value="Duda">Duda</option>
					<option value="Janda">Janda</option>
				</select>
			</div>
			<div class="col-xs-3">
				<label class="control-label"> &nbsp</label>
			</div>
			<div class="col-xs-3">
				<label class="control-label"> &nbsp</label></br>
				<input type="radio" name="det_status" value="Hidup">Hidup
				<input type="radio" name="det_status" value="Mati">Mati
			</div>
		</div>
		<div class="form-group">
			<label class="control-label">Negara</label>
			<input type="text" name="negara"  value="" class="form-control" placeholder="negara" required>
		</div>
		<div class="form-group">
			<label class="control-label">RT/RW</label>
			<input type="text" name="rt_rw"  value="" class="form-control" placeholder="rt rw" required>
		</div>
		<div class="form-group">
			<label class="control-label">Nama Mantan</label>
			<input type="text" readonly="true" name="mantan"  value='<?php echo $namai ?>' class="form-control" required>
		</div>
			<div class="form-group">
				<label class="control-label">pengantar (JPG,JPEG)</label>
				<input type="file" name="s_pengantar"  value="" class="form-control" placeholder="surat pengantar" required>
			</div>
			<div class="form-group">
				<label class="control-label">ktp (JPG,JPEG)</label>
				<input type="file" name="s_ktp"  value="" class="form-control" >
			</div>
			<div class="form-group">
				<label class="control-label">Kartu Keluarga (JPG,JPEG)</label>
				<input type="file" name="s_kk"  value="" class="form-control">
			</div>
			<div class="form-group">
				<label class="control-label">Surat kematian (JPG,JPEG)</label>
				<input type="file" name="s_kematian"  value="" class="form-control">
			</div>
			<div class="form-group">
				<label class="control-label">Lunas PBB (JPG,JPEG)</label>
				<input type="file" name="s_pbb"  value="" class="form-control" >
			</div>
			<div class="form-group">
				<label class="control-label">Surat Cerai (JPG,JPEG)</label>
				<input type="file" name="s_cerai"  value="" class="form-control" >
			</div>
			<div class="form-group">
				<button type="submit" name="add" class="btn
				btn-primary" value="Simpan">Simpan</button>
				<a class="btn btn-danger" href="surat_duda_janda.php">Kembali</a>
		</div>
  </div>
</form>


<?php include "footer.php"; }?>
