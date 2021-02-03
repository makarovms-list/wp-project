<div class="popup-group-block">
  <?php foreach ($template_data['fields']['popup_group'] as $index => $popup): ?>
    <div
      <?php if(isset($popup['background_image']['url'])):?>
        style="background: url('<?php print $popup['background_image']['url']; ?>'); background-size: cover"
      <?php else: ?>
        style="background-color: <?php print $popup['background_color']?>"
      <?php endif; ?>
      id="popup-group-<?php print $index ?>" class="petrosoft-popup-block <?php print isset($popup['image']['url'])? 'with-image':''?> " data-seconds="<?php print $popup['seconds_to_show']; ?>" data-percents="<?php print $popup['percents_to_show']; ?>">
      <div class="p-close"><svg class="i-svg icon-close-3" style="fill: <?php print $popup['color']?>"><use xlink:href="#icon-close-3"></use></svg></div>
      <div class="p-content">
        <?php if (isset($popup['image']['url'])): ?>
          <img alt="<?php print $popup['image']['alt'];?>" class="p-image" src="<?php print $popup['image']['url']; ?>"
            <?php if (isset($popup['retina_image']['url'])): ?>
               srcset="<?php print $popup['retina_image']['url']; ?> 2x"
            <?php endif; ?>
          >
        <?php endif; ?>
        <div class="p-data">  
          <?php if (isset($popup['title'])): ?>
            <div style="color: <?php print $popup['color'] ?>" class="p-title"><?php print $popup['title'];?></div>
          <?php endif; ?>
          <?php if (isset($popup['subtitle']) && $popup['subtitle'] != ''): ?>
            <div style="color: <?php print $popup['color'] ?>" class="p-subtitle"><?php print $popup['subtitle'];?></div>
          <?php endif; ?> 
            
          <?php if (isset($popup['image']['url'])): ?>
            <img alt="<?php print $popup['image']['alt'];?>" class="p-image-mobile" src="<?php print $popup['image']['url']; ?>"
              <?php if (isset($popup['retina_image']['url'])): ?>
                 srcset="<?php print $popup['retina_image']['url']; ?> 2x"
              <?php endif; ?>
            >
          <?php endif; ?>
          <a href="<?php print $popup['link'];?>" style="color: <?php print $popup['color'] ?>; border-color: <?php print $popup['color'] ?>" class="btn <?php print $popup['button_color'];?> <?php print ((isset($popup['leadsource']) && $popup['leadsource'] != '' && is_array($popup['file'])))?'download':''?>"><?php print $popup['button_label'] ?></a>
        </div>
      </div>
      
      <?php if (isset($popup['leadsource']) && $popup['leadsource'] != '' && is_array($popup['file'])): ?>
        <div class="p-step-2">
          <?php if (isset($popup['image']['url'])): ?>
          <img alt="<?php print $popup['image']['alt'];?>" class="p-image" src="<?php print $popup['image']['url']; ?>"
            <?php if (isset($popup['retina_image']['url'])): ?>
               srcset="<?php print $popup['retina_image']['url']; ?> 2x"
            <?php endif; ?>
          >
          <?php endif; ?>
          <form class="p-mail-form" method="POST">
          <input name="email" class="p-email" id="email-<?php print $index ?>" type="email" placeholder="E-mail" value="" required />               
          <input class="p-file-url" name="p-file-url-<?php print $index ?>" type="hidden" value="<?php print $popup['file']['url'] ?>" />
          <input class="p-leadsource" name="p-leadsource-<?php print $index ?>" type="hidden" value="<?php print $popup['leadsource']; ?>" />
          <input type="submit" class="btn <?php print $popup['button_color'];?>" value="Download" />
          <div class="agree"><input class="petrosoft-checkbox" name="agree-popup-<?php print $index ?>" id="agree-popup-<?php print $index ?>" required type="checkbox" checked value="agree"> <label style="color: <?php print $popup['color'] ?>" for="agree-popup-<?php print $index ?>"> I agree to Petrosoft Privacy Policy, including the processing of my data to provide the information*</label></div>
          </form>
        </div>
        <!--noindex-->
          <div class="p-step-3">
            <div style="color: <?php print $popup['color'] ?>" class="p-s3-message">Your download link successfully generated</div>
            <a style="color: <?php print $popup['color'] ?>" href="<?php print $popup['file']['url'] ?>" download >Download link</a>
          </div>
        <!--/noindex-->
      <?php endif ?>
    </div>
  <?php endforeach; ?>
</div>
