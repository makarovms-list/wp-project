<?php
  $locations = get_terms( 'jobs', array(
    'hide_empty' => true,
    'orderby'    => 'ID', 
    'order'      => 'ASC',
  ));
  
  $job_categories = get_terms( 'job_category', array(
    'hide_empty' => true,
    'orderby'    => 'ID', 
    'order'      => 'DESC',
  ));
  $queried_object = get_queried_object();
  $current_term_id = $queried_object->term_id;

  if (isset($_GET['job-category'])) {
    $current_category = (int)$_GET['job-category'];
  } else {
    $current_category = false;
  } 
?>
<div class="blog-menu-area">
  <div class="blog-menu-wrapper">
    <div data-aos-id="category-menu" data-aos="fade-down" class="blog-menu-container">
      <div class="b-logo">
        <div class="b-logo-img"></div>
        <div class="b-logo-text">Jobs</div>
      </div>
      <nav class="blog-menu">
        <?php foreach($locations as $index => $location):?>
          <a class="b-link <?php print ($current_term_id == $location->term_id) ? 'active' : ''; ?>" href="<?php print get_term_link($location->term_id, 'jobs')?>"><?php print $location->name ?>
          <?php if($index == 0):?>
            <svg class="i-svg icon-arrow-1"><use xlink:href="#icon-arrow-1"></use></svg>
          <?php endif; ?>
          </a>
        <?php endforeach; ?>
        <select class="job-category-filter petrosoft-select">
          <option value="all">All</option>
          <?php foreach($job_categories as $job_category):?>
            <option <?php print ($current_category == $job_category->term_id)? 'selected':'';?> value="<?php print $job_category->term_id; ?>"><?php print $job_category->name; ?></option>
          <?php endforeach; ?>
        </select>
        <input class="category-link" value="<?php print get_term_link( $current_term_id, 'jobs')?>" type="hidden">
      </nav>
    </div>
  </div>
</div>  
