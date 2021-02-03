<?php
$categories = get_categories( array(
	'taxonomy'     => 'category',
	'type'         => 'customer_story',
	'child_of'     => 0,
	'parent'       => 16,
	'hide_empty'   => 1,
  'number'       => 4,
));
array_unshift($categories, get_category(16));

if (is_single()) {
  $post_categories = wp_get_post_categories(get_the_ID());
  $current_category = $post_categories[0];
} else {
  $current_category = get_query_var( 'cat' );
}

?>
<div class="customer-story-menu-area">
  <div class="cs-menu-wrapper">
    <div data-aos="fade-down" data-aos-id="customer-story-menu"  class="cs-menu">
      <?php if (is_single()): ?>
        <a href="/customers-stories" class='cms-logo cms-logo-link'>
          <div class="csm-logo-img"></div>
          <div class="csm-title">
            Customer Stories
          </div>
        </a>
      <?php else: ?>
        <div class='cms-logo'>
          <div class="csm-logo-img"></div>
          <div class="csm-title">
            Customer Stories
          </div>
        </div>
      <?php endif; ?>
      <div class="csm-category-select-container">
        <select class="petrosoft-select">
          <?php foreach ($categories as $category): ?>
            <option <?php print ($category->cat_ID == $current_category)?'selected':'';?> value="<?php print get_category_link($category) ?>"><?php print $category->name;?></option>
          <?php endforeach; ?>
        </select>
      </div>
    </div>
  </div>
</div>  
