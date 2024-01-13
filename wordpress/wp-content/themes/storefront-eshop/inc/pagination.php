<?php
/**
 *
 * Pagination Functions
 *
 * @package Storefront Eshop
 */

if( !function_exists('storefront_eshop_archive_pagination_x') ):

	// Archive Page Navigation
	function storefront_eshop_archive_pagination_x(){

		the_posts_pagination();
	}

endif;
add_action('storefront_eshop_archive_pagination','storefront_eshop_archive_pagination_x',20);