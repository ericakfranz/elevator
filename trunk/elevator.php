<?php
/**
 * Plugin Name: Elevator
 * Plugin URI: https://fatpony.me/plugins/elevator/
 * Description: Smoothly escort your visitors back to the top of the page with music accompaniment and a 'Ting!' on arrival. Choose your music on the Settings > Elevator screen.
 * Version: 1.1.0
 * Author: Erica Franz
 * Author URI: https://fatpony.me/
 * Text Domain: elevator
 * License: MIT
 */

defined( 'ABSPATH' ) or die( 'Please enjoy the music during your wait.' );

define( 'ELEVATOR_VERSION', '1.1.0' );
define( 'ELEVATOR_DEFAULT_TRACK', 'lounge-jazz' );

/**
 * Music artists, for credits. Key => name and link.
 *
 * @return array
 */
function elevator_get_artists() {

	return array(
		'1000-handz'   => array( 'name' => '1000 Handz', 'url' => 'https://freemusicarchive.org/music/1000-handz/' ),
		'aldous'       => array( 'name' => 'Aldous Ichnite', 'url' => 'https://freemusicarchive.org/music/aldous-ichnite/' ),
		'alex-morgan'  => array( 'name' => 'Alex Morgan', 'url' => 'https://freemusicarchive.org/music/alex-morgan/' ),
		'andrew'       => array( 'name' => 'Andrew Walton', 'url' => 'https://freemusicarchive.org/music/Andrew_Walton/' ),
		'auroson'      => array( 'name' => 'AurosonMusic', 'url' => 'https://freemusicarchive.org/music/aurosonmusic/' ),
		'charlie-todd' => array( 'name' => 'Charlie and Todd', 'url' => 'https://freemusicarchive.org/music/Charlie_and_Todd/' ),
		'gagme'        => array( 'name' => 'Gagmesharkoff', 'url' => 'https://freemusicarchive.org/music/gagmesharkoff/' ),
		'jesus'        => array( 'name' => 'Jesus Ángel Morato', 'url' => 'https://freemusicarchive.org/music/jesus-morato/' ),
		'karen'        => array( 'name' => 'Karen', 'url' => 'https://freemusicarchive.org/music/Karen/' ),
		'kevin'        => array( 'name' => 'Kevin MacLeod', 'url' => 'https://freemusicarchive.org/music/Kevin_MacLeod/' ),
		'lite'         => array( 'name' => 'Lite Saturation', 'url' => 'https://litesaturation.com/' ),
		'lobo'         => array( 'name' => 'Lobo Loco', 'url' => 'https://freemusicarchive.org/music/Lobo_Loco/' ),
		'lopkerjo'     => array( 'name' => 'Lopkerjo', 'url' => 'https://freemusicarchive.org/music/john-lopker/' ),
		'lundstroem'   => array( 'name' => 'Lundstroem', 'url' => 'https://freemusicarchive.org/music/lundstroem/' ),
		'monroeville'  => array( 'name' => 'Monroeville Music Center', 'url' => 'https://freemusicarchive.org/music/Monroeville_Music_Center/' ),
		'pulsebox'     => array( 'name' => 'PulseBox', 'url' => '' ),
		'shane'        => array( 'name' => 'Shane Ivers', 'url' => 'https://freemusicarchive.org/music/shane-ivers/' ),
		'soularflair'  => array( 'name' => 'Soularflair', 'url' => 'http://soularflair.net/' ),
		'vade'         => array( 'name' => 'VADE', 'url' => 'https://www.youtube.com/@iamvade' ),
		'waveloom'     => array( 'name' => 'Waveloom', 'url' => 'https://freemusicarchive.org/music/waveloom/' ),
		'wekont'       => array( 'name' => 'wekont', 'url' => 'https://soundcloud.com/wekont' ),
	);

}

/**
 * Available tracks. Key (also the file name in assets/music/, as .ogg) => label, real title and artist.
 *
 * @return array
 */
