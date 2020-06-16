<?php
/**
 * Template Name: Outpatient 2
 *
 * @author   Fernando Tessmann
 * @package  JourneyPure
 */

require_once get_stylesheet_directory() . '/classes/Outpatient2.php';
$outpatient_2 = new Pages\Outpatient2();

get_header();
?><div id="jp-outpatient" class="jp-outpatient"><section class="jp-outpatient-section jp-outpatient-masthead"><div class="container"><div class="row"><div class="col-12 col-md-10 offset-md-1 col-lg-8 offset-lg-2"><h1 class="jp-outpatient-masthead-h1"><?php echo esc_html( $outpatient_2->masthead_title ); ?></h1><h2 class="jp-outpatient-masthead-h2"><?php echo esc_html( $outpatient_2->masthead_subtitle ); ?></h2></div></div><div class="row"><div class="col-12 col-md-6 col-lg-7"><div class="embed-responsive embed-responsive-16by9 youtube-video-place lazy" data-src="/wp-content/themes/journeyPure/assets/img/journeypure-rehab-review.jpg" style="cursor: pointer; background: no-repeat center; background-size: cover;" data-yt-url="https://www.youtube.com/embed/kNj08KeNbIA?rel=0&showinfo=0&autoplay=1"></div></div><div class="col-12 col-md-6 col-lg-5"><div class="jp-outpatient-masthead-content"><h3 class="jp-outpatient-masthead-h3">If you're sick of living with drugs or alcohol, but can't "just stop", you have two choices: sink or swim.</h3><div class="jp-outpatient-masthead-text"><p>The decision you make right now becomes your life.</p><p>If you feel too unmotivated or unsure to make a change, don't worry. That's exactly what the <?php echo esc_html( $outpatient_2->city ); ?> Clinic is for.</p><p>Whether it's here or not, make the call and show up. Everything will start to come together after that. You can do this!</p></div><a class="jp-outpatient-masthead-phone hide-for-sm" href="tel:844-505-4799" title="Call (844) 505-4799 to talk now."><i class="fas fa-phone"></i> (844) 505-4799</a><a class="jp-outpatient-masthead-phone show-for-sm" href="javascript:void(0);" data-toggle="tooltip" data-placement="top" data-trigger="click" title="Call (844) 505-4799 to talk now."><i class="fas fa-phone"></i> (844) 505-4799</a></div></div></div></div></section></div> <?php get_footer();
