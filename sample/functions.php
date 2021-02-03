<?php
add_theme_support('menus');
include_once dirname(__FILE__).'/includes/vc_shortcode.php';
include_once dirname(__FILE__).'/includes/walker_petrosoft_menu.php';
include_once dirname(__FILE__).'/includes/message_widget.php';
include_once dirname(__FILE__).'/includes/customizer.php';

add_action( 'wp_ajax_gettimeslot', 'gettimeslot_function' );
add_action( 'wp_ajax_nopriv_gettimeslot', 'gettimeslot_function' );
function gettimeslot_function(){
    $day = $_POST['day'];
    $month = $_POST['month'];
    $year = $_POST['year'];
    $url="https://hypnos-sandbox.azurewebsites.net/sales/calendar?day=".$day."&month=".$month."&year=".$year;
    $ch = curl_init();
    curl_setopt( $ch, CURLOPT_USERAGENT, "Mozilla/5.0 (Windows; U; Windows NT 5.1; rv:1.7.3) Gecko/20041001 Firefox/0.10.1" );
    curl_setopt( $ch, CURLOPT_URL, $url );
    $response = curl_exec( $ch );
    curl_close ( $ch );
    echo $response;
    die;
}

add_action( 'wp_ajax_addWebLeadSource', 'addWebLeadSource_function' );
add_action( 'wp_ajax_nopriv_addWebLeadSource', 'addWebLeadSource_function' );
function addWebLeadSource_function(){
    $first_name = $_POST['001'];
    $last_name = $_POST['002'];
    $phone = $_POST['501'];
    $email = $_POST['004'];
    $job_title = $_POST['006'];
    $company = $_POST['005'];
    $company_size = $_POST['011'];
    $business_type = $_POST['003'];
    $url = 'https://hermes-qa.azurewebsites.net/v1.0/crm/webleads';
    $ch = curl_init( $url );
    # Setup request to send json via POST.
    $data = json_encode( array( "firstname"=> $first_name, "lastname" => $last_name,"emailaddress" => $email,"telephone" => $phone, "address_country" => "US", "description" => "Schedule a demo form", "new_primaryleadsource" => "Leads Generation Forms", "new_secondaryleadtrigger" => "", "new_thirdlevel" =>"","subject" => "Schedule a demo", "company" => $company, "companysize" => $company_size) );
    /*$data = json_encode( array( "firstname"=> $first_name, "lastname" => $last_name,"emailaddress" => $email,"telephone" => $phone, "address_country" => "US", "description" => "Schedule a demo form", "new_primaryleadsource" => "Leads Generation Forms", "new_secondaryleadtrigger" => "Brochures and Flyers page", "new_thirdlevel" =>"Beer Distributor Flyer","subject" => "SmartPOS 800 Demo or Info", "company" => $company, "companysize" => $company_size) );*/
    curl_setopt( $ch, CURLOPT_POSTFIELDS, $data );
    $headers = array();
    $headers[] = "Content-Type: application/json";
    $headers[] = "Accept: application/json";
    $headers[] = "Authorization: Bearer eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJwcmltYXJ5c2lkIjoiMiIsInVuaXF1ZV9uYW1lIjoic3VwZXJ2aXNvciIsIm5iZiI6MTU4MjIwNjIxNiwiZXhwIjoxNTkyNTc0MjE2LCJpYXQiOjE1ODIyMDYyMTZ9.xtpa3XPCtGAtEcNNizgpF84sMcTrX4VDMI2-3p-xoYw";
    $headers[] = "Accept-Language: en";
    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
    # Return response instead of printing.
    curl_setopt( $ch, CURLOPT_RETURNTRANSFER, true );
    # Send request.
    $result = curl_exec($ch);
    curl_close($ch);
    # Print response.
    echo "$result";
    die;
}

add_action( 'wp_ajax_addAppoinment', 'addAppoinment_function' );
add_action( 'wp_ajax_nopriv_addAppoinment', 'addAppoinment_function' );
function addAppoinment_function(){
    $json = $_POST['json'];
    $url = 'https://hermes-qa.azurewebsites.net/v1.0/crm/appointment';
    $ch = curl_init( $url );
    # Setup request to send json via POST.
    curl_setopt( $ch, CURLOPT_POSTFIELDS, $json );
    $headers = array();
    $headers[] = "Content-Type: application/json";
    $headers[] = "Accept: application/json";
    $headers[] = "Authorization: Bearer eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJwcmltYXJ5c2lkIjoiMiIsInVuaXF1ZV9uYW1lIjoic3VwZXJ2aXNvciIsIm5iZiI6MTU4MjIwNjIxNiwiZXhwIjoxNTkyNTc0MjE2LCJpYXQiOjE1ODIyMDYyMTZ9.xtpa3XPCtGAtEcNNizgpF84sMcTrX4VDMI2-3p-xoYw";
    $headers[] = "Accept-Language: en";
    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
    # Return response instead of printing.
    curl_setopt( $ch, CURLOPT_RETURNTRANSFER, true );
    # Send request.
    $result = curl_exec($ch);
    curl_close($ch);
    # Print response.
    echo "$result";
    die;
}

/*
add_filter('category_link', function($a){
	return str_replace( 'category/', '', $a );
}, 99 );
*/
add_action( 'after_theme_setup', 'my_theme_setup' );
function my_theme_setup () {
  register_nav_menus( array(
	  'top-menu' => __( 'Top menu', 'cso' ),
	  'footer-menu'  => __( 'Footer menu', 'cso' ),
  	) 
  );
}

function js_variables(){
    $variables = array (
        'ajax_url' => admin_url('admin-ajax.php'),
		'is_mobile' => wp_is_mobile()
        // Тут обычно какие-то другие переменные
    );
    echo(
        '<script type="text/javascript">window.wp_data = '.json_encode($variables).';</script>'
    );
}
add_action('wp_head','js_variables');


function petrosoftinc_scripts() {
  wp_enqueue_style( 'styles', get_template_directory_uri() . '/css/styles.min.css');
  if (!wp_is_mobile()) {
    wp_enqueue_script('aos', get_template_directory_uri() . '/js/aos.js', array(), '1.0');
    wp_enqueue_style('aos_styles', get_template_directory_uri() . '/css/aos.css');
  }
  wp_deregister_script( 'jquery-core' );
  wp_register_script( 'jquery-core', get_template_directory_uri() . '/js/jquery.js', array(), '3.4.1' );
  wp_deregister_script( 'jquery-migrate' );
  wp_enqueue_script( 'jquery-migrate', get_template_directory_uri() . "/js/jquery.migrate.js", array(), '3.3.2' );
  wp_enqueue_script( 'selectric', get_template_directory_uri() . '/js/jquery.selectric.js', array ( 'jquery' ), '1.0', true);
  wp_enqueue_script( 'slick', get_template_directory_uri() . '/js/slick.js', array ( 'jquery' ), '1.0', true);
  wp_enqueue_script( 'bsplugins', get_template_directory_uri() . '/js/bsplugins.js', array ( 'jquery' ), '1.0', true);
  wp_enqueue_script( 'jquery-validate', get_template_directory_uri() . '/js/jquery.validate.js', array('jquery'), '1.0' ,true);
  wp_enqueue_script( 'modal', get_template_directory_uri() . '/js/jquery.modal.min.js', array ( 'jquery' ), '1.0', true);
  wp_enqueue_script( 'cookie', get_template_directory_uri() . '/js/jquery.cookie.js', array ( 'jquery' ), '1.0', true);
  wp_enqueue_script( 'main', get_template_directory_uri() . '/js/main.js', array ( 'jquery' ), '1.0', true);
  wp_enqueue_script( 'ie', get_template_directory_uri() . '/js/ie.js', array ( 'jquery' ), '1.0', true);
  wp_enqueue_script( 'addition-methods', get_template_directory_uri() . '/js/additional-methods.min.js', array ( 'jquery' ), '1.0', true);
}
add_action( 'wp_enqueue_scripts', 'petrosoftinc_scripts' );

