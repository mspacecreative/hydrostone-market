<footer class="full-width">
			<div class="inner-container">
				<p>&copy; <?php echo date('Y') ?> Hydrostone Market</p>
			</div>
		</footer>
		
		<script type="text/javascript">
			$(document).ready(function () {
				if ($(".gallery_grid:empty").contents().length == 0) { 
					$(this).css('margin-top', '0px');
				}
			});
		</script>
		<?php wp_footer(); ?>
	</body>
</html>