<?php

class Achievements_Element extends WP_Bakery_Petrosoft_Element {
  public static $name = 'Achievements';
  public static $description = 'Achievements';
  public static $fields = array(
    'achievements_title',
    'achievements',
  );
  public static $template = 'template-parts/elements/achievements';
  
  /**
   * get custom styles to block
   * @return boolean|string
   */
  public static function get_custom_styles() {
    $template_data = array('fields' => static::get_fields());
    $custom_styles = '';
    if (isset($template_data['fields']['achievements']) && is_array($template_data['fields']['achievements'])) {
      foreach($template_data['fields']['achievements'] as $index => $achievement) {
        $custom_styles.=".achievements-list .achievement-wrapper .achievement-{$index}:hover {box-shadow: 0 4px 30px ". hex2rgba($achievement['color'],0.36)."} ";
      }
      return $custom_styles;
    } else {
      return false;
    }
  }
}

new Achievements_Element;

function petrosoft_achievements_element_styles() {
  $styles = Achievements_Element::get_custom_styles();
  if ($styles) {
    wp_add_inline_style('styles', $styles);
  }
}

add_action( 'wp_enqueue_scripts', 'petrosoft_achievements_element_styles' );
