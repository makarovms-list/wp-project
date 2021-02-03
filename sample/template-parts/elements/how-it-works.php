<div id="how-it-works-block" class="how-it-works-block" style='background: <?php print $template_data['fields']['how_it_works']['background_color']; ?>'>
  <div class="content-area">
    <h2 data-aos="fade-up" class="line-title <?php print $template_data['fields']['how_it_works']['title_color']?>"><?php print $template_data['fields']['how_it_works']['title']?></h2>
    <div data-aos="fade-left" class="h-description"><?php print $template_data['fields']['how_it_works']['description']?></div>
    <div class="h-steps" >  
      <?php foreach($template_data['fields']['how_it_works']['steps'] as $index => $step): ?>
        <div data-aos="zoom-in" data-aos-delay="<?php print $index*500?>" class="h-step">
          <?php if ($index > 0):?>
            <div class='h-step-arrow'>
              <svg class="i-svg icon-arrow-2"><use xlink:href="#icon-arrow-2"></use></svg>
            </div>
          <?php endif; ?>
          <img alt="<?php print $step['icon']['alt'];?>" class="h-s-icon" src="<?php print $step['icon']['url']?>" <?php print (isset($step['retina_icon']['url'])) ? 'srcset="'.$step['retina_icon']['url'].' 2x"' : '' ?>>
          <div class="h-s-text"><?php print $step['text'];?></div>
        </div>
      <?php endforeach; ?>
    </div>
    <?php if(isset($template_data['fields']['how_it_works']['button_link']) && $template_data['fields']['how_it_works']['button_link'] != ''):?>
      <div class="h-w-button-wrapper">
        <a class="btn open-modal <?php print $template_data['fields']['how_it_works']['button_color']?>" href="<?php print $template_data['fields']['how_it_works']['button_link'] ?>"><?php print $template_data['fields']['how_it_works']['button_text']; ?></a>
      </div>  
    <?php endif; ?>
  </div>
</div>
