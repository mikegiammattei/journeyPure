<?php require_once(get_stylesheet_directory() . "/head.php"); ?>
<?php

$hideLocSub = false;
$hideContactInfo = false;
global $Location;
if(isset($Location)){
	if($Location->LocSubNavClass->getHideMenu()){
		$hideLocSub = true;
	}
	if($Location->HeaderContactInfoClass->getHideMenu()){
		$hideContactInfo = true;
	}
}

?>
<?php
	/*require_once(get_stylesheet_directory() . "/classes/UploaderReview.php");
	$UploaderReview  = new \Uploader\Review();
	$UploaderReview->process();*/
?>
<header>
	<div class="container ">
		<div class="row align-items-center justify-content-between">
			<div class="col-md-auto col-5">
				<a class="logo" href="/">
					<img src="/wp-content/themes/journeyPure/assets/img/logo.png" alt="JourneyPure">
				</a>
			</div>
			<div class="col-7 d-block d-md-block d-lg-none" id="mobile-element">
				<div class="row no-gutters align-items-center">
					<div class="col-10 mr-auto">
						<button type="button" data-toggle="modal" data-target="#main-insurance-form" class="btn btn-outline-secondary"><i class="fas fa-id-card"></i> Check Insurance</button>
					</div>
					<div class="col-2">
						<figure class="mobile-trigger pull-right"></figure>
					</div>
				</div>
			</div>
			<div class="col-md-auto text-right nav-col-parent">
				<div class="row align-items-center justify-content-end">
					<div class="col-auto nav-col">
						<nav>
							<ul>
								<li>
									<a class="<?php (!$hideLocSub) ? 'has-child' : null; ?>" href="<?php the_permalink(25); ?>"><?php echo get_the_title(25); ?></a>

									<?php if(!$hideLocSub): ?>
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
									<?php endif; ?>
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
					<?php if(!$hideContactInfo): ?>
					<div class="col-auto d-md-none d-lg-block">
						<section class="contact">
							<a class="contact-link" href="<?php the_permalink(54); ?>"><?php echo get_the_title(54); ?></a>
							<a class="phone" href="<?php echo get_option('defaultPhone'); ?>"><?php echo get_option('defaultPhone'); ?></a>
						</section>
					</div>
					<?php endif; ?>
				</div>
			</div>
		</div>
	</div>
</header>
<?php require_once(get_stylesheet_directory(). '/assets/src/includes/components/check-insurance-form.php'); ?>
<?php /** Added my Mike */ ?>
<div class="main-wrapper">