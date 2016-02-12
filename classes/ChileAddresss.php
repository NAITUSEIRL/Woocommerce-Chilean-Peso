<?php

namespace CTala\Classes;

/**
 * Description of ChileAddresss
 *
 * @author ctala
 */
class ChileAddresss {

    function __construct() {
        
    }

    public static function order_fields($fields) {

        $order = array(
            "billing_first_name",
            "billing_last_name",
            "billing_company",
            "billing_address_1",
            "billing_address_2",
            "billing_country",
            "billing_state",
            "billing_city",
            "billing_email",
            "billing_phone",
            "billing_postcode",
        );
        foreach ($order as $field) {
            $ordered_fields[$field] = $fields["billing"][$field];
        }

        $fields["billing"] = $ordered_fields;
        return $fields;
    }

    function custom_woocommerce_states($states) {

        $states['CL'] = array(
            'I' => 'I de Tarapacá',
            'II' => 'II de Antofagasta',
            'III' => 'III de Atacama',
            'IV' => 'IV de Coquimbo',
            'V' => 'V de Valparaíso',
            'VI' => 'VI del Libertador General Bernardo O\'Higgins',
            'VII' => 'VII del Maule',
            'VIII' => 'VIII del Bío Bío',
            'IX' => 'IX de la Araucanía',
            'XIV' => 'XIV de los Ríos',
            'X' => 'X de los Lagos',
            'XI' => 'XI Aysén del General Carlos Ibáñez del Campo',
            'XII' => 'XII de Magallanes y Antártica Chilena',
            'RM' => 'Metropolitana de Santiago',
            'XV' => 'XV de Arica y Parinacota',
        );

        return $states;
    }

}
