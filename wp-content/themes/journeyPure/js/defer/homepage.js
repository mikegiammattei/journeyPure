homepage();
function homepage() {
	const pageId = '#homepage';
	/*if($(pageId).length > 0){

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

	}*/

	

}

