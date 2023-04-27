<?php

get_header( 'shop' ); 

$butiker = new WP_Query(array(
    'post_per_page' => 5,
    'post_type' => 'butik',
));

 while ( $butiker -> have_posts() ) {

            ?><h1><?php $butiker -> the_title(); ?></h1><?php
            $butiker -> the_post();

			$butiker -> the_content();

 }
get_footer();