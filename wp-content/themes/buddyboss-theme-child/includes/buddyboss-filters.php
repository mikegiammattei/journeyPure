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
		// $field_id = xprofile_get_field_id_from_name( 'My Story' );
		$field_id = 33;

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

	// $field_id = xprofile_get_field_id_from_name( 'My Story' );
	$field_id = 33;

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
