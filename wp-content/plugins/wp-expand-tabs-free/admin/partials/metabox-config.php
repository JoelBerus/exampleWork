<?php
/**
 * Metabox config file.
 *
 * @link http://shapedplugin.com
 * @since 2.0.0
 *
 * @package wp-expand-tabs-free
 * @subpackage wp-expand-tabs-free/admin
 */

if ( ! defined( 'ABSPATH' ) ) {
	die; } // Cannot access pages directly.

//
// Metabox of the content source settings section.
// Set a unique slug-like ID.
//
$sptpro_content_source_settings = 'sp_tab_source_options';

/**
 * Preview metabox.
 *
 * @param string $prefix The metabox main Key.
 * @return void
 */
SP_WP_TABS::createMetabox(
	'sp_tab_live_preview',
	array(
		'title'        => __( 'Live Preview', 'wp-tabs' ),
		'post_type'    => 'sp_wp_tabs',
		'show_restore' => false,
		'context'      => 'normal',
	)
);
SP_WP_TABS::createSection(
	'sp_tab_live_preview',
	array(
		'fields' => array(
			array(
				'type' => 'preview',
			),
		),
	)
);

//
// Create a metabox for content source settings.
//
SP_WP_TABS::createMetabox(
	$sptpro_content_source_settings,
	array(
		'title'     => __( 'WP Tabs', 'wp-tabs' ),
		'post_type' => 'sp_wp_tabs',
		'context'   => 'normal',
	)
);

//
// Create a section for content source settings.
//
SP_WP_TABS::createSection(
	$sptpro_content_source_settings,
	array(
		'fields' => array(
			array(
				'type'  => 'heading',
				'image' => plugin_dir_url( __DIR__ ) . 'partials/img/wp-tabs-logo.svg',
				'after' => '<i class="fa fa-life-ring"></i> Support',
				'link'  => 'https://shapedplugin.com/support/?user=lite',
				'class' => 'sp-tab__admin-header',
			),
			array(
				'id'      => 'sptpro_tab_type',
				'type'    => 'button_set',
				'title'   => __( 'Tabs Type', 'wp-tabs' ),
				'class'   => 'sp_wp_tab_type',
				'options' => array(
					'content-tabs' => __( 'Content', 'wp-tabs' ),
					'post-tabs'    => __( 'Post', 'wp-tabs' ),
				),
				'default' => 'content-tabs',
			),
			// Content Tabs.
			array(
				'id'                     => 'sptpro_content_source',
				'type'                   => 'group',
				'title'                  => __( 'Tabs Content', 'wp-tabs' ),
				'button_title'           => __( 'Add New Tab', 'wp-tabs' ),
				'class'                  => 'sp-tab__content_wrapper',
				'accordion_title_prefix' => __( 'Tab :', 'wp-tabs' ),
				'accordion_title_number' => true,
				'accordion_title_auto'   => true,
				'fields'                 => array(
					array(
						'id'         => 'tabs_content_title',
						'type'       => 'text',
						'wrap_class' => 'sp-tab__content_source',
						'title'      => __( 'Title', 'wp-tabs' ),
					),
					array(
						'id'         => 'tabs_content_subtitle',
						'type'       => 'text',
						'class'      => 'tabs-custom-text-pro',
						'wrap_class' => 'sp-tab__content_source',
						'title'      => __( 'Subtitle (Pro)', 'wp-tabs' ),
					),
					array(
						'id'           => 'tabs_content_icon',
						'type'         => 'media',
						'class'        => 'tabs-custom-icon-pro',
						'library'      => 'image',
						'url'          => false,
						'button_title' => __( 'Font Icon', 'wp-tabs' ),
					),
					array(
						'type'    => 'content',
						'content' => __( 'Or', 'wp-tabs' ),
					),
					array(
						'id'           => 'tabs_custom_icon',
						'type'         => 'media',
						'library'      => 'image',
						'url'          => false,
						'class'        => 'tabs-custom-icon-pro',
						'button_title' => __( 'Custom Icon', 'wp-tabs' ),
					),
					array(
						'id'         => 'tabs_content_description',
						'type'       => 'wp_editor',
						'wrap_class' => 'sp-tab__content_source',
						'title'      => __( 'Description', 'wp-tabs' ),
						'height'     => '150px',
					),
				),
			), // End of Content Tabs.

		), // End of fields array.
	)
);

