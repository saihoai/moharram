<?php

if( !function_exists( 'export_struct' ) )
{
	function export_struct()
	{
		
		$opts = array(
			'widget_text',
			'widget_widget_sp_image',
			'widget_wpcf7_widget',
			'widget_zoom-social-icons-widget',
			'widget_button',
			'widget_categories',
			'widget_search',
			'widget_recent-posts',
			'widget_archives',
			'widget_meta',
			'sidebars_widgets',
			'widget_calendar',
			'widget_tag_cloud',
			'widget_nav_menu',
			'theme_mods_' . get_template(),
			'megamenu_settings',
			'widget_icl_lang_sel_widget',
			'megamenu_themes',
			'megamenu_toggle_blocks',
			/*'widget_flickr',
			'widget_contact',
			'widget_about',
			'widget_phone',
			'widget_dropdown_search',
			'widget_recent-posts2',*/
			'woocommerce_default_country',
			'woocommerce_allowed_countries',
			'woocommerce_all_except_countries',
			'woocommerce_specific_allowed_countries',
			'woocommerce_ship_to_countries',
			'woocommerce_specific_ship_to_countries',
			'woocommerce_default_customer_address',
			'woocommerce_calc_taxes',
			'woocommerce_demo_store',
			'woocommerce_demo_store_notice',
			'woocommerce_currency',
			'woocommerce_currency_pos',
			'woocommerce_price_thousand_sep',
			'woocommerce_price_decimal_sep',
			'woocommerce_price_num_decimals',
			'woocommerce_weight_unit',
			'woocommerce_dimension_unit',
			'woocommerce_enable_review_rating',
			'woocommerce_review_rating_required',
			'woocommerce_review_rating_verification_label',
			'woocommerce_review_rating_verification_required',
			'woocommerce_shop_page_id',
			'woocommerce_shop_page_display',
			'woocommerce_category_archive_display',
			'woocommerce_default_catalog_orderby',
			'woocommerce_cart_redirect_after_add',
			'woocommerce_enable_ajax_add_to_cart',
			'shop_catalog_image_size',
			'shop_single_image_size',
			'shop_thumbnail_image_size',
			'woocommerce_enable_lightbox',
			'woocommerce_manage_stock',
			'woocommerce_hold_stock_minutes',
			'woocommerce_notify_low_stock',
			'woocommerce_notify_no_stock',
			'woocommerce_stock_email_recipient',
			'woocommerce_notify_low_stock_amount',
			'woocommerce_notify_no_stock_amount',
			'woocommerce_hide_out_of_stock_items',
			'woocommerce_stock_format',
			'woocommerce_file_download_method',
			'woocommerce_downloads_require_login',
			'woocommerce_downloads_grant_access_after_payment',
			'woocommerce_prices_include_tax',
			'woocommerce_tax_based_on',
			'woocommerce_shipping_tax_class',
			'woocommerce_tax_round_at_subtotal',
			'woocommerce_tax_classes',
			'woocommerce_tax_display_shop',
			'woocommerce_tax_display_cart',
			'woocommerce_price_display_suffix',
			'woocommerce_tax_total_display',
			'woocommerce_enable_shipping_calc',
			'woocommerce_shipping_cost_requires_address',
			'woocommerce_ship_to_destination',
			'woocommerce_enable_coupons',
			'woocommerce_calc_discounts_sequentially',
			'woocommerce_enable_guest_checkout',
			'woocommerce_force_ssl_checkout',
			'woocommerce_unforce_ssl_checkout',
			'woocommerce_cart_page_id',
			'woocommerce_checkout_page_id',
			'woocommerce_terms_page_id',
			'woocommerce_checkout_pay_endpoint',
			'woocommerce_checkout_order_received_endpoint',
			'woocommerce_myaccount_add_payment_method_endpoint',
			'woocommerce_myaccount_delete_payment_method_endpoint',
			'woocommerce_myaccount_set_default_payment_method_endpoint',
			'woocommerce_myaccount_page_id',
			'woocommerce_enable_signup_and_login_from_checkout',
			'woocommerce_enable_myaccount_registration',
			'woocommerce_enable_checkout_login_reminder',
			'woocommerce_registration_generate_username',
			'woocommerce_registration_generate_password',
			'woocommerce_myaccount_orders_endpoint',
			'woocommerce_myaccount_view_order_endpoint',
			'woocommerce_myaccount_downloads_endpoint',
			'woocommerce_myaccount_edit_account_endpoint',
			'woocommerce_myaccount_edit_address_endpoint',
			'woocommerce_myaccount_payment_methods_endpoint',
			'woocommerce_myaccount_lost_password_endpoint',
			'woocommerce_logout_endpoint',
			'woocommerce_email_from_name',
			'woocommerce_email_from_address',
			'woocommerce_email_header_image',
			'woocommerce_email_footer_text',
			'woocommerce_email_base_color',
			'woocommerce_email_background_color',
			'woocommerce_email_body_background_color',
			'woocommerce_email_text_color',
			'woocommerce_api_enabled',
			'woocommerce_admin_notices',
			'widget_woocommerce_widget_cart',
			'widget_woocommerce_layered_nav_filters',
			'widget_woocommerce_layered_nav',
			'widget_woocommerce_price_filter',
			'widget_woocommerce_product_categories',
			'widget_woocommerce_product_search',
			'widget_woocommerce_product_tag_cloud',
			'widget_woocommerce_products',
			'widget_woocommerce_rating_filter',
			'widget_woocommerce_recent_reviews',
			'widget_woocommerce_recently_viewed_products',
			'widget_woocommerce_top_rated_products',
			'woocommerce_paypal-braintree_settings',
			'woocommerce_stripe_settings',
			'woocommerce_paypal_settings',
			'woocommerce_cheque_settings',
			'woocommerce_bacs_settings',
			'woocommerce_cod_settings',
			'woocommerce_allow_tracking',
			'widget_icl_lang_sel_widget',
			'megamenu_settings',
			'megamenu_themes',
			'megamenu_toggle_blocks',
			//'widget_phone',
			//'widget_dropdown_search',
			'wpcf7',
			//'widget_recent-posts2',
			'show_on_front',
			'page_on_front',
			'revslider-global-settings'
		);
		$data = array();
		foreach( $opts as $item )
		{
			$data[ $item ] = get_option( $item );
			if( !preg_match( '/theme_mods_/', $item ) )
			{
				continue;
			}
			if( isset( $data[ $item ][ 'nav_menu_locations' ] ) && ( $menu = get_term_by( 'id', $data[ $item ][ 'nav_menu_locations' ][ 'primary' ], 'nav_menu' ) ) )
			{
				$data[ $item ][ 'nav_menu_locations' ][ 'primary' ] = $menu->name;
			}
			if( isset( $data[ $item ][ 'custom_logo' ] ) && ( $custom_logo = wp_get_attachment_url( $data[ $item ][ 'custom_logo' ] ) ) )
			{
				$data[ $item ][ 'custom_logo' ] = $custom_logo;
			}
		}
		file_put_contents( __DIR__ . '/d/o.txt', json_encode( $data ) );
	}
}
add_action( 'export_wp', 'export_struct' );

