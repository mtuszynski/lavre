<?php

/**
 * Featured products Block template.
 *
 * @param array $block The block settings and attributes.
 */
$post_per_page = get_field('products_amount');
$args = array(
    'post_type' => 'product',
    'posts_per_page' => $post_per_page,
    'tax_query' => array(
        array(
            'taxonomy' => 'product_visibility',
            'field'    => 'name',
            'terms'    => 'featured',
            'operator' => 'IN',
        ),
    ),
);

$featured_products = new WP_Query($args);
// Support custom "anchor" values.
$id = 'featured-products-' . $block['id'];
if (!empty($block['anchor'])) {
    $id = $block['anchor'];
}
// Create class attribute allowing for custom "className" and "align" values.
$className = 'featured-products';
if (!empty($block['className'])) {
    $className .= ' ' . $block['className'];
}
if (!empty($block['align'])) {
    $className .= ' align' . $block['align'];
}
if ($featured_products->have_posts()) {
?>
    <div class="separator alignfull"></div>
    <section id="<?php echo esc_attr($id); ?>" class="<?php echo esc_attr($className); ?> relative woocommerce py-8">
        <h2 class="text-3xl font-bold mb-10"><?php echo esc_html__('Polecane produkty', 'lavre'); ?></h2>
        <div class="products products-list clear-both grid grid-cols-1 sm:grid-cols-2 md:grid-cols-2 lg:grid-cols-5 gap-9 pb-16">
            <?php while ($featured_products->have_posts()) {
                $featured_products->the_post();
                wc_get_template_part('content', 'product');
            } ?>
        </div>
        <?php wp_reset_postdata(); ?>
    </section>
<?php }
