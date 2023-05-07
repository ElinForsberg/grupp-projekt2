<?php

/**
 * Plugin Name: Drone Shipping
 * Description: Drone shipping plugin
 */


add_action('woocommerce_shipping_init', 'drone_shipping_init');



function drone_shipping_init()
{
    if (!class_exists('drone_shipping')) {
        class WC_DRONE_SHIPPING extends WC_Shipping_Method
        {

            public function __construct()
            {
                $this->id                 = 'drone_shipping';
                $this->method_title       = __('Drone Shipping');
                $this->method_description = __('Description of your drone shipping'); // 
                $this->enabled            = "yes"; // This can be added as an setting but for this example its forced enabled
                $this->title              = "Drone shipping";
                $this->countries = array(
                    'SE',
                    'NO',
                    'DK'
                );

                $this->init();
            }
            public function init()
            {
                // Load the settings API
                $this->form_fields = array(

                    'dronar_pris' => array(
                        'title' => __('Pris (kr)', 'drone shipping'),
                        'type' => 'number',
                        'default' => 100,
                        'min' => 10

                    )
                ); // This is part of the settings API. Override the method to add your own settings
                $this->init_settings(); // This is part of the settings API. Loads settings you previously init.

                add_action('woocommerce_update_options_shipping_' . $this->id, array($this, 'process_admin_options'));
            }


            public function calculate_shipping($package = array())
            {
                $shipping_zone = wc_get_shipping_zone($package);

                $cart_items = $package['contents'];

                $products_freight_list = array();
                foreach ($cart_items as $cart_item) {
                    $shipping_class = $cart_item['data']->get_shipping_class();
                    array_push($products_freight_list, $shipping_class);
                }
                $freight_drone_cost = 0;
                $highest_freight_class = '';

                if (in_array("mega-tung", $products_freight_list)) {
                    $freight_drone_cost += 30000;
                    $highest_freight_class .= "mega-tung";
                } else if (in_array("tung", $products_freight_list)) {
                    $freight_drone_cost += 20000;
                    $highest_freight_class .= "tung";
                } else if (in_array("standard", $products_freight_list)) {
                    $freight_drone_cost += 10000;
                    $highest_freight_class .= "standard";
                }

                $zone_name = $shipping_zone->get_zone_name();
                $zones = array(
                    'zone_1' => 1111,
                    'zone_2' => 2222,
                    'zone_3' => 3333
                );

                $zone_cost = $zones[$zone_name];

                $drone_price = $this->get_option('dronar_pris');
                $cost = $drone_price + $zone_cost;

                $rate = array(
                    'label' => $this->title,
                    'cost' => $cost,
                    'calc_tax' => 'per_item'

                );

                $this->add_rate($rate);
            }
        }
    }
}


add_filter('woocommerce_shipping_methods', 'add_drone_method');

function add_drone_method($methods)
{
    $methods['drone_shipping'] = 'WC_DRONE_SHIPPING';
    return $methods;
}