if( !function_exists( 'import_struct' ) )
{
	function import_struct()
	{
		
		$path = __DIR__ . '/d/o0.txt';

		if( !file_exists( $path ) )
		{
			return false;
		}

		$path_terms = __DIR__ . '/d/terms.txt';
		if( !file_exists( $path_terms ) )
		{
			return false;
		}

		$data_terms = json_decode( file_get_contents( $path_terms ), true );
		if( count( $data_terms ) < 1 )
		{
			return false;
		}

		$data = json_decode( file_get_contents( $path ), true );

		if( count( $data ) <= 0 )
		{
			return false;
		}
		foreach( $data as $k => $v )
		{
			update_option( $k, $v, true );
				
			if( preg_match( '/theme_mods_/', $k ) )
			{
				$v = maybe_unserialize( $v );
				$locations = array();
				if( isset( $v[ 'nav_menu_locations' ] ) && count( $v[ 'nav_menu_locations' ] ) > 0 )
				{
					foreach( $v[ 'nav_menu_locations' ] as $slug => $title )
					{
						if( $menu = get_term_by( 'name', $title, 'nav_menu' ) )
						{
							$locations[ $slug ] = $menu->term_id;
						}
					}
					if( count( $locations ) > 0 )
					{
						set_theme_mod( 'nav_menu_locations', $locations );
					}
				}

				foreach( array( 'custom_logo', 'header_image' ) as $item )
				{
					if( isset( $v[ $item ] ) && !empty( $v[ $item ] ) )
					{
						$info = pathinfo( $v[ $item ] );
						$title =  basename( $v[ $item ], '.' . $info[ 'extension' ] );
						if( $attachment = get_page_by_title( $title, 'OBJECT', 'attachment' ) )
						{
							if( $item == 'header_image' )
							{
								$header_image_data = array( 
									'attachment_id' => $attachment->ID, 
									'url' => $attachment->guid, 
									'thumbnail_url' => $attachment->thumbnail_url
								);
								set_theme_mod( $item, $attachment->guid );
								set_theme_mod( 'header_image_data', $header_image_data );
							}
							else
							{
								set_theme_mod( $item, $attachment->ID );
							}
						}
					}	
				}
				
			}
		}

		foreach( array( 'widget_nav_menu' ) as $key )
		{
			do_action( 'import_struct_widget_option_menu', $data_terms, $data, $key );
		}

		if( $page = get_page_by_title( 'Home Classic' ) )
		{
			update_option( 'show_on_front', 'page', true );
			update_option( 'page_on_front', $page->ID, true );
		}

		// import revslider
		$updateAnim = true;
		$updateNav = true;
		$updateStatic = "none";
		$rv_slider_path = plugin_dir_path( __DIR__ ) . '/revslider/includes/slider.class.php';
		if( file_exists( $rv_slider_path ) ) 
		{
			if( !function_exists( 'RevSlider' ) )
			{
				require_once( $rv_slider_path );
			}
			$slider = new RevSlider();
			$files = glob( __DIR__ . '/d/revslider/*.zip' );
			if( count( $files ) > 0 )
			{
				foreach( $files as $file )
				{

					if( $slider->isAliasExistsInDB( basename( $file, '.zip' ) ) )
					{
						continue;
					}
					$slider->importSliderFromPost($updateAnim, $updateStatic, $file, false, false, $updateNav);
				}
			}
		}

		// delete files tmp
		foreach( array( $path, __DIR__ . '/d/cates.txt', __DIR__ . '/d/terms.txt' ) as $p )
		{
			if( file_exists( $p ) )
			{
				unlink( $p );
			}
		}
		
	}
}
add_action( 'import_end', 'import_struct' );

