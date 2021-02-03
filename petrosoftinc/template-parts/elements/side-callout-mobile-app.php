<div style="background-image: url(<?php print wp_get_attachment_image_src($template_data['element_fields']['image'],'original')[0] ?>); background-color: <?php print $template_data['element_fields']['background_color']; ?>"
   class="wpb_content_element side-callout-type-1 side-callout-mobile-app <?php print (isset($template_data['element_fields']['extra_class'])) ? $template_data['element_fields']['extra_class'] :""; ?>">
    <h3 class="sc-title"><?php print $template_data['element_fields']['title']; ?></h3>
    <?php if (isset($template_data['element_fields']['description']) && $template_data['element_fields']['description'] != ''): ?>
      <div class="sc-description"><?php print $template_data['element_fields']['description']; ?></div>
    <?php endif; ?>
    <?php if (isset($template_data['element_fields']['link_title']) && $template_data['element_fields']['link_title'] != ''): ?>
      <div class="scm-link-title <?php print $template_data['element_fields']['link_color']; ?>"><?php print $template_data['element_fields']['link_title']; ?></div>  
    <?php endif; ?> 
    <?php if (isset($template_data['element_fields']['link_app_store']) && $template_data['element_fields']['link_app_store'] != ''): ?>
      <a class="scm-link-app-store" href="<?php print $template_data['element_fields']['link_app_store']; ?>"></a>  
    <?php endif; ?> 
    <?php if (isset($template_data['element_fields']['link_google_play']) && $template_data['element_fields']['link_google_play'] != ''): ?>
      <a class="scm-link-google-play" href="<?php print $template_data['element_fields']['link_google_play']; ?>"></a>  
    <?php endif; ?> 
</div>