<?php if(have_rows('box')) : ?>
<?php while(have_rows('box')) : the_row(); ?>

<?php if(get_sub_field('box_tipo') == 'Padrão') : ?>

	<?php if(have_rows('box_padrao')) : ?>
	<?php while(have_rows('box_padrao')) : the_row(); ?>
	<div class="box">
		<a href="<?php the_sub_field('box_link'); ?>"><figure class="box__thumb bg-cover" style="background-image: url('<?php the_sub_field('box_thumb'); ?>');"></figure></a>
		<address class="box__content">
			<strong><?php the_sub_field('box_titulo'); ?></strong>
			<?php the_sub_field('box_texto'); ?>
		</address>
	</div>
	<?php endwhile; endif; ?>

<?php elseif(get_sub_field('box_tipo') == 'Dados bancários') : ?>
	
	<?php if(have_rows('box_dados_bancarios')) : ?>
	<?php while(have_rows('box_dados_bancarios')) : the_row(); ?>
	<div class="box">
		<strong class="box__title"><?php the_sub_field('box_titulo'); ?></strong>
		<div class="box__wrap">
			<?php if(have_rows('box_itens')) : ?>
			<?php while(have_rows('box_itens')) : the_row(); ?>
			<div>
				<?php the_sub_field('box_item_texto'); ?>
			</div>
			<?php endwhile; endif; ?>
		</div>
	</div>
	<?php endwhile; endif; ?>

<?php else : ?>

	<?php if(have_rows('box_links')) : ?>
	<?php while(have_rows('box_links')) : the_row(); ?>
	<div class="box">
		<a href="<?php the_sub_field('link_lider'); ?>" class="link-lider"><i><?php the_sub_field('link_lider_texto'); ?></i></a>
		<div class="estudos">
			<strong class="estudos__title"><?php the_sub_field('box_titulo'); ?></strong>
			<ul>
				<?php if(have_rows('box_item')) : ?>
				<?php while(have_rows('box_item')) : the_row(); ?>
				<li class="estudos__item">
					<a href="<?php the_sub_field('item_link'); ?>" target="_blank" title="Palavras são sementes">
						<strong><?php the_sub_field('item_data'); ?></strong>
						<?php the_sub_field('item_titulo'); ?>
					</a>
				</li>
				<?php endwhile; endif; ?>
			</ul>
		</div>
	</div>
	<?php endwhile; endif; ?>

<?php
	endif;
	endwhile;
	endif;
?>