<?php
/**
 * Note Box
 *
 * @author   Fernando Tessmann
 * @package  JourneyPure
 */

?> <?php if ( is_page_template( 'template-homepage-2.php' ) ) : ?><div class="note-box"><p>We're accepting limited inpatient admissions with additional pre-screening procedures. Outpatient services, family therapy and alumni meetings are virtual-only.</p><span class="note-cta"><i class="fas fa-phone"></i> Learn More <?php echo esc_html( get_option( 'defaultPhone' ) ); ?></span></div> <?php elseif ( is_page_template( 'template-outpatient-2.php' ) ) : ?><div class="note-box note-box-alert"><h5>Due to COVID-19, all Suboxone programs are online-only.</h5><p>See your doctor or therapist while at home using an app like FaceTime instead of coming in person. Doctors still prescribe medications. Call to schedule your virtual appointment.</p><span class="note-cta"><i class="fas fa-phone"></i> Call Now <?php echo esc_html( get_option( 'defaultPhone' ) ); ?></span></div> <?php elseif ( is_singular( 'locations' ) ) : ?><div class="note-box"><p>This location is accepting limited admissions with additional pre-screening procedures. To learn more, call <?php echo esc_html( get_option( 'defaultPhone' ) ); ?>.</p></div> <?php elseif ( is_singular( 'op' ) ) : ?> <?php endif; ?>