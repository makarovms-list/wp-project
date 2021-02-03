<?php
  $cat = get_query_var('cat');
  $category = get_category ($cat);

  if ($cat != 16) {
    $category_code = 'category="'.$category->slug.'"';
    $page_title = $category->name;
  } else {
    $category_code = '';
    $page_title = 'Customer Case Studies';
  }
?>
  
<h1 data-aos="fade-left" class="line-title"><?php print $page_title ?></h1>
<div data-aos="fade-up" class="all-posts">
<?php 
  print do_shortcode('[ajax_load_more seo="true" container_type="div" post_type="customer_story" custom_args="alm_template:customers-stories" posts_per_page="6" '.$category_code.' scroll="false" button_label="Show More"]');
?>
</div>