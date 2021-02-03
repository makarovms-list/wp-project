<div id="benefits-with-no-tabs-block" class="benefits-with-no-tabs-block">
  <h2 data-aos="fade-up" class="line-title <?php print $template_data['fields']['benefits_with_no_tabs']['title_color']?>"><?php print $template_data['fields']['benefits_with_no_tabs']['title']?></h2>
  <div data-aos="fade-left" class="b-main-description"><?php print $template_data['fields']['benefits_with_no_tabs']['description']?></div>
  <style>
    <?php foreach($template_data['fields']['benefits_with_no_tabs']['benefits'] as $index => $benefit): ?>
      .benefits-with-no-tabs-block .benefit-wrapper .benefit-<?php print $index ?>:hover {
        box-shadow: 0 4px 30px <?php print hex2rgba($benefit['hover_color'],0.36);?>
      }
    <?php endforeach; ?>
  </style>
  <div class="benefits benefits-per-row-<?php print $template_data['fields']['benefits_with_no_tabs']['benefits_per_row']?>" >  
    <?php foreach($template_data['fields']['benefits_with_no_tabs']['benefits'] as $index => $benefit): ?>
    <div class="benefit-wrapper" data-aos="zoom-in" >
      <div class="benefit benefit-<?php print $index ?>">
        <img alt="<?php print $benefit['icon']['alt']; ?>" class="b-icon" src="<?php print kama_thumb_src(array('src' =>  $benefit['icon']['url'],'w' => 110,'h' => 110))?>" srcset="<?php print kama_thumb_src(array('src' =>  $benefit['icon']['url'],'w' => 220,'h' => 220));?> 2x">
        <div class="b-title"><?php print do_shortcode($benefit['title']);?></div>
      </div>
    </div>
    <?php endforeach; ?>
  </div>
</div>
