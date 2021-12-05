<?php
/**
 * Option config file.
 *
 * @link http://shapedplugin.com
 * @since 2.0.0
 *
 * @package wp-expand-tabs-free
 * @subpackage wp-expand-tabs-free/admin
 */

if ( ! defined( 'ABSPATH' ) ) {
	die; } // Cannot access directly.

//
// Set a unique slug-like ID.
//
$prefix = 'sp-tab__settings';

//
// Create options.
//
SP_WP_TABS::createOptions(
	$prefix,
	array(
		'menu_title'         => __( 'Settings', 'wp-tabs' ),
		'menu_slug'          => 'tabs_settings',
		'menu_parent'        => 'edit.php?post_type=sp_wp_tabs',
		'menu_type'          => 'submenu',
		'show_bar_menu'      => false,
		'ajax_save'          => true,
		'save_defaults'      => true,
		'show_reset_all'     => true,
		'show_all_options'   => false,
		'show_reset_section' => true,
		'show_search'        => false,
		'show_footer'        => false,
		'framework_title'    => __( 'Settings', 'wp-tabs' ),
		'framework_class'    => 'sp-tab__options',
		'theme'              => 'light',
	)
);

//
// Create a section.
//
SP_WP_TABS::createSection(
	$prefix,
	array(
		'title'  => __( 'Advanced Settings', 'wp-tabs' ),
		'icon'   => 'fa fa-cogs',
		'fields' => array(
			array(
				'id'         => 'sptpro_data_remove',
				'type'       => 'checkbox',
				'title'      => __( 'Clean-up Data on Deletion', 'wp-tabs' ),
				'title_help' => __( 'Check this box if you would like WP Tabs to completely remove all of its data when the plugin is deleted.', 'wp-tabs' ),
				'default'    => false,
			),
		),
	)
);

//
// Custom CSS Fields.
//
SP_WP_TABS::createSection(
	$prefix,
	array(
		'id'     => 'custom_css_section',
		'title'  => __( 'Additional CSS', 'wp-tabs' ),
		'icon'   => 'fa fa-css3',
		'fields' => array(
			array(
				'id'       => 'sptpro_custom_css',
				'type'     => 'code_editor',
				'title'    => __( 'Custom CSS', 'wp-tabs' ),
				'settings' => array(
					'mode'  => 'css',
					'theme' => 'monokai',
				),
			),
		),
	)
);
