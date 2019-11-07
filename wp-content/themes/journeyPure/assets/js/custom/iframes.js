function init() {

	let vidDefer = document.getElementsByTagName('iframe');
	for (var i=0; i<vidDefer.length; i++) {
		if(vidDefer[i].getAttribute('data-src')) {
			vidDefer[i].setAttribute('src',vidDefer[i].getAttribute('data-src'));
		}
	}
}
if($('iframe').length >  0){
	window.onload = init;
}
