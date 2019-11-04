writeAReview();
function userReviewClientFormCaptchaCallback(){
	$('[data-user-form="leave-a-review"] .bad-captcha').removeClass('invalid');
}
function writeAReview(){
	if($('[data-user-form="leave-a-review"]').length > 0){

		let formEl = $('[data-user-form="leave-a-review"]');

		$(formEl).find('.alert').css({"display": "none"});

		formEl.on('click',function () {
			if($(formEl).find('.alert').length > 0 && $(formEl).find('.alert').hasClass('up')){
				$(formEl).find('.alert').slideUp(500).removeClass('up');
			}
		});

		function formatOutput(thisForm){
			let output = "";
				output += "Visitor's Review Data <br>";
				output += "-------------------------------- <br>";
				output += "<strong>Name: </strong>" + thisForm.find('#review-name').val() + "<br>";
				output += "<strong>Email: </strong>" + thisForm.find('#review-email').val() + "<br>";
				output += "<strong>Rating: </strong> " + thisForm.find('#review-rating').val() + "<br>";
				output += "<strong>Review:</strong> " + thisForm.find('#review-content').val() + "<br>";
				output += "-------------------------------- <br>";
			return output;
		}

		formEl.on('submit',function (event) {
			event.preventDefault();
			event.stopPropagation();

			let thisForm = $(this);

			// Run validation
			thisForm.addClass('was-validated');

			// Execute Validation
			if( thisForm[0].checkValidity() !== false){

				// Validation was good check captcha
				let response = grecaptcha.getResponse();

				$.ajax({
					method: "POST",
					url: jp_rest_details.rest_url + 'wp/v2/user-reviews-api',
					data: {
						title: jp_rest_details.current_date + ' - User Review',
						content: formatOutput(thisForm),
						type: 'post',
						status: 'publish',
					},
					dataType: 'html',
					beforeSend: function ( xhr ) {
						xhr.setRequestHeader( 'X-WP-Nonce', jp_rest_details.nonce );
					},
					success : function( response ) {
						let newPostID = response.id;

						thisForm.find('.part-one').slideUp(400);
						thisForm[0].reset();
						thisForm.removeClass('was-validated');
						thisForm.find('.alert').slideDown(500).addClass('up');

						grecaptcha.reset();
						// Save the page ID in case you need it for something

						thisForm.find('[type="submit"]').fadeOut(400);

					}
				});

				/*if(response.length === 0){
					thisForm.find('.bad-captcha').addClass('invalid');
				}else {
					thisForm.find('.bad-captcha').removeClass('invalid');

					//  Had Ajax here after captcha is fixed
				}*/
			}

		});

	}
}