function elevator_get_tracks() {

	return array(
		'lounge-jazz'      => array( 'label' => __( 'Lounge Jazz', 'elevator' ), 'title' => 'Lounge Jazz Elevator Music', 'artist' => 'auroson' ),
		'alien-track'      => array( 'label' => __( 'Alien Track', 'elevator' ), 'title' => 'Alien Track in D-minor - 5:3:25, 9.02 PM', 'artist' => 'vade' ),
		'android'          => array( 'label' => __( 'That Kind of Android', 'elevator' ), 'title' => 'That kind of Android', 'artist' => 'lundstroem' ),
		'anxious-march'    => array( 'label' => __( 'Anxious March', 'elevator' ), 'title' => 'Anxious March - Short', 'artist' => 'lite' ),
		'art-of-algorithms' => array( 'label' => __( 'The Art of Algorithms', 'elevator' ), 'title' => 'The Art of Algorithms', 'artist' => 'aldous' ),
		'bean-soup'        => array( 'label' => __( 'Popular Bean Soup', 'elevator' ), 'title' => 'Popular Bean Soup', 'artist' => 'lopkerjo' ),
		'christmas'        => array( 'label' => __( 'Christmas', 'elevator' ), 'title' => 'Christmas Free Background Music', 'artist' => 'pulsebox' ),
		'dawns-whisper'    => array( 'label' => __( 'Dawn\'s Whisper', 'elevator' ), 'title' => 'Dawn\'s Whisper (Background Romantic Piano)', 'artist' => 'lite' ),
		'deliveroo-rider'  => array( 'label' => __( 'Deliveroo Rider', 'elevator' ), 'title' => 'Deliveroo Rider', 'artist' => 'andrew' ),
		'dirt-rhodes'      => array( 'label' => __( 'Dirt Rhodes', 'elevator' ), 'title' => 'Dirt Rhodes', 'artist' => 'kevin' ),
		'fugue-state'      => array( 'label' => __( 'Fugue State', 'elevator' ), 'title' => 'FUGUE STATE (dark, soundtrack, glitch)', 'artist' => 'soularflair' ),
		'gnat-cloud'       => array( 'label' => __( 'Gnat Cloud', 'elevator' ), 'title' => 'F*****\' Gnat Cloud!', 'artist' => 'gagme' ),
		'good-guy'         => array( 'label' => __( 'Good Guy', 'elevator' ), 'title' => 'Good Guy', 'artist' => 'lopkerjo' ),
		'hello-everybody'  => array( 'label' => __( 'Hello Everybody', 'elevator' ), 'title' => 'Hello Everybody', 'artist' => 'karen' ),
		'hustle'           => array( 'label' => __( 'Hustle', 'elevator' ), 'title' => 'Hustle', 'artist' => 'kevin' ),
		'indian'           => array( 'label' => __( 'Bollywood', 'elevator' ), 'title' => 'Indian Free Music', 'artist' => 'waveloom' ),
		'mastery'          => array( 'label' => __( 'Mastery', 'elevator' ), 'title' => 'Mastery (sample)', 'artist' => '1000-handz' ),
		'poema'            => array( 'label' => __( 'Poema (spoken word)', 'elevator' ), 'title' => 'Poema de Carilda Oliver para amantes . Poesías de Carilda Oliver', 'artist' => 'jesus' ),
		'ragtime-piano'    => array( 'label' => __( 'Ragtime Piano', 'elevator' ), 'title' => 'Ragtime Coffee Shop Piano Rag', 'artist' => 'alex-morgan' ),
		'rhino'            => array( 'label' => __( 'Rhino', 'elevator' ), 'title' => 'Rhino', 'artist' => '1000-handz' ),
		'slowpolkia'       => array( 'label' => __( 'Slowpolkia', 'elevator' ), 'title' => 'Slowpolkia', 'artist' => 'shane' ),
		'snapping-hippos'  => array( 'label' => __( 'Snapping Hippos', 'elevator' ), 'title' => 'Snapping Hippos (ID 2433)', 'artist' => 'lobo' ),
		'soulful'          => array( 'label' => __( 'Soulful', 'elevator' ), 'title' => 'Soulful Music', 'artist' => 'alex-morgan' ),
		'space-jam'        => array( 'label' => __( 'Space Jam', 'elevator' ), 'title' => 'space jam', 'artist' => 'wekont' ),
		'trigger-select'   => array( 'label' => __( 'Trigger Select', 'elevator' ), 'title' => 'Trigger Select', 'artist' => 'monroeville' ),
		'whopper'          => array( 'label' => __( 'That\'s A Whopper!', 'elevator' ), 'title' => 'That\'s A Whopper!', 'artist' => 'charlie-todd' ),
	);

}

/**
 * Get the selected track key, falling back to the default.
 *
 * @return string
 */
function elevator_get_selected_track() {

	$track = get_option( 'elevator_track', ELEVATOR_DEFAULT_TRACK );

	return array_key_exists( $track, elevator_get_tracks() ) ? $track : ELEVATOR_DEFAULT_TRACK;

}

