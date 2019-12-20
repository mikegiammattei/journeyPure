<?php require_once(get_stylesheet_directory() . '/classes/geoplugin.class.php');

// User Data
require_once(THEME_PATH . '/classes/User.php');
$User = new User();

require_once(THEME_PATH . '/classes/Chat.php');
$Chat = new \CTA\Chat();
?>
<!--<div class="cta-widget">-->
<!--	<div class="callout --><?php /////*echo ($Chat->isLocal) ? : ' not-local'; ?><!-- h5">-->
<!--		Get Help Now <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">-->
<!--			<span class="close-btn">×</span>-->
<!--		</button>-->
<!--		--><?php ///*if($Chat->isLocal): */?>
<!--		<span class="local-msg">We're <i>in-network</i> with insurances and have a location near --><?php ///*echo ltrim($Chat->getCity()); */?><!--.</span>-->
<!--		--><?php ///*else: */?>
<!--		<span class="local-msg">We're <i>in-network</i> with insurances.</span>-->
<!--		--><?php ///*endif; */?>
<!--	</div>-->
<!--</div>-->
<div class="cta-widget">
	<div class="callout <?php echo ($Chat->isLocal) ? : ' not-local'; ?> h5">
		Get Help Now <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
					<span class="close-btn">×</span>
				</button>
		<?php if($Chat->isLocal): ?>
			<span class="local-msg">We're <i>in-network</i> with insurances and have a location near <?php echo ltrim($Chat->getCity()); ?>.</span>
			<?php else: ?>
			<span class="local-msg">We're <i>in-network</i> with insurances.</span>
		<?php endif; ?>
	</div>

	<div class="info">
		<div class="row">
			<div id="chat-ctm-btn" class="col-auto">
				<div class="chat-box" >
					<i class="fas fa-comments"></i> Chat
				</div>
			</div>
			<div class="col-auto call-button">
				<div class="call-box">
					<i class="fas fa-phone"></i> Call <a class="phone" href="tel:<?php echo get_option('defaultPhone'); ?>"><?php echo get_option('defaultPhone'); ?></a>
				</div>
			</div>
		</div>
	</div>
</div>

<!--<div class="ctm-chat-container">
	<iframe  id="ctm-chat-widget" class="ctm-call-widget ctm-chat-widget" src="https://130400.tctm.co/form/FRT472ABB2C5B9B141A95E7A133293232FBB3EFEC59E103154BC3C3A194C8DE5FD3.html"></iframe>
	<script defer async src="https://130400.tctm.co/formreactor.js"></script>
</div>
            -->








