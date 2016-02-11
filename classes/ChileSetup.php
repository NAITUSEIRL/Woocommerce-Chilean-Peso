<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace CTala\Classes;

use CTala\Helpers\Logger;

class ChileSetup {

    private static $_tableName = "localidades_chile";

    function __construct() {
        
    }

    public static function crear_bdd_localidades_chile() {
        Logger::log_me("Ingresando a la Creacion de Localidades Chile", __CLASS__);
        global $wpdb;
        $table_name = $wpdb->prefix . self::$_tableName;
        $sql = "CREATE TABLE $table_name (
        id int (11) NOT NULL AUTO_INCREMENT,
		country_name varchar(255) NOT NULL,
		state_code varchar(255) NOT NULL,
		name_state varchar(255) NOT NULL,
		name_city varchar(255) NOT NULL,
        PRIMARY KEY  (id)
        );";

        require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );

        $resultado = dbDelta($sql);
        Logger::log_me($resultado, __CLASS__);
        Logger::log_me("Finalizando la creación de la tabla", __CLASS__);
    }

    public static function insertar_datos_localidades_chile() {
        
    }

}
