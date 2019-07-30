<?php

// Function to add subscribe text to posts and pages
  function reservation_shortcode() {
  	$room=$_GET['roomid'];
  	$checkin=$_GET['checkin'];
  	$checkout=$_GET['checkout'];
  	$pax=$_GET['pax'];

  	$html='';
  	$html.='<div>';
  	$html.='<form>';

  	$html.='<div>';
  	$html.='<strong>First Name: </strong>';
  	$html.='<input type="text" name="first-name">';
  	$html.='</div>';
  	$html.='<div>';
  	$html.='<strong>Last Name: </strong>';
  	$html.='<input type="text" name="last-name">';
  	$html.='</div>';
  	$html.='<div>';
  	$html.='<strong>Email Address: </strong>';
  	$html.='<input type="text" name="email-address">';
  	$html.='</div>';
  	$html.='<div>';
  	$html.='<strong>Phone Number: </strong>';
  	$html.='<input type="text" name="phone">';
  	$html.='</div>';
  	$html.='<div>';
  	$html.='<strong>Country: </strong>';
  	$html.='<input type="text" name="first-name">';
  	$html.='</div>';
  	$html.='<div>';
  	$html.='<strong>Special Requests: </strong>';
  	$html.='<input type="text" name="first-name">';
  	$html.='</div>';

  	$html.='</form>';
  	$html.='</div>';
    return $html;
}
add_shortcode('reservation', 'reservation_shortcode');