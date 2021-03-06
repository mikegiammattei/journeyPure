<div class="modal fade leave-a-review" id="leave-a-review" tabindex="-1" role="dialog" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header bg-primary ">
				<h5 class="modal-title text-white">Leave a Review</h5>
				<button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<form data-user-form="leave-a-review" class="needs-validation" novalidate>
				<div class="modal-body">
						<div class="alert alert-success text-center" style="border-radius: 0" role="alert">
							<strong>Sent Successfully!</strong><br> Thank you for sharing your review!
						</div>
					<div class="part-one">
						<div class="form-group">
							<div class="form-row">
								<div class="col-md-12">
									<label for="review-name">Full Name</label>
									<input type="text" class="form-control" id="review-name" required>
									<div class="valid-feedback">
										Looks good!
									</div>
									<div class="invalid-feedback">
										Your name is required.
									</div>
								</div>
							</div>
						</div>
						<div class="form-group">
							<div class="form-row">
								<div class="col-md-12">
									<label for="review-email">Email(Not Published)</label>
									<input type="email" class="form-control" id="review-email" required>
									<div class="valid-feedback">
										Looks good!
									</div>
									<div class="invalid-feedback">
										A valid email is required.
									</div>
								</div>
							</div>
						</div>
						<div class="form-group">
							<div class="form-row">
								<div class="col-md-12">
									<label for="review-rating">Rating</label>
									<input type="number" class="form-control" id="review-rating" min="1" max="5" placeholder="1 to 5" required>
									<div class="valid-feedback">
										Looks good!
									</div>
									<div class="invalid-feedback">
										A rating between 1 and 5 must be entered.
									</div>
								</div>
							</div>
						</div>
						<div class="form-group">
							<div class="form-row">
								<div class="col-md-12">
									<label for="review-content">Your Review</label>
									<textarea class="form-control" id="review-content" rows="4" required></textarea>
									<div class="valid-feedback">
										Looks good!
									</div>
									<div class="invalid-feedback">
										Your review is required.
									</div>
								</div>
							</div>
						</div>
						<div class="captcha-container">
							<div class="g-recaptcha" data-callback="userReviewClientFormCaptchaCallback" data-theme="light"  data-sitekey="6LccjL4UAAAAAJAHAWjebiNA4_A0fPcHvxO-BG-b"></div>
							<div class="bad-captcha">
								Captcha is required
							</div>
						</div>
					</div>

				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
					<button type="submit" class="btn btn-primary">Submit</button>
				</div>
			</form>
		</div>
	</div>
</div>
