<?php
/**
 * Plugin Name: Elevator
 * Plugin URI: https://fatpony.me/plugins/elevator/
 * Description: A scroll-to-top solution to musically soothing your visitors while being smoothly scrolled to the top of their screen. Based on Tim Holman's Elevator.js.
 * Version: 1.0.1
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
	wp_register_script( 'elevator', $path . 'assets/js/elevator.min.js', false, '1.0.0', true );
	wp_enqueue_script( 'elevator' );

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
                $script .= 'mainAudio: \'' . $path . 'assets/music/elevator-music.mp3\','; // Music from http://www.bensound.com/
                $script .= 'endAudio: \'' . $path . 'assets/music/ding.mp3\''; // Music from http://www.bensound.com/
            $script .= '});';
        $script .= '}';
    $script .= '</script>';
    
    echo $script;
    
}
add_action( 'wp_footer', 'elevator_script', 20 );