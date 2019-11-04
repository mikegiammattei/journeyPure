<?php require_once(get_stylesheet_directory() . '/classes/geoplugin.class.php');

// User Data
require_once(THEME_PATH . '/classes/User.php');
$User = new User();

require_once(THEME_PATH . '/classes/Chat.php');
$Chat = new \CTA\Chat();
?>
<div class="cta-widget">
	<div class="callout <?php echo ($Chat->isLocal) ? : ' not-local'; ?>">
		Get help now. <span class="close-btn">x</span>
		<?php if($Chat->isLocal): ?>
			<span class="local-msg">(Yes, we have a location near <?php echo ltrim($Chat->getCity()); ?>)</span>
		<?php endif; ?>
	</div>
	<div class="info">
		<div class="row">
			<div class="col-auto">
				<div class="chat-box">
					<i class="fas fa-comments"></i> Chat
				</div>
			</div>
			<div class="col-auto">
				<div class="call-box">
					<i class="fas fa-phone"></i> Chat <a class="phone" href="<?php echo get_option('defaultPhone'); ?>"><?php echo get_option('defaultPhone'); ?></a>
				</div>
			</div>
		</div>
	</div>
</div>
