<?php

function regiondo_booking_init() {

	/**
	 * booking widget
	 * [regiondo_booking offer="xxx"]
	 * @return iframe 
	 */
	
	add_shortcode('regiondo_booking', 'dh_regiondo_booking');
	function dh_regiondo_booking( $atts, $content, $tag ) {
		
		$options = get_option( 'regiondo_options' );
		$sc = shortcode_atts( array(
			'offer' => ''
			), $atts );
		
		if ($sc['offer'] === '' || $sc['offer'] === 'xxxxx') {
			$output = 'Please add the offer ID to you shortcode. <br> like this:[regiondo_booking offer="11111"]';
			return $output;
		};

		$output = '<iframe id="regiondo-booking-widget" 
		data-width="338px" data-checkout="lightbox" 
		data-url="https://'. esc_attr($options[ 'regiondo_field_domain']) .'/bookingwidget/vendor/'.esc_attr($options[ 'regiondo_field_vendor_id']).'/id/' . esc_attr( $sc['offer'] ) . '" data-title="Klangreise" 
		style="border:0;background:transparent;"></iframe>';
		

		// get the value of the setting we've registered with register_setting()
		// $output .= '<pre>' . print_r($options, true) . '</pre>';

		return $output;
	}
}

add_action('init', 'regiondo_booking_init');