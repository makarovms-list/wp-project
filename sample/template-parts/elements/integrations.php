<div id="integrations-block" class="integrations-block">
  <div class="content-area">
    <h2 data-aos="fade-up" class="line-title <?php print $template_data['fields']['integrations']['title_color']?>"><?php print $template_data['fields']['integrations']['title']?></h2>
    <div data-aos="fade-left" class="i-description"><?php print $template_data['fields']['integrations']['description']?></div>
    <div class="integrations-list">
      <?php foreach ($template_data['fields']['integrations']['images'] as $image): ?>
        <div data-aos="zoom-in" class="i-image">
          <img alt="<?php print $image['alt'];?>" src="<?php print $image['url']; ?>">
        </div>
      <?php endforeach; ?>
    </div>
  </div>
</div>  
  
