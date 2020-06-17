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

	<!-- SECTION: Clinic Highlights -->

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
						<img class="jp-op-highlights-img-logos lazy" data-src="/wp-content/themes/journeyPure/assets/img/op/insurers-logos.png" alt="Insurers">
					</div>

					<div class="jp-op-highlights-button-wrapper">
						<button type="button" data-toggle="modal" data-target="#main-insurance-form" class="jp-op-highlights-button"><span class="fas fa-id-card"></span> Check Insurance</button>
					</div>
				</div>

				<div class="col-12 col-md-6 col-lg-5">
					<img class="jp-op-highlights-img-faces lazy" data-src="/wp-content/themes/journeyPure/assets/img/op/clinic-highlights-faces.png" alt="Clinic Highlights">
				</div>
			</div>
		</div>
	</section>

	<!-- /SECTION: Clinic Highlights -->

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
							<img data-src="/wp-content/themes/journeyPure/assets/img/op/paper-plane.png" alt="Session Types" class="jp-op-table-card-img lazy">
							<h4 class="jp-op-table-card-title">Session Types</h4>

							<ul class="jp-op-table-card-list">
								<li class="jp-op-table-card-list-item">Group Therapy</li>
								<li class="jp-op-table-card-list-item">Individual Therapy</li>
								<li class="jp-op-table-card-list-item">Medication Evaluations</li>
								<li class="jp-op-table-card-list-item">Life Coaching <a href="javascript:void(0);" class="jp-op-table-card-info" data-toggle="tooltip" data-placement="top" data-trigger="trigger" data-html="true" title="Tooltip on top"><span class="fas fa-info-circle"></span></a></li>
							</ul>
						</div>
					</div>

					<div class="col-12 col-lg-4">
						<div class="jp-op-table-card">
							<img data-src="/wp-content/themes/journeyPure/assets/img/op/plane.png" alt="Methodologies" class="jp-op-table-card-img lazy">
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
							<img data-src="/wp-content/themes/journeyPure/assets/img/op/space-ship.png" alt="Medications" class="jp-op-table-card-img lazy">
							<h4 class="jp-op-table-card-title">Medications</h4>

							<ul class="jp-op-table-card-list">
								<li class="jp-op-table-card-list-item">For everyone <a href="javascript:void(0);" class="jp-op-table-card-info" data-toggle="tooltip" data-placement="top" data-trigger="trigger" data-html="true" title="Tooltip on top"><span class="fas fa-info-circle"></span></a></li>
								<li class="jp-op-table-card-list-item">For alcohol <a href="javascript:void(0);" class="jp-op-table-card-info" data-toggle="tooltip" data-placement="top" data-trigger="trigger" data-html="true" title="Tooltip on top"><span class="fas fa-info-circle"></span></a></li>
								<li class="jp-op-table-card-list-item">For opiates <a href="javascript:void(0);" class="jp-op-table-card-info" data-toggle="tooltip" data-placement="top" data-trigger="trigger" data-html="true" title="Tooltip on top"><span class="fas fa-info-circle"></span></a></li>
								<li class="jp-op-table-card-list-item">For underlying issues <a href="javascript:void(0);" class="jp-op-table-card-info" data-toggle="tooltip" data-placement="top" data-trigger="trigger" data-html="true" title="Tooltip on top"><span class="fas fa-info-circle"></span></a></li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>

	<!-- /SECTION: Table -->

</div>

<!-- /TEMPLATE: OP CPT -->

<?php get_footer();
