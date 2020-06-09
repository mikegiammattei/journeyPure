$(document).ready(function () {

	if($(window).width() < 767) {
		$('#chat-ctm-btn').on('click',function () {
			location.href = 'sms:+18445054799';
		});

	}
});
