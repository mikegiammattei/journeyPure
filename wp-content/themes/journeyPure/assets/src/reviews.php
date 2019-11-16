<?php
/*
 * Template Name: Reviews
 */
?>

<?php

	include_once(get_stylesheet_directory() . '/classes/ReviewPage.php');
	$ReviewPage = new Pages\Review();

	/** Set tag for each review slider group */
	$ReviewPage->reviewTags(array("google","facebook","verified","yelp","rehab"));

	/** Page specific js*/
	//$jsFile = '';
	get_header();

 ?>

<div id="reviews-page">
	<section class="above-fold">
		<div class="row no-gutters">
			<div class="col-12 order-md-1 order-2">
				<div style="background-image: url('/wp-content/themes/journeyPure/assets/img/reviews-page.jpg')" class="img-container">
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
						<h1 class="page-heading text-white">We've Helped 10K+ People</h1>
						<h2 class="lead">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</h2>
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
							<h5 class="h1 text-capitalize"><?php echo $tag; ?> Reviews</h5>
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
									<data value="<?php echo $ReviewPage->reviewTotal; ?>"><?php echo $ReviewPage->reviewTotal; ?></data>  reviews
								</p>
								<p class="link post-review-link" data-toggle="modal" data-target="#leave-a-review">Leave a Review</p>
							</div>
						</div>

					</div>
					<div class="content-container-right">
						<div class="review-slide-container <?php echo (count($ReviewPage->reviews) == 1) ? ' pb-5' : ''; ?>" >
							<div class="review-slider" id="review-slide-<?php echo $tag; ?>" data-slick='{"slidesToShow": 1}' role="toolbar">
								<?php foreach ($ReviewPage->reviews as $reviews) : ?>
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
					<div class="divider"></div>
				</div>
				<?php endif; ?>
			<?php endforeach; ?>
		</div>
	</section>
	<section class="review-video" id="feature-video-container">
		<div class="container">
			<div class="row">
				<div class="col-md-7">
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
				<div class="col-md-5">
					<h3 class="h1">Video Section Heading</h3>
					<h4 id="video-title"><?php echo $firstItem['snippet']['title']; ?></h4>
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
							<p class="description"><?php echo wp_trim_words($object['snippet']['description'],10,'...'); ?></p>
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
</div>
<?php get_footer(); ?>
