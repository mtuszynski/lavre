<?php
add_action('woocommerce_after_quantity_input_field', 'rk_display_quantity_plus');
add_action('woocommerce_before_quantity_input_field', 'rk_display_quantity_minus');
add_action('wp_footer', 'rk_add_cart_quantity_plus_minus');

function rk_display_quantity_plus()
{
    echo '<button type="button" class="qty-btn plus">+</button>';
}

function rk_display_quantity_minus()
{
    echo '<button type="button" class="qty-btn minus" disabled>-</button>';
}

function rk_add_cart_quantity_plus_minus()
{
    if (!is_product() && !is_cart()) {
        return;
    }
    wc_enqueue_js(
        "$(document).ready(function() {
            $('input.qty').each(function() {
                var qty = $(this);
                var min = parseFloat(qty.attr('min'));
                if (qty.val() <= min) {
                    qty.siblings('button.minus').prop('disabled', true);
                } else {
                    qty.siblings('button.minus').prop('disabled', false);
                }
            });
        });

        $(document).on('click', 'button.plus, button.minus', function() {
            var qty = $(this).parent('.quantity').find('.qty');
            var val = parseFloat(qty.val());
            var max = parseFloat(qty.attr('max'));
            var min = parseFloat(qty.attr('min'));
            var step = parseFloat(qty.attr('step'));

            if ($(this).is('.plus')) {
                if (max && (max <= val)) {
                    qty.val(max).change();
                } else {
                    qty.val(val + step).change();
                }
            } else {
                if (min && (min >= val)) {
                    qty.val(min).change();
                } else if (val > min) {
                    qty.val(val - step).change();
                }
            }

            // Disable minus button if value is less than or equal to min
            if (qty.val() <= min) {
                qty.siblings('button.minus').prop('disabled', true);
            } else {
                qty.siblings('button.minus').prop('disabled', false);
            }
        });
    "
    );
}
