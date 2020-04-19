reviewPage();
function reviewPage() {
	const pageId = '#reviews-page';

	if($(pageId).length > 0){
		$(pageId).find(".review-slider").each(function () {
			let thisSlider = $(this);

			let slideId = thisSlider.attr("id");
			reviewPageSlide(slideId);
		});

		function reviewPageSlide(slideId) {
			const PAGE_ID = pageId;
			const SLIDER = PAGE_ID +' #' + slideId;
			const PREV_BTN = $(SLIDER).parent().find('.see-less-btn');
			const NEXT_BTN = $(SLIDER).parent().find('.see-more-btn');
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
						lazyLoad: "ondemand",
						infinite: false,
						adaptiveHeight: true,
						autoplay: false,
						prevArrow: PREV_BTN,
						nextArrow: NEXT_BTN,
						slidesToShow: 1,
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
						NEXT_BTN.find('data').val(slidesLeft).text(slidesLeft);

						// Toggle Prev Button
						if(nextSlide > 0){
							PREV_BTN.addClass('has-more');
						}else {
							PREV_BTN.removeClass('has-more');
						}
					});

				}, 600);
			}
		}

		reviewVideoSlide();
		function reviewVideoSlide() {
			const PAGE_ID = pageId;
			const SLIDER = PAGE_ID +' .video-preview-slider';
			const PREV_BTN = $(SLIDER).parent().find('.see-less-btn');
			const NEXT_BTN = $(SLIDER).parent().find('.see-more-btn');
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
						prevArrow: PREV_BTN,
						nextArrow: NEXT_BTN,
						responsive: [
							{
								breakpoint: 768,
								settings: {
									slidesToShow: 1,
								}
							},
							{
								breakpoint: 1200,
								settings: {
									slidesToShow: 2,
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
						NEXT_BTN.find('data').val(slidesLeft).text(slidesLeft);

						// Toggle Prev Button
						if(nextSlide > 0){
							PREV_BTN.addClass('has-more');
						}else {
							PREV_BTN.removeClass('has-more');
						}
					});

				}, 600);
			}
		}

		if ($('[data-video-status]').length > 0) {
			$('body').on('click','[data-video-status],#first-video-play-btn', function () {

				var $this = $(this);
				var thisVideoId = $this.data('video-id');

				var thisVideoStatus = $this.data('video-status');
				var key = jp_rest_details.google_API_key;

				if($this.attr('class') === 'content-container'){
					document.getElementById('feature-video-container').scrollIntoView(true);
				}

				if ($this.hasClass('first-video')) {
					$this.removeClass('first-video');
					loadVideo($this);
				} else if (thisVideoStatus === 'idle') {
					loadVideo($this);
					$('.img-box-reviews').removeClass('on');
					$this.find('.img-box-reviews').addClass('on');
				}

				if ($('#first-video-play-btn').length > 0) {
					$('#first-video-play-btn').remove();
				}

				function loadVideo($this) {
					$('#iframeHolder').attr('src', "https://www.youtube.com/embed/" + thisVideoId + "?rel=0&showinfo=0&autoplay=1").animate({
						'opacity': '1'
					}, 500);
					$.get('https://www.googleapis.com/youtube/v3/videos?part=snippet,statistics&id=' + thisVideoId + '&key=' + key, {
						dataType: 'html'
					}, function (data) {
						$('#video-title').text(data.items[0].snippet.title);
						$('#video-description').html(data.items[0].snippet.description.replace(/\n/g, "<br>"));
					});
				}

			});
		}

	}

}

