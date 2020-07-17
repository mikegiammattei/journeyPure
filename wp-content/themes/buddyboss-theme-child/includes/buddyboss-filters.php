<?php

/**
 * Force BuddyBoss to use WordPress email library (in this case, overridden by an SMTP plugin)
 *
 * @return boolean true.
 */
add_filter( 'bp_email_use_wp_mail', '__return_true' );

/**
 * Force BuddyBoss send emails using HTML content (not plain text)
 *
 * @param array $content_type Mime type.
 *
 * @return array $content_type Mime type.
 */
function buddyboss_force_html_email( $content_type ) {
	$content_type = 'text/html';
	return $content_type;
}

add_filter( 'wp_mail_content_type', 'buddyboss_force_html_email' );


/* ********************************************* */


/**
 * Filter The Members Template arguments
 *
 * @param array $args The Members Template arguments.
 *
 * @return array The Members Template arguments.
 */
function buddyboss_bp_after_has_members_parse_args( $args ) {
	$args['include'] = buddyboss_get_members_with_my_story();

	return $args;
}

add_filter( 'bp_after_has_members_parse_args', 'buddyboss_bp_after_has_members_parse_args' );

/**
 * No index the profile pages with no story
 *
 * @param string $robotsstr Robots meta ra value.
 *
 * @return string Robots meta ra value.
 */
function buddyboss_yoastseo_noindex_profile_pages( $robotsstr ) {
	global $bp, $wpdb;

	// Is profile page.
	if ( ! empty( $bp ) && 'profile' === $bp->current_component && ! empty( $bp->displayed_user ) && ! empty( $bp->displayed_user->id ) ) {
		// My Story = 33.
		$field_id = 33; // xprofile_get_field_id_from_name( 'My Story' );

		$id = $wpdb->get_col(
			$wpdb->prepare(
				'SELECT p.user_id FROM wp_bp_xprofile_data p INNER JOIN wp_users u ON u.ID = \'%2$s\' AND p.user_id = u.ID WHERE p.field_id = \'%1$s\' AND p.value IS NOT NULL AND p.value <> \'\'',
				$field_id,
				$bp->displayed_user->id
			)
		);

		// Member with no story.
		if ( empty( $id ) ) {
			$robotsstr = 'noindex,nofollow';
		}

		// It's not a doctor (Doctors = 5 and 6).
		if ( ! in_array( $bp->displayed_user->id, array( 5, 6 ), true ) ) {
			$robotsstr = 'noindex,nofollow';
		}
	}

	return $robotsstr;
}

add_action( 'wpseo_robots', 'buddyboss_yoastseo_noindex_profile_pages' );

/**
 * Get members with My Story field filled.
 *
 * @return string Ids split by comma.
 */
function buddyboss_get_members_with_my_story() {
	global $wpdb;

	// My Story = 33.
	$field_id = 33; // xprofile_get_field_id_from_name( 'My Story' );

	$ids = $wpdb->get_col(
		$wpdb->prepare(
			'SELECT user_id FROM wp_bp_xprofile_data WHERE field_id = \'%1$s\' AND value IS NOT NULL AND value <> \'\'',
			$field_id
		)
	);

	// Members with story.
	if ( ! empty( $ids ) ) {
		$ids_str = implode( ',', $ids );
		return $ids_str;
	} else {
		return '';
	}
}


/* ********************************************* */


/**
 * Filter the My Story field to be filtered by
 *
 * @param string $value Value for the profile field.
 * @param string $type  Type for the profile field.
 * @param int    $id    ID for the profile field.
 *
 * @return array The Members Template arguments.
 */
function buddyboss_bp_get_the_profile_field_value( $value, $type, $id ) {
	// My Story = 33.
	// My Best Advice = 32.
	// Bio = 22.
	$field_ids = array( 22, 32, 33 );

	if ( in_array( $id, $field_ids, true ) ) {
		$value = buddyboss_add_oembed( $value );
	}

	// If it's not Bio field = 22.
	if ( 22 !== $id ) {
		$value = preg_replace( '/(<a [^>]*>)([^<]*)(<\/a>)/', '$2', $value );

	}

	return $value;
}

