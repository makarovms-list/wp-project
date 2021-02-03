<div id="clients-slider-block" class="clients-slider-block">
  <div class="clients-slider">
    <?php foreach($template_data['fields']['clients_slider'] as $slide): ?>
      <div class="c-slide">
        <div class="c-slide-content-wrapper" style="background-color: <?php print $slide['background_color']; ?>; <?php if(isset($slide['background_image']['url'])) print 'background-image: url('.$slide['background_image']['url'].');'; ?>">
          <div class="content-area <?php print $slide['positioning'];?>">
            <div class="c-slider-nav-container">
              <div data-aos="fade-right" class="c-slider-arrow slider-prev">
                <svg class="i-svg icon-arrow-1"><use xlink:href="#icon-arrow-1"></use></svg>
              </div>
              <div data-aos="fade-left" class="c-slider-arrow slider-next">
                <svg class="i-svg icon-arrow-1"><use xlink:href="#icon-arrow-1"></use></svg>
              </div>
            </div>
            <div data-aos="<?php print ($slide['positioning'] == 'left-side')?'fade-right':'fade-left';?>" class="cs-text-part">
              <div class="cs-text <?php print $slide['text_color']; ?>"><?php print $slide['text']?></div>
              <div class="cs-name <?php print $slide['text_color']; ?>"><?php print $slide['name']?></div>
              <div class="cs-post <?php print $slide['text_color']; ?>"><?php print $slide['post']?></div>
              <div class="c-bullets <?php print $slide['text_color']; ?>"></div>
              <?php if (isset($slide['link']) && $slide['link'] != ''): ?>
                <a class='btn open-modal <?php print $slide['button_color'];?>' href="<?php print $slide['link']; ?>"><?php print $slide['button_label'];?></a>
              <?php endif; ?>
            </div>
            <img alt="<?php print $slide['photo']['alt'];?>" data-aos="<?php print ($slide['positioning'] == 'left-side')?'fade-left':'fade-right';?>" class="cs-photo" src="<?php print $slide['photo']['url']?>">
            <div data-aos="fade-up" class="c-bullets desktop-bullets <?php print $slide['text_color']; ?>"></div>
          </div>
        </div>
      </div>
    <?php endforeach; ?>
  </div>
</div>

