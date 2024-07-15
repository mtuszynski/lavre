<?php
require_once 'inc/acf-blocks.php';
require_once 'inc/enqueue.php';

/**
 * Theme setup.
 */
function lavre_theme_setup()
{
	add_theme_support('title-tag');

	register_nav_menus(
		array(
			'primary' => __('Primary Menu', 'tailpress'),
		)
	);

	add_theme_support(
		'html5',
		array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		)
	);

	add_theme_support('post-thumbnails');

	add_theme_support('align-wide');
	add_theme_support('wp-block-styles');
	add_theme_support('responsive-embeds');
	add_theme_support('editor-styles');
	add_editor_style('css/editor-style.css');
}

add_action('after_setup_theme', 'lavre_theme_setup');

/**
 * Enqueue theme assets.
 */
function lavre_theme_enqueue_scripts()
{
	$theme = wp_get_theme();

	wp_enqueue_style('tailpress', lavre_theme_asset('css/app.css'), array(), $theme->get('Version'));
	wp_enqueue_script('tailpress', lavre_theme_asset('js/app.js'), array(), $theme->get('Version'));
}

add_action('wp_enqueue_scripts', 'lavre_theme_enqueue_scripts');

function tailpress_enqueue_block_editor_assets()
{
	wp_enqueue_style('tailpress-editor-styles', lavre_theme_asset('css/editor-style.css'), array(), '1.0', 'all');
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

/**
 * Adds option 'li_class' to 'wp_nav_menu'.
 *
 * @param string  $classes String of classes.
 * @param mixed   $item The current item.
 * @param WP_Term $args Holds the nav menu arguments.
 *
 * @return array
 */
function lavre_theme_nav_menu_add_li_class($classes, $item, $args, $depth)
{
	if (isset($args->li_class)) {
		$classes[] = $args->li_class;
	}

	if (isset($args->{"li_class_$depth"})) {
		$classes[] = $args->{"li_class_$depth"};
	}

	return $classes;
}

add_filter('nav_menu_css_class', 'lavre_theme_nav_menu_add_li_class', 10, 4);

/**
 * Adds option 'submenu_class' to 'wp_nav_menu'.
 *
 * @param string  $classes String of classes.
 * @param mixed   $item The current item.
 * @param WP_Term $args Holds the nav menu arguments.
 *
 * @return array
 */
function lavre_theme_nav_menu_add_submenu_class($classes, $args, $depth)
{
	if (isset($args->submenu_class)) {
		$classes[] = $args->submenu_class;
	}

	if (isset($args->{"submenu_class_$depth"})) {
		$classes[] = $args->{"submenu_class_$depth"};
	}

	return $classes;
}

add_filter('nav_menu_submenu_css_class', 'lavre_theme_nav_menu_add_submenu_class', 10, 3);

// ACF Options Page
if (
	function_exists('acf_add_options_page')
) {

	acf_add_options_page(array(
		'page_title'    => 'Theme General Settings',
		'menu_title'    => 'Theme Settings',
		'menu_slug'     => 'theme-general-settings',
		'capability'    => 'edit_posts',
		'redirect'      => false
	));
}