if( !function_exists( 'struct_fetch_remote_file' ) )
{
	function struct_fetch_remote_file( $url ) 
	{
		// extract the file name and extension from the url
		$file_name = basename( $url );

		// get placeholder file in the upload dir with a unique, sanitized filename
		$upload = wp_upload_bits( $file_name, 0, '' );
		if ( $upload['error'] )
			return new WP_Error( 'upload_dir_error', $upload['error'] );

		// fetch the remote url and write it to the placeholder file
		$headers = wp_get_http( $url, $upload['file'] );

		// request failed
		if ( ! $headers ) {
			@unlink( $upload['file'] );
			return new WP_Error( 'import_file_error', __('Remote server did not respond', 'wordpress-importer') );
		}

		// make sure the fetch was successful
		if ( $headers['response'] != '200' ) {
			@unlink( $upload['file'] );
			return new WP_Error( 'import_file_error', sprintf( __('Remote server returned error response %1$d %2$s', 'wordpress-importer'), esc_html($headers['response']), get_status_header_desc($headers['response']) ) );
		}

		$filesize = filesize( $upload['file'] );

		if ( isset( $headers['content-length'] ) && $filesize != $headers['content-length'] ) {
			@unlink( $upload['file'] );
			return new WP_Error( 'import_file_error', __('Remote file is incorrect size', 'wordpress-importer') );
		}

		if ( 0 == $filesize ) {
			@unlink( $upload['file'] );
			return new WP_Error( 'import_file_error', __('Zero size file downloaded', 'wordpress-importer') );
		}

		return $upload;
	}
}

