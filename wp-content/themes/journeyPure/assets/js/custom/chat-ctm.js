
$(document).ready(function(){
	$("#chat-ctm-btn").on('click', function () {
		$('.ctm-chat-widget').fadeToggle(400);
		$('.callout').fadeToggle(400);
		$('#icon-chat').trigger('click');
	});
});


