<?php


/**
 * custom option and settings
 */
function regiondo_settings_init() {
	// register a new setting for "regiondo" page
	register_setting( 'regiondo', 'regiondo_options' );
	
	// sections
	add_settings_section(
		'regiondo_settings_section', // $id
		__( 'Region Plugin Setup', 'regiondo' ), // $title
		'regiondo_settings_section_cb', // $callback
		'regiondo' // $page
	);
	
	// a section for a dropdown
	// add_settings_section(
	// 	'regiondo_section_developers',
	// 	__( 'The Matrix has you.', 'regiondo' ),
	// 	'regiondo_section_developers_cb',
	// 	'regiondo'
	// );

	// dropdown
	// add_settings_field(
	// 	'regiondo_field_pill', // as of WP 4.6 this value is used only internally
	// 	// use $args' label_for to populate the id inside the callback
	// 	__( 'Pill', 'regiondo' ),
	// 	'regiondo_field_pill_cb',
	// 	'regiondo',
	// 	'regiondo_section_developers',
	// 	[
	// 		'label_for' => 'regiondo_field_pill',
	// 		'class' => 'regiondo_row',
	// 		'regiondo_custom_data' => 'custom',
	// 	]
	// );

	add_settings_field(
		'regiondo_field_domain', // use $args' label_for to populate the id inside the callback
		__( 'Your Regiondo Domain', 'regiondo' ), 
		'regiondo_field_domain_cb', // $page
		'regiondo', // $page
		'regiondo_settings_section', 
		[
			'label_for' => 'regiondo_field_domain'
		] 
	);

	add_settings_field(
		'regiondo_field_vendor_id', // use $args' label_for to populate the id inside the callback
		__( 'Your Regiondo Vendor ID', 'regiondo' ), 
		'regiondo_field_vendor_id_cb', // $page
		'regiondo', // $page
		'regiondo_settings_section', 
		[
			'label_for' => 'regiondo_field_vendor_id'
		] 
	);


	// Cart
	add_settings_field(
		'regiondo_filed_cartButton_checkbox', 
		__( 'Cart Button', 'regiondo' ),
		'regiondo_filed_cartButton_checkbox_cb',
		'regiondo',
		'regiondo_settings_section', 
		[
				'label_for' => 'regiondo_filed_cartButton_checkbox'
		] 
	);

	add_settings_field(
		'regiondo_filed_cartButton_price', 
		__( 'Cart Button: Show price', 'regiondo' ),
		'regiondo_filed_cartButton_price_cb',
		'regiondo',
		'regiondo_settings_section', 
		[
				'label_for' => 'regiondo_filed_cartButton_price'
		] 
	);

	add_settings_field(
		'regiondo_filed_cartButton_quatity', 
		__( 'Cart Button: Show quantity', 'regiondo' ),
		'regiondo_filed_cartButton_quatity_cb',
		'regiondo',
		'regiondo_settings_section', 
		[
				'label_for' => 'regiondo_filed_cartButton_quatity'
		] 
	);

	add_settings_field(
		'regiondo_field_cartButton_text', // use $args' label_for to populate the id inside the callback
		__( 'Cart Button: Text', 'regiondo' ), 
		'regiondo_field_cartButton_text_cb', // $page
		'regiondo', // $page
		'regiondo_settings_section', 
		[
			'label_for' => 'regiondo_field_cartButton_text'
		] 
	);

	// Reviews
	add_settings_field(
		'regiondo_filed_reviews_per_page', 
		__( 'Reviews: per page', 'regiondo' ),
		'regiondo_filed_reviews_per_page_cb',
		'regiondo',
		'regiondo_settings_section', 
		[
				'label_for' => 'regiondo_filed_reviews_per_page'
		] 
	);
	// if ( get_option( 'regiondo_filed_reviews_per_page' ) === false ) // Nothing yet saved
  //   update_option( 'regiondo_filed_reviews_per_page', '3' );

	add_settings_field(
		'regiondo_filed_reviews_show_total', 
		__( 'Reviews: show total', 'regiondo' ),
		'regiondo_filed_reviews_show_total_cb',
		'regiondo',
		'regiondo_settings_section', 
		[
				'label_for' => 'regiondo_filed_reviews_show_total'
		] 
	);







	// show a dropdown
	// add_settings_field(
	// 	'regiondo_field_url', // as of WP 4.6 this value is used only internally
	// 	// use $args' label_for to populate the id inside the callback
	// 	__( 'Pill', 'regiondo' ), // $title
	// 	'regiondo_field_url_cb', c
	// 	'regiondo', // $page
	// 	'regiondo_settings_section',  
	// 	[
	// 		'label_for' => 'regiondo_field_url',
	// 		'class' => 'regiondo_row',
	// 		'regiondo_custom_data' => 'custom',
	// 	]
	// );

	


}
	


 /**
	* register our regiondo_settings_init to the admin_init action hook
	*/
add_action( 'admin_init', 'regiondo_settings_init' );
	








/**
	* custom option and settings:
	* callback functions
  *
	* section callbacks can accept an $args parameter, which is an array.
  * $args have the following keys defined: title, id, callback.
  * the values are defined at the add_settings_section() function.
	*/

	



// field Domain
function regiondo_field_domain_cb( $args ) {
	$options = get_option( 'regiondo_options' );
	?>
	<input type="text" 
		id="<?php echo esc_attr( $args['label_for'] ); ?>" 
		name="regiondo_options[<?php echo esc_attr( $args['label_for'] ); ?>]"
		value="<?php echo $options[ 'regiondo_field_domain']; ?>"
		required />
	<?php
}

