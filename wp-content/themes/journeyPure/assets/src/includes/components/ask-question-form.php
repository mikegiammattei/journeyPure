<div class="modal fade" id="user-question-form-container" tabindex="-1" role="dialog" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title text-center">Ask you question below</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<form data-user-form="ask question" class="needs-validation" novalidate>
				<div class="alert alert-success" style="border-radius: 0" role="alert">
					<strong>Sent Successfully!</strong> Our response team will  answer our question ASAP.
				</div>
				<div class="modal-body">
					<div class="form-group">
						<label for="question">What is your question</label>
						<textarea required type="text" id="question" class="form-control" rows="3" placeholder="Enter question"></textarea>
						<div class="valid-feedback">
							Looks good!
						</div>
						<div class="invalid-feedback">
							Your question is empty?
						</div>
						<small class="form-text text-muted">We are committed to providing you with an answer.</small>
					</div>
					<div class="form-group">
						<div class="form-check">
							<input class="form-check-input" type="checkbox" value="" id="invalidCheck" required>
							<label class="form-check-label" for="invalidCheck">
								Agree to terms and conditions.
							</label> <span data-toggle="modal" role="button" data-target="#form-terms-conditions"  class="text-primary">View terms</span>
							<div class="invalid-feedback">
								You must agree before submitting.
							</div>
						</div>
					</div>
					<div class="captcha-container">
						<div class="g-recaptcha" data-callback="userQuestionClientFormCaptchaCallback" data-theme="light"  data-sitekey="6LccjL4UAAAAAJAHAWjebiNA4_A0fPcHvxO-BG-b"></div>
						<div class="bad-captcha">
							Captcha is required
						</div>
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
					<button type="submit" class="btn btn-primary">Submit Question</button>
				</div>
			</form>
		</div>
	</div>
</div>
<div class="modal fade" id="form-terms-conditions" tabindex="-1" role="dialog" aria-labelledby="form-terms-conditions" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title">Terms & Conditions</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<?php include(get_stylesheet_directory() . '/assets/src/includes/terms-and-conditions.php');?>
			</div>
		</div>
	</div>
</div>
