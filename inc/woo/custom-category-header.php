<?php
function custom_shop_loop_header()
{
    if (is_product_taxonomy()) {
        $term = get_queried_object();
        $term_id = $term->term_id;
        $thumbnail_id = get_term_meta($term_id, 'thumbnail_id', true);
        $image_url = wp_get_attachment_url($thumbnail_id);

        $term_name = single_term_title('', false);

        $term_description = term_description(); ?>
        <div class="custom-shop-loop-header flex flex-col-reverse lg:flex-row pt-12 items-center pb-20 relative gap-8">
            <?php
            if ($image_url) { ?>
                <div class="term-image w-full lg:w-4/12"><img src="<?php echo esc_url($image_url) ?>" alt="<?php echo esc_attr($term_name) ?>" /></div>
            <?php } ?>
            <div class="flex flex-col w-full lg:w-7/12">
                <h1 class="text-3xl sm:text-5xl font-extrabold pb-2.5"><?php echo esc_html($term_name) ?></h1>
                <?php woocommerce_breadcrumb();
                if ($term_description) { ?>
                    <div class="term-description pt-5"><?php echo wp_kses_post($term_description) ?></div>
                <?php } ?>
            </div>
            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="1110.018" height="216.114" viewBox="0 0 1110.018 216.114" class="hidden lg:block absolute bottom-1 left-1/2 transform translate-x-[-50%]">
                <defs>
                    <clipPath id="a">
                        <rect width="1110.018" height="216.114" fill="#d9d9d9" />
                    </clipPath>
                </defs>
                <g transform="translate(0 0)" opacity="0.407">
                    <g transform="translate(0 0)" clip-path="url(#a)">
                        <path d="M80.617,211.465C18.294,211.465,0,192.239,0,138.911V0H46.818V137.048c0,24.5,8.063,34.109,37.83,34.109H210.225v40.308Z" transform="translate(0 -0.001)" fill="#d9d9d9" />
                        <path d="M144.594,183.713c-48.371,0-61.394-17.054-61.394-44.34V123.561c0-28.217,11.784-44.342,58.292-44.342H265.83V75.5c0-21.4-8.063-26.978-28.527-26.978h-45.89V15.656H237.3c53.642,0,74.728,19.225,74.728,62.012V118.6c0,48.682-17.054,65.115-76.585,65.115ZM265.83,107.746H146.454c-10.852,0-17.365,3.721-17.365,17.054v11.473c0,11.781,7.131,15.812,18.915,15.812h86.819c21.7,0,31.006-4.96,31.006-30.075Z" transform="translate(147.482 27.751)" fill="#d9d9d9" />
                        <path d="M342.673,172.55c-6.821,9.3-15.194,15.812-31.627,15.812-17.054,0-25.114-6.2-31.938-15.812L168.414,15.656h55.194l88.058,128.677L398.8,15.656h54.571Z" transform="translate(298.534 27.751)" fill="#d9d9d9" />
                        <path d="M274.43,183.713V86.352c0-50.232,22.015-70.7,78.756-70.7h30.077V53.175H354.428c-25.738,0-33.8,6.821-33.8,33.488v97.05Z" transform="translate(486.46 27.751)" fill="#d9d9d9" />
                        <path d="M367.6,116.737v7.752c0,20.465,6.2,24.186,27.9,24.186h54.573v35.038H395.5c-53.328,0-74.1-19.225-74.1-63.873V81.081c0-48.992,17.052-65.425,76.275-65.425h81.24c48.058,0,61.391,19.225,61.391,45.89v55.192ZM494.1,65.266c0-11.163-4.96-13.952-18.915-13.952h-76.9c-23.254,0-30.7,2.479-30.7,26.664v8.992H494.1Z" transform="translate(569.712 27.751)" fill="#d9d9d9" />
                    </g>
                </g>
            </svg>
        </div>
<?php }
}
add_action('woocommerce_shop_loop_header', 'custom_shop_loop_header', 10);
