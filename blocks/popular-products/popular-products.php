<?php

/**
 * Popular products Block template.
 *
 * @param array $block The block settings and attributes.
 */
$post_per_page = get_field('products_amount');

$args = array(
    'post_type' => 'product',
    'posts_per_page' => $post_per_page,
    'meta_key' => 'total_sales',
    'orderby' => 'meta_value_num',
);
// Support custom "anchor" values.
$id = 'popular-products-' . $block['id'];
if (!empty($block['anchor'])) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$className = 'popular-products';
if (!empty($block['className'])) {
    $className .= ' ' . $block['className'];
}
if (!empty($block['align'])) {
    $className .= ' align' . $block['align'];
}
?>
<div class="separator"></div>
<section id="<?php echo esc_attr($id); ?>" class="<?php echo esc_attr($className); ?> relative">
    <?php
    $products = new WP_Query($args);
    if ($products->have_posts()) { ?>
        <div class="grid grid-cols-1 gap-4 md:grid-cols-2 lg:grid-cols-5">
            <?php while ($products->have_posts()) {
                $products->the_post();
                wc_get_template_part('content', 'product');
            } ?>
        </div>
    <?php } else {
        echo 'No popular products found.';
    }

    wp_reset_postdata(); ?>
</section>