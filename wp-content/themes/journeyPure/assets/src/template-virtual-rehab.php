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
				<div class="col-12 col-lg-5 order-lg-2">
					<div class="jp-vr-masthead-img-wrapper">
						<img class="jp-vr-masthead-img lazy" data-src="/wp-content/uploads/2020/06/phone.png" alt="Mobile">
					</div>
				</div>

				<div class="col-12 col-lg-7 order-lg-1">
					<h1 class="jp-vr-masthead-title"><?php echo wp_kses_post( $virtual_rehab->masthead_title ); ?></h1>
					<p class="jp-vr-masthead-subtitle"><?php echo esc_html( $virtual_rehab->masthead_subtitle ); ?></p>
					<button type="button" class="btn btn-outline-secondary jp-vr-masthead-button">Get help</button>
					<p class="jp-vr-masthead-text"><span class="fas fa-asterisk"></span> Backed by a <strong>real treatment center</strong> with <strong>real results</strong>.</p>
				</div>
			</div>
		</div>
	</section>

	<div class="jp-vr-masthead-divider-container">
		<div class="jp-vr-masthead-divider"> </div>
	</div>

	<!-- /SECTION: Masthead -->

	<!-- SECTION: Highlights -->

	<section class="jp-vr-section jp-vr-highlights">
		<div class="container">
			<div class="row">
				<div class="col-12 col-md-6 col-lg-6 offset-lg-1">
					<h3 class="jp-vr-highlights-title">Online Rehab Highlights</h3>

					<ul class="jp-vr-highlights-list">
						<li class="jp-vr-highlights-list-item">
							<span class="far fa-check-circle jp-vr-highlights-list-item-icon"></span>
							<span class="jp-vr-highlights-list-item-title">95% satisfaction rating</span>
							<span class="jp-vr-highlights-list-item-text">And, 6000 success stories</span>
						</li>

						<li class="jp-vr-highlights-list-item">
							<span class="far fa-check-circle jp-vr-highlights-list-item-icon"></span>
							<span class="jp-vr-highlights-list-item-title">Success rates 2x higher than average</span>
							<span class="jp-vr-highlights-list-item-text">Compared to data from the National Institute on Drug &amp; Alcohol Abuse</span>
						</li>

						<li class="jp-vr-highlights-list-item">
							<span class="far fa-check-circle jp-vr-highlights-list-item-icon"></span>
							<span class="jp-vr-highlights-list-item-title">Masters-level+ clinical and medical team</span>
							<span class="jp-vr-highlights-list-item-text">Who actually care and out you first</span>
						</li>

						<li class="jp-vr-highlights-list-item">
							<span class="far fa-check-circle jp-vr-highlights-list-item-icon"></span>
							<span class="jp-vr-highlights-list-item-title">CARF Gold Seal</span>
							<span class="jp-vr-highlights-list-item-text">Earned only by the top 20% of centers in the country</span>
						</li>

						<li class="jp-vr-highlights-list-item">
							<span class="far fa-check-circle jp-vr-highlights-list-item-icon"></span>
							<span class="jp-vr-highlights-list-item-title">In-network with almost every insurance</span>
							<span class="jp-vr-highlights-list-item-text">So any cost to you is as low as possible</span>
						</li>
					</ul>

					<div class="jp-vr-highlights-img-logos-wrapper">
						<img class="jp-vr-highlights-img-logos lazy" data-src="<?php echo esc_attr( $virtual_rehab->highlights_insurers_image_1['url'] ); ?>" alt="<?php echo esc_attr( $virtual_rehab->highlights_insurers_image_1['alt'] ); ?>">
						<img class="jp-vr-highlights-img-logos lazy" data-src="<?php echo esc_attr( $virtual_rehab->highlights_insurers_image_2['url'] ); ?>" alt="<?php echo esc_attr( $virtual_rehab->highlights_insurers_image_2['alt'] ); ?>">
					</div>

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
					<h3 class="jp-vr-table-title">This Online Rehab Program is Likely Your Best Option</h3>
					<p class="jp-vr-table-subtitle">Get help from experts that understand addiction pesonally<br>and professionally in the convenience of your home.</p>
				</div>
			</div>

			<div class="jp-vr-table-cards">
				<div class="row">
					<div class="col-12 col-lg-4">
						<div class="jp-vr-table-card">
							<img class="jp-vr-table-card-img lazy" data-src="https://journeypure.com/wp-content/uploads/2020/06/paper-plane.png" alt="Other Online Services">
							<h4 class="jp-vr-table-card-title">Other Online Services</h4>

							<ul class="jp-vr-table-card-list">
								<li class="jp-vr-table-card-list-item">Specific to addiction (&amp; only addiction)</li>
								<li class="jp-vr-table-card-list-item">Combination of medical and clinical and life support to tackle the full issues</li>
							</ul>
						</div>
					</div>

					<div class="col-12 col-lg-4">
						<div class="jp-vr-table-card">
							<img class="jp-vr-table-card-img lazy" data-src="https://journeypure.com/wp-content/uploads/2020/06/plane.png" alt="Going In-person">
							<h4 class="jp-vr-table-card-title">Going In-person</h4>

							<ul class="jp-vr-table-card-list">
								<li class="jp-vr-table-card-list-item">Convenient</li>
								<li class="jp-vr-table-card-list-item">More affordable</li>
								<li class="jp-vr-table-card-list-item">Less intemidating</li>
							</ul>
						</div>
					</div>

					<div class="col-12 col-lg-4">
						<div class="jp-vr-table-card">
							<img class="jp-vr-table-card-img lazy" data-src="https://journeypure.com/wp-content/uploads/2020/06/space-ship.png" alt="Doing Nothing">
							<h4 class="jp-vr-table-card-title">Doing Nothing</h4>

							<ul class="jp-vr-table-card-list">
								<li class="jp-vr-table-card-list-item">If you could "just stop" on your own, you wouldn't be on this site</li>
								<li class="jp-vr-table-card-list-item">Drug &amp; alcohol issues are proven to get worse without treatment</li>
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
					<img class="jp-vr-components-img lazy" data-src="/wp-content/uploads/2020/06/doctor.png" alt="Doctor">
				</div>

				<div class="col-12 col-lg-7">
					<div class="jp-vr-components-text">
						<p>There are 100 years of research and millions of success stories behind the rehab treatment model. Yet, only 19% of Tenesseans that need help actually get it.</p>
						<p>Dr. Brian Wind, Ph.D. has dedicated the last 20 years to understanding what makes treatment most successful and how those options can be made more accessible.</p>
						<p>Using technology, Dr. Wind and his team created a comprehensive addiction treatment program that's packed into your mobile phone and accessible anytime, anywhere.</p>

						<ul>
							<li>
								<span class="fas fa-check"></span>
								Individual One-on-One Therapy
							</li>

							<li>
								<span class="fas fa-check"></span>
								Medical Doctor Appoitments
							</li>

							<li>
								<span class="fas fa-check"></span>
								Group Therapy Sessions
							</li>

							<li>
								<span class="fas fa-check"></span>
								Online Peer Support Meetings
							</li>

							<li>
								<span class="fas fa-check"></span>
								Recovery Coaching (via Text)
							</li>

							<li>
								<span class="fas fa-check"></span>
								11-Module Self-Help Course
							</li>
						</ul>
					</div>

					<div class="jp-vr-components-counters">
						<div class="jp-vr-components-counter">
							<p class="jp-vr-components-counter-number">25</p>
							<p class="jp-vr-components-counter-text">Group Hours Per Week</p>
						</div>

						<div class="jp-vr-components-counter">
							<p class="jp-vr-components-counter-number">5600</p>
							<p class="jp-vr-components-counter-text">Online Sessions Delivered</p>
						</div>

						<div class="jp-vr-components-counter">
							<p class="jp-vr-components-counter-number">24</p>
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
								<p>You talk privately with your therapist and need.</p>
							</div>
						</div>
					</div>

					<div class="col-12 col-md-6 col-lg-4">
						<div class="jp-vr-cards-card">
							<div class="jp-vr-cards-card-image">
								<i class="fas fa-user"></i>
							</div>

							<h5 class="jp-vr-cards-card-title">Individual Therapy</h5>

							<div class="jp-vr-cards-card-text">
								<p>You talk privately with your therapist and need (you can invite a spouse or other family member to work on healing the relathionship too).</p>
							</div>
						</div>
					</div>

					<div class="col-12 col-md-6 col-lg-4">
						<div class="jp-vr-cards-card">
							<div class="jp-vr-cards-card-image">
								<i class="fas fa-user"></i>
							</div>

							<h5 class="jp-vr-cards-card-title">Individual Therapy</h5>

							<div class="jp-vr-cards-card-text">
								<p>You talk privately with your therapist and need (you can invite a spouse or other family member to work on healing the relathionship too).</p>
							</div>
						</div>
					</div>

					<div class="col-12 col-md-6 col-lg-4">
						<div class="jp-vr-cards-card">
							<div class="jp-vr-cards-card-image">
								<i class="fas fa-user"></i>
							</div>

							<h5 class="jp-vr-cards-card-title">Individual Therapy</h5>

							<div class="jp-vr-cards-card-text">
								<p>You talk privately with your therapist and need (you can invite a spouse or other family member to work on healing the relathionship too).</p>
							</div>
						</div>
					</div>

					<div class="col-12 col-md-6 col-lg-4">
						<div class="jp-vr-cards-card">
							<div class="jp-vr-cards-card-image">
								<i class="fas fa-user"></i>
							</div>

							<h5 class="jp-vr-cards-card-title">Individual Therapy</h5>

							<div class="jp-vr-cards-card-text">
								<p>You talk privately with your therapist and need (you can invite a spouse or other family member to work on healing the relathionship too).</p>
							</div>
						</div>
					</div>

					<div class="col-12 col-md-6 col-lg-4">
						<div class="jp-vr-cards-card">
							<div class="jp-vr-cards-card-image">
								<i class="fas fa-user"></i>
							</div>

							<h5 class="jp-vr-cards-card-title">Individual Therapy</h5>

							<div class="jp-vr-cards-card-text">
								<p>You talk privately with your therapist and need (you can invite a spouse or other family member to work on healing the relathionship too).</p>
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
						<h3 class="h1"><?php echo esc_html( $virtual_rehab->bios->heading ); ?></h3>
					</div>
				<?php endif; ?>

				<?php if ( ! empty( $virtual_rehab->bios->subheading ) ) : ?>
					<div class="subheading">
						<p><?php echo esc_html( $virtual_rehab->bios->subheading ); ?></p>
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
								<p>Shedule your initial 60-minute therapy session with a few clicks and get a reminder via text. Connecting to your therapist is as easy as clicking a link or downloading an app.</p>
							</div>
						</div>
					</div>

					<div class="col-12 col-lg-4">
						<div class="jp-vr-process-card">
							<span class="jp-vr-process-card-counter">02.</span>
							<h5 class="jp-vr-process-card-title">Get Access</h5>

							<div class="jp-vr-process-card-text">
								<p>If it seems like online rehab could help you, we'll go over cost (insurance accepted) and get you full access to the mobile app. Including the calendar to schedule in the same day.</p>
							</div>
						</div>
					</div>

					<div class="col-12 col-lg-4">
						<div class="jp-vr-process-card">
							<span class="jp-vr-process-card-counter">03.</span>
							<h5 class="jp-vr-process-card-title">Stay Engaged</h5>

							<div class="jp-vr-process-card-text">
								<p>Control your therapy and medical appointments with a few clicks. You can also reach out to your Recovery Coach and work through the self-help course 24/7.</p>
							</div>
						</div>
					</div>
				</div>
			</div>

			<div class="row">
				<div class="col-12">
					<button type="button" class="btn btn-outline-secondary jp-vr-process-button"><span class="fas fa-calendar-alt"></span> Schedule now ($40)</button>
				</div>
			</div>
		</div>
	</section>

	<div class="jp-vr-process-divider-container">
		<div class="jp-vr-process-divider"> </div>
	</div>

	<!-- /SECTION: Process -->

	<!-- SECTION: FAQ -->

	<?php if ( ! empty( $virtual_rehab->faq ) ) : ?>
		<section class="block-4">
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

	<!-- SECTION: What now? -->

	<section class="ask-a-question">
		<div class="container">
			<h5 class="h1 text-center">What now?</h5>

			<div class="row">
				<div class="col-12 text-center bottom-cta">
					<span class="fas fa-calendar fas-vr"></span>
					<h4>Schedule your first therapy session</h4>
					<small class="drop">Appoitments available within the hour.</small>
					<small class="drop">No commitment required beyond the<br>initial 60-minute session.</small>
					<button type="button" class="btn btn-outline-secondary btn-outline-secondary-big"><span class="fas fa-comment"></span> Talk to a therapist now</button>
				</div>
			</div>
		</div>
	</section>

	<!-- /SECTION: What now? -->

</div>

<!-- /TEMPLATE: Virtual Rehab -->

<?php get_footer(); ?>
