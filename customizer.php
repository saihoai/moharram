<?php
/**
 * moharramm Customizer functionality
 *
 * @package WordPress
 * @subpackage moharramm
 * @since moharramm 1.0
 */

if( !function_exists( 'moharram_customizer_url' ) )
{
	function moharram_customizer_url()
	{
		return plugins_url( '/a/c/customizer.css', __FILE__ );
	}
}
if( !function_exists( 'moharram_customizer_get_asset' ) )
{
	function moharram_customizer_get_asset( $k = '' )
	{
		$data = array(
			'colors' 		=> __DIR__ . '/a/c/colors.css',
			'bg' 			=> __DIR__ . '/a/c/bg.css',
			'header_image' 	=> __DIR__ . '/a/c/header_image.css',
		);
		return isset( $data[ $k ] ) ? $data[ $k ] : '';
	}
}
if( !function_exists( 'moharram_get_loader_skin' ) )
{
	function moharram_get_loader_skin()
	{
		return array(
			'barber-shop' 		=> array( 
				'name' => 'barber-shop', 
				'label' => 'Barber shop', 
				'path' => __DIR__ . '/a/c/pace-theme-barber-shop.css' 
			),
	 		'big-counter' 		=> array( 
	 			'name' => 'big-counter', 
	 			'label' => 'Big counter', 
	 			'path' => __DIR__ . '/a/c/pace-theme-big-counter.css' 
	 		),
	 		'bounce' 			=> array( 
	 			'name' => 'bounce', 
	 			'label' => 'Bounce', 
	 			'path' => __DIR__ . '/a/c/pace-theme-bounce.css' 
	 		),
	 		'center-atom' 		=> array( 
	 			'name' => 'center-atom', 
	 			'label' => 'Center atom', 
	 			'path' => __DIR__ . '/a/c/pace-theme-center-atom.css' 
	 		),
	 		'center-circle' 	=> array( 
	 			'name' => 'center-circle', 
	 			'label' => 'Center circle', 
	 			'path' => __DIR__ . '/a/c/pace-theme-center-circle.css' 
	 		),
	 		'center-radar' 		=> array( 
	 			'name' => 'center-radar', 
	 			'label' => 'Center radar', 
	 			'path' => __DIR__ . '/a/c/pace-theme-center-radar.css' 
	 		),
	 		'center-simple' 	=> array( 
	 			'name' => 'center-simple', 
	 			'label' => 'Center simple', 
	 			'path' => __DIR__ . '/a/c/pace-theme-center-simple.css' 
	 		),
	 		'corner-indicator' 	=> array( 
	 			'name' => 'corner-indicator', 
	 			'label' => 'Corner indicator', 
	 			'path' => __DIR__ . '/a/c/pace-theme-corner-indicator.css' 
	 		),
	 		'fill-left' 		=> array( 
	 			'name' => 'fill-left', 
	 			'label' => 'Fill left', 
	 			'path' => __DIR__ . '/a/c/pace-theme-fill-left.css' 
	 		),
	 		'flash' 			=> array( 
	 			'name' => 'flash', 
	 			'label' => 'Flash', 
	 			'path' => __DIR__ . '/a/c/pace-theme-flash.css' 
	 		),
	 		'flat-top' 			=> array( 
	 			'name' => 'flat-top', 
	 			'label' => 'Flat top', 
	 			'path' => __DIR__ . '/a/c/pace-theme-flat-top.css' 
	 		),
	 		'loading-bar' 		=> array( 
	 			'name' => 'loading-bar', 
	 			'label' => 'Loading bar', 
	 			'path' => __DIR__ . '/a/c/pace-theme-loading-bar.css' 
	 		),
	 		'mac-osx' 			=> array( 
	 			'name' => 'mac-osx', 
	 			'label' => 'Mac osx', 
	 			'path' => __DIR__ . '/a/c/pace-theme-mac-osx.css' 
	 		),
	 		'minimal' 			=> array( 
	 			'name' => 'minimal', 
	 			'label' => 'Minimal', 
	 			'path' => __DIR__ . '/a/c/pace-theme-minimal.css'
	 		),
		);
	}
}
if( !function_exists( 'moharram_get_content' ) )
{
	function moharram_get_content( $path = '', $data = array() )
	{
		if( !file_exists( $path ) )
		{
			return '';
		}
		ob_start();
		extract( $data );
		include( $path );
		return ob_get_clean();
	}
}

