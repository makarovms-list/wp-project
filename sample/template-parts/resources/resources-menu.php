<?php
$categories = get_categories( array(
	'taxonomy'     => 'category',
	'type'         => 'resources',
	'child_of'     => 0,
	'parent'       => 22,
	'hide_empty'   => 1,
  'number'       => 4,
  'orderby'    => 'ID', 
  'order'      => 'ASC',
) );
array_unshift($categories, get_category(22));
if(is_single()) {
  $post_categories = wp_get_post_categories(get_the_ID());
  $current_category = $post_categories[0];
} else {
  $current_category = get_query_var( 'cat' );
}
?>
<div class="blog-menu-area">
  <div class="blog-menu-wrapper">
    <div data-aos="fade-down" class="blog-menu-container">
      <div class="b-logo">
        <div class="b-logo-img"></div>
        <div class="b-logo-text">Resources</div>
      </div>
      <nav class="blog-menu">
        <?php foreach($categories as $index => $category):?>
          <a class="b-link <?php print ($current_category == $category->cat_ID) ? 'active' : ''; ?>" href="<?php print get_category_link($category->cat_ID)?>"><?php print $category->cat_name ?>
          <?php if($index == 0):?>
            <svg class="i-svg icon-arrow-1"><use xlink:href="#icon-arrow-1"></use></svg>
          <?php endif; ?>
          </a>
        <?php endforeach; ?>
      </nav>
    </div>
  </div>
</div>  
