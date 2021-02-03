<?php
$categories = get_categories( array(
	'taxonomy'     => 'category',
	'type'         => 'news',
	'child_of'     => 0,
	'parent'       => 15,
	'hide_empty'   => 1,
  'number'       => 4,
) );
$years = petrosoft_get_posts_years_array('news');
if (is_single()) {
  $post_categories = wp_get_post_categories(get_the_ID());
  $current_category = $post_categories[0];
} else {
  $current_category = get_query_var( 'cat' );
}
  if (isset($_GET['filter-year'])) {
    $selected_year = $_GET['filter-year'];
  } else {
    $selected_year = 'all';
  }
?>
<div class="blog-menu-area">
  <div class="blog-menu-wrapper">
    <div data-aos-id="category-menu" data-aos="fade-down" class="blog-menu-container">
      <div class="b-logo">
        <div class="b-logo-img"></div>
        <div class="b-logo-text">News</div>
      </div>
      <nav class="blog-menu">
        <?php foreach($categories as $index => $category):?>
          <a class="b-link <?php print ($current_category == $category->cat_ID) ? 'active' : ''; ?>" href="<?php print get_category_link($category->cat_ID)?>"><?php print $category->cat_name ?>
          <?php if($index == 0):?>
            <svg class="i-svg icon-arrow-1"><use xlink:href="#icon-arrow-1"></use></svg>
          <?php endif; ?>
          </a>
        <?php endforeach; ?>
        <select class="news-year-filter petrosoft-select">
          <option value="all">All</option>
          <?php foreach($years as $year):?>
            <option <?php print ($selected_year == $year)? 'selected':'';?> value="<?php print $year; ?>"><?php print $year; ?></option>
          <?php endforeach; ?>
        </select>
        <input class="category-link" value="<?php print get_category_link($current_category)?>" type="hidden">
      </nav>
    </div>
  </div>
</div>  
