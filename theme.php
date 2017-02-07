<?php

if( !function_exists( 'moharram_post_share' ) )
{
	function moharram_post_share()
	{
		$url = get_permalink();
		$title = get_the_title();
		$excerpt = get_the_excerpt();
		$media = "";
		if( has_post_thumbnail() ) 
		{
			list( $media ) = wp_get_attachment_image_src( get_post_thumbnail_id( get_the_ID() ), "full" );
		}

		$links = array(
			'<a href="'.esc_url('https://www.facebook.com/sharer/sharer.php?u='.$url).'" class="btn btn-facebook pull-right" target="_blank"><i class="fa fa-facebook"></i></a>',
			'<a href="'.esc_url('https://twitter.com/home?status='.$url).'" class="btn btn-twitter pull-right" target="_blank"><i class="fa fa-twitter"></i></a>',
			'<a href="'.esc_url('https://plus.google.com/share?url='.$url).'" class="btn btn-google pull-right" target="_blank"><i class="fa fa-google-plus"></i></a>',
			//'<a href="'.esc_url('https://www.linkedin.com/shareArticle?mini=true&url='.$url.'&title='.$title.'&summary='.$excerpt.'&source=').'" class="btn btn-primary pull-right" target="_blank"><i class="fa fa-linkedin"></i></a>',
			//'<a href="'.esc_url('https://pinterest.com/pin/create/button/?url='.$url.'&media='.$media.'&description='.$excerpt).'" class="btn btn-primary pull-right" target="_blank"><i class="fa fa-pinterest"></i></a>',
		);
		foreach( $links as $item )
		{
			echo $item;
		}
	}
}
add_action( 'moharram_post_share', 'moharram_post_share' );

if( !function_exists( 'moharram_page_title_author' ) )
{
	function moharram_page_title_author()
	{
		if( get_post_type() != 'post' )
		{
			return;
		}
		ob_start();
		require_once( __DIR__ . '/t/author.php' );
	}
}
add_action( 'moharram_page_title_author', 'moharram_page_title_author' );

if( !function_exists( 'moharram_theme_body_class' ) )
{
	function moharram_theme_body_class( $classes = array() )
	{

		$classes[] = 'pace-style-' . get_theme_mod( 'loader_style', 'loading-bar' );

		return $classes;
	}
}
add_filter( 'body_class', 'moharram_theme_body_class' );

if( !function_exists( 'moharram_get_custom_logo' ) )
{
	function moharram_get_custom_logo( $html = '' ) 
	{
		$arr = array(
			'itemprop="url"' => '',
			'itemprop="logo"' => '',
			'"custom-logo"' => '"img-responsive navbar-brand"',
		);
		foreach( $arr as $k => $v )
		{
			$html = str_replace( $k, $v, $html );
		}
	    return $html;   
	}
}
add_filter( 'get_custom_logo', 'moharram_get_custom_logo' );

if( !function_exists( 'moharram_remove_api' ) )
{
	function moharram_remove_api() 
	{
		remove_action( 'wp_head', 'feed_links_extra', 3 ); //Extra feeds such as category feeds
		remove_action( 'wp_head', 'feed_links', 2 ); // General feeds: Post and Comment Feed
		remove_action( 'wp_head', 'rest_output_link_wp_head', 10 );
		remove_action( 'wp_head', 'wp_oembed_add_discovery_links', 10 );
	}
}
add_action( 'after_setup_theme', 'moharram_remove_api' );

if( !function_exists( 'moharram_language_attributes' ) )
{
	function moharram_language_attributes( $output = '' )
	{
		if( preg_match( '/lang=".+"|lang=\'.+\'/', $output, $rs ) )
		{
			$output = preg_replace( '/lang=".+"|lang=\'.+\'/', 'lang="zxx"', $output );
		}
		return $output;
	}
}
add_filter( 'language_attributes', 'moharram_language_attributes' );

if( !function_exists( 'moharram_remove_head_scripts' ) )
{
	function moharram_remove_head_scripts() 
	{ 
	   	remove_action('wp_head', 'wp_print_scripts'); 
	   	remove_action('wp_head', 'wp_print_head_scripts', 9); 
	   	remove_action('wp_head', 'wp_enqueue_scripts', 1);

	   	wp_deregister_style( 'vc_pageable_owl-carousel-css' );
	   	wp_deregister_style( 'animate-css' );

	   	if( function_exists( 'vc_asset_url' ) && defined( 'WPB_VC_VERSION' ) )
	   	{
		   	wp_register_style( 'vc_pageable_owl-carousel-css', vc_asset_url( 'lib/owl-carousel2-dist/assets/owl.min.css' ), array(), WPB_VC_VERSION );
			wp_register_style( 'animate-css', vc_asset_url( 'lib/bower/animate-css/animate.min.css' ), array(), WPB_VC_VERSION );
		}

	   	add_action('wp_footer', 'wp_print_scripts', 5);
	   	add_action('wp_footer', 'wp_enqueue_scripts', 5);
	   	add_action('wp_footer', 'wp_print_head_scripts', 5); 
	} 
}
add_action( 'wp_enqueue_scripts', 'moharram_remove_head_scripts' );