// field Vendor ID
function regiondo_field_vendor_id_cb( $args ) {
	$options = get_option( 'regiondo_options' );
	?>
	<input type="text" 
		id="<?php echo esc_attr( $args['label_for'] ); ?>" 
		name="regiondo_options[<?php echo esc_attr( $args['label_for'] ); ?>]"
		value="<?php echo $options[ 'regiondo_field_vendor_id']; ?>"
		required />
	<?php
}

// field Cart Button 
function regiondo_filed_cartButton_checkbox_cb( $args ) {
	$options = get_option( 'regiondo_options' );
	?>
	<input type='checkbox' 
		id="<?php echo esc_attr( $args['label_for'] ); ?>"  
		name="regiondo_options[<?php echo esc_attr( $args['label_for'] ); ?>]"
		value="1"
		<?php checked( '1', $options[ 'regiondo_filed_cartButton_checkbox'] ); ?>/>
	<?php
}

// field Cart Button price
function regiondo_filed_cartButton_price_cb( $args ) {
	$options = get_option( 'regiondo_options' );
	?>
	<input type='checkbox' 
		id="<?php echo esc_attr( $args['label_for'] ); ?>"  
		name="regiondo_options[<?php echo esc_attr( $args['label_for'] ); ?>]"
		value="1"
		<?php checked( '1', $options[ 'regiondo_filed_cartButton_price'] ); ?>/>
	<?php
}

// field Cart Button quantity
function regiondo_filed_cartButton_quatity_cb( $args ) {
	$options = get_option( 'regiondo_options' );
	?>
	<input type='checkbox' 
		id="<?php echo esc_attr( $args['label_for'] ); ?>"  
		name="regiondo_options[<?php echo esc_attr( $args['label_for'] ); ?>]"
		value="1"
		<?php checked( '1', $options[ 'regiondo_filed_cartButton_quatity'] ); ?>/>
	<?php
}

// field Cart Button Text
function regiondo_field_cartButton_text_cb( $args ) {
	$options = get_option( 'regiondo_options' );
	?>
	<input type="text" 
		id="<?php echo esc_attr( $args['label_for'] ); ?>" 
		name="regiondo_options[<?php echo esc_attr( $args['label_for'] ); ?>]"
		value="<?php echo $options[ 'regiondo_field_cartButton_text']; ?>"/>
	<?php
}


// field Reviews per page
function regiondo_filed_reviews_per_page_cb( $args ) {
	$options = get_option( 'regiondo_options' );
	?>
	<input type="number" 
		id="<?php echo esc_attr( $args['label_for'] ); ?>" 
		name="regiondo_options[<?php echo esc_attr( $args['label_for'] ); ?>]"
		value="<?php echo $options[ 'regiondo_filed_reviews_per_page']; ?>"/>
	<?php
}

// field Reviews show total
function regiondo_filed_reviews_show_total_cb( $args ) {
	$options = get_option( 'regiondo_options' );
	?>
	<input type='checkbox' 
		id="<?php echo esc_attr( $args['label_for'] ); ?>"  
		name="regiondo_options[<?php echo esc_attr( $args['label_for'] ); ?>]"
		value="1"
		<?php checked( '1', $options[ 'regiondo_filed_reviews_show_total'] ); ?>/>
	<?php
}





// field dropdown

// field callbacks can accept an $args parameter, which is an array.
// $args is defined at the add_settings_field() function.
// wordpress has magic interaction with the following keys: label_for, class.
// the "label_for" key value is used for the "for" attribute of the <label>.
// the "class" key value is used for the "class" attribute of the <tr> containing the field.
// you can add custom key value pairs to be used inside your callbacks.

function regiondo_field_pill_cb( $args ) {
	// get the value of the setting we've registered with register_setting()
	$options = get_option( 'regiondo_options' );
	// output the field
	?>
	<select id="<?php echo esc_attr( $args['label_for'] ); ?>"
	data-custom="<?php echo esc_attr( $args['regiondo_custom_data'] ); ?>"
	name="regiondo_options[<?php echo esc_attr( $args['label_for'] ); ?>]"
	>
	<option value="red" <?php echo isset( $options[ $args['label_for'] ] ) ? ( selected( $options[ $args['label_for'] ], 'red', false ) ) : ( '' ); ?>>
	<?php esc_html_e( 'red pill', 'regiondo' ); ?>
	</option>
	<option value="blue" <?php echo isset( $options[ $args['label_for'] ] ) ? ( selected( $options[ $args['label_for'] ], 'blue', false ) ) : ( '' ); ?>>
	<?php esc_html_e( 'blue pill', 'regiondo' ); ?>
	</option>
	</select>
	<p class="description">
	<?php esc_html_e( 'You take the blue pill and the story ends. You wake in your bed and you believe whatever you want to believe.', 'regiondo' ); ?>
	</p>
	<p class="description">
	<?php esc_html_e( 'You take the red pill and you stay in Wonderland and I show you how deep the rabbit-hole goes.', 'regiondo' ); ?>
	</p>
	<?php
}
	


















/**
  * top level menu
	*/
function regiondo_options_page() {
	// add top level menu page
	add_menu_page(
	'Regiondo',
	'Regiondo',
	'manage_options',
	'regiondo',
	'regiondo_options_page_html',
	'dashicons-cart',
	'59'
	);
}
	










/**
 * register our regiondo_options_page to the admin_menu action hook
 */
add_action( 'admin_menu', 'regiondo_options_page' );
	
