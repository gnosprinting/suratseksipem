<?php
  session_start();
  //cek apakah yang mengakses halaman ini sudah login
	if($_SESSION['level']=="" || $_SESSION['level']=="rakyat"){
		header("location:login.php");
	}else {
  include ('header.php');
  // if (!isset($_SESSION['username'])) {
  //   session_destroy();
  //   header( 'location: login.php');
  // }else{


?>
<div class="jumbotron text-center">
<img  class="img" src="pemko.jpg" width="20%">
<h1>Kelurahan Loktabat Selatan Kota Banjarbaru</h1>
<p class=" lead">Selamat Datang di web Kelurahan Loktabat Selatan Kota Banjarbaru</p>
<!-- <a class="btn btn-lg btn-primary" href="profil_kelurahan.php" role="button">More info &raquo;</a> -->
<div class="row">
  <!-- <div class="col">
  <img  style=""class="img" src="kelurahan.jpeg" width="50%">
  </div> -->

</div>
</div>
<div class="row">
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
