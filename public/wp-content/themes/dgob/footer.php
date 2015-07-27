		</div>
	</div>

	<footer class="page">
		<div class="footer-line"></div>
		<div class="container-fluid">
			<?php get_sidebar( 'footer' ); ?>
		</div>
	</footer>

</div>

<script src="http://maps.google.com/maps/api/js?sensor=true"></script>
<script src="<?php dgob_timestamped_url( 'scripts.js' ); ?>"></script>
<?php wp_footer(); ?>

<?php printf( '<!-- %d queries. %s seconds. -->', get_num_queries(), timer_stop() ); ?>

</body>
</html>
