<?php

/**
 * Enqueue theme assets.
 */
function lavre_theme_enqueue_scripts()
{
    $theme = wp_get_theme();
    global $post;
    if (is_a($post, 'WP_Post') && has_block_in_content('acf/home-slider', $post->post_content)) {
        wp_enqueue_style('swiper-css', 'https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css');
        wp_enqueue_script('swiper-js', 'https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js', array(), null, true);
    }
    wp_enqueue_style('tailpress', lavre_theme_asset('css/app.css'), array(), $theme->get('Version'));
    wp_enqueue_script('tailpress', lavre_theme_asset('js/app.js'), array(), $theme->get('Version'));
}

add_action('wp_enqueue_scripts', 'lavre_theme_enqueue_scripts');

function tailpress_enqueue_block_editor_assets()
{
    wp_enqueue_style('tailpress-editor-styles', lavre_theme_asset('css/editor-style.css'), array(), '1.0', 'all');
    wp_enqueue_script('tailpress-editor-script', lavre_theme_asset('js/app.js'), array(), null, true);
    wp_enqueue_style('swiper-css', 'https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css');
    wp_enqueue_script('swiper-js', 'https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js', array(), null, true);
}
add_action('enqueue_block_editor_assets', 'tailpress_enqueue_block_editor_assets');
/**
 * Get asset path.
 *
 * @param string  $path Path to asset.
 *
 * @return string
 */
function lavre_theme_asset($path)
{
    if (wp_get_environment_type() === 'production') {
        return get_stylesheet_directory_uri() . '/' . $path;
    }

    return add_query_arg('time', time(),  get_stylesheet_directory_uri() . '/' . $path);
}

function has_block_in_content($block_name, $post_content)
{
    if (has_block($block_name, $post_content)) {
        return true;
    }
    return false;
}
function custom_separator_block_assets()
{
    $dir = get_template_directory_uri() . '/blocks/custom-separator/';

    wp_register_script(
        'custom-unique-separator-block',
        $dir . 'index.js',
        array('wp-blocks', 'wp-i18n', 'wp-element', 'wp-editor'),
        filemtime(get_template_directory() . '/blocks/custom-separator/index.js'),
    );

    wp_register_style(
        'custom-unique-separator-editor-style',
        $dir . 'editor.css',
        array('wp-edit-blocks'),
        filemtime(get_template_directory() . '/blocks/custom-separator/editor.css')
    );

    wp_register_style(
        'custom-unique-separator-style',
        $dir . 'style.css',
        array(),
        filemtime(get_template_directory() . '/blocks/custom-separator/style.css')
    );

    register_block_type('custom/unique-separator', array(
        'editor_script' => 'custom-unique-separator-block',
        'editor_style' => 'custom-unique-separator-editor-style',
        'style' => 'custom-unique-separator-style',
    ));
}
add_action('init', 'custom_separator_block_assets');