/**
 * Sanitize the track setting: only known track keys are allowed.
 *
 * @param mixed $value Submitted value.
 * @return string
 */
function elevator_sanitize_track( $value ) {

	$value = is_string( $value ) ? sanitize_key( $value ) : '';

	return array_key_exists( $value, elevator_get_tracks() ) ? $value : ELEVATOR_DEFAULT_TRACK;

}

/**
 * Whether the built-in Back to Top link is output in the footer.
 *
 * Filter `elevator_output_button` to return false to switch it off in code.
 *
 * @return bool
 */
function elevator_should_output_button() {

	$output = '0' !== get_option( 'elevator_output', '1' );

	return (bool) apply_filters( 'elevator_output_button', $output );

}

/**
 * CSS selector of an existing element to attach Elevator to, or an empty string.
 *
 * Filter `elevator_button_selector` to set it in code.
 *
 * @return string
 */
function elevator_get_selector() {

	$selector = get_option( 'elevator_selector', '' );
	$selector = is_string( $selector ) ? $selector : '';

	return (string) apply_filters( 'elevator_button_selector', $selector );

}

/**
 * Sanitize the output setting to '1' or '0'.
 *
 * @param mixed $value Submitted value.
 * @return string
 */
function elevator_sanitize_output( $value ) {

	return '1' === $value ? '1' : '0';

}

/**
 * Sanitize the selector setting: plain text, trimmed, limited length.
 *
 * @param mixed $value Submitted value.
 * @return string
 */
function elevator_sanitize_selector( $value ) {

	$value = is_string( $value ) ? trim( sanitize_text_field( $value ) ) : '';

	return substr( $value, 0, 200 );

}

/**
 * URL of a file in assets/music/.
 *
 * @param string $name File name without extension.
 * @return string
 */
function elevator_music_url( $name ) {

	return plugins_url( 'assets/music/' . $name . '.ogg', __FILE__ );

}

// Register Scripts
function elevator_enqueue_scripts() {

	$path = plugin_dir_url( __FILE__ );

	// Scripts
	wp_register_script( 'elevator', $path . 'assets/js/elevator.min.js', false, ELEVATOR_VERSION, true );
	wp_enqueue_script( 'elevator' );

	// And, elevate!
	$settings = array(
		'mainAudio' => esc_url_raw( elevator_music_url( elevator_get_selected_track() ) ),
		'endAudio'  => esc_url_raw( elevator_music_url( 'ding' ) ),
		'selector'  => elevator_get_selector(),
	);

	// Attach to the custom selector if it matches anything, else to the built-in link.
	$script  = 'window.addEventListener( "load", function() {';
	$script .= 'var settings = ' . wp_json_encode( $settings ) . ';';
	$script .= 'var elements = [];';
	$script .= 'if ( settings.selector ) { try { elements = Array.prototype.slice.call( document.querySelectorAll( settings.selector ) ); } catch ( e ) {} }';
	$script .= 'if ( ! elements.length ) { var builtIn = document.querySelector( ".elevator-button" ); if ( builtIn ) { elements = [ builtIn ]; } }';
	$script .= 'elements.forEach( function( element ) {';
	$script .= 'element.addEventListener( "click", function( event ) { event.preventDefault(); } );';
	$script .= 'new Elevator( { element: element, mainAudio: settings.mainAudio, endAudio: settings.endAudio } );';
	$script .= '} );';
	$script .= '} );';

	wp_add_inline_script( 'elevator', $script );

}

// Hook into the 'wp_enqueue_scripts' action
add_action( 'wp_enqueue_scripts', 'elevator_enqueue_scripts' );

// Add an elevator button
function elevator_button() {

	if ( ! elevator_should_output_button() ) {
		return;
	}

	// Begin Elevator Container
	$button = '<div id="elevator" class="elevator-container">';
		// Basic Inline Style
		$button .= '<style type="text/css" scoped="scoped">#elevator{text-align:center;}.elevator-button{padding:20px;width:auto;margin:auto;display:inline-block;}.elevator-button:hover{cursor:pointer;}</style>';
		// Begin Elevator Button Container
		$button .= '<div class="elevator-button">';
			// Button Text
			$button .= esc_html__( 'Back to Top', 'elevator' ) . '</div>';
		// End Elevator Button Container
		$button .= '</div>';
	// End Elevator Container
	$button .= '</div>';

	echo $button; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- Built from static markup and an escaped string.

}
add_action( 'wp_footer', 'elevator_button', 10 );

