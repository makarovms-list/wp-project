<?php
  $taxonomy_filters = petrosoft_get_taxonomies_for_filter(array('resource_tag','resource_category'));
?>
<div class="archive-h1">
  <svg class="h1-logo i-svg icon-knowledge"><use xlink:href="#icon-knowledge"></use></svg>
  <h1>Knowledge center</h1>
</div>
<a class="btn dark-green" href="#">SCHEDULE A DEMO</a>
<div class="petrosoft-category-filters">
  <?php  foreach ($taxonomy_filters as $filter): ?>
    <div data-category="<?php print $filter['id']; ?>" class="archive-filter category-filter">
      <div class="f-title">Topics</div>
        <div class="f-terms">
          <?php foreach ($filter['terms'] as $term): ?>
            <div class="f-checkbox-wrapper">
              <label>
                <input data-term="<?php print $term->slug; ?>" <?php print ($term->filtered)? 'checked':''?> class="petrosoft-checkbox filter-term" type="checkbox" name="t-<?php print $term->slug; ?>">
                <span><?php print $term->name; ?></span>
              </label>
            </div>
          <?php endforeach; ?>
        </div>
    </div>  
  <?php  endforeach; ?>
</div>
