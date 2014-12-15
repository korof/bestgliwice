<?php
/**
 * bestgliwice template for displaying the standard Loop
 *
 * @package WordPress
 * @subpackage bestgliwice
 * @since bestgliwice 1.0
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<?php
	if ( '' != get_the_post_thumbnail() ) : 
		$thumb = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), array(2048, 2048) );
		$url = $thumb['0'];
		?>
		<header class="post__header" 
		style="background-image: url(<?php echo $url;  ?>)"<?php
	else: ?>
		<header class="post__header"
		style="height: 256px" <?php
	endif; ?>
	>
		<div class="header_group">
			<?php /* <h2><?php  the_category(' '); ?></h2> */ ?>
			<h1><?php

			if ( is_singular() ) :
				the_title();
			else : ?>

				<a href="<?php echo esc_url( get_permalink() ); ?>" rel="bookmark"><?php
					the_title(); ?>
				</a><?php

			endif; ?></h1>
		</div>
		

	</header>
<?php /*
	<div class="post-meta"><?php
		bestgliwice_post_meta(); ?>
	</div>
*/ ?>
	<div class="article__post-content">
		<div class="cf">

			<div class="article__article">

				<div class="article__article_content">


			<?php if ( is_front_page() || is_category() || is_archive() || is_search() ) : ?>

				<?php the_excerpt(); ?>
				<a href="<?php the_permalink(); ?>"><?php _e( 'Read more &raquo;', 'bestgliwice' ); ?></a>

			<?php else : ?>

				<?php the_content( __( 'Continue reading &raquo', 'bestgliwice' ) ); ?>

			<?php endif; ?>

			<?php
				wp_link_pages(
					array(
						'before'           => '<div class="linked-page-nav"><p>'. __( 'This article has more parts: ', 'bestgliwice' ),
						'after'            => '</p></div>',
						'next_or_number'   => 'number',
						'separator'        => ' ',
						'pagelink'         => __( '&lt;%&gt;', 'bestgliwice' ),
					)
				);
			?>
					<div class="article__footer">
						<div class="article__footer--col1"></div>
						<div class="article__footer--col2"></div>
						<div class="article__footer--col3"></div>
					</div>
				</div>
			</div>
			<?php
				$partner_img = get_field('logo');
				
			?>
			<div class="article__aside">
				<div class="header">
					<h2 class="h2--m">ZBLIŻAJĄCE SIĘ</h2>
					<h3 class="h3--m">WYDARZENIA</h3>
				</div>
				<?php @include('event_partial.php'); ?>

			</div>
		</div>
	</div>

</article>