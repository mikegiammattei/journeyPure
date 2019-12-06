$(document).ready(function () {
	jp_likes();
});
function jp_likes(){
	let likeSelector = '[data-like-object]';

	if($(likeSelector).length > 0){

		$(likeSelector).on('click',function () {
			let thisLike = $(this);
			let likeIdentifier = thisLike.data('like-object');
			let currentCountEl = thisLike.find('data');
			let currentCount = currentCountEl.val();

			$.post('/wp-admin/admin-ajax.php', {'action' : 'like_action_hok', data: likeIdentifier},function (response) {
				if(response ){
					/** Increment Likes */
					currentCount++;
					currentCountEl.val(currentCount).text(" " + currentCount);

					thisLike.tooltip('hide')
						.attr('data-original-title', 'Liked!')
						.tooltip('update').tooltip('show');
				}
			});
		});
	}
}
