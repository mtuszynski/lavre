<?php
function custom_best_selling_products()
{
    $args = array(
        'post_type' => 'product',
        'posts_per_page' => 5,
        'meta_key' => 'total_sales',
        'orderby' => 'meta_value_num',
    );

    $loop = new WP_Query($args);

    if ($loop->have_posts()) { ?>
        <div class="separator alignfull clear-both"></div>
        <h2 class="text-3xl font-bold mb-10 mt-8">Najczęściej kupowane</h2>
        <div class="products products-list clear-both grid grid-cols-1 sm:grid-cols-2 md:grid-cols-2 lg:grid-cols-5 gap-9 pb-16">
            <?php while ($loop->have_posts()) {
                $loop->the_post(); ?>
                <?php wc_get_template_part('content', 'product'); ?>
            <?php } ?>
        </div>
<?php

        wp_reset_postdata();
    }
}

add_action('woocommerce_after_single_product_summary', 'custom_recently_viewed_products', 20);
