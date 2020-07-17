<?php
if ( isset($_REQUEST) ) {
    require_once($_SERVER['DOCUMENT_ROOT'] . "/wp-load.php");
    require_once(AOD_CLASSES . 'LikedPosts.php');
    $LikedPosts= new LikedPosts();

    $returnArr = array();

    $returnArr['success'] = false;
    $returnArr['loggedIn'] = is_user_logged_in();
    $show_per_page =  $_REQUEST['show_per_page'];
    $offset =  $_REQUEST['offset'];

    // Get total paged count
    $total_post_count = wp_count_posts();
    $published_post_count = $total_post_count->publish;
    $total_pages = ceil( $published_post_count / $show_per_page );

    if($total_pages > $_REQUEST['postPaged'] ):
        $paged =  $_REQUEST['postPaged'];

        $paged++;

        $LikedPosts->setPosts($show_per_page,$paged,$offset);

        $returnArr['posts'] = $LikedPosts->getPosts();

        $thePosts = $returnArr['posts'];
        if ($thePosts->have_posts()):
            $count = 0;
            while($thePosts->have_posts()):
                $thePosts->the_post();
                $id = get_the_ID();
                ?>

                <div class="item">
                    <a href="<?php the_permalink(); ?>">
                        <h3 class="title"><?php echo the_title();?></h3>
                        <?php $post_custom = get_post_custom( get_the_ID() ); ?></a>
                    <div class="vote-buttons-list"><?php
                        //if(isset($post_custom['Likes'][0]) && $post_custom['Likes'][0] > 0):
                            echo do_shortcode('[likebtn theme="custom" f_size="17" icon_l_url="https://www.journeypure.com/ask-our-doctors/wp-content/uploads/sites/2/2020/02/upvote-green-1.png#1701" icon_l_url_v="https://www.journeypure.com/ask-our-doctors/wp-content/uploads/sites/2/2020/02/upvote-voted-green-1.png#1702" icon_d_url="https://www.journeypure.com/ask-our-doctors/wp-content/uploads/sites/2/2020/02/downvote-1.png#1700" icon_d_url_v="https://www.journeypure.com/ask-our-doctors/wp-content/uploads/sites/2/2020/02/downvote-comments-clicked-1.png#1750" label_c="#9a9c99" label_c_v="#00953b" counter_l_c="#9a9c99" bg_c="#ffffff" bg_c_v="#ffffff" brdr_c="#ffffff" f_family="Verdana" counter_type="subtract_dislikes" i18n_like="Upvote" white_label="1" addthis_service_codes="facebook,twitter,email,linkedin" bp_notify="0" bp_activity="1" bp_hide_sitewide="1"]');
                        //endif;
                        ?></div>
                    <div class="category-list">
                        <?php
                        $category = get_the_category();
                        $useCatLink = true;
                        if ($category){
                            $category_display = '';
                            $category_link = '';
                            if ( class_exists('WPSEO_Primary_Term') )
                            {
                                $wpseo_primary_term = new WPSEO_Primary_Term( 'category', get_the_id() );
                                $wpseo_primary_term = $wpseo_primary_term->get_primary_term();
                                $term = get_term( $wpseo_primary_term );
                                if (is_wp_error($term)) {
                                    $category_display = $category[0]->name;
                                    $category_link = get_category_link( $category[0]->term_id );
                                } else {
                                    $category_display = $term->name;
                                    $category_link = get_category_link( $term->term_id );
                                }
                            }
                            else {
                                $category_display = $category[0]->name;
                                $category_link = get_category_link( $category[0]->term_id );
                            }
                            if ( !empty($category_display) ){
                                if ( $useCatLink == true && !empty($category_link) ){

                                    echo '<li class="cat-item"><a href="'.$category_link.'">'.htmlspecialchars($category_display).'</a></li>';
                                } else {
                                    //echo '<span class="post-category">'.htmlspecialchars($category_display).'</span>';
                                }
                            }

                        }
                        ?>
                    </div>
                    <div class="show-comments"><?php
                        // Post Comment Count
                        $args = array(
                            'post_id' => $id,
                            'count'   => true
                        );
                        $comments_count = get_comments( $args );

                        if($comments_count > 0):
                            ?>
                            <i class="bb-icon-comment"></i> <?php echo $comments_count;
                            ?>

                        <?php endif; ?>
                    </div>
                </div>
            <?php
            endwhile;
            wp_reset_query();
    endif;


    ?>

<?php endif;








}
// Always die in functions echoing ajax content
die();
?>
