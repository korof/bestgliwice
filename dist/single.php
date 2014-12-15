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

		<?php
			if ( have_posts() ) : the_post();

				get_template_part( 'loop-single-page', get_post_format() ); ?>
				<div class="post-links">
					<?php previous_post_link( '%link', __( '&laquo; Previous post', 'bestgliwice' ) ) ?>
					<?php next_post_link( '%link', __( 'Next post &raquo;', 'bestgliwice' ) ); ?>
				</div>

			<?php

			else :

				get_template_part( 'loop', 'empty' );

			endif;
		?>

	</section>

<?php get_footer(); ?>