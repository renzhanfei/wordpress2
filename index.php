<?php
/**
 * Front to the WordPress application. This file doesn't do anything, but loads
 * wp-blog-header.php which does and tells WordPress to load the theme.
 *
 * @package WordPress
 */

/**
 * Self mutiplesite switch by browser language
 */
if (strtolower($_SERVER['HTTP_HOST']) === 'my.oasgames.com') {
	//get browser language
	$browserLang = substr($_SERVER['HTTP_ACCEPT_LANGUAGE'], 0, 4);
	if (stripos($browserLang, 'zh') === 0) {
		$redirecto = 'zh.oasgames.com';
	} elseif (stripos($browserLang, 'en') === 0) {
		$redirecto = 'en.oasgames.com';
	} elseif (stripos($browserLang, 'ja') === 0) {
		$redirecto = 'ja.oasgames.com';
	} else {
		$redirecto = 'en.oasgames.com';
	}
	
	$uriRedirect = $_SERVER['REQUEST_URI'];
	
	header('HTTP/1.1 302 Moved Permanently');
	header('Location:https:' . $redirecto . $uriRedirect);
	exit;
}

/**
 * Tells WordPress to load the WordPress theme and output it.
 *
 * @var bool
 */
define( 'WP_USE_THEMES', true );

/** Loads the WordPress Environment and Template */
require( dirname( __FILE__ ) . '/wp-blog-header.php' );
