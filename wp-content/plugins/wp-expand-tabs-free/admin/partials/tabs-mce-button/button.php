<?php
/**
 * SP Tiny MCE Shortcode.
 *
 * @link https://shapedplugin.com
 * @since 2.0.0
 *
 * @package WordPress_Carousel_Pro
 */

// Make sure we don't expose any info if called directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! class_exists( 'SPTPRO_MCE_Shortcode_list' ) ) {
	define( 'SPTPRO_TMCE_URL', plugin_dir_url( __FILE__ ) );
	/**
	 * The Tiny MCE button class.
	 */
	class SPTPRO_MCE_Shortcode_list {

		/**
		 * Instance of the class.
		 *
		 * @var $_instance
		 */
		private static $_instance = null;

		/**
		 * GetInstance
		 *
		 * @since 1.0.0
		 */
		public static function getInstance() {
			if ( ! self::$_instance ) {
				self::$_instance = new SPTPRO_MCE_Shortcode_list();
			}

			return self::$_instance;
		}
		/**
		 * Constructor
		 *
		 * @since 0.1
		 */
		public function __construct() {
			add_action( 'wp_ajax_sptpro_cpt_list', array( $this, 'sptpro_list_ajax' ) );
			add_action( 'admin_footer', array( $this, 'sptpro_cpt_list' ) );
			add_action( 'admin_head', array( $this, 'sptpro_mce_button' ) );
		}

		/**
		 * Hooks your functions into the correct filters.
		 *
		 * @since 1.0.0
		 * @return void
		 */
		public function sptpro_mce_button() {
			// check user permissions.
			if ( ! current_user_can( 'edit_posts' ) && ! current_user_can( 'edit_pages' ) ) {
				return;
			}
			// check if WYSIWYG is enabled.
			if ( 'true' === get_user_option( 'rich_editing' ) ) {
				add_filter( 'mce_external_plugins', array( $this, 'sptpro_add_mce_plugin' ) );
				add_filter( 'mce_buttons', array( $this, 'sptpro_register_mce_button' ) );
			}
		}

		/**
		 * Script for our mce button.
		 *
		 * @since 2.0.0
		 * @param string $plugin_array The button.
		 * @return string
		 */
		public function sptpro_add_mce_plugin( $plugin_array ) {
			$plugin_array['sp_mce_button'] = SPTPRO_TMCE_URL . 'sp-mce.js';
			return $plugin_array;
		}

		/**
		 * Register our button in the editor.
		 *
		 * @since 2.0.0
		 * @param array $buttons The Tiny mce button.
		 * @return array
		 */
		public function sptpro_register_mce_button( $buttons ) {
			array_push( $buttons, 'sp_mce_button' );
			return $buttons;
		}

		/**
		 * Function to fetch cpt posts list.
		 *
		 * @since 2.0.0
		 * @param string $post_type List of the post type.
		 * @return void
		 */
		public function posts( $post_type ) {

			global $wpdb;
			$cpt_type        = $post_type;
			$cpt_post_status = 'publish';
			$cpt             = $wpdb->get_results(
				$wpdb->prepare(
					"SELECT ID, post_title
	                FROM $wpdb->posts
	                WHERE $wpdb->posts.post_type = %s
	                AND $wpdb->posts.post_status = %s
	                ORDER BY ID DESC",
					$cpt_type,
					$cpt_post_status
				)
			);

			$list = array();

			foreach ( $cpt as $post ) {
				$selected  = '';
				$post_id   = $post->ID;
				$post_name = $post->post_title;
				$list[]    = array(
					'text'  => $post_name,
					'value' => $post_id,
				);
			}

			wp_send_json( $list );
		}

		/**
		 * Function to fetch buttons
		 *
		 * @since  1.6
		 * @return string
		 */
		public function sptpro_list_ajax() {
			// check for nonce.
			check_ajax_referer( 'sp-mce-nonce', 'security' );
			$posts = $this->posts( 'sp_wp_tabs' ); // change 'sp_wp_tabs' to 'post' if you need posts list.
			return $posts;
		}

		/**
		 * Function to output button list ajax script
		 *
		 * @since  1.6
		 */
		public function sptpro_cpt_list() {
			// create nonce.
			global $current_screen;
			$current_screen->post_type;
			if ( 'post' || 'page' || 'sp_wp_tabs' === $current_screen ) {
				$nonce = wp_create_nonce( 'sp-mce-nonce' );
				?>
				<script type="text/javascript">
				; (function (window, $) {
				"use strict";
					jQuery( document ).ready( function( $ ) {
						var data = {
							'action'	: 'sptpro_cpt_list',	// wp ajax action
							'security'	: '<?php echo esc_attr( $nonce ); ?>'	// nonce value created earlier.
						};
						// fire ajax
						jQuery.post( ajaxurl, data, function( response ) {
							// if nonce fails then not authorized else settings saved
							if( response === '-1' ){
								// do nothing
								console.log('error');
							} else {
								if (typeof(tinyMCE) != 'undefined') {
									if (tinyMCE.activeEditor != null) {
									tinyMCE.activeEditor.settings.spShortcodeList = response;
								}
							}
							}
						});
					});
					})(window, jQuery);
				</script>
				<?php
			}
		}
	} // Mce Class
	SPTPRO_MCE_Shortcode_list::getInstance();
}