// Register the setting
function elevator_register_settings() {

	register_setting(
		'elevator_options',
		'elevator_track',
		array(
			'type'              => 'string',
			'sanitize_callback' => 'elevator_sanitize_track',
			'default'           => ELEVATOR_DEFAULT_TRACK,
		)
	);

	register_setting(
		'elevator_button_options',
		'elevator_output',
		array(
			'type'              => 'string',
			'sanitize_callback' => 'elevator_sanitize_output',
			'default'           => '1',
		)
	);

	register_setting(
		'elevator_button_options',
		'elevator_selector',
		array(
			'type'              => 'string',
			'sanitize_callback' => 'elevator_sanitize_selector',
			'default'           => '',
		)
	);

}
add_action( 'admin_init', 'elevator_register_settings' );

// Add the options page
function elevator_add_options_page() {

	add_options_page(
		__( 'Elevator', 'elevator' ),
		__( 'Elevator', 'elevator' ),
		'manage_options',
		'elevator',
		'elevator_render_options_page'
	);

}
add_action( 'admin_menu', 'elevator_add_options_page' );

// Add a Settings link on the Plugins screen
function elevator_action_links( $links ) {

	$settings_link = '<a href="' . esc_url( admin_url( 'options-general.php?page=elevator' ) ) . '">' . esc_html__( 'Settings', 'elevator' ) . '</a>';
	array_unshift( $links, $settings_link );

	return $links;

}
add_filter( 'plugin_action_links_' . plugin_basename( __FILE__ ), 'elevator_action_links' );

// Load the preview script on the options page only
function elevator_admin_scripts( $hook_suffix ) {

	if ( 'settings_page_elevator' !== $hook_suffix ) {
		return;
	}

	wp_enqueue_script( 'elevator-admin', plugins_url( 'assets/js/elevator-admin.js', __FILE__ ), array(), ELEVATOR_VERSION, true );

}
add_action( 'admin_enqueue_scripts', 'elevator_admin_scripts' );

