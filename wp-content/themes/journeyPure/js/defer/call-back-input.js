callBackInput();
function callBackInput() {
	const EL_CLASS = '.call-back-input';
	const FORM = EL_CLASS + ' form';

	$(FORM).on('submit',function (e) {
		e.preventDefault();

		let form = {
			phone: $(this).find('[data-type="phone"]')
		};
		if(isValid(form.phone.val())){
			form.phone.popover({
				content: "Set data endpoint",
				placement: "top",
				template: '<div class="popover success fade bs-popover-top show" role="tooltip" x-placement="top"><div class="arrow" style="left: 42px;"></div><div class="popover-body"></div></div>'

			}).popover('show');

			//let popoverId = form.phone.attr('aria-describedby');

			form.phone.on('click',function () {
				form.phone.popover('dispose');
			});
		}else if(!isValid(form.phone.val())){
			form.phone.popover({
				content: "Invalid Phone",
				placement: "top",
				template: '<div class="popover error fade bs-popover-top show" role="tooltip" x-placement="top"><div class="arrow" style="left: 42px;"></div><div class="popover-body">Invalid Phone</div></div>'

			}).popover('show');

			//let popoverId = form.phone.attr('aria-describedby');

			form.phone.on('click',function () {
				form.phone.popover('dispose');
			});

		}



	});

	function isValid($value) {
		let valueDigitsOnly = $value.replace(/\D/g,'');
		if(valueDigitsOnly.length === 10){
			return true;
		}else {
			return false;
		}
	}

}
