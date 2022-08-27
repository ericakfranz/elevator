<?php
/**
 * Plugin Name: Elevator
 * Plugin URI: https://fatpony.me/plugins/elevator/
 * Description: Smoothly escort your visitors back to the top of the page with music accompaniment and a 'Ting!' on arrival.
 * Version: 1.0.5.4
 * Author: Erica Franz
 * Author URI: https://fatpony.me/
 * Text Domain: elevator
 * License: MIT
 */

defined( 'ABSPATH' ) or die( 'Please enjoy the music during your wait.' );


// Settings Page: Elevator
// Retrieving values: get_option( 'your_field_id' )
class Elevator_Settings_Page {

	public function __construct() {
		add_action( 'admin_menu', array( $this, 'wph_create_settings' ) );
		add_action( 'admin_init', array( $this, 'wph_setup_sections' ) );
		add_action( 'admin_init', array( $this, 'wph_setup_fields' ) );
                add_action( 'admin_footer', array( $this, 'media_fields' ) );
		add_action( 'admin_enqueue_scripts', 'wp_enqueue_media' );
	}

	public function wph_create_settings() {
		$page_title = 'Elevator Settings';
		$menu_title = 'Elevator';
		$capability = 'manage_options';
		$slug = 'Elevator';
		$callback = array($this, 'wph_settings_content');
                add_management_page($page_title, $menu_title, $capability, $slug, $callback);

	}

	public function wph_settings_content() { ?>
		<div class="wrap">
			<h1>Elevator</h1>
			<?php settings_errors(); ?>
			<form method="POST" action="options.php">
				<?php
					settings_fields( 'Elevator' );
					do_settings_sections( 'Elevator' );
					submit_button();
				?>
			</form>
		</div> <?php
	}

	public function wph_setup_sections() {
		add_settings_section( 'Elevator_section', 'Options for the Elevator WordPress plugin.', array(), 'Elevator' );
	}

	public function wph_setup_fields() {
		$fields = array(
                    array(
                        'section' => 'Elevator_section',
                        'label' => 'Elevator Doors',
                        'id' => 'elevator-doors',
                        'type' => 'radio',
                        'options' => array(
                            'default' => 'No Doors',
                            'modern' => 'Modern Doors',
                            'metal' => 'Metal Gate',
                            'freight' => 'Freight Doors'
                        )
                    ),

                    array(
                        'section' => 'Elevator_section',
                        'label' => 'Custom Elevator Music',
                        'placeholder' => 'Choose .ogg music file',
                        'id' => 'elevator-music',
                        'desc' => 'Upload your own custom elevator music.',
                        'type' => 'media',
                        'returnvalue' => 'url'
                    )
		);
		foreach( $fields as $field ){
			add_settings_field( $field['id'], $field['label'], array( $this, 'wph_field_callback' ), 'Elevator', $field['section'], $field );
			register_setting( 'Elevator', $field['id'] );
		}
	}
	public function wph_field_callback( $field ) {
		$value = get_option( $field['id'] );
		$placeholder = '';
		if ( isset($field['placeholder']) ) {
			$placeholder = $field['placeholder'];
		}
    if( isset($field['desc']) ) {
			if( $desc = $field['desc'] ) {
				printf( '<p class="description">%s </p>', $desc );
			}
		}
		switch ( $field['type'] ) {

                        case 'media':
                            $field_url = '';
                            if ($value) {
                                if ($field['returnvalue'] == 'url') {
                                    $field_url = $value;
                                } else {
                                    $field_url = wp_get_attachment_url($value);
                                }
                            }
                            printf(
                                '<input style="display:block;background:transparent;border:none;width:100%%" id="%s" name="%s" type="text" value="%s"  data-return="%s"><input style="width: 19%%;margin-right:5px;" class="button menutitle-media" id="%s_button" name="%s_button" type="button" value="Select Audio" /><input style="width: 19%%;" class="button remove-media" id="%s_buttonremove" name="%s_buttonremove" type="button" value="Remove" /><div id="preview%s"><audio controls><source src="%s" type="audio/mp3"></audio></div>',
                                $field['id'],
                                $field['id'],
                                $value,
                                $field['returnvalue'],

                                $field['id'],
                                $field['id'],
                                $field['id'],
                                $field['id'],
                                $field['id'],
                                $field_url
                            );
                            break;


                        case 'radio':
                            if( ! empty ( $field['options'] ) && is_array( $field['options'] ) ) {
                                $options_markup = '';
                                $iterator = 0;
                                foreach( $field['options'] as $key => $label ) {
                                    $iterator++;
                                    $options_markup.= sprintf('<label for="%1$s_%6$s"><input id="%1$s_%6$s" name="%1$s" type="%2$s" value="%3$s" %4$s /> %5$s</label><br/>',
                                    $field['id'],
                                    $field['type'],
                                    $key,
                                    checked($value, $key, false),
                                    $label,
                                    $iterator
                                    );
                                    }
                                    printf( '<fieldset>%s</fieldset>',
                                    $options_markup
                                    );
                            }
                            break;

			default:
				printf( '<input name="%1$s" id="%1$s" type="%2$s" placeholder="%3$s" value="%4$s" />',
					$field['id'],
					$field['type'],
					$placeholder,
					$value
				);
		}

	}