function petrosoft_admin_styles() {
  wp_enqueue_style('admin-styles', get_template_directory_uri().'/admin_css/p-wp-admin.css');
}
add_action('admin_enqueue_scripts', 'petrosoft_admin_styles');

add_filter( 'excerpt_length', function(){
	return 20;
} );

add_filter('excerpt_more', function($more) {
	return '...';
});

/**
 * Calculate reading time
 * @return string
 */
function petrosoftinc_reading_time($post_id) {
  $content = get_post_field( 'post_content', $post_id );
  $word_count = str_word_count( strip_tags( $content ) );
  $readingtime = floor($word_count / 200);
  if ($readingtime == 1) {
    $timer = " minute";
  } else {
    $timer = " minutes";
  }
  $totalreadingtime = $readingtime . $timer;
  if (($word_count / 200) - (int)$totalreadingtime > 0.5) {
    $totalreadingtime.= ' 30 seconds';
  }
  return $totalreadingtime;
}

function petrosoftinc_subcategory_hierarchy() { 
    $category = get_queried_object();

    $parent_id = $category->category_parent;

    $templates = array();

    if ( $parent_id == 0 ) {
        // Use default values from get_category_template()
        $templates[] = "category-{$category->slug}.php";
        $templates[] = "category-{$category->term_id}.php";
        $templates[] = 'category.php';     
    } else {
        // Create replacement $templates array
        $parent = get_category( $parent_id );

        // Current first
        $templates[] = "category-{$category->slug}.php";
        $templates[] = "category-{$category->term_id}.php";

        // Parent second
        $templates[] = "category-{$parent->slug}.php";
        $templates[] = "category-{$parent->term_id}.php";
        $templates[] = 'category.php'; 
    }
    return locate_template( $templates );
}

add_filter( 'category_template', 'petrosoftinc_subcategory_hierarchy' );

function petrosoftinc_get_post_view() {
    $count = get_post_meta( get_the_ID(), 'post_views_count', true );
    return "$count views";
}
function petrosoftinc_set_post_view() {
    $key = 'post_views_count';
    $post_id = get_the_ID();
    $count = (int) get_post_meta( $post_id, $key, true );
    $count++;
    update_post_meta( $post_id, $key, $count );
}
function petrosoftinc_posts_column_views( $columns ) {
    $columns['post_views'] = 'Views';
    return $columns;
}
function petrosoftinc_posts_custom_column_views( $column ) {
    if ( $column === 'post_views') {
        echo petrosoftinc_get_post_view();
    }
}
add_filter( 'manage_posts_columns', 'petrosoftinc_posts_column_views' );
add_action( 'manage_posts_custom_column', 'petrosoftinc_posts_custom_column_views' );

add_action( 'vc_before_init', 'petrosoftinc_wp_bakery_elements' );

function petrosoftinc_wp_bakery_elements() {
  include( get_template_directory() . '/includes/wp_bakery_petrosoft_element.php');
  include( get_template_directory() . '/includes/test_element.php');
  include( get_template_directory() . '/includes/test_single_element.php');
  include( get_template_directory() . '/includes/main_page_banner_element.php');
  include( get_template_directory() . '/includes/solution_list_element.php');
  include( get_template_directory() . '/includes/achievements_element.php');
  include( get_template_directory() . '/includes/clients_slider_element.php');
  include( get_template_directory() . '/includes/configure_solution_element.php');
  include( get_template_directory() . '/includes/schedule_demo_element.php');
  include( get_template_directory() . '/includes/blog_element.php');
  include( get_template_directory() . '/includes/history_element.php');
  include( get_template_directory() . '/includes/our_mission_element.php');
  include( get_template_directory() . '/includes/our_values_element.php');
  include( get_template_directory() . '/includes/our_team_element.php');
  include( get_template_directory() . '/includes/map_element.php');
  include( get_template_directory() . '/includes/petrosoft_popup_element.php');
  include( get_template_directory() . '/includes/product_features_element.php');
  include( get_template_directory() . '/includes/product_description_element.php');
  include( get_template_directory() . '/includes/additional_resources_element.php');
  include( get_template_directory() . '/includes/description_blocks_element.php');
  include( get_template_directory() . '/includes/benefits_element.php');
  include( get_template_directory() . '/includes/social_networks_element.php');
  include( get_template_directory() . '/includes/hr_managers_element.php');
  include( get_template_directory() . '/includes/hear_from_our_employees_element.php');
  include( get_template_directory() . '/includes/related_products_element.php');
  include( get_template_directory() . '/includes/benefits_with_no_tabs_element.php');
  include( get_template_directory() . '/includes/product_features_v2_element.php');
  include( get_template_directory() . '/includes/custom_popup_element.php');
  include( get_template_directory() . '/includes/integrations_element.php');
  include( get_template_directory() . '/includes/presenting_the_new_element.php');
  include( get_template_directory() . '/includes/video_popup_element.php');
  include( get_template_directory() . '/includes/extended_video_popup_element.php');
  include( get_template_directory() . '/includes/watch_video_element.php');
  include( get_template_directory() . '/includes/schedule_demo_video_popup.php');
  include( get_template_directory() . '/includes/mobile_app_element.php');
  include( get_template_directory() . '/includes/header_row_element.php');
  include( get_template_directory() . '/includes/banner_element.php');
  include( get_template_directory() . '/includes/need_help_element.php');
  include( get_template_directory() . '/includes/form_block_element.php');
  include( get_template_directory() . '/includes/contact_person_element.php');
  include( get_template_directory() . '/includes/how_it_works_element.php');
  include( get_template_directory() . '/includes/request_a_call_element.php');
  include( get_template_directory() . '/includes/trainings_element.php');
  include( get_template_directory() . '/includes/our_trainers_element.php');
  include( get_template_directory() . '/includes/who_we_are_element.php');
  include( get_template_directory() . '/includes/our_solutions_element.php');
  include( get_template_directory() . '/includes/products_element.php');
  include( get_template_directory() . '/includes/news_element.php');
  include( get_template_directory() . '/includes/extended_blog_element.php');
  include( get_template_directory() . '/includes/request_a_call_popup.php');
  include( get_template_directory() . '/includes/popup_group_element.php');
  include( get_template_directory() . '/includes/enterprises_benefits_element.php');
  include( get_template_directory() . '/includes/capabilities_element.php');
  include( get_template_directory() . '/includes/partners_element.php');
  include( get_template_directory() . '/includes/how_it_works_2_element.php');
  include( get_template_directory() . '/includes/pages_catalog_element.php');
  include( get_template_directory() . '/includes/partners_catalog_element.php');
  include( get_template_directory() . '/includes/resources_slider_element.php');
  include( get_template_directory() . '/includes/services_plate_element.php');
  include( get_template_directory() . '/includes/products_grid_element.php');
  include( get_template_directory() . '/includes/clients_say_element.php');
  include( get_template_directory() . '/includes/petrosoft_h2_element.php');
  include( get_template_directory() . '/includes/download_now_element.php');
  include( get_template_directory() . '/includes/learn_more_link_element.php');
  include( get_template_directory() . '/includes/background_image_banner_element.php');
  include( get_template_directory() . '/includes/resource_banner_element.php');
  include( get_template_directory() . '/includes/video_block_element.php');
  include( get_template_directory() . '/includes/comment_banner_1_element.php');
  include( get_template_directory() . '/includes/comment_banner_2_element.php');
  include( get_template_directory() . '/includes/side_callout_type_1_element.php');
  include( get_template_directory() . '/includes/request_demo_element.php');
  include( get_template_directory() . '/includes/side_callout_mobile_app_element.php');
  include( get_template_directory() . '/includes/video_element.php');
  include( get_template_directory() . '/includes/review_element.php');
  include( get_template_directory() . '/includes/resource_block_vertical_element.php');
  include( get_template_directory() . '/includes/resource_block_horizontal_element.php');
  include( get_template_directory() . '/includes/features_links_element.php');
  include( get_template_directory() . '/includes/features_element.php');
  include( get_template_directory() . '/includes/feature_element.php');
}

 
/* Convert hexdec color string to rgb(a) string */
 function hex2rgba($color, $opacity = false) {
 
	$default = 'rgb(0,0,0)';
 
	//Return default if no color provided
	if(empty($color)) {
    return $default; 
  }
	//Sanitize $color if "#" is provided 
  if ($color[0] == '#' ) {
    $color = substr( $color, 1 );
  }

  //Check if color has 6 or 3 characters and get values
  if (strlen($color) == 6) {
          $hex = array( $color[0] . $color[1], $color[2] . $color[3], $color[4] . $color[5] );
  } elseif ( strlen( $color ) == 3 ) {
          $hex = array( $color[0] . $color[0], $color[1] . $color[1], $color[2] . $color[2] );
  } else {
          return $default;
  }

  //Convert hexadec to rgb
  $rgb =  array_map('hexdec', $hex);

  //Check if opacity is set(rgba or rgb)
  if($opacity){
    if(abs($opacity) > 1)
      $opacity = 1.0;
    $output = 'rgba('.implode(",",$rgb).','.$opacity.')';
  } else {
    $output = 'rgb('.implode(",",$rgb).')';
  }

  //Return rgb(a) color string
  return $output;
}

