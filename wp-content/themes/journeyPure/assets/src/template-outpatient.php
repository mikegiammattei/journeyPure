<?php
/*
 * Template Name: Outpatient Location
 */

include_once(get_stylesheet_directory() . '/classes/OutpatientLocations.php');
$OutPatientLocation = new Pages\Outpatient();

/** Page specific js*/
//$jsFile = '';
get_header();

?>

<div id="outpatient">
	<main>
		<?php $restApiPath = 'http://journeypure.net/rest-api'; ?>
		<section class="above-fold">
			<div class="default-container" style="background-image: url('<?php echo get_stylesheet_directory_uri(); ?>/assets/img/jp-header-1920x1080.jpg')">
				<div class="container">
					<div class="content">
						<h1 class="heading text-primary">Outpatient Treatment</h1>
						<div class="h3 text-primary">
							Your #1 Choice for Drug & Alcohol Treatment
						</div>
						<hr>
						<div class="feature">
							<div class="row">
								<div class="col-lg-6 col-sm-12 d-flex align-items-stretch">
									<div class="card transparent">
										<div class="card-body">
											<h5>If you're looking for help that actually helps you, you're in the right place.</h5>
											<p>Treatment here is covered by insurance — backed by a 99% satisfaction rating and hundreds of positive reviews online.</p>
											<p class="no-pad">When you're ready to talk about doing something different, give us a call. We have both inpatient rehabs and outpatient clinics to meet you where you're at. You don't have to be committed to coming here or even to getting treatment to reach out.</p>
										</div>
										<?php if($OutPatientLocation->ratings): ?>
											<div class="rating-section">
												<div class="row no-gutters row-eq-height">
													<?php foreach ($OutPatientLocation->ratings as $rating) : ?>
														<div class="col-md-6 i-rating">
															<div class="ratings default inline lineup">
																<div class="row no-gutters align-items-center">
																	<div class="col-2">
																		<img src="<?php echo $rating->image['sizes']['medium']; ?>" alt="<?php echo get_post_meta( $rating->image['ID'], '_wp_attachment_image_alt', true ); ?>">
																	</div>
																	<div class="col-10">
																		<div class="content">
																			<?php if($rating->line_1): ?>
																				<p><?php echo $rating->line_1; ?></p>
																			<?php endif; ?>
																			<?php if($rating->controller == 'stars'): ?>
																				<?php for($i=0; $i < $rating->stars; $i++): ?>
																					<i class="fas fa-star"></i>
																				<?php endfor; ?>
																				<span class="star-txt-color"><?php echo $rating->number_rating; ?></span>
																			<?php else: ?>
																				<p class="text-value"><?php echo $rating->line_2_text; ?></p>
																			<?php endif; ?>
																			<?php if($rating->line_3): ?>
																				<p class="sub"><?php echo $rating->line_3; ?></p>
																			<?php endif; ?>
																		</div>
																	</div>
																</div>
															</div>
														</div>
													<?php endforeach; ?>
												</div>
											</div>
										<?php endif; ?>
									</div>
								</div>
								<div class="col-lg-6 col-sm-12 d-flex align-items-stretch">
									<div class="card card-body h-100 justify-content-center transparent" style="width: 100%;">
										<div class="embed-responsive embed-responsive-16by9">
											<iframe class="embed-responsive-item" src="" data-src="https://www.youtube.com/embed/Gd1Dza355X8?rel=0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>
		<section class="insurance-section">
			<div class="container">
				<?php $_inc->get_insurance_banner(); ?>
			</div>
		</section>
		<section class="locations">
			<div class="container">
				<div class="row row-eq-height">
					<?php  foreach ($OutPatientLocation->locations as $location): ?>
						<div class="col-md-6 col-lg-4 details-col">
							<div class="details">
								<h3 class="name"><?php echo $location->facility_name; ?></h3>
								<?php if($location->ratings->number): ?>
								<div class="star-rating">
									<span class="rating"><?php echo $location->ratings->number; ?></span>
									<?php for( $i=1; $i <= $location->ratings->stars; $i++) : ?>
										<i class="fas fa-star"></i>
									<?php endfor; ?>

									<?php if(fmod($location->ratings->stars, 1) !== 0.00) : ?>
										<i class="fas fa-star-half-alt"></i>
									<?php endif; ?>
									<span class="count">(<?php echo $location->ratings->count; ?>)</span>
								</div>
								<?php endif; ?>
								<p class="count"><?php echo $location->address; ?></p>
							</div>
						</div>
					<?php endforeach; ?>
				</div>

			</div>
		</section>
		<section class="block-4">
			<div class="container">
				<h5 class="heading h1">Block 4 Section</h5>
				<h3 class="heading">It is a long established fact that a reader will be distracted by the readable uncover many web sites still in their infancy. </h3>
				<div class="card-deck">
					<div class="card">
						<img src="/wp-content/uploads/2019/11/carf-bg-fade-02.jpg" class="card-img-top" alt="...">
						<div class="card-body">
							<h5 class="card-title">Section Heading</h5>
							<p class="card-text"> It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using 'Content here, content here', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for 'lorem ipsum' will uncover many web sites still in their infancy.</p>
							<p></p>
						</div>
					</div>
					<div class="card">
						<img src="/wp-content/uploads/2019/11/legitscripts-bg-fade-01.jpg" class="card-img-top" alt="...">
						<div class="card-body">
							<h5 class="card-title">Section Heading</h5>
							<p class="card-text"> LegitScript is the authority on <b>ethical healthcare marketing</b>. Most other large providers in our industry do not meet these high standards. We were one of the first companies in the world to earn the LegitScript certification, which is backed by Visa, MasterCard, Google, Microsoft and Facebook. The certification assures what we say about ourselves and our facilities are <b>true and transparent</b>. It also ensures we do not accept any form of payment for referrals or work with companies that do.</p>
						</div>
					</div>
					<div class="card">
						<img src="http://jp.websiteservices.org/wp-content/uploads/2019/11/naatp-bg-fade-01.jpg" class="card-img-top" alt="...">
						<div class="card-body">
							<h5 class="card-title">Section Heading</h5>
							<p class="card-text">It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using 'Content here, content here', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for 'lorem ipsum' will uncover many web sites still in their infancy.</p>
						</div>
					</div>
				</div>
			</div>
		</section>
		<?php if($OutPatientLocation->reviewTotal): ?>
		<section class="review-section">
			<div class="container">
				<div class="parent">
					<div class="content-container-left">
						<div class="details">
							<h5 class="h1">Reviews</h5>
							<div class="tallies">
								<data class="avg display-4" value="<?php echo $OutPatientLocation->reviewAvg; ?>"><?php echo $OutPatientLocation->reviewAvg; ?></data>,
								<data class="cap" value="5"> 5</data>
							</div>
							<div class="stars">
								<?php for($i=0; $i < 5; $i++): ?>
									<i class="fas fa-star"></i>
								<?php endfor; ?>
							</div>
							<div class="sub-text">
								<p>Average Rating</p>
								<p class="review-count">
									<data value="<?php echo $OutPatientLocation->reviewTotal; ?>"><?php echo $OutPatientLocation->reviewTotal; ?></data>  reviews
								</p>
								<p class="link post-review-link" data-toggle="modal" data-target="#leave-a-review">Leave a Review</p>
							</div>
						</div>

					</div>
					<div class="content-container-right">
						<div class="review-slide-container <?php echo (count($OutPatientLocation->reviews) == 1) ? ' pb-5' : ''; ?>" >
							<div class="review-slide" data-slick='{"slidesToShow": 1}' role="toolbar">
								<?php foreach ($OutPatientLocation->reviews as $reviews) : ?>
									<div class="card">
										<div class="card-body">
											<div class="author-info">
												<div class="row">
													<div class="col-md-auto align-self-center">
														<img src="<?php echo $reviews->photo['image']; ?>" alt="<?php echo $reviews->photo['alt']; ?>">
													</div>
													<div class="col-md-auto align-self-center">
														<h5 class="card-title"><?php echo $reviews->heading; ?></h5>
														<div class="stars">
															<?php for($i=0; $i < $reviews->star_rating; $i++): ?>
																<i class="fas fa-star"></i>
															<?php endfor; ?>
														</div>

													</div>
												</div>
											</div>
											<div class="review-text">
												<?php echo $reviews->review_text; ?>
											</div>
										</div>
									</div>
								<?php endforeach; ?>
							</div>

							<div class="review-nav">
								<p class="link see-less-btn">Previous</p>
								<p class="link see-more-btn has-more"><data>Data Generated Via Script</data> More</p>
							</div>
						</div>

					</div>
				</div>
			</div>
		</section>
		<?php endif; ?>
		<section class="faqs">
			<div class="container">
				<h5 class="h1 text-center">What's holding you back?</h5>
				<div class="accordion" id="location-faq-rehab">
					<?php foreach ( $OutPatientLocation->faqs as $index => $faq) : ?>
						<div class="card">
							<div class="card-header  <?php echo ($index != 0) ? "collapsed" : ""; ?>" data-toggle="collapse" data-target="#l-faq-<?php echo $index; ?>" aria-expanded="true" aria-controls="l-faq-<?php echo $index; ?>" id="l-faq-heading-<?php echo $index; ?>">
								<div class="question-box">
									<div class="icon">
										<i class="fas fa-plus-circle off"></i>
										<i class="fas fa-minus-circle on"></i>
									</div>
									<div class="title">
										<h5 class="card-title"><?php echo $faq->question; ?></h5>
									</div>
								</div>
							</div>

							<div id="l-faq-<?php echo $index; ?>" class="collapse <?php echo ($index == 0) ? "show" : ""; ?>" aria-labelledby="l-faq-heading-<?php echo $index; ?>" data-parent="#location-faq-rehab">
								<div class="card-body">
									<?php echo $faq->answer; ?>
								</div>
							</div>
						</div>
					<?php endforeach; ?>
				</div>
				<div class="ask-a-question">
						<span class="btn btn-primary" data-toggle="modal" data-target="#user-question-form-container"><i class="fas fa-comment-dots"></i> Ask a question</span>

				</div>
			</div>
		</section>
	</main>
</div>
<?php include(get_stylesheet_directory()  . '/assets/src/includes/components/ask-question-form.php'); ?>
<?php get_footer(); ?>
