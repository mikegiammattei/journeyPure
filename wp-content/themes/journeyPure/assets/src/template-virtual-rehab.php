<?php
/**
 * Template Name: Virtual Rehab
 *
 * @author   Fernando Tessmann
 * @package  JourneyPure
 */

require_once get_stylesheet_directory() . '/classes/VirtualRehab.php';
$virtual_rehab = new Pages\VirtualRehab();

get_header();
?>

<!-- TEMPLATE: Virtual Rehab -->

<div id="jp-vr" class="jp-vr">

	<!-- SECTION: Masthead -->

	<section class="jp-vr-section jp-vr-masthead">
		<div class="container">
			<div class="row">
				

				<div class="col-12 col-lg-7 order-lg-1">
					<h1 class="jp-vr-masthead-title"><?php echo wp_kses_post( $virtual_rehab->masthead_title ); ?></h1>
					<p class="jp-vr-masthead-subtitle"><?php echo esc_html( $virtual_rehab->masthead_subtitle ); ?>
															

					</p>

					<button type="button" class="btn btn-outline-secondary jp-vr-masthead-button"><span class="fas fa-comment"></span> Talk to a therapist now</button>
					<p>40-minute session <del> $120 </del> <b>$45 limited time</b></p>
				</div>
				<div class="col-12 col-lg-5 order-lg-2 background-circle">
					<div class="jp-vr-masthead-img-wrapper">
						<img class="jp-vr-masthead-img lazy" data-src="/wp-content/uploads/2020/07/virutal_rehab-1.png" alt="Mobile">
					</div>
					<p class="jp-vr-masthead-text"><span class="fas fa-asterisk"></span> Backed by a real addiction treatment center with <strong>real results</strong>.</p>
				</div>
			</div>
		</div>
	</section>


	<!-- /SECTION: Masthead -->

	<!-- SECTION: Highlights -->

	<section class="jp-vr-section jp-vr-highlights">
		<div class="container">
			<div class="row">
				<div class="col-12 col-md-6 col-lg-6 offset-lg-1">
					<h3 class="jp-vr-highlights-title">The Most Comprehensive AND Convenient Way to Get Help</h3>

					<ul class="jp-vr-highlights-list">
						<li class="jp-vr-highlights-list-item">
							<span class="far fa-check-circle jp-vr-highlights-list-item-icon"></span>
							<span class="jp-vr-highlights-list-item-title">100% online</span>
							<span class="jp-vr-highlights-list-item-text">Convenient to work around your schedule.</span>
						</li>

						<li class="jp-vr-highlights-list-item">
							<span class="far fa-check-circle jp-vr-highlights-list-item-icon"></span>
							<span class="jp-vr-highlights-list-item-title">Created by Industry Pros</span>
							<span class="jp-vr-highlights-list-item-text">JourneyPure has 6K+ success stories and 18 locations across the country.</span>
						</li>

						<li class="jp-vr-highlights-list-item">
							<span class="far fa-check-circle jp-vr-highlights-list-item-icon"></span>
							<span class="jp-vr-highlights-list-item-title">Goes Beyond Therapy</span>
							<span class="jp-vr-highlights-list-item-text">Includes medications, accountability coaching and a self-help app.</span>
						</li>

						<!-- <li class="jp-vr-highlights-list-item">
							<span class="far fa-check-circle jp-vr-highlights-list-item-icon"></span>
							<span class="jp-vr-highlights-list-item-title">In-network with almost every insurance</span>
							<span class="jp-vr-highlights-list-item-text">So any cost to you is as low as possible</span>
						</li> -->
					</ul>

					<!-- <div class="jp-vr-highlights-img-logos-wrapper">
						<img class="jp-vr-highlights-img-logos lazy" data-src="<?php echo esc_attr( $virtual_rehab->highlights_insurers_image_1['url'] ); ?>" alt="<?php echo esc_attr( $virtual_rehab->highlights_insurers_image_1['alt'] ); ?>">
						<img class="jp-vr-highlights-img-logos lazy" data-src="<?php echo esc_attr( $virtual_rehab->highlights_insurers_image_2['url'] ); ?>" alt="<?php echo esc_attr( $virtual_rehab->highlights_insurers_image_2['alt'] ); ?>">
					</div> -->

					<!-- <div class="jp-vr-highlights-button-wrapper">
						<button type="button" data-toggle="modal" data-target="#main-insurance-form" class="jp-vr-highlights-button"><span class="fas fa-id-card"></span> Check Insurance</button>
					</div> -->
				</div>

				<div class="col-12 col-md-6 col-lg-4">
					<img class="jp-vr-highlights-img-faces lazy" data-src="<?php echo esc_attr( $virtual_rehab->highlights_main_image['url'] ); ?>" alt="<?php echo esc_attr( $virtual_rehab->highlights_main_image['alt'] ); ?>">
				</div>
			</div>
		</div>
	</section>

	<!-- /SECTION: Highlights -->

	<!-- SECTION: Table -->

	<section class="jp-vr-section jp-vr-table">
		<div class="container">
			<div class="row">
				<div class="col-12">
					<h3 class="jp-vr-table-title">It's Time To Make A Change</h3>
					<p class="jp-vr-table-subtitle">Get help from a full team of experts that actually understand drug and alcohol issues - without ever leaving your house.</p>
				</div>
			</div>

			<div class="jp-vr-table-cards">
				<div class="row">
					<div class="col-12 col-lg-4">
						<div class="jp-vr-table-card">
							<img class="jp-vr-table-card-img lazy" data-src="/wp-content/uploads/2020/07/virtual-therapy-options.png" alt="Other Online Services">
							<h4 class="jp-vr-table-card-title">Virtual Rehab Vs. <b>Online Therapy</b></h4>

							<ul class="jp-vr-table-card-list">
								<li class="jp-vr-table-card-list-item">Understand & specialized in addiction</li>
								<li class="jp-vr-table-card-list-item">Includes medical and accountability coaching beyond therapy</li>
							</ul>
						</div>
					</div>

					<div class="col-12 col-lg-4">
						<div class="jp-vr-table-card">
							<img class="jp-vr-table-card-img lazy" data-src="/wp-content/uploads/2020/07/other-therapy-options.png" alt="Going In-person">
							<h4 class="jp-vr-table-card-title">Virtual Rehab Vs. <b>Going In-person</b></h4>

							<ul class="jp-vr-table-card-list">
								<li class="jp-vr-table-card-list-item">Convenient</li>
								<li class="jp-vr-table-card-list-item">More affordable</li>
								<li class="jp-vr-table-card-list-item">Less intemidating</li>
							</ul>
						</div>
					</div>

					<div class="col-12 col-lg-4">
						<div class="jp-vr-table-card">
							<img class="jp-vr-table-card-img lazy" data-src="/wp-content/uploads/2020/07/no-rehab.png" alt="Doing Nothing">
							<h4 class="jp-vr-table-card-title">Virtual Rehab Vs. <b>Doing Nothing</b></h4>

							<ul class="jp-vr-table-card-list">
								<li class="jp-vr-table-card-list-item">Drug &amp; alcohol issues get worse without treatment</li>
								<li class="jp-vr-table-card-list-item">If you could really "just stop", you wouldn't be reading this</li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>

	<!-- /SECTION: Table -->

	<!-- SECTION: Components -->

	<section class="jp-vr-section jp-vr-components">
		<div class="container">
			<div class="row">
				<div class="col-12">
					<h3 class="jp-vr-components-title">The Same Components of Rehab</h3>
					<p class="jp-vr-components-subtitle">Except, it's on your phone.</p>

					<div class="jp-vr-components-icon">
						<span class="fas fa-mobile-alt"></span>
					</div>
				</div>
			</div>

			<div class="row">
				<div class="col-12 col-lg-5">
					<img class="jp-vr-components-img lazy" data-src="/wp-content/uploads/2020/06/jp-brian-wind-signature.png" alt="Dr. Brian Wind Chief Clinical Officer Virtual Rehab">
				</div>

				<div class="col-12 col-lg-6 offset-lg-1">
					<div class="jp-vr-components-text">
						<p>There are 100 years of research and millions of success stories behind the rehab treatment model. Yet, only 19% of people that need help actually get it.</p>
						<p>Dr. Brian Wind, Ph.D. dedicated the last 20 years to understanding what makes treatment most successful and how those options can be made more accessible.</p>
						<p>Using technology, Dr. Wind and his team created a comprehensive addiction treatment program packed into your mobile phone. Accessible anytime, anywhere.</p>

						<ul>
							<li>
								<span class="fas fa-check"></span>
								Individual Therapy
							</li>

							<li>
								<span class="fas fa-check"></span>
								Medication Appoitments
							</li>

							<li>
								<span class="fas fa-check"></span>
								Group Therapy
							</li>

							<li>
								<span class="fas fa-check"></span>
								Peer Support Meetings
							</li>

							<li>
								<span class="fas fa-check"></span>
								Accountability Coaching
							</li>

							<li>
								<span class="fas fa-check"></span>
								11-Module Self-Help Course
							</li>
						</ul>
					</div>

					<div class="jp-vr-components-counters">
						<div class="jp-vr-components-counter">
							<p class="h1">25</p>
							<p class="jp-vr-components-counter-text">Group Sessions Per Week</p>
						</div>

						<div class="jp-vr-components-counter">
							<p class="h1">5,600</p>
							<p class="jp-vr-components-counter-text">Virtual Sessions Delivered</p>
						</div>

						<div class="jp-vr-components-counter">
							<p class="h1">24</p>
							<p class="jp-vr-components-counter-text">5-Star App Store Reviews</p>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>

	<!-- /SECTION: Components -->

	<!-- SECTION: Cards -->

	<section class="jp-vr-section jp-vr-cards">
		<div class="container">
			<div class="jp-vr-cards-grid">
				<div class="row">
					<div class="col-12 col-md-6 col-lg-4">
						<div class="jp-vr-cards-card">
							<div class="jp-vr-cards-card-image">
								<i class="fas fa-user"></i>
							</div>

							<h5 class="jp-vr-cards-card-title">Individual Therapy</h5>

							<div class="jp-vr-cards-card-text">
								<p>Talk privately with your therapist and learn to process past traumas, current triggers and future worries in ways that aren't self-destructive. </p>
							</div>
						</div>
					</div>

					<div class="col-12 col-md-6 col-lg-4">
						<div class="jp-vr-cards-card">
							<div class="jp-vr-cards-card-image">
								<i class="fas fa-users"></i>
							</div>

							<h5 class="jp-vr-cards-card-title">Group Therapy</h5>

							<div class="jp-vr-cards-card-text">
								<p>Be held accountable by people that are going through the same thing, learn from their lessons and make a friend to support you forever.</p>
							</div>
						</div>
					</div>

					<div class="col-12 col-md-6 col-lg-4">
						<div class="jp-vr-cards-card">
							<div class="jp-vr-cards-card-image">
								<i class="fas fa-user-md"></i>
							</div>

							<h5 class="jp-vr-cards-card-title">Medications</h5>

							<div class="jp-vr-cards-card-text">
								<p>While not a cure, medications rebalance your brain. Whether it's anti-cravings like Vivitrol or Suboxone or for underlying issues like antidepressants. </p>
							</div>
						</div>
					</div>

					<div class="col-12 col-md-6 col-lg-4">
						<div class="jp-vr-cards-card">
							<div class="jp-vr-cards-card-image">
								<i class="fas fa-street-view"></i>
							</div>

							<h5 class="jp-vr-cards-card-title">Support Meetings</h5>

							<div class="jp-vr-cards-card-text">
								<p>Free, online meetings run 24/7. They are a way to ensure you have somewhere to turn if you feel triggered at 3 AM. Get connected.</p>
							</div>
						</div>
					</div>

					<div class="col-12 col-md-6 col-lg-4">
						<div class="jp-vr-cards-card">
							<div class="jp-vr-cards-card-image">
								<i class="fas fa-hands-helping"></i>
							</div>

							<h5 class="jp-vr-cards-card-title">Life Coaching </h5>

							<div class="jp-vr-cards-card-text">
								<p>Your Accountability Coach helps you meet your goals. They've been there before and now what it takes to stay on track - available via text or calls.</p>
							</div>
						</div>
					</div>

					<div class="col-12 col-md-6 col-lg-4">
						<div class="jp-vr-cards-card">
							<div class="jp-vr-cards-card-image">
								<i class="fas fa-book"></i>
							</div>

							<h5 class="jp-vr-cards-card-title">Self-Help Course</h5>

							<div class="jp-vr-cards-card-text">
								<p>The JourneyPure app gives you personalized content and reminders that reward you with real gift cards for making healthy choices.</p>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>

	<!-- /SECTION: Cards -->

	<!-- SECTION: Bios -->

	<?php if ( isset( $virtual_rehab->bios ) && is_array( $virtual_rehab->bios->bios ) ) : ?>
		<section class="bio-section">
			<div class="container">
				<?php if ( ! empty( $virtual_rehab->bios->heading ) ) : ?>
					<div class="heading">
						<h3 class="h1"><?php echo wp_kses_post( $virtual_rehab->bios->heading ); ?></h3>
					</div>
				<?php endif; ?>

				<?php if ( ! empty( $virtual_rehab->bios->subheading ) ) : ?>
					<div class="subheading">
						<h3><?php echo esc_html( $virtual_rehab->bios->subheading ); ?></h3>
					</div>
				<?php endif; ?>

				<div class="bio-slider" data-slick='{"slidesToShow": 4}'>
					<?php foreach ( $virtual_rehab->bios->bios as $bio ) : ?>
						<div class="d-flex align-items-stretch card-col">
							<div class="card default border-0">
								<div class="card-body bios">
									<div class="img" style="background-image: url('<?php echo esc_attr( $bio->photo['image'] ); ?>');"></div>
									<p class="text name-text"><?php echo esc_html( $bio->name ); ?> <span class="text"> • <?php echo esc_html( $bio->credentials ); ?></span></p>
									<p class="text"><?php echo esc_html( $bio->title ); ?></p>

									<ul class="fa-ul">
										<?php if ( ! empty( $bio->education ) ) : ?>
											<li><span class="fa-li"><span class="fas fa-graduation-cap"></span></span><?php echo esc_html( $bio->education ); ?></li>
										<?php endif; ?>

										<?php if ( ! empty( $bio->specialty ) ) : ?>
											<li><span class="fa-li"><span class="fas fa-th-large"></span></span><?php echo esc_html( $bio->specialty ); ?></li>
										<?php endif; ?>

										<?php if ( ! empty( $bio->years ) ) : ?>
											<li><span class="fa-li"><span class="fas fa-clock"></span></span><?php echo esc_html( $bio->years ); ?> years in the field</li>
										<?php endif; ?>

										<?php if ( ! empty( $bio->recovery_status ) ) : ?>
											<?php if ( 'person' === $bio->recovery_status ) : ?>
												<li><span class="fa-li"><span class="fas fa-grin"></span></span>In Recovery</li>
											<?php endif; ?>

											<?php if ( 'loved_one' === $bio->recovery_status ) : ?>
												<li><span class="fa-li"><span class="fas fa-grin"></span></span>Loved One In Recovery</li>
											<?php endif; ?>
										<?php endif; ?>
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

	<!-- /SECTION: Bios -->



	<!-- SECTION: FAQ -->

	<?php if ( ! empty( $virtual_rehab->faq ) ) : ?>
		<section class="jp-vr-section jp-vr-faq">
			<div class="container">
				<?php if ( ! empty( $virtual_rehab->faq->heading ) || ! empty( $virtual_rehab->faq->subheading ) ) : ?>
					<div class="heading">
						<span class="h1">
							<?php echo esc_html( $virtual_rehab->faq->heading ); ?>

							<?php if ( ! empty( $virtual_rehab->faq->subheading ) ) : ?>
								<h2 class="lead"><?php echo esc_html( $virtual_rehab->faq->subheading ); ?></h2>
							<?php endif; ?>
						</span>
					</div>
				<?php endif; ?>

				<?php if ( ! empty( $virtual_rehab->faq->faqs ) ) : ?>
					<div class="faqs">
						<div class="accordion" id="faq">
							<?php foreach ( $virtual_rehab->faq->faqs as $index => $faq ) : ?>
								<div class="card">
									<div class="card-header <?php echo ( 0 !== $index ) ? 'collapsed' : ''; ?>" data-toggle="collapse" data-target="#l-faq-<?php echo esc_attr( $index ); ?>" aria-expanded="true" aria-controls="l-faq-<?php echo esc_attr( $index ); ?>" id="l-faq-heading-<?php echo esc_attr( $index ); ?>">
										<div class="question-box">
											<div class="icon">
												<i class="fas fa-plus-circle off"></i>
												<i class="fas fa-minus-circle on"></i>
											</div>

											<div class="title">
												<h5 class="card-title"><?php echo esc_html( $faq->question ); ?></h5>
											</div>
										</div>
									</div>

									<div id="l-faq-<?php echo esc_attr( $index ); ?>" class="collapse <?php echo ( 0 === $index ) ? 'show' : ''; ?>" aria-labelledby="l-faq-heading-<?php echo esc_attr( $index ); ?>" data-parent="#faq">
										<div class="card-body">
											<?php echo wp_kses_post( $faq->answer ); ?>
										</div>
									</div>
								</div>
							<?php endforeach; ?>
						</div>

						<div class="ask-a-question" style="display:none;">
							<span class="btn btn-primary" data-toggle="modal" data-target="#user-question-form-container">Ask a question</span>
						</div>
					</div>
				<?php endif; ?>
			</div>
		</section>
	<?php endif; ?>

	<!-- /SECTION: FAQ -->
	
		<!-- SECTION: Process -->

	<section class="jp-vr-section jp-vr-process">
		<div class="container">
			<div class="row">
				<div class="col-12">
					<span class="h1 jp-vr-process-title">The Process is <strong>Easy</strong></span>
				</div>
			</div>

			<div class="jp-vr-process-grid">
				<div class="row">
					<div class="col-12 col-lg-4">
						<div class="jp-vr-process-card">
							<span class="jp-vr-process-card-counter">01.</span>
							<h5 class="jp-vr-process-card-title">Schedule Online</h5>

							<div class="jp-vr-process-card-text">
								<p>Schedule your initial 40-minute therapy session with a few clicks. Connecting to your therapist is as easy as downloading an app.</p>
							</div>
						</div>
					</div>

					<div class="col-12 col-lg-4">
						<div class="jp-vr-process-card">
							<span class="jp-vr-process-card-counter">02.</span>
							<h5 class="jp-vr-process-card-title">Get Full Access</h5>

							<div class="jp-vr-process-card-text">
								<p>After your initial session, if it seems like virtual rehab could help you, we'll go over cost (insurance accepted) and get you full access to the mobile app.</p>
							</div>
						</div>
					</div>

					<div class="col-12 col-lg-4">
						<div class="jp-vr-process-card">
							<span class="jp-vr-process-card-counter">03.</span>
							<h5 class="jp-vr-process-card-title">Stay Engaged</h5>

							<div class="jp-vr-process-card-text">
								<p>Reach out to your Accountability Coach and work through the self-help course 24/7 on the app in between scheduled therapy and medical sessions.</p>
							</div>
						</div>
					</div>
				</div>
			</div>

			<div class="row">
				<div class="col-12 cta-process">
					<button type="button" class="btn btn-outline-secondary jp-vr-process-button"><span class="fas fa-comment"></span> Talk to a therapist now</button>
					<p>40-minute session <del> $120 </del> <b>$45 limited time</b></p>

				</div>
			</div>
		</div>
	</section>


	<!-- /SECTION: Process -->

	<!-- SECTION: What now? -->

	<section class="ask-a-question">
		<div class="container">
			<h5 class="h1 text-center">What now?</h5>

			<div class="row">
				<div class="col-12 text-center bottom-cta">
					
					<button type="button" class="btn btn-secondary btn-outline-secondary-big"><span class="fas fa-comment"></span> Talk to a therapist</button>
										<p>40-minute session <del> $120 </del> <b>$45 limited time</b></p>
					<small class="drop">No commitment</small>
				</div>
			</div>
		</div>
	</section>

	<!-- /SECTION: What now? -->

</div>

<!-- /TEMPLATE: Virtual Rehab -->

<?php get_footer();
