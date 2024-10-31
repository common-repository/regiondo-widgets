<?php

function regiondo_review_init() {
  /**
   * review 
   * [regiondo_review offer="xxx"]
   * @return iframe 
   */

	add_shortcode('regiondo_review', 'dh_regiondo_review');
	function dh_regiondo_review( $atts, $content, $tag ) {
		
		$options = get_option( 'regiondo_options' );
		$reviews_number = empty($options['regiondo_filed_reviews_per_page']) ? '3' : $options['regiondo_filed_reviews_per_page'];
		
		$sc = shortcode_atts( array(
			'offer' => ''
			), $atts );
		
		if ($sc['offer'] === 'xxxxx') {
			$output = 'Please add the offer ID to you shortcode. <br> like this:[regiondo_booking offer="11111"]';
			return $output;
		};

		$output = '<iframe 
				id="regiondo-review-widget" 
				style="border:0;background:transparent;"
				data-url="https://'. esc_attr($options['regiondo_field_domain']) .'/reviewwidget/vendor/'.esc_attr($options[ 'regiondo_field_vendor_id']).'"
				data-width="100%"
				data-products="'.esc_attr( $sc['offer'] ).'"
				data-language="de_DE"
				data-number="'. esc_attr($reviews_number) .'"
				data-total="'. esc_attr($options['regiondo_filed_reviews_show_total']) .'"
				data-colors="#ecf3f4,#ffffff,#3d3d3d,#ecb86b">
			</iframe>';
		$output .= '<script 
				id="regiondo-reviews-js" 
				src="https://cdn.regiondo.net/js/integration/regiondo-reviews.js" 
				async 
				defer>
			</script>';

		// get the value of the setting we've registered with register_setting()
		// $output .= '<pre>' . print_r($options, true) . '</pre>';

		return $output;
	}
}

add_action('init', 'regiondo_review_init');