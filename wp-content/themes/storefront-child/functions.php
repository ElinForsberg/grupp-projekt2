<?php

// Tar bort header från checkout
function remove_header_from_checkout()
{
    if (is_checkout()) {
        remove_action('storefront_page', 'storefront_page_header', 10);
        remove_action('storefront_before_content', 'storefront_header_widget_region', 10);
        remove_action('storefront_header', 'storefront_header_container', 0);
        remove_action('storefront_header', 'storefront_skip_links', 5);
        remove_action('storefront_header', 'storefront_site_branding', 20);
        remove_action('storefront_header', 'storefront_secondary_navigation', 30);
        remove_action('storefront_header', 'storefront_product_search', 40);
        remove_action('storefront_header', 'storefront_header_container_close', 41);
        remove_action('storefront_header', 'storefront_primary_navigation_wrapper', 42);
        remove_action('storefront_header', 'storefront_primary_navigation', 50);
        remove_action('storefront_header', 'storefront_header_cart', 60);
        remove_action('storefront_header', 'storefront_primary_navigation_wrapper_close', 68);
    }
}

add_action('wp_head', 'remove_header_from_checkout');

// Tar bort footer från checkout
function remove_footer_from_checkout()
{
    if (is_checkout()) {
        remove_action('storefront_footer', 'storefront_footer_widgets', 10);
        remove_action('storefront_footer', 'storefront_credit', 20);
    }
}
add_action('wp_head', 'remove_footer_from_checkout');


// Tar bort sidebar från
add_action('get_header', 'remove_storefront_sidebar');
function remove_storefront_sidebar()
{
    if (is_checkout()) {
        remove_action('storefront_sidebar', 'storefront_get_sidebar', 10);
    }
}


// Flyttar på rabattkoden
remove_action('woocommerce_before_checkout_form', 'woocommerce_checkout_coupon_form', 10);

add_action('woocommerce_after_checkout_form', 'woocommerce_checkout_coupon_form');


// Lägger till telefon nummer
function phonenumber()
{
    $number = '<a href="tel:+46213242423">+46213242423</a>';
    echo $number;
}

add_action('woocommerce_review_order_after_submit', 'phonenumber');


// Lägger till redigera varukorg länk 
add_action('woocommerce_review_order_before_payment', 'add_link_to_cart');
function add_link_to_cart()
{

?>
    <p><a href="<?php wc_get_cart_url(); ?>"><?php _e('Ändra varukorg', 'woocommerce'); ?></a></p>
<?php
};

// ***************** ändrar out of stock till Kommer snart!**********

add_filter('woocommerce_get_availability_text', 'change_soldout', 10, 2);

/**

 * Change Sold Out Text to Something Else
 */

function change_soldout($text, $product)
{

    if (!$product->is_in_stock()) {

        $text = '<div class="">Kommer snart!</div>';
    }

    return $text;
}
