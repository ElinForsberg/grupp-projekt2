<?php
/*
Plugin Name:CPT plugin
*/



add_action('init', 'registrera_butik');

//kroken är init här är funktionen



function registrera_butik(){

$butik_args = [

 'public' => true,

'label' => 'Butik',

'show_in_rest' => true,

 //denna funktionen som ska registrera en bok förbereder en array

 ];

 register_post_type('Butik', $butik_args);

 //och den här arrayen kommer man skicka in om ett argument i denna funktionen som heter register_post_type. Det är denna man ska tillämpa på inlämingsuppgift 2

 //Man registrerar en sån här posttyp och och sen "bok" som vi definerat posttypen som. (singular ska det stå). Sen skickar vi in ett antal argument ($bok_args) De argumenten finns det en lång lista på som man kan se i dokumentationen. public behöver vi ha som true. vi vill att det står själva posttypen dvs bok. och sen för att få den nya blockredigeraren och inte den gamla klassiska så använder vi show_in_rest => true. När vi gjort detta kan vi se det i wp i sidan.

}
?>