if( !function_exists( 'moharram_sanitize_no_change' ) )
{
	function moharram_sanitize_no_change( $value )
	{
		return $value;
	}
}

/**
 * Converts a HEX value to RGB.
 *
 * @since Struct 1.0
 *
 * @param string $color The original color, in 3- or 6-digit hexadecimal form.
 * @return array Array containing RGB (red, green, and blue) values for the given
 *               HEX code, empty array otherwise.
 */
if( !function_exists( 'moharram_hex2rgb' ) )
{
	function moharram_hex2rgb( $color ) 
	{
		$color = trim( $color, '#' );

		if ( strlen( $color ) === 3 ) {
			$r = hexdec( substr( $color, 0, 1 ).substr( $color, 0, 1 ) );
			$g = hexdec( substr( $color, 1, 1 ).substr( $color, 1, 1 ) );
			$b = hexdec( substr( $color, 2, 1 ).substr( $color, 2, 1 ) );
		} else if ( strlen( $color ) === 6 ) {
			$r = hexdec( substr( $color, 0, 2 ) );
			$g = hexdec( substr( $color, 2, 2 ) );
			$b = hexdec( substr( $color, 4, 2 ) );
		} else {
			return array();
		}

		return array( 'r' => $r, 'g' => $g, 'b' => $b );
	}
}

/**
 * Binds the JS listener to make Customizer color_scheme control.
 *
 * Passes color scheme data as colorScheme global.
 *
 * @since moharramm 1.0
 */
function moharram_customize_control_js() {
	wp_enqueue_script( 'color-scheme-control', plugins_url( '/a/j/controls.js', __FILE__ ), array( 'customize-controls', 'iris', 'underscore', 'wp-util' ), '20160816', true );
}
add_action( 'customize_controls_enqueue_scripts', 'moharram_customize_control_js' );

/**
 * Binds JS handlers to make the Customizer preview reload changes asynchronously.
 *
 * @since moharramm 1.0
 */
function moharram_customize_preview_js() {
	wp_enqueue_script( 'moharramm-customize-preview', plugins_url( '/a/j/customize-preview.js', __FILE__ ), array( 'customize-preview' ), '20160816', true );
}
add_action( 'customize_preview_init', 'moharram_customize_preview_js' );

