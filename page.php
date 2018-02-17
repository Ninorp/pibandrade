<?php get_header(); ?>

	<section class="section">
		<?php get_template_part('inc/inc.page-header'); ?>
		<div class="container">
			<div class="section__wrap">
				<article class="section__content">
					<div class="section__outer">
						<?php while ( have_posts() ) : the_post(); ?>
							<?php the_content(); ?>
						<?php endwhile; wp_reset_query(); ?>
    				</div>
				</article>
				<aside class="section__sidebar">
					<?php get_template_part('inc/inc.sidebar'); ?>
				</aside>
			</div>
		</div>
	</section>
	<?php if (is_page('4') || is_page('19')) : ?>
	<?php get_template_part('inc/inc.mapa'); ?>
	<?php endif; ?>

<?php get_footer(); ?>