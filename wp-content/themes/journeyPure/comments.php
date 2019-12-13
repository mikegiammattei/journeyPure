<?php

if ( post_password_required() ) {
	return;
}
?> <div id="comments"class="comments-area"> <?php comment_form(); ?> </div>