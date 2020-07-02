
if($('#homepage').length > 0){
	$(document).ready(function () {
		setTimeout(function () {
			homepageReviewSlide('#homepage');
		},1000);
	});

	function homepageReviewSlide(pageId) {
		console.log(pageId);
		const PAGE_ID = pageId;
		const SLIDER = PAGE_ID +' .review-slide';
		const PREV_BTN = PAGE_ID + " .review-slide-container .see-less-btn";
		const NEXT_BTN = PAGE_ID + " .review-slide-container .see-more-btn";
		let slidesLeft;

		if($(SLIDER).length > 0){

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

				// On slider image loads, resize the slider
				$(SLIDER).find('img').each(function() {
					var img = this;

					if (img.complete) {
						$(SLIDER).slick('setPosition');
					} else {
						img.addEventListener('load', function() {
							$(SLIDER).slick('setPosition');
						});
					}
				});

			}, 600);
		}
	}



	// script for tab steps
	$('.process-model a[data-toggle="tab"]').on('shown.bs.tab', function (e) {

		var href = $(e.target).attr('href');
		var $curr = $(".process-model a[href='" + href + "']").parent();

		$('.process-model li').removeClass();

		$curr.addClass("active");
		$curr.prevAll().addClass("visited");
	});
	// end  script for tab steps
}

