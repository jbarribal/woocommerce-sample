<?php
/**
 * Storefront Eshop functions and definitions
 * @package Storefront Eshop
 */

if ( ! function_exists( 'storefront_eshop_after_theme_support' ) ) :

	function storefront_eshop_after_theme_support() {
		
		add_theme_support( 'automatic-feed-links' );

		add_theme_support('woocommerce');
        add_theme_support('wc-product-gallery-zoom');
        add_theme_support('wc-product-gallery-lightbox');
        add_theme_support('wc-product-gallery-slider');
        add_theme_support('woocommerce', array(
            'gallery_thumbnail_image_width' => 300,
        ));

		add_theme_support(
			'custom-background',
			array(
				'default-color' => 'ffffff',
			)
		);

		$GLOBALS['content_width'] = apply_filters( 'storefront_eshop_content_width', 1140 );
		
		add_theme_support( 'post-thumbnails' );

		add_theme_support(
			'custom-logo',
			array(
				'height'      => 270,
				'width'       => 90,
				'flex-height' => true,
				'flex-width'  => true,
			)
		);
		
		add_theme_support( 'title-tag' );

		add_theme_support(
			'html5',
			array(
				'search-form',
				'comment-form',
				'comment-list',
				'gallery',
				'caption',
				'script',
				'style',
			)
		);

		add_theme_support( 'post-formats', array(
		    'video',
		    'audio',
		    'gallery',
		    'quote',
		    'image'
		) );
		
		add_theme_support( 'align-wide' );
		add_theme_support( 'responsive-embeds' );
		add_theme_support( 'wp-block-styles' );

	}

endif;

add_action( 'after_setup_theme', 'storefront_eshop_after_theme_support' );

/**
 * Register and Enqueue Styles.
 */
function storefront_eshop_register_styles() {

	wp_enqueue_style( 'dashicons' );

    $theme_version = wp_get_theme()->get( 'Version' );
	$fonts_url = storefront_eshop_fonts_url();
    if( $fonts_url ){
    	require get_theme_file_path( 'lib/custom/css/wptt-webfont-loader.php' );
        wp_enqueue_style(
			'storefront-eshop-google-fonts',
			wptt_get_webfont_url( $fonts_url ),
			array(),
			$theme_version
		);
    }

    wp_enqueue_style( 'swiper', get_template_directory_uri() . '/lib/swiper/css/swiper-bundle.min.css');
	wp_enqueue_style( 'storefront-eshop-style', get_stylesheet_uri(), array(), $theme_version );

	$storefront_eshop_css = '';

	if ( get_header_image() ) :

		$storefront_eshop_css .=  '
			.header-navbar{
				background-image: url('.esc_url(get_header_image()).');
				-webkit-background-size: cover !important;
				-moz-background-size: cover !important;
				-o-background-size: cover !important;
				background-size: cover !important;
			}';

	endif;

	wp_add_inline_style( 'storefront-eshop-style', $storefront_eshop_css );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}	

	wp_enqueue_script( 'imagesloaded' );
    wp_enqueue_script( 'masonry' );
	wp_enqueue_script( 'swiper', get_template_directory_uri() . '/lib/swiper/js/swiper-bundle.min.js', array('jquery'), '', 1);
	wp_enqueue_script( 'storefront-eshop-custom', get_template_directory_uri() . '/lib/custom/js/theme-custom-script.js', array('jquery'), '', 1);

    // Global Query
    if( is_front_page() ){

    	$posts_per_page = absint( get_option('posts_per_page') );
        $c_paged = ( get_query_var( 'page' ) ) ? absint( get_query_var( 'page' ) ) : 1;
        $posts_args = array(
            'posts_per_page'        => $posts_per_page,
            'paged'                 => $c_paged,
        );
        $posts_qry = new WP_Query( $posts_args );
        $max = $posts_qry->max_num_pages;

    }else{
        global $wp_query;
        $max = $wp_query->max_num_pages;
        $c_paged = ( get_query_var( 'paged' ) > 1 ) ? get_query_var( 'paged' ) : 1;
    }

    $storefront_eshop_default = storefront_eshop_get_default_theme_options();
    $storefront_eshop_pagination_layout = get_theme_mod( 'storefront_eshop_pagination_layout',$storefront_eshop_default['storefront_eshop_pagination_layout'] );
}

