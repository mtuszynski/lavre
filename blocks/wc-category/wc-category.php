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

<section id="<?php echo esc_attr($id); ?>" class="py-8 <?php echo esc_attr($className); ?>">
    <div class="container mx-auto">
        <?php
        if ($selected_categories) {
            echo '<div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-6 gap-4">';
            foreach ($selected_categories as $selected_category) {
                $category = get_term($selected_category, 'category');
                $thumbnail_id = get_term_meta($category->term_id, 'thumbnail_id', true);
                $image = wp_get_attachment_image_src($thumbnail_id, 'full'); ?>
                <div class="flex flex-col gap-8 items-center group">
                    <?php if ($image) { ?>
                        <a href="<?php echo get_category_link($category->term_id) ?>">
                            <img class="w-full object-cover rounded-full aspect-square transition-all group-hover:brightness-125" src="<?php echo esc_url($image[0]) ?>" alt="<?php echo esc_attr($category->name) ?>">
                        </a>
                    <?php } ?>
                    <div class="text-xl font-extrabold text-center transition-colors group-hover:text-primary">
                        <a href="<?php echo get_category_link($category->term_id) ?>"><?php echo esc_html($category->name) ?></a>
                    </div>
                </div>
            <?php } ?>
            <div class="flex flex-col w-full h-full">
                <a class="bg-light rounded-full aspect-square flex items-center justify-center group" href="<?php echo get_permalink(get_option('page_for_posts')) ?>">
                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="97.443" height="47.197" viewBox="0 0 97.443 47.197" class="transition-transform duration-300 group-hover:scale-110">
                        <defs>
                            <clipPath id="a">
                                <rect width="97.443" height="47.197" fill="#5e5a52" />
                            </clipPath>
                        </defs>
                        <g clip-path="url(#a)">
                            <path d="M0,22.839c.767-2.285,2.387-3.074,4.747-3.07q39.149.061,78.3.025h1.313c-.414-.433-.681-.725-.961-1Q77.264,12.68,71.127,6.574A3.7,3.7,0,0,1,70.1,2.733,3.6,3.6,0,0,1,72.954.094,3.768,3.768,0,0,1,76.58,1.271q5.56,5.54,11.131,11.069Q91.86,16.465,96,20.6c1.917,1.914,1.924,4.088,0,6q-9.672,9.636-19.359,19.256a3.8,3.8,0,0,1-5.585.229c-1.588-1.584-1.485-3.907.266-5.654q6.062-6.048,12.136-12.082c.247-.245.532-.452.8-.676l-.078-.264H83.143q-39.2,0-78.394.025c-2.359,0-3.98-.786-4.749-3.07Z" transform="translate(0 0)" fill="#5e5a52" />
                        </g>
                    </svg>
                </a>
            </div>

    </div>
<?php }
?>
</div>
</section>