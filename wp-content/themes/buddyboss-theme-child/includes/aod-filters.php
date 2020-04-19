<?php

add_filter('related_posts_by_taxonomy_widget_args', 'aod_related_post_by_taxonomy_widget_title_change', 10, 2);
function aod_related_post_by_taxonomy_widget_title_change($args,$settings){

    global $post;
    $perma_cat = get_post_meta($post->ID , '_category_permalink', true);
    if ( $perma_cat != null ) {
        $cat_id = $perma_cat['category'];
        $category = get_category($cat_id);
    } else {
        $categories = get_the_category();
        $category = $categories[0];
    }
    $category_link = get_category_link($category);
    $category_name = $category->name;

    $args['title'] = $args['title'] . ": " . $category_name;
    return $args;
}
