</div>
	</div>
	<script type="text/javascript">
	$(document).ready(function(){
			$('#ambil').click(function(){
				var $row = $(this).closest("tr");    // Find the row
		    var $nm_mt = $row.find(".1").text(); // Find the text
				var $nik_mt = $row.find(".2").text(); // Find the text
				var $jk_mt = $row.find(".3").text(); // Find the text

		    $(".form-control 11").val($nm_mt); //show value to input id='nama'
				$(".form-control 22").val($nik_mt); //show value to input id='nik'
				$(".form-control 33").val($jk_mt); //show value to input id='jk'
			});
		});
	// $(".ambil").click(function() {
	//     var $row = $(this).closest("tr");    // Find the row
	//     var $nm_mt = $row.find(".1").text(); // Find the text
	// 		var $nik_mt = $row.find(".2").text(); // Find the text
	// 		var $jk_mt = $row.find(".3").text(); // Find the text
	//
	//     $(".form-control 11").val($nm_mt); //show value to input id='nama'
	// 		$(".form-control 22").val($nik_mt); //show value to input id='nik'
	// 		$(".form-control 33").val($jk_mt); //show value to input id='jk'
	// });
	</script>
	<script src="js/bootstrap.min.js"></script>
	<!-- <script src="js/jquery.min.js"></script> -->
	<script src="https://code.jquery.com/jquery-3.3.1.js"></script>
	<script src="js/jquery.dataTables.js"></script>

	
</body bgcoler="#ffff00">
</html>
