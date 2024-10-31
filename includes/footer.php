<?php

/**
 * add footer scripts for the regiondo widgets
 */
add_action('wp_footer', 'regiondo_footer');
function regiondo_footer(){

	$options = get_option( 'regiondo_options' );
	// echo '<pre>' . print_r($options, true) . '</pre>';
?>

<script id="regiondo-booking-js" 
	src="https://cdn.regiondo.net/js/integration/regiondo-booking.js" 
	data-url="https://<?= esc_attr($options['regiondo_field_domain']) ?>/"
	data-cart-show="<?= $options['regiondo_filed_cartButton_checkbox'] === "1" ? "true" : "false" ?>"
	data-cart-price="<?= $options['regiondo_filed_cartButton_price'] === "1" ? "true" : "false" ?>"
	data-cart-qty="<?= $options['regiondo_filed_cartButton_quatity'] === "1" ? "true" : "false" ?>"
	data-cart-text="<?= $options['regiondo_field_cartButton_text'] ?>"
	data-cart-icon="https://cdn.regiondo.net/js/integration/regiondo-cart-icon.png"
	data-cart-color="#ffffff"
	data-cart-background="#78d28c"
	data-cart-position="bottom-right"
	data-cart-font
	async defer></script>
<?php
};