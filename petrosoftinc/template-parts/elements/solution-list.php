<div id="solution-header-block" class="solution-header-block">
  <style>
    <?php foreach($template_data['fields']['solution_header']['solutions'] as $index => $solution): ?>
      .sh-solutions .sh-solution-wrapper .sh-soluttion-<?php print $index ?>:hover {
        box-shadow: 0 4px 30px <?php print hex2rgba($solution['hover_color'],0.36);?>
      }
    <?php endforeach; ?>
  </style>  
  <div data-aos="fade-up" class="line-title double <?php print $template_data['fields']['solution_header']['title_color'] ?>">
    <h2 class="l-title"><?php print $template_data['fields']['solution_header']['title'];?></h2>
    <div data-aos="fade-left" class="l-subtitle"><?php print $template_data['fields']['solution_header']['subtitle'];?></div>
  </div>
  <div class="sh-solutions">
    <?php foreach($template_data['fields']['solution_header']['solutions'] as $index => $solution): ?>
      <div data-aos="flip-left" class="sh-solution-wrapper">
        <?php if($index > 0):?>
          <div data-aos="zoom-in" data-aos-delay="200"  data-aos-duration="1000" class="sh-chain"><svg class="i-svg icon-chain"><use xlink:href="#icon-chain"></use></svg></div>
        <?php endif; ?>
        <div class="sh-solution sh-soluttion-<?php print $index ?>">
          <img alt="<?php print $solution['icon']['alt'];?>" class="sh-icon" src="<?php print kama_thumb_src(array('src' =>  $solution['icon']['url'],'w' => 110,'h' => 110))?>" srcset="<?php print kama_thumb_src(array('src' =>  $solution['icon']['url'],'w' => 220,'h' => 220));?> 2x">
          <div class="sh-title"><?php print $solution['title'];?></div>
          <div class="sh-description"><?php print $solution['description'];?></div>
        </div>
      </div>
    <?php endforeach; ?>
  </div>
</div>
<div class="solution-list-block">
  <?php foreach($template_data['fields']['solution_list'] as $index => $solution): ?>
    <div class="solution <?php print $solution['color_scheme'] ?>">
      <div class="s-mobile-title line-title <?php print $solution['color_scheme']?>"><?php print $solution['title']?></div>
      <div data-aos="<?php print ($index % 2) ? "fade-left" : "fade-right"; ?>"class="s-content">
        <h2 class="s-title line-title <?php print $solution['color_scheme']?>"><?php print $solution['title']?></h2>
        <div class="s-description"><?php print $solution['description']?></div>
        <div class="s-features">
          <?php foreach($solution['features'] as $feature):?>
            <div class="s-feature <?php print $solution['color_scheme']?>">
              <svg class="i-svg icon-check"><use xlink:href="#icon-check"></use></svg><span><?php print $feature['feature']?></span>
            </div>
          <?php endforeach;?>
        </div>
        <a class="btn <?php print $solution['color_scheme'];?>" href="<?php print $solution['link'];?>">Learn more</a>
      </div>
      <div class="s-image" data-aos="<?php print ($index % 2) ? "fade-right" : "fade-left"; ?>">
        <img alt="<?php print $solution['image']['alt'];?>" src="<?php print kama_thumb_src(array('src' =>  $solution['image']['url'],'w' => 560,'h' => 500));?>" srcset="<?php print kama_thumb_src(array('src' =>  $solution['image']['url'],'w' => 1120,'h' => 1000));?> 2x">
        <?php if(isset($solution['icon']['url'])): ?>
          <img alt="<?php print $solution['icon']['alt'];?>" data-aos="flip-left" data-aos-delay="100"  data-aos-duration="500"  class="s-icon" src="<?php print kama_thumb_src(array('src' =>  $solution['icon']['url'],'w' => 110,'h' => 110))?>" srcset="<?php print kama_thumb_src(array('src' =>  $solution['icon']['url'],'w' => 220,'h' => 220));?> 2x">
        <?php endif;?>        
      </div>
    </div>  
  <?php endforeach; ?>
</div>