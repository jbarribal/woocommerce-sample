<?php
/**
* Footer Settings.
*
* @package Storefront Eshop
*/

$storefront_eshop_default = storefront_eshop_get_default_theme_options();

$wp_customize->add_section( 'footer_widget_area',
	array(
	'title'      => esc_html__( 'Footer Setting', 'storefront-eshop' ),
	'priority'   => 200,
	'capability' => 'edit_theme_options',
	'panel'      => 'theme_option_panel',
	)
);

$wp_customize->add_setting( 'footer_column_layout',
	array(
	'default'           => $storefront_eshop_default['footer_column_layout'],
	'capability'        => 'edit_theme_options',
	'sanitize_callback' => 'storefront_eshop_sanitize_select',
	)
);
$wp_customize->add_control( 'footer_column_layout',
	array(
	'label'       => esc_html__( 'Footer Column Layout', 'storefront-eshop' ),
	'section'     => 'footer_widget_area',
	'type'        => 'select',
	'choices'               => array(
		'1' => esc_html__( 'One Column', 'storefront-eshop' ),
		'2' => esc_html__( 'Two Column', 'storefront-eshop' ),
	    ),
	)
);

$wp_customize->add_setting( 'footer_copyright_text',
	array(
	'default'           => $storefront_eshop_default['footer_copyright_text'],
	'capability'        => 'edit_theme_options',
	'sanitize_callback' => 'sanitize_text_field',
	)
);
$wp_customize->add_control( 'footer_copyright_text',
	array(
	'label'    => esc_html__( 'Footer Copyright Text', 'storefront-eshop' ),
	'section'  => 'footer_widget_area',
	'type'     => 'text',
	)
);