
$(document).ready(function () {
	setTimeout(function () {
		$('.image-gallery').slick({
			slidesToScroll: 1,
			dots: false,
			centerMode: false,
			arrows: false,
			infinite: true,
			adaptiveHeight: true,
			speed: 300,
			autoplay: true,
			autoplaySpeed: 2000,
			responsive: [
				{
					breakpoint: 768,
					settings: {
						slidesToShow: 2,
					}
				}
			],

		});
	}, 600);
});
