<?php
class LikedPosts{
    private $thePosts;
    private $paged;
    private $postPerPage;
    private $postOffset;

    public function __construct(){

    }
    public function setPosts($postPerPage = 10, $paged = 1, $postOffset = 0){
        $this->postPerPage = $postPerPage;
        $this->paged = $paged;
        $this->postOffset = $postOffset;

        $query_args  = array(
            'post_type' => 'post',
            'orderby' => 'meta_value',
            'order' => 'DESC',
            'post_status' => array( 'publish'),
            'posts_per_page' => $this->postPerPage,
            'paged'=> $this->paged,
            'offset' => $this->postOffset,
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
         $this->thePosts = new WP_Query($query_args);


    }

    public function getPosts()
    {
        return $this->thePosts;
    }
}