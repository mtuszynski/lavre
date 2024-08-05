<?php
require_once 'woo/custom-category-header.php';
require_once 'woo/recently-viewed-products.php';
require_once 'woo/quantity-buttons.php';
require_once 'woo/category-section.php';
require_once 'woo/best-selling-products.php';

add_theme_support('post-thumbnails');
add_image_size('post-futured', 600, 370, array('center', 'center'), true);
add_image_size('post-futured-grid', 100, 100, array('center', 'center'), true);
add_image_size('wc-product', 300, 300, array('center', 'center'), true);


if (!function_exists('mit_thumbnail_upscale')) {
    function mit_thumbnail_upscale($default, $orig_w, $orig_h, $new_w, $new_h, $crop)
    {

        if (!$crop) return null; // let the wordpress default function handle this

        $aspect_ratio = $orig_w / $orig_h;
        $size_ratio = max($new_w / $orig_w, $new_h / $orig_h);

        $crop_w = round($new_w / $size_ratio);
        $crop_h = round($new_h / $size_ratio);

        $s_x = floor(($orig_w - $crop_w) / 2);
        $s_y = floor(($orig_h - $crop_h) / 2);

        return array(0, 0, (int) $s_x, (int) $s_y, (int) $new_w, (int) $new_h, (int) $crop_w, (int) $crop_h);
    }
}
add_filter('image_resize_dimensions', 'mit_thumbnail_upscale', 10, 6);

add_action('after_setup_theme', 'woocommerce_support');
function woocommerce_support()
{
    add_theme_support('woocommerce');
}

remove_action('woocommerce_sidebar', 'woocommerce_get_sidebar', 10);
remove_action('woocommerce_before_main_content', 'woocommerce_breadcrumb', 20, 0);

function custom_remove_default_shop_loop_header()
{
    remove_action('woocommerce_shop_loop_header', 'woocommerce_product_taxonomy_archive_header', 10);
}
add_action('init', 'custom_remove_default_shop_loop_header');

function custom_breadcrumb_home_url()
{
    return get_permalink(woocommerce_get_page_id('shop'));
}
add_filter('woocommerce_breadcrumb_home_url', 'custom_breadcrumb_home_url');

function custom_breadcrumb_defaults($defaults)
{
    $defaults['home'] = 'Sklep';
    return $defaults;
}
add_filter('woocommerce_breadcrumb_defaults', 'custom_breadcrumb_defaults');

function custom_track_product_views()
{
    if (is_singular('product')) {
        global $post;

        if (empty($_COOKIE['recently_viewed'])) {
            $viewed_products = array();
        } else {
            $viewed_products = (array) explode('|', $_COOKIE['recently_viewed']);
        }

        if (!in_array($post->ID, $viewed_products)) {
            $viewed_products[] = $post->ID;
        }

        if (count($viewed_products) > 5) {
            array_shift($viewed_products);
        }

        setcookie('recently_viewed', implode('|', $viewed_products), time() + (86400 * 30), "/");
    }
}
add_action('template_redirect', 'custom_track_product_views', 20);

function custom_remove_add_to_cart_buttons()
{
    remove_action('woocommerce_after_shop_loop_item', 'woocommerce_template_loop_add_to_cart', 10);
}
add_action('wp', 'custom_remove_add_to_cart_buttons');

add_action('woocommerce_product_add_to_cart', 'woocommerce_template_loop_add_to_cart', 10);

remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_meta', 40);
add_theme_support('wc-product-gallery-lightbox');
add_theme_support('wc-product-gallery-slider');
add_filter('woocommerce_product_tabs', 'remove_product_tabs', 98);
function remove_product_tabs($tabs)
{
    unset($tabs['description']);
    unset($tabs['reviews']);
    unset($tabs['additional_information']);

    return $tabs;
}

remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_price', 10);

add_action('woocommerce_single_product_summary', 'custom_price_with_prefix', 10);

function custom_price_with_prefix()
{
    global $product;
    $price = $product->get_price_html();
    echo '<div class="pt-4"><div class="custom-price-text text-sm font-light">Cena:</div></div><span class="price custom-price">' . $price . '</span>';
}

remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_excerpt', 20);

add_action('woocommerce_single_product_summary', 'woocommerce_template_single_excerpt', 8);

function add_payment_info()
{
    $payment_image_url = get_stylesheet_directory_uri() . '/img/platnosci.png';
    echo '<div class="payment-info pb-7"><img src="' . esc_url($payment_image_url) . '" alt="Metody płatności"></div>';
}

add_action('woocommerce_single_product_summary', 'add_payment_info', 11);
function text_show_stock_shop()
{

    global $product;

    if (!$product) {
        return;
    }

    $stock_html = wc_get_stock_html($product);
    if ($stock_html) {
        $stock_quantity = $product->get_stock_quantity();
        if ($stock_quantity == 0) {
            echo '<p class="stock-status" style="color: red;">Brak</p>';
        } elseif ($stock_quantity < 10 && $stock_quantity > 0) {
            echo '<p class="stock-status" style="color: orange;">Mała</p>';
        } elseif ($stock_quantity >= 10 && $stock_quantity < 20) {
            echo '<p class="stock-status" style="color: yellow;">Średnia</p>';
        } elseif ($stock_quantity >= 20) {
            echo '<p class="stock-status" style="color: green;">Wysoka</p>';
        }
    }
}


remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_meta', 40);
remove_action('woocommerce_after_single_product_summary', 'woocommerce_output_related_products', 20);
add_filter('woocommerce_coupons_enabled', '__return_false');
add_filter('woocommerce_product_thumbnails_columns', 'bbloomer_change_gallery_columns');

function bbloomer_change_gallery_columns()
{
    return 1;
}
function add_custom_div_before_variations_form()
{
    echo '<div class="custom-div">Dostępne kolory:</div>';
}
add_action('woocommerce_before_variations_form', 'add_custom_div_before_variations_form');


add_action('woocommerce_before_shop_loop', 'custom_line', 25);
function custom_line()
{
    echo '<div class="archive-product-line w-full clear-both"></div>';
}
