cta_widget();
function cta_widget() {
	const parentClass = '.cta-widget';

	const cta = {
		el : $(parentClass),
		close : $(parentClass).find('.close-btn'),
		info : $(parentClass).find('.info'),
		callout : $(parentClass).find('.callout'),
		open : $(parentClass).find('.callout')
	};

	const startHtml = cta.callout.html();
	const afterHtml = '<i class="fas fa-comments"></i>';

	cta.el.on('click', '.close-btn',function () {
		let lowerAmount;

		if($('.local-msg').length > 0){
			lowerAmount = (cta.el.outerHeight()) + (cta.el.find('.local-msg').outerHeight());
		}else{
			lowerAmount = (cta.el.outerHeight());
		}

		cta.el.animate({'bottom' : '-' + lowerAmount + 'px'},400, function () {
			cta.callout.html(afterHtml);
		}).addClass('on');
	});

	cta.open.on('click', 'i', function () {
		if(cta.el.hasClass('on')){

			cta.el.animate({'bottom' : '0px'},400, function () {
				cta.callout.html(startHtml);
			}).removeClass('on');

		}
	});
}
