                    <?php do_action( THEME_HOOK_PREFIX . 'end_content' ); ?>
                </div><!-- .bb-grid -->
            </div><!-- .container -->
        </div><!-- #content -->

        <?php do_action( THEME_HOOK_PREFIX . 'after_content' ); ?>

        <?php if ( ! function_exists( 'bp_is_register_page' ) || ! bp_is_register_page() ) : ?>

            <?php if ( ! function_exists( 'bp_is_activation_page' ) || ! bp_is_activation_page() ) : ?>

                <div class="ask-a-question">
                    <div class="container">
                        <h5 class="h1 text-center">Ready to talk about treatment?</h3>

                        <div class="row">
                            <div class="col-xs-6 col-md-6 text-center bottom-cta">
                                <a href="tel:+1-844-505-4799"><i class="fas fa-phone"></i><h4>Call us: (844) 505-4799</h4></a>
                                <input id="_1" type="checkbox">
                                <label class="drop" for="_1">Or, Get a Call Back »</label>

                                <div class="ctm-call-widget-container">
                                    <p>Enter your phone number and get a call usually within 5 minutes.</p>
                                    <iframe class="ctm-call-widget" src="https://app.calltrackingmetrics.com/form_reactors/FRT472ABB2C5B9B141A95E7A133293232FB64726C81D4381AEFF2617EDD86B68F50" style="width:100%;height:300px;border:none"></iframe>
                                </div>
                            </div>

                            <!--<div class="col-xs-6 col-md-4 text-center bottom-cta" style="display:none;">
                                <a data-toggle="modal" data-target="#main-insurance-form" href="#"><i class="fas fa-id-card"></i> <h4>Submit Insurance</h4></a>
                            </div>-->

                            <div class="col-xs-6 col-md-6 text-center bottom-cta">
                                <a href="sms:+18445054799"><i class="fas fa-mobile-alt"></i><h4>Text us: (844) 505-4799</h4></a>
                                <!--<a data-toggle="modal" data-target="#main-insurance-form" href="#" class="insurance-link" style="display:none;">Or, Submit Insurance »</a>-->
                            </div>

                            <!--<div class="col-xs-6 col-md-3 text-center bottom-cta" style="display:none;">
                                <i class="fas fa-phone"></i>
                                <h4 class="oswald-med-uppercase jc-blue-dark tablet-desktop"><a href="#" class="track jc-blue-dark" rel="contact endcap: FAQ">FAQ</a></h4>
                            </div>-->
                        </div>
                    </div>
                </div>

                <footer class="footer-2">
                    <div class="last-tier">
                        <div class="container">
                            <div class="row justify-content-between align-items-center">
                                <div class="col-sm-7">
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <p class="copyright">JourneyPure Locations</p>
                                            <a href="https://journeypure.com/locations/florida/" class="font-weight-bold">Panama City Rehab</span></a><br />
                                            <a href="https://journeypure.com/locations/tennessee/" class="font-weight-bold">Murfreesboro Rehab</span></a><br />
											<a href="https://journeypure.com/locations/knoxville/" class="font-weight-bold">Knoxville Rehab</span></a><br />
                                            <a href="https://journeypure.com/locations/kentucky/" class="font-weight-bold">Bowling Green Rehab</span></a><br />
                                        </div>
										<div class="col-sm-5">
                                            <p class="copyright">Special Programs</p>
                                            <a href="https://journeypure.com/locations/military-program/">Military Veteran Rehab</span></a><br />
											<a href="/suboxone-clinics/">Suboxone Treatment</a>

                                        </div>


                                    </div>

                                    <div class="copyright">
                                        &copy; <?php echo date('Y'); ?> <a href="https://journeypure.com/">JourneyPure</a>. All rights reserved | <a href="/terms-of-use/">Terms & Conditions</a> 	&middot;  <a href="/privacy-policy/">Privacy Policy</a>  &nbsp; <button class="btn btn-dark btn-sm " onclick="topFunction()"><i class="fas fa-chevron-up"></i> Back to Top</button>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </footer>

                <?php // include_once(JOURNEY_PURE_DIR . 'assets/src/includes/components/cta-widget.php'); ?>
                <?php include_once(get_stylesheet_directory()  . '/assets/src/not-ready.php'); ?>
			    <?php include_once(JOURNEY_PURE_DIR . 'assets/src/includes/components/frontman.php'); ?>

            <?php endif; ?>

        <?php endif; ?>

        <?php if ( ! empty( $_GET['activation_page'] ) ) : ?>

            <?php
                $activation_page = urldecode( $_GET['activation_page'] );
            ?>

            <div class="modal fade" id="activation-page-modal" tabindex="-1" role="dialog" aria-labelledby="Register" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-body" style="margin: 0; padding: 0;">
                            <iframe src="<?php echo $activation_page; ?>?modal=1" frameborder="0" allowtransparency="true" style="width: 100%; height: 800px;"></iframe>
                        </div>
                    </div>
                    <!-- /.modal-content -->
                </div>
                <!-- /.modal-dialog -->
            </div>
            <!-- /.modal -->

        <?php endif; ?>

        <?php do_action( THEME_HOOK_PREFIX . 'before_footer' ); ?>
        <?php do_action( THEME_HOOK_PREFIX . 'after_footer' ); ?>

        </div><!-- #page -->

        <div class="modal fade" id="aod-author-disclaimer" tabindex="-1" role="dialog" aria-labelledby="aod-author-disclaimer" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Disclaimer</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>

                    <div class="modal-body">
                        <p>All content is for informational purposes only. No material on this site, whether from our doctors or the community, is a substitute for seeking personalized professional medical advice, diagnosis or treatment. Never disregard advice from a qualified healthcare professional or delay seeking advice because of something you read on this website.</p>
                    </div>
                </div>
            </div>
        </div>

        <?php do_action( THEME_HOOK_PREFIX . 'after_page' ); ?>

        <?php wp_footer(); ?>

    </body>
</html>
