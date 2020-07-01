<?php
/**
 * Template Name: Locations 2
 *
 * @author   Fernando Tessmann
 * @package  JourneyPure
 */

require_once get_stylesheet_directory() . '/classes/LocationsPage2.php';
$locations = new Pages\LocationsPage2();

get_header();
?>

<!-- TEMPLATE: Locations 2 -->

<div id="jp-loc2" class="jp-loc2">

	<!-- SECTION: Masthead -->

	<section class="jp-loc2-section jp-loc2-masthead" style="background-image: url('/wp-content/uploads/2019/11/jp-locations-banner-2-1920x522.jpg');">
		<div class="container">
			<div class="row">
				<div class="col-12 col-lg-8 offset-lg-2">
					<div class="jp-loc2-masthead-content">
						<h1 class="jp-loc2-masthead-title">18 Rehab &amp; Outpatient Locations</h1>
						<p class="jp-loc2-masthead-subtitle">Whether you're just realizing there's a problem or you've been in and out of other facilities for years, we can help. People from all over the country come here because the treatment is that good.</p>
					</div>
				</div>
			</div>
		</div>
	</section>

	<!-- /SECTION: Masthead -->

	<!-- SECTION: Cards -->

	<section class="jp-loc2-section jp-loc2-cards">
		<div class="container">
			<div class="row">
				<div class="col-12">
					<h2 class="jp-loc2-cards-title">The Best In-Network Rehabs in the Country</h2>
				</div>
			</div>

			<div class="row">
				<div class="col-12 col-lg-4">
					<div class="jp-loc2-cards-card">
						<img class="jp-loc2-cards-card-img lazy" src="/wp-content/themes/journeyPure/assets/img/locations/example-1.png" alt="Kentucky Alcohol &amp; Drug Rehab">

						<div class="jp-loc2-cards-card-inner">
							<h3 class="jp-loc2-cards-card-title">Kentucky Alcohol &amp; Drug Rehab</h3>
							<p class="jp-loc2-cards-card-subtitle">The Kentucky drug and alcohol rehab helps people from across the state get the life back on track (for good).</p>

							<div class="jp-loc2-cards-card-footer">
								<a class="jp-loc2-cards-card-learn-more" href="#"><strong>Learn More</strong></a>

								<div class="jp-loc2-cards-card-stars">
									<span class="jp-loc2-cards-card-star">4.8</span>
									<span class="fas fa-star"></span>
									<span class="fas fa-star"></span>
									<span class="fas fa-star"></span>
									<span class="fas fa-star"></span>
									<span class="jp-loc2-cards-card-count">(55)</span>
								</div>
							</div>
						</div>
					</div>
				</div>

				<div class="col-12 col-lg-4">
					<div class="jp-loc2-cards-card">
						<img class="jp-loc2-cards-card-img lazy" src="/wp-content/themes/journeyPure/assets/img/locations/example-2.png" alt="Tennessee Alcohol &amp; Drug Rehab">

						<div class="jp-loc2-cards-card-inner">
							<h3 class="jp-loc2-cards-card-title">Tennessee Alcohol &amp; Drug Rehab</h3>
							<p class="jp-loc2-cards-card-subtitle">The best place for anyone in Tennessee to get back on track.</p>

							<div class="jp-loc2-cards-card-footer">
								<a class="jp-loc2-cards-card-learn-more" href="#"><strong>Learn More</strong></a>

								<div class="jp-loc2-cards-card-stars">
									<span class="jp-loc2-cards-card-star">4.8</span>
									<span class="fas fa-star"></span>
									<span class="fas fa-star"></span>
									<span class="fas fa-star"></span>
									<span class="fas fa-star"></span>
									<span class="jp-loc2-cards-card-count">(55)</span>
								</div>
							</div>

							<div class="jp-loc2-cards-card-footer">
								<a class="jp-loc2-cards-card-learn-more" href="#">Click here for medicaid</a>
							</div>
						</div>
					</div>
				</div>

				<div class="col-12 col-lg-4">
					<div class="jp-loc2-cards-card">
						<img class="jp-loc2-cards-card-img lazy" src="/wp-content/themes/journeyPure/assets/img/locations/example-1.png" alt="Kentucky Alcohol &amp; Drug Rehab">

						<div class="jp-loc2-cards-card-inner">
							<h3 class="jp-loc2-cards-card-title">Kentucky Alcohol &amp; Drug Rehab</h3>
							<p class="jp-loc2-cards-card-subtitle">The Kentucky drug and alcohol rehab helps people from across the state get the life back on track (for good).</p>

							<div class="jp-loc2-cards-card-footer">
								<a class="jp-loc2-cards-card-learn-more" href="#"><strong>Learn More</strong></a>

								<div class="jp-loc2-cards-card-stars">
									<span class="jp-loc2-cards-card-star">4.8</span>
									<span class="fas fa-star"></span>
									<span class="fas fa-star"></span>
									<span class="fas fa-star"></span>
									<span class="fas fa-star"></span>
									<span class="jp-loc2-cards-card-count">(55)</span>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>

	<!-- /SECTION: Cards -->

	<!-- SECTION: Table -->

	<section class="jp-loc2-section jp-loc2-table">
		<div class="container">
			<div class="row">
				<div class="col-12 col-md-12">
					<h3 class="jp-loc2-table-title">13 Outpatient &amp; Suboxone Clinics</h3>
					<p class="jp-loc2-table-subtitle">Live your life, whily you also work to save it.</p>
				</div>
			</div>

			<div class="jp-loc2-table-cards">
				<div class="row">
					<div class="col-12 col-lg-4">
						<div class="jp-loc2-table-card">
							<img class="jp-loc2-table-card-img lazy" src="/wp-content/themes/journeyPure/assets/img/locations/example-3.png" alt="<?php echo esc_attr( $locations->cards_1_title ); ?>">
							<h4 class="jp-loc2-table-card-title"><?php echo esc_html( $locations->cards_1_title ); ?></h4>

							<ul class="jp-loc2-table-card-list">
								<?php if ( ! empty( $locations->cards_1 ) ) : ?>
									<?php foreach ( $locations->cards_1 as $card ) : ?>
										<li class="jp-loc2-table-card-list-item">
											<a class="jp-loc2-table-card-place" href="<?php echo esc_attr( $card['link'] ); ?>">
												<h4 class="jp-loc2-table-card-place-title"><?php echo esc_html( $card['title'] ); ?> <span class="fas fa-info-circle"></span></h4>

												<div class="jp-loc2-table-card-place-stars">
													<span class="jp-loc2-table-card-place-star"><?php echo esc_html( $card['ratings']['number_rating'] ); ?></span>
													<span class="fas fa-star"></span>
													<span class="fas fa-star"></span>
													<span class="fas fa-star"></span>
													<span class="fas fa-star"></span>
													<span class="jp-loc2-table-card-place-count">(<?php echo esc_html( $card['ratings']['count'] ); ?>)</span>
												</div>

												<p class="jp-loc2-table-card-place-address"><?php echo esc_html( $card['address'] ); ?></p>
											</a>
										</li>
									<?php endforeach; ?>
								<?php endif; ?>
							</ul>
						</div>
					</div>

					<div class="col-12 col-lg-4">
						<div class="jp-loc2-table-card">
							<img class="jp-loc2-table-card-img lazy" src="/wp-content/themes/journeyPure/assets/img/locations/example-4.png" alt="Kentucky">
							<h4 class="jp-loc2-table-card-title">Kentucky</h4>

							<ul class="jp-loc2-table-card-list">
								<?php if ( ! empty( $locations->cards_2 ) ) : ?>
									<?php foreach ( $locations->cards_2 as $card ) : ?>
										<li class="jp-loc2-table-card-list-item">
											<a class="jp-loc2-table-card-place" href="<?php echo esc_attr( $card['link'] ); ?>">
												<h4 class="jp-loc2-table-card-place-title"><?php echo esc_html( $card['title'] ); ?> <span class="fas fa-info-circle"></span></h4>

												<div class="jp-loc2-table-card-place-stars">
													<span class="jp-loc2-table-card-place-star"><?php echo esc_html( $card['ratings']['number_rating'] ); ?></span>
													<span class="fas fa-star"></span>
													<span class="fas fa-star"></span>
													<span class="fas fa-star"></span>
													<span class="fas fa-star"></span>
													<span class="jp-loc2-table-card-place-count">(<?php echo esc_html( $card['ratings']['count'] ); ?>)</span>
												</div>

												<p class="jp-loc2-table-card-place-address"><?php echo esc_html( $card['address'] ); ?></p>
											</a>
										</li>
									<?php endforeach; ?>
								<?php endif; ?>
							</ul>
						</div>
					</div>

					<div class="col-12 col-lg-4">
						<div class="jp-loc2-table-card">
							<img class="jp-loc2-table-card-img lazy" src="/wp-content/themes/journeyPure/assets/img/locations/example-5.png" alt="Florida">
							<h4 class="jp-loc2-table-card-title">Florida</h4>

							<ul class="jp-loc2-table-card-list">
								<?php if ( ! empty( $locations->cards_3 ) ) : ?>
									<?php foreach ( $locations->cards_3 as $card ) : ?>
										<li class="jp-loc2-table-card-list-item">
											<a class="jp-loc2-table-card-place" href="<?php echo esc_attr( $card['link'] ); ?>">
												<h4 class="jp-loc2-table-card-place-title"><?php echo esc_html( $card['title'] ); ?> <span class="fas fa-info-circle"></span></h4>

												<div class="jp-loc2-table-card-place-stars">
													<span class="jp-loc2-table-card-place-star"><?php echo esc_html( $card['ratings']['number_rating'] ); ?></span>
													<span class="fas fa-star"></span>
													<span class="fas fa-star"></span>
													<span class="fas fa-star"></span>
													<span class="fas fa-star"></span>
													<span class="jp-loc2-table-card-place-count">(<?php echo esc_html( $card['ratings']['count'] ); ?>)</span>
												</div>

												<p class="jp-loc2-table-card-place-address"><?php echo esc_html( $card['address'] ); ?></p>
											</a>
										</li>
									<?php endforeach; ?>
								<?php endif; ?>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>

	<!-- /SECTION: Table -->

	<!-- SECTION: FAQ -->

	<?php if ( ! empty( $locations->faq ) ) : ?>
		<section class="block-4">
			<div class="container">
				<?php if ( ! empty( $locations->faq->heading ) || ! empty( $locations->faq->subheading ) ) : ?>
					<div class="heading">
						<span class="h1">
							<?php echo esc_html( $locations->faq->heading ); ?>

							<?php if ( ! empty( $locations->faq->subheading ) ) : ?>
								<h2 class="lead"><?php echo esc_html( $locations->faq->subheading ); ?></h2>
							<?php endif; ?>
						</span>
					</div>
				<?php endif; ?>

				<?php if ( ! empty( $locations->faq->faqs ) ) : ?>
					<div class="faqs">
						<div class="accordion" id="faq">
							<?php foreach ( $locations->faq->faqs as $index => $faq ) : ?>
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

</div>

<?php get_footer();
