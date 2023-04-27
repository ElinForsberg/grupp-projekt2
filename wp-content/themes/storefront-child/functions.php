<?php

function register_store_styles(){
    wp_enqueue_style('store_styles', get_template_directory_uri() . "./style.css");
}

add_action('wp_enqueue_scripts', 'register_store_styles');

?>