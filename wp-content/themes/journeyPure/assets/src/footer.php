<?php
	require_once(get_stylesheet_directory() . '/classes/Footer.php');
	$Footer = new \Footer\Footer();
?>
	<footer>
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
							<a  href="/types-of-drug-abuse/">Types of Drug Abuse</a><br>
							<a href="/effects-opioids-body/">Effects of Opioids on the Body</a>
						</p>
						<div class="copyright">
							&copy; <?php echo date('Y'); ?> JourneyPure | <a href="/terms">Terms </a> 	&middot;  <a href="/privacy-policy">Privacy Policy &nbsp; </a> <button class="btn btn-dark btn-sm " onclick="topFunction()"><i class="fas fa-chevron-up"></i> Back to Top</button>
						</div>
					</div>
					<div class="col-sm-6">
					</div>
				</div>
			</div>
		</div>
	</footer>
<?php include_once(get_stylesheet_directory() . '/assets/src/includes/components/cta-widget.php'); ?>
<?php include_once(get_stylesheet_directory()  . '/assets/src/includes/components/leave-a-review.php'); ?>
<?php include_once(get_stylesheet_directory()  . '/assets/src/includes/components/not-ready-component.php'); ?>
<?php include_once(get_stylesheet_directory()  . '/assets/src/includes/components/exit-modal.php'); ?>

</div> <?php /** end of main wrapper */ ?>

<!--<div class="ctm-chat-container">-->
<!--	<iframe  id="ctm-chat-widget" class="ctm-call-widget ctm-chat-widget" src="https://130400.tctm.co/form/FRT472ABB2C5B9B141A95E7A133293232FBB3EFEC59E103154BC3C3A194C8DE5FD3.html" style="display:none"></iframe>-->
<!--	<script defer async src="https://130400.tctm.co/formreactor.js"></script>-->
<!--</div>-->


<script src="//code.jquery.com/jquery-3.4.1.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/html5shiv/3.6.1/html5shiv.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js"></script>
<script src="<?php echo get_stylesheet_directory_uri() . '/js/vendor.min.js'; ?>"></script>

	<?php wp_footer(); ?>

	</body>
</html>