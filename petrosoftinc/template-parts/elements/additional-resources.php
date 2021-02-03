<div id="additional-reesources-block" class="additional-reesources-block">
  <h2 class="line-title <?php print $template_data['fields']['additional_resources']['title_color']?>"><?php print $template_data['fields']['additional_resources']['title']?></h2>
  <?php if (is_array($template_data['fields']['additional_resources']['resources'])): ?>
    <div class="a-resources">
      <?php foreach ($template_data['fields']['additional_resources']['resources'] as $resource): ?>
        <div style="background-color: <?php print $resource['background_color']?>" class="a-resource">
          <img alt="<?php print $resource['icon']['alt']; ?>" class="ar-icon" src="<?php print $resource['icon']['url']?>">
          <div class="ar-data">
            <div class="ar-title"><?php print $resource['title']?></div>
            <a target="_blank" href="<?php print $resource['link']?>" style="color: <?php print $resource['link_color']?>" class="ar-link">
              <span><?php print $resource['link_name']?></span> <svg class="i-svg icon-arrow-1"><use xlink:href="#icon-arrow-1"></use></svg>
            </a>
          </div>
        </div>
      <?php endforeach; ?>
    </div> 
  <?php endif; ?>
</div>  
  