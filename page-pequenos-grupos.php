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
						<div class="pgm form">
							<div class="form__select__wrap">
								<select id="faixa-etaria" class="form__select">
									<?php if(have_rows('grupo_pgm')) : ?>
									<?php while(have_rows('grupo_pgm')) : the_row(); ?>
									<option value="<?php the_sub_field('pgm_slug'); ?>"><?php the_sub_field('pgm_nome'); ?></option>
									<?php endwhile; endif; ?>
								</select>
								<i class="fa fa-chevron-down"></i>
							</div>
							<a href="<?php bloginfo('url'); ?>/?page_id=19?assunto=pgm" title="Quero participar de um PGM" class="btn btn--orange btn--medium">Quero participar de um PGM</a>
						</div>
						<?php if(have_rows('grupo_pgm')) : ?>
						<?php while(have_rows('grupo_pgm')) : the_row(); ?>
						<div id="<?php the_sub_field('pgm_slug'); ?>" class="js-pgm-item">
							<div class="lista">
								<?php if(have_rows('pgm')) : ?>
								<?php while(have_rows('pgm')) : the_row(); ?>
								<div class="lista__item">
									<img src="<?php the_sub_field('pgm_thumb'); ?>" class="lista__item__thumb">
									<div>
										<h3 class="section__subtitle"><?php the_sub_field('pgm_titulo'); ?></h3>
										<span class="lista__item__data"><?php the_sub_field('pgm_tipo'); ?></span>
										<span class="lista__item__data-extenso"><?php the_sub_field('pgm_data'); ?></span>
										<span class="lista__item__local"><strong><?php the_sub_field('pgm_local'); ?></strong></span>
										<?php the_sub_field('pgm_texto'); ?>
									</div>
								</div>
								<?php endwhile; endif; ?>
							</div>
						</div>
						<?php endwhile; endif; ?>
    				</div>
				</article>
				<aside class="section__sidebar">
					<?php get_template_part('inc/inc.sidebar'); ?>
				</aside>
			</div>
		</div>
	</section>

<?php get_footer(); ?>