//
// Metabox for the tabs.
// Set a unique slug-like ID.
//
$sptpro_shortcode_settings = 'sp_tab_shortcode_options';

//
// Create a metabox.
//
SP_WP_TABS::createMetabox(
	$sptpro_shortcode_settings,
	array(
		'title'     => __( 'Shortcode Section', 'wp-tabs' ),
		'post_type' => 'sp_wp_tabs',
		'context'   => 'normal',
		'theme'     => 'light',
	)
);

//
// Create a section for tabs settings.
//
SP_WP_TABS::createSection(
	$sptpro_shortcode_settings,
	array(
		'title'  => __( 'Tabs Settings', 'wp-tabs' ),
		'icon'   => 'fa fa-cog',
		'fields' => array(
			array(
				'id'       => 'sptpro_tabs_layout',
				'type'     => 'image_select',
				'class'    => 'sp_wp_tabs_layout',
				'title'    => __( 'Tabs Layout', 'wp-tabs' ),
				'subtitle' => __( 'Choose a tabs layout.', 'wp-tabs' ),
				'desc'     => __( 'To unlock Vertical and more settings, <a href="https://shapedplugin.com/plugin/wp-tabs-pro/?ref=1"  target="_blank"><b>Upgrade To Pro!</b></a>', 'wp-tabs' ),
				'options'  => array(
					'horizontal' => array(
						'image'       => WP_TABS_URL . '/admin/img/horizontal.svg',
						'option_name' => __( 'Horizontal', 'wp-tabs' ),
					),
					'vertical'   => array(
						'image'       => WP_TABS_URL . '/admin/img/vertical.svg',
						'option_name' => __( 'Vertical', 'wp-tabs' ),
					),
				),
				'radio'    => true,
				'default'  => 'horizontal',

			),
			array(
				'id'       => 'sptpro_tabs_position',
				'type'     => 'radio',
				'class'    => 'only_for_pro',
				'title'    => __( 'Tabs Position', 'wp-tabs' ),
				'subtitle' => __( 'Select tabs position.', 'wp-tabs' ),
				'options'  => array(
					'tab-position-top'    => __( 'Top', 'wp-tabs' ),
					'tab-position-bottom' => __( 'Bottom (Pro)', 'wp-tabs' ),
				),
				'default'  => 'tab-position-top',
			),
			array(
				'id'       => 'sptpro_tabs_horizontal_alignment',
				'type'     => 'button_set',
				'class'    => 'tab_alignment_pro',
				'title'    => __( 'Tabs Alignment', 'wp-tabs' ),
				'subtitle' => __( 'Select an alignment for tabs.', 'wp-tabs' ),
				'options'  => array(
					'tab-horizontal-alignment-left'      => __( 'Left', 'wp-tabs' ),
					'tab-horizontal-alignment-right'     => __( 'Right', 'wp-tabs' ),
					'tab-horizontal-alignment-center'    => __( 'Center', 'wp-tabs' ),
					'tab-horizontal-alignment-justified' => __( 'Justified', 'wp-tabs' ),
				),
				'default'  => 'tab-horizontal-alignment-left',
			),
			array(
				'id'       => 'sptpro_tabs_activator_event',
				'type'     => 'radio',
				'class'    => 'only_for_pro_event',
				'title'    => __( 'Activator Event', 'wp-tabs' ),
				'subtitle' => __( 'Select an activator event for tabs.', 'wp-tabs' ),
				'options'  => array(
					'tabs-activator-event-click' => __( 'On Click', 'wp-tabs' ),
					'tabs-activator-event-hover' => __( 'Mouseover', 'wp-tabs' ),
					'tabs-activator-event-auto'  => __( 'AutoPlay (Pro)', 'wp-tabs' ),
				),
				'default'  => 'tabs-activator-event-click',
			),
			array(
				'id'       => 'sptpro_tab_opened',
				'type'     => 'spinner',
				'class'    => 'only_pro_spinner',
				'title'    => __( 'Make Tab Opened', 'wp-tabs' ),
				'subtitle' => __( 'The position of the tab opened. Defualt 1st opened.', 'wp-tabs' ),
				'unit'     => 'th',
				'min'      => 1,
				'default'  => 1,
			),
			array(
				'id'         => 'sptpro_preloader',
				'type'       => 'switcher',
				'title'      => __( 'Preloader', 'wp-tabs' ),
				'subtitle'   => __( 'Tabs will be hidden until page load completed.', 'wp-tabs' ),
				'text_on'    => __( 'Enabled', 'easy-accordion-pro' ),
				'text_off'   => __( 'Disabled', 'easy-accordion-pro' ),
				'text_width' => 94,
				'default'    => true,
			),
		), // Fields array end.
	)
); // End of tabs settings.

