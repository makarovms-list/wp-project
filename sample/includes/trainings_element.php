<?php

class Trainings_Element extends WP_Bakery_Petrosoft_Element {
  public static $name = 'Trainings';
  public static $description = 'Trainings';
  public static $fields = array(
    'trainings'
  );
  public static $template = 'template-parts/elements/trainings';
  public static function modify_template_data(&$template_data) {
    $month = date('n');
    $months = array(
      '1' => 'jan',
      '2' => 'feb',
      '3' => 'mar',
      '4' => 'apr',
      '5' => 'may',
      '6' => 'jun',
      '7' => 'jul',
      '8' => 'aug',
      '9' => 'sept',
      '10' => 'oct',
      '11' => 'nov',
      '12' => 'dec',
    );
    $year = date('Y');
    
    $template_data['schedule_link'] = "http://help.petrosoftinc.com/Content/Petrosoft_Training_Center/training_schedule_{$year}/training_schedule_{$months[$month]}_{$year}.htm";
  }
}

new Trainings_Element;
