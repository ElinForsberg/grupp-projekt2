<?php

get_header( 'shop' ); 

the_post();
the_title();
$store_adress = get_post_meta(get_the_ID(), 'adress', true);
?><h3><?php echo $store_adress ?></h3><?php

the_content(); 

get_footer();
