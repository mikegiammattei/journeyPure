<?php
/*
 * Template name: Homepage
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 */
/**
 * FileName: template-homepage.php
 * Description:
 *
 * Created by: JourneyPure.
 * Author:
 * Date: 2/13/2020
 */

get_header();

?>
        </div><!-- .bb-grid -->
    </div><!-- .container -->

<main id="homepage">

   <section class="top">
       <div class="container">
           <?php include_once(AOD_COMP . 'progress-bar.php'); ?>
           <?php require(AOD_COMP . 'f-ask-your-question.php'); ?>
       </div>
   </section>
    <section class="sub-info pb-5">
        <div class="container">
            <section class="block-1 text-center">
                <h1 class="mb-1">Addiction Help</h1>
                <h2 class="lead">
                    Drug, Alcohol & Mental Health Questions Answered by the Doctors at JourneyPure
                </h2>
            </section>
            <section class="bios mt-3">
                <div class="d-md-block d-lg-flex justify-content-center text-md-center">
                    <div class="item">
                        <div class="d-flex text-left">
                            <div class="profile">
                                <a href="/ask-our-doctors/members/dr-brian-wind-ph-d/"><img src="/wp-content/uploads/sites/2/avatars/5/5e503fb8bf1fc-bpfull.jpg" alt="Doctor of Psychology"></a>
                                <span class="badge badge-primary">Ph.D.</span>
                            </div>
                            <div>
                                <div class="info">
                                   <a href="/ask-our-doctors/members/dr-brian-wind-ph-d/"> <span class="d-block font-weight-bold">Dr. Brian Wind Ph.D.</span></a>
                                    <span class="d-block">Chief Clinical Officer</span>

                                    <div class="icon-items">
                                        <span class="d-block"><i class="fas fa-clock"></i> 16 years in the field</span>
                                        <span class="d-block"><i class="fas fa-graduation-cap"></i> Doctorate-Level</span>
                                        <span class="d-block"><i class="fas fa-grin"></i> In Recovery</span>
                                    </div>
									<?php
										echo do_shortcode('[wpw_follow_author_me author_id=5 disable_reload=true][/wpw_follow_author_me]');
										?>
                                </div>

                            </div>
                        </div>
                        <div class="media-outlets mt-3">
                            <div class="row no-gutters">
                                <div class="media-con">
                                    <div class="media-box">
                                        <div class="inner-con"> <img class="lazy" data-src="<?php echo JOURNEY_PURE_URL; ?>/assets/img/ref-logos/the-tennesseean-150x150.png" alt="The Tennesseen - Newspaper"></div>
                                    </div>
                                </div>
                                <div class="media-con">
                                    <div class="media-box">
                                        <div class="inner-con"> <img class="lazy" data-src="<?php echo JOURNEY_PURE_URL; ?>/assets/img/ref-logos/HUFF_POST.png" alt="The Huffington Post"></div>
                                    </div>
                                </div>
                                <div class="media-con">
                                    <div class="media-box">
                                        <div class="inner-con"> <img class="lazy" data-src="<?php echo JOURNEY_PURE_URL; ?>/assets/img/ref-logos/vanderbilt-150x150.png" alt="Vabderbilt University Research"></div>
                                    </div>
                                </div>
                                <div class="media-con">
                                    <div class="media-box">
                                        <div class="inner-con"> <img class="lazy" data-src="<?php echo JOURNEY_PURE_URL; ?>/assets/img/ref-logos/the-fix-150x150.png" alt="The Fix"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="d-flex">
                            <div class="profile">
                                <a href="/ask-our-doctors/members/dr-stephen-loyd-m-d/"><img src="/wp-content/uploads/sites/2/avatars/6/5e503f6d4f793-bpfull.jpg" alt="Medical Doctor"></a>
                                <span class="badge badge-primary">M.D.</span>
                            </div>
                            <div>
                                <div class="info">
                                     <a href="/ask-our-doctors/members/dr-stephen-loyd-m-d/"><span class="d-block font-weight-bold">Dr. Stephen Loyd, M.D.</span></a>
                                    <span class="d-block">Chief Medical Officer</span>

                                    <div class="icon-items">
                                        <span class="d-block"><i class="fas fa-clock"></i> 22 years in the field</span>
                                        <span class="d-block"><i class="fas fa-graduation-cap"></i> Doctorate-Level</span>
                                        <span class="d-block"><i class="fas fa-grin"></i> In Recovery</span>
                                    </div>
									<?php

