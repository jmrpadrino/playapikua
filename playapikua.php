<?php

/*
    Plugin Name: Playa Pikua BS
    Plugin URI: https://dloop.dev-jp.de/
    Description: Playa Pikua booking system
    Author: Digital Loop
    Author URI: https://dloop.dev-jp.de/
    Version: 0.0.10
    Text Domain: ppbs
    Domain Path: /languages/
*/

define('URL_PLUGIN_BOOKING', plugin_dir_url( __FILE__ ));
define('PATH_PLUGIN_BOOKING', plugin_dir_path( __FILE__ ));
define('META_PREFIX', 'pp_');

require_once 'playapikua-config.php';

require_once 'backend/pp_cpt_rooms.php';
require_once 'backend/pp_metabox_rooms.php';
require_once 'backend/pp_cpt_quotes.php';
require_once 'backend/pp_metabox_quotes.php';

require_once 'app/pp-booking-system-create-pages.php';
require_once 'app/pp-booking-shortcodes.php';

require_once 'playapikua-shortcode.php';



/* 
	Titulo -> Title
	Imagen -> thumnail
	More Info -> Content

	Galleria -> multiple files
	Properties -> Test Text David
	Price -> Test Money
	Short Information -> Test wysiwyg
	Amenities -> Test Multi Checkbox
*/