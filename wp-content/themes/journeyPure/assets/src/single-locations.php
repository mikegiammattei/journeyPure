<?php
	//wp_reset_postdata();
	include_once(get_stylesheet_directory() . '/classes/Location.php');
	$Location = new Locations\Location();

	/** Page specific js*/
	$jsFile = 'rehab-location';
	get_header();

 ?>

<div id="single-location">

	<?php if(isset($Location->aboveFold)): ?>
	<section class="above-fold">

		<div class="row no-gutters">
			<div class="col-12 order-md-1 order-2">
				<div style="background-image: url('<?php echo ($Location->aboveFold->image) ? : ''; ?>')" class="img-container">
				</div>
				<div class="top-content">
					<div class="container">
						<div class="row justify-content-between">
							<div class="col-md-6 order-xl-1 order-lg-1 order-md-1 order-sm-2 order-last align-self-md-center">
								<?php if($Location->aboveFold->h1 || $Location->aboveFold->h2): ?>
									<div class="headers">
										<?php if($Location->aboveFold->h1): ?>
											<h1 class="heading-1"><?php echo $Location->aboveFold->h1; ?></h1>
										<?php endif; ?>
										<?php if($Location->aboveFold->h2): ?>
											<h2 class="heading-2"><?php echo $Location->aboveFold->h2; ?></h2>
										<?php endif; ?>
									</div>
								<?php endif; ?>
							</div>
							<div class="col-md-6 order-md-2 order-sm-1">
								<?php if(isset($Location->ratings)): ?>
									<div class="rating-section">
										<?php foreach ($Location->ratings as $rating) : ?>
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
						<?php if($Location->aboveFold->heading): ?>
							<p class="page-heading text-white"><?php echo $Location->aboveFold->heading; ?></p>
						<?php endif; ?>
						<?php if($Location->aboveFold->heading): ?>
							<span class="lead"><?php echo $Location->aboveFold->subheading; ?></span>
						<?php endif; ?>
					</div>
				</div>
			</div>
		</div>
	</section>
	<?php endif; ?>
	<?php if(isset($Location->block2)): ?>
	<section class="container block-2">
		<div class="row">
			<div class="col-md-8">
				<?php if($Location->block2->heading): ?>
				<h3 class="h1"><?php echo $Location->block2->heading; ?></h3>
				<?php endif; ?>
				<?php if($Location->block2->list): ?>
					<?php foreach ( $Location->block2->list as $index => $item) : ?>
						<?php if($item['heading']): ?>
						<h5><span class="list-number"><i class="fas fa-check"></i></span><?php echo $item['heading']; ?></h5>
						<?php endif; ?>
						<?php if($item['content']): ?>
						<div><?php echo $item['content']; ?></div>
						<?php endif; ?>
					<?php endforeach; ?>
				<?php endif; ?>
			</div>
			<div class="col-md-4">
				<?php if($Location->block2->tagSections): ?>
				<?php foreach ($Location->block2->tagSections as $section) : ?>
				<aside class="tag-list">
					<?php if($Location->block2->tagSections): ?>
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
	</section>
	<?php endif; ?>
		<?php if(isset($Location->gallery)): ?>
	<div class="image-gallery" data-slick='{"slidesToShow": <?php echo count($Location->gallery); ?>}' role="toolbar">
		<?php foreach ($Location->gallery as $index => $gallery) : ?>
			<figure><img src="<?php echo $gallery->medium; ?>" /></figure>
		<?php endforeach; ?>
	</div>
	<?php endif; ?>

	<?php if(isset($Location->block3)): ?>
	<?php $block_img = ($Location->block3->container_background['url']) ? $Location->block3->container_background['url'] : null; ?>
	<section class="block-3 <?php echo ($block_img == null) ? "" : ''; ?>" style="background-image: url('<?php echo $block_img; ?>'); ">
		<div class="container">
			<?php if(isset($Location->block3->heading)  && !empty($Location->block3->heading)): ?>
				<h3 class="h1 heading"><?php echo $Location->block3->heading; ?></h3>
			<?php endif; ?>

			<?php if(isset($Location->block3->image['url'])): ?>
				<img class="featured" src="<?php echo $Location->block3->image['url'] ?>" alt="<?php echo $Location->block3->image['alt'] ?>">
			<?php endif; ?>
			<?php if(isset($Location->block3->midContent) && is_array($Location->block3->midContent)): ?>
				<div class="content-section <?php echo (!isset($Location->block3->heading)  && !empty($Location->block3->heading)) ? 'top-xl' : ''; ?>">
					<div class="row row-eq-height">
						<?php foreach ($Location->block3->midContent as $contentBox): ?>
							<div class="col-md-6 d-flex align-items-stretch card-col">
								<div class="card default <?php echo (isset($Location->block3->container_background)) ? " effect-none" : ''; ?>">
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
			<?php if(isset($Location->block3->bottomContent)): ?>
				<div class="content-section top-lg">
					<div class="card default">
						<div class="card-body">
							<?php echo $Location->block3->bottomContent; ?>
						</div>
					</div>
				</div>
			<?php endif; ?>
		</div>
	</section>
	<?php endif; ?>

	<?php if(isset($Location->reviews)): ?>
	<section class="review-section">
		<div class="container">
			<div class="parent">
				<div class="content-container-left">
					<div class="details">
						<h3 class="h1 heading">Reviews</h3>
						<div class="tallies">
							<data class="avg display-4" value="<?php echo $Location->reviewAvg; ?>"><?php echo $Location->reviewAvg; ?></data> /
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
								<data value="<?php echo $Location->reviewTotal; ?>"><?php echo $Location->reviewTotal; ?></data>  reviews
							</p>
							<p class="link post-review-link " data-toggle="modal" data-target="#leave-a-review">Leave a Review</p>
						</div>
					</div>

				</div>
				<div class="content-container-right">
					<div class="review-slide-container <?php echo (count($Location->reviews) == 1) ? ' pb-5' : null; ?>">
						<div class="review-slide" data-slick='{"slidesToShow": 1}' role="toolbar">
							<?php if(count($Location->reviews ) > 0): ?>
							<?php foreach ($Location->reviews as $reviews) : ?>
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
							<p class="link see-more-btn has-more"><data>Data Generated Via Script</data> More</p>
						</div>
					</div>

				</div>
			</div>
		</div>
	</section>
	<?php endif; ?>
	<?php if(isset($Location->bios) && is_array($Location->bios->bios)): ?>
		<section class="bio-section">
			<div class="container">
				<?php if(isset($Location->bios->heading)): ?>
					<div class="heading">
						<h3 class="h1"><?php echo $Location->bios->heading; ?></h3>
					</div>
				<?php endif; ?>
				<div class="subheading">
					<p><?php echo $Location->bios->subheading; ?></p>
				</div>

				<div class="bio-slider" data-slick='{"slidesToShow": 4}' >
					<?php foreach ($Location->bios->bios as $bio): ?>
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

	<?php if(isset($Location->block4)): ?>
	<section class="block-4">
		<div class="container">
			<?php if(isset($Location->block4->heading) || isset($Location->block4->subheading)): ?>
			<div class="heading">
				<span class="h1"><?php echo $Location->block4->heading; ?>
					<?php if(isset($Location->block4->subheading)): ?>
					<h2 class="lead"><?php echo $Location->block4->subheading; ?></h2>
					<?php endif; ?>
				</span>
				<?php endif; ?>
			</div>
			<div class="row">
				<div class="col-md-6">
					<?php if( isset($Location->block4->faqs)): ?>
						<div class="faqs">
							<div class="accordion" id="location-faq-rehab">
								<?php foreach ( $Location->block4->faqs as $index => $faq) : ?>
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
								<span class="btn btn-primary" data-toggle="modal" data-target="#user-question-form-container"><i class="fas fa-comment-dots"></i> Ask a question</span>
							</div>
						</div>
					<?php endif; ?>
				</div>
				<div class="col-md-6">
					<div class="location-information">
						<div class="capacity">
							<?php
							$location_status_data = 'Only ' . $Location->block4->location->status->availableRoomCount . ' ';
							$location_status_data .= ($Location->block4->location->status->availableRoomCount == 1) ? ' spot' : ' spots';
							$location_status_data .= ' available </b>';

							?>
							<i class="fa fa-info-circle"></i> <b><?php echo $location_status_data; ?></b>
						</div>
						<?php $address = urlencode($Location->block4->location->full_address); ?>
						<div class="embed-responsive embed-responsive-16by9">
							<iframe src="https://www.google.com/maps/embed/v1/place?key=<?php echo GOOGLE_API; ?>
    &q=1<?php echo $address; ?>" allowfullscreen>
							</iframe>
						</div>
						<div class="details">
							<?php if($Location->block4->location->name): ?>
							<h4><?php echo $Location->block4->location->name; ?></h4>
							<?php endif; ?>
							<?php if($Location->block4->location->street_address): ?>
								<p><?php echo $Location->block4->location->street_address; ?></p>
							<?php endif; ?>

								<p><?php echo $Location->block4->location->city; ?>,
									<?php echo $Location->block4->location->state; ?>
									<?php echo $Location->block4->location->zip; ?></p>

							<?php if($Location->block4->location->description): ?>
							<hr class="dotted">
								<p><?php echo $Location->block4->location->description; ?></p>
							<?php endif; ?>

						</div>
					</div>
				</div>
			</div>

		</div>
	</section>
	<?php endif; ?>
</div>
<?php include(get_stylesheet_directory()  . '/assets/src/includes/components/ask-question-form.php'); ?>
<?php get_footer(); ?>
