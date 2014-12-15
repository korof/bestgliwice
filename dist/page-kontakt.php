<?php
/**
 * bestgliwice template for displaying Single-Posts
 *
 * @package WordPress
 * @subpackage bestgliwice
 * @since bestgliwice 1.0
 */

get_header(); ?>

	<section class="page-content primary" role="main">

		<header class="post__header"

		<?php
	
		if ( '' != get_the_post_thumbnail() ) : 
			$thumb = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), array(2048, 2048) );
			$url = $thumb['0'];
			?>
			style="background-image: url(<?php echo $url; ?>); height: 256px;"<?php
		endif; ?>
		>
			<h2><?php  //the_category(' '); ?></h2>
			<h1><?php the_title(); ?></h1>

		</header>
	
	<div class="kontakt">

		<div class="kontakt__dane">
			<?php
				if ( have_posts() ) : the_post();

					the_content();


				endif;
			?>
		</div>

		<div class="kontakt__form">
			<?php echo apply_filters('the_content', get_post_meta($post->ID, 'kontakt_form', true)); ?>
		</div>

	</div>

	</section>

<?php get_footer(); ?>