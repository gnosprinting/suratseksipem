<?php
session_start();
//cek apakah yang mengakses halaman ini sudah login
if($_SESSION['level']=="" || $_SESSION['level']=="rakyat"){
	header("location:login.php");
}else {
include ('header.php');

$mySql="SELECT * FROM t_penduduk";
if(isset($_POST['qcari'])) {
	$qcari=$_POST['qcari'];
	$mySql="SELECT * FROM t_penduduk WHERE nik like '%$qcari%' or nama like '%$qcari%' ";
}

?>
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
	<style type="text/css" class="init">

		td.details-control {
			background: url('https://img.icons8.com/windows/32/000000/zoom-in.png') no-repeat center center;
			cursor: pointer;
		}
		tr.shown td.details-control {
			background: url('https://img.icons8.com/windows/32/000000/minus-math.png') no-repeat center center;
		}

	</style>
	<!-- <script src="https://code.jquery.com/jquery-3.3.1.js"></script> -->
	<!-- <script src="https://code.jquery.com/jquery-2.2.4.js" integrity="sha256-iT6Q9iMJYuQiMWNd9lDyBUStIq/8PuOW33aOqmvFpqI=" crossorigin="anonymous"></script> -->
	
	<script type="text/javascript" class="init">
	function format ( d ) {
		return '<table cellpadding="5" cellspacing="0" border="0" style="padding-left:50px;">'+
			'<tr>'+
					'<td><b>Suami:</b></td>'+
					'<td>'+d.Suami+'</td>'+
					'<td>'+d.nik_suami+'</td>'+
					'<td>'+d.tempat_lhr_suami+'</td>'+
					'<td>'+d.tgl_lhr_suami+'</td>'+
			'</tr>'+
			'<tr>'+
					'<td>Isteri:</td>'+
					'<td>'+d.Isteri+'</td>'+
					'<td>'+d.nik_isteri+'</td>'+
					'<td>'+d.tempat_lhr_isteri+'</td>'+
					'<td>'+d.tgl_lhr_isteri+'</td>'+
			'</tr>'+
			'<tr>'+
					'<td>Anak Pertama:</td>'+
					'<td>'+d.anak_pertama+'</td>'+
					'<td>'+d.nik_anak1+'</td>'+
					'<td>'+d.tempat_lhr_anak1+'</td>'+
					'<td>'+d.tgl_lhr_anak1+'</td>'+
			'</tr>'+
			'<tr>'+
					'<td>Anak Kedua:</td>'+
					'<td>'+d.anak_kedua+'</td>'+
					'<td>'+d.nik_anak2+'</td>'+
					'<td>'+d.tempat_lhr_anak2+'</td>'+
					'<td>'+d.tgl_lhr_anak2+'</td>'+
			'</tr>'+
			'<tr>'+
					'<td>Anak Ketiga:</td>'+
					'<td>'+d.anak_ketiga+'</td>'+
					'<td>'+d.nik_anak3+'</td>'+
					'<td>'+d.tempat_lhr_anak3+'</td>'+
					'<td>'+d.tgl_lhr_anak3+'</td>'+
			'</tr>'+
			'<tr>'+
					'<td>Famili:</td>'+
					'<td>'+d.famili+'</td>'+
					'<td>'+d.nik_famili+'</td>'+
					'<td>'+d.tempat_lhr_famili+'</td>'+
					'<td>'+d.tgl_lhr_famili+'</td>'+
			'</tr>'+
	'</table>';
	}

$(document).ready(function() {
	var dt = $('#example').DataTable( {
			"processing": true,
			"serverSide": true,
			"ajax": "getpenduduk.php",
			"columns": [
					{
							"class":          "details-control",
							"orderable":      false,
							"data":           null,
							"defaultContent": ""
					},
					{ "data": "nokk" },
					{ "data": "nik_kepala_keluarga" },
					{ "data": "nama" },
					{ "data": "tempat_lhr" },
					{ "data": "tgl_lhr" },
					{ "data": "alamat" },
					{ "data": "rt_rw" }
			],
			"order": [[1, 'asc']]
	} );

	// Array to track the ids of the details displayed rows
	var detailRows = [];

	$('#example tbody').on( 'click', 'tr td.details-control', function () {
			var tr = $(this).closest('tr');
			var row = dt.row( tr );
			var idx = $.inArray( tr.attr('id'), detailRows );

			if ( row.child.isShown() ) {
					tr.removeClass( 'details' );
					row.child.hide();

					// Remove from the 'open' array
					detailRows.splice( idx, 1 );
			}
			else {
					tr.addClass( 'details' );
					row.child( format( row.data() ) ).show();

					// Add to the 'open' array
					if ( idx === -1 ) {
							detailRows.push( tr.attr('id') );
					}
			}
	} );

	// On each draw, loop over the `detailRows` array and show any child rows
	dt.on( 'draw', function () {
			$.each( detailRows, function ( i, id ) {
					$('#'+id+' td.details-control').trigger( 'click' );
			} );
	} );
} );
	</script>
<div class="card">
	<h2 style="margin:10px;">Data Kartu Keluarga</h2>
		<!-- <div class="form-group">
			<a href="penduduk_tambah.php" class="btn btn-sm btn-primary " style="margin-left:10px;">Tambah data penduduk</a>
			<a href="penduduk_cetak.php" class="btn btn-sm btn-success " style="margin-left:10px;">cetak data penduduk</a>

			<div class="right"  style="margin-right:10px;">
					<form class="" method="POST" action="penduduk_data.php">
								<input type="text" class="form-control" name="qcari" placeholder="Cari penduduk..." autofocus/>
					</form>
		</div>
			</div>

		<br />
		<br /> -->
		<div class="table-responsive">

			<table id="example" class="display" style="width:100%">
				<thead>
					<tr>
						<th></th>
						<th>No KK</th>
						<th>NIK Kepala Keluarga</th>
						<th>Nama Kepala Keluarga</th>
						<th>Tempat Lahir</th>
						<th>Tanggal Lahir</th>
						<th>Alamat</th>
						<th>RT/RW</th>
					</tr>
				</thead>
				<!-- <tfoot>
				<tr>
				<th></th>
				<th>No KK</th>
				<th>Suami</th>
				<th>Isteri</th>
				<th>Anak Pertama</th>
			</tr>
		</tfoot> -->
	</table>
</div>
</div>
<?php include "footer.php"; }?>
