
$(document).ready(function () {

	setTimeout(function () {
		$.getScript("//130400.tctm.co/t.js");

		// ---

		(function(w, d, s, l, i) {
			w[l] = w[l] || [];
			w[l].push({
				'gtm.start': new Date().getTime(),
				event: 'gtm.js'
			});
			var f = d.getElementsByTagName(s)[0],
				j = d.createElement(s),
				dl = l != 'dataLayer' ? '&l=' + l : '';
			j.async = true;
			j.src = 'https://www.googletagmanager.com/gtm.js?id=' + i + dl;
			f.parentNode.insertBefore(j, f);
		})(window, document, 'script', 'dataLayer', 'GTM-NKJHBM9');

		// ---

		$(".ctm-call-widget").each(function() {
			$(this).attr('src', $(this).data('url-value'));
		});

	}, 2000);

	// CTA Trigger

	let CTA_STATE = false;
	$(document).on('click', '.bottom-cta .drop', function() {
		if (!CTA_STATE) {
			$('.ctm-call-widget-container').append('<iframe class="ctm-call-widget" src="https://app.calltrackingmetrics.com/form_reactors/FRT472ABB2C5B9B141A95E7A133293232FB64726C81D4381AEFF2617EDD86B68F50" style="width:100%;height:300px;border:none"></iframe>')
			CTA_STATE = true;
		}
	});

	// ---

	$(document).on('click', '.youtube-video-place', function() {
		let thisVidUrl = $(this);
		console.log('test', thisVidUrl);
		thisVidUrl.html('<iframe allowfullscreen allow="autoplay; encrypted-media" frameborder="0" class="embed-responsive-item" src="' + thisVidUrl.data('yt-url') + '?rel=0&showinfo=0&autoplay=1&cc_load_policy=1"></iframe>');
		thisVidUrl.addClass('playing');
	});

	// ---

	$(document).on('click', '.video-cta', function() {
		let thisTrigger = $(this);
		let thisVideContainerId = thisTrigger.data('target');
		$(thisVideContainerId).find('.youtube-video-place').trigger('click');
	});

	// If there is an image inside a slick slider, on image load, resize the slider height

	jQuery('img.lazy').each(function() {
		this.onload = function() {
			var slider = jQuery(this).closest('.slick-slider.slick-initialized');

			if (slider.length > 0) {
				slider.slick('setPosition');
			}
		};
	});

	// Reviews modal
	// (ON HOLD THIS CHANGE)

	// jQuery('.ratings[class*="source-"][class*="-google"]').each(function() {
	// 	jQuery(this).attr('data-toggle', 'modal').attr('data-target', '#reviews-modal');
	// });

});
