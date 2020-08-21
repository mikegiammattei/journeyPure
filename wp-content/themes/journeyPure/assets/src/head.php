<?php
	/** Global Controllers */

	// Enable Third Party Scripts
	Define("THIRD_PARTY_SCRIPTS", true);
?>

<?php session_start(); ?>
<?php
	include_once(get_stylesheet_directory() . '/classes/ThirdPartyScripts.php');
	$ThirdPartyScripts  = new \Scripts\ThirdPartyScripts();
?>

<!doctype html>
<!--[if lt IE 7]> <html class="no-js ie6 oldie" <?php language_attributes(); ?>> <![endif]-->
<!--[if IE 7]>    <html class="no-js ie7 oldie" <?php language_attributes(); ?>> <![endif]-->
<!--[if IE 8]>    <html class="no-js ie8 oldie" <?php language_attributes(); ?>> <![endif]-->
<!--[if gt IE 8]><!--> <html <?php language_attributes(); ?>> <!--<![endif]-->
<head>
	<!--=== META TAGS ===-->
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<meta charset="<?php bloginfo( 'charset' ); ?>" />
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

	<!--=== LINK TAGS ===-->
	<link rel="shortcut icon" href="<?php echo THEME_DIR; ?>/favicon.ico" />
	<link rel="alternate" type="application/rss+xml" title="<?php bloginfo('name'); ?> RSS2 Feed" href="<?php bloginfo('rss2_url'); ?>" />
	<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />

	<!--=== TITLE ===-->
	<title><?php wp_title(); ?> - <?php bloginfo( 'name' ); ?></title>

	<?php wp_head(); ?>

	<?php // echo $ThirdPartyScripts->getHeadScripts(THIRD_PARTY_SCRIPTS) ?>

	<!-- https://web.dev/uses-rel-preconnect/ -->
	<?php if ( ! jp_is_bot() ) : ?>
		<link rel="preconnect" href="https://chatservice.makerobos.com">
	<?php endif; ?>

	<!-- https://web.dev/uses-rel-preload/ -->
	<link rel="preload" as="font" href="<?php echo THEME_DIR; ?>/fonts/Montserrat-Thin.otf" type="font/otf" crossorigin="anonymous">
	<link rel="preload" as="font" href="<?php echo THEME_DIR; ?>/fonts/Montserrat-ExtraLight.otf" type="font/otf" crossorigin="anonymous">
	<link rel="preload" as="font" href="<?php echo THEME_DIR; ?>/fonts/Montserrat-Light.otf" type="font/otf" crossorigin="anonymous">
	<link rel="preload" as="font" href="<?php echo THEME_DIR; ?>/fonts/Montserrat-Regular.otf" type="font/otf" crossorigin="anonymous">
	<link rel="preload" as="font" href="<?php echo THEME_DIR; ?>/fonts/Montserrat-Medium.otf" type="font/otf" crossorigin="anonymous">
	<link rel="preload" as="font" href="<?php echo THEME_DIR; ?>/fonts/Montserrat-SemiBold.otf" type="font/otf" crossorigin="anonymous">
	<link rel="preload" as="font" href="<?php echo THEME_DIR; ?>/fonts/Montserrat-Bold.otf" type="font/otf" crossorigin="anonymous">
	<link rel="preload" as="font" href="<?php echo THEME_DIR; ?>/fonts/Montserrat-ExtraBold.otf" type="font/otf" crossorigin="anonymous">
	<link rel="preload" as="font" href="<?php echo THEME_DIR; ?>/fonts/Montserrat-Black.otf" type="font/otf" crossorigin="anonymous">
	<link rel="preload" as="font" href="<?php echo THEME_DIR; ?>/fonts/webfonts/fa-solid-900.woff2" type="font/woff2" crossorigin="anonymous">
	<link rel="preload" as="font" href="<?php echo THEME_DIR; ?>/fonts/webfonts/fa-regular-400.woff2" type="font/woff2" crossorigin="anonymous">

	<!-- GOOGLE FONTS -->
	<?php
		$cache_key             = 'styles-google-fonts';
		$google_fonts_css_body = get_transient( $cache_key );

		if ( false === $google_fonts_css_body ) {
			$google_fonts_css = wp_remote_get( 'https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap' );

			if ( ! is_wp_error( $google_fonts_css ) && ! empty( $google_fonts_css ) ) {
				$google_fonts_css_body = wp_remote_retrieve_body( $google_fonts_css );
				$google_fonts_css_body = trim( preg_replace( '/\s+/', ' ', $google_fonts_css_body ) );
				set_transient( $cache_key, $google_fonts_css_body, DAY_IN_SECONDS );
			}
		}

		if ( false !== $google_fonts_css_body ) {
			// phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
			echo '<style id="' . $cache_key . '">' . $google_fonts_css_body . '</style>';
		}
	?>

	<!-- PAGE STYLE -->
	<?php
		$page_stylesheet = ( defined( 'STYLESHEET_NAME' ) ? STYLESHEET_NAME : 'style' );
		// Stylesheet::set_main_path( $page_stylesheet );
		Stylesheet::set_main_path_inline( $page_stylesheet );
	?>
</head>
<body <?php body_class(); ?>>
	<?php if ( ! jp_is_bot() ) : ?>
		<noscript>
			<iframe src="https://www.googletagmanager.com/ns.html?id=GTM-NKJHBM9" height="0" width="0" style="display:none; visibility:hidden"></iframe>
		</noscript>
	<?php endif; ?>
	<?php // echo addslashes($ThirdPartyScripts->getBodyNoScripts(THIRD_PARTY_SCRIPTS)) ?>
	<?php
		require_once(get_stylesheet_directory() . "/classes/Schema.php");
		$Schema = new Schema();
		$Schema->getMarkup();
	?>
