<?php

add_action( 'admin_menu', 'location_rating_stats_feature' );
function location_rating_stats_feature()
{
	add_submenu_page(
		'edit.php?post_type=ratings',
		'Location Stats',
		'Stats',
		'manage_options',
		'locations-rating-stats',
		'rating_stats_view'
	//'mt_settings_page'
	);

	function rating_stats_view(){

		$args = array(
			'post_type' => 'locations',
		);
		$loop = new WP_Query($args);
		wp_enqueue_style('locations-rating-stats', '/wp-content/themes/journeyPure/custom/ratings/style.css','','1.0.0');

		?>



		<form method="post">
			<h1>Location Rating Stats</h1>
			<?php
			global $wpdb;
			$table = $wpdb->prefix.'rating_loc_stats';
			if(isset($_POST['submit'])){

				if(!$wpdb->update($wpdb->prefix.'rating_loc_stats', array('data' => json_encode($_REQUEST)), array('id'=>1))){

					$data = array('data' => 'testing');
					$format = array('%s');
					$wpdb->insert($table,$data,$format);
					?>
					<div class="notice notice-success is-dismissible" style="margin-left: 0; margin-bottom: 15px;">
						<p><strong>Values saved.</strong></p>
						<button type="button" class="notice-dismiss">
							<span class="screen-reader-text">Dismiss this notice.</span>
						</button>
					</div>
					<?php
				}else{
					?>
					<div class="notice notice-success is-dismissible" style="margin-left: 0;">
						<p><strong>Values saved.</strong></p>
						<button type="button" class="notice-dismiss">
							<span class="screen-reader-text">Dismiss this notice.</span>
						</button>
					</div>
					<?php
				}
			}

			$results = $wpdb->get_results(
				$wpdb->prepare("SELECT `data` FROM {$table} WHERE id=%d", 1)
			);
			if($results){
				$results = json_decode($results[0]->data,true);
			}else{
				$results = array();
			}


			?>
		<?php while($loop->have_posts()): $loop->the_post(); ?>

			<div class="group">
				<h3><?php echo get_the_title(); ?></h3>
				<hr>
				<div class="flex">
					<div class="flex-item">
						<label for="<?php echo clean(get_the_title()); ?>-review-count">Review Count</label>
						<?php $key =  (clean(get_the_title()). '-review-count') ? : ''; ?>
						<input name="<?php echo clean(get_the_title()); ?>-review-count" value="<?php echo (isset($results[$key])) ? $results[$key] : ''; ?>" type="text">
					</div>
					<div class="flex-item">

						<label for="<?php echo clean(get_the_title()); ?>-review-avg">Review Average</label>
						<?php $key =  (clean(get_the_title()). '-review-avg') ? : ''; ?>
						<input name="<?php echo clean(get_the_title()); ?>-review-avg" value="<?php echo (isset($results[$key])) ? $results[$key] : ''; ?>" type="text">
					</div>
				</div>
			</div>

	<?php  endwhile; ?>
			<input type="submit" name="submit" value="Save">
		</form>
	<?php wp_reset_query();
	}
}