add_filter( 'bp_get_the_profile_field_value', 'buddyboss_bp_get_the_profile_field_value', 10, 3 );

/**
 * Add oembed to the text content.
 *
 * @param string $content HTML content.
 *
 * @return string HTML content.
 */
function buddyboss_add_oembed( $content ) {
	// Check if WordPress already embed the link then return the original content.
	if ( strpos( $content, '<iframe' ) !== false ) {
		return $content;
	} else {
		// Find all the URLs from the content.
		preg_match_all( '#\bhttps?://[^,\s()<>]+(?:\([\w\d]+\)|([^,[:punct:]\s]|/))#', $content, $match );

		// Check if URL found.
		if ( isset( $match[0] ) ) {
			// Remove duplicate from array and run the loop.
			foreach ( array_unique( $match[0] ) as $url ) {
				// Fetch the oembed code for URL.
				$embed_code = wp_oembed_get( $url );

				// If oembed found then replace the original URL on $content.
				if ( strpos( $embed_code, '<iframe' ) !== false ) {
					$to_replace = '[' . $url . ']';
					$content    = str_replace( $to_replace, $embed_code, $content );
				}
			}
		}

		return $content;
	}
}


/* ********************************************* */


/**
 * Move "I relate" button from after the bio name to after fields.
 */
remove_action( 'bp_before_member_header_meta', 'likebtn_bp_member' );

/**
 * Move "I relate" button from after the bio name to after fields
 *
 * @param string $value Value for the profile field.
 * @param string $type  Type for the profile field.
 * @param int    $id    ID for the profile field.
 *
 * @return array The Members Template arguments.
 */
function buddyboss_bp_get_the_profile_field_value_2( $value, $type, $id ) {
	// My Story = 33.
	$field_id = 33;

	// Move "I relate" button from after the bio name to after fields.
	if ( $id === $field_id && function_exists( 'likebtn_bp_member' ) ) {
		if ( ! empty( buddypress()->displayed_user->id ) ) {
			$value .= '<p>' . _likebtn_get_content_universal( LIKEBTN_ENTITY_BP_MEMBER, buddypress()->displayed_user->id ) . '</p>';
		}
	}

	return $value;
}

add_filter( 'bp_get_the_profile_field_value', 'buddyboss_bp_get_the_profile_field_value_2', 10, 3 );


/* ********************************************* */



/**
 * Force Buddypress Avatars to be Square, before crop.
 *
 * @param array $upload_array Upload Array.
 *
 * @return array Upload Array.
 */
function buddyboss_wp_handle_upload( $upload_array ) {
	// phpcs:ignore WordPress.Security
	if ( isset( $_POST['action'] ) && 'bp_avatar_upload' === $_POST['action'] ) {
		$file = $upload_array['file'];
		$type = exif_imagetype( $file );

		switch ( $type ) {
			case IMAGETYPE_GIF:
				// phpcs:ignore WordPress.PHP.NoSilencedErrors.Discouraged
				$img = @imagecreatefromgif( $file );
				break;
			case IMAGETYPE_JPEG:
				// phpcs:ignore WordPress.PHP.NoSilencedErrors.Discouraged
				$img = @imagecreatefromjpeg( $file );
				break;
			case IMAGETYPE_PNG:
				// phpcs:ignore WordPress.PHP.NoSilencedErrors.Discouraged
				$img = @imagecreatefrompng( $file );
				break;
			default:
				return $upload_array;
		}

		$w = imagesx( $img );
		$h = imagesy( $img );

		if ( $w !== $h ) {
			$dim  = min( $w, $h );
			$img2 = buddyboss_crop_align( $img, $dim, $dim, 'center', 'middle' );

			switch ( $type ) {
				case IMAGETYPE_GIF:
					imagegif( $img2, $file );
					break;
				case IMAGETYPE_JPEG:
					imagejpeg( $img2, $file );
					break;
				case IMAGETYPE_PNG:
					imagepng( $img2, $file );
					break;
			}
		}
	}

	return $upload_array;
}

