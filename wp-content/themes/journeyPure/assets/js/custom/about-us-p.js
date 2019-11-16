$(document).ready(function () {
	aboutUsBioSlider();

	function aboutUsBioSlider() {
		const PAGE_ID = '#about-us';
		const SLIDER = PAGE_ID + ' #about-bio-slider';
		const PREV_BTN = PAGE_ID + " .bio-section .see-less-btn";
		const NEXT_BTN = PAGE_ID + " .bio-section .see-more-btn";
		let slidesLeft;

		if (SLIDER.length > 0) {
			setTimeout(function () {
				$(SLIDER).on('init', function (event, slick) {
					let OriginalSlideTOShow;

					if (slick.originalSettings.responsive[0].settings.slidesToShow && $(window).width() < 768) {
						OriginalSlideTOShow = slick.originalSettings.responsive[0].settings.slidesToShow;
					} else {
						OriginalSlideTOShow = slick.originalSettings.slidesToShow
					}

					slidesLeft = slick.slideCount - OriginalSlideTOShow;
					$(NEXT_BTN).find('data').val(slidesLeft).text(slidesLeft);
				});
				$(SLIDER).slick({
					dots: false,
					centerMode: false,
					arrows: true,
					infinite: false,
					adaptiveHeight: true,
					autoplay: false,
					prevArrow: $(PREV_BTN),
					nextArrow: $(NEXT_BTN),
					responsive: [
						{
							breakpoint: 1200,
							settings: {
								slidesToShow: 2,
							}
						},
						{
							breakpoint: 767,
							settings: {
								slidesToShow: 1,
							}
						},
					],

				}).on('beforeChange', function (event, slick, currentSlide, nextSlide) {

					// Handle slides remaining to show
					let direction;
					if (Math.abs(nextSlide - currentSlide) === 1) {
						direction = (nextSlide - currentSlide > 0) ? "right" : "left";
					} else {
						direction = (nextSlide - currentSlide > 0) ? "left" : "right";
					}
					if (direction === 'right') {
						if (slidesLeft !== 0) {
							slidesLeft--;
						}
					} else {
						slidesLeft++;
					}
					$(NEXT_BTN).find('data').val(slidesLeft).text(slidesLeft);

					// Toggle Prev Button
					if (nextSlide > 0) {
						$(PREV_BTN).addClass('has-more');
					} else {
						$(PREV_BTN).removeClass('has-more');
					}
				});

			}, 600);
		}

	}



	fireEachAboutBioMentionSlide();
	function fireEachAboutBioMentionSlide(){
		if($('#about-us .bio-new-mentions').length > 0){
			$('#about-us .bio-new-mentions').each(function () {
				let thisSide = $(this);
				console.log(thisSide.attr('id'));
				aboutUsMentions(thisSide.attr('id'));
			});
		}

	}

	function aboutUsMentions(slideID) {
		const PAGE_ID = '#about-us';
		const SLIDER = PAGE_ID + ' #' + slideID;
		const PREV_BTN = $(SLIDER).parent().find('.see-less-mentions');
		const NEXT_BTN = $(SLIDER).parent().find('.see-more-mentions');
		let slidesLeft;

		if (SLIDER.length > 0) {
			setTimeout(function () {
				$(SLIDER).on('init', function (event, slick) {
					let OriginalSlideTOShow;

					if (slick.originalSettings.responsive[0].settings.slidesToShow && $(window).width() < 768) {
						OriginalSlideTOShow = slick.originalSettings.responsive[0].settings.slidesToShow;
					} else {
						OriginalSlideTOShow = slick.originalSettings.slidesToShow
					}

					slidesLeft = slick.slideCount - OriginalSlideTOShow;
					NEXT_BTN.find('data').val(slidesLeft).text(slidesLeft);
				});
				$(SLIDER).slick({
					dots: false,
					centerMode: false,
					arrows: true,
					infinite: false,
					adaptiveHeight: true,
					autoplay: false,
					vertical: true,
					verticalSwiping: true,
					prevArrow: PREV_BTN,
					nextArrow: NEXT_BTN,
					responsive: [
						{
							breakpoint: 12,
							settings: {
								slidesToShow: 3,
							}
						}
					],

				}).on('beforeChange', function (event, slick, currentSlide, nextSlide) {

					// Handle slides remaining to show
					let direction;
					if (Math.abs(nextSlide - currentSlide) === 1) {
						direction = (nextSlide - currentSlide > 0) ? "right" : "left";
					} else {
						direction = (nextSlide - currentSlide > 0) ? "left" : "right";
					}
					if (direction === 'right') {
						if (slidesLeft !== 0) {
							slidesLeft--;
						}
					} else {
						slidesLeft++;
					}
					NEXT_BTN.find('data').val(slidesLeft).text(slidesLeft);

					// Toggle Prev Button
					if (nextSlide > 0) {
						PREV_BTN.addClass('has-more');
					} else {
						PREV_BTN.removeClass('has-more');
					}
				});

			}, 600);
		}

	}

	aboutUsMediaSlider('media-con');
	function aboutUsMediaSlider(slideID) {
		const PAGE_ID = '#about-us';
		const SLIDER = PAGE_ID + ' #' + slideID;
		const PREV_BTN = $(SLIDER).parent().find('.see-less-mentions');
		const NEXT_BTN = $(SLIDER).parent().find('.see-more-mentions');
		let slidesLeft;

		if (SLIDER.length > 0) {
			setTimeout(function () {
				$(SLIDER).on('init', function (event, slick) {
					let OriginalSlideTOShow;

					if (slick.originalSettings.responsive[0].settings.slidesToShow && $(window).width() < 768) {
						OriginalSlideTOShow = slick.originalSettings.responsive[0].settings.slidesToShow;
					} else {
						OriginalSlideTOShow = slick.originalSettings.slidesToShow
					}

					slidesLeft = slick.slideCount - OriginalSlideTOShow;
					NEXT_BTN.find('data').val(slidesLeft).text(slidesLeft);
				});
				$(SLIDER).slick({
					dots: false,
					centerMode: false,
					arrows: true,
					infinite: false,
					adaptiveHeight: true,
					autoplay: false,
					prevArrow: PREV_BTN,
					nextArrow: NEXT_BTN,
					responsive: [
						{
							breakpoint: 767,
							settings: {
								slidesToShow: 3,
							}
						}
					],

				}).on('beforeChange', function (event, slick, currentSlide, nextSlide) {

					// Handle slides remaining to show
					let direction;
					if (Math.abs(nextSlide - currentSlide) === 1) {
						direction = (nextSlide - currentSlide > 0) ? "right" : "left";
					} else {
						direction = (nextSlide - currentSlide > 0) ? "left" : "right";
					}
					if (direction === 'right') {
						if (slidesLeft !== 0) {
							slidesLeft--;
						}
					} else {
						slidesLeft++;
					}
					NEXT_BTN.find('data').val(slidesLeft).text(slidesLeft);

					// Toggle Prev Button
					if (nextSlide > 0) {
						PREV_BTN.addClass('has-more');
					} else {
						PREV_BTN.removeClass('has-more');
					}
				});

			}, 600);
		}

	}


});
