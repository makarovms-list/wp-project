<?php
$taxonomy_string = petrosoft_get_taxonomy_filter_from_params();
?>
<div data-aos="fade-up" class="archive-posts-list">
<?php 
  print do_shortcode('[ajax_load_more seo="true" css_classes="" container_type="div" post_type="white_papers" custom_args="alm_template:white-papers" posts_per_page="12" '.$taxonomy_string.' scroll="false" button_label="LOAD MORE"]');
?>
</div>