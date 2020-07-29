<?php
/*
 * Template Name: Homepage 2
 */

include_once(get_stylesheet_directory() . '/classes/Homepage.php');
$Homepage = new Homepage\Homepage();

/** Page specific js*/
$jsFile = 'homepage';
get_header();
/** Specify footer */
$footerVersion = 2;

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
				<div class="background-fade">
					<div class="content">
						<h1 class="heading text-primary">
							Get Your Life Back on Track
						</h1>
						<hr>
						<div class="feature">
							<div class="row">
								<div class="col-lg-12 col-sm-12 top-text">
									<div class="card transparent">
										<div class="card-body">
											<h5>You deserve help that actually helps you – and a treatment team that listens and puts you first.</h5>

											<p>Drug and alcohol issues are complex and personal. But, you don't have to figure this out on your own. When you're ready for something to change, call to talk privately about your options and get information without commitment.</p>

											<p><b>You can do this!</b></p>


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
								<div class="col-lg-12 col-sm-12 d-flex align-items-stretch">
									<div class="card card-body h-100 justify-content-center transparent" style="width: 100%; ">
										<div class="embed-responsive embed-responsive-16by9 youtube-video-place lazy" data-src='/wp-content/uploads/2020/07/addiction-story-daniel.png' data-yt-url="https://www.youtube.com/embed/kNj08KeNbIA">
											<span class="play-button"></span>
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
					<h5 class="heading">It's Time to Make a Change</h5>
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
								<i class="fas fa-hotel"></i>  Outpatient Clinics <p>Treatment on your schedule.</p>
							</div>
						</div>
						<div class="col-md-3">
							<div class="box last">
								<i class="fas fa-mobile-alt"></i> App + Coaching <p>Free, life-long support and resources.</p>
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
		<h5 class="center">Treatment Here is In-Network </h5>
		<p>In-network with insurance companies means <i>any cost to you is as low as possible</i>. Get answers about your specific policy within 54 minutes.
				<button type="button" data-toggle="modal" data-target="#main-insurance-form" class="btn btn-outline-secondary"><i class="fas fa-id-card"></i>Submit Your Insurance</button></p>
		<br>

			<img class="lazy" data-src="<?php echo  get_stylesheet_directory_uri(); ?>/assets/img/insurance2.png" alt="Aetna, Anthem Blue Cross Blue Sheild, Cigna Heath Insurances">
			<img class="lazy" data-src="<?php echo  get_stylesheet_directory_uri(); ?>/assets/img/insurance1.png" alt="Amerihealth, United Healthcare, Humana, Tricare and 43 More Insurances">
		</div>
	</div>

</div>
		</section>


