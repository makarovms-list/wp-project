<div style="background-color: <?php print $template_data['background_color']; ?>"
   class="wpb_content_element side-blocks-side-callout-mobile-app">
    <div class="sc-callout-content-wrapper">
      <h3 class="sc-title"><?php print $template_data['title']; ?></h3>
      <?php if (isset($template_data['description']) && $template_data['description'] != ''): ?>
        <div class="sc-description"><?php print $template_data['description']; ?></div>
      <?php endif; ?>
      <?php if (isset($template_data['link']) && $template_data['link'] != ''): ?>
        <a href="<?php print $template_data['link']; ?>" class="scm-link-title <?php print $template_data['link_color']; ?>"><?php print $template_data['link_title']; ?></a>
      <?php endif; ?>
      <?php if (isset($template_data['link_app_store']) && $template_data['link_app_store'] != ''): ?>
        <a class="scm-link-app-store" href="<?php print $template_data['link_app_store']; ?>"></a>  
      <?php endif; ?> 
      <?php if (isset($template_data['link_google_play']) && $template_data['link_google_play'] != ''): ?>
        <a class="scm-link-google-play" href="<?php print $template_data['link_google_play']; ?>"></a>  
      <?php endif; ?> 
    </div>
    <?php if (isset($template_data['image']['url'])): ?>
      <div class="sc-image-wrapper">
        <img class="sc-image" alt="<?php print $template_data['image']['alt'];?>" src="<?php print $template_data['image']['url'];?>" srcset="<?php print kama_thumb_src(array('src' =>  $template_data['image']['url'],'w' => $template_data['image']['width'] * 2 ,'h' => $template_data['image']['height'] * 2));?> 2x">
      </div>
    <?php endif; ?>
</div>