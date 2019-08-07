<?php
session_start();
if($_SESSION['level']=="" || $_SESSION['level']=="admin"){
  header("location:../login.php");
}else {
  include ('header.php');

?>
<div class="alert alert-success alert-dismissible fade show" role="alert">
  Selamat Datang <strong><?php echo $_SESSION['nama'];  ?></strong>
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>
		<div class="jumbotron text-center">
    <img  class="img" src="../pemko.jpg" width="20%">
    <h1>Kelurahan Loktabat Selatan Kota Banjarbaru</h1>
    <p class=" lead">Selamat Datang di web Kelurahan Loktabat Selatan Kota Banjarbaru</p>
    <a class="btn btn-lg btn-primary" href="profil_kelurahan.php" role="button">More info &raquo;</a>
  </div>

<?php
  include ('footer.php');
}
?>
