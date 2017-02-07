<?php

if( function_exists( 'vc_set_shortcodes_templates_dir' ) )
{
  	vc_set_shortcodes_templates_dir( __DIR__ . '/vc' );
}

if( !function_exists( 'moharram_fx_row' ) )
{
	function moharram_fx_row()
	{
		$params = array(
			array(
			    'type' => 'dropdown',
			    'heading' => esc_html__( 'Mouse effect', 'moharram' ),
			    'param_name' => 'fx_canvas',
			    'value' => array(
			    	esc_html__( 'None', 'moharram' ) => '',
			    	esc_html__( 'Winter', 'moharram' ) => 'winter',
			    	esc_html__( 'Low poly', 'moharram' ) => 'lowpoly',
			    	esc_html__( 'Constellation', 'moharram' ) => 'costelation',
			    ),
			    'group' =>  esc_html__( 'Background', 'moharram' ),
			),
			array(
			    'type' => 'colorpicker',
			    'heading' => esc_html__( 'Effect color', 'moharram' ),
			    'param_name' => 'fx_canvas_color',
			    'group' =>  esc_html__( 'Background', 'moharram' ),
			)
		);
		vc_add_params( 'vc_row', $params ); // Note: 'vc_message' was used as a base for "Row" element
	}
}
add_action( 'vc_before_init', 'moharram_fx_row' );

if( !function_exists( 'moharram_fx_canvas' ) )
{
	function moharram_fx_canvas( $fx = 'winter', $fx_canvas_color = '' )
	{
		$color = '';

		if( !empty( $fx ) )
		{
			wp_enqueue_script( 'moharram-fxrow', plugins_url( '/a/j/fxrow.js', __FILE__ ), array( 'jquery' ) );	
		}
		if( $fx == 'winter' )
		{
			wp_enqueue_script( 'moharram-winter', plugins_url( '/a/j/winter.js', __FILE__ ), array( 'jquery' ) );
		}
		elseif( $fx == 'lowpoly' )
		{
			wp_enqueue_script( 'moharram-lowpoly', plugins_url( '/a/j/lowpoly.js', __FILE__ ), array( 'jquery' ) );
		}
		elseif( $fx == 'costelation' )
		{
			wp_enqueue_script( 'moharram-costelation', plugins_url( '/a/j/costelation.js', __FILE__ ), array( 'jquery' ) );
			wp_enqueue_script( 'moharram-TweenLite', plugins_url( '/a/j/TweenLite.min.js', __FILE__ ), array( 'jquery' ) );
			wp_enqueue_script( 'moharram-EasePack', plugins_url( '/a/j/EasePack.min.js', __FILE__ ), array( 'jquery' ) );
		}

		if( empty( $fx_canvas_color ) )
		{
			$fx_canvas_color = '#fff';
		}

		if( ( $fx_canvas_color = moharram_hex2rgb_vc( $fx_canvas_color ) ) && count( $fx_canvas_color ) > 0 )
		{
			$red = $fx_canvas_color['red'];
			$green = $fx_canvas_color['green'];
			$blue = $fx_canvas_color['blue'];
			$color = " data-color='rgba({$red},{$green},{$blue},a)'";

			echo '<canvas id="fx-row" class="fx-row"'.$color.'></canvas>';
		}
	}
}
add_action( 'moharram_fx_canvas', 'moharram_fx_canvas', 10, 2 );

/**
 * Converts a HEX value to RGB.
 *
 * @since moharramm 1.0
 *
 * @param string $color The original color, in 3- or 6-digit hexadecimal form.
 * @return array Array containing RGB (red, green, and blue) values for the given
 *               HEX code, empty array otherwise.
 */
function moharram_hex2rgb_vc( $color ) {
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

	return array( 'red' => $r, 'green' => $g, 'blue' => $b );
}