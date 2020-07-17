<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package BuddyBoss_Theme
 */
?>

<?php
global $post;
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<?php if ( !is_single() || is_related_posts() ) { ?>
		<div class="post-inner-wrap">
	<?php } ?>

	<?php
	if ( ( !is_single() || is_related_posts() ) && function_exists( 'buddyboss_theme_entry_header' ) ) {
		buddyboss_theme_entry_header( $post );
	}
	?>

	<div class="entry-content-wrap">
		<?php
		$featured_img_style = buddyboss_theme_get_option( 'blog_featured_img' );

		if ( !empty( $featured_img_style ) && $featured_img_style == "full-fi-invert" ) {

			if ( is_single() && ! is_related_posts() ) { ?>
				<?php if ( has_post_thumbnail() ) { ?>
					<figure class="entry-media entry-img bb-vw-container1"><?php the_post_thumbnail( 'large' ); ?></figure>
				<?php } ?>
			<?php } ?>

			<?php
			if ( has_post_format( 'link' ) && ( !is_singular() || is_related_posts() ) ) {
				echo '<span class="post-format-icon"><i class="bb-icon-link-1"></i></span>';
			}

			if ( has_post_format( 'quote' ) && ( !is_singular() || is_related_posts() ) ) {
				echo '<span class="post-format-icon white"><i class="bb-icon-quote"></i></span>';
			}
			?>

            <?php if (!is_singular('lesson') && !is_singular('llms_assignment') ) : ?>

			<header class="entry-header"><?php
				if ( is_singular() && ! is_related_posts() ) :
					the_title( '<h1 class="entry-title">', '</h1>' );
				else :
					$prefix = "";
					if( has_post_format( 'link' ) ){
						$prefix = __( '[Link]', 'buddyboss-theme' );
						$prefix .= " ";//whitespace
					}
					the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">' . $prefix, '</a></h2>' );
				endif;

				if( has_post_format( 'link' ) && function_exists( 'buddyboss_theme_get_first_url_content' ) && ( $first_url = buddyboss_theme_get_first_url_content( $post->post_content ) ) != "" ) : ?>
					<p class="post-main-link"><?php echo $first_url;?></p>
				<?php endif; ?></header><!-- .entry-header -->

            <?php endif; ?>

			<?php if ( !is_singular() || is_related_posts() ) { ?>
				<div class="entry-content">
					<?php
					if( empty($post->post_excerpt) ) {
						the_excerpt();
					} else {
						echo bb_get_excerpt($post->post_excerpt, 150);
					}
					?>
				</div>
			<?php } ?>

			<?php if ( ( isset($post->post_type) && $post->post_type === 'post' ) || ( ! has_post_format( 'quote' ) && is_singular( 'post' ) ) ) : ?>
				<?php get_template_part( 'template-parts/entry-meta' ); ?>
			<?php endif; ?>

		<?php } else { ?>

			<?php
			if ( has_post_format( 'link' ) && ( !is_singular() || is_related_posts() ) ) {
				echo '<span class="post-format-icon"><i class="bb-icon-link-1"></i></span>';
			}

			if ( has_post_format( 'quote' ) && ( !is_singular() || is_related_posts() ) ) {
				echo '<span class="post-format-icon white"><i class="bb-icon-quote"></i></span>';
			}
			?>

			<header>
                <?php
                if ( is_singular() && ! is_related_posts() ) :
                    the_title( '<h1 class="entry-title">', '</h1>' );
                else :
                    $prefix = "";
                    if( has_post_format( 'link' ) ){
                        $prefix = __( '[Link]', 'buddyboss-theme' );
                        $prefix .= " ";//whitespace
                    }
                    the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">' . $prefix, '</a></h2>' );
                endif;
                ?>

				<?php if( has_post_format( 'link' ) && function_exists( 'buddyboss_theme_get_first_url_content' ) && ( $first_url = buddyboss_theme_get_first_url_content( $post->post_content ) ) != "" ):?>
				<p class="post-main-link"><?php echo $first_url;?></p>
				<?php endif; ?>
			</header><!-- .entry-header -->

			<?php if ( !is_singular() || is_related_posts() ) { ?>
				<div class="entry-content">
					<?php
					if( empty($post->post_excerpt) ) { ?>

                        <?php  the_excerpt(); ?>
                        <?php //echo wp_trim_words(get_the_content(),100,'<a href="'.get_post_permalink().'">  Read More</a>');
					} else {
						echo bb_get_excerpt($post->post_excerpt, 150);
					}
					?>
<!--                    <div class="mt-4">-->
<!--                        --><?php //echo do_shortcode('[likebtn theme="custom" f_size="17" icon_l_url="https://www.journeypure.com/ask-our-doctors/wp-content/uploads/sites/2/2020/02/upvote-green-1.png#1701" icon_l_url_v="https://www.journeypure.com/ask-our-doctors/wp-content/uploads/sites/2/2020/02/upvote-voted-green-1.png#1702" icon_d_url="https://www.journeypure.com/ask-our-doctors/wp-content/uploads/sites/2/2020/02/downvote-1.png#1700" icon_d_url_v="https://www.journeypure.com/ask-our-doctors/wp-content/uploads/sites/2/2020/02/downvote-comments-clicked-1.png#1750" label_c="#9a9c99" label_c_v="#00953b" counter_l_c="#9a9c99" bg_c="#ffffff" bg_c_v="#ffffff" brdr_c="#ffffff" f_family="Verdana" counter_type="subtract_dislikes" i18n_like="Upvote" white_label="1" addthis_service_codes="facebook,twitter,email,linkedin" bp_notify="0" bp_activity="1" bp_hide_sitewide="1"]'); ?>
<!--                    </div>-->
				</div>
			<?php } ?>
            <?php if ( ( isset($post->post_type) && $post->post_type === 'post' ) || ( ! has_post_format( 'quote' ) && is_singular( 'post' ) ) ) : ?>
                <?php get_template_part( 'template-parts/entry-meta' ); ?>
            <?php endif; ?>

			<?php if ( is_single() && ! is_related_posts() ) { ?>
				<?php if ( has_post_thumbnail() ) { ?>
					<figure class="entry-media entry-img bb-vw-container1">
						<?php the_post_thumbnail( 'large' ); ?>
					</figure>
				<?php } ?>
			<?php } ?>

		<?php } ?>

		<?php if ( is_singular() && ! is_related_posts() ) { ?>
			<div class="entry-content">
			<?php
				the_content( sprintf(
				wp_kses(
				/* translators: %s: Name of current post. Only visible to screen readers */
				__( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'buddyboss-theme' ), array(
					'span' => array(
						'class' => array(),
					),
				)
				), get_the_title()
				) );
			?>
			</div><!-- .entry-content -->
		<?php } ?>
	</div>

	<?php if ( !is_single() || is_related_posts() ) { ?>
		</div><!--Close '.post-inner-wrap'-->
	<?php } ?>

</article><!-- #post-<?php the_ID(); ?> -->

<?php if( is_single() && ( has_category() || has_tag() ) ) { ?>
	<div class="post-meta-wrapper">
		<?php if  ( has_category() ) : ?>
			<div class="cat-links">
				<i class="bb-icon-folder"></i>
				<?php _e( 'Categories: ', 'buddyboss-theme' ); ?>
				<span><?php the_category( __( ', ', 'buddyboss-theme' ) ); ?></span>
			</div>
		<?php endif; ?>

		<?php if  ( has_tag() ) : ?>
			<div class="tag-links">
				<i class="bb-icon-tag"></i>
				<?php _e( 'Tagged: ', 'buddyboss-theme' ); ?>
				<?php the_tags( '<span>', __( ', ', 'buddyboss-theme' ),'</span>' ); ?>
			</div>
		<?php endif; ?>
	</div>
<?php } ?>

<?php
get_template_part( 'template-parts/content-subscribe' );
get_template_part( 'template-parts/author-box' );
get_template_part( 'template-parts/related-posts' );
