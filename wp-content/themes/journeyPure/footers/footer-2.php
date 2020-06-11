<?php
				require_once(get_stylesheet_directory() . '/classes/Footer.php');
				$Footer = new \Footer\Footer();
			?><div class="ask-a-question"><div class="container"><h5 class="h1 text-center">Still have questions?</h3><div class="row"><div class="col-xs-6 col-md-6 text-center bottom-cta"><a href="tel:+1-844-505-4799"><i class="fas fa-phone"></i><h4>Call us: (844) 505-4799</h4></a> <input id="_1" type="checkbox"> <label class="drop" for="_1">Or, Get a Call Back »</label><div class="ctm-call-widget-container"><p>Enter your phone number and get a call usually within 5 minutes.</p><iframe class="ctm-call-widget" src="https://app.calltrackingmetrics.com/form_reactors/FRT472ABB2C5B9B141A95E7A133293232FB64726C81D4381AEFF2617EDD86B68F50" style="width:100%;height:300px;border:none"></iframe></div></div><div class="col-xs-6 col-md-4 text-center bottom-cta" style="display:none;"><a data-toggle="modal" data-target="#main-insurance-form" href="#"><i class="fas fa-id-card"></i><h4>Submit Insurance</h4></a></div><div class="col-xs-6 col-md-6 text-center bottom-cta"><a href="sms:+18445054799"><i class="fas fa-mobile-alt"></i><h4>Text us: (844) 505-4799</h4></a> <a data-toggle="modal" data-target="#main-insurance-form" href="#" class="insurance-link" style="display:none;">Or, Submit Insurance »</a></div><div class="col-xs-6 col-md-3 text-center bottom-cta" style="display:none;"><i class="fas fa-phone"></i><h4 class="oswald-med-uppercase jc-blue-dark tablet-desktop"><a href="#" class="track jc-blue-dark" rel="contact endcap: FAQ">FAQ</a></h4></div></div></div></div><footer class="footer-2"><div class="last-tier"><div class="container"><div class="row justify-content-between align-items-center"><div class="col-sm-6"><div class="row"><div class="col-sm-4"><p class="link-list-header">Rehab Locations</p> <a href="/locations/florida/" class="font-weight-bold">Florida <span class="hide-for-tablet">Rehab</span></a><br/> <a href="/locations/tennessee/" class="font-weight-bold">Tennessee <span class="hide-for-tablet">Rehab</span></a><br/> <a href="/locations/kentucky/" class="font-weight-bold">Kentucky <span class="hide-for-tablet">Rehab</span></a><br/> <a href="/locations/military-program/" class="font-weight-bold">Veteran <span class="hide-for-tablet">Rehab</span></a></div><div class="col-sm-6"><p class="link-list-header">Ask Our Doctors</p> <a href="/ask-our-doctors/">Addiction Help</a><br/> <a href="/suboxone-clinics/">Suboxone Clinics</a><br/> <a href="/ask-our-doctors/alumni/what-do-i-do-if-i-relapse/">Relapse</a><br/> <a href="/ask-our-doctors/alcohol/what-is-wet-brain/">Wet Brain</a></div></div><div class="copyright"> &copy; <?php echo date('Y'); ?> JourneyPure. All rights reserved | <a href="/terms-of-use/">Terms & Conditions</a> &middot; <a href="/privacy-policy/">Privacy Policy</a> &nbsp; <button class="btn btn-dark btn-sm " onclick="topFunction()"><i class="fas fa-chevron-up"></i> Back to Top</button></div></div><div class="col-sm-6"></div></div></div></div></footer> <?php include_once(get_stylesheet_directory() . '/assets/src/includes/components/cta-widget.php'); ?> <?php include_once(get_stylesheet_directory() . '/assets/src/includes/components/leave-a-review.php'); ?> <?php include_once(get_stylesheet_directory() . '/assets/src/includes/components/not-ready-component.php'); ?> <?php include_once(get_stylesheet_directory() . '/assets/src/includes/components/exit-modal.php'); ?> <?php include_once(get_stylesheet_directory() . '/assets/src/includes/components/review-video-modal.php'); ?></div> <?php /** end of main wrapper */ ?> <?php if ( ! isset( $_GET['DEV'] ) ) : ?><script src="//code.jquery.com/jquery-3.4.1.min.js"></script><script src="//cdnjs.cloudflare.com/ajax/libs/html5shiv/3.6.1/html5shiv.js"></script><script src="//cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js"></script><script src="<?php echo get_stylesheet_directory_uri() . '/js/vendor.min.js?v=20200602'; ?>"></script><script src="<?php echo get_stylesheet_directory_uri() . '/js/custom.min.js?v=20200602'; ?>"></script> <?php endif; ?> <?php wp_footer(); ?></body></html>