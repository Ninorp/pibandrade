<?php get_header(); ?>

	<section class="section">
		<?php get_template_part('inc/inc.page-header'); ?>
		<div class="container">
			<div class="section__wrap">
				<article class="section__content">
					<div class="section__outer">
						<div class="galeria-wrap">
							<?php if(have_rows('galeria')) : ?>
							<?php $i = 1; while(have_rows('galeria')) : the_row(); $galeria = 'gal-' . $i; ?>
							<div class="galeria-grupo">
								<h2 class="galeria-title"><?php the_sub_field('galeria_nome'); ?></h2>
								<strong class="galeria-data"><?php the_sub_field('galeria_data'); ?></strong>
								<div class="galeria">
									<?php $images = get_sub_field('galeria_imagens'); ?>
									<?php foreach( $images as $image ): ?>
									<a href="<?php echo $image['url']; ?>" data-title="<?php echo $image['caption']; ?>" data-lightbox="<?php echo $galeria; ?>" class="galeria__item bg-cover" style="background-image: url('<?php echo $image['url']; ?>');">
										<div class="overlay"></div>
									</a>
									<?php endforeach; ?>
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