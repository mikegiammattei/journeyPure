<?php require_once(get_stylesheet_directory() . "/head.php"); ?>
<header>
	<div class="container ">
		<div class="row align-items-center">
			<div class="col-md-6 ">
				<a href="/">
					<img class="logo" src="/wp-content/themes/journeyPure/assets/img/logo.png" alt="JourneyPure">
				</a>
			</div>
			<div class="col-md-6 ">
				<nav>
					<ul>
						<li>
							<a class="has-child" href="<?php the_permalink(25); ?>"><?php echo get_the_title(25); ?></a>
							<ul>
								<?php
								$request  = new WP_REST_Request( 'GET', '/wp/v2/locations-api' );
								$response = rest_do_request( $request );
								$data     = rest_get_server()->response_to_data( $response, true );

								if($data){
									foreach ($data as $location): ?>
									<li>
										<a href="<?php the_permalink($location['id']); ?>"><?php echo get_the_title($location['id']); ?></a>
									</li>
									<?php endforeach;
								}
								?>
							</ul>
						</li>

						<li>
							<a href="<?php the_permalink(52); ?>"><?php echo get_the_title(52); ?></a>
						</li>
						<li>
							<a href="<?php the_permalink(27); ?>"><?php echo get_the_title(27); ?></a>
						</li>

					</ul>
				</nav>
			</div>
		</div>
	</div>
</header>
