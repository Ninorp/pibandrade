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
						
						<div class="lista">
						<?php if(have_rows('lista_item')) : ?>
						<?php while(have_rows('lista_item')) : the_row(); ?>
							<div id="<?php the_sub_field('item_titulo'); ?>" class="lista__item">
								<img src="<?php the_sub_field('item_thumb'); ?>" class="lista__item__thumb">
								<div>
									<h3 class="section__subtitle"><?php the_sub_field('item_titulo'); ?></h3>
									<?php the_sub_field('item_texto'); ?>
									<a href="mailto:<?php the_sub_field('item_botao'); ?>?subject=Celebrando a Restauração - <?php the_sub_field('item_titulo'); ?>" title="Inscreva-se já!" class="btn btn--orange btn--big">Quero participar</a>
								</div>
							</div>
						<?php endwhile; endif; ?>
						</div>
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