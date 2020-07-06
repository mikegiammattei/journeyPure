/**
 * OP CTP
 *
 * @author   Fernando Tessmann
 * @package  JourneyPure
 */

// OP CTP template

if ($('#jp-op').length > 0) {
	// Section Bios

	var slider = $('.bio-slider');
	var prev_btn = $('.bio-section .see-less-btn');
	var next_btn = $('.bio-section .see-more-btn');
	var slides_left;

	if (slider.length > 0) {
		setTimeout(function() {
			$(slider).on('init', function(event, slick) {
				var original_slide_to_show;

				if (slick.originalSettings.responsive[0].settings.slidesToShow && $(window).width() < 768) {
					original_slide_to_show = slick.originalSettings.responsive[0].settings.slidesToShow;
				} else {
					original_slide_to_show = slick.originalSettings.slidesToShow
				}

				slides_left = slick.slideCount - original_slide_to_show;
				next_btn.find('data').val(slides_left).text(slides_left);
			});

			$(slider).slick({
				dots: false,
				centerMode: false,
				arrows: true,
				infinite: false,
				adaptiveHeight: true,
				autoplay: false,
				prevArrow: prev_btn,
				nextArrow: next_btn,
				responsive: [
					{
						breakpoint: 768,
						settings: {
							slidesToShow: 2,
						}
					}
				],
			}).on('beforeChange', function(event, slick, current_slide, next_slide) {
				// Handle slides remaining to show
				var direction;

				if (Math.abs(next_slide - current_slide) === 1) {
					direction = (next_slide - current_slide > 0) ? 'right' : 'left';
				} else {
					direction = (next_slide - current_slide > 0) ? 'left' : 'right';
				}

				if (direction === 'right') {
					if (slides_left !== 0) {
						slides_left--;
					}
				} else {
					slides_left++;
				}

				next_btn.find('data').val(slides_left).text(slides_left);

				// Toggle Prev Button
				if (next_slide > 0) {
					prev_btn.addClass('has-more');
				}else {
					prev_btn.removeClass('has-more');
				}
			});
		}, 600);
	}
}
