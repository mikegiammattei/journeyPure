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
			<div class="default-container" style="background-image: url('<?php echo get_stylesheet_directory_uri(); ?>/assets/img/home-temp.jpg')">
				<div class="container">
					<div class="content">
						<h1 class="heading text-primary">Get Your Life Back</h1>
						<div class="lead text-primary">
							Your #1 Choice for <br>
							Drug & Alcohol Treatment
						</div>
						<div class="feature">
							<div class="row">
								<div class="col-md-6 d-flex align-items-stretch">
									<div class="card transparent">
										<div class="card-body">
											<h2>This is the heading text for the homepage above the fold section.</h2>
											<p>Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. Nulla consequat massa quis enim.</p>
											<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. Nulla consequat massa quis enim.</p>
										</div>
										<?php if($Homepage->ratings): ?>
											<div class="rating-section">
												<div class="row no-gutters">
													<?php foreach ($Homepage->ratings as $rating) : ?>
														<div class="col-md-6">
															<div class="ratings default inline">
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
								<div class="col-md-6 d-flex align-items-stretch">
									<div class="card transparent" >
										<div class="card-body" >
											<div id="homepage-above-fold-slider">
												<div class="slide-item">
													<div class="slide-img" data-base-img="https://images.pexels.com/photos/2983461/pexels-photo-2983461.jpeg?cs=srgb&dl=adorable-afro-hair-beautiful-2983461.jpg&fm=jpg">
														<div class="slide-tag">
															<div class="row justify-content-between no-gutters">
																<div class="col-6 d-flex align-items-stretch item-info-container">
																	<div class="item-info">
																		<span class="name">Person One</span>
																		<span class="info">Alumni Sober Since 2011</span>
																	</div>
																</div>
																<div class="col-6 d-flex align-items-stretch item-mark-container">
																	<div class="item-mark">
																		<span class="mark-item">10k+ Success Stories</span>
																		<span class="see-more-link ">See more <i class="fas fa-long-arrow-alt-right"></i></span>
																	</div>
																</div>
															</div>
														</div>
													</div>
												</div>
												<div class="slide-item">
													<div class="slide-img" data-base-img="/wp-content/themes/journeyPure/assets/img/journeyPure333.png">
														<div class="slide-tag">
															<div class="row justify-content-between no-gutters">
																<div class="col-6 d-flex align-items-stretch item-info-container">
																	<div class="item-info">
																		<span class="name">Person Two</span>
																		<span class="info">Alumni Sober Since 2011</span>
																	</div>
																</div>
																<div class="col-6 d-flex align-items-stretch item-mark-container">
																	<div class="item-mark">
																		<span class="mark-item">10k+ Success Stories</span>
																		<span class="see-more-link ">See more <i class="fas fa-long-arrow-alt-right"></i></span>
																	</div>
																</div>
															</div>
														</div>
													</div>
												</div>
											</div>
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
					<h3 class="heading text-primary">Get Your Life Back</h3>
					<div class="lead text-primary">
						Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. Nulla consequat massa quis enim.
					</div>
				</div>


				<div class="media d-inline-flex">
					<img class="mr-3" src="/wp-content/uploads/2019/10/myAvatar-1-150x150.png" alt="Generic placeholder image">
					<div class="media-body ">
						<h5 class="mt-0">John Smith</h5>
						<a href="/" class="btn btn-primary btn-sm"><i class="fab fa-facebook"></i> Facebook</a> 200k Success stories
					</div>
				</div>
			</div>
		</section>
		<section class="block-2">
			<div class="container">
				<h3 class="heading-prime h1">Subheader for section</h3>
				<div class="row">
					<div class="col-md-6">
						<div class="details">
							<?php
								$listItems = array();
								$listItems[] = array(
									'heading' => "One Box Title Section",
									'content' => "The content for box one. The content for box one. The content for box one. The content for box one. The content for box one."
								);
								$listItems[] = array(
									'heading' => "Two Box Title Section",
									'content' => "The content for box one. The content for box one. The content for box one. The content for box one. The content for box one."
								);
								$listItems[] = array(
									'heading' => "Three Box Title Section",
									'content' => "The content for box one. The content for box one. The content for box one. The content for box one. The content for box one."
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
							<h4 class="heading line-heading">
								<span>Featured On</span>
							</h4>
							<div class="media-outlets">
								<div class="row no-gutters">
									<div class="media-con">
										<div class="media-box">
											<div class="inner-con"> <img src="<?php echo  get_stylesheet_directory_uri(); ?>/assets/img/ref-logos/A&E.png" alt="A&amp;e  Logo"></div>
										</div>
									</div>
									<div class="media-con">
										<div class="media-box">
											<div class="inner-con"> <img src="<?php echo  get_stylesheet_directory_uri(); ?>/assets/img/ref-logos/HUFF_POST.png" alt="A&amp;e  Logo"></div>
										</div>
									</div>
									<div class="media-con">
										<div class="media-box">
											<div class="inner-con"> <img src="<?php echo  get_stylesheet_directory_uri(); ?>/assets/img/ref-logos/A&E.png" alt="A&amp;e  Logo"></div>
										</div>
									</div>
									<div class="media-con">
										<div class="media-box">
											<div class="inner-con"> <img src="<?php echo  get_stylesheet_directory_uri(); ?>/assets/img/ref-logos/HUFF_POST.png" alt="A&amp;e  Logo"></div>
										</div>
									</div>
									<div class="media-con">
										<div class="media-box">
											<div class="inner-con"> <img src="<?php echo  get_stylesheet_directory_uri(); ?>/assets/img/ref-logos/A&E.png" alt="A&amp;e  Logo"></div>
										</div>
									</div>
									<div class="media-con">
										<div class="media-box">
											<div class="inner-con"> <img src="<?php echo  get_stylesheet_directory_uri(); ?>/assets/img/ref-logos/HUFF_POST.png" alt="A&amp;e  Logo"></div>
										</div>
									</div>
									<div class="media-con">
										<div class="media-box">
											<div class="inner-con"> <img src="<?php echo  get_stylesheet_directory_uri(); ?>/assets/img/ref-logos/HUFF_POST.png" alt="A&amp;e  Logo"></div>
										</div>
									</div>
									<div class="media-con">
										<div class="media-box">
											<div class="inner-con"> <img src="<?php echo  get_stylesheet_directory_uri(); ?>/assets/img/ref-logos/A&E.png" alt="A&amp;e  Logo"></div>
										</div>
									</div>
									<div class="media-con">
										<div class="media-box">
											<div class="inner-con"> <img src="<?php echo  get_stylesheet_directory_uri(); ?>/assets/img/ref-logos/A&E.png" alt="A&amp;e  Logo"></div>
										</div>
									</div>
									<div class="media-con">
										<div class="media-box">
											<div class="inner-con"> <img src="<?php echo  get_stylesheet_directory_uri(); ?>/assets/img/ref-logos/HUFF_POST.png" alt="A&amp;e  Logo"></div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="col-md-6">
						<div id="homepage-multi-gallery" class="multi-gallery default">
							<div class="slide">
								<div class="row no-gutters">
									<div class="col-12">
										<a data-fancybox="gallery" href="/wp-content/themes/journeyPure/assets/img/journeyPure333.png">
											<div class="slide-img top-img" style="background-image: url('/wp-content/themes/journeyPure/assets/img/journeyPure333.png');">
												<div class="img-text">
													<span class="heading h3">Outpatient</span>
												</div>
											</div>
										</a>
									</div>
									<div class="col-6">
										<a data-fancybox="gallery" href="/wp-content/themes/journeyPure/assets/img/jp-cta-img-1920x628-wg.jpg">
											<div class="slide-img left-img" style="background-image: url('/wp-content/themes/journeyPure/assets/img/jp-cta-img-1920x628-wg.jpg');">
												<div class="img-text">
													<span class="heading h3">Beta</span>
												</div>
											</div>
										</a>
									</div>
									<div class="col-6">
										<a data-fancybox="gallery" href="/wp-content/themes/journeyPure/assets/img/jp-header-1920x1080.jpg">
											<div class="slide-img right-img" style="background-image: url('/wp-content/themes/journeyPure/assets/img/jp-header-1920x1080.jpg');">
											</div>
										</a>
									</div>
									<div class="col-12">
										<a data-fancybox="gallery" href="/wp-content/themes/journeyPure/assets/img/treatment1.jpg">
											<div class="slide-img bottom-img" style="background-image: url('/wp-content/themes/journeyPure/assets/img/treatment1.jpg');">
												<div class="img-text">
													<span class="heading h3">Other Text</span>
												</div>
											</div>
										</a>
									</div>
								</div>
							</div>
							<div class="slide">
								<div class="row no-gutters">
									<div class="col-12">
										<a data-fancybox="gallery" href="/wp-content/themes/journeyPure/assets/img/journeyPure333.png">
											<div class="slide-img top-img" style="background-image: url('/wp-content/themes/journeyPure/assets/img/journeyPure333.png');">
												<div class="img-text">
													<span class="heading h3">Outpatient</span>
												</div>
											</div>
										</a>
									</div>
									<div class="col-6">
										<a data-fancybox="gallery" href="/wp-content/themes/journeyPure/assets/img/jp-cta-img-1920x628-wg.jpg">
											<div class="slide-img left-img" style="background-image: url('/wp-content/themes/journeyPure/assets/img/jp-cta-img-1920x628-wg.jpg');">
												<div class="img-text">
													<span class="heading h3">Beta</span>
												</div>
											</div>
										</a>
									</div>
									<div class="col-6">
										<a data-fancybox="gallery" href="/wp-content/themes/journeyPure/assets/img/jp-header-1920x1080.jpg">
											<div class="slide-img right-img" style="background-image: url('/wp-content/themes/journeyPure/assets/img/jp-header-1920x1080.jpg');">
											</div>
										</a>
									</div>
									<div class="col-12">
										<a data-fancybox="gallery" href="/wp-content/themes/journeyPure/assets/img/treatment1.jpg">
											<div class="slide-img bottom-img" style="background-image: url('/wp-content/themes/journeyPure/assets/img/treatment1.jpg');">
												<div class="img-text">
													<span class="heading h3">Other Text</span>
												</div>
											</div>
										</a>
									</div>
								</div>
							</div>
							<div class="slide">
								<div class="row no-gutters">
									<div class="col-12">
										<a data-fancybox="gallery" href="/wp-content/themes/journeyPure/assets/img/journeyPure333.png">
											<div class="slide-img top-img" style="background-image: url('/wp-content/themes/journeyPure/assets/img/journeyPure333.png');">
												<div class="img-text">
													<span class="heading h3">Outpatient</span>
												</div>
											</div>
										</a>
									</div>
									<div class="col-6">
										<a data-fancybox="gallery" href="/wp-content/themes/journeyPure/assets/img/jp-cta-img-1920x628-wg.jpg">
											<div class="slide-img left-img" style="background-image: url('/wp-content/themes/journeyPure/assets/img/jp-cta-img-1920x628-wg.jpg');">
												<div class="img-text">
													<span class="heading h3">Beta</span>
												</div>
											</div>
										</a>
									</div>
									<div class="col-6">
										<a data-fancybox="gallery" href="/wp-content/themes/journeyPure/assets/img/jp-header-1920x1080.jpg">
											<div class="slide-img right-img" style="background-image: url('/wp-content/themes/journeyPure/assets/img/jp-header-1920x1080.jpg');">
											</div>
										</a>
									</div>
									<div class="col-12">
										<a data-fancybox="gallery" href="/wp-content/themes/journeyPure/assets/img/treatment1.jpg">
											<div class="slide-img bottom-img" style="background-image: url('/wp-content/themes/journeyPure/assets/img/treatment1.jpg');">
												<div class="img-text">
													<span class="heading h3">Other Text</span>
												</div>
											</div>
										</a>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>
		<section class="review-section">
			<div class="container">
				<div class="parent">
					<div class="content-container-left">
						<div class="details">
							<h3 class="h2 heading">Reviews</h3>
							<div class="tallies">
								<data class="avg display-4" value="4.8">4.8</data>,
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
									<data value="10">10</data>  reviews
								</p>
								<p class="link post-review-link">Leave a review</p>
							</div>
						</div>

					</div>
					<div class="content-container-right">
						<div class="review-slide-container <?php echo (count($Homepage->reviews) == 1) ? ' pb-5' : ''; ?>" >
							<div class="review-slide" data-slick='{"slidesToShow": 1}' role="toolbar">
								<?php foreach ($Homepage->reviews as $reviews) : ?>
									<div class="card">
										<div class="card-body">
											<div class="author-info">
												<div class="row">
													<div class="col-md-auto align-self-center">
														<img src="<?php echo $reviews->photo['image']; ?>" alt="<?php echo $reviews->photo['alt']; ?>">
													</div>
													<div class="col-auto align-self-center">
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
		<section class="block-3">
			<div class="container">
				<div class="heading">
					<h3 class="h1">Why it works?</h3>
				</div>
				<div class="row">
					<div class="col-lg-6">
						<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum</p>
						<div class="h4">Header Break</div>
						<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum</p>
						<p class="font-italic">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
						<p class="font-italic font-weight-bold">Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
					</div>
					<div class="col-lg-6">
						<div class="bio-default">
							<div class="row no-gutters">
								<?php foreach ($Homepage->bios as $bio): ?>
								<div class="col-md-6">
									<div class="bio">
										<figure style="background-image: url('<?php echo $bio->photo['image']; ?>');">
											<figcaption class="name"><?php echo $bio->name; ?></figcaption>
										</figure>
										<?php if($bio->sober_since): ?>
											<span class="sub-caption">Sober since: <?php echo $bio->sober_since ?></span>
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
					<h3 class="heading">It's Time to Get Help</h3>
					<div class="row">
						<div class="col-md-3">
							<div class="box">
								<i class="fab fa-laravel"></i>  Service One
							</div>
						</div>
						<div class="col-md-3">
							<div class="box">
								<i class="fas fa-anchor"></i>  Service Two
							</div>
						</div>
						<div class="col-md-3">
							<div class="box">
								<i class="fab fa-accusoft"></i>  Service Three
							</div>
						</div>
						<div class="col-md-3">
							<div class="box last">
								<i class="fas fa-store"></i>Service Four
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>
		<section class="faqs">
			<div class="container">
				<h3 class="heading">What's holding you back?</h3>
				<div class="accordion" id="location-faq-rehab">
					<?php foreach ( $Homepage->faqs as $index => $faq) : ?>
						<div class="card">
							<div class="card-header  <?php echo ($index != 0) ? "collapsed" : ""; ?>" data-toggle="collapse" data-target="#l-faq-<?php echo $index; ?>" aria-expanded="true" aria-controls="l-faq-<?php echo $index; ?>" id="l-faq-heading-<?php echo $index; ?>">
								<h5 class="card-title"><?php echo $faq->question; ?></h5>
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
					<span class="link" data-toggle="modal" data-target="#user-question-form-container">Ask a question</span>
				</div>
			</div>
		</section>
	</main>
</div>
<?php include(get_stylesheet_directory()  . '/assets/src/includes/components/ask-question-form.php'); ?>
<?php get_footer(); ?>
