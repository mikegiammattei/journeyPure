<?php
/**
 * Locations CTP template
 *
 * @author   Fernando Tessmann
 * @package  JourneyPure
 */

require_once get_stylesheet_directory() . '/classes/Location.php';
$location = new Locations\Location();

$reviews_category_ids = get_field( 'reviews_category' );
require_once get_stylesheet_directory() . '/classes/ReviewPage2.php';

$reviews = new Pages\ReviewPage2( true, $reviews_category_ids );

get_header();
?>

<!-- TEMPLATE: Locations CPT -->

<div id="single-location" class="jp-single-loc">

	<!-- SECTION: Top Section (Above Fold / Masthead) -->

	<section class="above-fold">
		<div class="default-container x-loc lazy" data-src="<?php echo esc_attr( $location->above_fold->image ); ?>">
			<div class="background-fade">
				<div class="content">
					<?php if ( $location->above_fold->h1 ) : ?>
						<h1 class="heading-1"><?php echo wp_kses_post( $location->above_fold->h1 ); ?></h1>
					<?php endif; ?>

					<?php if ( $location->above_fold->heading ) : ?>
						<h2 class="heading text-primary"><?php echo wp_kses_post( $location->above_fold->heading ); ?></h2>
					<?php endif; ?>

					<div class="feature">
						<div class="row">
							<div class="col-lg-12 col-sm-12 top-text">
								<div class="card transparent">
									<div class="card-body text-center">
										<?php echo wp_kses_post( $location->above_fold->subheading ); ?>
									</div>

									<?php if ( $location->ratings ) : ?>
										<div class="rating-section">
											<div class="row no-gutters">
												<?php foreach ( $location->ratings as $rating ) : ?>
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

							<?php if ( $location->above_fold->youtube_video_id && $location->above_fold->youtube_video_thumbnail ) : ?>
								<div class="col-lg-12 col-sm-12 d-flex align-items-stretch">
									<div class="card card-body h-100 justify-content-center transparent" style="width: 100%;">
										<div class="embed-responsive embed-responsive-16by9 youtube-video-place lazy" data-src="<?php echo esc_attr( $location->above_fold->youtube_video_thumbnail ); ?>" data-yt-url="https://www.youtube.com/embed/<?php echo esc_attr( $location->above_fold->youtube_video_id ); ?>">
											<span class="play-button"></span>
										</div>
									</div>
								</div>
							<?php endif; ?>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>

	<!-- /SECTION: Top Section (Above Fold / Masthead) -->

	<!-- SECTION: Highlights V2 -->

	<?php if ( isset( $location->highlights_v2 ) ) : ?>
		<section class="jp-single-loc-section jp-single-loc-highlights-v2">
			<div class="container">
				<div class="row">
					<div class="col-12 col-md-10 offset-md-1 col-lg-8 offset-lg-2">
						<?php if ( ! empty( $location->highlights_v2->heading ) ) : ?>
							<h2 class="text-center"><?php echo wp_kses_post( $location->highlights_v2->heading ); ?></h2>
						<?php endif; ?>

						<?php if ( $location->highlights_v2->list ) : ?>
							<div class="list-container">
								<?php foreach ( $location->highlights_v2->list as $index => $item ) : ?>
									<div class="list-item">
										<div class="content">
											<div class="content-inner">
												<?php if ( ! empty( $item['heading'] ) ) : ?>
													<h5 class="item-title"><?php echo wp_kses_post( $item['heading'] ); ?></h5>
												<?php endif; ?>

												<?php if ( ! empty( $item['content'] ) ) : ?>
													<?php echo wp_kses_post( $item['content'] ); ?>
												<?php endif; ?>
											</div>
										</div>

										<?php if ( ! empty( $item['review'] ) ) : ?>
											<div class="review">
												<blockquote class="review-text">
													<?php echo wp_kses_post( $item['review']->review_text ); ?>
												</blockquote>

												<div class="review-author">
													<div class="review-author-image">
														<img class="lazy" data-src="<?php echo esc_attr( $item['review']->photo['image'] ); ?>" alt="<?php echo esc_attr( $item['review']->photo['alt'] ); ?>">
													</div>

													<div class="review-author-info">
														<h5 class="review-author-title"><?php echo esc_html( $item['review']->heading ); ?></h5>

														<?php if ( ! empty( $item['review']->sober_since ) ) : ?>
															<p class="review-author-sober-since">
																<?php echo wp_kses_post( $item['review']->sober_since ); ?>
															</p>
														<?php endif; ?>

														<div class="review-author-extra">
															<div class="review-author-stars">
																<?php for ( $i = 0; $i < $item['review']->star_rating; $i++ ) : ?>
																	<i class="review-author-star fas fa-star"></i>
																<?php endfor; ?>
															</div>

															<?php if ( ! empty( $item['review']->source_image['image'] ) ) : ?>
																<div class="review-author-logo">
																	<img class="review-author-source-image lazy" data-src="<?php echo esc_attr( $item['review']->source_image['image'] ); ?>" alt="<?php echo esc_attr( $item['review']->source_image['alt'] ); ?>">
																</div>
															<?php endif; ?>
														</div>
													</div>
												</div>
											</div>
										<?php endif; ?>
									</div>
								<?php endforeach; ?>
							</div>
						<?php endif; ?>
					</div>

					<?php if ( true === $location->highlights_v2->show_insurance_logos ) : ?>
						<div class="col-12 col-md-10 offset-md-1 col-lg-8 offset-lg-2">
							<div class="list-container">
								<div class="list-item">
									<div class="content">
										<div class="content-inner">
											<h5 class="item-title">Plus, We're In-Network with Insurance</h5>
											<p>We're trusted by all the big health insurance companies and policies as small as the Coushatta Tribe of Louisiana. Any cost to you is as low as possible.</p>

											<div class="logos-wrapper">
												<img class="logos lazy" data-src="<?php echo esc_attr( get_stylesheet_directory_uri() ); ?>/assets/img/insurance2.png" alt="Aetna, Anthem Blue Cross Blue Sheild, Cigna Heath Insurances">
												<img class="logos lazy" data-src="<?php echo esc_attr( get_stylesheet_directory_uri() ); ?>/assets/img/insurance1.png" alt="Amerihealth, United Healthcare, Humana, Tricare and 43 More Insurances">
											</div>

											<div class="btn-wrapper">
												<button type="button" data-toggle="modal" data-target="#main-insurance-form" class="btn btn-secondary"><span class="fas fa-id-card"></span> Check Insurance</button>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					<?php endif; ?>
				</div>
			</div>
		</section>
	<?php endif; ?>

	<!-- /SECTION: Highlights V2 -->

	<!-- SECTION: Photos -->

	<?php if ( ! empty( $location->gallery ) ) : ?>
		<div class="image-gallery" data-slick='{"slidesToShow": <?php echo count( $location->gallery ); ?>}' role="toolbar">
			<?php foreach ( $location->gallery as $index => $gallery ) : ?>
				<figure>
					<img class="lazy" data-src="<?php echo esc_attr( $gallery->medium ); ?>" alt="<?php echo esc_attr( $gallery->alt ); ?>">
				</figure>
			<?php endforeach; ?>
		</div>
	<?php endif; ?>

	<!-- /SECTION: Photos -->

	<!-- SECTION: Gray Section -->

	<?php if ( ! empty( $location->boxes ) ) : ?>
		<section class="jp-single-loc-section jp-single-loc-boxes">
			<div class="container">
				<div class="row">
					<div class="col-12">
						<h2 class="text-center jp-single-loc-boxes-title"><?php echo wp_kses_post( $location->boxes->heading ); ?></h2>
						<p class="h3 text-center jp-single-loc-boxes-subtitle"><?php echo wp_kses_post( $location->boxes->subheading ); ?></p>
					</div>
				</div>

				<div class="row">
					<?php foreach ( $location->boxes->boxes as $box ) : ?>
						<div class="col-12 col-md-6 col-lg-3">
							<div class="jp-single-loc-boxes-box">
								<h4 class="h5 jp-single-loc-boxes-box-title"><?php echo wp_kses_post( $box['heading'] ); ?></h4>

								<div class="jp-single-loc-boxes-box-text">
									<?php echo wp_kses_post( $box['text'] ); ?>
								</div>
							</div>
						</div>
					<?php endforeach; ?>
				</div>

				<?php if ( ! empty( $location->boxes->image ) ) : ?>
					<div class="row">
						<div class="col-12">
							<div class="graph">
								<h5>A Visual Breakdown of What Happens Here</h5>
								<img class="jp-single-loc-boxes-image lazy" data-src="<?php echo esc_attr( $location->boxes->image ); ?>" alt="<?php echo esc_attr( $location->boxes->heading ); ?>">
							</div>
						</div>
					</div>
				<?php endif; ?>
			</div>
		</section>
	<?php endif; ?>

	<!-- /SECTION: Gray Section -->

	<!-- SECTION: FAQ -->

	<?php if ( ! empty( $location->block4 ) && ! empty( $location->block4->faqs ) ) : ?>
		<div class="arrow-divider-container arrow-divider-container-v2">
			<div class="arrow-divider"><hr></div>
		</div>

		<section class="jp-single-loc-section jp-single-loc-faq jp-single-loc-faq-v2">
			<div class="container">
				<?php if ( ! empty( $location->block4->heading ) || ! empty( $location->block4->subheading ) ) : ?>
					<div class="heading">
						<h2>
							<?php echo esc_html( $location->block4->heading ); ?>
						</h2>

						<?php if ( ! empty( $location->block4->subheading ) ) : ?>
							<p class="h3 lead"><?php echo wp_kses_post( $location->block4->subheading ); ?></p>
						<?php endif; ?>

						<img class="icon lazy" data-src="/wp-content/themes/journeyPure/assets/img/faq-icon.png">
					</div>
				<?php endif; ?>

				<?php if ( ! empty( $location->block4->faqs ) ) : ?>
					<div class="faqs">
						<div class="accordion" id="location-faq-rehab">
							<?php foreach ( $location->block4->faqs as $index => $faq ) : ?>
								<div class="card">
									<div class="card-header <?php echo ( 0 !== $index ) ? 'collapsed' : ''; ?>" data-toggle="collapse" data-target="#l-faq-<?php echo esc_attr( $index ); ?>" aria-expanded="true" aria-controls="l-faq-<?php echo esc_attr( $index ); ?>" id="l-faq-heading-<?php echo esc_attr( $index ); ?>">
										<div class="question-box">
											<div class="icon">
												<i class="fas fa-plus-circle off"></i>
												<i class="fas fa-minus-circle on"></i>
											</div>

											<div class="title">
												<h5 class="card-title"><?php echo wp_kses_post( $faq->question ); ?></h5>
											</div>
										</div>
									</div>

									<div id="l-faq-<?php echo esc_attr( $index ); ?>" class="collapse <?php echo ( 0 === $index ) ? 'show' : ''; ?>" aria-labelledby="l-faq-heading-<?php echo esc_attr( $index ); ?>" data-parent="#location-faq-rehab">
										<div class="card-body">
											<?php echo wp_kses_post( $faq->answer ); ?>
										</div>
									</div>
								</div>
							<?php endforeach; ?>
						</div>

						<div class="ask-a-question">
							<span class="btn btn-primary" data-toggle="modal" data-target="#user-question-form-container">Ask a question</span>
						</div>
					</div>
				<?php endif; ?>
			</div>
		</section>
	<?php endif; ?>

	<!-- /SECTION: FAQ -->

	<!-- SECTION: Bios -->

	<?php if ( isset( $location->bios ) && is_array( $location->bios->bios ) ) : ?>
		<section class="bio-section bio-section-v2">
			<div class="container">
				<?php if ( isset( $location->bios->heading ) ) : ?>
					<div class="heading">
						<h2><?php echo wp_kses_post( $location->bios->heading ); ?></h2>
					</div>
				<?php endif; ?>

				<?php if ( isset( $location->bios->subheading ) ) : ?>
					<div class="subheading">
						<p class="h3"><?php echo wp_kses_post( $location->bios->subheading ); ?></p>
					</div>
				<?php endif; ?>

				<div class="bio-slider" data-slick='{"slidesToShow": 4}' >
					<?php foreach ( $location->bios->bios as $bio ) : ?>
						<div class="d-flex align-items-stretch card-col">
							<div class="card default border-0">
								<div class="card-body  bios">
									<div class="img lazy" data-src="<?php echo $bio->photo['image']; ?>"></div>
									<p class="text name-text"><?php echo esc_html( $bio->name ); ?> <span class="text"><?php echo esc_html( $bio->credentials ); ?></span></p>
									<p class="text"><?php echo esc_html( $bio->title ); ?></p>

									<ul class="fa-ul">
										<?php echo ( $bio->education ) ? '<li><span class="fa-li"><i class="fas fa-graduation-cap"></i></span>' . esc_html( $bio->education ) . '</li>' : ''; ?>
										<?php echo ( $bio->specialty ) ? '<li><span class="fa-li"><i class="fas fa-th-large"></i></span>' . esc_html( $bio->specialty ) . '</li>' : ''; ?>
										<?php echo ( $bio->years ) ? '<li><span class="fa-li"><i class="fas fa-clock"></i></span>' . esc_html( $bio->years ) . ' years in the field</li>' : ''; ?>

										<?php
										if ( ! empty( $bio->recovery_status ) ) {
											switch ( $bio->recovery_status ) {
												case 'person':
													echo '<li><span class="fa-li"><i class="fas fa-grin"></i></span>In Recovery</li>';
													break;
												case 'loved_one':
													echo '<li><span class="fa-li"><i class="fas fa-grin"></i></span>Loved One In Recovery</li>';
													break;
											}
										}
										?>
									</ul>
								</div>
							</div>
						</div>
					<?php endforeach; ?>
				</div>

				<p class="link see-less-btn"> </p>
				<p class="link see-more-btn has-more">More</p>
			</div>
		</section>
	<?php endif; ?>

	<!-- /SECTION: Bios -->

	<!-- SECTION: Reviews -->

	<?php if ( ! empty( $reviews->reviews ) ) : ?>
		<section class="jp-single-loc-section jp-reviews-reviews jp-reviews-reviews-v2">
			<div class="container">
				<div class="row">
					<div class="col-12">
						<h5 class="text-center jp-reviews-reviews-title">6,000+ Success Stories</h5>
						<p class="h3 text-center jp-reviews-reviews-subtitle">Whether Journeypure is your first (and last) treatment experience, or you've spent decades in and out of other facilities...here's proof that you can feel better.</p>
					</div>
				</div>

				<div class="row">
					<div class="col-12">
						<div class="jp-reviews-reviews-box" data-page="1" data-cat="<?php echo esc_attr( $reviews_category_ids ); ?>" data-url="<?php echo esc_attr( admin_url( 'admin-ajax.php' ) ); ?>" data-nonce="<?php echo esc_attr( wp_create_nonce( 'get_reviews' ) ); ?>">
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

	<!-- SECTION: Map -->

	<?php if ( ! empty( $location->block4 ) ) : ?>
		<section class="location-information">
			<div class="row">
				<div class="col-12">
					<?php if ( $location->block4->location->title ) : ?>
						<h2 class="text-center"><?php echo wp_kses_post( $location->block4->location->title ); ?></h2>
					<?php endif; ?>

					<?php if ( $location->block4->location->subtitle ) : ?>
						<p class="h3 text-center"><?php echo wp_kses_post( $location->block4->location->subtitle ); ?></p>
					<?php endif; ?>
				</div>
			</div>

			<div class="row">
				<div class="col-12 col-lg-6">
					<div class="map-wrapper">
						<div class="capacity">
							<?php
								$location_status_data  = 'Only ' . $location->block4->location->status->availableRoomCount . ' ';
								$location_status_data .= ( 1 === $location->block4->location->status->availableRoomCount ) ? 'spot' : 'spots';
								$location_status_data .= ' available';
							?>

							<i class="fa fa-info-circle"></i> <b><?php echo wp_kses_post( $location_status_data ); ?></b>
						</div>

						<?php $address = rawurlencode( $location->block4->location->full_address ); ?>
						<?php $address = preg_replace( '/\./', '', $address ); ?>

						<div class="embed-responsive embed-responsive-16by9">
							<iframe class="iframe-to-load" data-url-value="https://www.google.com/maps/embed/v1/place?key=AIzaSyDwoQ63Mff3mW9-u2fQUhnlMBmX752RKds&q=<?php echo esc_attr( $address ); ?>" allowfullscreen></iframe>
						</div>

						<div class="address-wrapper">
							<?php if ( $location->block4->location->name ) : ?>
								<h4><?php echo wp_kses_post( $location->block4->location->name ); ?></h4>
							<?php endif; ?>

							<?php if ( $location->block4->location->street_address ) : ?>
								<p class="address-line">
									<?php echo esc_html( $location->block4->location->street_address ); ?>
									<?php echo esc_html( $location->block4->location->city ); ?>,
									<?php echo esc_html( $location->block4->location->state ); ?>
									<?php echo esc_html( $location->block4->location->zip ); ?>
								</p>
							<?php endif; ?>
						</div>
					</div>
				</div>

				<div class="details col-12 col-lg-6">
					<?php if ( $location->highlights_v2->tag_sections ) : ?>
						<?php foreach ( $location->highlights_v2->tag_sections as $section ) : ?>
							<aside class="tag-list">
								<?php if ( $section['heading'] ) : ?>
									<span class="heading"><span><?php echo wp_kses_post( $section['heading'] ); ?></span></span>
								<?php endif; ?>

								<?php if ( $section['tags'] ) : ?>
									<div class="row no-gutters">
										<?php foreach ( $section['tags'] as $index => $_tag ) : ?>
											<?php $tag_count = count( $section['tags'] ); ?>

											<div class="col-6 col-lg-auto <?php echo ( ( $index + 1 ) === $tag_count && 0 !== $tag_count % 2 ) ? 'col-12' : ''; ?>">
												<div class="tag default">
													<?php echo wp_kses_post( $_tag['value'] ); ?>
												</div>
											</div>
										<?php endforeach; ?>
									</div>
								<?php endif; ?>
							</aside>
						<?php endforeach; ?>
					<?php endif; ?>
				</div>
			</div>
		</section>
	<?php endif; ?>

	<!-- /SECTION: Map -->

	<!-- SECTION: Process -->

	<section class="design-process-section" id="process-tab">
		<div class="container">
			<div class="row">
				<div class="col-12">
					<h2>The Process is Simple</h2>

					<ul class="nav nav-tabs process-model more-icon-preocess" role="tablist">
						<li role="presentation" class="active">
							<a href="#discover" aria-controls="discover" role="tab" data-toggle="tab">
								<i class="fas fa-mobile-alt" aria-hidden="true"></i>
								<p>1. Call</p>
							</a>
						</li>

						<li role="presentation">
							<a href="#strategy" aria-controls="strategy" role="tab" data-toggle="tab">
								<i class="fas fa-id-card" aria-hidden="true"></i>
								<p>2. Insurance</p>
							</a>
						</li>

						<li role="presentation">
							<a href="#optimization" aria-controls="optimization" role="tab" data-toggle="tab">
								<i class="fas fa-calendar" aria-hidden="true"></i>
								<p>3. Start</p>
							</a>
						</li>

						<li role="presentation">
							<a href="#reporting" aria-controls="reporting" role="tab" data-toggle="tab">
								<i class="fas fa-diagnoses" aria-hidden="true"></i>
								<p>4. Heal</p>
							</a>
						</li>
					</ul>

					<div class="tab-content">
						<div role="tabpanel" class="tab-pane active" id="discover">
							<div class="design-process-content">
								<div class="row">
									<div class="col-md-6">
										<div class="design-process-content-inner">
											<h5 class="semi-bold">1. Make The Call</h5>
											<p>Because this location sometimes operates on a wait-list, it's best to call in as early as possible. You don't have to commit to coming here and you'll feel better after you talk to someone who actually understands.</p>
											<div class="note-cta"><i class="fas fa-phone"></i> <?php echo esc_html( get_option( 'defaultPhone' ) ); ?></div>
										</div>
									</div>

									<div class="col-md-6 d-none d-sm-block">
										<div class="lazy" data-src="/wp-content/uploads/2020/05/call-journeypure-rehab-now-invert.jpg">
											<img class="lazy" data-src="/wp-content/uploads/2020/05/call-journeypure-rehab-now-invert.jpg" alt="Call JourneyPure">
										</div>
									</div>
								</div>
							</div>
						</div>

						<div role="tabpanel" class="tab-pane" id="strategy">
							<div class="design-process-content">
								<div class="row">
									<!--<div class="col-md-6 order-md-2">
										<div class="lazy" data-src="/wp-content/uploads/2020/05/call-journeypure-rehab-now-invert.jpg">
											<img class="lazy" data-src="/wp-content/uploads/2020/05/call-journeypure-rehab-now-invert.jpg" alt="Call JourneyPure">
										</div>
									</div>

									<div class="col-md-6 order-md-1">-->
									<div class="col-sm-12">
										<div class="design-process-content-inner">
											<h5 class="semi-bold">2. Discuss Any Costs</h5>
											<p>Insurance covers the majority of your cost here! How much you owe depends on your insurance policy's deductible and co-insurance rates. Don't worry, we'll confidentially look at your policy and explain everything. You can <a data-toggle="modal" data-target="#main-insurance-form" href="#">submit insurance information online</a>.</p>
											<p>(If you don't have insurance, you still have options. We can talk about that).</p>
										</div>
									</div>
								</div>
							</div>
						</div>

						<div role="tabpanel" class="tab-pane" id="optimization">
							<div class="design-process-content">
								<div class="row">
									<!--<div class="col-md-6 order-md-2">
										<div class="lazy" data-src="/wp-content/uploads/2020/05/call-journeypure-rehab-now-invert.jpg">
											<img class="lazy" data-src="/wp-content/uploads/2020/05/call-journeypure-rehab-now-invert.jpg" alt="Call JourneyPure">
										</div>
									</div>

									<div class="col-md-6 order-md-1">-->
									<div class="col-sm-12">
										<div class="design-process-content-inner">
											<h5 class="semi-bold">3. Start Treatment</h5>
											<p>Our locations often operate on waiting lists, but we're as accommodating as possible with the schedule. It helps to call early in your decision process and come in while you're still motivated.</p>
											<p>The first thing you notice when you walk in is an overwhelming sense of hope and compassion. You're surrounded by people that actually understand you.</p>
										</div>
									</div>
								</div>
							</div>
						</div>

						<div role="tabpanel" class="tab-pane" id="reporting">
							<div class="design-process-content">
								<div class="row">
									<!--<div class="col-md-6 order-md-2">
										<div class="lazy" data-src="/wp-content/uploads/2020/05/call-journeypure-rehab-now-invert.jpg">
											<img class="lazy" data-src="/wp-content/uploads/2020/05/call-journeypure-rehab-now-invert.jpg" alt="Call JourneyPure">
										</div>
									</div>

									<div class="col-md-6 order-md-1">-->
									<div class="col-sm-12">
										<div class="design-process-content-inner">
											<h5>4. The Treatment Process</h5>
											<p>Intensive cognitive-behavioral therapies aren't as boring as they sound. You tackle issues hiding behind drugs and alcohol like trauma, depression or anxiety. And, you graduate feeling better than ever with a plan and a coach to help you stay on track long after treatment ends.</p>
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

	<!-- /SECTION: Process -->

</div>

<!-- /TEMPLATE: Locations CPT -->

<?php get_footer();
