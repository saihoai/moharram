<?php
if( !function_exists( 'moharram_woo_adon_plugin_template' ) )
{
   function struct_woo_adon_plugin_template( $template, $template_name, $template_path ) 
   {
	     global $woocommerce;
	     $_template = $template;
	     if ( ! $template_path ) 
	        $template_path = $woocommerce->template_url;
	 
	     $plugin_path  = untrailingslashit( plugin_dir_path( __FILE__ ) )  . '/t/woo/';
	 
	    // Look within passed path within the theme - this is priority
	    $template = locate_template(
	    array(
	      $template_path . $template_name,
	      $template_name
	    )
	   );
	 
	   if( ! $template && file_exists( $plugin_path . $template_name ) )
	    $template = $plugin_path . $template_name;
	 
	   if ( ! $template )
	    $template = $_template;

	   return $template;
	}
}
add_filter( 'woocommerce_locate_template', 'struct_woo_adon_plugin_template', 1, 3 );

if( !function_exists( 'moharram_woocommerce_show_page_title' ) )
{
	function moharram_woocommerce_show_page_title()
	{
		return false;
	}
}
add_filter( 'woocommerce_show_page_title', 'moharram_woocommerce_show_page_title' );

if( !function_exists( 'moharram_woocommerce_sidebar' ) )
{
	function moharram_woocommerce_sidebar()
	{
		remove_action( 'woocommerce_sidebar', 'woocommerce_get_sidebar', 10 );
		remove_action( 'woocommerce_before_single_product_summary', 'woocommerce_show_product_sale_flash', 10 );
		remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_title', 5 );
		remove_action( 'woocommerce_before_main_content', 'woocommerce_breadcrumb', 20, 0 );
	}
}
add_action( 'init', 'moharram_woocommerce_sidebar' );


if( !function_exists( 'moharram_loop_shop_columns' ) )
{
	function moharram_loop_shop_columns() 
	{
		if( apply_filters( 'moharram_wc_page_nosb', is_single() ) )
		{
			return intval( get_theme_mod( 'woor_col', 2 ) );	
		}

		return intval( get_theme_mod( 'wood_col', 2 ) );
	}
}

add_filter( 'loop_shop_columns', 'moharram_loop_shop_columns' , 20 );

if( !function_exists( 'moharram_woocommerce_related_products_columns' ) )
{
	function moharram_woocommerce_related_products_columns() 
	{
		return intval( get_theme_mod( 'woor_col', 2 ) );
	}
}
add_filter( 'moharram_woocommerce_related_products_columns', 'moharram_woocommerce_related_products_columns' , 20 );

if( !function_exists( 'moharram_woocommerce_related_products_total' ) )
{
	function moharram_woocommerce_related_products_total() 
	{
		return intval( get_theme_mod( 'woor_col', 2 ) ) * intval( get_theme_mod( 'woor_row', 1 ) );
	}
}
add_filter( 'moharram_woocommerce_related_products_total', 'moharram_woocommerce_related_products_total' , 20 );

if( !function_exists( 'moharram_wood_mode' ) )
{
	function moharram_wood_mode() 
	{
		$mode = get_theme_mod( 'wood_mode', 'grid' );

		if( isset( $_GET[ 'wood_mode' ] ) && !empty( $_GET[ 'wood_mode' ] ) )
		{
			$mode = $_GET[ 'wood_mode' ];
		}

		if( apply_filters( 'moharram_wc_page_nosb', is_single() ) && get_theme_mod( 'woor_mode' ) )
		{
			$mode = 'grid';
		}

		return $mode;
	}
}

add_filter( 'moharram_wood_mode', 'moharram_wood_mode' );

if( !function_exists( 'moharram_wc_body_class' ) )
{
	function moharram_wc_body_class( $classes = array() )
	{

		$classes[] = 'columns-' . apply_filters( 'loop_shop_columns', 2 );
		
		$classes[] = 'woocommerce-mode-' . apply_filters( 'moharram_wood_mode', 'grid' );

		return $classes;
	}
}
add_filter( 'body_class', 'moharram_wc_body_class' );

