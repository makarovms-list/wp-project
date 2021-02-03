<?php
  $cat = get_query_var('cat');
  $category = get_category ($cat);

  if ($cat != 22) {
    $category_code = 'category="'.$category->slug.'"';
  } else {
    $category_code = '';
  }
  
  // Terms
  $terms = get_terms( 'resource_tag', array(
    'hide_empty' => false,
    'orderby'    => 'ID', 
    'order'      => 'ASC',
  ));
  if (isset($_GET['tag'])) {
    $selected_tag = $_GET['tag'];
  } else {
    $selected_tag = false;
  }
  
  if ($selected_tag) {
    $tag_code = 'taxonomy="resource_tag" taxonomy_terms="'.$selected_tag.'" taxonomy_operator="IN"';
  } else {
    $tag_code = '';
  }

?>
<div class="title-wrapper">  
  <h1 data-aos="fade-left" class="line-title blue"><?php print $category->name ?></h1>
  <div class="tags-container">
    <select class="petrosoft-select">
      <option value="all">ALL</option>
      <?php foreach ($terms as $term): ?>
        <option <?php print ($term->slug == $selected_tag)?'selected':'';?> value="<?php print $term->slug ?>"><?php print $term->name;?></option>
      <?php endforeach; ?>
    </select>
    <input class="category-link" value="<?php print get_category_link($cat)?>" type="hidden">
  </div>
</div>

<div data-aos="fade-up" class="all-posts">
<?php 
  print do_shortcode('[ajax_load_more seo="true" container_type="div" post_type="resources" custom_args="alm_template:resources" posts_per_page="6" '.$category_code.' '.$tag_code.' scroll="false" button_label="Show More"]');
?>
</div>