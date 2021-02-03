<?php

class Request_A_Call_Element extends WP_Bakery_Petrosoft_Element {
  public static $name = 'Request a call';
  public static $description = 'Request a call';
  public static $fields = array(
    'request_a_call'
  );
  public static $template = 'template-parts/elements/request-a-call';
}

new Request_A_Call_Element;
