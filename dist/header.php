<?php
/**
 * bestgliwice template for displaying the header
 *
 * @package WordPress
 * @subpackage bestgliwice
 * @since bestgliwice 1.0
 */
?>

<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="ie ie-no-support" <?php language_attributes(); ?>> <![endif]-->
<!--[if IE 7]>         <html class="ie ie7" <?php language_attributes(); ?>> <![endif]-->
<!--[if IE 8]>         <html class="ie ie8" <?php language_attributes(); ?>> <![endif]-->
<!--[if IE 9]>         <html class="ie ie9" <?php language_attributes(); ?>> <![endif]-->
<!--[if gt IE 9]><!--> <html <?php language_attributes(); ?>> <!--<![endif]-->
	<head>
		<meta charset="<?php bloginfo( 'charset' ); ?>" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
		<title><?php wp_title( ); ?></title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
		
		<script>
		(function(){
		    function addFont() {
		        var style = document.createElement('style');
		        style.rel = 'stylesheet';
		        document.head.appendChild(style);
		        style.textContent = localStorage.openSans;
		    }

		    try {
		        if (localStorage.openSans) {
		            // The font is in localStorage, we can load it directly
		            addFont();
		        } else {
		            // We have to first load the font file asynchronously
		            var request = new XMLHttpRequest();
		            request.open('GET', '<?php echo get_template_directory_uri(); ?>/fonts.css', true);

		            request.onload = function() {
		                if (request.status >= 200 && request.status < 400) {
		                    // We save the file in localStorage
		                    localStorage.openSans = request.responseText;

		                    // ... and load the font
		                    addFont();
		                }
		            }

		            request.send();
		        }
		    } catch(ex) {
		        // maybe load the font synchronously for woff-capable browsers
		        // to avoid blinking on every request when localStorage is not available
		    }
		}());
		</script>

		<!--[if lt IE 9]>
			<script src="<?php echo get_template_directory_uri(); ?>/js/html5shiv.js"></script>
		<![endif]-->
		<?php wp_head(); ?>

	</head>
	<body <?php body_class(); ?>>
		<div class="navigation cf">
		<div class="topheader cf">
			<h1 class="site__title fl">Stowarzyszenie Studentów BEST Gliwice</h1>
			
			<div class="fr topmenu__info">
				<span><a href="">info@bestgliwice.pl</a></span>
				<span><a href="">32 237 10 30</a></span>
			</div>
		</div>

		<nav class="main-menu animated fadeInDowns">

			<div class="rwd_menu js-rwd_menu">
                <div class="rwd_menu__btn">
                    <span class="bar"></span>
                    <span class="bar"></span>
                    <span class="bar"></span>
                </div>
            </div>

			<div class="site__logo">
				<a href="/" class="site__logo__img">
					BEST Gliwice
				</a>
			</div>

			<ul id="menu" class="menu cf">
				<li id="menu_first" class="menu-item"><a href="#" class="js-rwd_menu"><svg height="24" version="1.1" width="24" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 64 64"><defs></defs><g>
		<path fill="none" stroke="#436eb3" stroke-width="5" stroke-linejoin="bevel" d="M12.972944,50.936147C12.972944,50.936147,51.027056,12.882035,51.027056,12.882035"></path>
		<path fill="none" stroke="#436eb3" stroke-width="5" stroke-linejoin="bevel" d="m 5.1969746,31.909063 53.8166424,0" transform="matrix(1,0,0,1,0,0)" style="opacity: 0;"></path>
		<path fill="none" stroke="#436eb3" stroke-width="5" stroke-linejoin="bevel" d="M12.972944,12.882035000000002C12.972944,12.882035000000002,51.027056,50.936147,51.027056,50.936147"></path>
	</g></svg></a></li>


		<?php

			$nav_menu = wp_nav_menu(
				array(
					'items_wrap' => '%3$s',
					'container' => false,
					'theme_location' => 'main-menu',
					'fallback_cb' => '__return_false',
				)
			); ?>
				<div class="menu_social">
					<a href="https://www.facebook.com/BESTgliwice" class="social_item social_item--fb"><span class="icon-facebook"></span></a>
					<a href="https://youtube.com/BESTgliwice" class="social_item social_item--yt"><span class="icon-youtube"></span></a>
				</div>
			</ul>
		
		</nav>

		</div>
		<div class="site">
			<!-- <a class="logo" href="<?php echo home_url(); ?>" title="<?php bloginfo( 'name' ); ?>">
				<h1 class="blog-name"><?php bloginfo( 'name' ); ?></h1>
				<div class="blog-description"><?php bloginfo( 'description' ); ?></div>
			</a>  -->
			
