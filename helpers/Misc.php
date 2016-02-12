<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace CTala\Helpers;

/**
 * Description of Misc
 *
 * @author ctala
 */
class Misc {

    function __construct() {
        
    }

    /**
     * MENU
     */
    function my_plugin_row_meta($plugin_meta, $plugin_file, $plugin_data, $status) {
        $pName = plugin_basename(__FILE__);
        if ($pName == $plugin_file) {
            $plugin_meta[] = '<a href="http://wiki.cristiantala.cl" target="_blank">Wiki</a>';
            $plugin_meta[] = '<a href="https://github.com/NAITUSEIRL/Woocommerce-Chilean-Peso" target="_blank">GitHub</a>';
        }

        return $plugin_meta;
    }

}
