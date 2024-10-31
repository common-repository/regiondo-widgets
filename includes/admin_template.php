<?php
/**
 * top level menu:
 * callback functions
 */
function regiondo_options_page_html() {
	// check user capabilities
	if ( ! current_user_can( 'manage_options' ) ) {
		return;
	}
	
	// add error/update messages
	
	// check if the user have submitted the settings
	// wordpress will add the "settings-updated" $_GET parameter to the url
	if ( isset( $_GET['settings-updated'] ) ) {
		// add settings saved message with the class of "updated"
		add_settings_error( 'regiondo_messages', 'regiondo_message', __( 'Settings Saved', 'regiondo' ), 'updated' );
	}
	
	// show error/update messages
	settings_errors( 'regiondo_messages' );
	?>
		<div class="wrap">
		<h1><?php echo esc_html( get_admin_page_title() ); ?></h1>

		<h2>Shortcode Usage</h2>
		<br>


		
		
		<figure style="margin: 0 0 3em;">
			<img src="<?php echo esc_url( plugins_url( '/assets/offer_id.jpg', dirname(__FILE__) ) ); ?>" alt=""
				width="3012" height="504"
				style="max-width: 1200px;width: 100%; height: auto; ">
			<figcaption>Here you can find the offer ID, or SKU you want to offer a widget for.</figcaption>
		</figure>
		
		
		<pre><strong>[regiondo_booking offer="xxxxx"]</strong></pre> 
		<p>The <strong>Booking Widget</strong> must be used with the Offer ID. <br>
		You will find the offer ID at Regiondo "Manage Offers -> My Offers" as the second line in the SKU column. <br>
		The offer ID has 5 digits</p> 


		<br>
		<pre><strong>[regiondo_review offer="xxxxx"]</strong></pre>
		<p><strong>Reviews</strong> will output all Regiondo reviews merged or the ones of the <strong>Offer ID´s</strong>	 you entered. <br>
		<i>[regiondo_review]</i> => Omitting the offers attribute will give you all available reviews of the given Regiondo account. <br>
		<i>[regiondo_review offer="xxxxx"]</i> => Reviews of the offer with the ID "xxxxx"<br>
		<i>[regiondo_review offer="xxxxx,yyyyyy,zzzzzz"]</i> => Reviews of all the offers with the IDs "xxxxx", "yyyyy" and "zzzzz".<br>
		</p>



		<br>
		<pre><strong>[regiondo_voucher]</strong></pre>
		<p>The <strong>Voucher Widget</strong> will check Gift Vouchers and offer checkout if a valid gift voucher code was entered. <br>
		Value Vouchers will not be accepted here, but can be entered on checkout after using the booking widget.</p>





			<br>
			<br>
			<br>
			<br>
			<br>
			<br>
			<br>

	<?php


	// Settings 
	function regiondo_settings_section_cb( $args ) {
		?>
		<p id="<?php echo esc_attr( $args['id'] ); ?>"><?php esc_html_e( 'Enter the data of your Regiondo account.', 'regiondo' ); ?></p>
		<figure style="margin: 0 0 3em;">
			<img src="<?php echo esc_url( plugins_url( '/assets/setup.jpg', dirname(__FILE__) ) ); ?>" alt=""
				width="1848" height="812"
				style="max-width: 1200px;width: 100%; height: auto; ">
			<figcaption>Here you can find your <strong>Domain</strong> and your <strong>Vendor ID</strong>.</figcaption>
		</figure>
		<?php
	}
	?>

	<form action="options.php" method="post">
		<?php
		// output security fields for the registered setting "regiondo"
		settings_fields( 'regiondo' );
		// output setting sections and their fields
		// (sections are registered for "regiondo", each field is registered to a specific section)
		do_settings_sections( 'regiondo' );
		// output save settings button
		submit_button( 'Save Settings' );

		// $options = get_option( 'regiondo_options' );
		// echo '<pre>' . print_r($options, true) . '</pre>';

		?>
	</form>
	</div>
	<?php
 }