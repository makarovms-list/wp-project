<div id="hr-managers-block" class="hr-managers-block">
  <div class="hr-managers-slider">
    <?php foreach($template_data['fields']['hr_managers'] as $slide): ?>
      <div class="hr-slide">
        <div class="hr-slide-content-wrapper" style="background-color: <?php print $slide['background_color']; ?>">
          <div class="content-area <?php print $slide['positioning'];?>">
            <div class="hr-slider-nav-container">
              <div data-aos="fade-right" class="hr-slider-arrow slider-prev">
                <svg class="i-svg icon-arrow-1"><use xlink:href="#icon-arrow-1"></use></svg>
              </div>
              <div data-aos="fade-left" class="hr-slider-arrow slider-next">
                <svg class="i-svg icon-arrow-1"><use xlink:href="#icon-arrow-1"></use></svg>
              </div>
            </div>
            <div data-aos="<?php print ($slide['positioning'] == 'left-side')?'fade-right':'fade-left';?>" class="hr-text-part">
              <h2 class="line-title <?php print $slide['title_color']?>" style="color:<?php print $slide['text_color']?>"><?php print $slide['title']?></h2>
              <div class="hr-text" style="color:<?php print $slide['text_color']?>"><?php print $slide['text']?></div>
              <div class="hr-name" style="color:<?php print $slide['text_color']?>"><?php print $slide['name']?></div>
              <div class="hr-post" style="color:<?php print $slide['text_color']?>"><?php print $slide['post']?></div>
              <?php if (isset($slide['link']) && $slide['link'] != ''): ?>
                <a class='btn <?php print $slide['button_color'];?>'href="<?php print $slide['link']; ?>">CONTACT VIA EMAIL</a>
              <?php endif; ?>
              <div class="hr-bullets"></div>
            </div>
            <img alt="<?php print $slide['photo']['alt'];?>" data-aos="<?php print ($slide['positioning'] == 'left-side')?'fade-left':'fade-right';?>" class="hr-photo" src="<?php print $slide['photo']['url']?>">
          </div>
        </div>
      </div>
    <?php endforeach; ?>
  </div>
</div>

