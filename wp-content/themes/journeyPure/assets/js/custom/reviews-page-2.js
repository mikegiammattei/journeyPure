
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

	const slider = jQuery('.jp-reviews-videos-video-slider, .jp-homepage-videos-video-slider');

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

});
