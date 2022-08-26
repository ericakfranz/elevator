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
    $doors = '<div id="door-left" style="position: fixed; top: 0; bottom: 0; left: -52vw; width: 50vw; content-sizing: content-box; border: 3px solid #666; background-color: #aaa;">';
            $doors .= '<div style="position: absolute; top: 0; height: 100vh; left: 16vw; right: 16vw; border-left: 3px solid #666; border-right: 3px solid #666;"></div>';
    $doors .= '</div>';

    $doors .= '<div id="door-right" style="position: fixed; top: 0; bottom:0; right: -52vw; width: 50vw; content-sizing: content-box; border: 3px solid #666; background-color: #aaa;">';
            $doors .= '<div style="position: absolute; top: 0; height: 100vh; left: 16vw; right: 16vw; border-left: 3px solid #666; border-right: 3px solid #666;"></div>';
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
