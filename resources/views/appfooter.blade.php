<footer class="footer border-top">
	<div class="container-fluid">
		<div class="row">
			<div class="col-sm-4">
				<div class="copyright">&copy; 2022 {{ config("app.name") }}. All Rights Reserved </div>
			</div>
			<div class="col">
				<div class="footer-links text-right">
					<a href="{{ url('/') }}">Home</a>
					<!-- <a href="{{ url('info/faq') }}">Help and FAQ</a> | -->
					<!-- <a href="{{ url('info/contact') }}">Contact us</a>  | -->
					<!-- <a href="{{ url('info/privacypolicy') }}">Privacy Policy</a> |
					<a href="{{ url('info/termsandconditions') }}">Terms and Conditions</a> -->
				</div>
			</div>

		</div>
	</div>
	<script>
		function confirmDelete() {
			return confirm('Are you sure you want to delete?');
		}

		function confirmBuyform() {
			return confirm('Are you sure you want to purchase this form?');
		}

		function confirmBuyResource() {
			return confirm('Are you sure you want to purchase this Resource?');
		}
	</script>
</footer>