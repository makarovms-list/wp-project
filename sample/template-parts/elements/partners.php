<div id="partners-block" class="partners-block">
  <div class="content-area">
    <div data-aos="fade-up" class="p-slider-header">
      <h2 class="line-title <?php print $template_data['fields']['partners']['title_color']?>"><?php print $template_data['fields']['partners']['title']?></h2>
      <?php if (count($template_data['fields']['partners']['tabs']) > 1):?>
      <div class="ps-nav">
        <?php foreach ($template_data['fields']['partners']['tabs'] as $tab_index => $tab):?>
          <h3 class="ps-nav-link ps-nav-link-<?php print $tab_index ?> <?php print ($tab_index == 0) ? "active" : ""; ?>">
            <?php print $tab['title'] ?>
          </h3>
        <?php endforeach; ?>
      </div>
      <?php endif; ?>
    </div>
    <div class="p-slider-wrapper">
      <div class="p-slider-nav-container">
        <div data-aos="fade-right" class="p-slider-arrow slider-prev">
          <svg class="i-svg icon-arrow-1"><use xlink:href="#icon-arrow-1"></use></svg>
        </div>
        <div data-aos="fade-left" class="p-slider-arrow slider-next">
          <svg class="i-svg icon-arrow-1"><use xlink:href="#icon-arrow-1"></use></svg>
        </div>
      </div>
      <div class="p-slider">
        <?php foreach ($template_data['fields']['partners']['tabs'] as $slide_index => $slide):?>
        <div data-aos="fade-up" class="p-slide">
          <div class="ps-title"><?php print $slide['title'];?></div>
          <div class="ps-logos-wrapper">
            <div class="ps-logos">
              <?php foreach ($slide['logos'] as $logo):?>
                <?php if(isset($logo['link']) && $logo['link'] != ''):?>
                  <a target="_blank" href="<?php print $logo['link']?>" class="p-logo">
                    <img alt="<?php print $logo['image']['alt'];?>" class="p-logo-image" src="<?php print kama_thumb_src(array('src' =>  $logo['image']['url'],'w' => 360,'h' => 140));?>"  srcset="<?php print kama_thumb_src(array('src' =>  $logo['image']['url'],'w' => 730,'h' => 280));?> 2x">
                  </a>
                <?php else: ?>
                  <div class="p-logo">
                    <img alt="<?php print $logo['image']['alt'];?>" class="p-logo-image" src="<?php print kama_thumb_src(array('src' =>  $logo['image']['url'],'w' => 360,'h' => 140));?>"  srcset="<?php print kama_thumb_src(array('src' =>  $logo['image']['url'],'w' => 730,'h' => 280));?> 2x">
                  </div>
                <?php endif; ?>
              <?php endforeach; ?>
            </div>
          </div>
        </div>
        <?php endforeach; ?>
      </div>
    </div>
  </div>
</div>
