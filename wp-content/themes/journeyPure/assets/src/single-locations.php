<?php
	//wp_reset_postdata();
	require_once(get_stylesheet_directory() . '/classes/Location.php');
	$Location = new Locations\Location();

	get_header();

 ?>

<div id="single-location">
	<section class="above-fold">
		<div style="background-image: url('<?php echo ($Location->aboveFold->image) ? : ''; ?>')" class="img-container">
		</div>
		<?php if($Location->ratings): ?>
		<div class="review-section">
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
	</section>
	<section class="container block-2">
		<div class="row">
			<div class="col-md-8">
				<?php if($Location->block2->heading): ?>
				<h4 class="h1"><?php echo $Location->block2->heading; ?></h4>
				<?php endif; ?>
				<?php if($Location->block2->list): ?>
					<?php foreach ( $Location->block2->list as $index => $item) : ?>
						<?php if($item['heading']): ?>
						<h5><span class="list-number"><?php echo ++$index; ?></span><?php echo $item['heading']; ?></h5>
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
						<?php foreach ($section['tags'] as $tag): ?>
						<div class="col-6">
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
			<div class="col-md-12">
				<hr class="dotted">
			</div>
		</div>
	</section>
	<section class="container block-3">
		<?php if(is_object($Location->aboveFold->heading)): ?>
			<h4 class="heading"><?php echo $Location->block3->heading; ?></h4>
		<?php endif; ?>

		<?php if(isset($Location->block3->image)): ?>
			<img class="featured" src="<?php echo $Location->block3->image['url'] ?>" alt="<?php echo $Location->block3->image['alt'] ?>">
		<?php endif; ?>
		<?php if(isset($Location->block3->midContent)): ?>
			<div class="content-section top-xl">
				<div class="row row-eq-height">
					<?php foreach ($Location->block3->midContent as $contentBox): ?>
						<div class="col-md-6 d-flex align-items-stretch card-col">
							<div class="card default">
								<h5 class="card-header text-center h4 bg-primary text-white"><?php echo $contentBox['heading']; ?></h5>
								<div class="card-body">
									<p class="card-text"><?php echo $contentBox['body']; ?></p>
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
	</section>
	<?php if(isset($Location->gallery)): ?>
	<div class="image-gallery" data-slick='{"slidesToShow": 4}' role="toolbar">
		<?php foreach ($Location->gallery as $gallery) : ?>
			<a data-fancybox="gallery" href="<?php echo $gallery->large; ?>"><img src="<?php echo $gallery->medium; ?>"></a>
		<?php endforeach; ?>
	</div>
	<?php endif; ?>
	<?php if(isset($Location->bios)): ?>
	<section class="bio-section">
		<div class="container">
			<?php if(isset($Location->bios->heading)): ?>
			<div class="heading">
				<h3 class="h2"><?php echo $Location->bios->heading; ?></h3>
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
								<p class="text font-weight-bold"><?php echo $bio->name; ?></p>
								<p class="text"><?php echo $bio->credentials; ?></p>
								<p class="text"><?php echo $bio->title; ?></p>
								<ul class="fa-ul">
									<?php echo ($bio->education) ? '<li><span class="fa-li"><i class="fas fa-check"></i></span>' . $bio->education . '</li>': ''; ?>
									<?php echo ($bio->specialty) ? '<li><span class="fa-li"><i class="fas fa-check"></i></span>' . $bio->specialty . '</li>': ''; ?>
									<?php echo ($bio->years) ? '<li><span class="fa-li"><i class="fas fa-check"></i></span>' . $bio->years . ' years in the field</li>': ''; ?>
									<?php echo ($bio->in_recovery) == "Yes" ? '<li><span class="fa-li"><i class="fas fa-check"></i></span>In Recovery</li>': ''; ?>
								</ul>
							</div>
						</div>
					</div>
				<?php endforeach; ?>
			</div>
			<h6 class="see-less-btn">Previous</h6>
			<h6 class="see-more-btn has-more"><data value="">5</data> More</h6>
		</div>
	</section>
	<?php endif; ?>
</div>

<?php get_footer(); ?>