// Takes a flat list of wordpress menu items and returns the top level items
// with children sorted into the 'children' element.
function nav_sort_menu_items($items) {
  return _nav_get_children($items, 0, 0);
}

// This is the inner recursive function - do not use directly
function _nav_get_children($items, $parentId, $depth) {
  $children = array();
  foreach($items as $id => $child)
  {
    if($child->menu_item_parent == $parentId)
    {
      $child->depth = $depth;
      $child->children = _nav_get_children($items, $child->ID, $depth + 1);
      
      if (is_array($child->children) && count($child->children) > 0) {
        foreach ($child->children as $current_item_child) {
          if (in_array('active',$current_item_child->classes) && !in_array('active',$child->classes)) {
            $child->classes[] = 'active';
            $child->classes[] = 'opened';
          }
        }
      }
      if (class_exists('Menu_Icons_Meta')) {
        $child->icon = Menu_Icons_Meta::get($child->ID);
      }
      if (( $_SERVER['REQUEST_URI'] == parse_url( $child->url, PHP_URL_PATH ) )) {
        $child->classes[] = 'active';
      }
      $children[] = $child;
    }
  }
  return $children;
}

// Convenience wrapper to get a wordpress menu by name and sort it.
function wp_get_nav_sorted_menu_items($name) {
  return nav_sort_menu_items(wp_get_nav_menu_items($name));
}

// Get all years posts publish;
function petrosoft_get_posts_years_array($post_type = 'post') {
  global $wpdb;
  $result = array();
  $years = $wpdb->get_results(
    $wpdb->prepare(
      "SELECT YEAR(post_date) FROM {$wpdb->posts} WHERE post_status = 'publish' AND wp_posts.post_type = '%s' GROUP BY YEAR(post_date) DESC",$post_type
    ),ARRAY_N
  );
  if ( is_array( $years ) && count( $years ) > 0 ) {
    foreach ( $years as $year ) {
      $result[] = $year[0];
    }
  }
  return $result;
}

// star shortcode  for achievements block
function star_shortcode() {  
  return '<svg class="i-svg icon-star"><use xlink:href="#icon-star"></use></svg>';
}
add_shortcode( 'star', 'star_shortcode' );


function petrosoft_menu_icons_override_markup( $markup, $id, $meta, $title ) {
  if ($meta['type'] == 'svg') {
    $alt = get_post_meta($meta['icon'], '_wp_attachment_image_alt', TRUE);
    return "<img class='svg' alt='{$alt}' src={$meta['url']}><span>{$title}</span>";
  }
	return $markup;
}
add_filter( 'menu_icons_item_title', 'petrosoft_menu_icons_override_markup', 10, 4 );

add_filter('acf/location/rule_types', 'petrosoft_acf_location_rules_types');

function petrosoft_acf_location_rules_types( $choices ) {
  $choices['Category']['category'] = 'Category';
  $choices['Category']['child_categories'] = 'Child categories';
  $choices['Category']['products_footer'] = 'Product footer';
  $choices['Category']['products_category'] = 'Product category';

  return $choices;
}

add_filter('acf/location/rule_values/category', 'petrosoft_acf_location_rule_values_category');
add_filter('acf/location/rule_values/child_categories', 'petrosoft_acf_location_rule_values_category');
add_filter('acf/location/rule_values/products_footer', 'petrosoft_acf_location_rule_values_products_footer');
add_filter('acf/location/rule_values/products_category', 'petrosoft_acf_location_rule_values_products_category');

function petrosoft_acf_location_rule_values_category($choices) {
  $categories = get_categories(array('hide_empty' => false));
  if ($categories) {
    foreach( $categories as $category ) {
      $choices[$category->cat_ID] = $category->name; 
    }
  }
  return $choices;
}
function petrosoft_acf_location_rule_values_products_footer($choices) {
  $categories = get_terms('products_footer', array('hide_empty' => false) );
  if ($categories) {
    foreach( $categories as $category ) {
      $choices[$category->term_id] = $category->name; 
    }
  }
  return $choices;
}

function petrosoft_acf_location_rule_values_products_category($choices) {
  $categories = get_terms('products_category', array('hide_empty' => false) );
  if ($categories) {
    foreach( $categories as $category ) {
      $choices[$category->term_id] = $category->name; 
    }
  }
  return $choices;
}

add_filter('acf/location/rule_match/category', 'petrosoft_acf_location_rule_match_category', 10, 4);
function petrosoft_acf_location_rule_match_category( $match, $rule, $options, $field_group ) {
  $match = false;
  if($rule['operator'] == "==")
  {
    if (isset($_GET['taxonomy']) && $_GET['taxonomy'] == 'category' && isset($_GET['tag_ID']) && $_GET['tag_ID'] == $rule['value']) {
      $match = true;
    }
  }
  elseif($rule['operator'] == "!=")
  {
    if (isset($_GET['taxonomy']) && $_GET['taxonomy'] == 'category' && isset($_GET['tag_ID']) && $_GET['tag_ID'] != $rule['value']) {
      $match = true;
    }
  }
  return $match;
}