add_action( 'wp_enqueue_scripts', 'storefront_eshop_register_styles',200 );

function storefront_eshop_admin_enqueue_scripts_callback() {
    if ( ! did_action( 'wp_enqueue_media' ) ) {
    wp_enqueue_media();
    }
    wp_enqueue_script('storefront-eshop-uploaderjs', get_stylesheet_directory_uri() . '/lib/custom/js/uploader.js', array(), "1.0", true);
}
add_action( 'admin_enqueue_scripts', 'storefront_eshop_admin_enqueue_scripts_callback' );

/**
 * Register navigation menus uses wp_nav_menu in five places.
 */
function storefront_eshop_menus() {

	$locations = array(
		'storefront-eshop-primary-menu'  => esc_html__( 'Primary Menu', 'storefront-eshop' ),
	);

	register_nav_menus( $locations );
}

add_action( 'init', 'storefront_eshop_menus' );

add_filter('loop_shop_columns', 'storefront_eshop_loop_columns');
if (!function_exists('storefront_eshop_loop_columns')) {
	function storefront_eshop_loop_columns() {
		$columns = get_theme_mod( 'storefront_eshop_per_columns', 3 );
		return $columns;
	}
}

add_filter( 'loop_shop_per_page', 'storefront_eshop_per_page', 20 );
function storefront_eshop_per_page( $cols ) {
  	$cols = get_theme_mod( 'storefront_eshop_product_per_page', 9 );
	return $cols;
}

require get_template_directory() . '/inc/custom-header.php';
require get_template_directory() . '/classes/class-svg-icons.php';
require get_template_directory() . '/classes/class-walker-menu.php';
require get_template_directory() . '/inc/customizer/customizer.php';
require get_template_directory() . '/inc/custom-functions.php';
require get_template_directory() . '/inc/template-tags.php';
require get_template_directory() . '/classes/body-classes.php';
require get_template_directory() . '/inc/widgets/widgets.php';
require get_template_directory() . '/inc/metabox.php';
require get_template_directory() . '/inc/pagination.php';
require get_template_directory() . '/lib/breadcrumbs/breadcrumbs.php';
require get_template_directory() . '/lib/custom/css/dynamic-style.php';

/**
 * For Admin Page
 */
if (is_admin()) {
	require get_template_directory() . '/inc/get-started/get-started.php';
}

if (! defined( 'STOREFRONT_ESHOP_DOCS_PRO' ) ){
define('STOREFRONT_ESHOP_DOCS_PRO',__('https://www.omegathemes.com/steps/storefront-eshop/','storefront-eshop'));
}
if (! defined( 'STOREFRONT_ESHOP_BUY_NOW' ) ){
define('STOREFRONT_ESHOP_BUY_NOW',__('https://www.omegathemes.com/wordpress/eshop-wordpress-theme/','storefront-eshop'));
}
if (! defined( 'STOREFRONT_ESHOP_SUPPORT_FREE' ) ){
define('STOREFRONT_ESHOP_SUPPORT_FREE',__('https://wordpress.org/support/theme/storefront-eshop','storefront-eshop'));
}
if (! defined( 'STOREFRONT_ESHOP_REVIEW_FREE' ) ){
define('STOREFRONT_ESHOP_REVIEW_FREE',__('https://wordpress.org/support/theme/storefront-eshop/reviews/#new-post','storefront-eshop'));
}
if (! defined( 'STOREFRONT_ESHOP_DEMO_PRO' ) ){
define('STOREFRONT_ESHOP_DEMO_PRO',__('https://www.omegathemes.com/preview/storefront-eshop/','storefront-eshop'));
}
if (! defined( 'STOREFRONT_ESHOP_LITE_DOCS_PRO' ) ){
define('STOREFRONT_ESHOP_LITE_DOCS_PRO',__('https://www.omegathemes.com/steps/free-storefront-eshop/','storefront-eshop'));
}

function storefront_eshop_remove_customize_register() {
    global $wp_customize;

    $wp_customize->remove_setting( 'display_header_text' );
    $wp_customize->remove_control( 'display_header_text' );

}

add_action( 'customize_register', 'storefront_eshop_remove_customize_register', 11 );
