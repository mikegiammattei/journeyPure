<?php
/*
 * Template Name: Reviews
 */
?>

<?php

	include_once(get_stylesheet_directory() . '/classes/ReviewPage.php');
	$ReviewPage = new Pages\Review();

	/** Set tag for each review slider group */
	$ReviewPage->reviewTags(array("google","facebook","rehabs.com"));

	/** Page specific js*/
	//$jsFile = '';
	get_header();

 ?>

<div id="reviews-page">
	<section class="above-fold">
		<div class="row no-gutters">
			<div class="col-12 order-md-1 order-2">
				<div style="background-image: url('/wp-content/uploads/2019/12/jp-reviews-banner.jpg')" class="img-container">
				</div>
				<div class="top-content">
					<div class="container">
						<div class="row justify-content-between">
							<div class="col-md-6 order-xl-1 order-lg-1 order-md-1 order-sm-2 order-last align-self-md-center">
							</div>
							<div class="col-md-6 order-md-2 order-sm-1">
								<?php if(isset($ReviewPage->ratings)): ?>
									<div class="rating-section">
										<?php foreach ($ReviewPage->ratings as $rating) : ?>
											<div class="ratings default block">
												<div class="row no-gutters align-items-center">
													<div class="col-auto mr-2">
														<img src="<?php echo $rating->image['sizes']['medium']; ?>" alt="<?php echo get_post_meta( $rating->image['ID'], '_wp_attachment_image_alt', true ); ?>">
													</div>
													<div class="col-auto">
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
										<?php endforeach; ?>
									</div>
								<?php endif; ?>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-12 order-md-2 order-1">
				<div class="container">
					<div class="heading">
						<h1 class="page-heading text-white">We've Helped 6K+ People Get Their Life Back on Track</h1>
						<h2 class="lead">Chance are, we can help you too.</h2>
					</div>
				</div>
			</div>
		</div>
	</section>
	<section class="review-section">
		<div class="container">
			<?php foreach ($ReviewPage->reviewTags as $index => $tag): ?>
				<?php $ReviewPage->setReviews($tag); ?>
				<?php if($ReviewPage->reviewTotal > 0): ?>
				<div class="parent <?php echo (($index + 1) == count($ReviewPage->reviewTags))? ' last' : ''; ?>">
					<div class="content-container-left">
						<div class="details">
							<h5 class="h1 text-capitalize"><?php echo $tag; ?> </h5>
							<div class="tallies">
								<data class="avg display-4" value="<?php echo $ReviewPage->reviewAvg; ?>"><?php echo $ReviewPage->reviewAvg; ?></data> /
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
									<data value="<?php echo $ReviewPage->reviewTotal; ?>"><?php echo $ReviewPage->reviewTotal; ?></data> Reviews
								</p>
								<p class="link post-review-link" data-toggle="modal" data-target="#leave-a-review">Leave a Review</p>
							</div>
						</div>
					</div>
					<div class="content-container-right">
						<div class="review-slide-container <?php echo (count($ReviewPage->reviews) == 1) ? ' pb-5' : ''; ?>" >
							<div class="review-slider" id="review-slide-<?php echo preg_replace('/\./','',$tag); ?>" data-slick='{"slidesToShow": 1}' role="toolbar">
								<?php foreach ($ReviewPage->reviews as $reviews) : ?>

									<div class="card">
										<div class="card-body">
											<div class="author-info">
												<div class="row justify-content-between">
													<div class="col-md-9 col-8">
														<div class="row">
															<div class="col-lg-auto col-md-3 col-4 align-self-center">
																<img src="" data-lazy="<?php echo $reviews->photo['image']; ?>" alt="<?php echo $reviews->photo['alt']; ?>">
															</div>
															<div class="col-lg-auto col-md-9 col-8 align-self-center">
																<h5 class="card-title"><?php echo $reviews->heading; ?></h5>
																<div class="stars">
																	<?php for($i=0; $i < $reviews->star_rating; $i++): ?>
																		<i class="fas fa-star"></i>
																	<?php endfor; ?>
																</div>
															</div>
														</div>
													</div>
													<?php if(isset($reviews->source_image['image'])): ?>
														<div class="col-md-3 col-4 align-self-center">
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
								<p class="link see-more-btn has-more"><data>Data Generated Via Script</data> More</p>
							</div>
						</div>
					</div>
					<div class="divider"></div>
				</div>
				<?php endif; ?>
			<?php endforeach; ?>
		</div>
	</section>
	<?php if(!empty($ReviewPage->videoObjects['items'][0])): ?>
	<section class="review-video" id="feature-video-container">
		<div class="container">
			<div class="row">
				<div class="col-md-7 order-md-1 order-2">
					<div class="feature-video" >
						<?php
						/** First item last provided is featured at page load.*/
						$firstItem = $ReviewPage->videoObjects['items'][0];
						?>
						<div id="first-video-play-btn" class="play-button first-video" data-video-id="<?php echo $firstItem['snippet']['resourceId']['videoId']; ?>">
							<i class="fas fa-play-circle"></i>
						</div>
						<div class="iframe-box" style="background-image: url(<?php echo $firstItem['snippet']['thumbnails']['standard']['url']; ?>) ; ">
							<div class="embed-responsive embed-responsive-16by9 " data-video-id="<?php echo $firstItem['snippet']['resourceId']['videoId']; ?>" data-video-status="featured">
								<iframe  id="iframeHolder" class="embed-responsive-item" allowfullscreen allow="autoplay;"> </iframe>
							</div>
						</div>
					</div>

				</div>
				<div class="col-md-5 order-md-2 order-1">
					<h2 class="h1">Video Review</h2>
					<h5 id="video-title"><?php echo $firstItem['snippet']['title']; ?></h5>
					<?php $description = nl2br($firstItem['snippet']['description']); ?>
					<p id="video-description"><?php echo $description; ?></p>
				</div>
			</div>
			<div class="video-preview-slider" data-slick='{"slidesToShow": 4}'>
				<?php  foreach ($ReviewPage->videoObjects['items'] as  $object): ?>
					<div class="slide-box">
						<div class="content-container"  data-video-status="idle" data-video-id="<?php echo $object['snippet']['resourceId']['videoId']; ?>">
							<div data-video-id="<?php echo $object['id']; ?>" class="image-box" style="background-image: url('<?php echo $object['snippet']['thumbnails']['high']['url']; ?>')"></div>
							<h5 class="heading h5"><?php echo $object['snippet']['title']; ?></h5>
						</div>
					</div>
				<?php endforeach; ?>
			</div>
			<div class="row">
				<div class="col-6">
					<p class="link see-less-btn pull-left">Previous</p>
				</div>
				<div class="col-6 text-right">
					<p class="link see-more-btn has-more pull-right"><data>Data Generated Via Script</data> More</p>
				</div>
			</div>
		</div>
	</section>
	<?php endif; ?>
		<section class="insurance-section">
		<div class="container">
			<?php $_inc->get_insurance_banner(); ?>
		</div>
	</section>
	<?php  if(count($ReviewPage->faqs) > 0): ?>
	<section class="faqs">
		<div class="container">
			<div class="row">
				<div class="col-xl-8 col-lg-6">
					<h5 class="h1">Review FAQs</h5>
					<div class="accordion" id="location-faq-rehab">
						<?php foreach ( $ReviewPage->faqs as $index => $faq) : ?>
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
				</div>
				<div class="col-xl-4 col-lg-6 align-self-center">
					<aside>
						<img src="/wp-content/uploads/2019/11/peter-addiction-recovery-300x249.png" style="
    filter: grayscale(100%);
">
						<?php
							$ReviewPage->setInitialLikesStart(54,300);
							$likeIdentifier = 'peter-addiction-recovery-300x249.png';
							$totalLikes  = $ReviewPage->setLikes($likeIdentifier);
						?>
						<div data-like-object="<?php echo $likeIdentifier; ?>" class="like-button"  data-placement="top" data-toggle="tooltip" <?php echo ($ReviewPage->isLikedBySession($likeIdentifier)) ? 'title="Already liked"' : 'title="Do you like?"'; ?>>
							<i class="fas fa-thumbs-up"></i>
							<data value="<?php echo $totalLikes; ?>"> <?php echo $totalLikes; ?></data>
						</div>
						<span class="sub-caption">
							<figcaption class="name">Peter K.</figcaption> Sober <span>APR 2017</span>
						</span>
					</aside>
				</div>
			</div>

		</div>
	</section>
	<?php endif; ?>

</div>
<?php get_footer(); ?>
