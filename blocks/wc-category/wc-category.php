<?php

/**
 * Woocommerce Category Block template.
 *
 * @param array $block The block settings and attributes.
 */

// Load values and assign defaults.

// Support custom "anchor" values.
$id = 'wc-category-' . $block['id'];
if (!empty($block['anchor'])) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$className = 'wc-category';
if (!empty($block['className'])) {
    $className .= ' ' . $block['className'];
}
if (!empty($block['align'])) {
    $className .= ' align' . $block['align'];
}
$selected_categories = get_field('select_categories');
?>

<section id="<?php echo esc_attr($id); ?>" class="<?php echo esc_attr($className); ?>">
    <div class="container mx-auto">
        <?php
        if ($selected_categories) {
            echo '<div class="grid grid-cols-6 gap-4">';
            foreach ($selected_categories as $selected_category) {
                $category = get_term($selected_category, 'category');
                $thumbnail_id = get_term_meta($category->term_id, 'thumbnail_id', true);
                $image = wp_get_attachment_image_src($thumbnail_id, 'full');

                echo '<div class="col">';
                if ($image) {
                    echo '<img class="w-full h-auto" src="' . esc_url($image[0]) . '" alt="' . esc_attr($category->name) . '">';
                }
                echo '<h2 class="text-lg font-bold mt-2"><a href="' . get_category_link($category->term_id) . '">' . $category->name . '</a></h2>';
                echo '</div>';
            }
            echo '<div class="col text-center">';
            echo '<a class="text-lg font-bold mt-2" href="' . get_permalink(get_option('page_for_posts')) . '">All Categories</a>';
            echo '</div>';
            echo '</div>';
        }
        ?>
    </div>
</section>