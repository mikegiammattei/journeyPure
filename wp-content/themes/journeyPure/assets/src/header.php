<?php require_once(get_stylesheet_directory() . "/head.php"); ?>
<header>
	<div class="container ">
		<div class="row align-items-center justify-content-between">
			<div class="col-sm-auto">
				<a class="logo" href="/">
					<img src="/wp-content/themes/journeyPure/assets/img/logo.png" alt="JourneyPure">
				</a>
			</div>
			<div class="col-sm-6 d-block d-md-block d-lg-none">
				Test
			</div>
			<div class="col-auto text-right">
				<div class="row align-items-center justify-content-end">
					<div class="col-auto">
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
								<li>
									<button type="button" data-toggle="modal" data-target="#main-insurance-form" class="btn btn-outline-secondary"><i class="fas fa-id-card"></i> Check Insurance</button>
								</li>

							</ul>
						</nav>
					</div>
					<div class="col-auto">
						<section class="contact">
							<a class="contact-link" href="<?php the_permalink(54); ?>"><?php echo get_the_title(54); ?></a>
							<a class="phone" href="<?php echo get_option('defaultPhone'); ?>"><?php echo get_option('defaultPhone'); ?></a>
						</section>
					</div>
				</div>
			</div>
		</div>
	</div>
</header>
<div class="modal fade" id="main-insurance-form" tabindex="-1" role="dialog" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				...
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
				<button type="button" class="btn btn-primary">Save changes</button>
			</div>
		</div>
	</div>
</div>