add_filter('acf/location/rule_match/child_categories', 'petrosoft_acf_location_rule_match_child_categories', 10, 4);
function petrosoft_acf_location_rule_match_child_categories( $match, $rule, $options, $field_group ) {
  $match = false;
  if (isset($_GET['taxonomy']) && $_GET['taxonomy'] == 'category' && isset($_GET['tag_ID'])) {
    $category = get_category ($_GET['tag_ID']);
    if ($rule['operator'] == "==")
    {
      if ($category->parent == $rule['value']) {
        $match = true;
      }
    }
    elseif ($rule['operator'] == "!=")
    {
      if ($category->parent != $rule['value']) {
        $match = true;
      }
    }
  }
  return $match;
}

add_filter('acf/location/rule_match/products_footer', 'petrosoft_acf_location_rule_match_products_footer', 10, 4);
function petrosoft_acf_location_rule_match_products_footer($match, $rule, $options, $field_group ) {
  $match = false;
  if ($rule['operator'] == "==")
  {
    if (isset($_GET['taxonomy']) && $_GET['taxonomy'] == 'products_footer' && isset($_GET['tag_ID']) && $_GET['tag_ID'] == $rule['value']) {
      $match = true;
    }
  }
  elseif($rule['operator'] == "!=")
  {
    if (isset($_GET['taxonomy']) && $_GET['taxonomy'] == 'products_footer' && isset($_GET['tag_ID']) && $_GET['tag_ID'] != $rule['value']) {
      $match = true;
    }
  }
  return $match;
}

add_filter('acf/location/rule_match/products_category', 'petrosoft_acf_location_rule_match_products_category', 10, 4);
function petrosoft_acf_location_rule_match_products_category($match, $rule, $options, $field_group ) {
  $match = false;
  if ($rule['operator'] == "==")
  {
    if (isset($_GET['taxonomy']) && $_GET['taxonomy'] == 'products_category' && isset($_GET['tag_ID']) && $_GET['tag_ID'] == $rule['value']) {
      $match = true;
    }
  }
  elseif($rule['operator'] == "!=")
  {
    if (isset($_GET['taxonomy']) && $_GET['taxonomy'] == 'products_category' && isset($_GET['tag_ID']) && $_GET['tag_ID'] != $rule['value']) {
      $match = true;
    }
  }
  return $match;
}

add_filter('onesignal_meta_box_send_notification_checkbox_state', 'petrosoft_onesignal_filter', 10, 2);

function petrosoft_onesignal_filter($post, $onesignal_wp_settings) {
  return true;
}

// Surveysparrow PopUp
function surveysparrow_popup_shortcode($atts) {  
  $surveysparrow = do_shortcode("[surveysparrow token='{$atts['token']}' account='{$atts['account']}' survey='{$atts['survey']}' version='{$atts['version']}']");
  return "<div id='{$atts['id']}' class='modal'>{$surveysparrow}</div>";
}
add_shortcode( 'surveysparrow_popup', 'surveysparrow_popup_shortcode' );


// Attach video field for wpbakery elements
function attach_video_settings_field($settings, $value) {
  $output = '';
  $select_file_class = '';
  $remove_file_class = ' hidden';
  if ($value && $value != '') {
    $select_file_class = ' hidden';
    $remove_file_class = '';
  } 
  $output .= '<div class="attach_video_block"> <div class="' . esc_attr($settings['type']) . '_display">' . $value . '</div><input type="hidden" name="' . esc_attr($settings['param_name']) . '" class="wpb_vc_param_value wpb-textinput ' . esc_attr($settings['param_name']) . ' ' . esc_attr($settings['type']) . '_field" value="' . esc_attr($value) . '" /><button class="button attach-video-button' . $select_file_class . '">select video</button><button class="button remove-video-button' . $remove_file_class . '">remove video</button></div>';
  return $output;
}

vc_add_shortcode_param('attach_video', 'attach_video_settings_field', get_template_directory_uri() . '/js/attach_video_field.js');

// Config MetaBox fixed order
if(class_exists('\GlobalMetaBoxOrder\Config')) {
  \GlobalMetaBoxOrder\Config::$getBlueprintUserId = function () { return 2; };
  // No screen options 
  \GlobalMetaBoxOrder\Config::$remove_screen_options = true;
  // Meta boxes can't be moved anymore 
  \GlobalMetaBoxOrder\Config::$lock_meta_box_order = true; 
}

add_filter( 'get_user_option_meta-box-order_page', 'petrosoft_metabox_order' );
function petrosoft_metabox_order($order) {
  if (isset($_GET['post']) && isset($_GET['action']) && $_GET['action'] == 'edit' &&  get_post_type($_GET['post']) == 'page') {
    $new_order['side'] = $order['side'];
    $new_order['acf_after_title'] = $order['acf_after_title'];
    $normal = explode(',', $order['normal']);
    $new_order['advanced'] = $order['advanced'];
    if (isset($order['acf_after_title']) && $order['acf_after_title'] != "") {
      $acf_after_title = explode(',', $order['acf_after_title']);
    } else {
      $acf_after_title = array();
    }
    if (array_search('wpb_visual_composer',$normal) !== false) {
      $index = array_search('wpb_visual_composer',$normal);
      unset($normal[$index]);
      array_push($normal,'wpb_visual_composer');
    }
    if (array_search('wpseo_meta',$normal) !== false) {
      $index = array_search('wpseo_meta',$normal);
      unset($normal[$index]);
      array_push($normal,'wpseo_meta');
    }
    if (array_search('revisionsdiv',$normal) !== false) {
      $index = array_search('revisionsdiv',$normal);
      unset($normal[$index]);
      array_push($normal,'revisionsdiv');
    }
    if (array_search('acf-group_5e1d66b881903',$normal) !== false) {
      $index = array_search('acf-group_5e1d66b881903',$normal);
      unset($normal[$index]);
      array_push($acf_after_title,'acf-group_5e1d66b881903');
    }
    $new_order['normal'] = implode(",", $normal);
    $new_order['acf_after_title'] = implode(",", $acf_after_title);
    return $new_order;
  } else {
    return $order;
  }
}

function peetrosoft_acf_admin_head() {
  if (isset($_GET['post']) && isset($_GET['action']) && $_GET['action'] == 'edit') {
    $post_type = get_post_type($_GET['post']);
  } else {
    return true;
  }
  ?>
  <?php if($post_type == 'page'): ?>
    <script type="text/javascript">
      (function($){
          $(document).ready(function(){
              $('.layout').addClass('-collapsed');
              $('.acf-postbox').addClass('closed');
          });
      })(jQuery);
    </script>
    <?php endif; ?>
  <?php
}

add_action('acf/input/admin_head', 'peetrosoft_acf_admin_head');

add_action('acf/save_post', 'action_petrosoft_content_update', 10, 1);


function action_petrosoft_content_update($post_id) {
  $post = get_post($post_id);
  if (isset($post) && $post->post_type === 'job') {
    petrosoft_generate_indeed_xml();
    $job_status = get_post_meta($post_id,'job_status',true);
    if ($job_status != 'processed') {
      petrosoft_job_mailing($post);
      update_post_meta($post_id, 'job_status', 'processed');
    }
  }
}

