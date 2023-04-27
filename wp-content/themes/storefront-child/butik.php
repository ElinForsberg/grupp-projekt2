<?php

get_header( 'shop' ); 

$butiker = new WP_Query(array(
    'post_per_page' => 5,
    'post_type' => 'butik',
));

function get_custom_field($prod){
    $field_value = get_post_meta($prod->get_id(), 'adress', true);
    return $field_value;
}
?><h1>Butiker</h1><?php
 while ( $butiker -> have_posts() ) {



            $butiker->the_post();
            the_title();
            $strange = get_post_meta(get_the_ID(), 'adress', true);
            ?><h3><?php echo $strange ?></h3><?php
           
			$butiker->the_content();
            ?> <script src="https://maps.googleapis.com/maps/api/js?sensor=false&callback=myMap"></script><?php

 }

get_footer();
//<script src="https://maps.googleapis.com/maps/api/js?sensor=false&callback=myMap"></script>