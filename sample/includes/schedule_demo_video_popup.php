<?php

class Schedule_Demo_Video_Popup_Element extends WP_Bakery_Petrosoft_Element {
    public static $name = 'Schedule a Demo PopUp';
    public static $description = 'Video pop-up with Schedule a Demo Form';
    public static $template = 'template-parts/elements/schedule-demo-video-popup';

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
                    'type'       => 'attach_video',
                    'holder' => 'div',
                    'heading' => __( 'Video', 'text-domain' ),
                    'param_name' => 'video',
                    'admin_label' => false,
                    'weight' => 0,
                    'group' => 'Listing',
                ),
                array(
                    'type' => 'textfield',
                    'holder' => 'div',
                    'heading' => __( 'Title', 'text-domain' ),
                    'param_name' => 'title',
                    'value' => __( '', 'text-domain' ),
                    'admin_label' => false,
                    'weight' => 0,
                    'group' => 'Listing',
                ),
                array(
                    'type' => 'textarea',
                    'holder' => 'div',
                    'class' => 'wpc-text-class',
                    'heading' => __( 'Description', 'text-domain' ),
                    'param_name' => 'description',
                    'value' => __( '', 'text-domain' ),
                    'group' => 'Listing',
                ),
                array(
                    'type' => 'textfield',
                    'holder' => 'div',
                    'heading' => __( 'Button label', 'text-domain' ),
                    'param_name' => 'button_label',
                    'value' => __( '', 'text-domain' ),
                    'admin_label' => false,
                    'weight' => 0,
                    'group' => 'Listing',
                ),
                array(
                    'type' => 'textfield',
                    'holder' => 'div',
                    'heading' => __( 'Link', 'text-domain' ),
                    'param_name' => 'link',
                    'value' => __( '', 'text-domain' ),
                    'admin_label' => false,
                    'weight' => 0,
                    'group' => 'Listing',
                ),
                array(
                    'type' => 'textfield',
                    'holder' => 'div',
                    'heading' => __( 'Product ID', 'text-domain' ),
                    'param_name' => 'productid',
                    'value' => __( '', 'text-domain' ),
                    'admin_label' => false,
                    'weight' => 0,
                    'group' => 'Form',
                ),
                array(
                    'type' => 'textfield',
                    'holder' => 'div',
                    'heading' => __( 'LeadSource ID', 'text-domain' ),
                    'param_name' => 'leadsourceid',
                    'value' => __( '', 'text-domain' ),
                    'admin_label' => false,
                    'weight' => 0,
                    'group' => 'Form',
                ),
            ),
        );
    }
}

new Schedule_Demo_Video_Popup_Element;