if( !function_exists( 'moharram_woocommerce_template_loop_product_link_open' ) ) 
{
	function moharram_woocommerce_template_loop_product_link_open()
	{
		$mode = apply_filters( 'moharram_wood_mode', 'grid' );

		if( $mode  == 'grid' )
		{
			return;
		}

		echo '<div class="row"><div class="col-md-3">';
	}
}
add_action( 'woocommerce_before_shop_loop_item', 'moharram_woocommerce_template_loop_product_link_open', 20 );

if( !function_exists( 'moharram_woocommerce_template_loop_product_title' ) )
{
	function moharram_woocommerce_template_loop_product_title()
	{
		$mode = apply_filters( 'moharram_wood_mode', 'grid' );

		if( $mode  == 'grid' )
		{
			return;
		}

		echo '</div><div class="col-md-9">';

		global $post;

		if ( ! $post->post_excerpt ) {
			return;
		}
		echo '<div class="desc">';
			echo apply_filters( 'woocommerce_short_description', $post->post_excerpt );
		echo '</div>';
	}
}
add_action( 'woocommerce_before_shop_loop_item_title', 'moharram_woocommerce_template_loop_product_title', 20 );

if( !function_exists( 'moharram_woocommerce_template_loop_product_link_close' ) )
{
	function moharram_woocommerce_template_loop_product_link_close()
	{
		$mode = apply_filters( 'moharram_wood_mode', 'grid' );

		if( $mode  == 'grid' )
		{
			return;
		}

		echo '</div></div>';
	}
}
add_action( 'woocommerce_after_shop_loop_item', 'moharram_woocommerce_template_loop_product_link_close', 5 );

if( !function_exists( 'moharram_wc_page_nosb' ) )
{
	function moharram_wc_page_nosb()
	{

		if( is_single() )
		{
			return true;
		}

		if( is_cart() )
		{
			return true;
		}

		if( is_checkout() )
		{
			return true;
		}

		return false;
	}
}
add_filter( 'moharram_wc_page_nosb', 'moharram_wc_page_nosb' );

if( !function_exists( 'moharram_woo_layout_start' ) )
{
	function moharram_woo_layout_start()
	{
		if( apply_filters( 'moharram_wc_page_nosb', is_single() ) )
		{
			return;
		}
		
		$flag = 0;
		if ( is_active_sidebar( 'sbshopl' ) )
		{
			$flag += 1;
		}
		if ( is_active_sidebar( 'sbshopr' ) )
		{
			$flag += 1;
		}

		if( $flag === 0 )
		{
			return;
		}

		echo '<div class="row clear">';
		
		if ( is_active_sidebar( 'sbshopl' ) )
		{
			echo '<div class="col-md-3">';
				dynamic_sidebar( 'sbshopl' );
			echo '</div>';
		}

		if ( is_active_sidebar( 'sbshopl' )  && is_active_sidebar( 'sbshopr' ) )
		{
			echo '<div class="col-md-6">';	
		}
		else
		{
			echo '<div class="col-md-9">';	
		}
		
	}
}
add_action( 'moharram_woo_loop_start', 'moharram_woo_layout_start' );

if( !function_exists( 'moharram_woo_layout_end' ) )
{
	function moharram_woo_layout_end()
	{
		if( apply_filters( 'moharram_wc_page_nosb', is_single() ) )
		{
			return;
		}
		
		$flag = 0;
		if ( is_active_sidebar( 'sbshopl' ) )
		{
			$flag += 1;
		}
		if ( is_active_sidebar( 'sbshopr' ) )
		{
			$flag += 1;
		}

		if( $flag === 0 )
		{
			return;
		}

		echo '</div>';

		if ( is_active_sidebar( 'sbshopr' ) )
		{
			echo '<div class="col-md-3">';
				dynamic_sidebar( 'sbshopr' );
			echo '</div>';
		}

		echo '</div>';
	}
}
add_action( 'moharram_woo_wrapper_end', 'moharram_woo_layout_end' );

