<div id="our-solutions-block" class="our-solutions-block">
  <div data-aos="fade-up" class="line-title double <?php print $template_data['fields']['our_solutions']['title_color']?>">
    <h2 class="l-title"><?php print $template_data['fields']['our_solutions']['title']?></h2>
    <div data-aos="fade-left" class="l-subtitle"><?php print $template_data['fields']['our_solutions']['subtitle']?></div>
  </div>
  <div class="vc_row wpb_row vc_inner vc_row-fluid flex-row solutions">
    <?php foreach ($template_data['fields']['our_solutions']['solutions'] as $solution): ?>
      <div class="wpb_column vc_column_container vc_col-sm-6 vc_col-lg-3 vc_col-md-4 vc_col-xs-12">
        <div class="vc_column-inner">
          <a href="<?php print $solution['link'];?>" data-aos-duration="800" data-aos="flip-left" class="solution wpb_wrapper">
            <div class="s-image-wrapper">
              <img alt="<?php print $solution['image']['alt'];?>" class="s-image" src="<?php print kama_thumb_src(array('src' =>  $solution['image']['url'],'w' => 344,'h' => 210));?>" srcset="<?php print kama_thumb_src(array('src' =>  $solution['image']['url'],'w' => 344,'h' => 210));?>, <?php print kama_thumb_src(array('src' =>  $solution['image']['url'],'w' => 688,'h' => 420));?> 2x" />
              <img alt="<?php print $solution['icon']['alt'];?>" class="s-icon" src="<?php print kama_thumb_src(array('src' =>  $solution['icon']['url'],'w' => 110,'h' => 110));?>" srcset="<?php print kama_thumb_src(array('src' =>  $solution['icon']['url'],'w' => 110,'h' => 110));?>, <?php print kama_thumb_src(array('src' =>  $solution['icon']['url'],'w' => 220,'h' => 220));?> 2x" />
            </div>
              <div class="s-title"><?php print $solution['title'];?></div>
              <div class="s-content">
                <div class="s-description"><?php print $solution['description'];?></div>
                <div class="s-link"><div class="btn <?php print $solution['color'];?>">LEARN MORE</div></div>
              </div>
          </a>
        </div>
      </div>
    <?php endforeach; ?>
  </div>
</div>
