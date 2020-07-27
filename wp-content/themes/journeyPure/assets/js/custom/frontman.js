// Frontman integration

jQuery(document).ready(function () {

	// Add hidden button HTML to the body
	var html = '<a class="mr-btn-wrapper-jp-text hide" href="tel:1-844-505-4799"><div class="mr-btn-wrapper-jp-text-top">Get Help Now!</div><div class="mr-btn-wrapper-jp-text-bottom"><i class="fas fa-phone-alt"></i><span class="call"> Call</span> (844) 505-4799</div></a>';

	if (!jQuery('body').hasClass('page-template-template-virtual-rehab')) {
		jQuery('body').append(html);
	}

	// IE
	if (navigator.userAgent.indexOf('MSIE') !== -1 || navigator.userAgent.indexOf('Trident') !== -1) {
		jQuery('.mr-btn-wrapper-jp-text').addClass('msie');
	}

	// Only when the chat widget is ready/loaded
	// window.addEventListener('message', function(e) {
	// 	if ('signal' === e.data.type) {
			// Show the button HTML as soon the external API sends a "signal" message to the window
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

	// Only when the chat widget is ready/loaded
	// window.addEventListener('message', function(e) {
	// 	if ('signal' === e.data.type) {
			// Not IE
			if (navigator.userAgent.indexOf('MSIE') === -1 && navigator.userAgent.indexOf('Trident') === -1) {
				// Make all the Insurances CTA open the new chat instead
				jQuery('[data-toggle="modal"][data-target="#main-insurance-form"]').each(function() {
					jQuery(this).removeAttr('data-toggle').removeAttr('data-target').addClass('frontman-cta-insurance');
				});
			}

			// On CTA click, shows the chat modal with the Insurance tab open
			jQuery(document).on('click', '.frontman-cta-insurance', function(e) {
				e.preventDefault();
				document.location.hash = '#Insurance';

				var customButton = jQuery('.mr-btn-wrapper');
				if (customButton.length > 0) {
					customButton.trigger('click');
				}

				var chatIframe = jQuery('#makerobos_chat');
				if (chatIframe.length > 0) {
					chatIframe.attr('src', chatIframe.attr('src'));
				}
			});
		// 	}
	// });

});
