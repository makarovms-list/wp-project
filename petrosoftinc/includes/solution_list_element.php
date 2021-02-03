<?php

class Solution_List_Element extends WP_Bakery_Petrosoft_Element {
  public static $name = 'Solution List';
  public static $description = 'Solution List';
  public static $fields = array(
    'solution_header',
    'solution_list'
  );
  public static $template = 'template-parts/elements/solution-list';
}

new Solution_List_Element;
