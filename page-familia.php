<?php get_header(); ?>

	<section class="section">
		<?php get_template_part('inc/inc.page-header'); ?>
		<div class="container">
			<div class="section__wrap">
				<article class="section__content">
					<div class="section__outer">
						<?php while ( have_posts() ) : the_post(); ?>
						<?php the_content(); ?>
						<h2>Cursos Vigentes</h2>
						<div class="lista">
							<?php if(have_rows('curso')) : ?>
							<?php while(have_rows('curso')) : the_row(); ?>
							<div class="lista__item">
								<img src="<?php the_sub_field('curso_thumb'); ?>" class="lista__item__thumb">
								<div>
									<h3 class="section__subtitle"><?php the_sub_field('curso_titulo'); ?></h3>
									<span class="lista__item__data"><?php the_sub_field('curso_data'); ?></span>
									<?php the_sub_field('curso_texto'); ?>
									<?php if(get_sub_field('curso_botao')[0] == 'Sim') : ?>
									<a href="mailto:<?php the_sub_field('curso_link'); ?>?subject=<?php the_sub_field('curso_titulo'); ?>" title="Inscreva-se já!" class="btn btn--red btn--big">Inscreva-se já!</a>
									<?php else : ?>
										<div class="lista__item__inscricao">
											<?php the_sub_field('curso_informacoes'); ?>
										</div>
									<?php endif; ?>
								</div>
							</div>
							<?php endwhile; endif; ?>
						</div>
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