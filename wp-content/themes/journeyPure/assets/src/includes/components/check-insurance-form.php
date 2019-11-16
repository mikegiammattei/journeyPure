<div class="modal fade main-insurance-form" id="main-insurance-form" tabindex="-1" role="dialog" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header bg-primary ">
				<h5 class="modal-title text-white" id="exampleModalLongTitle">Insurance Checker</h5>
				<button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<p>Does your insurance cover treatment? Use the form or call now to find out.<br />(100% confidential)</p>
			<form data-user-form="check-insurance" class="needs-validation" novalidate>
				<div class="modal-body">
						<div class="alert alert-success text-center" style="border-radius: 0" role="alert">
							<strong>Congrats on reaching out!</strong><br> The admissions team will get back to you right away.
						</div>
					<div class="part-one">
						<div class="form-group">
							<div class="form-row">
								<div class="col-md-12">
									<input type="text" class="form-control" id="ins-name" placeholder="Your (Full) name" required>
									<div class="valid-feedback">
										Looks good!
									</div>
									<div class="invalid-feedback">
										Opps, can you fill in your name?
									</div>
								</div>
							</div>
						</div>
						<div class="form-group">
							<div class="form-row">
								<div class="col-md-12">
									<input type="text" class="form-control" id="ins-phone" placeholder="Your Phone" required>
									<div class="valid-feedback">
										Looks good!
									</div>
									<div class="invalid-feedback">
										We'll call or text you to confirm your benefits.
									</div>
								</div>
							</div>
						</div>
						<div class="form-group">
							<div class="form-row">
								<div class="col-md-12">
									<input type="email" class="form-control" id="ins-email" placeholder="Email" required>
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
									<small>Who is treatment for?</small>
									<div class="custom-control custom-radio">
										<input type="radio" id="ins-radio-myself" name="ins-treatment-for" value="self"  class="custom-control-input" required>
										<label class="custom-control-label" for="ins-radio-myself">Myself</label>
										<div class="invalid-feedback">
											Please check an option
										</div>
									</div>
									<div class="custom-control custom-radio">
										<input type="radio" id="ins-radio-loved-one" name="ins-treatment-for" value="loved_one" class="custom-control-input" required>
										<label class="custom-control-label" for="ins-radio-loved-one">Loved One</label>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="part-two">
						<div class="self" style="display: none;">
							<div class="form-group">
								<div class="form-row">
									<div class="col-md-12">
										<label>Your Birthday</label>
										<input for="ins-selfBirthday" type="text" class="form-control" id="ins-selfBirthday" placeholder="xx/xx/xxxx" >
										<div class="valid-feedback">
											Looks good!
										</div>
										<div class="invalid-feedback">
											Your DOB is required.
										</div>
									</div>
								</div>
							</div>
							<div class="form-group">
								<div class="form-row">
									<div class="col-md-12">
										<input type="text" class="form-control" id="ins-insuranceName" placeholder="Insurance Company Name" >
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
										<input type="text" class="form-control" id="ins-yourInsuranceId" placeholder="Your Insurance ID" >
										<div class="valid-feedback">
											Looks good!
										</div>
										<div class="invalid-feedback">
											Field required.
										</div>
									</div>
								</div>
							</div>
							<div class="form-group">
								<div class="form-row">
									<div class="col-md-12">
										<input type="text" class="form-control" id="ins-policyHolderName" placeholder="Policy Holder Name" >
										<div class="valid-feedback">
											Looks good!
										</div>
										<div class="invalid-feedback">
											Your name is required.
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="loved-one">
							<div class="form-group">
								<div class="form-row">
									<div class="col-md-12">
										<input type="text" class="form-control" id="ins-lovedOneName" placeholder="Your Loved One's Name" >
										<div class="valid-feedback">
											Looks good!
										</div>
										<div class="invalid-feedback">
											Field required.
										</div>
									</div>
								</div>
							</div>
							<div class="form-group">
								<div class="form-row">
									<div class="col-md-12">
										<label for="lovedOnesBirthday">Your Loved One's Birthday</label>
										<input type="text" class="form-control" id="ins-lovedOnesBirthday" placeholder="xx/xx/xxxx" >
										<div class="valid-feedback">
											Looks good!
										</div>
										<div class="invalid-feedback">
											Field required.
										</div>
									</div>
								</div>
							</div>
							<div class="form-group">
								<div class="form-row">
									<div class="col-md-12">
										<input type="text" class="form-control" id="ins-lovedOneInsurance" placeholder="Your Loved One's Insurance" >
										<div class="valid-feedback">
											Looks good!
										</div>
										<div class="invalid-feedback">
											Field required.
										</div>
									</div>
								</div>
							</div>
							<div class="form-group">
								<div class="form-row">
									<div class="col-md-12">
										<input type="text" class="form-control" id="ins-lovedOneInsuranceId" placeholder="Your Loved One's Insurance ID" >
										<div class="valid-feedback">
											Looks good!
										</div>
										<div class="invalid-feedback">
											Field required.
										</div>
									</div>
								</div>
							</div>
							<div class="form-group">
								<div class="form-row">
									<div class="col-md-12">
										<input type="text" class="form-control" id="ins-lovedOnePolicyName" placeholder="Your Loved One's Policy Holder Name:" >
										<div class="valid-feedback">
											Looks good!
										</div>
										<div class="invalid-feedback">
											Field required.
										</div>
									</div>
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
				</div>
				<div class="modal-footer">
					<button type="submit" class="btn btn-secondary">Next</button>
				</div>
					<div class="bottom-text">
					<ul id="steps"><li class="step one on"> Step 1</li><li class="step two"> <span class="text">Step 2</span></li></ul>
					<p>Have a question about your policy, insurance or treatment? Get answers now.</p>
					<a href="tel:8445054799" class="phone">(844) 505-4799</a>
					<p><b>2</b> specialists available now</p>
				</div>
			</form>
		</div>
	</div>
</div>
