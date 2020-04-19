<?php

/**
 * Update webpage structured data
 *
 * @param array $data Schema.org Webpage data array.
 *
 * @return array $data Schema.org Webpage data array.
 */
function structured_data_update_core( $data ) {
	// Site information.
	$blog_details = get_blog_details( [ 'blog_id' => 1 ] );
	$site_url     = $blog_details->siteurl;
	$site_title   = $blog_details->blogname;

	// Is part of (organization).
	$data['isPartOf'] = [
		'@type'           => 'WebSite',
		'@id'             => $site_url . '#website',
		'url'             => $site_url,
		'name'            => $site_title,
		'inLanguage'      => 'en-US',
		'potentialAction' => [
			'@type'       => 'SearchAction',
			'target'     => [
				'@type'       => 'EntryPoint',
				'urlTemplate' => $site_url . '?s={search_term_string}',
			],
			'query-input' => [
				'@type'         => 'PropertyValueSpecification',
				'valueRequired' => 'http://schema.org/True',
				'valueName'     => 'search_term_string',
			],
		],
	];

	// Return filtered data.
	return $data;
}

add_filter( 'wpseo_schema_webpage', 'structured_data_update_core', 11, 2 );

/**
 * Add FAQ structured data
 *
 * @param array $data Schema.org Webpage data array.
 *
 * @return array $data Schema.org Webpage data array.
 */
function structured_data_add_faq( $data ) {
	// Category archive.
	if ( is_category() ) {
		$data['@type']      = 'FAQPage';
		$data['mainEntity'] = [];

		// Declare global $more (before the loop).
		global $more;

		// Output all posts from main WP_Query.
		while ( have_posts() ) {
			the_post();

			// Set (inside the loop) to display all content, including text below more.
			$more = 1;

			// Post content.
			$content = apply_filters( 'the_content', get_the_content() );
			$content = preg_replace( '/(.+)(<!-- LikeBtn.com BEGIN -->)(.+)(<!-- LikeBtn.com END -->)/is', '$1', $content );

			// Main entity.
			$data['mainEntity'][] = [
				'@type'          => 'Question',
				'name'           => the_title( '', '', false ),
				'acceptedAnswer' => [
					'@type' => 'Answer',
					'text'  => $content,
				],
			];
		}

		// Reset main WP_Query.
		wp_reset_query();
	}

	// Return filtered data.
	return $data;
}

add_filter( 'wpseo_schema_webpage', 'structured_data_add_faq', 11, 2 );

/**
 * Add Q&A structured data
 *
 * @param array $data Schema.org Webpage data array.
 *
 * @return array $data Schema.org Webpage data array.
 */
function structured_data_add_qa( $data ) {
	// Single post.
	if ( is_single() ) {
		$data['@type'] = 'QAPage';

		// Post information.
		$id        = get_the_ID();
		$title     = the_title( '', '', false );
		$date      = get_the_date( 'c' ); // 2016-07-23T21:11Z
		$permalink = get_permalink();
		$author    = get_the_author_meta( 'display_name' );

		// Post content.
		$content = apply_filters( 'the_content', get_the_content() );
		$content = preg_replace( '/(.+)(<!-- LikeBtn.com BEGIN -->)(.+)(<!-- LikeBtn.com END -->)/is', '$1', $content );

		// Main entity.
		$data['mainEntity'] = [
			'@type'          => 'Question',
			'name'           => $title,
			'text'           => $title,
			'answerCount'    => (int) get_comments_number(),
			'dateCreated'    => $date,
			'author'         => [
				'@type' => 'Person',
				'name'  => $author,
			],
			'acceptedAnswer' => [
				'@type'       => 'Answer',
				'text'        => $content,
				'dateCreated' => $date,
				'upvoteCount' => (int) get_post_meta( $id, 'Likes minus dislikes', true ),
				'url'         => $permalink,
				'author'      => [
					'@type' => 'Person',
					'name'  => $author,
				],
			],
		];

		// Comments.

		$data['mainEntity']['suggestedAnswer'] = [];

		$comments = get_comments(
			[
				'post_id' => $id,
			]
		);

		// Output all comments from the current post.
		foreach ( $comments as $comment ) {
			// Main entity > Suggested answers.
			$data['mainEntity']['suggestedAnswer'][] = [
				'@type'       => 'Answer',
				'text'        => $comment->comment_content,
				'dateCreated' => date( 'c', strtotime( $comment->comment_date ) ), // 2016-07-23T21:11Z
				'upvoteCount' => (int) get_comment_meta( $comment->comment_ID, 'Likes minus dislikes', true ),
				'url'         => $permalink . '#comment-' . $comment->comment_ID,
				'author'      => [
					'@type' => 'Person',
					'name'  => $comment->comment_author,
				],
			];
		}
	}

	// Return filtered data.
	return $data;
}

add_filter( 'wpseo_schema_webpage', 'structured_data_add_qa', 11, 2 );
