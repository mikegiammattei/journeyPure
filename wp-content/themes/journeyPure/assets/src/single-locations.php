<?php
	//wp_reset_postdata();
	require_once(get_stylesheet_directory() . '/classes/Location.php');

	$Location = new Locations\Location();

	get_header();

 ?>

<div id="single-location">
	<section class="above-fold">
		<div style="background-image: url('<?php echo $Location->aboveFold->image; ?>')" class="img-container">
		</div>
		<div class="review-section">
			<div class="ratings default block">
				<div class="row no-gutters align-items-center">
					<div class="col-auto mr-2">
						<img src="/wp-content/themes/journeyPure/assets/img/seal.png">
					</div>
					<div class="col-auto">
						<div class="content">
							<p>Joint Commission</p>
							<p class="text-orange">Highest Accreditation</p>
							<p class="sub">Earned by only 10% of rehabs</p>
						</div>
					</div>
				</div>
			</div>
			<div class="ratings default block">
				<div class="row no-gutters align-items-center">
					<div class="col-auto mr-2">
						<img src="/wp-content/themes/journeyPure/assets/img/seal.png">
					</div>
					<div class="col-auto">
						<div class="content">
							<p>Joint Commission</p>
							<p class="text-orange">Highest Accreditation</p>
							<p class="sub">Earned by only 10% of rehabs</p>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="container">
			<div class="heading">
				<p class="h1"><?php echo $Location->aboveFold->heading; ?></p>
				<span class="lead"><?php echo $Location->aboveFold->subheading; ?></span>
			</div>
		</div>
	</section>
	<section class="container block-2">
		<div class="row">
			<div class="col-md-6">
				<h4 class="h1"><?php echo $Location->block2->heading; ?></h4>

					<?php foreach ( $Location->block2->list as $index => $item) : ?>
						<h5><span class="list-number"><?php echo ++$index; ?></span><?php echo $item['heading']; ?></h5>
						<div><?php echo $item['content']; ?></div>
					<?php endforeach; ?>

			</div>
			<div class="col-md-6">

			</div>
		</div>
	</section>
</div>



