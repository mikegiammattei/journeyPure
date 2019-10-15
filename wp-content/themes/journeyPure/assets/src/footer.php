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
							<span class="subheading">Do you have question?</span>
							<p class="page-heading heading">Lets Talk.</p>
						</div>
					</div>
					<div class="col-sm-6">
						<div class="phone-action">
							<script defer async src="https://dv36c15u2wg3n.cloudfront.net/assets/form_reactors.js"></script>
							<div class="ctm-call-widget-container">
								<iframe class="ctm-call-widget" src="https://app.calltrackingmetrics.com/form_reactors/FRT472ABB2C5B9B141A95E7A133293232FB64726C81D4381AEFF2617EDD86B68F50" style="width:100%;height:300px;border:none"></iframe>
							</div>
							<?php if(!isset($Footer->controls->hide_not_ready_link)): ?>
							<span class="not-ready-link"><i class="fas fa-question"></i> Not Ready? Click here.</span>
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
						<span class="heading">
							Types of Drug Addiction<br>
							Dual Diagnosis
						</span>
						<div class="copyright">
							<?php echo date('Y'); ?> JourneyPure | <a href="/terms">Terms </a> 	&middot;  <a href="/privacy-policy">Privacy Policy </a> <button class="btn btn-light btn-sm " onclick="topFunction()"><i class="fas fa-chevron-up"></i> Back to Top</button>
						</div>
					</div>
					<div class="col-sm-6">

					</div>
				</div>
			</div>
		</div>
	</footer>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>

	<?php wp_footer(); ?>

	</body>
</html>
