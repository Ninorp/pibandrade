	<footer class="footer">
		<div class="footer__superior hidden-xs hidden-sm">
			<div class="container">
				<nav class="nav nav--footer">
					<?php wp_nav_menu( array(
						'menu'				=> 'Menu Footer',
						'container'			=> 'ul',
						'items_wrap'		=> '<ul class="nav__wrap">%3$s</ul>'
					)); ?>
				</nav>
			</div>
		</div>
		<div class="footer__inferior">
			<div class="container">
				<div class="row">
					<div class="col-lg-3 col-xs-4">
						<?php dynamic_sidebar('Footer 1'); ?>
					</div>
					<div class="col-lg-1 col-xs-4">
						<?php dynamic_sidebar('Mídias Sociais'); ?>
					</div>
				</div>
			</div>
		</div>
	</footer>
	<script src="<?php bloginfo('template_url'); ?>/assets/vendor/jquery/dist/jquery.min.js"></script>
	<script src="<?php bloginfo('template_url'); ?>/assets/vendor/jquery-mask-plugin/dist/jquery.mask.min.js"></script>
	<script src="<?php bloginfo('template_url'); ?>/plugins/lightbox/js/lightbox.min.js"></script>
	<script src="<?php bloginfo('template_url'); ?>/assets/js/scripts.min.js"></script>
	<?php wp_footer(); ?>
	</body>
</html>