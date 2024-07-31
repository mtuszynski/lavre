<?php
require_once 'inc/acf-blocks.php';
require_once 'inc/enqueue.php';
require_once 'inc/woocommerce.php';

/**
 * Theme setup.
 */
function lavre_theme_setup()
{
	add_theme_support('title-tag');

	register_nav_menus(
		array(
			'primary' => __('Primary Menu', 'tailpress'),
			'language' => __('Language Menu', 'tailpress'),
			'icon' => __('Icon Menu', 'tailpress'),
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

add_filter(
	'dgwt/wcas/form/magnifier_ico',
	function ($html, $class) {
		$html = '<svg xmlns="http://www.w3.org/2000/svg" width="24.446" height="24.434" viewBox="0 0 24.446 24.434"><path d="M1224.223-1178.174a1.022,1.022,0,0,1-.733-.348q-1.1-1.1-2.193-2.2-1.072-1.072-2.142-2.144a.858.858,0,0,1-.094-.13c-.022-.034-.044-.069-.069-.1l-.17-.24-.231.181a11.06,11.06,0,0,1-6.86,2.414h0a11.024,11.024,0,0,1-8.434-3.959,10.949,10.949,0,0,1-2.514-7.432,11.085,11.085,0,0,1,3.151-7.228,10.89,10.89,0,0,1,7.8-3.249,10.969,10.969,0,0,1,6.633,2.22,11.076,11.076,0,0,1,4.2,7.373,11.026,11.026,0,0,1-2.336,8.236l-.2.25.273.163c.033.019.068.038.105.056a.6.6,0,0,1,.129.078c1.4,1.392,2.9,2.884,4.359,4.356a1.026,1.026,0,0,1,.288.991.948.948,0,0,1-.693.673A1.032,1.032,0,0,1,1224.223-1178.174Zm-12.488-22.5a8.978,8.978,0,0,0-6.4,2.65,8.91,8.91,0,0,0-2.618,6.357,9.018,9.018,0,0,0,8.993,8.987h.018a9.012,9.012,0,0,0,8.985-9,9,9,0,0,0-8.969-8.992Z" transform="translate(-1200.772 1202.608)"/></svg>';
		return $html;
	},
	10,
	2
);
