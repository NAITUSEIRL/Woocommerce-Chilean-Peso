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

//    function custom_woocommerce_states($states) {
//
//        $states['CL'] = array(
//            'I' => 'I de Tarapacá',
//            'II' => 'II de Antofagasta',
//            'III' => 'III de Atacama',
//            'IV' => 'IV de Coquimbo',
//            'V' => 'V de Valparaíso',
//            'VI' => 'VI del Libertador General Bernardo O\'Higgins',
//            'VII' => 'VII del Maule',
//            'VIII' => 'VIII del Bío Bío',
//            'IX' => 'IX de la Araucanía',
//            'XIV' => 'XIV de los Ríos',
//            'X' => 'X de los Lagos',
//            'XI' => 'XI Aysén del General Carlos Ibáñez del Campo',
//            'XII' => 'XII de Magallanes y Antártica Chilena',
//            'RM' => 'Metropolitana de Santiago',
//            'XV' => 'XV de Arica y Parinacota',
//        );
//
//        return $states;
//    }

    function custom_woocommerce_states($states) {

        global $wpdb;
        $query = 'SELECT * FROM ' . $wpdb->prefix . 'city GROUP BY `country_name`';

        $GetAllCounty = $wpdb->get_results($query);

        foreach ($GetAllCounty as $AllCounty) {

            $countryname = $AllCounty->country_name;

            $country = "SELECT * FROM " . $wpdb->prefix . "city where country_name = '" . $countryname . "'";

            $GetAllState = $wpdb->get_results($country);

            $array = array();

            foreach ($GetAllState as $datas) {

                $array[$datas->state_code] = $datas->name_state;
            }

            $states[$countryname] = $array;
        }


        return $states;
    }

    function add_order_number_start_setting($settings) {

        $updated_settings = array();
        global $wpdb;

        $query = 'SELECT name_city FROM ' . $wpdb->prefix . 'city';

        $GetAllCity = $wpdb->get_results($query);
        $optionarray = array();
        foreach ($GetAllCity as $data) {

            $optionarray[$data->name_city] = __($data->name_city, 'woocommerce');
        }

        foreach ($settings as $section) {

            // at the bottom of the General Options section
            if (isset($section['id']) && 'general_options' == $section['id'] &&
                    isset($section['type']) && 'sectionend' == $section['type']) {



                $updated_settings[] = array(
                    'name' => __('Commune', 'wc_seq_order_numbers'),
                    'desc_tip' => __(' ', 'wc_seq_order_numbers'),
                    'id' => 'woocommerce_order_number_start',
                    'type' => 'select',
                    'options' => $optionarray,
                    'css' => 'min-width:300px;',
                    'std' => '1', // WC < 2.0
                    'default' => '1', // WC >= 2.0
                    'desc' => __('', 'wc_seq_order_numbers'),
                );
            }



            $updated_settings[] = $section;
        }

        return $updated_settings;
    }

    function my_action_callback() {
        global $wpdb; // this is how you get access to the database

        $data = $_POST['data'];

        $state_name = '';

        list($country, $state_name) = explode(' — ', $data);

        if ($state_name != '') {
            $query = "SELECT name_city FROM " . $wpdb->prefix . "city where name_state like '%" . $state_name . "%'";

            $GetAllCity = $wpdb->get_results($query);
            $optionarray = '';
            foreach ($GetAllCity as $data) {

                $optionarray .= "<option value='" . $data->name_city . "'>" . $data->name_city . "</option>";
            }

            echo $optionarray;
        }

        wp_die(); // this is required to terminate immediately and return a proper response
    }

    function my_cities($cities) {
        global $wpdb;
        $query = 'SELECT * FROM ' . $wpdb->prefix . 'city GROUP BY `country_name`';

        $GetAllCounty = $wpdb->get_results($query);

        foreach ($GetAllCounty as $AllCounty) {

            $countryname = $AllCounty->country_name;

            $country = "SELECT * FROM " . $wpdb->prefix . "city where country_name = '" . $countryname . "'";

            $GetAllState = $wpdb->get_results($country);

            $array = array();

            foreach ($GetAllState as $datas) {

                $array[$datas->state_code][] = $datas->name_city;
            }

            $cities[$countryname] = $array;
        }
        return $cities;
    }

}
