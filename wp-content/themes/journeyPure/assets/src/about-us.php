<?php
/*
 * Template Name: About Us
 */
?>

<?php

	include_once(get_stylesheet_directory() . '/classes/AboutUs.php');
	$AboutUs = new Pages\AboutUs();

	/** Page specific js*/
	//$jsFile = 'rehab-location';
	get_header();

 ?>

<div id="about-us">
	<section class="above-fold">
		<div class="row no-gutters">
			<div class="col-12 order-md-1 order-2">
				<div style="background-image: url('/wp-content/themes/journeyPure/assets/img/journeyPure333.png')" class="img-container">
				</div>
				<div class="top-content">
					<div class="container">
						<div class="row justify-content-between">
							<div class="col-md-6 order-xl-1 order-lg-1 order-md-1 order-sm-2 order-last align-self-md-center">
							</div>
							<div class="col-md-6 order-md-2 order-sm-1">
								<?php if(isset($AboutUs->ratings)): ?>
									<div class="rating-section">
										<?php foreach ($AboutUs->ratings as $rating) : ?>
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
						<h1 class="page-heading text-white">Here it makes a difference.</h1>
						<h2 class="lead">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</h2>
					</div>
				</div>
			</div>
		</div>
	</section>
	<section class="bio-section">
		<div class="container">
			<div class="heading">
				<h3 class="h1">The Leadership Team</h3>
			</div>
			<div id="about-bio-slider" class="about-bio-slider" data-slick='{"slidesToShow":<?php echo (count($AboutUs->bios->bios) < 3) ? count($AboutUs->bios->bios) : 3; ?>}'>
				<?php  foreach ($AboutUs->bios->bios as $index => $bio): ?>
				<div class="card default border-0">
					<div class="card-body bios">
						<div class="img-box">
							<div class="img" style='background-image: url("<?php echo $bio->photo['image']; ?>");'></div>
						</div>
						<div class="header">
							<p class="text name-text"><?php echo $bio->name; ?> <span class="text"> • <?php echo $bio->credentials; ?></span></p>
							<p class="text"><?php echo $bio->title; ?></p>
						</div>

						<ul class="fa-ul">
							<?php echo ($bio->education) ? '<li><span class="fa-li"><i class="fas fa-graduation-cap"></i></span>' . $bio->education . '</li>': ''; ?>
							<?php echo ($bio->specialty) ? '<li><span class="fa-li"><i class="fas fa-th-large"></i></span>' . $bio->specialty . '</li>': ''; ?>
							<?php echo ($bio->years) ? '<li><span class="fa-li"><i class="fas fa-clock"></i></span>' . $bio->years . ' years in the field</li>': ''; ?>
							<?php echo ($bio->location) ? '<li><span class="fa-li"><i class="fas fa-location-arrow"></i></span>Location: <a href="' . $bio->location['link'] . '">' . $bio->location['label'] . '</a></li>': ''; ?>
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
							<?php echo ($bio->qualifications) ? '<li><span class="fa-li"><i class="fas fa-folder-plus"></i></span>' . $bio->qualifications . '</li>': ''; ?>
							<?php echo ($bio->news_mentions) ? '<li><span class="fa-li"><i class="fas fa-newspaper"></i></i></span> Media Mentions</li>': ''; ?>
						</ul>
						<?php if(!empty($bio->news_mentions)): ?>
							<div id="bio-new-mentions-<?php echo $index; ?>" class="bio-new-mentions" data-slick='{"slidesToShow": <?php echo (count($bio->news_mentions) < 3) ? count($bio->news_mentions) : 3; ?>}'>
								<?php foreach ($bio->news_mentions as $news_mention) : ?>
									<div class="mention">
										<?php if(!empty($news_mention['mention'])): ?>
											<div class="content"><?php echo  $news_mention['mention']; ?></div>
										<?php endif; ?>
										<?php if(!empty($news_mention['link_to_article'])): ?>
											<div class="ref-link"><a href="<?php  echo  $news_mention['link_to_article']; ?>"><?php  echo  $news_mention['link_to_article']; ?></a></div>
										<?php endif; ?>
									</div>
								<?php endforeach; ?>
							</div>
							<div class="row justify-content-between">
								<div class="col-6">
									<small class="link see-more-mentions has-more"><data>Data Generated Via Script</data> More </small>
								</div>
								<div class="col-6 text-right">
									<small class="link see-less-mentions">Previous </small>
								</div>
							</div>
						<?php endif; ?>
						</div>
					</div>
				<?php endforeach; ?>
			</div>

			<div class="main-controls">
				<div class="row justify-content-between">
					<div class="col-6">
						<p class="link see-less-btn">Previous</p>
					</div>
					<div class="col-6 text-right">
						<p class="link see-more-btn">More</p>
					</div>
				</div>
			</div>
		</div>
	</section>
	<section class="page-quote">
		<div class="container">
			<blockquote>"Everyone comes in overwhelmed, but looking to make a big change quickly. This is where you learn to  harness  and  hold on to hope."</blockquote>
			<div class="bio">
				<div class="row justify-content-md-center no-gutters">
					<div class="col-auto">
						<img class="align-self-center" src="<?php echo $AboutUs->bioCEO->photo['image']; ?>" alt="<?php echo $AboutUs->bioCEO->photo['alt']; ?>">
					</div>
					<div class="col-auto">
						<h5 class="mt-0 mb-0"><?php echo $AboutUs->bioCEO->name; ?></h5>
						<small>CEO</small>
					</div>
				</div>
			</div>
		</div>
	</section>
	<section class="media-section">
		<div class="container">
			<div class="text-center">
				<h5 class="h1">We're mentioned in the news</h5>
				<small>(A Lot)</small>
			</div>
			<div id="media-con" class="media-con" data-slick='{"slidesToShow":4}'>
				<?php foreach ($AboutUs->mediaIcons as $index => $item) : ?>
				<div>
					<div class="media-box">
						<div class="inner-con"> <img src="<?php echo  $item['icon']['sizes']['medium']; ?>" alt="<?php echo $item['icon']['alt']; ?>"></div>
					</div>
				</div>
				<?php endforeach; ?>
			</div>
			<div class="controls">
				<div class="row justify-content-between">
					<div class="col-6">
						<small class="link see-less-mentions">Previous </small>
					</div>
					<div class="col-6 text-right">
						<small class="link see-more-mentions has-more"><data>Data Generated Via Script</data> More </small>
					</div>
				</div>
			</div>
		</div>
	</section>
	<section class="block-4">
		<div class="container">
			<h5 class="heading h1">Other things you should know</h5>
			<div class="card-deck">
				<div class="card">
					<img src="<?php echo WP_UPLOAD_PATH;?>/2019/09/jp-locations-knox-500x375.jpg" class="card-img-top" alt="...">
					<div class="card-body">
						<h5 class="card-title">Title Section For Group</h5>
						<p class="card-text">
							Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
						</p>
					</div>
				</div>
				<div class="card">
					<img src="<?php echo WP_UPLOAD_PATH;?>/2019/09/JOURNEYPURE-65-768x1152.jpg" class="card-img-top" alt="...">
					<div class="card-body">
						<h5 class="card-title">Title Section For Group</h5>
						<p class="card-text">
							Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
							Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
						</p>
						<p class="font-weight-bold font-italic">
							Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
						</p>
					</div>
				</div>
				<div class="card">
					<img src="<?php echo WP_UPLOAD_PATH;?>/2019/09/jp-locations-CPE-500x375-1-300x225.jpg" class="card-img-top" alt="...">
					<div class="card-body">
						<h5 class="card-title">Title Section For Group</h5>
						<p class="card-text">
							Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
						</p>
						<p class="card-text">
							Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
							Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
						</p>
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
</div>
<?php get_footer(); ?>
