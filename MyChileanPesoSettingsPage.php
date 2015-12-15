<?php

class MyChileanPesoSettingsPage {

    /**
     * Holds the values to be used in the fields callbacks
     */
    private $options;

    /**
     * Start up
     */
    public function __construct() {
        add_action('admin_menu', array($this, 'add_plugin_page'));
        add_action('admin_init', array($this, 'page_init'));
    }

    /**
     * Add options page
     */
    public function add_plugin_page() {
        // This page will be under "Settings"
        add_options_page(
                'Settings Admin', 'Chilean Pesos', 'manage_options', 'my-setting-admin', array($this, 'create_admin_page')
        );
    }

    /**
     * Options page callback
     */
    public function create_admin_page() {
        // Set class property
        $this->options = get_option('my_option_name');
        ?>
        <div class="wrap">
            <h2></h2>           
            <form method="post" action="options.php">
                <?php
                // This prints out all hidden setting fields
                settings_fields('my_option_group');
                do_settings_sections('my-setting-admin');
                submit_button();
                ?>
            </form>
        </div>
        <?php
    }

    /**
     * Register and add settings
     */
    public function page_init() {
        register_setting(
                'my_option_group', // Option group
                'my_option_name', // Option name
                array($this, 'sanitize') // Sanitize
        );

        add_settings_section(
                'setting_section_id', // ID
                'Valores Por Defecto', // Title
                array($this, 'print_section_info'), // Callback
                'my-setting-admin' // Page
        );
        add_settings_section(
                'setting_section_id_open_exchange', // ID
                'Open eXchange Rate', // Title
                array($this, 'print_section_info'), // Callback
                'my-setting-admin' // Page
        );

        add_settings_field(
                'id_check', // ID
                'Usar Valor Fijo Dolar', // Title 
                array($this, 'id_check_callback'), // Callback
                'my-setting-admin', // Page
                'setting_section_id' // Section           
        );
        add_settings_field(
                'id_fijo_dolar', // ID
                'Valor Fijo Dolar', // Title 
                array($this, 'id_fijo_dolar_callback'), // Callback
                'my-setting-admin', // Page
                'setting_section_id' // Section           
        );



        add_settings_field(
                'id_openkey', // ID
                'OpenXChange Key', // Title 
                array($this, 'apikey_callback'), // Callback
                'my-setting-admin', // Page
                'setting_section_id_open_exchange' // Section           
        );
    }

    /**
     * Sanitize each setting field as needed
     *
     * @param array $input Contains all settings fields as array keys
     */
    public function sanitize($input) {


        $new_input = array();
        if (isset($input['id_number']))
            $new_input['id_number'] = absint($input['id_number']);

        if (isset($input['id_fijo_dolar']))
            $new_input['id_fijo_dolar'] = absint($input['id_fijo_dolar']);


        if (isset($input['id_check']))
            $new_input['id_check'] = ($input['id_check']);

        if (isset($input['title']))
            $new_input['title'] = sanitize_text_field($input['title']);
        
        if (isset($input['id_openkey']))
            $new_input['id_openkey'] = sanitize_text_field($input['id_openkey']);

        return $new_input;
    }

    /**
     * Print the Section text
     */
    public function print_section_info() {
        print 'Ingresa los valores a continuacion:';
    }

    /**
     * Get the settings option array and print one of its values
     */
    public function id_number_callback() {
        printf(
                '<input type="text" id="id_number" name="my_option_name[id_number]" value="%s" />', isset($this->options['id_number']) ? esc_attr($this->options['id_number']) : ''
        );
    }

    /**
     * Get the settings option array and print one of its values
     */
    public function id_fijo_dolar_callback() {
        printf(
                '<input type="text" id="id_fijo_dolar" name="my_option_name[id_fijo_dolar]" value="%s" />', isset($this->options['id_fijo_dolar']) ? esc_attr($this->options['id_fijo_dolar']) : ''
        );
    }

    /**
     * Get the settings option array and print one of its values
     */
    public function id_check_callback() {
        printf(
                '<input type="checkbox" id="id_check" name="my_option_name[id_check]" %s />', isset($this->options['id_check']) ? "checked" : ''
        );
    }

    /**
     * Get the settings option array and print one of its values
     */
    public function title_callback() {
        printf(
                '<input type="text" id="title" name="my_option_name[title]" value="%s" />', isset($this->options['title']) ? esc_attr($this->options['title']) : ''
        );
    }

    /**
     * Get the settings option array and print one of its values
     */
    public function apikey_callback() {
        printf(
                '<input type="text" id="id_openkey" name="my_option_name[id_openkey]" value="%s" />', isset($this->options['id_openkey']) ? esc_attr($this->options['id_openkey']) : ''
        );
    }

}

if (is_admin())
    $my_settings_page = new MyChileanPesoSettingsPage();
?>