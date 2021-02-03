<?php

class Request_Call_Popup_Element extends WP_Bakery_Petrosoft_Element {
    public static $name = 'Request a Call PopUp';
    public static $description = 'Pop-up with Request a Call Form';
    public static $template = 'template-parts/elements/request-a-call-popup';

    public static function map() {
        return array(
            'name'        => static::$name,
            'description' => static::$description,
            'base'        => 'vc_infobox',
            'category' => 'Petrosoft PopUps',
            'params' => array(
                array(
                    'type' => 'textfield',
                    'holder' => 'h3',
                    'class' => 'title-class',
                    'heading' => __( 'Id', 'text-domain' ),
                    'param_name' => 'id',
                    'value' => __( 'schedule-demo-popup-'.wp_rand(0,10000), 'text-domain' ),
                    'admin_label' => false,
                    'weight' => 0,
                    'group' => 'Listing',
                ),
                array(
                    'type' => 'textfield',
                    'holder' => 'div',
                    'heading' => __( 'LeadSource ID', 'text-domain' ),
                    'param_name' => 'leadsourceid',
                    'value' => __( '', 'text-domain' ),
                    'admin_label' => false,
                    'weight' => 0,
                    'group' => 'Listing',
                ),
            ),
        );
    }
}

new Request_Call_Popup_Element;