if( !function_exists( 'moharram_pro_the_content' ) )
{
	function moharram_pro_the_content( $content = '' )
	{
		$arr = array(
			'moz' => '',
			'webkit' => '',
			'id="_wpnonce_new_activity_comment"' => '',
			'role="complementary"' => '',
			'id="today"' => '',
			'id="next"' => '',
			'id="prev"' => '',
			'id="wp-calendar"' => '',
			'id="recentcomments"' => '',
			'aria-required="true"' => '',
			'role="navigation"' => '',
			"allowfullscreen" => '',
			"frameborder='0'" => '',
			'id="attachment_612"' => '',
			'for="billing_state"' => '',
			'for="shipping_state"' => '',
			'id="_wpnonce"' => '',
			'placeholder=""' => '',
			'aria-required="true"' => '',
			'itemprop="breadcrumb"' => '',
			'cellspacing="0"' => '',
			"target=''" => '',
			'frameborder="0"' => '',
			'scrolling="no"' => '',
			'id=""' => '',
			'itemprop="url"' => '',
			'itemprop="logo"' => '',
			'"custom-logo"' => '"img-responsive navbar-brand"',
			'<p></div>' => '</div>',
			'style=>' => 'style>',
			'"data-tooltip-ba' => '" data-tooltip-ba',
			'"data-tooltip-of' => '" data-tooltip-of',
			'data- data-token' => 'data-token',
			'action=""' => 'action="'.esc_url( home_url( '/' ) ) .'"',
			'<dt class="wp-caption-dt"></dt>' => '',
			'<big' => '<span class="tag-big"',
			'<tt' => '<span class="tag-tt"',
			'<acronym' => '<abbr',
			'acronym>' => 'abbr>',
			'big>' => 'span>',
			'tt>' => 'span>',
			'widivh' => 'width',
			'"" class="ult_pricing_heading"' => '" class="ult_pricing_heading"',
			'<div " data-ultimate-target' => '<div data-ultimate-target',
			'"line-height":""}\' " class="' => '"line-height":""}\' class="',
		);
		foreach( $arr as $k => $v )
		{
			$content = str_replace( $k, $v, $content );
		}

		return $content;
	}
}
add_filter( 'the_content', 'moharram_pro_the_content', 2000 );

if( !function_exists( 'moharram_filter_scripts' ) )
{
	function moharram_filter_scripts( $content = '' )
	{
		preg_match_all( '/<script[^>]*>(.*?)<\/script>/sim', $content, $rs );

		if( count( $rs[0] ) == 0 )
		{
			return $content;
		}
		foreach( $rs[0] as $item )
		{
			$content = str_replace( $item, '', $content );
		}
		wp_enqueue_script( 'moharram-inline', plugins_url( '/a/j/customizer.js', __FILE__ ), array( 'jquery' ) );
   		foreach( $rs[1] as $item )
		{
			wp_add_inline_script( 'moharram-inline', $item );
		}
		return $content;
	}
}
add_filter( 'the_content', 'moharram_filter_scripts', 200 );

if( !function_exists( 'moharram_filter_styles' ) )
{
	function moharram_filter_styles( $content = '' )
	{
		preg_match_all( '/<style[^>]*>(.*?)<\/style>/sim', $content, $rs );

		if( count( $rs[0] ) == 0 )
		{
			return $content;
		}
		foreach( $rs[0] as $item )
		{
			$content = str_replace( $item, '', $content );
		}
		wp_add_inline_style( 'moharram-inline', plugins_url( '/a/j/customizer.css', __FILE__ ), array( 'moharram-style' ) );
   		foreach( $rs[1] as $item )
		{
			wp_add_inline_style( 'moharram-inline', $item );
		}
		return $content;
	}
}
add_filter( 'the_content', 'moharram_filter_styles', 200 );

if( !function_exists( 'moharram_comment_form_fields' ) )
{
	function moharram_comment_form_fields( $fields = array() )
	{
		foreach( $fields as $name => $field )
		{
			$fields[ $name ] = str_replace( 'aria-required="true"', '', $field );
		}
		return $fields;
	}
}
add_filter( 'comment_form_fields', 'moharram_comment_form_fields' );

if( !function_exists( 'moharram_navigation_markup_template' ) )
{
	function moharram_navigation_markup_template( $template = '' )
	{
		return str_replace( 'role="navigation"', '', $template );
	}
}
add_filter( 'navigation_markup_template', 'moharram_navigation_markup_template' );