echo do_shortcode('[wpw_follow_author_me author_id=6 disable_reload=true][/wpw_follow_author_me]');

?>
                                </div>

                            </div>
                        </div>
                        <div class="media-outlets mt-3">
                            <div class="row no-gutters">
                                <div class="media-con">
                                    <div class="media-box">
                                        <div class="inner-con"> <img class="lazy" data-src="<?php echo JOURNEY_PURE_URL; ?>/assets/img/ref-logos/nyt-150x150.png" alt="The New York Times"></div>
                                    </div>
                                </div>
                                <div class="media-con">
                                    <div class="media-box">
                                        <div class="inner-con"> <img class="lazy" data-src="/wp-content/uploads/sites/2/2020/03/the-today-show-logo.png" alt="The Today Show"></div>
                                    </div>
                                </div>
                                <div class="media-con">
                                    <div class="media-box">
                                        <div class="inner-con"> <img class="lazy" data-src="<?php echo JOURNEY_PURE_URL; ?>/assets/img/ref-logos/npr-150x150.png" alt="NPR"></div>
                                    </div>
                                </div>
                                <div class="media-con">
                                    <div class="media-box">
                                        <div class="inner-con"> <img class="lazy" data-src="/wp-content/uploads/sites/2/2020/03/CBS-News-Logo-1.png" alt="CBS Evening News"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </section>
    <section class="bb-content">
        <div class="container">
            <div class="row no-gutters">
                <div class="col-md-9">
                    <div class="top-posts">
                        <?php

                        include(get_stylesheet_directory() . '/classes/LikedPosts.php');
                        $LikedPosts = new LikedPosts();

                        $totalPostToLoad = 7;
                        $LikedPosts->setPosts($totalPostToLoad,1,'0');;

                        $thePosts  = $LikedPosts->getPosts();
                        if ($thePosts->have_posts()):
                            $count = 0;
                            while($thePosts->have_posts()):
                                $thePosts->the_post();
                                $id = get_the_ID();
                                ?>
                            <?php if($count == 0): ?>
                                <div class="header">
                                    <div class="d-flex">
                                        <h2 class="flex-grow-1  my-auto">
                                            The Top Questions
                                        </h2>


                                    </div>
                                </div>
                            <?php endif; $count++; ?>
                            <div class="item">
                                <a href="<?php the_permalink(); ?>">
                                    <h3 class="title"><?php echo the_title();?></h3>
                                    <?php $post_custom = get_post_custom( get_the_ID() ); ?></a>
                                    <div class="vote-buttons-list"><?php
                                        echo do_shortcode('[likebtn theme="custom" f_size="17" icon_l_url="https://www.journeypure.com/ask-our-doctors/wp-content/uploads/sites/2/2020/02/upvote-green-1.png#1701" icon_l_url_v="https://www.journeypure.com/ask-our-doctors/wp-content/uploads/sites/2/2020/02/upvote-voted-green-1.png#1702" icon_d_url="https://www.journeypure.com/ask-our-doctors/wp-content/uploads/sites/2/2020/02/downvote-1.png#1700" icon_d_url_v="https://www.journeypure.com/ask-our-doctors/wp-content/uploads/sites/2/2020/02/downvote-comments-clicked-1.png#1750" label_c="#9a9c99" label_c_v="#00953b" counter_l_c="#9a9c99" bg_c="#ffffff" bg_c_v="#ffffff" brdr_c="#ffffff" f_family="Verdana" counter_type="subtract_dislikes" i18n_like="Upvote" white_label="1" addthis_service_codes="facebook,twitter,email,linkedin" bp_notify="0" bp_activity="1" bp_hide_sitewide="1"]');
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
                            ?>
                            <div class="fill-posts-pagination">

                            </div>
                            <div class="pagination">
                                <?php

                                $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;

                                $total_post_count = wp_count_posts();
                                $published_post_count = $total_post_count->publish;
                                $total_pages = ceil( $published_post_count / $totalPostToLoad );

                                ?>
                            </div>

                    </div>
 <?php echo(wp_count_posts()->publish > $totalPostToLoad) ? '<p class="pagination-button d-inline-block" data-pagination-total="'.$total_pages.'" data-pagination-show-per-page="'.$totalPostToLoad.'" data-pagination-paged="1"><i class="fas fa-plus on"></i> Load More <i class="fas fa-spinner fa-spin in-motion" style="display: none"></i></p>' : '';  ?>

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

        </div>

    </section>

