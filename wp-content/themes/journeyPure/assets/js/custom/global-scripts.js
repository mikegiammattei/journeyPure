
$(document).ready(function () {

	setTimeout(function () {
		if (window.JP_IS_BOT === false) {
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

			$('.ctm-call-widget, .iframe-to-load').each(function() {
				$(this).attr('src', $(this).data('url-value'));
			});
		}
	}, 2000);

	// Workaround for localhost with no cache plugin installed

	if (document.location.host === 'localhost:2022') {
		jQuery('img.lazy').each(function() {
			var _this = jQuery(this);
			var imageUrl = _this.data('src');
			if (/^\/wp-/gi.test(imageUrl)) {
				var imageUrl = 'https://journeypure.com' + imageUrl;
			}
			if (imageUrl) {
				_this.attr('src', imageUrl);
				_this.addClass('loaded');
			}
		});
		jQuery('div.lazy, section.lazy').each(function() {
			var _this = jQuery(this);
			var imageUrl = _this.data('src');
			if (/^\/wp-/gi.test(imageUrl)) {
				var imageUrl = 'https://journeypure.com' + imageUrl;
			}
			if (imageUrl) {
				_this.attr('style', "background-image: url('" + imageUrl + "')");
				_this.addClass('loaded');
			}
		});
	}

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

	// ---

	// Reviews section
	// Read more

	jQuery(document).on('click', '.jp-reviews-reviews-review-text-more', function() {
		const _this = jQuery(this);
		const shortText = _this.closest('.jp-reviews-reviews-review-text');
		const longText = shortText.next('.jp-reviews-reviews-review-text');

		shortText.addClass('hide');
		longText.removeClass('hide');
	});

	// Reviews section
	// Load more items

	jQuery(document).on('click', '.jp-reviews-reviews-loading-button', function() {
		window.reviewsLoadItems(false);
	});

	jQuery(document).on('change', '.jp-reviews-reviews-filter #sort', function() {
		window.reviewsLoadItems(true);
	});

	jQuery('.jp-reviews-reviews-reviews').on('scroll', function() {
		// Only desktop
		if (jQuery(window).width() >= 1024) {
			const _this = jQuery(this);

			if (_this.scrollTop() + _this.innerHeight() >= this.scrollHeight) {
				window.reviewsLoadItems(false);
			}
		}
	});

	window.reviewsLoadItems = function(reset) {
		const box = jQuery('.jp-reviews-reviews-box');
		const placeholder = jQuery('.jp-reviews-reviews-reviews-inner');

		box.addClass('loading');

		let page = parseInt(box.data('page')) + 1;
		let sort = jQuery('#sort').val();
		let cat = box.data('cat');
		let url = box.data('url');
		let nonce = box.data('nonce');

		let documentScroll = jQuery(document).scrollTop();
		let placeholderScroll = placeholder.parent().scrollTop();

		if (reset) {
			page = 1;
			placeholderScroll = 0;
		}

		jQuery.post(url, {
			'action': 'get_reviews',
			'nonce': nonce,
			'page': page,
			'sort': sort,
			'cat': cat,
		}, function(html) {
			if (html != '') {
				// Insert HTML
				if (reset) {
					placeholder.html(html);
				} else {
					placeholder.append(html);
				}

				// Fix scroll
				jQuery(document).scrollTop(documentScroll);
				placeholder.parent().scrollTop(placeholderScroll);

				// Trigger lazy load images (W3 Total Cache)
				if (typeof window.w3tc_lazyload !== 'undefined') {
					window.w3tc_lazyload.update();
				}

				// Trigger tooltips (Bootstrap)
				placeholder.find('[data-toggle="tooltip"]').tooltip();

				// Update data
				box.data('page', page);
			} else {
				box.removeClass('done');
			}
		})
		.always(function() {
			box.removeClass('loading');
		});
	};

	// Modals
	// Remove the youtube iframe always the modal closes

	jQuery('.modal').on('hidden.bs.modal', function() {
		var _this = jQuery(this);
		_this.find('.youtube-video-place').removeClass('playing').html('');
	});

});
