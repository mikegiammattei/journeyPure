/**
 * OP CTP
 *
 * @author   Fernando Tessmann
 * @package  JourneyPure
 */

// OP CTP template

if ($('#jp-op').length > 0) {

	// Section Masthead

	var video_wrapper = $('.youtube-video-place');

	if (video_wrapper.length > 0) {
		video_wrapper.on('click', function() {
			video_wrapper.html('<iframe allowfullscreen allow="autoplay; encrypted-media" frameborder="0" class="embed-responsive-item" src="' + video_wrapper.data('yt-url') + '"></iframe>');
		});
	}
}