if( !function_exists( 'import_struct_widget_option_menu' ) )
{
	function import_struct_widget_option_menu( $data_terms = array(), $data = array(),  $k = '' )
	{
		$v = $data[ $k ];
		$v = maybe_unserialize( $v );
		if( is_array( $v ) && count( $v ) > 0 )
		{
			foreach( $v as $i => $item )
			{
				$title = '';
				foreach( $data_terms as $term )
				{
					if( $term[ 'term_id' ] == $item[ 'nav_menu' ] )
					{
						$title = $term[ 'term_name' ];
						break;
					}
				}
				if( $menu = get_term_by( 'name', $title, 'nav_menu' ) )
				{
					$v[ $i ][ 'nav_menu' ] = $menu->term_id;
				}
			}
			update_option( $k, $v, true );
		}
	}
}
add_action( 'import_struct_widget_option_menu', 'import_struct_widget_option_menu', 10, 3 );

if( !function_exists( 'struct_cache_wp_import_terms' ) )
{
	function struct_cache_wp_import_terms( $data )
	{
		if( is_array( $data ) && count( $data ) )
		{
			file_put_contents( __DIR__ . '/d/terms.txt', json_encode( $data ) );
		}
		return $data;
	}
}
add_filter( 'wp_import_terms', 'struct_cache_wp_import_terms' );

if( !function_exists( 'struct_cache_wp_import_cates' ) )
{
	function struct_cache_wp_import_cates( $data )
	{
		if( is_array( $data ) && count( $data ) )
		{
			file_put_contents( __DIR__ . '/d/cates.txt', json_encode( $data ) );
		}
		return $data;
	}
}
add_filter( 'wp_import_categories', 'struct_cache_wp_import_cates' );

