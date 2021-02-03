<?php
  $cat = get_query_var('cat');
  $category = get_category ($cat);
  
  $category_titles = get_field('news_category_fields', $category);
  if (!isset($category_titles)) {
    $category_titles['recent_news_title'] = 'Headlines';
    $category_titles['all_news_title'] = $category->name;;
  }
  
  if (isset($_GET['filter-year'])) {
    $selected_year = $_GET['filter-year'];
  } else {
    $selected_year = 'all';
  }
  $years_filter = '';
  if ($selected_year != 'all') {
    $years_filter = 'year="' . $selected_year . '"';
  }
  
  $args = array(
    'post_type' => 'news',
    'post_status' => 'publish',
    'numberposts' => 2,  
    'order' => 'DESC',
  );
  if ($cat != 15) {
    $args['category'] = $cat;
    $page_title = $category_titles['all_news_title'];
  } else {
    $page_title = 'All News';
  }
  
  if ($selected_year != 'all') {
    $args['year'] = $selected_year;  
  }
  $featured_posts = get_posts($args);

  
  if ($cat != 15) {
    $category_code = 'category="'.$category->slug.'"';
  } else {
    $category_code = '';
  }
?>
<?php if (count($featured_posts) > 0): ?>
  <h2 data-aos="fade-top" class="line-title lilac"><?php print $category_titles['recent_news_title']?></h2>
  <div class="featured-posts">
    <?php foreach ($featured_posts as $featured_post): ?>
      <?php 
        $post__not_in[] = $featured_post->ID;
      ?>
      <div class="featured-post">
        <div data-aos="fade-right"  class="fp-image" href="<?php print the_permalink($featured_post->ID) ?>">
          <a href="<?php print the_permalink($featured_post->ID) ?>">
            <picture>
              <source srcset="<?php print kama_thumb_src('w=1159&h=805&post_id='.$featured_post->ID);?>" media="(min-width: 481px) and (max-width: 1199px)">
              <source srcset="<?php print kama_thumb_src('w=440&h=305&post_id='.$featured_post->ID);?>" media="(max-width: 480px)">
              <img alt="<?php print petrosoft_get_post_image_alt($featured_post->ID);?>" src="<?php print kama_thumb_src('w=555&h=385&post_id='.$featured_post->ID);?>" srcset="<?php print kama_thumb_src('w=1110&h=770&post_id='.$featured_post->ID);?> 2x">
            </picture>
          </a>   
        </div>
        <div data-aos="fade-left" class="fp-content">
          <div class="fp-date"><?php print get_the_date('M d, Y g:i a', $featured_post->ID);?></div>
          <div class="fp-title"><?php print $featured_post->post_title;?></div>
          <div class='fp-text'><?php print wp_trim_words(strip_shortcodes(get_the_content('',false,$featured_post->ID)), 100, '...');?></div>
          <a class="fp-more-link" href="<?php print the_permalink($featured_post->ID) ?>"><span>Learn more</span> <svg class="i-svg icon-arrow-1"><use xlink:href="#icon-arrow-1"></use></svg></a>
        </div>
      </div>
    <?php endforeach;?>
  </div>
<?php endif; ?>
  
<h1 data-aos="fade-left" class="line-title lilac"><?php print $page_title?></h1>
<div data-aos="fade-up" class="all-posts">
<?php 
  if (count($post__not_in) > 0) {
    $post__not_in = implode(',', $post__not_in);
  } else {
    $post__not_in = '';
  }
  print do_shortcode('[ajax_load_more seo="true" container_type="div" post_type="news" custom_args="alm_template:news" posts_per_page="6" '.$category_code.' scroll="false" post__not_in="'. $post__not_in .'" button_label="Show More" '.$years_filter.']');
?>
</div>