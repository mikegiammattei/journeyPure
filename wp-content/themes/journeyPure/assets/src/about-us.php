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
				<div style="background-image: url('/wp-content/uploads/2019/11/journeypure-about-us-equine-therapy.jpg')" class="img-container">
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
						<h1 class="page-heading text-white">Here, it's different.</h1>
						<h3 class="lead">Our mission is to help people become healthy and stay healthy. Patients here get evidence-based, dual-diagnosis addiction treatment and compassionate care.  Our high standards attract well-known behavioral health professionals from across the country.  Their commitments to ethics and patient success are backed by the highest accreditation and affiliations in the industry.</h3>
					</div>
				</div>
			</div>
		</div>
	</section>
	<section class="bio-section">
		<div class="container">
			<div class="heading">
				<h2 class="h1">The Leadership Team</h2>
			</div>
			<div id="about-bio-slider" class="about-bio-slider" data-slick='{"slidesToShow":<?php echo (count($AboutUs->bios->bios) < 3) ? count($AboutUs->bios->bios) : 3; ?>}'>
				<?php  foreach ($AboutUs->bios->bios as $index => $bio): ?>
				<div class="card default border-0">
					<div class="card-body bios">
						<div class="img-box">
							<div class="img" style='background-image: url("<?php echo $bio->photo['image']; ?>");'></div>
						</div>
						<div class="header">
							<p class="text name-text"><?php echo $bio->name; ?> <span class="text"><?php echo $bio->credentials; ?></span></p>
							<p class="text"><?php echo $bio->title; ?></p>
						<hr />
						</div>
						<p class="bio-long"><?php echo ($bio->qualifications) ? '<span class="fa-li"><i class="fas fa-folder-plus"></i></span>' . $bio->qualifications . '': ''; ?></p>

						<ul class="fa-ul">
							<?php echo ($bio->years) ? '<li><span class="fa-li"><i class="fas fa-clock"></i></span>' . $bio->years . ' years in the field</li>': ''; ?>
							<?php echo ($bio->education) ? '<li><span class="fa-li"><i class="fas fa-graduation-cap"></i></span>' . $bio->education . '</li>': ''; ?>
							<?php echo ($bio->specialty) ? '<li><span class="fa-li"><i class="fas fa-star"></i></span>' . $bio->specialty . '</li>': ''; ?>
							
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
						<span><?php echo ($bio->news_mentions) ? 'News Mentions': ''; ?></span>
						<?php if(!empty($bio->news_mentions)): ?>
							<div id="bio-new-mentions-<?php echo $index; ?>" class="bio-new-mentions" data-slick='{"slidesToShow": <?php echo (count($bio->news_mentions) < 3) ? count($bio->news_mentions) : 3; ?>}'>
								<?php foreach ($bio->news_mentions as $news_mention) : ?>
									<div class="mention">
										<?php if(!empty($news_mention['mention'])): ?>
											<a href="<?php  echo  $news_mention['link_to_article']; ?>" target="_blank"><div class="content"><?php echo  $news_mention['mention']; ?></div></a>
										<?php endif; ?>
										
									</div>
								<?php endforeach; ?>
							</div>
							<div class="row justify-content-between">
								<div class="col-6">
									<small class="link see-more-mentions has-more"><data>Data Generated Via Script</data> More Articles ▼ </small>
								</div>
								<div class="col-6 text-right">
									<small class="link see-less-mentions">▲ Back</small>
								</div>
							</div>
						<?php endif; ?>
						</div>
					</div>
				<?php endforeach; ?>
			</div>

			<div class="clearfix"></div>
			<!--
			<div class="main-controls">
				<div class="row justify-content-between">
					<div class="col-6">
						<p class="link see-less-btn">Back</p>
					</div>
					<div class="col-6 text-right">
						<p class="link see-more-btn">More</p>
					</div>
				</div>
			</div>
			-->
		</div>
	</section>
	<section class="page-quote">
		<div class="container">
			<div class="container"><div class="header"><div class="lead">"In order to continuously improve, we believe in science, real-world analysis and teamwork. Yet, the driving force behind JourneyPure remains an eternal compassion to help."</div></div><div class="media d-inline-flex"> <img class="mr-3" src="/wp-content/uploads/2019/11/dr-stephen-loyd-journeypure-md.jpg" alt="Doctor Stephen Loyd Headhot as Drug Czar"><div class="media-body "><h5 class="mt-0">Dr. Stephen Loyd MD</h5><p>Chief Medical Officer</p></div></div></div>
		</div>
	</section>
		<section class="ethics">
		<div class="container">
		<h2 class="h1">Founding Principles</h2>
				<div class="media media-number-list"><div class="align-self-start mr-3 list-number colored"><i class="fas fa-check"></i></div><div class="media-body"><h5 class="mt-0">Addiction is a disease that can be treated with evidence-based and research-backed treatments</h5></div></div>
		<div class="media media-number-list"><div class="align-self-start mr-3 list-number colored"><i class="fas fa-check"></i></div><div class="media-body"><h5 class="mt-0">Any co-occurring mental health conditions must be treated along with the addictive behaviors to achieve long-term healing </h5></div></div>

		<div class="media media-number-list"><div class="align-self-start mr-3 list-number colored"><i class="fas fa-check"></i></div><div class="media-body"><h5 class="mt-0">Everyone can recover from addiction</h5></div></div>
				<div class="media media-number-list"><div class="align-self-start mr-3 list-number colored"><i class="fas fa-check"></i></div><div class="media-body"><h5 class="mt-0">Every patient deserves respectful, compassionate care </h5></div></div>
