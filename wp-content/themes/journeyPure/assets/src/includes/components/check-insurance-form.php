<div class="modal fade main-insurance-form" id="main-insurance-form" tabindex="-1" role="dialog" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header bg-primary ">
				<h5 class="modal-title text-white h5" id="exampleModalLongTitle">Insurance Checker</h5>
				<button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<p>Does your insurance cover treatment? Use the form or call now to find out.<br />(100% confidential)</p>
								
					<ul id="steps"><li class="step one"> Step 1</li><li class="step two"> <span class="text">Step 2</span></li></ul>
					
			<form data-user-form="check-insurance" class="needs-validation" novalidate>
				<div class="modal-body">
						<div class="alert alert-success text-center" style="border-radius: 0" role="alert">
							<h5>Thanks for reaching out!</h5> You'll hear from us right away about your insurance coverage and treatment options. Our locations are usually full, so we don't have to push anyone to come here. We'll take the time to answer your questions and give you a clear price upfront (if you owe anything). 
						</div>
					<div class="part-one">
						<div class="form-group">
							<div class="form-row">
								<div class="col-md-12">
									<input type="text" class="form-control" id="ins-name" placeholder="Your (Full) Name" required>
									<input type="hidden" name="names" class="form-control" id="ins-names" placeholder="Your Name">
									<span class="fa fa-id-card field-icons"></span>
									
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
									<span class="fa fa-phone field-icons"></span>
									
									<div class="invalid-feedback">
										We'll call or text you to confirm your benefits.
									</div>
								</div>
							</div>
						</div>
						<?php /*
						<div class="form-group">
							<div class="form-row">
								<div class="col-md-12">
									<input type="email" class="form-control" id="ins-email" placeholder="Email" required>
			
									<div class="invalid-feedback">
										A valid email is required.
									</div>
								</div>
							</div>
						</div>
 						<?php */ ?>
						<div class="form-group">
							<div class="form-row">
								<div class="col-md-12">
									Who is treatment for?
									<div class="custom-control custom-radio">
										<input type="radio" id="ins-radio-myself" name="ins-treatment-for" value="self"  class="custom-control-input" required>
										<label class="custom-control-label" for="ins-radio-myself">Myself</label>
										
									</div>
									<div class="custom-control custom-radio">
										<input type="radio" id="ins-radio-loved-one" name="ins-treatment-for" value="loved_one" class="custom-control-input" required>
										<label class="custom-control-label" for="ins-radio-loved-one">Loved One</label>
										<div class="invalid-feedback">
											Please check an option.
										</div>
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
										<input for="ins-selfBirthday" type="text" class="form-control" id="ins-selfBirthday" placeholder="Your Birthday XX/XX/XXXX" >
											<span class="fa fa-calendar-alt field-icons"></span>
										<div class="invalid-feedback">
											Your birthday is required by insurance companies.
										</div>
									</div>
								</div>
							</div>
							<div class="form-group">
								<div class="form-row">
									<div class="col-md-12">
										<input type="text" class="form-control" id="ins-insuranceName" placeholder="Insurance Company Name" >
												<span class="fa fa-address-card field-icons"></span>
										<div class="invalid-feedback">
											The name of the insurance company is required.
										</div>
									</div>
								</div>
							</div>
							<div class="form-group">
								<div class="form-row">
									<div class="col-md-12">
										<input type="text" class="form-control" id="ins-yourInsuranceId" placeholder="Your Insurance ID" >
										<span class="fa fa-address-card field-icons"></span>
										<div class="invalid-feedback">
											Your insurance ID is required to check your insurance.
										</div>
									</div>
								</div>
							</div>
							<div class="form-group">
								<div class="form-row">
									<div class="col-md-12">
										<input type="text" class="form-control" id="ins-policyHolderName" placeholder="Policy Holder Name" >
										<span class="fa fa-address-card field-icons"></span>
										<div class="invalid-feedback">
											The name of the policy holder is required to check your insurance.
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
										<span class="fa fa-address-card field-icons"></span>
										<div class="invalid-feedback">
											Their name is required to check their benefits.
										</div>
									</div>
								</div>
							</div>
							<div class="form-group">
								<div class="form-row">
									<div class="col-md-12">
										<input type="text" class="form-control" id="ins-lovedOnesBirthday" placeholder="Their Birthday XX/XX/XXXX" >
										<span class="fa fa-calendar-alt field-icons"></span>
										<div class="invalid-feedback">
											Their birthday is required to check their insurance.
										</div>
									</div>
								</div>
							</div>
							<div class="form-group">
								<div class="form-row">
									<div class="col-md-12">
										<input type="text" class="form-control" id="ins-lovedOneInsurance" placeholder="Your Loved One's Insurance Company" >
										<span class="fa fa-address-card field-icons"></span>
										<div class="invalid-feedback">
											The name of their insurance company is required.
										</div>
									</div>
								</div>
							</div>
							<div class="form-group">
								<div class="form-row">
									<div class="col-md-12">
										<input type="text" class="form-control" id="ins-lovedOneInsuranceId" placeholder="Their Insurance ID" >
										<span class="fa fa-address-card field-icons"></span>
										<div class="invalid-feedback">
											Their insurance ID is required to check their insurance.
										</div>
									</div>
								</div>
							</div>
							<div class="form-group">
								<div class="form-row">
									<div class="col-md-12">
										<input type="text" class="form-control" id="ins-lovedOnePolicyName" placeholder="Name of the Poilicy Holder" >
										<span class="fa fa-address-card field-icons"></span>
										<div class="invalid-feedback">
											The policy holder's name is required.
										</div>
									</div>
								</div>
							</div>
						</div>
						<?php /**
						<div class="captcha-container">
							<div class="g-recaptcha" data-callback="userQuestionClientFormCaptchaCallback" data-theme="light"  data-sitekey="6LccjL4UAAAAAJAHAWjebiNA4_A0fPcHvxO-BG-b"></div>
							<div class="bad-captcha">
								Captcha is required
							</div>
						</div>
 							*/ ?>
					</div>
				</div>
				<div class="modal-footer">
					<button type="submit" class="btn btn-secondary">Next</button>
				</div>
				<div class="bottom-text">
					<p>Have a question about your policy, insurance or treatment? Get answers!</p>
					<a href="tel:8445054799" class="phone">(844) 505-4799</a>
					<p class="specialists"><b>2</b> specialists available now</p>
				</div>

			</form>
		</div>
	</div>
</div>
