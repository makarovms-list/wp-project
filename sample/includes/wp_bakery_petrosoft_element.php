<?php

/**
 * class for development custom WP backery elements
 */
abstract class WP_Bakery_Petrosoft_Element {
  
  public static $name = 'Petrosoft Element 1';
  public static $description = 'Petrosoft Element';
  public static $fields = array();
  public static $template = 'template-parts/elements/default-template';
  public static $shortcodeSuffix = '-shortcode';

  public function __construct() {
    // Registers the shortcode in WordPress
    add_shortcode( get_class($this).static::$shortcodeSuffix, array( get_class($this), 'output' ) );

    // Map shortcode to Visual Composer
    if ( function_exists( 'vc_lean_map' ) ) {
      vc_lean_map( get_class($this).static::$shortcodeSuffix, array( get_class($this), 'map' ) );
    }
  }
   
  public static function map() {
    return array(
      'name'        => static::$name,
      'description' => static::$description,
      'base'        => 'vc_infobox',
      'category' => 'Petrosoft',
      'params' => array(),
    );
  }    
    
  public static function output( $atts, $content = null ) {
    if (is_array($atts) && isset($content)) {
      $atts['content'] = $content;
    }
    return static::load_template(static::$template, $atts);
  }
  
  /**
   * load template with fields
   * @param string $template - template path
   * @param array $atts element attributes  
   * @return type
   */  
  public static function load_template($template, $atts) {
    
    $template_data = array('fields' => static::get_fields());
    if (is_array($atts) && count($atts) > 0) {
      $template_data['element_fields'] = $atts;
      static::parse_group_fields($template_data['element_fields']);
      static::get_nested_fields($template_data['element_fields']);
    }
    static::modify_template_data($template_data);
    ob_start();
    set_query_var('template_data', $template_data);
    get_template_part($template);
    $html = ob_get_contents();
    ob_end_clean();
    return $html;
  }
  
  /**
   * Get Fields data from post
   * @return array
   */
  public static function get_fields() {
    global $post;
    if (isset($post->ID)) {
      $id = $post->ID;
      $fields = array();
      foreach (static::$fields as $field) {
        $fields[$field] = get_field($field, $post->ID);
      }
      return $fields;
    } else {
      return array();
    }
  }
  /**
   * modify template data array
   * @param array $template_data
   */
  public static function modify_template_data(&$template_data) {
    
  }
  
  /**
   * parse param_group fields
   * @param array $fields
   */
  public static function parse_group_fields(&$fields) {
    $map = static::map();
    foreach ($map['params'] as $param) {
      if ($param['type'] == 'param_group') {
        $fields[$param['param_name']] = vc_param_group_parse_atts($fields[$param['param_name']]);
      }
    }
  }
  
  /**
   * Get shortcodes attributes
   * @param string $str
   * @param string $att
   * @return array
   */
  public static function attribute_map($str, $att = null) {
    $res = array();
    $reg = get_shortcode_regex();
    preg_match_all('~'.$reg.'~',$str, $matches);
    foreach($matches[2] as $key => $name) {
      $parsed = shortcode_parse_atts($matches[3][$key]);
      $parsed = is_array($parsed) ? $parsed : array();

      if(array_key_exists($name, $res)) {
        $arr = array();
        if(is_array($res[$name])) {
            $arr = $res[$name];
        } else {
            $arr[] = $res[$name];
        }

        $arr[] = array_key_exists($att, $parsed) ? $parsed[$att] : $parsed;
        $res[$name] = $arr;

      } else {
        $res[$name][] = array_key_exists($att, $parsed) ? $parsed[$att] : $parsed;
      }
    }

    return $res;
  }
  
  /**
   * Add nested elements fields if current element is container
   * @param array $fields
   */
  public static function get_nested_fields(&$fields) {
    $map = static::map();
    if (isset($map['is_container']) && $map['is_container'] == true) {
      $fields['nested'] = static::attribute_map($fields['content']);
    }
  }
  
}


