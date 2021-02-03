<div id="mobile-app-block" class='mobile-app-block'>
  <div data-aos="fade-right" class="m-a-image">
    <img alt="<?php print $template_data['fields']['mobile_app']['image']['alt'];?>" src="<?php print $template_data['fields']['mobile_app']['image']['url'];?>"
      <?php if (isset($template_data['fields']['mobile_app']['retina_image']['url'])): ?>
        srcset="<?php print $template_data['fields']['mobile_app']['retina_image']['url'];?> 2x"
      <?php endif; ?>     
    >
  </div>
  <div data-aos="fade-left" class="m-a-content">
    <h2 class="<?php print $template_data['fields']['mobile_app']['color']?> m-a-first-title"><?php print $template_data['fields']['mobile_app']['title_1']?></h2>
    <div class="m-a-second-title"><?php print $template_data['fields']['mobile_app']['title_2']?></div>
    <div class="m-a-features">
      <?php foreach($template_data['fields']['mobile_app']['features'] as $feature):?>
        <div class="m-a-feature <?php print $template_data['fields']['mobile_app']['color']?>">
          <svg class="i-svg icon-check"><use xlink:href="#icon-check"></use></svg><span><?php print $feature['feature']?></span>
        </div>
      <?php endforeach;?>
    </div>
    <div class="m-a-buttons-wrapper">
      <?php if (isset($template_data['fields']['mobile_app']['apple_link']) && $template_data['fields']['mobile_app']['apple_link'] != ''):?>
        <a href="<?php print $template_data['fields']['mobile_app']['apple_link'] ?>" class="m-a-apple-button btn <?php print $template_data['fields']['mobile_app']['color']?>">
        <div class="m-a-icon-wrapper">
          <svg class="i-svg icon-apple"><use xlink:href="#icon-apple"></use></svg>
        </div>
          <?php print $template_data['fields']['mobile_app']['apple_label']?>
        </a>
      <?php endif; ?>
      <?php if (isset($template_data['fields']['mobile_app']['android_link']) && $template_data['fields']['mobile_app']['android_link'] != ''):?>
        <a href="<?php print $template_data['fields']['mobile_app']['android_link'] ?>" class="m-a-android-button btn <?php print $template_data['fields']['mobile_app']['color']?>">
        <div class="m-a-icon-wrapper">
          <svg class="i-svg icon-android"><use xlink:href="#icon-android"></use></svg>
        </div>
          <?php print $template_data['fields']['mobile_app']['android_label']?>
        </a>
      <?php endif; ?>
    </div>
  </div>
</div>
