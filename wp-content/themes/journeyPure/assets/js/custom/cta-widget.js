cta_widget();

function cta_widget() {

	// CTM implementation code block
	const ctm_frame = jQuery("iframe[src*='https://130400.tctm.co/form/FRT472ABB2C5B9B141A95E7A133293232FBB3EFEC59E103154BC3C3A194C8DE5FD3.html']").get(0);

	jQuery(ctm_frame).on('load', function(){
		ctm_frame.contentWindow.postMessage(window.JSON.stringify({action: 'showForm'}), ctm_frame.src);

	});

	const parentClass = '.cta-widget';

	const cta = {
		el : jQuery(parentClass),
		close : jQuery(parentClass).find('.close-btn'),
		info : jQuery(parentClass).find('.info'),
		callout : jQuery(parentClass).find('.callout'),
		open : jQuery(parentClass).find('.callout')
	};



	// Update callout width
	setTimeout(function () {
		//cta.callout.css({'width' : cta.el.outerWidth() + 'px'});
	},500);

	jQuery(window).on('resize',function () {
		cta.callout.css({'width' : cta.el.outerWidth() + 'px','left': '-2px'});
	});

	const startHtml = cta.callout.html();
	const afterHtml = '<i class="fas fa-comments"></i>';

	jQuery('html').on('click', '.close-btn',function () {

		let lowerAmount;

		if(jQuery('.local-msg').length > 0){
			lowerAmount = (cta.el.outerHeight()) + (cta.el.find('.local-msg').outerHeight());
		}else{
			lowerAmount = (cta.el.outerHeight());
		}

		jQuery('.callout').fadeOut( function () {
			//cta.callout.html(afterHtml);
		}).addClass('on');
	});

	cta.open.on('click', 'i', function () {
		if(cta.el.hasClass('on')){

			cta.el.animate({'bottom' : '0px'},400, function () {
				cta.callout.html(startHtml);
			}).removeClass('on');

		}
	});
}
