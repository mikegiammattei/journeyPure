<?php
/**
 * OP CTP template
 *
 * @author   Fernando Tessmann
 * @package  JourneyPure
 */

require_once get_stylesheet_directory() . '/classes/OP.php';
$op = new Pages\OP();

get_header();
?>

<!-- TEMPLATE: OP CPT -->

<div id="jp-op" class="jp-op">

	<!-- SECTION: Masthead -->

	<section class="jp-op-section jp-op-masthead">
		<div class="container">
			<div class="row">
				<div class="col-12 col-md-10 offset-md-1 col-lg-8 offset-lg-2">
					<h1 class="jp-op-masthead-title"><?php echo esc_html( $op->masthead_title ); ?></h1>
					<h2 class="jp-op-masthead-subtitle"><?php echo esc_html( $op->masthead_subtitle ); ?></h2>
				</div>
			</div>

			<div class="row">
				<div class="col-12 col-md-6 col-lg-7">
					<div class="embed-responsive embed-responsive-16by9 youtube-video-place lazy" data-src="/wp-content/themes/journeyPure/assets/img/journeypure-rehab-review.jpg" style="cursor: pointer; background: no-repeat center; background-size: cover;" data-yt-url="https://www.youtube.com/embed/kNj08KeNbIA?rel=0&showinfo=0&autoplay=1"></div>
				</div>

				<div class="col-12 col-md-6 col-lg-5">
					<div class="jp-op-masthead-content">
						<h3 class="jp-op-masthead-h3">If you're sick of living with drugs or alcohol, but can't "just stop", you have two choices: sink or swim.</h3>

						<div class="jp-op-masthead-text">
							<p>The decision you make right now becomes your life.</p>
							<p>If you feel too unmotivated or unsure to make a change, don't worry. That's exactly what the <?php echo esc_html( $op->city ); ?> Clinic is for.</p>
							<p>Whether it's here or not, make the call and show up. Everything will start to come together after that. You can do this!</p>
						</div>

						<a class="jp-op-masthead-button hide-for-sm" href="tel:844-505-4799" title="Call (844) 505-4799 to talk now."><span class="fas fa-phone"></span> (844) 505-4799</a>
						<a class="jp-op-masthead-button show-for-sm" href="javascript:void(0);" data-toggle="tooltip" data-placement="top" data-trigger="click" title="Call (844) 505-4799 to talk now."><span class="fas fa-phone"></span> (844) 505-4799</a>
					</div>
				</div>
			</div>
		</div>
	</section>

	<!-- /SECTION: Masthead -->

	<!-- SECTION: Highlights -->

	<section class="jp-op-section jp-op-highlights">
		<div class="container">
			<div class="row">
				<div class="col-12 col-md-6 col-lg-7">
					<h3 class="jp-op-highlights-title">Clinic Highlights</h3>

					<ul class="jp-op-highlights-list">
						<li class="jp-op-highlights-list-item">
							<span class="far fa-check-circle jp-op-highlights-list-item-icon"></span>
							<span class="jp-op-highlights-list-item-title">95% satisfaction rating</span>
							<span class="jp-op-highlights-list-item-text">And, 6000 success stories</span>
						</li>

						<li class="jp-op-highlights-list-item">
							<span class="far fa-check-circle jp-op-highlights-list-item-icon"></span>
							<span class="jp-op-highlights-list-item-title">Success rates 2x higher than average</span>
							<span class="jp-op-highlights-list-item-text">Compared to data from the National Institute on Drug & Alcohol Abuse</span>
						</li>

						<li class="jp-op-highlights-list-item">
							<span class="far fa-check-circle jp-op-highlights-list-item-icon"></span>
							<span class="jp-op-highlights-list-item-title">Masters-level+ clinical and medical team</span>
							<span class="jp-op-highlights-list-item-text">Who actually care and put you first</span>
						</li>

						<li class="jp-op-highlights-list-item">
							<span class="far fa-check-circle jp-op-highlights-list-item-icon"></span>
							<span class="jp-op-highlights-list-item-title">CARF Gold Seal</span>
							<span class="jp-op-highlights-list-item-text">Earned only by the top 20% of centers in the country</span>
						</li>

						<li class="jp-op-highlights-list-item">
							<span class="far fa-check-circle jp-op-highlights-list-item-icon"></span>
							<span class="jp-op-highlights-list-item-title">In-network with almost every insurance</span>
							<span class="jp-op-highlights-list-item-text">So any cost to you is as low as possible</span>
						</li>
					</ul>

					<div class="jp-op-highlights-img-logos-wrapper">
						<img class="jp-op-highlights-img-logos lazy" data-src="<?php echo esc_attr( $op->highlights_insurers_image_1['url'] ); ?>" alt="<?php echo esc_attr( $op->highlights_insurers_image_1['alt'] ); ?>">
						<img class="jp-op-highlights-img-logos lazy" data-src="<?php echo esc_attr( $op->highlights_insurers_image_2['url'] ); ?>" alt="<?php echo esc_attr( $op->highlights_insurers_image_2['alt'] ); ?>">
					</div>

					<div class="jp-op-highlights-button-wrapper">
						<button type="button" data-toggle="modal" data-target="#main-insurance-form" class="jp-op-highlights-button"><span class="fas fa-id-card"></span> Check Insurance</button>
					</div>
				</div>

				<div class="col-12 col-md-6 col-lg-5">
					<img class="jp-op-highlights-img-faces lazy" data-src="<?php echo esc_attr( $op->highlights_main_image['url'] ); ?>" alt="<?php echo esc_attr( $op->highlights_main_image['alt'] ); ?>">
				</div>
			</div>
		</div>
	</section>

	<!-- /SECTION: Highlights -->

	<!-- SECTION: Table -->

	<section class="jp-op-section jp-op-table">
		<div class="container">
			<div class="row">
				<div class="col-12 col-md-12">
					<h3 class="jp-op-table-title">Evidenced-Based treatments that attack <span>all</span> the issues that hold you back.</h3>
					<p class="jp-op-table-subtitle">(including things like depression and anxiety)</p>
				</div>
			</div>

			<div class="jp-op-table-cards">
				<div class="row">
					<div class="col-12 col-lg-4">
						<div class="jp-op-table-card">
							<img class="jp-op-table-card-img lazy" data-src="/wp-content/themes/journeyPure/assets/img/op/paper-plane.png" alt="Session Types">
							<h4 class="jp-op-table-card-title">Session Types</h4>

							<ul class="jp-op-table-card-list">
								<li class="jp-op-table-card-list-item">Group Therapy</li>
								<li class="jp-op-table-card-list-item">Individual Therapy</li>
								<li class="jp-op-table-card-list-item">Medication Evaluations</li>
								<li class="jp-op-table-card-list-item">Life Coaching <a href="javascript:void(0);" class="jp-op-table-card-info" data-toggle="modal" data-target="#jp-op-modal-01"><span class="fas fa-info-circle"></span></a></li>
							</ul>
						</div>
					</div>

					<div class="col-12 col-lg-4">
						<div class="jp-op-table-card">
							<img class="jp-op-table-card-img lazy" data-src="/wp-content/themes/journeyPure/assets/img/op/plane.png" alt="Methodologies">
							<h4 class="jp-op-table-card-title">Methodologies</h4>

							<ul class="jp-op-table-card-list">
								<li class="jp-op-table-card-list-item">CBT and DBT Psychotherapy</li>
								<li class="jp-op-table-card-list-item">Trauma-Informed Care</li>
								<li class="jp-op-table-card-list-item">Motivational Interviewing</li>
								<li class="jp-op-table-card-list-item">Relapse Prevention Planning</li>
							</ul>
						</div>
					</div>

					<div class="col-12 col-lg-4">
						<div class="jp-op-table-card">
							<img class="jp-op-table-card-img lazy" data-src="/wp-content/themes/journeyPure/assets/img/op/space-ship.png" alt="Medications">
							<h4 class="jp-op-table-card-title">Medications</h4>

							<ul class="jp-op-table-card-list">
								<li class="jp-op-table-card-list-item">For everyone <a href="javascript:void(0);" class="jp-op-table-card-info" data-toggle="modal" data-target="#jp-op-modal-02"><span class="fas fa-info-circle"></span></a></li>
								<li class="jp-op-table-card-list-item">For alcohol <a href="javascript:void(0);" class="jp-op-table-card-info" data-toggle="modal" data-target="#jp-op-modal-03"><span class="fas fa-info-circle"></span></a></li>
								<li class="jp-op-table-card-list-item">For opiates <a href="javascript:void(0);" class="jp-op-table-card-info" data-toggle="modal" data-target="#jp-op-modal-04"><span class="fas fa-info-circle"></span></a></li>
								<li class="jp-op-table-card-list-item">For underlying issues <a href="javascript:void(0);" class="jp-op-table-card-info" data-toggle="modal" data-target="#jp-op-modal-05"><span class="fas fa-info-circle"></span></a></li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>

	<!-- /SECTION: Table -->

	<!-- SECTION: Bios -->

	<?php if ( isset( $op->bios ) && is_array( $op->bios->bios ) ) : ?>
		<section class="bio-section">
			<div class="container">
				<?php if ( ! empty( $op->bios->heading ) ) : ?>
					<div class="heading">
						<h3 class="h1"><?php echo esc_html( $op->bios->heading ); ?></h3>
					</div>
				<?php endif; ?>

				<?php if ( ! empty( $op->bios->subheading ) ) : ?>
					<div class="subheading">
						<p><?php echo esc_html( $op->bios->subheading ); ?></p>
					</div>
				<?php endif; ?>

				<div class="bio-slider" data-slick='{"slidesToShow": 4}'>
					<?php foreach ( $op->bios->bios as $bio ) : ?>
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

	<!-- SECTION: Reviews -->

	<section class="jp-op-section jp-op-reviews">
		<div class="container">
			<div class="row">
				<div class="col-12 col-md-12">
					<h3 class="jp-op-reviews-title">You're TWICE as likely to get better here.</h3>
					<p class="jp-op-reviews-subtitle">Your long-term success is what counts. Here are a few stories behind the data to prove that you can do this!</p>
				</div>
			</div>

			<div class="jp-op-reviews-cards">
				<div class="row">
					<div class="col-12 col-md-6">
						<div class="jp-op-reviews-card">
							<div class="jp-op-reviews-card-author">
								<div class="row justify-content-between">
									<div class="col-md-9 col-8">
										<div class="row">
											<div class="col-lg-auto col-md-3 col-4 align-self-center">
												<img class="jp-op-reviews-card-image lazy" data-src="/wp-content/uploads/reviews/generic-profile-1.png" alt="Stephanie C.">
											</div>

											<div class="col-lg-auto col-md-9 col-8 align-self-center">
												<h5 class="jp-op-reviews-card-title">Stephanie C.</h5>

												<div class="jp-op-reviews-card-stars">
													<span class="fas fa-star"></span>
													<span class="fas fa-star"></span>
													<span class="fas fa-star"></span>
													<span class="fas fa-star"></span>
													<span class="fas fa-star"></span>
												</div>
											</div>
										</div>
									</div>

									<div class="col-md-3 col-4 align-self-center">
										<img class="jp-op-reviews-card-image-google lazy" data-src="/wp-content/uploads/2019/10/verified-google.png" alt="Review from Google">
									</div>
								</div>
							</div>

							<div class="jp-op-reviews-card-review">
								<p>JourneyPure IOP is the first and only treatment program I have ever tried. I came into the program with 20 years of using and abusing under my belt, and now I am coming up on 2 years sober in November. <strong>The program literally saved my life.</strong></p>
							</div>
						</div>
					</div>

					<div class="col-12 col-md-6">
						<div class="jp-op-reviews-card">
							<div class="jp-op-reviews-card-author">
								<div class="row justify-content-between">
									<div class="col-md-9 col-8">
										<div class="row">
											<div class="col-lg-auto col-md-3 col-4 align-self-center">
												<img class="jp-op-reviews-card-image lazy" data-src="/wp-content/uploads/reviews/generic-profile-1.png" alt="Bree M.">
											</div>

											<div class="col-lg-auto col-md-9 col-8 align-self-center">
												<h5 class="jp-op-reviews-card-title">Bree M.</h5>

												<div class="jp-op-reviews-card-stars">
													<span class="fas fa-star"></span>
													<span class="fas fa-star"></span>
													<span class="fas fa-star"></span>
													<span class="fas fa-star"></span>
													<span class="fas fa-star"></span>
												</div>
											</div>
										</div>
									</div>

									<div class="col-md-3 col-4 align-self-center">
										<img class="jp-op-reviews-card-image-google lazy" data-src="/wp-content/uploads/2019/10/verified-google.png" alt="Review from Google">
									</div>
								</div>
							</div>

							<div class="jp-op-reviews-card-review">
								<p><strong>I enjoyed going to class</strong> and even asked for extra days. I'm so grateful there's an alumni meeting I can attend so that I can check in with everybody. I feel like all of the workers truly care about you <strong>with no judgment</strong>.</p>
							</div>
						</div>
					</div>
				</div>

				<div class="row">
					<div class="col-12 col-md-6">
						<div class="jp-op-reviews-card">
							<div class="jp-op-reviews-card-author">
								<div class="row justify-content-between">
									<div class="col-md-9 col-8">
										<div class="row">
											<div class="col-lg-auto col-md-3 col-4 align-self-center">
												<img class="jp-op-reviews-card-image lazy" data-src="/wp-content/uploads/reviews/generic-profile-1.png" alt="John B.">
											</div>

											<div class="col-lg-auto col-md-9 col-8 align-self-center">
												<h5 class="jp-op-reviews-card-title">John B.</h5>

												<div class="jp-op-reviews-card-stars">
													<span class="fas fa-star"></span>
													<span class="fas fa-star"></span>
													<span class="fas fa-star"></span>
													<span class="fas fa-star"></span>
													<span class="fas fa-star"></span>
												</div>
											</div>
										</div>
									</div>

									<div class="col-md-3 col-4 align-self-center">
										<img class="jp-op-reviews-card-image-google lazy" data-src="/wp-content/uploads/2019/10/verified-google.png" alt="Review from Google">
									</div>
								</div>
							</div>

							<div class="jp-op-reviews-card-review">
								<p>I had been to other IOP programs before but JourneyPure was by far the most helpful. The staff and therapist <strong>actually cared</strong> about your recovery and I am in contact with most of them still to this day.</p>
							</div>
						</div>
					</div>

					<div class="col-12 col-md-6">
						<div class="jp-op-reviews-card">
							<div class="jp-op-reviews-card-author">
								<div class="row justify-content-between">
									<div class="col-md-9 col-8">
										<div class="row">
											<div class="col-lg-auto col-md-3 col-4 align-self-center">
												<img class="jp-op-reviews-card-image lazy" data-src="/wp-content/uploads/reviews/generic-profile-1.png" alt="Chris B.">
											</div>

											<div class="col-lg-auto col-md-9 col-8 align-self-center">
												<h5 class="jp-op-reviews-card-title">Chris B.</h5>

												<div class="jp-op-reviews-card-stars">
													<span class="fas fa-star"></span>
													<span class="fas fa-star"></span>
													<span class="fas fa-star"></span>
													<span class="fas fa-star"></span>
													<span class="fas fa-star"></span>
												</div>
											</div>
										</div>
									</div>

									<div class="col-md-3 col-4 align-self-center">
										<img class="jp-op-reviews-card-image-google lazy" data-src="/wp-content/uploads/2019/10/verified-google.png" alt="Review from Google">
									</div>
								</div>
							</div>

							<div class="jp-op-reviews-card-review">
								<p>Everyone at Journey Pure went above &amp; beyond to <strong>tailor a treatment plan to meet my specific needs &amp; goals</strong>. Everyone from the Dr. to the staff and the therapists were super empathetic... A truly custom and dignified experience!</p>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>

	<!-- /SECTION: Reviews -->

	<!-- SECTION: FAQ -->

	<?php if ( ! empty( $op->faq ) ) : ?>
		<section class="block-4">
			<div class="container">
				<?php if ( ! empty( $op->faq->heading ) || ! empty( $op->faq->subheading ) ) : ?>
					<div class="heading">
						<span class="h1">
							<?php echo esc_html( $op->faq->heading ); ?>

							<?php if ( ! empty( $op->faq->subheading ) ) : ?>
								<h2 class="lead"><?php echo esc_html( $op->faq->subheading ); ?></h2>
							<?php endif; ?>
						</span>
					</div>
				<?php endif; ?>

				<?php if ( ! empty( $op->faq->faqs ) ) : ?>
					<div class="faqs">
						<div class="accordion" id="faq">
							<?php foreach ( $op->faq->faqs as $index => $faq ) : ?>
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

						<div class="ask-a-question">
							<span class="btn btn-primary" data-toggle="modal" data-target="#user-question-form-container">Ask a question</span>
						</div>
					</div>
				<?php endif; ?>
			</div>
		</section>
	<?php endif; ?>

	<!-- /SECTION: FAQ -->

