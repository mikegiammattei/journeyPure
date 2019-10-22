homepage();
function homepage() {
	const pageId = '#homepage';
	if($(pageId).length > 0){

		const SLIDER  = $(pageId + " #homepage-above-fold-slider");
		const SLIDER2  = $(pageId + " #homepage-multi-gallery");

		$(document).ready(function () {
			SLIDER.on('init', function(event, slick, currentSlide, nextSlide){
				SLIDER.find('.slick-slide').each(function () {
					let thisSlide = $(this);
					let thisSlideImgEl = thisSlide.find('.slide-item .slide-img');
					let thisSlideDataImg = thisSlideImgEl.data('base-img');

					thisSlideImgEl.css({'background-image' : 'url('+thisSlideDataImg+')'});
				});
				setTimeout(function (){
					SLIDER.find('.slide-item .slide-img').css({'opacity' : '1'});
				},500);
				let slideImg = SLIDER.find('.slide-item .slide-img');
				slideImg.css({'width': '100%'});
				slideImg.find('.slide-tag').css({'width': slideImg.outerWidth() + 'px'});
			});
			SLIDER.slick({
				prevArrow: false,
				nextArrow: SLIDER.find('.see-more-link'),
				slidesToScroll: 1,
				autoplay: true,
				speed: 500,
				autoplaySpeed: 3000,
			});

			SLIDER2.slick({
				arrows: true,
				slidesToScroll: 1,
				autoplay: true,
				speed: 500,
				autoplaySpeed: 3000,

				responsive: [
					{
						breakpoint: 767,
						settings: {
							arrows: false,
						}
					},
				],
			});

		});

	}

	homepageReviewSlide();
	function homepageReviewSlide() {
		const PAGE_ID = pageId;
		const SLIDER = PAGE_ID +' .review-slide';
		const PREV_BTN = PAGE_ID + " .review-slide-container .see-less-btn";
		const NEXT_BTN = PAGE_ID + " .review-slide-container .see-more-btn";
		let slidesLeft;

		if(SLIDER.length > 0){
			setTimeout(function () {
				$(SLIDER).on('init', function(event, slick){
					let OriginalSlideTOShow;

					if( slick.originalSettings.responsive[0].settings.slidesToShow && $(window).width() < 768){
						OriginalSlideTOShow = slick.originalSettings.responsive[0].settings.slidesToShow;
					}else{
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
							breakpoint: 768,
							settings: {
								slidesToShow: 1,
							}
						}
					],

				}).on('beforeChange', function(event, slick, currentSlide, nextSlide){

					// Handle slides remaining to show
					let direction;
					if (Math.abs(nextSlide - currentSlide) === 1) {
						direction = (nextSlide - currentSlide > 0) ? "right" : "left";
					}
					else {
						direction = (nextSlide - currentSlide > 0) ? "left" : "right";
					}
					if(direction === 'right'){
						if(slidesLeft !== 0){
							slidesLeft--;
						}
					}else{
						slidesLeft++;
					}
					$(NEXT_BTN).find('data').val(slidesLeft).text(slidesLeft);

					// Toggle Prev Button
					if(nextSlide > 0){
						$(PREV_BTN).addClass('has-more');
					}else {
						$(PREV_BTN).removeClass('has-more');
					}
				});

			}, 600);
		}

	}
}

