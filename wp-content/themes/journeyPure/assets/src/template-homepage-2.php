<?php
/*
 * Template Name: Homepage 2
 */

include_once(get_stylesheet_directory() . '/classes/Homepage.php');
$Homepage = new Homepage\Homepage();

/** Page specific js*/
$jsFile = 'homepage';

/** Specify footer */
$footerVersion = 2;

get_header();

?>
<div id="homepage" class="homepage-2">
<div class="note-box">
	<h3>We are accepting new inpatient admissions with additional pre-screening procedures. All outpatient services, family therapy and alumni meetings are running virtual-only until further notice.</h3>
	<p>Learn More</p>
		<span class="note-cta"><i class="fas fa-phone"></i> <?php echo get_option('defaultPhone'); ?></span>
	</div>
	<main>
		<?php $restApiPath = 'http://journeypure.net/rest-api'; ?>
		<section class="above-fold">
			<div class="default-container x-loc lazy" data-src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/tennessee-background.jpg">
				<div>
					<div class="content">
						<h1 class="heading text-primary">Get Your Life Back on Track</h1>
						<div class="h3 text-primary">
							Your #1 Choice for Drug & Alcohol Treatment
						</div>
						<hr>
						<div class="feature">
							<div class="row">
								<div class="col-lg-6 col-sm-12 ">
									<div class="card transparent">
										<div class="card-body">
											<h5>You deserve help that actually helps you. You deserve a treatment team that listens and puts you first.</h5>
											<p>Getting help is a life-changing experience. And, change can feel scary. Whether you choose JourneyPure or not, follow-through on getting treatment. We're always here to talk about your options.</p>
										</div>
										<?php if($Homepage->ratings): ?>
											<div class="rating-section">
												<div class="row no-gutters">
													<?php foreach ($Homepage->ratings as $rating) : ?>
														<div class="col-md-6 i-rating">
															<div class="ratings default inline lineup">
																<div class="row no-gutters align-items-center">
																	<div class="col-2">
																		<img class="lazy" data-src="<?php echo $rating->image['sizes']['medium']; ?>" alt="<?php echo get_post_meta( $rating->image['ID'], '_wp_attachment_image_alt', true ); ?>">
																	</div>
																	<div class="col-10">
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
														</div>
													<?php endforeach; ?>
												</div>
											</div>
										<?php endif; ?>
									</div>
								</div>
								<div class="col-lg-6 col-sm-12 d-flex align-items-stretch">
									<div class="card card-body h-100 justify-content-center transparent" style="width: 100%; ">
										<div class="embed-responsive embed-responsive-16by9 youtube-video-place" style=" cursor: pointer; background: no-repeat center url('/wp-content/themes/journeyPure/assets/img/addiction-video-home-page.JPG');
		  -webkit-background-size: cover;
		  background-size: cover;" data-yt-url="https://www.youtube.com/embed/Gd1Dza355X8?rel=0&showinfo=0&autoplay=1">
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>
		<section class="block-4">
			<div class="container">
				<div class="service-container">
					<h5 class="heading">You Have Options</h5>
					<div class="row">
						<div class="col-md-3">
							<div class="box">
								<i class="fas fa-user-md"></i>  Medical Detox <p>It's nothing like doing it on your own.</p>
							</div>
						</div>
						<div class="col-md-3">
							<div class="box">
								<i class="fas fa-clinic-medical"></i>  Inpatient Rehabs <p>The most effective level of treatment.</p>
							</div>
						</div>
						<div class="col-md-3">
							<div class="box">
								<i class="fas fa-hotel"></i>  Outpatient Clinics <p>Treatment that works around your schedule.</p>
							</div>
						</div>
						<div class="col-md-3">
							<div class="box last">
								<i class="fas fa-mobile-alt"></i> App + Coaching <p>Free, ongoing support whenever feel triggered.</p>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>
		<section class="insurance-section">
			<div class="insurance-banner">
	<div class="row">
		<div class="col-12">
		<h5 class="center">Plus, Your Treatment is Likely In-Network </h5>
		<p>Cost is usually part of a decision like this. Luckily, insurance almost always covers the majority of the cost for treatment here. <a data-toggle="modal" data-target="#main-insurance-form">Check your policy now</a>.</p>
			<img class="lazy loaded" src="/wp-content/themes/journeyPure/assets/img/insurance2.png" data-src="/wp-content/themes/journeyPure/assets/img/insurance2.png" alt="Aetna, Anthem Blue Cross Blue Sheild, Cigna Heath Insurances" data-was-processed="true">
			<img class="lazy loaded" src="/wp-content/themes/journeyPure/assets/img/insurance1.png" data-src="/wp-content/themes/journeyPure/assets/img/insurance1.png" alt="Amerihealth, United Healthcare, Humana, Tricare and 43 More Insurances" data-was-processed="true">
		</div>
	</div>
	
