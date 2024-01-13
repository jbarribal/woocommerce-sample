<?php
/**
 * The sidebar containing the main widget area
 * @package Storefront Eshop
 */

global $post;

$storefront_eshop_default = storefront_eshop_get_default_theme_options();

if(!empty($post)) {
$storefront_eshop_post_sidebar = esc_html( get_post_meta( $post->ID, 'storefront_eshop_post_sidebar_option', true ) );
}

$storefront_eshop_sidebar_column_class = 'column-order-2';

if (empty($storefront_eshop_post_sidebar)) {
    $global_sidebar_layout = esc_html( get_theme_mod( 'global_sidebar_layout',$storefront_eshop_default['global_sidebar_layout'] ) );
} else {
    $global_sidebar_layout = $storefront_eshop_post_sidebar;
}
if ( ! is_active_sidebar( 'sidebar-1' ) || $global_sidebar_layout == 'no-sidebar' ) {
    return;
}

if ($global_sidebar_layout == 'left-sidebar') {
    $storefront_eshop_sidebar_column_class = 'column-order-1';
}
 ?>

<aside id="secondary" class="widget-area <?php echo $storefront_eshop_sidebar_column_class; ?>">
    <div class="widget-area-wrapper">
        <?php dynamic_sidebar( 'sidebar-1' ); ?>
    </div>
</aside>
