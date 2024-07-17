<?php


$args = array(
    'post_type' => 'product',
    'posts_per_page' => 4,
    'meta_query' => array(
        array(
            'key' => '_featured',
            'value' => 'yes'
        )
    )
);

$featured_products = new WP_Query($args);

if ($featured_products->have_posts()) {
    echo '<div class="grid grid-cols-2 gap-4">';
    while ($featured_products->have_posts()) {
        $featured_products->the_post(); ?>
        <div class="p-4 bg-white shadow">
            <h2 class="text-xl font-bold"><?php the_title(); ?></h2>
            <p class="text-gray-500"><?php the_excerpt(); ?></p>
            <p class="text-green-500 font-bold"><?php echo wc_price(get_post_meta(get_the_ID(), '_regular_price', true)); ?></p>
        </div>
<?php
    }
    echo '</div>';
} else {
    echo 'No featured products found.';
}

wp_reset_postdata();
