<?php

function grupp_projekt_post_types(){
    register_post_type('butik', array(
        'supports' => array('title', 'editor', 'excerpt', 'custom-fields'),
        'rewrite' => array('slug', 'butiker'),
        'has_archive' => true,
        'public' => true,
        'show_in_rest' => true,
        'labels' => array(
            'name' => 'Butiker',
            'add_new_item' => 'Lägg till ny butik',
            'edit_item' => 'Editera butik',
            'all_items' => 'Butiker',
            'singular_name' => 'Butik',
        ),
        'menu_icon' => 'dashicons-store'
        )
    );
    }

add_action('init', 'grupp_projekt_post_types')

?>