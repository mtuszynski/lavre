<?php

/**
 * Single Product Up-Sells
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product/up-sells.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see         https://woocommerce.com/document/template-structure/
 * @package     WooCommerce\Templates
 * @version     3.0.0
 */

if (!defined('ABSPATH')) {
	exit;
}

if ($upsells) : ?>
	<div class="separator alignfull clear-both"></div>
	<section class="up-sells upsells products py-8">
		<?php
		$heading = apply_filters('woocommerce_product_upsells_products_heading', __('You may also like&hellip;', 'woocommerce'));

		if ($heading) :
		?>
			<h2 class="text-center text-3xl font-bold mb-10"><?php echo esc_html($heading); ?></h2>
		<?php endif; ?>

		<div class="products products-list clear-both grid grid-cols-1 sm:grid-cols-2 md:grid-cols-2 lg:grid-cols-5 gap-9 pb-16">

			<?php foreach ($upsells as $upsell) : ?>

				<?php
				$post_object = get_post($upsell->get_id());

				setup_postdata($GLOBALS['post'] = &$post_object); // phpcs:ignore WordPress.WP.GlobalVariablesOverride.Prohibited, Squiz.PHP.DisallowMultipleAssignments.Found

				wc_get_template_part('content', 'product');
				?>

			<?php endforeach; ?>

		</div>

	</section>

<?php
endif;

wp_reset_postdata();
