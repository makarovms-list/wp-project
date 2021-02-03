<?php 
  $acf_fields = $template_data['acf_fields'];
?>
<div id="materials-slider-block" class="archive-slider-block materials-slider-block">
  <div class="materials-slider">
    <?php foreach($acf_fields['slider']['slides'] as $slide): ?>
      <div class="m-slide">
        <div class="m-slide-content-wrapper <?php print $slide['button_color']; ?>" style="<?php if(isset($slide['image']['url'])) print 'background-image: url('.$slide['image']['url'].');'; ?>">
            <div class="m-mobile-image-wrapper">
              <img class="m-mobile-image" src="<?php print kama_thumb_src(array('src' =>  $slide['mobile_image']['url'],'w' => 400,'h' => 367));?>" srcset="<?php print kama_thumb_src(array('src' =>  $slide['mobile_image']['url'],'w' => 800,'h' => 734));?> 2x">
              <div data-aos="fade-up" class="mobile-bullets m-bullets bullets"></div>
            </div>
            <div class="m-slider-content-wrapper">
              <div data-aos="fade-left" class="m-s-content-part">
                <?php if (isset($slide['type']) && $slide['type'] != ''):?>
                  <div class="m-s-type" style="background-color: <?php print $slide['type_color']; ?>" class="type-name"><?php print $slide['type']; ?></div>
                <?php endif; ?>
                <div class="title-wrapper">
                  <div style="color: <?php print $slide['text_color']; ?>" class="m-s-title"><?php print $slide['title']; ?></div>
                </div>
                <a href="<?php print $slide['link']; ?>" class="btn <?php print $slide['button_color']; ?>"><?php if($slide['download']): ?><svg class="i-svg icon-download-bold"><use xlink:href="#icon-download-bold"></use></svg><?php endif;?><?php print $slide['button_text']; ?></a>
              </div>
            </div>
           <div data-aos="fade-up" class="m-bullets bullets"></div>
        </div>
      </div>
    <?php endforeach; ?>
  </div>
</div>

