<?php get_header(); ?><div class="container"> <?php if ( have_posts() ) : while ( have_posts() ) : the_post();
			echo $post->post_content;
		endwhile; endif; ?></div> <?php get_footer(); ?>