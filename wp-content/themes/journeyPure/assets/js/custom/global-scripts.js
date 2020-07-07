
$(document).ready(function () {

	setTimeout(function () {
		$.getScript("//130400.tctm.co/t.js");
		(function(w, d, s, l, i) {
			w[l] = w[l] || [];
			w[l].push({
				'gtm.start': new Date().getTime(),
				event: 'gtm.js'
			});
			var f = d.getElementsByTagName(s)[0],
				j = d.createElement(s),
				dl = l != 'dataLayer' ? '&l=' + l : '';
			j.async = true;
			j.src = 'https://www.googletagmanager.com/gtm.js?id=' + i + dl;
			f.parentNode.insertBefore(j, f);
		})(window, document, 'script', 'dataLayer', 'GTM-NKJHBM9');


		$(".ctm-call-widget").attr('src',$(".ctm-call-widget").data('url-value'));


	},2000);
});




// CTA Trigger
let CTA_STATE = false;
$('.bottom-cta .drop').on('click',function (){
	if(!CTA_STATE){
		$('.ctm-call-widget-container').append('<iframe class="ctm-call-widget" src="https://app.calltrackingmetrics.com/form_reactors/FRT472ABB2C5B9B141A95E7A133293232FB64726C81D4381AEFF2617EDD86B68F50" style="width:100%;height:300px;border:none"></iframe>')
		CTA_STATE = true;
	}
});



var video_wrapper = $('.youtube-video-place');
if(video_wrapper.length){
	$('.youtube-video-place').on('click', function(){
		let thisVidUrl = $(this);
		thisVidUrl.html('<iframe allowfullscreen allow="autoplay; encrypted-media" frameborder="0" class="embed-responsive-item" src="' + thisVidUrl.data('yt-url') + '?rel=0&showinfo=0&autoplay=1&cc_load_policy=1"></iframe>');
		thisVidUrl.addClass('playing');
	});
}

$('.video-cta').on('click', function(){
	let thisTrigger = $(this);
	let thisVideContainerId = thisTrigger.data('target');
	$(thisVideContainerId).find('.youtube-video-place').trigger('click');
});