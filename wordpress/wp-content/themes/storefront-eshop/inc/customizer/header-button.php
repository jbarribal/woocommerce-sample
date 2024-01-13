<?php
/**
* Header Options.
*
* @package Storefront Eshop
*/

$storefront_eshop_default = storefront_eshop_get_default_theme_options();

// Header Section.
$wp_customize->add_section( 'button_header_setting',
	array(
	'title'      => esc_html__( 'Header Settings', 'storefront-eshop' ),
	'priority'   => 10,
	'capability' => 'edit_theme_options',
	'panel'      => 'theme_option_panel',
	)
);

$wp_customize->add_setting( 'storefront_eshop_header_layout_topbar_text',
    array(
    'default'           => $storefront_eshop_default['storefront_eshop_header_layout_topbar_text'],
    'capability'        => 'edit_theme_options',
    'sanitize_callback' => 'sanitize_text_field',
    )
);
$wp_customize->add_control( 'storefront_eshop_header_layout_topbar_text',
    array(
    'label'    => esc_html__( 'Header Text', 'storefront-eshop' ),
    'section'  => 'button_header_setting',
    'type'     => 'text',
    )
);

$wp_customize->add_setting( 'storefront_eshop_header_layout_wishlist_text',
    array(
    'default'           => $storefront_eshop_default['storefront_eshop_header_layout_wishlist_text'],
    'capability'        => 'edit_theme_options',
    'sanitize_callback' => 'sanitize_text_field',
    )
);
$wp_customize->add_control( 'storefront_eshop_header_layout_wishlist_text',
    array(
    'label'    => esc_html__( 'Wishlist Text', 'storefront-eshop' ),
    'section'  => 'button_header_setting',
    'type'     => 'text',
    )
);

$wp_customize->add_setting( 'storefront_eshop_header_layout_wishlist_link',
    array(
    'default'           => $storefront_eshop_default['storefront_eshop_header_layout_wishlist_link'],
    'capability'        => 'edit_theme_options',
    'sanitize_callback' => 'esc_url_raw',
    )
);
$wp_customize->add_control( 'storefront_eshop_header_layout_wishlist_link',
    array(
    'label'    => esc_html__( 'Wishlist Link', 'storefront-eshop' ),
    'section'  => 'button_header_setting',
    'type'     => 'url',
    )
);

$wp_customize->add_setting( 'storefront_eshop_header_layout_compare_text',
    array(
    'default'           => $storefront_eshop_default['storefront_eshop_header_layout_compare_text'],
    'capability'        => 'edit_theme_options',
    'sanitize_callback' => 'sanitize_text_field',
    )
);
$wp_customize->add_control( 'storefront_eshop_header_layout_compare_text',
    array(
    'label'    => esc_html__( 'Compare Text', 'storefront-eshop' ),
    'section'  => 'button_header_setting',
    'type'     => 'text',
    )
);

$wp_customize->add_setting( 'storefront_eshop_header_layout_compare_link',
    array(
    'default'           => $storefront_eshop_default['storefront_eshop_header_layout_compare_link'],
    'capability'        => 'edit_theme_options',
    'sanitize_callback' => 'esc_url_raw',
    )
);
$wp_customize->add_control( 'storefront_eshop_header_layout_compare_link',
    array(
    'label'    => esc_html__( 'Compare Link', 'storefront-eshop' ),
    'section'  => 'button_header_setting',
    'type'     => 'url',
    )
);

$wp_customize->add_setting( 'storefront_eshop_header_layout_phone_number',
    array(
    'default'           => $storefront_eshop_default['storefront_eshop_header_layout_phone_number'],
    'capability'        => 'edit_theme_options',
    'sanitize_callback' => 'sanitize_text_field',
    )
);
$wp_customize->add_control( 'storefront_eshop_header_layout_phone_number',
    array(
    'label'    => esc_html__( 'Header Phone Number', 'storefront-eshop' ),
    'section'  => 'button_header_setting',
    'type'     => 'text',
    )
);