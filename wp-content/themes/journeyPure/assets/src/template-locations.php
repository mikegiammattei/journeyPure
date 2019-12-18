<?php
/*
 * Template Name: Locations
 */
?>
<?php

include_once(get_stylesheet_directory() . '/classes/LocationsPage.php');
$LocationsPage = new Pages\LocationsPage();
get_header();

?>
	<div id="locations-page">
		<section class="above-fold">
			<div class="row no-gutters">
				<div class="col-12 order-md-1 order-2">
					<div style="background-image: url('/wp-content/uploads/2019/11/jp-locations-banner-2-1920x522.jpg')" class="img-container">
					</div>
					<div class="top-content">
						<div class="container">
							<div class="row justify-content-between">
								<div class="col-md-6 order-xl-1 order-lg-1 order-md-1 order-sm-2 order-last align-self-md-center">
								</div>
								<div class="col-md-6 order-md-2 order-sm-1">
									<?php if(isset($LocationsPage->ratings)): ?>
										<div class="rating-section">
											<?php foreach ($LocationsPage->ratings as $rating) : ?>
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
							<h1 class="page-heading text-white">19 Locations Across the Country</h1>
							<h2 class="lead">Whether you're just realizing there's a problem or you've been in and out of other facilities for years, we can help. People from all over the country come here because the treatment is that good. If you're not sure which location to choose, don't worry. Call or chat with someone who understands and can make a recommendation.</h2>
						</div>
					</div>
				</div>
			</div>
		</section>
		<section class="block-4">
			<div class="container">
				<div class="card-group">
					<div class="card">
						<div class="card-body">
							<h5 class="card-title h1">Tennessee</h5>
							<?php $LocationsPage->getReviewsByLocationCat("tennessee"); ?>
							<p class="card-text">With outpatient clinics in five cities and the most prestigious inpatient rehab in the state, anyone in Tennessee can get their life back on track. </p>
							<div class="rehab">
								<div class="row">
									<div class="col-1 number">1</div>
									<div class="col-7"><b><a href="/locations/tennessee/">TN Inpatient Rehab</a></b><br><data value="<?php echo $LocationsPage->reviewStats['Tennessee']['avg']; ?>" class="star"><?php echo $LocationsPage->reviewStats['Tennessee']['avg']; ?></data>&nbsp;<i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star-half-alt"></i> <data value="<?php echo $LocationsPage->reviewStats['Tennessee']['total']; ?>">(<?php echo $LocationsPage->reviewStats['Tennessee']['total']; ?>) </data>
										<br>Tennessee
										<button class="btn btn-primary" data-toggle="modal" type="button" onclick="window.location.href = '/locations/tennessee/';"><i class="fas fa-map-marker-alt" ></i> Learn More</button>
									</div>
									<div class="col-4"><a href="/locations/tennessee/"><img src="/wp-content/uploads/2019/11/murfreesboro-tn-inpatient-rehab.jpg" alt="..."></a></div>
								</div>
							</div>
							<div class="outpatient">
								<div class="row">
									<div class="col-1 number">2</div>
									<div class="col-11"><b>Knoxville Inpatient Rehab (Men's)</b><br><span class="star">4.5&nbsp;</span><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star-half-alt"></i> (35)<br>17 Ridgeway Road, Norris, TN 37828</div>
								</div>
							</div>
							<div class="outpatient">
								<div class="row">
									<div class="col-1 number">3</div>
									<div class="col-11"><b>Knoxville Inpatient Rehab (Women's)</b><br><span class="star">5.0&nbsp;</span><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i> (10)<br>2636 Maryville Pike, Knoxville, TN 37920</div>
								</div>
							</div>
							<div class="outpatient">
								<div class="row">
									<div class="col-1 number">4</div>
									<div class="col-11"><b>Knoxville Outpatient Clinc</b><br><span class="star">5.0&nbsp;</span><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i> (2)<br>9050 Executive Park Drive STE 100B, Knoxville, TN 37923</div>
								</div>
							</div>
							<div class="outpatient">
								<div class="row">
									<div class="col-1 number">5</div>
									<div class="col-11"><b>Murfreesboro Outpatient Clinic</b><br><span class="star">5.0&nbsp;</span><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i> (1)<br>1139 NW Broad Street, Suite 102, Murfreesboro, TN 37129</div>
								</div>
							</div>
							<div class="outpatient">
								<div class="row">
									<div class="col-1 number">6</div>
									<div class="col-11"><b>Nashville Outpatient Clinic</b><br><span class="star">4.3&nbsp;</span><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star-half-alt"></i> (16)<br>3808 Park Ave, Nashville, TN 37209</div>
								</div>
							</div>
							<div class="outpatient">
								<div class="row">
									<div class="col-1 number">7</div>
									<div class="col-11"><b>Clarksville Outpatient Clinic</b><br><span class="star">5.0 &nbsp;</span><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i> (2)<br>210 Needmore Road Suite A, Clarksville, TN 37040</div>
								</div>
							</div>
							<div class="outpatient">
								<div class="row">
									<div class="col-1 number">8</div>
									<div class="col-11"><b>Franklin Outpatient Clinic</b><br><span class="star">5.0&nbsp;</span><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i> (1)<br>135 2nd Avenue N Suite 200, Franklin, TN 37064</div>
								</div>
							</div>
							<div class="outpatient no-line">
								<div class="row">
									<div class="col-1 number">9</div>
									<div class="col-11"><b>Professionals Inpatient Program<br>(Doctors, Nurses)</b><br><span class="star">5.0 &nbsp;</span> <i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i> (3)<br>1306 SE Broad Street, Murfreesboro, TN 37130</div>
								</div>
							</div>

						</div>
						<div class="card-footer">
							<div class="bottom-text">
								<p>Need help in TN? Call now.</p>
								<a href="tel:8445054799" class="phone">(615) 410-9260</a>
							</div>
						</div>
					</div>
					<div class="card">
						<div class="card-body">
							<h5 class="card-title h1">Kentucky</h5>
							<?php $LocationsPage->getReviewsByLocationCat("kentucky"); ?>
							<p class="card-text">People travel from all over Kentucky to our inpatient rehab. We also have 5 outpatient clinics throughout the state. </p>
							<div class="rehab">
								<div class="row">
									<div class="col-1 number">1</div>
									<div class="col-7"><b><a href="/locations/kentucky/">KY Inpatient Rehab</a></b><br><data value="<?php echo $LocationsPage->reviewStats['Kentucky']['avg']; ?>" class="star"><?php echo $LocationsPage->reviewStats['Kentucky']['avg']; ?>&nbsp;</data> <i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star-half-alt"></i> <data value="<?php echo $LocationsPage->reviewStats['Kentucky']['total']; ?>"> (<?php echo $LocationsPage->reviewStats['Kentucky']['total']; ?>)</data><br>Kentucky
										<button class="btn btn-primary" data-toggle="modal" type="button" onclick="window.location.href = '/locations/kentucky/';"><i class="fas fa-map-marker-alt" ></i> Learn More</button>
									</div>
									<div class="col-4"><a href="/locations/kentucky/"><img src="/wp-content/uploads/2019/10/JPBG43-1.jpg" alt="..."></a></div>
								</div>
							</div>
							<div class="outpatient">
								<div class="row">
									<div class="col-1 number">2</div>
									<div class="col-11"><b>Bowling Green Outpatient Clinic</b><br><span class="star">4.8&nbsp;</span><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i> (55)<br>2349 Russellville Road, Bowling Green, KY 42101</div>
								</div>
							</div>
							<div class="outpatient">
								<div class="row">
									<div class="col-1 number">3</div>
									<div class="col-11"><b>Elizabethtown Outpatient Clinic</b><br><span class="star">5.0&nbsp;</span><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i> (3)<br>790 North Dixie, Suite B100, Elizabethtown, KY 42701</div>
								</div>
							</div>
							<div class="outpatient">
								<div class="row">
									<div class="col-1 number">4</div>
									<div class="col-11"><b>Paducah Outpatient Clinic</b><br><span class="star">3.7&nbsp;</span><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star-half-alt"></i> (3)<br>3229 Coleman Rd, Paducah, KY 42001</div>
								</div>
							</div>
							<div class="outpatient">
								<div class="row">
									<div class="col-1 number">5</div>
									<div class="col-11"><b>Lexington Outpatient Clinic</b><br><span class="star">5.0&nbsp;</span><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i> (1)<br>1401 Nicholasville Road, Lexington, KY 40503</div>
								</div>
							</div>
							<div class="outpatient">
								<div class="row">
									<div class="col-1 number">6</div>
									<div class="col-11"><b>Louisville Outpatient Clinic</b><br><span class="star">4.9&nbsp;</span><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i> (12)<br>3430 Newburg Rd Suite 208, Louisville, KY 40218</div>
								</div>
							</div>
							<h5>Kentucky's Crisis</h5>
							<p class="card-text">The addiction crisis in Kentucky is very real. Every day we lose another four lives to drug overdose, while thousands more are barely hanging on.</p>
							<h5>Kentucky's Solution</h5>
							<p>If you're struggling with drugs or alcohol anywhere in the state, this is your best option to get back on track. Let's talk about what's going on and go from there. You can feel better again.</p>
						</div>
						<div class="card-footer">
							<div class="bottom-text">
								<p>Need help in KY? Call now.</p>
								<a href="tel:8445054799" class="phone">(270) 282-8280</a>
							</div>
						</div>
					</div>
					<div class="card">
						<div class="card-body">
							<h5 class="card-title h1">Florida</h5>
							<?php $LocationsPage->getReviewsByLocationCat("florida"); ?>
							<p class="card-text">Anyone can access the best drug and alcohol treatment in the country at our locations throughout sunny Florida.</p>
							<div class="rehab">
								<div class="row">
									<div class="col-1 number">1</div>
									<div class="col-7"><b><a href="/locations/florida/">FL Inpatient Rehab</a></b><br><data value="<?php echo $LocationsPage->reviewStats['Florida']['avg']; ?>" class="star"><?php echo $LocationsPage->reviewStats['Florida']['avg']; ?></data>&nbsp;<i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star-half-alt"></i> <data value="<?php echo $LocationsPage->reviewStats['Florida']['total']; ?>"> (<?php echo $LocationsPage->reviewStats['Florida']['total']; ?>)</data><br>Florida
										<button class="btn btn-primary" data-toggle="modal" type="button" onclick="window.location.href = '/locations/florida/';"><i class="fas fa-map-marker-alt" ></i> Learn More</button>
									</div>
									<div class="col-4"><a href="/locations/florida/"><img src="/wp-content/uploads/2019/10/JOURNEYPURE-25-e1573757926615.jpg" alt="..."></a></div>
								</div>
							</div>
							<div class="outpatient">
								<div class="row">
									<div class="col-1 number">2</div>
									<div class="col-11"><b>Panama City Outpatient Clinic</b><br><span class="star">5.0&nbsp;</span><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i> (1)<br>22600 Panama City Beach Parkway, Panama City Beach, FL 32413</div>
								</div>
							</div>
							<div class="outpatient">
								<div class="row">
									<div class="col-1 number">3</div>
									<div class="col-11"><b>Fort Walton Outpatient Clinic</b><br><span class="star">5.0&nbsp;</span><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i> (1)<br>348 Miracle Strip Pkwy SW Suite 34, Fort Walton Beach, FL 32548</div>
								</div>
							</div>
							<div class="outpatient">
								<div class="row">
									<div class="col-1 number">4</div>
									<div class="col-11"><b>Melbourne Outpatient Clinic <br>(With Options for Sober Housing)</b><br><span class="star">5.0&nbsp;</span><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i> (2)<br>100 S Harbor City Blvd, Melbourne, FL 32901</div>
								</div>
							</div>
							<h5>Those Outside Florida</h5>
							<p>While you may not have wanted to go far from home, that could be exactly what you need. Escaping triggers and bad influences helps you stay focused on getting to the core of your issue.</p>
							<h5>Those in Florida</h5>
							<p>People come from as far as Alaska to access treatment here. With locations in the southeast and the northwest of the state, you're a drive or bus ride away. No excuses!</p>
							<h5>The Military Community</h5>
							<p>Our Florida locations have separate programming run by veterans who understand the heaviness you live with every day. We're in network with Tricare and VA Choice and are the only facility testing virtual reality technology in treatment. </p>

						</div>
						<div class="card-footer">
							<div class="bottom-text">
								<p>Looking for an escape? Let's talk.</p>
								<a href="tel:8445054799" class="phone">(850) 424-1923</a>
							</div>
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
