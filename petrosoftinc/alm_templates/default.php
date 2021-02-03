<?php
if (isset($args['alm_template'])) {
 get_template_part( 'alm_templates/templates/template', $args['alm_template'] );
} else {
  $atts = $GLOBALS['ajax_load_more']::alm_return_shortcode_atts();
  if (isset($atts['custom_args'])) {
    $custom_args = $atts['custom_args'];
    $custom_args_array = explode(";",$custom_args); // Split the $custom_args at ','
    foreach($custom_args_array as $argument){ // Loop each $argument  
       $argument = preg_replace('/\s+/', '', $argument); // Remove all whitespace 	      				
       $argument = explode(":",$argument);  // Split the $argument at ':' 
       $argument_arr = explode(",", $argument[1]);  // explode $argument[1] at ','
       if(sizeof($argument_arr) > 1){
          $args[$argument[0]] = $argument_arr;
       }else{
          $args[$argument[0]] = $argument[1];      			   
       }
    }
    get_template_part( 'alm_templates/templates/template', $args['alm_template'] );
  }
}

