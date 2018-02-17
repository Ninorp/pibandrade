<?php get_header(); ?>

	<section class="section">
		<?php get_template_part('inc/inc.page-header'); ?>
		<div class="container">
			<div class="section__wrap">
				<article class="section__content">
					<div class="section__outer">
						<?php while (have_posts()) : the_post(); ?>
							<?php the_content(); ?>
						<?php endwhile; wp_reset_query(); ?>
						<div>
							<h1>Veja também</h1>
							<div class="lista">
							<?php if(have_rows('grupo_mensagem', 17)) : ?>
							<?php while(have_rows('grupo_mensagem', 17)) : the_row(); ?>
							<div class="lista__item">
								<img src="<?php the_sub_field('grupo_mensagem_thumbnail'); ?>" class="lista__item__thumb">
								<div>
									<h3 class="section__subtitle"><?php the_sub_field('grupo_mensagem_titulo'); ?></h3>
									<div class="table-responsive">
										<table>
											<tbody>
												<?php
													$post_object = get_sub_field('mensagens');
													if( $post_object ) :
												?>
												<?php foreach( $post_object as $post): ?>
												
													<?php setup_postdata($post); ?>
													<tr><td><a href="<?php the_permalink(); ?>"><?php the_field('mensagem_titulo'); ?> - <strong><?php the_field('mensagem_autor'); ?></strong></a></td></tr>
													<?php endforeach; ?>
												
												<?php wp_reset_postdata(); ?>

												<?php endif; ?>
											</tbody>
										</table>
									</div>
								</div>
							</div>
							<?php endwhile; endif; ?>
						</div>
						</div>
    				</div>
				</article>
				<aside class="section__sidebar">
					<?php get_template_part('inc/inc.sidebar'); ?>
				</aside>
			</div>
		</div>
	</section>

<?php get_footer(); ?>