<div class="media media-number-list"><div class="align-self-start mr-3 list-number colored"><i class="fas fa-check"></i></div><div class="media-body"><h5 class="mt-0">Treatment providers are accountable for patient's lasting success</h5></div></div>
	</div>
	</section>


	<section class="block-4">
		<div class="container">
			<h5 class="heading h1">Third-Party Vetted</h5>
				<h3 class="heading">Our treatment is monitored by all the leading addiction healthcare organizations.</h3>
			<div class="card-deck">
				<div class="card">
					<img src="/wp-content/uploads/2019/11/carf-bg-fade-02.jpg" class="card-img-top" alt="...">
					<div class="card-body">
						<h5 class="card-title">CARF Accredited </h5>
						<p class="card-text">
							While state licensing is mandatory, adhering to much <b>higher standards</b> from non-profit accrediting organizations is reserved only for providers with the commitment and capabilities to provide <b>better treatment</b>.  <i>The majority of addiction treatment providers are not accredited.</i> CARF is the highest level of accreditation in our industry.  The review process takes nine to 12 months. Only 20% of addiction treatment providers meet and maintain these <a href="http://www.carf.org/Accreditation/" target="_blank">strict criteria</a>.
						</p>
					</div>
				</div>
				<div class="card">
					<img src="/wp-content/uploads/2019/11/legitscripts-bg-fade-01.jpg" class="card-img-top" alt="...">
					<div class="card-body">
						<h5 class="card-title">LegitScript Certified</h5>
						<p class="card-text">
							LegitScript is the authority on <b>ethical healthcare marketing</b>. Most other large providers in our industry do not meet these high standards. We were one of the first companies in the world to earn the LegitScript certification, which is backed by Visa, MasterCard, Google, Microsoft and Facebook. The certification assures what we say about ourselves and our facilities are <b>true and transparent</b>. It also ensures we do not accept any form of payment for referrals. Our status can be verified on <a href="https://www.legitscript.com/websites/?lookup_type=website_search&website=www.journeypure.com&product=" target="_blank">LegitScript.com</a>.

						</p>
						
					</div>
				</div>
				<div class="card">
					<img src="<?php echo WP_UPLOAD_PATH;?>/2020/01/BD-O-bg-fade-01.jpg" class="card-img-top" alt="...">
					<div class="card-body">
						<h5 class="card-title">Health Insurance Distinguished</h5>
						<p class="card-text">
							Blue Cross Blue Sheild is the largest health insurer in the U.S. The honor of Blue Distinction means we <i>"demonstrate quality care, treatment expertise and better overall patient results."</i> Learn how they separate <b>the top 1%</b> of specialty care providers on <a href="https://www.bcbs.com/sites/default/files/file-attachments/page/Substance_Use_Treatment_and_Recovery_Selection_Criteria.pdf" target="_blank">BCBS.com</a>. In addition, Optum is also using data and insights to categorize the effectiveness of treatment facilities. We earned the <b>highest Platinum status</b>. More information on the Optum tier system is available on <a href="https://cdn-aem.optum.com/content/dam/optum3/optum/en/resources/white-papers/OptumAchievementsinClinicalExcellenceforFacilitiesWhitePaper.pdf" target="_blank">Optum.com</a>.

						</p>
						
					</div>
				</div>
			</div>
			
		</div>

	</section>
	
	<section class="block-3 " style="background-image: url(''); "><div class="container">   <div class="content-section ">
	<h5 class="h1">The Latest News
<a href="https://www.facebook.com/journeypure" target="_blank"><i class="fab fa-facebook"></i></a><a href="https://www.linkedin.com/company/journeypure/about/" target="_blank"><i class="fab fa-linkedin-in"></i></a><a href="https://www.youtube.com/journeypure" target="_blank"><i class="fab fa-youtube"></i></a></h5>
	<div class="row row-eq-height"> <div class="col-lg-6 d-flex align-items-stretch card-col"><div class="card default  effect-none"> <div class="card-body"><div class="card-text"> 
<ul>
<li><h3>Official provider for retired NFL & MLB pro athletes.</h3><hr /> <div class="row"><div class="col-md-10 col-sm-12">We are the only addiction treatment provider approved by the NFL Player Care Foundation and the MLB BAT program.</div><div class="col-md-2 col-sm-12"><img src="/wp-content/uploads/2020/01/Player-Care-Foundation-500x342-1.png"></div></div>
</li>
<li><h3>We're in-network with new VA Choice insurance.</h3><hr /> Veteran care is a high priority here. We accept Tricare and have specialized programs led by veterans that include virtual reality technology in treatment.
</li>
<li><h3>All 14 outpatient locations across the country have launched.</h3><hr />  We're growing in our commitment to communities in <a href="/locations/tennessee/">Tennessee</a>, <a href="/locations/kentucky/">Kentucky</a> and <a href="/locations/florida/">Florida</a>. Offering both outpatient and inpatient care is the only way to meet each person where they're at.</li>
<li class="last-news"><h3>Current data shows 84% of alumni are sober six months after starting treatment here.</h3><hr /> We use our data and statistically-verified studies from others in the industry to adjust our programs in ways that have the biggest impact on individual success. </li>
</ul>
</div></div></div></div> <div class="col-lg-6 d-flex align-items-stretch card-col"><div class="card default  effect-none"> <div class="card-body"><div class="card-text">  <img class="featured" src="/wp-content/uploads/2019/11/journeypure-alumni-app-after-rehab-left.png" alt="JourneyPure Phone App Screenshot Listing Features"> </div></div></div></div> </div></div>  <div class="content-section top-lg"><div class="card default"><div class="card-body"> </div></div></div> </div></section>

	<section class="insurance-section">
		<div class="container">
			<?php $_inc->get_insurance_banner(); ?>
		</div>
	</section>
</div>
<?php get_footer(); ?>
