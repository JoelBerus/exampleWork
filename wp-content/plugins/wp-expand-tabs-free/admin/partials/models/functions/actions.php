<?php if ( ! defined( 'ABSPATH' ) ) {
	die; } // Cannot access directly.

if ( ! function_exists( 'wptabspro_chosen_ajax' ) ) {
	/**
	 *
	 * Chosen Ajax
	 *
	 * @since 1.0.0
	 * @version 1.0.0
	 */
	function wptabspro_chosen_ajax() {

		$nonce = ( ! empty( $_POST['nonce'] ) ) ? sanitize_text_field( wp_unslash( $_POST['nonce'] ) ) : '';
		$type  = ( ! empty( $_POST['type'] ) ) ? sanitize_text_field( wp_unslash( $_POST['type'] ) ) : '';
		$term  = ( ! empty( $_POST['term'] ) ) ? sanitize_text_field( wp_unslash( $_POST['term'] ) ) : '';
		$query = ( ! empty( $_POST['query_args'] ) ) ? wp_kses_post_deep( $_POST['query_args'] ) : array(); // phpcs:ignore

		if ( ! wp_verify_nonce( $nonce, 'wptabspro_chosen_ajax_nonce' ) ) {
			wp_send_json_error( array( 'error' => esc_html__( 'Error: Nonce verification has failed. Please try again.', 'wp-tabs' ) ) );
		}

		if ( empty( $type ) || empty( $term ) ) {
			wp_send_json_error( array( 'error' => esc_html__( 'Error: Missing request arguments.', 'wp-tabs' ) ) );
		}

		$capability = apply_filters( 'wptabspro_chosen_ajax_capability', 'manage_options' );

		if ( ! current_user_can( $capability ) ) {
			wp_send_json_error( array( 'error' => esc_html__( 'You do not have required permissions to access.', 'wp-tabs' ) ) );
		}

		// Success.
		$options = SP_WP_TABS_Fields::field_data( $type, $term, $query );

		wp_send_json_success( $options );

	}
	add_action( 'wp_ajax_wptabspro-chosen', 'wptabspro_chosen_ajax' );
}

add_filter( 'wptabspro_fa4', '__return_true' );
