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
						<img class="jp-op-highlights-img-logos lazy" data-src="<?php echo esc_attr( $op->highlights_insurers_image['url'] ); ?>" alt="<?php echo esc_attr( $op->highlights_insurers_image['alt'] ); ?>">
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
							<img data-src="/wp-content/themes/journeyPure/assets/img/op/paper-plane.png" alt="Session Types" class="jp-op-table-card-img lazy">
							<h4 class="jp-op-table-card-title">Session Types</h4>

							<ul class="jp-op-table-card-list">
								<li class="jp-op-table-card-list-item">Group Therapy</li>
								<li class="jp-op-table-card-list-item">Individual Therapy</li>
								<li class="jp-op-table-card-list-item">Medication Evaluations</li>

								<?php
									$tooltip = 'Your Life Coach will call you every week in the beginning and for a full year after. You can contact them any time you\'re feeling triggered or need advice - even years later. They\'ve been there before and know what it takes to stay on track.
									<br><br>
									The JourneyPure Alumni app is a great way to stay connected.
									<br><br>
									The app has:
									<br>
									<ul>
									<li>Direct 24/7 text message connection to your dedicated life coach</li>
									<li>Personalized reminders to reward you for making healthy choices (with points exchanged for real gift cards)
									An 11-module self-help course with interactive journals for you to work through at your own pace</li>
									</ul>';
								?>

								<li class="jp-op-table-card-list-item">Life Coaching <a href="javascript:void(0);"
																						class="jp-op-table-card-info"
																						data-toggle="tooltip"
																						data-placement="top"
																						data-trigger="trigger"
																						data-html="true"
																						data-template="<div class='jp-op-table-card-tooltip tooltip' role='tooltip'><div class='arrow'></div><div class='tooltip-inner'></div></div>'"
																						title="<?php echo wp_kses_post( $tooltip ); ?>"><span class="fas fa-info-circle"></span></a></li>
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
								<?php
									$tooltip = '<b>Naltrexone</b> (Vivitrol, Revia, Depade) is non-addictive. The medication blocks the positive effects of alcohol and drugs to discourage relapse, while also reducing cravings.
									<br>
									It can be started day 7-10 of sobriety and has no serious side effects. Because of cost, it\'s usually used for 1-12 months, but could be taken forever.
									<br>
									In shot form (Vivitrol), it’s administered once a month at the clinic, eliminating the option to skip or mistake the dose. If not covered by insurance Vivitrol is $1,000 per monthly shot, though they offer a <a href=\'https://www.vivitrol.com/co-pay-savings-program\' target=\'_blank\'>savings card</a>. The other options are Revia and Depade. These daily oral pills are around $100 a month.
									<br><br>
									<b>Gabapentin</b> (Neurontin, Gralise, Horizant) is a medication that has been studied recently for cravings. While research is ongoing, the takeaway is that Gabapentin is addictive and rarely the right choice.';
								?>

								<li class="jp-op-table-card-list-item">For everyone <a href="javascript:void(0);"
																						class="jp-op-table-card-info"
																						data-toggle="tooltip"
																						data-placement="top"
																						data-trigger="trigger"
																						data-html="true"
																						data-template="<div class='jp-op-table-card-tooltip tooltip' role='tooltip'><div class='arrow'></div><div class='tooltip-inner'></div></div>'"
																						title="<?php echo wp_kses_post( $tooltip ); ?>"><span class="fas fa-info-circle"></span></a></li>

								<?php
									$tooltip = 'While Naltrexone is usually the first choice, the following medications are also FDA-approved specifically for alcoholism:
									<br>
									<ul>
									<li><b>Acamprosate</b> (Campral) reduces symptoms of long-lasting withdrawal and cravings, such as insomnia, anxiety, restlessness and generally feeling unwell. It must be taken three times a day.</li>
									<li><b>Disulfiram</b> (Antabuse) interferes with the body’s ability to absorb alcohol. Instead of feeling “good”, alcohol will cause unpleasant reactions such as nausea and possibly be dangerous. Those who have shown the ability to stay sober for an extended period with recent relapse are ideal candidates.</li>
									<li><b>Topiramate</b> (Topamax, Qudexy) is an FDA-approved medication for seizures used “off label” to also reduce alcohol cravings due to initial promising research.</li>
									</ul>';
								?>

								<li class="jp-op-table-card-list-item">For alcohol <a href="javascript:void(0);"
																						class="jp-op-table-card-info"
																						data-toggle="tooltip"
																						data-placement="top"
																						data-trigger="trigger"
																						data-html="true"
																						data-template="<div class='jp-op-table-card-tooltip tooltip' role='tooltip'><div class='arrow'></div><div class='tooltip-inner'></div></div>'"
																						title="<?php echo wp_kses_post( $tooltip ); ?>"><span class="fas fa-info-circle"></span></a></li>

								<?php
									$tooltip = 'In addition to Naltrexone, these medications are FDA-approved to treat heroin or pain pill addiction:
									<br>
									<ul>
									<li><b>Buprenorphine + Naloxone</b> (Suboxone) helps prevent withdrawal symptoms by replacing the effects of opiates with a lesser effect that does not produce a “high.” This is typically administered for 7-10 days or a longer maintenance program. This medication is addictive but poses a much lower risk.</li>
									<li><b>Methadone</b> (Dolophine, Methadose) is a more dangerous version of the above medication that is no longer recommended.</li>
									</ul>';
								?>

								<li class="jp-op-table-card-list-item">For opiates <a href="javascript:void(0);"
																						class="jp-op-table-card-info"
																						data-toggle="tooltip"
																						data-placement="top"
																						data-trigger="trigger"
																						data-html="true"
																						data-template="<div class='jp-op-table-card-tooltip tooltip' role='tooltip'><div class='arrow'></div><div class='tooltip-inner'></div></div>'"
																						title="<?php echo wp_kses_post( $tooltip ); ?>"><span class="fas fa-info-circle"></span></a></li>

								<?php
									$tooltip = 'All other physical and mental health issues (like depression and anxiety) need to be treated – whether they helped fuel the addiction in the first place or came as a result of the addiction.
									Common mental health prescriptions include:
									<br>
									<ul>
									<li><b>Fluoxetine</b> (Prozac, Sarafem) or <b>Bupropion</b> (Wellbutrin) for depression</li>
									<li><b>Aripiprazole</b> (Abilify) for mood and bipolar</li>
									<li><b>Trazodone</b> (Oleptro) or <b>Hydroxyzine</b> (Vistaril, Atarax) for sleep and anxiety</li>
									<li><b>Paroxetine</b> (Paxil, Pexeva, Brisdelle) or <b>Sertraline</b> (Zoloft) for major depress, PTSD, OCD</li>
									<li><b>Oxcarbazepine</b> (Trileptal) for mood stabilization</li>
									</ul>';
								?>

								<li class="jp-op-table-card-list-item">For underlying issues <a href="javascript:void(0);"
																						class="jp-op-table-card-info"
																						data-toggle="tooltip"
																						data-placement="top"
																						data-trigger="trigger"
																						data-html="true"
																						data-template="<div class='jp-op-table-card-tooltip tooltip' role='tooltip'><div class='arrow'></div><div class='tooltip-inner'></div></div>'"
																						title="<?php echo wp_kses_post( $tooltip ); ?>"><span class="fas fa-info-circle"></span></a></li>
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
