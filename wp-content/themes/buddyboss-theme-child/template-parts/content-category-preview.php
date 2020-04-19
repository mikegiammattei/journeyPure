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

    <article  id="post-<?php the_ID(); ?>" class="card flex-md-row mb-4 box-shadow h-md-250">
        <div class="card-body d-flex flex-column align-items-start">
            <div class="row align-items-center">
                <div class="col-md-8">
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
                    <?php get_template_part( 'template-parts/entry','meta-ver-1' ); ?>
                    <?php echo wp_trim_words(get_the_content(),900,'<a href="'.get_post_permalink().'">  Read More</a>'); ?>
                </div>
                <div class="col-md-4 my-auto align-self-center">
                    <?php if(has_post_thumbnail()): ?>
                        <?php the_post_thumbnail('medium', array('class' => 'float-right')); ?>
                    <?php endif; ?>
                    <div class="mt-4">
                        <?php echo do_shortcode('[likebtn theme="custom" f_size="17" icon_l_url="http://multi.journeypure.com/ask-our-doctors/wp-content/uploads/sites/2/2020/02/upvote-green-1.png#1701" icon_l_url_v="http://multi.journeypure.com/ask-our-doctors/wp-content/uploads/sites/2/2020/02/upvote-voted-green-1.png#1702" icon_d_url="http://multi.journeypure.com/ask-our-doctors/wp-content/uploads/sites/2/2020/02/downvote-1.png#1700" icon_d_url_v="http://multi.journeypure.com/ask-our-doctors/wp-content/uploads/sites/2/2020/02/downvote-comments-clicked-1.png#1750" label_c="#9a9c99" label_c_v="#00953b" counter_l_c="#9a9c99" bg_c="#ffffff" bg_c_v="#ffffff" brdr_c="#ffffff" f_family="Verdana" counter_type="subtract_dislikes" i18n_like="Upvote" white_label="1" addthis_service_codes="facebook,twitter,email,linkedin" bp_notify="0" bp_activity="1" bp_hide_sitewide="1"]'); ?>
                    </div>
                </div>
            </div>
        </div>
    </article>

<?php
get_template_part( 'template-parts/content-subscribe' );
get_template_part( 'template-parts/author-box' );
get_template_part( 'template-parts/related-posts' );
