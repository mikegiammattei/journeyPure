<?php require_once(WP_CONTENT_DIR . '/themes/journeyPure/classes/geoplugin.class.php');

// User Data
require_once(WP_CONTENT_DIR . '/themes/journeyPure/classes/User.php');
$User = new User();

require_once(WP_CONTENT_DIR . '/themes/journeyPure/classes/Chat.php');
$Chat = new \CTA\Chat();
?> <?php /////*echo ($Chat->isLocal) ? : ' not-local'; ?> <?php ///*if($Chat->isLocal): */?> <?php ///*echo ltrim($Chat->getCity()); */?> <?php ///*else: */?> <?php ///*endif; */?><div class="cta-widget"><div class="callout <?php echo ($Chat->isLocal) ? : ' not-local'; ?> h5"> Get Help Now <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close"> <span class="close-btn">×</span></button> <?php if($Chat->isLocal): ?> <span class="local-msg">We're <i>in-network</i> with insurances and have a location near <?php echo ltrim($Chat->getCity()); ?>.</span> <?php else: ?> <span class="local-msg">We're <i>in-network</i> with insurances.</span> <?php endif; ?></div><div class="info"><div class="row"><div id="chat-ctm-btn" class="col-auto"><div class="chat-box"><i class="fas fa-comments"></i> Chat</div></div><div class="col-auto call-button"><div class="call-box"><a class="phone" href="tel:<?php echo get_option('defaultPhone'); ?>"><i class="fas fa-phone"></i> Call <?php echo get_option('defaultPhone'); ?></a></div></div></div></div></div>