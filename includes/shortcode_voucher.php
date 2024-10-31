<?php

function regiondo_voucher_init() {

  /**
	 * voucher
	 * [regiondo_voucher]
	 * @return iframe 
	 */
	add_shortcode('regiondo_voucher', 'dh_regiondo_voucher');
	function dh_regiondo_voucher( $atts, $content, $tag ) {
		
		$options = get_option( 'regiondo_options' );
		
		$output = '<iframe src="https://'. esc_attr($options[ 'regiondo_field_domain']) .'/gutschein" 
			frameborder="0"
			data-checkout="lightbox"
			style="margin: 0px; padding: 0px; overflow: hidden; vertical-align: top;  border: 0px; background: transparent; width: 100%; height: 400px;"></iframe>';


		// get the value of the setting we've registered with register_setting()
		// $output .= '<pre>' . print_r($options, true) . '</pre>';

		return $output;
  }
  
}

add_action('init', 'regiondo_voucher_init');