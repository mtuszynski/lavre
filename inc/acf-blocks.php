<?php

/**
 * We use WordPress's init hook to make sure
 * our blocks are registered early in the loading
 * process.
 *
 * @link https://developer.wordpress.org/reference/hooks/init/
 */
function lavre_register_acf_blocks()
{
    /**
     * We register our block's with WordPress's handy
     * register_block_type();
     *
     * @link https://developer.wordpress.org/reference/functions/register_block_type/
     */
    $blocks_dir = get_template_directory() . '/blocks/';
    register_block_type($blocks_dir . 'home-slider');
    register_block_type($blocks_dir . 'wc-category');
    register_block_type($blocks_dir . 'popular-products');
    register_block_type($blocks_dir . 'featured-products');
}

add_action('init', 'lavre_register_acf_blocks');
