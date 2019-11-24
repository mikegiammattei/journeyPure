<?php
/*
 * Template Name: Homepage
 */

include_once(get_stylesheet_directory() . '/classes/Homepage.php');
$Homepage = new Homepage\Homepage();

/** Page specific js*/
$jsFile = 'homepage';
get_header();

?>

<div id="homepage">
	<main>

		<?php $restApiPath = 'http://journeypure.net/rest-api'; ?>
		<section class="above-fold">
			<div class="default-container" style="background-image: url('<?php echo get_stylesheet_directory_uri(); ?>/assets/img/river_admin_03.jpg')">
				<div class="container">
					<div class="content">
						<h1 class="heading text-primary">Get Your Life Back on Track</h1>
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
											<p class="no-pad">When you're ready to talk about doing something different, give us a call. We have inpatient rehabs and outpatient clinics to meet you where you are. You don’t have to commit to coming here, or even to getting treatment, to reach out.</p>
										</div>
										<?php if($Homepage->ratings): ?>
											<div class="rating-section">
												<div class="row no-gutters">
													<?php foreach ($Homepage->ratings as $rating) : ?>
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
		<section class="block-1">
			<div class="container">
				<div class="header">
					<div class="lead">
						"Everyone comes in overwhelmed, but looking to make big changes quickly. This is where it starts. Where you learn to harness and hold on to hope."
					</div>
				</div>


				<div class="media d-inline-flex">
					<img class="mr-3" src="/wp-content/uploads/2019/11/kevin-lee.jpg" alt="Generic placeholder image">
					<div class="media-body ">
						<h5 class="mt-0">Kevin D. Lee</h5>
						<p>CEO & Founder</p>
					</div>
				</div>
			</div>
		</section>
		<section class="block-2">
			<div class="container">

				<div class="row">
					<div class="col-lg-6 col-sm-12">
					<h5 class="heading-prime h1">Let's talk about the facts</h5>
						<div class="details">
							<?php
								$listItems = array();
								$listItems[] = array(
									'heading' => "You're TWICE as likely to get better here",
									'content' => "According to the <a href=\"https://www.drugabuse.gov/publications/principles-drug-addiction-treatment-research-based-guide-third-edition/frequently-asked-questions/how-effective-drug-addiction-treatment\" target=\"_blank\">National Institute on Drug Abuse</a>, you can expect as little as 40% of people to be sober six months after starting treatment at another facility. That's not good. At JourneyPure, our success rate is 84%, and we stay in touch to help the few that do have a slip get right back on track."
								);
								$listItems[] = array(
									'heading' => "Your treatment is backed by 6K+ success stories",
									'content' => "We've helped thousands of people just like you get healthy and stay healthy.  We know what we're doing. We've seen it all. And, we can help you too."
								);
								$listItems[] = array(
									'heading' => "We're 99% sure you'll be satisfied with your care",
									'content' => "You deserve healthcare that listens and constantly improves.  The satisfaction rate as of " . date('F Y') . " is 99%."
								);
							?>
							<?php if($listItems): ?>
								<?php foreach ( $listItems as $index => $item) : ?>
									<div class="media media-number-list">
										<div class="align-self-start mr-3 list-number colored"><i class="fas fa-check"></i></div>
										<div class="media-body">
											<h5 class="mt-0"><?php echo $item['heading']; ?></h5>
											<?php echo $item['content']; ?>
										</div>
									</div>
								<?php endforeach; ?>
							<?php endif; ?>
						</div>
						<div class="featured-on">
							<h5 class="heading line-heading">
								<span>Featured On</span>
							</h5>
							<div class="media-outlets">
								<div class="row no-gutters">
									<div class="media-con">
										<div class="media-box">
											<div class="inner-con"> <img src="<?php echo  get_stylesheet_directory_uri(); ?>/assets/img/ref-logos/nyt-150x150.png" alt="The New York Times"></div>
										</div>
									</div>
									<div class="media-con">
										<div class="media-box">
											<div class="inner-con"> <img src="<?php echo  get_stylesheet_directory_uri(); ?>/assets/img/ref-logos/HUFF_POST.png" alt="The Huffington Post"></div>
										</div>
									</div>
									<div class="media-con">
										<div class="media-box">
											<div class="inner-con"> <img src="<?php echo  get_stylesheet_directory_uri(); ?>/assets/img/ref-logos/nbc-150x150.png" alt="NBC"></div>
										</div>
									</div>
									<div class="media-con">
										<div class="media-box">
											<div class="inner-con"> <img src="<?php echo  get_stylesheet_directory_uri(); ?>/assets/img/ref-logos/the-tennesseean-150x150.png" alt="Tennessean"></div>
										</div>
									</div>
									<div class="media-con">
										<div class="media-box">
											<div class="inner-con"> <img src="<?php echo  get_stylesheet_directory_uri(); ?>/assets/img/ref-logos/bbc-150x150.png" alt="BBC"></div>
										</div>
									</div>
									<div class="media-con">
										<div class="media-box">
											<div class="inner-con"> <img src="<?php echo  get_stylesheet_directory_uri(); ?>/assets/img/ref-logos/the-fix-150x150.png" alt="The Fix"></div>
										</div>
									</div>
									<div class="media-con">
										<div class="media-box">
											<div class="inner-con"> <img src="<?php echo  get_stylesheet_directory_uri(); ?>/assets/img/ref-logos/addiction-center-150x150.png" alt="Addiction Center"></div>
										</div>
									</div>
									<div class="media-con">
										<div class="media-box">
											<div class="inner-con"> <img src="<?php echo  get_stylesheet_directory_uri(); ?>/assets/img/ref-logos/npr-150x150.png" alt="NPR"></div>
										</div>
									</div>
									<div class="media-con">
										<div class="media-box">
											<div class="inner-con"> <img src="<?php echo  get_stylesheet_directory_uri(); ?>/assets/img/ref-logos/vanderbilt-150x150.png" alt="Venderbilt Health"></div>
										</div>
									</div>
									<div class="media-con">
										<div class="media-box">
											<div class="inner-con"> <img src="<?php echo  get_stylesheet_directory_uri(); ?>/assets/img/ref-logos/FORBES.png" alt="Forbes"></div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="col-lg-6 col-sm-12 facility-photos">
						<img src="/wp-content/uploads/2019/11/rehab-outpatient-collage.png" alt="Beautiful, clean indoors, plenty of outdoor space"/>
						<img src="/wp-content/uploads/2019/11/rehab-photo-collage-part-2.png" class="mobile-only" alt="Ocean and river views"/>
					</div>
				</div>
			</div>
		</section>
		<section class="review-section">
			<div class="container">
				<div class="parent">
					<div class="content-container-left">
						<div class="details">
							<h5 class="h1">Reviews</h5>
							<div class="tallies">
								<span class="avg display-4">4.6</span> ,
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
								 <data value="<?php echo $Homepage->reviewTotal; ?>">456</data>  Reviews
								</p>
								<p class="link post-review-link" data-toggle="modal" data-target="#leave-a-review">Leave a Review</p>
							</div>
						</div>

					</div>
					<div class="content-container-right">
						<div class="review-slide-container <?php echo (count($Homepage->reviews) == 1) ? ' pb-5' : ''; ?>" >
							<div class="review-slide" data-slick='{"slidesToShow": 1}' role="toolbar">
								<?php foreach ($Homepage->reviews as $reviews) :  break; ?>
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
													<?php if(isset($reviews->source_image['image'])): ?>
												<div class="review-logo">
													<img class="source-img" src="<?php echo $reviews->source_image['image']; ?>" alt="<?php echo $reviews->source_image['alt']; ?>">
												</div>
												<?php endif; ?>
													
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
								<p class="link see-more-btn has-more"> More</p>
							</div>
						</div>

					</div>
				</div>
			</div>
		</section>
		<section class="block-3">
			<div class="container">
				<div class="heading">
					<h5 class="h1">Treatment Here Works</h5>

				</div>
				<div class="row">
					<div class="col-lg-6">
					<h3>Even if you've been to dozens of other facilities before, the treatment here is different.  We set industry standards and hold ourselves accountable for your long-term success.</h3>
						<div class="h5">Evidence-Based Treatments</div>
						<p>A safe environment that combines medical care, holistic healing and various intense daily therapies is what works. While we constantly improve and test new options, our programs are fully guided by science.</p>
						<div class="h5">Personalized Treatment Plans</div>
						<p>Addiction and the issues behind it are very personal. You get the combination of proven treatments that maximize your time here. From virtual-reality therapy for combat veterans to imago marriage counseling, we'll do whatever it takes to help you get healthy and stay healthy.</p>
						<div class="h5">World-Renowned Experts</div>
						<p>We've built quite a reputation over the last decade, known throughout the country for quality care. That reputation attracts the county's leading addiction professionals. If you've sought treatment before, you know how critical it is to get individualized attention from people who actually care.</p>
						<div class="h5">Active Accountability for 1 Year </div>
						<p>Your Recovery Coach can be reached 24/7 through our free alumni app. The app also offers interactive games and logs that strengthen your mental health and reward you for continuing healthy habits.    </p>
					</div>
					<div class="col-lg-6">
						<div class="bio-default">
							<div class="row no-gutters">
								<?php foreach ($Homepage->bios as $bio): ?>
									<?php
									/** Set the range to start likes from if the object has never been like.
									 *  The total will be a random number between the range. If a specific number
									 *  is desired, then add the desired number as the min and max
									 */
									$Homepage->setInitialLikesStart(54,300);
									$likeIdentifier = $bio->identifier;
									$totalLikes  = $Homepage->setLikes($likeIdentifier);
									?>
								<div class="col-md-6">
									<div class="bio">
										<figure style="background-image: url('<?php echo $bio->photo['image']; ?>');">
											
										</figure>
										<?php if($bio->sober_since): ?>
										<div data-like-object="<?php echo $likeIdentifier; ?>" class="like-button"  data-placement="top" data-toggle="tooltip" <?php echo ($Homepage->isLikedBySession($likeIdentifier)) ? 'title="Already liked"' : 'title="Do you like?"'; ?>>
											<i class="fas fa-thumbs-up"></i> <data value="<?php echo $totalLikes; ?>"> <?php echo $totalLikes; ?></data>
										</div>
											<span class="sub-caption">
											<figcaption class="name"><?php echo $bio->name; ?></figcaption>
											Sober <span class="text-uppercase"> <?php echo $bio->sober_since ?></span></span>
										<?php endif; ?>
									</div>
								</div>
								<?php endforeach; ?>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>
		<section class="block-4">
			<div class="container">
				<div class="service-container">
					<h5 class="heading">It's Time to Get Help</h5>
					<div class="row">
						<div class="col-md-3">
							<div class="box">
								<i class="fas fa-user-md"></i>  Medical Detox
							</div>
						</div>
						<div class="col-md-3">
							<div class="box">
								<i class="fas fa-home"></i>  Inpatient Rehabs
							</div>
						</div>
						<div class="col-md-3">
							<div class="box">
								<i class="fas fa-clinic-medical"></i>  Outpatient Clinics
							</div>
						</div>
						<div class="col-md-3">
							<div class="box last">
								<i class="fas fa-mobile-alt"></i> App + Life Coaching
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>
		<section class="faqs">
			<div class="container">
				<h5 class="h1 text-center">What's holding you back?</h5>
				<div class="accordion" id="location-faq-rehab">
					<?php foreach ( $Homepage->faqs as $index => $faq) : ?>
						<div class="card">
							<div  data-parent="#location-faq-rehab" class="card-header  <?php echo ($index != 0) ? "collapsed" : ""; ?>" data-toggle="collapse" data-target="#l-faq-<?php echo $index; ?>" aria-expanded="true" aria-controls="l-faq-<?php echo $index; ?>" id="l-faq-heading-<?php echo $index; ?>">
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

							<div id="l-faq-<?php echo $index; ?>" class="collapse <?php echo ($index == 0) ? "show" : ""; ?>" aria-labelledby="l-faq-heading-<?php echo $index; ?>">
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
