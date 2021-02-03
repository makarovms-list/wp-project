<div class="archive-categories-block">
  <h4>Browse by Category:</h4>
  <div class="categories-list">
    <a href="<?php print $template_data['base_url'] ?>" class="c-link <?php print (count($template_data['filtered_terms']) == 0) ? 'active':'';?>">All</a>
    <?php foreach ($template_data['terms'] as $term): ?>
      <a href="<?php print $template_data['base_url'].'?taxonomy='.$template_data['taxonomy'].'&taxonomy_terms='.$term->slug.'&taxonomy_operator=IN' ?>" class="c-link <?php print (in_array($term->slug, $template_data['filtered_terms'])) ? 'active':''; ?>"><?php print $term->name;?></a>
    <?php endforeach; ?>
  </div>
</div>