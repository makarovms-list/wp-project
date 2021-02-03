<?php
//  $cat = get_query_var('cat');
//  $category = get_category ($cat);
//
//  if ($cat != 22) {
//    $category_code = 'category="'.$category->slug.'"';
//  } else {
//    $category_code = '';
//  }
  $category_code = '';
  // Terms
  $terms = get_terms( 'resource_tag', array(
    'hide_empty' => false,
    'orderby'    => 'ID', 
    'order'      => 'ASC',
  ));
  if (isset($_GET['resources-tags'])) {
    $selected_tag = $_GET['resources-tags'];
  } else {
    $selected_tag = false;
  }
  
  if ($selected_tag) {
    $tag_code = 'taxonomy="resource_tag" taxonomy_terms="'.$selected_tag.'" taxonomy_operator="IN"';
  } else {
    $tag_code = '';
  }
  
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
  

?>

<div data-aos="fade-up" class="archive-posts-list">
<?php 
  print do_shortcode('[ajax_load_more seo="true" css_classes="vc_row wpb_row vc_inner vc_row-fluid flex-row" container_type="div" post_type="resources" custom_args="alm_template:resources" posts_per_page="6" '.$taxonomy_string.' scroll="false" button_label="Show More"]');
?>
</div>