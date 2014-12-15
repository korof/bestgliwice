<?php
/**
 * bestgliwice template for displaying the Front-Page
 *
 * @package WordPress
 * @subpackage bestgliwice
 * @since bestgliwice 1.0
 */

get_header(); ?>
<header class="site-header">

	<?php /* if ( '' != get_custom_header()->url ) : ?>
		<img src="<?php header_image(); ?>" class="custom-header" height="<?php echo get_custom_header()->height; ?>" width="<?php echo get_custom_header()->width; ?>" alt="" />
	<?php endif; */
	?>
	<section class="cover">
		<div class="owl-carousel">
		<?php 
			 query_posts('cat=11');
			 while (have_posts()) : the_post();
			 	$thumb = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), array(1920, 1920) );
				$url = $thumb['0'];
			 ?>
				 <div data-aload class="item" style="background-image: url(<?php echo $url; ?>);">
		<?php
					
					 // the_post_thumbnail( array(2048, 2048) ); 
					 //the_title();
		?>
				 	<!-- <a href="<?php get_field('link'); ?>"><img data-aload="<?php echo $url; ?>" alt=""></a>  -->
				 </div>
		<?php
			 endwhile;
			 wp_reset_query(); 
		?>
		</div>
	</section>
	

</header>

<div class="main__tekst">
	<h2 class="main__title"> 
		<?php the_field('naglowek_h1');   // ,13) ?>
	</h2>
	<h3 class="main__subtitle">
		<?php the_field('dopisek');   // ,13) ?>
	</h3>
</div>

<section class="cf">
	<div class="left_section">
		<div class="header">
			<h2 class="h2--m">ZBLIŻAJĄCE SIĘ</h2>
			<h3 class="h3--m">WYDARZENIA</h3>
			<div class="cf tac">
				<div class="events__icon"></div>	
			</div>
			<a href="#" class="btn btn--blue1">ZOBACZ WIĘCEJ</a>
		</div>
	</div>

	<?php @include('event_partial.php'); ?>

</section>

<section class="sect sect_1" data-aload>
	<header class="header">
		<h2 class="h2">ZDZIWISZ SIĘ ILE POTRAFI</h2>
		<h3 class="h3">ORGANIZACJA STUDENCKA</h3>
	</header>
	<a href="#" class="btn btn--orange">ZOBACZ NASZE PROJEKTY</a>
</section>

<section class="sect sect_news cf">
	<header class="header">
		<h2 class="h2">CO</h2>
		<h3 class="h3">NOWEGO?</h3>
	</header>
	<div class="news cf">
		
	<?php
		$query_string_news = array(
		      'post_type' => 'post',
		      'cat' => '16',
		      'posts_per_page' => 3,
		      'orderby' => 'post_date',
		      'order' => 'DESC');
		$i = 0;

		$my_q_n = new WP_Query( $query_string_news );

		if ( $my_q_n->have_posts() ) {

			while ($my_q_n->have_posts()) : $my_q_n->the_post();
			$date = get_the_date('F-j');
			$date = explode('-', $date);
			?>

			<?php if($i==0) : 
				 	$thumb = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), array(670,442) );
					$url = $thumb['0'];
				?>
				<div class="news__item--cover" style="background-image: url(
				 	<?php echo $url; ?>
				);" data-aload> 
					<div class="newscover__item">
						<div class="newscover_date">
							<span class="date--month">	<?php echo $date[0]; ?> </span>
							<span class="date--day"> <?php echo $date[1]; ?> </span>
						</div>
						<h3 class="news__title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
						<?php /*<div class="news__text"><?php the_tekstsmall(get_the_content(),'','...',true,180); ?></div> */?>
					</div>
				</div>
			<?php else : ?>

			<div class="news__item">
				<span class="date--month">	<?php echo $date[0]; ?> </span>
				<span class="date--day"> <?php echo $date[1]; ?> </span>
				<h3 class="news__title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
				<div class="news__text"><?php the_tekstsmall(get_the_content(),'','...',true,180); ?></div>
			
			</div>
			<?php endif;
			$i++;
			endwhile;
		}

	 if ($my_q_n)
		wp_reset_query();
	?>
	</div>
	<a href="" class="btn btn--blue1">WSZYSTKIE NEWSY</a>
</section>