//
// Carousel settings section begin.
//
SP_WP_TABS::createSection(
	$sptpro_shortcode_settings,
	array(
		'title'  => __( 'Display Options', 'wp-tabs' ),
		'icon'   => 'fa fa-th-large',
		'fields' => array(
			array(
				'id'         => 'sptpro_section_title',
				'type'       => 'switcher',
				'title'      => __( 'Tabs Set Section Title', 'wp-tabs' ),
				'subtitle'   => __( 'Show/hide tabs set section title.', 'wp-tabs' ),
				'default'    => true,
				'text_on'    => __( 'Show', 'wp-tabs' ),
				'text_off'   => __( 'Hide', 'wp-tabs' ),
				'text_width' => 75,
			),
			array(
				'id'              => 'sptpro_section_title_margin_bottom',
				'type'            => 'spacing',
				'title'           => __( 'Margin Bottom from Section Title', 'wp-tabs' ),
				'subtitle'        => __( 'Set a margin bottom from section title. Defualt value is 30px.', 'wp-tabs' ),
				'all'             => true,
				'all_icon'        => '<i class="fa fa-long-arrow-down"></i>',
				'all_placeholder' => 'margin',
				'default'         => array(
					'all' => '30',
				),
				'units'           => array(
					'px',
				),
				'dependency'      => array(
					'sptpro_section_title',
					'==',
					'true',
				),
			),
			array(
				'id'              => 'sptpro_margin_between_tabs',
				'type'            => 'spacing',
				'title'           => __( 'Margin Between Tabs', 'wp-tabs' ),
				'subtitle'        => __( 'Set a space between tabs.', 'wp-tabs' ),
				'all'             => true,
				'all_icon'        => '<i class="fa fa-arrows-h"></i>',
				'all_placeholder' => 'margin',
				'default'         => array(
					'all' => '10',
				),
				'units'           => array(
					'px',
				),
			),

			array(
				'type'    => 'subheading',
				'content' => __( 'Tabs Icon', 'wp-tabs' ),
			),
			array(
				'type'    => 'notice',
				'class'   => 'only_pro_notice',
				'content' => __( 'To unlock the following Tabs Icon options, <a href="https://shapedplugin.com/plugin/wp-tabs-pro/?ref=1" target="_blank"><b>Upgrade To Pro!</b></a>', 'wp-tabs' ),
			),
			array(
				'id'         => 'sptpro_tabs_icon',
				'type'       => 'switcher',
				'class'      => 'only_pro_tabs_icon_section',
				'title'      => __( 'Tabs Icon', 'wp-tabs' ),
				'subtitle'   => __( 'Show/hide the tabs icon.', 'wp-tabs' ),
				'default'    => true,
				'text_on'    => __( 'Show', 'wp-tabs' ),
				'text_off'   => __( 'Hide', 'wp-tabs' ),
				'text_width' => 75,
			),
			array(
				'id'              => 'sptpro_tab_icon_size',
				'type'            => 'spacing',
				'class'           => 'only_pro_tabs_icon_section',
				'title'           => __( 'Icon Size', 'wp-tabs' ),
				'subtitle'        => __( 'Set tabs icon size.', 'wp-tabs' ),
				'all'             => true,
				'all_text'        => false,
				'all_placeholder' => 'size',
				'default'         => array(
					'all' => '16',
				),
				'units'           => array(
					'px',
				),
				'dependency'      => array(
					'sptpro_tabs_icon',
					'==',
					'true',
				),
			),
			array(
				'id'              => 'sptpro_icon_space_title',
				'type'            => 'spacing',
				'class'           => 'only_pro_tabs_icon_section',
				'title'           => __( 'Space Between Title and Icon', 'wp-tabs' ),
				'subtitle'        => __( 'Set space between title and icon.', 'wp-tabs' ),
				'all'             => true,
				'all_text'        => false,
				'all_placeholder' => 'size',
				'default'         => array(
					'all' => '10',
				),
				'units'           => array(
					'px',
				),
				'dependency'      => array(
					'sptpro_tabs_icon',
					'==',
					'true',
				),
			),
			array(
				'id'         => 'sptpro_tab_icon_color',
				'type'       => 'color_group',
				'class'      => 'only_pro_tabs_icon_section',
				'title'      => __( 'Icon Color', 'wp-tabs' ),
				'subtitle'   => __( 'Set tab icon color.', 'wp-tabs' ),
				'options'    => array(
					'tab-icon-color'        => __( 'Color', 'wp-tabs' ),
					'tab-icon-color-active' => __( 'Active Color', 'wp-tabs' ),
					'tab-icon-color-hover'  => __( 'Hover Color', 'wp-tabs' ),
				),
				'default'    => array(
					'tab-icon-color'        => '#444',
					'tab-icon-color-active' => '#444',
					'tab-icon-color-hover'  => '#444',
				),
				'dependency' => array(
					'sptpro_tabs_icon',
					'==',
					'true',
				),
			),
			array(
				'id'         => 'sptpro_tab_icon_position',
				'type'       => 'button_set',
				'class'      => 'only_pro_tabs_icon_section',
				'title'      => __( 'Icon Position', 'wp-tabs' ),
				'subtitle'   => __( 'Select tab icon position.', 'wp-tabs' ),
				'options'    => array(
					'tab-icon-position-left'  => __( 'Left', 'wp-tabs' ),
					'tab-icon-position-top'   => __( 'Top', 'wp-tabs' ),
					'tab-icon-position-right' => __( 'Right', 'wp-tabs' ),
				),
				'default'    => 'tab-icon-position-left',
				'dependency' => array(
					'sptpro_tabs_icon',
					'==',
					'true',
				),
			),


			array(
				'type'    => 'subheading',
				'content' => __( 'Tabs Title and Description', 'wp-tabs' ),
			),
			array(
				'id'       => 'sptpro_title_heading_tag',
				'type'     => 'select',
				'title'    => __( 'Title HTML Tag', 'wp-tabs' ),
				'subtitle' => __( 'Select a tag for tabs title.', 'wp-tabs' ),
				'options'  => array(
					'H1' => 'H1',
					'H2' => 'H2',
					'H3' => 'H3',
					'H4' => 'H4',
					'H5' => 'H5',
					'H6' => 'H6',
				),
				'default'  => 'H4',
				'radio'    => true,
			),
			array(
				'id'       => 'sptpro_title_bg_color',
				'type'     => 'color_group',
				'title'    => __( 'Title Background Color', 'wp-tabs' ),
				'subtitle' => __( 'Set tabs title background color.', 'wp-tabs' ),
				'options'  => array(
					'title-bg-color'        => __( 'Background', 'wp-tabs' ),
					'title-active-bg-color' => __( 'Active Background', 'wp-tabs' ),
					'title-hover-bg-color'  => __( 'Hover Background', 'wp-tabs' ),
				),
				'default'  => array(
					'title-bg-color'        => '#eee',
					'title-active-bg-color' => '#fff',
					'title-hover-bg-color'  => '#fff',
				),
			),
			array(
				'id'       => 'sptpro_title_padding',
				'type'     => 'spacing',
				'title'    => __( 'Title Padding', 'wp-tabs' ),
				'subtitle' => __( 'Set tabs title padding.', 'wp-tabs' ),
				'units'    => array( 'px' ),
				'default'  => array(
					'left'   => '15',
					'top'    => '15',
					'bottom' => '15',
					'right'  => '15',
				),
			),
			array(
				'id'       => 'sptpro_tabs_border',
				'type'     => 'border',
				'title'    => __( 'Border', 'wp-tabs' ),
				'subtitle' => __( 'Set tabs border.', 'wp-tabs' ),
				'all'      => true,
				'default'  => array(
					'all'   => 1,
					'style' => 'solid',
					'color' => '#cccccc',
				),
			),
			array(
				'id'              => 'sptpro_tab_border_radius',
				'type'            => 'spacing',
				'title'           => __( 'Border Radius', 'wp-tabs' ),
				'subtitle'        => __( 'Set tabs border radius.', 'wp-tabs' ),
				'all'             => true,
				'all_placeholder' => 'border',
				'default'         => array(
					'all'   => 2,
					'units' => 'px',
				),
				'units'           => array(
					'px',
					'%',
				),
				'attributes'      => array(
					'min' => 0,
					'max' => 200,
				),
			),
			array(
				'id'       => 'sptpro_active_top_line',
				'type'     => 'checkbox',
				'class'    => 'only_pro_checkbox',
				'title'    => __( 'Top Line For Active Tab', 'wp-tabs' ),
				'subtitle' => __( 'Check to make a top line for active tab.', 'wp-tabs' ),
				'default'  => false,
			),
			array(
				'id'         => 'sptpro_showhide_subtitle',
				'type'       => 'switcher',
				'class'      => 'only_pro_switcher',
				'title'      => __( 'Tabs Subtitle', 'wp-tabs' ),
				'subtitle'   => __( 'Show/hide tabs subtitle.', 'wp-tabs' ),
				'default'    => false,
				'text_on'    => __( 'Show', 'wp-tabs' ),
				'text_off'   => __( 'Hide', 'wp-tabs' ),
				'text_width' => 75,
			),
			array(
				'id'       => 'sptpro_desc_bg_color',
				'type'     => 'color',
				'title'    => __( 'Description Background Color', 'wp-tabs' ),
				'subtitle' => __( 'Set description background color.', 'wp-tabs' ),
				'default'  => '#ffffff',
			),
			array(
				'id'       => 'sptpro_desc_padding',
				'type'     => 'spacing',
				'title'    => __( 'Description Padding', 'wp-tabs' ),
				'subtitle' => __( 'Set description padding.', 'wp-tabs' ),
				'units'    => array( 'px' ),
				'default'  => array(
					'left'   => '20',
					'top'    => '20',
					'bottom' => '20',
					'right'  => '20',
				),
			),
			array(
				'id'       => 'sptpro_desc_border',
				'type'     => 'border',
				'title'    => __( 'Description Border', 'wp-tabs' ),
				'subtitle' => __( 'Set description border.', 'wp-tabs' ),
				'all'      => true,
				'style'    => true,
				'default'  => array(
					'all'   => 1,
					'style' => 'solid',
					'color' => '#cccccc',
				),
			),
			array(
				'id'       => 'sptpro_tab_flat_style',
				'type'     => 'checkbox',
				'class'    => 'only_pro_checkbox',
				'title'    => __( 'Make Tabs Flat Style', 'wp-tabs' ),
				'subtitle' => __( 'Check to make tabs flat style.', 'wp-tabs' ),
				'default'  => false,
			),
			array(
				'id'       => 'sptpro_fixed_height',
				'type'     => 'button_set',
				'class'    => 'only_pro_fixed_height',
				'title'    => __( 'Content Height', 'wp-tabs' ),
				'subtitle' => __( 'Select content height.', 'wp-tabs' ),
				'options'  => array(
					'auto'   => __( 'Auto', 'wp-tabs' ),
					'custom' => __( 'Custom', 'wp-tabs' ),
				),
				'default'  => 'auto',
			),
			array(
				'type'    => 'notice',
				'class'   => 'only_pro_notice',
				'content' => __( 'To unlock the more settings for <b>Tabs Title and Description</b>, <a href="//shapedplugin.com/plugin/wp-tabs-pro/?ref=1" target="_blank"><b>Upgrade To Pro!</b></a>', 'wp-tabs' ),
			),
			array(
				'type'    => 'subheading',
				'content' => __( 'Small Screen', 'wp-tabs' ),
			),
			array(
				'id'              => 'sptpro_set_small_screen',
				'type'            => 'spacing',
				'title'           => __( 'When screen width is less than', 'wp-tabs' ),
				'all'             => true,
				'all_icon'        => '<i class="fa fa-arrows-h"></i>',
				'all_placeholder' => 'margin',
				'default'         => array(
					'all' => '480',
				),
				'units'           => array(
					'px',
				),
			),
			array(
				'id'       => 'sptpro_tabs_on_small_screen',
				'type'     => 'radio',
				'title'    => __( 'Tabs Mode on Small Screen', 'wp-tabs' ),
				'subtitle' => __( 'Choose a tabs mode on small screen.', 'wp-tabs' ),
				'options'  => array(
					'full_widht'     => __( 'Full Width', 'wp-tabs' ),
					'accordion_mode' => __( 'Accordion', 'wp-tabs' ),
				),
				'default'  => 'full_widht',
			),
			array(
				'type'    => 'subheading',
				'content' => __( 'Animation', 'wp-tabs' ),
			),
			array(
				'type'    => 'notice',
				'class'   => 'only_pro_notice',
				'content' => __( 'To unlock the following Tabs Animation settings, <a href="//shapedplugin.com/plugin/wp-tabs-pro/?ref=1" target="_blank"><b>Upgrade To Pro!</b></a>', 'wp-tabs' ),
			),
			array(
				'id'         => 'sptpro_tabs_animation',
				'class'      => 'only_pro_tabs_icon_section',
				'type'       => 'switcher',
				'title'      => __( 'Animation', 'wp-tabs' ),
				'subtitle'   => __( 'Enable/Disable animation for tabs content.', 'wp-tabs' ),
				'text_on'    => __( 'Enabled', 'easy-accordion-pro' ),
				'text_off'   => __( 'Disabled', 'easy-accordion-pro' ),
				'text_width' => 94,
				'default'    => true,
			),
			array(
				'id'       => 'sptpro_tabs_animation_type',
				'type'     => 'select',
				'class'    => 'only_pro_tabs_icon_section',
				'title'    => __( 'Animation Style', 'wp-tabs' ),
				'subtitle' => __( 'Choose an animation style for tabs content.', 'wp-tabs' ),
				'options'  => array(
					'fadeIn' => __( 'fadeIn', 'wp-tabs' ),
				),
				'default'  => 'fadeIn',
			),
			array(
				'id'       => 'sptpro_animation_time',
				'type'     => 'spinner',
				'class'    => 'only_pro_tabs_icon_section',
				'title'    => __( 'Transition Delay', 'wp-tabs' ),
				'subtitle' => __( 'Set animation transition delay in milisecond.', 'wp-tabs' ),
				'unit'     => 'ms',
				'min'      => 10,
				'max'      => 100000,
				'default'  => 500,
			),
		),
	)
); // Carousel settings section end.

