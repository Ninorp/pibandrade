<?php get_header(); ?>
	<section class="intro">
		<div class="slider slider--intro js-slider-intro">
			<div class="slider__outer">
				<div class="slider__wrap">
					<?php if(have_rows('slider_item')) : ?>
                    <?php while(have_rows('slider_item')) : the_row(); 
                    $url = get_sub_field('slide_titulo');
                    
                    if (strpos($url, 'https') !== false){ ?>							
                            
                                    <div class="slider__item bg-cover" style="background-image: url('<?php the_sub_field('slide_imagem'); ?>');" />
                                        <a href="<?php echo $url; ?>" style="display:inline-block;width:100%;height:100%;" target="_blank"></a>
                                    </div> 
                                                       
                        <?php } else { ?>                           
                            <div class="slider__item bg-cover" style="background-image: url('<?php the_sub_field('slide_imagem'); ?>');" ></div>	
                        <?php } ?>														
                    <?php endwhile; endif; ?>
				</div>
			</div>
			<nav class="slider__nav"></nav>
		</div>
	</section>
	<section class="programacao">
		<div class="container">
			<div class="row">
				<div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
					<h2 class="title"><span>Programação da Igreja</span></h2>
					<div class="slider slider--programacao js-slider-programacao">
						<div class="slider__outer">
							<div class="slider__wrap">
								<?php if(have_rows('programacao_dia', 6)) : ?>
								<?php while(have_rows('programacao_dia', 6)) : the_row(); ?>
								<div class="slider__item">
									<div>
										<strong><?php the_sub_field('dia_da_semana'); ?></strong>
										<span><?php the_sub_field('dia_do_mes'); ?></span>
									</div>
									<ul>
										<?php if(have_rows('horarios')) : ?>
										<?php while(have_rows('horarios')) : the_row(); ?>
										<li><?php the_sub_field('programacao_conteudo'); ?></li>
										<?php endwhile; endif; ?>
									</ul>
								</div>
								<?php endwhile; endif; ?>
							</div>
						</div>
						<nav class="slider__nav">
							<a href="#" title="Voltar" class="slider__nav__item slider__nav__item--left">Voltar</a>
							<a href="#" title="AvanÃ§ar" class="slider__nav__item slider__nav__item--right">AvanÃ§ar</a>
						</nav>
					</div>
				</div>
			</div>
		</div>
	</section>
	<section class="ministerios">
		<div class="container">
			<div class="row">
				<div class="col-lg-2 col-xs-4">
				    <a href="https://www.youtube.com/channel/UC3OCkpw3ElJWPrXZDh7BviA" target="_blank" title="">
					<div class="banner banner--familia" style="background-image: url('<?php the_field('banner_background') ?>')">
					</div>
					</a>
				</div>
				<div class="col-lg-2 col-xs-4">
					<div class="ultimos-eventos">
						<div class="ultimos-eventos__wrap">
							<h2 class="title"><span><?php the_field('ultimos_eventos_titulo'); ?></span></h2>
						</div>
						<div class="row">
							<?php
								$repeater = get_field('curso', 13);
								$repeater= array_slice($repeater, 0, 2);
								$order = array();

								foreach( $repeater as $i => $row ) {
									$order[$i] = $row['id'];
								}

								array_multisort( $order, SORT_DESC, $repeater );

								if( $repeater ) :
								foreach( $repeater as $i => $row ) :
								if($row['curso_data'] == "EM BREVE"){
									continue;
								}
							?>
							<div class="col-lg-2 col-xs-4 col-sm-2">
								<div class="ultimos-eventos__item">
									<figure class="ultimos-eventos__item__thumb bg-cover" style="background-image: url('<?php echo $row['curso_thumb']; ?>');"></figure>
									<div>
										<?php $value = substr($row['curso_texto'], 0, 37); ?>
										<p><?php echo $value . '...'; ?></p>
										<span class="ultimos-eventos__item__date">
										<?php echo $row['curso_data']; ?></span>
										<a href="<?php bloginfo('url'); ?>/familia" title="Saiba mais" class="ultimos-eventos__item__btn">Saiba mais</a>
									</div>
								</div>
							</div>
							<?php endforeach; endif; ?>
						</div>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-lg-4 col-xs-4">
					<h2 class="title"><span>Conheça</span></h2>
				</div>
				<div class="col-lg-4 col-xs-4">
					<div class="slider slider--ministerios js-slider-ministerios">
						<div class="slider__outer">
							<div class="slider__wrap">
								<?php if(have_rows('tipo_ministerio', 8)) : ?>
								<?php while(have_rows('tipo_ministerio', 8)) : the_row(); ?>
								
								<?php if(have_rows('lista_item')) : ?>
                                <?php while(have_rows('lista_item')) : the_row(); 
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
								<div class="slider__item">
									<a href="<?php bloginfo('url'); ?>/ministerios#<?php echo $str[0]; ?>">
										<div class="slider__item__wrap">
											<figure class="slider__item__thumb bg-cover" style="background-image: url('<?php the_sub_field('item_thumb'); ?>');"></figure>
											<i class="slider__item__ico"><img src="<?php the_sub_field('item_icone'); ?>"></i>
										</div>
										<strong class="slider__item__title">Ministério <span><?php the_sub_field('item_titulo'); ?></span></strong>
									</a>
								</div>
								<?php endwhile; endif; ?>
								
								<?php endwhile; endif; ?>
							</div>
						</div>
						<nav class="slider__nav">
							<a href="#" title="Voltar" class="slider__nav__item slider__nav__item--left">Voltar</a>
							<a href="#" title="Avançar" class="slider__nav__item slider__nav__item--right">Avançar</a>
						</nav>
					</div>
				</div>
			</div>
		</div>
	</section>
	<?php get_template_part('inc/inc.faca-parte'); ?>
<?php get_footer(); ?>