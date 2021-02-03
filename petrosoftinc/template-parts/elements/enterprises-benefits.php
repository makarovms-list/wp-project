<div id="enterprises-benefits-block" class="enterprises-benefits-block">
  <div class="content-area">
    <h2 data-aos="fade-up" class="line-title <?php print $template_data['fields']['enterprises_benefits']['title_color']?>"><?php print $template_data['fields']['enterprises_benefits']['title']?></h2>
    <div data-aos="fade-left" class="benefits-description"><?php print $template_data['fields']['enterprises_benefits']['description']?></div>
    <div class="e-benefits">
      <?php foreach ($template_data['fields']['enterprises_benefits']['benefits'] as $benefit_index => $benefit):?>
        <div class="e-benefit <?php print (($benefit_index+1) % 2 === 0)? 'even':'odd'; ?>">
          <?php if (isset($benefit['image']['url'])):?>
            <div data-aos="<?php print ($benefit_index % 2) ? "fade-left" : "fade-right"; ?>" class="e-b-image-wrapper <?php print (!isset($benefit['icons']['url']))? 'without-icons':'' ?>">
              <img alt="<?php print $benefit['image']['alt'];?>" class="e-b-image" src="<?php print kama_thumb_src(array('src' =>  $benefit['image']['url'],'w' => 560,'h' => 350));?>"  srcset="<?php print kama_thumb_src(array('src' =>  $benefit['image']['url'],'w' => 1120,'h' => 700));?> 2x">
              <?php if (isset($benefit['icons']['url'])):?>
                <div class="e-b-icons-wrapper <?php print $benefit['icons_position']; ?>">
                  <img alt="<?php print $benefit['icons']['alt'];?>" class="e-b-icons" src="<?php print $benefit['icons']['url'];?>" <?php if(isset($benefit['icons_retina']['url'])): ?> srcset="<?php print $benefit['icons_retina']['url'];?> 2x"<?php endif; ?>>
                </div>
              <?php endif; ?>
            </div>  
          <?php endif; ?>
          <?php if ($benefit_index == 0):?>
            <div class="benefits-description-mobile"><?php print $template_data['fields']['enterprises_benefits']['description']?></div>
          <?php endif; ?>
          <div data-aos="<?php print ($benefit_index % 2) ? "fade-right" : "fade-left"; ?>" class="e-b-content">
            <div class="e-b-description"><?php print $benefit['description'];?></div>
            <?php if (is_array($benefit['list'])): ?>
              <ul class="e-b-list">
                <?php foreach ($benefit['list'] as $list_item): ?>
                  <li>
                    <svg class="i-svg icon-check"><use xlink:href="#icon-check"></use></svg><span><?php print $list_item['text']?></span>
                  </li>
                <?php endforeach; ?>
              </ul>
            <?php endif; ?>
          </div>
        </div>
      <?php endforeach; ?>
    </div>
    <?php if(isset($template_data['fields']['enterprises_benefits']['button_link']) && $template_data['fields']['enterprises_benefits']['button_link'] != ''): ?>
      <div data-aos="fade-up" class="e-b-button-wrapper">
        <a href="<?php print $template_data['fields']['enterprises_benefits']['button_link']?>" class="btn <?php print $template_data['fields']['enterprises_benefits']['button_color']?>"><?php print $template_data['fields']['enterprises_benefits']['button_label']?></a>
      </div>
    <?php endif; ?>
  </div>
</div>