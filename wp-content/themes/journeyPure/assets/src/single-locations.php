<?php
/**
 * Locations CTP template
 *
 * @author   -
 * @package  JourneyPure
 */

require_once get_stylesheet_directory() . '/classes/Location.php';
$location = new Locations\Location();

$jsFile = 'rehab-location';
get_header();
?>

<!-- TEMPLATE: Locations CPT -->

<div id="single-location">

	<div class="note-box">
		<p>This location is accepting new admissions with additional pre-screening procedures. To learn more, call <?php echo get_option('defaultPhone'); ?>.</p>
	</div>

	<?php if ( isset( $location->aboveFold ) && true !== $location->aboveFold->layout_v2 ) : ?>
		<section class="above-fold">
			<div class="row no-gutters">
				<div class="col-12 order-md-1 order-2">
					<div style="background-image: url('<?php echo ($location->aboveFold->image) ? : ''; ?>')" class="img-container">
					</div>
					<div class="top-content">
						<div class="container">
							<div class="row justify-content-between">
								<div class="col-md-12 order-md-2 order-sm-1">
									<?php if(isset($location->ratings)): ?>
										<div class="rating-section">
											<?php foreach ($location->ratings as $rating) : ?>
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
							<?php if($location->aboveFold->h1): ?>
								<h1 class="heading-1"><?php echo $location->aboveFold->h1; ?></h1>
							<?php endif; ?>
							<?php if($location->aboveFold->heading): ?>
								<h2 class="page-heading text-white"><?php echo $location->aboveFold->heading; ?></h2>
							<?php endif; ?>
							<?php if($location->aboveFold->heading): ?>
								<div class="lead"><?php echo $location->aboveFold->subheading; ?></div>
							<?php endif; ?>
						</div>
					</div>
				</div>
			</div>
		</section>
	<?php endif; ?>

	<!-- SECTION: Above Fold (V2) -->

	<?php if ( isset( $location->aboveFold ) && true === $location->aboveFold->layout_v2 ) : ?>
		<section class="jp-loc-section jp-loc-masthead">
			<div class="container">
				<div class="row">
					<div class="col-12 col-md-10 offset-md-1 col-lg-8 offset-lg-2">
						<h1 class="jp-loc-masthead-title"><?php echo wp_kses_post( $location->aboveFold->h1 ); ?></h1>
						<h2 class="jp-loc-masthead-subtitle"><?php echo wp_kses_post( $location->aboveFold->heading ); ?></h2>
					</div>
				</div>

				<div class="row">


					<div class="col-12 col-lg-7 order-lg-1">
						<div class="embed-responsive embed-responsive-16by9 youtube-video-place" style="background-image: url('<?php echo esc_attr( $location->aboveFold->youtube_video_thumbnail ); ?>');" data-yt-url="https://www.youtube.com/embed/<?php echo esc_attr( $location->aboveFold->youtube_video_id ); ?>">
							<span class="play-button"></span>
						</div>
					</div>

					<div class="col-12 col-lg-5 order-lg-2">
						<div class="jp-loc-masthead-content">
							<div class="jp-loc-masthead-text">
								<?php echo wp_kses_post( $location->aboveFold->subheading ); ?>
							</div>

							<a class="jp-op-masthead-button hide-for-sm" href="tel:844-505-4799" title="Call (844) 505-4799 to talk now."><span class="fas fa-phone"></span>Call (844) 505-4799</a>
							<a class="jp-op-masthead-button show-for-sm" href="javascript:void(0);" data-toggle="tooltip" data-placement="top" data-trigger="click" title="Call (844) 505-4799 to talk now."><span class="fas fa-phone"></span> Call (844) 505-4799</a>
						</div>
					</div>

				</div>



				<div class="row">
					<div class="col-12">
						<?php if ( isset( $location->ratings ) ) : ?>
							<div class="rating-section">
								<?php foreach ( $location->ratings as $rating ) : ?>
									<div class="ratings default block">
										<div class="row no-gutters align-items-center">
											<div class="col-auto mr-2">
												<img src="<?php echo esc_attr( $rating->image['sizes']['medium'] ); ?>" alt="<?php echo esc_attr( get_post_meta( $rating->image['ID'], '_wp_attachment_image_alt', true ) ); ?>">
											</div>

											<div class="col-auto">
												<div class="content">
													<?php if ( $rating->line_1 ) : ?>
														<p><?php echo esc_html( $rating->line_1 ); ?></p>
													<?php endif; ?>

													<?php if ( 'stars' === $rating->controller ) : ?>
														<?php for ( $i=0; $i < $rating->stars; $i++ ) : ?>
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
								<?php endforeach; ?>
							</div>
						<?php endif; ?>
					</div>
				</div>
			</div>
		</section>
	<?php endif; ?>

	<!-- /SECTION: Above Fold (V2) -->

	<?php if ( isset( $location->block2 ) ) : ?>
		<section class="block-2">
			<div class="container">
				<div class="row">
					<div class="col-md-8">
						<?php if($location->block2->heading): ?>
							<h3 class="h1"><?php echo $location->block2->heading; ?></h3>
						<?php endif; ?>
						<?php if($location->block2->list): ?>
							<div class="list-container">
								<?php foreach ( $location->block2->list as $index => $item) : ?>
									<div class="list-item">
										<div class="row no-gutters">
											<?php if($item['heading']): ?>
											<div class="list-heading">
												<div class="d-flex">
													<div class="align-self-center"><i class="fas fa-check icon"></i></div>
													<div class="align-self-center"><h5 class="item-title"><?php echo $item['heading']; ?></h5></div>
												</div>
											</div>
											<?php endif; ?>
										</div>
										<?php if($item['content']): ?>
											<div><?php echo $item['content']; ?></div>
										<?php endif; ?>
									</div>
								<?php endforeach; ?>
							</div>
						<?php endif; ?>
					</div>
					<div class="col-md-4">
						<?php if($location->block2->tagSections): ?>
							<?php foreach ($location->block2->tagSections as $section) : ?>
								<aside class="tag-list">
									<?php if($location->block2->tagSections): ?>
										<span class="heading"><?php echo $section['heading']; ?></span>
									<?php endif; ?>
									<?php if($section['tags']): ?>
									<div class="row no-gutters">
										<?php foreach ($section['tags'] as $index => $tag): ?>
											<?php $tagCount = count($section['tags']); ?>
											<div class="col-6 <?php echo (($index + 1) == $tagCount && $tagCount % 2 !=  0) ? '  col-12' : ''; ?>">
												<div class="tag default">
													<?php echo $tag['value']; ?>
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
			</div>
		</section>
	<?php endif; ?>

	<?php if ( isset( $location->gallery ) ) : ?>
		<div class="image-gallery" data-slick='{"slidesToShow": <?php echo count($location->gallery); ?>}' role="toolbar">
			<?php foreach ($location->gallery as $index => $gallery) :  ?>
				<figure><img src="<?php echo $gallery->medium; ?>" alt="<?php echo $gallery->alt; ?>" /></figure>
			<?php endforeach; ?>
		</div>
	<?php endif; ?>

	<?php if ( isset( $location->block3 ) ) : ?>
		<?php $block_img = ($location->block3->container_background['url']) ? $location->block3->container_background['url'] : null; ?>
		<section class="block-3 <?php echo ($block_img == null) ? "" : ''; ?>" style="background-image: url('<?php echo $block_img; ?>'); ">
			<div class="container">
				<?php if(isset($location->block3->heading)  && !empty($location->block3->heading)): ?>
					<h3 class="h1 heading"><?php echo $location->block3->heading; ?></h3>
				<?php endif; ?>
				<?php if(isset($location->block3->image['url'])): ?>
					<img class="featured" src="<?php echo $location->block3->image['url'] ?>" alt="<?php echo $location->block3->image['alt'] ?>">
				<?php endif; ?>
				<?php if(isset($location->block3->midContent) && is_array($location->block3->midContent)): ?>
					<div class="content-section <?php echo (!isset($location->block3->heading)  && !empty($location->block3->heading)) ? 'top-xl' : ''; ?>">
						<div class="row row-eq-height">
							<?php foreach ($location->block3->midContent as $contentBox): ?>
								<div class="col-md-6 d-flex align-items-stretch card-col">
									<div class="card default <?php echo (isset($location->block3->container_background)) ? " effect-none" : ''; ?>">
										<?php if(isset($contentBox['heading']) && !empty($contentBox['heading'])): ?>
										<h5 class="card-header text-center h4 bg-primary text-white"><?php echo $contentBox['heading']; ?></h5>
										<?php endif; ?>
										<div class="card-body">
											<div class="card-text">
												<?php if($contentBox['use_image'] != 'img'):
													echo $contentBox['body'];
												else: ?>
													<img class="featured" src="<?php echo $contentBox['image']['sizes']['large'] ?>" alt="<?php echo $contentBox['image']['alt'] ?>">
												<?php endif; ?>
											</div>
										</div>
									</div>
								</div>
							<?php endforeach; ?>
						</div>
					</div>
				<?php endif; ?>
				<?php if(isset($location->block3->bottomContent)): ?>
					<div class="content-section top-lg">
						<div class="card default">
							<div class="card-body">
								<?php echo $location->block3->bottomContent; ?>
							</div>
						</div>
					</div>
				<?php endif; ?>
			</div>
		</section>
	<?php endif; ?>


	<?php if ( isset( $location->block4 ) ) : ?>
		<section class="block-4">
			<div class="container">
				<?php if(isset($location->block4->heading) || isset($location->block4->subheading)): ?>
					<div class="heading">
						<span class="h1"><?php echo $location->block4->heading; ?>
							<?php if(isset($location->block4->subheading)): ?>
								<h2 class="lead"><?php echo $location->block4->subheading; ?></h2>
							<?php endif; ?>
						</span>
					</div>
				<?php endif; ?>
				<?php if( isset($location->block4->faqs)): ?>
					<div class="faqs">
						<div class="accordion" id="location-faq-rehab">
							<?php foreach ( $location->block4->faqs as $index => $faq) : ?>
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
				<?php endif; ?>
			</div>
		</section>



	<?php if ( isset( $location->reviews ) ) : ?>
		<section class="review-section">
			<div class="container">
				<div class="parent">
					<div class="content-container-left">
						<div class="details">
							<h3 class="h1 heading">Reviews</h3>
							<div class="tallies">
								<data class="avg display-4" value="<?php echo $location->reviewStats[$location->locationName]['avg']; ?>"><?php echo $location->reviewStats[$location->locationName]['avg']; ?></data> /
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
									<data value="<?php echo $location->reviewStats[$location->locationName]['total']; ?>"><?php echo $location->reviewStats[$location->locationName]['total']; ?></data>  reviews
								</p>
								<p class="link post-review-link " data-toggle="modal" data-target="#leave-a-review">Leave a Review</p>
							</div>
						</div>
					</div>
					<div class="content-container-right">
						<div class="review-slide-container <?php echo (count($location->reviews) == 1) ? ' pb-5' : null; ?>">
							<div class="review-slide" data-slick='{"slidesToShow": 1}' role="toolbar">
								<?php if(count($location->reviews ) > 0): ?>
								<?php foreach ($location->reviews as $reviews) : ?>
									<div class="card">
										<div class="card-body">
											<div class="author-info">
												<div class="row justify-content-between">
													<div class="col-md-9 col-8">
														<div class="row">
															<div class="col-lg-auto col-md-3 col-4 align-self-center">
																<img src="<?php echo $reviews->photo['image']; ?>" alt="<?php echo $reviews->photo['alt']; ?>">
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
								<?php endif; ?>
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
	<?php endif; ?>

	<?php if ( isset( $location->bios ) && is_array( $location->bios->bios ) ) : ?>
		<section class="bio-section">
			<div class="container">
				<?php if(isset($location->bios->heading)): ?>
					<div class="heading">
						<h3 class="h1"><?php echo $location->bios->heading; ?></h3>
					</div>
				<?php endif; ?>
				<div class="subheading">
					<p><?php echo $location->bios->subheading; ?></p>
				</div>
				<div class="bio-slider" data-slick='{"slidesToShow": 4}' >
					<?php foreach ($location->bios->bios as $bio): ?>
						<div class="d-flex align-items-stretch card-col">
							<div class="card default border-0">
								<div class="card-body  bios">
									<div class="img" style='background-image: url("<?php echo $bio->photo['image']; ?>");'></div>
									<p class="text name-text"><?php echo $bio->name; ?> <span class="text"> • <?php echo $bio->credentials; ?></span>
									</p>
									<p class="text"><?php echo $bio->title; ?></p>
									<ul class="fa-ul">
										<?php echo ($bio->education) ? '<li><span class="fa-li"><i class="fas fa-graduation-cap"></i></span>' . $bio->education . '</li>': ''; ?>
										<?php echo ($bio->specialty) ? '<li><span class="fa-li"><i class="fas fa-th-large"></i></span>' . $bio->specialty . '</li>': ''; ?>
										<?php echo ($bio->years) ? '<li><span class="fa-li"><i class="fas fa-clock"></i></span>' . $bio->years . ' years in the field</li>': ''; ?>
										<?php
											if(!empty($bio->recovery_status)):
												 switch ($bio->recovery_status):
													case 'person' :
														echo '<li><span class="fa-li"><i class="fas fa-grin"></i></span>In Recovery</li>';
														break;
														case 'loved_one' :
														echo '<li><span class="fa-li"><i class="fas fa-grin"></i></span>Loved One In Recovery</li>';
														break;
												endswitch;
											endif;
										?>
									</ul>
								</div>
							</div>
						</div>
					<?php endforeach; ?>
				</div>
				<p class="link see-less-btn">Previous</p>
				<p class="link see-more-btn has-more"><data>Data Generated Via Script</data> More</p>
			</div>
		</section>
	<?php endif; ?>


	<section class="insurance-section">
		<div class="container">
			<?php $_inc->get_insurance_banner(); ?>
		</div>
	</section>



		<section class="location-information">
			<div class="row">
				<div class="col-md-6">
					<div class="capacity">
						<?php
							$location_status_data = 'Only ' . $location->block4->location->status->availableRoomCount . ' ';
							$location_status_data .= ($location->block4->location->status->availableRoomCount == 1) ? ' spot' : ' spots';
							$location_status_data .= ' available </b>';
						?>
						<i class="fa fa-info-circle"></i> <b><?php echo $location_status_data; ?></b>
					</div>
					<?php $address = urlencode($location->block4->location->full_address); ?>
					<?php $address = preg_replace('/\./','',$address) ?>
					<div class="embed-responsive embed-responsive-16by9">
						<iframe src="https://www.google.com/maps/embed/v1/place?key=AIzaSyDwoQ63Mff3mW9-u2fQUhnlMBmX752RKds&q=<?php echo $address; ?>" allowfullscreen></iframe>
					</div>
				</div>
				<div class="details col-md-6">
					<?php if($location->block4->location->name): ?>
						<h4><?php echo $location->block4->location->name; ?></h4>
					<?php endif; ?>
					<?php if($location->block4->location->street_address): ?>
						<p class="address-line"><?php echo $location->block4->location->street_address; ?>
					<?php endif; ?>
					<?php echo $location->block4->location->city; ?>,
					<?php echo $location->block4->location->state; ?>
					<?php echo $location->block4->location->zip; ?></p>
					<?php if($location->block4->location->description): ?>
						<hr class="dotted">
						<p><?php echo $location->block4->location->description; ?></p>
					<?php endif; ?>
				</div>
			</div>
		</section>
	<?php endif; ?>


		<section class="design-process-section" id="process-tab">
		<div class="container">
			<div class="row">
				<div class="col-12">
					<!-- design process steps-->
					<!-- Nav tabs -->
					<h5 class="h1">The Process is Simple</h5>
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
					<!-- end design process steps-->
					<!-- Tab panes -->
					<div class="tab-content">
						<div role="tabpanel" class="tab-pane active" id="discover">
							<div class="design-process-content">
								<div class="row">
									<div class="col-md-6">
										<div class="design-process-content-inner">
											<h5 class="semi-bold">1. Make The Call</h5>
											<p>Even if you're not ready to commit to JourneyPure or not sure if you want treatment at all, talk about what's going on with someone that's been there before. You'll feel better and more informed after you call, I promise.</p>
											<div class="note-cta"><i class="fas fa-phone"></i> <?php echo get_option('defaultPhone'); ?></div>
										</div>
									</div>
									<div class="col-md-6 d-none d-sm-block">
										<div class="lazy" data-src="/wp-content/uploads/2020/05/call-journeypure-rehab-now-invert.jpg">
											<img src="/wp-content/uploads/2020/05/call-journeypure-rehab-now-invert.jpg" alt="Call JourneyPure">
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
											<img src="/wp-content/uploads/2020/05/call-journeypure-rehab-now-invert.jpg" alt="Call JourneyPure">
										</div>
									</div>
									<div class="col-md-6 order-md-1">-->
									<div class="col-sm-12">
										<div class="design-process-content-inner">
											<h5 class="semi-bold">2. Discuss Any Costs</h5>
											<p>Insurance covers the majority of your cost here! How much you owe depends on your insurance policy's deductable and co-insurance rates. Don't worry, we'll confidentially look at your policy and explain everything. You can privately <a data-toggle="modal" data-target="#main-insurance-form" href="#">submit insurance information online</a>.</p>
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
											<img src="/wp-content/uploads/2020/05/call-journeypure-rehab-now-invert.jpg" alt="Call JourneyPure">
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
											<img src="/wp-content/uploads/2020/05/call-journeypure-rehab-now-invert.jpg" alt="Call JourneyPure">
										</div>
									</div>
									<div class="col-md-6 order-md-1">-->
									<div class="col-sm-12">
										<div class="design-process-content-inner">
											<h5>4. The Treatment Process</h5>
											<p>Intensive cognitive-behavioral therapies aren't as boring as they sound.  You tackle issues hiding behind drugs and alcohol like trauma, depression or anxiety. And, you graduate feeling better than ever with a plan and a coach to help you stay on track long after treatment ends.</p>
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



</div>

<!-- /TEMPLATE: Locations CPT -->

<?php get_footer(); ?>
