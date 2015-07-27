		</div>
	</div>

	<footer class="page">
		<div class="footer-line"></div>
		<div class="container-fluid">
			<?php dgob_footer(); ?>
		</div>
	</footer>

</div>

<?php wp_footer(); ?>
<script src="<?php dgob_timestamped_url( 'scripts.js' ); ?>"></script>

<?php printf( '<!-- %d queries. %s seconds. -->', get_num_queries(), timer_stop() ); ?>

</body>
</html>
