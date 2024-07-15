<?php

function has_block_in_content($block_name, $post_content)
{
    if (has_block($block_name, $post_content)) {
        return true;
    }
    return false;
}

function enqueue_swiper_assets()
{
    global $post;
    if (is_a($post, 'WP_Post') && has_block_in_content('acf/home-slider', $post->post_content)) {
        wp_enqueue_style('swiper-css', 'https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css');
        wp_enqueue_script('swiper-js', 'https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js', array(), null, true);
    }
}
add_action('wp_enqueue_scripts', 'enqueue_swiper_assets');
