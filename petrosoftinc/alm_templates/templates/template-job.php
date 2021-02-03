<?php 
  $summary = get_field('summary', get_the_ID());
  $color = get_field( "color", get_the_ID());
  $location_type = get_field( "location_type", get_the_ID());
  $location_type_object = get_field_object('location_type');
  $location = get_field( "location", get_the_ID());
  $contract_type = get_field( "contract_type", get_the_ID());
  $contract_type_object = get_field_object('contract_type');
  $job_category = wp_get_post_terms(get_the_ID(), 'job_category');
?>
<div class="job job-<?php print get_the_ID()?> <?php print $color ?>">
  <div class='j-title'><?php the_title(); ?></div>
  <div class='j-text'><?php print wp_trim_words(strip_shortcodes($summary), 45, '...' );?></div>
  <div class="j-data">
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
     <a class="j-more-link" href="<?php print the_permalink(get_the_ID()) ?>"><span>Read More</span> <svg class="i-svg icon-arrow-1"><use xlink:href="#icon-arrow-1"></use></svg></a>
  </div>
</div> 