<div id="product-description-block" class="product-description-block">
  <?php foreach ($template_data['fields']['product_description'] as $index => $product_slider):?>
  <div class="product-description-slider-block <?php print ($index % 2) ? $template_data['position_odd'] : $template_data['position_even']; ?>">
    <div class="p-bg-color"></div>
    <div class="content-area">
      <div data-aos="fade-up" class="p-slider-header">
        <h2 class="line-title <?php print $product_slider['title_color']?>"><?php print $product_slider['title']?></h2>
        <?php if (count($product_slider['slides']) > 1):?>
        <div class="ps-nav">
          <?php foreach ($product_slider['slides'] as $slide_index => $slide):?>
            <h3 class="ps-nav-link ps-nav-link-<?php print $slide_index ?> <?php print ($slide_index == 0) ? "active" : ""; ?>">
              <?php print (isset($slide['tab_title']) && $slide['tab_title'] != '') ? $slide['tab_title'] : $slide['title'] ?>
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
          <?php foreach ($product_slider['slides'] as $slide_index => $slide):?>
          <div class="p-slide <?php print ($index % 2) ? $template_data['position_odd'] : $template_data['position_even']; ?>">
            <div class="ps-content">
              <div class="ps-image <?php print (isset($slide['mobile_image']['url'])) ? "use-mobile-image" : ""; ?>"> 
                <div data-aos="<?php print ($index % 2) ? $template_data['animation_even'] : $template_data['animation_odd']; ?>"  class="ps-img-wrapper">
                  <?php if (isset($slide['background']['url'])): ?>
                    <div class="ps-background-image"><img alt="<?php print $slide['background']['alt'];?>" src="<?php print $slide['background']['url']; ?>"></div>
                  <?php endif;?>
                  <img alt="<?php print $slide['image']['alt'];?>" class="d-img" src="<?php print $slide['image']['url'];?>"
                    <?php if (isset($slide['retina_image']['url'])): ?>
                      srcset="<?php print $slide['retina_image']['url'];?> 2x"
                    <?php endif; ?>     
                  >
                  <?php if(isset($slide['mobile_image']['url'])): ?>
                    <img alt="<?php print $slide['mobile_image']['alt'];?>" class="m-img" src="<?php print $slide['mobile_image']['url'];?>">
                  <?php endif ?>
                </div>  
              </div> 
              <div data-aos="<?php print ($index % 2) ? $template_data['animation_odd'] : $template_data['animation_even']; ?>" class="ps-data">
                <?php if (isset($slide['title']) && $slide['title'] != ''):?>
                  <h4 class="ps-title"><?php print $slide['title'];?></h4>
                <?php endif; ?>
                <div class="ps-description"><?php print $slide['description'];?></div>
                <?php if (is_array($slide['list']) && count($slide['list']) > 0): ?>
                  <div class="ps-list">
                    <?php foreach($slide['list'] as $list_element): ?>
                      <div class="ps-list-value <?php print $product_slider['title_color']?>">
                        <svg class="i-svg icon-check"><use xlink:href="#icon-check"></use></svg><span><?php print $list_element['value'] ?></span>
                      </div>
                    <?php endforeach; ?>
                  </div>
                <?php endif; ?>
                <?php if (isset($slide['button']['link']) && $slide['button']['link'] !== '' && $slide['button']['title'] !== ''): ?>
                  <a class="btn <?php print $slide['button']['color']?>" href="<?php print $slide['button']['link'] ?>"><?php print $slide['button']['title'] ?></a>
                <?php endif; ?>
              </div>
            </div>
          </div>
          <?php endforeach; ?>
        </div>
      </div>
    </div>
  </div>
  <?php endforeach; ?>
</div>
