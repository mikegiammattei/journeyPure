<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package BuddyBoss_Theme
 */
?>
<!doctype html>
<html <?php language_attributes(); ?>>
	<head>
		<meta charset="<?php bloginfo( 'charset' ); ?>">
		<!-- Google Tag Manager -->
<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
})(window,document,'script','dataLayer','GTM-NKJHBM9');</script>
<!-- End Google Tag Manager -->
		<link rel="profile" href="http://gmpg.org/xfn/11">
        <style type="text/css">#signup-form .field_nickname{display: none;}</style>
		<?php wp_head(); ?>
	</head>

	<body <?php body_class(); ?>>
<!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-NKJHBM9"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->
		<?php if (!is_singular('llms_my_certificate')):
		 
			do_action( THEME_HOOK_PREFIX . 'before_page' ); 
	
		endif; ?>

		<div id="page" class="site">

			<?php do_action( THEME_HOOK_PREFIX . 'before_header' ); ?>

			<header id="masthead" class="<?php echo apply_filters( 'buddyboss_site_header_class', 'site-header' ); ?>">
				<?php do_action( THEME_HOOK_PREFIX . 'header' ); ?>
			</header>

			<?php do_action( THEME_HOOK_PREFIX . 'after_header' ); ?>

			<?php do_action( THEME_HOOK_PREFIX . 'before_content' ); ?>

			<div id="content" class="site-content">

				<?php do_action( THEME_HOOK_PREFIX . 'begin_content' ); ?>

				<div class="container">
					<div class="<?php echo apply_filters( 'buddyboss_site_content_grid_class', 'bb-grid site-content-grid' ); ?>">