if( !function_exists( 'moharram_customize_register' ) )
{
	function moharram_customize_register( $wp_customize ) 
	{

		// Add element color setting and control.
		$wp_customize->remove_section( 'colors' );

		$wp_customize->add_panel( 's', array(
			'title' => esc_html__( 'Style switcher', 'moharram' ),
			'priority'	=> 30,
		) );
		$wp_customize->add_section( 'sc', array(
			'title' 	=> 'Color',
			'panel' 	=> 's',
		) );
		$wp_customize->add_section( 'header_image', array(
			'title' => esc_html__( 'Header Image', 'moharram' ),
			'panel' => 's'
		) );
		$wp_customize->add_section( 'background_image', array(
			'title' => esc_html__( 'Background Image', 'moharram' ),
			'panel' => 's'
		) );
		$wp_customize->add_setting( 'cbase', array(
			'default'           => '',
			'sanitize_callback' => 'moharram_sanitize_no_change',
			'transport'         => 'postMessage',
		) );

		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'cbase', array(
			'label'       => __( 'Base', 'moharram' ),
			'section'     => 'sc',
		) ) );

		$wp_customize->add_section( 'loader' , array(
		  'title' => __( 'Loader', 'moharram' ),
		  'panel' => 's',
		) );
		$wp_customize->add_setting( 'loader_style', array(
			'default'           => 'loading-bar',
			'sanitize_callback' => 'moharram_sanitize_no_change',
			'transport'         => 'postMessage',
		) );
		$loader_style = array( '' => esc_html__( 'None', 'moharram' ) );
		foreach ( moharram_get_loader_skin() as $key => $item ) 
		{
			$loader_style[ $key ] = $item[ 'label' ];
		}
		$wp_customize->add_control( 'loader_style', array(
		 	'label'   => esc_html__( 'Style', 'moharram' ),
		  	'section' => 'loader',
		 	'type'    => 'select',
		 	'choices'  => $loader_style,
		) );


		// Add element woocommerce setting and control.
		$wp_customize->add_panel( 'woo', array(
			'title' => esc_html__( 'Woocommerce', 'moharram' ),
		) );
		$wp_customize->add_section( 'wood', array(
			'title' => esc_html__( 'Display', 'moharram' ),
			'panel' => 'woo'
		) );
		$wp_customize->add_setting( 'wood_col', array(
			'default'   => '4',
			'sanitize_callback' => 'moharram_sanitize_no_change',
			'transport'         => 'postMessage',
		) );
		$wp_customize->add_control( 'wood_col', array(
			'section'   => 'wood',
			'type'		=> 'select',
			'label'		=> __( 'Columns', 'moharram' ),
			'choices'	=> array(
				'1' => __( '1 Columns', 'moharram' ),
				'2' => __( '2 Columns', 'moharram' ),
				'3' => __( '3 Columns', 'moharram' ),
				'4' => __( '4 Columns', 'moharram' ),
				'5' => __( '5 Columns', 'moharram' ),
				'6' => __( '6 Columns', 'moharram' ),
			),
		) );
		$wp_customize->add_setting( 'wood_mode', array(
			'default'   => 'grid',
			'sanitize_callback' => 'moharram_sanitize_no_change',
			'transport'         => 'postMessage',
		) );
		$wp_customize->add_control( 'wood_mode', array(
			'section'   => 'wood',
			'type'		=> 'select',
			'label'		=> __( 'Mode', 'moharram' ),
			'choices'	=> array(
				'grid' => __( 'Grid', 'moharram' ),
				'list' => __( 'List', 'moharram' ),
			),
		) );
		$wp_customize->remove_section( 'sidebar-widgets-sbshopl' );
		$wp_customize->remove_section( 'sidebar-widgets-sbshopr' );
		$wp_customize->add_section( 'sidebar-widgets-sbshopl', array(
			'title' => esc_html__( 'Sidebar left', 'moharram' ),
			'panel' => 'woo'
		) );
		$wp_customize->add_section( 'sidebar-widgets-sbshopr', array(
			'title' => esc_html__( 'Sidebar right', 'moharram' ),
			'panel' => 'woo'
		) );
		$wp_customize->add_section( 'woor', array(
			'title' => esc_html__( 'Block related', 'moharram' ),
			'panel' => 'woo'
		) );
		$wp_customize->add_setting( 'woor_mode', array(
			'default'   => true,
			'sanitize_callback' => 'moharram_sanitize_no_change',
			'transport'         => 'postMessage',
		) );
		$wp_customize->add_control( 'woor_mode', array(
			'section'   => 'woor',
			'type'		=> 'checkbox',
			'label'		=> __( 'Remove product mode', 'moharram' ),
		) );
		$wp_customize->add_setting( 'woor_col', array(
			'default'   => '4',
			'sanitize_callback' => 'moharram_sanitize_no_change',
			'transport'         => 'postMessage',
		) );
		$wp_customize->add_control( 'woor_col', array(
			'section'   => 'woor',
			'type'		=> 'select',
			'label'		=> __( 'Related Columns', 'moharram' ),
			'choices'	=> array(
				'1' => __( '1 Column(s)', 'moharram' ),
				'2' => __( '2 Column(s)', 'moharram' ),
				'3' => __( '3 Column(s)', 'moharram' ),
				'4' => __( '4 Column(s)', 'moharram' ),
				'5' => __( '5 Column(s)', 'moharram' ),
				'6' => __( '6 Column(s)', 'moharram' ),
			),
		) );
		$wp_customize->add_setting( 'woor_row', array(
			'default'   => '1',
			'sanitize_callback' => 'moharram_sanitize_no_change',
			'transport'         => 'postMessage',
		) );
		$wp_customize->add_control( 'woor_row', array(
			'section'   => 'woor',
			'type'		=> 'select',
			'label'		=> __( 'Row', 'moharram' ),
			'choices'	=> array(
				'1' => __( '1 Row(s)', 'moharram' ),
				'2' => __( '2 Row(s)', 'moharram' ),
				'3' => __( '3 Row(s)', 'moharram' ),
				'4' => __( '4 Row(s)', 'moharram' ),
				'5' => __( '5 Row(s)', 'moharram' ),
				'6' => __( '6 Row(s)', 'moharram' ),
			),
		) );
		$wp_customize->add_section( 'woos', array(
			'title' => esc_html__( 'Thumbnails', 'moharram' ),
			'panel' => 'woo'
		) );
		$wp_customize->add_setting( 'woos_thumbnails_pos', array(
			'default'   => 'bottom',
			'sanitize_callback' => 'moharram_sanitize_no_change',
			'transport'         => 'postMessage',
		) );
		$wp_customize->add_control( 'woos_thumbnails_pos', array(
			'section'   => 'woos',
			'type'		=> 'select',
			'label'		=> __( 'Position', 'moharram' ),
			'choices'	=> array(
				'top' => __( 'Top', 'moharram' ),
				'right' => __( 'Right', 'moharram' ),
				'bottom' => __( 'Bottom', 'moharram' ),
				'left' => __( 'Left', 'moharram' ),
			),
		) );
		$wp_customize->add_setting( 'woos_thumbnails_items', array(
			'default'   => '4',
			'sanitize_callback' => 'moharram_sanitize_no_change',
			'transport'         => 'postMessage',
		) );
		$wp_customize->add_control( 'woos_thumbnails_items', array(
			'section'   => 'woos',
			'type'		=> 'select',
			'label'		=> __( 'Total', 'moharram' ),
			'choices'	=> array(
				'1' => __( '1 Item(s)', 'moharram' ),
				'2' => __( '2 Item(s)', 'moharram' ),
				'3' => __( '3 Item(s)', 'moharram' ),
				'4' => __( '4 Item(s)', 'moharram' ),
				'5' => __( '5 Item(s)', 'moharram' ),
				'6' => __( '6 Item(s)', 'moharram' ),
			),
		) );

		// Add element footer setting and control.
		$wp_customize->add_panel( 'f', array(
			'title' => esc_html__( 'Footer', 'moharram' ),
		) );
		$fitems = array(
			'cb1' => esc_html__( 'Content Bottom 1', 'moharram' ),
			'cb2' => esc_html__( 'Content Bottom 2', 'moharram' ),
			'cb3' => esc_html__( 'Content Bottom 3', 'moharram' ),
			'cb4' => esc_html__( 'Content Bottom 4', 'moharram' ),
		);
		foreach( $fitems as $k => $v ) {
			$wp_customize->remove_section( 'sidebar-widgets-sbshopr' );
			$wp_customize->add_section( 'sidebar-widgets-' . $k, array(
				'title' => $v,
				'panel' => 'f'
			) );
		}
		$wp_customize->add_section( 'f_ex', array(
			'title' => esc_html__( 'Extend', 'moharram' ),
			'panel' => 'f'
		) );
		$wp_customize->add_setting( 'f_copyright', array(
			'default'   => 'Built with by Saihoai Team 2017',
			'sanitize_callback' => 'moharram_sanitize_no_change',
			'transport'         => 'postMessage',
		) );
		$wp_customize->add_control( 'f_copyright', array(
			'section'   => 'f_ex',
			'type'		=> 'textarea',
			'label'		=> __( 'Copyright', 'moharram' ),
		) );
	}
}
add_action( 'customize_register', 'moharram_customize_register', 200 );
/**
 * Enqueues front-end CSS for color scheme.
 *
 * @since Moharram 1.0
 *
 * @see wp_add_inline_style()
 */
