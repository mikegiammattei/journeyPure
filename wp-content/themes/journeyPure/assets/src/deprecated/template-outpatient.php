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
		<div class="note-box">												<h3>Due to COVID-19, outpatient services (including Suboxone) are online-only.</h3>						<p>See your doctor or therapist while at home using an app like FaceTime instead of coming in person. Doctors still prescribe medications. Call to schedule your virtual appointment.</p>
		<span class="note-cta"><i class="fas fa-phone"></i>Call Now <?php echo get_option('defaultPhone'); ?></span>


	</div>
		<section class="above-fold">


			<div class="default-container" style="background-image: url('/wp-content/uploads/2019/11/journeypure-outpatient-suboxone-clinic.jpg')">
				<div class="container">
					<div class="content">
						<h1 class="heading text-primary">Suboxone Clinics</h1>
						<div class="h3 text-primary">
							Locations Accross Tennessee, Kentucky & Florida or Online
						</div>
						<hr>
						<div class="feature">
							<div class="row">
								<div class="col-lg-6 col-sm-12 d-flex align-items-stretch">
									<div class="card transparent">
										<div class="card-body">
											<h5>Finally, you can live without being sick, high or constantly distracted.</h5>
											<p>The science of addiction medicine has advanced exponentially in the last decade. We now understand what's going on at the brainwave level and how Suboxone stabilizes your mind and body to be able to function normally.</p>
											<p class="no-pad">If you've been unable to stop on your own, medications like Suboxone can help.</p>
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
											<iframe class="embed-responsive-item" src="" data-src="https://www.youtube.com/embed/PQG6dqjlKNI?rel=0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>

		<section class="locations">
			<div class="container">
			<h2 class="h1">13 Clinic Locations</h2>
				<div class="row row-eq-height">
					<?php  foreach ($OutPatientLocation->locations as $location): ?>
						<div class="col-md-6 col-lg-4 details-col">
							<div class="details">
							<div class="row">
								<div class="col-7">
								<h5 class="name"><?php echo $location->facility_name; ?></h5>
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
								<div class="col-5">
									<div class="location-img" style="background-image: url('<?php echo ($location->location_image) ? : "https://journeypure.com/wp-content/uploads/2019/02/jp-locations-ftw-500x375.jpg"; ?>')">
									</div>
								</div>
							</div>
							</div>
						</div>
					<?php endforeach; ?>
					<div class="col-md-6 col-lg-4 details-col"><div class="details rehab-details"><h5>+ Inpatient Rehabs in Each State</h5>
					<p>If you're ready to do whatever it takes, inpatient rehab is the most effective form of treatment.</p>
	 <a href="/locations/tennessee/" class="btn btn-primary"><i class="fas fa-map-marker-alt"></i> Tennessee</a>

	  <a href="/locations/kentucky/" class="btn btn-primary"><i class="fas fa-map-marker-alt"></i> Kentucky</a>

	  	  <a href="/locations/florida/" class="btn btn-primary"><i class="fas fa-map-marker-alt"></i> Florida</a></h5></div></div>
				</div>

			</div>
		</section>
		<section class="insurance-section">
			<div class="container">
				<?php $_inc->get_insurance_banner(); ?>
			</div>
		</section>
		<section class="block-4">
			<div class="container">
				<h5 class="heading h1">The 3 Components of Treatment</h5>
				<h3 class="heading">Get help with addiction that fits into your life.</h3>
				<div class="card-deck">
					<div class="card">
						<img src="/wp-content/uploads/2020/01/brian-wind.jpg" class="card-img-top" alt="...">
						<div class="card-body">
							<h5 class="card-title">Medications</h5>
							<p class="card-text">Using medications in the treatment of drug addiction is recommended by nearly all healthcare authorities, including the World Health Organization and the National Institue of Health in the U.S. </p>
							<p>In addition to Suboxone, medications for dual-diagnosis issues (like depression or anxiety) stabilize other imbalances in your brain that contribute to drug use. </p>
						</div>
					</div>
					<div class="card">
						<img src="/wp-content/uploads/2019/11/therapy-suboxone-clinic.jpg" class="card-img-top" alt="...">
						<div class="card-body">
							<h5 class="card-title">Therapy</h5>
							<p class="card-text"> Therapy helps you look honestly at your life and motivations.  It shows you how to adjust your thinking to cope with stress, anxiety and pain without turning to drugs or alcohol.</p>
							<p>In group therapy specifically, you’re challenged and supported by those who understand the heaviness you live with every day.  It only takes a few hours per week to learn to see things from a healthier perspective.  </p>
						</div>
					</div>
					<div class="card">
						<img src="/wp-content/uploads/2019/11/journeypure-app.jpg" class="card-img-top" alt="...">
						<div class="card-body">
							<h5 class="card-title">App Work</h5>
							<p class="card-text">The JourneyPure app gives you all the tools you need to stay healthy long-term.  Since it's on your phone, you have access whenever you have time or are feeling triggered.</p>
							<p>You tackle the pillars of general health (like sleep and nutrition) and mental health (like gratitude and self-awareness).  You're also connected with your Recovery Coach to give you guidance — even after you finish treatment here.</p>
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
									(<data value="<?php echo $OutPatientLocation->reviewTotal; ?>"><?php echo $OutPatientLocation->reviewTotal; ?></data>  reviews)
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
				<h5 class="h1 text-center">Suboxone FAQs</h5>
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
						<span class="btn btn-primary" data-toggle="modal" data-target="#user-question-form-container">Ask a question</span>

				</div>
			</div>
		</section>
	</main>
</div>
<?php get_footer(); ?>
