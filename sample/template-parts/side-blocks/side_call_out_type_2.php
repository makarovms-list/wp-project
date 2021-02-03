<a style="background-color: <?php print $template_data['background_color']; ?>" href="<?php print $template_data['link']; ?>" 
   class="wpb_content_element side-blocks-side-call-out-type-2">
    <div class="sc-callout-content-wrapper">
      <h3 class="sc-title"><?php print $template_data['title']; ?></h3>
      <?php if (isset($template_data['description']) && $template_data['description'] != ''): ?>
        <div class="sc-description"><?php print $template_data['description']; ?></div>
      <?php endif; ?>
      <div class="sc-link <?php print $template_data['link_color']; ?>"><?php print $template_data['link_title']; ?><svg class="i-svg icon-arrow-4"><use xlink:href="#icon-arrow-4"></use></svg></div>
    </div>
    <?php if (isset($template_data['image']['url'])): ?>
      <div class="sc-image-wrapper">
        <img class="sc-image" alt="<?php print $template_data['image']['alt'];?>" src="<?php print $template_data['image']['url'];?>" srcset="<?php print kama_thumb_src(array('src' =>  $template_data['image']['url'],'w' => $template_data['image']['width'] * 2 ,'h' => $template_data['image']['height'] * 2));?> 2x">
      </div>
    <?php endif; ?>
</a>