function moharram_color_scheme_css() {
	$cbase = get_theme_mod( 'cbase', '' );

	// Don't do anything if the default color scheme is selected.
	if ( !$cbase ) {
		return;
	}

	$cbase_a = moharram_hex2rgb( $cbase );
	$red = $cbase_a[ 'r' ];
	$green = $cbase_a[ 'g' ];
	$blue = $cbase_a[ 'b' ];

	$data 	= array(
		'cbase' 	=> $cbase,
		'cbase_a' 	=> "rgba({$red}, {$green}, {$blue}, 0.8)",
	);

	$css = moharram_get_content( moharram_customizer_get_asset( 'colors' ), $data );
	wp_enqueue_style( 'moharram-customizer', moharram_customizer_url() );
	wp_add_inline_style( 'moharram-customizer', $css );
}
add_action( 'wp_enqueue_scripts', 'moharram_color_scheme_css', 20 );
/**
 * Enqueues front-end CSS for color scheme.
 *
 * @since Moharram 1.0
 *
 * @see wp_add_inline_style()
 */
function moharram_bg_scheme_css() {
	$bg = get_theme_mod( 'background_image', '' );

	// Don't do anything if the default color scheme is selected.
	if ( !$bg ) {
		return;
	}

	$data 	= array(
		
	);

	$css = moharram_get_content( moharram_customizer_get_asset( 'bg' ), $data );
	wp_enqueue_style( 'moharram-customizer', moharram_customizer_url() );
	wp_add_inline_style( 'moharram-customizer', $css );
}
add_action( 'wp_enqueue_scripts', 'moharram_bg_scheme_css', 20 );
/**
 * Enqueues front-end CSS for color scheme.
 *
 * @since Moharram 1.0
 *
 * @see wp_add_inline_style()
 */