    public function media_fields() {
		?><script>
			jQuery(document).ready(function($){
				if ( typeof wp.media !== 'undefined' ) {
					var _custom_media = true,
					_orig_send_attachment = wp.media.editor.send.attachment;
					$('.menutitle-media').click(function(e) {
						var send_attachment_bkp = wp.media.editor.send.attachment;
						var button = $(this);
						var id = button.attr('id').replace('_button', '');
						_custom_media = true;
							wp.media.editor.send.attachment = function(props, attachment){
							if ( _custom_media ) {
								if ($('input#' + id).data('return') == 'url') {
									$('input#' + id).val(attachment.url);
								} else {
									$('input#' + id).val(attachment.id);
								}
								$('div#preview'+id).css('background-image', 'url('+attachment.url+')');
							} else {
								return _orig_send_attachment.apply( this, [props, attachment] );
							};
						}
						wp.media.editor.open(button);
						return false;
					});
					$('.add_media').on('click', function(){
						_custom_media = false;
					});
					$('.remove-media').on('click', function(){
						var parent = $(this).parents('td');
						parent.find('input[type="text"]').val('');
						parent.find('div').css('background-image', 'url()');
					});
				}
			});
		</script><?php
	}

}
new Elevator_Settings_Page();


// Register Scripts
function elevator_enqueue_scripts() {

    $path = plugin_dir_url( __FILE__ );

    // Scripts
    wp_register_script( 'elevator', $path . 'assets/js/elevator.js', false, '1.0.5.4', true );
    wp_enqueue_script( 'elevator' );

    // Styles
    wp_enqueue_style('elevator_css', $path . 'assets/css/elevator.css', false, '1.0.5.4', false);

}

// Hook into the 'wp_enqueue_scripts' action
add_action( 'wp_enqueue_scripts', 'elevator_enqueue_scripts' );

// Add an elevator button
function elevator_button() {

        // Begin Elevator Container
        $button = '<div id="elevator" class="elevator-container">';
            // Basic Inline Style
                $button .= '<style type="text/css" scoped="scoped">#elevator{text-align:center;}.elevator-button{padding:20px;width:auto;margin:auto;display:inline-block;}.elevator-button:hover{cursor:pointer;}</style>';
            // Begin Elevator Button Container
            $button .= '<div class="elevator-button">';
                // Button Text
                $button .= __( 'Back to Top', 'elevator' ) . '</div>';
            // End Elevator Button Container
            $button .= '</div>';
        // End Elevator Container
        $button .= '</div>';

    echo $button;

    // Let's add doors... ?
    $doors = '<div id="door-left" style="position: fixed; top: 0; bottom: 0; left: -52vw; width: 50vw; content-sizing: content-box;">';
            $doors .= '<div id="door-left-break" style="position: absolute; top: 0; height: 100vh; left: 16vw; right: 16vw;"></div>';
    $doors .= '</div>';

    $doors .= '<div id="door-right" style="position: fixed; top: 0; bottom:0; right: -52vw; width: 50vw; content-sizing: content-box;">';
            $doors .= '<div id="door-right-break" style="position: absolute; top: 0; height: 100vh; left: 16vw; right: 16vw;"></div>';
    $doors .= '</div>';

    echo $doors;

}
add_action( 'wp_footer', 'elevator_button', 10 );

// And, elevate!
function elevator_script() {

    $path = plugin_dir_url( __FILE__ );

    $script = '<script type="text/javascript">';
        $script .= 'window.onload = function() {';
            $script .= 'var elementButton = document.querySelector(\'.elevator-button\');';
            $script .= 'var elevator = new Elevator({';
                $script .= 'element: elementButton,';
                $script .= 'doors: [document.getElementById(\'door-left\'), document.getElementById(\'door-right\')],';
                $script .= 'mainAudio: \'' . $path . 'assets/music/elevator-music.ogg\','; // Music from http://www.bensound.com/
                $script .= 'endAudio: \'' . $path . 'assets/music/ding.ogg\''; // Music from http://www.bensound.com/
            $script .= '});';
        $script .= '}';
    $script .= '</script>';

    echo $script;

}
add_action( 'wp_footer', 'elevator_script', 20 );
