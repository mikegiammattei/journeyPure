<?php

class OverrideFunctions{



    public function getArchiveTitle(){



        if(is_category()){

            $category = get_queried_object();



            $h1 = get_field('heading_1',"category_" . $category->term_id);

            global $post, $wp_query;

            if(!empty($h1)){

                $returnValue  = '<h1 class="page-title" style="display:inline-block">' . $h1 . '</h1>'. do_shortcode('[wpw_follow_term_me posttype="'.$post->post_type.'" taxonomy="category" termid="'.$wp_query->query_vars['cat'].'" disable_reload=true][/wpw_follow_term_me]');

            }else{

                $returnValue = 	the_archive_title( '<h1 class="page-title">', '</h1>' );

            }

        }

        else{

            $returnValue = 	the_archive_title( '<h1 class="page-title">', '</h1>' );

        }

        return $returnValue;

    }

}