<section class="sect sect_3" data-aload>
	<header class="header">
		<h2 class="h2">ROZWIJAMY</h2>
		<h3 class="h3">SWOJE UMIEJĘTNOŚCI</h3>
	</header>
	<a href="#" class="btn btn--orange">ZOBACZ NASZE PROJEKTY</a>
</section>

<section class="sect sect_mapa cf" data-aload>
	<div class="cf">
		<div class="left_section cf">
			<header class="header">
				<h2 class="h2">ZWIEDZAMY</h2>
				<h2 class="h3">EUROPĘ</h3>
			</header>
			<span class="mapa__tekst--small">MAMY</span>
			<span class="mapa__tekst--big">95</span>
			<span class="mapa__tekst--small">GRUP LOKALNYCH</span>
			<span class="mapa__tekst--small">W</span>
			<span class="mapa__tekst--big">35</span>
			<span class="mapa__tekst--small">KRAJACH EUROPY</span>
		</div>
	</div>
	<h3 class="mapa__tekst">Nie musisz należe do BEST-u by z nami podróżowac. <strong>Zaaplikuj na kursy naukowe.</strong></h3>
	<a href="http://kursy.bestgliwice.pl" class="btn btn--blue1">KURSY.BESTGLIWICE.PL</a>
</section>

<section class="sect sect_2" data-aload>
	<header class="header">
		<h2 class="h2">UŁATWIAMY STUDENTOM KONTAKT</h2>
		<h3 class="h3">Z PRZYSZŁYM PRACODAWCĄ</h3>
	</header>
	<a href="#" class="btn">SKONTAKTUJ SIĘ</a>
</section>

<section class="sect sect_firmy cf">
	<div class="left_section">
		<div class="header">
			<h2 class="h2--m">WSPÓŁPRACUJEMY</h2>
			<h3 class="h3--m">Z FIRMAMI</h3>
			<div class="cf tac">
				<div class="events__icon events__icon--partners"></div>	
			</div>
			<a href="#" class="btn btn--blue1">ZOBACZ WIĘCEJ</a>
		</div>
	</div>

	<div class="sect_partners">
		<h3>Naszą działalność wspierają</h3>
		<ul class="sect_partners_ul">
		<?php 
			query_posts('cat=20&&orderby=post_date&order=ASC');
			while (have_posts()) : the_post();
		  	$thumb = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'full' );
		 	$url = $thumb['0'];
		?>
				 <li>
				 	<a href="<?php the_permalink(); ?>"><img data-aload="<?php echo $url; ?>" width="235" height="88"></a> 
				 </li>
		<?php
			 endwhile;
			 wp_reset_query(); 
		?>
		</ul>
	</div>
	<div class="sect_partners media">
		<h3>Naszym wydarzeniom patronują</h3>
		<ul class="sect_partners_ul">
		<?php 
			 query_posts('cat=22&order=ASC');
			 while (have_posts()) : the_post();
			 $thumb = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'full' );
		 	 $url = $thumb['0'];
		?>
				 <li>
				 	<a href="<?php the_permalink(); ?>"><img data-aload="<?php echo $url; ?>" width="235" height="88"></a> 
				 </li>
		<?php
			 endwhile;
			 wp_reset_query(); 
		?>
		</ul>
	</div>
</section>

<section class="sect newsletter" data-aload>
	<header class="header">
		<h2 class="h2">ZAPISZ SIĘ</h2>
		<h3 class="h3">NA NEWSLETTER</h3>
	</header>
		<p>Przegapiłeś nasze wydarzenie? <br>A może chcesz otrzymywac ciekawe oferty pracy od naszych parnterów?</p>
		<?php the_field('newsletter');   // ,13) ?>
</section>

<?php /*
	<div class="home-widgets"><?php
		if ( function_exists( 'dynamic_sidebar' ) ) :
			dynamic_sidebar( 'home-sidebar' );
		endif; ?>
	</div>

	<section class="page-content primary" role="main">
		<?php
			if ( have_posts() ) :

				while ( have_posts() ) : the_post();

					get_template_part( 'loop', get_post_format() );

				endwhile;

			else :

				get_template_part( 'loop', 'empty' );

			endif;
		?>
		<div class="pagination">

			<?php get_template_part( 'template-part', 'pagination' ); ?>

		</div>
	</section>
	*/ ?>
</div>
<?php get_footer(); ?>