// Sending news to sybsribers
//add_action( 'save_post', 'action_petrosoft_save_post' );
//function action_petrosoft_save_post( $post_id ){
//	if ( ! wp_is_post_revision( $post_id ) ){
//		remove_action('save_post', 'action_petrosoft_save_post');
//    $post = get_post($post_id);
//    
//    if (isset($post) && $post->post_type === 'news') {
//      $status = get_post_meta($post_id,'news_sending',true);
//      if ($status != 'sended') {
//        petrosoft_news_mailing($post);
//        update_post_meta($post_id, 'news_sending', 'sended');
//      }
//    }
//		add_action('save_post', 'action_petrosoft_save_post');
//	}
//}
/**
 * Send job mails
 * @param WP_Post $post
 */
function petrosoft_job_mailing($post) {

  $form = get_posts( array(
    'post_type'   => 'wpcf7_contact_form',
    "name" => 'job-subscribe',
  ));    
  
  $submissions = get_posts( array(
    'meta_key'    => 'form_id',
    'meta_value'  => $form[0]->ID,
    'post_type'   => 'wpcf7s', 
    'numberposts' => -1,
  ));

  $subject = 'Petrosoft Job Alert / '.$post->post_title;

  $body = 'The email body content';
  $headers = array('From: Petrosoft Talent Acquisition <'.get_option('admin_email').'>','Content-Type: text/html; charset=UTF-8');
  $job_category = wp_get_post_terms($post->ID, 'job_category');
  $jobs_location = wp_get_post_terms($post->ID, 'jobs');
  foreach ($submissions as $submission) {
    $meta = get_post_meta($submission->ID);
    if ($job_category[0]->name == $meta['wpcf7s_posted-job-category'][0] && $jobs_location[0]->name == $meta['wpcf7s_posted-location'][0]) {
      $to = get_post_field('wpcf7s_posted-subscriber-email', $submission);
      $body = petrosoft_get_mail_template(array(
       'template' => 'template-parts/emails/job-subscribe-mail',
       'post' => get_post($post->ID),
       'unsubscribe_link' => get_site_url().'/unsubscribe-jobs/'.petrosoft_crypt($submission->ID,'e'),
     ));
     wp_mail( $to, $subject, $body, $headers );
    }
  }
}

/**
 * Send news mails
 * @param WP_Post $post
 */
function petrosoft_news_mailing($post) {

  $form = get_posts( array(
    'post_type'   => 'wpcf7_contact_form',
    "name" => 'footer-subscribe',
  ));    
  
  $submissions = get_posts( array(
    'meta_key'    => 'form_id',
    'meta_value'  => $form[0]->ID,
    'post_type'   => 'wpcf7s', 
    'numberposts' => -1,
  ));

  $subject = 'Petrosoft News / '.$post->post_title;

  $body = 'The email body content';
  $headers = array('From: Petrosoft <'.get_option('admin_email').'>','Content-Type: text/html; charset=UTF-8');
  foreach ($submissions as $submission) {
    $meta = get_post_meta($submission->ID);
    $to = get_post_field('wpcf7s_posted-email', $submission);
    $body = petrosoft_get_mail_template(array(
      'template' => 'template-parts/emails/news-subscribe-mail',
      'post' => get_post($post->ID),
      'unsubscribe_link' => get_site_url().'/unsubscribe-news/'.petrosoft_crypt($submission->ID,'e'),
    ));
    wp_mail( $to, $subject, $body, $headers );
  }
}

function cf7_petrosoft_job_location_select() {

  $locations = get_terms( 'jobs', array(
    'hide_empty' => false,
    'orderby'    => 'ID', 
    'order'      => 'ASC',
  ));

  $choices = array();
  foreach ($locations as $location) {
    $choices[$location->name] = $location->name;
  }
  $default_location = $locations[0];
  $choices['default'] = array($default_location->name);
	return $choices;
} 
add_filter('cf7_petrosoft_job_location_select', 'cf7_petrosoft_job_location_select', 10, 0);

function cf7_petrosoft_job_category_select() {
  $job_categories = get_terms( 'job_category', array(
    'hide_empty' => false,
    'orderby'    => 'ID', 
    'order'      => 'DESC',
  ));

  $choices = array();
  foreach ($job_categories as $category) {
    $choices[$category->name] = $category->name;
  }
  $default_category = $job_categories[0];
  $choices['default'] = array($default_category->name);
	return $choices;
} 
add_filter('cf7_petrosoft_job_category_select', 'cf7_petrosoft_job_category_select', 10, 0);

add_filter( 'generate_rewrite_rules', function ( $wp_rewrite ){
  $wp_rewrite->rules = array_merge(
    ['unsubscribe-jobs/(.+)/?$' => 'index.php?unsubscribe_job_id=$matches[1]'],
    ['unsubscribe-news/(.+)/?$' => 'index.php?unsubscribe_news_id=$matches[1]'],
    ['site-map' => 'index.php?is_sitemap=true'],
    $wp_rewrite->rules
  );
});

add_filter( 'query_vars', function( $query_vars ){
    $query_vars[] = 'unsubscribe_job_id';
    $query_vars[] = 'unsubscribe_news_id';
    $query_vars[] = 'is_sitemap';
    return $query_vars;
} );
add_action( 'template_redirect', function(){
  $unsubscribe_job_id = get_query_var( 'unsubscribe_job_id');
  if ( $unsubscribe_job_id ) {
    include 'template-parts/jobs/jobs-unsubscribe.php';
    die;
  }
  $unsubscribe_news_id = get_query_var( 'unsubscribe_news_id');
  if ( $unsubscribe_news_id ) {
    include 'template-parts/news/news-unsubscribe.php';
    die;
  }
  $is_sitemap = get_query_var('is_sitemap');
  if (isset($is_sitemap) && $is_sitemap == true) {
    include 'template-parts/custom-pages/sitemap.php';
    die;
  }
});
/**
 * Generate mail body from template 
 * @param array $email_data
 * @return string
 */
 function petrosoft_get_mail_template($email_data) {
  ob_start();
  set_query_var('email_data', $email_data);
  get_template_part('template-parts/emails/petrosoft-email');
  $body = ob_get_contents();
  ob_end_clean();
  return  $body;
 }
 /**
  * Encryption function
  * @param string $string 
  * @param string $action e - encrypt or d - decrypt
  * @return strint
  */
 function petrosoft_crypt( $string, $action = 'e' ) {
   
  $secret_key = 'w9vn9UHZMaWawtf4mzhYg2DX';
  $secret_iv = 'D6LUnYuMDF99cWGk69mHsKn4';

  $output = false;
  $encrypt_method = "AES-256-CBC";
  $key = hash( 'sha256', $secret_key );
  $iv = substr( hash( 'sha256', $secret_iv ), 0, 16 );

  if( $action == 'e' ) {
    $output = base64_encode( openssl_encrypt( $string, $encrypt_method, $key, 0, $iv ) );
  }
  else if( $action == 'd' ){
    $output = openssl_decrypt( base64_decode( $string ), $encrypt_method, $key, 0, $iv );
  }
  return $output;
}
/**
 * Generate xml for indeed
 */
function petrosoft_generate_indeed_xml() {
  $home_path = get_home_path();
  $filename = $home_path.'/indeed.xml';
  $jobs = get_posts(
    array(
     'post_status' => 'publish',
     'post_type' => 'job',
     'numberposts' => -1,
    )
  );
  ob_start();
  set_query_var('jobs', $jobs);
  get_template_part('template-parts/jobs/jobs-indeed-xml');
  $xml = ob_get_contents();
  ob_end_clean();
  $f_hdl = fopen($filename, 'w+');
  fwrite($f_hdl, $xml);
  fclose($f_hdl);
}

