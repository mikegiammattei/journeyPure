<?php
/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package BuddyBoss_Theme
 */

get_header();

$blog_type = 'standard'; // standard, grid, masonry.
$blog_type = apply_filters( 'bb_blog_type', $blog_type );

$class = '';

if ( 'masonry' === $blog_type ) {
    $class = 'bb-masonry';
} elseif ( 'grid' === $blog_type ) {
    $class = 'bb-grid';
} else {
    $class = 'bb-standard';
}
?>

    <div id="primary" class="content-area category">
        <main id="main" class="site-main">
            <?php if ( have_posts() ) : ?>
                <header class="page-header">
                    <?php
                    echo $OF->getArchiveTitle();
                    the_archive_description( '<div class="archive-description">', '</div>' );
                    ?>
                </header><!-- .page-header -->
                <div class="post-grid <?php echo esc_attr( $class ); ?>">
                    <?php  get_template_part( 'template-parts/post', 'filter' ); ?>
                    <?php if ( 'masonry' === $blog_type ) { ?>
                        <div class="bb-masonry-sizer"></div>
                    <?php } ?>

                    <?php
                    $args  = array(
                        'orderby' => 'meta_value',
                        'order' => 'DESC',
                        'meta_query' => array(
                            'relation' => 'OR',
                            array(
                                'key' => 'Likes',
                                'compare' => 'NOT EXISTS',
                                'type' => 'numeric'
                            ),
                            array(
                                'key' => 'Likes',
                                'compare' => 'EXISTS',
                                'type' => 'numeric'
                            )
                        )
                    );
                    $args = array_merge( $args , $wp_query->query );
                    query_posts($args);
                    ?>
                    <?php /* Start the Loop */ ?>
                    <?php while ( have_posts() ) : the_post(); ?>
                        <?php get_template_part( 'template-parts/content', 'aod' ); ?>
                    <?php endwhile; ?>

                </div>
                <?php
                buddyboss_pagination();

            else :
                get_template_part( 'template-parts/content', 'none' );
                ?>

            <?php endif; ?>						        </main><!-- #main -->    </div><!-- #primary -->    </div><!-- .bb-grid -->    </div><!-- .container -->
			<div class="cat-follow-box">
				<h3 class="white-font">See New  <?php single_cat_title(); ?> Questions</h3>
				<p class="white-font">Sent weekly. No sign in. Unsubscribe anytime.</p>
				<?php global $post, $wp_query;					echo do_shortcode('[wpw_follow_term_me posttype="'.$post->post_type.'" taxonomy="category" termid="'.$wp_query->query_vars['cat'].'" followtext="<i class=\'fas fa-envelope\'></i> Follow New {term_name} Questions" followingtext="<i class=\'fas fa-check-circle\'></i> You Follow {term_name} Questions" disable_reload=true][/wpw_follow_term_me]'); ?>
			</div>
			<div class="container"><div class="bb-grid">
   <div id="primary" class="content-area category">        <main id="main" class="site-main">
            <div class="row">
                <div class="col-md-9">

                    <?php
                    $category = get_queried_object();
                    $largeTextArea = (get_field('large_textarea',"category_" . $category->term_id)) ? : '';?>
                    <?php if($largeTextArea): ?>
                    <div class="category-textarea">
                        <div class="card">
                            <div class="card-body">
                                <?php echo $largeTextArea; ?>
                            </div>

                        </div>
                    </div>
                    <?php endif; ?>
                </div>
                <div class="col-md-3">
                    <?php
                    if ( is_search() ) {
                        get_sidebar( 'search' );
                    } else {
                        get_sidebar( 'page' );
                    }
                    ?>
                </div>
            </div>
        </main><!-- #main -->    </div><!-- #primary -->    </div><!-- .bb-grid -->    </div><!-- .container -->		<section class="top pt-5">        <div class="container">            <?php include_once(AOD_COMP . 'progress-bar.php'); ?>            <?php require(AOD_COMP . 'f-ask-your-question.php'); ?>        </div>    </section>

    <div class="bb-grid"><!-- bb required in footer  -->
        <div class="container"><!-- bb required in footer -->
<?php
get_footer();
