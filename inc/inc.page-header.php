<?php
	$thumb_id = get_post_thumbnail_id();
	$thumb_url = wp_get_attachment_image_src($thumb_id,'thumbnail-size', true);
?>
<div class="section__header" style="background-image: url('<?php echo $thumb_url[0]; ?>');">
	<strong><?php the_field('titulo_da_pagina'); ?></strong>
	<p><?php the_field('descricao_da_pagina'); ?></p>
</div>