</main>
<div class="mission-container">
	<div class="home-mission">
	<h2>About Ask Our Doctors</h2>
		<div class="mission-top"><p>Ask Our Doctors exists to open up the conversation around addiction and mental health. After all, the knowledge our doctors have accumulated through their decades of research and experience doesn't do any good locked in their heads. Everyone deserves accurate health information and addiction help. </p>
		<p>
		The heart of Ask Our Doctors is questions — questions that help us be proactive about our well-being and the well-being of those around us. Ask Our Doctors encourages you to weigh in on every question. Your unique perspective is so valuable and can literally change someone's life. The more we make Ask Our Doctors a conversation, the better able we are to help the 20K+ people that visit the website every month. </p></div>

		<h3>What happens when I ask a question?</h3>
			<p>First, you'll be asked to sign up. This protects against spam and helps you find value in this community way beyond asking one question. (Don't worry, the form is only three questions). </p>
			<p>Your email is never shown publicly and your profile is not connected to your question. You can use initials or just your first name to be anonymous. </p>
			<p>Once signed up, the doctors get an email with your question and try to answer you within 72 hours. When your answer goes live on the website, you'll get an email. Any time feedback from the community is posted, you'll get an email too, though you can unsubscribe.</p>
			<p>In some cases, questions are not appropriate or repetitive. If that happens, the team will email you.</p>
		<hr />
		<h3>Who runs this website?</h3>
			<p>Ask Our Doctors is run by JourneyPure, a leader in addiction and mental health treatment. The doctors here have been in the field for decades and their expertise is referenced in national media like NBC and Forbes. Plus, they're in recovery themselves. (A quintessential source for addiction help). </p>
			<p>Ask Our Doctors is free for everyone and always will be. This website is one of many undertakings that help JourneyPure maintain a reputation for innovation and expertise — which, in turn, continues to attract the country's best therapists, physicians and recovery specialists. If you want to learn more about treatment here, great! Call (800) 756-9315.</p>
			<p>Either way, enjoy the website. You deserve accurate health information from actual experts.</p>
		<hr />
		<h3>What can I do on this site besides asking a question?</h3>
			<p>You can use your struggles and experiences for good by leaving feedback on other people's questions. Your advice just might be the fresh perspective they need. Click around and leave feedback on as many questions as you can!</p>
			<p>By just entering your email, you can "follow" a doctor or category to get notified when new questions are posted. No matter how much you follow, everything is in one personalized email sent only once a week and only if there's something new you will care about.  Following individual questions sends you an email when there is new feedback posted to the question from the doctors or community. It's also sent only once a week at max, so follow as many questions are you want! You don't have to sign up to the website to follow and you can unsubscribe any time.</p>
			<p>If you do sign up though, you can add your story to your profile to remind those still struggling that they are not alone.</p>
		<hr />
		<h3>Do I still need to see a doctor?</h3>
			<p>Yes! We recognize that you are going to research medical and clinical questions outside of seeking care. Being informed is a good thing! Ask Our Doctors exists to ensure your information is accurate, instead of coming from a random blog.</p>
			<p>That said, this website is for informational purposes only. It's not intended to be a substitute for professional medical advice, diagnosis or treatment. Always seek the advice of your physician or other qualified health provider with any questions regarding a medical condition. Never disregard professional medical advice or delay seeking it because of something you have read on the Ask Our Doctor's Site.</p>
			<hr />
		<h3>Who can I contact about issues with this website?</h3>
			<p>Thank you for taking the time to help us improve. Whether you want to point out a typo or something isn't working, we can help. Just email <a href="mailto:askourdoctors@journeyoure.com">AskOurDoctors@JourneyPure.com</a> and the team will get back to you. (You can reply to any email we send you too).</p>
			<p>Please note – if you're looking for <a href="https://journeypure.com/">addiction treatment</a>, the text or call feature on the website is much quicker.</p>
</div>
</div>
    <div class="bb-grid"><!-- bb required in footer  -->
        <div class="container"><!-- bb required in footer -->
<?php
get_footer();
?>
