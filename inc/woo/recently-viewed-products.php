<?php
function custom_recently_viewed_products()
{
    if (is_product() || is_product_category() || is_shop()) {
        if (empty($_COOKIE['recently_viewed'])) {
            return;
        }

        $viewed_products = array_reverse((array) explode('|', $_COOKIE['recently_viewed']));

        if (empty($viewed_products)) {
            return;
        }

        $query_args = array(
            'posts_per_page' => 5,
            'no_found_rows'  => 1,
            'post_status'    => 'publish',
            'post_type'      => 'product',
            'post__in'       => $viewed_products,
            'orderby'        => 'post__in',
        );

        $recently = new WP_Query($query_args);

        if ($recently->have_posts()) { ?>
            <div class="separator alignfull clear-both"></div>
            <h2 class="text-3xl font-bold mb-10 mt-8"><?php echo __('Ostatnio oglądane', 'lavre'); ?></h2>
            <div class="products products-list clear-both grid grid-cols-1 sm:grid-cols-2 md:grid-cols-2 lg:grid-cols-5 gap-9 pb-16">
                <?php while ($recently->have_posts()) {
                    $recently->the_post(); ?>
                    <?php wc_get_template_part('content', 'product'); ?>
                <?php } ?>
            </div>
<?php wp_reset_postdata();
        }
    }
}

add_action('woocommerce_after_shop_loop', 'custom_recently_viewed_products', 20);