</div>

<!-- /TEMPLATE: OP CPT -->

<?php get_footer(); ?>

<!-- MODALS -->

<div class="modal fade" id="jp-op-modal-01" tabindex="-1" role="dialog" aria-labelledby="not-ready-label" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title">Life Coaching</h5>

				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>

			<div class="modal-body">
				<p>Your Life Coach will call you every week in the beginning and for a full year after. You can contact them any time you're feeling triggered or need advice - even years later. They've been there before and know what it takes to stay on track.</p>
				<p>The JourneyPure Alumni app is a great way to stay connected.</p>
				<p>The app has:</p>
				<ul>
					<li>Direct 24/7 text message connection to your <strong>dedicated life coach</strong></li>
					<li>Personalized reminders to <strong>reward you</strong> for making healthy choices (with points exchanged for real gift cards)</li>
					<li>An 11-module <strong>self-help course</strong> with interactive journals for you to work through at your own pace</li>
				</ul>
			</div>
		</div>
	</div>
</div>

<div class="modal fade" id="jp-op-modal-02" tabindex="-1" role="dialog" aria-labelledby="not-ready-label" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title">For everyone</h5>

				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>

			<div class="modal-body">
				<p><strong>Naltrexone</strong> (Vivitrol, Revia, Depade) is non-addictive. The medication blocks the positive effects of alcohol and drugs to discourage relapse, while also reducing cravings.</p>
				<p>It can be started day 7-10 of sobriety and has no serious side effects. Because of cost, it's usually used for 1-12 months, but could be taken forever.</p>
				<p>In shot form (Vivitrol), it’s administered once a month at the clinic, eliminating the option to skip or mistake the dose. If not covered by insurance Vivitrol is $1,000 per monthly shot, though they offer a <a href="https://www.vivitrol.com/co-pay-savings-program" target="_blank">savings card</a>. The other options are Revia and Depade. These daily oral pills are around $100 a month.</p>
				<p><strong>Gabapentin</strong> (Neurontin, Gralise, Horizant) is a medication that has been studied recently for cravings. While research is ongoing, the takeaway is that Gabapentin is addictive and rarely the right choice.</p>
			</div>
		</div>
	</div>
