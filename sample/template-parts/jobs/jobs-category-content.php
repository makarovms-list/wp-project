<?php
  $current_location = get_queried_object();

  if (isset($_GET['job-category'])) {
    $current_category = (int)$_GET['job-category'];
  } else {
    $current_category = false;
  }
  if ($current_category) {
    $current_category_term = get_term($current_category, 'job_category');
    $taxonomy_filter = 'taxonomy="jobs:job_category" taxonomy_terms="'.$current_location->slug.':'.$current_category_term->slug.'" taxonomy_operator="IN:IN"';
  } else {
   $taxonomy_filter = 'taxonomy="jobs" taxonomy_terms="'.$current_location->slug.'" taxonomy_operator="IN"';
  }
?>
<h1 class="line-title red">Jobs <?php print $current_location->name ?></h1>
<div data-aos="fade-up" class="all-jobs">
<?php 
  print do_shortcode('[ajax_load_more seo="true" container_type="div" post_type="job" custom_args="alm_template:job" posts_per_page="4" scroll="false" button_label="Show More" '.$taxonomy_filter.']');
?>
</div>