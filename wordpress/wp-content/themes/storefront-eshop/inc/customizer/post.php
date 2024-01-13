<?php
/**
* Posts Settings.
*
* @package Storefront Eshop
*/

$storefront_eshop_default = storefront_eshop_get_default_theme_options();

// Single Post Section.
$wp_customize->add_section( 'posts_settings',
	array(
	'title'      => esc_html__( 'Metainformation Settings', 'storefront-eshop' ),
	'priority'   => 35,
	'capability' => 'edit_theme_options',
	'panel'      => 'theme_option_panel',
	)
);

$wp_customize->add_setting('storefront_eshop_post_author',
    array(
        'default' => $storefront_eshop_default['storefront_eshop_post_author'],
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'storefront_eshop_sanitize_checkbox',
    )
);
$wp_customize->add_control('storefront_eshop_post_author',
    array(
        'label' => esc_html__('Enable Posts Author', 'storefront-eshop'),
        'section' => 'posts_settings',
        'type' => 'checkbox',
    )
);

$wp_customize->add_setting('storefront_eshop_post_date',
    array(
        'default' => $storefront_eshop_default['storefront_eshop_post_date'],
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'storefront_eshop_sanitize_checkbox',
    )
);
$wp_customize->add_control('storefront_eshop_post_date',
    array(
        'label' => esc_html__('Enable Posts Date', 'storefront-eshop'),
        'section' => 'posts_settings',
        'type' => 'checkbox',
    )
);

$wp_customize->add_setting('storefront_eshop_post_category',
    array(
        'default' => $storefront_eshop_default['storefront_eshop_post_category'],
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'storefront_eshop_sanitize_checkbox',
    )
);
$wp_customize->add_control('storefront_eshop_post_category',
    array(
        'label' => esc_html__('Enable Posts Category', 'storefront-eshop'),
        'section' => 'posts_settings',
        'type' => 'checkbox',
    )
);

$wp_customize->add_setting('storefront_eshop_post_tags',
    array(
        'default' => $storefront_eshop_default['storefront_eshop_post_tags'],
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'storefront_eshop_sanitize_checkbox',
    )
);
$wp_customize->add_control('storefront_eshop_post_tags',
    array(
        'label' => esc_html__('Enable Posts Tags', 'storefront-eshop'),
        'section' => 'posts_settings',
        'type' => 'checkbox',
    )
);