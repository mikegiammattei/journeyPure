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
<!-- Anti-flicker snippet (recommended)  -->
<style>.async-hide { opacity: 0 !important} </style>
<script>(function(a,s,y,n,c,h,i,d,e){s.className+=' '+y;h.start=1*new Date;
h.end=i=function(){s.className=s.className.replace(RegExp(' ?'+y),'')};
(a[n]=a[n]||[]).hide=h;setTimeout(function(){i();h.end=null},c);h.timeout=c;
})(window,document.documentElement,'async-hide','dataLayer',8000,
{'GTM-NKJHBM9':true});</script>

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

	<?php //echo $ThirdPartyScripts->getHeadScripts(THIRD_PARTY_SCRIPTS) ?>

	<?php
	// Stylesheet Handler
	$pageStylesheet = (defined('STYLESHEET_NAME') ? STYLESHEET_NAME :'style' );
	Stylesheet::setMainPath($pageStylesheet);
	?>

</head>
<body <?php body_class(); ?>>
<noscript>
	<iframe src="https://www.googletagmanager.com/ns.html?id=GTM-NKJHBM9" height="0" width="0" style="display:none; visibility:hidden"></iframe>
</noscript>
<?php //echo addslashes($ThirdPartyScripts->getBodyNoScripts(THIRD_PARTY_SCRIPTS)) ?>
<?php
	require_once(get_stylesheet_directory() . "/classes/Schema.php");
	$Schema = new Schema();
	$Schema->getMarkup();
?>