// add_filter( 'wp_handle_upload', 'buddyboss_wp_handle_upload' );

/**
 * Crop image with alignment parameters
 *
 * @param object $image            Image.
 * @param int    $crop_width       Crop width.
 * @param int    $crop_height      Crop height.
 * @param string $horizontal_align Horizontal alignment.
 * @param string $vertical_align   Vertical alignment.
 *
 * @return object Image.
 */
function buddyboss_crop_align( $image, $crop_width, $crop_height, $horizontal_align = 'center', $vertical_align = 'middle' ) {
	$width                   = imagesx( $image );
	$height                  = imagesy( $image );
	$horizontal_align_pixels = buddyboss_calculate_pixels_for_align( $width, $crop_width, $horizontal_align );
	$vertical_align_pixels   = buddyboss_calculate_pixels_for_align( $height, $crop_height, $vertical_align );

	return imagecrop(
		$image,
		[
			'x'      => $horizontal_align_pixels[0],
			'y'      => $vertical_align_pixels[0],
			'width'  => $horizontal_align_pixels[1],
			'height' => $vertical_align_pixels[1],
		]
	);
}

/**
 * Calculate pixels for alignment
 *
 * @param int    $image_size Image size.
 * @param int    $crop_size  Crop size.
 * @param string $align      Alignment.
 *
 * @return array Positions.
 */
function buddyboss_calculate_pixels_for_align( $image_size, $crop_size, $align ) {
	switch ( $align ) {
		case 'left':
		case 'top':
			return array( 0, min( $crop_size, $image_size ) );
		case 'right':
		case 'bottom':
			return array( max( 0, $image_size - $crop_size ), min( $crop_size, $image_size ) );
		case 'center':
		case 'middle':
			return [
				max( 0, floor( ( $image_size / 2 ) - ( $crop_size / 2 ) ) ),
				min( $crop_size, $image_size ),
			];
		default:
			return array( 0, $image_size );
	}
}

/**
 * Change avatar image size limit to 5mn.
 *
 * @param int $image_size Image size.
 *
 * @return int Image size.
 */
function buddyboss_bp_core_avatar_original_max_filesize( $image_size ) {
	$image_size = 10240000; // 10mb
	return $image_size;
}

add_filter( 'bp_core_avatar_original_max_filesize', 'buddyboss_bp_core_avatar_original_max_filesize' );


/* ********************************************* */


/**
 * Add modal QA parameter if is set on the current URL.
 *
 * @param string $url The URL. Not HTML-encoded.
 *
 * @return string The login URL. Not HTML-encoded.
 */
function wp_bp_login_and_register_url( $url ) {
	// phpcs:ignore WordPress.Security
	if ( ! empty( $_GET['modal'] ) ) {
		$url = add_query_arg(
			array(
				// phpcs:ignore WordPress.Security
				'modal' => sanitize_text_field( $_GET['modal'] ),
			),
			$url
		);
	}

	return $url;
}

add_filter( 'login_url', 'wp_bp_login_and_register_url', 10 );
add_filter( 'register_url', 'wp_bp_login_and_register_url', 10 );

/**
 * Reload the parent if the LOGIN is made on an iframe.
 *
 * @param string  $user_login Username.
 * @param WP_User $user       WP_User object of the logged-in user.
*/
function wp_bp_wp_login( $user_login, $user ) {
	// phpcs:ignore WordPress.Security
	if ( ! empty( $_SERVER['HTTP_REFERER'] ) && false !== strpos( $_SERVER['HTTP_REFERER'], 'modal=1' ) ) {
		die( '<script> if (parent) { parent.location.search = "?login-after-question=1" } </script>' );
	}
}

add_action( 'wp_login', 'wp_bp_wp_login', 10, 2 );

/**
 * Add QUESTION (post ID) on the registration form, if provided via query string.
 */
function wp_bp_custom_signup_steps() {
	// phpcs:ignore WordPress.Security
	if ( ! empty( $_GET['question'] ) && ! empty( $_GET['modal'] ) ) {
		// phpcs:ignore WordPress.Security
		?><input type="hidden" name="question" value="<?php echo sanitize_text_field( $_GET['question'] ); ?>"><?php
	}
}
add_action( 'bp_custom_signup_steps', 'wp_bp_custom_signup_steps' );