if( !function_exists( 'moharram_woocommerce_product_thumbnails_columns' ) )
{
	function moharram_woocommerce_product_thumbnails_columns( $col = 4 )
	{
		$rtl 		= is_rtl();
		$col 		= get_theme_mod( 'woos_thumbnails_items', '4' );
		$vertical 	= in_array( get_theme_mod( 'woos_thumbnails_pos', 'bottom' ), array( 'left', 'right' ) ) ? true : false;
		$prev 		= '<button type=\"button\" class=\"slick-prev\"><i class=\"fa fa-angle-left\"></i></button>';
		$next 		= '<button type=\"button\" class=\"slick-next\"><i class=\"fa fa-angle-right\"></i></button>';
		if( $vertical )
		{
			$prev= '<button type=\"button\" class=\"slick-prev\"><i class=\"fa fa-angle-up\"></i></button>';
			$next= '<button type=\"button\" class=\"slick-next\"><i class=\"fa fa-angle-down\"></i></button>';
		}
		wp_enqueue_style( 'struct-sclick', '//cdn.jsdelivr.net/jquery.slick/1.6.0/slick.css' );
		wp_enqueue_script( 'struct-sclick', '//cdn.jsdelivr.net/jquery.slick/1.6.0/slick.min.js', array( 'jquery' ), '20160816', true );
		wp_add_inline_script( 'struct-sclick', "
			window.jQuery && jQuery( function( $ ) {
				$( '.single-product .product-thumbnails' ).slick( {
					rtl: (function( v ){ return v == 1; })( {$rtl} ),
					vertical: (function( v ){ return v == 1; })( {$vertical} ),
					verticalSwiping: (function( v ){ return v == 1; })( {$vertical} ),
					slidesToShow: (function( v ){ return v || 3; })( {$col} ),
					prevArrow: '{$prev}',
					nextArrow: '{$next}'
				} );
			} );
		" );
		return $col;
	}
}
add_filter( 'woocommerce_product_thumbnails_columns', 'moharram_woocommerce_product_thumbnails_columns' );

if( !function_exists( 'moharram_woocommerce_share' ) )
{
	function moharram_woocommerce_share()
	{
		ob_start();
		require_once( __DIR__ . '/t/woo.share.php' );
		echo ob_get_clean();
	}
}
add_action( 'woocommerce_share', 'moharram_woocommerce_share' );

if( !function_exists( 'moharram_woocommerce_dropdown_variation_attribute_options_html' ) )
{
	function moharram_woocommerce_dropdown_variation_attribute_options_html( $html = '' )
	{
		return str_replace( '"" data-show_option_none', '" data-show_option_none', $html );
	}
}
add_filter( 'woocommerce_dropdown_variation_attribute_options_html', 'moharram_woocommerce_dropdown_variation_attribute_options_html' );

if( !function_exists( 'moharram_comments_template' ) )
{
	function moharram_comments_template( $template ) 
	{
		if ( get_post_type() !== 'product' ) 
		{
			return $template;
		}
		return __DIR__ . '/t/woo/single-product-reviews.php';
	}
}
add_filter( 'comments_template', 'moharram_comments_template', 30 );

if( !function_exists( 'moharram_woocommerce_breadcrumb' ) )
{
	function moharram_woocommerce_breadcrumb()
	{
		if( !function_exists( 'wc_get_template' ) )
		{
			return false;
		}
		if( !class_exists( 'WC_Breadcrumb' ) )
		{
			return false;
		}
		$args = wp_parse_args( array(), apply_filters( 'woocommerce_breadcrumb_defaults', array(
			'delimiter'   => '&nbsp;&#47;&nbsp;',
			'wrap_before' => '<nav class="woocommerce-breadcrumb" ' . ( is_single() ? 'itemprop="breadcrumb"' : '' ) . '>',
			'wrap_after'  => '</nav>',
			'before'      => '',
			'after'       => '',
			'home'        => _x( 'Home', 'breadcrumb', 'woocommerce' )
		) ) );

		$breadcrumbs = new WC_Breadcrumb();

		if ( ! empty( $args['home'] ) ) {
			$breadcrumbs->add_crumb( $args['home'], apply_filters( 'woocommerce_breadcrumb_home_url', home_url() ) );
		}

		$args['breadcrumb'] = $breadcrumbs->generate();

		wc_get_template( 'global/breadcrumb.php', $args );
	}
}
add_action( 'moharram_page_title_more', 'moharram_woocommerce_breadcrumb' );