function petrosoft_widgets_init() { 
  register_sidebar( array(
    'name'          => 'Header',
    'id'            => 'header',
  ) );
  register_sidebar( array(
    'name'          => 'Screen bottom',
    'id'            => 'screen-bottom',
  ) );
}
add_action( 'widgets_init', 'petrosoft_widgets_init' );


add_filter('acf/load_field/name=blog', 'petrosoft_acf_load_blog_field');

function petrosoft_acf_load_blog_field($field) {
  //Init categories
  $categories = get_categories( array(
    'taxonomy'     => 'category',
    'type'         => 'post',
    'child_of'     => 0,
    'parent'       => 1,
    'hide_empty'   => 1,
  ));
  
  foreach($field['sub_fields'] as &$sub_field) {
    if ($sub_field['name'] == 'category') {
      foreach ($categories as $category) {
        $sub_field['choices'][$category->term_id] = $category->name;
      }
      break;
    }
  }
  return $field;
}

function petrosoft_get_sitemap() {
  $menu = wp_get_nav_sorted_menu_items('sitemap');
  $html = '<ul class="sitemap-list">';
  foreach ($menu as $element) {
    petrosoft_get_sitemap_element($element,0,$html);
  }
  $html.= '</ul>';
  
  return $html;
}

function petrosoft_get_sitemap_element(&$element, $level, &$html) {
  
  if ($element->type == 'taxonomy') {
    $element->children = petrosoft_get_sitemap_taxonomy_hierarchy($element->object,$element->object_id);
  }
  if (isset($element->children) && is_array($element->children) && count($element->children) > 0) {
    if ($level == 0) {
      $class = 'init-open opened';
    } else {
      $class = '';
    }
    $html.= "<li class='dropdown {$class}'><div class='drop-wrap'><a href='{$element->url}'>{$element->title}</a><div class='dropdown-arrow'><svg class='i-svg icon-arrow-1'><use xlink:href='#icon-arrow-1'></use></svg></div></div>";
    $html.= '<ul>';
    foreach ($element->children as $child) {
      petrosoft_get_sitemap_element($child, $level+1, $html); 
    }
    $html.='</ul>';
  } else {
    $html.= "<li><a href='{$element->url}'>{$element->title}</a>";
  }
  $html.='</li>';
} 

function petrosoft_get_sitemap_taxonomy_hierarchy( $taxonomy, $parent = 0 ) {

	// only 1 taxonomy
	$taxonomy = is_array( $taxonomy ) ? array_shift( $taxonomy ) : $taxonomy;

	// get all direct decendents of the $parent
	$terms = get_terms( $taxonomy, array('parent' => $parent, 'hide_empty' => false) );

	// prepare a new array.  these are the children of $parent
	// we'll ultimately copy all the $terms into this new array, but only after they
	// find their own children
	$children = array();

	// go through all the direct decendents of $parent, and gather their children
	foreach( $terms as $term ) {
		$term->children = petrosoft_get_sitemap_taxonomy_hierarchy( $taxonomy, $term->term_id );
    $term->url = get_term_link($term->term_id, $taxonomy);
    $term->title = $term->name;
    $term->type = 'custom';
		// add the term to our new array
		$children[] = $term;

	}
  // add term posts
  $posts = get_posts(array(
    'numberposts' => -1,
    'post_status' => 'publish',
    'post_type' => 'any',
    'tax_query' => array(
      array(
        'taxonomy' => $taxonomy,
        'field' => 'term_id', 
        'terms' => $parent, 
        'include_children' => false
      )
    )
  ));
  if (is_array($posts)) {
    foreach ($posts as $cur_post) {
      $cur_post->url = get_post_permalink($cur_post->ID);
      $cur_post->title = $cur_post->post_title;
      $cur_post->type = 'custom';
      $children[] = $cur_post;
    }
  }

	return $children;
}
/**
 * Get post featured image alt
 * @param int $post_id
 * @return string
 */
function petrosoft_get_post_image_alt($post_id) {
  $thumbnail_id = get_post_thumbnail_id($post_id);
  return get_post_meta($thumbnail_id, '_wp_attachment_image_alt', true);
}

function petrosoft_theme_setup() {
  add_theme_support( 'title-tag' );
}

add_action( 'after_setup_theme', 'petrosoft_theme_setup' );


// News subscribe form validation
add_filter( 'wpcf7_validate_email*', 'petrosoft_news_email_validation_filter', 20, 2 );
  
function petrosoft_news_email_validation_filter( $result, $tag ) {
  if ($_POST['_wpcf7'] == '6411') {   
    $submissions = get_posts( array(
      'meta_key'    => 'form_id',
      'meta_value'  => '6411',
      'post_type'   => 'wpcf7s', 
      'numberposts' => -1,
    ));
    foreach ($submissions as $submission) {
      $mail = get_post_field('wpcf7s_posted-email', $submission);
      if ($mail == $_POST['email']) {
        $result->invalidate( $tag, "This address already registered" );
      }
    }
  }
  return $result;
}
// Admin help page
add_menu_page( 'Admin HTML Help', 'HTML Help', 'manage_options', 'html-help', 'petrosoft_html_help_page', 'dashicons-editor-help', 3);
function petrosoft_html_help_page() {
  print get_template_part('template-parts/single','html-help' );
}


add_action('acf/init', 'petrosoft_acf_init');
function petrosoft_acf_init() {
	
	if( function_exists('acf_register_block') ) {
		
		acf_register_block(array(
			'name'				=> 'content_form',
			'title'				=> __('Content form'),
			'description'		=> __('Content form block.'),
			'render_callback'	=> 'petrosoft_acf_contact_form_block_render',
			'category'			=> 'petrosoft',
			'icon'				=> 'media-text',
			'keywords'			=> array( 'petrosoft', 'form' ),
		));
    acf_register_block(array(
			'name'				=> 'content_panel',
			'title'				=> __('Content panel'),
			'description'		=> __('Content panel.'),
			'render_callback'	=> 'petrosoft_acf_content_panel_block_render',
			'category'			=> 'petrosoft',
			'icon'				=> 'admin-page',
			'keywords'			=> array( 'petrosoft', 'panel' ),
		));
	}
}

function petrosoft_acf_contact_form_block_render() {
  print get_template_part('template-parts/single','content-form' );
}

function petrosoft_acf_content_panel_block_render($params) {
  $content_panel_fields = get_field('content_panel'); 
  if (!isset($content_panel_fields['text']) || $content_panel_fields['text'] == '') {
    $content_panel_fields['text'] = 'Content panel';
  }
  print "<div class='petrosoft-content-panel' style='background-color: {$content_panel_fields['background_color']}'>{$content_panel_fields['text']}</div>";
}

function petrosoft_block_category( $categories, $post ) {

  $new_categories = array_merge(
    $categories,
    array(
      array(
        'slug' => 'petrosoft',
        'title' => __( 'Petrosoft', 'mlp-admin' ),
      )
    )
  );

	return $new_categories;
}
add_filter( 'block_categories', 'petrosoft_block_category', 10, 2);


// define the wpcf7_is_tel callback 
function petrosoft_wpcf7_is_tel( $result, $tel ) { 
  $result = preg_match("/^([1])?[0-9]{3}[0-9]{3}[0-9]{4}$/i", $tel);
  return $result; 
}; 
         
// add the filter 
add_filter( 'wpcf7_is_tel', 'petrosoft_wpcf7_is_tel', 10, 2 ); 


