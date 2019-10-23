function downloadJSAtOnload() {
	let element = document.createElement("script");
	element.src = '/wp-content/themes/journeyPure/js/defer/' + deferData.filename + '.js';
	document.body.appendChild(element);
}
if (window.addEventListener)
	window.addEventListener("load", downloadJSAtOnload, false);
else if (window.attachEvent)
	window.attachEvent("onload", downloadJSAtOnload);
else window.onload = downloadJSAtOnload;


function downloadJSAtOnloadCNI() {
	let element = document.createElement("script");
	element.src = '/wp-content/themes/journeyPure/js/defer/user-question.js';
	document.body.appendChild(element);
}
if (window.addEventListener)
	window.addEventListener("load", downloadJSAtOnloadCNI, false);
else if (window.attachEvent)
	window.attachEvent("onload", downloadJSAtOnloadCNI);
else window.onload = downloadJSAtOnloadCNI;
