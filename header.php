<!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js no-svg">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="initial-scale=1,user-scalable=no,maximum-scale=1.0">

		<link rel="stylesheet" type="text/css" href="<?php bloginfo('template_url'); ?>/plugins/lightbox/css/lightbox.min.css">
		<link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/assets/styles/style.min.css" media="screen" />
		<link rel="stylesheet" type="text/css" href="<?php bloginfo('template_url'); ?>/assets/vendor/font-awesome/css/font-awesome.min.css">

		<meta name="theme-color" content="#105081">

		<!-- Facebook metatags -->
		
		<meta property="og:url" content="http://pibaa.com.br/">
		<meta property="og:title" content="PIBAA - Primeira Igreja Batista Andrade Araújo">
		
		<meta property="og:image" content="http://pibaa.com.br/wp-content/themes/pibaa/assets/img/pibaa-share.jpg">

		<!-- Twitter metatags -->
		<meta name="twitter:card" content="summary">
		<meta name="twitter:description" content="Seja bem vindo a Primeira Igreja Batista Andrade Araújo">
		<meta name="twitter:title" content="PIBAA - Primeira Igreja Batista Andrade Araújo">
		<meta name="twitter:image" content="http://pibaa.com.br/wp-content/themes/pibaa/assets/img/pibaa-share.jpg">

		<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
		<!--[if lt IE 9]>
			<script src="assets/vendor/html5shiv/dist/html5shiv.min.js"></script>
		  	<script src="assets/vendor/respond/dest/respond.min.js"></script>
		<![endif]-->
        <!-- Global Site Tag (gtag.js) - Google Analytics -->
        <script async src="https://www.googletagmanager.com/gtag/js?id=UA-99891110-1"></script>
        <script>
            window.dataLayer = window.dataLayer || [];
            function gtag(){dataLayer.push(arguments);}
                 gtag('js', new Date());

            gtag('config', 'UA-99891110-1');
        </script>

		<?php wp_head(); ?>
	</head>

	<body <?php body_class(); ?>>
		<header class="header">
			<div class="container">
				<div class="row hidden-xs hidden-sm">
					<div class="col-lg-1 col-lg-offset-3 col-md-1 col-md-offset-3">
						<div class="header__wrap">
							<a href="<?php bloginfo('url'); ?>/ao-vivo" class="btn btn--orange btn--medium">Assista ao vivo</a>
							<?php dynamic_sidebar('Mídias Sociais'); ?>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-xs-4 col-sm-4 col-md-1 col-lg-1">
						<a href="<?php bloginfo('url'); ?>" title="1ª Igreja Batista de Andrade Araújo" class="logo">1ª Igreja Batista de Andrade Araújo</a>
						<button type="button" class="btn-menu js-open-nav hidden-md hidden-lg"></button>
					</div>
					<div class="col-xs-4 col-sm-4 col-md-3 col-lg-3">
						<nav class="nav nav--header js-nav">
							<?php wp_nav_menu( array(
								'menu'				=> 'Menu header',
								'container'			=> 'ul',
								'items_wrap'		=> '<ul>%3$s</ul>'
							)); ?>
						</nav>
					</div>
				</div>
			</div>
		</header>