// Render the options page
function elevator_render_options_page() {

	if ( ! current_user_can( 'manage_options' ) ) {
		return;
	}

	$tracks   = elevator_get_tracks();
	$artists  = elevator_get_artists();
	$selected = elevator_get_selected_track();
	// Tab is display-only, so no nonce is needed.
	$tab = ( isset( $_GET['tab'] ) && 'button' === sanitize_key( wp_unslash( $_GET['tab'] ) ) ) ? 'button' : 'music'; // phpcs:ignore WordPress.Security.NonceVerification.Recommended
	?>
	<div class="wrap">
		<h1><?php echo esc_html( get_admin_page_title() ); ?></h1>

		<h2 class="nav-tab-wrapper">
			<a href="<?php echo esc_url( admin_url( 'options-general.php?page=elevator' ) ); ?>" class="nav-tab<?php echo 'music' === $tab ? ' nav-tab-active' : ''; ?>"><?php esc_html_e( 'Music', 'elevator' ); ?></a>
			<a href="<?php echo esc_url( admin_url( 'options-general.php?page=elevator&tab=button' ) ); ?>" class="nav-tab<?php echo 'button' === $tab ? ' nav-tab-active' : ''; ?>"><?php esc_html_e( 'Back to Top Link', 'elevator' ); ?></a>
		</h2>

		<?php if ( 'button' === $tab ) : ?>
		<p><?php esc_html_e( 'Choose whether Elevator adds its own Back to Top link, or attach the elevator ride to a link your theme already has.', 'elevator' ); ?></p>

		<form action="options.php" method="post">
			<?php settings_fields( 'elevator_button_options' ); ?>
			<table class="form-table" role="presentation">
				<tbody>
					<tr>
						<th scope="row"><?php esc_html_e( 'Elevator link', 'elevator' ); ?></th>
						<td>
							<input type="hidden" name="elevator_output" value="0" />
							<label>
								<input type="checkbox" name="elevator_output" value="1" <?php checked( '0' !== get_option( 'elevator_output', '1' ) ); ?> />
								<?php esc_html_e( 'Add the Back to Top link to the bottom of every page', 'elevator' ); ?>
							</label>
							<p class="description"><?php esc_html_e( 'Turn this off if your theme already has a Back to Top link.', 'elevator' ); ?></p>
						</td>
					</tr>
					<tr>
						<th scope="row"><label for="elevator_selector"><?php esc_html_e( 'Use my own link', 'elevator' ); ?></label></th>
						<td>
							<input type="text" id="elevator_selector" name="elevator_selector" class="regular-text code" value="<?php echo esc_attr( get_option( 'elevator_selector', '' ) ); ?>" placeholder=".back-to-top" />
							<p class="description"><?php esc_html_e( 'Optional. Enter a CSS selector for an existing link, such as .back-to-top or #scroll-top. Clicking it will play the music and scroll to the top. If nothing on the page matches, the built-in link is used.', 'elevator' ); ?></p>
						</td>
					</tr>
				</tbody>
			</table>
			<?php submit_button(); ?>
		</form>
		<?php else : ?>
		<p><?php esc_html_e( 'Choose the music that plays while your visitors ride back to the top. A ding always plays when they arrive.', 'elevator' ); ?></p>

		<form action="options.php" method="post">
			<?php settings_fields( 'elevator_options' ); ?>
			<table class="widefat striped" style="max-width:700px;">
				<tbody>
					<?php foreach ( $tracks as $key => $track ) : ?>
						<tr>
							<td>
								<label>
									<input type="radio" name="elevator_track" value="<?php echo esc_attr( $key ); ?>" <?php checked( $selected, $key ); ?> />
									<strong><?php echo esc_html( $track['label'] ); ?></strong>
									<?php if ( ELEVATOR_DEFAULT_TRACK === $key ) : ?>
										<em><?php esc_html_e( '(default)', 'elevator' ); ?></em>
									<?php endif; ?>
									<br />
									<small class="description">
										<?php
										$artist = isset( $artists[ $track['artist'] ] ) ? $artists[ $track['artist'] ] : null;
										echo '&ldquo;' . esc_html( $track['title'] ) . '&rdquo;';
										if ( $artist ) {
											echo ' ' . esc_html__( 'by', 'elevator' ) . ' ';
											if ( '' !== $artist['url'] ) {
												echo '<a href="' . esc_url( $artist['url'] ) . '" target="_blank" rel="nofollow noopener noreferrer">' . esc_html( $artist['name'] ) . '</a>';
											} else {
												echo esc_html( $artist['name'] );
											}
										}
										?>
									</small>
								</label>
							</td>
							<td style="text-align:right;">
								<button type="button" class="button elevator-preview" data-src="<?php echo esc_url( elevator_music_url( $key ) ); ?>" data-play="<?php esc_attr_e( 'Preview', 'elevator' ); ?>" data-stop="<?php esc_attr_e( 'Stop', 'elevator' ); ?>"><?php esc_html_e( 'Preview', 'elevator' ); ?></button>
							</td>
						</tr>
					<?php endforeach; ?>
					<tr>
						<td><?php esc_html_e( 'Ding (always plays at the top)', 'elevator' ); ?></td>
						<td style="text-align:right;">
							<button type="button" class="button elevator-preview" data-src="<?php echo esc_url( elevator_music_url( 'ding' ) ); ?>" data-play="<?php esc_attr_e( 'Preview', 'elevator' ); ?>" data-stop="<?php esc_attr_e( 'Stop', 'elevator' ); ?>"><?php esc_html_e( 'Preview', 'elevator' ); ?></button>
						</td>
					</tr>
				</tbody>
			</table>
			<?php submit_button(); ?>
		</form>
		<?php endif; ?>

		<h2><?php esc_html_e( 'Credits', 'elevator' ); ?></h2>
		<p>
			<?php
			printf(
				/* translators: 1: link to the author's website, 2: link to the plugin page. */
				esc_html__( 'Elevator by %1$s. Plugin page: %2$s.', 'elevator' ),
				'<a href="' . esc_url( 'https://fatpony.me/' ) . '" target="_blank" rel="noopener noreferrer">Erica Franz</a>',
				'<a href="' . esc_url( 'https://fatpony.me/plugins/elevator' ) . '" target="_blank" rel="noopener noreferrer">fatpony.me/plugins/elevator</a>'
			);
			?>
		</p>
		<p>
			<?php
			printf(
				/* translators: %s: link to Elevator.js. */
				esc_html__( 'Based on %s by Tim Holman.', 'elevator' ),
				'<a href="' . esc_url( 'https://github.com/tholman/elevator.js' ) . '" target="_blank" rel="noopener noreferrer">Elevator.js</a>'
			);
			?>
		</p>
		<p><?php esc_html_e( 'All music is Creative Commons licensed; see the credit under each track on the Music tab.', 'elevator' ); ?></p>
	</div>
	<?php

}
