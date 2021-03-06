<?php
/**
 * Template Name: Reviews 2
 *
 * @author   Fernando Tessmann
 * @package  JourneyPure
 */

require_once get_stylesheet_directory() . '/classes/ReviewPage2.php';
$reviews = new Pages\ReviewPage2();

get_header();
?>

<!-- TEMPLATE: Reviews -->

<div id="jp-reviews" class="jp-reviews">

	<!-- SECTION: Top Section (Above Fold / Masthead) -->

	<section class="above-fold">
		<div class="default-container x-loc lazy" data-src="/wp-content/uploads/2020/07/journeypure-rehab-reviews.jpg">
			<div class="background-fade">
				<div class="content">
					<!-- <h1 class="heading-1">...</h1> -->
					<h1 class="heading text-primary">We've Helped 6K+ People Get Their Life Back on Track</h1>
					<hr>

					<div class="feature">
						<div class="row">
							<div class="col-lg-12 col-sm-12 top-text">
								<div class="card transparent">
									<div class="card-body">
										<p class="h3 text-center">Chance are, we can help you too.</p>
									</div>

									<?php if ( $reviews->ratings ) : ?>
										<div class="rating-section">
											<div class="row no-gutters">
												<?php foreach ( $reviews->ratings as $rating ) : ?>
													<div class="col-md-6 i-rating">
														<div class="ratings default inline lineup source-<?php echo esc_attr( sanitize_title( $rating->line_1 ) ); ?>">
															<div class="row no-gutters align-items-center">
																<div class="col-2">
																	<img class="lazy" data-src="<?php echo esc_attr( $rating->image['sizes']['medium'] ); ?>" alt="<?php echo esc_attr( get_post_meta( $rating->image['ID'], '_wp_attachment_image_alt', true ) ); ?>">
																</div>

																<div class="col-10">
																	<div class="content">
																		<?php if ( $rating->line_1 ) : ?>
																			<p><?php echo esc_html( $rating->line_1 ); ?></p>
																		<?php endif; ?>

																		<?php if ( 'stars' === $rating->controller ) : ?>
																			<?php for ( $i = 0; $i < $rating->stars; $i++ ) : ?>
																				<i class="fas fa-star"></i>
																			<?php endfor; ?>

																			<span class="star-txt-color"><?php echo esc_html( $rating->number_rating ); ?></span>
																		<?php else : ?>
																			<p class="text-value"><?php echo esc_html( $rating->line_2_text ); ?></p>
																		<?php endif; ?>

																		<?php if ( $rating->line_3 ) : ?>
																			<p class="sub"><?php echo esc_html( $rating->line_3 ); ?></p>
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
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>

	<!-- /SECTION: Top Section (Above Fold / Masthead) -->

	<!-- SECTION: Videos -->

	<?php if ( ! empty( $reviews->videos ) ) : ?>
		<section class="jp-reviews-section jp-reviews-videos">
			<div class="container">
				<div class="row">
					<div class="col-12">
						<h2 class="text-center jp-reviews-videos-title">You Can Do This!</h2>
						<p class="h3 text-center jp-reviews-videos-subtitle">Whether Journeypure is your first (and last) treatment experience, or you've spent decades in and out of other facilities... here's proof that you can feel better. There's no shame in getting help.</p>
					</div>
				</div>

				<div class="row">
					<div class="col-12 col-md-6 order-md-2 col-lg-7 order-lg-2">
						<?php foreach ( $reviews->videos as $video ) : ?>
							<div class="jp-reviews-videos-featured">
								<div class="embed-responsive embed-responsive-16by9 youtube-video-place lazy" data-src="<?php echo esc_attr( $video['image']['url'] ); ?>" data-yt-url="https://www.youtube.com/embed/<?php echo esc_attr( $video['youtube_video_id'] ); ?>">
									<span class="play-button"></span>
								</div>
							</div>

							<?php break; // Only the first video. ?>
						<?php endforeach; ?>
					</div>

					<div class="col-12 col-md-6 order-md-1 col-lg-5 order-lg-1">
						<div class="jp-reviews-videos-video-slider">
							<div class="jp-reviews-videos-video-slide">
								<div class="row">
									<?php foreach ( $reviews->videos as $i => $video ) : ?>
										<?php if ( $i > 0 && 0 === $i % 12 ) : ?>
											</div>
											</div>
											<div class="jp-reviews-videos-video-slide">
											<div class="row">
										<?php endif; ?>

										<div class="col-4 col-md-3">
											<div class="jp-reviews-videos-video">
												<div class="jp-reviews-videos-video-image-wrapper" data-youtube-video-id="<?php echo esc_attr( $video['youtube_video_id'] ); ?>" data-image="<?php echo esc_attr( $video['image']['url'] ); ?>">
													<img class="jp-reviews-videos-video-image lazy" data-src="<?php echo esc_attr( $video['image']['sizes']['thumbnail'] ); ?>" alt="<?php echo esc_attr( $video['image']['alt'] ); ?>">
													<span class="jp-reviews-videos-video-image-play-button play-button"></span>
												</div>

												<h6 class="jp-reviews-videos-video-title"><?php echo wp_kses_post( $video['title'] ); ?></h6>
											</div>
										</div>
									<?php endforeach; ?>
								</div>
							</div>
						</div>

						<div class="review-nav">
							<p class="link see-less-btn">Previous</p>
							<p class="link see-more-btn has-more"><data>Data Generated Via Script</data> More</p>
						</div>
					</div>
				</div>
			</div>
		</section>
	<?php endif; ?>

	<!-- /SECTION: Videos -->

	<!-- SECTION: Reviews -->

	<?php if ( ! empty( $reviews->reviews ) ) : ?>
		<section class="jp-reviews-section jp-reviews-reviews">
			<div class="container">
				<div class="row">
					<div class="col-12">
						<h2 class="text-center jp-reviews-reviews-title">Hundreds of Positive Reviews</h2>
						<p class="h3 text-center jp-reviews-reviews-subtitle">The powerful reviews found on sites like Google, Facebook and Rehabs.com are a reflection of us not cutting corners and doing what's right for each person - no matter what.</p>
					</div>
				</div>

				<div class="row">
					<div class="col-12">
						<div class="jp-reviews-reviews-box" data-page="1" data-cat="" data-url="<?php echo esc_attr( admin_url( 'admin-ajax.php' ) ); ?>" data-nonce="<?php echo esc_attr( wp_create_nonce( 'get_reviews' ) ); ?>">
							<div class="jp-reviews-reviews-box-inner">
								<div class="jp-reviews-reviews-top">
									<div class="jp-reviews-reviews-summary">
										<p class="jp-reviews-reviews-summary-avg"><?php echo esc_html( $reviews->review_avg ); ?></p>

										<div class="jp-reviews-reviews-summary-stars">
											<i class="fas fa-star"></i>
											<i class="fas fa-star"></i>
											<i class="fas fa-star"></i>
											<i class="fas fa-star"></i>
											<i class="fas fa-star"></i>
										</div>

										<p class="jp-reviews-reviews-summary-total"><?php echo esc_html( $reviews->review_total ); ?> reviews</p>
									</div>

									<div class="jp-reviews-reviews-filter">
										<label for="sort">Sort by:</label>

										<select id="sort">
											<!-- <option value="ml">Most Liked</option> -->
											<option value="n" selected="selected">Newest</option>
											<option value="o">Oldest</option>
											<option value="lr">Lowest Rated</option>
											<option value="hr">Highest Rated</option>
										</select>
									</div>
								</div>

								<div class="jp-reviews-reviews-reviews">
									<div class="jp-reviews-reviews-reviews-inner">
										<?php
											global $_reviews;
											$_reviews = $reviews;
											require get_stylesheet_directory() . '/assets/src/includes/components/review-items.php';
										?>
									</div>

									<button class="jp-reviews-reviews-loading-button btn btn-outline-secondary">Load more</button>
								</div>

								<?php require get_stylesheet_directory() . '/assets/src/includes/components/loading-icon.php'; ?>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>
	<?php endif; ?>

	<!-- /SECTION: Reviews -->

</div>

<!-- / TEMPLATE: Reviews -->

<?php get_footer();
