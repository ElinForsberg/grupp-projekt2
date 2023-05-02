<?php
/**
 * Plugin Name: Drone Shipping
 * Description: Drone shipping plugin
 */

 add_action('woocommerce_shipping_init', 'drone_shipping_init');

 
 function drone_shipping_init() {
    if (!class_exists('drone_shipping')){
        class WC_DRONE_SHIPPING extends WC_Shipping_Method {
            
           public function __construct(){
            $this->id                 = 'drone_shipping';
            $this->method_title       = __( 'Drone Shipping' );
            $this->method_description = __( 'Description of your drone shipping' ); // 
            $this->enabled            = "yes"; // This can be added as an setting but for this example its forced enabled
            $this->title              = "Drone shipping";
            $this-> countries = array(
                'SE',
                'NO',
                'DK'
            );

            $this->init();
           }
           public function init() {
            // Load the settings API
            $this->form_fields = array(
                
                'price1' => array(
                    'title' => __('Pris fraktklass 1 (kr)', 'drone shipping'),
                    'type' => 'number',
                    'default' => 100,
                    'min' => 10
                    
                ),
                'price2' => array(
                    'title' => __('Pris fraktklass 2 (kr)', 'drone shipping'),
                    'type' => 'number',
                    'default' => 100,
                    'min' => 10
                ),
                'price3' => array(
                    'title' => __('Pris fraktklass 3 (kr)', 'drone shipping'),
                    'type' => 'number',
                    'default' => 100,
                    'min' => 10
                )
            ); // This is part of the settings API. Override the method to add your own settings
            $this->init_settings(); // This is part of the settings API. Loads settings you previously init.

            add_action( 'woocommerce_update_options_shipping_' . $this->id, array( $this, 'process_admin_options' ) );
           }


           public function calculate_shipping( $package = array() ) {
//     $weight = 0;
//  $cost = 0;
//  $country = $package["destination"]["country"];
//  foreach ($package['contents'] as $item_id => $values) {
//  $_product = $values['data'];
//  $weight = $weight + $_product->get_weight() * $values['quantity'];
//  }
//  $weight = wc_get_weight($weight, 'kg');
//  if ($weight <= 5) {
//  $cost = floatval($this->get_option ('price1'));
//  } elseif ($weight <= 10) {
//  $cost = floatval($this->get_option ('price2'));
//  } else {
//  $cost = floatval($this->get_option ('price3'));
//  }
//  $countryZones = array(
//  'SE' => 1,
//  'NO' => 2,
//  'DK' => 3
//  );
//  $zonePrices = array(
//  1 => 30,   
//  2 => 50,
//  3 => 70
//  );
//  $zoneFromCountry = $countryZones[$country];
//  $priceFromZone = $zonePrices[$zoneFromCountry];
//  $cost += $priceFromZone;
//  $rate = array(
//  'id' => $this->id,
//  'label' => $this->title,
//  'cost' => $cost
//  );
//  $this->add_rate($rate);
//  }
//  }
//  }
//  }



$weight = 0;
$cost = 0;

$country = $package["destination"]["country"];

foreach ($package['contents'] as $item_id => $values) {
     $_product = $values['data'];
     $weight = $weight + $_product->get_weight() * $values['quantity'];
     }
     
  
     $weight = wc_get_weight($weight, 'kg');
    if ($weight <= 2){
        $cost = floatval($this->get_option ('price1'));
    }   elseif ( $weight > 2 && $weight <= 5 ) {
        $cost = floatval($this->get_option ('price2'));
    }   elseif ( $weight > 5 ) {
        $cost = floatval($this->get_option ('price3'));
    }

    $countryZones = array(
         'SE' => 1,
         'NO' => 2,
         'FI' => 3
         );
         $zonePrices = array(
         1 => 30,   
         2 => 50,
         3 => 70
         );
         $zoneFromCountry = $countryZones[$country];
         $priceFromZone = $zonePrices[$zoneFromCountry];
         $cost += $priceFromZone;
           
            $rate = array(
                'label' => $this->title,
                'cost' => $cost,
                'calc_tax' => 'per_item'
                
            );

            
            // Register the rate
            $this->add_rate( $rate );
        }
    }
        }
    }
 

 add_filter('woocommerce_shipping_methods', 'add_drone_method');

 function add_drone_method( $methods) {
    $methods['drone_shipping'] = 'WC_DRONE_SHIPPING';
    return $methods;
 }