//
// Typography section begin.
//
SP_WP_TABS::createSection(
	$sptpro_shortcode_settings,
	array(
		'title'           => __( 'Typography', 'wp-tabs' ),
		'icon'            => 'fa fa-font',
		'enqueue_webfont' => true,
		'fields'          => array(
			array(
				'type'    => 'notice',
				'class'   => 'only_pro_notice_typo',
				'content' => __( 'To unlock These Typography (940+ Google Fonts) options, <a href="https://shapedplugin.com/plugin/wp-tabs-pro/?ref=1" target="_blank"><b>Upgrade To Pro</b></a>! P.S. Note: The color fields work in the lite version.', 'wp-tabs' ),
			),
			array(
				'id'       => 'sptpro_section_title_font_load',
				'type'     => 'switcher',
				'title'    => __( 'Load Tabs Section Title Font', 'wp-tabs' ),
				'subtitle' => __( 'On/Off google font for the section title.', 'wp-tabs' ),
				'default'  => false,
			),
			array(
				'id'           => 'sptpro_section_title_typo',
				'type'         => 'typography',
				'title'        => __( 'Tabs Section Title', 'wp-tabs' ),
				'subtitle'     => __( 'Set tabs section title font properties.', 'wp-tabs' ),
				'default'      => array(
					'color'          => '#444444',
					'font-family'    => 'Open Sans',
					'font-style'     => '600',
					'font-size'      => '28',
					'line-height'    => '28',
					'letter-spacing' => '0',
					'text-align'     => 'left',
					'text-transform' => 'none',
					'type'           => 'google',
					'unit'           => 'px',
				),
				'preview'      => 'always',
				'preview_text' => 'Tabs Section Title',
			),
			array(
				'id'       => 'sptpro_tabs_title_font_load',
				'type'     => 'switcher',
				'title'    => __( 'Load Tabs Title Font', 'wp-tabs' ),
				'subtitle' => __( 'On/Off google font for the tabs title.', 'wp-tabs' ),
				'default'  => false,
			),
			array(
				'id'           => 'sptpro_tabs_title_typo',
				'type'         => 'typography',
				'title'        => __( 'Tabs Title', 'wp-tabs' ),
				'subtitle'     => __( 'Set tabs title font properties.', 'wp-tabs' ),
				'default'      => array(
					'font-family'    => 'Open Sans',
					'font-weight'    => '600',
					'font-style'     => 'normal',
					'font-size'      => '16',
					'line-height'    => '22',
					'letter-spacing' => '0',
					'text-align'     => 'center',
					'text-transform' => 'none',
					'color'          => '#444',
					'hover_color'    => '#444',
					'active_color'   => '#444',
					'type'           => 'google',
				),
				'preview_text' => 'Tabs Title',
				'preview'      => 'always',
				'color'        => true,
				'hover_color'  => true,
				'active_color' => true,
			),
			array(
				'id'       => 'sptpro_subtitle_font_load',
				'type'     => 'switcher',
				'title'    => __( 'Load Subtitle Font', 'wp-tabs' ),
				'subtitle' => __( 'On/Off google font for the tabs subtitle.', 'wp-tabs' ),
				'default'  => false,
			),
			array(
				'id'           => 'sptpro_subtitle_typo',
				'type'         => 'typography',
				'title'        => __( 'Tabs Subtitle', 'wp-tabs' ),
				'subtitle'     => __( 'Set tabs subtitle font properties.', 'wp-tabs' ),
				'class'        => 'disable-color-picker',
				'default'      => array(
					'font-family'    => 'Open Sans',
					'font-style'     => '400',
					'font-size'      => '14',
					'line-height'    => '18',
					'letter-spacing' => '0',
					'color'          => '#616161',
					'active_color'   => '#616161',
					'hover_color'    => '#616161',
					'text-align'     => 'center',
					'text-transform' => 'none',
					'type'           => 'google',
				),
				'preview_text' => 'Tabs Sub Title',
				'preview'      => 'always',
				'color'        => true,
				'hover_color'  => true,
				'active_color' => true,
			),
			array(
				'id'       => 'sptpro_desc_font_load',
				'type'     => 'switcher',
				'title'    => __( 'Load Description Font', 'wp-tabs' ),
				'subtitle' => __( 'On/Off google font for the tabs description.', 'wp-tabs' ),
				'default'  => false,
			),
			array(
				'id'           => 'sptpro_desc_typo',
				'type'         => 'typography',
				'title'        => __( 'Description', 'wp-tabs' ),
				'subtitle'     => __( 'Set description font properties.', 'wp-tabs' ),
				'default'      => array(
					'color'          => '#444',
					'font-family'    => 'Open Sans',
					'font-style'     => '400',
					'font-size'      => '16',
					'line-height'    => '24',
					'letter-spacing' => '0',
					'text-align'     => 'left',
					'text-transform' => 'none',
					'type'           => 'google',
				),
				'preview'      => 'always',
				'preview_text' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.',
			),
		), // End of fields array.
	)
); // Style settings section end.

//
// Metabox of the footer section / shortocde section.
// Set a unique slug-like ID.
//
$sptpro_display_shortcode = 'sp_tab_display_shortcode';

//
// Create a metabox.
//
SP_WP_TABS::createMetabox(
	$sptpro_display_shortcode,
	array(
		'title'     => 'WP Tabs',
		'post_type' => 'sp_wp_tabs',
		'context'   => 'normal',
	)
);

//
// Create a section.
//
SP_WP_TABS::createSection(
	$sptpro_display_shortcode,
	array(
		'fields' => array(
			array(
				'type'  => 'shortcode',
				'class' => 'sp-tab__admin-footer',
			),
		),
	)
);
