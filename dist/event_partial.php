<div class="events">

		<?php
		$events = eo_get_events(array(
		        'numberposts'=>3,
		        'event_start_after'=>'today',
		        'showpastevents'=>true,//Will be deprecated, but set it to true to play it safe.
		   ));


		if ( $events ) {

			foreach ($events as $event):
				setup_postdata($event);

				
		          //Check if all day, set format accordingly
		          $format = 'F-j';
		          
		          $date = eo_get_the_start($format, $event->ID,null,$event->occurrence_id);
		          $date = explode('-', $date);
		    ?>
		          <div class="events__item">
		          	<div class="events_date">
			          <span class="date--month">	<?php echo $date[0]; ?> </span>
			          <span class="date--day"> <?php echo $date[1]; ?> </span>
			        </div>
			          <?php /*
			          $url = eo_get_add_to_google_link($event->ID,$event->occurrence_id);
					  echo '<a href="'.esc_url($url).'" title="Dodaj wydarzenie do kalendarza Google" class="add_event"><span class="icon icon-calendar"></span></a>';
					  */ ?>
					
			          <h3 class="events__title"><?php echo get_the_title($event->ID); ?></h3>
			          <a href="<?php echo get_permalink($event->ID); ?>" class="events__link">Dowiedz się więcej</a>
			          <?php /* <div class="events__text"><?php  the_tekstsmall($event->post_content,'','...',true,180); ?></div> */ ?>
		          </div>
		<?php
		     endforeach;

		     wp_reset_postdata();
		 }

			?>

	</div>