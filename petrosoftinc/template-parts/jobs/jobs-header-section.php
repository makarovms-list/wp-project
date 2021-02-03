<?php
  $post = get_post();
  $location_type = get_field( "location_type", $post->ID);
  $location_type_object = get_field_object('location_type');
  $location = get_field( "location", $post->ID);
  $contract_type = get_field( "contract_type", $post->ID);
  $contract_type_object = get_field_object('contract_type');
  $job_category = wp_get_post_terms($post->ID, 'job_category');
?>
<div class="job-header-content content-area">
  <h1><?php print $post->post_title ?></h1>
  <div class="j-parameters">
    <div class="j-param j-location">
      <?php if($location_type == 'address'):?>
        <div class="j-icon"><svg class="i-svg icon-location"><use xlink:href="#icon-location"></use></svg></div> <?php print $location; ?>
      <?php else: ?>
        <div class="j-icon"><svg class="i-svg icon-world"><use xlink:href="#icon-world"></use></svg></div> <?php print $location_type_object['choices'][$location_type];?>
      <?php endif; ?>
    </div>
    <div class="j-param j-contract">
      <div class="j-icon"><svg class="i-svg icon-world"><use xlink:href="#icon-time"></use></svg></div><?php print $contract_type_object['choices'][$contract_type]?>
    </div>
    <?php if(is_array($job_category) && isset($job_category[0])):?>
      <div class="j-param j-category">
        <div class="j-icon"><svg class="i-svg icon-people"><use xlink:href="#icon-people"></use></svg></div><?php print $job_category[0]->name?>
      </div>
    <?php endif; ?>
  </div>
</div>
