<?php 
  $acf_fields = get_field('resources_catalog', 'option');
 ?>
<div id="resources-slider-block" class="resources-slider-block">
  <div class="resources-slider">
    <?php foreach($acf_fields['resources_slider']['slides'] as $slide): ?>
      <div class="r-slide">
        <div class="r-slide-content-wrapper <?php print $slide['color_scheme']; ?>" style="<?php if(isset($slide['image']['url'])) print 'background-image: url('.$slide['image']['url'].');'; ?>">
            <div class="r-mobile-image-wrapper">
              <img class="r-mobile-image" src="<?php print kama_thumb_src(array('src' =>  $slide['mobile_image']['url'],'w' => 400,'h' => 367));?>" srcset="<?php print kama_thumb_src(array('src' =>  $slide['mobile_image']['url'],'w' => 800,'h' => 734));?> 2x">
              <div data-aos="fade-up" class="r-bullets bullets"></div>
            </div>
            <div class="r-slider-content-wrapper">
              <div data-aos="fade-left" class="r-s-content-part">
                <div class="r-s-resource">
                  <?php if (isset($slide['resource_name']) && $slide['resource_name'] != ''):?>
                    <svg style="color: <?php print $slide['resource_name_color']; ?>" class="i-svg icon-icon-resource"><use xlink:href="#icon-resource"></use></svg>
                    <div style="color: <?php print $slide['resource_name_color']; ?>" class="resource-name"><?php print $slide['resource_name']; ?></div>
                  <?php endif; ?>
                </div>
                <div class="title-wrapper">
                  <div style="color: <?php print $slide['text_color']; ?>" class="r-s-title"><?php print $slide['title']; ?></div>
                  <?php if (isset($slide['subtitle']) && $slide['subtitle'] != ''):?>
                    <div style="color: <?php print $slide['text_color']; ?>" class="r-s-subtitle"><?php print $slide['subtitle']; ?></div>    
                  <?php endif; ?>
                </div>
                <a href="<?php print $slide['button_link']; ?>" class="btn <?php print $slide['color_scheme']; ?>"><?php print $slide['button_text']; ?></a>
              </div>
            </div>
           <div data-aos="fade-up" class="r-bullets bullets"></div>
        </div>
      </div>
    <?php endforeach; ?>
  </div>
</div>