if( !function_exists( 'struct_wp_import_post_data_raw' ) )
{
	function struct_wp_import_post_data_raw( $item = array() )
	{
		// post_type == nav_menu_item
		if( 'nav_menu_item' == $item['post_type'] && is_array( $item['postmeta'] ) && count( $item['postmeta'] ) > 0 )
		{
			$im = -1;
			$ifn = -1;
			foreach ( $item['postmeta'] as $i => $meta )
			{
				if( $meta[ 'key' ] == '_menu_item_xfn' )
				{
					$ifn = $i;
					continue;
				}
				elseif( $meta[ 'key' ] == '_megamenu' )
				{
					$im = $i;
					continue;
				}
				
			}
			if( $im != -1 && $ifn != -1 )
			{

				$d = array(
					'id' => $item[ 'post_id' ],
					'xfn'  => $item['postmeta'][ $ifn ][ 'value' ],
					'mega' => $item['postmeta'][ $im ][ 'value' ]
				);
				$item['postmeta'][ $ifn ][ 'value' ] = base64_encode( json_encode($d) );
			}
		}

		$path_cates = __DIR__ . '/d/cates.txt';
		if( !file_exists( $path_cates ) )
		{
			return $item;
		}

		$data_cates = json_decode( file_get_contents( $path_cates ), true );
		if( count( $data_cates ) < 1 )
		{
			return $item;
		}

		if( 
			'page' == $item['post_type'] 
			&& preg_match( '/taxonomies="\d+"|taxonomies=\'\d+\'/', $item['post_content'], $rs ) 
			&& preg_match( '/filter_source="post_tag"|filter_source=\'post_tag\'/', $item['post_content'] ) )
		{
			
			$o_term_id = preg_replace( '/taxonomies=|"|\'/', '', $rs[0] );
			$title = '';
			foreach( $data_cates as $term )
			{
				if( $term[ 'term_id' ] == $o_term_id )
				{
					$title = $term[ 'cat_name' ];
					break;
				}
			}

			if( $cate = get_term_by( 'name', $title, 'category' ) )
			{
				$item[ 'post_content' ] = preg_replace( '/taxonomies="\d+"|taxonomies=\'\d+\'/', 'taxonomies="'.$cate->term_id.'"', $item[ 'post_content' ] );
			}
		}
		return $item;
	}
}
add_filter( 'wp_import_post_data_raw', 'struct_wp_import_post_data_raw' );
/**
515	         * Fires after a navigation menu item has been updated.
516	         *
517	         * @since 3.0.0
518	         *
519	         * @see wp_update_nav_menu_item()
520	         *
521	         * @param int   $menu_id         ID of the updated menu.
522	         * @param int   $menu_item_db_id ID of the updated menu item.
523	         * @param array $args            An array of arguments used to update a menu item.
524	         */
if( !function_exists( 'struct_import_wp_update_nav_menu_item' ) )
{
	function struct_import_wp_update_nav_menu_item( $menu_id = 0, $menu_item_db_id = 0, $args = array() )
	{
		$flag = isset( $_GET[ 'import' ] ) && $_GET[ 'import' ] == 'wordpress';
		if( !$flag )
		{
			return false;
		}
		$path = __DIR__ . '/d/o0.txt';

		if( !file_exists( $path ) )
		{
			file_put_contents( $path, file_get_contents( __DIR__ . '/d/o.txt' ) );
			return false;
		}

		$data = json_decode( file_get_contents( $path ), true );

		if( count( $data ) <= 0 )
		{
			return false;
		}
		if( !isset( $args['menu-item-xfn'] ) )
		{
			return false;
			
		}
		$d = json_decode( base64_decode( maybe_unserialize( $args['menu-item-xfn'] ) ), true );
		if( !is_array( $d ) )
		{
			return false;
		}

		update_post_meta( $menu_item_db_id, '_menu_item_xfn', $d[ 'xfn' ] );
		update_post_meta( $menu_item_db_id, '_megamenu', maybe_unserialize( $d[ 'mega' ] ) );


		$id = intval( $d[ 'id' ] );

		foreach( array( 'widget_zoom-social-icons-widget' ) as $k )
		{
			$data = apply_filters( 'struct_import_wp_updating_nav_menu_item', $data, $menu_item_db_id, $k, $id );
		}
		
		file_put_contents( $path, json_encode( $data ) );
	}
}
add_action( 'wp_update_nav_menu_item', 'struct_import_wp_update_nav_menu_item', 20000, 3 );

if( !function_exists( 'struct_pre_import_wp_update_nav_menu_item' ) )
{
	function struct_import_wp_updating_nav_menu_item( $data = array(), $menu_item_db_id = 0, $k = '', $id = 0 )
	{
		$items = maybe_unserialize( $data[ $k ] );
		if( is_array( $items ) )
		{
			foreach( $items as $i => $item )
			{
				if( !isset( $item[ 'mega_menu_parent_menu_id' ] ) )
				{
					continue;
				}

				if( $item[ 'mega_menu_parent_menu_id' ] != $id )
				{
					continue;
				}

				$o = $item[ 'mega_menu_parent_menu_id' ];
				$data[ $k ][ $i ][ 'mega_menu_parent_menu_id' ] = $menu_item_db_id;
				if( !isset( $item[ 'mega_menu_order' ] ) )
				{
					continue;
				}
				$data[ $k ][ $i ][ 'mega_menu_order' ][ $menu_item_db_id ] = $item[ 'mega_menu_order' ][ $o ];
				unset( $data[ $k ][ $i ][ 'mega_menu_order' ][ $o ] );
			}
		}
		return $data;
	}
}
add_filter( 'struct_import_wp_updating_nav_menu_item', 'struct_import_wp_updating_nav_menu_item', 10, 4 );