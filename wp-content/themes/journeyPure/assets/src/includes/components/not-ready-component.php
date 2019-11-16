<?php
include_once(get_stylesheet_directory() . '/classes/NotReady.php');
$NotReady = new Modal\NotReady();
?>
<div class="modal fade" id="not-ready-modal" tabindex="-1" role="dialog" aria-labelledby="not-ready-label" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="heading">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
				<img src="/wp-content/uploads/2019/11/favicon-bird-270x270.png" align="Journey Pure">
			</div>
			<h5 class="modal-title text-primary" id="not-ready-label">Not ready to call?</h5>

			<div class="modal-body">
				<section class="faqs">
					<div class="container">
						<div class="accordion" id="location-faq-rehab">
							<?php foreach ( $NotReady->faqs as $index => $faq) : ?>
								<div class="card">
									<div class="card-header  <?php echo ($index != 0) ? "collapsed" : ""; ?>" data-toggle="collapse" data-target="#l-faq-<?php echo $index; ?>" aria-expanded="true" aria-controls="l-faq-<?php echo $index; ?>" id="l-faq-heading-<?php echo $index; ?>">
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

									<div id="l-faq-<?php echo $index; ?>" class="collapse <?php echo ($index == 0) ? "show" : ""; ?>" aria-labelledby="l-faq-heading-<?php echo $index; ?>" data-parent="#location-faq-rehab">
										<div class="card-body">
											<?php echo $faq->answer; ?>
										</div>
									</div>
								</div>
							<?php endforeach; ?>
						</div>
					</div>
				</section>
			</div>
			<div class="modal-footer">
				<p>Let's talk through this together.</p>
				<div class="call-action">
					<i class="fas fa-phone"></i> Call <a class="phone" href="tel:<?php echo get_option('defaultPhone'); ?>"><?php echo get_option('defaultPhone'); ?></a>
				</div>
			</div>
		</div>
	</div>
</div>
