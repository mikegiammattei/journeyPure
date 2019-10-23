mobileNav();
function mobileNav() {
	const nav = 'header nav';

	if($(nav).length > 0){

		const $nav = $(nav);
		let nav = {
			btn: 'header .mobile-trigger',
			header: 'header',
			container: 'header .nav-col-parent',
			mainWrapper: '.main-wrapper',
		};

		$(nav.btn).on('click', function () {
			$(nav.header).toggleClass('mobile-nav-on');
			$(nav.container).stop().slideToggle(500);
			$(nav.mainWrapper).stop().toggleClass('on');
		});

		$(nav.mainWrapper).on('click', function () {
			if($(nav.header).hasClass('mobile-nav-on')) {
				$(nav.header).removeClass('mobile-nav-on');
				$(nav.container).stop().slideUp(500);
				$(nav.mainWrapper).stop().removeClass('on');
			}
		});
		var resizeId;
		$(window).resize(function() {
			clearTimeout(resizeId);
			resizeId = setTimeout(doneResizing, 500);
		});

		function doneResizing() {
			if($(window).width() > 992){
				if($(nav.header).hasClass('mobile-nav-on')){
					$(nav.header).removeClass('mobile-nav-on');
					$(nav.mainWrapper).stop().removeClass('on');

					$(nav.container).removeAttr('style');

				}
			}
		}

	}
}
