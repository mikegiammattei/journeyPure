checkInsurance();

function userQuestionClientFormCaptchaCallback(){
	$('.bad-captcha').removeClass('invalid');
}
function checkInsurance(){
	if($('[data-user-form="check-insurance"]').length > 0){

		let formState = 1;
		let formEl = $('[data-user-form="check-insurance"]');

		$(formEl).find('.alert').css({"display": "none"});

		formEl.on('click',function () {
			if($(formEl).find('.alert').length > 0 && $(formEl).find('.alert').hasClass('up')){
				$(formEl).find('.alert').slideUp(500).removeClass('up');
			}
		});

		function totalRequiredPart1(thisForm){
			let returnValue = 0;

			returnValue = thisForm.find('.part-one .form-control:invalid').length;
			returnValue += thisForm.find('.part-one .custom-control-input:invalid').length;


			return returnValue;
		}
		function addRequiredToInputs(thisForm,treatmentForState){
			if(treatmentForState === 'self'){
				thisForm.find('.part-two .self input').each(function () {
					$(this).prop('required',true);
				});
			}else if('loved_on'){
				thisForm.find('.part-two .loved-one input').each(function () {
					$(this).prop('required',true);
				});
			}
		}
		function formatOutput(thisForm,treatmentForState){
			let output = "";

			if(treatmentForState === 'self') {
				output += "Visitor's Info <br>";
				output += "-------------------------------- <br>";
				output += "<strong>Name: </strong>" + thisForm.find('#ins-name').val() + "<br>";
				output += "<strong>Phone: </strong>" + thisForm.find('#ins-phone').val() + "<br>";
				//output += "<strong>Email: </strong>" + thisForm.find('#ins-email').val() + "<br>";
				output += "<strong>Treatment For:</strong>  Self<br>";
				output += "<strong>Birthday: </strong> " + thisForm.find('#ins-selfBirthday').val() + "<br>";
				output += "<strong>Insurance Company:</strong> " + thisForm.find('#ins-insuranceName').val() + "<br>";
				output += "<strong>Insurance ID:</strong> " + thisForm.find('#ins-yourInsuranceId').val() + "<br>";;
				output += "<strong>Policy Holder Name:</strong> "  + thisForm.find('#ins-policyHolderName').val() + "<br>";
				output += "-------------------------------- <br>";

				__ctm.form.track('app.calltrackingmetrics.com', // the capture host
					'FRT472ABB2C5B9B141A95E7A133293232FB808526BF6B6AB4DD086108422F536032', // this FormReactor
					'8448999541',
					{
						country_code: "1", // the expected country code e.g. +1, +44, +55, +61, etc... the plus is excluded
						name: thisForm.find('#ins-name').val() ,
						phone: thisForm.find('#ins-phone').val(),
						email: "pass the lead email address here (optional)",
						custom: {
							"treatment_for": "Self",
							"user_b_day": thisForm.find('#ins-selfBirthday').val(),
							"insurance_company_name": thisForm.find('#ins-insuranceName').val(),
							"insurance_id": thisForm.find('#ins-yourInsuranceId').val(),
							"policy_holder_name": thisForm.find('#ins-policyHolderName').val()
						}
					});

			} else if('loved_on'){
				output += "Visitor's Info <br>";
				output += "-------------------------------- <br>";
				output += "<strong>Name:</strong> " + thisForm.find('#ins-name').val() + "<br>";
				output += "<strong>Phone:</strong> " + thisForm.find('#ins-name').val() + "<br>";
				//output += "<strong>Email:</strong> " + thisForm.find('#ins-email').val() + "<br>";
				output += "<strong>Treatment For: Loved One</strong> <br>";
				output += "-------------------------------- <br><br>";
				output += "Loved One's Info <br>";
				output += "-------------------------------- <br>";
				output += "<strong>Name: </strong>" + thisForm.find('#ins-lovedOneName').val() + "<br>";
				output += "<strong>Birthday: </strong>" + thisForm.find('#ins-lovedOnesBirthday').val() + "<br>";
				output += "<strong>Insurance Company:</strong>" + thisForm.find('#ins-lovedOneInsurance').val() + "<br>";
				output += "<strong>Insurance ID:</strong>" + thisForm.find('#ins-lovedOneInsuranceId').val() + "<br>";
				output += "<strong>Policy Holder Name:</strong>" + thisForm.find('#ins-lovedOnePolicyName').val() + "<br>";
				output += "-------------------------------- <br>";

				__ctm.form.track('app.calltrackingmetrics.com', // the capture host
					'FRT472ABB2C5B9B141A95E7A133293232FBE48796C1A711F71C48458D5D158AF9D0', // this FormReactor
					'8448999541',
					{
						country_code: "1", // the expected country code e.g. +1, +44, +55, +61, etc... the plus is excluded
						name: thisForm.find('#ins-name').val(),
						phone: thisForm.find('#ins-phone').val(),
						email: "pass the lead email address here (optional)",
						custom: {
							"treatment_for": "Loved One",
							"loved_one_name": thisForm.find('#ins-lovedOneName').val(),
							"loved_one_b_day": thisForm.find('#ins-lovedOnesBirthday').val(),
							"loved_one_insurance_company": thisForm.find('#ins-lovedOneInsurance').val(),
							"loved_one_insurance_id": thisForm.find('#ins-lovedOneInsuranceId').val(),
							"loved_one_policy_holder": thisForm.find('#ins-lovedOnePolicyName').val()
						}
					});
			}
			return output;
		}

		formEl.on('submit',function (event) {
			event.preventDefault();
			event.stopPropagation();

			let thisForm = $(this);


			// Run validation
			thisForm.addClass('was-validated');

			// Process form per form section
			switch (formState) {
				case 1 :

					if(totalRequiredPart1(thisForm) === 0){

						// The treatment for radio value
						let treatmentFor = thisForm.find('[name="ins-treatment-for"]:checked').val();

						addRequiredToInputs(thisForm,treatmentFor);
						thisForm.find('.step.two').addClass('on');

						// Update the form state for part 2
						formState = 2;

						// Reset Validation to move to next form part with no errors.
						thisForm.removeClass('was-validated');

						thisForm.find('.part-one').slideUp(400);
						thisForm.find('.part-two').slideDown(400);
						// Toggle the form either a version for self or for loved one;
						if(treatmentFor === 'self'){
							thisForm.find('.part-two .self').css({'display' : 'block'});
						}else {
							thisForm.find('.part-two .loved-one').css({'display' : 'block'});
						}

						thisForm.find('[type="submit"]').text("Submit");
					}
				break;
				case 2 :
					// Execute Validation
					if( thisForm[0].checkValidity() !== false){

						// Validation was good check captcha
						/*let response = grecaptcha.getResponse();
						if(response.length === 0){
							thisForm.find('.bad-captcha').addClass('invalid');
						}else {*/
							thisForm.find('.bad-captcha').removeClass('invalid');

							let formData = {
									content: formatOutput(thisForm, thisForm.find('[name="ins-treatment-for"]:checked').val()),

							};
							if(thisForm.find('[name="names"]').val() === ""){
								$.post('/wp-admin/admin-ajax.php', {'action' : 'insurance_form_action_hok', data: formData},function (response) {

									if(response === "Success"){
										thisForm.find('.part-two').slideUp(400);
										thisForm[0].reset();
										thisForm.removeClass('was-validated');
										thisForm.find('.alert').slideDown(500).addClass('up');
										thisForm.find('[type="submit"]').fadeOut(400);
									}

								});

							}else{
								alert("Don't try to hack us");
							}
							/*$.ajax({
								method: "POST",
								url: jp_rest_details.rest_url + 'wp/v2/forms-api',
								data: {
									title: jp_rest_details.current_date + ' - Submission',
									content: formatOutput(thisForm, thisForm.find('[name="ins-treatment-for"]:checked').val()),
									type: 'post',
									status: 'publish',
								},
								dataType: 'html',
								beforeSend: function ( xhr ) {
									xhr.setRequestHeader( 'X-WP-Nonce', jp_rest_details.nonce );
								},
								success : function( response ) {
									let newPostID = response.id;

									thisForm.find('.part-two').slideUp(400);
									thisForm[0].reset();
									thisForm.removeClass('was-validated');
									thisForm.find('.alert').slideDown(500).addClass('up');

									grecaptcha.reset();
									// Save the page ID in case you need it for something

									thisForm.find('[type="submit"]').fadeOut(400);

								}
							});*/
						}
					/*}*/
				break;
			}


		});

	}
}