</div>

<div class="modal fade" id="jp-op-modal-03" tabindex="-1" role="dialog" aria-labelledby="not-ready-label" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title">For alcohol</h5>

				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>

			<div class="modal-body">
				<p>While Naltrexone is usually the first choice, the following medications are also FDA-approved specifically for alcoholism:</p>
				<ul>
					<li><strong>Acamprosate</strong> (Campral) reduces symptoms of long-lasting withdrawal and cravings, such as insomnia, anxiety, restlessness and generally feeling unwell. It must be taken three times a day.</li>
					<li><strong>Disulfiram</strong> (Antabuse) interferes with the body’s ability to absorb alcohol. Instead of feeling “good”, alcohol will cause unpleasant reactions such as nausea and possibly be dangerous. Those who have shown the ability to stay sober for an extended period with recent relapse are ideal candidates.</li>
					<li><strong>Topiramate</strong> (Topamax, Qudexy) is an FDA-approved medication for seizures used “off label” to also reduce alcohol cravings due to initial promising research.</li>
				</ul>
			</div>
		</div>
	</div>
</div>

<div class="modal fade" id="jp-op-modal-04" tabindex="-1" role="dialog" aria-labelledby="not-ready-label" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title">For opiates</h5>

				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>

			<div class="modal-body">
				<p>In addition to Naltrexone, these medications are FDA-approved to treat heroin or pain pill addiction:</p>
				<ul>
					<li><strong>Buprenorphine + Naloxone</strong> (Suboxone) helps prevent withdrawal symptoms by replacing the effects of opiates with a lesser effect that does not produce a “high.” This is typically administered for 7-10 days or a longer maintenance program. This medication is addictive but poses a much lower risk.</li>
					<li><strong>Methadone</strong> (Dolophine, Methadose) is a more dangerous version of the above medication that is no longer recommended.</li>
				</ul>
			</div>
		</div>
	</div>
</div>

<div class="modal fade" id="jp-op-modal-05" tabindex="-1" role="dialog" aria-labelledby="not-ready-label" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title">For underlying issues</h5>

				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>

			<div class="modal-body">
				<p>All other physical and mental health issues (like depression and anxiety) need to be treated – whether they helped fuel the addiction in the first place or came as a result of the addiction.</p>
				<p>Common mental health prescriptions include:</p>
				<ul>
					<li><strong>Fluoxetine</strong> (Prozac, Sarafem) or <strong>Bupropion</strong> (Wellbutrin) for depression</li>
					<li><strong>Aripiprazole</strong> (Abilify) for mood and bipolar</li>
					<li><strong>Trazodone</strong> (Oleptro) or <strong>Hydroxyzine</strong> (Vistaril, Atarax) for sleep and anxiety</li>
					<li><strong>Paroxetine</strong> (Paxil, Pexeva, Brisdelle) or <strong>Sertraline</strong> (Zoloft) for major depress, PTSD, OCD</li>
					<li><strong>Oxcarbazepine</strong> (Trileptal) for mood stabilization</li>
				</ul>
			</div>
		</div>
	</div>
</div>

<!-- /MODALS -->
