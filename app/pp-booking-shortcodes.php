<?php

// CREAR EL SHORTCODE PARA INYECTAR LAS FUNCIONES DEL COTIZADOR
add_shortcode('pp-reservation', 'ppReservation');
add_shortcode('pp-checkout', 'ppCheckout');
add_shortcode('pp-thankyou', 'ppThanks');
/*
add_shortcode('goquoting-travelers-details', 'goquotingTravelersDetails');
add_shortcode('goquoting-extras', 'goquotingExtras');
add_shortcode('gogabooking-checkout', 'goquotingCheckout');
*/
function ppReservation(){
    include 'views/pp-reservation.php';
}
function ppCheckout(){
    include 'views/pp-checkout.php';
}
function ppThanks(){
    include 'views/pp-thankyou.php';
    flush_rewrite_rules();
}
/*
function goquotingTravelersDetails(){
    include 'views/travelers-details.php';
}
function goquotingExtras(){
    include 'views/travelers-extras.php';
}
function goquotingCheckout(){
    include 'views/checkout.php';
}