<section class="faca-parte">
	<div class="container">
		<h2 class="faca-parte__title">Faça parte da nossa Igreja</h2>
		<div class="faca-parte__content">
			<?php the_field('formulario_faca_parte'); ?>
			<div class="faca-parte__contribua">
				<h2 class="title"><span><?php the_field('titulo'); ?></span></h2>
				<div>
					<?php if(have_rows('informacoes')) : ?>
					<?php while(have_rows('informacoes')) : the_row(); ?>
					<div class="faca-parte__item">
						<strong><?php the_sub_field('titulo_box'); ?></strong>
						<span><?php the_sub_field('conteudo_box'); ?></span>
					</div>
					<?php endwhile; endif; ?>
				</div>
			</div>
		</div>
	</div>
</section>