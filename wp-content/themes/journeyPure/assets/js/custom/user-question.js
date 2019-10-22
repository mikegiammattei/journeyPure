userQuestionClientForm();

function userQuestionClientFormCaptchaCallback(){
	$('.bad-captcha').removeClass('invalid');
}
function userQuestionClientForm(){
	if($('[data-user-form="ask question"]').length > 0){

	let formEl = $('[data-user-form="ask question"]');

	$(formEl).find('.alert').css({"display": "none"});

	formEl.on('click',function () {
		if($(formEl).find('.alert').length > 0 && $(formEl).find('.alert').hasClass('up')){
			$(formEl).find('.alert').slideUp(500).removeClass('up');
		}
	});

	formEl.on('submit',function (event) {
		event.preventDefault();
		event.stopPropagation();

		let thisForm = $(this);

		// Execute Validation
		if( thisForm[0].checkValidity() !== false){

			// Validation was good check captcha
			let response = grecaptcha.getResponse();
			if(response.length === 0){
				thisForm.find('.bad-captcha').addClass('invalid');
			}else {
				thisForm.find('.bad-captcha').removeClass('invalid');

				$.ajax({
					method: "POST",
					url: jp_rest_details.rest_url + 'wp/v2/user-question-api',
					data: {
						title: jp_rest_details.current_date + ' - Question',
						content: thisForm.find('#question').val(),
						type: 'post',
						status: 'publish',
					},
					dataType: 'json',
					beforeSend: function ( xhr ) {
						xhr.setRequestHeader( 'X-WP-Nonce', jp_rest_details.nonce );
					},
					success : function( response ) {

						let newPostID = response.id;


						thisForm[0].reset();
						thisForm.removeClass('was-validated');
						$(formEl).find('.alert').slideDown(500).addClass('up');

						grecaptcha.reset();
						// Save the page ID in case you need it for something


					}
				});
			}
		}else {

		}
		thisForm.addClass('was-validated');


	});




}

}
