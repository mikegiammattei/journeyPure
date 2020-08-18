			<?php
				require_once(get_stylesheet_directory() . '/classes/Footer.php');
				$Footer = new \Footer\Footer();
			?>

			<footer class="footer-main">
				<div class="sub-tier">
					<div class="container">
						<div class="row justify-content-between align-items-center">
							<div class="col-sm-6">
								<div class="text-action">
									<span class="subheading">Do you have questions?</span>
									<p class="page-heading heading">Let's Talk.</p>
								</div>
							</div>

							<div class="col-sm-6">
								<div class="phone-action">
									<script defer async src="https://dv36c15u2wg3n.cloudfront.net/assets/form_reactors.js"></script>
									<div class="ctm-call-widget-container">
										<iframe class="ctm-call-widget" src="https://app.calltrackingmetrics.com/form_reactors/FRT472ABB2C5B9B141A95E7A133293232FB64726C81D4381AEFF2617EDD86B68F50" style="width:100%;height:300px;border:none"></iframe>
									</div>
									<?php if(!isset($Footer->controls->hide_not_ready_link)): ?>
									<span class="not-ready-link" data-toggle="modal" data-target="#not-ready-modal"><i class="fas fa-question"></i> Not ready? Click here.</span>
									<?php endif;?>
								</div>
							</div>
						</div>
					</div>
				</div>

				<div class="last-tier">
					<div class="container">
						<div class="row justify-content-between align-items-center">
							<div class="col-sm-6">
								<p>
									<a href="/ask-our-doctors/">Addiction Help</a> »
									<a href="/locations/florida/">Florida Rehab</a> · <a href="/locations/tennessee/">Tennessee Rehab</a> · <a href="/locations/kentucky/">Kentucky Rehab</a> · <a href="/locations/military-program/">Veteran Rehab</a>
								</p>

								<div class="copyright">
									&copy; <?php echo date('Y'); ?> JourneyPure | <a href="/terms-of-use/">Terms </a> 	&middot;  <a href="/privacy-policy/">Privacy Policy &nbsp; </a> <button class="btn btn-dark btn-sm " onclick="topFunction()"><i class="fas fa-chevron-up"></i> Back to Top</button>
								</div>
							</div>

							<div class="col-sm-6"> </div>
						</div>
					</div>
				</div>
			</footer>

			<?php if ( ! is_page_template( 'template-virtual-rehab.php' ) ) : ?>
				<?php // include_once(get_stylesheet_directory() . '/assets/src/includes/components/cta-widget.php'); ?>
			<?php endif; ?>

			<?php if ( is_page_template( 'template-virtual-rehab.php' ) ) : ?>
				<?php include_once(get_stylesheet_directory() . '/assets/src/includes/components/virtual-rehab-modal.php'); ?>
			<?php endif; ?>

			<?php include_once(get_stylesheet_directory() . '/assets/src/includes/components/leave-a-review.php'); ?>
			<?php include_once(get_stylesheet_directory() . '/assets/src/includes/components/not-ready-component.php'); ?>
			<?php include_once(get_stylesheet_directory() . '/assets/src/includes/components/exit-modal.php'); ?>
			<?php include_once(get_stylesheet_directory() . '/assets/src/includes/components/review-video-modal.php'); ?>
			<?php include_once(get_stylesheet_directory() . '/assets/src/includes/components/review-video-multiple-modal.php'); ?>
			<?php // include_once(get_stylesheet_directory() . '/assets/src/includes/components/frontman.php'); ?>

		</div> <?php /** end of main wrapper */ ?>

		<?php if ( ! isset( $_GET['DEV'] ) ) : ?>
			<script> window.JP_IS_BOT = <?php echo jp_is_bot() ? 'true' : 'false'; ?>; </script>
			<script src="//code.jquery.com/jquery-3.4.1.min.js"></script>
			<script src="//cdnjs.cloudflare.com/ajax/libs/html5shiv/3.6.1/html5shiv.js"></script>
			<script src="//cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js"></script>
			<script src="<?php echo get_stylesheet_directory_uri() . '/js/vendor.min.js?v=20200818_2'; ?>" defer></script>
			<script src="<?php echo get_stylesheet_directory_uri() . '/js/custom.min.js?v=20200818_2'; ?>" defer></script>
		<?php endif; ?>

		<?php wp_footer(); ?>
	</body>
</html>
