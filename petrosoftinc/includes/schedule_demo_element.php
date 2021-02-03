<?php

class Schedule_Demo_Element extends WP_Bakery_Petrosoft_Element {
  public static $name = 'Schedule a Demo';
  public static $description = 'Schedule a Demo';
  public static $fields = array(
    'schedule_demo'
  );
  public static $template = 'template-parts/elements/schedule-demo';
}

new Schedule_Demo_Element;
