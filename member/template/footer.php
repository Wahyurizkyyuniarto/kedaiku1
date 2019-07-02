
	<footer id="footer"><!--Footer-->
	
		
		
		<div class="footer-bottom">
			<div class="container">
				<div class="row">
					<p class="pull-left">Copyright © 2017 wahyurizky.</p>
					<p class="pull-right">Designed by <span><a target="_blank" href="http://www.themeum.com">Themeum</a></span></p>
				</div>
			</div>
		</div>
		
	</footer><!--/Footer-->
	

  
    <script src="../asset/js/jquery.js"></script>
	<script src="../asset/js/bootstrap.min.js"></script>
	<script src="../asset/js/jquery.scrollUp.min.js"></script>
	<script src="../asset/js/price-range.js"></script>
    <script src="../asset/js/jquery.prettyPhoto.js"></script>
    <script src="../asset/js/main.js"></script>
		<script type="text/javascript">

	$(document).ready(function(){
		$('#provinsi').change(function(){

			//Mengambil value dari option select provinsi kemudian parameternya dikirim menggunakan ajax
			var provinsi = $('#provinsi').val();
			var prov = provinsi.substr(0,2);

      		$.ajax({
            	type : 'GET',
           		url : 'http://localhost/kedaiku1/apirajaongkir/cek_kabupaten.php',
            	data :  'prov_id=' + prov,
					success: function (data) {

					//jika data berhasil didapatkan, tampilkan ke dalam option select kabupaten
					$("#kabupaten").html(data);
				}
          	});
		});

		$("#kurir").change(function(){
			//Mengambil value dari option select provinsi asal, kabupaten, kurir, berat kemudian parameternya dikirim menggunakan ajax
			var kabupaten = $('#kabupaten').val();
			
			var asal = 501;
			var kab = kabupaten.substr(0,2);
			var kurir = $('#kurir').val();
			var berat = $('#berat').val();

      		$.ajax({
            	type : 'POST',
           		url : 'http://localhost/kedaiku1/apirajaongkir/cek_ongkir.php',
            	data :  {'kab_id' : kab, 'kurir' : kurir, 'asal' : asal, 'berat' : berat},
					success: function (data) {

					//jika data berhasil didapatkan, tampilkan ke dalam element div ongkir
					$("#ongkir").html(data);
				}
          	});
		});
	});
  function increaseValue() {
  var max = document.getElementById('number').max; 
  var value = parseInt(document.getElementById('number').value, 10);
  value = isNaN(value) ? 0 : value;
  value >= max ? value = 1:'';
  value++;
  document.getElementById('number').value = value;
}

function decreaseValue() {
  var value = parseInt(document.getElementById('number').value, 10);
  value = isNaN(value) ? 0 : value;
  value < 1 ? value = 1 : '';
  value--;
  document.getElementById('number').value = value;
}
</script>
</body>
</html>