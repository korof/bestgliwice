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

	<div class="category_item"

	<?php
/*
	if ( '' != get_the_post_thumbnail() ) : 
		$thumb = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), array(2048, 2048) );
		$url = $thumb['0'];
		?>
		style="background-image: url(<?php echo $url;  ?>)"<?php
	endif;*/ ?>
	>
		


		 <?php

			if ( '' != get_the_post_thumbnail() ) :
				 the_post_thumbnail();
			endif;
 /*
	<div class="post-meta"><?php
		bestgliwice_post_meta(); ?>
	</div>
*/ ?>
		<div class="post-content">

				<h2><?php

				if ( is_singular() ) :
					the_title();
				else : ?>

					<a href="<?php echo esc_url( get_permalink() ); ?>" rel="bookmark"><?php
						the_title(); ?>
					</a><?php

				endif; ?></h2>


				<?php if ( is_front_page() || is_category() || is_archive() || is_search() ) : ?>

					<?php //the_excerpt(); ?>
					<?php /*<a href="<?php the_permalink(); ?>"><?php _e( 'Read more &raquo;', 'bestgliwice' ); ?></a> */ ?>

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
		</div>
	</div>

</article>