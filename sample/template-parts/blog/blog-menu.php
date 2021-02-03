<?php
$categories = get_categories( array(
	'taxonomy'     => 'category',
	'type'         => 'post',
	'child_of'     => 0,
	'parent'       => 1,
	'hide_empty'   => 1,
  'number'       => 4,
) );
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
        <div class="b-logo-text">Blog</div>
      </div>
      <nav class="blog-menu">
        <a <?php if($current_category == 1 || !$current_category) {print "class='active'";}?> href="/blog">All Posts <svg class="i-svg icon-arrow-1"><use xlink:href="#icon-arrow-1"></use></svg></a>
        <?php foreach($categories as $category):?>
          <a class="b-link <?php print ($current_category == $category->cat_ID) ? 'active' : ''; ?>" href="<?php print get_category_link($category->cat_ID)?>"><?php print $category->cat_name ?></a>
        <?php endforeach; ?>
      </nav>
    </div>
  </div>
</div>  