</div>
		</section>


		<?php if(isset($Homepage->bioSection)): ?>
			<section class="bio-section">
				<div class="container">
						<div class="heading">
							<h5 class="h1">Your Life Matters to Us</h5>
						</div>
					<div class="subheading">
						<p class="h3">It's the personal story and hope for each person that walks through our doors that gets us up in the morning and keeps us up at night. Here are a few of the 40+ doctorate or master's-level professionals you'll meet here.</p>
					</div>

					<div class="bio-slider row" >
						<?php foreach ($Homepage->bioSection->bios as $bio): ?>
							<div class="col-md-3 col-sm-4">
								<div class="card default border-0">
									<div class="card-body  bios">
										<div class="img" style='background-image: url("<?php echo $bio->photo['image']; ?>");'></div>
										<p class="text name-text"><?php echo $bio->name; ?> <span class="text"><?php echo $bio->credentials; ?></span>
										</p>

										
											<?php
											if(!empty($bio->recovery_status)):
												switch ($bio->recovery_status):
													case 'person' :
														echo 'In Recovery';
														break;
													case 'loved_one' :
														echo 'Loved One in Recovery';
														break;
												endswitch;
											endif;
											?>
										</p>
									</div>
								</div>
							</div>
						<?php endforeach; ?>
					</div>
				</div>
			</section>
		<?php endif; ?>
				<section class="block-1">
			<div class="container">
				<div class="header">
					<div class="lead">
						 "Everyone comes in overwhelmed, but looking to make big changes quickly. This is where you start to take back your health, family and future. You can do this!"
					</div>
				</div>
				<div class="media d-inline-flex">
					<img class="mr-3 lazy" a data-src="/wp-content/uploads/2019/11/kevin-lee.jpg" alt="Kevin Lee">
					<div class="media-body ">
						<h5>Kevin D. Lee</h5>
						<p>CEO & Founder</p>
					</div>
				</div>
			</div>
		</section>
		<?php echo jp_divider() ?>
		<section class="block-2">
			<div class="container">
				<div class="row">
					<div class="col-lg-6 col-sm-12">
						<h5 class="heading-prime h1">Now, Here Are The Facts</h5>
						<div class="details">
							<?php
							$listItems = array();
							$listItems[] = array(
								'heading' => "You're TWICE as likely to get better here",
								'content' => "The <a href=\"https://www.drugabuse.gov/publications/principles-drug-addiction-treatment-research-based-guide-third-edition/frequently-asked-questions/how-effective-drug-addiction-treatment\" target=\"_blank\">National Institute on Drug Abuse</a> reports as little as 40% of people sober six months after starting treatment at another facility. That's not good. At JourneyPure, our success rate is 84%, and our app keeps us in touch long-term to help the few that do have a slip get right back on track."
							);
							$listItems[] = array(
								'heading' => "Your treatment is backed by 6K+ success stories",
								'content' => "We've helped thousands of people like you get healthy and stay healthy.  Don't buy-in to the idea that treatment won't work. You've got this! (And, we're here to help)."
							);
							$listItems[] = array(
								'heading' => "There's 95% you'll be happy with your care",
								'content' => "You're probably looking for a provider that listens and constantly improves.  As of " . date('F Y') . ", the satisfaction rate here has never dropped below 95%."
							);
							?>
							<?php if($listItems): ?>
								<?php foreach ( $listItems as $index => $item) : ?>
									<div class="media media-number-list">
										<div class="align-self-start mr-3 list-number colored"><i class="fas fa-check"></i></div>
										<div class="media-body">
											<h5><?php echo $item['heading']; ?></h5>
											<?php echo $item['content']; ?>
										</div>
									</div>
								<?php endforeach; ?>
							<?php endif; ?>
						</div>
						<div class="featured-on">
							<h5 class="heading line-heading">
								<span>Trusted By</span>
							</h5>
							<div class="media-outlets">
								<div class="row no-gutters">
									<div class="media-con">
										<div class="media-box">
											<div class="inner-con"> <img class="lazy" data-src="<?php echo  get_stylesheet_directory_uri(); ?>/assets/img/ref-logos/nyt-150x150.png" alt="The New York Times"></div>
										</div>
									</div>
									<div class="media-con">
										<div class="media-box">
											<div class="inner-con"> <img class="lazy" data-src="<?php echo  get_stylesheet_directory_uri(); ?>/assets/img/ref-logos/npr-150x150.png" alt="NPR"></div>
										</div>

									</div>
									<div class="media-con">
										<div class="media-box">
											<div class="inner-con"> <img class="lazy" data-src="<?php echo  get_stylesheet_directory_uri(); ?>/assets/img/ref-logos/nbc-150x150.png" alt="NBC"></div>
										</div>
									</div>
									<div class="media-con">
									<div class="media-box">
											<div class="inner-con"> <img class="lazy" data-src="<?php echo  get_stylesheet_directory_uri(); ?>/assets/img/ref-logos/HUFF_POST.png" alt="The Huffington Post"></div>
										</div>
									</div>
									<div class="media-con">
										<div class="media-box">
											<div class="inner-con"> <img class="lazy" data-src="<?php echo  get_stylesheet_directory_uri(); ?>/assets/img/ref-logos/bbc-150x150.png" alt="BBC"></div>
										</div>
									</div>
									<div class="media-con">
										<div class="media-box">
											<div class="inner-con"> <img class="lazy" data-src="<?php echo  get_stylesheet_directory_uri(); ?>/assets/img/ref-logos/nfl-150x150.png" alt="Players Care Foundation"></div>
										</div>
									</div>
									<div class="media-con">
										<div class="media-box">
											<div class="inner-con"> <img class="lazy" data-src="<?php echo  get_stylesheet_directory_uri(); ?>/assets/img/ref-logos/vanderbilt-150x150.png" alt="Venderbilt University"></div>
										</div>
									</div>
									<div class="media-con">
										<div class="media-box">
											<div class="inner-con"> <img class="lazy" data-src="<?php echo  get_stylesheet_directory_uri(); ?>/assets/img/ref-logos/HR-Departments-02.png" alt="58K HR Departments"></div>
										</div>
									</div>
									<div class="media-con">
										<div class="media-box">
											<div class="inner-con"> <img class="lazy" data-src="<?php echo  get_stylesheet_directory_uri(); ?>/assets/img/ref-logos/Hospital-Systems-02.png" alt="77 Hospital Systems"></div>
										</div>
									</div>
									<div class="media-con">
										<div class="media-box">
											<div class="inner-con"> <img class="lazy" data-src="<?php echo  get_stylesheet_directory_uri(); ?>/assets/img/ref-logos/Military-Orgs-02.png" alt="24 Military Bases and Vetran Organizations"></div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="col-lg-6 col-sm-12 facility-photos">
						<img data-src="/wp-content/themes/journeyPure/assets/img/rehab-outpatient-collage-2020.png" class="lazy" alt="Beautiful, clean indoors, plenty of outdoor space"/>
						<img data-src="/wp-content/uploads/2020/01/journeypure-rehab-facility-collage.jpg" class="mobile-only lazy" alt="Ocean and river views"/>
					</div>
				</div>
			</div>
		</section>
		
		<section class="block-3">
			<div class="container">
			
			
				<div class="heading">
					<h5 class="h1">Why Treatment Here Works</h5>
				</div>
						<h3>Even if you've been to dozens of other facilities before, the treatment here is different.  We set industry standards and hold ourselves accountable for your long-term success.</h3>
				<div class="d-flex">
					<div class="p-2">
						<div class="row why-point">
							<div class="col-lg-1">
								<i class="fas fa-microscope"></i>
							</div>
							<div class="col-lg-11">
								<div class="h5">Evidence-Based Treatments</div>
								<p>All good treatment centers combine medical care, holistic healing and intense daily therapies. Our success rates are better because of how we execute and refine these methods.  Not only do we follow the <b>latest advances in addiction science</b>, but the research we publish is often leading the charge.</p>
							</div>	
						</div>
						<div class="row why-point">
							<div class="col-lg-1">
								<i class="fas fa-file-medical-alt"></i>
							</div>
							<div class="col-lg-11">
								<div class="h5">Personalized Plans</div>
								<p>These issues are personal. You need access to the specific tools that <b>maximize your time here</b>. From virtual-reality therapy for combat veterans to imago marriage counseling, we'll do what it takes to help you get healthy (and stay healthy).</p>
							</div>	
						</div>
					</div>
					<div class="ml-auto p-2">
						<div class="row why-point">
							<div class="col-lg-1">
								<i class="fas fa-user-md"></i>
							</div>
							<div class="col-lg-11">
								<div class="h5">World-Renowned Experts</div>
								<p>We've built a reputation over the last decade that attracts the county's leading addiction doctors, therapists and researchers. If you've sought treatment before, you know how critical it is to get <b>individualized attention from experienced professionals</b> who actually care.</p>
							</div>	
						</div>
						<div class="row why-point">
							<div class="col-lg-1">
								<i class="fas fa-hands-helping"></i>
							</div>
							<div class="col-lg-11">
								<div class="h5">Active Accountability</div>
								<p>Your Accountability Coach can be reached 24/7 through the alumni app. They've been where you are and can show you how to stay on track. The app also has an 11-modual self-help course and gives you <b>real rewards for making healthy choices</b>. </p>
							</div>	
						</div>
					</div>
					
				</div>					
										
				</div>
		</section>
		<section class="review-section">
			<div class="container">
				<div class="parent">
					<div class="content-container-left">
						<div class="details">
							<h5 class="h1">The Reviews</h5>
							<div class="tallies">
								<span class="avg display-4">4.8</span> ,
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
									<data value="<?php echo $Homepage->reviewTotal; ?>">438</data>
									Reviews
								</p>
								<p class="link post-review-link" data-toggle="modal" data-target="#leave-a-review">Leave a Review</p>
							</div>
						</div>
					</div>
					<div class="content-container-right">
						<div class="review-slide-container <?php echo (count($Homepage->reviews) == 1) ? ' pb-5' : ''; ?>" >
							<div class="review-slide" data-slick='{"slidesToShow": 1}' role="toolbar">
								<?php foreach ($Homepage->reviews as $reviews) :   ?>
									<div class="card">
										<div class="card-body">
											<div class="author-info">
												<div class="row">
													<div class="col-md-auto align-self-center">
														<img class="lazy" data-src="<?php echo $reviews->photo['image']; ?>" alt="<?php echo $reviews->photo['alt']; ?>">
													</div>
													<div class="col-md-auto align-self-center">
														<h5 class="card-title"><?php echo $reviews->heading; ?></h5>
														<div class="stars">
															<?php for($i=0; $i < $reviews->star_rating; $i++): ?>
																<i class="fas fa-star"></i>
															<?php endfor; ?>
														</div>
													</div>
													<?php if(isset($reviews->source_image['image'])): ?>
														<div class="review-logo">
															<img class="source-img lazy" data-src="<?php echo $reviews->source_image['image']; ?>" alt="<?php echo $reviews->source_image['alt']; ?>">
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
							</div>
							<div class="review-nav">
								<p class="link see-less-btn">Previous</p>
								<p class="link see-more-btn has-more"> More</p>
							</div>
						</div>
					</div>
				</div>
			</div>
								
						<div class="bio-default container">
							<div class="row no-gutters">
								<?php foreach ($Homepage->bios as $bio): ?>
									<?php
									/** Set the range to start likes from if the object has never been like.
									 *  The total will be a random number between the range. If a specific number
									 *  is desired, then add the desired number as the min and max
									 */
									$Homepage->setInitialLikesStart(54,300);
									$likeIdentifier = $bio->identifier;
									$totalLikes  = $Homepage->setLikes($likeIdentifier);
									?>
									<div class="col-md-3">
										<div class="bio">
											<figure class="lazy" data-src="<?php echo $bio->photo['image']; ?>">
											</figure>
											<?php if($bio->sober_since): ?>
												<div data-like-object="<?php echo $likeIdentifier; ?>" class="like-button"  data-placement="top" data-toggle="tooltip" <?php echo ($Homepage->isLikedBySession($likeIdentifier)) ? 'title="Already liked"' : 'title="Do you like?"'; ?>>
													<i class="fas fa-thumbs-up"></i>
													<data value="<?php echo $totalLikes; ?>"> <?php echo $totalLikes; ?></data>
												</div>
												<span class="sub-caption">
							 <figcaption class="name"><?php echo $bio->name; ?></figcaption>
							 Sober <span class="text-uppercase"> <?php echo $bio->sober_since ?></span>
						  </span>
											<?php endif; ?>
										</div>
									</div>
								<?php endforeach; ?>
							</div>
						</div>
					
		</section>
		
		<div class="call-text">
			<div class="row">
				<div class="col-lg-6">
					<img src="/wp-content/themes/journeyPure/assets/img/call-cta.jpg" />
				</div>
				<div class="col-lg-6 text-side">
					<h5 class="h1">It's Time to Make a Change</h5>
					<h3>The first step is to call. Even if you're not ready to commit, talk about what's going on with someone that's been there before.  You'll feel better after you call, I promise.</h3>
					<p>If you decide at any point to come here, the process is simple:</p>
					<ul><li>Your insurance policy is checked.</li> 
					<li>You're scheduled for a day and time to come in to the center.</li>
					<li>We meet you at the airport if you're flying here. </li>
					<li>You're welcomed with warmth and acceptence.</li></ul>
					
					<span class="note-cta"><i class="fas fa-phone"></i> <?php echo get_option('defaultPhone'); ?></span>
				</div>
			</div>
		</div>
		
		
		<section class="faqs">
			<div class="container">
				<h5 class="h1 text-center">What's holding you back?</h5>
				<div class="accordion" id="location-faq-rehab">
					<?php foreach ( $Homepage->faqs as $index => $faq) : ?>
						<div class="card">
							<div  data-parent="#location-faq-rehab" class="card-header  <?php echo ($index != 0) ? "collapsed" : ""; ?>" data-toggle="collapse" data-target="#l-faq-<?php echo $index; ?>" aria-expanded="true" aria-controls="l-faq-<?php echo $index; ?>" id="l-faq-heading-<?php echo $index; ?>">
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
							<div id="l-faq-<?php echo $index; ?>" class="collapse <?php echo ($index == 0) ? "show" : ""; ?>" aria-labelledby="l-faq-heading-<?php echo $index; ?>">
								<div class="card-body">
									<?php echo $faq->answer; ?>
								</div>
							</div>
						</div>
					<?php endforeach; ?>
				</div>
		</section>
		<div class="ask-a-question">
				<div class="container">
						<h3 clss="h1">Still have questions?</h3>

						<div class="row">
    <div class="col-xs-6 col-md-3 text-center"><a href="/appointment" class="track" rel="contact endcap: appointment funnel: book free appointment">
  		<i class="fas fa-phone"></i> <h4 class="oswald-med-uppercase jc-blue-dark">Book Free Appointment</h4></a>
    </div>

    <div class="col-xs-6 col-md-3 text-center jc-blue-dark endcap-wrap">
      <img alt="" src="https://www.jennycraig.com/themes/custom/jenny_bootstrap/images/endcap-icon-booking.png" /><h4 class="oswald-med-uppercase jc-blue-dark tablet-desktop">Call us: <span class="phone attributionNumber"><a href="tel:+1-877-260-4880" class="track jc-blue-dark" rel="contact endcap: phone: desktop number">877-260-4880</a></span></h4>
      <h4 class="oswald-med-uppercase jc-blue-dark mobile-only"><span class="phone attributionNumber"><a href="tel:+1-877-260-4880" class="track jc-blue-dark" rel="contact endcap: phone: mobile give us a call">877-260-4880</a></span></h4>
    </div>

    <div class="col-xs-6 col-md-3 text-center jc-blue-dark endcap-wrap">
      <a href="sms:7602390029" class="track" rel="contact endcap: text 760-239-0029"><img data-src="/themes/custom/jenny_bootstrap/images/endcap-icon-mobile.png" class=" lazyloaded img-center" alt="Text Us Icon" src="/themes/custom/jenny_bootstrap/images/endcap-icon-mobile.png"></a>
      <h4 class="oswald-med-uppercase jc-blue-dark tablet-desktop"><a href="sms:7602390029" class="track jc-blue-dark" rel="contact endcap: text 760-239-0029">Text Us: 760-239-0029</a> <a id="myPop" data-title="X" tabindex="0" data-html="true" data-container="body" data-toggle="popover" data-placement="auto top" data-trigger="focus" data-content="By texting the number indicated above, you authorize Jenny Craig to send informational and marketing calls or text messages to the phone number you text from. Standard message and data rates may apply. Messages may be sent from an automated system. Consent is not required to receive any good or service. Text STOP to 760-239-0029 to opt out.  View our privacy policy at www.jennycraig.com/privacy for more information." role="button" data-original-title="" title=""><span class="glyphicon glyphicon-info-sign jc-blue-dark" aria-hidden="true"></span></a></h4>
      <h4 class="oswald-med-uppercase jc-blue-dark mobile-only"><a href="sms:7602390029" class="track jc-blue-dark" rel="contact endcap: text 760-239-0029">Send us a text</a> &nbsp;&nbsp;<a id="myPop" data-title="X" tabindex="0" data-html="true" data-container="body" data-toggle="popover" data-placement="auto top" data-trigger="focus" data-content="By texting the number indicated above, you authorize Jenny Craig to send informational and marketing calls or text messages to the phone number you text from. Standard message and data rates may apply. Messages may be sent from an automated system. Consent is not required to receive any good or service. Text STOP to 760-239-0029 to opt out.  View our privacy policy at www.jennycraig.com/privacy for more information." role="button" data-original-title="" title=""><span class="glyphicon glyphicon-info-sign" aria-hidden="true"></span></a></h4>
    </div>
    
    <div class="col-xs-6 col-md-3 text-center endcap-wrap">
      <a href="/faqs" class="track" rel="contact endcap: FAQs"><img data-src="/themes/custom/jenny_bootstrap/images/endcap-icon-question.png" class=" lazyloaded img-center" alt="FAQ Icon" src="/themes/custom/jenny_bootstrap/images/endcap-icon-question.png"></a>
      <h4 class="oswald-med-uppercase jc-blue-dark tablet-desktop"><a href="/faqs" class="track jc-blue-dark" rel="contact endcap: FAQ">FAQ</a></h4>
      <h4 class="oswald-med-uppercase jc-blue-dark mobile-only"><a href="/faqs" class="track jc-blue-dark" rel="contact endcap: FAQ">FAQ</a></h4>
    </div>
  </div>
				
		
			</div>
			</div>
			</div>
	</main>
</div>
<?php get_footer(); ?>
