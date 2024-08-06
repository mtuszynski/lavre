<?php

function lavre_category_category()
{
    $product_categories = get_terms(array(
        'taxonomy' => 'product_cat',
        'orderby' => 'name',
        'order'   => 'ASC',
        'hide_empty' => false,
        'number' => is_shop() ? false : 5,
    ));

    if (!empty($product_categories) && !is_wp_error($product_categories)) { ?>
        <div class="flex flex-wrap gap-8 py-16 justify-center">
            <?php
            foreach ($product_categories as $category) {
                $thumbnail_id = get_term_meta($category->term_id, 'thumbnail_id', true);
                $image_url = wp_get_attachment_url($thumbnail_id);
            ?>
                <div class="category-item flex flex-col gap-8 items-center group">
                    <?php if ($image_url) { ?>
                        <a href="<?php echo esc_url(get_term_link($category)); ?>">
                            <img src="<?php echo esc_url($image_url); ?>" alt="<?php echo esc_attr($category->name); ?>" class="w-full object-cover rounded-full aspect-square transition-all group-hover:brightness-125">
                        </a>
                    <?php } else { ?>
                        <a href="<?php echo esc_url(get_term_link($category)); ?>" class="w-full bg-light rounded-full aspect-square flex items-center justify-center group"></a>
                    <?php } ?>
                    <div class="text-xl font-extrabold text-center transition-colors group-hover:text-primary">
                        <a href="<?php echo esc_url(get_term_link($category)); ?>">
                            <?php echo esc_html($category->name); ?>
                        </a>
                    </div>
                </div>
            <?php
            }
            echo '</div>';

            if (!is_shop()) { ?>
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
    <?php }
        }
    }
    add_action('woocommerce_after_shop_loop', 'lavre_category_category', 15);
    add_action('woocommerce_after_single_product_summary', 'lavre_category_category', 18);
