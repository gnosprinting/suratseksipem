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
		$nama						= $row['nama'];
		$nik						= $row['nik'];
    $tanggal				= $row['tgl_lhr'];
    $tempat_lhr		 	= $row['tempat_lhr'];
		$jk		          = $row['jk'];
		$alamat			    = $row['alamat'];
		$rt_rw			    = $row['rt_rw'];
		$pekerjaan			= $row['pekerjaan'];
		$nmr_surat		= $_POST['nmr_surat'];
		$tgl_surat		= $_POST['tgl_surat'];
		$jenis			= 2;
		$atas_nama			= $_POST['atas_nama'];
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
		//upload surat pernyataan
			$s_pernyataan		= $_FILES['s_pernyataan']['name'];
			$x = explode('.', $s_pernyataan);
			$ekstensi_pernyataan = strtolower(end($x));
			$ukuran_pernyataan	= $_FILES['s_pernyataan']['size'];
			$file_tmp_pernyataan = $_FILES['s_pernyataan']['tmp_name'];
		//end pernyataan
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
		//upload surat saksi1
			$s_saksi1		= $_FILES['s_saksi1']['name'];
			$x = explode('.', $s_saksi1);
			$ekstensi_saksi1 = strtolower(end($x));
			$ukuran_saksi1	= $_FILES['s_saksi1']['size'];
			$file_tmp_saksi1 = $_FILES['s_saksi1']['tmp_name'];
		//end saksi1
		//upload surat ktp_saksi2
			$s_ktp_saksi2		= $_FILES['s_ktp_saksi2']['name'];
			$x = explode('.', $s_ktp_saksi2);
			$ekstensi_ktp_saksi2 = strtolower(end($x));
			$ukuran_ktp_saksi2	= $_FILES['s_ktp_saksi2']['size'];
			$file_tmp_ktp_saksi2 = $_FILES['s_ktp_saksi2']['tmp_name'];
		//end saksi2
		if(in_array($ekstensi_pengantar, $ekstensi_diperbolehkan) === true){
			if($ukuran_pengantar < (2*1024*1024)){
				if (in_array($ekstensi_ktp, $ekstensi_diperbolehkan) === true) {
					if ($ukuran_ktp < (2*1024*1024)) {
						if (in_array($ekstensi_kk, $ekstensi_diperbolehkan) === true) {
							if ($ukuran_kk < (2*1024*1024)) {
								move_uploaded_file($file_tmp_pengantar, 'img/'.$s_pengantar);
								move_uploaded_file($file_tmp_ktp, 'img/'.$s_ktp);
								move_uploaded_file($file_tmp_kk, 'img/'.$s_kk);
								move_uploaded_file($file_tmp_pernyataan, 'img/'.$s_pernyataan);
								//move_uploaded_file($file_tmp_rs, 'img/'.$s_rs);
								move_uploaded_file($file_tmp_pbb, 'img/'.$s_pbb);
								move_uploaded_file($file_tmp_saksi1, 'img/'.$s_saksi1);
								move_uploaded_file($file_tmp_ktp_saksi2, 'img/'.$s_ktp_saksi2);
								//insert to database
								$insert = mysqli_query($koneksi, "INSERT INTO surat_tidakmampu( nik,nama,tempat_lhr,tgl_lhr,jk,pekerjaan,alamat,rt_rw,nmr_surat,tgl_surat,jenis,atas_nama,s_kk,s_ktp,s_pengantar,s_pernyataan,s_pbb,ktp_saksi1,ktp_saksi2,status_surat)
								VALUES('$nik','$nama','$tempat_lahir','$tanggal_lahir','$jenis_kelamin','$pekerjaan','$alamat','$rt_rw','$nmr_surat','$tgl_surat','$jenis','$atas_nama','$s_kk','$s_ktp','$s_pengantar','$s_pernyataan','$s_pbb','$s_saksi1','$s_ktp_saksi2','$status_surat')") or die (mysqli_error ($koneksi));

								if($insert){
									echo '<div class="alert alert-success alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Surat berhasil disimpan.</div>
									<meta http-equiv="refresh" content="5; url=surat_miskin.php"/>';
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
		<h2>Data Surat miskin &raquo; Tambah Data</h2>
		<hr />
		<form class="form-horizontal" action="surat_miskin_tambah.php?nik=<?php echo $nik; ?>" method="post" enctype="multipart/form-data">
  <div class="row">
			</div>
    <div class="col">
		<div class="form-group">
			<label class="control-label">Nomor Surat Pengantar RT</label>
			<input type="text" name="nmr_surat"  value="" class="form-control" placeholder="nomor surat pengantar" required>
		</div>
		<div class="form-group">
			<label class="control-label">Tanggal Surat Pengantar</label>
			<input type="date" name="tgl_surat"  value="" class="form-control" placeholder="tanggal surat" required>
		</div>
		<div class="form-group">
			<label class="control-label">Atas Nama</label>
			<input type="text" name="atas_nama"  value="" class="form-control" placeholder="atas nama" required>
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
				<label class="control-label">Surat pernyataan (JPG,JPEG)</label>
				<input type="file" name="s_pernyataan"  value="" class="form-control">
			</div>
			<div class="form-group">
				<label class="control-label">Lunas PBB (JPG,JPEG)</label>
				<input type="file" name="s_pbb"  value="" class="form-control" >
			</div>
			<div class="form-group">
				<label class="control-label">Surat saksi1 (JPG,JPEG)</label>
				<input type="file" name="s_saksi1"  value="" class="form-control" >
			</div>
			<div class="form-group">
				<label class="control-label">Surat saksi2 (JPG,JPEG)</label>
				<input type="file" name="s_ktp_saksi2"  value="" class="form-control" >
			</div>
			<div class="form-group">
				<label class="control-label">Surat Pengantar RT (JPG,JPEG)</label>
				<input type="file" name="s_pengantar"  value="" class="form-control" >
			</div>
			<div class="form-group">
				<button type="submit" name="add" class="btn
				btn-primary" value="Simpan">Simpan</button>
				<a class="btn btn-danger" href="surat_miskin.php">Kembali</a>
		</div>
  </div>
</form>


<?php include "footer.php"; }?>
