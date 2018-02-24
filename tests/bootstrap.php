<?php
/**
 * PHPUnit bootstrap file
 *
 * @package Acf_Field_Group_Values
 */

if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', true );
}

if ( ! defined( 'TEST_DATA_DIR' ) ) {
	define( 'TEST_DATA_DIR', __DIR__ . '/test-data' );
}

function get_test_data( $type ) {
	$test_data = include TEST_DATA_DIR . '/test_data.php';
	return $test_data[ $type ];
}

function get_post_meta( $post_id = null, $key, $single = false ) {
	$test_data = get_test_data( 'post_meta' );

	return empty( $test_data[ $key ] ) ? '' : $test_data[ $key ];
}

function get_option( $key ) {
	$test_data = get_test_data( 'options' );

	$key = str_replace( 'options_', '', $key );

	return empty( $test_data[ $key ] ) ? '' : $test_data[ $key ];
}

function get_term_meta( $post_id = null, $key, $single = false ) {
	$test_data = get_test_data( 'term_meta' );

	return empty( $test_data[ $key ] ) ? '' : $test_data[ $key ];
}

require_once dirname( __DIR__ ) . '/acf-field-group-values.php';

// Load Composer autoloader.
if ( file_exists( dirname( __DIR__ ) . '/vendor/autoload.php' ) ) {
	require_once dirname( __DIR__ ) . '/vendor/autoload.php';
}
