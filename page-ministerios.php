<?php get_header(); ?>

	<section class="section">
		<?php get_template_part('inc/inc.page-header'); ?>
		<div class="container">
			<div class="section__wrap">
				<article class="section__content">
					<?php if(have_rows('tipo_ministerio')) : ?>
					<?php while(have_rows('tipo_ministerio')) : the_row(); ?>
					<div class="section__outer">
						<div><?php the_sub_field('texto_ministerio_tipo'); ?></div>
						<div class="lista">
							<?php if(have_rows('lista_item')) : ?>
							<?php while(have_rows('lista_item')) : the_row(); ?>
								<?php
									$titulo = get_sub_field('item_titulo');
									$unwanted_array = array(
										'Š'=>'S', 'š'=>'s', 'Ž'=>'Z', 'ž'=>'z', 'À'=>'A', 'Á'=>'A', 'Â'=>'A', 'Ã'=>'A', 'Ä'=>'A', 'Å'=>'A', 'Æ'=>'A', 'Ç'=>'C', 'È'=>'E', 'É'=>'E',
										'Ê'=>'E', 'Ë'=>'E', 'Ì'=>'I', 'Í'=>'I', 'Î'=>'I', 'Ï'=>'I', 'Ñ'=>'N', 'Ò'=>'O', 'Ó'=>'O', 'Ô'=>'O', 'Õ'=>'O', 'Ö'=>'O', 'Ø'=>'O', 'Ù'=>'U',
										'Ú'=>'U', 'Û'=>'U', 'Ü'=>'U', 'Ý'=>'Y', 'Þ'=>'B', 'ß'=>'Ss', 'à'=>'a', 'á'=>'a', 'â'=>'a', 'ã'=>'a', 'ä'=>'a', 'å'=>'a', 'æ'=>'a', 'ç'=>'c',
										'è'=>'e', 'é'=>'e', 'ê'=>'e', 'ë'=>'e', 'ì'=>'i', 'í'=>'i', 'î'=>'i', 'ï'=>'i', 'ð'=>'o', 'ñ'=>'n', 'ò'=>'o', 'ó'=>'o', 'ô'=>'o', 'õ'=>'o',
										'ö'=>'o', 'ø'=>'o', 'ù'=>'u', 'ú'=>'u', 'û'=>'u', 'ý'=>'y', 'þ'=>'b', 'ÿ'=>'y'
									);
									$str = strtolower(strtr($titulo, $unwanted_array));
									$str = explode("(", $str);
									$str = str_replace(' ', '', $str);
								?>
							<div id="<?php echo $str[0];?>" class="lista__item">
								<img src="<?php the_sub_field('item_thumb'); ?>" class="lista__item__thumb">
								<div>
									<h3 class="section__subtitle"><?php the_sub_field('item_titulo'); ?></h3>
									<?php the_sub_field('item_texto'); ?>
									<a href="mailto:<?php echo $str[0];?>@pibaa.com.br?subject=Ministério - <?php the_sub_field('item_titulo'); ?>" title="Inscreva-se já!" class="btn btn--orange btn--big">Quero participar</a>
								</div>
							</div>
							<?php endwhile; endif; ?>
						</div>
					</div>
					<?php endwhile; endif; ?>
				</article>
				<aside class="section__sidebar">
					<?php get_template_part('inc/inc.sidebar'); ?>
				</aside>
			</div>
		</div>
	</section>

<?php get_footer(); ?>