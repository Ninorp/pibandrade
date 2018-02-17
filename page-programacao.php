<?php get_header(); ?>

	<section class="section">
		<?php get_template_part('inc/inc.page-header'); ?>
		<div class="container">
			<div class="section__wrap">
				<article class="section__content">
					<div class="section__outer">
						<div class="agenda">
							<?php if(have_rows('programacao_dia')) : ?>
							<?php while(have_rows('programacao_dia')) : the_row(); ?>
							<div class="agenda__item">
								<div class="agenda__item__data">
									<strong><?php the_sub_field('dia_da_semana'); ?></strong>
									<span><?php the_sub_field('dia_do_mes'); ?></span>
								</div>
								<div class="agenda__item__content">
									<?php if(have_rows('horarios')) : ?>
									<?php while(have_rows('horarios')) : the_row(); ?>
									<span><?php the_sub_field('programacao_conteudo'); ?></span>
									<?php endwhile; endif; ?>
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