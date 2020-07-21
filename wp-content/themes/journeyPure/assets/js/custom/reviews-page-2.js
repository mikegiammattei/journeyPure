
jQuery(document).ready(function () {

	// Videos section
	// On square thumbnail click, replace/play the video on the placeholder

	jQuery(document).on('click', '.jp-reviews-videos-video-image-wrapper', function() {
		const _this = jQuery(this);
		const youtubeId = _this.data('youtube-video-id');
		const image = _this.data('image');
		let placeholder = '.jp-reviews-videos-featured .embed-responsive';
		const html = '<div class="embed-responsive embed-responsive-16by9 youtube-video-place" style="background-image: url(\'' + image + '\')" data-yt-url="https://www.youtube.com/embed/' + youtubeId + '"><span class="play-button"></span></div>';

		jQuery(placeholder).replaceWith(html);

		setTimeout(function() {
			jQuery(placeholder).trigger('click');
		}, 500);
	});

	// Videos section
	// Slider

	const slider = jQuery('.jp-reviews-videos-video-slider');

	slider.each(function() {
		const _this = jQuery(this);
		const prevButton = _this.parent().find('.see-less-btn');
		const nextButton = _this.parent().find('.see-more-btn');
		let slidesLeft;

		_this.on('init', function(event, slick) {
			slidesLeft = slick.slideCount - slick.originalSettings.slidesToShow;
			nextButton.find('data').val(slidesLeft).text(slidesLeft);
		});

		_this.slick({
			dots: false,
			centerMode: false,
			arrows: true,
			infinite: false,
			adaptiveHeight: true,
			autoplay: false,
			prevArrow: prevButton,
			nextArrow: nextButton,
			slidesToShow: 1,
		}).on('beforeChange', function(event, slick, currentSlide, nextSlide) {
			let direction;

			if (Math.abs(nextSlide - currentSlide) === 1) {
				direction = (nextSlide - currentSlide > 0) ? 'right' : 'left';
			} else {
				direction = (nextSlide - currentSlide > 0) ? 'left' : 'right';
			}

			if (direction === 'right') {
				if (slidesLeft !== 0) {
					slidesLeft--;
				}
			} else {
				slidesLeft++;
			}

			nextButton.find('data').val(slidesLeft).text(slidesLeft);

			// Toggle Prev Button
			if (nextSlide > 0) {
				prevButton.addClass('has-more');
			} else {
				prevButton.removeClass('has-more');
			}
		});
	});

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

});
