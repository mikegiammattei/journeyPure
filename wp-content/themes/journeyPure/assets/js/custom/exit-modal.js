
if(!Cookies.get('exitModal')){
	Cookies.set('exitModal', 'enabled', { expires: 14 });

}

$(window).on('resize',function(){
	if(Cookies.get('exitModal') === 'enabled' && $(window).width() > 600){
		mg_center_el('.jp-exit-modal','.jp-exit-modal .inner');
	}
	if(Cookies.get('exitModal') === 'enabled' && $(window).width() < 600){
		/** Remove exit modal */
		$('.exit-overlay').remove();
		$('.jp-exit-modal').hide();
	}
});

// Show the insurance exit modal if the user has left the site and has not filled out the form in the past 30 days.

setTimeout(function () {

	$("html").bind("mouseleave", function () {
		if(Cookies.get('exitModal') === 'enabled' && $(window).width() > 600) {
			mg_center_el('.jp-exit-modal', '.jp-exit-modal .inner');
			$("html").unbind("mouseleave");
		}
	});

}, 9*1000);


function mg_center_el(outerDiv, innerDiv){
	var outerBox = outerDiv;
	var innerBox = innerDiv;
	var startHeight = startHeight;
	var overflowEl = '.exit-overlay';
	var win = $(window);
	var heightVariance = win.outerHeight() - $(outerBox).outerHeight();
	var marginValue = heightVariance / 2;
	var fullHeight = Math.floor($(outerBox).outerHeight() + 30);

	/** Create the overlay */
	if($('.exit-overlay').length === 0 && $('.jp-exit-modal').length > 0){
		$('body').prepend('<div class="exit-overlay"></div>');
	}
	/** Show the exit modal*/
	$(overflowEl).fadeIn(300,function(){
		$(outerBox).fadeIn(100);
	});

	if(win.outerHeight() >= $(outerBox).outerHeight()){
		/** Set the top position of the element. */
		$(outerBox).css({'top' : Math.floor(marginValue)+'px'});
	}else{
		$(outerBox).css({'position':  'absolute', 'top' : '15px'});
		$('.Content').css({'height':  fullHeight + 'px'});
	}

	// Click to close.
	$('[data-exit-item="close"]').add(overflowEl).on('click',function(){
		var $thisClose = $(this);
		$(overflowEl).add(outerBox).fadeOut(500);
		$('.Content').removeAttr('style');

		/** Disable the exit modal from showing up for 30 days. */
		Cookies.set('exitModal', 'disabled', { expires: 30 });
	});
}
