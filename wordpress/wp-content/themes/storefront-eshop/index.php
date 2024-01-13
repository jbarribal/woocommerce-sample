<?php
/**
 * The main template file
 * @package Storefront Eshop
 * @since 1.0.0
 */

get_header();
$storefront_eshop_default = storefront_eshop_get_default_theme_options();
$global_sidebar_layout = esc_html( get_theme_mod( 'global_sidebar_layout',$storefront_eshop_default['global_sidebar_layout'] ) );
$storefront_eshop_sidebar_column_class = 'column-order-2';
if ($global_sidebar_layout == 'right-sidebar') {
    $storefront_eshop_sidebar_column_class = 'column-order-1';
}

global $storefront_eshop_archive_first_class; ?>
    <div class="archive-main-block">
        <div class="wrapper">
            <div class="column-row">

                <div id="primary" class="content-area <?php echo $storefront_eshop_sidebar_column_class; ?>">
                    <main id="site-content" role="main">

                        <?php

                        if( !is_front_page() ) {
                            storefront_eshop_breadcrumb();
                        }

                        if( have_posts() ): ?>

                            <div class="article-wraper article-wraper-archive">
                                <?php
                                while( have_posts() ):
                                    the_post();

                                    get_template_part( 'template-parts/content', get_post_format() );

                                endwhile; ?>
                            </div>

                            <?php
                            if( is_search() ){
                                the_posts_pagination();
                            }else{
                                do_action('storefront_eshop_archive_pagination');
                            }

                        else :

                            get_template_part('template-parts/content', 'none');

                        endif; ?>
                    </main>
                </div>
                <?php get_sidebar();?>
            </div>
        </div>
    </div>
<?php
get_footer();
