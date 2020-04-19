



<?php do_action( THEME_HOOK_PREFIX . 'end_content' ); ?>

</div><!-- .bb-grid -->
</div><!-- .container -->
</div><!-- #content -->

<?php do_action( THEME_HOOK_PREFIX . 'after_content' ); ?>
<footer>
    <div class="sub-tier">
        <div class="container">
            <div class="row justify-content-between align-items-center">
                <div class="col-sm-6">
                    <div class="text-action">
                        <span class="subheading">Do you have questions?</span>
                        <p class="page-heading heading">Let's Talk.</p>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="phone-action">
                        <script defer async src="https://dv36c15u2wg3n.cloudfront.net/assets/form_reactors.js"></script>
                        <div class="ctm-call-widget-container">
                            <iframe class="ctm-call-widget" src="https://app.calltrackingmetrics.com/form_reactors/FRT472ABB2C5B9B141A95E7A133293232FB64726C81D4381AEFF2617EDD86B68F50" style="width:100%;height:300px;border:none"></iframe>
                        </div>
                        <?php if(isset($_GET['not_ready'])): ?>
                            <span class="not-ready-link" data-toggle="modal" data-target="#not-ready-modal"><i class="fas fa-question"></i> Not ready? Click here.</span>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="last-tier">
        <div class="container">
            <div class="row justify-content-between align-items-center">
                <div class="col-sm-6">
                    <p>
                        <a  href="/">Get Help - JourneyPure</a><br>
                        <a href="/locations/florida/">Florida Rehab</a> · <a href="/locations/tennessee/">Tennessee Rehab</a> · <a href="/locations/kentucky/">Kentucky Rehab</a>
                    </p>
                    <div class="copyright">
                        &copy; <?php echo date('Y'); ?> JourneyPure | <a href="/terms-of-use/">Terms </a> 	&middot;  <a href="/privacy-policy/">Privacy Policy &nbsp; </a> <button class="btn btn-dark btn-sm " onclick="topFunction()"><i class="fas fa-chevron-up"></i> Back to Top</button>
                    </div>
                </div>
                <div class="col-sm-6">
                </div>
            </div>
        </div>
    </div>
</footer>
<?php include_once(JOURNEY_PURE_DIR . 'assets/src/includes/components/cta-widget.php'); ?>
<?php if(isset($_GET['not_ready'])) {include_once(get_stylesheet_directory()  . '/assets/src/not-ready.php');} ?>
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
