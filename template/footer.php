
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