<?php if(isset($Homepage->bioSection)): ?>
			<section class="bio-section">
				<div class="container">
						<div class="heading">
							<h5 class="h1">You're Not Alone</h5>
						</div>
					<div class="subheading">
						<p class="h3">It's the personal story of each person that walks through our doors that gets us up in the morning and keeps us up at night. Here are a few of the 40+ doctorate or master's-level professionals you'll meet here.</p>
					</div>

					<div class="bio-slider row" >
						<?php foreach ($Homepage->bioSection->bios as $bio): ?>
							<div class="col-md-3 col-sm-4 <?php echo in_array( $bio->name, [ 'Dr. Timothy Gooden', 'Maria Matty' ] ) ? 'hide-for-xs-only' : ''; ?>">
								<div class="card default border-0">
									<div class="card-body  bios">
										<div class="img lazy" data-src="<?php echo $bio->photo['image']; ?>"></div>
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
						 "Everyone comes in overwhelmed, but looking to make big changes quickly. This is where it starts. Where you learn to harness and hold on to hope."
					</div>
				</div>
				<div class="media d-inline-flex">
					<img class="mr-3 lazy" data-src="/wp-content/uploads/2019/11/kevin-lee.jpg" alt="Kevin Lee">
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
						<h5 class="heading-prime h1">Here Are The Facts</h5>
						<div class="details">
							<?php
							$listItems = array();
							$listItems[] = array(
								'heading' => "You're TWICE as likely to get better here",
								'content' => "The <a href=\"https://www.drugabuse.gov/publications/principles-drug-addiction-treatment-research-based-guide-third-edition/frequently-asked-questions/how-effective-drug-addiction-treatment\" target=\"_blank\">National Institute on Drug Abuse</a> reports as little as 40% of people sober six months after starting treatment at another facility. That's not good. At JourneyPure, our success rate is 84%, and our app keeps us in touch long-term to help the few that do have a slip get right back on track."
							);
							$listItems[] = array(
								'heading' => "Your treatment is backed by 6K+ success stories",
								'content' => "We've helped thousands of people like you get healthy and stay healthy.  Don't let doubts hold you back. You've got this! (And, we're here to help)."
							);
							$listItems[] = array(
								'heading' => "There's 95% you'll be happy with your care",
								'content' => "You deserve care that listens and constantly improves.  As of " . date('F Y') . ", the satisfaction rate here has never dropped below 95%."
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
											<div class="inner-con"> <img class="lazy" data-src="<?php echo  get_stylesheet_directory_uri(); ?>/assets/img/ref-logos/nyt-150x150.png" alt="The New York Times" title="The New York Times"></div>
										</div>
									</div>
									<div class="media-con">
										<div class="media-box">
											<div class="inner-con"> <img class="lazy" data-src="<?php echo  get_stylesheet_directory_uri(); ?>/assets/img/ref-logos/npr-150x150.png" alt="NPR" title="National Public Radio"></div>
										</div>

									</div>
									<div class="media-con">
										<div class="media-box">
											<div class="inner-con"> <img class="lazy" data-src="<?php echo  get_stylesheet_directory_uri(); ?>/assets/img/ref-logos/nbc-150x150.png" alt="NBC" title="NBC News"></div>
										</div>
									</div>
									<div class="media-con">
									<div class="media-box">
											<div class="inner-con"> <img class="lazy" data-src="<?php echo  get_stylesheet_directory_uri(); ?>/assets/img/ref-logos/HUFF_POST.png" alt="The Huffington Post" title="The Huffington Post"></div>
										</div>
									</div>
									<div class="media-con">
										<div class="media-box">
											<div class="inner-con"> <img class="lazy" data-src="<?php echo  get_stylesheet_directory_uri(); ?>/assets/img/ref-logos/bbc-150x150.png" alt="BBC" title="BBC News"></div>
										</div>
									</div>
									<div class="media-con">
										<div class="media-box">
											<div class="inner-con"> <img class="lazy" data-src="<?php echo  get_stylesheet_directory_uri(); ?>/assets/img/ref-logos/nfl-150x150.png" alt="Players Care Foundation" title="NFL Players Care Foundation"></div>
										</div>
									</div>
									<div class="media-con">
										<div class="media-box">
											<div class="inner-con"> <img class="lazy" data-src="<?php echo  get_stylesheet_directory_uri(); ?>/assets/img/ref-logos/vanderbilt-150x150.png" alt="Venderbilt University" title="Venderbilt University - Published Research"></div>
										</div>
									</div>
									<div class="media-con">
										<div class="media-box">
											<div class="inner-con"> <img class="lazy" data-src="<?php echo  get_stylesheet_directory_uri(); ?>/assets/img/ref-logos/FORBES.png" alt="Forbes" title="Forbes Magazine"></div>
										</div>
									</div>
									<div class="media-con">
										<div class="media-box">
											<div class="inner-con"> <img class="lazy" data-src="<?php echo  get_stylesheet_directory_uri(); ?>/assets/img/ref-logos/the-tennesseean-150x150.png" alt="Tennessean" title="Tennessean Newspaper"></div>
										</div>
									</div>
									<div class="media-con">
										<div class="media-box">
											<div class="inner-con"> <img class="lazy" data-src="<?php echo  get_stylesheet_directory_uri(); ?>/assets/img/ref-logos/the-fix-150x150.png" alt="The Fix - Top 10 Rehabs" title="The Fix - Top 10 Rehabs"></div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="col-lg-6 col-sm-12 facility-photos">
						<img data-src="/wp-content/themes/journeyPure/assets/img/rehab-outpatient-collage-2020.png" class="lazy" alt="Beautiful, clean indoors, plenty of outdoor space"/>
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
        <div class="d-sm-flex">
          <div class="d-sm-flex p-2 why-point">
            <div class="p-2 why-icon">
              <i class="fas fa-microscope"></i>
            </div>
            <div class="p-2">
              <div class="h5">Evidence-Based Treatments</div>
              <p>All good treatment centers combine medical care, holistic healing and intense daily therapies. <b>Our success rates are better</b> because of how we execute and refine proven methods.</p>
                <p>We incorporate the <b>latest advances in addiction science</b> and publish groundbreaking research with a focus on each individual success story.</p>
            </div>
          </div>
		   <div class="d-sm-flex p-2 ml-auto why-point">
            <div class="p-2 why-icon"><i class="fas fa-users"></i></div>
            <div class="p-2">
              <div class="h5">A Comprehensive Team</div>
              <p>Effective treatment addresses the wide range of <b>issues that hide behind alcohol and drugs</b> - like trauma and anxiety. It takes a team of specialists to attack the disease at all angles.</p>
                <p>If you've sought treatment before, you know how critical it is to get <b>individualized attention</b> from experienced professionals who actually care.</p>
            </div>
          </div>

        </div>
        <div class="d-sm-flex">
                   <div class="d-sm-flex p-2 why-point">
            <div class="p-2 why-icon"><i class="fas fa-hands-helping"></i></div>
            <div class="p-2">
              <div class="h5">Active Accountability</div>
              <p>
                Your Accountability Coach can be reached 24/7 through the <b>alumni app</b> – available to you forever for free. They've been where you are and can show you how to stay on track long after treatment here.</p>
                <p>The app also has an 11-module <b>self-help course</b> and gives you real rewards for making healthy choices.</p>
  
            </div>
          </div>
          <div class="d-sm-flex p-2 ml-auto why-point">
            <div class="p-2 why-icon"><i class="fas fa-map-marked"></i></div>
            <div class="p-2">
              <div class="h5">Personalized Plans</div>
                <p>These issues are personal. Beyond cognitive behavior group and individual therapies, you need access to specific tools that <b>maximize your time here</b>. </p>
                <p>From virtual-reality therapy for combat veterans to imago marriage counseling, we'll <b>do what it takes</b> to help you get healthy (and stay healthy).</p>
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
									<div class="col-md-3 <?php echo in_array( $bio->name, [ 'Caleb H.' ] ) ? 'hide-for-xs-only' : ''; ?>">
										<div class="bio">
											<?php if ( ! empty( $bio->location ) ) : ?>
												<a href="<?php echo esc_attr( $bio->location['link'] ); ?>" class="tophat"><?php echo esc_html( $bio->location['label'] ); ?></a>
											<?php endif; ?>
											<!-- <img class="lazy" data-src="<?php echo $bio->photo['image']; ?>" /> -->
											<img src="<?php echo $bio->photo['image']; ?>" />
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


	<section class="review-section">
		<div class="container">
			<h2 class="h1 text-center">You can do this!</h2>
			<h3 class="text-center">Whether Journeypure is your first (and last) treatment experience, or you've spent decades in and out of other facilities...here's proof that you can feel better. There's no shame in getting help.</h3>
			<div class="parent">
				<div class="content-container-left">
					<div class="details">
						<h5 class="video-ctas-title text-center">Video Stories</h5>
						<!-- Review > Video CTAs -->
						<div class="video-ctas text-center">
							<!-- Review > Video CTA -->
							<a class="video-cta" data-toggle="modal" data-target="#video-cta-1">
								<!-- Image Wrapper -->
								<div class="video-cta-image-wrapper">
									<!-- Image -->
									<img class="video-cta-image lazy" data-src="https://journeypure.com/wp-content/uploads/2020/05/jared-video-review.jpg" alt="Jared Lanpher">
									<!-- Icon -->
									<span class="play-button"></span>
								</div>
								<!-- Title -->
								<h6 class="video-cta-title">Jared L.</h6>
							</a>
							<!-- Review > Video CTA -->
							<a class="video-cta" data-toggle="modal" data-target="#video-cta-2">
								<!-- Image Wrapper -->
								<div class="video-cta-image-wrapper">
									<!-- Image -->
									<img class="video-cta-image lazy" data-src="https://journeypure.com/wp-content/uploads/2020/05/amber-video-review.jpg" alt="Amber F.">
									<!-- Icon -->
									<span class="play-button"></span>
								</div>
								<!-- Title -->
								<h6 class="video-cta-title">Amber F.</h6>
							</a>
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
							<p class="link see-more-btn has-more"> Read More</p>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>


<section class="design-process-section" id="process-tab">
  <div class="container">
    <div class="row">
      <div class="col-12">
        <!-- design process steps-->
        <!-- Nav tabs -->
		    <h5 class="h1">The Process is Simple</h5>
        <ul class="nav nav-tabs process-model more-icon-preocess" role="tablist">
          <li role="presentation" class="active">
            <a href="#discover" aria-controls="discover" role="tab" data-toggle="tab"><i class="fas fa-mobile-alt" aria-hidden="true"></i>
              <p>1. Call</p>
            </a>
          </li>
          <li role="presentation">
            <a href="#strategy" aria-controls="strategy" role="tab" data-toggle="tab"><i class="fas fa-id-card" aria-hidden="true"></i>
              <p>2. Insurance</p>
            </a>
          </li>
          <li role="presentation">
            <a href="#optimization" aria-controls="optimization" role="tab" data-toggle="tab"><i class="fas fa-calendar" aria-hidden="true"></i>
              <p>3. Start</p>
            </a>
          </li>
          <li role="presentation">
            <a href="#reporting" aria-controls="reporting" role="tab" data-toggle="tab"><i class="fas fa-diagnoses" aria-hidden="true"></i>
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
                <div class="col-md-6 order-md-2">
                  <div class="lazy" data-src="/wp-content/uploads/2020/05/call-journeypure-rehab-now-invert.jpg">
                    <img class="lazy" data-src="/wp-content/uploads/2020/05/call-journeypure-rehab-now-invert.jpg" alt="Call JourneyPure">
                  </div>
                </div>
                <div class="col-md-6 order-md-1">
                  <div class="design-process-content-inner">
                    <h5 class="semi-bold">1. Make The Call</h5>
                    <p>Because we sometimes operate on waitlists, it's best to call in as early as possible. You don't have to commit to coming here and you'll feel better after you talk to someone who actually understands.</p>
                    <div class="note-cta"><i class="fas fa-phone"></i> <?php echo get_option('defaultPhone'); ?></div>
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
                    <img src="/wp-content/uploads/2020/05/call-journeypure-rehab-now-invert.jpg" alt="Call JourneyPure">
                  </div>
                </div>
                <div class="col-md-6 order-md-1">-->
                <div class="col-sm-12">
                  <div class="design-process-content-inner">
                    <h5 class="semi-bold">3. Start Treatment</h5>
                    <p>We're as accommodating as possible with the schedule. It helps to call early in your decision process and come in while you're still motivated.</p>
			              <p>The first thing you notice when you walk in to the <a href="/locations/florida/">Florida</a>, <a href="/locations/kentucky/">Kentucky</a>, <a href="/locations/tennessee/">Murfreesboro</a> or <a href="/locations/knoxville/">Knoxville</a> rehabs and Outpatient or <a href="/suboxone-clinics/">Suboxone Clinics</a> is an overwhelming sense of hope and compassion. You're surrounded by people that actually understand what you're going through.</p>
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
	</main>
</div>
<?php get_footer(); ?>
