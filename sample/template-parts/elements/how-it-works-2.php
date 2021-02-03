<div id="how-it-works-2-block" class="how-it-works-2-block">
  <div class="content-area">
    <h2 data-aos="fade-up" class="line-title <?php print $template_data['fields']['how_it_works_2']['title_color']?>"><?php print $template_data['fields']['how_it_works_2']['title']?></h2>
    <div data-aos="fade-left" class="h-description"><?php print $template_data['fields']['how_it_works_2']['description']?></div>
    <div class="h-main-element-wrapper">
      <div data-aos-delay="200" data-aos="fade-up" class="h-arrow-1"></div>
      <div  data-aos="flip-left" class="h-element h-main-element">
        <div class="h-e-image-wrapper">
          <img class="h-e-image" alt="<?php print $template_data['fields']['how_it_works_2']['main_element']['image']['alt']; ?>" src="<?php print kama_thumb_src(array('src' =>  $template_data['fields']['how_it_works_2']['main_element']['image']['url'],'w' => 266,'h' => 144))?>" srcset="<?php print kama_thumb_src(array('src' =>  $template_data['fields']['how_it_works_2']['main_element']['image']['url'],'w' => 532,'h' => 288));?> 2x">
          <img class="h-e-icon" alt="<?php print $template_data['fields']['how_it_works_2']['main_element']['icon']['alt']; ?>" src="<?php print kama_thumb_src(array('src' =>  $template_data['fields']['how_it_works_2']['main_element']['icon']['url'],'w' => 110,'h' => 110))?>" srcset="<?php print kama_thumb_src(array('src' =>  $template_data['fields']['how_it_works_2']['main_element']['icon']['url'],'w' => 220,'h' => 220));?> 2x">
        </div>
        <div class="h-e-title"><?php print $template_data['fields']['how_it_works_2']['main_element']['title']?></div>
      </div>
      <div data-aos-delay="<?php print (200 * (count($template_data['fields']['how_it_works_2']['elements']) + 1)); ?>" data-aos="fade-up" class="h-arrow-2"></div>
    </div>
    <div class="h-elements">
      <?php foreach ($template_data['fields']['how_it_works_2']['elements'] as $index => $element):?>
        <div data-aos-delay="<?php print (200 * ($index+1)); ?>"  data-aos="flip-right" class="h-element">
          <div class="h-e-image-wrapper">
            <img class="h-e-image" alt="<?php print $element['image']['alt']; ?>" src="<?php print kama_thumb_src(array('src' =>  $element['image']['url'],'w' => 266,'h' => 171))?>" srcset="<?php print kama_thumb_src(array('src' =>  $element['image']['url'],'w' => 532,'h' => 342));?> 2x">
            <img class="h-e-icon" alt="<?php print $element['icon']['alt']; ?>" src="<?php print kama_thumb_src(array('src' =>  $element['icon']['url'],'w' => 110,'h' => 110))?>" srcset="<?php print kama_thumb_src(array('src' =>  $element['icon']['url'],'w' => 220,'h' => 220));?> 2x">
          </div>
          <div class="h-e-title"><?php print $element['title']?></div>
          <div class="h-e-description"><?php print $element['description']?></div>
        </div>
      <?php endforeach; ?>
    </div>
  </div>
</div>
