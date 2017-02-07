<?php
/**
 * @package Moharram
 * @version 1.0
 */
/*
Plugin Name: Moharram
Plugin URI: https://themeforest.net/user/saihoai
Description: This is not just a plugin.
Author: The Saihoai Team
Version: 1.0
Author https://themeforest.net/user/saihoai
*/

if( !defined( __DIR__ ) )
{
	define( __DIR__, dirname( __FILE__ ) );
}

if( function_exists( 'get_template' ) && get_template() != 'moharram' )
{
	return false;
}

require_once( __DIR__ . '/widgets/button.php' );
require_once( __DIR__ . '/widgets/wpcf7.php' );
require_once( __DIR__ . '/vc.php' );
require_once( __DIR__ . '/theme.php' );
require_once( __DIR__ . '/woo.php' );
require_once( __DIR__ . '/customizer.php' );
require_once( __DIR__ . '/tool.php' );


