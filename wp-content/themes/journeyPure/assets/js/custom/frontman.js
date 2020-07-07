// Frontman integration

$(document).ready(function () {

	// Add hidden button HTML to the body
	var html = '<a class="mr-btn-wrapper-jp-text hide" href="tel:1-844-505-4799"><div class="mr-btn-wrapper-jp-text-top">Get Help Now!</div><div class="mr-btn-wrapper-jp-text-bottom"><i class="fas fa-phone-alt"></i> (844) 505-4799</div></a>';
	jQuery('body').append(html);

	// IE
	if (navigator.userAgent.indexOf('MSIE') !== -1 || navigator.userAgent.indexOf('Trident') !== -1) {
		jQuery('.mr-btn-wrapper-jp-text').addClass('msie');
	}

	// Show the button HTML as soon the external API sends a "widget_wakeup_signal" message to the window
	// window.addEventListener('message', function(e) {
	// 	if ('widget_wakeup_signal' === e.data.type) {
			jQuery('.mr-btn-wrapper-jp-text').removeClass('hide');
	// 	}
	// });

	// On button click on desktop, shows the chat modal
	jQuery(document).on('click', '.mr-btn-wrapper-jp-text', function(e) {
		if (window.innerWidth >= 768) {
			e.preventDefault();

			if (jQuery('.mr-btn-wrapper').length > 0) {
				jQuery('.mr-btn-wrapper').trigger('click');
			}
		}
	});

});
