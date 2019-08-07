<?php
session_start();
//cek apakah yang mengakses halaman ini sudah login
if($_SESSION['level']=="" || $_SESSION['level']=="rakyat"){
	header("location:login.php");
}else {
include ('header.php');
?>
	<div class="col-sm-9">
		<h2>Kelurahan Loktabat Selatan Kota Banjarbaru</h2>
		<p> Terima Kasih Telah Berkunjung Ke Web Kelurahan Loktabat Selatan Kota Banjarbaru.</p>
	</div>
		<hr>
	<div class="row">
		<div class="col">
		<img  style="margin-left:20px;"class="img" src="kelurahan.jpeg" width="100%">
		</div>
		<div class="col">
			<div class="card" style="padding:10px;">
			<div class="card-header">
			info kontak
			</div>
			<div class="card-body">
			Alamat : Jl. Sabilai II Rt.03 Rw.04 Banjarbaru <br>
			<hr>
			No.Tlp : 0511-6749157  <br>
			<hr>
			Email  : kel.loktabat.sel@gmail.com <br>
			<hr>
			Blog   : loktabat-selatan.blogspot.com <br>
			</div>
			</div>

		</div>
	</div>
<?php
	include ('footer.php');
}
?>
