<?php

namespace CTala\Classes;

use CTala\Helpers\Logger;
use CTala\Classes\OpenExchangeRateCT;
/**
 * En esta clase estarán todas las funciones asociadas al agregar el cambio de moneda
 * para woocommerce.
 *
 * @author ctala
 */
class ChileCurrencies {

    function __construct() {
        
    }

    function add_clp_currency_symbol($currency_symbol, $currency) {
        switch ($currency) {
            case 'CLP': $currency_symbol = '$';
                break;
        }
        return $currency_symbol;
    }

    // Se eliminan los datos postales como obligatorios.
    function postalcode_override_default_address_fields($address_fields) {
        $address_fields['postcode']['required'] = false;

        return $address_fields;
    }

    /*
     * Hace el cambio del valor a dolares a través de OpenExchange
     * Se necesita tener curl instalado para que esto funcione.
     */

    function convert_clp_to_usd($paypal_args) {
        //Grupo para el cache
        $ctala_group = "ctala";
        //Segundos en un día.
        $ctala_expire = 86400;

        $options = get_option('ctala_options_pesos');
        if ($paypal_args['currency_code'] == 'CLP') {

            // Si está activada la opción de usar el dolar fijo, se usa el valro del dolar del sistema
            if (isset($options["id_check_usarfijodolar"]) && $options["id_check_usarfijodolar"] == "on") {
                $valorDolar = $options["id_fijo_dolar"];
                error_log(print_r("Se usa el valor por defecto del dolar : $valorDolar", true));
            } else {

                $valorDolar = wp_cache_get('clp_usd_ctala', $ctala_group);

                if (false === $valorDolar) {
                    if (function_exists('curl_version') && isset($options["id_openkey"])) {
                        error_log(print_r("ENTRANDO AL A FUNCION", true));
                        $appId = $options["id_openkey"];
                        $openXChange = new OpenExchangeRateCT($appId);
                        $valorDolar = $openXChange->valorDolar();
                    } else {
                        $valorDolar = 690; // Este es el valor por defecto. 
                    }
                    wp_cache_set('clp_usd_ctala', $valorDolar, $ctala_group, $ctala_expire);
                }
            }
            $convert_rate = $valorDolar; //set the converting rate
            $paypal_args['currency_code'] = 'USD'; //change CLP to USD
            $i = 1;

            while (isset($paypal_args['amount_' . $i])) {
                $paypal_args['amount_' . $i] = round($paypal_args['amount_' . $i] / $convert_rate, 2);
                ++$i;
            }
            if (isset($paypal_args['discount_amount_cart']) && $paypal_args['discount_amount_cart'] > 0) {
                $paypal_args['discount_amount_cart'] = round($paypal_args['discount_amount_cart'] / $convert_rate, 2);
            }

            if (isset($paypal_args['tax_cart']) && $paypal_args['tax_cart'] > 0) {
                $paypal_args['tax_cart'] = round($paypal_args['tax_cart'] / $convert_rate, 2);
            }
        }
        return $paypal_args;
    }

    function add_clp_paypal_valid_currency($currencies) {
        array_push($currencies, 'CLP');
        return $currencies;
    }



    function add_clp_currency_ctala($currencies) {
//        Logger::log_me($currencies);
//        $currencies["CLP"] = 'Pesos Chilenos';
        return $currencies;
    }

}
