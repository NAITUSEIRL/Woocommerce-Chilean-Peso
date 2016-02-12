<?php

namespace CTala\WooCommerceChileanPeso;

/*
  Plugin Name: WooCommerce Chilean Peso + Chilean States
  Plugin URI: https://github.com/NAITUSEIRL/Woocommerce-Chilean-Peso
  Wiki URI: http://wiki.cristiantala.cl
  Description: This plugin enables the payment with paypal for Chile and the Chilean states to WooCommerce.
  Version: 3.2-DEV
  Author: Cristian Tala Sánchez <yomismo@cristiantala.cl>
  Author URI: http://www.cristiantala.cl
  License: GPLv3
  Requires at least: 3.0 +
  Tested up to: 4.4
 */
/*
 *      Copyright 2012 Cristian Tala Sánchez <yomismo@cristiantala.cl>
 *
 *      This program is free software; you can redistribute it and/or modify
 *      it under the terms of the GNU General Public License as published by
 *      the Free Software Foundation; either version 3 of the License, or
 *      (at your option) any later version.
 *
 *      This program is distributed in the hope that it will be useful,
 *      but WITHOUT ANY WARRANTY; without even the implied warranty of
 *      MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 *      GNU General Public License for more details.
 *
 *      You should have received a copy of the GNU General Public License
 *      along with this program; if not, write to the Free Software
 *      Foundation, Inc., 51 Franklin Street, Fifth Floor, Boston,
 *      MA 02110-1301, USA.
 */

include_once 'vendor/autoload.php';

use CTala\Classes\ChileSetup;
use CTala\Classes\ChileAddresss;
use CTala\Classes\ChileCurrencies;
use CTala\Helpers\Logger;



//include_once 'classes/MyChileanPesoSettingsPage.php';
//include_once 'classes/OpenExchangeRate.php';
//include_once 'helpers/rowMeta.php';


/*
 * Esta funcion limpia el cache luego de instalar la nueva versión del plugin.
 */

function ctala_install_cleancache() {

    wp_cache_delete("clp_usd_ctala", "ctala");
}

register_activation_hook(__FILE__, '\CTala\WooCommerceChileanPeso\ctala_install_cleancache');


if (class_exists('CTala\Classes\ChileSetup')) {
    $chileSetup = new ChileSetup();
    // Puedo acceder a la clase. La genero.
    register_activation_hook(__FILE__, array(&$chileSetup, 'crear_bdd_localidades_chile'));
    register_activation_hook(__FILE__, array(&$chileSetup, 'insertar_datos_localidades_chile'));
}
if (class_exists('CTala\Classes\ChileAddresss')) {
    $chileAddress = new ChileAddresss();
//    add_filter('woocommerce_general_settings', array(&$cn, 'add_order_number_start_setting'));
    add_filter("woocommerce_checkout_fields", array(&$chileAddress, "order_fields"));
    add_filter('woocommerce_states', array(&$chileAddress, 'custom_woocommerce_states'));
}
/*
 * Todos los filtros a continuación son los originales del plugin
 */
if (class_exists('CTala\Classes\ChileCurrencies')) {
    $chileCurrencies = new ChileCurrencies();

    //Se eliminan los códigos postales como obligatorios. (Filtro)
//    Logger::log_me("Eliminando el código postal obligatorio", __CLASS__);
    add_filter('woocommerce_default_address_fields', array(&$chileCurrencies, 'postalcode_override_default_address_fields'));

//    Logger::log_me("Agregando funcion de cambio de clp a usd", __CLASS__);
    add_filter('woocommerce_paypal_args', array(&$chileCurrencies, 'convert_clp_to_usd'));

//    Logger::log_me("Agregando el Peso Chileno", __CLASS__);
//    add_filter('woocommerce_currencies', array(&$chileCurrencies, 'add_clp_currency_ctala', 10, 1));

//    Logger::log_me("Agregando el Simbolo del peso Chileno", __CLASS__);
    add_filter('woocommerce_currency_symbol', array(&$chileCurrencies, 'add_clp_currency_symbol'), 10, 2);

//    Logger::log_me("Agrega el peso Chileno para que pueda ser pagado con paypal", __CLASS__);
    add_filter('woocommerce_paypal_supported_currencies', array(&$chileCurrencies, 'add_clp_paypal_valid_currency'));
}
;
?>
