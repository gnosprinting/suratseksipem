<?php
session_start();
//cek apakah yang mengakses halaman ini sudah login
if($_SESSION['level']=="" || $_SESSION['level']=="admin"){
	header("location:login.php");
}else {
include ('header.php');
include ('../lib/hari_indo.php');
include ('../lib/umur.php');
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
		//print_r($_POST);
		$no_surat			= $_POST['no_surat'];
		$no_kk				= $row['no_kk'];

		$sqli = mysqli_query($koneksi, "SELECT * FROM v_kk WHERE nokk='$no_kk'");
		$rowi = mysqli_fetch_assoc($sqli);

		$nama_kepala_keluarga = $rowi['nama'];
		$alamat				= $row['alamat'];
		$rt_rw				= $row['rt_rw'];
		$dusun				= '-';
		$kelurahan 		= 'loktabat selatan';
		$kecamatan 		= 'banjarbaru selatan';
		$kota 				= 'banjarbaru';
		$provinsi 		= 'kalimantan selatan';
		$kd_pos				= '70714';
		$telepon 			= $_POST['telepon'];
		$nik 					= $row['nik'];
		$nama 				= $row['nama'];

		$status_no_kk	= $_POST['status_no_kk'];
		$no_kk_pindah	= $_POST['no_kk_pindah'];
		$nik_kepala_keluarga_pindah = $_POST['nik_kepala_keluarga_pindah'];
		$nama_kepala_keluarga_pindah= $_POST['nama_kepala_keluarga_pindah'];
		$tgl_kedatangan = date('Y-m-d');
		$alamat_pindah	= $_POST['alamat_pindah'];
		$rt_rw_pindah		= $_POST['rt_rw_pindah'];
		$dusun_pindah		= '-';
		$kelurahan_pindah = $_POST['kelurahan_pindah'];
		$kecamatan_pindah	= $_POST['kecamatan_pindah'];
		$kota_pindah			= $_POST['kota_pindah'];
		$provinsi_pindah	= $_POST['provinsi_pindah'];
		$status_surat	= 'diproses';
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
								$insert = mysqli_query($koneksi, "INSERT INTO surat_pindah(no_surat,no_kk,nama_kepala_keluarga,alamat,rt_rw,dusun,kelurahan,kecamatan,kota,provinsi,kd_pos,telepon,nik,nama,status_no_kk,no_kk_pindah,nik_kepala_keluarga_pindah,nama_kepala_keluarga_pindah,tgl_kedatangan,alamat_pindah,rt_rw_pindah,dusun_pindah,kelurahan_pindah,kecamatan_pindah,kota_pindah,provinsi_pindah,s_pengantar,s_kk,s_ktp,status_surat)
								VALUES('$no_surat','$no_kk','$nama_kepala_keluarga','$alamat','$rt_rw','$dusun','$kelurahan','$kecamatan','$kota','$provinsi','$kd_pos','$telepon','$nik','$nama','$status_no_kk','$no_kk_pindah','$nik_kepala_keluarga_pindah','$nama_kepala_keluarga_pindah','$tgl_kedatangan','$alamat_pindah'
								,'$rt_rw_pindah','$dusun_pindah','$kelurahan_pindah','$kecamatan_pindah','$kota_pindah','$provinsi_pindah','$s_pengantar','$s_kk','$s_ktp','$status_surat')") or die (mysqli_error ($koneksi));

								if($insert){
									echo '<div class="alert alert-success alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Surat berhasil disimpan.</div>
									<meta http-equiv="refresh" content="50; url=surat_pindah.php"/>';
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
		<h2>Data Surat Pindah &raquo; Tambah Data</h2>
		<hr />
		<form class="form-horizontal" action="surat_pindah_tambah.php?nik=<?php echo $nik; ?>" method="post" enctype="multipart/form-data">
  <div class="row">
			</div>
    <div class="col">
		<?php
			$sqli = mysqli_query($koneksi, "SELECT * FROM surat_pindah");
			$jml = mysqli_num_rows($sqli);
			$nos = $jml+1;
		?>
		<div class="form-group">
			<label class="control-label">No Surat</label>
			<input type="text" name="no_surat" value="470/<?php echo $nos; ?>" class="form-control" readonly="true"></required>
		</div>

		<div class="form-group">
			<label class=" control-label">Nomor Telepon</label>
			<input type="number" name="telepon" value="" class="form-control" required='true'>
		</div>
		<div class="form-group">
			<label class="control-label">Status Nomor KK</label>
			<div class="">
				<input type="radio" name="status_no_kk" value="Numpang KK">Numpang KK
				<input type="radio" name="status_no_kk" value="Membuat KK Baru">Membuat KK Baru
				<input type="radio" name="status_no_kk" value="Nomor KK Tetap">Nomor KK Tetap
				</div>
		</div>
		<div class="form-group">
			<label class=" control-label">Nomor KK</label>
			<input type="number" name="no_kk_pindah" value="" class="form-control" required='true'>
		</div>
		<div class="form-group">
			<label class=" control-label">NIK Kepala Keluarga</label>
			<input type="number" name="nik_kepala_keluarga_pindah" value="" class="form-control" required='true'>
		</div>
		<div class="form-group">
			<label class=" control-label">Nama Kepala Keluarga</label>
			<input type="text" name="nama_kepala_keluarga_pindah" value="" class="form-control" required='true'>
		</div>
		<div class="form-group">
			<label class=" control-label">Alamat</label>
			<input type="text" name="alamat_pindah" value="" class="form-control" required='true'>
		</div>
		<div class="form-group">
			<label class=" control-label">RT/RW</label>
			<input type="text" name="rt_rw_pindah" value="" class="form-control" required='true'>
		</div>
		<div class="form-group">
			<label class=" control-label">Kelurahan</label>
			<input type="text" name="kelurahan_pindah" value="" class="form-control" required='true'>
		</div>
		<div class="form-group">
			<label class=" control-label">Kecamatan</label>
			<input type="text" name="kecamatan_pindah" value="" class="form-control" required='true'>
		</div>
		<div class="form-group">
			<label class=" control-label">Kota</label>
			<input type="text" name="kota_pindah" value="" class="form-control" required='true'>
		</div>
		<div class="form-group">
			<label class=" control-label">Provinsi</label>
			<input type="text" name="provinsi_pindah" value="" class="form-control" required='true'>
		</div>

		<div class="form-group">
			<label class="control-label">pengantar (JPG,JPEG)</label>
			<input type="file" name="s_pengantar"  value="" class="form-control" placeholder="surat pengantar" required>
		</div>
		<div class="form-group">
			<label class="control-label">ktp (JPG,JPEG)</label>
			<input type="file" name="s_ktp"  value="" class="form-control" placeholder="surat pengantar">
		</div>
		<div class="form-group">
			<label class="control-label">Kartu Keluarga (JPG,JPEG)</label>
			<input type="file" name="s_kk"  value="" class="form-control" placeholder="surat pengantar">
		</div>
		<div class="form-group">
			<button type="submit" name="add" class="btn
			btn-primary" value="Simpan">Simpan</button>
			<a class="btn btn-danger" href="surat_pindah.php">Kembali</a>
		</div>
  </div>
</form>
<script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/2.0.0/jquery.min.js"></script>
<script type="text/javascript">
$(document).ready(function(){
		$('.btn-info').click(function(){
			var $row = $(this).closest("tr");    // Find the row
	    var $nm_mt = $row.find(".1").text(); // Find the text
			var $nik_mt = $row.find(".2").text(); // Find the text
			var $jk_mt = $row.find(".3").text(); // Find the text
			var $lahir = $row.find(".4").text();
			var $today = $(".66").val();
			//var $umur = hitung_umur($lahir);

	    $(".11").val($nm_mt); //show value to input id='nama'
			$(".22").val($nik_mt); //show value to input id='nik'
			$(".33").val($jk_mt); //show value to input id='jk'
			$(".55").val($lahir);
			$(".44").val($umur);
		});
	});
</script>
<?php include "footer.php"; }?>