add_filter( 'shortcode_atts_wpcf7', 'petrosoft_shortcode_atts_wpcf7_filter', 10, 3 );
function petrosoft_shortcode_atts_wpcf7_filter( $out, $pairs, $atts ) {
    $my_attr = 'leadsource';
    if ( isset( $atts[$my_attr] ) ) {
        $out[$my_attr] = $atts[$my_attr];
    }
    $my_attr = 'file-url';
    if ( isset( $atts[$my_attr] ) ) {
        $out[$my_attr] = $atts[$my_attr];
    }
    return $out;
}

// canonical fix for pagination
function petrosoft_pagination_canonical () {
  $canon_page = get_pagenum_link(0);
  return $canon_page;
}

function petrosoft_wpseo_head() {
  if (is_paged()) {
    add_filter('wpseo_canonical', 'petrosoft_pagination_canonical');
  }
} 
add_filter('wpseo_head','petrosoft_wpseo_head');

add_filter('alm_seo_leading_slash', '__return_true');
add_filter('alm_seo_remove_trailing_slash', '__return_true');

add_theme_support( 'html5', array( 'search-form' ) );

function wpb_change_search_url() {
    if ( is_search() && ! empty( $_GET['s'] ) ) {
        wp_redirect( home_url( "/search/" ) . urlencode( get_query_var( 's' ) ) );
        exit();
    }   
}
add_action( 'template_redirect', 'wpb_change_search_url' );


function petrosoft_get_products_menu($post_id) {
  $links = wp_get_nav_sorted_menu_items('Products menu');
  $fields = get_field( "product_pillar_fields", petrosoftGetCurrentProductPillarPostId($post_id));
  ob_start();
  set_query_var('template_data', array('links' => $links, 'fields' => $fields));
  get_template_part('template-parts/side-block/menu');
  $html = ob_get_contents();
  ob_end_clean();
  return $html;
}

function petrosoft_get_knowledge_center_menu() {
  $links = wp_get_nav_sorted_menu_items('Knowledge Center Menu');
  $fields = array(
      'schedule_a_demo_color' => 'dark-green',
      'logo' => array(
          'url' => '/wp-content/themes/petrosoftinc/images/resources-logo.png',
          'width' => 212,
          'height' => 32
      )
  );
  ob_start();
  set_query_var('template_data', array('links' => $links, 'fields' => $fields));
  get_template_part('template-parts/side-block/menu');
  $html = ob_get_contents();
  ob_end_clean();
  return $html;
}


function petrosoftGetCurrentProductPillarPostId($current_post_id) {
  if (get_page_template_slug($current_post_id) == 'single-products_pillar.php') {
    return $current_post_id;
  } else {
    $post = get_post($current_post_id);
    if ($post->post_parent) {
      return petrosoftGetCurrentProductPillarPostId($post->post_parent);
    } else {
      return false;
    }
  }
}

function petrosoft_get_products_footer($post_id) {
  $product_footers = get_the_terms($post_id, 'products_footer');
  if (is_array($product_footers)) {
    $product_footer = $product_footers[0];
    $template_data = get_fields('products_footer_'.$product_footer->term_id);
    ob_start();
    set_query_var('template_data', $template_data);
    get_template_part('template-parts/products/products_footer_'.$product_footer->slug);
    $html = ob_get_contents();
    ob_end_clean();
    return $html;
  } else {
    return '';
  }
}

function petrosoft_get_template($template, $template_data, $var_name = 'template_data') {
  ob_start();
  set_query_var($var_name, $template_data);
  get_template_part($template);
  $html = ob_get_contents();
  ob_end_clean();
  return $html;
}

if( function_exists('acf_add_options_page') )
{
    acf_add_options_page(array(
      'page_title'    => 'Resources catalog',
      'menu_title'    => 'Resources catalog',
      'menu_slug'     => 'options_resources_archive',
      'capability'    => 'edit_posts',
      'parent_slug'   => 'edit.php?post_type=resources',
      'position'      => false,
      'icon_url'      => 'dashicons-images-alt2',
      'redirect'      => false,
    ));
    acf_add_options_page(array(
      'page_title'    => 'Blog catalog',
      'menu_title'    => 'Blog catalog',
      'menu_slug'     => 'options_blog_archive',
      'capability'    => 'edit_posts',
      'parent_slug'   => 'edit.php',
      'position'      => false,
      'icon_url'      => 'dashicons-images-alt2',
      'redirect'      => false,
    ));
    acf_add_options_page(array(
      'page_title'    => 'Сase studies catalog',
      'menu_title'    => 'Сase studies catalog',
      'menu_slug'     => 'options_case_studies_archive',
      'capability'    => 'edit_posts',
      'parent_slug'   => 'edit.php?post_type=case_studies',
      'position'      => false,
      'icon_url'      => 'dashicons-images-alt2',
      'redirect'      => false,
    ));
    acf_add_options_page(array(
      'page_title'    => 'Side blocks',
      'menu_title'    => 'Side blocks',
      'menu_slug'     => 'side_blocks',
      'position'      => false,
      'icon_url'      => 'dashicons-excerpt-view',
      'redirect'      => false,
    ));
    acf_add_options_page(array(
      'page_title'    => 'Catalogs, Brochures, Flyers catalog',
      'menu_title'    => 'Catalogs, Brochures, Flyers catalog',
      'menu_slug'     => 'options_brochures_flyers_archive',
      'capability'    => 'edit_posts',
      'parent_slug'   => 'edit.php?post_type=brochures_flyers',
      'position'      => false,
      'icon_url'      => 'dashicons-images-alt2',
      'redirect'      => false,
    ));
    acf_add_options_page(array(
      'page_title'    => 'White papers catalog',
      'menu_title'    => 'White papers catalog',
      'menu_slug'     => 'options_white_papers_archive',
      'capability'    => 'edit_posts',
      'parent_slug'   => 'edit.php?post_type=white_papers',
      'position'      => false,
      'icon_url'      => 'dashicons-images-alt2',
      'redirect'      => false,
    ));
    acf_add_options_page(array(
      'page_title'    => 'Videos catalog',
      'menu_title'    => 'Videos catalog',
      'menu_slug'     => 'options_videos_archive',
      'capability'    => 'edit_posts',
      'parent_slug'   => 'edit.php?post_type=videos',
      'position'      => false,
      'icon_url'      => 'dashicons-images-alt2',
      'redirect'      => false,
    ));
    acf_add_options_page(array(
      'page_title'    => 'News catalog',
      'menu_title'    => 'News catalog',
      'menu_slug'     => 'options_news_archive',
      'capability'    => 'edit_posts',
      'parent_slug'   => 'edit.php?post_type=news',
      'position'      => false,
      'icon_url'      => 'dashicons-images-alt2',
      'redirect'      => false,
    ));
    acf_add_options_page(array(
      'page_title'    => 'Toolkits catalog',
      'menu_title'    => 'Toolkits catalog',
      'menu_slug'     => 'options_toolkits_archive',
      'capability'    => 'edit_posts',
      'parent_slug'   => 'edit.php?post_type=toolkits',
      'position'      => false,
      'icon_url'      => 'dashicons-images-alt2',
      'redirect'      => false,
    ));
    acf_add_options_page(array(
      'page_title'    => 'Newsletters catalog',
      'menu_title'    => 'Newsletters catalog',
      'menu_slug'     => 'options_newsletters_archive',
      'capability'    => 'edit_posts',
      'parent_slug'   => 'edit.php?post_type=newsletters',
      'position'      => false,
      'icon_url'      => 'dashicons-images-alt2',
      'redirect'      => false,
    ));
}

