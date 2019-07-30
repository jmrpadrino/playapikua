<?php

function pp_front_end_scripts() {
    //wp_enqueue_style( 'parent-style', get_template_directory_uri() . '/style.css' );
	//wp_enqueue_script('jquery', 'https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js', array(), null, true);
	//wp_enqueue_script( 'pp-select2','https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.7/js/select2.min.js', null,'',false );
	wp_enqueue_script('pp-dates', plugin_dir_url(__FILE__).'/js/date.format.js',array('jquery'), null, true);
	wp_enqueue_script('pp-scripts', plugin_dir_url(__FILE__).'/js/pp-scripts.js',array('jquery'), null, true);
}
add_action( 'wp_enqueue_scripts', 'pp_front_end_scripts' );


function pp_activate(){
    
    global $wpdb;
    
    $collate = '';
    if ( $wpdb->has_cap( 'collation' ) ) {
        $collate = $wpdb->get_charset_collate();
    }
    
    $t_quote = $wpdb->prefix . 'quote';
    $t_rooms = $wpdb->prefix . 'rooms';
    $t_users = $wpdb->prefix . 'users';
    
    if ( $wpdb->get_var("SHOW TABLES LIKE '" . $t_quote . "'") != $t_quote ){
        // TABLA CABECERA PEDIDO
        $sql_ppal = 'CREATE TABLE `' . $tablepedido . '` (
        `id` BIGINT(20) UNSIGNED AUTO_INCREMENT,
        `cookie_sesion` VARCHAR(255),
        `date` DATETIME,
        `checkin` VARCHAR(10),
        `checkout` VARCHAR(10),
        `pax` INT(4),        
        `promo` INT(4),
        PRIMARY KEY (id)
        ) '.$collate.'; ';
        // TABLA DETALLE CABINA
        $sql_ppal .= 'CREATE TABLE `' . $tablepedido_detalle_cabina . '` (
        `id` BIGINT(20) UNSIGNED AUTO_INCREMENT,
        `id_pedido` BIGINT(20),
        `cabina` VARCHAR(10),
        `acomodacion` VARCHAR(80),
        `tarifa` BIGINT(20),
        PRIMARY KEY (id)
        ) '.$collate.'; ';
        // TABLA DETALLE PASAJEROS
        $sql_ppal .= 'CREATE TABLE `' . $tablepedido_detalle_pasajero . '` (
        `id` BIGINT(20) UNSIGNED AUTO_INCREMENT,
        `id_pedido` BIGINT(20),
        `principal` BOOLEAN,
        `facturar` BOOLEAN,
        `titulo` VARCHAR(10),
        `nombre` VARCHAR(250),
        `apellido` VARCHAR(250),
        `genero` VARCHAR(20),
        `telefono` VARCHAR(25),
        `email` VARCHAR(250),
        `dia` INT(4),
        `mes` INT(4),
        `anio` INT(4),
        `pais` VARCHAR(2),
        `provincia` INT(255),
        `calle` text,
        `ciudad` text,
        `codigo_postal` text,
        `dieta` INT(4),
        `cond_medica` INT(4),
        PRIMARY KEY (id)
        ) '.$collate.'; ';
        // TABLA DETALLE EXTRAS
        
        var_dump($sql_ppal);
        
        require_once ABSPATH . 'wp-admin/includes/upgrade.php';
        
        dbDelta($sql_ppal);
            
    }
}
register_activation_hook( __FILE__ ,  'pp_activate');