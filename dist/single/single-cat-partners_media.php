<?php
/**
 * bestgliwice template for displaying the Post from Parntes Category
 *
 * @package WordPress
 * @subpackage bestgliwice
 * @since bestgliwice 1.0
 */

get_header(); ?>

<section class="page-content primary partners" role="main">


		<?php
			if ( have_posts() ) : the_post();

				// get_template_part( 'loop', get_post_format() ); 

				if ( is_singular() ) : ?>

				<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

					<header class="post__header post__header--parterns">

					<?php
				/*
					if ( '' != get_the_post_thumbnail() ) : 
						$thumb = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), array(2048, 2048) );
						$url = $thumb['0'];
						?>
						style="background-image: url(<?php echo $url;  ?>)"<?php
					endif; ?>
					>
						<!-- <h2><?php  // the_category(' '); ?></h2> --> */ ?>
					<div class="header_group">
						<h1><?php

						if ( is_singular() ) :
							the_title();
						else : ?>

							<a href="<?php echo esc_url( get_permalink() ); ?>" rel="bookmark"><?php
								the_title(); ?>
							</a><?php

						endif; ?></h1>
					</div>
						<?php
							if ( '' != get_the_post_thumbnail() ) : ?>
								<div class="article__logo"><?php the_post_thumbnail(); ?></div>
						<?php
							endif;  ?>
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
								<div class="article__aside--img" style="background-image: url(<?php echo $partner_img['sizes']['large']; ?> );"></div>
							</div>
						</div>

						<div class="cf tac">
							<h3>Chcesz dowiedziec się więcej? <strong>Wejdź na</strong></h3><br>
							<a href="http://www.ingbank.pl/kariera" class="btn btn--blue1">INGBANK.PL/kariera</a>
						</div>
					</div>
					

				</article>
			
			<?php //no_singular
				else : ?>

			<?php endif; ?>

	<?php

			else :

				get_template_part( 'loop', 'empty' );

			endif;
		?>

	</section>
<?php get_footer(); ?>