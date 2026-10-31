<?php
/**
 * Remove Elevator's saved setting on uninstall.
 */

defined( 'WP_UNINSTALL_PLUGIN' ) or die( 'Please enjoy the music during your wait.' );

delete_option( 'elevator_track' );
delete_option( 'elevator_output' );
delete_option( 'elevator_selector' );