function petrosoft_get_taxonomies_for_filter($taxonomies) {
  if (isset($_GET['taxonomy'])) {
    $filtered_taxonomies = explode( ':', $_GET['taxonomy']); 
    $filtered_terms = explode( ':', $_GET['taxonomy_terms']); 
  }
  $filters = array();
  foreach ($taxonomies as $taxonomy) {
    $filter = array(
        'id' => $taxonomy,
        'terms' => get_terms($taxonomy, array(
          'hide_empty' => false,
          'orderby'    => 'ID', 
          'order'      => 'ASC',
        ))
    );
    if (isset($filtered_taxonomies)) {
      foreach ($filtered_taxonomies as $index => $filtered_taxonomy) {
        if ($filtered_taxonomy == $filter['id']) {
          $current_taxonomy_filtered_terms = explode( ',', $filtered_terms[$index]);
          foreach ($filter['terms'] as &$term) {
            if (in_array($term->slug, $current_taxonomy_filtered_terms)) {
              $term->filtered = true;
            } else {
              $term->filtered = false;
            }
          }
        }
      }
    }
    $filters[] = $filter;
  }
  return $filters;
}

function petrosoft_mce_before_init_insert_formats( $init_array ) {  
	// Define the style_formats array
	$style_formats = array(  
		// Each array child is a format with it's own settings
		array(  
			'title' => 'Paragraph 20px',  
			'selector' => 'p',  
			'classes' => 'mce-styles-font-size-20',
			'wrapper' => true,
		),  
    array(  
			'title' => 'Paragraph 24px',  
			'selector' => 'p',  
			'classes' => 'mce-styles-font-size-24',
			'wrapper' => true,
		),
    array(  
			'title' => 'Paragraph 12px',  
			'selector' => 'p',  
			'classes' => 'mce-styles-font-size-12',
			'wrapper' => true,
		),
    array(  
			'title' => 'Paragraph top 8px',  
			'classes' => 'mce-styles-top-8',
      'block' => 'div',
		), 
    array(
      'title' => 'Margin Bottom 0px',
      'selector' => 'p,h1,h2,h3,h4,h5',  
       'styles' => array(
           'margin-bottom' => '0px'
       )
    ),
    array(  
			'title' => 'Left line',   
			'classes' => 'wpb-left-line',
			'block' => 'div',
      'wrapper' => true,
		),
    array(  
			'title' => 'Icon plus',
      'selector' => 'p',  
			'classes' => 'wpb-icon-plus',
			'wrapper' => false,
		),
    array(  
			'title' => 'Icon best',
      'selector' => 'p',  
			'classes' => 'wpb-icon-best',
			'wrapper' => false,
		),
    array(  
			'title' => 'Icon tip',
      'selector' => 'p',  
			'classes' => 'wpb-icon-tip',
			'wrapper' => false,
		),
    array(  
			'title' => 'Icon time',
      'selector' => 'p',  
			'classes' => 'wpb-icon-time',
			'wrapper' => false,
		),
	);  
	// Insert the array, JSON ENCODED, into 'style_formats'
	$init_array['style_formats'] = wp_json_encode( $style_formats );  
	
	return $init_array;  
  
} 
// Attach callback to 'tiny_mce_before_init' 
add_filter( 'tiny_mce_before_init', 'petrosoft_mce_before_init_insert_formats' ); 


add_action( 'after_setup_theme', 'petrosoft_theme_add_editor_styles' );
function petrosoft_theme_add_editor_styles() {

	add_editor_style( 'admin_css/editor-styles.css' );
	// необходимая поддержка add_theme_support( 'editor-style' ); активируется автоматом
}

function petrosoft_wpb_retina_image_src($image_id) {
  $image = wp_get_attachment_image_src($image_id,'original');
  return kama_thumb_src(array('src' =>  $image[0],'w' => ($image[1]*2),'h' => ($image[2]*2)));
}

/**
 * Get post side blocks html
 * @param int $id
 * @return string
 */
function petrosoftGetSideBlocks($id) {
  $choose_side_blocks = get_field('choose_side_blocks',$id);
  $side_blocks = get_field('side_blocks', 'option');
  $result = '';
  if (isset($choose_side_blocks['side_call_out_type_1']) && $choose_side_blocks['side_call_out_type_1'] > 0 ) {
    $result.= petrosoft_get_template('template-parts/side-blocks/side_call_out_type_1',$side_blocks['side_call_out_type_1'][$choose_side_blocks['side_call_out_type_1'] - 1]);
  }
  if (isset($choose_side_blocks['side_call_out_type_2']) && $choose_side_blocks['side_call_out_type_2'] > 0 ) {
    $result.= petrosoft_get_template('template-parts/side-blocks/side_call_out_type_2',$side_blocks['side_call_out_type_2'][$choose_side_blocks['side_call_out_type_2'] - 1]);
  }
  if (isset($choose_side_blocks['side_call_out_mobile_app']) && $choose_side_blocks['side_call_out_mobile_app'] > 0 ) {
    $result.= petrosoft_get_template('template-parts/side-blocks/side_call_out_mobile_app',$side_blocks['side_call_out_mobile_app'][$choose_side_blocks['side_call_out_mobile_app'] - 1]);
  }
  return $result;
}

function petrosoft_convert_bytes_to_specified($bytes, $to, $decimal_places = 1) {
  $formulas = array(
    'K' => number_format($bytes / 1024, $decimal_places),
    'M' => number_format($bytes / 1048576, $decimal_places),
    'G' => number_format($bytes / 1073741824, $decimal_places)
  );
  return isset($formulas[$to]) ? $formulas[$to] : 0;
}

add_filter( 'acf/fields/wysiwyg/toolbars' , 'acf_petrosoft_toolbars'  );
function acf_petrosoft_toolbars( $toolbars )
{
  $toolbars['Full'][1][] = 'styleselect';
  $toolbars['Full'][1][] = 'forecolor';
  return $toolbars;
}

/**
 * Get categories block for catalogs
 * @param string $slug
 * @param string $base_url
 * @return string
 */
function petrosoft_get_categories_block($slug, $base_url) {
  if (isset($_GET['taxonomy_terms']) && $_GET['taxonomy_terms'] != '') {
    $filtered_terms = explode( ':', $_GET['taxonomy_terms']); 
  } else {
    $filtered_terms = array();
  }
  $terms = get_terms( [
    'taxonomy' => $slug,
    'hide_empty' => false,
    'meta_key' => 'tax_position',
    'orderby' => 'tax_position',
    'order' => 'ASC',
  ]);
  
  return petrosoft_get_template('template-parts/single-categories-block',array('taxonomy' => $slug, 'terms' => $terms, 'base_url' => $base_url,  'filtered_terms' => $filtered_terms));
}


/**
 * get taxonomy filter for alm block
 * @return string
 */
function petrosoft_get_taxonomy_filter_from_params() {
  if (isset($_GET['taxonomy'])) {
    $taxonomy_string = 'taxonomy="'.$_GET['taxonomy'].'"';
    if (isset($_GET['taxonomy_terms'])) {
      $taxonomy_string.= ' taxonomy_terms="'.$_GET['taxonomy_terms'].'"';
    }
    if (isset($_GET['taxonomy_operator'])) {
      $taxonomy_string.= ' taxonomy_operator="'.$_GET['taxonomy_operator'].'"';
    }
  } else {
    $taxonomy_string = '';
  }
  return $taxonomy_string;
}

?>