function moharram_header_bg_scheme_css() {
	$bg = get_theme_mod( 'header_image', '' );

	// Don't do anything if the default color scheme is selected.
	if ( !$bg ) {
		return;
	}

	$data 	= array(
		'bg' => $bg	
	);

	$css = moharram_get_content( moharram_customizer_get_asset( 'header_image' ), $data );
	wp_enqueue_style( 'moharram-customizer', moharram_customizer_url() );
	wp_add_inline_style( 'moharram-customizer', $css );
}
add_action( 'wp_enqueue_scripts', 'moharram_header_bg_scheme_css', 20 );

function moharram_loader_css() {
	
	$style 		= get_theme_mod( 'loader_style', 'loading-bar' );
	$color 		= get_theme_mod( 'cbase', '#e91e63' );

	// Don't do anything if the default color scheme is selected.
	if ( empty( $style ) ) {
		return;
	}
	if ( empty( $color ) ) {
		$color = '#e91e63';
	}

	$skins 	= moharram_get_loader_skin();
	$data 	= array(
		'color' 		=> $color,
	);
	if( !isset( $skins[ $style ] ) )
	{
		return '';
	}

	$css = moharram_get_content( $skins[ $style ][ 'path' ], $data );

	wp_enqueue_script( 'moharram-pace', plugins_url( '/a/j/pace.js', __FILE__ ), array(), '20160816', true );
	wp_enqueue_style( 'moharram-customizer', moharram_customizer_url() );
	wp_add_inline_style( 'moharram-customizer', $css );
}
add_action( 'wp_enqueue_scripts', 'moharram_loader_css', 20 );
/**
 * Outputs an Underscore template for generating CSS for the color scheme.
 *
 * The template generates the css dynamically for instant display in the
 * Customizer preview.
 *
 * @since Moharram 1.0
 */
function moharram_color_template() 
{
	$data = array(
		'cbase' 	=> '{{ data.cbase }}',
		'cbase_a' 	=> '{{ data.cbase_a }}',
	);
	echo '<script type="text/html" id="tmpl-moharram-color">';
		echo moharram_get_content( moharram_customizer_get_asset( 'colors' ), $data );
	echo '</script>';
}
add_action( 'customize_controls_print_footer_scripts', 'moharram_color_template' );
/**
 * Outputs an Underscore template for generating CSS for the color scheme.
 *
 * The template generates the css dynamically for instant display in the
 * Customizer preview.
 *
 * @since Moharram 1.0
 */
function moharram_bg_template() 
{
	$data = array(
		
	);
	echo '<script type="text/html" id="tmpl-moharram-bg">';
		echo moharram_get_content( moharram_customizer_get_asset( 'bg' ), $data );
	echo '</script>';
}
add_action( 'customize_controls_print_footer_scripts', 'moharram_bg_template' );

/**
 * Outputs an Underscore template for generating CSS for the topbar.
 *
 * The template generates the css dynamically for instant display in the
 * Customizer preview.
 *
 * @since Struct 1.0
 */
function moharram_header_bg_css_template() 
{
	$data = array(
		'bg' => '{{ data.bg }}',
	);
	echo '<script type="text/html" id="tmpl-struct-header-bg">';
		echo moharram_get_content( moharram_customizer_get_asset( 'header-bg' ), $data );
	echo '</script>';
}
add_action( 'customize_controls_print_footer_scripts', 'moharram_header_bg_css_template' );

/**
 * Outputs an Underscore template for generating CSS for the loader color.
 *
 * The template generates the css dynamically for instant display in the
 * Customizer preview.
 *
 * @since Struct 1.0
 */
if( !function_exists( 'moharram_loader_template' ) )
{
	function moharram_loader_template()
	{
		$skins 	= moharram_get_loader_skin();
		$data 	= array(
			'color' 		=> '{{ data.color }}',
		);
		foreach( $skins as $k => $item )
		{
			$v = moharram_get_content( $item[ 'path' ], $data );
			echo "<script type='text/html' id='tmpl-moharram-loader-{$k}'>{$v}</script>";
		}
	}
}
add_action( 'customize_controls_print_footer_scripts', 'moharram_loader_template' );



















