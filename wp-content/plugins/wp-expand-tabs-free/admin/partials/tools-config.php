<?php
/**
 * Tools config file.
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
$prefix = 'sp_tab_tools';

//
// Create options.
//
SP_WP_TABS::createOptions(
	$prefix,
	array(
		'menu_title'       => __( 'Tools', 'wp-tabs' ),
		'menu_slug'        => 'tab_tools',
		'menu_parent'      => 'edit.php?post_type=sp_wp_tabs',
		'menu_type'        => 'submenu',
		'ajax_save'        => false,
		'show_bar_menu'    => false,
		'save_defaults'    => false,
		'show_reset_all'   => false,
		'show_all_options' => false,
		'show_search'      => false,
		'show_footer'      => false,
		'show_buttons'     => false, // Custom show button option added for hide save button in tools page.
		'framework_title'  => __( 'Tools', 'wp-tabs' ),
		'framework_class'  => 'sp-tab__options tab__tools',
		'theme'            => 'light',
	)
);
SP_WP_TABS::createSection(
	$prefix,
	array(
		'title'  => __( 'Export', 'wp-tabs' ),
		'icon'   => 'fa fa-arrow-circle-o-down ',
		'fields' => array(
			array(
				'id'       => 'tabs_what_export',
				'type'     => 'radio',
				'class'    => 'tabs_what_export',
				'title'    => __( 'Choose What To Export', 'wp-tabs' ),
				'multiple' => false,
				'options'  => array(
					'all_shortcodes'      => __( 'All Tab Groups', 'wp-tabs' ),
					'selected_shortcodes' => __( 'Selected Tab Group(s)', 'wp-tabs' ),
				),
				'default'  => 'all_shortcodes',
			),
			array(
				'id'          => 'tabs_post',
				'class'       => 'tabs_post_ids',
				'type'        => 'select',
				'title'       => ' ',
				'options'     => 'sp_wp_tabs',
				'chosen'      => true,
				'sortable'    => false,
				'multiple'    => true,
				'placeholder' => __( 'Choose group(s)', 'wp-tabs' ),
				'query_args'  => array(
					'posts_per_page' => -1,
				),
				'dependency'  => array( 'tabs_what_export', '==', 'selected_shortcodes', true ),
			),
			array(
				'id'      => 'export',
				'class'   => 'wp_tabs_export',
				'type'    => 'button_set',
				'title'   => ' ',
				'options' => array(
					'' => 'Export',
				),
			),
		),
	)
);
SP_WP_TABS::createSection(
	$prefix,
	array(
		'title'  => __( 'Import', 'wp-tabs' ),
		'icon'   => 'fa fa-arrow-circle-o-up ',
		'fields' => array(
			array(
				'class' => 'wp_tabs_import',
				'type'  => 'custom_import',
				'title' => __( 'Import JSON File To Upload', 'wp-tabs' ),
			),
		),
	)
);
