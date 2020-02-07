<?php
/*
Plugin Name: Enkel Plugin
Description: Beskrivning
Version:     1.0
Author:      Mild Media
Author URI:  https://www.mildmedia.se
*/

// Register plugin settings
function ep_register_settings() {
	$options = get_option( 'plugin:ep_settings' );

	// Define settings
	$defaults = array(
		'installning1' => '',
	);

	$options = wp_parse_args( $options, $defaults );

	update_option( 'plugin:ep_settings', $options );

	register_setting(
		'plugin:ep_group',
		'plugin:ep_settings',
		'ep_callback' );
}

add_action( 'admin_init', 'ep_register_settings' );

// Add a settings/option page
function ep_register_options_page() {
	add_options_page( 'Enkel plugin', 'Enkel plugin', 'manage_options', 'ep_plugin', 'ep_options_page' );
}

add_action( 'admin_menu', 'ep_register_options_page' );

function ep_options_page() {
    $settings = get_option( 'plugin:ep_settings' ); ?>

<?php screen_icon();?>

<section class="section section-with-columns section-tables">
	<form method="post" action="options.php">
		<?php settings_fields( 'plugin:ep_group' ); ?>
		<header class="section-header">
			<h2>Min plugin</h2>
			<p>Beskrivning</p>
			<hr>
		</header>
		<table class="form-table">
			<tbody>
				<tr>
					<th scope="row"><label for="plugin:ep_settings[installning1]">Inställning 1</label></th>
					<td>
						<input name="plugin:ep_settings[installning1]" type="text" value="<?php echo $settings['installning1']; ?>" class="small-input">
					</td>
				</tr>
		    </tbody>
		</table>
		<?php submit_button();?>
	</form>
</section>

<?php
}; 

// Plugin code

?>