/**
 * Add QUESTION (post ID) as a user meta.
 *
 * @param array $usermeta user meta.
 *
 * @return array user meta.
 */
function wp_bp_signup_usermeta( $usermeta ) {
	// phpcs:ignore WordPress.Security
	if ( ! empty( $_POST['question'] ) ) {
		// phpcs:ignore WordPress.Security
		$usermeta['question_id'] = $_POST['question'];
	}

	return $usermeta;
}

add_filter( 'bp_signup_usermeta', 'wp_bp_signup_usermeta' );

/**
 * Updated QUESION (post id) via user meta after user ACTIVATION.
 *
 * @param WP_User $user WP_User object.
 *
 * @return WP_User object.
 */
function wp_bp_core_activate_account( $user ) {
	global $wpdb;

	if ( empty( $user ) || ! is_int( $user ) ) {
		return $user;
	}

	$user = get_user_by( 'ID', $user );

	if ( empty( $user ) ) {
		return $user;
	}

	$meta = $wpdb->get_col(
		$wpdb->prepare(
			'SELECT meta FROM wp_signups WHERE user_email = \'%1$s\'',
			$user->data->user_email
		)
	);

	if ( empty( $meta ) ) {
		return $user;
	}

	$meta = unserialize( $meta[0] );

	if ( empty( $meta ) || empty( $meta['question_id'] ) ) {
		return $user;
	}

	// Update post author.
	wp_update_post(
		array(
			'ID'          => $meta['question_id'],
			'post_author' => $user->ID,
		)
	);

	// Make the post author a follower to the post.
	$followed_post_id = wp_insert_post(
		array(
			'post_title'   => $user->ID,
			'post_content' => '',
			'post_status'  => 'publish',
			'post_type'    => 'wpwfollowpost',
			'post_parent'  => $meta['question_id'],
			'author'       => $user->ID,
			'post_author'  => $user->ID,
		)
	);

	if ( $followed_post_id ) {
		// Update follow status.
		update_post_meta( $followed_post_id, '_wpw_fp_follow_status', 1 );

		// Update post user email.
		update_post_meta( $followed_post_id, '_wpw_fp_post_user_email', $user->data->user_email );
	}

	return $user;
}

add_filter( 'bp_core_activate_account', 'wp_bp_core_activate_account' );

/**
 * Redirects ACTIVATION page to homepage with a parameter to show the same
 * ACTIVATION page in a modal.
 */
function wp_bp_activation_page_redirect() {
	// If it's the activation page.
	if ( ! function_exists( 'bp_is_activation_page' ) || ! bp_is_activation_page() ) {
		return;
	}

	// If the page is already open in a modal.
	// phpcs:ignore WordPress.Security
	if ( ! empty( $_GET['modal'] ) ) {
		return;
	}

	// Redirect...

	$url = add_query_arg(
		[
			// phpcs:ignore WordPress.Security
			'activation_page' => rawurlencode( $_SERVER['REQUEST_URI'] ),
		],
		get_home_url()
	);

	// phpcs:ignore WordPress.Security
	wp_redirect( $url );
	die();
}

add_action( 'template_redirect', 'wp_bp_activation_page_redirect' );

/**
 * Reload the parent if the ACTIVATION is made on an iframe.
 *
 * @param WP_User $user WP_User object.
 *
 * @return WP_User object.
 */
function wp_bp_activation_page_redirect_pos( $user ) {
	// phpcs:ignore WordPress.Security
	if ( ! empty( $_SERVER['HTTP_REFERER'] ) && false !== strpos( $_SERVER['HTTP_REFERER'], 'modal=1' ) ) {
		die( '<script> if (parent) { parent.location.search = "?activation-after-question=1" } </script>' );
	}

	return $user;
}

add_filter( 'bp_core_activate_account', 'wp_bp_activation_page_redirect_pos', 11 );

// DEBUG
/*
add_filter( 'wp_mail', function( $args ) {
	die( $args['message'] );
} );
*/
