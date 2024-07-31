<?php

/**
 * Pagination - Show numbered pagination for catalog pages
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/loop/pagination.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 3.3.1
 */

if (!defined('ABSPATH')) {
	exit;
}

$total   = isset($total) ? $total : wc_get_loop_prop('total_pages');
$current = isset($current) ? $current : wc_get_loop_prop('current_page');
$base    = isset($base) ? $base : esc_url_raw(str_replace(999999999, '%#%', remove_query_arg('add-to-cart', get_pagenum_link(999999999, false))));
$format  = isset($format) ? $format : '';

if ($total <= 1) {
	return;
}
// Użyj globalnej zmiennej $wp_query
global $wp_query;

// Jeśli $wp_query jest pusty, użyj głównego zapytania WooCommerce
if (!isset($wp_query) || empty($wp_query)) {
	$wp_query = WC()->query->get_main_query();
}

if ($wp_query->max_num_pages <= 1) {
	return;
}

$pagination_args = array(
	'total'   => $wp_query->max_num_pages,
	'current' => max(1, get_query_var('paged')),
	'end_size'     => 3,
	'mid_size'     => 3,
	'prev_text'    => __('Poprzednie', 'your-text-domain'),
	'next_text'    => __('Następne', 'your-text-domain'),
	'type'         => 'list',
	'before_page_number' => '<span class="meta-nav screen-reader-text">' . __('Page', 'your-text-domain') . ' </span>',
);

echo '<nav class="woocommerce-pagination">';
echo paginate_links(apply_filters('woocommerce_pagination_args', $pagination_args));
echo '</nav>';
