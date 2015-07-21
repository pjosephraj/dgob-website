</div>

<footer class="page">
	<div class="container-fluid">
		<hr>
		Deutscher Go-Bund e. V.
		<?php
		wp_nav_menu( array(
			'theme_location' => 'footer',
			'container' => false,
			'menu_class' => 'legal-menu',
			'depth' => 1,
		) );
		?>
	</div>
</footer>

<script src="<?php bloginfo('template_url'); ?>/scripts.js"></script>
<?php wp_footer(); ?>

</body>
</html>